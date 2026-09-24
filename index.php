<?php
require_once __DIR__ . '/app/templates/header.php';
require_once __DIR__ . '/app/components/sections/HeroSection.php';
require_once __DIR__ . '/app/components/sections/TrustedPartnersSection.php';
require_once __DIR__ . '/app/components/sections/AboutBrandSection.php';
require_once __DIR__ . '/app/components/sections/WhatWeDoSection.php';
require_once __DIR__ . '/app/components/sections/SearchVisibilitySection.php';
require_once __DIR__ . '/app/components/sections/SeoSuccessStoriesSection.php';
require_once __DIR__ . '/app/components/sections/TestimonialsSection.php';
require_once __DIR__ . '/app/components/sections/ContactFormSection.php';
require_once __DIR__ . '/app/components/sections/FooterSection.php';
?>

<style>
    body {
        background: #f6efe8;
        color: #1f1b2a;
    }

    .container {
        max-width: 1240px;
    }

    .hero {
        background: #f6efe9;
        padding: 48px 0 72px;
    }

    .hero-grid {
        display: grid;
        grid-template-columns: 1.05fr 0.95fr;
        gap: 38px;
        align-items: center;
    }

    .hero-copy h1 {
        font-size: clamp(3rem, 5vw, 5rem);
        line-height: 0.94;
        letter-spacing: -0.065em;
        font-weight: 800;
        margin: 0;
    }

    .hero-copy h1 span {
        color: #ec2c7a;
    }

    .mini-label {
        display: inline-flex;
        padding: 10px 18px;
        border-radius: 999px;
        background: rgba(255,255,255,0.7);
        border: 1px solid rgba(236, 44, 122, 0.18);
        color: #c51c63;
        font-size: 0.72rem;
        letter-spacing: 0.12em;
        font-weight: 700;
        margin-bottom: 24px;
    }

    .lead {
        font-size: 1.06rem;
        color: #3c3847;
        margin: 22px 0 0;
        line-height: 1.75;
    }

    .sub-copy {
        color: #474355;
        margin-top: 18px;
    }

    .feature-list {
        list-style: none;
        padding: 0;
        margin: 24px 0 0;
        display: grid;
        gap: 14px;
        font-weight: 500;
    }

    .feature-list li {
        position: relative;
        padding-left: 28px;
    }

    .feature-list li::before {
        content: '✓';
        position: absolute;
        left: 0;
        top: 0;
        color: #ec2c7a;
        font-weight: 800;
    }

    .hero-form-wrap {
        position: relative;
    }

    .hero-form-wrap::before,
    .hero-form-wrap::after {
        content: "";
        position: absolute;
        border: 1px solid rgba(236, 44, 122, 0.35);
        border-radius: 30px;
        z-index: 0;
    }

    .hero-form-wrap::before {
        width: 160px;
        height: 160px;
        right: -20px;
        top: -18px;
        transform: rotate(18deg);
    }

    .hero-form-wrap::after {
        width: 140px;
        height: 140px;
        left: -25px;
        bottom: -30px;
        transform: rotate(35deg);
    }

    .lead-card {
        position: relative;
        z-index: 1;
        background: rgba(255, 238, 246, 0.92);
        border: 1px solid rgba(236, 44, 122, 0.22);
        border-radius: 26px;
        padding: 28px 28px 22px;
        box-shadow: 0 24px 60px rgba(27, 17, 30, 0.08);
    }

    .lead-card h2 {
        margin: 0 0 8px;
        font-size: 2.15rem;
        line-height: 1.2;
    }

    .lead-card p {
        margin: 0 0 22px;
        color: #5d5868;
    }

    .lead-form {
        display: grid;
        gap: 16px;
    }

    .two-col {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 12px;
    }

    .lead-form input,
    .lead-form textarea {
        width: 100%;
        border: 1px solid rgba(209, 24, 105, 0.18);
        border-radius: 14px;
        padding: 14px 16px;
        background: rgba(255,255,255,0.4);
        color: #1f1b2a;
    }

    .check-row {
        display: flex;
        align-items: center;
        gap: 10px;
        color: #5d5868;
        font-size: 0.82rem;
    }

    .check-row input {
        width: auto;
        accent-color: #ec2c7a;
    }

    .wide-btn {
        width: 100%;
        border-radius: 14px;
        height: 56px;
        font-size: 1rem;
    }

    .callout {
        text-align: center;
        margin-top: 14px;
        color: #5d5868;
        font-size: 0.9rem;
    }

    .partners-section,
    .about-brand-section,
    .search-visibility-section,
    .seo-success-section,
    .testimonials-section,
    .contact-form-section {
        position: relative;
    }

    .partners-section {
        background: rgba(255, 255, 255, 0.18);
        padding: 78px 0 34px;
    }

    .partners-wrap,
    .about-brand-wrap,
    .search-visibility-wrap,
    .seo-success-wrap,
    .testimonials-wrap,
    .contact-form-wrap {
        text-align: center;
    }

    .partners-badge,
    .section-pill {
        display: inline-flex;
        background: rgba(236, 44, 122, 0.12);
        color: #c51c63;
        border-radius: 999px;
        padding: 10px 20px;
        font-size: 0.74rem;
        letter-spacing: 0.12em;
        font-weight: 700;
        margin-bottom: 18px;
    }

    .partners-wrap h2,
    .about-brand-wrap h2,
    .search-visibility-wrap h2,
    .seo-success-wrap h2,
    .testimonials-wrap h2,
    .contact-form-wrap h2 {
        margin: 0;
        font-size: clamp(2.5rem, 4vw, 4rem);
        line-height: 1.08;
        letter-spacing: -0.06em;
    }

    .partners-wrap p,
    .about-subtitle,
    .search-visibility-wrap p,
    .seo-success-wrap > p,
    .testimonials-wrap p,
    .contact-form-wrap > p {
        margin: 14px auto 26px;
        color: #5d5868;
        font-size: 1.03rem;
        max-width: 760px;
    }

    .partners-grid {
        display: grid;
        grid-template-columns: repeat(5, minmax(0, 1fr));
        gap: 28px;
        align-items: center;
    }

    .partner-card {
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255,255,255,0.5);
        border: 1px solid rgba(236, 44, 122, 0.15);
        border-radius: 22px;
        min-height: 170px;
        padding: 22px;
    }

    .partner-card img {
        max-width: 100%;
        max-height: 90px;
        object-fit: contain;
    }

    .logo-fallback {
        width: 120px;
        height: 90px;
        display: grid;
        place-items: center;
        border-radius: 18px;
        font-size: 3.2rem;
        font-weight: 800;
        color: #fff;
    }

    .partners-dots,
    .testimonials-dots {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        margin-top: 22px;
    }

    .dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: rgba(236, 44, 122, 0.3);
    }

    .dot.active {
        width: 26px;
        border-radius: 999px;
        background: #ec2c7a;
    }

    .about-brand-section {
        background: rgba(255, 255, 255, 0.08);
        padding: 60px 0 30px;
    }

    .about-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 38px;
        align-items: center;
        text-align: left;
    }

    .image-frame {
        position: relative;
        background: linear-gradient(135deg, rgba(63, 38, 54, 0.92), rgba(194, 59, 118, 0.72));
        border-radius: 24px;
        min-height: 420px;
        overflow: hidden;
    }

    .brand-badge {
        position: absolute;
        left: 18px;
        bottom: 18px;
        z-index: 1;
        background: rgba(255,255,255,0.9);
        border-radius: 999px;
        padding: 8px 14px;
        color: #1f1b2a;
        font-weight: 700;
    }

    .search-visibility-section {
        background: #f6efe8;
        padding: 42px 0 32px;
    }

    .search-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 26px;
    }

    .search-card {
        background: rgba(255,255,255,0.45);
        border: 1px solid rgba(236, 44, 122, 0.12);
        border-radius: 18px;
        padding: 22px 22px 18px;
        text-align: left;
        min-height: 290px;
        position: relative;
    }

    .card-number {
        position: absolute;
        top: 10px;
        right: 16px;
        font-size: 0.72rem;
        color: rgba(32, 27, 46, 0.38);
        font-weight: 700;
    }

    .icon-box {
        width: 62px;
        height: 62px;
        border-radius: 14px;
        display: grid;
        place-items: center;
        font-size: 1.8rem;
        background: linear-gradient(135deg, #ec2c7a, #d41266);
        color: #fff;
        margin-bottom: 18px;
    }

    .search-card h3 {
        margin: 0 0 10px;
        font-size: 2rem;
        line-height: 1.2;
        letter-spacing: -0.05em;
    }

    .search-card p {
        margin: 0;
        color: #1f1b2a;
        line-height: 1.7;
        text-align: left;
    }

    .learn-more {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-top: 18px;
        color: #ec2c7a;
        font-weight: 700;
    }

    .center-cta {
        margin-top: 28px;
    }

    .seo-success-section {
        padding: 54px 0 48px;
    }

    .story-showcase {
        display: grid;
        grid-template-columns: 1.08fr 1fr;
        gap: 30px;
        align-items: center;
        padding: 26px 18px;
        border-radius: 30px;
        background: rgba(255,255,255,0.18);
        border: 1px solid rgba(236, 44, 122, 0.14);
    }

    .story-visual {
        background: linear-gradient(135deg, rgba(255,255,255,0.8), rgba(255,255,255,0.35));
        border-radius: 24px;
        padding: 18px;
    }

    .mini-badges {
        display: flex;
        gap: 8px;
        margin-bottom: 14px;
    }

    .badge-dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: rgba(236, 44, 122, 0.65);
    }

    .visual-card {
        background: rgba(255,255,255,0.4);
        border-radius: 18px;
        padding: 18px;
        border: 1px solid rgba(236, 44, 122, 0.12);
    }

    .visual-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        font-size: 0.8rem;
        color: #5d5868;
        margin-bottom: 14px;
    }

    .chip {
        background: rgba(236, 44, 122, 0.12);
        color: #ec2c7a;
        border-radius: 999px;
        padding: 6px 10px;
        font-weight: 700;
    }

    .poster {
        background: linear-gradient(135deg, #f7d5d5, #f5cbd7, #f2d7c9);
        border-radius: 18px;
        min-height: 250px;
        padding: 16px 18px 18px;
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .poster-badge {
        align-self: flex-start;
        background: rgba(255,255,255,0.7);
        border-radius: 10px;
        padding: 6px 12px;
        font-size: 0.76rem;
        font-weight: 700;
    }

    .poster-title {
        font-size: clamp(1.5rem, 2vw, 2.2rem);
        line-height: 1.05;
        letter-spacing: -0.06em;
        font-weight: 800;
        text-transform: uppercase;
        color: #2c1b20;
    }

    .visual-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        margin-top: 14px;
        text-align: left;
    }

    .mini-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: #ec2c7a;
        color: #fff;
        padding: 10px 14px;
        border-radius: 999px;
        font-size: 0.78rem;
        font-weight: 700;
    }

    .story-copy {
        text-align: left;
    }

    .story-header-row {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-bottom: 16px;
    }

    .story-badge {
        display: inline-flex;
        padding: 7px 12px;
        border-radius: 999px;
        background: rgba(236, 44, 122, 0.14);
        color: #ec2c7a;
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 0.06em;
        text-transform: uppercase;
    }

    .story-copy h3 {
        margin: 0;
        font-size: clamp(2rem, 2.4vw, 2.8rem);
        line-height: 1.15;
        letter-spacing: -0.05em;
    }

    .story-copy > p {
        margin: 18px 0 24px;
        color: #1f1b2a;
        line-height: 1.75;
    }

    .metrics-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 14px;
        margin-bottom: 22px;
    }

    .metric-box {
        background: rgba(255,255,255,0.4);
        border: 1px solid rgba(236, 44, 122, 0.08);
        border-radius: 18px;
        padding: 18px 12px;
        text-align: center;
    }

    .metric-box strong {
        display: block;
        font-size: clamp(1.8rem, 2vw, 2.2rem);
        color: #ec2c7a;
        letter-spacing: -0.05em;
    }

    .metric-box span {
        display: block;
        margin-top: 8px;
        font-size: 0.75rem;
        color: #5d5868;
    }

    .keyword-label {
        display: inline-block;
        margin-bottom: 12px;
        font-size: 0.76rem;
        font-weight: 800;
        letter-spacing: 0.08em;
    }

    .keyword-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .keyword-tag {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: rgba(236, 44, 122, 0.12);
        color: #ec2c7a;
        border-radius: 999px;
        padding: 8px 12px;
        font-size: 0.76rem;
        font-weight: 700;
    }

    .view-case {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #ec2c7a;
        font-weight: 700;
    }

    .cta-box {
        margin-top: 36px;
        background: rgba(255,255,255,0.36);
        border: 1px solid rgba(236, 44, 122, 0.12);
        border-radius: 24px;
        padding: 28px 22px;
        text-align: center;
    }

    .cta-icon {
        width: 58px;
        height: 58px;
        margin: 0 auto 10px;
        border-radius: 50%;
        background: linear-gradient(135deg, #ec2c7a, #d31d66);
        display: grid;
        place-items: center;
        color: #fff;
        font-size: 1.8rem;
    }

    .cta-box h3 {
        margin: 0;
        font-size: clamp(2rem, 3vw, 3rem);
        line-height: 1.1;
        letter-spacing: -0.06em;
    }

    .cta-box p {
        max-width: 760px;
        margin: 14px auto 18px;
        color: #5d5868;
        font-size: 1.04rem;
    }

    .cta-actions {
        display: flex;
        justify-content: center;
        gap: 16px;
        flex-wrap: wrap;
    }

    .btn-outline {
        background: transparent;
        border: 1px solid rgba(236, 44, 122, 0.8);
        color: #ec2c7a;
        box-shadow: none;
    }

    .testimonials-section {
        background: rgba(255, 255, 255, 0.08);
        padding: 70px 0 40px;
    }

    .testimonials-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 22px;
        margin-top: 28px;
    }

    .testimonial-card {
        background: rgba(255,255,255,0.56);
        border: 1px solid rgba(236, 44, 122, 0.12);
        border-radius: 22px;
        padding: 22px 18px 18px;
        box-shadow: 0 8px 22px rgba(31, 41, 55, 0.04);
        min-height: 340px;
        text-align: left;
    }

    .avatar {
        width: 82px;
        height: 82px;
        border-radius: 50%;
        margin: -36px auto 16px;
        border: 4px solid rgba(255,255,255,0.9);
        background-size: cover;
        background-position: center;
        box-shadow: 0 10px 20px rgba(0,0,0,0.08);
    }

    .avatar-one { background: linear-gradient(135deg, #1f2937, #a78bfa); }
    .avatar-two { background: linear-gradient(135deg, #374151, #34d399); }
    .avatar-three { background: linear-gradient(135deg, #334155, #38bdf8); }
    .avatar-four { background: linear-gradient(135deg, #475569, #f9a8d4); }

    .quote-mark {
        font-size: 3rem;
        line-height: 1;
        color: #ec2c7a;
        margin: 10px 0 10px;
    }

    .testimonial-card p {
        margin: 0 0 18px;
        color: #1f1b2a;
        line-height: 1.7;
        min-height: 130px;
    }

    .stars {
        color: #fbbf24;
        letter-spacing: 2px;
        font-size: 1rem;
    }

    .testimonial-card h3 {
        margin: 18px 0 4px;
        font-size: 1.2rem;
    }

    .testimonial-card span {
        color: #5d5868;
        font-size: 0.85rem;
    }

    .testimonial-cta {
        margin-top: 26px;
    }

    .contact-form-section {
        background: rgba(246, 239, 232, 0.92);
        padding: 50px 0 60px;
    }

    .contact-grid {
        display: grid;
        grid-template-columns: 0.9fr 1.1fr;
        gap: 26px;
        align-items: stretch;
    }

    .contact-info-card {
        background: linear-gradient(180deg, rgba(26, 22, 30, 0.96), rgba(72, 22, 49, 0.9));
        border-radius: 18px;
        color: #fff;
        padding: 26px 22px 18px;
        text-align: left;
    }

    .contact-label {
        display: inline-flex;
        background: rgba(255,255,255,0.08);
        border: 1px solid rgba(255,255,255,0.18);
        color: #f7d7e7;
        border-radius: 999px;
        padding: 7px 12px;
        font-size: 0.72rem;
        letter-spacing: 0.11em;
        font-weight: 700;
    }

    .contact-info-card h3 {
        margin: 22px 0 10px;
        font-size: clamp(2rem, 3vw, 2.6rem);
        line-height: 1.1;
        letter-spacing: -0.05em;
    }

    .contact-info-card p {
        margin: 0 0 18px;
        color: rgba(255,255,255,0.74);
    }

    .contact-row,
    .contact-hours {
        display: flex;
        align-items: center;
        gap: 12px;
        color: rgba(255,255,255,0.9);
        font-size: 0.94rem;
    }

    .contact-lines {
        display: grid;
        gap: 10px;
        margin-top: 18px;
    }

    .icon {
        display: grid;
        place-items: center;
        width: 28px;
        height: 28px;
        border-radius: 10px;
        background: rgba(236, 44, 122, 0.22);
        color: #fdf2f8;
        font-size: 0.9rem;
    }

    .contact-form-panel {
        background: rgba(255,255,255,0.5);
        border: 1px solid rgba(236, 44, 122, 0.12);
        border-radius: 20px;
        padding: 20px;
        text-align: left;
    }

    .contact-form {
        display: grid;
        gap: 16px;
    }

    .field-wrap {
        display: grid;
        gap: 8px;
    }

    .field-wrap label {
        font-weight: 600;
        color: #1f1b2a;
    }

    .field-wrap label span {
        color: #ec2c7a;
    }

    .contact-form input,
    .contact-form textarea {
        background: rgba(255,255,255,0.8);
        border: 1px solid rgba(209, 24, 105, 0.18);
        border-radius: 12px;
        padding: 14px 16px;
        color: #1f1b2a;
    }

    .site-footer {
        background: linear-gradient(180deg, #110f13, #1a1619);
        color: #f3e7ef;
        padding-top: 20px;
    }

    .footer-inner {
        display: grid;
        grid-template-columns: 1.2fr 0.7fr 0.8fr 1fr;
        gap: 30px;
        padding: 32px 0 22px;
    }

    .footer-brand p {
        margin: 18px 0 0;
        color: rgba(255,255,255,0.72);
        line-height: 1.8;
        max-width: 360px;
    }

    .footer-menu {
        text-align: left;
    }

    .footer-menu h4 {
        margin: 0 0 18px;
        color: #fff;
        font-size: 1.1rem;
    }

    .footer-menu ul {
        list-style: none;
        padding: 0;
        margin: 0;
        display: grid;
        gap: 10px;
    }

    .footer-menu a,
    .footer-menu span {
        color: rgba(255,255,255,0.72);
        font-size: 0.92rem;
    }

    .subscribe-box {
        display: flex;
        align-items: center;
        gap: 8px;
        background: rgba(255,255,255,0.08);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 999px;
        padding: 8px 10px 8px 16px;
        margin-top: 18px;
    }

    .subscribe-box input {
        flex: 1;
        min-width: 0;
        border: none;
        background: transparent;
        color: #fff;
    }

    .subscribe-box button {
        width: 36px;
        height: 36px;
        border: none;
        border-radius: 50%;
        background: linear-gradient(135deg, #ec2c7a, #d21d66);
        color: #fff;
        cursor: pointer;
    }

    .footer-bottom {
        border-top: 1px solid rgba(255,255,255,0.08);
        padding: 18px 0;
    }

    .footer-bottom-inner {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 18px;
        color: rgba(255,255,255,0.7);
        font-size: 0.82rem;
    }

    .footer-links {
        display: flex;
        gap: 18px;
        flex-wrap: wrap;
    }

    .footer-links a {
        color: rgba(255,255,255,0.7);
    }
</style>

<main>
    <?php renderHeroSection(); ?>

    <?php renderTrustedPartnersSection(); ?>

    <?php renderAboutBrandSection(); ?>

    <?php renderWhatWeDoSection(); ?>

    <?php renderSearchVisibilitySection(); ?>

    <?php renderSeoSuccessStoriesSection(); ?>

    <?php renderTestimonialsSection(); ?>

    <?php renderContactFormSection(); ?>

   


    
</main>

<?php renderFooterSection(); ?>
