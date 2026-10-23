<?php
$adminPage = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | WebTecMart</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/typography.css">
    <style>
        /* ===== RESET ===== */
        *, *::before, *::after { box-sizing: border-box; }
        html, body {
            margin: 0;
            min-height: 100%;
            overflow-x: hidden;   /* ⭐ horizontal scroll fix */
            width: 100%;
        }
        body {
            font-family: 'Plus Jakarta Sans', Arial, sans-serif;
            background: #fbf8f1;
            color: #211a29;
            -webkit-font-smoothing: antialiased;
            position: relative;
        }
        a { color: inherit; text-decoration: none; }
        img { max-width: 100%; display: block; }

        /* ===== HEADER ===== */
        .admin-shell-header {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: rgba(255, 255, 255, .96);
            border-bottom: 1px solid rgba(196, 0, 122, .13);
            box-shadow: 0 6px 20px rgba(44, 20, 40, .05);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            width: 100%;
        }
        .admin-shell-inner {
            max-width: 1280px;
            min-height: 72px;
            margin: 0 auto;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
        }

        /* ===== BRAND ===== */
        .admin-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            min-width: 0;
            font-weight: 800;
            flex-shrink: 0;
        }
        .admin-brand-mark {
            width: 46px;
            height: 46px;
            flex: 0 0 46px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            background: linear-gradient(135deg, #e0398f, #c4007a);
            color: #fff;
            font-size: 1.15rem;
            font-weight: 800;
            box-shadow: 0 4px 14px rgba(196, 0, 122, .25);
        }
        .admin-brand-text {
            display: block;
            min-width: 0;
            line-height: 1.15;
            font-size: 1rem;
        }
        .admin-brand small {
            display: block;
            margin-top: 2px;
            color: #c4007a;
            font-size: .68rem;
            line-height: 1.2;
            letter-spacing: .12em;
            text-transform: uppercase;
        }

        /* ===== DESKTOP NAV ===== */
        .admin-nav {
            display: flex;
            align-items: center;
            gap: 4px;
            flex-wrap: nowrap;   /* ⭐ ab wrap nahi karega */
        }
        .admin-nav a {
            padding: 8px 14px;
            border-radius: 999px;
            color: #716979;
            font-size: .82rem;
            font-weight: 700;
            white-space: nowrap;
            transition: color .15s, background .15s;
        }
        .admin-nav a:hover,
        .admin-nav a.active {
            color: #fff;
            background: linear-gradient(90deg, #c4007a, #e0398f);
        }

        /* ===== USER BADGE ===== */
        .admin-user {
            color: #716979;
            font-size: .8rem;
            font-weight: 600;
            flex-shrink: 0;
            padding: 6px 12px;
            background: #fbf8f1;
            border-radius: 999px;
            border: 1px solid rgba(196, 0, 122, .1);
        }

        /* ===== HAMBURGER ===== */
        .admin-menu-toggle {
            display: none;
            width: 42px;
            height: 42px;
            border: 1px solid rgba(196, 0, 122, .13);
            background: #fff;
            border-radius: 10px;
            cursor: pointer;
            padding: 0;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 4px;
            flex-shrink: 0;
            transition: background .15s, border-color .15s;
        }
        .admin-menu-toggle:hover {
            background: #fff5fa;
            border-color: #f5d6e6;
        }
        .admin-menu-toggle span {
            display: block;
            width: 18px;
            height: 2px;
            background: #c4007a;
            border-radius: 2px;
            transition: transform .25s, opacity .2s;
        }
        .admin-menu-open .admin-menu-toggle span:nth-child(1) {
            transform: translateY(6px) rotate(45deg);
        }
        .admin-menu-open .admin-menu-toggle span:nth-child(2) {
            opacity: 0;
        }
        .admin-menu-open .admin-menu-toggle span:nth-child(3) {
            transform: translateY(-6px) rotate(-45deg);
        }

        /* ===== DRAWER (mobile menu) ===== */
        .admin-nav-drawer {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            width: min(300px, 85vw);
            background: #fff;
            border-left: 1px solid rgba(196, 0, 122, .13);
            box-shadow: -20px 0 60px rgba(44, 20, 40, .12);
            padding: 22px 18px;
            z-index: 1100;
            transform: translateX(105%);
            transition: transform .3s cubic-bezier(.4, 0, .2, 1);
            overflow-y: auto;
            visibility: hidden;            /* ⭐ scroll fix */
            pointer-events: none;          /* ⭐ scroll fix */
        }
        .admin-menu-open .admin-nav-drawer {
            transform: translateX(0);
            visibility: visible;
            pointer-events: auto;
        }
        .admin-nav-drawer-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            padding-bottom: 16px;
            border-bottom: 1px solid #f3eff2;
        }
        .admin-nav-drawer-head strong {
            font-size: .95rem;
            color: #211a29;
        }
        .admin-nav-drawer-close {
            width: 36px;
            height: 36px;
            border: 0;
            background: #f5f0f3;
            border-radius: 10px;
            color: #716979;
            font-size: 1.2rem;
            cursor: pointer;
            display: grid;
            place-items: center;
            transition: background .15s, color .15s;
        }
        .admin-nav-drawer-close:hover {
            background: #fce8f3;
            color: #c4007a;
        }
        .admin-nav-drawer a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 14px;
            border-radius: 10px;
            color: #716979;
            font-size: .86rem;
            font-weight: 700;
            margin-bottom: 4px;
            transition: background .15s, color .15s;
        }
        .admin-nav-drawer a:hover,
        .admin-nav-drawer a.active {
            color: #fff;
            background: linear-gradient(90deg, #c4007a, #e0398f);
        }
        .drawer-user {
            margin-top: 18px;
            padding-top: 16px;
            border-top: 1px solid #f3eff2;
            color: #716979;
            font-size: .8rem;
            font-weight: 600;
        }

        /* ===== OVERLAY ===== */
        .admin-overlay {
            position: fixed;
            inset: 0;
            background: rgba(20, 14, 20, .5);
            backdrop-filter: blur(3px);
            -webkit-backdrop-filter: blur(3px);
            z-index: 1050;
            opacity: 0;
            visibility: hidden;            /* ⭐ scroll fix */
            transition: opacity .25s ease, visibility .25s ease;
        }
        .admin-menu-open .admin-overlay {
            opacity: 1;
            visibility: visible;
        }

        /* ============================================================
           RESPONSIVE — BREAKPOINTS
           ============================================================ */

        /* ===== TABLET / MOBILE (max 850px) ===== */
        @media (max-width: 850px) {
            .admin-shell-inner {
                min-height: 64px;
                padding: 10px 16px;
            }
            .admin-nav { display: none !important; }
            .admin-menu-toggle { display: inline-flex; }
            .admin-user { display: none; }
        }

        /* ===== PHONE (max 480px) ===== */
        @media (max-width: 480px) {
            .admin-shell-inner {
                padding: 8px 12px;
                gap: 10px;
            }
            .admin-brand-mark {
                width: 40px;
                height: 40px;
                flex-basis: 40px;
                font-size: 1rem;
            }
            .admin-brand-text { font-size: .9rem; }
            .admin-brand small { font-size: .6rem; }
            .admin-menu-toggle { width: 38px; height: 38px; }
        }

        /* ===== SMALL PHONE (max 360px) ===== */
        @media (max-width: 360px) {
            .admin-shell-inner {
                padding: 8px 10px;
                gap: 8px;
            }
            .admin-brand-mark {
                width: 36px;
                height: 36px;
                flex-basis: 36px;
                font-size: .9rem;
            }
            .admin-brand-text { font-size: .82rem; }
            .admin-brand small {
                font-size: .55rem;
                letter-spacing: .08em;
            }
            .admin-menu-toggle { width: 36px; height: 36px; }
            .admin-menu-toggle span { width: 16px; }
        }

        /* ===== LANDSCAPE PHONE ===== */
        @media (max-height: 500px) and (orientation: landscape) {
            .admin-shell-inner { min-height: 56px; padding: 8px 14px; }
            .admin-brand-mark { width: 36px; height: 36px; flex-basis: 36px; }
            .admin-nav-drawer { padding: 16px 14px; }
            .admin-nav-drawer a { padding: 9px 12px; }
        }

        /* ===== REDUCED MOTION ===== */
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: .01ms !important;
                transition-duration: .01ms !important;
            }
        }
    </style>
</head>
<body>

<header class="admin-shell-header" id="adminHeader">
    <div class="admin-shell-inner">
        <!-- Brand -->
        <a class="admin-brand" href="/admin/dashboard.php">
            <span class="admin-brand-mark">W</span>
            <span class="admin-brand-text">WebTecMart<small>Admin Panel</small></span>
        </a>

        <!-- Desktop nav -->
        <nav class="admin-nav" aria-label="Admin navigation">
            <a class="<?= $adminPage === 'dashboard.php' ? 'active' : '' ?>" href="/admin/dashboard.php">Dashboard</a>
            <a class="<?= $adminPage === 'content.php' ? 'active' : '' ?>" href="/admin/content.php">Website Content</a>
            <a class="<?= $adminPage === 'leads.php' ? 'active' : '' ?>" href="/admin/leads.php">Leads</a>
            <a href="/">View Website</a>
            <?php if (!empty($_SESSION['admin_logged_in'])): ?>
                <a href="/admin/logout.php">Logout</a>
            <?php endif; ?>
        </nav>

        <!-- User badge -->
        <?php if (!empty($_SESSION['admin_name'])): ?>
            <span class="admin-user"><?= e($_SESSION['admin_name']) ?></span>
        <?php endif; ?>

        <!-- Hamburger -->
        <button type="button" class="admin-menu-toggle" id="adminMenuToggle" aria-label="Open menu" aria-expanded="false" aria-controls="adminDrawer">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>

    <!-- Mobile drawer -->
    <nav class="admin-nav-drawer" id="adminDrawer" aria-label="Mobile navigation">
        <div class="admin-nav-drawer-head">
            <strong>Menu</strong>
            <button type="button" class="admin-nav-drawer-close" id="adminDrawerClose" aria-label="Close menu">×</button>
        </div>
        <a class="<?= $adminPage === 'dashboard.php' ? 'active' : '' ?>" href="/admin/dashboard.php">🏠 Dashboard</a>
        <a class="<?= $adminPage === 'content.php' ? 'active' : '' ?>" href="/admin/content.php">📝 Website Content</a>
        <a class="<?= $adminPage === 'leads.php' ? 'active' : '' ?>" href="/admin/leads.php">📊 Leads</a>
        <a href="/">🌐 View Website</a>
        <?php if (!empty($_SESSION['admin_logged_in'])): ?>
            <a href="/admin/logout.php">🚪 Logout</a>
        <?php endif; ?>
        <?php if (!empty($_SESSION['admin_name'])): ?>
            <div class="drawer-user">Signed in as <strong><?= e($_SESSION['admin_name']) ?></strong></div>
        <?php endif; ?>
    </nav>

    <!-- Overlay -->
    <div class="admin-overlay" id="adminOverlay"></div>
</header>

<script>
(() => {
    const header = document.getElementById('adminHeader');
    const toggle = document.getElementById('adminMenuToggle');
    const closeBtn = document.getElementById('adminDrawerClose');
    const overlay = document.getElementById('adminOverlay');
    if (!header || !toggle) return;

    const openMenu = () => {
        header.classList.add('admin-menu-open');
        toggle.setAttribute('aria-expanded', 'true');
        document.body.style.overflow = 'hidden';
    };
    const closeMenu = () => {
        header.classList.remove('admin-menu-open');
        toggle.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
    };
    toggle.addEventListener('click', () => {
        header.classList.contains('admin-menu-open') ? closeMenu() : openMenu();
    });
    closeBtn?.addEventListener('click', closeMenu);
    overlay?.addEventListener('click', closeMenu);
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeMenu();
    });
    header.querySelectorAll('.admin-nav-drawer a').forEach(a => {
        a.addEventListener('click', () => {
            if (window.innerWidth <= 850) closeMenu();
        });
    });
    window.addEventListener('resize', () => {
        if (window.innerWidth > 850) closeMenu();
    });
})();
</script>