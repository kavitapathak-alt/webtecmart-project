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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;12..96,800&display=swap" rel="stylesheet">

    <style>
        /* ============================================================
           HERO — "Expo Floor" colour edition (matches portfolio page)
           ============================================================ */
        .hero {
            --pink: #C4007A;
            --pink2: #E0398F;
            --pink3: #FF7BC0;
            --deep: #7E004E;
            --head: #5E0B45;
            --blush: #FBEAF3;
            --soft: #FFF4FA;
            --gold: #FFB547;
            --mint: #0E9F6E;
            --text: #4A3342;
            --mute: #7A6574;
            --line: rgba(126, 0, 78, 0.14);
            --disp: 'Bricolage Grotesque', 'Plus Jakarta Sans', system-ui, sans-serif;
            position: relative;
            width: 100%;
            padding: 64px 0 72px;
            overflow: hidden;
            color: #fff;
            background:
                radial-gradient(60% 70% at 85% 10%, rgba(255,255,255,.18), transparent 65%),
                radial-gradient(40% 50% at 0% 100%, rgba(255,181,71,.3), transparent 70%),
                linear-gradient(135deg, #A8006A 0%, #C4007A 45%, #E0398F 100%);
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
        }
        .hero *, .hero *::before, .hero *::after { box-sizing: border-box; }
        .hero::before {
            content: ''; position: absolute; inset: 0; pointer-events: none;
            background-image: radial-gradient(rgba(255,255,255,.15) 1px, transparent 1.2px);
            background-size: 26px 26px;
            -webkit-mask-image: linear-gradient(180deg, #000 30%, transparent 95%);
                    mask-image: linear-gradient(180deg, #000 30%, transparent 95%);
        }
        .hero a:focus-visible, .hero button:focus-visible, .hero input:focus-visible,
        .hero select:focus-visible, .hero textarea:focus-visible { outline: 3px solid var(--gold); outline-offset: 2px; }
        .hero .container { position: relative; z-index: 2; }
        .hero h1, .hero h2 { font-family: var(--disp); letter-spacing: -.02em; }

        /* Decorative background */
        .hero-bg { position: absolute; inset: 0; pointer-events: none; overflow: hidden; }
        .hero-bg-blob-1, .hero-bg-blob-2 { position: absolute; border-radius: 50%; filter: blur(80px); }
        .hero-bg-blob-1 { top: -10%; right: 6%; width: 420px; height: 420px; background: rgba(255, 181, 71, .28); }
        .hero-bg-blob-2 { bottom: -12%; left: 30%; width: 360px; height: 360px; background: rgba(224, 57, 143, .35); }
        .hero-bg-svg { position: absolute; fill: none; stroke: rgba(255, 255, 255, .5); stroke-width: 1.5; }
        .hero-bg-svg-1 { top: -30px; right: 15%; width: 110px; height: 110px; opacity: .3; }
        .hero-bg-svg-2 { top: 25%; right: 3%; width: 70px; height: 70px; opacity: .22; }
        .hero-bg-svg-3 { bottom: 12%; left: 46%; width: 80px; height: 80px; opacity: .18; }

        /* Grid */
        .hero-inner { position: relative; z-index: 10; display: grid; grid-template-columns: minmax(0, 1fr); gap: 44px; align-items: center; }
        .hero-inner > * { min-width: 0; }

        /* LEFT copy */
        .hero-left { display: flex; flex-direction: column; justify-content: center; height: 100%; }

        .hero-badge {
            display: inline-flex; align-items: center; gap: 8px; width: fit-content; margin-bottom: 22px;
            padding: 7px 15px 7px 11px; border-radius: 999px;
            background: rgba(255,255,255,.18); border: 1px solid rgba(255,255,255,.45);
            backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);
        }
        .hero-badge svg { width: 14px; height: 14px; color: var(--gold); flex-shrink: 0; }
        .hero-badge span { color: #fff; font-weight: 700; font-size: .8rem; }
        .hero-badge::before {
            content: ''; width: 8px; height: 8px; border-radius: 50%;
            background: var(--gold); box-shadow: 0 0 0 4px rgba(255,181,71,.3);
            flex-shrink: 0;
        }
        .hero-badge > svg:first-child { display: none; }

        .hero-heading {
            font-family: var(--disp); font-weight: 800; color: #fff; line-height: 1.06; letter-spacing: -.035em;
            font-size: clamp(2.3rem, 5vw, 4rem); margin: 0 0 20px; word-break: normal; overflow-wrap: break-word;
            text-shadow: 0 4px 0 var(--deep), 0 8px 24px rgba(126,0,78,.5);
            position: relative; z-index: 5;
        }
        .hero-heading .accent { color: var(--gold); text-shadow: 0 3px 0 var(--pink); }
        .hero-heading .underline-wrap { position: relative; display: inline-block; color: var(--gold); }
        .hero-heading .underline-svg { position: absolute; left: 0; bottom: -6px; width: 100%; height: 10px; pointer-events: none; }
        .hero-heading .underline-svg path { stroke: #fff; opacity: .9; stroke-width: 3; }
        .hero-heading .highlight-wrap { position: relative; display: inline-block; }
        .hero-heading .highlight-wrap .text {
    position: relative; 
    z-index: 2;
    color: var(--gold); /* Solid Yellow */
    text-shadow: 0 4px 0 var(--deep), 0 8px 24px rgba(126,0,78,.5); /* Portfolio wali deep shadow */
}
        @keyframes heroShine { to { background-position: 200% 0; } }

        .hero-desc { font-size: 1.05rem; color: rgba(255,255,255,.88); margin: 0 0 12px; line-height: 1.7; max-width: 600px; }
        .hero-desc-sm {
            font-size: .9rem; color: rgba(255,255,255,.72); margin: 0 0 24px; line-height: 1.65; max-width: 600px;
            padding-top: 14px; border-top: 1px dashed rgba(255,255,255,.35);
        }

        .hero-benefits { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 12px; }
        .hero-benefits li { display: flex; align-items: flex-start; gap: 12px; }
        .hero-benefits .check-icon {
            width: 24px; height: 24px; border-radius: 50%; flex-shrink: 0; margin-top: 0;
            display: grid; place-items: center; background: var(--gold); border: 2px solid #fff;
        }
        .hero-benefits .check-icon svg { width: 16px; height: 16px; color: var(--deep); }
        .hero-benefits .text { font-size: .95rem; color: rgba(255,255,255,.95); line-height: 1.55; font-weight: 500; overflow-wrap: anywhere; }

        /* RIGHT — form card (registration pass) */
        .hero-right {
            position: relative; overflow: hidden; display: flex; flex-direction: column; justify-content: center; height: 100%;
            background: #fff; color: var(--text);
            border: 2px solid var(--deep); border-radius: 22px; padding: 42px 22px 24px;
            box-shadow: 8px 8px 0 var(--gold);
        }
        .hero-right::before {
            content: ''; position: absolute; top: 0; left: 0; right: 0; width: auto; height: 14px; border-radius: 0; border: 0;
            border-bottom: 2px solid var(--deep);
            background: repeating-linear-gradient(90deg, var(--pink) 0 22px, var(--deep) 22px 44px);
        }
        .hero-right-blob { display: none; }
        .hero-form-content { position: relative; z-index: 10; display: flex; flex-direction: column; height: 100%; }

        .hero-form-header { margin-bottom: 18px; }
        .hero-form-top-row { display: flex; align-items: center; justify-content: space-between; gap: 10px; margin-bottom: 12px; flex-wrap: wrap; }
        .hero-form-kicker {
            display: inline-flex; align-items: center; gap: 6px; padding-left: 10px; border-left: 4px solid var(--pink);
            color: var(--pink); font-size: .8rem; font-weight: 800;
        }
        .hero-form-kicker svg { width: 14px; height: 14px; color: var(--pink); flex-shrink: 0; }
        .hero-rating-badge {
            display: inline-flex; align-items: center; gap: 5px; white-space: nowrap; rotate: 2deg;
            background: var(--gold); border: 2px solid var(--deep); border-radius: 10px; padding: 5px 10px;
            box-shadow: 3px 3px 0 var(--deep); font-size: .72rem; font-weight: 700; color: var(--deep);
        }
        .hero-rating-badge span { color: var(--deep); font-weight: 800; }

        .hero-form-header h2 {
            display: block; width: 100%; margin: 0 0 6px; font-family: var(--disp); font-weight: 800; color: var(--head);
            font-size: clamp(1.4rem, 2.2vw, 1.8rem); line-height: 1.15; letter-spacing: -.02em;
        }
        .hero-form-header .subtitle { color: var(--mute); font-size: .88rem; line-height: 1.55; margin: 0 0 6px; }
        .hero-form-header .contact-for { font-size: .78rem; color: var(--mute); margin: 0; line-height: 1.45; }
        .hero-form-header .contact-for .label { font-weight: 800; color: var(--pink); }

        /* Form */
        .hero-form { display: flex; flex-direction: column; }
        .hero-form-row { display: grid; grid-template-columns: minmax(0, 1fr); gap: 12px; margin-bottom: 12px; }
        .hero-form-row > * { min-width: 0; }
        .hero-input-wrap { position: relative; }
        .hero-input-wrap svg { position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 15px; height: 15px; color: var(--pink); pointer-events: none; }
        .hero-input-wrap.textarea-wrap svg { top: 15px; transform: none; }

        .hero-input, .hero-textarea, .hero-select {
            width: 100%; min-width: 0; border-radius: 10px; border: 2px solid #E4DCE6; background: #FCFAFD;
            padding: 11px 12px 11px 34px; font-size: .88rem; color: var(--deep); font-family: inherit;
            transition: border-color .2s, box-shadow .2s, background .2s; outline: none;
        }
        .hero-select {
            appearance: none; -webkit-appearance: none; -moz-appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23C4007A' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='m6 9 6 6 6-6'/%3E%3C/svg%3E");
            background-repeat: no-repeat; background-position: right 12px center; background-size: 14px 14px;
            padding-right: 34px; cursor: pointer; color-scheme: light;
        }
        .hero-select:invalid { color: #9C94A4; }
        .hero-select option { color: var(--deep); background: #fff; }
        .hero-input::placeholder, .hero-textarea::placeholder { color: #9C94A4; }
        .hero-input:focus, .hero-textarea:focus, .hero-select:focus {
            border-color: var(--pink); background: #fff; box-shadow: 0 0 0 4px rgba(196, 0, 122, .14);
        }
        .hero-input-wrap:focus-within svg { color: var(--pink2); }
        .hero-textarea { resize: none; min-height: 70px; padding-top: 12px; }

        /* Checkboxes */
        .hero-checks { display: flex; flex-direction: column; gap: 8px; margin-bottom: 14px; }
        .hero-check-label { display: flex; cursor: pointer; align-items: flex-start; gap: 8px; font-size: .74rem; color: var(--mute); line-height: 1.45; }
        .hero-check-label input[type="checkbox"] { margin-top: 2px; width: 15px; height: 15px; accent-color: var(--pink); cursor: pointer; flex-shrink: 0; }
        .hero-check-box {
            display: flex; align-items: center; gap: 10px; border-radius: 10px; border: 2px solid #E4DCE6;
            background: #FCFAFD; padding: 8px 12px;
        }
        .hero-check-box input[type="checkbox"] { width: 16px; height: 16px; accent-color: var(--pink); cursor: pointer; flex-shrink: 0; }
        .hero-check-box .text { font-size: .8rem; color: var(--text); font-weight: 600; }
        .hero-check-box .recaptcha { margin-left: auto; font-size: .6rem; color: #9C94A4; }

        /* Submit */
        .hero-submit {
            position: relative; overflow: hidden; width: 100%; display: flex; align-items: center; justify-content: center; gap: 10px;
            padding: 15px 20px; border-radius: 12px; border: 2px solid var(--deep); cursor: pointer; font-family: inherit;
            background: var(--pink); color: #fff; font-weight: 800; font-size: .95rem; line-height: 1.2;
            box-shadow: 0 6px 0 var(--deep); transition: translate .2s ease, box-shadow .2s ease;
        }
        .hero-submit:hover { translate: 0 2px; box-shadow: 0 4px 0 var(--deep); }
        .hero-submit:active { translate: 0 6px; box-shadow: 0 0 0 var(--deep); }
        .hero-submit:disabled { opacity: .7; cursor: wait; }
        .hero-submit svg { width: 16px; height: 16px; flex-shrink: 0; }
        .hero-submit::after {
            content: ''; position: absolute; top: 0; bottom: 0; left: -60%; width: 40%; transform: skewX(-20deg); pointer-events: none;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,.35), transparent); animation: heroSweep 3.2s ease-in-out infinite;
        }
        @keyframes heroSweep { 0% { left: -60%; } 55%, 100% { left: 130%; } }

        .hero-callout { text-align: center; font-size: .8rem; color: var(--mute); margin: 14px 0 0; }
        .hero-callout a { color: var(--pink); font-weight: 800; text-decoration: none; }
        .hero-callout a:hover { text-decoration: underline; }

        /* Trust strip */
        .hero-trust {
            display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 8px;
            padding-top: 16px; margin-top: 16px; border-top: 2px dashed rgba(196, 0, 122, .35);
        }
        .hero-trust-item { display: flex; flex-direction: column; align-items: center; text-align: center; gap: 6px; }
        .hero-trust-icon {
            width: 32px; height: 32px; border-radius: 50%; display: grid; place-items: center;
            background: var(--gold); border: 2px solid var(--deep); box-shadow: 2px 2px 0 var(--deep);
        }
        .hero-trust-icon svg { width: 15px; height: 15px; color: var(--deep); }
        .hero-trust-item .label { font-size: .7rem; color: var(--text); font-weight: 700; line-height: 1.3; }

        /* Responsive */
        @media (min-width: 640px) {
            .hero-form-row { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .hero-right { padding: 44px 30px 28px; }
        }
        @media (min-width: 1024px) {
            .hero { padding: 80px 0 88px; }
            .hero-inner { grid-template-columns: minmax(0, 1.05fr) minmax(0, .95fr); gap: 56px; }
        }
        @media (min-width: 1440px) { .hero .container { max-width: 1320px; } }
        @media (max-width: 767px) {
            .hero-bg-blob-1, .hero-bg-blob-2 { filter: blur(48px); }
            .hero-bg-svg { display: none; }
        }
        @media (max-width: 575px) {
            .hero { padding: 48px 0 56px; }
            .hero-right { border-radius: 18px; box-shadow: 5px 5px 0 var(--gold); }
            .hero-input, .hero-textarea, .hero-select { font-size: 16px; }
            .hero-submit { min-height: 50px; }
        }
        @media (prefers-reduced-motion: reduce) {
            .hero-heading .highlight-wrap .text, .hero-submit::after { animation: none; }
            .hero-submit { transition: none; }
        }
    </style>

    <section class="hero">
        <div class="hero-bg" aria-hidden="true">
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

                    <div class="hero-badge">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/><path d="M20 3v4"/><path d="M22 5h-4"/><path d="M4 17v2"/><path d="M5 18H3"/></svg>
                        <span><?= e((string) ($content['badge'] ?? 'DIGITAL GROWTH AGENCY')) ?></span>
                    </div>

                    <h1 class="hero-heading">
                        <?= e((string) ($content['heading_prefix'] ?? '')) ?>
                        <?php if (!empty($content['heading_underline'])): ?>
                            <span class="underline-wrap">
                                <span class="text accent"><?= e((string) $content['heading_underline']) ?></span>
                                <svg class="underline-svg" viewBox="0 0 300 12" preserveAspectRatio="none">
                                    <path d="M2 6C60 2 240 2 298 6" stroke="#FFB547" stroke-width="3" stroke-linecap="round" fill="none" opacity="0.9"/>
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

                    <?php if ($mainDescription !== ''): ?>
                        <p class="hero-desc"><?= e($mainDescription) ?></p>
                    <?php endif; ?>

                    <?php if (!empty($content['description_secondary'])): ?>
                        <p class="hero-desc-sm"><?= e((string) $content['description_secondary']) ?></p>
                    <?php endif; ?>

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

                        <form class="hero-form" method="POST" action="/contact.php">

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

                            <div class="hero-form-row" style="grid-template-columns: 1fr; margin-bottom: 10px;">
                                <div class="hero-input-wrap textarea-wrap">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"/></svg>
                                    <textarea name="message" class="hero-textarea" rows="2" placeholder="<?= e((string) ($content['message_placeholder'] ?? '')) ?>"></textarea>
                                </div>
                            </div>

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

                            <button type="submit" class="hero-submit">
                                <?= e((string) ($content['submit_label'] ?? 'Submit')) ?>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                            </button>

                            <p class="hero-callout">
                                <?= e((string) ($content['phone_label'] ?? 'or call us on')) ?> <a href="tel:<?= e((string) $phoneHref) ?>"><?= e($phoneNumber) ?></a>
                            </p>

                        </form>

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
                ? 'background:#e6f9ed;border:2px solid #0E9F6E;color:#0E9F6E;padding:12px 16px;border-radius:12px;margin-bottom:16px;font-weight:700;font-size:0.92rem;text-align:center;'
                : 'background:#ffe6ea;border:2px solid #C4007A;color:#9e0034;padding:12px 16px;border-radius:12px;margin-bottom:16px;font-weight:700;font-size:0.92rem;text-align:center;';
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