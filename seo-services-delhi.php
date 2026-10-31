<?php
$pageMeta = [
    'title' => 'SEO Services in Delhi – Result-Driven SEO to Grow Your Business | WebTecMart',
    'description' => 'Get found when your customers are searching. WebTecMart offers strategic, result-driven SEO services in Delhi NCR to boost Google rankings, qualified organic traffic, and lead generation.',
];
require_once __DIR__ . '/app/templates/header.php';
require_once __DIR__ . '/app/components/sections/FooterSection.php';
require_once __DIR__ . '/functions.php';

// Pull dynamic overrides from DB if updated via Admin Panel
$dbService = getServiceBySlug('seo-services-delhi');
?>

<!-- Schema.org JSON-LD Structured Data for Local SEO & FAQPage -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "LocalBusiness",
      "@id": "https://webtecmart.com/#organization",
      "name": "WebTecMart Digital - SEO Company in Delhi",
      "url": "https://webtecmart.com/seo-services-delhi.php",
      "logo": "https://webtecmart.com/assets/images/webtecmart-logo.png",
      "description": "Leading SEO company in Delhi NCR providing top-ranked search engine optimization, technical SEO, and digital marketing services.",
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
          "name": "What are SEO services and why does my Delhi business need them?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "SEO services optimize your website's technical health, content, and search authority so it ranks higher on Google when local and national customers search for your products or services. In competitive markets like Delhi NCR, SEO is essential to capture ready-to-buy customers before they choose your competitors."
          }
        },
        {
          "@type": "Question",
          "name": "How long does it take to see measurable SEO results in Delhi?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "While technical fixes and on-page optimization reflect in Google rankings within 4 to 8 weeks, significant organic traffic jumps and consistent lead flow typically take 3 to 6 months depending on your industry competition and current domain authority."
          }
        },
        {
          "@type": "Question",
          "name": "Can SEO generate actual qualified leads instead of just vanity traffic?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes. At WebTecMart, we map commercial and transactional search intent to attract visitors who have active purchasing intent, optimizing page speed and conversion paths to turn search visits into verified phone calls, inquiries, and sales."
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
       ============================================================ */
    .del-seo-page {
        width: 100%;
        background: #FBF8F1;
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

    /* Common Eyebrow Pill */
    .del-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        background: rgba(196, 0, 122, 0.08);
        border: 1px solid rgba(196, 0, 122, 0.2);
        color: #C4007A;
        font-size: 0.74rem;
        font-weight: 800;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        padding: 6px 14px;
        border-radius: 9999px;
        margin-bottom: 14px;
    }
    .del-eyebrow svg {
        width: 13px;
        height: 13px;
        color: #C4007A;
    }

    /* Common Section Headings with Signature SVG Underline */
    .del-section-head {
        text-align: center;
        max-width: 820px;
        margin: 0 auto 36px;
    }
    .del-section-title {
        font-size: clamp(1.85rem, 3.4vw, 2.6rem);
        font-weight: 800;
        line-height: 1.25;
        letter-spacing: -0.025em;
        color: #111827;
        margin: 0 0 12px;
    }
    .del-section-title .accent {
        color: #C4007A;
        position: relative;
        display: inline-block;
    }
    .del-section-title .accent svg {
        position: absolute;
        left: 0;
        bottom: -5px;
        width: 100%;
        height: 6px;
    }
    .del-section-sub {
        font-size: 0.98rem;
        color: #4B5563;
        line-height: 1.65;
        margin: 0;
    }

    /* Buttons */
    .del-btn-primary {
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        gap: 8px !important;
        background: linear-gradient(135deg, #C4007A 0%, #E0398F 100%);
        color: #FFFFFF !important;
        font-weight: 700;
        font-size: 0.95rem;
        line-height: 1;
        padding: 13px 28px;
        border-radius: 9999px;
        text-decoration: none;
        white-space: nowrap !important;
        box-shadow: 0 10px 24px rgba(196, 0, 122, 0.32);
        transition: all 0.25s ease;
        border: none;
        cursor: pointer;
    }
    .del-btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 14px 30px rgba(196, 0, 122, 0.45);
        color: #FFFFFF;
    }
    .del-btn-primary svg {
        width: 16px !important;
        height: 16px !important;
        flex-shrink: 0;
        transition: transform 0.2s ease;
    }
    .del-btn-primary:hover svg {
        transform: translateX(3px);
    }
    .del-btn-secondary {
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        gap: 8px !important;
        background: #FFFFFF;
        border: 1.5px solid rgba(196, 0, 122, 0.25);
        color: #C4007A !important;
        font-weight: 700;
        font-size: 0.95rem;
        line-height: 1;
        padding: 13px 24px;
        border-radius: 9999px;
        text-decoration: none;
        white-space: nowrap !important;
        transition: all 0.25s ease;
    }
    .del-btn-secondary:hover {
        background: rgba(196, 0, 122, 0.06);
        border-color: #C4007A;
        transform: translateY(-2px);
    }

    /* ============================================================
       1. HERO SECTION (2-COL WITH HERO FORM - Image 1 Reference)
       ============================================================ */
    .del-hero {
        padding: 48px 0 36px;
        position: relative;
        background: radial-gradient(circle at 80% 20%, rgba(196, 0, 122, 0.05) 0%, transparent 60%);
    }
    .del-hero-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 36px;
        align-items: center;
    }
    @media (min-width: 992px) {
        .del-hero-grid {
            grid-template-columns: 1.15fr 0.85fr;
            gap: 48px;
        }
    }

    .del-hero-title {
        font-size: clamp(2.2rem, 4.2vw, 3.3rem);
        font-weight: 800;
        line-height: 1.15;
        letter-spacing: -0.025em;
        color: #111827;
        margin: 0 0 14px;
    }
    .del-hero-title .accent {
        color: #C4007A;
        position: relative;
        display: inline-block;
    }
    .del-hero-title .accent svg {
        position: absolute;
        left: 0;
        bottom: -6px;
        width: 100%;
        height: 7px;
    }
    .del-hero-desc {
        font-size: 0.98rem;
        line-height: 1.68;
        color: #4B5563;
        margin: 0 0 20px;
        max-width: 640px;
    }

    /* 4 Hero Checkmarks */
    .del-hero-bullets {
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin-bottom: 24px;
    }
    .del-bullet-item {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 0.92rem;
        font-weight: 700;
        color: #1F2937;
    }
    .del-bullet-item .dot {
        width: 18px;
        height: 18px;
        border-radius: 50%;
        background: rgba(196, 0, 122, 0.12);
        color: #C4007A;
        display: grid;
        place-items: center;
        font-size: 0.72rem;
        flex-shrink: 0;
    }

    .del-hero-actions {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 14px;
        margin-bottom: 26px;
    }

    /* Hero Strategist Trust Card */
    .del-author-card {
        display: flex;
        align-items: center;
        gap: 14px;
        background: #FFFFFF;
        border: 1px solid rgba(196, 0, 122, 0.16);
        border-radius: 16px;
        padding: 10px 18px;
        width: fit-content;
        box-shadow: 0 4px 16px rgba(196, 0, 122, 0.05);
    }
    .del-author-avatar {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        background: linear-gradient(135deg, #C4007A, #E0398F);
        color: #FFFFFF;
        display: grid;
        place-items: center;
        font-weight: 800;
        font-size: 1.1rem;
        flex-shrink: 0;
    }
    .del-author-meta .name {
        font-size: 0.88rem;
        font-weight: 800;
        color: #111827;
        line-height: 1.2;
    }
    .del-author-meta .sub {
        font-size: 0.74rem;
        color: #6B7280;
        margin-top: 2px;
    }

    /* Right Column: Hero Request Form Card (Image 1 Style) */
    .del-hero-form-card {
        background: #FFFFFF;
        border: 1.5px solid rgba(196, 0, 122, 0.18);
        border-radius: 24px;
        padding: 32px 26px;
        box-shadow: 0 16px 40px rgba(196, 0, 122, 0.08);
        position: relative;
    }
    .del-hero-form-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 4px;
        background: linear-gradient(90deg, #C4007A, #E0398F);
        border-radius: 24px 24px 0 0;
    }
    .del-hero-form-card h3 {
        font-size: 1.35rem;
        font-weight: 800;
        color: #111827;
        margin: 0 0 6px;
    }
    .del-hero-form-card p {
        font-size: 0.84rem;
        color: #6B7280;
        margin: 0 0 18px;
    }
    .del-form-group {
        margin-bottom: 12px;
    }
    .del-form-group input,
    .del-form-group textarea,
    .del-form-group select {
        width: 100%;
        padding: 10px 14px;
        border-radius: 10px;
        border: 1.5px solid #E2E8F0;
        font-family: inherit;
        font-size: 0.88rem;
        color: #111827;
        background: #F8FAFC;
        transition: all 0.2s ease;
        box-sizing: border-box;
    }
    .del-form-group input:focus,
    .del-form-group textarea:focus,
    .del-form-group select:focus {
        border-color: #C4007A;
        background: #FFFFFF;
        outline: none;
        box-shadow: 0 0 0 3px rgba(196, 0, 122, 0.1);
    }
    .del-hero-submit {
        width: 100%;
        margin-top: 6px;
    }
    .del-hero-feedback {
        margin-top: 12px;
        padding: 10px;
        border-radius: 8px;
        font-size: 0.84rem;
        font-weight: 600;
        text-align: center;
        display: none;
    }
    .del-hero-feedback.success {
        display: block;
        background: #ECFDF5;
        color: #065F46;
        border: 1px solid #A7F3D0;
    }

    /* ============================================================
       2. STATS & BENEFITS STRIP
       ============================================================ */
    .del-stats-section {
        padding: 36px 0;
        background: #FFFFFF;
        border-top: 1px solid rgba(196, 0, 122, 0.08);
        border-bottom: 1px solid rgba(196, 0, 122, 0.08);
    }
    .del-stats-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 16px;
    }
    @media (min-width: 768px) {
        .del-stats-grid {
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }
    }
    .del-stat-box {
        background: #FFF9FB;
        border: 1.5px solid rgba(196, 0, 122, 0.12);
        border-radius: 16px;
        padding: 20px 16px;
        text-align: center;
        transition: transform 0.2s ease;
    }
    .del-stat-box:hover {
        transform: translateY(-3px);
        border-color: #C4007A;
    }
    .del-stat-box .val {
        font-size: clamp(1.8rem, 3vw, 2.4rem);
        font-weight: 800;
        color: #C4007A;
        line-height: 1;
        margin-bottom: 6px;
    }
    .del-stat-box .lbl {
        font-size: 0.8rem;
        font-weight: 700;
        color: #4B5563;
        line-height: 1.3;
    }

    /* ============================================================
       3. INTRO & AI VISIBILITY SECTION (Image 2 Reference)
       ============================================================ */
    .del-intro-section {
        padding: 44px 0 36px;
        background: #FBF8F1;
        text-align: center;
    }
    .del-intro-box {
        max-width: 860px;
        margin: 0 auto;
    }
    .del-intro-box p {
        font-size: 0.98rem;
        line-height: 1.7;
        color: #4B5563;
        margin-bottom: 16px;
    }

    /* ============================================================
       4. SEO CHALLENGES GRID (Image 3 Reference 3x2)
       ============================================================ */
    .del-challenges-section {
        padding: 44px 0 36px;
        background: #FFFFFF;
        border-top: 1px solid rgba(196, 0, 122, 0.08);
        border-bottom: 1px solid rgba(196, 0, 122, 0.08);
    }
    .del-challenges-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 20px;
    }
    @media (min-width: 640px) {
        .del-challenges-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (min-width: 992px) {
        .del-challenges-grid { grid-template-columns: repeat(3, 1fr); }
    }
    .del-challenge-card {
        background: #FFF9FB;
        border: 1.5px solid rgba(196, 0, 122, 0.12);
        border-radius: 18px;
        padding: 24px;
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
    }
    .del-challenge-card:hover {
        transform: translateY(-4px);
        border-color: #C4007A;
        box-shadow: 0 12px 28px rgba(196, 0, 122, 0.08);
        background: #FFFFFF;
    }
    .del-challenge-icon {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        background: #FFFFFF;
        border: 1px solid rgba(196, 0, 122, 0.2);
        display: grid;
        place-items: center;
        color: #C4007A;
        margin-bottom: 14px;
    }
    .del-challenge-icon svg {
        width: 22px;
        height: 22px;
    }
    .del-challenge-card h4 {
        font-size: 1.12rem;
        font-weight: 800;
        color: #111827;
        margin: 0 0 10px;
        line-height: 1.3;
    }
    .del-challenge-card p {
        font-size: 0.88rem;
        color: #4B5563;
        line-height: 1.6;
        margin: 0;
        flex-grow: 1;
    }

    /* ============================================================
       5. SEO SERVICES DIRECTORY & PILLARS
       ============================================================ */
    .del-services-section {
        padding: 44px 0 36px;
        background: #FBF8F1;
    }
    .del-services-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 20px;
    }
    @media (min-width: 640px) {
        .del-services-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (min-width: 992px) {
        .del-services-grid { grid-template-columns: repeat(4, 1fr); }
    }
    .del-service-card {
        background: #FFFFFF;
        border: 1.5px solid rgba(196, 0, 122, 0.12);
        border-radius: 18px;
        padding: 24px;
        transition: all 0.3s ease;
        text-decoration: none;
        color: inherit;
        display: flex;
        flex-direction: column;
    }
    .del-service-card:hover {
        transform: translateY(-4px);
        border-color: #C4007A;
        box-shadow: 0 14px 32px rgba(196, 0, 122, 0.1);
    }
    .del-service-icon {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        background: #FFF0F7;
        color: #C4007A;
        display: grid;
        place-items: center;
        margin-bottom: 14px;
    }
    .del-service-icon svg {
        width: 22px;
        height: 22px;
    }
    .del-service-card h4 {
        font-size: 1.08rem;
        font-weight: 800;
        color: #111827;
        margin: 0 0 8px;
    }
    .del-service-card p {
        font-size: 0.86rem;
        color: #6B7280;
        line-height: 1.55;
        margin: 0 0 16px;
        flex-grow: 1;
    }
    .del-service-link {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 0.82rem;
        font-weight: 700;
        color: #C4007A;
    }
    .del-service-link svg {
        width: 14px;
        height: 14px;
        transition: transform 0.2s ease;
    }
    .del-service-card:hover .del-service-link svg {
        transform: translateX(4px);
    }

    /* ============================================================
       6. 6-STEP SEO PROCESS TIMELINE
       ============================================================ */
    .del-process-section {
        padding: 44px 0 36px;
        background: #FFFFFF;
        border-top: 1px solid rgba(196, 0, 122, 0.08);
        border-bottom: 1px solid rgba(196, 0, 122, 0.08);
    }
    .del-process-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 20px;
    }
    @media (min-width: 640px) {
        .del-process-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (min-width: 992px) {
        .del-process-grid { grid-template-columns: repeat(3, 1fr); }
    }
    .del-process-card {
        background: #FFF9FB;
        border: 1.5px solid rgba(196, 0, 122, 0.12);
        border-radius: 18px;
        padding: 24px;
        position: relative;
    }
    .del-process-step {
        font-size: 0.82rem;
        font-weight: 800;
        color: #C4007A;
        background: rgba(196, 0, 122, 0.1);
        padding: 4px 10px;
        border-radius: 6px;
        display: inline-block;
        margin-bottom: 12px;
    }
    .del-process-card h4 {
        font-size: 1.15rem;
        font-weight: 800;
        color: #111827;
        margin: 0 0 10px;
    }
    .del-process-card p {
        font-size: 0.88rem;
        color: #4B5563;
        line-height: 1.6;
        margin: 0;
    }

    /* ============================================================
       7. INDUSTRIES WE SERVE
       ============================================================ */
    .del-industries-section {
        padding: 44px 0 36px;
        background: #FBF8F1;
    }
    .del-industries-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 16px;
    }
    @media (min-width: 768px) {
        .del-industries-grid { grid-template-columns: repeat(4, 1fr); }
    }
    .del-industry-card {
        background: #FFFFFF;
        border: 1px solid rgba(196, 0, 122, 0.14);
        border-radius: 14px;
        padding: 18px;
        text-align: center;
        transition: transform 0.2s ease, border-color 0.2s ease;
    }
    .del-industry-card:hover {
        transform: translateY(-3px);
        border-color: #C4007A;
        box-shadow: 0 8px 20px rgba(196, 0, 122, 0.06);
    }
    .del-industry-card .ind-icon {
        font-size: 1.6rem;
        margin-bottom: 8px;
        display: inline-block;
    }
    .del-industry-card h5 {
        font-size: 0.95rem;
        font-weight: 800;
        color: #111827;
        margin: 0 0 4px;
    }
    .del-industry-card p {
        font-size: 0.78rem;
        color: #6B7280;
        margin: 0;
        line-height: 1.4;
    }

    /* ============================================================
       8. LOCAL DELHI MICRO-MARKETS
       ============================================================ */
    .del-localities-section {
        padding: 44px 0 36px;
        background: #FFFFFF;
        border-top: 1px solid rgba(196, 0, 122, 0.08);
        border-bottom: 1px solid rgba(196, 0, 122, 0.08);
    }
    .del-localities-pills {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 10px;
        max-width: 900px;
        margin: 0 auto;
    }
    .del-loc-pill {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #FFF9FB;
        border: 1px solid rgba(196, 0, 122, 0.18);
        color: #C4007A;
        font-size: 0.82rem;
        font-weight: 700;
        padding: 7px 16px;
        border-radius: 9999px;
        transition: all 0.2s ease;
    }
    .del-loc-pill:hover {
        background: #C4007A;
        color: #FFFFFF;
        transform: translateY(-2px);
    }

    /* ============================================================
       9. FAQS ACCORDION
       ============================================================ */
    .del-faq-section {
        padding: 44px 0 36px;
        background: #FBF8F1;
    }
    .del-faq-item {
        background: #FFFFFF;
        border: 1.5px solid rgba(196, 0, 122, 0.12);
        border-radius: 14px;
        margin-bottom: 12px;
        overflow: hidden;
    }
    .del-faq-btn {
        width: 100%;
        padding: 16px 20px;
        background: transparent;
        border: none;
        text-align: left;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-weight: 700;
        font-size: 0.98rem;
        color: #111827;
        cursor: pointer;
    }
    .del-faq-btn span.icon {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background: #FFF0F7;
        color: #C4007A;
        display: grid;
        place-items: center;
        font-size: 1.1rem;
        line-height: 1;
        transition: transform 0.2s ease;
    }
    .del-faq-answer {
        padding: 0 20px 16px;
        font-size: 0.92rem;
        color: #4B5563;
        line-height: 1.65;
        display: none;
    }
    .del-faq-item.active .del-faq-answer {
        display: block;
    }
    .del-faq-item.active .del-faq-btn span.icon {
        transform: rotate(45deg);
        background: #C4007A;
        color: #FFFFFF;
    }

    /* ============================================================
       10. BOTTOM CONVERSION CTA BANNER
       ============================================================ */
    .del-cta-section {
        padding: 36px 0 48px;
        background: #FBF8F1;
    }
    .del-cta-box {
        background: linear-gradient(135deg, #850053 0%, #C4007A 50%, #E0398F 100%);
        border-radius: 26px;
        padding: 44px 32px;
        text-align: center;
        color: #FFFFFF;
        position: relative;
        overflow: hidden;
        box-shadow: 0 20px 48px rgba(196, 0, 122, 0.25);
    }
    .del-cta-box h2 {
        font-size: clamp(1.8rem, 3.4vw, 2.6rem);
        font-weight: 800;
        margin: 0 0 12px;
        color: #FFFFFF;
    }
    .del-cta-box h2 span {
        color: #F4C4DE;
    }
    .del-cta-box p {
        font-size: 0.98rem;
        color: rgba(255, 255, 255, 0.85);
        max-width: 660px;
        margin: 0 auto 26px;
        line-height: 1.6;
    }
    .del-cta-btns {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        gap: 16px;
    }
</style>

<main class="del-seo-page">

    <!-- ========================================================
         1. HERO SECTION (2-COL WITH HERO FORM - Image 1 Reference)
    ======================================================== -->
    <section class="del-hero">
        <div class="del-container">
            <div class="del-hero-grid">

                <!-- Left Column: Copy & Strategist Badge -->
                <div class="del-hero-left" data-wtm-reveal="fade-up">
                    <div class="del-eyebrow">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2l2.4 6.6L21 11l-6.6 2.4L12 20l-2.4-6.6L3 11l6.6-2.4L12 2z"/></svg>
                        <span>TOP-RATED SEO COMPANY IN DELHI NCR</span>
                    </div>

                    <h1 class="del-hero-title">
                        SEO Services in Delhi &ndash; <span class="accent">Result-Driven SEO to Grow Your Business<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                    </h1>

                    <p class="del-hero-desc">
                        Get found when your prospective customers are actively searching. WebTecMart delivers strategic, data-backed SEO solutions across Delhi NCR to boost Google rankings, drive qualified organic buyers, and turn search visibility into measurable revenue.
                    </p>

                    <!-- 4 Value Checkmarks -->
                    <div class="del-hero-bullets">
                        <div class="del-bullet-item">
                            <span class="dot">✓</span>
                            <span>Enhance Google Rankings for relevant, high-commercial intent keywords</span>
                        </div>
                        <div class="del-bullet-item">
                            <span class="dot">✓</span>
                            <span>Attract Targeted Organic Traffic ready to enquire and purchase</span>
                        </div>
                        <div class="del-bullet-item">
                            <span class="dot">✓</span>
                            <span>Topical Authority &amp; White-Hat Technical foundations</span>
                        </div>
                        <div class="del-bullet-item">
                            <span class="dot">✓</span>
                            <span>Build Sustainable Long-Term Visibility that outranks competitors</span>
                        </div>
                    </div>

                    <div class="del-hero-actions">
                        <button type="button" class="del-btn-primary trigger-enquiry-modal" data-service="SEO Services in Delhi">
                            <span>Schedule Free Consultation</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </button>
                        <a href="tel:+919999674255" class="del-btn-secondary">
                            <span>Call: +91-9999674255</span>
                        </a>
                    </div>

                    <!-- Strategist Trust Card (Image 1 Style) -->
                    <div class="del-author-card">
                        <div class="del-author-avatar">W</div>
                        <div class="del-author-meta">
                            <div class="name">WebTecMart Senior Strategy Team</div>
                            <div class="sub">13+ Years Experience &bull; 1,000+ Projects &bull; Verified Google Ranks</div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Hero Quote / Audit Form Card (Image 1 Style) -->
                <div class="del-hero-right" data-wtm-reveal="fade-up">
                    <div class="del-hero-form-card">
                        <h3>Request A Free SEO Audit</h3>
                        <p>Discover hidden ranking opportunities and get a custom Delhi growth blueprint.</p>

                        <form id="delHeroAuditForm" onsubmit="handleHeroFormSubmit(event)">
                            <div class="del-form-group">
                                <input type="text" name="name" placeholder="Full Name *" required>
                            </div>
                            <div class="del-form-group">
                                <input type="tel" name="phone" placeholder="Phone Number *" required>
                            </div>
                            <div class="del-form-group">
                                <input type="email" name="email" placeholder="Official Email *" required>
                            </div>
                            <div class="del-form-group">
                                <input type="text" name="website" placeholder="Website URL (e.g. yoursite.com)" required>
                            </div>
                            <div class="del-form-group">
                                <textarea name="message" rows="2" placeholder="Tell us about your target keywords or goals..."></textarea>
                            </div>

                            <button type="submit" class="del-btn-primary del-hero-submit" id="delHeroSubmitBtn">
                                <span>Get My Complimentary Audit</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                            </button>

                            <div class="del-hero-feedback success" id="delHeroFeedback">
                                Thank you! Your request has been received. Our Senior SEO Strategist will audit your website and contact you within 24 hours.
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ========================================================
         2. STATS & BENEFITS STRIP
    ======================================================== -->
    <section class="del-stats-section">
        <div class="del-container">
            <div class="del-stats-grid">
                <div class="del-stat-box" data-wtm-reveal="fade-up">
                    <div class="val">13+</div>
                    <div class="lbl">Years Digital Experience</div>
                </div>
                <div class="del-stat-box" data-wtm-reveal="fade-up">
                    <div class="val">1,000+</div>
                    <div class="lbl">Businesses &amp; Projects Served</div>
                </div>
                <div class="del-stat-box" data-wtm-reveal="fade-up">
                    <div class="val">95%</div>
                    <div class="lbl">Client Retention Rate</div>
                </div>
                <div class="del-stat-box" data-wtm-reveal="fade-up">
                    <div class="val">10k+</div>
                    <div class="lbl">Keywords Ranked Page 1</div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================
         3. INTRO & AI VISIBILITY SECTION (Image 2 Reference)
       ======================================================== -->
    <section class="del-intro-section">
        <div class="del-container">
            <div class="del-intro-box" data-wtm-reveal="fade-up">
                <div class="del-eyebrow">SMART &bull; SCALABLE &bull; SECURE</div>
                
                <h2 class="del-section-title">
                    SEO Services in Delhi for <span class="accent">Google Rankings, Qualified Traffic &amp; AI Visibility<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                </h2>

                <p>
                    WebTecMart, a premier SEO company in Delhi, offers result-oriented services that combine technical SEO, content optimization, authority building, local SEO, and AI-ready search visibility to help businesses secure #1 rankings, capture qualified buyers, and scale predictable revenue.
                </p>

                <p>
                    Backed by 13+ years of experience, our strategic SEO campaigns have delivered over 1,000+ successful projects. Whether you are an industrial manufacturer in Okhla, a healthcare provider in South Delhi, a real estate firm in Gurgaon, or an ecommerce brand expanding across India, our proven SEO framework helps you reach the right audience at the right moment.
                </p>

                <button type="button" class="del-btn-primary trigger-enquiry-modal" data-service="SEO Services in Delhi" style="margin-top: 12px;">
                    <span>Claim Your Free SEO Audit</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </button>
            </div>
        </div>
    </section>

    <!-- ========================================================
         4. COMMON SEO CHALLENGES (Image 3 Reference 3x2)
       ======================================================== -->
    <section class="del-challenges-section">
        <div class="del-container">
            <div class="del-section-head" data-wtm-reveal="fade-up">
                <div class="del-eyebrow">DIAGNOSE &amp; OVERCOME</div>
                <h2 class="del-section-title">
                    What is Holding Your Site Back in <span class="accent">Google Search?<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                </h2>
                <p class="del-section-sub">
                    Delhi is one of the most competitive business hubs in India. If your website is struggling to rank, one of these 6 common challenges is likely the cause:
                </p>
            </div>

            <div class="del-challenges-grid">
                <div class="del-challenge-card" data-wtm-reveal="fade-up">
                    <div class="del-challenge-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>
                    </div>
                    <h4>Low Search Rankings</h4>
                    <p>Your website may be visually appealing, but without correct keyword architecture and indexation signals, your pages remain invisible to buyers actively searching for your services.</p>
                </div>

                <div class="del-challenge-card" data-wtm-reveal="fade-up">
                    <div class="del-challenge-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" x2="18" y1="20" y2="10"/><line x1="12" x2="12" y1="20" y2="4"/><line x1="6" x2="6" y1="20" y2="14"/></svg>
                    </div>
                    <h4>Organic Traffic Drop</h4>
                    <p>Sudden declines in search visibility often stem from Google algorithm updates, crawl blockages, broken redirects, or legacy backlink penalties. We rapidly diagnose and restore search equity.</p>
                </div>

                <div class="del-challenge-card" data-wtm-reveal="fade-up">
                    <div class="del-challenge-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="2" x2="22" y1="12" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                    </div>
                    <h4>Technical SEO Roadblocks</h4>
                    <p>Slow page load speeds, poor mobile responsiveness, broken internal linking, duplicate content, and faulty schema prevent search engine bots from correctly indexing your pages.</p>
                </div>

                <div class="del-challenge-card" data-wtm-reveal="fade-up">
                    <div class="del-challenge-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                    </div>
                    <h4>Weak On-Page &amp; Intent Alignment</h4>
                    <p>Publishing content without commercial search intent mapping leads to wasted traffic. We optimize headings, metadata, content depth, and conversion funnels to capture decision makers.</p>
                </div>

                <div class="del-challenge-card" data-wtm-reveal="fade-up">
                    <div class="del-challenge-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
                    </div>
                    <h4>Low Conversion Rate</h4>
                    <p>Attracting clicks is only half the battle. If visitors bounce without calling or submitting an inquiry, we restructure your landing page layout, CTAs, and trust proof to boost lead conversion.</p>
                </div>

                <div class="del-challenge-card" data-wtm-reveal="fade-up">
                    <div class="del-challenge-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                    </div>
                    <h4>Overdependence on Paid Ads</h4>
                    <p>Relying exclusively on paid ads creates an expensive treadmill where leads stop the moment your ad spend pauses. SEO builds a permanent, compounding organic asset that drives leads 24/7.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================
         5. SEO SERVICES DIRECTORY & PILLARS
       ======================================================== -->
    <section class="del-services-section">
        <div class="del-container">
            <div class="del-section-head" data-wtm-reveal="fade-up">
                <div class="del-eyebrow">OUR SPECIALIZED SERVICES</div>
                <h2 class="del-section-title">
                    Comprehensive Search Optimization <span class="accent">Under One Roof<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                </h2>
                <p class="del-section-sub">
                    Explore our specialized SEO service verticals engineered to solve specific growth bottlenecks:
                </p>
            </div>

            <div class="del-services-grid">
                <a href="/technical-seo.php" class="del-service-card" data-wtm-reveal="fade-up">
                    <div class="del-service-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m16 18 6-6-6-6"/><path d="m8 6-6 6 6 6"/></svg>
                    </div>
                    <h4>Technical SEO Services</h4>
                    <p>Core Web Vitals, crawl architecture, indexing health, and XML sitemaps to ensure search engines crawl your site with zero friction.</p>
                    <span class="del-service-link">Explore Technical SEO <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></span>
                </a>

                <a href="/on-page-seo.php" class="del-service-card" data-wtm-reveal="fade-up">
                    <div class="del-service-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="18" height="18" x="3" y="3" rx="2"/><line x1="3" x2="21" y1="9" y2="9"/><line x1="9" x2="9" y1="21" y2="9"/></svg>
                    </div>
                    <h4>On-Page SEO Services</h4>
                    <p>Precise search intent mapping, semantic heading hierarchies, metadata crafting, and content optimization that Google rewards.</p>
                    <span class="del-service-link">Explore On-Page SEO <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></span>
                </a>

                <a href="/off-page-seo.php" class="del-service-card" data-wtm-reveal="fade-up">
                    <div class="del-service-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                    </div>
                    <h4>Off-Page &amp; Authority</h4>
                    <p>Build unshakeable domain authority with editorial backlinks, digital PR outreach, and high-trust Indian media citations.</p>
                    <span class="del-service-link">Explore Off-Page SEO <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></span>
                </a>

                <a href="/local-seo.php" class="del-service-card" data-wtm-reveal="fade-up">
                    <div class="del-service-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                    </div>
                    <h4>Local SEO &amp; Google Maps</h4>
                    <p>Dominate the Delhi NCR 3-Pack. Optimize Google Business Profile, local citations, reviews, and proximity queries to drive nearby calls.</p>
                    <span class="del-service-link">Explore Local SEO <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></span>
                </a>

                <a href="/ecommerce-seo.php" class="del-service-card" data-wtm-reveal="fade-up">
                    <div class="del-service-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg>
                    </div>
                    <h4>Ecommerce SEO Services</h4>
                    <p>Rank high-volume product categories, brand searches, and transactional queries across Shopify, WooCommerce, and custom stores.</p>
                    <span class="del-service-link">Explore Ecommerce SEO <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></span>
                </a>

                <a href="/keyword-research.php" class="del-service-card" data-wtm-reveal="fade-up">
                    <div class="del-service-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                    </div>
                    <h4>Keyword Research &amp; Intent</h4>
                    <p>Uncover untapped commercial opportunities, low-competition buyer queries, and long-tail phrases that bring qualified customers.</p>
                    <span class="del-service-link">Explore Keyword Research <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></span>
                </a>

                <a href="/seo-audit.php" class="del-service-card" data-wtm-reveal="fade-up">
                    <div class="del-service-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    </div>
                    <h4>Comprehensive SEO Audit</h4>
                    <p>An exhaustive 100+ checkpoint audit covering indexation health, speed bottlenecks, content gaps, competitor footprints, and link profiles.</p>
                    <span class="del-service-link">Explore SEO Audit <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></span>
                </a>

                <a href="/b2b-exhibition-seo.php" class="del-service-card" data-wtm-reveal="fade-up">
                    <div class="del-service-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/></svg>
                    </div>
                    <h4>B2B &amp; Exhibition SEO</h4>
                    <p>Specialized flagship strategy to pack trade fairs, attract international buyer delegations, and pre-sell exhibitor booths.</p>
                    <span class="del-service-link">Explore Exhibition SEO <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></span>
                </a>
            </div>
        </div>
    </section>

    <!-- ========================================================
         6. 6-STEP SEO PROCESS
       ======================================================== -->
    <section class="del-process-section">
        <div class="del-container">
            <div class="del-section-head" data-wtm-reveal="fade-up">
                <div class="del-eyebrow">OUR PROVEN METHODOLOGY</div>
                <h2 class="del-section-title">
                    How We Turn SEO Strategy Into <span class="accent">Measurable Revenue<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                </h2>
                <p class="del-section-sub">
                    No cookie-cutter shortcuts. A disciplined 6-stage blueprint adapted to your specific market:
                </p>
            </div>

            <div class="del-process-grid">
                <div class="del-process-card" data-wtm-reveal="fade-up">
                    <span class="del-process-step">STEP 01</span>
                    <h4>Research &amp; Discovery</h4>
                    <p>We analyze your target audience, commercial offerings, competitive search landscape, and local Delhi market demand to establish baseline opportunities.</p>
                </div>
                <div class="del-process-card" data-wtm-reveal="fade-up">
                    <span class="del-process-step">STEP 02</span>
                    <h4>Deep SEO Audit &amp; Analysis</h4>
                    <p>We uncover technical crawl bottlenecks, indexation blocks, content gaps, site architecture flaws, and historical penalty risks holding you back.</p>
                </div>
                <div class="del-process-card" data-wtm-reveal="fade-up">
                    <span class="del-process-step">STEP 03</span>
                    <h4>Strategy &amp; Growth Roadmap</h4>
                    <p>We build a prioritized 6-month roadmap covering technical remediation, high-intent keyword clustering, content expansion, and local authority goals.</p>
                </div>
                <div class="del-process-card" data-wtm-reveal="fade-up">
                    <span class="del-process-step">STEP 04</span>
                    <h4>Flawless Implementation</h4>
                    <p>Our in-house engineers and SEO strategists implement speed improvements, schema markup, metadata fixes, and internal link hierarchies.</p>
                </div>
                <div class="del-process-card" data-wtm-reveal="fade-up">
                    <span class="del-process-step">STEP 05</span>
                    <h4>Content &amp; Authority Building</h4>
                    <p>We craft high-converting pillar content and earn authoritative backlinks from verified Indian industry portals, business directories, and digital PR.</p>
                </div>
                <div class="del-process-card" data-wtm-reveal="fade-up">
                    <span class="del-process-step">STEP 06</span>
                    <h4>Measure, Refine &amp; Scale</h4>
                    <p>We track keyword rankings, organic traffic, and lead conversions weekly via GSC and GA4, continually fine-tuning strategies for compounding ROI.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================
         7. INDUSTRIES WE SERVE
       ======================================================== -->
    <section class="del-industries-section">
        <div class="del-container">
            <div class="del-section-head" data-wtm-reveal="fade-up">
                <div class="del-eyebrow">SECTOR EXPERTISE</div>
                <h2 class="del-section-title">
                    Tailored Search Strategies for <span class="accent">Every Industry<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                </h2>
                <p class="del-section-sub">
                    Every industry has unique customer search behaviors. We adapt our campaigns to your sector:
                </p>
            </div>

            <div class="del-industries-grid">
                <div class="del-industry-card" data-wtm-reveal="fade-up">
                    <span class="ind-icon">🛍️</span>
                    <h5>E-Commerce &amp; Retail</h5>
                    <p>Capture ready-to-buy shoppers actively searching for products online.</p>
                </div>
                <div class="del-industry-card" data-wtm-reveal="fade-up">
                    <span class="ind-icon">🏢</span>
                    <h5>Real Estate &amp; Builders</h5>
                    <p>Connect with property buyers, commercial investors, and tenants.</p>
                </div>
                <div class="del-industry-card" data-wtm-reveal="fade-up">
                    <span class="ind-icon">🏥</span>
                    <h5>Healthcare &amp; Clinics</h5>
                    <p>Establish high medical credibility and rank for patient treatment queries.</p>
                </div>
                <div class="del-industry-card" data-wtm-reveal="fade-up">
                    <span class="ind-icon">⚖️</span>
                    <h5>Legal &amp; Law Firms</h5>
                    <p>Reach corporate clients and individuals seeking specialized legal counsel.</p>
                </div>
                <div class="del-industry-card" data-wtm-reveal="fade-up">
                    <span class="ind-icon">🏭</span>
                    <h5>Manufacturing &amp; B2B</h5>
                    <p>Capture bulk buyer inquiries, wholesale dealers, and trade inquiries.</p>
                </div>
                <div class="del-industry-card" data-wtm-reveal="fade-up">
                    <span class="ind-icon">🎓</span>
                    <h5>Education &amp; EdTech</h5>
                    <p>Engage students, parents, and professionals looking for courses and institutes.</p>
                </div>
                <div class="del-industry-card" data-wtm-reveal="fade-up">
                    <span class="ind-icon">✈️</span>
                    <h5>Travel &amp; Hospitality</h5>
                    <p>Drive bookings for destinations, bespoke tours, resorts, and travel packages.</p>
                </div>
                <div class="del-industry-card" data-wtm-reveal="fade-up">
                    <span class="ind-icon">💼</span>
                    <h5>Finance &amp; FinTech</h5>
                    <p>Rank for high-trust financial advisory, insurance, and lending searches.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================
         8. LOCAL DELHI MICRO-MARKETS WE TARGET
       ======================================================== -->
    <section class="del-localities-section">
        <div class="del-container">
            <div class="del-section-head" data-wtm-reveal="fade-up">
                <div class="del-eyebrow">HYPER-LOCAL DELHI REACH</div>
                <h2 class="del-section-title">
                    Dominating Search Across <span class="accent">Delhi NCR Hubs<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                </h2>
                <p class="del-section-sub">
                    We engineer geo-targeted organic visibility across major commercial and residential hubs:
                </p>
            </div>

            <div class="del-localities-pills" data-wtm-reveal="fade-up">
                <span class="del-loc-pill">📍 Connaught Place (CP)</span>
                <span class="del-loc-pill">📍 South Delhi</span>
                <span class="del-loc-pill">📍 Nehru Place</span>
                <span class="del-loc-pill">📍 Netaji Subhash Place (NSP)</span>
                <span class="del-loc-pill">📍 Pitampura</span>
                <span class="del-loc-pill">📍 Rohini</span>
                <span class="del-loc-pill">📍 Dwarka</span>
                <span class="del-loc-pill">📍 Janakpuri</span>
                <span class="del-loc-pill">📍 Saket</span>
                <span class="del-loc-pill">📍 Punjabi Bagh</span>
                <span class="del-loc-pill">📍 Lajpat Nagar</span>
                <span class="del-loc-pill">📍 Okhla Industrial Area</span>
                <span class="del-loc-pill">📍 Noida &amp; Greater Noida</span>
                <span class="del-loc-pill">📍 Gurgaon (Cyber City &amp; Golf Course)</span>
                <span class="del-loc-pill">📍 Faridabad &amp; Ghaziabad</span>
            </div>
        </div>
    </section>

    <!-- ========================================================
         9. FAQS ACCORDION
       ======================================================== -->
    <section class="del-faq-section">
        <div class="del-container">
            <div class="del-section-head" data-wtm-reveal="fade-up">
                <div class="del-eyebrow">FREQUENTLY ASKED QUESTIONS</div>
                <h2 class="del-section-title">
                    Questions About <span class="accent">SEO in Delhi<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
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

                <div class="del-faq-item">
                    <button class="del-faq-btn" onclick="toggleDelFaq(this)">
                        <span>Which is better for my business: SEO or Google Ads?</span>
                        <span class="icon">+</span>
                    </button>
                    <div class="del-faq-answer">
                        Both channels complement each other. Google Ads provides immediate visibility at a direct per-click cost, while SEO builds an enduring, permanent organic traffic stream that delivers leads long after the initial investment. We help businesses strike the optimal balance between paid and organic channels.
                    </div>
                </div>

                <div class="del-faq-item">
                    <button class="del-faq-btn" onclick="toggleDelFaq(this)">
                        <span>Do you provide National and International SEO alongside Delhi Local SEO?</span>
                        <span class="icon">+</span>
                    </button>
                    <div class="del-faq-answer">
                        Yes. Whether you are targeting local buyers in Delhi NCR, pan-India searchers across metro cities, or international buyers in the US, UK, UAE, and Europe, we architect specialized technical hierarchies and international hreflang setups tailored to your expansion goals.
                    </div>
                </div>

                <div class="del-faq-item">
                    <button class="del-faq-btn" onclick="toggleDelFaq(this)">
                        <span>How much do SEO services in Delhi cost?</span>
                        <span class="icon">+</span>
                    </button>
                    <div class="del-faq-answer">
                        SEO pricing depends on your website scale, current technical health, target keyword competition, and business goals. WebTecMart provides tailored, transparent SEO packages designed for startups, growing SMEs, and large corporate enterprises without hidden fees or lock-in contracts.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================
         10. FINAL CONVERSION CTA BANNER
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
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </button>
                    <a href="tel:+919999674255" class="del-btn-secondary" style="background: rgba(255,255,255,0.12); border-color: rgba(255,255,255,0.4); color: #FFFFFF !important;">
                        <span>Call: +91-9999674255</span>
                    </a>
                </div>

                <div style="margin-top: 22px; font-size: 0.8rem; color: rgba(255, 255, 255, 0.7);">
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

    function handleHeroFormSubmit(e) {
        e.preventDefault();
        const form = document.getElementById('delHeroAuditForm');
        const btn  = document.getElementById('delHeroSubmitBtn');
        const fb   = document.getElementById('delHeroFeedback');

        const formData = new FormData(form);
        const msg = "DELHI SEO AUDIT REQUEST:\n" +
            "Website: " + (form.website.value || '') + "\n" +
            "Message: " + (form.message.value || '');

        formData.set('service', 'SEO Services in Delhi NCR');
        formData.set('message', msg);
        formData.set('ajax', '1');

        btn.disabled = true;
        btn.querySelector('span').innerText = 'Auditing Your Details...';

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
            fb.innerText = "Thank you! Your request has been received. Our Senior SEO Strategist will audit your website and contact you within 24 hours.";
            fb.style.display = 'block';
            form.reset();
            btn.disabled = false;
            btn.querySelector('span').innerText = 'Get My Complimentary Audit';
        })
        .catch(() => {
            fb.classList.remove('error');
            fb.classList.add('success');
            fb.innerText = "Thank you! Your request has been received. Our Senior SEO Strategist will contact you shortly.";
            fb.style.display = 'block';
            form.reset();
            btn.disabled = false;
            btn.querySelector('span').innerText = 'Get My Complimentary Audit';
        });
    }
</script>

<?php
renderFooterSection();
