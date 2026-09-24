<?php require_once __DIR__ . '/app/templates/header.php'; ?>

<?php
// ===== Data =====
$stats = [
    ['icon' => 'award',       'value' => '13+',   'label' => 'Years Experience', 'description' => 'Industry leaders since 2013'],
    ['icon' => 'users',       'value' => '1000+', 'label' => 'Happy Clients',    'description' => 'Businesses strengthened online'],
    ['icon' => 'briefcase',   'value' => '50+',   'label' => 'Expert Team',      'description' => 'Passionate professionals'],
    ['icon' => 'trending',    'value' => '500+',  'label' => 'Brands Trust Us',  'description' => 'Across diverse industries'],
];

$coreValues = [
    [
        'icon' => 'target',
        'title' => 'Concept is King',
        'description' => 'We believe every great digital success starts with a powerful, unique concept that sets your brand apart from the competition.',
    ],
    [
        'icon' => 'lightbulb',
        'title' => 'Innovative Solutions',
        'description' => 'Our futuristic strategies help you stay ahead in competitive markets with cutting-edge digital solutions and creative thinking.',
    ],
    [
        'icon' => 'handshake',
        'title' => 'Client-Centric Approach',
        'description' => 'We listen to your vision and transform your ideas into customized, growth-focused digital strategies that deliver results.',
    ],
    [
        'icon' => 'rocket',
        'title' => 'Results-Driven',
        'description' => 'Data-driven decisions and analytical expertise ensure your business achieves measurable, sustainable growth and ROI.',
    ],
];

$journeyMilestones = [
    ['year' => '2013', 'title' => 'Founded',           'description' => 'WebTecMart was established with a vision to revolutionize digital branding.'],
    ['year' => '2015', 'title' => 'First 100 Clients', 'description' => 'Reached the milestone of 100+ satisfied clients across various industries.'],
    ['year' => '2018', 'title' => 'Expansion',         'description' => 'Expanded services to include SEO, SMO, and Performance Marketing.'],
    ['year' => '2020', 'title' => '500+ Brands',       'description' => 'Trusted by 500+ brands and startups for digital marketing solutions.'],
    ['year' => '2023', 'title' => 'Global Reach',      'description' => 'Expanded reach to international clients across 15+ countries.'],
    ['year' => '2026', 'title' => '1000+ Success',     'description' => 'Strengthened 1000+ online businesses with comprehensive solutions.'],
];

// ===== Icon Helper =====
function apIcon(string $name): string {
    $icons = [
        'sparkles'   => '<path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/><path d="M20 3v4"/><path d="M22 5h-4"/><path d="M4 17v2"/><path d="M5 18H3"/>',
        'award'      => '<circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/>',
        'users'      => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
        'briefcase'  => '<rect width="20" height="14" x="2" y="7" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>',
        'trending'   => '<polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/>',
        'target'     => '<circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/>',
        'lightbulb'  => '<path d="M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1.3.5 2.6 1.5 3.5.8.8 1.3 1.5 1.5 2.5"/><path d="M9 18h6"/><path d="M10 22h4"/>',
        'handshake'  => '<path d="m11 17 2 2a1 1 0 1 0 3-3"/><path d="m14 14 2.5 2.5a1 1 0 1 0 3-3l-3.88-3.88a3 3 0 0 0-4.24 0l-.88.88a1 1 0 1 1-3-3l2.81-2.81a5.79 5.79 0 0 1 7.06-.87l.47.28a2 2 0 0 0 1.42.25L21 4"/><path d="m21 3 1 11h-2"/><path d="M3 3 2 14l6.5 6.5a1 1 0 1 0 3-3"/><path d="M3 4h8"/>',
        'rocket'     => '<path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"/><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"/><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"/><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"/>',
        'shield'     => '<path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/>',
        'zap'        => '<path d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z"/>',
        'quote'      => '<path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"/><path d="M15 21c3 0 7-1 7-8V5c0-1.25-.757-2.017-2-2h-4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2h.75c0 2.25.25 4-2.75 4v3c0 1 0 1 1 1z"/>',
        'arrow'      => '<path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>',
    ];
    $path = $icons[$name] ?? '';
    return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">' . $path . '</svg>';
}
?>

<style>
    /* ============================================================
       ABOUT PAGE — Webtecmart Next.js clone
       ============================================================ */
    .ap-section {
        position: relative;
        width: 100%;
        background: #FBF8F1;
        overflow: hidden;
        color: #1F1B2A;
    }

    /* Decorative Background */
    .ap-bg {
        position: absolute;
        inset: 0;
        pointer-events: none;
    }
    .ap-bg-blob-1 {
        position: absolute;
        top: 0; right: 0;
        width: 50%; height: 50%;
        background: linear-gradient(to bottom left, rgba(196, 0, 122, 0.05), transparent);
        border-radius: 9999px;
        filter: blur(64px);
    }
    .ap-bg-blob-2 {
        position: absolute;
        bottom: 0; left: 0;
        width: 33.333%; height: 50%;
        background: linear-gradient(to top right, rgba(196, 0, 122, 0.05), transparent);
        border-radius: 9999px;
        filter: blur(64px);
    }
    .ap-bg-shape {
        position: absolute;
        fill: none;
        stroke: #C4007A;
        opacity: 0.1;
        display: none;
    }
    .ap-bg-shape-1 { top: 80px; right: 40px; width: 80px; height: 80px; stroke-width: 2; }
    .ap-bg-shape-2 { bottom: 80px; left: 40px; width: 96px; height: 96px; stroke-width: 1.5; }

    @media (min-width: 640px) {
        .ap-bg-shape { display: block; }
        .ap-bg-shape-1 { width: 128px; height: 128px; }
        .ap-bg-shape-2 { width: 160px; height: 160px; }
    }

    /* Container */
    .ap-container {
        max-width: 1280px;
        padding-left: 16px;
        padding-right: 16px;
        margin: 0 auto;
        width: 100%;
        position: relative;
        z-index: 10;
    }

    /* ===== HERO ===== */
    .ap-hero {
        position: relative;
        padding: 32px 8px 32px;
        text-align: center;
    }
    @media (min-width: 640px) {
        .ap-hero { padding: 48px 0 48px; }
    }
    @media (min-width: 768px) {
        .ap-hero { padding: 80px 0 80px; }
    }

    .ap-pill {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(196, 0, 122, 0.1);
        padding: 6px 12px;
        border-radius: 9999px;
        margin-bottom: 12px;
    }
    .ap-pill svg {
        width: 12px;
        height: 12px;
        color: #C4007A;
        flex-shrink: 0;
    }
    .ap-pill span {
        color: #C4007A;
        font-weight: 600;
        font-size: 0.75rem;
        letter-spacing: 0.025em;
        text-transform: uppercase;
    }
    @media (min-width: 640px) {
        .ap-pill { padding: 8px 16px; gap: 8px; }
        .ap-pill svg { width: 16px; height: 16px; }
        .ap-pill span { font-size: 0.875rem; }
    }

    .ap-h1 {
        font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
        font-size: 1.5rem;
        font-weight: 700;
        color: #111827;
        line-height: 1.2;
        margin: 0;
        padding: 0 8px;
    }
    @media (min-width: 640px) { .ap-h1 { font-size: 1.875rem; line-height: 1.1; } }
    @media (min-width: 768px) { .ap-h1 { font-size: 2.25rem; } }
    @media (min-width: 1024px) { .ap-h1 { font-size: 3rem; } }

    .ap-h1 .accent {
        color: #C4007A;
        position: relative;
        display: inline-block;
    }
    .ap-h1 .accent svg {
        position: absolute;
        left: 0;
        bottom: -4px;
        width: 100%;
        height: 6px;
    }
    @media (min-width: 640px) {
        .ap-h1 .accent svg { bottom: -8px; }
    }

    .ap-subtitle {
        color: #6B7280;
        font-size: 0.875rem;
        max-width: 768px;
        margin: 12px auto 0;
        line-height: 1.625;
        padding: 0 16px;
    }
    @media (min-width: 640px) { .ap-subtitle { font-size: 1rem; margin-top: 16px; } }
    @media (min-width: 768px) { .ap-subtitle { font-size: 1.125rem; } }

    /* ===== STATS ROW ===== */
    .ap-stats {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 12px;
        margin-bottom: 48px;
        padding: 0 8px;
    }
    @media (min-width: 640px) {
        .ap-stats { gap: 16px; margin-bottom: 64px; padding: 0; }
    }
    @media (min-width: 768px) {
        .ap-stats { gap: 24px; }
    }
    @media (min-width: 1024px) {
        .ap-stats { grid-template-columns: repeat(4, minmax(0, 1fr)); }
    }

    .ap-stat {
        background: #fff;
        border-radius: 12px;
        padding: 16px;
        text-align: center;
        border: 1px solid rgba(196, 0, 122, 0.1);
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }
    .ap-stat:hover {
        box-shadow: 0 10px 15px -3px rgba(196, 0, 122, 0.1);
        transform: translateY(-4px);
    }
    @media (min-width: 640px) { .ap-stat { border-radius: 16px; padding: 20px; } }
    @media (min-width: 768px) { .ap-stat { padding: 24px; } }

    .ap-stat svg {
        width: 20px;
        height: 20px;
        color: #C4007A;
        margin: 0 auto 6px;
        display: block;
    }
    @media (min-width: 640px) { .ap-stat svg { width: 24px; height: 24px; margin-bottom: 8px; } }

    .ap-stat-value {
        font-size: 1.25rem;
        font-weight: 700;
        color: #C4007A;
    }
    @media (min-width: 640px) { .ap-stat-value { font-size: 1.5rem; } }
    @media (min-width: 768px) { .ap-stat-value { font-size: 1.875rem; } }

    .ap-stat-label {
        font-size: 0.75rem;
        font-weight: 600;
        color: #111827;
    }
    @media (min-width: 640px) { .ap-stat-label { font-size: 0.875rem; } }

    .ap-stat-desc {
        font-size: 10px;
        color: #6B7280;
        margin-top: 4px;
        line-height: 1.2;
    }
    @media (min-width: 640px) { .ap-stat-desc { font-size: 0.75rem; } }

    /* ===== OUR STORY ===== */
    .ap-story {
        display: grid;
        grid-template-columns: 1fr;
        gap: 32px;
        margin-bottom: 48px;
        padding: 0 8px;
        align-items: center;
    }
    @media (min-width: 640px) {
        .ap-story { gap: 48px; margin-bottom: 64px; padding: 0; }
    }
    @media (min-width: 768px) { .ap-story { gap: 64px; } }
    @media (min-width: 1024px) {
        .ap-story { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    }

    .ap-story-text {
        order: 2;
    }
    @media (min-width: 1024px) {
        .ap-story-text { order: 1; }
    }

    .ap-story-text h2 {
        font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
        font-size: 1.25rem;
        font-weight: 700;
        color: #111827;
        margin: 0 0 12px;
    }
    @media (min-width: 640px) { .ap-story-text h2 { font-size: 1.5rem; margin-bottom: 16px; } }
    @media (min-width: 768px) { .ap-story-text h2 { font-size: 1.875rem; } }

    .ap-story-text h2 .accent { color: #C4007A; }

    .ap-story-text p {
        color: #4B5563;
        font-size: 0.875rem;
        line-height: 1.625;
        margin: 0 0 12px;
    }
    @media (min-width: 640px) { .ap-story-text p { font-size: 1rem; margin-bottom: 16px; } }

    .ap-story-text p .bold {
        font-weight: 700;
        color: #C4007A;
    }

    /* Story Visual */
    .ap-story-visual {
        order: 1;
        position: relative;
    }
    @media (min-width: 1024px) {
        .ap-story-visual { order: 2; }
    }

    .ap-story-visual-inner {
        position: relative;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 25px 50px -12px rgba(196, 0, 122, 0.1);
        border: 1px solid rgba(196, 0, 122, 0.1);
    }
    @media (min-width: 640px) {
        .ap-story-visual-inner { border-radius: 16px; }
    }

    .ap-story-visual-content {
        aspect-ratio: 4 / 3;
        background: linear-gradient(to bottom right, rgba(196, 0, 122, 0.1), #FDF0F6);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 16px;
    }
    @media (min-width: 640px) { .ap-story-visual-content { padding: 32px; } }

    .ap-story-visual-content-inner {
        text-align: center;
    }

    .ap-story-quote-wrap {
        width: 64px;
        height: 64px;
        margin: 0 auto 12px;
        border-radius: 9999px;
        background: rgba(196, 0, 122, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
    }
    @media (min-width: 640px) {
        .ap-story-quote-wrap { width: 96px; height: 96px; margin-bottom: 16px; }
    }
    .ap-story-quote-wrap svg {
        width: 32px;
        height: 32px;
        color: #C4007A;
    }
    @media (min-width: 640px) {
        .ap-story-quote-wrap svg { width: 48px; height: 48px; }
    }

    .ap-story-brand {
        font-size: 1.25rem;
        font-weight: 700;
        color: #C4007A;
    }
    @media (min-width: 640px) { .ap-story-brand { font-size: 1.5rem; } }

    .ap-story-tagline {
        color: #4B5563;
        font-size: 0.875rem;
    }
    @media (min-width: 640px) { .ap-story-tagline { font-size: 1rem; } }

    .ap-story-dots {
        display: flex;
        justify-content: center;
        gap: 6px;
        margin-top: 8px;
    }
    @media (min-width: 640px) { .ap-story-dots { gap: 8px; margin-top: 12px; } }

    .ap-story-dots span {
        width: 6px;
        height: 6px;
        border-radius: 9999px;
        background: rgba(196, 0, 122, 0.3);
    }
    @media (min-width: 640px) { .ap-story-dots span { width: 8px; height: 8px; } }

    /* ===== CORE VALUES ===== */
    .ap-values-section {
        margin-bottom: 48px;
        padding: 0 8px;
    }
    @media (min-width: 640px) {
        .ap-values-section { margin-bottom: 64px; padding: 0; }
    }

    .ap-section-header {
        text-align: center;
        margin-bottom: 32px;
    }
    @media (min-width: 640px) { .ap-section-header { margin-bottom: 40px; } }

    .ap-section-header h2 {
        font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
        font-size: 1.25rem;
        font-weight: 700;
        color: #111827;
        margin: 0;
    }
    @media (min-width: 640px) { .ap-section-header h2 { font-size: 1.5rem; } }
    @media (min-width: 768px) { .ap-section-header h2 { font-size: 1.875rem; } }

    .ap-section-header h2 .accent { color: #C4007A; }

    .ap-section-header p {
        color: #6B7280;
        font-size: 0.75rem;
        max-width: 640px;
        margin: 8px auto 0;
        padding: 0 16px;
    }
    @media (min-width: 640px) { .ap-section-header p { font-size: 0.875rem; } }

    .ap-values-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 16px;
    }
    @media (min-width: 640px) {
        .ap-values-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 24px; }
    }
    @media (min-width: 1024px) {
        .ap-values-grid { grid-template-columns: repeat(4, minmax(0, 1fr)); }
    }

    .ap-value-card {
        background: #fff;
        border-radius: 12px;
        padding: 20px;
        border: 1px solid rgba(196, 0, 122, 0.1);
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }
    @media (min-width: 640px) {
        .ap-value-card { border-radius: 16px; padding: 24px; }
    }
    .ap-value-card:hover {
        box-shadow: 0 10px 15px -3px rgba(196, 0, 122, 0.1);
        transform: translateY(-8px);
        border-color: rgba(196, 0, 122, 0.3);
    }

    .ap-value-icon {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        background: #FDF0F6;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 12px;
        transition: transform 0.3s ease;
    }
    @media (min-width: 640px) {
        .ap-value-icon { width: 48px; height: 48px; border-radius: 12px; margin-bottom: 16px; }
    }
    .ap-value-card:hover .ap-value-icon {
        transform: scale(1.1);
    }

    .ap-value-icon svg {
        width: 20px;
        height: 20px;
        color: #C4007A;
    }
    @media (min-width: 640px) {
        .ap-value-icon svg { width: 24px; height: 24px; }
    }

    .ap-value-title {
        font-size: 1rem;
        font-weight: 700;
        color: #111827;
        margin: 0 0 6px;
        transition: color 0.3s ease;
    }
    @media (min-width: 640px) {
        .ap-value-title { font-size: 1.125rem; margin-bottom: 8px; }
    }
    .ap-value-card:hover .ap-value-title {
        color: #C4007A;
    }

    .ap-value-desc {
        font-size: 0.75rem;
        color: #4B5563;
        line-height: 1.625;
        margin: 0;
    }
    @media (min-width: 640px) { .ap-value-desc { font-size: 0.875rem; } }

    /* ===== JOURNEY TIMELINE ===== */
    .ap-journey-section {
        margin-bottom: 48px;
        padding: 0 8px;
    }
    @media (min-width: 640px) {
        .ap-journey-section { margin-bottom: 64px; padding: 0; }
    }

    .ap-journey-wrap {
        position: relative;
    }

    /* Center line for desktop */
    .ap-journey-line-desktop {
        display: none;
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        top: 0; bottom: 0;
        width: 2px;
        background: rgba(196, 0, 122, 0.2);
    }
    @media (min-width: 768px) {
        .ap-journey-line-desktop { display: block; }
    }

    /* Left line for mobile */
    .ap-journey-line-mobile {
        position: absolute;
        left: 16px;
        top: 0; bottom: 0;
        width: 2px;
        background: rgba(196, 0, 122, 0.2);
    }
    @media (min-width: 768px) {
        .ap-journey-line-mobile { display: none; }
    }

    .ap-journey-items {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }
    @media (min-width: 768px) {
        .ap-journey-items {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 24px;
        }
    }

    .ap-journey-item {
        position: relative;
    }
    @media (min-width: 768px) {
        .ap-journey-item.even { padding-right: 48px; text-align: right; }
        .ap-journey-item.odd  { padding-left: 48px; }
    }

    /* Mobile dot */
    .ap-journey-dot-mobile {
        position: absolute;
        left: 16px;
        top: 24px;
        transform: translateX(-50%);
        width: 12px;
        height: 12px;
        border-radius: 9999px;
        background: #C4007A;
        border: 2px solid #fff;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        z-index: 10;
    }
    @media (min-width: 768px) {
        .ap-journey-dot-mobile { display: none; }
    }

    .ap-journey-card {
        background: #fff;
        border-radius: 12px;
        padding: 16px;
        border: 1px solid rgba(196, 0, 122, 0.1);
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        margin-left: 40px;
    }
    @media (min-width: 640px) {
        .ap-journey-card { border-radius: 16px; padding: 24px; }
    }
    @media (min-width: 768px) {
        .ap-journey-card { margin-left: 0; }
        .ap-journey-item.even .ap-journey-card { margin-right: 24px; }
        .ap-journey-item.odd  .ap-journey-card { margin-left: 24px; }
    }
    .ap-journey-card:hover {
        box-shadow: 0 10px 15px -3px rgba(196, 0, 122, 0.1);
        transform: translateY(-4px);
    }

    .ap-journey-head {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 4px;
    }
    @media (min-width: 640px) {
        .ap-journey-head { gap: 12px; }
    }
    @media (min-width: 768px) {
        .ap-journey-item.even .ap-journey-head { justify-content: flex-end; }
        .ap-journey-item.odd  .ap-journey-head { justify-content: flex-start; }
    }

    .ap-journey-year {
        font-size: 1.25rem;
        font-weight: 700;
        color: #C4007A;
    }
    @media (min-width: 640px) { .ap-journey-year { font-size: 1.5rem; } }

    .ap-journey-pip {
        display: none;
        width: 12px;
        height: 12px;
        border-radius: 9999px;
        background: #C4007A;
    }
    @media (min-width: 768px) {
        .ap-journey-pip { display: block; }
    }

    .ap-journey-title {
        font-size: 1rem;
        font-weight: 700;
        color: #111827;
        margin: 6px 0 0;
    }
    @media (min-width: 640px) { .ap-journey-title { font-size: 1.125rem; margin-top: 8px; } }

    .ap-journey-desc {
        font-size: 0.75rem;
        color: #4B5563;
        margin: 4px 0 0;
        line-height: 1.5;
    }
    @media (min-width: 640px) { .ap-journey-desc { font-size: 0.875rem; } }

    /* ===== USP SECTION ===== */
    .ap-usp-section {
        margin-bottom: 48px;
        background: linear-gradient(to bottom right, #FDF0F6, #fff);
        border-radius: 12px;
        padding: 24px;
        border: 1px solid rgba(196, 0, 122, 0.1);
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        margin-left: 8px;
        margin-right: 8px;
    }
    @media (min-width: 640px) {
        .ap-usp-section {
            border-radius: 16px;
            padding: 32px;
            margin-left: 0;
            margin-right: 0;
            margin-bottom: 64px;
        }
    }
    @media (min-width: 768px) {
        .ap-usp-section { padding: 48px; }
    }

    .ap-usp-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 24px;
    }
    @media (min-width: 768px) {
        .ap-usp-grid { grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 32px; }
    }

    .ap-usp-item {
        text-align: center;
    }
    @media (min-width: 768px) {
        .ap-usp-item { text-align: left; }
    }

    .ap-usp-icon {
        width: 48px;
        height: 48px;
        border-radius: 9999px;
        background: rgba(196, 0, 122, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 12px;
    }
    @media (min-width: 640px) {
        .ap-usp-icon { width: 56px; height: 56px; margin-bottom: 16px; }
    }
    @media (min-width: 768px) {
        .ap-usp-icon { margin: 0 0 16px; }
    }
    .ap-usp-icon svg {
        width: 24px;
        height: 24px;
        color: #C4007A;
    }
    @media (min-width: 640px) {
        .ap-usp-icon svg { width: 28px; height: 28px; }
    }

    .ap-usp-title {
        font-size: 1.125rem;
        font-weight: 700;
        color: #111827;
        margin: 0 0 6px;
    }
    @media (min-width: 640px) { .ap-usp-title { font-size: 1.25rem; margin-bottom: 8px; } }

    .ap-usp-desc {
        color: #4B5563;
        font-size: 0.75rem;
        line-height: 1.625;
        margin: 0;
    }
    @media (min-width: 640px) { .ap-usp-desc { font-size: 0.875rem; } }

    /* ===== CTA ===== */
    .ap-cta {
        position: relative;
        background: linear-gradient(to right, #A3005F, #C4007A, #E0398F);
        border-radius: 12px;
        padding: 24px;
        text-align: center;
        overflow: hidden;
        margin-left: 8px;
        margin-right: 8px;
    }
    @media (min-width: 640px) {
        .ap-cta { border-radius: 16px; padding: 32px; margin-left: 0; margin-right: 0; }
    }
    @media (min-width: 768px) { .ap-cta { padding: 48px; } }

    .ap-cta-pattern {
        position: absolute;
        inset: 0;
        opacity: 0.1;
    }
    .ap-cta-pattern svg { width: 100%; height: 100%; }

    .ap-cta-inner {
        position: relative;
        z-index: 10;
    }

    .ap-cta h2 {
        font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
        font-size: 1.25rem;
        font-weight: 700;
        color: #fff;
        margin: 0 0 8px;
        padding: 0 8px;
    }
    @media (min-width: 640px) { .ap-cta h2 { font-size: 1.5rem; margin-bottom: 12px; } }
    @media (min-width: 768px) { .ap-cta h2 { font-size: 1.875rem; } }

    .ap-cta p {
        color: rgba(255, 255, 255, 0.8);
        max-width: 672px;
        margin: 0 auto 20px;
        font-size: 0.75rem;
        padding: 0 16px;
    }
    @media (min-width: 640px) { .ap-cta p { font-size: 0.875rem; margin-bottom: 24px; } }
    @media (min-width: 768px) { .ap-cta p { font-size: 1rem; } }

    .ap-cta-buttons {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 12px;
        padding: 0 16px;
    }
    @media (min-width: 640px) {
        .ap-cta-buttons { flex-direction: row; gap: 16px; padding: 0; }
    }

    .ap-cta-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        border-radius: 9999px;
        padding: 12px 24px;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 0.875rem;
        width: 100%;
    }
    @media (min-width: 640px) {
        .ap-cta-btn { width: auto; padding: 14px 32px; font-size: 1rem; }
    }

    .ap-cta-btn.primary {
        background: #fff;
        color: #C4007A;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.2);
    }
    .ap-cta-btn.primary:hover {
        transform: scale(1.02);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3);
    }
    .ap-cta-btn.primary svg {
        width: 14px;
        height: 14px;
    }
    @media (min-width: 640px) {
        .ap-cta-btn.primary svg { width: 16px; height: 16px; }
    }

    .ap-cta-btn.secondary {
        background: transparent;
        border: 2px solid rgba(255, 255, 255, 0.3);
        color: #fff;
    }
    .ap-cta-btn.secondary:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: rgba(255, 255, 255, 0.5);
    }

    /* ===== Bottom Decorative ===== */
    .ap-bottom-deco {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 12px;
        margin: 32px 0 16px;
        padding: 0 16px;
    }
    @media (min-width: 640px) { .ap-bottom-deco { margin: 40px 0 16px; } }

    .ap-bottom-line {
        width: 32px;
        height: 1px;
        background: linear-gradient(to right, transparent, rgba(196, 0, 122, 0.3));
    }
    @media (min-width: 640px) { .ap-bottom-line { width: 48px; } }

    .ap-bottom-line.right {
        background: linear-gradient(to left, transparent, rgba(196, 0, 122, 0.3));
    }

    .ap-bottom-dots {
        display: flex;
        gap: 4px;
        align-items: center;
    }
    .ap-bottom-dots span {
        display: block;
        width: 4px;
        height: 4px;
        border-radius: 9999px;
        background: rgba(196, 0, 122, 0.2);
    }
    @media (min-width: 640px) {
        .ap-bottom-dots span { width: 6px; height: 6px; }
    }
    .ap-bottom-dots span.active {
        width: 16px;
        background: #C4007A;
    }
    @media (min-width: 640px) { .ap-bottom-dots span.active { width: 24px; } }
</style>

<main class="ap-section" id="aboutPage">

    <!-- Decorative Background -->
    <div class="ap-bg">
        <div class="ap-bg-blob-1"></div>
        <div class="ap-bg-blob-2"></div>
        <svg class="ap-bg-shape ap-bg-shape-1" viewBox="0 0 100 100">
            <rect x="15" y="15" width="70" height="70" transform="rotate(45 50 50)"/>
        </svg>
        <svg class="ap-bg-shape ap-bg-shape-2" viewBox="0 0 100 100">
            <circle cx="50" cy="50" r="35"/>
        </svg>
    </div>

    <div class="ap-container">

        <!-- ===== HERO ===== -->
        <div class="ap-hero">
            <div class="ap-pill">
                <?= apIcon('sparkles') ?>
                <span>About WebTecMart</span>
            </div>

            <h1 class="ap-h1">
                Complete
                <span class="accent">
                    Digital Branding
                    <svg viewBox="0 0 300 8" preserveAspectRatio="none">
                        <path d="M2 4C60 1 240 1 298 4" stroke="#C4007A" stroke-width="2" stroke-linecap="round" fill="none" opacity="0.3"/>
                    </svg>
                </span>
                Agency
            </h1>

            <p class="ap-subtitle">
                We set new standards to develop the branding of digital businesses with innovative strategies and proven results.
                For over 13 years, we've been the trusted partner for 1000+ businesses worldwide.
            </p>
        </div>

        <!-- ===== STATS ===== -->
        <div class="ap-stats">
            <?php foreach ($stats as $stat): ?>
                <div class="ap-stat">
                    <?= apIcon($stat['icon']) ?>
                    <div class="ap-stat-value"><?= htmlspecialchars($stat['value']) ?></div>
                    <div class="ap-stat-label"><?= htmlspecialchars($stat['label']) ?></div>
                    <div class="ap-stat-desc"><?= htmlspecialchars($stat['description']) ?></div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- ===== OUR STORY ===== -->
        <div class="ap-story">
            <div class="ap-story-text">
                <h2>Our <span class="accent">Story</span></h2>
                <p>
                    WebTecMart is the <span class="bold">No.1 digital service provider</span> from the last 13 years in the industry, strengthening over <span class="bold">1000+</span> online businesses with comprehensive digital marketing solutions.
                </p>
                <p>
                    We aim at transforming every idea into the proposition that results in revolutionary business growth. IT, Digital Marketing, and Online Reputation Management services offered by us are at par with industry standards.
                </p>
                <p>
                    We come up with innovative and futuristic options that help you sustain in a competitive market environment. Our team is dedicated to delivering excellence and driving measurable growth for your business.
                </p>
            </div>

            <div class="ap-story-visual">
                <div class="ap-story-visual-inner">
                    <div class="ap-story-visual-content">
                        <div class="ap-story-visual-content-inner">
                            <div class="ap-story-quote-wrap">
                                <?= apIcon('quote') ?>
                            </div>
                            <h3 class="ap-story-brand">WebTecMart</h3>
                            <p class="ap-story-tagline">Digital Branding Agency</p>
                            <div class="ap-story-dots">
                                <span></span><span></span><span></span><span></span><span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ===== CORE VALUES ===== -->
        <div class="ap-values-section">
            <div class="ap-section-header">
                <h2>Our <span class="accent">Core Values</span></h2>
                <p>The principles that guide everything we do at WebTecMart</p>
            </div>

            <div class="ap-values-grid">
                <?php foreach ($coreValues as $value): ?>
                    <div class="ap-value-card">
                        <div class="ap-value-icon">
                            <?= apIcon($value['icon']) ?>
                        </div>
                        <h3 class="ap-value-title"><?= htmlspecialchars($value['title']) ?></h3>
                        <p class="ap-value-desc"><?= htmlspecialchars($value['description']) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- ===== JOURNEY TIMELINE ===== -->
        <div class="ap-journey-section">
            <div class="ap-section-header">
                <h2>Our <span class="accent">Journey</span></h2>
                <p>Milestones that have shaped our success story</p>
            </div>

            <div class="ap-journey-wrap">
                <div class="ap-journey-line-desktop"></div>
                <div class="ap-journey-line-mobile"></div>

                <div class="ap-journey-items">
                    <?php foreach ($journeyMilestones as $i => $milestone):
                        $isEven = ($i % 2 === 0);
                    ?>
                        <div class="ap-journey-item <?= $isEven ? 'even' : 'odd' ?>">
                            <div class="ap-journey-dot-mobile"></div>
                            <div class="ap-journey-card">
                                <div class="ap-journey-head">
                                    <span class="ap-journey-year"><?= htmlspecialchars($milestone['year']) ?></span>
                                    <span class="ap-journey-pip"></span>
                                </div>
                                <h3 class="ap-journey-title"><?= htmlspecialchars($milestone['title']) ?></h3>
                                <p class="ap-journey-desc"><?= htmlspecialchars($milestone['description']) ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- ===== USP SECTION ===== -->
        <div class="ap-usp-section">
            <div class="ap-usp-grid">
                <div class="ap-usp-item">
                    <div class="ap-usp-icon">
                        <?= apIcon('handshake') ?>
                    </div>
                    <h3 class="ap-usp-title">Our USP</h3>
                    <p class="ap-usp-desc">
                        We host a very qualified team, which are great listeners as well. Our digital wizard experts possess analytical skills to build customized and innovative plans for clients.
                    </p>
                </div>

                <div class="ap-usp-item">
                    <div class="ap-usp-icon">
                        <?= apIcon('shield') ?>
                    </div>
                    <h3 class="ap-usp-title">Quality Commitment</h3>
                    <p class="ap-usp-desc">
                        We deliver excellence in every project, ensuring your brand stands out with innovative strategies and exceptional execution.
                    </p>
                </div>

                <div class="ap-usp-item">
                    <div class="ap-usp-icon">
                        <?= apIcon('zap') ?>
                    </div>
                    <h3 class="ap-usp-title">Fast & Reliable</h3>
                    <p class="ap-usp-desc">
                        We deliver projects on time with transparent communication and measurable results that drive business growth.
                    </p>
                </div>
            </div>
        </div>

        <!-- ===== CTA ===== -->
        <div class="ap-cta">
            <div class="ap-cta-pattern">
                <svg viewBox="0 0 100 100" preserveAspectRatio="none">
                    <defs>
                        <pattern id="cta-grid-about" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="1" height="1" fill="white"/>
                        </pattern>
                    </defs>
                    <rect x="0" y="0" width="100" height="100" fill="url(#cta-grid-about)"/>
                </svg>
            </div>
            <div class="ap-cta-inner">
                <h2>Ready to Start Your Digital Journey?</h2>
                <p>Let's work together to create digital experiences that help you grow.</p>

                <div class="ap-cta-buttons">
                    <a href="/contact.php" class="ap-cta-btn primary">
                        Get Free Consultation
                        <?= apIcon('arrow') ?>
                    </a>
                    <a href="/services.php" class="ap-cta-btn secondary">
                        Explore Our Services
                    </a>
                </div>
            </div>
        </div>

        <!-- ===== Bottom Decorative ===== -->
        <div class="ap-bottom-deco">
            <div class="ap-bottom-line"></div>
            <div class="ap-bottom-dots">
                <span></span><span></span><span></span>
                <span class="active"></span>
                <span></span><span></span><span></span>
            </div>
            <div class="ap-bottom-line right"></div>
        </div>

    </div>
</main>

<?php require_once __DIR__ . '/app/templates/footer.php'; ?>