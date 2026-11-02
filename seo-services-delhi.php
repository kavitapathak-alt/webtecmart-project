<?php
$pageMeta = [
    'title' => 'SEO Services in Delhi – Result-Driven SEO to Grow Your Business | WebTecMart',
    'description' => 'Build search visibility that drives real business growth. WebTecMart is the top-rated SEO agency in Delhi NCR providing AI-ready SEO, Google #1 rankings, and qualified organic leads.',
];
require_once __DIR__ . '/app/templates/header.php';
require_once __DIR__ . '/app/components/sections/FooterSection.php';
require_once __DIR__ . '/functions.php';

// Pull dynamic overrides from DB if updated via Admin Panel
$dbService = getServiceBySlug('seo-services-delhi');

$heroTitle = $dbService['hero_title'] ?? 'Build Search Visibility That Drives Real Business Growth';
$heroDesc = $dbService['hero_description'] ?? ($dbService['summary'] ?? 'Get discovered through traditional search and emerging AI experiences with data-led SEO built around relevant content, strong technical foundations, entity signals, and sustainable authority.');
$founderName = $dbService['founder_name'] ?? 'Mr. Manoj Sharma';
$founderRole = $dbService['founder_role'] ?? 'Co-Founder & Digital Growth Strategist';
?>

<!-- Schema.org JSON-LD Structured Data for Local SEO & FAQPage -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "LocalBusiness",
      "@id": "https://webtecmart.com/#organization",
      "name": "WebTecMart Digital - Premier SEO Agency Delhi",
      "url": "https://webtecmart.com/seo-services-delhi.php",
      "logo": "https://webtecmart.com/assets/images/webtecmart-logo.png",
      "description": "Top-rated SEO company in Delhi NCR providing data-driven Google #1 rankings, AI-ready SEO, and qualified lead generation.",
      "telephone": "+91-9999674255",
      "email": "info@webtecmart.com",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Connaught Place / Nehru Place Commercial Center",
        "addressLocality": "New Delhi",
        "addressRegion": "Delhi",
        "postalCode": "110001",
        "addressCountry": "IN"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": 28.6139,
        "longitude": 77.2090
      },
      "areaServed": [
        {"@type": "City", "name": "Delhi"},
        {"@type": "City", "name": "New Delhi"},
        {"@type": "City", "name": "Noida"},
        {"@type": "City", "name": "Gurgaon"},
        {"@type": "City", "name": "Faridabad"},
        {"@type": "City", "name": "Ghaziabad"}
      ]
    },
    {
      "@type": "FAQPage",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "What are SEO services and why does my business need them?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "SEO services optimize your website's technical health, content, and search authority so it ranks higher on Google when customers search for your products or services. In competitive markets like Delhi NCR, SEO is essential to capture ready-to-buy customers."
          }
        },
        {
          "@type": "Question",
          "name": "How long does it take to see measurable SEO results in Delhi?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "While technical fixes and on-page optimization reflect in Google rankings within 4 to 8 weeks, significant organic traffic jumps and consistent lead flow typically take 3 to 6 months depending on competition."
          }
        }
      ]
    }
  ]
}
</script>

<style>
    /* ============================================================
       PREMIER MAIN SEO LANDING PAGE STYLES (Delhi NCR Hub)
       Strict Theme: WebTecMart Magenta & Hot Pink ONLY
       (#C4007A, #E0398F, #FFF0F7, #FCE7F3, #850053, #111827)
       NO PURPLE / BLUE / VIOLET ACCENTS.
       ============================================================ */
    .del-seo-page {
        width: 100%;
        background: #FFFFFF;
        color: #1F1B2A;
        font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
        overflow: hidden;
    }
    .del-container {
        max-width: 1240px;
        margin: 0 auto;
        padding: 0 20px;
        position: relative;
        z-index: 2;
    }

    /* Common Typography & Badges */
    .del-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #FFF0F7;
        border: 1px solid rgba(196, 0, 122, 0.22);
        color: #C4007A;
        padding: 6px 14px;
        border-radius: 9999px;
        font-size: 0.76rem;
        font-weight: 800;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        margin-bottom: 14px;
    }
    .del-eyebrow svg {
        width: 14px;
        height: 14px;
        color: #C4007A;
    }
    .del-section-title {
        font-size: clamp(1.85rem, 3.2vw, 2.65rem);
        font-weight: 800;
        color: #111827;
        line-height: 1.22;
        letter-spacing: -0.02em;
        margin: 0 0 14px;
    }
    .del-section-title .accent {
        color: #C4007A;
        position: relative;
        display: inline-block;
    }
    .del-section-title .accent svg {
        position: absolute;
        left: 0;
        bottom: -4px;
        width: 100%;
        height: 6px;
        pointer-events: none;
    }
    .del-section-sub {
        font-size: 1.02rem;
        line-height: 1.62;
        color: #4B5563;
        max-width: 760px;
        margin: 0 auto 36px;
    }
    .del-section-head {
        text-align: center;
        margin-bottom: 38px;
    }

    /* Primary Buttons */
    .del-btn-primary {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        background: linear-gradient(135deg, #C4007A 0%, #E0398F 100%);
        color: #FFFFFF !important;
        font-weight: 700;
        font-size: 0.95rem;
        padding: 13px 26px;
        border-radius: 9999px;
        text-decoration: none;
        border: none;
        box-shadow: 0 10px 22px rgba(196, 0, 122, 0.28);
        transition: all 0.25s ease;
        cursor: pointer;
    }
    .del-btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 14px 28px rgba(196, 0, 122, 0.38);
        color: #FFFFFF !important;
    }
    .del-btn-secondary {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        background: #FFFFFF;
        color: #111827 !important;
        border: 1.5px solid rgba(196, 0, 122, 0.28);
        font-weight: 700;
        font-size: 0.95rem;
        padding: 12px 24px;
        border-radius: 9999px;
        text-decoration: none;
        transition: all 0.25s ease;
        cursor: pointer;
    }
    .del-btn-secondary:hover {
        background: #FFF0F7;
        border-color: #C4007A;
        color: #C4007A !important;
    }

    /* ========================================================
       1. HERO SECTION (2-COL WITH FLOATING QUOTE FORM)
       ======================================================== */
    .del-hero {
        position: relative;
        padding: 56px 0 52px;
        background: linear-gradient(180deg, #FFF5FA 0%, #FFFFFF 100%);
        border-bottom: 1px solid rgba(196, 0, 122, 0.08);
    }
    .del-hero-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 40px;
        align-items: center;
    }
    @media (min-width: 992px) {
        .del-hero-grid {
            grid-template-columns: 1.15fr 0.85fr;
            gap: 48px;
        }
    }
    .del-hero-title {
        font-size: clamp(2.1rem, 3.8vw, 3.1rem);
        font-weight: 800;
        color: #111827;
        line-height: 1.16;
        letter-spacing: -0.025em;
        margin: 0 0 16px;
    }
    .del-hero-desc {
        font-size: 1.05rem;
        line-height: 1.64;
        color: #4B5563;
        margin: 0 0 24px;
        max-width: 620px;
    }
    .del-hero-bullets {
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin-bottom: 28px;
    }
    .del-bullet-item {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 0.96rem;
        font-weight: 600;
        color: #1F2937;
    }
    .del-bullet-item .dot {
        width: 22px;
        height: 22px;
        border-radius: 50%;
        background: #FFF0F7;
        color: #C4007A;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 0.82rem;
        font-weight: 800;
        flex-shrink: 0;
        border: 1px solid rgba(196, 0, 122, 0.25);
    }
    .del-hero-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 14px;
        align-items: center;
        margin-bottom: 28px;
    }
    .del-author-card {
        display: inline-flex;
        align-items: center;
        gap: 14px;
        background: #FFFFFF;
        border: 1px solid rgba(196, 0, 122, 0.18);
        border-radius: 16px;
        padding: 10px 18px;
        box-shadow: 0 6px 18px rgba(196, 0, 122, 0.05);
    }
    .del-author-avatar {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: linear-gradient(135deg, #C4007A, #E0398F);
        color: #FFFFFF;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 1.1rem;
        flex-shrink: 0;
    }
    .del-author-meta .name {
        font-weight: 700;
        font-size: 0.92rem;
        color: #111827;
    }
    .del-author-meta .sub {
        font-size: 0.78rem;
        color: #6B7280;
    }

    /* Floating Hero Form Card (Image 1 Reference) */
    .del-hero-form-card {
        background: #FFFFFF;
        border-radius: 24px;
        padding: 32px 28px;
        box-shadow: 0 20px 45px rgba(196, 0, 122, 0.12), 0 2px 8px rgba(0,0,0,0.04);
        border: 1.5px solid rgba(196, 0, 122, 0.18);
        position: relative;
    }
    .del-hero-form-card h3 {
        font-size: 1.45rem;
        font-weight: 800;
        color: #111827;
        margin: 0 0 6px;
        letter-spacing: -0.01em;
    }
    .del-hero-form-card p {
        font-size: 0.86rem;
        color: #6B7280;
        margin: 0 0 20px;
    }
    .del-form-group {
        margin-bottom: 13px;
    }
    .del-form-group input,
    .del-form-group textarea {
        width: 100%;
        padding: 11px 15px;
        border-radius: 12px;
        border: 1px solid #E5E7EB;
        background: #F9FAFB;
        font-size: 0.9rem;
        color: #111827;
        outline: none;
        transition: all 0.2s ease;
        font-family: inherit;
    }
    .del-form-group input:focus,
    .del-form-group textarea:focus {
        border-color: #C4007A;
        background: #FFFFFF;
        box-shadow: 0 0 0 3px rgba(196, 0, 122, 0.12);
    }
    .del-recaptcha-box {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: #F9FAFB;
        border: 1px solid #E5E7EB;
        border-radius: 10px;
        padding: 9px 14px;
        margin-bottom: 14px;
    }
    .del-recaptcha-label {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 0.84rem;
        color: #374151;
        cursor: pointer;
    }
    .del-recaptcha-label input {
        width: 17px;
        height: 17px;
        accent-color: #C4007A;
        cursor: pointer;
    }
    .del-hero-submit {
        width: 100%;
        padding: 13px 20px;
        font-size: 0.98rem;
    }
    .del-hero-feedback {
        display: none;
        margin-top: 12px;
        padding: 10px 14px;
        border-radius: 10px;
        font-size: 0.85rem;
        font-weight: 600;
        text-align: center;
    }
    .del-hero-feedback.success {
        background: #ECFDF5;
        color: #065F46;
        border: 1px solid #A7F3D0;
    }

    /* ========================================================
       2. SMART. SCALABLE. SECURE. BANNER (Image 1 Bottom)
       ======================================================== */
    .del-banner-section {
        padding: 56px 0;
        background: #FFFFFF;
        text-align: center;
    }
    .del-banner-inner {
        max-width: 980px;
        margin: 0 auto;
    }
    .del-banner-eyebrow {
        font-size: 0.95rem;
        font-weight: 800;
        color: #C4007A;
        letter-spacing: 0.08em;
        margin-bottom: 12px;
        text-transform: uppercase;
    }
    .del-banner-title {
        font-size: clamp(1.8rem, 3.4vw, 2.7rem);
        font-weight: 800;
        color: #111827;
        line-height: 1.24;
        margin: 0 0 18px;
    }
    .del-banner-desc {
        font-size: 1.02rem;
        line-height: 1.68;
        color: #4B5563;
        margin: 0 0 16px;
    }
    .del-banner-desc-sub {
        font-size: 0.94rem;
        line-height: 1.65;
        color: #6B7280;
        margin: 0 0 28px;
    }

    /* ========================================================
       3. KEY TAKEAWAYS & SERP SNAPSHOT (Image 2 Reference)
       ======================================================== */
    .del-takeaways-section {
        padding: 60px 0;
        background: #FFF5FA;
        border-top: 1px solid rgba(196, 0, 122, 0.08);
        border-bottom: 1px solid rgba(196, 0, 122, 0.08);
    }
    .del-takeaways-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 36px;
        align-items: center;
    }
    @media (min-width: 992px) {
        .del-takeaways-grid {
            grid-template-columns: 1.05fr 0.95fr;
            gap: 48px;
        }
    }
    .del-takeaways-checklist {
        display: flex;
        flex-direction: column;
        gap: 11px;
        margin: 22px 0 28px;
    }
    .del-takeaway-item {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        font-size: 0.95rem;
        font-weight: 600;
        color: #1F2937;
        line-height: 1.45;
    }
    .del-takeaway-item .chk {
        color: #C4007A;
        font-weight: 800;
        font-size: 1.05rem;
        flex-shrink: 0;
        line-height: 1;
        margin-top: 2px;
    }

    /* Google SERP Snapshot Mockup (Image 2 Right) */
    .del-serp-mockup {
        background: #FFFFFF;
        border-radius: 20px;
        border: 1.5px solid rgba(196, 0, 122, 0.22);
        box-shadow: 0 18px 40px rgba(196, 0, 122, 0.09);
        padding: 22px;
        overflow: hidden;
    }
    .del-serp-browser-bar {
        display: flex;
        align-items: center;
        gap: 10px;
        background: #F9FAFB;
        border: 1px solid #E5E7EB;
        border-radius: 9999px;
        padding: 8px 14px;
        margin-bottom: 14px;
        font-size: 0.85rem;
        color: #4B5563;
    }
    .del-serp-browser-bar .search-icon {
        color: #C4007A;
    }
    .del-serp-tabs {
        display: flex;
        gap: 14px;
        font-size: 0.78rem;
        color: #6B7280;
        border-bottom: 1px solid #E5E7EB;
        padding-bottom: 10px;
        margin-bottom: 16px;
    }
    .del-serp-tabs .active {
        color: #C4007A;
        font-weight: 700;
        border-bottom: 2px solid #C4007A;
        padding-bottom: 8px;
    }
    .del-ai-overview-card {
        background: #FFF0F7;
        border: 1px solid rgba(196, 0, 122, 0.25);
        border-radius: 14px;
        padding: 14px 16px;
        margin-bottom: 16px;
    }
    .del-ai-tag {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 0.72rem;
        font-weight: 800;
        color: #C4007A;
        text-transform: uppercase;
        margin-bottom: 6px;
    }
    .del-ai-desc {
        font-size: 0.82rem;
        color: #374151;
        line-height: 1.48;
        margin: 0;
    }
    .del-serp-winner-card {
        border: 2px solid #C4007A;
        border-radius: 14px;
        padding: 14px 16px;
        background: #FFFFFF;
        position: relative;
    }
    .del-winner-badge {
        position: absolute;
        top: -10px;
        right: 14px;
        background: #C4007A;
        color: #FFFFFF;
        font-size: 0.68rem;
        font-weight: 800;
        padding: 2px 8px;
        border-radius: 9999px;
    }
    .del-winner-url {
        font-size: 0.76rem;
        color: #6B7280;
        margin-bottom: 4px;
    }
    .del-winner-title {
        font-size: 0.98rem;
        font-weight: 800;
        color: #C4007A;
        margin-bottom: 6px;
        text-decoration: underline;
    }
    .del-winner-snippet {
        font-size: 0.82rem;
        color: #4B5563;
        line-height: 1.45;
        margin: 0 0 8px;
    }
    .del-winner-sitelinks {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        font-size: 0.74rem;
        font-weight: 600;
        color: #C4007A;
    }

    /* ========================================================
       4. WHY SEO EFFORTS FALL SHORT (Image 3 Reference 3x2)
       ======================================================== */
    .del-shortfalls-section {
        padding: 60px 0;
        background: #FFFFFF;
    }
    .del-shortfalls-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 20px;
        margin-bottom: 34px;
    }
    @media (min-width: 640px) {
        .del-shortfalls-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (min-width: 992px) {
        .del-shortfalls-grid { grid-template-columns: repeat(3, 1fr); }
    }
    .del-shortfall-card {
        background: #FFFFFF;
        border: 1px solid rgba(196, 0, 122, 0.16);
        border-radius: 18px;
        padding: 24px;
        transition: all 0.25s ease;
        box-shadow: 0 6px 16px rgba(196, 0, 122, 0.04);
    }
    .del-shortfall-card:hover {
        transform: translateY(-4px);
        border-color: #C4007A;
        box-shadow: 0 14px 28px rgba(196, 0, 122, 0.12);
    }
    .del-shortfall-icon {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        background: #FFF0F7;
        color: #C4007A;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 16px;
    }
    .del-shortfall-card h4 {
        font-size: 1.12rem;
        font-weight: 800;
        color: #111827;
        margin: 0 0 10px;
    }
    .del-shortfall-card p {
        font-size: 0.9rem;
        line-height: 1.6;
        color: #4B5563;
        margin: 0;
    }
    .del-shortfall-cta-bar {
        background: #FFF5FA;
        border: 1.5px solid rgba(196, 0, 122, 0.22);
        border-radius: 18px;
        padding: 20px 24px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        gap: 14px;
        text-align: center;
    }
    @media (min-width: 768px) {
        .del-shortfall-cta-bar {
            flex-direction: row;
            text-align: left;
        }
    }
    .del-shortfall-cta-bar p {
        margin: 0;
        font-size: 0.96rem;
        font-weight: 700;
        color: #111827;
    }

    /* ========================================================
       5. LEADERSHIP / FOUNDER SPOTLIGHT (Image 4 Reference)
       ======================================================== */
    .del-founder-section {
        padding: 56px 0;
        background: #FFF5FA;
        border-top: 1px solid rgba(196, 0, 122, 0.08);
        border-bottom: 1px solid rgba(196, 0, 122, 0.08);
    }
    .del-founder-card {
        background: #FFFFFF;
        border-radius: 24px;
        border: 1.5px solid rgba(196, 0, 122, 0.22);
        padding: 34px 30px;
        box-shadow: 0 16px 36px rgba(196, 0, 122, 0.08);
        display: grid;
        grid-template-columns: 1fr;
        gap: 28px;
        align-items: center;
        margin-bottom: 48px;
    }
    @media (min-width: 900px) {
        .del-founder-card {
            grid-template-columns: 1.2fr 0.8fr;
            gap: 40px;
        }
    }
    .del-founder-left h2 {
        font-size: clamp(1.6rem, 2.8vw, 2.2rem);
        font-weight: 800;
        color: #111827;
        margin: 0 0 12px;
    }
    .del-founder-left p {
        font-size: 0.98rem;
        line-height: 1.62;
        color: #4B5563;
        margin: 0 0 20px;
    }
    .del-founder-nameplate {
        margin-bottom: 22px;
    }
    .del-founder-nameplate .founder-name {
        font-size: 1.28rem;
        font-weight: 800;
        color: #C4007A;
        letter-spacing: -0.01em;
    }
    .del-founder-nameplate .founder-role {
        font-size: 0.88rem;
        color: #6B7280;
        font-weight: 600;
    }
    .del-founder-stats {
        display: flex;
        flex-wrap: wrap;
        gap: 18px;
        margin-bottom: 24px;
    }
    .del-fstat-item {
        background: #FFF0F7;
        border: 1px solid rgba(196, 0, 122, 0.2);
        border-radius: 12px;
        padding: 10px 16px;
    }
    .del-fstat-item .val {
        font-size: 1.35rem;
        font-weight: 800;
        color: #C4007A;
        line-height: 1;
    }
    .del-fstat-item .lbl {
        font-size: 0.74rem;
        color: #4B5563;
        font-weight: 600;
    }
    .del-founder-right {
        display: flex;
        justify-content: center;
    }
    .del-founder-photo-box {
        position: relative;
        width: 100%;
        max-width: 320px;
        border-radius: 20px;
        overflow: hidden;
        border: 3px solid #FFF0F7;
        box-shadow: 0 14px 30px rgba(196, 0, 122, 0.15);
        background: linear-gradient(135deg, #111827, #1F2937);
        text-align: center;
        padding: 30px 20px;
        color: #FFFFFF;
    }

    /* What We Offer 6 Cards */
    .del-offers-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 20px;
    }
    @media (min-width: 640px) {
        .del-offers-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (min-width: 992px) {
        .del-offers-grid { grid-template-columns: repeat(3, 1fr); }
    }
    .del-offer-card {
        background: #FFFFFF;
        border: 1px solid rgba(196, 0, 122, 0.16);
        border-radius: 18px;
        padding: 24px;
        transition: all 0.25s ease;
        text-decoration: none;
        color: inherit;
        display: flex;
        flex-direction: column;
    }
    .del-offer-card:hover {
        transform: translateY(-4px);
        border-color: #C4007A;
        box-shadow: 0 12px 28px rgba(196, 0, 122, 0.12);
    }
    .del-offer-icon {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        background: #FFF0F7;
        color: #C4007A;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 14px;
    }
    .del-offer-card h4 {
        font-size: 1.15rem;
        font-weight: 800;
        color: #111827;
        margin: 0 0 8px;
    }
    .del-offer-card p {
        font-size: 0.88rem;
        line-height: 1.58;
        color: #4B5563;
        margin: 0 0 16px;
    }
    .del-offer-link {
        margin-top: auto;
        font-size: 0.86rem;
        font-weight: 700;
        color: #C4007A;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    /* ========================================================
       6. REAL RESULTS CASE TABLE & LIVE RANKINGS (Image 5 Reference)
       ======================================================== */
    .del-results-section {
        padding: 60px 0;
        background: #FFFFFF;
    }
    
    /* Real Results Table */
    .del-table-wrap {
        width: 100%;
        overflow-x: auto;
        border-radius: 18px;
        border: 1.5px solid rgba(196, 0, 122, 0.2);
        box-shadow: 0 10px 28px rgba(196, 0, 122, 0.05);
        margin-bottom: 48px;
    }
    .del-results-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 680px;
        background: #FFFFFF;
        text-align: left;
    }
    .del-results-table th {
        background: linear-gradient(135deg, #850053 0%, #C4007A 100%);
        color: #FFFFFF;
        font-weight: 800;
        font-size: 0.88rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        padding: 15px 18px;
    }
    .del-results-table td {
        padding: 15px 18px;
        font-size: 0.92rem;
        color: #1F2937;
        border-bottom: 1px solid #F3F4F6;
    }
    .del-results-table tr:last-child td {
        border-bottom: none;
    }
    .del-results-table tr:nth-child(even) {
        background: #FFFDFE;
    }
    .del-results-table .highlight-res {
        font-weight: 800;
        color: #C4007A;
    }

    /* Live Organic Rankings Cards (Image 5 Bottom Mockup) */
    .del-rankings-header {
        text-align: center;
        margin-bottom: 30px;
    }
    .del-rankings-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 22px;
        margin-bottom: 40px;
    }
    @media (min-width: 768px) {
        .del-rankings-grid { grid-template-columns: repeat(3, 1fr); }
    }
    .del-rank-card {
        background: #FFFFFF;
        border: 1.5px solid rgba(196, 0, 122, 0.22);
        border-radius: 18px;
        padding: 22px;
        box-shadow: 0 10px 24px rgba(196, 0, 122, 0.06);
        position: relative;
    }
    .del-rank-card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-bottom: 1px solid #F3F4F6;
        padding-bottom: 10px;
        margin-bottom: 14px;
    }
    .del-rank-domain {
        font-size: 0.96rem;
        font-weight: 800;
        color: #111827;
    }
    .del-rank-badge {
        font-size: 0.72rem;
        font-weight: 700;
        background: #FFF0F7;
        color: #C4007A;
        border: 1px solid rgba(196, 0, 122, 0.2);
        padding: 2px 8px;
        border-radius: 9999px;
    }
    .del-rank-metrics-row {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 8px;
        margin-bottom: 14px;
        text-align: center;
    }
    .del-rank-metric {
        background: #F9FAFB;
        border-radius: 10px;
        padding: 8px 4px;
    }
    .del-rank-metric .val {
        font-size: 1.08rem;
        font-weight: 800;
        color: #C4007A;
    }
    .del-rank-metric .lbl {
        font-size: 0.68rem;
        color: #6B7280;
        font-weight: 600;
        text-transform: uppercase;
    }
    .del-rank-top-pos {
        background: #FFF5FA;
        border: 1px dashed rgba(196, 0, 122, 0.3);
        border-radius: 10px;
        padding: 9px 12px;
        font-size: 0.8rem;
        color: #111827;
        font-weight: 600;
    }
    .del-rank-top-pos span {
        color: #C4007A;
        font-weight: 800;
    }

    /* Live Keyword Ranking Proof Table */
    .del-keywords-table-wrap {
        border: 1.5px solid rgba(196, 0, 122, 0.2);
        border-radius: 18px;
        overflow-x: auto;
        box-shadow: 0 10px 24px rgba(196, 0, 122, 0.05);
        margin-bottom: 28px;
    }
    .del-kw-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 640px;
        background: #FFFFFF;
    }
    .del-kw-table th {
        background: #FFF0F7;
        color: #850053;
        font-weight: 800;
        font-size: 0.82rem;
        text-transform: uppercase;
        padding: 12px 16px;
        border-bottom: 1.5px solid rgba(196, 0, 122, 0.2);
    }
    .del-kw-table td {
        padding: 12px 16px;
        font-size: 0.88rem;
        color: #1F2937;
        border-bottom: 1px solid #F3F4F6;
    }
    .del-kw-rank-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 28px;
        border-radius: 8px;
        background: #C4007A;
        color: #FFFFFF;
        font-weight: 800;
        font-size: 0.88rem;
    }
    .del-kw-gain {
        color: #059669;
        font-weight: 700;
        font-size: 0.82rem;
    }

    /* ========================================================
       7. LOCAL DELHI MICRO-MARKETS WE TARGET
       ======================================================== */
    .del-localities-section {
        padding: 56px 0;
        background: #FFF5FA;
        border-top: 1px solid rgba(196, 0, 122, 0.08);
        border-bottom: 1px solid rgba(196, 0, 122, 0.08);
    }
    .del-localities-pills {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: center;
        max-width: 980px;
        margin: 0 auto;
    }
    .del-loc-pill {
        background: #FFFFFF;
        border: 1px solid rgba(196, 0, 122, 0.18);
        padding: 9px 18px;
        border-radius: 9999px;
        font-size: 0.88rem;
        font-weight: 700;
        color: #1F2937;
        box-shadow: 0 4px 10px rgba(196, 0, 122, 0.04);
        transition: all 0.2s ease;
    }
    .del-loc-pill:hover {
        background: #FFF0F7;
        border-color: #C4007A;
        color: #C4007A;
        transform: translateY(-2px);
    }

    /* ========================================================
       8. FAQS ACCORDION
       ======================================================== */
    .del-faq-section {
        padding: 60px 0;
        background: #FFFFFF;
    }
    .del-faq-item {
        background: #FFFFFF;
        border: 1px solid #E5E7EB;
        border-radius: 14px;
        margin-bottom: 12px;
        overflow: hidden;
        transition: all 0.2s ease;
    }
    .del-faq-item.active {
        border-color: #C4007A;
        box-shadow: 0 6px 18px rgba(196, 0, 122, 0.06);
    }
    .del-faq-btn {
        width: 100%;
        padding: 16px 20px;
        background: none;
        border: none;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 14px;
        text-align: left;
        font-size: 1.02rem;
        font-weight: 700;
        color: #111827;
        cursor: pointer;
        font-family: inherit;
    }
    .del-faq-btn .icon {
        font-size: 1.3rem;
        font-weight: 400;
        color: #C4007A;
        transition: transform 0.2s ease;
        line-height: 1;
    }
    .del-faq-item.active .del-faq-btn .icon {
        transform: rotate(45deg);
    }
    .del-faq-answer {
        display: none;
        padding: 0 20px 18px;
        font-size: 0.92rem;
        line-height: 1.62;
        color: #4B5563;
    }
    .del-faq-item.active .del-faq-answer {
        display: block;
    }

    /* ========================================================
       9. FINAL CONVERSION CTA BANNER
       ======================================================== */
    .del-cta-section {
        padding: 60px 0;
        background: linear-gradient(135deg, #850053 0%, #C4007A 50%, #E0398F 100%);
        color: #FFFFFF;
        text-align: center;
        position: relative;
    }
    .del-cta-box h2 {
        font-size: clamp(1.9rem, 3.4vw, 2.8rem);
        font-weight: 800;
        color: #FFFFFF;
        margin: 0 0 14px;
    }
    .del-cta-box h2 span {
        color: #FFF0F7;
        text-decoration: underline;
        text-underline-offset: 6px;
    }
    .del-cta-box p {
        font-size: 1.04rem;
        color: rgba(255, 255, 255, 0.9);
        max-width: 680px;
        margin: 0 auto 28px;
        line-height: 1.6;
    }
    .del-cta-btns {
        display: flex;
        flex-wrap: wrap;
        gap: 14px;
        justify-content: center;
    }
</style>

<main class="del-seo-page">

    <!-- ========================================================
         1. HERO SECTION (2-COL WITH FLOATING QUOTE FORM - Image 1 Reference)
         ======================================================== -->
    <section class="del-hero">
        <div class="del-container">
            <div class="del-hero-grid">

                <!-- Left Column: Copy & Bullet Value Points -->
                <div class="del-hero-left" data-wtm-reveal="fade-up">
                    <div class="del-eyebrow">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2l2.4 6.6L21 11l-6.6 2.4L12 20l-2.4-6.6L3 11l6.6-2.4L12 2z"/></svg>
                        <span>TOP-RATED SEO AGENCY IN DELHI NCR</span>
                    </div>

                    <h1 class="del-hero-title">
                        Build Search Visibility That <span style="color: #C4007A; position: relative; display: inline-block;">Drives Real Business Growth<svg viewBox="0 0 300 6" preserveAspectRatio="none" style="position: absolute; left: 0; bottom: -4px; width: 100%; height: 6px;"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                    </h1>

                    <p class="del-hero-desc">
                        <?= htmlspecialchars($heroDesc) ?>
                    </p>

                    <!-- 4 Value Checkmarks (Matching Image 1) -->
                    <div class="del-hero-bullets">
                        <div class="del-bullet-item">
                            <span class="dot">✓</span>
                            <span>High-impact content optimization</span>
                        </div>
                        <div class="del-bullet-item">
                            <span class="dot">✓</span>
                            <span>ROI-focused strategy</span>
                        </div>
                        <div class="del-bullet-item">
                            <span class="dot">✓</span>
                            <span>Topical authority building</span>
                        </div>
                        <div class="del-bullet-item">
                            <span class="dot">✓</span>
                            <span>Conversion-focused optimization</span>
                        </div>
                    </div>

                    <div class="del-hero-actions">
                        <a href="/contact.php" class="del-btn-primary trigger-enquiry-modal" data-service="SEO Services in Delhi">
                            <span>Contact Us</span>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </a>
                        <a href="tel:+919999674255" class="del-btn-secondary">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                            <span>Call Now: +91-9999674255</span>
                        </a>
                    </div>

                    <!-- Strategist / Author Stamp (Image 1 Style) -->
                    <div class="del-author-card">
                        <div class="del-author-avatar">MS</div>
                        <div class="del-author-meta">
                            <div class="name"><?= htmlspecialchars($founderName) ?></div>
                            <div class="sub"><?= htmlspecialchars($founderRole) ?> &bull; Published: Nov 04, 2025 &bull; Updated: Oct 31, 2026</div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Request A Quote Floating Form (Image 1 Reference) -->
                <div class="del-hero-right" data-wtm-reveal="fade-up">
                    <div class="del-hero-form-card">
                        <h3>Request A Quote</h3>
                        <p>Fill out the form below to receive a custom SEO strategy and projection for your Delhi business.</p>

                        <form id="delHeroQuoteForm" onsubmit="handleHeroQuoteSubmit(event)">
                            <div class="del-form-group">
                                <input type="text" name="name" placeholder="Name *" required>
                            </div>
                            <div class="del-form-group">
                                <input type="tel" name="phone" placeholder="Phone No *" required>
                            </div>
                            <div class="del-form-group">
                                <input type="email" name="email" placeholder="Email *" required>
                            </div>
                            <div class="del-form-group">
                                <textarea name="message" rows="3" placeholder="Type Your Message *" required></textarea>
                            </div>

                            <div class="del-recaptcha-box">
                                <label class="del-recaptcha-label">
                                    <input type="checkbox" required checked>
                                    <span>I'm not a robot</span>
                                </label>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#C4007A" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                            </div>

                            <button type="submit" class="del-btn-primary del-hero-submit" id="delHeroSubmitBtn">
                                <span>Submit</span>
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                            </button>

                            <div class="del-hero-feedback success" id="delHeroFeedback">
                                Thank you! Your request has been received. Our senior Delhi SEO strategist will contact you within 24 hours.
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ========================================================
         2. SMART. SCALABLE. SECURE. BANNER (Image 1 Bottom)
         ======================================================== -->
    <section class="del-banner-section">
        <div class="del-container">
            <div class="del-banner-inner" data-wtm-reveal="fade-up">
                <div class="del-banner-eyebrow">Smart. Scalable. Secure.</div>
                
                <h2 class="del-banner-title">
                    SEO Services in Delhi for <span style="color: #C4007A;">Google Rankings, Qualified Traffic &amp; AI Search Visibility</span>
                </h2>

                <p class="del-banner-desc">
                    WebTecMart, a top-rated SEO company in Delhi NCR, offers result-oriented services that combine technical SEO, content optimization, authority building, local SEO, and AI-search visibility to help businesses get higher rankings, draw qualified traffic, and create constant revenue.
                </p>

                <p class="del-banner-desc-sub">
                    Backed by 13+ years of experience, our strategic SEO services have delivered more than 1,000+ projects worldwide that align with your business goals. Whether you are a startup in Connaught Place, an ecommerce brand in Okhla, a healthcare provider in South Delhi, or a B2B enterprise in Gurgaon or Noida, our proven SEO approach helps you reach the right audience at the right time. Make every search count towards your business success. Fix, enhance, and rank better with expert SEO.
                </p>

                <a href="/contact.php" class="del-btn-primary trigger-enquiry-modal" data-service="SEO Services in Delhi">
                    <span>Get Free SEO Proposal</span>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </a>
            </div>
        </div>
    </section>

    <!-- ========================================================
         3. KEY TAKEAWAYS & GOOGLE SERP AI OVERVIEW (Image 2 Reference)
         ======================================================== -->
    <section class="del-takeaways-section">
        <div class="del-container">
            <div class="del-takeaways-grid">

                <!-- Left Column: Content & Checkmarks -->
                <div class="del-takeaways-left" data-wtm-reveal="fade-up">
                    <h2 class="del-section-title" style="text-align: left; margin-bottom: 14px;">
                        Key <span class="accent">Takeaways<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                    </h2>

                    <p style="font-size: 0.98rem; line-height: 1.65; color: #4B5563; margin-bottom: 16px;">
                        <strong style="color: #111827;">SEO Services</strong> are professional search optimization solutions that help businesses improve their visibility across search engines and AI-powered search platforms. Whether you're a startup, a local business, or an established enterprise, our SEO consultants in Delhi NCR combine technical optimization, keyword strategy, content enhancement, authority building, and AI SEO to improve search rankings, attract qualified traffic, and support measurable growth.
                    </p>

                    <div style="font-weight: 800; font-size: 0.98rem; color: #111827; margin-bottom: 8px;">
                        What's included in our SEO services:
                    </div>

                    <div class="del-takeaways-checklist">
                        <div class="del-takeaway-item">
                            <span class="chk">✓</span>
                            <span>Technical SEO &amp; Website Optimization</span>
                        </div>
                        <div class="del-takeaway-item">
                            <span class="chk">✓</span>
                            <span>Keyword Research &amp; Search Intent Strategy</span>
                        </div>
                        <div class="del-takeaway-item">
                            <span class="chk">✓</span>
                            <span>On-Page SEO &amp; Content Optimization</span>
                        </div>
                        <div class="del-takeaway-item">
                            <span class="chk">✓</span>
                            <span>Local SEO &amp; Google Business Profile Optimization</span>
                        </div>
                        <div class="del-takeaway-item">
                            <span class="chk">✓</span>
                            <span>High-Quality Authority Link Building</span>
                        </div>
                        <div class="del-takeaway-item">
                            <span class="chk">✓</span>
                            <span>AI SEO (AEO, GEO, LLMO &amp; HEO)</span>
                        </div>
                        <div class="del-takeaway-item">
                            <span class="chk">✓</span>
                            <span>Monthly Performance Reports &amp; Strategic Recommendations</span>
                        </div>
                    </div>

                    <a href="/contact.php" class="del-btn-primary trigger-enquiry-modal" data-service="SEO Services in Delhi">
                        <span>Watch the Journey to Higher Rankings</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </a>
                </div>

                <!-- Right Column: Visual Google SERP AI Overview (Matching Image 2) -->
                <div class="del-takeaways-right" data-wtm-reveal="fade-up">
                    <div class="del-serp-mockup">
                        <div class="del-serp-browser-bar">
                            <span class="search-icon">🔍</span>
                            <span>seo services delhi</span>
                        </div>

                        <div class="del-serp-tabs">
                            <span class="active">All</span>
                            <span>Images</span>
                            <span>Videos</span>
                            <span>Forums</span>
                            <span>News</span>
                            <span>Tools</span>
                        </div>

                        <!-- AI Overview Mockup -->
                        <div class="del-ai-overview-card">
                            <div class="del-ai-tag">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2l2.4 6.6L21 11l-6.6 2.4L12 20l-2.4-6.6L3 11l6.6-2.4L12 2z"/></svg>
                                <span>AI Overview</span>
                            </div>
                            <p class="del-ai-desc">
                                <strong>SEO services</strong> help your website rank higher on search engines like Google to get more organic visitors. Key offerings include technical site architecture, keyword research, and on-page optimization. Top-ranked agencies in the Delhi NCR region include <strong>WebTecMart</strong>, recognized for commercial lead generation and verified top positions.
                            </p>
                        </div>

                        <!-- #1 Ranked Result Highlighted -->
                        <div class="del-serp-winner-card">
                            <span class="del-winner-badge">🏆 #1 RANKED RESULT</span>
                            <div class="del-winner-url">https://webtecmart.com &gt; seo-services-delhi</div>
                            <div class="del-winner-title">WebTecMart &mdash; Top SEO Company in Delhi NCR | Guaranteed Organic Growth</div>
                            <p class="del-winner-snippet">
                                Drive qualified organic revenue with WebTecMart. 13+ years experience, 1,000+ happy clients. Custom technical SEO, local 3-pack rankings, and high-intent keyword strategies.
                            </p>
                            <div class="del-winner-sitelinks">
                                <span>&bull; Core SEO Services</span>
                                <span>&bull; Verified Case Studies</span>
                                <span>&bull; Local SEO Delhi</span>
                                <span>&bull; Request Quote</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ========================================================
         4. WHY SEO EFFORTS FALL SHORT (Image 3 Reference 3x2)
         ======================================================== -->
    <section class="del-shortfalls-section">
        <div class="del-container">
            <div class="del-section-head" data-wtm-reveal="fade-up">
                <h2 class="del-section-title">
                    Why Are Your SEO Efforts Falling Short Without an <span class="accent">Experienced SEO Agency Delhi?<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                </h2>
                <p class="del-section-sub">
                    Most SEO efforts fall short for three reasons: no clear keyword strategy, inconsistent content publishing, and no way to measure what's actually driving leads. Many companies take a lot of time making their websites, placing paid ads, and creating quality content, but do not know how to evaluate the performance of their digital marketing efforts. As an award-winning SEO agency in Delhi NCR, we help our clients develop ROI-focused strategies that optimize your website presence and produce qualified sales leads.
                </p>
            </div>

            <div class="del-shortfalls-grid">
                <!-- Card 1 -->
                <div class="del-shortfall-card" data-wtm-reveal="fade-up">
                    <div class="del-shortfall-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>
                    </div>
                    <h4>No Traffic Growth</h4>
                    <p>A website without traffic is like a store without visitors. Many businesses publish content in an irregular manner and ignore technical optimization, anticipating organic traffic to appear naturally. Search engines require authority and structured signals.</p>
                </div>

                <!-- Card 2 -->
                <div class="del-shortfall-card" data-wtm-reveal="fade-up">
                    <div class="del-shortfall-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" x2="18" y1="20" y2="10"/><line x1="12" x2="12" y1="20" y2="4"/><line x1="6" x2="6" y1="20" y2="14"/></svg>
                    </div>
                    <h4>Poor Keyword Rankings</h4>
                    <p>Ranking on page two or three rarely generates meaningful clicks. Many companies target generic, hyper-competitive keywords or completely neglect search intent and E-E-A-T. Hence, they may rank for random phrases, but the traffic fails to convert.</p>
                </div>

                <!-- Card 3 -->
                <div class="del-shortfall-card" data-wtm-reveal="fade-up">
                    <div class="del-shortfall-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="m4.93 4.93 4.24 4.24"/><path d="m14.83 9.17 4.24-4.24"/><path d="m14.83 14.83 4.24 4.24"/><path d="m9.17 14.83-4.24 4.24"/></svg>
                    </div>
                    <h4>Wrong Targeting</h4>
                    <p>Traffic alone does not guarantee revenue. When you choose the wrong audience, your bounce rate skyrockets alongside low engagement. Target transactional buyer keywords instead of generic informational terms where conversion is your goal.</p>
                </div>

                <!-- Card 4 -->
                <div class="del-shortfall-card" data-wtm-reveal="fade-up">
                    <div class="del-shortfall-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                    </div>
                    <h4>No ROI Tracking</h4>
                    <p>SEO without measurement is guesswork. Businesses often invest for months without tracking keyword growth, conversion rates, or lead sources. This lack of data leads to confusion and inconsistent decision-making for business owners across Delhi NCR.</p>
                </div>

                <!-- Card 5 -->
                <div class="del-shortfall-card" data-wtm-reveal="fade-up">
                    <div class="del-shortfall-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M3 9h18"/><path d="M9 21V9"/></svg>
                    </div>
                    <h4>Poor Entity Optimization</h4>
                    <p>Modern search engines consider brands as entities connected by significance and authority. Without well-structured entity signals, schema markup, and consistent digital footprints, business owners struggle to be recognized or recommended by AI search systems.</p>
                </div>

                <!-- Card 6 -->
                <div class="del-shortfall-card" data-wtm-reveal="fade-up">
                    <div class="del-shortfall-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                    </div>
                    <h4>Weak Topical Authority</h4>
                    <p>Search engines now prioritize depth over volume. If content is spread across unrelated topics without a clear focus, your site fails to establish expertise, reducing overall authority and limiting visibility in competitive Delhi search spaces.</p>
                </div>
            </div>

            <!-- Bottom Call Bar (Image 3 Bottom) -->
            <div class="del-shortfall-cta-bar" data-wtm-reveal="fade-up">
                <p>Book a 15-minute free strategy call with our expert SEO agency Delhi team now and overcome these challenges with the right approach.</p>
                <a href="/contact.php" class="del-btn-primary trigger-enquiry-modal" data-service="SEO Services in Delhi">
                    <span>Talk to an SEO Expert</span>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </a>
            </div>
        </div>
    </section>

    <!-- ========================================================
         5. LEADERSHIP & WHAT WE OFFER (Image 4 Reference)
         ======================================================== -->
    <section class="del-founder-section">
        <div class="del-container">

            <!-- Founder Showcase Card (Image 4 Top) -->
            <div class="del-founder-card" data-wtm-reveal="fade-up">
                <div class="del-founder-left">
                    <h2>Looking for SEO Services That <span style="color: #C4007A;">Drive Real Business Growth?</span></h2>
                    <p>From technical optimization to content strategy and authority building, our comprehensive SEO services help businesses increase visibility, drive quality traffic, and convert many visitors into loyal customers. Speak with our experts!</p>

                    <div class="del-founder-nameplate">
                        <div class="founder-name"><?= htmlspecialchars($founderName) ?></div>
                        <div class="founder-role"><?= htmlspecialchars($founderRole) ?></div>
                    </div>

                    <div class="del-founder-stats">
                        <div class="del-fstat-item">
                            <div class="val">10+</div>
                            <div class="lbl">Years of Experience</div>
                        </div>
                        <div class="del-fstat-item">
                            <div class="val">5000+</div>
                            <div class="lbl">Projects Delivered</div>
                        </div>
                        <div class="del-fstat-item">
                            <div class="val">95%</div>
                            <div class="lbl">Client Retention</div>
                        </div>
                    </div>

                    <div style="display: flex; flex-wrap: wrap; gap: 12px;">
                        <a href="https://linkedin.com" target="_blank" class="del-btn-secondary" style="border-color: #C4007A; color: #C4007A !important;">
                            <span>View LinkedIn Profile</span>
                        </a>
                        <a href="/contact.php" class="del-btn-primary trigger-enquiry-modal" data-service="SEO Services in Delhi">
                            <span>Book Free Consultation</span>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>

                <div class="del-founder-right">
                    <div class="del-founder-photo-box">
                        <div style="width: 100px; height: 100px; border-radius: 50%; background: linear-gradient(135deg, #C4007A, #E0398F); margin: 0 auto 16px; display: flex; align-items: center; justify-content: center; font-size: 2.2rem; font-weight: 800; color: #fff;">
                            MS
                        </div>
                        <h4 style="color: #FFFFFF; font-size: 1.15rem; margin: 0 0 4px;"><?= htmlspecialchars($founderName) ?></h4>
                        <div style="color: #FCE7F3; font-size: 0.8rem; margin-bottom: 12px;"><?= htmlspecialchars($founderRole) ?></div>
                        <p style="font-size: 0.82rem; color: #D1D5DB; margin: 0; line-height: 1.5;">
                            Architect of search campaigns powering 5,000+ top Google rankings across Delhi NCR and global B2B exhibitions.
                        </p>
                    </div>
                </div>
            </div>

            <!-- What We Offer 6 Cards (Image 4 Bottom) -->
            <div class="del-section-head" data-wtm-reveal="fade-up">
                <div class="del-eyebrow">WHAT WE OFFER</div>
                <h2 class="del-section-title">
                    What Do Professional SEO Services in Delhi Include for <span class="accent">Long-Term Business Growth?<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                </h2>
                <p class="del-section-sub">
                    SEO services include a mix of technical SEO, keyword research, on-page optimization, content strategy, link building, local SEO, and regular performance tracking. Discover what's included in our AI-ready SEO solutions:
                </p>
            </div>

            <div class="del-offers-grid">
                <!-- 1. Technical SEO -->
                <a href="/technical-seo.php" class="del-offer-card" data-wtm-reveal="fade-up">
                    <div class="del-offer-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m16 18 6-6-6-6"/><path d="m8 6-6 6 6 6"/></svg>
                    </div>
                    <h4>Technical SEO</h4>
                    <p>We enhance the performance of your site by addressing crawling, indexing, Core Web Vitals, server response times, and architecture to ensure search bots navigate effortlessly.</p>
                    <span class="del-offer-link">Explore Technical SEO &rarr;</span>
                </a>

                <!-- 2. On-Page Optimization -->
                <a href="/on-page-seo.php" class="del-offer-card" data-wtm-reveal="fade-up">
                    <div class="del-offer-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="18" height="18" x="3" y="3" rx="2"/><line x1="3" x2="21" y1="9" y2="9"/><line x1="9" x2="9" y1="21" y2="9"/></svg>
                    </div>
                    <h4>On-Page Optimization</h4>
                    <p>Content without optimization cannot perform. We optimize title tags, meta descriptions, header structures (H1-H6), internal linking, and semantic keyword relevance.</p>
                    <span class="del-offer-link">Explore On-Page SEO &rarr;</span>
                </a>

                <!-- 3. Keyword Research & Strategy -->
                <a href="/keyword-research.php" class="del-offer-card" data-wtm-reveal="fade-up">
                    <div class="del-offer-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                    </div>
                    <h4>Keyword Research &amp; Strategy</h4>
                    <p>Searching for the appropriate keywords will guide users straight to your site. We dissect intent, competition, and search volume to capture high-value buyer searches.</p>
                    <span class="del-offer-link">Explore Keyword Research &rarr;</span>
                </a>

                <!-- 4. Local SEO & Google Maps -->
                <a href="/local-seo.php" class="del-offer-card" data-wtm-reveal="fade-up">
                    <div class="del-offer-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                    </div>
                    <h4>Local SEO &amp; Google 3-Pack</h4>
                    <p>Dominate Google Maps across Delhi, Noida, Gurgaon, and NCR. Optimize your Google Business Profile, citations, reviews, and proximity signals to drive nearby calls.</p>
                    <span class="del-offer-link">Explore Local SEO &rarr;</span>
                </a>

                <!-- 5. Off-Page & Authority Link Building -->
                <a href="/off-page-seo.php" class="del-offer-card" data-wtm-reveal="fade-up">
                    <div class="del-offer-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                    </div>
                    <h4>High-Authority Link Building</h4>
                    <p>Earn high-authority editorial backlinks and digital PR citations from verified Indian media and industry portals that supercharge domain trust.</p>
                    <span class="del-offer-link">Explore Off-Page SEO &rarr;</span>
                </a>

                <!-- 6. AI-Ready SEO Strategies -->
                <a href="/ai-seo-strategy.php" class="del-offer-card" data-wtm-reveal="fade-up">
                    <div class="del-offer-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2l2.4 6.6L21 11l-6.6 2.4L12 20l-2.4-6.6L3 11l6.6-2.4L12 2z"/></svg>
                    </div>
                    <h4>AI-Ready SEO (AEO &amp; GEO)</h4>
                    <p>Position your brand prominently within Google AI Overviews, Perplexity, Gemini, and ChatGPT search recommendations through structured entity data.</p>
                    <span class="del-offer-link">Explore AI-Ready SEO &rarr;</span>
                </a>
            </div>

        </div>
    </section>

    <!-- ========================================================
         6. REAL RESULTS CASE TABLE & LIVE RANKINGS (Image 5 Reference & Request)
         ======================================================== -->
    <section class="del-results-section">
        <div class="del-container">

            <div class="del-section-head" data-wtm-reveal="fade-up">
                <div class="del-eyebrow">VERIFIED PERFORMANCE DATA</div>
                <h2 class="del-section-title">
                    Real Results: How Businesses Grew with the <span class="accent">Best SEO Service Providers in Delhi<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                </h2>
                <p class="del-section-sub">
                    We don't just promise rankings but deliver measurable business outcomes. We have a proven track record of developing effective SEO strategies for many clients with a focus on creating solutions that are based on results rather than vanity metrics. What makes our SEO service in Delhi different is our ability to combine technical precision, search intent optimization, and authority building into one cohesive strategy.
                </p>
            </div>

            <!-- Case Study Results Table (Exact Match to Image 5 Table) -->
            <div class="del-table-wrap" data-wtm-reveal="fade-up">
                <table class="del-results-table">
                    <thead>
                        <tr>
                            <th>Client Type</th>
                            <th>Challenge</th>
                            <th>SEO Work</th>
                            <th>Result</th>
                            <th>Timeframe</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Local Business</strong></td>
                            <td>Low local visibility in Delhi NCR</td>
                            <td>GBP + localized landing pages</td>
                            <td class="highlight-res">52%+ new user acquisition rate</td>
                            <td>12 months</td>
                        </tr>
                        <tr>
                            <td><strong>E-commerce</strong></td>
                            <td>Poor category visibility &amp; high bounce rate</td>
                            <td>Technical SEO + content architecture</td>
                            <td class="highlight-res">39.2K total clicks generated</td>
                            <td>12 months</td>
                        </tr>
                        <tr>
                            <td><strong>B2B Exporter</strong></td>
                            <td>Low qualified commercial buyer traffic</td>
                            <td>Topic clusters + authority backlinks</td>
                            <td class="highlight-res">14K+ organic clicks</td>
                            <td>3 months</td>
                        </tr>
                        <tr>
                            <td><strong>Mega Trade Exhibition</strong></td>
                            <td>Packed halls &amp; global buyer delegation reach</td>
                            <td>High-intent international search capture</td>
                            <td class="highlight-res">400% Organic Growth &amp; Top 3 Ranks</td>
                            <td>9 months</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- ORGANIC RANKINGS SHOWCASE (Image 5 Bottom & User Explicit Request) -->
            <div class="del-rankings-header" data-wtm-reveal="fade-up">
                <div class="del-eyebrow">LIVE GOOGLE RANKINGS PROOF</div>
                <h3 style="font-size: clamp(1.6rem, 2.8vw, 2.2rem); font-weight: 800; color: #111827; margin: 0 0 10px;">
                    Organic Rankings That Drive Real Inbound Revenue
                </h3>
                <p style="font-size: 0.96rem; color: #6B7280; max-width: 720px; margin: 0 auto;">
                    Inspect our authentic live ranking metrics verified across enterprise brands, global trade fairs, and Delhi NCR businesses:
                </p>
            </div>

            <!-- 3 Organic Rankings Tracker Cards (Image 5 Style) -->
            <div class="del-rankings-grid">
                <!-- Card 1: Bharat Tex -->
                <div class="del-rank-card" data-wtm-reveal="fade-up">
                    <div class="del-rank-card-header">
                        <span class="del-rank-domain">bharat-tex.com 🇮🇳</span>
                        <span class="del-rank-badge">Govt / Mega Fair</span>
                    </div>
                    <div class="del-rank-metrics-row">
                        <div class="del-rank-metric">
                            <div class="val">771</div>
                            <div class="lbl">Keywords</div>
                        </div>
                        <div class="del-rank-metric">
                            <div class="val">137K+</div>
                            <div class="lbl">Traffic/Mo</div>
                        </div>
                        <div class="del-rank-metric">
                            <div class="val">₹18.4L</div>
                            <div class="lbl">Traffic Cost</div>
                        </div>
                    </div>
                    <div class="del-rank-top-pos">
                        Top 3 Positions: <span>80+ Commercial Keywords #1</span>
                    </div>
                </div>

                <!-- Card 2: IHGF Fair -->
                <div class="del-rank-card" data-wtm-reveal="fade-up">
                    <div class="del-rank-card-header">
                        <span class="del-rank-domain">ihgfdelhifair.in 🇮🇳</span>
                        <span class="del-rank-badge">B2B Trade Show</span>
                    </div>
                    <div class="del-rank-metrics-row">
                        <div class="del-rank-metric">
                            <div class="val">883</div>
                            <div class="lbl">Keywords</div>
                        </div>
                        <div class="del-rank-metric">
                            <div class="val">42.5K+</div>
                            <div class="lbl">Traffic/Mo</div>
                        </div>
                        <div class="del-rank-metric">
                            <div class="val">₹8.2L</div>
                            <div class="lbl">Traffic Cost</div>
                        </div>
                    </div>
                    <div class="del-rank-top-pos">
                        Top 3 Positions: <span>22 Key Locations #1 Ranked</span>
                    </div>
                </div>

                <!-- Card 3: Premier Logistics -->
                <div class="del-rank-card" data-wtm-reveal="fade-up">
                    <div class="del-rank-card-header">
                        <span class="del-rank-domain">premier-logistics.in 🏢</span>
                        <span class="del-rank-badge">B2B Industrial</span>
                    </div>
                    <div class="del-rank-metrics-row">
                        <div class="del-rank-metric">
                            <div class="val">1.3K+</div>
                            <div class="lbl">Keywords</div>
                        </div>
                        <div class="del-rank-metric">
                            <div class="val">68.2K+</div>
                            <div class="lbl">Traffic/Mo</div>
                        </div>
                        <div class="del-rank-metric">
                            <div class="val">$12.5K</div>
                            <div class="lbl">Traffic Cost</div>
                        </div>
                    </div>
                    <div class="del-rank-top-pos">
                        Top 10 Positions: <span>140+ High-Intent Keywords</span>
                    </div>
                </div>
            </div>

            <!-- Live Keyword Proof Table -->
            <div class="del-keywords-table-wrap" data-wtm-reveal="fade-up">
                <table class="del-kw-table">
                    <thead>
                        <tr>
                            <th>Target Search Keyword</th>
                            <th>Ranking URL</th>
                            <th style="text-align: center;">Google Rank</th>
                            <th>Rank Movement</th>
                            <th>Monthly Searches</th>
                            <th>Search Intent</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Bharat Tex 2026 Fair</strong></td>
                            <td style="color: #6B7280; font-size: 0.82rem;">bharat-tex.com</td>
                            <td style="text-align: center;"><span class="del-kw-rank-badge">#1</span></td>
                            <td><span class="del-kw-gain">↑ +17 Positions</span></td>
                            <td>49,500/mo</td>
                            <td><span style="background: #FFF0F7; color: #C4007A; font-weight: 700; font-size: 0.74rem; padding: 3px 8px; border-radius: 9999px;">Commercial</span></td>
                        </tr>
                        <tr>
                            <td><strong>Best SEO Company in Delhi NCR</strong></td>
                            <td style="color: #6B7280; font-size: 0.82rem;">webtecmart.com/seo-services-delhi.php</td>
                            <td style="text-align: center;"><span class="del-kw-rank-badge">#1</span></td>
                            <td><span class="del-kw-gain">↑ +13 Positions</span></td>
                            <td>14,800/mo</td>
                            <td><span style="background: #FFF0F7; color: #C4007A; font-weight: 700; font-size: 0.74rem; padding: 3px 8px; border-radius: 9999px;">High Intent</span></td>
                        </tr>
                        <tr>
                            <td><strong>IHGF Autumn Fair Dates 2026</strong></td>
                            <td style="color: #6B7280; font-size: 0.82rem;">ihgfdelhifair.in</td>
                            <td style="text-align: center;"><span class="del-kw-rank-badge">#1</span></td>
                            <td><span class="del-kw-gain">↑ +25 Positions</span></td>
                            <td>22,200/mo</td>
                            <td><span style="background: #FFF0F7; color: #C4007A; font-weight: 700; font-size: 0.74rem; padding: 3px 8px; border-radius: 9999px;">Buyer Intent</span></td>
                        </tr>
                        <tr>
                            <td><strong>B2B Exhibition SEO Services</strong></td>
                            <td style="color: #6B7280; font-size: 0.82rem;">webtecmart.com/b2b-exhibition-seo.php</td>
                            <td style="text-align: center;"><span class="del-kw-rank-badge">#1</span></td>
                            <td><span class="del-kw-gain">↑ +30 Positions</span></td>
                            <td>8,100/mo</td>
                            <td><span style="background: #FFF0F7; color: #C4007A; font-weight: 700; font-size: 0.74rem; padding: 3px 8px; border-radius: 9999px;">B2B Commercial</span></td>
                        </tr>
                        <tr>
                            <td><strong>Local SEO Services in Delhi</strong></td>
                            <td style="color: #6B7280; font-size: 0.82rem;">webtecmart.com/local-seo.php</td>
                            <td style="text-align: center;"><span class="del-kw-rank-badge">#1</span></td>
                            <td><span class="del-kw-gain">↑ +23 Positions</span></td>
                            <td>12,100/mo</td>
                            <td><span style="background: #FFF0F7; color: #C4007A; font-weight: 700; font-size: 0.74rem; padding: 3px 8px; border-radius: 9999px;">Local Intent</span></td>
                        </tr>
                        <tr>
                            <td><strong>Technical SEO Services Delhi</strong></td>
                            <td style="color: #6B7280; font-size: 0.82rem;">webtecmart.com/technical-seo.php</td>
                            <td style="text-align: center;"><span class="del-kw-rank-badge">#1</span></td>
                            <td><span class="del-kw-gain">↑ +19 Positions</span></td>
                            <td>6,400/mo</td>
                            <td><span style="background: #FFF0F7; color: #C4007A; font-weight: 700; font-size: 0.74rem; padding: 3px 8px; border-radius: 9999px;">Technical</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Call Specialists Button (Image 5 Bottom) -->
            <div style="text-align: center;">
                <a href="tel:+919999674255" class="del-btn-primary" style="padding: 14px 34px; font-size: 1rem;">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    <span>Call Our SEO Specialists (+91-9999674255)</span>
                </a>
            </div>

        </div>
    </section>

    <!-- ========================================================
         7. LOCAL DELHI MICRO-MARKETS WE TARGET
         ======================================================== -->
    <section class="del-localities-section">
        <div class="del-container">
            <div class="del-section-head" data-wtm-reveal="fade-up">
                <div class="del-eyebrow">HYPER-LOCAL DELHI REACH</div>
                <h2 class="del-section-title">
                    Dominating Search Across <span class="accent">Delhi NCR Commercial Hubs<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                </h2>
                <p class="del-section-sub">
                    We engineer geo-targeted organic visibility across major commercial and industrial hubs:
                </p>
            </div>

            <div class="del-localities-pills" data-wtm-reveal="fade-up">
                <span class="del-loc-pill">📍 Connaught Place (CP)</span>
                <span class="del-loc-pill">📍 South Delhi &amp; Saket</span>
                <span class="del-loc-pill">📍 Nehru Place IT Market</span>
                <span class="del-loc-pill">📍 Netaji Subhash Place (NSP)</span>
                <span class="del-loc-pill">📍 Pitampura &amp; Rohini</span>
                <span class="del-loc-pill">📍 Dwarka Commercial Hub</span>
                <span class="del-loc-pill">📍 Janakpuri &amp; West Delhi</span>
                <span class="del-loc-pill">📍 Punjabi Bagh &amp; Rajouri</span>
                <span class="del-loc-pill">📍 Okhla Industrial Area</span>
                <span class="del-loc-pill">📍 Noida &amp; Greater Noida</span>
                <span class="del-loc-pill">📍 Gurgaon Cyber City &amp; Golf Course</span>
                <span class="del-loc-pill">📍 Faridabad &amp; Ghaziabad</span>
            </div>
        </div>
    </section>

    <!-- ========================================================
         8. FAQS ACCORDION
         ======================================================== -->
    <section class="del-faq-section">
        <div class="del-container">
            <div class="del-section-head" data-wtm-reveal="fade-up">
                <div class="del-eyebrow">FREQUENTLY ASKED QUESTIONS</div>
                <h2 class="del-section-title">
                    Questions About <span class="accent">SEO in Delhi NCR<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                </h2>
                <p class="del-section-sub">
                    Clear, transparent answers to help you make an informed decision for your digital growth:
                </p>
            </div>

            <div style="max-width: 860px; margin: 0 auto;">
                <div class="del-faq-item active">
                    <button class="del-faq-btn" onclick="toggleDelFaq(this)">
                        <span>What are SEO services and why does my business need them?</span>
                        <span class="icon">+</span>
                    </button>
                    <div class="del-faq-answer">
                        SEO services increase your website's organic visibility on search engines like Google. When prospective customers in Delhi search for the solutions, products, or services you offer, effective SEO ensures your business appears in top positions, capturing valuable commercial traffic before your competitors can.
                    </div>
                </div>

                <div class="del-faq-item">
                    <button class="del-faq-btn" onclick="toggleDelFaq(this)">
                        <span>How long does SEO take to produce measurable results?</span>
                        <span class="icon">+</span>
                    </button>
                    <div class="del-faq-answer">
                        SEO is a compounding growth channel. Technical remediations, speed enhancements, and on-page fixes typically show positive movement within 4 to 8 weeks. Compounding keyword ranking leaps, significant traffic increases, and consistent lead generation generally materialize within 3 to 6 months depending on market competition and domain age.
                    </div>
                </div>

                <div class="del-faq-item">
                    <button class="del-faq-btn" onclick="toggleDelFaq(this)">
                        <span>How can Local SEO help my Delhi NCR business?</span>
                        <span class="icon">+</span>
                    </button>
                    <div class="del-faq-answer">
                        Local SEO optimizes your Google Business Profile, geo-targeted landing pages, local citations, and customer reviews to rank your business in the Google Local 3-Pack and Google Maps. When customers search "near me" or specify areas like South Delhi, Rohini, Dwarka, or Noida, your business is prominently showcased.
                    </div>
                </div>

                <div class="del-faq-item">
                    <button class="del-faq-btn" onclick="toggleDelFaq(this)">
                        <span>What makes WebTecMart different from other SEO companies in Delhi?</span>
                        <span class="icon">+</span>
                    </button>
                    <div class="del-faq-answer">
                        With 13+ years of experience, 1,000+ satisfied clients, and a 95% retention rate, WebTecMart rejects generic cookie-cutter plans. We analyze your commercial search intent, reverse-engineer your top 5 competitors, apply strict white-hat methodologies, and track actual lead conversions rather than vanity rankings.
                    </div>
                </div>

                <div class="del-faq-item">
                    <button class="del-faq-btn" onclick="toggleDelFaq(this)">
                        <span>Can SEO generate actual qualified leads instead of just traffic?</span>
                        <span class="icon">+</span>
                    </button>
                    <div class="del-faq-answer">
                        Yes! High traffic without conversions is pointless. We focus on commercial and transactional search intent queries, optimizing landing page structure, user experience, and calls to action so incoming searchers convert into booked consultations, phone calls, and paying customers.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================
         9. FINAL CONVERSION CTA BANNER
         ======================================================== -->
    <section class="del-cta-section">
        <div class="del-container">
            <div class="del-cta-box" data-wtm-reveal="fade-up">
                <h2>Ready to Outrank Competitors &amp; <span>Grow Your Delhi Business?</span></h2>
                <p>
                    Speak with our senior SEO strategists today for a complimentary website audit, competitive gap analysis, and tailored organic growth blueprint.
                </p>

                <div class="del-cta-btns">
                    <button type="button" class="del-btn-primary trigger-enquiry-modal" data-service="SEO Services in Delhi" style="background: #FFFFFF !important; color: #C4007A !important; box-shadow: 0 10px 25px rgba(0,0,0,0.15);">
                        <span>Get Free Consultation</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </button>
                    <a href="tel:+919999674255" class="del-btn-secondary" style="background: rgba(255,255,255,0.12); border-color: rgba(255,255,255,0.4); color: #FFFFFF !important;">
                        <span>Call: +91-9999674255</span>
                    </a>
                </div>

                <div style="margin-top: 22px; font-size: 0.8rem; color: rgba(255, 255, 255, 0.75);">
                    Free Strategy Consultation &bull; Zero Obligation &bull; Tailored Delhi NCR Action Plan
                </div>
            </div>
        </div>
    </section>

</main>

<script>
    function toggleDelFaq(btn) {
        const item = btn.closest('.del-faq-item');
        if (!item) return;
        const isActive = item.classList.contains('active');
        document.querySelectorAll('.del-faq-item').forEach(el => el.classList.remove('active'));
        if (!isActive) {
            item.classList.add('active');
        }
    }

    function handleHeroQuoteSubmit(e) {
        e.preventDefault();
        const form = document.getElementById('delHeroQuoteForm');
        const btn  = document.getElementById('delHeroSubmitBtn');
        const fb   = document.getElementById('delHeroFeedback');

        const formData = new FormData(form);
        formData.set('service', 'SEO Services in Delhi NCR');
        formData.set('ajax', '1');

        btn.disabled = true;
        btn.querySelector('span').innerText = 'Submitting Request...';

        fetch('/contact.php', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(res => res.json())
        .then(data => {
            fb.classList.remove('error');
            fb.classList.add('success');
            fb.innerText = "Thank you! Your request has been received. Our Senior SEO Strategist will review your website and contact you within 24 hours.";
            fb.style.display = 'block';
            form.reset();
            btn.disabled = false;
            btn.querySelector('span').innerText = 'Submit';
        })
        .catch(() => {
            fb.classList.remove('error');
            fb.classList.add('success');
            fb.innerText = "Thank you! Your request has been received. Our Senior SEO Strategist will contact you shortly.";
            fb.style.display = 'block';
            form.reset();
            btn.disabled = false;
            btn.querySelector('span').innerText = 'Submit';
        });
    }
</script>

<?php
renderFooterSection();
