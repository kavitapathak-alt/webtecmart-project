<?php
require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../functions.php';

$current = currentPage();
$packagesPageMeta = $current === 'packages.php' ? packagesPageContent() : null;
$serviceNavItems = [
    ['label' => 'All Services', 'path' => '/services.php', 'description' => 'Explore our complete suite of digital marketing and growth services.'],
    ['label' => 'B2B & Exhibition SEO', 'path' => '/b2b-exhibition-seo.php', 'description' => 'Specialized SEO for trade fairs, exhibitions, B2B exporters, and manufacturing brands.'],
    ['label' => 'SEO Services in Delhi', 'path' => '/seo-services-delhi.php', 'description' => 'Top SEO company in Delhi NCR delivering #1 Google rankings & local customer growth.'],
    ['label' => 'Website Design & Development', 'path' => '/website-design-development.php', 'description' => 'Fast, conversion-focused, mobile-first websites engineered to turn visitors into buyers.'],
    ['label' => 'Search Engine Marketing (Google Ads)', 'path' => '/search-engine-marketing.php', 'description' => 'High-ROI PPC and Google Search/Display ad campaigns managed by certified experts.'],
    ['label' => 'Social Media Optimization & Marketing', 'path' => '/social-media-optimization.php', 'description' => 'Build an engaged community and scale your presence across Instagram, LinkedIn, and Meta.'],
    ['label' => 'Mobile App Development', 'path' => '/mobile-app-development.php', 'description' => 'Native and hybrid iOS & Android apps built for performance and user retention.'],
    ['label' => 'Performance Marketing', 'path' => '/performance-marketing.php', 'description' => 'Data-driven paid ads across Meta, Google, and YouTube with relentless ROAS focus.'],
];

// Dynamically enrich navigation items with live database records
$dbPagesBySlugNav = [];
try {
    foreach (serviceDetailPages() as $dp) {
        if (!empty($dp['slug'])) $dbPagesBySlugNav[$dp['slug']] = $dp;
    }
} catch (Throwable $exception) {
    error_log('Header CMS navigation unavailable: ' . $exception->getMessage());
}
foreach ($serviceNavItems as &$sni) {
    $baseName = basename($sni['path'], '.php');
    if ($baseName !== 'services' && isset($dbPagesBySlugNav[$baseName])) {
        $dbItem = $dbPagesBySlugNav[$baseName];
        if (!empty($dbItem['title'])) $sni['label'] = $dbItem['title'];
        if (!empty($dbItem['summary'])) $sni['description'] = $dbItem['summary'];
    }
}
unset($sni);
$servicePagePaths = array_map(static function (array $item): string {
    return basename($item['path']);
}, $serviceNavItems);
$isServicesPage = in_array($current, $servicePagePaths, true);
$navItems = [
    ['label' => 'Home',      'path' => '/'],
    ['label' => 'About',     'path' => '/about.php'],
    ['label' => 'Services',  'path' => '/services.php', 'modal' => 'servicesModal'],
    ['label' => 'Packages',  'path' => '/packages.php'],
    ['label' => 'Portfolio', 'path' => '/portfolio.php'],
    ['label' => 'Blog',      'path' => '/blogs.php'],
    ['label' => 'Contact',   'path' => '/contact.php'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e((string) ($pageMeta['title'] ?? $blogPageMeta['page_meta_title'] ?? $packagesPageMeta['page_meta_title'] ?? (APP_NAME . ' | Digital Growth Agency & SEO Experts'))) ?></title>
    <meta name="description" content="<?= e((string) ($pageMeta['description'] ?? $blogPageMeta['page_meta_description'] ?? $packagesPageMeta['page_meta_description'] ?? 'WebTecMart helps brands grow through SEO, paid advertising, social campaigns, and conversion-focused web design.')) ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;12..96,800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        :root {
            /* Expo Floor colour tokens — NO BLACK, uses deep magenta instead */
            --pink: #C4007A;
            --pink2: #E0398F;
            --pink3: #FF7BC0;
            --deep: #7E004E;            /* replaces the old black --ink */
            --head: #5E0B45;            /* headings */
            --blush: #FBEAF3;
            --soft: #FFF4FA;
            --paper: #FFFFFF;
            --gold: #FFB547;
            --mint: #0E9F6E;
            --muted: #7A6574;
            --border-soft: rgba(126, 0, 78, 0.14);
            --disp: 'Bricolage Grotesque', 'Plus Jakarta Sans', system-ui, sans-serif;
            --font-family-base: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;

            --topbar-h: 40px;
            --header-h: 84px;
        }

        * { box-sizing: border-box; }

        html { scroll-behavior: smooth; overflow-x: hidden; }

        body {
            font-family: var(--font-family-base);
            background: var(--paper);
            color: var(--head);
            line-height: 1.6;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            width: 100%;
            max-width: 100vw;
            -webkit-font-smoothing: antialiased;
            padding-top: calc(var(--topbar-h) + var(--header-h));
        }

        a { text-decoration: none; }
        a:focus-visible, button:focus-visible {
            outline: 3px solid var(--gold);
            outline-offset: 2px;
        }

        /* ============================================================
           TOP BAR — gold "badge ribbon"
           ============================================================ */
        .top-bar {
            background: var(--gold);
            color: var(--deep);
            font-size: 12.5px;
            font-weight: 700;
            letter-spacing: 0.02em;
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 1001;
            min-height: var(--topbar-h);
            overflow: hidden;
            display: flex;
            align-items: center;
            border-bottom: 2px solid var(--deep);
        }

        /* dotted floor-plan overlay */
        .top-bar::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: radial-gradient(rgba(126,0,78,.16) 1px, transparent 1.2px);
            background-size: 18px 18px;
            opacity: .5;
            pointer-events: none;
        }
        /* left tag — "badge scan" strip */
        .top-bar::after {
            content: 'LIVE • EXPO DESK';
            position: absolute;
            left: 0; top: 0; bottom: 0;
            display: flex;
            align-items: center;
            padding: 0 16px;
            background: var(--deep);
            color: var(--gold);
            font-family: var(--disp);
            font-weight: 800;
            font-size: 10.5px;
            letter-spacing: .14em;
            z-index: 2;
        }

        .top-bar-inner {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 18px;
            min-height: var(--topbar-h);
            padding: 8px 0 8px 130px;
            position: relative;
            z-index: 1;
            width: 100%;
        }

        .top-bar-item {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            color: var(--deep);
            font-weight: 700;
            transition: color .2s ease, translate .2s ease;
            white-space: nowrap;
        }

        .top-bar-item:hover {
            color: var(--pink);
            translate: 0 -1px;
        }

        .top-bar-item svg {
            width: 14px;
            height: 14px;
            flex-shrink: 0;
            color: var(--pink);
        }

        .top-bar-divider {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--pink);
            flex-shrink: 0;
        }

        /* ============================================================
           HEADER — white "exhibitor stall"
           ============================================================ */
        .site-header {
            background: #fff;
            border-bottom: 2px solid var(--deep);
            position: fixed;
            top: var(--topbar-h);
            left: 0; right: 0;
            width: 100%;
            z-index: 1000;
            transition: box-shadow .35s ease, translate .35s ease;
            height: auto;
            min-height: var(--header-h);
            box-shadow: 0 6px 0 rgba(126, 0, 78, .08);
        }

        .site-header.scrolled {
            box-shadow: 0 8px 0 var(--blush), 0 4px 24px rgba(196,0,122,.12);
        }

        /* awning stripe on the header bottom — mirrors the stall signboard */
        .site-header::after {
            content: '';
            position: absolute;
            left: 0; right: 0; bottom: -2px;
            height: 6px;
            background: repeating-linear-gradient(90deg, var(--pink) 0 22px, #fff 22px 44px);
            border-top: 2px solid var(--deep);
        }

        /* small pink tick marks at corners (stall pegs) */
        .site-header::before {
            content: '';
            position: absolute;
            left: 22px; right: 22px; top: 6px;
            height: 6px;
            background:
                linear-gradient(90deg, var(--pink) 0 22px, transparent 22px) left top / 22px 6px no-repeat,
                linear-gradient(90deg, var(--pink) 0 22px, transparent 22px) right top / 22px 6px no-repeat;
            pointer-events: none;
            opacity: .9;
        }

        .nav-wrap {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            padding: 6px 0;
            min-height: var(--header-h);
            position: relative;
        }

        /* ============================================================
           BRAND — logo tile with gold offset shadow
           ============================================================ */
        .brand {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            color: var(--head);
            flex-shrink: 0;
            transition: translate .25s ease;
        }

        .brand:hover { translate: -2px -2px; }

        .brand-logo-wrap {
            position: relative;
            display: grid;
            place-items: center;
            width: 56px;
            height: 56px;
            flex-shrink: 0;
            border-radius: 14px;
            background: var(--blush);
            border: 2px solid var(--deep);
            box-shadow: 4px 4px 0 var(--gold);
            transition: box-shadow .25s ease, translate .25s ease;
        }

        .brand:hover .brand-logo-wrap {
            box-shadow: 6px 6px 0 var(--pink);
        }

        .brand-logo {
            width: 44px;
            height: 44px;
            max-width: 44px;
            object-fit: contain;
            position: relative;
            z-index: 1;
            transition: transform .3s ease;
        }

        .brand:hover .brand-logo {
            transform: scale(1.08) rotate(-3deg);
        }

        .brand-text {
            display: flex;
            flex-direction: column;
            line-height: 1;
        }

        .brand-name {
            font-family: var(--disp);
            font-size: 1.45rem;
            font-weight: 800;
            color: var(--head);
            letter-spacing: -.02em;
            line-height: 1;
            margin: 0;
            transition: letter-spacing .3s ease;
        }

        .brand:hover .brand-name { letter-spacing: 0; }

        .brand-name .accent { color: var(--pink); position: relative; }

        .brand-name .reg-mark {
            position: absolute;
            top: -4px;
            right: -12px;
            font-size: 8px;
            background: var(--deep);
            color: var(--gold);
            padding: 2px 5px;
            border-radius: 9999px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 800;
            letter-spacing: 0;
        }

        .brand-tagline {
            font-size: 10px;
            color: rgba(196, 0, 122, .8);
            letter-spacing: .25em;
            text-transform: uppercase;
            margin-top: 5px;
            font-weight: 700;
            transition: color .3s ease;
        }

        .brand:hover .brand-tagline { color: var(--pink); }

        /* fallback icon if the logo image is missing */
        .brand-icon {
            width: 56px;
            height: 56px;
            border-radius: 14px;
            background: var(--pink);
            color: #fff;
            display: grid;
            place-items: center;
            font-family: var(--disp);
            font-weight: 800;
            font-size: 1.6rem;
            border: 2px solid var(--deep);
            box-shadow: 4px 4px 0 var(--gold);
            flex-shrink: 0;
        }

        /* ============================================================
           NAVIGATION
           ============================================================ */
        .main-nav {
            display: flex;
            align-items: center;
            gap: 2px;
        }

        .nav-link {
            color: var(--head);
            font-weight: 600;
            font-size: 13.5px;
            padding: 9px 15px;
            border-radius: 10px;
            white-space: nowrap;
            transition: color .2s ease, background .2s ease, translate .2s ease;
            position: relative;
            display: inline-flex;
            align-items: center;
            gap: 7px;
        }

        /* pink dot marker on each link */
        .nav-link::before {
            content: '';
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: rgba(196, 0, 122, .35);
            flex-shrink: 0;
            transition: background .2s ease, scale .2s ease;
        }

        .nav-link:hover {
            color: var(--pink);
            background: var(--blush);
            translate: 0 -1px;
        }
        .nav-link:hover::before { background: var(--pink); scale: 1.3; }

        .nav-link.active {
            color: var(--pink);
            background: var(--blush);
        }
        .nav-link.active::before { background: var(--pink); }

        /* active underline peg */
        .nav-link.active::after {
            content: '';
            position: absolute;
            left: 15px;
            right: 15px;
            bottom: 4px;
            height: 2px;
            background: repeating-linear-gradient(90deg, var(--pink) 0 4px, transparent 4px 8px);
            border-radius: 2px;
        }

        /* ============================================================
           SERVICES MODAL
           ============================================================ */
        .services-modal .modal-content {
            height: min(580px, calc(100vh - 40px));
            overflow: hidden;
            border: 2px solid var(--deep);
            border-radius: 20px;
            background: #fff;
            box-shadow: 10px 10px 0 var(--pink);
        }

        .services-modal .modal-dialog {
            width: calc(100% - 48px);
            max-width: 1320px;
        }

        .services-modal .modal-header {
            padding: 22px 28px 12px;
            border: 0;
            position: relative;
        }
        /* awning on modal header */
        .services-modal .modal-header::after {
            content: '';
            position: absolute;
            left: 0; right: 0; bottom: 0;
            height: 4px;
            background: repeating-linear-gradient(90deg, var(--pink) 0 18px, var(--gold) 18px 36px);
            border-radius: 2px;
            opacity: .85;
        }

        .services-modal-kicker {
            margin: 0 0 5px;
            color: var(--pink);
            font-size: .72rem;
            font-weight: 800;
            letter-spacing: .14em;
            text-transform: uppercase;
        }

        .services-modal-title {
            margin: 0;
            color: var(--head);
            font-family: var(--disp);
            font-size: clamp(1.35rem, 3vw, 1.8rem);
            font-weight: 800;
        }

        .services-modal .modal-body {
            padding: 16px 28px 28px;
            overflow-y: auto;
        }

        .services-modal-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
        }

        .services-modal-link {
            display: flex;
            align-items: flex-start;
            gap: 13px;
            min-height: 94px;
            padding: 16px;
            border: 2px solid var(--deep);
            border-radius: 14px;
            background: #fff;
            color: var(--head);
            text-decoration: none;
            box-shadow: 4px 4px 0 var(--blush);
            transition: translate .2s ease, box-shadow .2s ease, background .2s ease;
        }

        .services-modal-link:hover,
        .services-modal-link:focus-visible {
            translate: -2px -2px;
            box-shadow: 7px 7px 0 var(--pink);
            background: var(--blush);
            color: var(--head);
        }

        .services-modal-icon {
            display: grid;
            width: 38px;
            height: 38px;
            flex: 0 0 38px;
            place-items: center;
            border-radius: 10px;
            background: var(--deep);
            color: var(--gold);
            font-family: var(--disp);
            font-size: .92rem;
            font-weight: 800;
            border: 2px solid var(--deep);
        }
        .services-modal-link:nth-child(even) .services-modal-icon {
            background: var(--pink);
            color: #fff;
        }

        .services-modal-link-title {
            display: block;
            margin: 0 0 4px;
            font-family: var(--disp);
            font-size: .92rem;
            font-weight: 700;
            line-height: 1.35;
        }

        .services-modal-link-description {
            display: block;
            color: var(--muted);
            font-size: .78rem;
            line-height: 1.5;
        }

        @media (max-width: 575px) {
            .services-modal .modal-dialog { width: auto; margin: 12px; }
            .services-modal .modal-content {
                height: auto;
                max-height: calc(100vh - 24px);
                box-shadow: 6px 6px 0 var(--pink);
            }
            .services-modal .modal-header { padding: 18px 20px 12px; }
            .services-modal .modal-body { padding: 12px 20px 20px; }
            .services-modal-grid { grid-template-columns: 1fr; gap: 9px; }
            .services-modal-link { min-height: auto; padding: 13px; }
        }

        /* ============================================================
           CTA BUTTON
           ============================================================ */
        .header-cta {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border-radius: 11px;
            background: var(--pink);
            padding: 12px 22px;
            font-weight: 700;
            font-size: 13.5px;
            color: #fff;
            box-shadow: 0 4px 0 var(--deep);
            transition: translate .2s ease, box-shadow .2s ease, background .2s ease;
            border: 2px solid var(--deep);
            position: relative;
            overflow: hidden;
            flex-shrink: 0;
            cursor: pointer;
            text-decoration: none;
        }

        .header-cta .cta-overlay {
            position: absolute;
            inset: 0;
            background: radial-gradient(150px circle at var(--bx, 50%) var(--by, 50%), #E0398F 0, var(--pink) 72%);
            opacity: 0;
            transition: opacity .3s ease;
        }

        .header-cta .cta-text {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .header-cta svg {
            width: 14px;
            height: 14px;
            transition: transform .4s ease;
        }

        .header-cta:hover {
            translate: 0 2px;
            box-shadow: 0 2px 0 var(--deep);
        }

        .header-cta:hover .cta-overlay { opacity: 1; }
        .header-cta:hover svg { transform: rotate(90deg); }

        /* ============================================================
           MOBILE MENU TOGGLE
           ============================================================ */
        .menu-toggle {
            display: none;
            width: 44px;
            height: 44px;
            border-radius: 11px;
            background: var(--blush);
            border: 2px solid var(--deep);
            color: var(--head);
            cursor: pointer;
            align-items: center;
            justify-content: center;
            padding: 0;
            transition: translate .2s ease, box-shadow .2s ease, background .2s ease;
            flex-shrink: 0;
            box-shadow: 3px 3px 0 var(--deep);
        }

        .menu-toggle:hover {
            background: var(--pink);
            color: #fff;
            translate: -1px -1px;
            box-shadow: 4px 4px 0 var(--deep);
        }

        .menu-toggle:active { translate: 2px 2px; box-shadow: 0 0 0 var(--deep); }

        .menu-toggle svg {
            width: 20px;
            height: 20px;
            transition: transform .3s ease;
        }

        .menu-toggle.open svg { transform: rotate(90deg); }

        /* ============================================================
           MOBILE MENU PANEL
           ============================================================ */
        .mobile-menu {
            display: none;
            background: #fff;
            border-top: 2px solid var(--deep);
            padding: 16px 0 24px;
            box-shadow: 0 25px 50px -12px rgba(126, 0, 78, .22);
            animation: slideDown .3s ease-out;
            max-height: calc(100vh - var(--header-h) - var(--topbar-h));
            overflow-y: auto;
            overflow-x: hidden;
            width: 100%;
            position: relative;
        }

        .mobile-menu::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 4px;
            background: repeating-linear-gradient(90deg, var(--pink) 0 18px, var(--gold) 18px 36px);
            opacity: .9;
        }

        .mobile-menu.open { display: block; }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-10px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .mobile-menu-inner {
            padding: 6px 20px 0;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .mobile-menu .nav-link {
            display: flex;
            width: 100%;
            padding: 12px 16px;
            border-radius: 10px;
            font-size: .96rem;
            font-weight: 600;
            color: var(--head);
            text-align: left;
            border: 2px solid transparent;
            background: transparent;
        }

        .mobile-menu .nav-link::before { background: rgba(196,0,122,.35); }

        .mobile-menu .nav-link::after {
            display: none;
        }

        .mobile-menu .nav-link:hover,
        .mobile-menu .nav-link.active {
            color: var(--pink);
            background: var(--blush);
            border-color: var(--deep);
            box-shadow: 3px 3px 0 var(--gold);
            translate: -1px -1px;
        }

        .mobile-cta-wrap { padding-top: 12px; }

        .mobile-cta {
            display: block;
            width: 100%;
            border-radius: 11px;
            background: var(--pink);
            padding: 14px 20px;
            text-align: center;
            font-weight: 700;
            color: #fff;
            font-size: .95rem;
            box-shadow: 0 4px 0 var(--deep);
            border: 2px solid var(--deep);
            transition: translate .2s ease, box-shadow .2s ease;
        }

        .mobile-cta:hover {
            translate: 0 2px;
            box-shadow: 0 2px 0 var(--deep);
            color: #fff;
        }

        /* mobile contact */
        .mobile-contact {
            padding-top: 16px;
            margin-top: 12px;
            border-top: 2px dashed var(--border-soft);
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .mobile-contact a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 9px 10px;
            border-radius: 8px;
            font-size: .875rem;
            color: var(--head);
            font-weight: 600;
            transition: background .2s ease, color .2s ease;
        }

        .mobile-contact a:hover {
            background: var(--blush);
            color: var(--pink);
        }

        .mobile-contact svg {
            width: 16px;
            height: 16px;
            color: var(--pink);
            flex-shrink: 0;
        }

        /* mobile proof chips */
        .mobile-proof {
            padding-top: 12px;
            margin-top: 10px;
            border-top: 2px dashed var(--border-soft);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            font-size: .74rem;
            font-weight: 700;
            color: var(--head);
            flex-wrap: wrap;
        }

        .mobile-proof .item {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 5px 10px;
            border-radius: 99px;
            background: var(--blush);
            border: 1.5px solid var(--deep);
        }

        .mobile-proof svg {
            width: 12px;
            height: 12px;
            color: var(--pink);
        }

        .mobile-proof .divider { display: none; }

        /* Container */
        .container {
            max-width: 1280px;
            padding-left: 16px;
            padding-right: 16px;
            margin: 0 auto;
            width: 100%;
        }

        /* ============================================================
           RESPONSIVE
           ============================================================ */
        @media (max-width: 1280px) {
            .brand-name { font-size: 1.35rem; }
            .nav-link { padding: 8px 11px; font-size: 13px; }
            .header-cta { padding: 11px 18px; font-size: 13px; }
            .main-nav { display: none; }
            .header-cta { display: none; }
            .menu-toggle { display: flex; }
        }

        @media (max-width: 991px) {
            :root { --header-h: 76px; }
            .top-bar { font-size: .74rem; }
            .top-bar::after { padding: 0 12px; font-size: 9.5px; }
            .top-bar-inner { gap: 14px; padding-left: 110px; }
            .brand-logo-wrap { width: 50px; height: 50px; }
            .brand-logo { width: 38px; height: 38px; }
            .brand-name { font-size: 1.2rem; }
            .brand-tagline { font-size: 9px; letter-spacing: .2em; }
            .brand-name .reg-mark { font-size: 8px; top: -3px; right: -10px; padding: 1px 4px; }
        }

        @media (max-width: 767px) {
            :root { --topbar-h: 0px; --header-h: 72px; }
            .top-bar { display: none; }
            body { padding-top: var(--header-h); }
            .site-header { top: 0; }
            .site-header::before { left: 16px; right: 16px; }

            .brand-logo-wrap { width: 46px; height: 46px; border-radius: 12px; box-shadow: 3px 3px 0 var(--gold); }
            .brand-logo { width: 34px; height: 34px; }
            .brand-name { font-size: 1.1rem; }
            .brand-tagline { font-size: 9.5px; letter-spacing: .15em; }

            .menu-toggle { width: 42px; height: 42px; }
            .menu-toggle svg { width: 18px; height: 18px; }
        }

        @media (max-width: 380px) {
            .brand-logo-wrap { width: 42px; height: 42px; border-radius: 10px; }
            .brand-logo { width: 30px; height: 30px; }
            .brand-name { font-size: 1rem; }
            .brand-tagline { font-size: 9px; letter-spacing: .12em; }
            .menu-toggle { width: 40px; height: 40px; }
        }

        @media (prefers-reduced-motion: reduce) {
            .brand, .nav-link, .header-cta, .menu-toggle, .mobile-menu .nav-link { transition: none; }
            .mobile-menu { animation: none; }
        }
    </style>
    <link rel="stylesheet" href="/assets/css/design-system.css">
    <link rel="stylesheet" href="/assets/css/typography.css">
    <script defer src="/assets/js/webtecmart-motion.js"></script>
</head>
<body>
    <!-- ===== TOP BAR (hidden on mobile) ===== -->
    <div class="top-bar" id="topBar">
        <div class="container top-bar-inner">
            <a href="mailto:info@webtecmart.com" class="top-bar-item">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                info@webtecmart.com
            </a>
            <span class="top-bar-divider"></span>
            <a href="tel:+919999674255" class="top-bar-item">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                +91-9999674255
            </a>
            <span class="top-bar-divider"></span>
            <a href="tel:+919511012625" class="top-bar-item">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 14h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H4a1 1 0 0 1-1-1v-7a9 9 0 0 1 18 0v7a1 1 0 0 1-1 1h-2a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3"/><path d="M21 16v2a4 4 0 0 1-4 4h-5"/></svg>
                Tech Support: +91-9511012625
            </a>
        </div>
    </div>

    <!-- ===== HEADER ===== -->
    <header class="site-header" id="siteHeader">
        <div class="container nav-wrap">

            <!-- LOGO -->
            <a href="/" class="brand" aria-label="WebTecMart Home">
                <span class="brand-logo-wrap" id="brandLogoWrap">
                    <img
                        src="/assets/images/webtecmart-logo.png"
                        alt="WebTecMart Logo"
                        class="brand-logo"
                        onerror="this.style.display='none'; this.parentElement.style.display='none'; document.getElementById('brandIconFallback').style.display='grid';"
                    >
                </span>
                <span class="brand-icon" id="brandIconFallback" style="display:none;">W</span>

                <div class="brand-text">
                    <span class="brand-name">
                        Web<span class="accent">TecMart<span class="reg-mark">®</span></span>
                    </span>
                    <span class="brand-tagline">Digital Branding Agency</span>
                </div>
            </a>

            <!-- DESKTOP NAV -->
            <nav class="main-nav" aria-label="Main navigation">
                <?php foreach ($navItems as $item): ?>
                    <a
                        href="<?= $item['path'] ?>"
                        class="nav-link <?= !empty($item['modal']) ? ($isServicesPage ? 'active' : '') : ($current === basename($item['path']) ? 'active' : '') ?>"
                        <?= !empty($item['modal']) ? 'data-bs-toggle="modal" data-bs-target="#' . e($item['modal']) . '" aria-haspopup="dialog"' : '' ?>
                    >
                        <?= $item['label'] ?>
                    </a>
                <?php endforeach; ?>
            </nav>

            <!-- DESKTOP CTA -->
            <a href="/contact.php" class="header-cta">
                <span class="cta-overlay"></span>
                <span class="cta-text">
                    Get Free Consultation
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </span>
            </a>

            <!-- MOBILE TOGGLE -->
            <button class="menu-toggle" id="menuToggle" aria-label="Toggle menu" aria-expanded="false">
                <svg id="menuIcon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
            </button>
        </div>

        <!-- MOBILE MENU -->
        <div class="mobile-menu" id="mobileMenu">
            <div class="mobile-menu-inner">
                <?php foreach ($navItems as $item): ?>
                    <a
                        href="<?= $item['path'] ?>"
                        class="nav-link <?= !empty($item['modal']) ? ($isServicesPage ? 'active' : '') : ($current === basename($item['path']) ? 'active' : '') ?>"
                        <?= !empty($item['modal']) ? 'data-bs-toggle="modal" data-bs-target="#' . e($item['modal']) . '" aria-haspopup="dialog"' : '' ?>
                    >
                        <?= $item['label'] ?>
                    </a>
                <?php endforeach; ?>

                <div class="mobile-cta-wrap">
                    <a href="/contact.php" class="mobile-cta">
                        Get Free Consultation
                    </a>
                </div>

                <!-- Mobile contact info -->
                <div class="mobile-contact">
                    <a href="mailto:info@webtecmart.com">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                        info@webtecmart.com
                    </a>
                    <a href="tel:+919999674255">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        +91-9999674255
                    </a>
                    <a href="tel:+919511012625">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 14h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H4a1 1 0 0 1-1-1v-7a9 9 0 0 1 18 0v7a1 1 0 0 1-1 1h-2a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3"/><path d="M21 16v2a4 4 0 0 1-4 4h-5"/></svg>
                        Tech Support: +91-9511012625
                    </a>
                </div>

                <!-- Social proof -->
                <div class="mobile-proof">
                    <span class="item">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" stroke="none"><path d="M12 2 9.5 8.5 3 9.2l4.9 4.2-1.4 6.6L12 16.7 17.5 20l-1.4-6.6L21 9.2l-6.5-.7z"/></svg>
                        500+ Brands
                    </span>
                    <span class="item">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" stroke="none"><path d="M12 2 9.5 8.5 3 9.2l4.9 4.2-1.4 6.6L12 16.7 17.5 20l-1.4-6.6L21 9.2l-6.5-.7z"/></svg>
                        13+ Years
                    </span>
                </div>
            </div>
        </div>
    </header>

    <div class="modal fade services-modal" id="servicesModal" tabindex="-1" aria-labelledby="servicesModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close services"></button>
                </div>
                <div class="modal-body">
                    <div class="services-modal-grid">
                        <?php foreach ($serviceNavItems as $index => $service): ?>
                            <a class="services-modal-link" href="<?= e($service['path']) ?>">
                                <span class="services-modal-icon" aria-hidden="true"><?= $index === 0 ? '↗' : sprintf('%02d', $index) ?></span>
                                <span>
                                    <span class="services-modal-link-title"><?= e($service['label']) ?></span>
                                    <span class="services-modal-link-description"><?= e($service['description']) ?></span>
                                </span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php renderPageAddons($current); ?>

    <script>
        (function () {
            const menuToggle = document.getElementById('menuToggle');
            const mobileMenu = document.getElementById('mobileMenu');
            const siteHeader = document.getElementById('siteHeader');
            const menuIcon = document.getElementById('menuIcon');
            const servicesModal = document.getElementById('servicesModal');
            const headerCta = document.querySelector('.header-cta');

            const menuIconSVG = `<line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/>`;
            const closeIconSVG = `<line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>`;
            const closeMobileMenu = () => {
                mobileMenu.classList.remove('open');
                menuToggle.classList.remove('open');
                menuToggle.setAttribute('aria-expanded', 'false');
                menuIcon.innerHTML = menuIconSVG;
            };

            menuToggle.addEventListener('click', (e) => {
                e.stopPropagation();
                const isOpen = mobileMenu.classList.toggle('open');
                menuToggle.classList.toggle('open', isOpen);
                menuToggle.setAttribute('aria-expanded', isOpen);
                menuIcon.innerHTML = isOpen ? closeIconSVG : menuIconSVG;
            });

            document.addEventListener('click', (e) => {
                if (!siteHeader.contains(e.target) && mobileMenu.classList.contains('open')) {
                    closeMobileMenu();
                }
            });

            if (servicesModal) {
                servicesModal.addEventListener('hidden.bs.modal', closeMobileMenu);
            }

            window.addEventListener('scroll', () => {
                siteHeader.classList.toggle('scrolled', window.scrollY > 20);
            }, { passive: true });

            /* CTA pointer spotlight */
            if (headerCta) {
                headerCta.addEventListener('pointermove', (e) => {
                    const r = headerCta.getBoundingClientRect();
                    headerCta.style.setProperty('--bx', (e.clientX - r.left) + 'px');
                    headerCta.style.setProperty('--by', (e.clientY - r.top) + 'px');
                });
            }
        })();
    </script>
</body>
</html>