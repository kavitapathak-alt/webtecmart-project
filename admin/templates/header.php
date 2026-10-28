<?php
$adminPage = basename($_SERVER['PHP_SELF'] ?? '');
$isLoggedIn = !empty($_SESSION['admin_logged_in']);
$adminName = $_SESSION['admin_name'] ?? 'Admin';
$adminEmail = $_SESSION['admin_email'] ?? 'admin@webtecmart.com';

// Fetch live counts for badges if logged in
$totalLeadsCount = 0;
if ($isLoggedIn && function_exists('db')) {
    try {
        $totalLeadsCount = (int) db()->query('SELECT COUNT(*) FROM leads')->fetchColumn();
    } catch (\Throwable $e) {
        $totalLeadsCount = 0;
    }
}

$pageTitles = [
    'dashboard.php' => 'Dashboard Overview',
    'content.php'   => 'Website Content Manager',
    'leads.php'     => 'Leads & Enquiries',
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
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/typography.css">
    <link rel="stylesheet" href="/assets/css/design-system.css">

    <style>
        :root {
            --adm-sidebar-w: 260px;
            --adm-topbar-h: 70px;
            --adm-brand: #C4007A;
            --adm-brand-dark: #A3005F;
            --adm-brand-soft: #FCE8F3;
            --adm-bg: #F8FAFC;
            --adm-surface: #FFFFFF;
            --adm-border: #E2E8F0;
            --adm-text: #0F172A;
            --adm-muted: #64748B;
        }

        *, *::before, *::after { box-sizing: border-box; }
        body {
            margin: 0;
            background: var(--adm-bg);
            color: var(--adm-text);
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            -webkit-font-smoothing: antialiased;
            min-height: 100vh;
        }

        /* ===== ADMIN LAYOUT ===== */
        .adm-layout {
            display: flex;
            min-height: 100vh;
            width: 100%;
        }

        /* ===== SIDEBAR ===== */
        .adm-sidebar {
            width: var(--adm-sidebar-w);
            background: #FFFFFF;
            border-right: 1px solid var(--adm-border);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 1040;
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            overflow-y: auto;
        }

        /* Sidebar Brand */
        .adm-sidebar-brand {
            height: var(--adm-topbar-h);
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 20px;
            border-bottom: 1px solid var(--adm-border);
            text-decoration: none;
            color: var(--adm-text);
        }
        .adm-sidebar-logo {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: linear-gradient(135deg, #E0398F, #C4007A);
            color: #FFFFFF;
            display: grid;
            place-items: center;
            font-weight: 800;
            font-size: 1.15rem;
            box-shadow: 0 4px 12px rgba(196, 0, 122, 0.3);
            flex-shrink: 0;
        }
        .adm-sidebar-title {
            font-size: 1.05rem;
            font-weight: 800;
            line-height: 1.2;
            letter-spacing: -0.02em;
        }
        .adm-sidebar-title small {
            display: block;
            font-size: 0.68rem;
            font-weight: 700;
            color: var(--adm-brand);
            letter-spacing: 0.1em;
            text-transform: uppercase;
        }

        /* Navigation List */
        .adm-nav-section {
            padding: 18px 14px 6px;
        }
        .adm-nav-heading {
            font-size: 0.68rem;
            font-weight: 800;
            color: #94A3B8;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            padding: 0 10px 8px;
            margin: 0;
        }
        .adm-nav-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }
        .adm-nav-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            padding: 9px 12px;
            border-radius: 10px;
            color: #475569;
            font-size: 0.875rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s ease;
        }
        .adm-nav-link i {
            font-size: 1.1rem;
            width: 22px;
            text-align: center;
            color: #64748B;
            transition: color 0.2s ease;
        }
        .adm-nav-link:hover {
            background: #F8FAFC;
            color: var(--adm-brand);
        }
        .adm-nav-link:hover i {
            color: var(--adm-brand);
        }
        .adm-nav-link.active {
            background: linear-gradient(90deg, #FFF0F7, #FDF2F8);
            color: var(--adm-brand);
            font-weight: 700;
            border: 1px solid rgba(196, 0, 122, 0.15);
        }
        .adm-nav-link.active i {
            color: var(--adm-brand);
        }

        .adm-badge-count {
            background: var(--adm-brand);
            color: #FFFFFF;
            font-size: 0.72rem;
            font-weight: 800;
            padding: 2px 8px;
            border-radius: 9999px;
        }

        /* Sidebar User Profile */
        .adm-sidebar-user {
            margin-top: auto;
            padding: 16px;
            border-top: 1px solid var(--adm-border);
            display: flex;
            align-items: center;
            gap: 12px;
            background: #FAFAFA;
        }
        .adm-user-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: var(--adm-brand-soft);
            color: var(--adm-brand-dark);
            display: grid;
            place-items: center;
            font-weight: 800;
            font-size: 0.95rem;
            flex-shrink: 0;
        }
        .adm-user-info {
            min-width: 0;
            flex-grow: 1;
        }
        .adm-user-name {
            font-size: 0.85rem;
            font-weight: 700;
            color: var(--adm-text);
            margin: 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .adm-user-email {
            font-size: 0.75rem;
            color: var(--adm-muted);
            margin: 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .adm-logout-btn {
            color: #94A3B8;
            padding: 6px;
            border-radius: 8px;
            text-decoration: none;
            transition: color 0.2s, background 0.2s;
        }
        .adm-logout-btn:hover {
            color: #EF4444;
            background: #FEE2E2;
        }

        /* ===== MAIN WRAPPER ===== */
        .adm-main {
            flex: 1;
            margin-left: var(--adm-sidebar-w);
            display: flex;
            flex-direction: column;
            min-width: 0;
            min-height: 100vh;
        }

        /* Topbar */
        .adm-topbar {
            height: var(--adm-topbar-h);
            background: #FFFFFF;
            border-bottom: 1px solid var(--adm-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
            position: sticky;
            top: 0;
            z-index: 1020;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
        }
        .adm-topbar-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }
        .adm-toggle-btn {
            display: none;
            background: transparent;
            border: 1px solid var(--adm-border);
            border-radius: 8px;
            width: 38px;
            height: 38px;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: var(--adm-text);
            font-size: 1.25rem;
        }
        .adm-breadcrumb {
            margin: 0;
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--adm-muted);
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .adm-breadcrumb strong {
            color: var(--adm-text);
            font-weight: 700;
        }

        .adm-topbar-right {
            display: flex;
            align-items: center;
            gap: 14px;
        }
        .adm-date-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            background: #F1F5F9;
            border-radius: 9999px;
            font-size: 0.775rem;
            font-weight: 600;
            color: #475569;
        }
        .adm-site-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 14px;
            border-radius: 9999px;
            background: var(--adm-brand-soft);
            color: var(--adm-brand-dark) !important;
            border: 1px solid rgba(196, 0, 122, 0.15);
            font-size: 0.8125rem;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.2s ease;
        }
        .adm-site-btn:hover {
            background: var(--adm-brand);
            color: #FFFFFF !important;
            transform: translateY(-1px);
        }

        /* Content Body */
        .adm-body {
            flex: 1;
            padding: 32px 28px 48px;
        }

        /* Mobile Overlay */
        .adm-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, 0.4);
            backdrop-filter: blur(4px);
            z-index: 1030;
        }

        /* Responsive rules */
        @media (max-width: 991.98px) {
            .adm-sidebar {
                transform: translateX(-100%);
            }
            .adm-sidebar.open {
                transform: translateX(0);
            }
            .adm-overlay.open {
                display: block;
            }
            .adm-main {
                margin-left: 0;
            }
            .adm-toggle-btn {
                display: inline-flex;
            }
            .adm-topbar {
                padding: 0 16px;
            }
            .adm-body {
                padding: 20px 16px 36px;
            }
            .adm-date-badge {
                display: none;
            }
        }
    </style>
</head>
<body>

<?php if ($isLoggedIn): ?>
<div class="adm-layout">

    <!-- Mobile Drawer Overlay -->
    <div class="adm-overlay" id="admOverlay"></div>

    <!-- SIDEBAR -->
    <aside class="adm-sidebar" id="admSidebar">
        <!-- Brand -->
        <a href="/admin/dashboard.php" class="adm-sidebar-brand">
            <span class="adm-sidebar-logo">W</span>
            <span class="adm-sidebar-title">
                WebTecMart
                <small>Agency CMS</small>
            </span>
        </a>

        <!-- Navigation Sections -->
        <div class="adm-nav-section">
            <p class="adm-nav-heading">Overview</p>
            <ul class="adm-nav-list">
                <li>
                    <a href="/admin/dashboard.php" class="adm-nav-link <?= $adminPage === 'dashboard.php' ? 'active' : '' ?>">
                        <span><i class="bi bi-grid-1x2-fill"></i> Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/leads.php" class="adm-nav-link <?= $adminPage === 'leads.php' ? 'active' : '' ?>">
                        <span><i class="bi bi-inbox-fill"></i> Leads &amp; Inquiries</span>
                        <?php if ($totalLeadsCount > 0): ?>
                            <span class="adm-badge-count"><?= $totalLeadsCount ?></span>
                        <?php endif; ?>
                    </a>
                </li>
            </ul>
        </div>

        <div class="adm-nav-section">
            <p class="adm-nav-heading">Content Management</p>
            <ul class="adm-nav-list">
                <li>
                    <a href="/admin/content.php" class="adm-nav-link <?= $adminPage === 'content.php' ? 'active' : '' ?>">
                        <span><i class="bi bi-pencil-square"></i> All Content Sections</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/content.php?section=collection:hero_content" class="adm-nav-link">
                        <span><i class="bi bi-lightning-charge"></i> Hero Section</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/content.php?section=collection:service" class="adm-nav-link">
                        <span><i class="bi bi-boxes"></i> Core Services</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/content.php?section=collection:partner" class="adm-nav-link">
                        <span><i class="bi bi-handshake"></i> Trusted Partners</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/content.php?section=collection:success_story" class="adm-nav-link">
                        <span><i class="bi bi-trophy"></i> Case Studies</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/content.php?section=collection:testimonial" class="adm-nav-link">
                        <span><i class="bi bi-chat-heart"></i> Testimonials</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/content.php?section=collection:blog" class="adm-nav-link">
                        <span><i class="bi bi-journal-richtext"></i> Blog &amp; Insights</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="adm-nav-section">
            <p class="adm-nav-heading">Shortcuts</p>
            <ul class="adm-nav-list">
                <li>
                    <a href="/" target="_blank" class="adm-nav-link">
                        <span><i class="bi bi-box-arrow-up-right"></i> Open Website</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- User Profile Pill -->
        <div class="adm-sidebar-user">
            <div class="adm-user-avatar">
                <?= strtoupper(substr(trim($adminName), 0, 1)) ?>
            </div>
            <div class="adm-user-info">
                <p class="adm-user-name"><?= e($adminName) ?></p>
                <p class="adm-user-email"><?= e($adminEmail) ?></p>
            </div>
            <a href="/admin/logout.php" class="adm-logout-btn" title="Logout">
                <i class="bi bi-box-arrow-right fs-5"></i>
            </a>
        </div>
    </aside>

    <!-- MAIN COLUMN -->
    <div class="adm-main">
        <!-- Topbar -->
        <header class="adm-topbar">
            <div class="adm-topbar-left">
                <button type="button" class="adm-toggle-btn" id="admSidebarToggle" aria-label="Toggle menu">
                    <i class="bi bi-list"></i>
                </button>
                <div class="adm-breadcrumb">
                    <span>WebTecMart</span>
                    <i class="bi bi-chevron-right small"></i>
                    <strong><?= e($currentPageTitle) ?></strong>
                </div>
            </div>

            <div class="adm-topbar-right">
                <span class="adm-date-badge">
                    <i class="bi bi-calendar3"></i>
                    <?= date('D, M d, Y') ?>
                </span>
                <a href="/" target="_blank" class="adm-site-btn">
                    <i class="bi bi-globe"></i>
                    Live Site
                </a>
            </div>
        </header>

        <!-- Page Body Content Starts Here -->
        <main class="adm-body">
<?php endif; ?>
