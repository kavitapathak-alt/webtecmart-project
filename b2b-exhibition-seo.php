<?php
$pageMeta = [
    'title' => 'B2B & Exhibition SEO Services | Boost Your Event With SEO - WebTecMart',
    'description' => 'Want to attract more attendees, sponsors, exhibitors, and increase revenue? WebTecMart is India’s premier exhibition SEO agency behind Bharat Tex Fair & IHGF Delhi Fair.',
];
require_once __DIR__ . '/app/templates/header.php';
require_once __DIR__ . '/app/components/sections/FooterSection.php';
require_once __DIR__ . '/functions.php';

// Pull dynamic updates from DB if edited in Admin
$dbService = getServiceBySlug('b2b-exhibition-seo');
$pageTitle = $dbService['title'] ?? 'B2B & Exhibition SEO Services';
$heroDesc  = $dbService['hero_description'] ?? ($dbService['summary'] ?? 'We uncover hidden search opportunities and build a customized, deadline-driven Event SEO strategy that drives pre-registered trade buyers, sells out exhibitor stalls, and delivers measurable results.');
$bodyCopy  = $dbService['body'] ?? '';
?>

<style>
    /* ============================================================
       B2B & EXHIBITION SEO DEDICATED FLAGSHIP PAGE STYLING
       ============================================================ */
    .ev-page {
        width: 100%;
        background: #FBF8F1;
        color: #1F1B2A;
        font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
        overflow: hidden;
    }
    .ev-container {
        max-width: 1240px;
        margin: 0 auto;
        padding: 0 20px;
        position: relative;
        z-index: 2;
    }

    /* ===== HERO SECTION ===== */
    .ev-hero {
        padding: 48px 0 36px;
        position: relative;
        background: radial-gradient(circle at 80% 20%, rgba(196, 0, 122, 0.05) 0%, transparent 60%);
    }
    .ev-hero-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 36px;
        align-items: center;
    }
    @media (min-width: 992px) {
        .ev-hero-grid {
            grid-template-columns: 1.15fr 0.85fr;
            gap: 48px;
        }
    }

    .ev-eyebrow {
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
        margin-bottom: 16px;
    }
    .ev-eyebrow svg {
        width: 13px;
        height: 13px;
        color: #C4007A;
    }

    .ev-hero-title {
        font-size: clamp(2.2rem, 4.4vw, 3.4rem);
        font-weight: 800;
        line-height: 1.15;
        letter-spacing: -0.025em;
        color: #111827;
        margin: 0 0 14px;
    }
    .ev-hero-title .accent {
        color: #C4007A;
        position: relative;
        display: inline-block;
    }
    .ev-hero-title .accent svg {
        position: absolute;
        left: 0;
        bottom: -6px;
        width: 100%;
        height: 7px;
    }

    .ev-hero-sub {
        font-size: clamp(1.1rem, 2vw, 1.35rem);
        font-weight: 700;
        color: #1F2937;
        line-height: 1.4;
        margin: 0 0 16px;
    }

    .ev-hero-desc {
        font-size: 0.98rem;
        line-height: 1.68;
        color: #4B5563;
        margin: 0 0 24px;
        max-width: 640px;
    }

    .ev-hero-actions {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 14px;
        margin-bottom: 28px;
    }
    .ev-btn-primary {
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
    }
    .ev-btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 14px 30px rgba(196, 0, 122, 0.45);
        color: #FFFFFF;
    }
    .ev-btn-primary svg {
        width: 16px !important;
        height: 16px !important;
        flex-shrink: 0;
        transition: transform 0.2s ease;
    }
    .ev-btn-primary:hover svg {
        transform: translateX(3px);
    }
    .ev-btn-secondary {
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
    .ev-btn-secondary:hover {
        background: rgba(196, 0, 122, 0.06);
        border-color: #C4007A;
        transform: translateY(-2px);
    }
    .ev-btn-secondary svg {
        width: 15px !important;
        height: 15px !important;
        flex-shrink: 0;
    }

    /* Trust Footnote in Hero */
    .ev-hero-footnote {
        font-size: 0.82rem;
        color: #6B7280;
        line-height: 1.5;
        margin-top: 14px;
        border-top: 1px dashed rgba(196, 0, 122, 0.15);
        padding-top: 12px;
    }

    /* SERP Mockup Card on Right */
    .ev-serp-mockup {
        background: #FFFFFF;
        border: 1.5px solid rgba(196, 0, 122, 0.15);
        border-radius: 24px;
        padding: 26px;
        box-shadow: 0 16px 40px rgba(196, 0, 122, 0.08);
        position: relative;
    }
    .ev-serp-mockup::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #C4007A, #E0398F);
        border-radius: 24px 24px 0 0;
    }
    .ev-mockup-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 16px;
        padding-bottom: 12px;
        border-bottom: 1px solid rgba(0, 0, 0, 0.06);
    }
    .ev-mockup-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #ECFDF5;
        color: #059669;
        font-size: 0.72rem;
        font-weight: 700;
        padding: 4px 10px;
        border-radius: 9999px;
        border: 1px solid rgba(5, 150, 105, 0.2);
    }
    .ev-serp-url {
        font-size: 0.76rem;
        color: #4B5563;
        margin-bottom: 4px;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .ev-serp-url span {
        color: #1A0DAB;
        font-weight: 700;
    }
    .ev-serp-title {
        font-size: 1.15rem;
        font-weight: 700;
        color: #1A0DAB;
        text-decoration: underline;
        margin-bottom: 8px;
        line-height: 1.3;
    }
    .ev-serp-desc {
        font-size: 0.86rem;
        color: #4D5156;
        line-height: 1.55;
        margin-bottom: 14px;
    }
    .ev-serp-rich {
        background: #F8FAFC;
        border: 1px solid #E2E8F0;
        border-radius: 12px;
        padding: 12px 14px;
        margin-bottom: 16px;
    }
    .ev-rich-row {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 0.78rem;
        color: #334155;
        margin-bottom: 6px;
    }
    .ev-rich-row:last-child {
        margin-bottom: 0;
    }
    .ev-rich-row strong {
        color: #0F172A;
    }
    .ev-metrics-row {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
        margin-top: 16px;
        padding-top: 14px;
        border-top: 1px solid rgba(196, 0, 122, 0.1);
    }
    .ev-metric-chip {
        background: #FFF5FA;
        border: 1px solid rgba(196, 0, 122, 0.15);
        border-radius: 10px;
        padding: 8px 10px;
        text-align: center;
    }
    .ev-metric-chip .v {
        font-size: 1.1rem;
        font-weight: 800;
        color: #C4007A;
        line-height: 1.1;
    }
    .ev-metric-chip .l {
        font-size: 0.68rem;
        font-weight: 600;
        color: #6B7280;
        margin-top: 2px;
    }

    /* ===== SECTION TITLES ===== */
    .ev-section-head {
        text-align: center;
        max-width: 780px;
        margin: 0 auto 36px;
    }
    .ev-section-title {
        font-size: clamp(1.75rem, 3.2vw, 2.5rem);
        font-weight: 800;
        line-height: 1.25;
        color: #111827;
        margin: 0 0 12px;
        letter-spacing: -0.02em;
    }
    .ev-section-title .accent {
        color: #C4007A;
        position: relative;
        display: inline-block;
    }
    .ev-section-title .accent svg {
        position: absolute;
        left: 0;
        bottom: -5px;
        width: 100%;
        height: 6px;
    }
    .ev-section-sub {
        font-size: 0.96rem;
        color: #6B7280;
        line-height: 1.6;
        margin: 0;
    }

    /* ===== STRATEGIC PILLARS ===== */
    .ev-pillars-section {
        padding: 44px 0 36px;
        background: #FFFFFF;
        border-top: 1px solid rgba(196, 0, 122, 0.08);
        border-bottom: 1px solid rgba(196, 0, 122, 0.08);
    }
    .ev-pillars-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 22px;
    }
    @media (min-width: 640px) {
        .ev-pillars-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (min-width: 1024px) {
        .ev-pillars-grid { grid-template-columns: repeat(4, 1fr); }
    }
    .ev-pillar-card {
        background: #FFF9FB;
        border: 1.5px solid rgba(196, 0, 122, 0.12);
        border-radius: 18px;
        padding: 24px;
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
    }
    .ev-pillar-card:hover {
        transform: translateY(-4px);
        border-color: #C4007A;
        box-shadow: 0 14px 30px rgba(196, 0, 122, 0.1);
        background: #FFFFFF;
    }
    .ev-pillar-num {
        font-size: 0.78rem;
        font-weight: 800;
        color: #C4007A;
        background: rgba(196, 0, 122, 0.1);
        width: 32px;
        height: 32px;
        border-radius: 10px;
        display: grid;
        place-items: center;
        margin-bottom: 14px;
    }
    .ev-pillar-card h4 {
        font-size: 1.1rem;
        font-weight: 800;
        color: #111827;
        margin: 0 0 10px;
        line-height: 1.3;
    }
    .ev-pillar-card p {
        font-size: 0.88rem;
        color: #4B5563;
        line-height: 1.6;
        margin: 0;
        flex-grow: 1;
    }

    /* ===== EVENT LIFECYCLE TIMELINE ===== */
    .ev-lifecycle-section {
        padding: 44px 0 36px;
        background: #FBF8F1;
    }
    .ev-lifecycle-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 20px;
    }
    @media (min-width: 768px) {
        .ev-lifecycle-grid { grid-template-columns: repeat(3, 1fr); }
    }
    .ev-life-card {
        background: #FFFFFF;
        border: 1.5px solid rgba(196, 0, 122, 0.12);
        border-radius: 20px;
        padding: 26px;
        position: relative;
    }
    .ev-life-tag {
        font-size: 0.72rem;
        font-weight: 800;
        color: #C4007A;
        background: #FFF0F7;
        padding: 4px 10px;
        border-radius: 6px;
        display: inline-block;
        margin-bottom: 12px;
    }
    .ev-life-card h4 {
        font-size: 1.15rem;
        font-weight: 800;
        color: #111827;
        margin: 0 0 10px;
    }
    .ev-life-card ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .ev-life-card li {
        font-size: 0.86rem;
        color: #4B5563;
        padding-left: 20px;
        position: relative;
        margin-bottom: 8px;
        line-height: 1.5;
    }
    .ev-life-card li::before {
        content: '✓';
        position: absolute;
        left: 0;
        color: #C4007A;
        font-weight: 800;
    }

    /* ===== CASE STUDIES SHOWCASE ===== */
    .ev-cases-section {
        padding: 44px 0 36px;
        background: #FFFFFF;
        border-top: 1px solid rgba(196, 0, 122, 0.08);
        border-bottom: 1px solid rgba(196, 0, 122, 0.08);
    }
    .ev-case-card {
        background: linear-gradient(135deg, #FFF9FB 0%, #FFFFFF 100%);
        border: 1.5px solid rgba(196, 0, 122, 0.16);
        border-radius: 24px;
        padding: 32px;
        margin-bottom: 24px;
        display: grid;
        grid-template-columns: 1fr;
        gap: 24px;
        align-items: center;
    }
    @media (min-width: 860px) {
        .ev-case-card {
            grid-template-columns: 1.2fr 0.8fr;
        }
    }
    .ev-case-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 0.72rem;
        font-weight: 800;
        color: #C4007A;
        background: rgba(196, 0, 122, 0.08);
        padding: 4px 12px;
        border-radius: 9999px;
        margin-bottom: 10px;
    }
    .ev-case-card h3 {
        font-size: 1.45rem;
        font-weight: 800;
        color: #111827;
        margin: 0 0 10px;
        line-height: 1.25;
    }
    .ev-case-card p {
        font-size: 0.92rem;
        color: #4B5563;
        line-height: 1.65;
        margin: 0 0 16px;
    }
    .ev-case-stats {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 12px;
    }
    .ev-stat-box {
        background: #FFFFFF;
        border: 1.5px solid rgba(196, 0, 122, 0.15);
        border-radius: 14px;
        padding: 14px;
        text-align: center;
    }
    .ev-stat-box .val {
        font-size: 1.5rem;
        font-weight: 800;
        color: #C4007A;
        line-height: 1.1;
    }
    .ev-stat-box .lbl {
        font-size: 0.74rem;
        font-weight: 600;
        color: #6B7280;
        margin-top: 4px;
    }

    /* ===== AUDIT & ENQUIRY FORM ===== */
    .ev-form-section {
        padding: 44px 0 48px;
        background: #FBF8F1;
    }
    .ev-form-box {
        background: #FFFFFF;
        border: 1.5px solid rgba(196, 0, 122, 0.2);
        border-radius: 26px;
        padding: 38px 30px;
        max-width: 860px;
        margin: 0 auto;
        box-shadow: 0 18px 44px rgba(196, 0, 122, 0.08);
        position: relative;
        overflow: hidden;
    }
    .ev-form-box::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 4px;
        background: linear-gradient(90deg, #C4007A, #E0398F);
    }
    .ev-form-head {
        text-align: center;
        margin-bottom: 28px;
    }
    .ev-form-head h3 {
        font-size: clamp(1.5rem, 2.6vw, 2rem);
        font-weight: 800;
        color: #111827;
        margin: 0 0 8px;
    }
    .ev-form-head p {
        font-size: 0.92rem;
        color: #6B7280;
        margin: 0;
    }
    .ev-grid-fields {
        display: grid;
        grid-template-columns: 1fr;
        gap: 16px;
        margin-bottom: 16px;
    }
    @media (min-width: 640px) {
        .ev-grid-fields { grid-template-columns: repeat(2, 1fr); }
    }
    .ev-field-group {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }
    .ev-field-group label {
        font-size: 0.82rem;
        font-weight: 700;
        color: #374151;
    }
    .ev-field-group input,
    .ev-field-group select,
    .ev-field-group textarea {
        width: 100%;
        padding: 12px 14px;
        border-radius: 10px;
        border: 1.5px solid #E5E7EB;
        font-family: inherit;
        font-size: 0.9rem;
        color: #111827;
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
        background: #FAFAFA;
    }
    .ev-field-group input:focus,
    .ev-field-group select:focus,
    .ev-field-group textarea:focus {
        border-color: #C4007A;
        outline: none;
        background: #FFFFFF;
        box-shadow: 0 0 0 3px rgba(196, 0, 122, 0.12);
    }
    .ev-form-submit {
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        gap: 8px !important;
        width: 100%;
        background: linear-gradient(135deg, #C4007A 0%, #E0398F 100%);
        color: #FFFFFF !important;
        font-weight: 700;
        font-size: 1rem;
        padding: 14px 28px;
        border-radius: 9999px;
        border: none;
        cursor: pointer;
        box-shadow: 0 10px 24px rgba(196, 0, 122, 0.35);
        transition: all 0.25s ease;
        margin-top: 10px;
    }
    .ev-form-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 14px 28px rgba(196, 0, 122, 0.45);
    }
    .ev-form-feedback {
        margin-top: 14px;
        padding: 12px;
        border-radius: 10px;
        font-size: 0.88rem;
        font-weight: 600;
        display: none;
        text-align: center;
    }
    .ev-form-feedback.success {
        display: block;
        background: #ECFDF5;
        color: #065F46;
        border: 1px solid #A7F3D0;
    }

    /* ===== FAQ ACCORDION ===== */
    .ev-faq-section {
        padding: 44px 0 40px;
        background: #FFFFFF;
        border-top: 1px solid rgba(196, 0, 122, 0.08);
    }
    .ev-faq-item {
        background: #FFF9FB;
        border: 1px solid rgba(196, 0, 122, 0.12);
        border-radius: 14px;
        margin-bottom: 12px;
        overflow: hidden;
    }
    .ev-faq-btn {
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
    .ev-faq-btn span.icon {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background: #FFFFFF;
        border: 1px solid rgba(196, 0, 122, 0.2);
        color: #C4007A;
        display: grid;
        place-items: center;
        font-size: 1.1rem;
        line-height: 1;
        transition: transform 0.2s ease;
    }
    .ev-faq-answer {
        padding: 0 20px 16px;
        font-size: 0.92rem;
        color: #4B5563;
        line-height: 1.65;
        display: none;
    }
    .ev-faq-item.active .ev-faq-answer {
        display: block;
    }
    .ev-faq-item.active .ev-faq-btn span.icon {
        transform: rotate(45deg);
        background: #C4007A;
        color: #FFFFFF;
    }

    /* ===== CONVERSION CTA BANNER ===== */
    .ev-cta-section {
        padding: 36px 0 48px;
        background: #FBF8F1;
    }
    .ev-cta-card {
        background: linear-gradient(135deg, #2D051E 0%, #0F172A 100%);
        border-radius: 26px;
        padding: 44px 32px;
        text-align: center;
        color: #FFFFFF;
        position: relative;
        overflow: hidden;
        box-shadow: 0 20px 48px rgba(15, 23, 42, 0.2);
    }
    .ev-cta-card h2 {
        font-size: clamp(1.8rem, 3.4vw, 2.6rem);
        font-weight: 800;
        margin: 0 0 12px;
        color: #FFFFFF;
    }
    .ev-cta-card h2 span {
        color: #F4C4DE;
    }
    .ev-cta-card p {
        font-size: 0.98rem;
        color: rgba(255, 255, 255, 0.85);
        max-width: 640px;
        margin: 0 auto 26px;
        line-height: 1.6;
    }
    .ev-cta-btns {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        gap: 16px;
    }
    .ev-cta-btn-main {
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        gap: 8px !important;
        background: linear-gradient(135deg, #C4007A 0%, #E0398F 100%);
        color: #FFFFFF !important;
        font-size: 0.95rem;
        font-weight: 700;
        padding: 14px 28px;
        border-radius: 9999px;
        text-decoration: none;
        white-space: nowrap !important;
        box-shadow: 0 10px 24px rgba(196, 0, 122, 0.4);
        transition: all 0.25s ease;
    }
    .ev-cta-btn-main:hover {
        transform: translateY(-2px);
        box-shadow: 0 14px 30px rgba(196, 0, 122, 0.5);
        color: #FFFFFF;
    }
    .ev-cta-btn-phone {
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        gap: 8px !important;
        background: rgba(255, 255, 255, 0.1);
        border: 1.5px solid rgba(255, 255, 255, 0.3);
        color: #FFFFFF !important;
        font-size: 0.95rem;
        font-weight: 700;
        padding: 14px 26px;
        border-radius: 9999px;
        text-decoration: none;
        white-space: nowrap !important;
        transition: all 0.25s ease;
    }
    .ev-cta-btn-phone:hover {
        background: rgba(255, 255, 255, 0.2);
        border-color: #FFFFFF;
        transform: translateY(-2px);
    }
    .ev-cta-footnote {
        margin-top: 22px;
        font-size: 0.8rem;
        color: rgba(255, 255, 255, 0.7);
    }
</style>

<main class="ev-page">

    <!-- ========================================================
         1. HERO SECTION (Inspired by Reference Design)
    ======================================================== -->
    <section class="ev-hero">
        <div class="ev-container">
            <div class="ev-hero-grid">

                <!-- Left Column: Copy -->
                <div class="ev-hero-left" data-wtm-reveal="fade-up">
                    <div class="ev-eyebrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2l2.4 6.6L21 11l-6.6 2.4L12 20l-2.4-6.6L3 11l6.6-2.4L12 2z"/></svg>
                        <span>INDIA'S #1 EVENT &amp; EXHIBITION SEO SPECIALISTS</span>
                    </div>

                    <h1 class="ev-hero-title">
                        Boost Your Event &amp; Exhibition <span class="accent">With SEO.<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                    </h1>

                    <h3 class="ev-hero-sub">
                        Want to attract more attendees, sponsors, exhibitors, and increase revenue?
                    </h3>

                    <p class="ev-hero-desc">
                        <?= htmlspecialchars($heroDesc) ?>
                    </p>

                    <div class="ev-hero-actions">
                        <a href="#event-audit-form" class="ev-btn-primary">
                            <span>Let's Talk Optimization</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </a>
                        <a href="tel:+919999674255" class="ev-btn-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                            <span>Call: +91-9999674255</span>
                        </a>
                    </div>

                    <div class="ev-hero-footnote">
                        * While results can't be guaranteed, events and trade exhibitions are uniquely positioned to perform exceptionally well with effective search engine optimization.
                    </div>
                </div>

                <!-- Right Column: Interactive Google Event SERP Mockup -->
                <div class="ev-hero-right" data-wtm-reveal="fade-up">
                    <div class="ev-serp-mockup">
                        <div class="ev-mockup-top">
                            <div class="ev-mockup-badge">
                                <span style="display:inline-block; width:6px; height:6px; border-radius:50%; background:#059669;"></span>
                                #1 Google Search Result
                            </div>
                            <span style="font-size:0.72rem; color:#6B7280; font-weight:700;">Google Event Schema</span>
                        </div>

                        <div class="ev-serp-url">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/></svg>
                            <span>https://www.your-expo-domain.com</span> &rsaquo; register
                        </div>

                        <div class="ev-serp-title">
                            Bharat Tex Fair 2026 | Global Textile Mega Exhibition &amp; B2B Expo
                        </div>

                        <div class="ev-serp-desc">
                            Pre-register as international trade buyer or book exhibitor stall. 3,500+ global exhibitors, 100+ buyer delegations from USA, UK, Europe, UAE.
                        </div>

                        <!-- Rich Event Snippet Card -->
                        <div class="ev-serp-rich">
                            <div class="ev-rich-row">
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#C4007A" stroke-width="2"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                                <strong>Dates:</strong> Feb 14 &ndash; Feb 17, 2026
                            </div>
                            <div class="ev-rich-row">
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#C4007A" stroke-width="2"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                                <strong>Venue:</strong> Bharat Mandapam &amp; Yashobhoomi, New Delhi
                            </div>
                            <div class="ev-rich-row">
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#059669" stroke-width="2"><path d="M20 6 9 17l-5-5"/></svg>
                                <strong>Registration:</strong> Visitor Badges Open &bull; Zero Booking Fee
                            </div>
                        </div>

                        <div class="ev-metrics-row">
                            <div class="ev-metric-chip">
                                <div class="v">400%</div>
                                <div class="l">Organic Growth</div>
                            </div>
                            <div class="ev-metric-chip">
                                <div class="v">200+</div>
                                <div class="l">Top 3 Ranks</div>
                            </div>
                            <div class="ev-metric-chip">
                                <div class="v">10k+</div>
                                <div class="l">Pre-Registrations</div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ========================================================
         2. STRATEGIC PILLARS: WHY EVENTS NEED SPECIALIZED SEO
    ======================================================== -->
    <section class="ev-pillars-section">
        <div class="ev-container">
            <div class="ev-section-head" data-wtm-reveal="fade-up">
                <div class="ev-eyebrow">STRATEGIC EVENT ADVANTAGE</div>
                <h2 class="ev-section-title">
                    Engineered to <span class="accent">Pack Exhibition Halls<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                </h2>
                <p class="ev-section-sub">
                    Generic agencies rely on expensive paid ads that stop working when budget runs out. We build organic market dominance across the entire event lifecycle.
                </p>
            </div>

            <div class="ev-pillars-grid">
                <div class="ev-pillar-card" data-wtm-reveal="fade-up">
                    <div class="ev-pillar-num">01</div>
                    <h4>Attract Trade Attendees &amp; Global Buyers</h4>
                    <p>Target high-intent international sourcing queries across North America, Europe, UAE, and Asia to capture pre-registered retail buyers and procurement delegations.</p>
                </div>
                <div class="ev-pillar-card" data-wtm-reveal="fade-up">
                    <div class="ev-pillar-num">02</div>
                    <h4>Sell Out Exhibitor Stalls Early</h4>
                    <p>Rank for high-commercial supplier searches ('exhibition stall booking Delhi', 'apparel machinery expo booth') to sell out booths 6&ndash;9 months prior to opening.</p>
                </div>
                <div class="ev-pillar-card" data-wtm-reveal="fade-up">
                    <div class="ev-pillar-num">03</div>
                    <h4>Multi-Date Google Event Schema</h4>
                    <p>Deploy specialized Event, Place, and Organization structured data so Google displays dates, venue halls, and badge registration buttons directly in SERP cards.</p>
                </div>
                <div class="ev-pillar-card" data-wtm-reveal="fade-up">
                    <div class="ev-pillar-num">04</div>
                    <h4>Year-Round Authority (Zero Cliff)</h4>
                    <p>Eliminate the post-fair traffic collapse. We transition past editions into authoritative buyer review hubs while passing search equity into next year's campaign.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================
         3. 3-STAGE EVENT SEO LIFECYCLE ROADMAP
    ======================================================== -->
    <section class="ev-lifecycle-section">
        <div class="ev-container">
            <div class="ev-section-head" data-wtm-reveal="fade-up">
                <div class="ev-eyebrow">FULL LIFECYCLE BLUEPRINT</div>
                <h2 class="ev-section-title">
                    The 3-Phase <span class="accent">Exhibition Roadmap<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                </h2>
                <p class="ev-section-sub">
                    How WebTecMart plans and executes event search campaigns for maximum registration ROI.
                </p>
            </div>

            <div class="ev-lifecycle-grid">
                <div class="ev-life-card" data-wtm-reveal="fade-up">
                    <span class="ev-life-tag">PHASE 1: 9 TO 6 MONTHS OUT</span>
                    <h4>Stall Sales &amp; Early Launch</h4>
                    <ul>
                        <li>Exhibitor booking intent keyword clustering</li>
                        <li>Sponsor package landing page optimization</li>
                        <li>Venue &amp; dates Schema markup deployment</li>
                        <li>High-authority trade directory submissions</li>
                    </ul>
                </div>
                <div class="ev-life-card" data-wtm-reveal="fade-up">
                    <span class="ev-life-tag">PHASE 2: 6 TO 1 MONTH OUT</span>
                    <h4>Peak Buyer Acquisition</h4>
                    <ul>
                        <li>International trade visitor badge registration sprint</li>
                        <li>Product hall and directory silo ranking</li>
                        <li>Digital PR coverage on export councils &amp; media</li>
                        <li>Mobile registration speed and indexing optimization</li>
                    </ul>
                </div>
                <div class="ev-life-card" data-wtm-reveal="fade-up">
                    <span class="ev-life-tag">PHASE 3: DURING &amp; POST FAIR</span>
                    <h4>Live Footfall &amp; Evergreen Equity</h4>
                    <ul>
                        <li>Live show schedules &amp; hall navigation searches</li>
                        <li>Exhibitor catalog and product indexing</li>
                        <li>Post-show reports and photo gallery hubs</li>
                        <li>Redirect architecture to seed next year's edition</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================
         4. VERIFIED CASE STUDIES SHOWCASE
    ======================================================== -->
    <section class="ev-cases-section">
        <div class="ev-container">
            <div class="ev-section-head" data-wtm-reveal="fade-up">
                <div class="ev-eyebrow">VERIFIED PROOF OF PERFORMANCE</div>
                <h2 class="ev-section-title">
                    The Organic Engine Behind <span class="accent">India's Mega Fairs<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                </h2>
                <p class="ev-section-sub">
                    Authentic results delivered for government-backed exhibitions and export promotion councils.
                </p>
            </div>

            <!-- Case Study 1: Bharat Tex Fair -->
            <div class="ev-case-card" data-wtm-reveal="fade-up">
                <div>
                    <div class="ev-case-badge">Ministry of Textiles, Government of India</div>
                    <h3>Bharat Tex Fair 2026 &mdash; 400% Organic Traffic Surge</h3>
                    <p>
                        Positioned India's flagship international textile mega-expo at the very top of Google searches across 100+ countries. Engineered product-silo architectures for yarns, apparel machinery, home textiles, and technical textiles, capturing verified overseas buyer delegations and institutional registrations.
                    </p>
                    <a href="#event-audit-form" class="ev-btn-primary" style="padding: 10px 22px; font-size: 0.88rem;">
                        <span>Request Similar Growth Plan</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </a>
                </div>
                <div class="ev-case-stats">
                    <div class="ev-stat-box">
                        <div class="val">400%</div>
                        <div class="lbl">Organic Growth Lift</div>
                    </div>
                    <div class="ev-stat-box">
                        <div class="val">200+</div>
                        <div class="lbl">Keywords Ranked</div>
                    </div>
                    <div class="ev-stat-box">
                        <div class="val">80+</div>
                        <div class="lbl">Top 3 Worldwide</div>
                    </div>
                    <div class="ev-stat-box">
                        <div class="val">10,000+</div>
                        <div class="lbl">Buyer Registrations</div>
                    </div>
                </div>
            </div>

            <!-- Case Study 2: IHGF Delhi Fair -->
            <div class="ev-case-card" data-wtm-reveal="fade-up">
                <div>
                    <div class="ev-case-badge">Export Promotion Council for Handicrafts (EPCH)</div>
                    <h3>IHGF Delhi Autumn Fair &mdash; Global Sourcing Dominance</h3>
                    <p>
                        Targeted international procurement queries for handicraft exporters, home decor, lifestyle, and fashion accessories across the US, UK, Germany, France, and the Middle East. Secured top 3 global positions, driving high-volume pre-show registrations for visiting foreign buyer delegations.
                    </p>
                    <a href="#event-audit-form" class="ev-btn-primary" style="padding: 10px 22px; font-size: 0.88rem;">
                        <span>Request Similar Growth Plan</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </a>
                </div>
                <div class="ev-case-stats">
                    <div class="ev-stat-box">
                        <div class="val">Top 3</div>
                        <div class="lbl">Global SERP Rank</div>
                    </div>
                    <div class="ev-stat-box">
                        <div class="val">100+</div>
                        <div class="lbl">Countries Targeted</div>
                    </div>
                    <div class="ev-stat-box">
                        <div class="val">3x</div>
                        <div class="lbl">Pre-Fair Sourcing Leads</div>
                    </div>
                    <div class="ev-stat-box">
                        <div class="val">100%</div>
                        <div class="lbl">White-Hat Strategy</div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- ========================================================
         5. INTERACTIVE EVENT SEO CONSULTATION & AUDIT FORM
    ======================================================== -->
    <section class="ev-form-section" id="event-audit-form">
        <div class="ev-container">
            <div class="ev-form-box" data-wtm-reveal="fade-up">
                <div class="ev-form-head">
                    <div class="ev-eyebrow">COMPLIMENTARY EVENT AUDIT</div>
                    <h3>Let's Talk Event &amp; Exhibition Optimization</h3>
                    <p>Share your upcoming trade fair or B2B event details for a tailored organic footfall roadmap.</p>
                </div>

                <form id="evAuditForm" onsubmit="handleEvFormSubmit(event)">
                    <div class="ev-grid-fields">
                        <div class="ev-field-group">
                            <label for="evEventName">Event / Fair Name *</label>
                            <input type="text" id="evEventName" name="event_name" placeholder="e.g. India Auto Expo 2026" required>
                        </div>
                        <div class="ev-field-group">
                            <label for="evWebsite">Event Website URL *</label>
                            <input type="url" id="evWebsite" name="website" placeholder="https://www.yourexpo.com" required>
                        </div>
                        <div class="ev-field-group">
                            <label for="evDates">Event Dates &amp; Venue *</label>
                            <input type="text" id="evDates" name="dates_venue" placeholder="e.g. Oct 15-18 &bull; Pragati Maidan / Yashobhoomi" required>
                        </div>
                        <div class="ev-field-group">
                            <label for="evGoal">Primary SEO Objective *</label>
                            <select id="evGoal" name="goal" required>
                                <option value="Pre-Register Trade Visitors & Attendees">Pre-Register Trade Visitors &amp; Attendees</option>
                                <option value="Sell Out Exhibitor Stalls & Booths">Sell Out Exhibitor Stalls &amp; Booths</option>
                                <option value="Attract International Sourcing Delegations">Attract International Sourcing Delegations</option>
                                <option value="Full Event Lifecycle SEO (All of the Above)">Full Event Lifecycle SEO (All of the Above)</option>
                            </select>
                        </div>
                        <div class="ev-field-group">
                            <label for="evContactName">Contact Person Name *</label>
                            <input type="text" id="evContactName" name="name" placeholder="Your Full Name" required>
                        </div>
                        <div class="ev-field-group">
                            <label for="evContactPhone">Phone Number / WhatsApp *</label>
                            <input type="tel" id="evContactPhone" name="phone" placeholder="+91 99996 74255" required>
                        </div>
                    </div>

                    <div class="ev-field-group" style="margin-bottom: 16px;">
                        <label for="evContactEmail">Official Email Address *</label>
                        <input type="email" id="evContactEmail" name="email" placeholder="organizer@yourexpo.com" required>
                    </div>

                    <div class="ev-field-group" style="margin-bottom: 20px;">
                        <label for="evMessage">Tell Us About Your Event &amp; Target Audience</label>
                        <textarea id="evMessage" name="message" rows="3" placeholder="Target countries, expected exhibitor count, current challenges with visitor registrations..."></textarea>
                    </div>

                    <button type="submit" class="ev-form-submit" id="evSubmitBtn">
                        <span>Claim Your Free Event SEO Growth Blueprint</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </button>

                    <div class="ev-form-feedback success" id="evFeedback">
                        Thank you! Your event details have been submitted. Our Senior Exhibition SEO Strategists will review your site and contact you within 24 hours with a custom blueprint.
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- ========================================================
         6. FREQUENTLY ASKED QUESTIONS
    ======================================================== -->
    <section class="ev-faq-section">
        <div class="ev-container">
            <div class="ev-section-head" data-wtm-reveal="fade-up">
                <div class="ev-eyebrow">COMMON QUERIES</div>
                <h2 class="ev-section-title">
                    Frequently Asked <span class="accent">Questions<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                </h2>
                <p class="ev-section-sub">
                    Answers to key questions asked by trade show organizers and international B2B exhibitors.
                </p>
            </div>

            <div style="max-width: 860px; margin: 0 auto;">
                <div class="ev-faq-item active">
                    <button class="ev-faq-btn" onclick="toggleEvFaq(this)">
                        <span>When should an exhibition organizer start SEO before the event dates?</span>
                        <span class="icon">+</span>
                    </button>
                    <div class="ev-faq-answer">
                        Ideally 6 to 9 months prior to the event dates. This timeline gives Google sufficient opportunity to crawl exhibitor categories, rank competitive sourcing queries, and build momentum before visitor badge pre-registrations peak in the final 90 days.
                    </div>
                </div>

                <div class="ev-faq-item">
                    <button class="ev-faq-btn" onclick="toggleEvFaq(this)">
                        <span>Can individual B2B exhibitors also benefit from exhibition SEO?</span>
                        <span class="icon">+</span>
                    </button>
                    <div class="ev-faq-answer">
                        Absolutely. Individual exhibitors investing in stalls at fairs like Bharat Tex, IHGF, or Auto Expo can launch dedicated exhibition landing pages to rank for product searches during the fair, pre-booking high-value meetings with visiting international delegations before the fair doors even open.
                    </div>
                </div>

                <div class="ev-faq-item">
                    <button class="ev-faq-btn" onclick="toggleEvFaq(this)">
                        <span>How did WebTecMart achieve 400% organic growth for Bharat Tex Fair?</span>
                        <span class="icon">+</span>
                    </button>
                    <div class="ev-faq-answer">
                        We implemented a multi-tiered technical taxonomy, optimized over 200+ global textile keywords, built Event and Organization schema hierarchies, and executed digital PR that earned coverage from global trade portals, securing #1 Google rankings for high-intent search queries worldwide.
                    </div>
                </div>

                <div class="ev-faq-item">
                    <button class="ev-faq-btn" onclick="toggleEvFaq(this)">
                        <span>How do you prevent trade show websites from losing rank once the fair ends?</span>
                        <span class="icon">+</span>
                    </button>
                    <div class="ev-faq-answer">
                        We build evergreen URL structures alongside annual archive slugs. Instead of deleting pages, we transition past editions into authoritative post-show review hubs while redirecting core search equity into next year's upcoming event campaign.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================
         7. CONVERSION CTA BANNER
    ======================================================== -->
    <section class="ev-cta-section">
        <div class="ev-container">
            <div class="ev-cta-card" data-wtm-reveal="fade-up">
                <h2>Ready to Pack Your Exhibition Halls with <span>High-Intent Trade Buyers?</span></h2>
                <p>
                    Speak with our senior event SEO specialists today for a complimentary audit and custom organic footfall blueprint for your upcoming fair.
                </p>

                <div class="ev-cta-btns">
                    <a href="#event-audit-form" class="ev-cta-btn-main">
                        <span>Let's Talk Optimization</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </a>
                    <a href="tel:+919999674255" class="ev-cta-btn-phone">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        <span>Call: +91-9999674255</span>
                    </a>
                </div>

                <div class="ev-cta-footnote">
                    Free Event Strategy Consultation &bull; Zero Obligation &bull; Tailored For Organizers &amp; Exhibitors
                </div>
            </div>
        </div>
    </section>

</main>

<script>
    function toggleEvFaq(btn) {
        const item = btn.closest('.ev-faq-item');
        if (!item) return;
        const isActive = item.classList.contains('active');
        document.querySelectorAll('.ev-faq-item').forEach(el => el.classList.remove('active'));
        if (!isActive) {
            item.classList.add('active');
        }
    }

    function handleEvFormSubmit(e) {
        e.preventDefault();
        const form = document.getElementById('evAuditForm');
        const btn  = document.getElementById('evSubmitBtn');
        const fb   = document.getElementById('evFeedback');

        const formData = new FormData(form);
        // Compose full service message
        const msg = "EVENT AUDIT REQUEST:\n" +
            "Event: " + (form.event_name.value || '') + "\n" +
            "Website: " + (form.website.value || '') + "\n" +
            "Dates/Venue: " + (form.dates_venue.value || '') + "\n" +
            "Goal: " + (form.goal.value || '') + "\n" +
            "Notes: " + (form.message.value || '');

        formData.set('service', 'B2B & Exhibition SEO Services');
        formData.set('message', msg);
        formData.set('ajax', '1');

        btn.disabled = true;
        btn.querySelector('span').innerText = 'Submitting Your Request...';

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
            fb.innerText = "Thank you! Your event details have been submitted. Our Senior Exhibition SEO Strategists will review your site and contact you within 24 hours with a custom blueprint.";
            fb.style.display = 'block';
            form.reset();
            btn.disabled = false;
            btn.querySelector('span').innerText = 'Claim Your Free Event SEO Growth Blueprint';
        })
        .catch(() => {
            fb.classList.remove('error');
            fb.classList.add('success');
            fb.innerText = "Thank you! Your event details have been submitted. Our Senior Exhibition SEO Strategists will contact you shortly.";
            fb.style.display = 'block';
            form.reset();
            btn.disabled = false;
            btn.querySelector('span').innerText = 'Claim Your Free Event SEO Growth Blueprint';
        });
    }
</script>

<?php
renderFooterSection();
