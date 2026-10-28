<?php
require_once __DIR__ . '/../config.php';
ensureAdmin();

// CSV Export Handler
if (isset($_GET['export']) && $_GET['export'] === 'csv') {
    $allLeads = db()->query('SELECT * FROM leads ORDER BY created_at DESC')->fetchAll();
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=webtecmart-leads-' . date('Y-m-d') . '.csv');
    $output = fopen('php://output', 'w');
    fputcsv($output, ['ID', 'Name', 'Email', 'Phone', 'Company', 'Service', 'Budget', 'Message', 'Created At']);
    foreach ($allLeads as $l) {
        fputcsv($output, [
            $l['id'] ?? '',
            $l['name'] ?? '',
            $l['email'] ?? '',
            $l['phone'] ?? '',
            $l['company'] ?? '',
            $l['service'] ?? '',
            $l['budget'] ?? '',
            $l['message'] ?? '',
            $l['created_at'] ?? ''
        ]);
    }
    fclose($output);
    exit;
}

$leads = db()->query('SELECT * FROM leads ORDER BY created_at DESC')->fetchAll();

$initial = static function (string $name): string {
    $name = trim($name);
    if ($name === '') return '?';
    return function_exists('mb_strtoupper') ? mb_strtoupper(mb_substr($name, 0, 1)) : strtoupper(substr($name, 0, 1));
};

require_once __DIR__ . '/templates/header.php';
?>

<style>
    .leads-header-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 16px;
        margin-bottom: 28px;
    }
    .leads-header-row h1 {
        font-size: clamp(1.4rem, 2.5vw, 1.85rem) !important;
        font-weight: 800 !important;
        color: #0F172A;
        margin: 0 0 4px !important;
        letter-spacing: -0.02em;
    }
    .leads-header-row p {
        font-size: 0.95rem !important;
        color: #64748B;
        margin: 0 !important;
    }

    .leads-toolbar {
        background: #FFFFFF;
        border: 1px solid #E2E8F0;
        border-radius: 14px;
        padding: 16px 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 16px;
        margin-bottom: 24px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
    }
    .leads-search-box {
        position: relative;
        flex: 1 1 280px;
        max-width: 440px;
    }
    .leads-search-box i {
        position: absolute;
        top: 50%;
        left: 14px;
        transform: translateY(-50%);
        color: #94A3B8;
        font-size: 1rem;
        pointer-events: none;
    }
    .leads-search-input {
        width: 100%;
        padding: 10px 16px 10px 40px;
        border-radius: 10px;
        border: 1.5px solid #E2E8F0;
        font-size: 0.9rem;
        outline: none;
        transition: all 0.2s ease;
    }
    .leads-search-input:focus {
        border-color: #C4007A;
        box-shadow: 0 0 0 3px rgba(196, 0, 122, 0.12);
    }

    .leads-export-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #FFFFFF;
        border: 1.5px solid #CBD5E1;
        color: #334155;
        padding: 9px 18px;
        border-radius: 10px;
        font-size: 0.875rem;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.2s ease;
    }
    .leads-export-btn:hover {
        background: #F8FAFC;
        border-color: #0F172A;
        color: #0F172A;
    }

    /* Table styles */
    .leads-card {
        background: #FFFFFF;
        border: 1px solid #E2E8F0;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.03);
    }
    .leads-table {
        width: 100%;
        border-collapse: collapse;
    }
    .leads-table th {
        background: #F8FAFC;
        padding: 14px 20px;
        font-size: 0.74rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        color: #64748B;
        border-bottom: 1px solid #E2E8F0;
        white-space: nowrap;
    }
    .leads-table td {
        padding: 16px 20px;
        vertical-align: top;
        font-size: 0.88rem;
        border-bottom: 1px solid #F1F5F9;
        color: #1E293B;
    }
    .leads-table tr:hover td {
        background: #FCFAFB;
    }

    .leads-avatar-circle {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #FCE8F3;
        color: #C4007A;
        font-weight: 800;
        font-size: 0.95rem;
        display: grid;
        place-items: center;
        flex-shrink: 0;
    }
    .lead-tag {
        display: inline-flex;
        padding: 3px 10px;
        border-radius: 9999px;
        background: #FFF0F7;
        color: #C4007A;
        font-size: 0.76rem;
        font-weight: 700;
    }
    .lead-action-icon {
        width: 32px;
        height: 32px;
        border-radius: 8px;
        background: #F1F5F9;
        color: #475569;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        transition: all 0.2s ease;
    }
    .lead-action-icon:hover {
        background: #C4007A;
        color: #FFFFFF;
    }

    @media (max-width: 860px) {
        .leads-desktop-table { display: none; }
        .leads-mobile-list { display: flex; flex-direction: column; gap: 14px; padding: 14px; }
    }
    @media (min-width: 861px) {
        .leads-mobile-list { display: none; }
    }
</style>

<div class="leads-header-row">
    <div>
        <h1>Leads &amp; Enquiries</h1>
        <p>Manage and export all potential clients submitted through your website forms.</p>
    </div>
    <div style="display: flex; gap: 10px;">
        <a href="/admin/leads.php?export=csv" class="leads-export-btn">
            <i class="bi bi-download"></i> Export to CSV
        </a>
        <a href="/admin/dashboard.php" class="dash-action-btn primary" style="padding: 9px 18px; border-radius: 10px;">
            <i class="bi bi-grid-fill"></i> Dashboard
        </a>
    </div>
</div>

<!-- Search & Controls Toolbar -->
<div class="leads-toolbar">
    <div class="leads-search-box">
        <i class="bi bi-search"></i>
        <input type="text" id="leadSearch" class="leads-search-input" placeholder="Search by name, email, phone, company..." aria-label="Search leads">
    </div>
    <div>
        <span style="font-size: 0.825rem; font-weight: 700; color: #64748B;">Total Records: <strong><?= count($leads) ?></strong></span>
    </div>
</div>

<div class="leads-card">
    <?php if (empty($leads)): ?>
        <div style="padding: 60px 24px; text-align: center;">
            <div style="width: 64px; height: 64px; border-radius: 20px; background: #FFF0F7; color: #C4007A; display: inline-flex; align-items: center; justify-content: center; font-size: 1.8rem; margin-bottom: 14px;">
                <i class="bi bi-inbox"></i>
            </div>
            <h3 style="font-size: 1.1rem; font-weight: 800; color: #0F172A; margin: 0 0 6px;">No leads recorded yet</h3>
            <p style="font-size: 0.9rem; color: #64748B; margin: 0;">Whenever visitors submit a proposal or consultation form, they will appear here instantly.</p>
        </div>
    <?php else: ?>
        <!-- Desktop Table -->
        <div class="table-responsive leads-desktop-table">
            <table class="leads-table" id="leadsTable">
                <thead>
                    <tr>
                        <th>Client Info</th>
                        <th>Contact Details</th>
                        <th>Service / Scope</th>
                        <th>Message</th>
                        <th>Date &amp; Time</th>
                        <th>Quick Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($leads as $l): 
                        $searchText = strtolower(implode(' ', [
                            $l['name'] ?? '',
                            $l['email'] ?? '',
                            $l['phone'] ?? '',
                            $l['company'] ?? '',
                            $l['service'] ?? '',
                            $l['message'] ?? ''
                        ]));
                    ?>
                        <tr class="lead-row" data-search="<?= e($searchText) ?>">
                            <td>
                                <div style="display: flex; align-items: center; gap: 12px;">
                                    <div class="leads-avatar-circle"><?= e($initial((string) $l['name'])) ?></div>
                                    <div>
                                        <div style="font-weight: 700; color: #0F172A;"><?= e($l['name']) ?></div>
                                        <?php if (!empty($l['company'])): ?>
                                            <div style="font-size: 0.78rem; color: #64748B;"><?= e($l['company']) ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <a href="mailto:<?= e($l['email']) ?>" style="color: #334155; text-decoration: none; font-weight: 600;">
                                        <?= e($l['email']) ?>
                                    </a>
                                </div>
                                <?php if (!empty($l['phone'])): ?>
                                    <div style="margin-top: 4px;">
                                        <a href="tel:<?= e($l['phone']) ?>" style="color: #64748B; text-decoration: none; font-size: 0.825rem;">
                                            <i class="bi bi-telephone me-1"></i><?= e($l['phone']) ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if (!empty($l['service'])): ?>
                                    <span class="lead-tag"><?= e($l['service']) ?></span>
                                <?php else: ?>
                                    <span style="color: #94A3B8;">General</span>
                                <?php endif; ?>
                                <?php if (!empty($l['budget'])): ?>
                                    <div style="font-size: 0.76rem; color: #059669; font-weight: 700; margin-top: 4px;">
                                        Budget: <?= e($l['budget']) ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div style="max-width: 280px; font-size: 0.85rem; color: #475569; line-height: 1.5; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                    <?= !empty($l['message']) ? e($l['message']) : '<span style="color:#94A3B8">—</span>' ?>
                                </div>
                            </td>
                            <td style="white-space: nowrap; color: #64748B; font-size: 0.825rem;">
                                <?= date('d M Y, h:i A', strtotime($l['created_at'])) ?>
                            </td>
                            <td>
                                <div style="display: flex; gap: 6px;">
                                    <a href="mailto:<?= e($l['email']) ?>" class="lead-action-icon" title="Send Email">
                                        <i class="bi bi-envelope"></i>
                                    </a>
                                    <?php if (!empty($l['phone'])): ?>
                                        <a href="tel:<?= e($l['phone']) ?>" class="lead-action-icon" title="Call">
                                            <i class="bi bi-telephone"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Mobile Stacked Card View -->
        <div class="leads-mobile-list" id="leadsMobileList">
            <?php foreach ($leads as $l): 
                $searchText = strtolower(implode(' ', [
                    $l['name'] ?? '',
                    $l['email'] ?? '',
                    $l['phone'] ?? '',
                    $l['company'] ?? '',
                    $l['service'] ?? '',
                    $l['message'] ?? ''
                ]));
            ?>
                <div class="adm-card lead-card-mobile" data-search="<?= e($searchText) ?>" style="padding: 16px; border-radius: 14px;">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 12px;">
                        <div style="display: flex; gap: 10px; align-items: center;">
                            <div class="leads-avatar-circle"><?= e($initial((string) $l['name'])) ?></div>
                            <div>
                                <div style="font-weight: 800; color: #0F172A;"><?= e($l['name']) ?></div>
                                <div style="font-size: 0.78rem; color: #64748B;"><?= date('d M Y, h:i A', strtotime($l['created_at'])) ?></div>
                            </div>
                        </div>
                        <?php if (!empty($l['service'])): ?>
                            <span class="lead-tag"><?= e($l['service']) ?></span>
                        <?php endif; ?>
                    </div>

                    <div style="font-size: 0.875rem; margin-bottom: 8px;">
                        <a href="mailto:<?= e($l['email']) ?>" style="color: #C4007A; text-decoration: none; font-weight: 600;">
                            <i class="bi bi-envelope me-1"></i><?= e($l['email']) ?>
                        </a>
                    </div>
                    <?php if (!empty($l['phone'])): ?>
                        <div style="font-size: 0.875rem; margin-bottom: 10px;">
                            <a href="tel:<?= e($l['phone']) ?>" style="color: #475569; text-decoration: none;">
                                <i class="bi bi-telephone me-1"></i><?= e($l['phone']) ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($l['message'])): ?>
                        <div style="background: #F8FAFC; border-radius: 8px; padding: 10px; font-size: 0.85rem; color: #475569; margin-top: 8px;">
                            <?= e($l['message']) ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<script>
(function() {
    const input = document.getElementById('leadSearch');
    if (!input) return;

    input.addEventListener('input', function() {
        const query = this.value.trim().toLowerCase();
        
        // Filter desktop rows
        document.querySelectorAll('.lead-row').forEach(row => {
            const text = row.getAttribute('data-search') || '';
            row.style.display = text.includes(query) ? '' : 'none';
        });

        // Filter mobile cards
        document.querySelectorAll('.lead-card-mobile').forEach(card => {
            const text = card.getAttribute('data-search') || '';
            card.style.display = text.includes(query) ? '' : 'none';
        });
    });
})();
</script>

<?php require_once __DIR__ . '/templates/footer.php'; ?>
