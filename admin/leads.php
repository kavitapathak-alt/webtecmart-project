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
            formatDatabaseDateTime((string) ($l['created_at'] ?? 'now'))
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

// Quick stats for the colored cards
$totalLeads = count($leads);
$weekAgo = strtotime('-7 days');
$monthStart = strtotime(date('Y-m-01'));
$weekLeads = 0; $monthLeads = 0;
foreach ($leads as $l) {
    $ts = strtotime((string) ($l['created_at'] ?? ''));
    if ($ts !== false) {
        if ($ts >= $weekAgo) $weekLeads++;
        if ($ts >= $monthStart) $monthLeads++;
    }
}

require_once __DIR__ . '/templates/header.php';
?>

<style>
    .ld-head { display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 16px; margin-bottom: 20px; }
    .ld-head h1 { font-size: clamp(1.4rem, 2.4vw, 1.8rem); font-weight: 600; letter-spacing: -.02em; margin: 0 0 4px; }
    .ld-head p { font-size: .88rem; color: #777; margin: 0; }
    .ld-btn { display: inline-flex; align-items: center; gap: 8px; padding: 10px 20px; border-radius: 999px; font-size: .85rem; font-weight: 600; text-decoration: none; border: 1px solid #0E0E0E; transition: .2s; }
    .ld-btn.light { background: #fff; color: #0E0E0E; }
    .ld-btn.light:hover { background: #F4F4F4; color: #0E0E0E; }
    .ld-btn.dark { background: #0E0E0E; color: #fff; }
    .ld-btn.dark:hover { background: #2a2a2a; color: #fff; }

    .ld-stats { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; margin-bottom: 20px; }
    @media (max-width: 700px) { .ld-stats { grid-template-columns: 1fr; } }
    .ld-stat { border-radius: 20px; padding: 16px 20px; display: flex; justify-content: space-between; align-items: flex-end; min-height: 100px; }
    .ld-stat span { font-size: .85rem; font-weight: 500; }
    .ld-stat b { font-size: 2.1rem; font-weight: 600; letter-spacing: -.03em; line-height: 1; }
    .ld-yellow { background: var(--adm-yellow); color: #0E0E0E; }
    .ld-red { background: var(--adm-red); color: #fff; }
    .ld-blue { background: var(--adm-blue); color: #fff; }

    .ld-toolbar { background: #fff; border: 1px solid #EDEDED; border-radius: 999px; padding: 8px 8px 8px 20px; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px; margin-bottom: 20px; }
    .ld-search { position: relative; flex: 1 1 280px; max-width: 460px; }
    .ld-search i { position: absolute; top: 50%; left: 0; transform: translateY(-50%); color: #999; }
    .ld-search input { width: 100%; border: 0; outline: 0; padding: 10px 0 10px 28px; font: inherit; font-size: .88rem; background: transparent; }
    .ld-count { background: #0E0E0E; color: #fff; border-radius: 999px; padding: 9px 18px; font-size: .78rem; font-weight: 500; }
    .ld-count strong { color: var(--adm-lime); font-weight: 600; }

    .ld-card { background: #fff; border: 1px solid #EDEDED; border-radius: 26px; overflow: hidden; }
    .ld-table { width: 100%; border-collapse: collapse; }
    .ld-table th { background: #FAFAFA; padding: 14px 22px; font-size: .75rem; font-weight: 500; color: #888; border-bottom: 1px solid #EEE; text-align: left; white-space: nowrap; }
    .ld-table td { padding: 16px 22px; vertical-align: top; font-size: .86rem; border-bottom: 1px solid #F3F3F3; color: #1c1c1c; }
    .ld-table tr:last-child td { border-bottom: 0; }
    .ld-table tr:hover td { background: #FAFAFA; }

    .ld-av { width: 40px; height: 40px; border-radius: 50%; background: var(--adm-lime); color: #0E0E0E; font-weight: 700; display: grid; place-items: center; flex-shrink: 0; }
    .ld-tag { display: inline-flex; padding: 4px 12px; border-radius: 999px; background: #F6F6F6; border: 1px solid #EAEAEA; font-size: .76rem; font-weight: 500; }
    .ld-icon { width: 34px; height: 34px; border-radius: 50%; background: #F4F4F4; color: #0E0E0E; display: inline-flex; align-items: center; justify-content: center; text-decoration: none; transition: .2s; }
    .ld-icon:hover { background: #0E0E0E; color: var(--adm-lime); }

    @media (max-width: 860px) {
        .ld-desktop { display: none; }
        .ld-mobile { display: flex; flex-direction: column; gap: 12px; padding: 14px; }
        .ld-toolbar { border-radius: 24px; padding: 14px 16px; }
    }
    @media (min-width: 861px) { .ld-mobile { display: none; } }
    .ld-mcard { background: #fff; border: 1px solid #EDEDED; border-radius: 20px; padding: 16px; }
</style>

<div class="ld-head">
    <div>
        <h1>Leads &amp; Enquiries</h1>
        <p>Manage and export all potential clients submitted through your website forms.</p>
    </div>
    <div class="d-flex gap-2 flex-wrap">
        <a href="/admin/leads.php?export=csv" class="ld-btn light"><i class="bi bi-download"></i> Export to CSV</a>
        <a href="/admin/dashboard.php" class="ld-btn dark"><i class="bi bi-house-door"></i> Dashboard</a>
    </div>
</div>

<div class="ld-stats">
    <div class="ld-stat ld-yellow"><span>Total Leads</span><b><?= $totalLeads ?></b></div>
    <div class="ld-stat ld-red"><span>This Month</span><b><?= $monthLeads ?></b></div>
    <div class="ld-stat ld-blue"><span>Last 7 Days</span><b><?= $weekLeads ?></b></div>
</div>

<div class="ld-toolbar">
    <div class="ld-search">
        <i class="bi bi-search"></i>
        <input type="text" id="leadSearch" placeholder="Search by name, email, phone, company..." aria-label="Search leads">
    </div>
    <span class="ld-count">Total Records: <strong><?= $totalLeads ?></strong></span>
</div>

<div class="ld-card">
    <?php if (empty($leads)): ?>
        <div style="padding: 60px 24px; text-align: center;">
            <div style="width:64px;height:64px;border-radius:50%;background:var(--adm-lime);display:inline-flex;align-items:center;justify-content:center;font-size:1.7rem;margin-bottom:14px;"><i class="bi bi-inbox"></i></div>
            <h3 style="font-size:1.1rem;font-weight:600;margin:0 0 6px;">No leads recorded yet</h3>
            <p style="font-size:.9rem;color:#777;margin:0;">Whenever visitors submit a proposal or consultation form, they will appear here instantly.</p>
        </div>
    <?php else: ?>
        <!-- Desktop Table -->
        <div class="table-responsive ld-desktop">
            <table class="ld-table" id="leadsTable">
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
                            $l['name'] ?? '', $l['email'] ?? '', $l['phone'] ?? '',
                            $l['company'] ?? '', $l['service'] ?? '', $l['message'] ?? ''
                        ]));
                    ?>
                        <tr class="lead-row" data-search="<?= e($searchText) ?>">
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="ld-av"><?= e($initial((string) $l['name'])) ?></div>
                                    <div>
                                        <div style="font-weight:600;"><?= e($l['name']) ?></div>
                                        <?php if (!empty($l['company'])): ?>
                                            <div style="font-size:.78rem;color:#888;"><?= e($l['company']) ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div><a href="mailto:<?= e($l['email']) ?>" style="color:#1c1c1c;text-decoration:none;font-weight:500;"><?= e($l['email']) ?></a></div>
                                <?php if (!empty($l['phone'])): ?>
                                    <div style="margin-top:4px;"><a href="tel:<?= e($l['phone']) ?>" style="color:#777;text-decoration:none;font-size:.82rem;"><i class="bi bi-telephone me-1"></i><?= e($l['phone']) ?></a></div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if (!empty($l['service'])): ?>
                                    <span class="ld-tag"><?= e($l['service']) ?></span>
                                <?php else: ?>
                                    <span style="color:#aaa;">General</span>
                                <?php endif; ?>
                                <?php if (!empty($l['budget'])): ?>
                                    <div style="font-size:.76rem;color:#0a8a5a;font-weight:600;margin-top:5px;">Budget: <?= e($l['budget']) ?></div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div style="max-width:280px;font-size:.84rem;color:#555;line-height:1.5;display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden;">
                                    <?= !empty($l['message']) ? e($l['message']) : '<span style="color:#aaa">—</span>' ?>
                                </div>
                            </td>
                            <td style="white-space:nowrap;color:#777;font-size:.82rem;"><?= formatDatabaseDateTime((string) $l['created_at']) ?></td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="mailto:<?= e($l['email']) ?>" class="ld-icon" title="Send Email"><i class="bi bi-envelope"></i></a>
                                    <?php if (!empty($l['phone'])): ?>
                                        <a href="tel:<?= e($l['phone']) ?>" class="ld-icon" title="Call"><i class="bi bi-telephone"></i></a>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Mobile Stacked Card View -->
        <div class="ld-mobile" id="leadsMobileList">
            <?php foreach ($leads as $l):
                $searchText = strtolower(implode(' ', [
                    $l['name'] ?? '', $l['email'] ?? '', $l['phone'] ?? '',
                    $l['company'] ?? '', $l['service'] ?? '', $l['message'] ?? ''
                ]));
            ?>
                <div class="ld-mcard lead-card-mobile" data-search="<?= e($searchText) ?>">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="d-flex gap-2 align-items-center">
                            <div class="ld-av"><?= e($initial((string) $l['name'])) ?></div>
                            <div>
                                <div style="font-weight:600;"><?= e($l['name']) ?></div>
                                <div style="font-size:.76rem;color:#888;"><?= formatDatabaseDateTime((string) $l['created_at']) ?></div>
                            </div>
                        </div>
                        <?php if (!empty($l['service'])): ?><span class="ld-tag"><?= e($l['service']) ?></span><?php endif; ?>
                    </div>

                    <div style="font-size:.86rem;margin-bottom:8px;">
                        <a href="mailto:<?= e($l['email']) ?>" style="color:#0E0E0E;text-decoration:none;font-weight:500;"><i class="bi bi-envelope me-1"></i><?= e($l['email']) ?></a>
                    </div>
                    <?php if (!empty($l['phone'])): ?>
                        <div style="font-size:.86rem;margin-bottom:10px;">
                            <a href="tel:<?= e($l['phone']) ?>" style="color:#555;text-decoration:none;"><i class="bi bi-telephone me-1"></i><?= e($l['phone']) ?></a>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($l['message'])): ?>
                        <div style="background:#F6F6F6;border-radius:12px;padding:10px 12px;font-size:.84rem;color:#555;margin-top:8px;"><?= e($l['message']) ?></div>
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
        document.querySelectorAll('.lead-row').forEach(row => {
            row.style.display = (row.getAttribute('data-search') || '').includes(query) ? '' : 'none';
        });
        document.querySelectorAll('.lead-card-mobile').forEach(card => {
            card.style.display = (card.getAttribute('data-search') || '').includes(query) ? '' : 'none';
        });
    });
})();
</script>

<?php require_once __DIR__ . '/templates/footer.php'; ?>