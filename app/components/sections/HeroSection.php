<?php
function renderHeroSection(): void
{
    $content = homepageHeroContent();
    $benefits = preg_split('/\r\n|\r|\n/', trim((string) ($content['benefits'] ?? '')));
    $benefits = is_array($benefits) ? array_values(array_filter(array_map('trim', $benefits), static function (string $benefit): bool {
        return $benefit !== '';
    })) : [];
    $serviceOptions = preg_split('/\r\n|\r|\n/', trim((string) ($content['service_options'] ?? '')));
    $serviceOptions = is_array($serviceOptions) ? array_values(array_filter(array_map('trim', $serviceOptions), static function (string $option): bool {
        return $option !== '';
    })) : [];
    $serviceOptions = array_values(array_unique(array_merge($serviceOptions, [
        'Meta / Google Ads',
        'Social Media Advertising',
    ])));
    $mainDescription = trim(implode(' ', array_filter([
        trim((string) ($content['summary'] ?? '')),
        trim((string) ($content['body'] ?? '')),
    ], static function (string $part): bool {
        return $part !== '';
    })));
    $phoneNumber = trim((string) ($content['phone_number'] ?? ''));
    $phoneHref = preg_replace('/[^0-9+]/', '', $phoneNumber);
    ?>
    <style>
        /* ============================================================
           HERO SECTION — Compact, Premium, Non-overlapping Layout
        ============================================================ */
        .hero {
            position: relative;
            width: 100%;
            padding: 24px 0 20px;
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
            width: 45%;
            height: 45%;
            background: linear-gradient(to bottom left, rgba(196, 0, 122, 0.05), transparent);
            border-radius: 9999px;
            filter: blur(64px);
        }

        .hero-bg-blob-2 {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 30%;
            height: 30%;
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
            top: -30px;
            right: 15%;
            width: 110px;
            height: 110px;
            opacity: 0.35;
        }

        .hero-bg-svg-2 {
            top: 25%;
            right: 5%;
            width: 70px;
            height: 70px;
            opacity: 0.25;
        }

        .hero-bg-svg-3 {
            bottom: 25%;
            right: 20%;
            width: 80px;
            height: 80px;
            opacity: 0.2;
        }

        /* Grid Layout */
        .hero-inner {
            position: relative;
            z-index: 10;
            display: grid;
            grid-template-columns: 1fr;
            gap: 24px;
            align-items: stretch;
        }

        /* ============================================================
           LEFT SIDE — Hero Copy
        ============================================================ */
        .hero-left {
            display: flex;
            flex-direction: column;
            background: rgba(255, 255, 255, 0.6);
            border-radius: 16px;
            padding: 22px 20px;
            border: 1px solid rgba(196, 0, 122, 0.08);
            box-shadow: 0 4px 20px rgba(196, 0, 122, 0.03);
            height: 100%;
            justify-content: center;
        }

        /* Badge */
        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(196, 0, 122, 0.1);
            padding: 6px 12px;
            border-radius: 9999px;
            width: fit-content;
            margin-bottom: 12px;
        }

        .hero-badge svg {
            width: 14px;
            height: 14px;
            color: #C4007A;
            flex-shrink: 0;
        }

        .hero-badge span {
            color: #C4007A;
            font-weight: 700;
            font-size: 0.78rem;
            letter-spacing: 0.03em;
            text-transform: uppercase;
        }

        /* Main Heading */
        .hero-heading {
            font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
            font-weight: 800;
            color: #111111;
            line-height: 1.18;
            font-size: clamp(1.85rem, 3.2vw, 2.75rem);
            margin: 0 0 12px;
            letter-spacing: -0.02em;
            word-break: normal;
            overflow-wrap: break-word;
        }

        .hero-heading .accent {
            color: #C4007A;
        }

        .hero-heading .underline-wrap {
            position: relative;
            display: inline-block;
            color: #C4007A;
        }

        .hero-heading .underline-svg {
            position: absolute;
            left: 0;
            bottom: -3px;
            width: 100%;
            height: 8px;
            pointer-events: none;
        }

        .hero-heading .highlight-wrap {
            position: relative;
            display: inline-block;
        }

        .hero-heading .highlight-wrap .text {
            color: #C4007A;
            position: relative;
            z-index: 2;
        }

        .hero-heading .highlight-wrap .highlight {
            display: none;
        }

        /* Description */
        .hero-desc {
            font-size: 0.935rem;
            color: #374151;
            margin: 0 0 10px;
            line-height: 1.58;
        }

        .hero-desc-sm {
            font-size: 0.85rem;
            color: #4B5563;
            margin: 0 0 16px;
            line-height: 1.55;
        }

        /* Benefits Checklist */
        .hero-benefits {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .hero-benefits li {
            display: flex;
            align-items: flex-start;
            gap: 8px;
        }

        .hero-benefits .check-icon {
            width: 18px;
            height: 18px;
            border-radius: 9999px;
            background: rgba(196, 0, 122, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .hero-benefits .check-icon svg {
            width: 12px;
            height: 12px;
            color: #C4007A;
        }

        .hero-benefits .text {
            font-size: 0.825rem;
            color: #374151;
            line-height: 1.5;
        }

        /* ============================================================
           RIGHT SIDE — Contact Form
        ============================================================ */
        .hero-right {
            position: relative;
            border-radius: 16px;
            overflow: hidden;
            background: #FDF0F6;
            border: 1px solid rgba(196, 0, 122, 0.12);
            padding: 22px 20px;
            box-shadow: 0 8px 30px rgba(196, 0, 122, 0.1);
            display: flex;
            flex-direction: column;
            height: 100%;
            justify-content: center;
        }

        /* Decorative circles */
        .hero-right::before {
            content: '';
            position: absolute;
            top: -40px;
            right: -40px;
            width: 140px;
            height: 140px;
            border-radius: 9999px;
            border: 2px solid rgba(196, 0, 122, 0.08);
            pointer-events: none;
        }

        .hero-right::after {
            content: '';
            position: absolute;
            bottom: -30px;
            left: -30px;
            width: 110px;
            height: 110px;
            border-radius: 9999px;
            border: 2px solid rgba(196, 0, 122, 0.08);
            pointer-events: none;
        }

        .hero-right-blob {
            position: absolute;
            top: 50%;
            right: -30px;
            width: 80px;
            height: 80px;
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

        /* Form Header — Meta row placed physically ABOVE heading so it NEVER overlaps */
        .hero-form-header {
            margin-bottom: 12px;
        }

        .hero-form-top-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
            margin-bottom: 8px;
            flex-wrap: wrap;
        }

        .hero-form-kicker {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: #C4007A;
            font-size: 0.72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .hero-form-kicker svg {
            width: 13px;
            height: 13px;
            color: #C4007A;
            flex-shrink: 0;
        }

        .hero-rating-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: #FFFFFF;
            border: 1px solid #F1C6DC;
            border-radius: 9999px;
            padding: 4px 10px;
            font-size: 0.72rem;
            font-weight: 600;
            color: #374151;
            box-shadow: 0 2px 6px rgba(196, 0, 122, 0.06);
            white-space: nowrap;
        }

        .hero-rating-badge span {
            color: #111827;
            font-weight: 700;
        }

        .hero-form-header h2 {
            font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
            font-weight: 800;
            color: #111111;
            font-size: clamp(1.2rem, 1.8vw, 1.45rem);
            margin: 0 0 4px;
            line-height: 1.25;
            display: block;
            width: 100%;
        }

        .hero-form-header .subtitle {
            color: #4B5563;
            font-size: 0.8rem;
            line-height: 1.5;
            margin: 0 0 4px;
        }

        .hero-form-header .contact-for {
            font-size: 0.72rem;
            color: #6B7280;
            margin: 0;
            line-height: 1.4;
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
            gap: 10px;
            margin-bottom: 10px;
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
            top: 13px;
            transform: none;
        }

        .hero-input,
        .hero-textarea,
        .hero-select {
            width: 100%;
            border-radius: 8px;
            border: 1px solid rgba(196, 0, 122, 0.15);
            background: #fff;
            padding: 9px 12px 9px 32px;
            font-size: 0.84rem;
            color: #111111;
            font-family: inherit;
            transition: all 0.2s ease;
            outline: none;
            box-sizing: border-box;
        }

        .hero-select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23C4007A' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='m6 9 6 6 6-6'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 14px 14px;
            padding-right: 32px;
            cursor: pointer;
            accent-color: #C4007A;
            color-scheme: light;
        }

        .hero-select:invalid {
            color: #9CA3AF;
        }

        .hero-select option {
            color: #111111;
            background: #fff;
        }

        .hero-input::placeholder,
        .hero-textarea::placeholder {
            color: #9CA3AF;
        }

        .hero-input:focus,
        .hero-textarea:focus,
        .hero-select:focus {
            border-color: rgba(196, 0, 122, 0.5);
            box-shadow: 0 0 0 3px rgba(196, 0, 122, 0.1);
        }

        .hero-textarea {
            resize: none;
            min-height: 64px;
            padding-top: 10px;
        }

        /* Checkboxes */
        .hero-checks {
            display: flex;
            flex-direction: column;
            gap: 6px;
            margin-bottom: 10px;
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
            gap: 10px;
            border-radius: 8px;
            border: 1px solid rgba(196, 0, 122, 0.15);
            background: #fff;
            padding: 6px 10px;
        }

        .hero-check-box input[type="checkbox"] {
            width: 14px;
            height: 14px;
            accent-color: #C4007A;
            cursor: pointer;
            flex-shrink: 0;
        }

        .hero-check-box .text {
            font-size: 0.72rem;
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
            padding: 11px 20px;
            font-weight: 700;
            color: #fff;
            box-shadow: 0 8px 18px -3px rgba(196, 0, 122, 0.25);
            transition: all 0.25s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-size: 0.85rem;
            border: none;
            cursor: pointer;
            font-family: inherit;
        }

        .hero-submit:hover {
            transform: translateY(-1px);
            box-shadow: 0 12px 22px -4px rgba(196, 0, 122, 0.35);
        }

        .hero-submit svg {
            width: 15px;
            height: 15px;
        }

        /* Phone CTA */
        .hero-callout {
            text-align: center;
            font-size: 0.72rem;
            color: #6B7280;
            margin: 8px 0 0;
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
            gap: 6px;
            padding-top: 12px;
            margin-top: 12px;
            border-top: 1px solid rgba(196, 0, 122, 0.1);
        }

        .hero-trust-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: 4px;
        }

        .hero-trust-icon {
            width: 28px;
            height: 28px;
            border-radius: 9999px;
            background: rgba(196, 0, 122, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-trust-icon svg {
            width: 14px;
            height: 14px;
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
        @media (min-width: 640px) {
            .hero-form-row { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        }

        @media (min-width: 1024px) {
            .hero { padding: 32px 0 28px; }
            .hero-inner {
                grid-template-columns: 1.08fr 0.92fr;
                gap: 32px;
                align-items: stretch;
            }
            .hero-left { padding: 26px 28px; }
            .hero-right { padding: 24px 28px; }
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
                <div class="hero-left" data-wtm-reveal="fade-right">

                    <!-- Badge -->
                    <div class="hero-badge">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/><path d="M20 3v4"/><path d="M22 5h-4"/><path d="M4 17v2"/><path d="M5 18H3"/></svg>
                        <span><?= e((string) ($content['badge'] ?? 'DIGITAL GROWTH AGENCY')) ?></span>
                    </div>

                    <!-- Main Heading -->
                    <h1 class="hero-heading">
                        <?= e((string) ($content['heading_prefix'] ?? '')) ?>
                        <?php if (!empty($content['heading_underline'])): ?>
                            <span class="underline-wrap">
                                <span class="text accent"><?= e((string) $content['heading_underline']) ?></span>
                                <svg class="underline-svg" viewBox="0 0 300 12" preserveAspectRatio="none">
                                    <path d="M2 6C60 2 240 2 298 6" stroke="#C4007A" stroke-width="3" stroke-linecap="round" fill="none" opacity="0.35"/>
                                </svg>
                            </span>
                        <?php endif; ?>
                        <?php if (!empty($content['heading_highlight'])): ?>
                            <span class="highlight-wrap">
                                <span class="text"><?= e((string) $content['heading_highlight']) ?></span>
                            </span>
                        <?php endif; ?>
                        <span class="accent"><?= e((string) ($content['heading_suffix'] ?? '')) ?></span>
                    </h1>

                    <!-- Description -->
                    <?php if ($mainDescription !== ''): ?>
                        <p class="hero-desc"><?= e($mainDescription) ?></p>
                    <?php endif; ?>

                    <?php if (!empty($content['description_secondary'])): ?>
                        <p class="hero-desc-sm"><?= e((string) $content['description_secondary']) ?></p>
                    <?php endif; ?>

                    <!-- Benefits Checklist -->
                    <ul class="hero-benefits" data-reveal-stagger>
                        <?php foreach ($benefits as $benefit): ?>
                        <li>
                            <div class="check-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
                            </div>
                            <span class="text"><?= e($benefit) ?></span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- RIGHT SIDE — Contact Form -->
                <div class="hero-right" data-wtm-reveal="fade-left">
                    <div class="hero-right-blob"></div>

                    <div class="hero-form-content">
                        <!-- Form Header (Rating Badge positioned in dedicated meta row, NEVER overlapping heading) -->
                        <div class="hero-form-header">
                            <div class="hero-form-top-row">
                                <div class="hero-form-kicker">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z"/></svg>
                                    <span>Free Strategy Call</span>
                                </div>
                                <div class="hero-rating-badge">⭐ <span>4.9/5 Rating</span> · 500+ Brands</div>
                            </div>
                            <h2><?= e((string) ($content['form_title'] ?? 'Get Your Free Consultation')) ?></h2>
                            <p class="subtitle"><?= e((string) ($content['form_subtitle'] ?? '')) ?></p>
                            <p class="contact-for">
                                <span class="label"><?= e((string) ($content['contact_for_label'] ?? 'Contact for:')) ?></span> <?= e((string) ($content['contact_for'] ?? '')) ?>
                            </p>
                        </div>

                        <!-- Form -->
                        <form class="hero-form" method="POST" action="/contact.php">

                            <!-- Row 1: Name + Email -->
                            <div class="hero-form-row">
                                <div class="hero-input-wrap">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                    <input type="text" name="name" class="hero-input" placeholder="<?= e((string) ($content['name_placeholder'] ?? '')) ?>" required>
                                </div>
                                <div class="hero-input-wrap">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                                    <input type="email" name="email" class="hero-input" placeholder="<?= e((string) ($content['email_placeholder'] ?? '')) ?>" required>
                                </div>
                            </div>

                            <!-- Row 2: Phone + Company -->
                            <div class="hero-form-row">
                                <div class="hero-input-wrap">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                                    <input type="tel" name="phone" class="hero-input" placeholder="<?= e((string) ($content['phone_placeholder'] ?? '')) ?>" required>
                                </div>
                                <div class="hero-input-wrap">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/><path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"/><path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"/><path d="M10 6h4"/><path d="M10 10h4"/><path d="M10 14h4"/><path d="M10 18h4"/></svg>
                                    <input type="text" name="company" class="hero-input" placeholder="<?= e((string) ($content['company_placeholder'] ?? '')) ?>" required>
                                </div>
                            </div>

                            <!-- Row 3: Service Required -->
                            <div class="hero-form-row" style="grid-template-columns: 1fr;">
                                <div class="hero-input-wrap">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 7h-9"/><path d="M14 17H5"/><circle cx="17" cy="17" r="3"/><circle cx="7" cy="7" r="3"/></svg>
                                    <select name="service" class="hero-select" required>
                                        <option value="" disabled selected><?= e((string) ($content['service_placeholder'] ?? '')) ?></option>
                                        <?php foreach ($serviceOptions as $serviceOption): ?>
                                            <option value="<?= e($serviceOption) ?>"><?= e($serviceOption) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <!-- Message -->
                            <div class="hero-form-row" style="grid-template-columns: 1fr; margin-bottom: 10px;">
                                <div class="hero-input-wrap textarea-wrap">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"/></svg>
                                    <textarea name="message" class="hero-textarea" rows="2" placeholder="<?= e((string) ($content['message_placeholder'] ?? '')) ?>"></textarea>
                                </div>
                            </div>

                            <!-- Checkboxes -->
                            <div class="hero-checks">
                                <label class="hero-check-label">
                                    <input type="checkbox" checked>
                                    <span><?= e((string) ($content['consent_text'] ?? '')) ?></span>
                                </label>

                                <div class="hero-check-box">
                                    <input type="checkbox" id="notRobot">
                                    <label for="notRobot" class="text"><?= e((string) ($content['robot_text'] ?? '')) ?></label>
                                    <span class="recaptcha"><?= e((string) ($content['recaptcha_text'] ?? '')) ?></span>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="hero-submit">
                                <?= e((string) ($content['submit_label'] ?? 'Submit')) ?>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                            </button>

                            <!-- Phone CTA -->
                            <p class="hero-callout">
                                <?= e((string) ($content['phone_label'] ?? 'or call us on')) ?> <a href="tel:<?= e((string) $phoneHref) ?>"><?= e($phoneNumber) ?></a>
                            </p>

                        </form>

                        <!-- Trust Strip -->
                        <div class="hero-trust">
                            <div class="hero-trust-item">
                                <div class="hero-trust-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                </div>
                                <span class="label"><?= e((string) ($content['trust_first'] ?? '')) ?></span>
                            </div>

                            <div class="hero-trust-item">
                                <div class="hero-trust-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/></svg>
                                </div>
                                <span class="label"><?= e((string) ($content['trust_second'] ?? '')) ?></span>
                            </div>

                            <div class="hero-trust-item">
                                <div class="hero-trust-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="8" width="18" height="4" rx="1"/><path d="M12 8v13"/><path d="M19 12v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-7"/><path d="M7.5 8a2.5 2.5 0 0 1 0-5A4.8 8 0 0 1 12 8a4.8 8 0 0 1 4.5-5 2.5 2.5 0 0 1 0 5"/></svg>
                                </div>
                                <span class="label"><?= e((string) ($content['trust_third'] ?? '')) ?></span>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
<script>
(function() {
    const heroForm = document.querySelector('.hero-form');
    if (!heroForm) return;

    heroForm.addEventListener('submit', function(e) {
        e.preventDefault();
        if (!heroForm.checkValidity()) {
            heroForm.reportValidity();
            return;
        }

        const submitBtn = heroForm.querySelector('.hero-submit');
        const origText = submitBtn ? submitBtn.innerHTML : 'Submit';
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.innerHTML = 'Sending...';
        }

        const formData = new FormData(heroForm);
        formData.append('ajax', '1');

        const oldMsg = heroForm.querySelector('.hero-ajax-msg');
        if (oldMsg) oldMsg.remove();

        fetch('/contact.php', {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            },
            body: formData
        })
        .then(r => r.json())
        .then(data => {
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.innerHTML = origText;
            }
            const msgBox = document.createElement('div');
            msgBox.className = 'hero-ajax-msg';
            msgBox.style.cssText = data.success
                ? 'background:#e6f9ed;border:1px solid #7be495;color:#155724;padding:12px 16px;border-radius:12px;margin-bottom:16px;font-weight:600;font-size:0.92rem;text-align:center;'
                : 'background:#ffe6ea;border:1px solid #f5a3b8;color:#9e0034;padding:12px 16px;border-radius:12px;margin-bottom:16px;font-weight:600;font-size:0.92rem;text-align:center;';
            msgBox.textContent = data.message || (data.success ? 'Consultation booked successfully!' : 'Please check your inputs.');
            heroForm.insertBefore(msgBox, heroForm.firstChild);
            if (data.success) {
                heroForm.reset();
            }
            msgBox.scrollIntoView({ behavior: 'smooth', block: 'center' });
        })
        .catch(() => {
            heroForm.submit();
        });
    });
})();
</script>
    <?php
}