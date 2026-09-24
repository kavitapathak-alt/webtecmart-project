<?php require_once __DIR__ . '/app/templates/header.php'; ?>

<?php
// ===== Icon Helper =====
function portIcon(string $name): string {
    $icons = [
        'sparkles'   => '<path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/><path d="M20 3v4"/><path d="M22 5h-4"/><path d="M4 17v2"/><path d="M5 18H3"/>',
        'arrow'      => '<path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>',
        'check'      => '<circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/>',
        'external'   => '<path d="M15 3h6v6"/><path d="M10 14 21 3"/><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>',
        'briefcase'  => '<rect width="20" height="14" x="2" y="7" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>',
        'users'      => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
        'award'      => '<circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/>',
        'trending'   => '<polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/>',
        'clock'      => '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>',
        'filter'     => '<polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/>',
        'x'          => '<path d="M18 6 6 18"/><path d="m6 6 12 12"/>',
        'search'     => '<circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/>',
        'rocket'     => '<path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"/><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"/><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"/><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"/>',
        'globe'      => '<circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/>',
        'smartphone' => '<rect width="14" height="20" x="5" y="2" rx="2" ry="2"/><path d="M12 18h.01"/>',
        'code'       => '<path d="m16 18 6-6-6-6"/><path d="m8 6-6 6 6 6"/>',
        'paintbrush' => '<path d="m14.622 17.897-10.68-2.913"/><path d="M18.376 2.622a1 1 0 1 1 3.002 3.002L17.36 9.643a.5.5 0 0 0 0 .707l.944.944a2.41 2.41 0 0 1 0 3.408l-.944.944a.5.5 0 0 1-.707 0L8.354 7.348a.5.5 0 0 1 0-.707l.944-.944a2.41 2.41 0 0 1 3.408 0l.944.944a.5.5 0 0 0 .707 0z"/><path d="M9 8c-1.804 2.71-3.97 3.46-6.583 3.948a.507.507 0 0 0-.302.819l7.32 8.883a1 1 0 0 0 1.185.204C12.735 20.405 16 16.792 16 15"/>',
        'megaphone'  => '<path d="m3 11 18-5v12L3 14v-3z"/><path d="M11.6 16.8a3 3 0 1 1-5.8-1.6"/>',
        'phone'      => '<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>',
    ];
    $path = $icons[$name] ?? '';
    return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">' . $path . '</svg>';
}

// ===== Categories =====
$categories = [
    ['id' => 'all',      'label' => 'All Projects'],
    ['id' => 'branding', 'label' => 'Branding'],
    ['id' => 'web',      'label' => 'Web Design'],
    ['id' => 'seo',      'label' => 'SEO'],
    ['id' => 'social',   'label' => 'Social Media'],
    ['id' => 'app',      'label' => 'App Development'],
];

// ===== Projects =====
$projects = [
    [
        'id' => 1,
        'title' => 'TechSolutions India',
        'category' => 'branding',
        'categoryLabel' => 'Branding',
        'description' => 'Complete digital branding and identity design for a leading tech solutions company. We created a modern, professional brand identity that reflects their innovative approach.',
        'image' => '/portfolio/project-1.jpg',
        'results' => ['300% Brand Recognition', '50% Increase in Leads', 'Award Winning Design'],
        'client' => 'TechSolutions India',
        'year' => '2024',
        'link' => '#',
    ],
    [
        'id' => 2,
        'title' => 'StyleHub Fashion',
        'category' => 'web',
        'categoryLabel' => 'Web Design',
        'description' => 'Responsive e-commerce website design and development for a premium fashion brand. The website features seamless shopping experience and modern UI/UX.',
        'image' => '/portfolio/project-2.jpg',
        'results' => ['400% Increase in Sales', '200% More Traffic', '5-Star User Rating'],
        'client' => 'StyleHub Fashion',
        'year' => '2024',
        'link' => '#',
    ],
    [
        'id' => 3,
        'title' => 'GreenTech Solutions',
        'category' => 'seo',
        'categoryLabel' => 'SEO',
        'description' => 'Comprehensive SEO strategy that helped a green tech company rank #1 on Google for 50+ keywords and achieve 300% organic growth.',
        'image' => '/portfolio/project-3.jpg',
        'results' => ['50+ Keywords Ranked #1', '300% Organic Growth', '200% More Leads'],
        'client' => 'GreenTech Solutions',
        'year' => '2023',
        'link' => '#',
    ],
    [
        'id' => 4,
        'title' => 'Wellness World',
        'category' => 'social',
        'categoryLabel' => 'Social Media',
        'description' => 'Social media management and content strategy that grew a wellness brand\'s following from 5K to 50K+ followers with 5x engagement.',
        'image' => '/portfolio/project-4.jpg',
        'results' => ['50K+ Followers', '5x Engagement Rate', '200% More Traffic'],
        'client' => 'Wellness World',
        'year' => '2023',
        'link' => '#',
    ],
    [
        'id' => 5,
        'title' => 'FinTech Solutions',
        'category' => 'app',
        'categoryLabel' => 'App Development',
        'description' => 'Cross-platform mobile app for a fintech startup. The app features secure payments, user-friendly interface, and real-time analytics.',
        'image' => '/portfolio/project-5.jpg',
        'results' => ['10K+ Downloads', '4.8 Star Rating', '100K+ Transactions'],
        'client' => 'FinTech Solutions',
        'year' => '2024',
        'link' => '#',
    ],
    [
        'id' => 6,
        'title' => 'DigitalFirst Agency',
        'category' => 'branding',
        'categoryLabel' => 'Branding',
        'description' => 'Complete rebranding for a digital marketing agency including logo design, brand guidelines, and marketing collateral.',
        'image' => '/portfolio/project-6.jpg',
        'results' => ['200% Brand Recognition', '150% More Inquiries', 'Industry Award'],
        'client' => 'DigitalFirst Agency',
        'year' => '2024',
        'link' => '#',
    ],
    [
        'id' => 7,
        'title' => 'GreenEnergy Hub',
        'category' => 'seo',
        'categoryLabel' => 'SEO',
        'description' => 'Local SEO campaign for a green energy company that increased foot traffic and online inquiries by 300% across 10+ locations.',
        'image' => '/portfolio/project-7.jpg',
        'results' => ['10+ Locations Ranked #1', '300% Foot Traffic', '500% Online Inquiries'],
        'client' => 'GreenEnergy Hub',
        'year' => '2023',
        'link' => '#',
    ],
    [
        'id' => 8,
        'title' => 'ShopSmart App',
        'category' => 'app',
        'categoryLabel' => 'App Development',
        'description' => 'E-commerce mobile app with AI-powered product recommendations, seamless checkout, and personalized shopping experience.',
        'image' => '/portfolio/project-8.jpg',
        'results' => ['50K+ Downloads', '4.9 Star Rating', '200% More Sales'],
        'client' => 'ShopSmart',
        'year' => '2024',
        'link' => '#',
    ],
    [
        'id' => 9,
        'title' => 'EcoFriendly Living',
        'category' => 'web',
        'categoryLabel' => 'Web Design',
        'description' => 'Modern, sustainable website design for an eco-friendly lifestyle brand with focus on user experience and conversion optimization.',
        'image' => '/portfolio/project-9.jpg',
        'results' => ['150% More Conversions', '100% Traffic Increase', 'Best Design Award'],
        'client' => 'EcoFriendly Living',
        'year' => '2023',
        'link' => '#',
    ],
];

$stats = [
    ['icon' => 'briefcase', 'value' => '500+', 'label' => 'Projects Delivered'],
    ['icon' => 'users',     'value' => '300+', 'label' => 'Happy Clients'],
    ['icon' => 'award',     'value' => '50+',  'label' => 'Awards Won'],
    ['icon' => 'trending',  'value' => '98%',  'label' => 'Client Satisfaction'],
];

// Map category → icon
$categoryIconMap = [
    'branding' => 'paintbrush',
    'web'      => 'code',
    'seo'      => 'rocket',
    'social'   => 'megaphone',
    'app'      => 'smartphone',
];
?>

<style>
    /* ============================================================
       PORTFOLIO PAGE — Pixel-perfect Next.js clone
       ============================================================ */
    .port-page {
        position: relative;
        width: 100%;
        background: #FBF8F1;
        overflow: hidden;
        color: #1F1B2A;
    }

    .port-container {
        max-width: 1280px;
        padding-left: 16px;
        padding-right: 16px;
        margin: 0 auto;
        width: 100%;
        position: relative;
        z-index: 10;
    }

    /* Decorative Background */
    .port-bg {
        position: absolute;
        inset: 0;
        pointer-events: none;
    }
    .port-bg-blob-1 {
        position: absolute;
        top: 0; right: 0;
        width: 50%; height: 50%;
        background: linear-gradient(to bottom left, rgba(196, 0, 122, 0.05), transparent);
        border-radius: 9999px;
        filter: blur(64px);
    }
    .port-bg-blob-2 {
        position: absolute;
        bottom: 0; left: 0;
        width: 33.333%; height: 50%;
        background: linear-gradient(to top right, rgba(196, 0, 122, 0.05), transparent);
        border-radius: 9999px;
        filter: blur(64px);
    }
    .port-bg-shape {
        position: absolute;
        fill: none;
        stroke: #C4007A;
        opacity: 0.1;
    }
    .port-bg-shape-1 { top: 80px; right: 40px; width: 128px; height: 128px; stroke-width: 2; }
    .port-bg-shape-2 { bottom: 80px; left: 40px; width: 160px; height: 160px; stroke-width: 1.5; }

    /* ===== HERO ===== */
    .port-hero {
        position: relative;
        padding: 48px 0;
        text-align: center;
    }
    .port-pill {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(196, 0, 122, 0.1);
        padding: 8px 16px;
        border-radius: 9999px;
        margin-bottom: 16px;
    }
    .port-pill svg { width: 16px; height: 16px; color: #C4007A; flex-shrink: 0; }
    .port-pill span {
        color: #C4007A;
        font-weight: 600;
        font-size: 14px;
        letter-spacing: 0.05em;
        text-transform: uppercase;
    }

    .port-h1 {
        font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
        font-size: 2.25rem;
        font-weight: 700;
        color: #111827;
        line-height: 1.1;
        margin: 0;
    }
    .port-h1 .accent {
        color: #C4007A;
        position: relative;
        display: inline-block;
    }
    .port-h1 .accent svg {
        position: absolute;
        left: 0;
        bottom: -8px;
        width: 100%;
        height: 8px;
    }

    .port-subtitle {
        color: #6B7280;
        font-size: 1rem;
        max-width: 768px;
        margin: 16px auto 0;
        line-height: 1.625;
    }
    @media (min-width: 768px) { .port-subtitle { font-size: 1.125rem; } }

    /* ===== Stats ===== */
    .port-stats {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 16px;
        margin-bottom: 48px;
    }
    @media (min-width: 768px) {
        .port-stats { grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 24px; }
    }

    .port-stat {
        background: #fff;
        border-radius: 16px;
        padding: 24px;
        text-align: center;
        border: 1px solid rgba(196, 0, 122, 0.1);
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }
    .port-stat:hover {
        box-shadow: 0 10px 15px -3px rgba(196, 0, 122, 0.1);
        transform: translateY(-4px);
    }
    .port-stat svg {
        width: 24px;
        height: 24px;
        color: #C4007A;
        margin: 0 auto 8px;
        display: block;
    }
    .port-stat-value {
        font-size: 1.5rem;
        font-weight: 700;
        color: #C4007A;
    }
    @media (min-width: 768px) { .port-stat-value { font-size: 1.875rem; } }
    .port-stat-label {
        font-size: 0.875rem;
        font-weight: 600;
        color: #111827;
    }

    /* ===== Filter Buttons ===== */
    .port-filters {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        gap: 8px;
        margin-bottom: 40px;
    }

    .port-filter {
        padding: 10px 20px;
        border-radius: 9999px;
        font-size: 0.875rem;
        font-weight: 600;
        border: 1px solid rgba(196, 0, 122, 0.1);
        background: #fff;
        color: #4B5563;
        cursor: pointer;
        font-family: inherit;
        transition: all 0.3s ease;
    }
    .port-filter:hover {
        background: #FDF0F6;
        color: #C4007A;
    }
    .port-filter.active {
        background: #C4007A;
        color: #fff;
        border-color: #C4007A;
        box-shadow: 0 10px 15px -3px rgba(196, 0, 122, 0.3);
    }

    /* ===== Projects Grid ===== */
    .port-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 24px;
        margin-bottom: 64px;
    }
    @media (min-width: 768px) {
        .port-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 32px; }
    }
    @media (min-width: 1024px) {
        .port-grid { grid-template-columns: repeat(3, minmax(0, 1fr)); }
    }

    .port-card {
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid rgba(196, 0, 122, 0.1);
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        transition: all 0.5s ease;
    }
    .port-card:hover {
        box-shadow: 0 20px 25px -5px rgba(196, 0, 122, 0.1);
        transform: translateY(-8px);
    }

    /* Image / Icon area */
    .port-img {
        position: relative;
        height: 208px;
        background: linear-gradient(to bottom right, rgba(196, 0, 122, 0.1), #FDF0F6);
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }
    .port-img-icon {
        position: absolute;
        inset: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: transform 0.5s ease;
    }
    .port-card:hover .port-img-icon { transform: scale(1.1); }
    .port-img-icon svg {
        width: 64px;
        height: 64px;
        color: rgba(196, 0, 122, 0.2);
    }

    .port-cat-badge {
        position: absolute;
        top: 12px;
        left: 12px;
        background: #C4007A;
        color: #fff;
        font-size: 12px;
        font-weight: 700;
        padding: 4px 12px;
        border-radius: 9999px;
    }

    .port-year-badge {
        position: absolute;
        bottom: 12px;
        right: 12px;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(4px);
        color: #C4007A;
        font-size: 12px;
        font-weight: 700;
        padding: 4px 12px;
        border-radius: 9999px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }

    .port-hover-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.5);
        opacity: 0;
        transition: opacity 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        border: none;
        cursor: pointer;
        padding: 0;
        font-family: inherit;
    }
    .port-card:hover .port-hover-overlay { opacity: 1; }
    .port-hover-overlay span {
        background: #fff;
        color: #C4007A;
        padding: 8px 16px;
        border-radius: 9999px;
        font-size: 0.875rem;
        font-weight: 700;
    }

    /* Card content */
    .port-body {
        padding: 24px;
    }

    .port-title-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 8px;
        margin-bottom: 8px;
    }
    .port-title {
        font-size: 1.125rem;
        font-weight: 700;
        color: #111827;
        margin: 0;
        transition: color 0.3s ease;
    }
    @media (min-width: 768px) { .port-title { font-size: 1.25rem; } }
    .port-card:hover .port-title { color: #C4007A; }

    .port-client {
        font-size: 12px;
        color: #9CA3AF;
        white-space: nowrap;
    }

    .port-desc {
        font-size: 0.875rem;
        color: #4B5563;
        line-height: 1.625;
        margin: 0 0 16px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .port-results {
        display: flex;
        flex-wrap: wrap;
        gap: 6px;
        margin-bottom: 16px;
    }
    .port-result-tag {
        font-size: 12px;
        background: #FDF0F6;
        color: #C4007A;
        padding: 4px 8px;
        border-radius: 9999px;
    }

    .port-link {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        font-size: 0.875rem;
        font-weight: 600;
        color: #C4007A;
        text-decoration: none;
        transition: gap 0.3s ease;
    }
    .port-link:hover { gap: 8px; }
    .port-link svg { width: 14px; height: 14px; }

    /* Empty state */
    .port-empty {
        text-align: center;
        padding: 48px 0;
    }
    .port-empty svg {
        width: 48px;
        height: 48px;
        color: #D1D5DB;
        margin: 0 auto 16px;
        display: block;
    }
    .port-empty p {
        color: #6B7280;
        font-size: 0.875rem;
        margin: 0;
    }

    /* ===== CTA ===== */
    .port-cta {
        position: relative;
        background: linear-gradient(90deg, #A3005F, #C4007A, #E0398F);
        border-radius: 16px;
        padding: 32px;
        text-align: center;
        overflow: hidden;
    }
    @media (min-width: 768px) { .port-cta { padding: 48px; } }

    .port-cta-pattern {
        position: absolute;
        inset: 0;
        opacity: 0.1;
    }
    .port-cta-pattern svg { width: 100%; height: 100%; }

    .port-cta-inner {
        position: relative;
        z-index: 10;
    }
    .port-cta-inner > svg {
        width: 48px;
        height: 48px;
        color: #fff;
        margin: 0 auto 16px;
        display: block;
    }
    .port-cta-h2 {
        font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
        font-size: 1.5rem;
        font-weight: 700;
        color: #fff;
        margin: 0 0 12px;
    }
    @media (min-width: 768px) { .port-cta-h2 { font-size: 1.875rem; } }

    .port-cta-sub {
        color: rgba(255, 255, 255, 0.8);
        max-width: 672px;
        margin: 0 auto 24px;
        font-size: 0.875rem;
    }
    @media (min-width: 768px) { .port-cta-sub { font-size: 1rem; } }

    .port-cta-btns {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 16px;
    }
    @media (min-width: 640px) { .port-cta-btns { flex-direction: row; } }

    .port-cta-btn-1 {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border-radius: 9999px;
        background: #fff;
        padding: 14px 32px;
        font-weight: 700;
        color: #C4007A;
        text-decoration: none;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }
    .port-cta-btn-1:hover {
        transform: scale(1.02);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3);
        color: #C4007A;
    }
    .port-cta-btn-1 svg { width: 16px; height: 16px; }

    .port-cta-btn-2 {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border-radius: 9999px;
        border: 2px solid rgba(255, 255, 255, 0.3);
        padding: 14px 32px;
        font-weight: 600;
        color: #fff;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    .port-cta-btn-2:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: rgba(255, 255, 255, 0.5);
        color: #fff;
    }

    /* ===== Bottom Decorative ===== */
    .port-bottom-deco {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 12px;
        margin: 40px 0 32px;
    }
    .port-bottom-line {
        width: 48px;
        height: 1px;
        background: linear-gradient(to right, transparent, rgba(196, 0, 122, 0.3));
    }
    .port-bottom-line.right {
        background: linear-gradient(to left, transparent, rgba(196, 0, 122, 0.3));
    }
    .port-bottom-dots {
        display: flex;
        gap: 4px;
        align-items: center;
    }
    .port-bottom-dots span {
        display: block;
        width: 6px;
        height: 6px;
        border-radius: 9999px;
        background: rgba(196, 0, 122, 0.2);
    }
    .port-bottom-dots span.active {
        width: 24px;
        background: #C4007A;
    }

    /* ===== Project Modal ===== */
    .port-modal {
        position: fixed;
        inset: 0;
        z-index: 9999;
        display: none;
        align-items: center;
        justify-content: center;
        padding: 16px;
        opacity: 0;
        transition: opacity 0.25s ease;
    }
    .port-modal.open {
        display: flex;
        opacity: 1;
    }
    .port-modal-backdrop {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.7);
        backdrop-filter: blur(4px);
    }
    .port-modal-box {
        position: relative;
        width: 100%;
        max-width: 640px;
        max-height: 90vh;
        overflow-y: auto;
        border-radius: 16px;
        border: 1px solid rgba(196, 0, 122, 0.1);
        background: #fff;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        transform: translateY(20px) scale(0.97);
        transition: transform 0.25s ease;
    }
    .port-modal.open .port-modal-box {
        transform: translateY(0) scale(1);
    }
    .port-modal-close {
        position: absolute;
        top: 12px;
        right: 12px;
        z-index: 10;
        width: 36px;
        height: 36px;
        border-radius: 9999px;
        background: rgba(196, 0, 122, 0.1);
        color: #C4007A;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.2s ease;
    }
    .port-modal-close:hover { background: rgba(196, 0, 122, 0.2); }
    .port-modal-close svg { width: 16px; height: 16px; }

    .port-modal-hero {
        height: 160px;
        background: linear-gradient(to bottom right, rgba(196, 0, 122, 0.15), #FDF0F6);
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }
    .port-modal-hero svg {
        width: 64px;
        height: 64px;
        color: rgba(196, 0, 122, 0.4);
    }

    .port-modal-body {
        padding: 24px;
    }
    .port-modal-cat {
        display: inline-block;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: #C4007A;
        background: rgba(196, 0, 122, 0.1);
        padding: 4px 12px;
        border-radius: 9999px;
        margin-bottom: 12px;
    }
    .port-modal-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #111827;
        margin: 0 0 4px;
    }
    .port-modal-meta {
        font-size: 0.875rem;
        color: #6B7280;
        margin: 0 0 16px;
    }
    .port-modal-desc {
        font-size: 0.9375rem;
        color: #4B5563;
        line-height: 1.625;
        margin: 0 0 20px;
    }
    .port-modal-results-title {
        font-size: 0.875rem;
        font-weight: 700;
        color: #111827;
        margin: 0 0 8px;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
    .port-modal-results {
        display: flex;
        flex-direction: column;
        gap: 8px;
        margin-bottom: 24px;
    }
    .port-modal-result {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 0.875rem;
        color: #4B5563;
    }
    .port-modal-result svg {
        width: 16px;
        height: 16px;
        color: #C4007A;
        flex-shrink: 0;
    }
    .port-modal-cta {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border-radius: 9999px;
        background: linear-gradient(90deg, #C4007A, #E0398F);
        padding: 12px 24px;
        font-weight: 700;
        color: #fff;
        text-decoration: none;
        box-shadow: 0 10px 15px -3px rgba(196, 0, 122, 0.25);
        transition: all 0.3s ease;
        font-size: 0.875rem;
        border: none;
        cursor: pointer;
    }
    .port-modal-cta:hover {
        transform: scale(1.02);
        box-shadow: 0 20px 25px -5px rgba(196, 0, 122, 0.35);
        color: #fff;
    }
    .port-modal-cta svg { width: 14px; height: 14px; }
</style>

<main class="port-page" id="portfolioPage">

    <!-- Decorative Background -->
    <div class="port-bg">
        <div class="port-bg-blob-1"></div>
        <div class="port-bg-blob-2"></div>
        <svg class="port-bg-shape port-bg-shape-1" viewBox="0 0 100 100">
            <rect x="15" y="15" width="70" height="70" transform="rotate(45 50 50)"/>
        </svg>
        <svg class="port-bg-shape port-bg-shape-2" viewBox="0 0 100 100">
            <circle cx="50" cy="50" r="35"/>
        </svg>
    </div>

    <div class="port-container">

        <!-- ===== HERO ===== -->
        <div class="port-hero">
            <div class="port-pill">
                <?= portIcon('sparkles') ?>
                <span>Our Portfolio</span>
            </div>

            <h1 class="port-h1">
                Our
                <span class="accent">
                    Work
                    <svg viewBox="0 0 300 8" preserveAspectRatio="none">
                        <path d="M2 4C60 1 240 1 298 4" stroke="#C4007A" stroke-width="2" stroke-linecap="round" fill="none" opacity="0.3"/>
                    </svg>
                </span>
            </h1>

            <p class="port-subtitle">
                Explore our portfolio of successful projects and see how we've helped businesses achieve remarkable growth
            </p>
        </div>

        <!-- ===== Stats ===== -->
        <div class="port-stats">
            <?php foreach ($stats as $stat): ?>
                <div class="port-stat">
                    <?= portIcon($stat['icon']) ?>
                    <div class="port-stat-value"><?= htmlspecialchars($stat['value']) ?></div>
                    <div class="port-stat-label"><?= htmlspecialchars($stat['label']) ?></div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- ===== Filters ===== -->
        <div class="port-filters" id="portFilters">
            <?php foreach ($categories as $cat): ?>
                <button
                    type="button"
                    class="port-filter <?= $cat['id'] === 'all' ? 'active' : '' ?>"
                    data-filter="<?= htmlspecialchars($cat['id']) ?>"
                    onclick="portSetFilter('<?= htmlspecialchars($cat['id']) ?>')"
                >
                    <?= htmlspecialchars($cat['label']) ?>
                </button>
            <?php endforeach; ?>
        </div>

        <!-- ===== Projects Grid ===== -->
        <div class="port-grid" id="portGrid">
            <?php foreach ($projects as $p):
                $icon = $categoryIconMap[$p['category']] ?? 'briefcase';
            ?>
                <div class="port-card" data-category="<?= htmlspecialchars($p['category']) ?>">
                    <!-- Image / Icon area -->
                    <div class="port-img">
                        <div class="port-img-icon">
                            <?= portIcon($icon) ?>
                        </div>

                        <div class="port-cat-badge"><?= htmlspecialchars($p['categoryLabel']) ?></div>
                        <div class="port-year-badge"><?= htmlspecialchars($p['year']) ?></div>

                        <button
                            type="button"
                            class="port-hover-overlay"
                            onclick="portOpenModal(<?= (int) $p['id'] ?>)"
                            aria-label="View Details"
                        >
                            <span>View Details</span>
                        </button>
                    </div>

                    <!-- Content -->
                    <div class="port-body">
                        <div class="port-title-row">
                            <h3 class="port-title"><?= htmlspecialchars($p['title']) ?></h3>
                            <span class="port-client"><?= htmlspecialchars($p['client']) ?></span>
                        </div>

                        <p class="port-desc"><?= htmlspecialchars($p['description']) ?></p>

                        <div class="port-results">
                            <?php foreach ($p['results'] as $r): ?>
                                <span class="port-result-tag"><?= htmlspecialchars($r) ?></span>
                            <?php endforeach; ?>
                        </div>

                        <a href="<?= htmlspecialchars($p['link']) ?>" class="port-link" onclick="event.preventDefault(); portOpenModal(<?= (int) $p['id'] ?>);">
                            View Project
                            <?= portIcon('external') ?>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Empty state (hidden by default) -->
        <div class="port-empty" id="portEmpty" style="display: none;">
            <?= portIcon('search') ?>
            <p>No projects found in this category.</p>
        </div>

        <!-- ===== CTA ===== -->
        <div class="port-cta" style="margin-top: 16px;">
            <div class="port-cta-pattern">
                <svg viewBox="0 0 100 100" preserveAspectRatio="none">
                    <defs>
                        <pattern id="cta-grid-portfolio" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="1" height="1" fill="white"/>
                        </pattern>
                    </defs>
                    <rect x="0" y="0" width="100" height="100" fill="url(#cta-grid-portfolio)"/>
                </svg>
            </div>
            <div class="port-cta-inner">
                <?= portIcon('rocket') ?>
                <h2 class="port-cta-h2">Ready to Create Your Success Story?</h2>
                <p class="port-cta-sub">
                    Let's work together to create amazing digital experiences that help your business grow.
                </p>

                <div class="port-cta-btns">
                    <a href="/contact.php" class="port-cta-btn-1">
                        Start Your Project
                        <?= portIcon('arrow') ?>
                    </a>
                    <a href="/services.php" class="port-cta-btn-2">
                        Explore Our Services
                    </a>
                </div>
            </div>
        </div>

        <!-- ===== Bottom Decorative ===== -->
        <div class="port-bottom-deco">
            <div class="port-bottom-line"></div>
            <div class="port-bottom-dots">
                <span></span><span></span><span></span>
                <span class="active"></span>
                <span></span><span></span><span></span>
            </div>
            <div class="port-bottom-line right"></div>
        </div>

    </div>
</main>

<!-- ===== Project Modal ===== -->
<div class="port-modal" id="portModal">
    <div class="port-modal-backdrop" onclick="portCloseModal()"></div>
    <div class="port-modal-box" id="portModalBox"></div>
</div>

<script>
    // ===== Data for JS =====
    const PORT_DATA = <?= json_encode($projects, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>;
    const PORT_ICONS = {
        briefcase: `<?= portIcon('briefcase') ?>`,
        users:     `<?= portIcon('users') ?>`,
        award:     `<?= portIcon('award') ?>`,
        trending:  `<?= portIcon('trending') ?>`,
        check:     `<?= portIcon('check') ?>`,
        external:  `<?= portIcon('external') ?>`,
        x:         `<?= portIcon('x') ?>`,
        arrow:     `<?= portIcon('arrow') ?>`,
        rocket:    `<?= portIcon('rocket') ?>`,
        paintbrush:`<?= portIcon('paintbrush') ?>`,
        code:      `<?= portIcon('code') ?>`,
        smartphone:`<?= portIcon('smartphone') ?>`,
        megaphone: `<?= portIcon('megaphone') ?>`,
    };

    const PORT_CATEGORY_ICON = {
        branding: 'paintbrush',
        web:      'code',
        seo:      'rocket',
        social:   'megaphone',
        app:      'smartphone',
    };

    // ===== Filter =====
    let portCurrentFilter = 'all';

    function portSetFilter(filter) {
        portCurrentFilter = filter;

        // Update filter buttons
        document.querySelectorAll('#portFilters .port-filter').forEach((btn) => {
            btn.classList.toggle('active', btn.dataset.filter === filter);
        });

        // Show/hide cards
        let visibleCount = 0;
        document.querySelectorAll('#portGrid .port-card').forEach((card) => {
            const match = (filter === 'all') || (card.dataset.category === filter);
            card.style.display = match ? '' : 'none';
            if (match) visibleCount++;
        });

        // Empty state
        const empty = document.getElementById('portEmpty');
        if (empty) {
            empty.style.display = (visibleCount === 0) ? 'block' : 'none';
        }
    }

    // ===== Modal =====
    function portOpenModal(id) {
        const project = PORT_DATA.find((p) => p.id === id);
        if (!project) return;

        const iconKey = PORT_CATEGORY_ICON[project.category] || 'briefcase';
        const iconSvg = PORT_ICONS[iconKey] || '';

        const resultsHtml = project.results.map((r) => `
            <div class="port-modal-result">
                ${PORT_ICONS.check}
                <span>${r}</span>
            </div>
        `).join('');

        const box = document.getElementById('portModalBox');
        box.innerHTML = `
            <button type="button" class="port-modal-close" onclick="portCloseModal()" aria-label="Close">
                ${PORT_ICONS.x}
            </button>

            <div class="port-modal-hero">
                ${iconSvg}
            </div>

            <div class="port-modal-body">
                <span class="port-modal-cat">${project.categoryLabel}</span>
                <h3 class="port-modal-title">${project.title}</h3>
                <p class="port-modal-meta">${project.client} &middot; ${project.year}</p>
                <p class="port-modal-desc">${project.description}</p>

                <h4 class="port-modal-results-title">Key Results</h4>
                <div class="port-modal-results">
                    ${resultsHtml}
                </div>

                <a href="/contact.php" class="port-modal-cta">
                    Start Your Project
                    ${PORT_ICONS.arrow}
                </a>
            </div>
        `;

        document.getElementById('portModal').classList.add('open');
        document.body.style.overflow = 'hidden';
    }

    function portCloseModal() {
        document.getElementById('portModal').classList.remove('open');
        document.body.style.overflow = '';
    }

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') portCloseModal();
    });
</script>

<?php require_once __DIR__ . '/app/templates/footer.php'; ?>