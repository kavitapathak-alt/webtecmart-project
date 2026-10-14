<?php
require_once __DIR__ . '/../functions.php';
ensureAdmin();

$leadCount = db()->query('SELECT COUNT(*) as total FROM leads')->fetch()['total'];
$contactCount = db()->query('SELECT COUNT(*) as total FROM contacts')->fetch()['total'];
$recentLeads = latestLeads();

$adminName = $_SESSION['admin_name'] ?? 'Admin';
$initial = static function (string $name): string {
    $name = trim($name);
    if ($name === '') return '?';
    return function_exists('mb_strtoupper') ? mb_strtoupper(mb_substr($name, 0, 1)) : strtoupper(substr($name, 0, 1));
};

require_once __DIR__ . '/templates/header.php';
?>
<!-- Bootstrap 5 + Icons + Font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>
    a { text-decoration: none; }

    .dash-shell {
        --brand: #C4007A;
        --brand-deep: #A3005F;
        --brand-soft: #FCE8F3;

        --bs-primary: var(--brand);
        --bs-primary-rgb: 196, 0, 122;
        --bs-link-color: var(--brand);
        --bs-link-hover-color: var(--brand-deep);
        --bs-body-font-family: 'Plus Jakarta Sans', system-ui, -apple-system, 'Segoe UI', Arial, sans-serif;

        font-family: var(--bs-body-font-family);
        letter-spacing: normal;
        background: #FBF8F1;
        color: #1f1b24;
        min-height: calc(100vh - 72px);
        padding: 2rem 0 3.5rem;
    }
    .dash-shell .btn { font-weight: 600; }
    .dash-shell .btn-primary {
        --bs-btn-bg: var(--brand);
        --bs-btn-border-color: var(--brand);
        --bs-btn-hover-bg: var(--brand-deep);
        --bs-btn-hover-border-color: var(--brand-deep);
        --bs-btn-active-bg: var(--brand-deep);
        --bs-btn-active-border-color: var(--brand-deep);
        --bs-btn-focus-shadow-rgb: 196, 0, 122;
    }
    .dash-shell .btn-outline-brand {
        --bs-btn-color: var(--brand-deep);
        --bs-btn-border-color: #f1c6dc;
        --bs-btn-bg: #fff;
        --bs-btn-hover-color: var(--brand-deep);
        --bs-btn-hover-bg: var(--brand-soft);
        --bs-btn-hover-border-color: #e9a9c9;
        --bs-btn-active-color: var(--brand-deep);
        --bs-btn-active-bg: var(--brand-soft);
        --bs-btn-active-border-color: #e9a9c9;
        --bs-btn-focus-shadow-rgb: 196, 0, 122;
    }

    /* header ke global h1/h2 size override */
    .dash-shell .dash-title { font-size: 1.6rem !important; line-height: 1.25 !important; font-weight: 800 !important; letter-spacing: -.02em !important; margin: 0 !important; }
    .dash-shell .dash-h2 { font-size: 1.05rem !important; line-height: 1.3 !important; font-weight: 700 !important; letter-spacing: 0 !important; margin: 0 !important; }

    .dash-card { background: #fff; border: 1px solid rgba(36, 26, 38, .07); border-radius: 1rem; box-shadow: 0 8px 24px rgba(35, 19, 32, .05); }

    /* Stat cards */
    .dash-stat { padding: 1.25rem; display: flex; align-items: center; gap: 1rem; height: 100%; }
    .dash-stat-ico { width: 48px; height: 48px; flex: none; display: grid; place-items: center; border-radius: .85rem; background: var(--brand-soft); color: var(--brand); font-size: 1.35rem; }
    .dash-stat-label { font-size: .82rem; color: #756f7c; font-weight: 500; }
    .dash-stat-value { font-size: 1.6rem; font-weight: 800; line-height: 1.15; color: #1f1b24; letter-spacing: -.02em; }

    /* Leads */
    .dash-table { --bs-table-bg: transparent; margin: 0; }
    .dash-table thead th { font-size: .74rem; font-weight: 700; color: #8a8391; text-transform: uppercase; letter-spacing: .06em; border-bottom-width: 1px; padding: .75rem 1.25rem; background: #fcfaf9; white-space: nowrap; }
    .dash-table tbody td { padding: .9rem 1.25rem; vertical-align: middle; font-size: .9rem; border-color: #f1ecef; }
    .dash-table tbody tr:hover { background: #fffafd; }
    .dash-avatar { width: 38px; height: 38px; flex: none; display: grid; place-items: center; border-radius: 50%; background: var(--brand-soft); color: var(--brand-deep); font-weight: 700; font-size: .9rem; }
    .dash-lead-item { padding: .9rem 1rem; }
    .dash-email { color: #6c6672; overflow-wrap: anywhere; }

    @media (max-width: 767.98px) {
        .dash-shell { padding: 1.25rem 0 2.5rem; }
        .dash-shell .dash-title { font-size: 1.35rem !important; }
        .dash-stat { padding: 1rem; }
        .dash-stat-ico { width: 42px; height: 42px; font-size: 1.15rem; }
        .dash-stat-value { font-size: 1.4rem; }
        .dash-actions { display: grid !important; grid-template-columns: 1fr 1fr; width: 100%; }
        .dash-actions .btn-primary { grid-column: 1 / -1; }
    }
</style>

<div class="dash-shell">
    <div class="container-xxl px-3 px-lg-4">

        <!-- Head -->
        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
            <div>
                <h1 class="dash-title">Admin Dashboard</h1>
                <p class="text-body-secondary mb-0 mt-1">Welcome back, <?= e($adminName) ?>.</p>
            </div>
            <div class="dash-actions d-flex flex-wrap gap-2">
                <a href="/admin/leads.php" class="btn btn-primary px-3"><i class="bi bi-people me-2"></i>View Leads</a>
                <a href="/admin/content.php" class="btn btn-outline-brand px-3"><i class="bi bi-pencil-square me-2"></i>Manage Content</a>
                <a href="/admin/logout.php" class="btn btn-outline-brand px-3"><i class="bi bi-box-arrow-right me-2"></i>Logout</a>
            </div>
        </div>

        <!-- Stats -->
        <div class="row g-3 g-lg-4 mb-4">
            <div class="col-12 col-md-4">
                <div class="dash-card dash-stat">
                    <span class="dash-stat-ico"><i class="bi bi-person-lines-fill"></i></span>
                    <div>
                        <div class="dash-stat-label">Total Leads</div>
                        <div class="dash-stat-value"><?= (int) $leadCount ?></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="dash-card dash-stat">
                    <span class="dash-stat-ico"><i class="bi bi-chat-dots"></i></span>
                    <div>
                        <div class="dash-stat-label">Messages</div>
                        <div class="dash-stat-value"><?= (int) $contactCount ?></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="dash-card dash-stat">
                    <span class="dash-stat-ico"><i class="bi bi-calendar3"></i></span>
                    <div>
                        <div class="dash-stat-label">Last Update</div>
                        <div class="dash-stat-value"><?= date('d M Y') ?></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent leads -->
        <section class="dash-card overflow-hidden" aria-labelledby="recentLeadsTitle">
            <div class="d-flex align-items-center justify-content-between gap-3 px-3 px-md-4 py-3 border-bottom">
                <h2 class="dash-h2" id="recentLeadsTitle">Recent Leads</h2>
                <a href="/admin/leads.php" class="fw-semibold small">View all <i class="bi bi-arrow-right ms-1"></i></a>
            </div>

            <?php if (empty($recentLeads)): ?>
                <div class="text-center py-5 px-3">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-4 mb-3" style="width:56px;height:56px;background:var(--brand-soft);color:var(--brand);font-size:1.5rem">
                        <i class="bi bi-inbox"></i>
                    </div>
                    <h3 class="h6 fw-bold mb-1">No leads yet</h3>
                    <p class="text-body-secondary small mb-0">New enquiries from the website will show up here.</p>
                </div>
            <?php else: ?>

                <!-- Desktop / tablet: table -->
                <div class="table-responsive d-none d-md-block">
                    <table class="table dash-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Service</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($recentLeads as $lead): ?>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <span class="dash-avatar"><?= e($initial((string) $lead['name'])) ?></span>
                                            <span class="fw-semibold"><?= e($lead['name']) ?></span>
                                        </div>
                                    </td>
                                    <td><a class="dash-email" href="mailto:<?= e($lead['email']) ?>"><?= e($lead['email']) ?></a></td>
                                    <td>
                                        <?php if (!empty($lead['service'])): ?>
                                            <span class="badge rounded-pill" style="background:var(--brand-soft);color:var(--brand-deep)"><?= e($lead['service']) ?></span>
                                        <?php else: ?>
                                            <span class="text-body-secondary">—</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-body-secondary text-nowrap"><?= e(date('d M Y', strtotime($lead['created_at']))) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Mobile: cards -->
                <div class="list-group list-group-flush d-md-none">
                    <?php foreach ($recentLeads as $lead): ?>
                        <div class="list-group-item dash-lead-item">
                            <div class="d-flex align-items-start gap-3">
                                <span class="dash-avatar"><?= e($initial((string) $lead['name'])) ?></span>
                                <div class="flex-grow-1" style="min-width:0">
                                    <div class="d-flex justify-content-between align-items-start gap-2">
                                        <span class="fw-bold"><?= e($lead['name']) ?></span>
                                        <span class="small text-body-secondary text-nowrap"><?= e(date('d M Y', strtotime($lead['created_at']))) ?></span>
                                    </div>
                                    <a class="small dash-email d-block" href="mailto:<?= e($lead['email']) ?>"><?= e($lead['email']) ?></a>
                                    <?php if (!empty($lead['service'])): ?>
                                        <span class="badge rounded-pill mt-2" style="background:var(--brand-soft);color:var(--brand-deep)"><?= e($lead['service']) ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </section>
    </div>
</div>

<?php require_once __DIR__ . '/templates/footer.php'; ?>