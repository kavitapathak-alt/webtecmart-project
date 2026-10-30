<?php require_once __DIR__ . '/app/templates/header.php'; ?>

<?php
// ===== Icon Helper =====
$servicesContent = servicesPageContent();
$mainServices = $servicesContent['main_services'];
$seoServices = $servicesContent['seo_services'];
$stats = $servicesContent['stats'];
$process = $servicesContent['process'];
$resultsDriven = $servicesContent['results'];
$faqs = $servicesContent['faqs'];

function spIcon(string $name): string {
    $icons = [
        'sparkles'   => '<path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/><path d="M20 3v4"/><path d="M22 5h-4"/><path d="M4 17v2"/><path d="M5 18H3"/>',
        'arrow'      => '<path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>',
        'phone'      => '<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>',
        'send'       => '<path d="m22 2-7 20-4-9-9-4Z"/><path d="M22 2 11 13"/>',
        'paintbrush' => '<path d="m14.622 17.897-10.68-2.913"/><path d="M18.376 2.622a1 1 0 1 1 3.002 3.002L17.36 9.643a.5.5 0 0 0 0 .707l.944.944a2.41 2.41 0 0 1 0 3.408l-.944.944a.5.5 0 0 1-.707 0L8.354 7.348a.5.5 0 0 1 0-.707l.944-.944a2.41 2.41 0 0 1 3.408 0l.944.944a.5.5 0 0 0 .707 0z"/><path d="M9 8c-1.804 2.71-3.97 3.46-6.583 3.948a.507.507 0 0 0-.302.819l7.32 8.883a1 1 0 0 0 1.185.204C12.735 20.405 16 16.792 16 15"/>',
        'code'       => '<path d="m16 18 6-6-6-6"/><path d="m8 6-6 6 6 6"/>',
        'search'     => '<circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/>',
        'share'      => '<path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"/><polyline points="16 6 12 2 8 6"/><line x1="12" x2="12" y1="2" y2="15"/>',
        'megaphone'  => '<path d="m3 11 18-5v12L3 14v-3z"/><path d="M11.6 16.8a3 3 0 1 1-5.8-1.6"/>',
        'smartphone' => '<rect width="14" height="20" x="5" y="2" rx="2" ry="2"/><path d="M12 18h.01"/>',
        'mappin'     => '<path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/>',
        'globe'      => '<circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/>',
        'earth'      => '<path d="M21.54 15H17a2 2 0 0 0-2 2v4.54"/><path d="M7 3.34V5a3 3 0 0 0 3 3a2 2 0 0 1 2 2c0 1.1.9 2 2 2a2 2 0 0 0 2-2c0-1.1.9-2 2-2h3.17"/><path d="M11 21.95V18a2 2 0 0 0-2-2a2 2 0 0 1-2-2v-1a2 2 0 0 0-2-2H2.05"/><circle cx="12" cy="12" r="10"/>',
        'chart'      => '<path d="M3 3v18h18"/><path d="M18 17V9"/><path d="M13 17V5"/><path d="M8 17v-3"/>',
        'check'      => '<circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/>',
        'rocket'     => '<path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"/><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"/><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"/><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"/>',
        'award'      => '<circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/>',
        'users'      => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
        'trending'   => '<polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/>',
        'clock'      => '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>',
        'plus'       => '<path d="M5 12h14"/><path d="M12 5v14"/>',
        'minus'      => '<path d="M5 12h14"/>',
    ];
    $path = $icons[$name] ?? '';
    return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">' . $path . '</svg>';
}

?>

<style>
    /* ============================================================
       SERVICES PAGE — Webtecmart Next.js clone
       ============================================================ */
    .sp-page {
        position: relative;
        width: 100%;
        background: #FBF8F1;
        overflow: hidden;
        color: #1F1B2A;
    }

    .sp-container {
        max-width: 1280px;
        padding-left: 16px;
        padding-right: 16px;
        margin: 0 auto;
        width: 100%;
        position: relative;
        z-index: 10;
    }

    /* ===== Shared decorative background ===== */
    .sp-bg {
        position: absolute;
        inset: 0;
        pointer-events: none;
    }
    .sp-bg-blob-1 {
        position: absolute;
        top: 0; right: 0;
        width: 50%; height: 50%;
        background: linear-gradient(to bottom left, rgba(196, 0, 122, 0.05), transparent);
        border-radius: 9999px;
        filter: blur(64px);
    }
    .sp-bg-blob-2 {
        position: absolute;
        bottom: 0; left: 0;
        width: 33.333%; height: 50%;
        background: linear-gradient(to top right, rgba(196, 0, 122, 0.05), transparent);
        border-radius: 9999px;
        filter: blur(64px);
    }
    .sp-bg-shape {
        position: absolute;
        fill: none;
        stroke: #C4007A;
        opacity: 0.1;
        display: none;
    }
    .sp-bg-shape-1 { top: 80px; right: 40px; width: 128px; height: 128px; stroke-width: 2; }
    .sp-bg-shape-2 { bottom: 80px; left: 40px; width: 160px; height: 160px; stroke-width: 1.5; }
    @media (min-width: 640px) { .sp-bg-shape { display: block; } }

    /* ===== HERO ===== */
    .sp-hero {
        position: relative;
        width: 100%;
        overflow: hidden;
    }

    .sp-hero-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 32px;
        align-items: start;
        padding: 40px 0;
    }
    @media (min-width: 640px) { .sp-hero-grid { padding: 56px 0; } }
    @media (min-width: 768px) { .sp-hero-grid { padding: 64px 0; } }
    @media (min-width: 1024px) {
        .sp-hero-grid {
            grid-template-columns: 1.15fr 0.85fr;
            gap: 48px;
        }
    }

    .sp-hero-left {
        padding-top: 8px;
    }
    @media (min-width: 640px) { .sp-hero-left { padding-top: 24px; } }

    .sp-pill {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: rgba(196, 0, 122, 0.08);
        border: 1px solid rgba(196, 0, 122, 0.15);
        padding: 5px 14px;
        border-radius: 9999px;
        margin-bottom: 10px;
    }
    .sp-pill svg {
        width: 13px;
        height: 13px;
        color: #C4007A;
        flex-shrink: 0;
    }
    .sp-pill span {
        color: #C4007A;
        font-weight: 700;
        font-size: 0.72rem;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .sp-hero-h1 {
        font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
        font-size: 1.875rem;
        font-weight: 700;
        color: #111827;
        line-height: 1.15;
        margin: 0 0 16px;
    }
    @media (min-width: 640px) { .sp-hero-h1 { font-size: 2.25rem; margin-bottom: 20px; } }
    @media (min-width: 768px) { .sp-hero-h1 { font-size: 2.75rem; } }
    .sp-hero-h1 .accent { color: #C4007A; }

    .sp-hero-sub {
        color: #4B5563;
        font-size: 0.875rem;
        line-height: 1.625;
        margin: 0 0 24px;
        max-width: 576px;
    }
    @media (min-width: 640px) { .sp-hero-sub { font-size: 1rem; margin-bottom: 32px; } }

    .sp-hero-btns {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 12px;
    }
    @media (min-width: 640px) { .sp-hero-btns { gap: 16px; } }

    .sp-btn-primary {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border-radius: 9999px;
        background: linear-gradient(90deg, #C4007A, #E0398F);
        padding: 12px 24px;
        font-size: 0.875rem;
        font-weight: 600;
        color: #fff;
        box-shadow: 0 10px 15px -3px rgba(196, 0, 122, 0.25);
        text-decoration: none;
        transition: all 0.3s ease;
    }
    @media (min-width: 640px) { .sp-btn-primary { padding: 14px 28px; } }
    .sp-btn-primary:hover {
        transform: scale(1.03);
        box-shadow: 0 20px 25px -5px rgba(196, 0, 122, 0.35);
        color: #fff;
    }
    .sp-btn-primary svg { width: 16px; height: 16px; }

    .sp-or-badge {
        display: flex;
        width: 32px;
        height: 32px;
        align-items: center;
        justify-content: center;
        border-radius: 9999px;
        border: 1px solid rgba(196, 0, 122, 0.2);
        background: #fff;
        font-size: 12px;
        font-weight: 600;
        color: #C4007A;
        flex-shrink: 0;
    }

    .sp-btn-dark {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border-radius: 9999px;
        background: #1A1A1A;
        padding: 12px 24px;
        font-size: 0.875rem;
        font-weight: 600;
        color: #fff;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    @media (min-width: 640px) { .sp-btn-dark { padding: 14px 28px; } }
    .sp-btn-dark:hover {
        background: rgba(26, 26, 26, 0.9);
        color: #fff;
    }
    .sp-btn-dark svg { width: 16px; height: 16px; }

    /* ===== Hero Quote Form ===== */
    .sp-quote-card {
        border-radius: 16px;
        background: #fff;
        box-shadow: 0 25px 50px -12px rgba(196, 0, 122, 0.1);
        border: 1px solid rgba(196, 0, 122, 0.1);
        padding: 24px;
    }
    @media (min-width: 640px) {
        .sp-quote-card { border-radius: 24px; padding: 32px; }
    }

    .sp-quote-card h2 {
        font-size: 1.25rem;
        font-weight: 700;
        color: #111827;
        margin: 0 0 20px;
    }
    @media (min-width: 640px) { .sp-quote-card h2 { font-size: 1.5rem; margin-bottom: 24px; } }

    .sp-quote-form {
        display: flex;
        flex-direction: column;
        gap: 14px;
    }
    @media (min-width: 640px) { .sp-quote-form { gap: 16px; } }

    .sp-quote-input,
    .sp-quote-textarea {
        width: 100%;
        border-radius: 12px;
        border: 1px solid rgba(196, 0, 122, 0.15);
        background: rgba(251, 248, 241, 0.6);
        padding: 12px 16px;
        font-size: 0.875rem;
        color: #111827;
        font-family: inherit;
        outline: none;
        transition: all 0.3s ease;
    }
    .sp-quote-input::placeholder,
    .sp-quote-textarea::placeholder { color: #9CA3AF; }
    .sp-quote-input:focus,
    .sp-quote-textarea:focus {
        border-color: rgba(196, 0, 122, 0.4);
        box-shadow: 0 0 0 3px rgba(196, 0, 122, 0.15);
    }
    .sp-quote-textarea { resize: none; }

    .sp-recaptcha {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        border-radius: 12px;
        border: 1px dashed rgba(196, 0, 122, 0.2);
        background: rgba(251, 248, 241, 0.6);
        padding: 12px 16px;
        cursor: pointer;
        user-select: none;
    }
    .sp-recaptcha-left {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .sp-recaptcha input[type="checkbox"] {
        width: 16px;
        height: 16px;
        accent-color: #C4007A;
        cursor: pointer;
        flex-shrink: 0;
    }
    .sp-recaptcha-left span {
        font-size: 12px;
        color: #6B7280;
    }
    @media (min-width: 640px) { .sp-recaptcha-left span { font-size: 13px; } }
    .sp-recaptcha-brand {
        font-size: 10px;
        color: #D1D5DB;
        font-weight: 500;
    }

    .sp-submit {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        border-radius: 9999px;
        background: linear-gradient(90deg, #C4007A, #E0398F);
        padding: 14px;
        font-size: 0.875rem;
        font-weight: 700;
        color: #fff;
        border: none;
        cursor: pointer;
        font-family: inherit;
        box-shadow: 0 10px 15px -3px rgba(196, 0, 122, 0.25);
        transition: all 0.3s ease;
        margin-top: 4px;
    }
    @media (min-width: 640px) { .sp-submit { font-size: 1rem; } }
    .sp-submit:hover {
        transform: scale(1.02);
        box-shadow: 0 20px 25px -5px rgba(196, 0, 122, 0.35);
    }
    .sp-submit svg { width: 16px; height: 16px; }

    /* ===== INTRO SECTION ===== */
    .sp-intro {
        position: relative;
        width: 100%;
        background: #fff;
        padding: 48px 0;
    }
    @media (min-width: 640px) { .sp-intro { padding: 64px 0; } }
    @media (min-width: 768px) { .sp-intro { padding: 80px 0; } }

    .sp-intro-inner {
        text-align: center;
        max-width: 896px;
        margin: 0 auto;
    }

    .sp-intro-eyebrow {
        color: #C4007A;
        font-weight: 600;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        margin: 0 0 8px;
    }
    @media (min-width: 640px) { .sp-intro-eyebrow { font-size: 0.875rem; margin-bottom: 12px; } }

    .sp-intro-h2 {
        font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
        font-size: 1.5rem;
        font-weight: 800;
        font-style: italic;
        color: #111827;
        line-height: 1.3;
        margin: 0 0 24px;
    }
    @media (min-width: 640px) { .sp-intro-h2 { font-size: 1.875rem; margin-bottom: 32px; } }
    @media (min-width: 768px) { .sp-intro-h2 { font-size: 2.25rem; } }
    .sp-intro-h2 .accent { color: #C4007A; }

    .sp-intro-body {
        display: flex;
        flex-direction: column;
        gap: 16px;
        text-align: left;
    }
    @media (min-width: 640px) {
        .sp-intro-body { gap: 20px; text-align: center; }
    }

    .sp-intro-body p {
        font-size: 0.875rem;
        color: #4B5563;
        line-height: 1.625;
        margin: 0;
    }
    @media (min-width: 640px) { .sp-intro-body p { font-size: 1rem; } }

    /* ===== WEBSITE CTA ===== */
    .sp-website-cta {
        position: relative;
        width: 100%;
        background: #FBF8F1;
        padding: 40px 0;
        overflow: hidden;
    }
    @media (min-width: 640px) { .sp-website-cta { padding: 56px 0; } }
    @media (min-width: 768px) { .sp-website-cta { padding: 64px 0; } }

    .sp-website-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 32px;
        align-items: center;
    }
    @media (min-width: 640px) { .sp-website-grid { gap: 40px; } }
    @media (min-width: 1024px) {
        .sp-website-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    }

    .sp-website-pre {
        font-size: 1.125rem;
        color: #374151;
        margin: 0 0 4px;
    }
    @media (min-width: 640px) { .sp-website-pre { font-size: 1.25rem; } }

    .sp-website-h2 {
        font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
        font-size: 1.5rem;
        font-weight: 800;
        font-style: italic;
        color: #C4007A;
        line-height: 1.2;
        margin: 0 0 16px;
    }
    @media (min-width: 640px) { .sp-website-h2 { font-size: 1.875rem; margin-bottom: 20px; } }
    @media (min-width: 768px) { .sp-website-h2 { font-size: 2.25rem; } }

    .sp-website-sub {
        font-size: 0.875rem;
        color: #4B5563;
        line-height: 1.625;
        margin: 0 0 24px;
        max-width: 512px;
    }
    @media (min-width: 640px) { .sp-website-sub { font-size: 1rem; margin-bottom: 28px; } }

    .sp-website-btns {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 12px;
    }

    .sp-website-image {
        position: relative;
    }
    .sp-website-image::before {
        content: '';
        position: absolute;
        inset: -24px;
        z-index: -1;
        border-radius: 24px;
        background: linear-gradient(to bottom right, rgba(196, 0, 122, 0.1), transparent);
        filter: blur(24px);
    }
    .sp-website-image img {
        width: 100%;
        max-width: 448px;
        margin: 0 auto;
        height: auto;
        object-fit: contain;
        display: block;
        filter: drop-shadow(0 25px 25px rgba(0, 0, 0, 0.15));
    }

    /* ===== STATS ===== */
    .sp-stats-section {
        position: relative;
        width: 100%;
        background: #FBF8F1;
        overflow: hidden;
    }

    .sp-stats {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 16px;
        padding: 48px 0 64px;
    }
    @media (min-width: 768px) {
        .sp-stats {
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 24px;
            padding: 64px 0 64px;
        }
    }

    .sp-stat {
        background: #fff;
        border-radius: 16px;
        padding: 24px;
        text-align: center;
        border: 1px solid rgba(196, 0, 122, 0.1);
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }
    .sp-stat:hover {
        box-shadow: 0 10px 15px -3px rgba(196, 0, 122, 0.1);
        transform: translateY(-4px);
    }
    .sp-stat svg {
        width: 24px;
        height: 24px;
        color: #C4007A;
        margin: 0 auto 8px;
        display: block;
    }
    .sp-stat-value {
        font-size: 1.5rem;
        font-weight: 700;
        color: #C4007A;
    }
    @media (min-width: 768px) { .sp-stat-value { font-size: 1.875rem; } }
    .sp-stat-label {
        font-size: 0.875rem;
        font-weight: 600;
        color: #111827;
    }

    /* ===== CORE SERVICES ===== */
    .sp-block {
        margin-bottom: 64px;
    }

    .sp-block-header {
        text-align: center;
        margin-bottom: 40px;
    }
    .sp-block-eyebrow {
        color: #C4007A;
        font-weight: 600;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        margin: 0 0 8px;
    }
    @media (min-width: 640px) { .sp-block-eyebrow { font-size: 0.875rem; } }
    .sp-block-title {
        font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
        font-size: 1.5rem;
        font-weight: 700;
        color: #111827;
        margin: 0;
    }
    @media (min-width: 768px) { .sp-block-title { font-size: 1.875rem; } }
    .sp-block-title .accent { color: #C4007A; }
    .sp-block-sub {
        color: #6B7280;
        font-size: 0.875rem;
        max-width: 672px;
        margin: 8px auto 0;
    }

    .sp-services-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 24px;
    }
    @media (min-width: 768px) { .sp-services-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
    @media (min-width: 1024px) { .sp-services-grid { grid-template-columns: repeat(3, minmax(0, 1fr)); } }

    .sp-service-card {
        position: relative;
        background: #fff;
        border-radius: 16px;
        padding: 24px;
        border: 1px solid rgba(196, 0, 122, 0.1);
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        transition: all 0.5s ease;
        overflow: hidden;
    }
    .sp-service-card:hover {
        box-shadow: 0 20px 25px -5px rgba(196, 0, 122, 0.1);
        transform: translateY(-8px);
        border-color: rgba(196, 0, 122, 0.3);
    }
    .sp-service-card::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(to bottom right, rgba(196, 0, 122, 0.05), transparent);
        opacity: 0;
        transition: opacity 0.5s ease;
        pointer-events: none;
    }
    .sp-service-card:hover::before { opacity: 1; }

    .sp-service-inner { position: relative; }

    .sp-service-icon {
        width: 56px;
        height: 56px;
        border-radius: 12px;
        background: #FDF0F6;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 16px;
        transition: transform 0.3s ease;
    }
    .sp-service-card:hover .sp-service-icon { transform: scale(1.1); }
    .sp-service-icon svg {
        width: 28px;
        height: 28px;
        color: #C4007A;
    }

    .sp-service-title {
        font-size: 1.125rem;
        font-weight: 700;
        color: #111827;
        margin: 0 0 8px;
        transition: color 0.3s ease;
    }
    @media (min-width: 768px) { .sp-service-title { font-size: 1.25rem; } }
    .sp-service-card:hover .sp-service-title { color: #C4007A; }

    .sp-service-desc {
        font-size: 0.875rem;
        color: #4B5563;
        line-height: 1.625;
        margin: 0 0 16px;
    }

    .sp-service-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 16px;
    }
    .sp-service-tag {
        font-size: 0.75rem;
        background: #FDF0F6;
        color: #C4007A;
        padding: 4px 12px;
        border-radius: 9999px;
    }

    .sp-service-link {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        font-size: 0.875rem;
        font-weight: 600;
        color: #C4007A;
        text-decoration: none;
        transition: gap 0.3s ease;
    }
    .sp-service-link:hover { gap: 8px; }
    .sp-service-link svg { width: 16px; height: 16px; }

    /* ===== SEO SECTION ===== */
    .sp-seo-section {
        background: linear-gradient(to bottom right, #FDF0F6, #fff);
        border-radius: 16px;
        padding: 32px;
        border: 1px solid rgba(196, 0, 122, 0.1);
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        margin-bottom: 64px;
    }
    @media (min-width: 768px) { .sp-seo-section { padding: 48px; } }

    .sp-seo-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 24px;
    }
    @media (min-width: 768px) { .sp-seo-grid { grid-template-columns: repeat(3, minmax(0, 1fr)); } }

    .sp-seo-card {
        background: #fff;
        border-radius: 12px;
        padding: 24px;
        border: 1px solid rgba(196, 0, 122, 0.05);
        transition: all 0.3s ease;
    }
    .sp-seo-card:hover {
        border-color: rgba(196, 0, 122, 0.2);
        box-shadow: 0 4px 6px -1px rgba(196, 0, 122, 0.1);
    }

    .sp-seo-icon {
        width: 48px;
        height: 48px;
        border-radius: 9999px;
        background: #FDF0F6;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 12px;
        transition: transform 0.3s ease;
    }
    .sp-seo-card:hover .sp-seo-icon { transform: scale(1.1); }
    .sp-seo-icon svg { width: 24px; height: 24px; color: #C4007A; }

    .sp-seo-title {
        font-size: 1.125rem;
        font-weight: 700;
        color: #111827;
        margin: 0 0 8px;
    }
    .sp-seo-desc {
        font-size: 0.875rem;
        color: #4B5563;
        line-height: 1.625;
        margin: 0 0 12px;
    }
    .sp-seo-benefits {
        display: flex;
        flex-wrap: wrap;
        gap: 6px;
    }
    .sp-seo-benefit {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        font-size: 0.75rem;
        color: #6B7280;
    }
    .sp-seo-benefit svg { width: 12px; height: 12px; color: #C4007A; }

    .sp-seo-cta {
        text-align: center;
        margin-top: 32px;
    }
    .sp-seo-cta a {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border-radius: 9999px;
        background: linear-gradient(90deg, #C4007A, #E0398F);
        padding: 14px 32px;
        font-weight: 700;
        color: #fff;
        text-decoration: none;
        box-shadow: 0 10px 15px -3px rgba(196, 0, 122, 0.25);
        transition: all 0.3s ease;
    }
    .sp-seo-cta a:hover {
        transform: scale(1.02);
        box-shadow: 0 20px 25px -5px rgba(196, 0, 122, 0.35);
        color: #fff;
    }
    .sp-seo-cta svg { width: 16px; height: 16px; }

    /* ===== RESULTS DRIVEN ===== */
    .sp-results-section {
        background: #fff;
        border-radius: 16px;
        border: 1px solid rgba(196, 0, 122, 0.1);
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        padding: 32px;
        margin-bottom: 64px;
    }
    @media (min-width: 768px) { .sp-results-section { padding: 48px; } }

    .sp-results-h2 {
        font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
        font-size: 1.5rem;
        font-weight: 800;
        font-style: italic;
        color: #111827;
        margin: 0 0 32px;
    }
    @media (min-width: 768px) { .sp-results-h2 { font-size: 1.875rem; margin-bottom: 40px; } }
    .sp-results-h2 .accent { color: #C4007A; }

    .sp-results-list {
        display: flex;
        flex-direction: column;
        gap: 24px;
    }
    @media (min-width: 640px) { .sp-results-list { gap: 28px; } }

    .sp-result-item {
        display: flex;
        align-items: flex-start;
        gap: 12px;
    }
    @media (min-width: 640px) { .sp-result-item { gap: 16px; } }

    .sp-result-check {
        display: flex;
        width: 24px;
        height: 24px;
        flex-shrink: 0;
        align-items: center;
        justify-content: center;
        border-radius: 9999px;
        background: rgba(196, 0, 122, 0.1);
        margin-top: 2px;
    }
    .sp-result-check svg { width: 16px; height: 16px; color: #C4007A; }

    .sp-result-text {
        font-size: 0.875rem;
        color: #4B5563;
        line-height: 1.625;
        margin: 0;
    }
    @media (min-width: 640px) { .sp-result-text { font-size: 15px; } }
    .sp-result-text .bold {
        font-weight: 700;
        color: #111827;
    }

    /* ===== PROCESS ===== */
    .sp-process-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 24px;
    }
    @media (min-width: 768px) { .sp-process-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
    @media (min-width: 1024px) { .sp-process-grid { grid-template-columns: repeat(4, minmax(0, 1fr)); } }

    .sp-process-card {
        position: relative;
        background: #fff;
        border-radius: 16px;
        padding: 24px;
        border: 1px solid rgba(196, 0, 122, 0.1);
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        text-align: center;
    }
    .sp-process-card:hover {
        box-shadow: 0 10px 15px -3px rgba(196, 0, 122, 0.1);
        transform: translateY(-4px);
    }
    .sp-process-num {
        font-size: 2.25rem;
        font-weight: 700;
        color: rgba(196, 0, 122, 0.1);
        margin-bottom: 12px;
    }
    .sp-process-title {
        font-size: 1.125rem;
        font-weight: 700;
        color: #111827;
        margin: 0 0 8px;
    }
    .sp-process-desc {
        font-size: 0.875rem;
        color: #4B5563;
        line-height: 1.625;
        margin: 0;
    }

    /* ===== FAQ ===== */
    .sp-faq-wrap {
        max-width: 768px;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .sp-faq {
        border-radius: 12px;
        border: 1px solid rgba(196, 0, 122, 0.1);
        background: #fff;
        overflow: hidden;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
    }

    .sp-faq-btn {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        padding: 16px 20px;
        text-align: left;
        background: #fff;
        color: #111827;
        border: none;
        cursor: pointer;
        font-family: inherit;
        transition: all 0.3s ease;
    }
    @media (min-width: 640px) { .sp-faq-btn { padding: 20px 24px; } }
    .sp-faq-btn:hover { background: #FDF0F6; }
    .sp-faq.active .sp-faq-btn {
        background: #1A1A1A;
        color: #fff;
    }

    .sp-faq-q {
        font-size: 0.875rem;
        font-weight: 600;
    }
    @media (min-width: 640px) { .sp-faq-q { font-size: 15px; } }

    .sp-faq-icon {
        display: flex;
        width: 28px;
        height: 28px;
        flex-shrink: 0;
        align-items: center;
        justify-content: center;
        border-radius: 9999px;
        background: rgba(196, 0, 122, 0.1);
        color: #C4007A;
        transition: all 0.3s ease;
    }
    .sp-faq.active .sp-faq-icon {
        background: #C4007A;
        color: #fff;
    }
    .sp-faq-icon svg { width: 14px; height: 14px; }

    .sp-faq-body {
        display: none;
        padding: 16px 20px;
        font-size: 0.875rem;
        color: #4B5563;
        line-height: 1.625;
        border-top: 1px solid rgba(196, 0, 122, 0.1);
    }
    @media (min-width: 640px) { .sp-faq-body { padding: 20px 24px; } }
    .sp-faq.active .sp-faq-body { display: block; }

    /* ===== CTA ROCKET ===== */
    .sp-cta-rocket {
        position: relative;
        background: linear-gradient(90deg, #A3005F, #C4007A, #E0398F);
        border-radius: 16px;
        padding: 32px;
        text-align: center;
        overflow: hidden;
        margin-bottom: 64px;
    }
    @media (min-width: 768px) { .sp-cta-rocket { padding: 48px; } }

    .sp-cta-rocket-pattern {
        position: absolute;
        inset: 0;
        opacity: 0.1;
    }
    .sp-cta-rocket-pattern svg { width: 100%; height: 100%; }

    .sp-cta-rocket-inner {
        position: relative;
        z-index: 10;
    }
    .sp-cta-rocket-inner > svg {
        width: 48px;
        height: 48px;
        color: #fff;
        margin: 0 auto 16px;
        display: block;
    }
    .sp-cta-rocket h2 {
        font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
        font-size: 1.5rem;
        font-weight: 700;
        color: #fff;
        margin: 0 0 12px;
    }
    @media (min-width: 768px) { .sp-cta-rocket h2 { font-size: 1.875rem; } }

    .sp-cta-rocket p {
        color: rgba(255, 255, 255, 0.8);
        max-width: 672px;
        margin: 0 auto 24px;
        font-size: 0.875rem;
    }
    @media (min-width: 768px) { .sp-cta-rocket p { font-size: 1rem; } }

    .sp-cta-rocket-btns {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 16px;
    }
    @media (min-width: 640px) {
        .sp-cta-rocket-btns { flex-direction: row; }
    }

    .sp-cta-rocket-btn-1 {
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
    .sp-cta-rocket-btn-1:hover {
        transform: scale(1.02);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3);
        color: #C4007A;
    }
    .sp-cta-rocket-btn-1 svg { width: 16px; height: 16px; }

    .sp-cta-rocket-btn-2 {
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
    .sp-cta-rocket-btn-2:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: rgba(255, 255, 255, 0.5);
        color: #fff;
    }

    /* ===== FREE PROPOSAL (DARK) ===== */
    .sp-proposal {
        position: relative;
        width: 100%;
        background: #1A1A1A;
        padding: 48px 0;
        overflow: hidden;
    }
    @media (min-width: 640px) { .sp-proposal { padding: 64px 0; } }
    @media (min-width: 768px) { .sp-proposal { padding: 80px 0; } }

    .sp-proposal-pattern {
        position: absolute;
        inset: 0;
        opacity: 0.04;
        pointer-events: none;
    }
    .sp-proposal-pattern svg { width: 100%; height: 100%; }

    .sp-proposal-grid {
        position: relative;
        z-index: 10;
        display: grid;
        grid-template-columns: 1fr;
        gap: 32px;
        align-items: center;
    }
    @media (min-width: 640px) { .sp-proposal-grid { gap: 40px; } }
    @media (min-width: 1024px) {
        .sp-proposal-grid { grid-template-columns: 0.85fr 1.15fr; }
    }

    .sp-proposal-pre {
        color: rgba(255, 255, 255, 0.6);
        font-size: 0.875rem;
        margin: 0 0 6px;
    }
    @media (min-width: 640px) { .sp-proposal-pre { font-size: 1rem; } }

    .sp-proposal-h2 {
        font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
        font-size: 1.5rem;
        font-weight: 800;
        font-style: italic;
        color: #fff;
        line-height: 1.3;
        margin: 0;
    }
    @media (min-width: 640px) { .sp-proposal-h2 { font-size: 1.875rem; } }
    @media (min-width: 768px) { .sp-proposal-h2 { font-size: 2.25rem; } }
    .sp-proposal-h2 .accent { color: #F4C4DE; }

    .sp-proposal-form {
        display: grid;
        grid-template-columns: 1fr;
        gap: 14px;
    }
    @media (min-width: 640px) {
        .sp-proposal-form { grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 16px; }
    }

    .sp-proposal-input,
    .sp-proposal-textarea {
        width: 100%;
        border-radius: 12px;
        border: 1px solid rgba(255, 255, 255, 0.15);
        background: rgba(255, 255, 255, 0.06);
        padding: 12px 16px;
        font-size: 0.875rem;
        color: #fff;
        font-family: inherit;
        outline: none;
        transition: all 0.3s ease;
    }
    .sp-proposal-input::placeholder,
    .sp-proposal-textarea::placeholder { color: rgba(255, 255, 255, 0.4); }
    .sp-proposal-input:focus,
    .sp-proposal-textarea:focus {
        border-color: rgba(224, 57, 143, 0.5);
        box-shadow: 0 0 0 3px rgba(224, 57, 143, 0.2);
    }
    .sp-proposal-textarea { resize: none; }

    .sp-proposal-recaptcha {
        display: flex;
        align-items: center;
        gap: 10px;
        cursor: pointer;
        user-select: none;
    }
    .sp-proposal-recaptcha input[type="checkbox"] {
        width: 16px;
        height: 16px;
        accent-color: #E0398F;
        cursor: pointer;
        flex-shrink: 0;
    }
    .sp-proposal-recaptcha span {
        font-size: 12px;
        color: rgba(255, 255, 255, 0.6);
    }
    @media (min-width: 640px) { .sp-proposal-recaptcha span { font-size: 13px; } }
    .sp-proposal-recaptcha .brand {
        margin-left: auto;
        font-size: 10px;
        color: rgba(255, 255, 255, 0.3);
        font-weight: 500;
    }

    .sp-proposal-submit {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        border-radius: 9999px;
        background: linear-gradient(90deg, #C4007A, #E0398F);
        padding: 14px;
        font-size: 0.875rem;
        font-weight: 700;
        color: #fff;
        border: none;
        cursor: pointer;
        font-family: inherit;
        box-shadow: 0 10px 15px -3px rgba(196, 0, 122, 0.3);
        transition: all 0.3s ease;
        grid-column: span 1;
    }
    @media (min-width: 640px) {
        .sp-proposal-submit { font-size: 1rem; grid-column: span 2; }
    }
    .sp-proposal-submit:hover {
        transform: scale(1.02);
        box-shadow: 0 20px 25px -5px rgba(196, 0, 122, 0.4);
    }

    /* ===== Bottom spacing ===== */
    .sp-bottom-spacer { height: 64px; }
</style>

<main class="sp-page" id="servicesPage">

    <!-- ===== Decorative Background ===== -->
    <div class="sp-bg">
        <div class="sp-bg-blob-1"></div>
        <div class="sp-bg-blob-2"></div>
        <svg class="sp-bg-shape sp-bg-shape-1" viewBox="0 0 100 100">
            <rect x="15" y="15" width="70" height="70" transform="rotate(45 50 50)"/>
        </svg>
        <svg class="sp-bg-shape sp-bg-shape-2" viewBox="0 0 100 100">
            <circle cx="50" cy="50" r="35"/>
        </svg>
    </div>

    <!-- ===== HERO + QUOTE FORM ===== -->
    <section class="sp-hero">
        <div class="sp-container">
            <div class="sp-hero-grid">
                <!-- Left -->
                <div class="sp-hero-left">
                    <div class="sp-pill">
                        <?= spIcon('sparkles') ?>
                        <span><?= e((string) $servicesContent['hero_badge']) ?></span>
                    </div>

                    <h1 class="sp-hero-h1">
                        <?= e((string) $servicesContent['hero_heading_prefix']) ?>
                        <span class="accent"><?= e((string) $servicesContent['hero_heading_highlight']) ?></span>
                    </h1>

                    <p class="sp-hero-sub"><?= e((string) $servicesContent['summary']) ?></p>

                    <div class="sp-hero-btns">
                        <a href="<?= e((string) $servicesContent['hero_primary_href']) ?>" class="sp-btn-primary">
                            <?= e((string) $servicesContent['hero_primary_label']) ?>
                            <?= spIcon('arrow') ?>
                        </a>
                        <span class="sp-or-badge"><?= e((string) $servicesContent['button_separator_label']) ?></span>
                        <a href="tel:<?= e((string) $servicesContent['hero_phone']) ?>" class="sp-btn-dark">
                            <?= spIcon('phone') ?>
                            <?= e((string) $servicesContent['hero_phone_label']) ?>
                        </a>
                    </div>
                </div>

                <!-- Right — Quote Form -->
                <div class="sp-quote-card">
                    <h2><?= e((string) $servicesContent['quote_title']) ?></h2>
                    <form class="sp-quote-form" method="POST" action="/contact.php">
                        <input type="text" name="name" placeholder="<?= e((string) $servicesContent['quote_name_placeholder']) ?>" class="sp-quote-input" required>
                        <input type="tel" name="phone" placeholder="<?= e((string) $servicesContent['quote_phone_placeholder']) ?>" class="sp-quote-input" required>
                        <input type="email" name="email" placeholder="<?= e((string) $servicesContent['quote_email_placeholder']) ?>" class="sp-quote-input" required>
                        <textarea name="message" placeholder="<?= e((string) $servicesContent['quote_message_placeholder']) ?>" rows="3" class="sp-quote-textarea" required></textarea>

                        <label class="sp-recaptcha">
                            <span class="sp-recaptcha-left">
                                <input type="checkbox" required>
                                <span><?= e((string) $servicesContent['robot_label']) ?></span>
                            </span>
                            <span class="sp-recaptcha-brand"><?= e((string) $servicesContent['recaptcha_label']) ?></span>
                        </label>

                        <button type="submit" class="sp-submit">
                            <?= e((string) $servicesContent['quote_submit_label']) ?>
                            <?= spIcon('send') ?>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== INTRO ===== -->
    <section class="sp-intro">
        <div class="sp-container">
            <div class="sp-intro-inner">
                <p class="sp-intro-eyebrow"><?= e((string) $servicesContent['intro_eyebrow']) ?></p>
                <h2 class="sp-intro-h2">
                    <?= e((string) $servicesContent['intro_heading_prefix']) ?>
                    <span class="accent"><?= e((string) $servicesContent['intro_heading_highlight']) ?></span>
                </h2>

                <div class="sp-intro-body">
                    <?php foreach ($servicesContent['intro_paragraphs'] as $paragraph): ?>
                        <?php if (trim((string) $paragraph) !== ''): ?><p><?= e((string) $paragraph) ?></p><?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== WEBSITE CTA ===== -->
    <section class="sp-website-cta">
        <div class="sp-container">
            <div class="sp-website-grid">
                <div>
                    <p class="sp-website-pre"><?= e((string) $servicesContent['website_pre']) ?></p>
                    <h2 class="sp-website-h2">
                        <?= e((string) $servicesContent['website_heading']) ?>
                    </h2>
                    <p class="sp-website-sub"><?= e((string) $servicesContent['website_description']) ?></p>

                    <div class="sp-website-btns">
                        <a href="<?= e((string) $servicesContent['website_primary_href']) ?>" class="sp-btn-primary">
                            <?= e((string) $servicesContent['website_primary_label']) ?>
                            <?= spIcon('arrow') ?>
                        </a>
                        <span class="sp-or-badge"><?= e((string) $servicesContent['button_separator_label']) ?></span>
                        <a href="tel:<?= e((string) $servicesContent['website_phone']) ?>" class="sp-btn-dark">
                            <?= spIcon('phone') ?>
                            <?= e((string) $servicesContent['website_phone_label']) ?>
                        </a>
                    </div>
                </div>

                <div class="sp-website-image">
                    <img
                        src="<?= e((string) $servicesContent['website_image']) ?>"
                        alt="<?= e((string) $servicesContent['website_image_alt']) ?>"
                        loading="lazy"
                    >
                </div>
            </div>
        </div>
    </section>

    <!-- ===== STATS + MAIN CONTENT ===== -->
    <section class="sp-stats-section">
        <div class="sp-container">

            <!-- Stats -->
            <div class="sp-stats">
                <?php foreach ($stats as $stat): ?>
                    <div class="sp-stat">
                        <?= spIcon($stat['icon']) ?>
                        <div class="sp-stat-value"><?= htmlspecialchars($stat['value']) ?></div>
                        <div class="sp-stat-label"><?= htmlspecialchars($stat['label']) ?></div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- ===== CORE SERVICES ===== -->
            <div class="sp-block" id="core-services">
                <div class="sp-block-header">
                    <p class="sp-block-eyebrow"><?= e((string) $servicesContent['services_eyebrow']) ?></p>
                    <h2 class="sp-block-title"><?= e((string) $servicesContent['services_heading_prefix']) ?> <span class="accent"><?= e((string) $servicesContent['services_heading_highlight']) ?></span></h2>
                    <p class="sp-block-sub"><?= e((string) $servicesContent['services_subtitle']) ?></p>
                </div>

                <div class="sp-services-grid">
                    <?php foreach ($mainServices as $service): ?>
                        <div class="sp-service-card">
                            <div class="sp-service-inner">
                                <div class="sp-service-icon">
                                    <?= spIcon($service['icon']) ?>
                                </div>
                                <h3 class="sp-service-title"><?= htmlspecialchars($service['title']) ?></h3>
                                <p class="sp-service-desc"><?= htmlspecialchars($service['description']) ?></p>

                                <div class="sp-service-tags">
                                    <?php foreach (($service['features'] ?? []) as $f): ?>
                                        <span class="sp-service-tag"><?= htmlspecialchars($f) ?></span>
                                    <?php endforeach; ?>
                                </div>

                                <a href="<?= e((string) $servicesContent['main_service_link_href']) ?>" class="sp-service-link">
                                    <?= e((string) $servicesContent['main_service_link_label']) ?>
                                    <?= spIcon('arrow') ?>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- ===== SEO SERVICES ===== -->
            <div class="sp-seo-section" id="seo-services">
                <div class="sp-block-header">
                    <div class="sp-pill" style="margin-bottom: 12px;">
                        <?= spIcon('chart') ?>
                        <span><?= e((string) $servicesContent['seo_badge']) ?></span>
                    </div>
                    <h2 class="sp-block-title">
                        <?= e((string) $servicesContent['seo_heading_prefix']) ?>
                        <span class="accent"><?= e((string) $servicesContent['seo_heading_highlight']) ?></span>
                    </h2>
                    <p class="sp-block-sub"><?= e((string) $servicesContent['seo_subtitle']) ?></p>
                </div>

                <div class="sp-seo-grid">
                    <?php foreach ($seoServices as $seo): ?>
                        <div class="sp-seo-card">
                            <div class="sp-seo-icon">
                                <?= spIcon($seo['icon']) ?>
                            </div>
                            <h4 class="sp-seo-title"><?= htmlspecialchars($seo['title']) ?></h4>
                            <p class="sp-seo-desc"><?= htmlspecialchars($seo['description']) ?></p>

                            <div class="sp-seo-benefits">
                                <?php foreach (($seo['benefits'] ?? []) as $b): ?>
                                    <span class="sp-seo-benefit">
                                        <?= spIcon('check') ?>
                                        <?= htmlspecialchars($b) ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="sp-seo-cta">
                    <a href="<?= e((string) $servicesContent['seo_quote_href']) ?>">
                        <?= e((string) $servicesContent['seo_quote_label']) ?>
                        <?= spIcon('arrow') ?>
                    </a>
                </div>
            </div>

            <!-- ===== B2B & EXHIBITION SEO SPOTLIGHT (Inspired by reference) ===== -->
            <div class="sp-exhibition-spotlight" style="margin: 40px 0 52px; background: linear-gradient(135deg, #FFFFFF 0%, #FFF5FA 100%); border: 1.5px solid rgba(196, 0, 122, 0.22); border-radius: 24px; padding: 38px 30px; text-align: center; box-shadow: 0 16px 36px -10px rgba(196, 0, 122, 0.08); position: relative; overflow: hidden;">
                <div style="position: absolute; top: 0; left: 0; right: 0; height: 4px; background: linear-gradient(90deg, #C4007A, #E0398F);"></div>
                
                <div style="display: inline-flex; align-items: center; gap: 6px; background: rgba(196, 0, 122, 0.08); border: 1px solid rgba(196, 0, 122, 0.18); padding: 5px 14px; border-radius: 9999px; color: #C4007A; font-size: 0.72rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 14px;">
                    <?= spIcon('award') ?>
                    <span>SPECIALIZED PROVEN FLAGSHIP</span>
                </div>

                <h3 style="font-family: 'Plus Jakarta Sans', sans-serif; font-size: clamp(1.85rem, 3.4vw, 2.5rem); font-weight: 800; color: #111827; margin: 0 0 12px; line-height: 1.25;">
                    Boost Your Event &amp; Exhibition <span style="color: #C4007A; text-decoration: underline; text-decoration-color: rgba(196, 0, 122, 0.35); text-underline-offset: 6px;">With SEO.</span>
                </h3>

                <h4 style="font-size: clamp(1.05rem, 1.8vw, 1.25rem); font-weight: 700; color: #1F2937; margin: 0 auto 12px; max-width: 760px; line-height: 1.4;">
                    Want to attract more attendees, sponsors, exhibitors, and increase revenue?
                </h4>

                <p style="font-size: 0.96rem; color: #4B5563; max-width: 800px; margin: 0 auto 10px; line-height: 1.65;">
                    We'll help you uncover hidden opportunities and improve your exhibition website's performance with a customized Event SEO strategy that drives pre-registered trade buyers, sells out exhibitor stalls, and delivers measurable results.
                </p>

                <p style="font-size: 0.88rem; color: #6B7280; max-width: 780px; margin: 0 auto 20px; line-height: 1.6;">
                    The organic search engine partner behind <strong>Bharat Tex Fair (Ministry of Textiles)</strong> and <strong>IHGF Delhi Autumn Fair (EPCH)</strong>. If you have any questions about how to kick-start your SEO strategy get in touch today.
                </p>

                <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 10px; margin-bottom: 24px;">
                    <span style="font-size: 0.78rem; font-weight: 700; background: #FFFFFF; color: #C4007A; border: 1px solid rgba(196, 0, 122, 0.16); padding: 5px 14px; border-radius: 9999px;">✓ Attract Global Attendees</span>
                    <span style="font-size: 0.78rem; font-weight: 700; background: #FFFFFF; color: #C4007A; border: 1px solid rgba(196, 0, 122, 0.16); padding: 5px 14px; border-radius: 9999px;">✓ Sell Out Exhibitor Stalls</span>
                    <span style="font-size: 0.78rem; font-weight: 700; background: #FFFFFF; color: #C4007A; border: 1px solid rgba(196, 0, 122, 0.16); padding: 5px 14px; border-radius: 9999px;">✓ Multi-Date Google Event Schema</span>
                    <span style="font-size: 0.78rem; font-weight: 700; background: #FFFFFF; color: #C4007A; border: 1px solid rgba(196, 0, 122, 0.16); padding: 5px 14px; border-radius: 9999px;">✓ 400%+ Organic Lift Proven</span>
                </div>

                <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 14px; margin-bottom: 16px;">
                    <a href="/b2b-exhibition-seo.php" style="display: inline-flex; align-items: center; gap: 8px; background: linear-gradient(135deg, #C4007A 0%, #E0398F 100%); color: #fff; padding: 13px 28px; border-radius: 9999px; font-weight: 700; font-size: 0.95rem; text-decoration: none; box-shadow: 0 10px 24px rgba(196, 0, 122, 0.32); white-space: nowrap; transition: all 0.25s ease;">
                        <span>Let's Talk Optimization</span>
                        <?= spIcon('arrow') ?>
                    </a>
                    <a href="tel:+919999674255" style="display: inline-flex; align-items: center; gap: 8px; background: #FFFFFF; border: 1.5px solid rgba(196, 0, 122, 0.25); color: #C4007A; padding: 13px 24px; border-radius: 9999px; font-weight: 700; font-size: 0.95rem; text-decoration: none; white-space: nowrap; transition: all 0.25s ease;">
                        <span>Call: +91-9999674255</span>
                    </a>
                </div>

                <p style="font-size: 0.78rem; color: #6B7280; line-height: 1.55; margin: 0 auto; max-width: 740px;">
                    * While results can't be guaranteed, events and trade exhibitions are uniquely positioned to perform exceptionally well with effective search engine optimization.
                </p>
            </div>

            <!-- ===== RESULTS DRIVEN ===== -->
            <div class="sp-results-section">
                <h2 class="sp-results-h2">
                    <?= e((string) $servicesContent['results_heading_prefix']) ?>
                    <span class="accent"><?= e((string) $servicesContent['results_heading_highlight']) ?></span>
                </h2>

                <div class="sp-results-list">
                    <?php foreach ($resultsDriven as $r): ?>
                        <div class="sp-result-item">
                            <span class="sp-result-check">
                                <?= spIcon('check') ?>
                            </span>
                            <p class="sp-result-text">
                                <span class="bold"><?= htmlspecialchars($r['title']) ?></span>
                                <?= htmlspecialchars($r['description']) ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- ===== PROCESS ===== -->
            <div class="sp-block">
                <div class="sp-block-header">
                    <h2 class="sp-block-title"><?= e((string) $servicesContent['process_heading_prefix']) ?> <span class="accent"><?= e((string) $servicesContent['process_heading_highlight']) ?></span></h2>
                    <p class="sp-block-sub"><?= e((string) $servicesContent['process_subtitle']) ?></p>
                </div>

                <div class="sp-process-grid">
                    <?php foreach ($process as $step): ?>
                        <div class="sp-process-card">
                            <div class="sp-process-num"><?= htmlspecialchars($step['step']) ?></div>
                            <h3 class="sp-process-title"><?= htmlspecialchars($step['title']) ?></h3>
                            <p class="sp-process-desc"><?= htmlspecialchars($step['description']) ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- ===== FAQ ===== -->
            <div class="sp-block">
                <div class="sp-block-header">
                    <h2 class="sp-block-title">
                        <?= e((string) $servicesContent['faq_heading_prefix']) ?>
                        <span class="accent"><?= e((string) $servicesContent['faq_heading_highlight']) ?></span>
                    </h2>
                </div>

                <div class="sp-faq-wrap" id="spFaqWrap">
                    <?php foreach ($faqs as $i => $faq): ?>
                        <div class="sp-faq <?= $i === 0 ? 'active' : '' ?>" data-faq-index="<?= $i ?>">
                            <button type="button" class="sp-faq-btn" onclick="spToggleFaq(this)">
                                <span class="sp-faq-q"><?= htmlspecialchars($faq['q']) ?></span>
                                <span class="sp-faq-icon">
                                    <?= spIcon($i === 0 ? 'minus' : 'plus') ?>
                                </span>
                            </button>
                            <div class="sp-faq-body"><?= htmlspecialchars($faq['a']) ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- ===== CTA ROCKET ===== -->
            <div class="sp-cta-rocket">
                <div class="sp-cta-rocket-pattern">
                    <svg viewBox="0 0 100 100" preserveAspectRatio="none">
                        <defs>
                            <pattern id="cta-grid-services" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                <rect x="0" y="0" width="1" height="1" fill="white"/>
                            </pattern>
                        </defs>
                        <rect x="0" y="0" width="100" height="100" fill="url(#cta-grid-services)"/>
                    </svg>
                </div>
                <div class="sp-cta-rocket-inner">
                    <?= spIcon('rocket') ?>
                    <h2><?= e((string) $servicesContent['cta_title']) ?></h2>
                    <p><?= e((string) $servicesContent['cta_description']) ?></p>

                    <div class="sp-cta-rocket-btns">
                        <a href="<?= e((string) $servicesContent['cta_primary_href']) ?>" class="sp-cta-rocket-btn-1">
                            <?= e((string) $servicesContent['cta_primary_label']) ?>
                            <?= spIcon('arrow') ?>
                        </a>
                        <a href="<?= e((string) $servicesContent['cta_secondary_href']) ?>" class="sp-cta-rocket-btn-2">
                            <?= e((string) $servicesContent['cta_secondary_label']) ?>
                        </a>
                    </div>
                </div>
            </div>

            <div class="sp-bottom-spacer"></div>

        </div>
    </section>

    <!-- ===== FREE PROPOSAL (DARK) ===== -->
    <section class="sp-proposal">
        <div class="sp-proposal-pattern">
            <svg viewBox="0 0 100 100" preserveAspectRatio="none">
                <defs>
                    <pattern id="proposal-grid" x="0" y="0" width="14" height="14" patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="1" height="1" fill="white"/>
                    </pattern>
                </defs>
                <rect x="0" y="0" width="100" height="100" fill="url(#proposal-grid)"/>
            </svg>
        </div>

        <div class="sp-container">
            <div class="sp-proposal-grid">
                <div>
                    <p class="sp-proposal-pre"><?= e((string) $servicesContent['proposal_pre']) ?></p>
                    <h2 class="sp-proposal-h2">
                        <?= e((string) $servicesContent['proposal_heading_prefix']) ?>
                        <span class="accent"><?= e((string) $servicesContent['proposal_heading_highlight']) ?></span> <?= e((string) $servicesContent['proposal_heading_suffix']) ?>
                    </h2>
                </div>

                <form class="sp-proposal-form" method="POST" action="/contact.php">
                    <input type="text" name="name" placeholder="<?= e((string) $servicesContent['proposal_name_placeholder']) ?>" class="sp-proposal-input" required>
                    <input type="tel" name="phone" placeholder="<?= e((string) $servicesContent['proposal_phone_placeholder']) ?>" class="sp-proposal-input" required>
                    <input type="email" name="email" placeholder="<?= e((string) $servicesContent['proposal_email_placeholder']) ?>" class="sp-proposal-input" required>
                    <textarea name="message" placeholder="<?= e((string) $servicesContent['proposal_message_placeholder']) ?>" rows="1" class="sp-proposal-textarea" required></textarea>

                    <label class="sp-proposal-recaptcha">
                        <input type="checkbox" required>
                        <span><?= e((string) $servicesContent['proposal_robot_label']) ?></span>
                        <span class="brand"><?= e((string) $servicesContent['proposal_recaptcha_label']) ?></span>
                    </label>

                    <button type="submit" class="sp-proposal-submit"><?= e((string) $servicesContent['proposal_submit_label']) ?></button>
                </form>
            </div>
        </div>
    </section>

</main>

<script>
    // ===== FAQ toggle =====
    function spToggleFaq(btn) {
        const faq = btn.closest('.sp-faq');
        const wrap = document.getElementById('spFaqWrap');
        const isActive = faq.classList.contains('active');

        // Close all
        wrap.querySelectorAll('.sp-faq').forEach((el) => {
            el.classList.remove('active');
            const icon = el.querySelector('.sp-faq-icon');
            if (icon) icon.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>`;
        });

        // Open current if it was closed
        if (!isActive) {
            faq.classList.add('active');
            const icon = faq.querySelector('.sp-faq-icon');
            if (icon) icon.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/></svg>`;
        }
    }
</script>

<?php require_once __DIR__ . '/app/templates/footer.php'; ?>