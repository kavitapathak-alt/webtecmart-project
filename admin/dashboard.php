<?php
require_once __DIR__ . '/../functions.php';
ensureAdmin();

// Real SQLite Statistics
$leadCount = (int) db()->query('SELECT COUNT(*) as total FROM leads')->fetch()['total'];
$contactCount = (int) db()->query('SELECT COUNT(*) as total FROM contacts')->fetch()['total'];

$serviceCount = (int) db()->query("SELECT COUNT(*) FROM content_items WHERE content_type = 'service_detail'")->fetchColumn();
$blogCount = (int) db()->query("SELECT COUNT(*) as total FROM content_items WHERE content_type = 'blog'")->fetch()['total'];
$partnerCount = (int) db()->query("SELECT COUNT(*) as total FROM content_items WHERE content_type = 'partner'")->fetch()['total'];
$totalContentItems = (int) db()->query('SELECT COUNT(*) as total FROM content_items')->fetch()['total'];

$recentLeads = latestLeads();

$adminName = $_SESSION['admin_name'] ?? 'Admin';
$initial = static function (string $name): string {
    $name = trim($name);
    if ($name === '') return '?';
    return function_exists('mb_strtoupper') ? mb_strtoupper(mb_substr($name, 0, 1)) : strtoupper(substr($name, 0, 1));
};

require_once __DIR__ . '/templates/header.php';
?>

<style>
    /* Dashboard specific overrides */
    .dash-greeting {
        margin-bottom: 28px;
    }
    .dash-greeting h1 {
        font-size: clamp(1.5rem, 2.5vw, 1.85rem) !important;
        font-weight: 800 !important;
        color: #0F172A;
        letter-spacing: -0.02em;
        margin: 0 0 6px !important;
    }
    .dash-greeting p {
        font-size: 0.95rem !important;
        color: #64748B;
        margin: 0 !important;
    }

    /* Stat Cards */
    .dash-stat-grid {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        gap: 20px;
        margin-bottom: 32px;
    }
    @media (min-width: 640px) {
        .dash-stat-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (min-width: 1100px) {
        .dash-stat-grid { grid-template-columns: repeat(4, 1fr); }
    }

    .adm-card {
        background: #FFFFFF;
        border: 1px solid #E2E8F0;
        border-radius: 16px;
        padding: 24px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.03);
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }
    .adm-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 24px -4px rgba(0, 0, 0, 0.06);
    }

    .dash-stat-card {
        display: flex;
        align-items: center;
        gap: 18px;
    }
    .dash-stat-icon {
        width: 52px;
        height: 52px;
        border-radius: 14px;
        display: grid;
        place-items: center;
        font-size: 1.4rem;
        flex-shrink: 0;
    }
    .dash-stat-icon.pink { background: #FFF0F7; color: #C4007A; }
    .dash-stat-icon.blue { background: #EFF6FF; color: #2563EB; }
    .dash-stat-icon.green { background: #ECFDF5; color: #059669; }
    .dash-stat-icon.amber { background: #FFFBEB; color: #D97706; }

    .dash-stat-info .num {
        font-size: 1.75rem;
        font-weight: 800;
        color: #0F172A;
        line-height: 1.15;
        letter-spacing: -0.02em;
    }
    .dash-stat-info .label {
        font-size: 0.825rem;
        font-weight: 600;
        color: #64748B;
        margin-top: 2px;
    }

    /* Quick Actions */
    .dash-quick-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-bottom: 32px;
    }
    .dash-action-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 18px;
        border-radius: 12px;
        background: #FFFFFF;
        border: 1.5px solid #E2E8F0;
        color: #1E293B;
        font-size: 0.875rem;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.2s ease;
    }
    .dash-action-btn i { font-size: 1.05rem; color: #C4007A; }
    .dash-action-btn:hover {
        background: #FFF0F7;
        border-color: #F1C6DC;
        color: #C4007A;
        transform: translateY(-1px);
    }
    .dash-action-btn.primary {
        background: #C4007A;
        color: #FFFFFF !important;
        border-color: #C4007A;
        box-shadow: 0 4px 14px rgba(196, 0, 122, 0.25);
    }
    .dash-action-btn.primary i { color: #FFFFFF; }
    .dash-action-btn.primary:hover {
        background: #A3005F;
        border-color: #A3005F;
    }

    /* Leads Table Card */
    .dash-table-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 20px 24px;
        border-bottom: 1px solid #E2E8F0;
    }
    .dash-table-head h2 {
        font-size: 1.15rem !important;
        font-weight: 800 !important;
        color: #0F172A;
        margin: 0 !important;
    }
    .dash-table-head a {
        font-size: 0.85rem;
        font-weight: 700;
        color: #C4007A;
        text-decoration: none;
    }
    .dash-table-head a:hover { text-decoration: underline; }

    .adm-table {
        width: 100%;
        border-collapse: collapse;
    }
    .adm-table th {
        background: #F8FAFC;
        padding: 12px 24px;
        font-size: 0.72rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        color: #64748B;
        text-align: left;
        border-bottom: 1px solid #E2E8F0;
    }
    .adm-table td {
        padding: 16px 24px;
        font-size: 0.88rem;
        color: #1E293B;
        border-bottom: 1px solid #F1F5F9;
        vertical-align: middle;
    }
    .adm-table tr:last-child td { border-bottom: none; }
    .adm-table tr:hover td { background: #FAFAFA; }

    .lead-avatar-cell {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .lead-avatar-circle {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: #FCE8F3;
        color: #C4007A;
        font-weight: 800;
        font-size: 0.9rem;
        display: grid;
        place-items: center;
        flex-shrink: 0;
    }
    .lead-badge-service {
        display: inline-flex;
        align-items: center;
        padding: 4px 10px;
        border-radius: 9999px;
        background: #FFF0F7;
        color: #C4007A;
        font-size: 0.76rem;
        font-weight: 700;
    }
</style>

<div class="dash-greeting">
    <h1>Welcome back, <?= e($adminName) ?></h1>
    <p>Here's what is happening across your WebTecMart website today.</p>
</div>

<!-- 4 Real Data Metric Cards -->
<div class="dash-stat-grid">
    <div class="adm-card dash-stat-card">
        <div class="dash-stat-icon pink">
            <i class="bi bi-people-fill"></i>
        </div>
        <div class="dash-stat-info">
            <div class="num"><?= $leadCount ?></div>
            <div class="label">Total Leads Received</div>
        </div>
    </div>

    <div class="adm-card dash-stat-card">
        <div class="dash-stat-icon blue">
            <i class="bi bi-briefcase-fill"></i>
        </div>
        <div class="dash-stat-info">
            <div class="num"><?= $serviceCount ?></div>
            <div class="label">Live Service Pages</div>
        </div>
    </div>

    <div class="adm-card dash-stat-card">
        <div class="dash-stat-icon green">
            <i class="bi bi-journal-check"></i>
        </div>
        <div class="dash-stat-info">
            <div class="num"><?= $blogCount ?></div>
            <div class="label">Published Blog Posts</div>
        </div>
    </div>

    <div class="adm-card dash-stat-card">
        <div class="dash-stat-icon amber">
            <i class="bi bi-database-fill-check"></i>
        </div>
        <div class="dash-stat-info">
            <div class="num"><?= $totalContentItems ?></div>
            <div class="label">CMS Content Records</div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="dash-quick-actions">
    <a href="/admin/services.php" class="dash-action-btn primary">
        <i class="bi bi-briefcase-fill"></i> Manage Services CMS (<?= $serviceCount ?>)
    </a>
    <a href="/admin/content.php?section=collection:blog" class="dash-action-btn">
        <i class="bi bi-journal-check"></i> Blog Articles
    </a>
    <a href="/admin/content.php?section=collection:hero_content" class="dash-action-btn">
        <i class="bi bi-lightning-charge"></i> Edit Homepage Hero
    </a>
    <a href="/admin/content.php?section=collection:service" class="dash-action-btn">
        <i class="bi bi-boxes"></i> Edit Core Services
    </a>
    <a href="/admin/leads.php" class="dash-action-btn">
        <i class="bi bi-inbox-fill"></i> View All Inquiries (<?= $leadCount ?>)
    </a>
    <a href="/" target="_blank" class="dash-action-btn">
        <i class="bi bi-box-arrow-up-right"></i> Open Public Website
    </a>
</div>

<!-- Recent Leads Table -->
<div class="adm-card p-0 overflow-hidden mb-4">
    <div class="dash-table-head">
        <h2>Recent Website Leads &amp; Consultations</h2>
        <a href="/admin/leads.php">View All Leads <i class="bi bi-arrow-right"></i></a>
    </div>

    <?php if (empty($recentLeads)): ?>
        <div style="padding: 48px 24px; text-align: center;">
            <div style="width: 56px; height: 56px; border-radius: 16px; background: #FFF0F7; color: #C4007A; display: inline-flex; align-items: center; justify-content: center; font-size: 1.5rem; margin-bottom: 12px;">
                <i class="bi bi-inbox"></i>
            </div>
            <h4 style="font-size: 1rem; font-weight: 700; color: #0F172A; margin: 0 0 4px;">No inquiries logged yet</h4>
            <p style="font-size: 0.85rem; color: #64748B; margin: 0;">New consultation requests submitted from the website forms will appear here.</p>
        </div>
    <?php else: ?>
        <div style="overflow-x: auto;">
            <table class="adm-table">
                <thead>
                    <tr>
                        <th>Client / Company</th>
                        <th>Contact Email</th>
                        <th>Phone Number</th>
                        <th>Requested Service</th>
                        <th>Received On</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($recentLeads as $lead): ?>
                        <tr>
                            <td>
                                <div class="lead-avatar-cell">
                                    <div class="lead-avatar-circle"><?= e($initial((string) $lead['name'])) ?></div>
                                    <div>
                                        <div style="font-weight: 700; color: #0F172A;"><?= e($lead['name']) ?></div>
                                        <?php if (!empty($lead['company'])): ?>
                                            <div style="font-size: 0.76rem; color: #64748B;"><?= e($lead['company']) ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="mailto:<?= e($lead['email']) ?>" style="color: #475569; text-decoration: none; font-weight: 500;">
                                    <i class="bi bi-envelope me-1 text-muted"></i><?= e($lead['email']) ?>
                                </a>
                            </td>
                            <td>
                                <?php if (!empty($lead['phone'])): ?>
                                    <a href="tel:<?= e($lead['phone']) ?>" style="color: #475569; text-decoration: none; font-weight: 500;">
                                        <i class="bi bi-telephone me-1 text-muted"></i><?= e($lead['phone']) ?>
                                    </a>
                                <?php else: ?>
                                    <span style="color: #94A3B8;">—</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if (!empty($lead['service'])): ?>
                                    <span class="lead-badge-service"><?= e($lead['service']) ?></span>
                                <?php else: ?>
                                    <span style="color: #94A3B8;">General Inquiry</span>
                                <?php endif; ?>
                            </td>
                            <td style="color: #64748B; font-size: 0.825rem; white-space: nowrap;">
                                <?= date('d M Y, h:i A', strtotime($lead['created_at'])) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/templates/footer.php'; ?>
