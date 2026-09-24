<?php
function renderHeroSection(): void
{
    ?>
    <style>
        /* ============================================================
           HERO SECTION — Pixel-perfect Next.js clone
        ============================================================ */
        .hero {
            position: relative;
            width: 100%;
            padding: 32px 0;
            overflow: hidden;
            background: #FBF8F1;
        }

        /* Decorative Background Elements */
        .hero-bg {
            position: absolute;
            inset: 0;
            pointer-events: none;
        }

        .hero-bg-blob-1 {
            position: absolute;
            top: 0;
            right: 0;
            width: 50%;
            height: 50%;
            background: linear-gradient(to bottom left, rgba(196, 0, 122, 0.05), transparent);
            border-radius: 9999px;
            filter: blur(64px);
        }

        .hero-bg-blob-2 {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 33.333%;
            height: 33.333%;
            background: linear-gradient(to top right, rgba(196, 0, 122, 0.05), transparent);
            border-radius: 9999px;
            filter: blur(64px);
        }

        .hero-bg-svg {
            position: absolute;
            fill: none;
            stroke: #C4007A;
            stroke-width: 1.5;
        }

        .hero-bg-svg-1 {
            top: -40px;
            right: 15%;
            width: 128px;
            height: 128px;
            opacity: 0.4;
        }

        .hero-bg-svg-2 {
            top: 25%;
            right: 5%;
            width: 80px;
            height: 80px;
            opacity: 0.3;
        }

        .hero-bg-svg-3 {
            bottom: 25%;
            right: 20%;
            width: 96px;
            height: 96px;
            opacity: 0.25;
        }

        /* Grid Layout */
        .hero-inner {
            position: relative;
            z-index: 10;
            display: grid;
            grid-template-columns: 1fr;
            gap: 32px;
        }

        /* ============================================================
           LEFT SIDE — Hero Copy
        ============================================================ */
        .hero-left {
            display: flex;
            flex-direction: column;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 16px;
            padding: 24px;
            border: 1px solid rgba(196, 0, 122, 0.05);
            height: 100%;
        }

        /* Badge */
        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(196, 0, 122, 0.1);
            padding: 8px 16px;
            border-radius: 9999px;
            width: fit-content;
            margin-bottom: 16px;
        }

        .hero-badge svg {
            width: 16px;
            height: 16px;
            color: #C4007A;
            flex-shrink: 0;
        }

        .hero-badge span {
            color: #C4007A;
            font-weight: 600;
            font-size: 0.875rem;
            letter-spacing: 0.025em;
            text-transform: uppercase;
        }

        /* Main Heading */
        .hero-heading {
            font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
            font-weight: 900;
            color: #111111;
            line-height: 1.05;
            font-size: 1.875rem; /* 3xl */
            margin: 0 0 16px;
        }

        .hero-heading .accent {
            color: #C4007A;
        }

        .hero-heading .underline-wrap {
            position: relative;
            display: inline-block;
        }

        .hero-heading .underline-wrap .text {
            position: relative;
            z-index: 10;
        }

        .hero-heading .underline-svg {
            position: absolute;
            left: 0;
            bottom: -8px;
            width: 100%;
            height: 12px;
        }

        .hero-heading .highlight-wrap {
            position: relative;
            display: inline-block;
        }

        .hero-heading .highlight-wrap .text {
            position: relative;
            z-index: 10;
        }

        .hero-heading .highlight-wrap .highlight {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 4px;
            height: 12px;
            background: rgba(196, 0, 122, 0.2);
            border-radius: 2px;
            z-index: 0;
        }

        /* Description */
        .hero-desc {
            font-size: 1rem;
            color: #374151;
            margin: 0 0 12px;
            line-height: 1.625;
        }

        .hero-desc-sm {
            font-size: 0.875rem;
            color: #4B5563;
            margin: 0 0 20px;
            line-height: 1.625;
        }

        /* Benefits Checklist */
        .hero-benefits {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .hero-benefits li {
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }

        .hero-benefits .check-icon {
            width: 20px;
            height: 20px;
            border-radius: 9999px;
            background: rgba(196, 0, 122, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .hero-benefits .check-icon svg {
            width: 14px;
            height: 14px;
            color: #C4007A;
        }

        .hero-benefits .text {
            font-size: 0.875rem;
            color: #374151;
            line-height: 1.625;
        }

        /* ============================================================
           RIGHT SIDE — Contact Form
        ============================================================ */
        .hero-right {
            position: relative;
            border-radius: 16px;
            overflow: hidden;
            background: #FDF0F6;
            border: 1px solid rgba(196, 0, 122, 0.1);
            padding: 24px;
            box-shadow: 0 10px 40px rgba(196, 0, 122, 0.12);
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        /* Decorative circles */
        .hero-right::before {
            content: '';
            position: absolute;
            top: -40px;
            right: -40px;
            width: 160px;
            height: 160px;
            border-radius: 9999px;
            border: 3px solid rgba(196, 0, 122, 0.1);
            pointer-events: none;
        }

        .hero-right::after {
            content: '';
            position: absolute;
            bottom: -40px;
            left: -40px;
            width: 128px;
            height: 128px;
            border-radius: 9999px;
            border: 3px solid rgba(196, 0, 122, 0.1);
            pointer-events: none;
        }

        .hero-right-blob {
            position: absolute;
            top: 50%;
            right: -40px;
            width: 96px;
            height: 96px;
            border-radius: 9999px;
            background: rgba(196, 0, 122, 0.05);
            filter: blur(40px);
            pointer-events: none;
        }

        .hero-form-content {
            position: relative;
            z-index: 10;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        /* Form Header */
        .hero-form-header {
            margin-bottom: 24px;
        }

        .hero-form-header .title-row {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 6px;
        }

        .hero-form-header .title-row svg {
            width: 16px;
            height: 16px;
            color: #C4007A;
            flex-shrink: 0;
        }

        .hero-form-header h2 {
            font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
            font-weight: 700;
            color: #111111;
            font-size: 1.125rem;
            margin: 0;
            line-height: 1.2;
        }

        .hero-form-header .subtitle {
            color: #4B5563;
            font-size: 0.75rem;
            line-height: 1.625;
            margin: 0;
        }

        .hero-form-header .contact-for {
            font-size: 0.625rem;
            color: #6B7280;
            margin: 8px 0 0;
        }

        .hero-form-header .contact-for .label {
            font-weight: 600;
            color: #C4007A;
        }

        /* Form */
        .hero-form {
            display: flex;
            flex-direction: column;
        }

        .hero-form-row {
            display: grid;
            grid-template-columns: 1fr;
            gap: 12px;
            margin-bottom: 16px;
        }

        .hero-input-wrap {
            position: relative;
        }

        .hero-input-wrap svg {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            width: 14px;
            height: 14px;
            color: #C4007A;
            pointer-events: none;
        }

        .hero-input-wrap.textarea-wrap svg {
            top: 14px;
            transform: none;
        }

        .hero-input,
        .hero-textarea {
            width: 100%;
            border-radius: 8px;
            border: 1px solid rgba(196, 0, 122, 0.15);
            background: #fff;
            padding: 12px 12px 12px 32px;
            font-size: 0.875rem;
            color: #111111;
            font-family: inherit;
            transition: all 0.2s ease;
            outline: none;
        }

        .hero-input::placeholder,
        .hero-textarea::placeholder {
            color: #9CA3AF;
        }

        .hero-input:focus,
        .hero-textarea:focus {
            border-color: rgba(196, 0, 122, 0.5);
            box-shadow: 0 0 0 3px rgba(196, 0, 122, 0.1);
        }

        .hero-textarea {
            resize: none;
            min-height: 80px;
            padding-top: 12px;
        }

        /* Checkboxes */
        .hero-checks {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-bottom: 16px;
        }

        .hero-check-label {
            display: flex;
            cursor: pointer;
            align-items: flex-start;
            gap: 8px;
            font-size: 0.6875rem;
            color: #4B5563;
        }

        .hero-check-label input[type="checkbox"] {
            margin-top: 2px;
            width: 14px;
            height: 14px;
            accent-color: #C4007A;
            cursor: pointer;
            flex-shrink: 0;
        }

        .hero-check-box {
            display: flex;
            align-items: center;
            gap: 12px;
            border-radius: 8px;
            border: 1px solid rgba(196, 0, 122, 0.15);
            background: #fff;
            padding: 8px 12px;
        }

        .hero-check-box input[type="checkbox"] {
            width: 14px;
            height: 14px;
            accent-color: #C4007A;
            cursor: pointer;
            flex-shrink: 0;
        }

        .hero-check-box .text {
            font-size: 0.75rem;
            color: #4B5563;
        }

        .hero-check-box .recaptcha {
            margin-left: auto;
            font-size: 0.5625rem;
            color: #9CA3AF;
        }

        /* Submit Button */
        .hero-submit {
            width: 100%;
            border-radius: 9999px;
            background: linear-gradient(to right, #C4007A, #E0398F);
            padding: 14px 24px;
            font-weight: 700;
            color: #fff;
            box-shadow: 0 10px 15px -3px rgba(196, 0, 122, 0.25);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-size: 0.875rem;
            border: none;
            cursor: pointer;
            font-family: inherit;
        }

        .hero-submit:hover {
            transform: scale(1.02);
            box-shadow: 0 20px 25px -5px rgba(196, 0, 122, 0.35);
        }

        .hero-submit svg {
            width: 16px;
            height: 16px;
        }

        /* Phone CTA */
        .hero-callout {
            text-align: center;
            font-size: 0.75rem;
            color: #6B7280;
            margin: 16px 0 0;
        }

        .hero-callout a {
            color: #C4007A;
            font-weight: 600;
            text-decoration: none;
        }

        .hero-callout a:hover {
            text-decoration: underline;
        }

        /* Trust Strip */
        .hero-trust {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 8px;
            padding-top: 24px;
            margin-top: 24px;
            border-top: 1px solid rgba(196, 0, 122, 0.1);
        }

        .hero-trust-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: 6px;
        }

        .hero-trust-icon {
            width: 32px;
            height: 32px;
            border-radius: 9999px;
            background: rgba(196, 0, 122, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-trust-icon svg {
            width: 16px;
            height: 16px;
            color: #C4007A;
        }

        .hero-trust-item .label {
            font-size: 0.625rem;
            color: #4B5563;
            line-height: 1.2;
        }

        /* ============================================================
           RESPONSIVE
        ============================================================ */

        /* Small tablets and up */
        @media (min-width: 640px) {
            .hero-heading { font-size: 2.25rem; }
            .hero-desc { font-size: 1.125rem; }
            .hero-desc-sm { font-size: 1rem; }
            .hero-form-header h2 { font-size: 1.25rem; }
            .hero-form-row { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .hero-heading .highlight-wrap .highlight { height: 16px; }
        }

        /* Large tablets and up */
        @media (min-width: 1024px) {
            .hero { padding: 32px 0; }
            .hero-inner {
                grid-template-columns: 1.1fr 0.9fr;
                gap: 48px;
                align-items: stretch;
            }
            .hero-left { padding: 32px; }
            .hero-right { padding: 32px; }
            .hero-heading { font-size: 3rem; }
        }

        /* Extra large desktop */
        @media (min-width: 1280px) {
            .hero-heading { font-size: 3rem; }
        }
    </style>

    <section class="hero">
        <!-- Decorative Background Elements -->
        <div class="hero-bg">
            <div class="hero-bg-blob-1"></div>
            <div class="hero-bg-blob-2"></div>

            <svg class="hero-bg-svg hero-bg-svg-1" viewBox="0 0 100 100">
                <rect x="20" y="20" width="60" height="60" transform="rotate(45 50 50)" />
            </svg>
            <svg class="hero-bg-svg hero-bg-svg-2" viewBox="0 0 100 100">
                <rect x="25" y="25" width="50" height="50" transform="rotate(45 50 50)" />
            </svg>
            <svg class="hero-bg-svg hero-bg-svg-3" viewBox="0 0 100 100">
                <rect x="20" y="20" width="60" height="60" transform="rotate(45 50 50)" />
            </svg>
        </div>

        <div class="container">
            <div class="hero-inner">

                <!-- LEFT SIDE -->
                <div class="hero-left">

                    <!-- Badge -->
                    <div class="hero-badge">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/><path d="M20 3v4"/><path d="M22 5h-4"/><path d="M4 17v2"/><path d="M5 18H3"/></svg>
                        <span>AI-Powered Digital Agency</span>
                    </div>

                    <!-- Main Heading -->
                    <h1 class="hero-heading">
                        Boost Your
                        <span class="underline-wrap">
                            <span class="text accent">AI-Powered</span>
                            <svg class="underline-svg" viewBox="0 0 300 12" preserveAspectRatio="none">
                                <path d="M2 6C60 2 240 2 298 6" stroke="#C4007A" stroke-width="3" stroke-linecap="round" fill="none" opacity="0.3"/>
                            </svg>
                        </span>
                        <span class="highlight-wrap">
                            <span class="text">Digital Marketing</span>
                            <span class="highlight"></span>
                        </span>
                        <span class="accent">With Us</span>
                    </h1>

                    <!-- Description -->
                    <p class="hero-desc">
                        WebTecMart delivers AI-powered SEO and Performance Marketing solutions to increase visibility, attract quality leads, and accelerate business growth.
                    </p>

                    <p class="hero-desc-sm">
                        Whether you run a startup, enterprise, B2B event platform, local business, or service-based company, strong online visibility is more important than ever.
                    </p>

                    <!-- Benefits Checklist -->
                    <ul class="hero-benefits">
                        <li>
                            <div class="check-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
                            </div>
                            <span class="text">Generate high-quality leads that drive business growth</span>
                        </li>
                        <li>
                            <div class="check-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
                            </div>
                            <span class="text">Attract the right audience to your website</span>
                        </li>
                        <li>
                            <div class="check-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
                            </div>
                            <span class="text">Build brand credibility with a powerful online presence</span>
                        </li>
                        <li>
                            <div class="check-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
                            </div>
                            <span class="text">Convert visitors into loyal, long-term customers</span>
                        </li>
                    </ul>

                </div>

                <!-- RIGHT SIDE — Contact Form -->
                <div class="hero-right">
                    <div class="hero-right-blob"></div>

                    <div class="hero-form-content">

                        <!-- Form Header -->
                        <div class="hero-form-header">
                            <div class="title-row">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z"/></svg>
                                <h2>Boost Your ROI</h2>
                            </div>
                            <p class="subtitle">Get a customized growth strategy to boost visibility and conversions.</p>
                            <p class="contact-for">
                                <span class="label">Contact for:</span> Digital, Ecommerce, Creative, PR &amp; Websites
                            </p>
                        </div>

                        <!-- Form -->
                        <form class="hero-form" method="POST" action="/contact.php">

                            <!-- Row 1: Name + Email -->
                            <div class="hero-form-row">
                                <div class="hero-input-wrap">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                    <input type="text" name="name" class="hero-input" placeholder="Full Name *" required>
                                </div>
                                <div class="hero-input-wrap">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                                    <input type="email" name="email" class="hero-input" placeholder="Email Address *" required>
                                </div>
                            </div>

                            <!-- Row 2: Phone + Company -->
                            <div class="hero-form-row">
                                <div class="hero-input-wrap">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                                    <input type="tel" name="phone" class="hero-input" placeholder="Phone Number *" required>
                                </div>
                                <div class="hero-input-wrap">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/><path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"/><path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"/><path d="M10 6h4"/><path d="M10 10h4"/><path d="M10 14h4"/><path d="M10 18h4"/></svg>
                                    <input type="text" name="company" class="hero-input" placeholder="Company / Website *" required>
                                </div>
                            </div>

                            <!-- Message -->
                            <div class="hero-form-row" style="margin-bottom: 16px;">
                                <div class="hero-input-wrap textarea-wrap">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"/></svg>
                                    <textarea name="message" class="hero-textarea" rows="3" placeholder="Enter your message here"></textarea>
                                </div>
                            </div>

                            <!-- Checkboxes -->
                            <div class="hero-checks">
                                <label class="hero-check-label">
                                    <input type="checkbox" checked>
                                    <span>Yes, I'm happy for you to use my information</span>
                                </label>

                                <div class="hero-check-box">
                                    <input type="checkbox" id="notRobot">
                                    <label for="notRobot" class="text">I'm not a robot</label>
                                    <span class="recaptcha">reCAPTCHA</span>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="hero-submit">
                                Submit
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                            </button>

                            <!-- Phone CTA -->
                            <p class="hero-callout">
                                or call us on <a href="tel:+919999674255">+91-9999674255</a>
                            </p>

                        </form>

                        <!-- Trust Strip -->
                        <div class="hero-trust">
                            <div class="hero-trust-item">
                                <div class="hero-trust-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                </div>
                                <span class="label">Quick Response</span>
                            </div>

                            <div class="hero-trust-item">
                                <div class="hero-trust-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/></svg>
                                </div>
                                <span class="label">No Spam, Ever</span>
                            </div>

                            <div class="hero-trust-item">
                                <div class="hero-trust-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="8" width="18" height="4" rx="1"/><path d="M12 8v13"/><path d="M19 12v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-7"/><path d="M7.5 8a2.5 2.5 0 0 1 0-5A4.8 8 0 0 1 12 8a4.8 8 0 0 1 4.5-5 2.5 2.5 0 0 1 0 5"/></svg>
                                </div>
                                <span class="label">Free Consultation</span>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <?php
}