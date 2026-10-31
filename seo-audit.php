<?php
$pageMeta = [
    'title' => 'SEO Audit Services – Forensic 100+ Checkpoint Website Diagnostic | WebTecMart',
    'description' => 'Fix SEO bottlenecks before they cost you leads. WebTecMart conducts forensic 100+ checkpoint website audits to uncover critical ranking, crawl, speed, and backlink issues with a prioritized execution roadmap.',
];
require_once __DIR__ . '/app/templates/header.php';
require_once __DIR__ . '/app/components/sections/FooterSection.php';
require_once __DIR__ . '/functions.php';

// Pull dynamic overrides from DB if updated via Admin Panel
$dbService = getServiceBySlug('seo-audit');
?>

<!-- Schema.org JSON-LD Structured Data for ProfessionalService & FAQPage -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "ProfessionalService",
      "@id": "https://webtecmart.com/#organization",
      "name": "WebTecMart Digital - Professional SEO Audit Company",
      "url": "https://webtecmart.com/seo-audit.php",
      "logo": "https://webtecmart.com/assets/images/webtecmart-logo.png",
      "description": "Forensic 100+ checkpoint website SEO audit services identifying crawl bottlenecks, Core Web Vitals, semantic on-page gaps, and toxic links with an actionable execution roadmap.",
      "telephone": "+91-9999674255",
      "email": "info@webtecmart.com",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Connaught Place / Nehru Place Commercial Center",
        "addressLocality": "New Delhi",
        "addressRegion": "Delhi NCR",
        "postalCode": "110001",
        "addressCountry": "IN"
      },
      "priceRange": "$$"
    },
    {
      "@type": "FAQPage",
      "@id": "https://webtecmart.com/seo-audit.php#faq",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "Will an SEO audit improve my rankings immediately?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "An SEO audit identifies root issues and provides step-by-step solutions, but ranking improvements begin once recommendations are implemented. Quick technical fixes (like resolving noindex directives or broken sitemaps) can yield noticeable results within 2–4 weeks, while deep content and authority updates compound into exponential growth over 2–6 months."
          }
        },
        {
          "@type": "Question",
          "name": "How often should a business get an SEO audit?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "We recommend a comprehensive quarterly audit for fast-growing businesses and e-commerce stores, and at minimum a bi-annual audit for corporate websites. Additionally, an immediate audit is essential before and after any website redesign or CMS migration."
          }
        },
        {
          "@type": "Question",
          "name": "Is an SEO audit suitable for small businesses?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes. Small businesses benefit tremendously from an SEO audit because it prevents wasted marketing spend. By identifying the exact high-impact fixes that matter most for your local market, you can outrank larger competitors efficiently."
          }
        },
        {
          "@type": "Question",
          "name": "How much does a professional SEO audit cost?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Our SEO audits are tailored to your website size and architectural complexity, ranging from fast-track starter diagnostics for local websites to enterprise multi-regional audits. All audits include an actionable developer roadmap with no hidden costs."
          }
        },
        {
          "@type": "Question",
          "name": "Is investing in professional SEO audit services worth it?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes. An audit typically uncovers traffic leaks that represent hundreds of thousands in lost customer acquisition value. Fixing even one critical indexation bug or page-speed bottleneck can generate a 10x to 50x return on investment in new organic leads."
          }
        }
      ]
    }
  ]
}
</script>

<style>
    /* ============================================================
       PURE PINK-ONLY PALETTE (Brand Request):
       - Dark Pink / Deep Magenta: #C4007A, #9A0060, #850053
       - Vibrant Hot Pink: #E0398F, #D81B60
       - Soft / Light Pink: #FFF0F7, #FCE7F3, #FDF2F8
       - Canvas: Pure White #FFFFFF and Softest Pink Tint #FFF9FB
       - Readable Text: Dark Slate #111827 and Muted Gray #4B5563
       ============================================================ */
    .aud-wrap {
        width: 100%;
        background: #FFF9FB;
        color: #111827;
        font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        overflow-x: hidden;
    }

    .aud-container {
        width: 100%;
        max-width: 1220px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* Eyebrow Pill Badges - Pure Pink Tone */
    .aud-pill {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #FFF0F7;
        border: 1px solid rgba(196, 0, 122, 0.22);
        padding: 6px 15px;
        border-radius: 9999px;
        color: #C4007A;
        font-size: 0.73rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        margin-bottom: 12px;
    }
    .aud-pill svg {
        width: 14px;
        height: 14px;
        color: #C4007A;
    }

    /* Common Section Headings with Signature SVG Underline */
    .aud-section-head {
        text-align: center;
        max-width: 840px;
        margin: 0 auto 38px;
    }
    .aud-section-title {
        font-size: clamp(1.85rem, 3.4vw, 2.55rem);
        font-weight: 800;
        line-height: 1.25;
        letter-spacing: -0.025em;
        color: #111827;
        margin: 0 0 12px;
    }
    .aud-section-title .accent {
        color: #C4007A;
        position: relative;
        display: inline-block;
    }
    .aud-section-title .accent svg {
        position: absolute;
        left: 0;
        bottom: -5px;
        width: 100%;
        height: 6px;
    }
    .aud-section-sub {
        font-size: 1rem;
        color: #4B5563;
        line-height: 1.65;
        margin: 0;
    }

    /* Buttons - Pink Gradients Only */
    .aud-btn-primary {
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        gap: 8px !important;
        background: linear-gradient(135deg, #C4007A 0%, #E0398F 100%);
        color: #FFFFFF !important;
        font-weight: 700;
        font-size: 0.95rem;
        line-height: 1;
        padding: 14px 28px;
        border-radius: 9999px;
        text-decoration: none;
        white-space: nowrap !important;
        box-shadow: 0 10px 24px rgba(196, 0, 122, 0.32);
        transition: all 0.25s ease;
        border: none;
        cursor: pointer;
    }
    .aud-btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 14px 30px rgba(196, 0, 122, 0.45);
        color: #FFFFFF;
    }
    .aud-btn-primary svg {
        width: 16px !important;
        height: 16px !important;
        flex-shrink: 0;
        transition: transform 0.2s ease;
    }
    .aud-btn-primary:hover svg {
        transform: translateX(3px);
    }
    .aud-btn-secondary {
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        gap: 8px !important;
        background: #FFFFFF;
        border: 1.5px solid rgba(196, 0, 122, 0.3);
        color: #C4007A !important;
        font-weight: 700;
        font-size: 0.95rem;
        line-height: 1;
        padding: 13px 24px;
        border-radius: 9999px;
        text-decoration: none;
        white-space: nowrap !important;
        transition: all 0.25s ease;
        box-shadow: 0 4px 12px rgba(196, 0, 122, 0.04);
    }
    .aud-btn-secondary:hover {
        background: #FFF0F7;
        border-color: #C4007A;
        transform: translateY(-2px);
    }

    /* ============================================================
       1. HERO SECTION (2-COL WITH HERO AUDIT FORM)
       ============================================================ */
    .aud-hero {
        padding: 50px 0 38px;
        position: relative;
        background: radial-gradient(circle at 85% 15%, rgba(196, 0, 122, 0.08) 0%, transparent 65%);
    }
    .aud-hero-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 36px;
        align-items: center;
    }
    @media (min-width: 992px) {
        .aud-hero-grid {
            grid-template-columns: 1.15fr 0.85fr;
            gap: 48px;
        }
    }

    .aud-hero-title {
        font-size: clamp(2.15rem, 4.1vw, 3.25rem);
        font-weight: 800;
        line-height: 1.15;
        letter-spacing: -0.025em;
        color: #111827;
        margin: 0 0 14px;
    }
    .aud-hero-title .accent {
        color: #C4007A;
        position: relative;
        display: inline-block;
    }
    .aud-hero-title .accent svg {
        position: absolute;
        left: 0;
        bottom: -6px;
        width: 100%;
        height: 6px;
    }

    .aud-hero-desc {
        font-size: 1.02rem;
        line-height: 1.65;
        color: #4B5563;
        margin: 0 0 22px;
    }

    .aud-hero-checks {
        display: grid;
        grid-template-columns: 1fr;
        gap: 12px;
        margin-bottom: 24px;
    }
    @media (min-width: 640px) {
        .aud-hero-checks {
            grid-template-columns: 1fr 1fr;
        }
    }
    .aud-check-item {
        display: flex;
        align-items: flex-start;
        gap: 9px;
        font-size: 0.88rem;
        font-weight: 600;
        color: #1F2937;
    }
    .aud-check-item svg {
        width: 18px;
        height: 18px;
        color: #C4007A; /* Dark Pink checkmark */
        flex-shrink: 0;
        margin-top: 1px;
    }

    .aud-hero-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        align-items: center;
        margin-bottom: 24px;
    }

    .aud-hero-author-card {
        display: inline-flex;
        align-items: center;
        gap: 14px;
        background: #FFFFFF;
        border: 1px solid rgba(196, 0, 122, 0.2);
        border-radius: 16px;
        padding: 10px 18px;
        box-shadow: 0 6px 18px rgba(196, 0, 122, 0.06);
    }
    .aud-author-avatar {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: linear-gradient(135deg, #C4007A 0%, #E0398F 100%);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 0.95rem;
    }
    .aud-author-info {
        font-size: 0.8rem;
        line-height: 1.4;
    }
    .aud-author-name {
        font-weight: 700;
        color: #111827;
    }
    .aud-author-meta {
        color: #6B7280;
    }

    /* Hero Form Card */
    .aud-form-card {
        background: #FFFFFF;
        border: 1.5px solid rgba(196, 0, 122, 0.22);
        border-radius: 24px;
        padding: 32px 28px;
        box-shadow: 0 20px 45px -10px rgba(196, 0, 122, 0.12);
        position: relative;
    }
    .aud-form-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 5px;
        background: linear-gradient(90deg, #99005F 0%, #C4007A 50%, #E0398F 100%);
        border-radius: 24px 24px 0 0;
    }
    .aud-form-title {
        font-size: 1.35rem;
        font-weight: 800;
        color: #111827;
        margin: 0 0 6px;
        text-align: center;
    }
    .aud-form-sub {
        font-size: 0.84rem;
        color: #6B7280;
        text-align: center;
        margin: 0 0 20px;
    }
    .aud-form-group {
        margin-bottom: 14px;
    }
    .aud-form-group label {
        display: block;
        font-size: 0.78rem;
        font-weight: 700;
        color: #374151;
        margin-bottom: 4px;
    }
    .aud-form-input, .aud-form-select, .aud-form-textarea {
        width: 100%;
        background: #FFF9FB;
        border: 1px solid rgba(196, 0, 122, 0.22);
        border-radius: 10px;
        padding: 10px 14px;
        font-size: 0.9rem;
        color: #111827;
        outline: none;
        transition: all 0.2s ease;
        box-sizing: border-box;
    }
    .aud-form-input:focus, .aud-form-select:focus, .aud-form-textarea:focus {
        border-color: #C4007A;
        background: #FFFFFF;
        box-shadow: 0 0 0 3px rgba(196, 0, 122, 0.15);
    }
    .aud-form-submit {
        width: 100%;
        background: linear-gradient(135deg, #C4007A 0%, #E0398F 100%);
        color: #FFFFFF;
        font-weight: 700;
        font-size: 0.96rem;
        padding: 13px 20px;
        border-radius: 9999px;
        border: none;
        cursor: pointer;
        box-shadow: 0 8px 20px rgba(196, 0, 122, 0.35);
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }
    .aud-form-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 26px rgba(196, 0, 122, 0.5);
    }
    .aud-form-privacy {
        font-size: 0.72rem;
        color: #9CA3AF;
        text-align: center;
        margin-top: 10px;
    }

    /* ============================================================
       2. STATS BAR (Pink Highlights Only)
       ============================================================ */
    .aud-stats-section {
        background: #FFFFFF;
        border-top: 1px solid rgba(196, 0, 122, 0.12);
        border-bottom: 1px solid rgba(196, 0, 122, 0.12);
        padding: 26px 0;
        box-shadow: 0 4px 16px rgba(196, 0, 122, 0.03);
    }
    .aud-stats-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        text-align: center;
    }
    @media (min-width: 768px) {
        .aud-stats-grid {
            grid-template-columns: repeat(4, 1fr);
        }
    }
    .aud-stat-item {
        padding: 8px 12px;
    }
    .aud-stat-num {
        font-size: clamp(2rem, 3.4vw, 2.7rem);
        font-weight: 900;
        line-height: 1.1;
        margin-bottom: 4px;
        letter-spacing: -0.02em;
        color: #C4007A;
    }
    .aud-stat-lbl {
        font-size: 0.82rem;
        font-weight: 700;
        color: #6B7280;
        text-transform: uppercase;
        letter-spacing: 0.06em;
    }

    /* ============================================================
       3. INTRO / SMART SCALABLE SECURE STRIP
       ============================================================ */
    .aud-intro-section {
        padding: 56px 0 44px;
        text-align: center;
    }
    .aud-intro-box {
        max-width: 920px;
        margin: 0 auto;
        background: #FFFFFF;
        border: 1.5px solid rgba(196, 0, 122, 0.18);
        border-radius: 24px;
        padding: 42px 32px;
        box-shadow: 0 16px 36px rgba(196, 0, 122, 0.06);
    }

    /* ============================================================
       4. 6 COMMON CHALLENGES / PROBLEMS WE SOLVE (Pink Theme)
       ============================================================ */
    .aud-problems-section {
        padding: 52px 0 44px;
    }
    .aud-problems-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 22px;
    }
    @media (min-width: 640px) {
        .aud-problems-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    @media (min-width: 1024px) {
        .aud-problems-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }
    .aud-problem-card {
        background: #FFFFFF;
        border: 1px solid rgba(196, 0, 122, 0.14);
        border-radius: 18px;
        padding: 28px 24px;
        transition: all 0.25s ease;
        position: relative;
        box-shadow: 0 4px 16px rgba(196, 0, 122, 0.03);
    }
    .aud-problem-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 16px 34px rgba(196, 0, 122, 0.12);
        border-color: #C4007A;
    }
    .aud-problem-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 18px;
        background: #FFF0F7;
        color: #C4007A;
        border: 1px solid rgba(196, 0, 122, 0.2);
    }
    .aud-problem-icon svg {
        width: 24px;
        height: 24px;
    }
    .aud-problem-title {
        font-size: 1.15rem;
        font-weight: 800;
        color: #111827;
        margin: 0 0 10px;
    }
    .aud-problem-desc {
        font-size: 0.9rem;
        color: #4B5563;
        line-height: 1.6;
        margin: 0;
    }

    /* ============================================================
       5. 9 TYPES OF AUDIT WE OFFER (Pure Pink Badges)
       ============================================================ */
    .aud-types-section {
        padding: 56px 0 48px;
        background: #FFFFFF;
        border-top: 1px solid rgba(196, 0, 122, 0.1);
        border-bottom: 1px solid rgba(196, 0, 122, 0.1);
    }
    .aud-types-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 22px;
    }
    @media (min-width: 640px) {
        .aud-types-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    @media (min-width: 1024px) {
        .aud-types-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }
    .aud-type-card {
        background: #FFF9FB;
        border: 1px solid rgba(196, 0, 122, 0.15);
        border-radius: 18px;
        padding: 26px 22px;
        transition: all 0.25s ease;
        display: flex;
        flex-direction: column;
    }
    .aud-type-card:hover {
        background: #FFFFFF;
        transform: translateY(-4px);
        box-shadow: 0 16px 36px rgba(196, 0, 122, 0.12);
        border-color: #C4007A;
    }
    .aud-type-badge {
        display: inline-block;
        font-size: 0.72rem;
        font-weight: 800;
        text-transform: uppercase;
        padding: 4px 12px;
        border-radius: 9999px;
        margin-bottom: 10px;
        align-self: flex-start;
        background: #FFF0F7;
        color: #C4007A;
        border: 1px solid rgba(196, 0, 122, 0.25);
    }

    .aud-type-title {
        font-size: 1.15rem;
        font-weight: 800;
        color: #111827;
        margin: 0 0 10px;
    }
    .aud-type-desc {
        font-size: 0.88rem;
        color: #4B5563;
        line-height: 1.6;
        margin-bottom: 16px;
        flex-grow: 1;
    }
    .aud-type-link {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 0.84rem;
        font-weight: 700;
        color: #C4007A;
        text-decoration: none;
        margin-top: auto;
    }
    .aud-type-link:hover {
        text-decoration: underline;
    }

    /* ============================================================
       6. WHY CHOOSE WEBTECMART (Pink Theme)
       ============================================================ */
    .aud-why-section {
        padding: 56px 0 48px;
    }
    .aud-why-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 22px;
    }
    @media (min-width: 640px) {
        .aud-why-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    @media (min-width: 1024px) {
        .aud-why-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }
    .aud-why-card {
        background: #FFFFFF;
        border: 1px solid rgba(196, 0, 122, 0.15);
        border-radius: 18px;
        padding: 28px 24px;
        transition: all 0.25s ease;
        box-shadow: 0 4px 16px rgba(196, 0, 122, 0.03);
    }
    .aud-why-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 16px 32px rgba(196, 0, 122, 0.12);
        border-color: #C4007A;
    }
    .aud-why-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 16px;
        background: #FFF0F7;
        color: #C4007A;
        border: 1px solid rgba(196, 0, 122, 0.2);
        font-size: 1.25rem;
    }
    .aud-why-title {
        font-size: 1.15rem;
        font-weight: 800;
        color: #111827;
        margin: 0 0 10px;
    }
    .aud-why-desc {
        font-size: 0.9rem;
        color: #4B5563;
        line-height: 1.6;
        margin: 0;
    }

    /* ============================================================
       7. 6-STEP AUDIT PROCESS (Light Pink & Pure White Only)
       ============================================================ */
    .aud-process-section {
        padding: 60px 0 52px;
        background: #FFFFFF;
        border-top: 1px solid rgba(196, 0, 122, 0.1);
        border-bottom: 1px solid rgba(196, 0, 122, 0.1);
        position: relative;
    }
    .aud-process-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 22px;
        margin-top: 36px;
    }
    @media (min-width: 640px) {
        .aud-process-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    @media (min-width: 1024px) {
        .aud-process-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }
    .aud-proc-card {
        background: #FFF9FB;
        border: 1.5px solid rgba(196, 0, 122, 0.16);
        border-radius: 18px;
        padding: 30px 24px;
        position: relative;
        transition: all 0.25s ease;
        box-shadow: 0 4px 18px rgba(196, 0, 122, 0.03);
    }
    .aud-proc-card:hover {
        background: #FFFFFF;
        border-color: #C4007A;
        transform: translateY(-4px);
        box-shadow: 0 16px 36px rgba(196, 0, 122, 0.14);
    }
    .aud-proc-num-wrap {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 44px;
        height: 44px;
        border-radius: 12px;
        background: #FFF0F7;
        border: 1.5px solid rgba(196, 0, 122, 0.3);
        color: #C4007A;
        font-size: 1.15rem;
        font-weight: 900;
        margin-bottom: 16px;
    }
    .aud-proc-title {
        font-size: 1.15rem;
        font-weight: 800;
        color: #111827;
        margin: 0 0 10px;
    }
    .aud-proc-desc {
        font-size: 0.88rem;
        color: #4B5563;
        line-height: 1.6;
        margin: 0;
    }

    /* ============================================================
       8. ENTERPRISE TOOLS WE USE (Soft Pink Badges)
       ============================================================ */
    .aud-tools-section {
        padding: 56px 0 44px;
    }
    .aud-tools-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 22px;
    }
    @media (min-width: 640px) {
        .aud-tools-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    @media (min-width: 1024px) {
        .aud-tools-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }
    .aud-tool-card {
        background: #FFFFFF;
        border: 1px solid rgba(196, 0, 122, 0.14);
        border-radius: 18px;
        padding: 26px 22px;
        display: flex;
        align-items: flex-start;
        gap: 16px;
        transition: all 0.25s ease;
        box-shadow: 0 4px 14px rgba(196, 0, 122, 0.03);
    }
    .aud-tool-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 14px 28px rgba(196, 0, 122, 0.1);
        border-color: #C4007A;
    }
    .aud-tool-icon {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        background: #FFF0F7;
        color: #C4007A;
        border: 1px solid rgba(196, 0, 122, 0.2);
        font-size: 1.25rem;
    }
    .aud-tool-title {
        font-size: 1.05rem;
        font-weight: 800;
        color: #111827;
        margin: 0 0 6px;
    }
    .aud-tool-desc {
        font-size: 0.86rem;
        color: #4B5563;
        line-height: 1.55;
        margin: 0;
    }

    /* ============================================================
       9. REAL RESULTS WE DELIVER (Pure Pink Theme)
       ============================================================ */
    .aud-results-section {
        padding: 56px 0 48px;
        background: #FFFFFF;
        border-top: 1px solid rgba(196, 0, 122, 0.1);
        border-bottom: 1px solid rgba(196, 0, 122, 0.1);
    }
    .aud-results-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 22px;
        margin-bottom: 36px;
    }
    @media (min-width: 640px) {
        .aud-results-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    @media (min-width: 1024px) {
        .aud-results-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }
    .aud-res-card {
        background: #FFF9FB;
        border: 1px solid rgba(196, 0, 122, 0.15);
        border-radius: 18px;
        padding: 28px 24px;
        transition: all 0.25s ease;
    }
    .aud-res-card:hover {
        background: #FFFFFF;
        transform: translateY(-4px);
        box-shadow: 0 16px 32px rgba(196, 0, 122, 0.12);
        border-color: #C4007A;
    }
    .aud-res-header {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 12px;
    }
    .aud-res-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        background: #FFF0F7;
        color: #C4007A;
        border: 1px solid rgba(196, 0, 122, 0.2);
    }
    .aud-res-title {
        font-size: 1.12rem;
        font-weight: 800;
        color: #111827;
        margin: 0;
    }
    .aud-res-desc {
        font-size: 0.88rem;
        color: #4B5563;
        line-height: 1.6;
        margin: 0;
    }

    /* ============================================================
       10. END YOUR SEO STRUGGLES & FAQS (Pink Theme)
       ============================================================ */
    .aud-faq-section {
        padding: 60px 0 52px;
    }
    .aud-faq-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 40px;
    }
    @media (min-width: 992px) {
        .aud-faq-grid {
            grid-template-columns: 0.95fr 1.05fr;
            gap: 52px;
            align-items: start;
        }
    }
    .aud-faq-left-title {
        font-size: clamp(2rem, 3.4vw, 2.7rem);
        font-weight: 800;
        color: #111827;
        line-height: 1.2;
        margin: 0 0 16px;
    }
    .aud-faq-left-title .accent {
        color: #C4007A;
        position: relative;
        display: inline-block;
    }
    .aud-faq-left-title .accent svg {
        position: absolute;
        left: 0;
        bottom: -5px;
        width: 100%;
        height: 6px;
    }
    .aud-faq-left-text {
        font-size: 0.95rem;
        color: #4B5563;
        line-height: 1.7;
        margin-bottom: 16px;
    }

    /* FAQ Accordion Styles */
    .aud-faq-item {
        background: #FFFFFF;
        border: 1px solid rgba(196, 0, 122, 0.16);
        border-radius: 14px;
        margin-bottom: 12px;
        overflow: hidden;
        transition: all 0.2s ease;
        box-shadow: 0 2px 8px rgba(196, 0, 122, 0.03);
    }
    .aud-faq-item.active {
        border-color: #C4007A;
        box-shadow: 0 8px 24px rgba(196, 0, 122, 0.12);
    }
    .aud-faq-btn {
        width: 100%;
        padding: 16px 20px;
        text-align: left;
        background: none;
        border: none;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        cursor: pointer;
        font-size: 0.96rem;
        font-weight: 700;
        color: #111827;
        transition: color 0.2s ease;
    }
    .aud-faq-btn:hover {
        color: #C4007A;
    }
    .aud-faq-icon {
        width: 28px;
        height: 28px;
        border-radius: 50%;
        background: #FFF0F7;
        color: #C4007A;
        border: 1px solid rgba(196, 0, 122, 0.25);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        font-size: 1.1rem;
        font-weight: 700;
        transition: transform 0.2s ease, background 0.2s ease;
    }
    .aud-faq-item.active .aud-faq-icon {
        background: #C4007A;
        color: #FFFFFF;
        border-color: #C4007A;
        transform: rotate(45deg);
    }
    .aud-faq-content {
        padding: 0 20px 18px;
        font-size: 0.88rem;
        color: #4B5563;
        line-height: 1.65;
        display: none;
    }
    .aud-faq-item.active .aud-faq-content {
        display: block;
    }

    /* ============================================================
       11. LATEST INSIGHTS (Light Pink Thumbs)
       ============================================================ */
    .aud-insights-section {
        padding: 56px 0 48px;
        background: #FFFFFF;
        border-top: 1px solid rgba(196, 0, 122, 0.1);
    }
    .aud-insights-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 24px;
    }
    @media (min-width: 640px) {
        .aud-insights-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    @media (min-width: 1024px) {
        .aud-insights-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }
    .aud-post-card {
        background: #FFFFFF;
        border: 1px solid rgba(196, 0, 122, 0.14);
        border-radius: 18px;
        overflow: hidden;
        transition: all 0.25s ease;
        display: flex;
        flex-direction: column;
        box-shadow: 0 4px 16px rgba(196, 0, 122, 0.03);
    }
    .aud-post-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 16px 34px rgba(196, 0, 122, 0.12);
        border-color: #C4007A;
    }
    .aud-post-thumb {
        height: 170px;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        background: linear-gradient(135deg, #FFF0F7 0%, #FCE7F3 100%);
        color: #C4007A;
    }

    .aud-post-body {
        padding: 22px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }
    .aud-post-cat {
        font-size: 0.72rem;
        font-weight: 800;
        color: #C4007A;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        margin-bottom: 6px;
    }
    .aud-post-title {
        font-size: 1.05rem;
        font-weight: 800;
        color: #111827;
        margin: 0 0 8px;
        line-height: 1.4;
    }
    .aud-post-excerpt {
        font-size: 0.86rem;
        color: #6B7280;
        line-height: 1.55;
        margin-bottom: 16px;
        flex-grow: 1;
    }
    .aud-post-meta {
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-size: 0.76rem;
        color: #9CA3AF;
        border-top: 1px solid rgba(196, 0, 122, 0.1);
        padding-top: 12px;
        margin-bottom: 12px;
    }
    .aud-post-btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 0.84rem;
        font-weight: 700;
        color: #C4007A;
        text-decoration: none;
    }
    .aud-post-btn:hover {
        text-decoration: underline;
    }

    /* ============================================================
       12. VIBRANT PINK HERO CONVERSION CTA BANNER
       (Dark Pink to Hot Pink Gradient - ONLY PINK!)
       ============================================================ */
    .aud-cta-section {
        padding: 68px 0 60px;
        background: linear-gradient(135deg, #850053 0%, #C4007A 50%, #E0398F 100%);
        color: #FFFFFF;
        text-align: center;
        position: relative;
        overflow: hidden;
        border-top: 1px solid rgba(255, 255, 255, 0.2);
    }
    .aud-cta-section::before {
        content: '';
        position: absolute;
        top: -40%; right: -15%;
        width: 480px; height: 480px;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.18) 0%, transparent 70%);
        border-radius: 50%;
        pointer-events: none;
    }
    .aud-cta-inner {
        max-width: 820px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
    }
    .aud-cta-title {
        font-size: clamp(2.1rem, 4vw, 3.1rem);
        font-weight: 900;
        line-height: 1.2;
        margin: 0 0 14px;
        color: #FFFFFF;
        letter-spacing: -0.02em;
    }
    .aud-cta-desc {
        font-size: 1.05rem;
        color: rgba(255, 255, 255, 0.94);
        line-height: 1.65;
        margin: 0 auto 28px;
        max-width: 680px;
    }
    .aud-cta-actions {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 14px;
    }
    .aud-btn-cta-white {
        background: #FFFFFF !important;
        color: #C4007A !important;
        font-weight: 800;
        font-size: 0.98rem;
        padding: 14px 32px;
        border-radius: 9999px;
        text-decoration: none;
        white-space: nowrap !important;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.18);
        transition: all 0.25s ease;
    }
    .aud-btn-cta-white:hover {
        transform: translateY(-2px);
        box-shadow: 0 14px 30px rgba(0, 0, 0, 0.28);
        background: #FFF0F7 !important;
    }
    .aud-btn-cta-outline {
        background: rgba(255, 255, 255, 0.12) !important;
        border: 1.5px solid rgba(255, 255, 255, 0.6) !important;
        color: #FFFFFF !important;
        font-weight: 700;
        font-size: 0.98rem;
        padding: 14px 28px;
        border-radius: 9999px;
        text-decoration: none;
        white-space: nowrap !important;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.25s ease;
    }
    .aud-btn-cta-outline:hover {
        background: rgba(255, 255, 255, 0.25) !important;
        border-color: #FFFFFF !important;
        transform: translateY(-2px);
    }
</style>

<div class="aud-wrap">

    <!-- ============================================================
         1. HERO SECTION (2-COL WITH HERO AUDIT FORM)
         ============================================================ -->
    <section class="aud-hero">
        <div class="aud-container">
            <div class="aud-hero-grid">
                
                <!-- Left Column -->
                <div>
                    <div class="aud-pill">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
                        <span>FORENSIC 100+ CHECKPOINT AUDIT</span>
                    </div>

                    <h1 class="aud-hero-title">
                        Fix SEO Issues Before They Cost You Leads with an 
                        <span class="accent">Expert SEO Audit<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                    </h1>

                    <p class="aud-hero-desc">
                        Hidden technical bottlenecks, crawl traps, and algorithmic penalties silently damage your Google rankings every single day. WebTecMart conducts exhaustive, 100+ checkpoint website audits to uncover critical ranking barriers and deliver a clear, developer-ready execution roadmap that accelerates your qualified leads and business growth.
                    </p>

                    <div class="aud-hero-checks">
                        <div class="aud-check-item">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>100+ Checkpoint Deep Diagnostic</span>
                        </div>
                        <div class="aud-check-item">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Prioritized Developer Action Plan</span>
                        </div>
                        <div class="aud-check-item">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>13+ Years & 1,000+ Websites Audited</span>
                        </div>
                        <div class="aud-check-item">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>48-Hour Rapid Video & PDF Delivery</span>
                        </div>
                    </div>

                    <div class="aud-hero-actions">
                        <a href="javascript:void(0)" class="aud-btn-primary trigger-enquiry-modal">
                            <span>Get Free SEO Audit Consultation</span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                        </a>
                        <a href="tel:+919999674255" class="aud-btn-secondary">
                            <span>Call: +91-9999674255</span>
                        </a>
                    </div>

                    <div class="aud-hero-author-card">
                        <div class="aud-author-avatar">MS</div>
                        <div class="aud-author-info">
                            <div class="aud-author-name">Manoj Sharma • Senior Search Strategist</div>
                            <div class="aud-author-meta">Published: Apr 13, 2026 • Verified White-Hat Google Standards</div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Interactive Audit Request Form -->
                <div>
                    <div class="aud-form-card" id="audit-form-container">
                        <h3 class="aud-form-title">Request A Comprehensive SEO Audit</h3>
                        <p class="aud-form-sub">Enter your details below to receive a high-impact diagnostic breakdown within 48 hours.</p>

                        <form method="POST" action="/contact.php" id="heroAuditForm">
                            <input type="hidden" name="service" value="SEO Audit Services">
                            
                            <div class="aud-form-group">
                                <label>Your Full Name *</label>
                                <input type="text" name="name" class="aud-form-input" placeholder="e.g. Rahul Verma" required>
                            </div>

                            <div class="aud-form-group">
                                <label>Website URL *</label>
                                <input type="url" name="website" class="aud-form-input" placeholder="https://yourwebsite.com" required>
                            </div>

                            <div class="aud-form-group">
                                <label>Phone / WhatsApp Number *</label>
                                <input type="tel" name="phone" class="aud-form-input" placeholder="+91 98765 43210" required>
                            </div>

                            <div class="aud-form-group">
                                <label>Work Email Address *</label>
                                <input type="email" name="email" class="aud-form-input" placeholder="name@company.com" required>
                            </div>

                            <div class="aud-form-group">
                                <label>Primary Audit Focus *</label>
                                <select name="audit_focus" class="aud-form-select">
                                    <option value="Full Comprehensive Audit">Full 360° Comprehensive Audit</option>
                                    <option value="Recover Ranking Drops">Recover from Sudden Ranking / Traffic Drop</option>
                                    <option value="Technical & Core Web Vitals">Technical SEO & Core Web Vitals</option>
                                    <option value="E-Commerce Audit">E-Commerce Catalog & Store Audit</option>
                                    <option value="Pre/Post Website Redesign">Pre / Post Website Redesign Audit</option>
                                </select>
                            </div>

                            <div class="aud-form-group">
                                <label>Specific Problem / Message (Optional)</label>
                                <textarea name="message" class="aud-form-textarea" rows="2" placeholder="Briefly describe what challenges your website is currently facing..."></textarea>
                            </div>

                            <button type="submit" class="aud-form-submit">
                                <span>Claim Your Free Website Audit</span>
                                <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                            </button>

                            <p class="aud-form-privacy">🔒 100% Confidential. No spam. No automated superficial checklists.</p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ============================================================
         2. STATS BAR (Only Pink Numbers)
         ============================================================ */
    -->
    <section class="aud-stats-section">
        <div class="aud-container">
            <div class="aud-stats-grid">
                <div class="aud-stat-item">
                    <div class="aud-stat-num">100+</div>
                    <div class="aud-stat-lbl">Diagnostic Checkpoints</div>
                </div>
                <div class="aud-stat-item">
                    <div class="aud-stat-num">1,000+</div>
                    <div class="aud-stat-lbl">Websites Audited</div>
                </div>
                <div class="aud-stat-item">
                    <div class="aud-stat-num">95%</div>
                    <div class="aud-stat-lbl">Client Retention Rate</div>
                </div>
                <div class="aud-stat-item">
                    <div class="aud-stat-num">48 Hrs</div>
                    <div class="aud-stat-lbl">Rapid Actionable Delivery</div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
         3. INTRO / SMART SCALABLE SECURE STRIP
         ============================================================ */
    -->
    <section class="aud-intro-section">
        <div class="aud-container">
            <div class="aud-intro-box">
                <div class="aud-pill">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    <span>SMART • SCALABLE • SECURE</span>
                </div>

                <h2 class="aud-section-title">
                    Book Free SEO Audit Services Today for 
                    <span class="accent">Faster and Smarter Growth<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                </h2>

                <p class="aud-section-sub" style="max-width: 780px; margin: 0 auto 24px;">
                    Are stagnant rankings and invisible traffic patterns keeping your digital presence in the shadows? WebTecMart brings you result-driven SEO audit services engineered to help businesses in Delhi NCR, Pan-India, and across the globe achieve sustainable growth in an intensely competitive digital landscape.
                </p>

                <p style="font-size: 0.95rem; color: #4B5563; line-height: 1.65; max-width: 800px; margin: 0 auto 28px;">
                    Our forensic diagnostic takes a deep look into each and every component of your website to identify the hidden flaws, crawl bottlenecks, and indexing gaps that hold your website’s search visibility back. Whether it is technical server health, Core Web Vitals, on-page taxonomy, or backlink profile security, our audits provide complete transparency, strategic clarity, and a clear path to market leadership.
                </p>

                <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 14px;">
                    <a href="javascript:void(0)" class="aud-btn-primary trigger-enquiry-modal">
                        <span>Schedule Free Audit Consultation</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </a>
                    <a href="/contact.php" class="aud-btn-secondary">
                        <span>Contact Our Senior Auditor</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
         4. 6 COMMON PROBLEMS WE SOLVE (Pink Theme)
         ============================================================ */
    -->
    <section class="aud-problems-section">
        <div class="aud-container">
            <div class="aud-section-head">
                <div class="aud-pill">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                    <span>REVENUE PROTECTION</span>
                </div>
                <h2 class="aud-section-title">
                    Why Your Business Needs a Leading SEO Audit Company 
                    <span class="accent">Right Now<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                </h2>
                <p class="aud-section-sub">
                    Simply having a website is not enough. When your site is not found by search engines, you lose high-intent customers every day. Your website might be silently losing revenue right now due to these common bottlenecks:
                </p>
            </div>

            <div class="aud-problems-grid">
                
                <!-- Card 1 -->
                <div class="aud-problem-card">
                    <div class="aud-problem-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 3v18h18"/><path d="M18 9l-5 5-4-4-6 6"/></svg>
                    </div>
                    <h3 class="aud-problem-title">Low Search Rankings</h3>
                    <p class="aud-problem-desc">
                        Your website may look beautifully designed, but without correct semantic signals, metadata, and structural intent, priority commercial pages remain buried past Page 2 on Google.
                    </p>
                </div>

                <!-- Card 2 -->
                <div class="aud-problem-card">
                    <div class="aud-problem-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 18 13.5 8.5 8.5 13.5 1 6"/><polyline points="17 18 23 18 23 12"/></svg>
                    </div>
                    <h3 class="aud-problem-title">Sudden Organic Traffic Drop</h3>
                    <p class="aud-problem-desc">
                        A sudden traffic collapse is often caused by Google algorithm Core updates, broken canonical tags, accidental noindex directives, or toxic backlink penalties that require immediate diagnosis.
                    </p>
                </div>

                <!-- Card 3 -->
                <div class="aud-problem-card">
                    <div class="aud-problem-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
                    </div>
                    <h3 class="aud-problem-title">Technical SEO Issues</h3>
                    <p class="aud-problem-desc">
                        High Core Web Vitals latency, crawl budget waste, redirect chains, and wrong indexing prevent search bots from discovering and ranking your highest-converting pages.
                    </p>
                </div>

                <!-- Card 4 -->
                <div class="aud-problem-card">
                    <div class="aud-problem-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="4" y1="9" x2="20" y2="9"/><line x1="4" y1="15" x2="20" y2="15"/><line x1="10" y1="3" x2="8" y2="21"/><line x1="16" y1="3" x2="14" y2="21"/></svg>
                    </div>
                    <h3 class="aud-problem-title">Weak On-Page Architecture</h3>
                    <p class="aud-problem-desc">
                        Even with quality content, poor optimization limits search performance. Missing keyword mapping, disorganized H1-H6 headers, unoptimized images, and broken internal links hurt your relevance.
                    </p>
                </div>

                <!-- Card 5 -->
                <div class="aud-problem-card">
                    <div class="aud-problem-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    </div>
                    <h3 class="aud-problem-title">Low Conversion Rate</h3>
                    <p class="aud-problem-desc">
                        Getting traffic is only half the battle. If visitors bounce without inquiring or buying, user journey friction, slow mobile rendering, or misaligned intent is actively eroding your marketing ROI.
                    </p>
                </div>

                <!-- Card 6 -->
                <div class="aud-problem-card">
                    <div class="aud-problem-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="2"/><path d="M16.24 7.76a6 6 0 0 1 0 8.49m-8.48-.01a6 6 0 0 1 0-8.49m11.31-2.82a10 10 0 0 1 0 14.14m-14.14 0a10 10 0 0 1 0-14.14"/></svg>
                    </div>
                    <h3 class="aud-problem-title">No Clear SEO Strategy</h3>
                    <p class="aud-problem-desc">
                        Without structured KPI tracking and competitor benchmarking, businesses waste budgets on random tactics without knowing what drives revenue and what wastes resources.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- ============================================================
         5. WHAT WE OFFER: 9 TYPES OF AUDIT WE PERFORM
         ============================================================ */
    -->
    <section class="aud-types-section">
        <div class="aud-container">
            <div class="aud-section-head">
                <div class="aud-pill">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                    <span>COMPREHENSIVE AUDIT SUITE</span>
                </div>
                <h2 class="aud-section-title">
                    Fix Your Website Issues Instantly with 
                    <span class="accent">Complete SEO Audit Services<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                </h2>
                <p class="aud-section-sub">
                    Your rankings and conversion rates can be silently sabotaged by hidden technical bugs, unoptimized code, or outdated strategies. Explore our specialized audit diagnostics:
                </p>
            </div>

            <div class="aud-types-grid">

                <div class="aud-type-card">
                    <div class="aud-type-badge">Technical Health</div>
                    <h3 class="aud-type-title">Technical SEO Audit</h3>
                    <p class="aud-type-desc">We examine crawlability, indexation rules, robots.txt, canonicalization, server response latency, Core Web Vitals, and JavaScript rendering to ensure search engines can effortlessly index your site.</p>
                    <a href="/technical-seo.php" class="aud-type-link">Explore Technical SEO →</a>
                </div>

                <div class="aud-type-card">
                    <div class="aud-type-badge">Relevance &amp; Intent</div>
                    <h3 class="aud-type-title">On-Page SEO Audit</h3>
                    <p class="aud-type-desc">Detailed scrutiny of title tags, meta descriptions, heading structures, keyword cannibalization, and semantic internal linking to match search intent perfectly.</p>
                    <a href="/on-page-seo.php" class="aud-type-link">Explore On-Page SEO →</a>
                </div>

                <div class="aud-type-card">
                    <div class="aud-type-badge">Domain Authority</div>
                    <h3 class="aud-type-title">Off-Page &amp; Backlink Audit</h3>
                    <p class="aud-type-desc">Complete toxic link audit, referring domain quality check, anchor text diversity profiling, and penalty risk assessment to protect and build your site's authority.</p>
                    <a href="/off-page-seo.php" class="aud-type-link">Explore Off-Page SEO →</a>
                </div>

                <div class="aud-type-card">
                    <div class="aud-type-badge">E-E-A-T Quality</div>
                    <h3 class="aud-type-title">Content &amp; Semantic Audit</h3>
                    <p class="aud-type-desc">We evaluate your copy for originality, information gain, topical authority, keyword optimization, and user engagement across all core landing pages.</p>
                    <a href="/content-optimization.php" class="aud-type-link">Explore Content SEO →</a>
                </div>

                <div class="aud-type-card">
                    <div class="aud-type-badge">Online Stores</div>
                    <h3 class="aud-type-title">E-Commerce SEO Audit</h3>
                    <p class="aud-type-desc">We examine product pages, category hierarchies, faceted navigation filters, schema markup, and duplicate variants to ensure your catalog dominates shopping queries.</p>
                    <a href="/ecommerce-seo.php" class="aud-type-link">Explore E-commerce SEO →</a>
                </div>

                <div class="aud-type-card">
                    <div class="aud-type-badge">Full 360° Diagnostic</div>
                    <h3 class="aud-type-title">Full 360° Comprehensive Audit</h3>
                    <p class="aud-type-desc">An all-inclusive diagnostic covering technical, on-page, speed, mobile, backlinks, and UX factors in a single comprehensive report with prioritized tasks.</p>
                    <a href="javascript:void(0)" class="aud-type-link trigger-enquiry-modal">Request 360° Audit →</a>
                </div>

                <div class="aud-type-card">
                    <div class="aud-type-badge">Speed &amp; Mobile</div>
                    <h3 class="aud-type-title">Mobile SEO &amp; UX Audit</h3>
                    <p class="aud-type-desc">We audit mobile viewport responsiveness, touch target spacing, font readability, Cumulative Layout Shift (CLS), and Interaction to Next Paint (INP).</p>
                    <a href="javascript:void(0)" class="aud-type-link trigger-enquiry-modal">Audit Mobile Speed →</a>
                </div>

                <div class="aud-type-card">
                    <div class="aud-type-badge">Market Intelligence</div>
                    <h3 class="aud-type-title">Competitor SEO Gap Audit</h3>
                    <p class="aud-type-desc">Deep reverse-engineering of your top 3 competitors’ keyword portfolios, content strategies, and backlink sources to uncover untapped growth opportunities.</p>
                    <a href="javascript:void(0)" class="aud-type-link trigger-enquiry-modal">Analyze Competitors →</a>
                </div>

                <div class="aud-type-card">
                    <div class="aud-type-badge">Local Dominance</div>
                    <h3 class="aud-type-title">Local SEO &amp; Google Maps Audit</h3>
                    <p class="aud-type-desc">We audit Google Business Profile completeness, local citations, NAP consistency, local reviews, and local schema to win top 3-pack Google Maps positions.</p>
                    <a href="/local-seo.php" class="aud-type-link">Explore Local SEO →</a>
                </div>

            </div>
        </div>
    </section>

    <!-- ============================================================
         6. WHY CHOOSE WEBTECMART (Pink Theme)
         ============================================================ */
    -->
    <section class="aud-why-section">
        <div class="aud-container">
            <div class="aud-section-head">
                <div class="aud-pill">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    <span>WHY CHOOSE WEBTECMART</span>
                </div>
                <h2 class="aud-section-title">
                    Hire a Results-Driven SEO Audit Agency That 
                    <span class="accent">Delivers Real Growth<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                </h2>
                <p class="aud-section-sub">
                    Instead of guessing what is holding you back, our structured website audit reveals the exact technical and architectural bottlenecks throttling your organic revenue:
                </p>
            </div>

            <div class="aud-why-grid">

                <div class="aud-why-card">
                    <div class="aud-why-icon">
                        <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    </div>
                    <h3 class="aud-why-title">Experienced SEO Audit Consultants</h3>
                    <p class="aud-why-desc">
                        Backed by 13+ years of experience, our team consists of senior technical specialists who understand search algorithm mechanics, crawl budget dynamics, and ranking factors inside-out.
                    </p>
                </div>

                <div class="aud-why-card">
                    <div class="aud-why-icon">
                        <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
                    </div>
                    <h3 class="aud-why-title">Data-Driven Audit Reports</h3>
                    <p class="aud-why-desc">
                        Every audit is rooted in concrete empirical data, not assumptions. We analyze real traffic logs, search console impressions, ranking fluctuations, and user engagement signals.
                    </p>
                </div>

                <div class="aud-why-card">
                    <div class="aud-why-icon">
                        <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
                    </div>
                    <h3 class="aud-why-title">Advanced SEO Tools Usage</h3>
                    <p class="aud-why-desc">
                        We leverage enterprise licenses of Screaming Frog, Ahrefs, SEMrush, Google Search Console, and Lighthouse to uncover concealed errors that basic software checks consistently miss.
                    </p>
                </div>

                <div class="aud-why-card">
                    <div class="aud-why-icon">
                        <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/></svg>
                    </div>
                    <h3 class="aud-why-title">Customized Audit Strategies</h3>
                    <p class="aud-why-desc">
                        Every business model is unique. Our audit is strictly tailored to your specific sector, margin structure, and competitive landscape so you focus only on fixes that move the revenue needle.
                    </p>
                </div>

                <div class="aud-why-card">
                    <div class="aud-why-icon">
                        <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                    </div>
                    <h3 class="aud-why-title">Clear Action Plan To Fix Issues</h3>
                    <p class="aud-why-desc">
                        Beyond pointing out problems, we deliver a prioritized, sprint-ready execution roadmap with exact code recommendations, developer guides, and high-impact timelines.
                    </p>
                </div>

                <div class="aud-why-card">
                    <div class="aud-why-icon">
                        <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M10 14.66V17c0 .55-.45 1-1 1H7.5c-.55 0-1-.45-1-1v-2.34c0-.6.24-1.17.66-1.59l1.42-1.42c.42-.42 1-.65 1.59-.65h1.66c.59 0 1.17.23 1.59.65l1.42 1.42c.42.42.66.99.66 1.59V17c0 .55-.45 1-1 1h-.5c-.55 0-1-.45-1-1v-2.34"/></svg>
                    </div>
                    <h3 class="aud-why-title">Proven 95% Retention Record</h3>
                    <p class="aud-why-desc">
                        With over 1,000+ businesses served across India and globally, our systematic diagnostic approach has helped brands turn stagnant sites into dominant organic revenue channels.
                    </p>
                </div>

            </div>

            <div style="text-align: center; margin-top: 36px;">
                <a href="javascript:void(0)" class="aud-btn-primary trigger-enquiry-modal">
                    <span>Speak to an SEO Audit Expert</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
            </div>
        </div>
    </section>

    <!-- ============================================================
       7. 6-STEP AUDIT PROCESS (Light Pink Accents & White Cards)
       ============================================================ */
    -->
    <section class="aud-process-section">
        <div class="aud-container">
            <div class="aud-section-head">
                <div class="aud-pill">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    <span>EXPERT AUDIT PROCESS</span>
                </div>
                <h2 class="aud-section-title">
                    Boost Rankings With a Website SEO Audit Company's 
                    <span class="accent">Expert Audit Process<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                </h2>
                <p class="aud-section-sub">
                    Your website rankings require a clear, structured approach backed by in-depth analysis. We follow a proven systematic process designed to identify and solve every issue:
                </p>
            </div>

            <div class="aud-process-grid">

                <div class="aud-proc-card">
                    <div class="aud-proc-num-wrap">01</div>
                    <h3 class="aud-proc-title">Website Analysis</h3>
                    <p class="aud-proc-desc">
                        We start with a complete analysis of your website's general architecture, UI/UX flow, navigation paths, and accessibility to determine what restricts user engagement and search indexing.
                    </p>
                </div>

                <div class="aud-proc-card">
                    <div class="aud-proc-num-wrap">02</div>
                    <h3 class="aud-proc-title">Technical Audit</h3>
                    <p class="aud-proc-desc">
                        Our technical team conducts a deep crawl of Core Web Vitals, server response times (3xx/4xx/5xx), sitemaps, robots directives, and canonical tags to ensure search engines can effortlessly crawl and rank your site.
                    </p>
                </div>

                <div class="aud-proc-card">
                    <div class="aud-proc-num-wrap">03</div>
                    <h3 class="aud-proc-title">On-Page Audit</h3>
                    <p class="aud-proc-desc">
                        We examine meta titles, descriptions, header hierarchy (H1-H6), keyword usage, semantic coverage, and internal linking to ensure every page satisfies search intent.
                    </p>
                </div>

                <div class="aud-proc-card">
                    <div class="aud-proc-num-wrap">04</div>
                    <h3 class="aud-proc-title">Backlink &amp; Competitor Analysis</h3>
                    <p class="aud-proc-desc">
                        We dissect your backlink profile to assess domain authority, anchor text balance, and toxic spam links, while reverse-engineering competitor strategies to uncover high-impact gaps.
                    </p>
                </div>

                <div class="aud-proc-card">
                    <div class="aud-proc-num-wrap">05</div>
                    <h3 class="aud-proc-title">SEO Performance Audit Report</h3>
                    <p class="aud-proc-desc">
                        All findings are synthesized into an exhaustive, easy-to-read executive report highlighting critical errors, severity rankings, and revenue-impacting opportunities.
                    </p>
                </div>

                <div class="aud-proc-card">
                    <div class="aud-proc-num-wrap">06</div>
                    <h3 class="aud-proc-title">Action Plan to Fix Issues</h3>
                    <p class="aud-proc-desc">
                        We formulate a task-oriented implementation plan with clear instructions, code snippets, and priority milestones so fixes are executed smoothly without delays.
                    </p>
                </div>

            </div>

            <div style="text-align: center; margin-top: 36px;">
                <a href="javascript:void(0)" class="aud-btn-primary trigger-enquiry-modal">
                    <span>Get Custom Audit Plan</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
            </div>
        </div>
    </section>

    <!-- ============================================================
         8. ENTERPRISE TOOLS WE USE (Pink Theme)
         ============================================================ */
    -->
    <section class="aud-tools-section">
        <div class="aud-container">
            <div class="aud-section-head">
                <div class="aud-pill">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                    <span>ENTERPRISE TOOLSTACK</span>
                </div>
                <h2 class="aud-section-title">
                    Drive More Leads with a Results-Oriented 
                    <span class="accent">SEO Audit Company in Delhi<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                </h2>
                <p class="aud-section-sub">
                    In Delhi NCR and competitive Indian markets, websites do not fail from lack of effort, but from incomplete diagnostics. We combine advanced enterprise tools with human analytical expertise:
                </p>
            </div>

            <div class="aud-tools-grid">

                <div class="aud-tool-card">
                    <div class="aud-tool-icon">
                        <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                    </div>
                    <div>
                        <h4 class="aud-tool-title">Google Search Console</h4>
                        <p class="aud-tool-desc">Direct insights into Google indexing status, Core Web Vitals, impression trends, click-through rates, and manual security actions.</p>
                    </div>
                </div>

                <div class="aud-tool-card">
                    <div class="aud-tool-icon">
                        <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"/><path d="M22 12A10 10 0 0 0 12 2v10z"/></svg>
                    </div>
                    <div>
                        <h4 class="aud-tool-title">Google Analytics 4</h4>
                        <p class="aud-tool-desc">Auditing visitor journeys, session duration drops, bounce anomalies, and conversion funnel drop-offs to resolve UX bottlenecks.</p>
                    </div>
                </div>

                <div class="aud-tool-card">
                    <div class="aud-tool-icon">
                        <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
                    </div>
                    <div>
                        <h4 class="aud-tool-title">Screaming Frog SEO Spider</h4>
                        <p class="aud-tool-desc">Exhaustive crawler diagnosing broken links, 301 redirect chains, duplicate titles, missing canonical tags, and XML sitemap errors.</p>
                    </div>
                </div>

                <div class="aud-tool-card">
                    <div class="aud-tool-icon">
                        <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                    </div>
                    <div>
                        <h4 class="aud-tool-title">SEMrush Suite</h4>
                        <p class="aud-tool-desc">Comprehensive keyword tracking, competitor visibility benchmarks, search intent gap mapping, and organic market share diagnostics.</p>
                    </div>
                </div>

                <div class="aud-tool-card">
                    <div class="aud-tool-icon">
                        <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 16.1A5 5 0 0 1 5.9 20M2 12.05A9 9 0 0 1 9.95 20M2 8V6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2h-6"/></svg>
                    </div>
                    <div>
                        <h4 class="aud-tool-title">Ubersuggest</h4>
                        <p class="aud-tool-desc">Assisting in content volume analysis, keyword difficulty checks, and localized search volume opportunities across target geographies.</p>
                    </div>
                </div>

                <div class="aud-tool-card">
                    <div class="aud-tool-icon">
                        <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                    </div>
                    <div>
                        <h4 class="aud-tool-title">Ahrefs Webmaster Tools</h4>
                        <p class="aud-tool-desc">In-depth backlink profile inspection, toxic domain evaluation, lost link reclamation, and anchor text over-optimization alerts.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ============================================================
         9. REAL RESULTS WE DELIVER (Pure Pink Theme)
         ============================================================ */
    -->
    <section class="aud-results-section">
        <div class="aud-container">
            <div class="aud-section-head">
                <div class="aud-pill">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                    <span>MEASURABLE OUTCOMES</span>
                </div>
                <h2 class="aud-section-title">
                    Get Clear Insights &amp; Real Results with an 
                    <span class="accent">SEO Performance Audit<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                </h2>
                <p class="aud-section-sub">
                    Guessing your SEO performance is not enough. With our audit services, we don't just identify issues but define outcomes that directly impact your website's growth. Here is what we deliver:
                </p>
            </div>

            <div class="aud-results-grid">

                <!-- Card 1 -->
                <div class="aud-res-card">
                    <div class="aud-res-header">
                        <div class="aud-res-icon">🎯</div>
                        <h3 class="aud-res-title">Improved Keyword Rankings</h3>
                    </div>
                    <p class="aud-res-desc">
                        We analyze current keyword positions, identify intent gaps, and optimize your pages to propel priority commercial queries to top Google positions.
                    </p>
                </div>

                <!-- Card 2 -->
                <div class="aud-res-card">
                    <div class="aud-res-header">
                        <div class="aud-res-icon">⚡</div>
                        <h3 class="aud-res-title">Better Site Performance</h3>
                    </div>
                    <p class="aud-res-desc">
                        Our experts identify speed bottlenecks, layout shifts, and heavy assets to ensure lightning-fast loading across all devices for flawless user experience.
                    </p>
                </div>

                <!-- Card 3 -->
                <div class="aud-res-card">
                    <div class="aud-res-header">
                        <div class="aud-res-icon">📈</div>
                        <h3 class="aud-res-title">Increased Organic Traffic</h3>
                    </div>
                    <p class="aud-res-desc">
                        In-depth observation and error resolution unlock steady streams of high-intent organic visitors genuinely looking for your products and services.
                    </p>
                </div>

                <!-- Card 4 -->
                <div class="aud-res-card">
                    <div class="aud-res-header">
                        <div class="aud-res-icon">💰</div>
                        <h3 class="aud-res-title">Higher Conversion Rates</h3>
                    </div>
                    <p class="aud-res-desc">
                        By evaluating user flows, mobile responsiveness, and call-to-action placement, we eliminate conversion friction so more visitors become paying leads.
                    </p>
                </div>

                <!-- Card 5 -->
                <div class="aud-res-card">
                    <div class="aud-res-header">
                        <div class="aud-res-icon">🛡️</div>
                        <h3 class="aud-res-title">Strong Technical Foundation</h3>
                    </div>
                    <p class="aud-res-desc">
                        Our audit resolves crawl traps, indexing errors, and architectural flaws, ensuring long-term stability and resilience against future algorithm updates.
                    </p>
                </div>

                <!-- Card 6 -->
                <div class="aud-res-card">
                    <div class="aud-res-header">
                        <div class="aud-res-icon">🗺️</div>
                        <h3 class="aud-res-title">Clear SEO Roadmap</h3>
                    </div>
                    <p class="aud-res-desc">
                        You receive a structured, prioritized action plan outlining exact developer steps and high-impact tasks needed to enhance performance effectively.
                    </p>
                </div>

            </div>

            <p style="text-align: center; font-size: 0.94rem; color: #6B7280; margin-bottom: 24px;">
                Through our comprehensive range of audit services, we ensure your SEO foundation is strong and ready for long-term organic dominance.
            </p>

            <div style="text-align: center;">
                <a href="javascript:void(0)" class="aud-btn-primary trigger-enquiry-modal" style="padding: 14px 34px; font-size: 1rem;">
                    <span>Order SEO Audit Report</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
            </div>
        </div>
    </section>

    <!-- ============================================================
         10. END YOUR SEO STRUGGLES & FAQS (Pink Theme)
         ============================================================ */
    -->
    <section class="aud-faq-section" id="faqs">
        <div class="aud-container">
            <div class="aud-faq-grid">
                
                <!-- Left Column -->
                <div>
                    <div class="aud-pill">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                        <span>END UNCERTAINTY</span>
                    </div>

                    <h2 class="aud-faq-left-title">
                        End Your SEO Struggles with Top-Rated 
                        <span class="accent">SEO Audit Services<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                    </h2>

                    <p class="aud-faq-left-text">
                        <strong>WebTecMart Digital</strong> redefines how businesses approach their online growth by eliminating guesswork and bringing complete clarity to their search engine performance. We thoroughly examine every aspect of your website to eliminate hidden technical errors, crawl traps, and performance gaps limiting your revenue.
                    </p>

                    <p class="aud-faq-left-text">
                        Based in Delhi NCR, India, and serving clients worldwide, we ensure your SEO foundation is strictly aligned with the latest Google algorithm guidelines. Our structured audit approach helps you move forward with confidence and an actionable roadmap that turns your website into a high-performing lead generation asset.
                    </p>

                    <p class="aud-faq-left-text" style="font-weight: 700; color: #111827;">
                        Ready to grow your website to the top of search results? Get a comprehensive SEO audit report today.
                    </p>

                    <div style="display: flex; flex-wrap: wrap; gap: 12px; margin-top: 24px;">
                        <a href="tel:+919999674255" class="aud-btn-primary">
                            <span>Call Now: +91-9999674255</span>
                        </a>
                        <a href="javascript:void(0)" class="aud-btn-secondary trigger-enquiry-modal">
                            <span>Request Free Consultation</span>
                        </a>
                    </div>
                </div>

                <!-- Right Column: Accordion -->
                <div>
                    <h3 style="font-size: 1.6rem; font-weight: 800; color: #111827; margin: 0 0 20px;">
                        Frequently Asked <span style="color: #C4007A;">Questions</span>
                    </h3>

                    <div class="aud-faq-item active">
                        <button type="button" class="aud-faq-btn" onclick="toggleAudFaq(this)">
                            <span>Will an SEO audit improve my rankings immediately?</span>
                            <span class="aud-faq-icon">+</span>
                        </button>
                        <div class="aud-faq-content">
                            An SEO audit identifies root issues and provides solutions, but results depend on implementation. Quick technical fixes (like removing accidental noindex directives, repairing broken sitemaps, or fixing critical 404 redirect chains) can show noticeable improvements in 2 to 4 weeks. Deep content, internal linking, and authority updates typically compound into substantial traffic growth over 2 to 6 months.
                        </div>
                    </div>

                    <div class="aud-faq-item">
                        <button type="button" class="aud-faq-btn" onclick="toggleAudFaq(this)">
                            <span>How often should a business get an SEO audit?</span>
                            <span class="aud-faq-icon">+</span>
                        </button>
                        <div class="aud-faq-content">
                            We recommend a comprehensive quarterly audit for e-commerce brands and active content publishers, and at minimum an annual or bi-annual audit for standard corporate websites. Furthermore, conducting an audit before and after any website redesign or CMS platform migration is mandatory to prevent ranking loss.
                        </div>
                    </div>

                    <div class="aud-faq-item">
                        <button type="button" class="aud-faq-btn" onclick="toggleAudFaq(this)">
                            <span>Is an SEO audit suitable for small businesses?</span>
                            <span class="aud-faq-icon">+</span>
                        </button>
                        <div class="aud-faq-content">
                            Yes! In fact, small businesses often gain the highest return on investment from an audit because it identifies high-impact quick wins without requiring huge ad budgets. By fixing localized citation mismatches, on-page keyword gaps, and mobile speed issues, small businesses can effectively outrank larger competitors in local search results.
                        </div>
                    </div>

                    <div class="aud-faq-item">
                        <button type="button" class="aud-faq-btn" onclick="toggleAudFaq(this)">
                            <span>How much does a professional SEO audit cost?</span>
                            <span class="aud-faq-icon">+</span>
                        </button>
                        <div class="aud-faq-content">
                            Pricing depends on your website's size, architecture, and technology stack. We offer straightforward, transparent audit packages for emerging businesses as well as multi-domain enterprise audits. We also provide a free preliminary audit consultation to help you evaluate your website's immediate needs.
                        </div>
                    </div>

                    <div class="aud-faq-item">
                        <button type="button" class="aud-faq-btn" onclick="toggleAudFaq(this)">
                            <span>Is investing in professional SEO audit services worth it?</span>
                            <span class="aud-faq-icon">+</span>
                        </button>
                        <div class="aud-faq-content">
                            Absolutely. Ongoing SEO without an initial audit is like building a house on cracked foundations. An audit uncovers revenue-leaking errors that might be costing your company thousands of dollars in lost customer conversions. Resolving these issues delivers a permanent, compounding lift in organic visibility.
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <!-- ============================================================
         11. LATEST INSIGHTS (Light Pink Thumbs)
         ============================================================ */
    -->
    <section class="aud-insights-section">
        <div class="aud-container">
            <div class="aud-section-head">
                <div class="aud-pill">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                    <span>EXPERT KNOWLEDGE</span>
                </div>
                <h2 class="aud-section-title">
                    Latest <span class="accent">Insights &amp; SEO Guides<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                </h2>
                <p class="aud-section-sub">
                    Stay ahead of algorithm updates and search best practices with actionable guides from our search engineering team:
                </p>
            </div>

            <div class="aud-insights-grid">

                <div class="aud-post-card">
                    <div class="aud-post-thumb">
                        📉
                    </div>
                    <div class="aud-post-body">
                        <div class="aud-post-cat">ALGORITHM DIAGNOSTICS</div>
                        <h3 class="aud-post-title">What Causes Google Search Ranking Fluctuations &amp; How to Fix Them</h3>
                        <p class="aud-post-excerpt">Algorithm updates, competitor content shifts, technical crawl traps, and Core Web Vitals latency can disrupt SERP positions. Here is our step-by-step recovery playbook.</p>
                        <div class="aud-post-meta">
                            <span>By Manoj Sharma</span>
                            <span>Oct 15, 2026</span>
                        </div>
                        <a href="/blog.php" class="aud-post-btn">
                            <span>Read Full Article</span>
                            <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                        </a>
                    </div>
                </div>

                <div class="aud-post-card">
                    <div class="aud-post-thumb">
                        🔍
                    </div>
                    <div class="aud-post-body">
                        <div class="aud-post-cat">TECHNICAL AUDITS</div>
                        <h3 class="aud-post-title">6 Ways to Check How Strong Your Website Is for SEO</h3>
                        <p class="aud-post-excerpt">Learn how to run essential checks on your website's indexation, site speed, internal linking architecture, and schema markup to identify hidden revenue leaks.</p>
                        <div class="aud-post-meta">
                            <span>By Manoj Sharma</span>
                            <span>Sep 25, 2026</span>
                        </div>
                        <a href="/blog.php" class="aud-post-btn">
                            <span>Read Full Article</span>
                            <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                        </a>
                    </div>
                </div>

                <div class="aud-post-card">
                    <div class="aud-post-thumb">
                        💼
                    </div>
                    <div class="aud-post-body">
                        <div class="aud-post-cat">SEO STRATEGY</div>
                        <h3 class="aud-post-title">Monthly SEO Retainer vs One-Time SEO Audit: Which Investment Is Right?</h3>
                        <p class="aud-post-excerpt">Understanding when a targeted one-time diagnostic is sufficient versus when your business requires ongoing algorithmic optimization and digital PR.</p>
                        <div class="aud-post-meta">
                            <span>By Saddam Irshad</span>
                            <span>Sep 21, 2026</span>
                        </div>
                        <a href="/blog.php" class="aud-post-btn">
                            <span>Read Full Article</span>
                            <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ============================================================
         12. VIBRANT PINK HERO CONVERSION CTA BANNER
         (Dark Pink to Hot Pink Gradient - ONLY PINK!)
         ============================================================ */
    -->
    <section class="aud-cta-section">
        <div class="aud-container">
            <div class="aud-cta-inner">
                <div class="aud-pill" style="background: rgba(255, 255, 255, 0.2); border-color: rgba(255, 255, 255, 0.4); color: #FFF;">
                    <span>YOUR NEEDS, OUR PRIORITY</span>
                </div>
                <h2 class="aud-cta-title">
                    Request a Free SEO Audit &amp; Proposal Today
                </h2>
                <p class="aud-cta-desc">
                    Stop guessing why competitors are ranking above you. Get a thorough, unbiased website diagnostic and customized growth strategy from WebTecMart's senior search engineers.
                </p>
                <div class="aud-cta-actions">
                    <a href="javascript:void(0)" class="aud-btn-cta-white trigger-enquiry-modal">
                        <span>Claim Your Free Audit Proposal</span>
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </a>
                    <a href="tel:+919999674255" class="aud-btn-cta-outline">
                        <span>Direct Call: +91-9999674255</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

</div>

<script>
    function toggleAudFaq(btn) {
        const item = btn.closest('.aud-faq-item');
        const isActive = item.classList.contains('active');
        
        // Close other items
        document.querySelectorAll('.aud-faq-item').forEach(el => {
            el.classList.remove('active');
        });

        if (!isActive) {
            item.classList.add('active');
        }
    }
</script>

<?php
renderFooterSection();
?>