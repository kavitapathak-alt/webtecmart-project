<?php
require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../functions.php';

$current = currentPage();
$packagesPageMeta = $current === 'packages.php' ? packagesPageContent() : null;
$serviceNavItems = [
    ['label' => 'All Services', 'path' => '/services.php', 'description' => 'Explore our complete suite of digital marketing and growth services.'],
    ['label' => 'Search Engine Optimization', 'path' => '/search-engine-optimization.php', 'description' => 'Rank higher on Google, capture intent traffic, and drive consistent inbound leads.'],
    ['label' => 'B2B & Exhibition SEO', 'path' => '/b2b-exhibition-seo.php', 'description' => 'Specialized SEO for trade fairs, exhibitions, B2B exporters, and manufacturing brands.'],
    ['label' => 'SEO Services in Delhi', 'path' => '/seo-services-delhi.php', 'description' => 'Top SEO company in Delhi NCR delivering #1 Google rankings & local customer growth.'],
    ['label' => 'SEO Audit Services', 'path' => '/seo-audit.php', 'description' => 'Forensic 100+ checkpoint diagnostic uncovering crawl, speed, and indexing bottlenecks.'],
    ['label' => 'Website Design & Development', 'path' => '/website-design-development.php', 'description' => 'Fast, conversion-focused, mobile-first websites engineered to turn visitors into buyers.'],
    ['label' => 'Search Engine Marketing (Google Ads)', 'path' => '/search-engine-marketing.php', 'description' => 'High-ROI PPC and Google Search/Display ad campaigns managed by certified experts.'],
    ['label' => 'Social Media Optimization & Marketing', 'path' => '/social-media-optimization.php', 'description' => 'Build an engaged community and scale your presence across Instagram, LinkedIn, and Meta.'],
    ['label' => 'Digital Business Branding', 'path' => '/digital-business-branding.php', 'description' => 'Create a memorable brand identity, distinctive logo, and scalable brand positioning.'],
    ['label' => 'Mobile App Development', 'path' => '/mobile-app-development.php', 'description' => 'Native and hybrid iOS & Android apps built for performance and user retention.'],
    ['label' => 'E-commerce SEO', 'path' => '/ecommerce-seo.php', 'description' => 'Scale online store sales through product schema, category optimization, and technical search.'],
    ['label' => 'Content Marketing', 'path' => '/content-marketing.php', 'description' => 'Authority-building articles, case studies, and content funnels that attract and educate buyers.'],
    ['label' => 'Performance Marketing', 'path' => '/performance-marketing.php', 'description' => 'Data-driven paid ads across Meta, Google, and YouTube with relentless ROAS focus.'],
    ['label' => 'Local SEO', 'path' => '/local-seo.php', 'description' => 'Dominate Google Maps & 3-pack local search results to drive calls and store visits.'],
];

// Dynamically enrich navigation items with live database records
$dbPagesBySlugNav = [];
foreach (serviceDetailPages() as $dp) {
    if (!empty($dp['slug'])) $dbPagesBySlugNav[$dp['slug']] = $dp;
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
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        :root {
            --bg: #FBF8F1;
            --primary: #C4007A;
            --primary-dark: #A3005F;
            --primary-light: #E0398F;
            --deep: #1A1A1A;
            --muted: #6B7280;
            --gold: #F4C430;
            --border-soft: rgba(196, 0, 122, 0.1);

            --gradient-primary: linear-gradient(90deg, #C4007A, #E0398F);
            --gradient-topbar: linear-gradient(90deg, #A3005F, #C4007A, #E0398F);

            --topbar-h: 36px;
            --header-h: 84px;
        }

        * { box-sizing: border-box; }

        html {
            scroll-behavior: smooth;
            overflow-x: hidden;
        }

        body {
            font-family: var(--font-family-base);
            background: var(--bg);
            color: var(--deep);
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

        /* ===== TOP BAR ===== */
        .top-bar {
            background: var(--gradient-topbar);
            color: #fff;
            font-size: 13px;
            font-weight: 500;
            letter-spacing: 0.02em;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1001;
            min-height: var(--topbar-h);
            overflow: hidden;
            display: flex;
            align-items: center;
        }

        /* Dot pattern overlay */
        .top-bar::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: radial-gradient(rgba(255,255,255,0.15) 1px, transparent 1px);
            background-size: 20px 20px;
            opacity: 0.3;
            pointer-events: none;
        }

        .top-bar-inner {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 24px;
            min-height: var(--topbar-h);
            padding: 8px 0;
            position: relative;
            z-index: 1;
            width: 100%;
        }

        .top-bar-item {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: rgba(255, 255, 255, 0.9);
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .top-bar-item:hover {
            color: var(--gold);
            transform: scale(1.05);
        }

        .top-bar-item svg {
            width: 14px;
            height: 14px;
            flex-shrink: 0;
        }

        .top-bar-divider {
            width: 1px;
            height: 16px;
            background: rgba(255, 255, 255, 0.25);
        }

        /* ===== HEADER ===== */
        .site-header {
            background: rgba(251, 248, 241, 0.95);
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            border-bottom: 1px solid var(--border-soft);
            box-shadow: 0 4px 20px rgba(196, 0, 122, 0.10);
            position: fixed;
            top: var(--topbar-h);
            left: 0;
            right: 0;
            width: 100%;
            z-index: 1000;
            transition: all 0.35s ease;
            height: auto;
            min-height: var(--header-h);
        }

        .site-header.scrolled {
            background: rgba(251, 248, 241, 0.98);
            box-shadow: 0 4px 30px rgba(196, 0, 122, 0.15);
        }

        /* Animated bottom accent line */
        .site-header::after {
            content: '';
            position: absolute;
            left: 0; right: 0; bottom: 0;
            height: 3px;
            background: linear-gradient(90deg, transparent, var(--primary), transparent);
        }

        .site-header::before {
            content: '';
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            bottom: 0;
            height: 3px;
            width: 33.333%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            animation: headerPulse 2.5s ease-in-out infinite;
        }

        @keyframes headerPulse {
            0%, 100% { opacity: 0.6; }
            50% { opacity: 1; }
        }

        .nav-wrap {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            padding: 6px 0;
            min-height: var(--header-h);
        }

        /* ===== BRAND / LOGO ===== */
        .brand {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: var(--deep);
            flex-shrink: 0;
            transition: all 0.3s ease;
        }

        .brand-logo-wrap {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            margin-right: -14px;
        }

        .brand-logo-wrap::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 9999px;
            background: rgba(196, 0, 122, 0.1);
            filter: blur(20px);
            transform: scale(0.75);
            transition: transform 0.5s ease;
        }

        .brand:hover .brand-logo-wrap::before {
            transform: scale(1);
        }

        .brand-logo {
            height: 72px;
            width: 72px;
            max-width: 72px;
            object-fit: contain;
            position: relative;
            z-index: 10;
            transition: all 0.3s ease;
        }

        .brand:hover .brand-logo {
            transform: scale(1.1) rotate(3deg);
        }

        .brand-text {
            display: flex;
            flex-direction: column;
            line-height: 1;
        }

        .brand-name {
            font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--deep);
            letter-spacing: -0.02em;
            line-height: 1;
            margin: 0;
            transition: letter-spacing 0.3s ease;
        }

        .brand:hover .brand-name {
            letter-spacing: 0;
        }

        .brand-name .accent {
            color: var(--primary);
            position: relative;
        }

        .brand-name .reg-mark {
            position: absolute;
            top: -4px;
            right: -12px;
            font-size: 8px;
            background: var(--primary);
            color: #fff;
            padding: 2px 5px;
            border-radius: 9999px;
            font-weight: 700;
            letter-spacing: 0;
        }

        .brand-tagline {
            font-size: 10px;
            color: rgba(196, 0, 122, 0.7);
            letter-spacing: 0.25em;
            text-transform: uppercase;
            margin-top: 4px;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .brand:hover .brand-tagline {
            color: rgba(196, 0, 122, 0.9);
        }

        /* Fallback icon */
        .brand-icon {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background: var(--gradient-primary);
            color: #fff;
            display: grid;
            place-items: center;
            font-weight: 800;
            font-size: 1.7rem;
            box-shadow: 0 0 0 3px rgba(196, 0, 122, 0.2), 0 10px 25px -5px rgba(163, 19, 79, 0.22);
            flex-shrink: 0;
        }

        /* ===== NAVIGATION ===== */
        .main-nav {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .nav-link {
            color: var(--deep);
            font-weight: 500;
            font-size: 14px;
            padding: 8px 16px;
            border-radius: 8px;
            white-space: nowrap;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-link:hover {
            color: var(--primary);
            background: rgba(196, 0, 122, 0.05);
        }

        .nav-link.active {
            color: var(--primary);
        }

        .services-modal .modal-content {
            height: min(580px, calc(100vh - 40px));
            overflow: hidden;
            border: 1px solid rgba(196, 0, 122, 0.14);
            border-radius: 24px;
            background: #FBF8F1;
            box-shadow: 0 24px 80px rgba(31, 27, 42, 0.22);
        }

        .services-modal .modal-dialog {
            width: calc(100% - 48px);
            max-width: 1320px;
        }

        .services-modal .modal-header {
            padding: 24px 28px 16px;
            border: 0;
        }

        .services-modal-kicker {
            margin: 0 0 5px;
            color: var(--primary);
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
        }

        .services-modal-title {
            margin: 0;
            color: var(--deep);
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: clamp(1.35rem, 3vw, 1.8rem);
            font-weight: 800;
        }

        .services-modal .modal-body {
            padding: 8px 28px 28px;
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
            border: 1px solid rgba(196, 0, 122, 0.12);
            border-radius: 16px;
            background: #fff;
            color: var(--deep);
            text-decoration: none;
            transition: transform 0.2s ease, border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .services-modal-link:hover,
        .services-modal-link:focus-visible {
            transform: translateY(-2px);
            border-color: rgba(196, 0, 122, 0.42);
            box-shadow: 0 10px 24px rgba(196, 0, 122, 0.1);
            color: var(--primary-dark);
        }

        .services-modal-icon {
            display: grid;
            width: 38px;
            height: 38px;
            flex: 0 0 38px;
            place-items: center;
            border-radius: 12px;
            background: rgba(196, 0, 122, 0.09);
            color: var(--primary);
            font-size: 1rem;
            font-weight: 800;
        }

        .services-modal-link-title {
            display: block;
            margin: 0 0 4px;
            font-size: 0.92rem;
            font-weight: 700;
            line-height: 1.35;
        }

        .services-modal-link-description {
            display: block;
            color: #6B7280;
            font-size: 0.78rem;
            line-height: 1.5;
        }

        @media (max-width: 575px) {
            .services-modal .modal-dialog { width: auto; margin: 12px; }
            .services-modal .modal-content { height: auto; max-height: calc(100vh - 24px); }
            .services-modal .modal-header { padding: 20px 20px 14px; }
            .services-modal .modal-body { padding: 8px 20px 20px; }
            .services-modal-grid { grid-template-columns: 1fr; gap: 9px; }
            .services-modal-link { min-height: auto; padding: 13px; }
        }

        /* Active indicator */
        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: 4px;
            left: 50%;
            transform: translateX(-50%);
            width: 16px;
            height: 2px;
            background: var(--primary);
            border-radius: 9999px;
        }

        /* Hover underline */
        .nav-link::before {
            content: '';
            position: absolute;
            bottom: 4px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background: var(--primary);
            border-radius: 9999px;
            transition: width 0.3s ease;
        }

        .nav-link:hover::before {
            width: 16px;
        }

        /* ===== CTA BUTTON ===== */
        .header-cta {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border-radius: 9999px;
            background: linear-gradient(90deg, #C4007A, #E0398F);
            padding: 12px 28px;
            font-weight: 600;
            font-size: 14px;
            color: #fff;
            box-shadow: 0 10px 15px -3px rgba(196, 0, 122, 0.3);
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            overflow: hidden;
            flex-shrink: 0;
            cursor: pointer;
            text-decoration: none;
        }

        .header-cta .cta-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, #A3005F, #C4007A);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .header-cta .cta-text {
            position: relative;
            z-index: 10;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .header-cta svg {
            width: 14px;
            height: 14px;
            transition: transform 0.5s ease;
        }

        .header-cta:hover {
            transform: scale(1.05);
            box-shadow: 0 20px 25px -5px rgba(196, 0, 122, 0.4);
        }

        .header-cta:hover .cta-overlay {
            opacity: 1;
        }

        .header-cta:hover svg {
            transform: rotate(180deg);
        }

        /* ===== MOBILE MENU TOGGLE ===== */
        .menu-toggle {
            display: none;
            width: 44px;
            height: 44px;
            border-radius: 9999px;
            background: rgba(255, 255, 255, 0.5);
            border: 1px solid rgba(196, 0, 122, 0.2);
            color: var(--primary);
            cursor: pointer;
            align-items: center;
            justify-content: center;
            padding: 0;
            transition: all 0.3s ease;
            flex-shrink: 0;
        }

        .menu-toggle:hover {
            background: var(--primary);
            color: #fff;
            border-color: var(--primary);
            box-shadow: 0 8px 20px -4px rgba(196, 0, 122, 0.25);
        }

        .menu-toggle svg {
            width: 20px;
            height: 20px;
            transition: transform 0.3s ease;
        }

        .menu-toggle.open svg {
            transform: rotate(90deg);
        }

        /* ===== MOBILE MENU PANEL ===== */
        .mobile-menu {
            display: none;
            background: #FBF8F1;
            border-top: 1px solid var(--border-soft);
            padding: 16px 0 24px;
            box-shadow: 0 25px 50px -12px rgba(31, 27, 42, 0.18);
            animation: slideDown 0.3s ease-out;
            max-height: calc(100vh - var(--header-h) - var(--topbar-h));
            overflow-y: auto;
            overflow-x: hidden;
            width: 100%;
        }

        .mobile-menu.open {
            display: block;
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-10px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .mobile-menu-inner {
            padding: 0 24px;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .mobile-menu .nav-link {
            display: block;
            width: 100%;
            padding: 12px 16px;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 500;
            color: var(--deep);
            text-align: left;
        }

        .mobile-menu .nav-link::before,
        .mobile-menu .nav-link::after {
            display: none;
        }

        .mobile-menu .nav-link:hover {
            color: var(--primary);
            background: rgba(196, 0, 122, 0.05);
        }

        .mobile-menu .nav-link.active {
            color: var(--primary);
            background: rgba(196, 0, 122, 0.08);
        }

        .mobile-cta-wrap {
            padding-top: 12px;
        }

        .mobile-cta {
            display: block;
            width: 100%;
            border-radius: 9999px;
            background: linear-gradient(90deg, #C4007A, #E0398F);
            padding: 14px 20px;
            text-align: center;
            font-weight: 600;
            color: #fff;
            font-size: 0.95rem;
            box-shadow: 0 8px 15px -3px rgba(196, 0, 122, 0.3);
            transition: all 0.3s ease;
        }

        .mobile-cta:hover {
            transform: scale(1.02);
            box-shadow: 0 12px 20px -4px rgba(196, 0, 122, 0.4);
            color: #fff;
        }

        /* Mobile contact info */
        .mobile-contact {
            padding-top: 16px;
            margin-top: 12px;
            border-top: 1px solid var(--border-soft);
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .mobile-contact a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px;
            border-radius: 8px;
            font-size: 0.875rem;
            color: rgba(26, 26, 26, 0.8);
            transition: all 0.3s ease;
        }

        .mobile-contact a:hover {
            background: rgba(196, 0, 122, 0.05);
            color: var(--primary);
        }

        .mobile-contact svg {
            width: 16px;
            height: 16px;
            color: var(--primary);
            flex-shrink: 0;
        }

        /* Mobile social proof */
        .mobile-proof {
            padding-top: 12px;
            margin-top: 8px;
            border-top: 1px solid var(--border-soft);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 16px;
            font-size: 0.75rem;
            color: #9CA3AF;
        }

        .mobile-proof .item {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .mobile-proof svg {
            width: 12px;
            height: 12px;
            color: var(--primary);
        }

        .mobile-proof .divider {
            width: 1px;
            height: 12px;
            background: #E5E7EB;
        }

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
            .brand-name { font-size: 1.375rem; }
            .nav-link { padding: 8px 12px; font-size: 13px; }
            .header-cta { padding: 10px 22px; font-size: 13px; }
        }

        /* Switch to mobile menu */
        @media (max-width: 1280px) {
            .main-nav { display: none; }
            .header-cta { display: none; }
            .menu-toggle { display: flex; }
        }

        @media (max-width: 991px) {
            :root { --header-h: 76px; }

            .top-bar { font-size: 0.75rem; }
            .top-bar-inner { gap: 16px; }
            .brand-logo { height: 62px; width: 62px; max-width: 62px; }
            .brand-logo-wrap { margin-right: -12px; }
            .brand-name { font-size: 1.25rem; }
            .brand-tagline { font-size: 9px; letter-spacing: 0.2em; }
            .brand-name .reg-mark { font-size: 8px; top: -3px; right: -10px; padding: 1px 4px; }
        }

        @media (max-width: 767px) {
            :root { --topbar-h: 34px; --header-h: 76px; }

            /* Hide top bar on mobile (matches Next.js `hidden md:block`) */
            .top-bar { display: none; }

            body { padding-top: var(--header-h); }

            .site-header { top: 0; }
            .site-header.scrolled { top: 0; }

            .brand-logo { height: 64px; width: 64px; max-width: 64px; }
            .brand-logo-wrap { margin-right: -10px; }
            .brand-name { font-size: 1.1rem; }
            .brand-tagline { font-size: 10px; letter-spacing: 0.15em; }
            .brand-name .reg-mark { font-size: 8px; top: -2px; right: -8px; padding: 1px 3px; }

            .menu-toggle { width: 40px; height: 40px; }
            .menu-toggle svg { width: 18px; height: 18px; }
        }

        @media (max-width: 380px) {
            .brand-logo { height: 56px; width: 56px; max-width: 56px; }
            .brand-logo-wrap { margin-right: -9px; }
            .brand-name { font-size: 1rem; }
            .brand-tagline { font-size: 10px; }
        }
    </style>
    <link rel="stylesheet" href="/assets/css/typography.css">
    <link rel="stylesheet" href="/assets/css/design-system.css">
    <script defer src="/assets/js/webtecmart-motion.js"></script>
</head>
<body>
    <!-- ===== TOP BAR (hidden on mobile, like Next.js `hidden md:block`) ===== -->
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
                <span class="brand-logo-wrap">
                    <img
                        src="/assets/images/webtecmart-logo.png"
                        alt="WebTecMart Logo"
                        class="brand-logo"
                        onerror="this.style.display='none'; this.parentElement.style.display='none'; this.parentElement.nextElementSibling.style.display='grid';"
                    >
                </span>
                <span class="brand-icon" style="display:none;">W</span>

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
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/><path d="M20 3v4"/><path d="M22 5h-4"/><path d="M4 17v2"/><path d="M5 18H3"/></svg>
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
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/></svg>
                        500+ Brands
                    </span>
                    <span class="divider"></span>
                    <span class="item">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/></svg>
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

            servicesModal.addEventListener('hidden.bs.modal', closeMobileMenu);

            window.addEventListener('scroll', () => {
                siteHeader.classList.toggle('scrolled', window.scrollY > 20);
            }, { passive: true });
        })();
    </script>
</body>
</html>