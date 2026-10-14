<?php
require_once __DIR__ . '/../config.php';
ensureAdmin();

$leads = db()->query('SELECT * FROM leads ORDER BY created_at DESC')->fetchAll();

$initial = static function (string $name): string {
    $name = trim($name);
    if ($name === '') return '?';
    return function_exists('mb_strtoupper') ? mb_strtoupper(mb_substr($name, 0, 1)) : strtoupper(substr($name, 0, 1));
};
$searchText = static function (array $lead): string {
    $text = implode(' ', [$lead['name'] ?? '', $lead['email'] ?? '', $lead['company'] ?? '', $lead['service'] ?? '', $lead['budget'] ?? '', $lead['message'] ?? '']);
    return function_exists('mb_strtolower') ? mb_strtolower($text) : strtolower($text);
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

    .leads-shell {
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
    .leads-shell .btn { font-weight: 600; }
    .leads-shell .btn-primary {
        --bs-btn-bg: var(--brand);
        --bs-btn-border-color: var(--brand);
        --bs-btn-hover-bg: var(--brand-deep);
        --bs-btn-hover-border-color: var(--brand-deep);
        --bs-btn-active-bg: var(--brand-deep);
        --bs-btn-active-border-color: var(--brand-deep);
        --bs-btn-focus-shadow-rgb: 196, 0, 122;
    }
    .leads-shell .form-control:focus { border-color: #e0398f; box-shadow: 0 0 0 .22rem rgba(196, 0, 122, .14); }

    /* header ke global h1 size override */
    .leads-shell .leads-title { font-size: 1.6rem !important; line-height: 1.25 !important; font-weight: 800 !important; letter-spacing: -.02em !important; margin: 0 !important; }

    .leads-card { background: #fff; border: 1px solid rgba(36, 26, 38, .07); border-radius: 1rem; box-shadow: 0 8px 24px rgba(35, 19, 32, .05); }

    .leads-table { --bs-table-bg: transparent; margin: 0; }
    .leads-table thead th { font-size: .74rem; font-weight: 700; color: #8a8391; text-transform: uppercase; letter-spacing: .06em; padding: .75rem 1rem; background: #fcfaf9; white-space: nowrap; border-bottom-width: 1px; }
    .leads-table tbody td { padding: .9rem 1rem; vertical-align: top; font-size: .88rem; border-color: #f1ecef; }
    .leads-table tbody tr:hover { background: #fffafd; }
    .leads-msg { max-width: 300px; color: #5d5764; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; overflow-wrap: anywhere; }
    .leads-email { color: #6c6672; overflow-wrap: anywhere; }

    .leads-avatar { width: 38px; height: 38px; flex: none; display: grid; place-items: center; border-radius: 50%; background: var(--brand-soft); color: var(--brand-deep); font-weight: 700; font-size: .9rem; }
    .leads-pill { background: var(--brand-soft); color: var(--brand-deep); font-weight: 600; }
    .leads-pill-neutral { background: #f4f1f5; color: #5d5764; font-weight: 600; }

    .leads-item { padding: 1rem; }
    .leads-item .leads-msg { max-width: none; font-size: .86rem; margin-top: .6rem; padding: .6rem .75rem; background: #faf7f9; border-radius: .6rem; }

    @media (max-width: 767.98px) {
        .leads-shell { padding: 1.25rem 0 2.5rem; }
        .leads-shell .leads-title { font-size: 1.35rem !important; }
        .leads-back { width: 100%; }
    }
</style>

<div class="leads-shell">
    <div class="container-xxl px-3 px-lg-4">

        <!-- Head -->
        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
            <div>
                <h1 class="leads-title">All Leads</h1>
                <p class="text-body-secondary mb-0 mt-1">All enquiries received from the WebTecMart website.</p>
            </div>
            <a href="/admin/dashboard.php" class="btn btn-primary px-3 leads-back"><i class="bi bi-arrow-left me-2"></i>Back to Dashboard</a>
        </div>

        <section class="leads-card overflow-hidden" aria-label="Leads">

            <!-- Toolbar -->
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 px-3 px-md-4 py-3 border-bottom bg-body-tertiary bg-opacity-50">
                <div class="flex-grow-1" style="max-width:380px">
                    <label class="visually-hidden" for="leadsSearch">Search leads</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="bi bi-search text-body-secondary"></i></span>
                        <input id="leadsSearch" type="search" class="form-control border-start-0" placeholder="Search name, email, service…" autocomplete="off">
                    </div>
                </div>
                <span class="badge rounded-pill text-bg-light border fw-semibold px-3 py-2" id="leadsCount"><?= count($leads) ?> lead<?= count($leads) === 1 ? '' : 's' ?></span>
            </div>

            <?php if (empty($leads)): ?>
                <div class="text-center py-5 px-3">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-4 mb-3" style="width:56px;height:56px;background:var(--brand-soft);color:var(--brand);font-size:1.5rem">
                        <i class="bi bi-inbox"></i>
                    </div>
                    <h2 class="h6 fw-bold mb-1">No leads yet</h2>
                    <p class="text-body-secondary small mb-0">New enquiries from the website will show up here.</p>
                </div>
            <?php else: ?>

                <!-- Desktop / tablet: table -->
                <div class="table-responsive d-none d-lg-block">
                    <table class="table leads-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Company</th>
                                <th>Service</th>
                                <th>Budget</th>
                                <th>Message</th>
                                <th>Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($leads as $lead): ?>
                                <tr data-lead data-search="<?= e($searchText($lead)) ?>">
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="leads-avatar"><?= e($initial((string) $lead['name'])) ?></span>
                                            <span class="fw-semibold"><?= e($lead['name']) ?></span>
                                        </div>
                                    </td>
                                    <td><a class="leads-email" href="mailto:<?= e($lead['email']) ?>"><?= e($lead['email']) ?></a></td>
                                    <td><?= !empty($lead['company']) ? e($lead['company']) : '<span class="text-body-secondary">—</span>' ?></td>
                                    <td><?= !empty($lead['service']) ? '<span class="badge rounded-pill leads-pill">' . e($lead['service']) . '</span>' : '<span class="text-body-secondary">—</span>' ?></td>
                                    <td><?= !empty($lead['budget']) ? '<span class="badge rounded-pill leads-pill-neutral">' . e($lead['budget']) . '</span>' : '<span class="text-body-secondary">—</span>' ?></td>
                                    <td><div class="leads-msg" title="<?= e($lead['message']) ?>"><?= !empty($lead['message']) ? e($lead['message']) : '—' ?></div></td>
                                    <td class="text-body-secondary text-nowrap"><?= e(date('d M Y', strtotime($lead['created_at']))) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Mobile / small tablet: cards -->
                <div class="list-group list-group-flush d-lg-none">
                    <?php foreach ($leads as $lead): ?>
                        <article class="list-group-item leads-item" data-lead data-search="<?= e($searchText($lead)) ?>">
                            <div class="d-flex align-items-start gap-3">
                                <span class="leads-avatar"><?= e($initial((string) $lead['name'])) ?></span>
                                <div class="flex-grow-1" style="min-width:0">
                                    <div class="d-flex justify-content-between align-items-start gap-2">
                                        <span class="fw-bold"><?= e($lead['name']) ?></span>
                                        <span class="small text-body-secondary text-nowrap"><?= e(date('d M Y', strtotime($lead['created_at']))) ?></span>
                                    </div>
                                    <a class="small leads-email d-block" href="mailto:<?= e($lead['email']) ?>"><?= e($lead['email']) ?></a>
                                    <?php if (!empty($lead['company'])): ?>
                                        <div class="small text-body-secondary mt-1"><i class="bi bi-building me-1"></i><?= e($lead['company']) ?></div>
                                    <?php endif; ?>
                                    <div class="d-flex flex-wrap gap-2 mt-2">
                                        <?php if (!empty($lead['service'])): ?><span class="badge rounded-pill leads-pill"><?= e($lead['service']) ?></span><?php endif; ?>
                                        <?php if (!empty($lead['budget'])): ?><span class="badge rounded-pill leads-pill-neutral"><i class="bi bi-currency-rupee"></i><?= e($lead['budget']) ?></span><?php endif; ?>
                                    </div>
                                    <?php if (!empty($lead['message'])): ?>
                                        <div class="leads-msg"><?= e($lead['message']) ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>

                <div class="text-center py-5 px-3" id="leadsNoMatch" hidden>
                    <h2 class="h6 fw-bold mb-1">No matching leads</h2>
                    <p class="text-body-secondary small mb-0">Try a different search term.</p>
                </div>
            <?php endif; ?>
        </section>
    </div>
</div>

<script>
(() => {
    const input = document.getElementById('leadsSearch');
    const rows = document.querySelectorAll('[data-lead]');
    const count = document.getElementById('leadsCount');
    const noMatch = document.getElementById('leadsNoMatch');
    if (!input || !rows.length) return;

    const total = rows.length / 2; // table + cards dono me same lead hai
    input.addEventListener('input', () => {
        const q = input.value.trim().toLowerCase();
        let visible = 0;
        rows.forEach(row => {
            const show = q === '' || (row.dataset.search || '').includes(q);
            row.hidden = !show;
            if (show) visible++;
        });
        const shown = Math.round(visible / 2);
        count.textContent = (q === '' ? total : shown) + ' lead' + ((q === '' ? total : shown) === 1 ? '' : 's');
        if (noMatch) noMatch.hidden = shown !== 0 || q === '';
    });
})();
</script>

<?php require_once __DIR__ . '/templates/footer.php'; ?>