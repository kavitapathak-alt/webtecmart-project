<?php
$adminPage = basename($_SERVER['PHP_SELF'] ?? '');
$isLoggedIn = !empty($_SESSION['admin_logged_in']);
$adminName = $_SESSION['admin_name'] ?? 'Admin';
$adminEmail = $_SESSION['admin_email'] ?? 'admin@webtecmart.com';
$currentSection = $_GET['section'] ?? '';

$totalLeadsCount = 0;
$contentTypes = [];
if ($isLoggedIn && function_exists('db')) {
    try {
        $totalLeadsCount = (int) db()->query('SELECT COUNT(*) FROM leads')->fetchColumn();
    } catch (\Throwable $e) { $totalLeadsCount = 0; }

    // Every content type in your DB (hero, about, testimonial, blog, partner...) becomes a sidebar link automatically
    try {
        $contentTypes = db()->query("SELECT content_type, COUNT(*) AS c FROM content_items WHERE content_type IS NOT NULL AND content_type != '' AND content_type != 'service_detail' GROUP BY content_type ORDER BY content_type")->fetchAll();
    } catch (\Throwable $e) { $contentTypes = []; }
}

$typeIcons = [
    'hero' => 'bi-stars', 'about' => 'bi-info-circle', 'testimonial' => 'bi-chat-quote',
    'testimonials' => 'bi-chat-quote', 'blog' => 'bi-journal-text', 'partner' => 'bi-people',
    'faq' => 'bi-question-circle', 'team' => 'bi-person-badge', 'client' => 'bi-building',
    'portfolio' => 'bi-images', 'case_study' => 'bi-bar-chart', 'stat' => 'bi-speedometer2',
];

$pageTitles = [
    'dashboard.php' => 'Dashboard Overview',
    'content.php'   => 'Website Content Manager',
    'leads.php'     => 'Leads & Enquiries',
    'services.php'  => 'Services CMS & Page Engine',
    'login.php'     => 'Admin Sign In',
];
$currentPageTitle = $pageTitles[$adminPage] ?? 'Admin Portal';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($currentPageTitle) ?> | WebTecMart Admin</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --adm-sidebar-w: 250px;
            --adm-bg: #E9ECEB;
            --adm-surface: #FFFFFF;
            --adm-ink: #0E0E0E;
            --adm-border: #E6E6E6;
            --adm-muted: #8A8A8A;
            --adm-lime: #E6F73A;
            --adm-yellow: #F4F33C;
            --adm-red: #FF4B33;
            --adm-blue: #7C9BE8;
            --adm-font: 'Space Grotesk', system-ui, -apple-system, sans-serif;
        }
        *, *::before, *::after { box-sizing: border-box; }
        body { margin: 0; background: var(--adm-bg); color: var(--adm-ink); font-family: var(--adm-font); -webkit-font-smoothing: antialiased; min-height: 100vh; }

        .adm-layout { display: flex; min-height: 100vh; width: 100%; }

        /* ===== Floating dark sidebar ===== */
        .adm-sidebar {
            width: var(--adm-sidebar-w); background: var(--adm-ink); color: #fff;
            position: fixed; top: 16px; bottom: 16px; left: 16px; border-radius: 28px;
            display: flex; flex-direction: column; z-index: 1040; overflow-y: auto;
            transition: transform .3s cubic-bezier(.16,1,.3,1);
        }
        .adm-sidebar::-webkit-scrollbar { width: 0; }
        .adm-sidebar-brand { display: flex; align-items: center; gap: 12px; padding: 24px 24px 12px; text-decoration: none; color: #fff; }
        .adm-sidebar-logo { width: 34px; height: 34px; border-radius: 50%; background: var(--adm-lime); color: var(--adm-ink); display: grid; place-items: center; font-weight: 700; }
        .adm-sidebar-title { font-size: 1.25rem; font-weight: 700; letter-spacing: -.02em; }

        .adm-nav-section { padding: 14px 14px 4px; }
        .adm-nav-heading { font-size: .72rem; color: #6d6d6d; padding: 0 14px 8px; margin: 0; font-weight: 500; }
        .adm-nav-list { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 2px; }
        .adm-nav-link {
            display: flex; align-items: center; justify-content: space-between; gap: 10px;
            padding: 10px 14px; border-radius: 12px; color: #d4d4d4; font-size: .92rem; font-weight: 500;
            text-decoration: none; transition: background .2s, color .2s; position: relative;
        }
        .adm-nav-link > span { display: flex; align-items: center; gap: 14px; min-width: 0; }
        .adm-nav-link i { font-size: 1.1rem; color: #fff; }
        .adm-nav-link:hover { background: #1c1c1c; color: #fff; }
        .adm-nav-link.active { color: var(--adm-lime); }
        .adm-nav-link.active i { color: var(--adm-lime); }
        .adm-nav-link.active::before { content: ''; position: absolute; left: -2px; top: 50%; width: 6px; height: 6px; margin-top: -3px; border-radius: 50%; background: var(--adm-lime); }
        .adm-badge-count { background: #262626; color: #fff; font-size: .7rem; font-weight: 600; padding: 2px 8px; border-radius: 99px; }
        .adm-nav-link.active .adm-badge-count { background: var(--adm-lime); color: var(--adm-ink); }


        .adm-sidebar-user { margin-top: auto; padding: 14px 18px 18px; display: flex; align-items: center; gap: 12px; border-top: 1px solid #222; }
        .adm-user-avatar { width: 36px; height: 36px; border-radius: 50%; background: var(--adm-lime); color: var(--adm-ink); display: grid; place-items: center; font-weight: 700; flex-shrink: 0; }
        .adm-user-info { min-width: 0; flex-grow: 1; }
        .adm-user-name, .adm-user-email { margin: 0; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
        .adm-user-name { font-size: .85rem; font-weight: 600; }
        .adm-user-email { font-size: .72rem; color: #8a8a8a; }
        .adm-logout-btn { color: #8a8a8a; text-decoration: none; }
        .adm-logout-btn:hover { color: var(--adm-red); }

        /* ===== Main + pill top nav ===== */
        .adm-main { flex: 1; margin-left: calc(var(--adm-sidebar-w) + 32px); display: flex; flex-direction: column; min-width: 0; min-height: 100vh; }
        .adm-topbar { padding: 16px 32px 0 0; position: sticky; top: 0; z-index: 1020; }
        .adm-pill {
            background: #fff; border-radius: 999px; padding: 8px 10px; display: flex; align-items: center; justify-content: space-between; gap: 12px;
            box-shadow: 0 2px 12px rgba(0,0,0,.04);
        }
        .adm-toggle-btn { display: none; background: #fff; border: 1px solid var(--adm-border); border-radius: 50%; width: 40px; height: 40px; align-items: center; justify-content: center; cursor: pointer; font-size: 1.25rem; }
        .adm-pill-links { display: flex; gap: 4px; align-items: center; overflow-x: auto; }
        .adm-pill-links a { text-decoration: none; color: var(--adm-ink); font-size: .88rem; font-weight: 500; padding: 10px 22px; border-radius: 999px; white-space: nowrap; }
        .adm-pill-links a:hover { background: #f1f1f1; }
        .adm-pill-links a.active { background: var(--adm-ink); color: #fff; }
        .adm-pill-right { display: flex; align-items: center; gap: 10px; }
        .adm-icon-btn { width: 40px; height: 40px; border-radius: 50%; border: 1px solid var(--adm-border); background: #fff; display: grid; place-items: center; color: var(--adm-ink); text-decoration: none; position: relative; }
        .adm-icon-btn .dot { position: absolute; top: 9px; right: 10px; width: 8px; height: 8px; border-radius: 50%; background: var(--adm-red); border: 2px solid #fff; }
        .adm-pill-avatar { width: 40px; height: 40px; border-radius: 50%; background: var(--adm-lime); display: grid; place-items: center; font-weight: 700; }

        .adm-body { flex: 1; padding: 20px 32px 40px 0; width: 100%; }

        .adm-overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,.4); backdrop-filter: blur(4px); z-index: 1030; opacity: 0; transition: opacity .3s; }
        .adm-overlay.open { display: block; opacity: 1; }

        @media (max-width: 991.98px) {
            .adm-sidebar { transform: translateX(-120%); }
            .adm-sidebar.open { transform: translateX(0); }
            .adm-main { margin-left: 0; }
            .adm-toggle-btn { display: inline-flex; }
            .adm-topbar { padding: 12px 16px 0; }
            .adm-body { padding: 16px 16px 40px; }
        }
    </style>
</head>
<body>

<?php if ($isLoggedIn): ?>
<div class="adm-layout">
    <div class="adm-overlay" id="admOverlay"></div>

    <aside class="adm-sidebar" id="admSidebar">
        <a href="/admin/dashboard.php" class="adm-sidebar-brand">
            <span class="adm-sidebar-logo"><i class="bi bi-x-diamond-fill"></i></span>
            <span class="adm-sidebar-title">WebTecMart</span>
        </a>

        <div class="adm-nav-section">
            <ul class="adm-nav-list">
                <li><a href="/admin/dashboard.php" class="adm-nav-link <?= $adminPage === 'dashboard.php' ? 'active' : '' ?>"><span><i class="bi bi-house-door"></i> Dashboard</span></a></li>
                <li>
                    <a href="/admin/leads.php" class="adm-nav-link <?= $adminPage === 'leads.php' ? 'active' : '' ?>">
                        <span><i class="bi bi-inbox"></i> Leads & Inquiries</span>
                        <?php if ($totalLeadsCount > 0): ?><span class="adm-badge-count"><?= $totalLeadsCount ?></span><?php endif; ?>
                    </a>
                </li>
            </ul>
        </div>

        <div class="adm-nav-section">
            <p class="adm-nav-heading">Content</p>
            <ul class="adm-nav-list">
                <li><a href="/admin/services.php" class="adm-nav-link <?= $adminPage === 'services.php' ? 'active' : '' ?>"><span><i class="bi bi-briefcase"></i> Services CMS</span></a></li>
                <li><a href="/admin/content.php" class="adm-nav-link <?= $adminPage === 'content.php' && $currentSection === '' ? 'active' : '' ?>"><span><i class="bi bi-pencil-square"></i> All Content</span></a></li>
                <?php foreach ($contentTypes as $ct):
                    $type = (string) $ct['content_type'];
                    $label = ucwords(str_replace(['_', '-'], ' ', $type));
                    $icon = $typeIcons[strtolower($type)] ?? 'bi-file-earmark-text';
                    $sectionKey = 'collection:' . $type;
                    $isActive = $adminPage === 'content.php' && $currentSection === $sectionKey;
                ?>
                <li>
                    <a href="/admin/content.php?section=<?= urlencode($sectionKey) ?>" class="adm-nav-link <?= $isActive ? 'active' : '' ?>">
                        <span><i class="bi <?= e($icon) ?>"></i> <?= e($label) ?></span>
                        <span class="adm-badge-count"><?= (int) $ct['c'] ?></span>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="adm-nav-section">
            <p class="adm-nav-heading">Settings</p>
            <ul class="adm-nav-list">
                <li><a href="/" target="_blank" class="adm-nav-link"><span><i class="bi bi-globe"></i> Open Website</span></a></li>
            </ul>
        </div>


        <div class="adm-sidebar-user">
            <div class="adm-user-avatar"><?= strtoupper(substr(trim($adminName), 0, 1)) ?></div>
            <div class="adm-user-info">
                <p class="adm-user-name"><?= e($adminName) ?></p>
                <p class="adm-user-email"><?= e($adminEmail) ?></p>
            </div>
            <a href="/admin/logout.php" class="adm-logout-btn" title="Logout"><i class="bi bi-box-arrow-right fs-5"></i></a>
        </div>
    </aside>

    <div class="adm-main">
        <header class="adm-topbar">
            <div class="adm-pill">
                <div class="d-flex align-items-center gap-2" style="min-width:0">
                    <button type="button" class="adm-toggle-btn" id="admSidebarToggle" aria-label="Toggle menu"><i class="bi bi-list"></i></button>
                    <nav class="adm-pill-links">
                        <a href="/admin/dashboard.php" class="<?= $adminPage === 'dashboard.php' ? 'active' : '' ?>">Home</a>
                        <a href="/admin/leads.php" class="<?= $adminPage === 'leads.php' ? 'active' : '' ?>">Leads</a>
                        <a href="/admin/services.php" class="<?= $adminPage === 'services.php' ? 'active' : '' ?>">Services</a>
                        <a href="/admin/content.php" class="<?= $adminPage === 'content.php' ? 'active' : '' ?>">Content</a>
                    </nav>
                </div>
                <div class="adm-pill-right">
                    <a href="/admin/leads.php" class="adm-icon-btn" title="Leads"><i class="bi bi-bell"></i><?php if ($totalLeadsCount > 0): ?><span class="dot"></span><?php endif; ?></a>
                    <a href="/" target="_blank" class="adm-icon-btn" title="Live Site"><i class="bi bi-globe"></i></a>
                    <div class="adm-pill-avatar"><?= strtoupper(substr(trim($adminName), 0, 1)) ?></div>
                </div>
            </div>
        </header>

        <main class="adm-body">
<?php endif; ?>