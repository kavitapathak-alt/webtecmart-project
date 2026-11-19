<?php
function renderAboutBrandSection(): void
{
    $content = homepageAboutContent();
    $stats = $content['stats'];
    $whyChooseUs = $content['why_points'];
    $features = $content['features'];

    // Icon SVG helper
    if (!function_exists('abIcon')) {
        function abIcon(string $name): string {
            $icons = [
                'award'   => '<circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/>',
                'shield'  => '<path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/>',
                'dollar'  => '<line x1="12" x2="12" y1="2" y2="22"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>',
                'users2'  => '<path d="M14 19a6 6 0 0 0-12 0"/><circle cx="8" cy="9" r="4"/><path d="M22 19a6 6 0 0 0-6-6 4 4 0 1 0 0-8"/>',
                'rocket'  => '<path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"/><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"/><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"/><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"/>',
                'target'  => '<circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/>',
                'brain'   => '<path d="M12 5a3 3 0 1 0-5.997.125 4 4 0 0 0-2.526 5.77 4 4 0 0 0 .556 6.588A4 4 0 1 0 12 18Z"/><path d="M12 5a3 3 0 1 1 5.997.125 4 4 0 0 1 2.526 5.77 4 4 0 0 1-.556 6.588A4 4 0 1 1 12 18Z"/><path d="M15 13a4.5 4.5 0 0 1-3-4 4.5 4.5 0 0 1-3 4"/><path d="M17.599 6.5a3 3 0 0 0 .399-1.375"/><path d="M6.003 5.125A3 3 0 0 0 6.401 6.5"/><path d="M3.477 10.896a4 4 0 0 1 .585-.396"/><path d="M19.938 10.5a4 4 0 0 1 .585.396"/><path d="M6 18a4 4 0 0 1-1.967-.516"/><path d="M19.967 17.484A4 4 0 0 1 18 18"/>',
                'handshake' => '<path d="m11 17 2 2a1 1 0 1 0 3-3"/><path d="m14 14 2.5 2.5a1 1 0 1 0 3-3l-3.88-3.88a3 3 0 0 0-4.24 0l-.88.88a1 1 0 1 1-3-3l2.81-2.81a5.79 5.79 0 0 1 7.06-.87l.47.28a2 2 0 0 0 1.42.25L21 4"/><path d="m21 3 1 11h-2"/><path d="M3 3 2 14l6.5 6.5a1 1 0 1 0 3-3"/><path d="M3 4h8"/>',
                'heart'   => '<path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/><path d="M12 5 9.04 7.96a2.17 2.17 0 0 0 0 3.08c.82.82 2.13.85 3 .07l2.07-1.9a2.82 2.82 0 0 1 3.79 0l2.96 2.66"/><path d="m18 15-2-2"/><path d="m15 18-2-2"/>',
                'check'   => '<circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/>',
                'arrow'   => '<path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>',
                'sparkles'=> '<path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/><path d="M20 3v4"/><path d="M22 5h-4"/><path d="M4 17v2"/><path d="M5 18H3"/>',
                'user'    => '<path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>',
            ];
            $path = $icons[$name] ?? '';
            return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ab-svg-icon">' . $path . '</svg>';
        }
    }
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;12..96,800&display=swap" rel="stylesheet">

    <style>
        /* ============================================================
           ABOUT — "Expo Floor" design
           Brand story as a stall walk-through: ink-framed photo with a
           visitor-pass badge, dark stat chips, awning "why us" card,
           dark USP signboard and a 3D-press CTA.
        ============================================================ */
        .about-section {
            --ink: #1A0613;
            --ink2: #2B0B20;
            --pink: #C4007A;
            --pink2: #E0398F;
            --blush: #FBEAF3;
            --gold: #FFB547;
            --mint: #0E9F6E;
            --text: #2A2430;
            --mute: #6C6474;
            --disp: 'Bricolage Grotesque', 'Plus Jakarta Sans', system-ui, sans-serif;
            position: relative;
            width: 100%;
            padding: 96px 0 88px;
            background: #fff;
            overflow: hidden;
            color: var(--text);
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
        }
        .about-section *, .about-section *::before, .about-section *::after { box-sizing: border-box; }
        .about-section a:focus-visible { outline: 3px solid var(--gold); outline-offset: 3px; }
        .about-section .container { position: relative; z-index: 2; padding-left: 22px !important; padding-right: 22px !important; }

        /* Decorative Background (kept markup, restyled) */
        .about-bg { position: absolute; inset: 0; pointer-events: none; overflow: hidden; }
        .about-bg-grid {
            position: absolute; inset: 0;
            background-image: radial-gradient(rgba(26, 6, 19, .08) 1px, transparent 1.2px);
            background-size: 24px 24px;
            -webkit-mask-image: linear-gradient(180deg, #000 30%, transparent 100%);
                    mask-image: linear-gradient(180deg, #000 30%, transparent 100%);
        }
        .about-bg-blob-1, .about-bg-blob-2 { position: absolute; border-radius: 50%; filter: blur(80px); }
        .about-bg-blob-1 { top: -8%; right: -6%; width: 480px; height: 480px; background: rgba(196, 0, 122, .14); }
        .about-bg-blob-2 { bottom: -8%; left: -6%; width: 400px; height: 400px; background: rgba(255, 181, 71, .2); }

        /* ===== Header ===== */
        .about-header { position: relative; z-index: 10; text-align: left; max-width: 720px; margin: 0 0 56px; }
        .about-pill {
            display: inline-flex; align-items: center; gap: 8px; margin-bottom: 16px; padding: 0 0 0 14px;
            background: none; border: 0; border-left: 4px solid var(--pink); border-radius: 0; box-shadow: none;
        }
        .about-pill .ab-svg-icon { width: 14px; height: 14px; color: var(--pink); }
        .about-pill span { font-size: .82rem; color: var(--pink); font-weight: 700; letter-spacing: 0; text-transform: none; }
        .about-heading {
            font-family: var(--disp); font-size: clamp(2rem, 4vw, 3.1rem); font-weight: 800;
            color: var(--ink); margin: 0 0 16px; line-height: 1.08; letter-spacing: -.02em;
        }
        .about-heading .accent {
            position: relative; display: inline-block; color: var(--ink); padding: 0 .12em;
            background: linear-gradient(transparent 58%, var(--gold) 58% 92%, transparent 92%);
        }
        .about-heading .accent svg { display: none; }
        .about-subtitle { font-size: 1.02rem; color: var(--mute); max-width: 650px; margin: 0; line-height: 1.65; }
        .about-header::after { /* stripe bar */
            content: ''; display: block; width: 84px; height: 7px; margin-top: 22px;
            background: repeating-linear-gradient(90deg, var(--pink) 0 12px, var(--gold) 12px 24px);
        }

        /* ===== Main grid ===== */
        .about-grid { position: relative; z-index: 10; display: grid; grid-template-columns: minmax(0, 1fr); gap: 52px; align-items: start; }
        .about-grid > * { min-width: 0; }
        @media (min-width: 1024px) { .about-grid { grid-template-columns: minmax(0, 1fr) minmax(0, 1.1fr); gap: 64px; } }

        /* ===== LEFT ===== */
        .about-left { display: flex; flex-direction: column; gap: 30px; }

        .about-image-card {
            position: relative; border-radius: 20px; overflow: hidden; background: var(--ink);
            border: 2px solid var(--ink); box-shadow: 8px 8px 0 var(--ink);
            transition: translate .25s ease, box-shadow .25s ease;
        }
        .about-image-card:hover { translate: -4px -4px; box-shadow: 12px 12px 0 var(--pink); transform: none; }
        .about-image-inner { position: relative; width: 100%; aspect-ratio: 4 / 3; }
        .about-image-inner img { width: 100%; height: 100%; object-fit: cover; display: block; }
        .about-image-overlay { position: absolute; inset: 0; background: linear-gradient(to top, rgba(26, 6, 19, .78), transparent 60%); }

        .about-brand-badge { /* visitor pass */
            position: absolute; bottom: 18px; left: 18px;
            background: #fff; backdrop-filter: none; border: 2px solid var(--ink); border-radius: 12px;
            padding: 10px 16px; box-shadow: 4px 4px 0 var(--gold);
        }
        .about-brand-badge h3 { font-family: var(--disp); font-size: 1.1rem; font-weight: 800; color: var(--pink); margin: 0 0 2px; letter-spacing: -.01em; }
        .about-brand-badge p { font-size: .75rem; color: var(--text); font-weight: 600; margin: 0; }

        /* Stats = dark signage chips */
        .about-stats { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 16px; }
        .about-stat {
            background: var(--ink); border: 2px solid var(--ink); border-radius: 14px; padding: 20px 14px; text-align: center;
            box-shadow: 4px 4px 0 var(--blush); transition: translate .25s ease;
        }
        .about-stat:hover { translate: 0 -4px; box-shadow: 4px 4px 0 var(--blush); border-color: var(--ink); transform: none; }
        .about-stat .ab-svg-icon {
            display: block; width: 24px; height: 24px; margin: 0 auto 12px; padding: 7px; box-sizing: content-box;
            background: var(--gold); color: var(--ink); border-radius: 10px; border: 2px solid #fff;
        }
        .about-stat .value { font-family: var(--disp); font-size: 1.7rem; font-weight: 800; color: var(--gold); line-height: 1.1; }
        .about-stat .label { font-size: .8rem; font-weight: 600; color: rgba(255, 255, 255, .75); margin-top: 6px; }

        /* Why choose us = awning stall */
        .about-why {
            position: relative; background: #fff; border: 2px solid var(--ink); border-radius: 18px;
            padding: 52px 26px 26px; box-shadow: 6px 6px 0 var(--ink);
        }
        .about-why::before { /* awning */
            content: ''; position: absolute; top: 0; left: 0; right: 0; height: 26px; border-radius: 15px 15px 0 0;
            background: repeating-linear-gradient(90deg, var(--pink) 0 22px, #fff 22px 44px);
            border-bottom: 2px solid var(--ink);
        }
        .about-why h4 { font-family: var(--disp); font-weight: 800; color: var(--ink); font-size: 1.35rem; letter-spacing: -.02em; margin: 0 0 16px; }
        .about-why ul { list-style: none; padding: 0; margin: 0 0 24px; display: flex; flex-direction: column; gap: 12px; }
        .about-why li { display: flex; align-items: flex-start; gap: 12px; }
        .about-why li .ab-svg-icon { width: 22px; height: 22px; flex-shrink: 0; color: var(--pink); background: var(--blush); border-radius: 50%; padding: 1px; }
        .about-why li span { font-size: .95rem; color: var(--text); line-height: 1.55; font-weight: 500; overflow-wrap: anywhere; }

        .about-why-footer { padding-top: 20px; display: flex; align-items: center; gap: 16px; border-top: 2px dashed rgba(196, 0, 122, .35); }
        .about-avatars { display: flex; }
        .about-avatars > div {
            width: 34px; height: 34px; border-radius: 50%; margin-left: -10px; display: grid; place-items: center;
            background: var(--gold); border: 2px solid var(--ink); box-shadow: none;
        }
        .about-avatars > div:nth-child(even) { background: var(--blush); }
        .about-avatars > div:first-child { margin-left: 0; }
        .about-avatars .ab-svg-icon { width: 16px; height: 16px; color: var(--ink); }
        .about-trust-text { font-size: .85rem; color: var(--mute); font-weight: 500; margin: 0; }
        .about-trust-text .bold { font-weight: 800; color: var(--pink); }

        /* ===== RIGHT ===== */
        .about-right { display: flex; flex-direction: column; gap: 34px; }
        .about-right h3 { font-family: var(--disp); font-size: clamp(1.6rem, 2.8vw, 2.3rem); font-weight: 800; color: var(--ink); margin: 0 0 16px; line-height: 1.15; letter-spacing: -.02em; }
        .about-right h3 .accent { color: var(--ink); padding: 0 .1em; background: linear-gradient(transparent 58%, var(--gold) 58% 92%, transparent 92%); }
        .about-right p { font-size: 1rem; color: var(--mute); line-height: 1.75; margin: 0 0 16px; overflow-wrap: anywhere; }
        .about-right p .bold { font-weight: 700; color: var(--pink); }

        /* Features = mini stalls */
        .about-features { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 20px; }
        .about-feature {
            background: #fff; border: 2px solid var(--ink); border-radius: 16px; padding: 22px 20px;
            box-shadow: 4px 4px 0 var(--blush); transition: translate .25s ease, box-shadow .25s ease;
        }
        .about-feature:hover { translate: -3px -3px; box-shadow: 7px 7px 0 var(--pink); border-color: var(--ink); transform: none; }
        .about-feature .ab-svg-icon {
            display: block; width: 22px; height: 22px; margin-bottom: 14px; padding: 8px; box-sizing: content-box;
            color: var(--pink); background: var(--blush); border: 2px solid var(--ink); border-radius: 10px; box-shadow: 3px 3px 0 var(--gold);
        }
        .about-feature h4 { font-family: var(--disp); font-weight: 700; color: var(--ink); font-size: 1.1rem; letter-spacing: -.01em; margin: 0 0 6px; }
        .about-feature p { font-size: .88rem; color: var(--mute); line-height: 1.6; margin: 0; }

        /* USP = dark signboard */
        .about-usp {
            position: relative; overflow: hidden; border-radius: 18px; padding: 24px 24px 24px 28px;
            background: radial-gradient(60% 90% at 100% 0%, rgba(196, 0, 122, .5), transparent 70%), var(--ink);
            border: 2px solid var(--ink); box-shadow: 6px 6px 0 var(--gold);
        }
        .about-usp::before { top: 0; left: 0; width: 8px; height: 100%; background: repeating-linear-gradient(180deg, var(--gold) 0 14px, var(--pink) 14px 28px); }
        .about-usp-inner { position: relative; display: flex; align-items: flex-start; gap: 16px; }
        .about-usp-icon {
            width: 46px; height: 46px; border-radius: 12px; flex-shrink: 0; display: grid; place-items: center;
            background: var(--gold); border: 2px solid #fff; box-shadow: none;
        }
        .about-usp-icon .ab-svg-icon { width: 22px; height: 22px; color: var(--ink); }
        .about-usp h5 { font-family: var(--disp); font-weight: 800; color: #fff; font-size: 1.2rem; letter-spacing: -.01em; margin: 0 0 6px; }
        .about-usp p { font-size: .92rem; color: rgba(255, 255, 255, .78); line-height: 1.6; margin: 0; }

        /* CTA row */
        .about-cta-row { display: flex; flex-wrap: wrap; align-items: center; gap: 20px; margin-top: 6px; }
        .about-cta-btn {
            display: inline-flex; align-items: center; justify-content: center; gap: 10px;
            padding: 15px 28px; border-radius: 12px; border: 2px solid transparent;
            background: var(--pink); color: #fff; font-weight: 700; font-size: 1rem; line-height: 1.2; text-decoration: none; cursor: pointer;
            box-shadow: 0 6px 0 #7E004E; transition: translate .2s ease, box-shadow .2s ease;
        }
        .about-cta-btn:hover { translate: 0 2px; transform: none; box-shadow: 0 4px 0 #7E004E; background: var(--pink); color: #fff; }
        .about-cta-btn:active { translate: 0 6px; box-shadow: 0 0 0 #7E004E; }
        .about-cta-btn .ab-svg-icon { width: 18px; height: 18px; flex-shrink: 0; }
        .about-cta-excellence { display: flex; align-items: center; gap: 8px; font-size: .95rem; font-weight: 600; color: var(--text); }
        .about-cta-excellence .ab-svg-icon { width: 22px; height: 22px; color: var(--mint); flex-shrink: 0; }

        /* ===== Responsive ===== */
        @media (min-width: 1440px) { .about-section .container { max-width: 1320px !important; } }
        @media (max-width: 767px) {
            .about-section { padding: 68px 0 64px; }
            .about-section .container { padding-left: 16px !important; padding-right: 16px !important; }
            .about-header { margin-bottom: 40px; }
            .about-grid { gap: 44px; }
            .about-features { grid-template-columns: minmax(0, 1fr); }
            .about-image-card { box-shadow: 5px 5px 0 var(--ink); }
            .about-brand-badge { bottom: 12px; left: 12px; padding: 8px 12px; box-shadow: 3px 3px 0 var(--gold); }
            .about-brand-badge h3 { font-size: .95rem; }
            .about-why { padding: 50px 20px 22px; box-shadow: 4px 4px 0 var(--ink); }
            .about-usp { padding: 22px 18px 22px 24px; box-shadow: 4px 4px 0 var(--gold); }
            .about-cta-row { flex-direction: column; align-items: stretch; }
            .about-cta-btn { width: 100%; min-height: 48px; }
            .about-cta-excellence { justify-content: center; }
            .about-bg-blob-1, .about-bg-blob-2 { filter: blur(48px); }
        }
        @media (max-width: 380px) { .about-stats { grid-template-columns: minmax(0, 1fr); } }
        @media (hover: none) {
            .about-image-card:hover, .about-feature:hover, .about-stat:hover { translate: none; }
            .about-image-card:hover { box-shadow: 8px 8px 0 var(--ink); }
            .about-feature:hover { box-shadow: 4px 4px 0 var(--blush); }
        }
        @media (prefers-reduced-motion: reduce) {
            .about-image-card, .about-feature, .about-stat, .about-cta-btn { transition: none; }
        }
    </style>

    <section class="about-section" id="aboutSection">
        <!-- Decorative Background -->
        <div class="about-bg" aria-hidden="true">
            <div class="about-bg-grid"></div>
            <div class="about-bg-blob-1"></div>
            <div class="about-bg-blob-2"></div>
        </div>

        <div class="container" style="max-width: 1280px; margin: 0 auto; padding: 0 20px;">
            <!-- Header -->
            <div class="about-header" data-wtm-reveal="fade-up">
                <div class="about-pill">
                    <?= abIcon('sparkles') ?>
                    <span><?= e((string) $content['badge']) ?></span>
                </div>

                <h2 class="about-heading">
                    <?= e((string) $content['heading_prefix']) ?>
                    <?php if ($content['heading_highlight'] !== ''): ?>
                        <span class="accent">
                            <?= e((string) $content['heading_highlight']) ?>
                            <svg viewBox="0 0 300 6" preserveAspectRatio="none">
                                <path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="4" stroke-linecap="round" fill="none" opacity="0.4"/>
                            </svg>
                        </span>
                    <?php endif; ?>
                    <?= e((string) $content['heading_suffix']) ?>
                </h2>

                <p class="about-subtitle">
                    <?= e((string) $content['summary']) ?>
                </p>
            </div>

            <!-- Main Grid -->
            <div class="about-grid">
                <!-- LEFT COLUMN -->
                <div class="about-left">
                    <!-- Image Card -->
                    <div class="about-image-card" data-wtm-reveal="fade-right">
                        <div class="about-image-inner">
                            <img src="<?= e((string) $content['image_src']) ?>" alt="<?= e((string) $content['image_alt']) ?>" loading="lazy">
                            <div class="about-image-overlay"></div>
                            <div class="about-brand-badge wtm-float">
                                <h3><?= e((string) $content['brand_name']) ?></h3>
                                <p><?= e((string) $content['brand_tagline']) ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Stats Cards -->
                    <div class="about-stats">
                        <?php foreach ($stats as $stat): ?>
                            <div class="about-stat">
                                <?= abIcon($stat['icon']) ?>
                                <div class="value"><?= htmlspecialchars($stat['value']) ?></div>
                                <div class="label"><?= htmlspecialchars($stat['label']) ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Why Choose Us -->
                    <div class="about-why">
                        <h4><?= e((string) $content['why_heading']) ?></h4>
                        <ul>
                            <?php foreach ($whyChooseUs as $point): ?>
                                <li>
                                    <?= abIcon('check') ?>
                                    <span><?= e((string) $point) ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="about-why-footer">
                            <div class="about-avatars">
                                <?php for ($i = 0; $i < 4; $i++): ?>
                                    <div><?= abIcon('user') ?></div>
                                <?php endfor; ?>
                            </div>
                            <p class="about-trust-text">
                                <?= e((string) $content['trust_prefix']) ?> <span class="bold"><?= e((string) $content['trust_highlight']) ?></span> <?= e((string) $content['trust_suffix']) ?>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- RIGHT COLUMN -->
                <div class="about-right" data-wtm-reveal="fade-left">
                    <div>
                        <h3>
                            <?= e((string) $content['content_heading_prefix']) ?>
                            <span class="accent"><?= e((string) $content['content_heading_highlight']) ?></span>
                        </h3>
                        <?php foreach ($content['paragraphs'] as $paragraph): ?>
                            <?php if (trim((string) $paragraph) !== ''): ?><p><?= e((string) $paragraph) ?></p><?php endif; ?>
                        <?php endforeach; ?>
                    </div>

                    <!-- Features Grid -->
                    <div class="about-features" data-reveal-stagger>
                        <?php foreach ($features as $feature): ?>
                            <div class="about-feature">
                                <?= abIcon($feature['icon']) ?>
                                <h4><?= htmlspecialchars($feature['title']) ?></h4>
                                <p><?= htmlspecialchars($feature['description']) ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- USP Badge -->
                    <div class="about-usp">
                        <div class="about-usp-inner">
                            <div class="about-usp-icon">
                                <?= abIcon('heart') ?>
                            </div>
                            <div>
                                <h5><?= e((string) $content['usp_title']) ?></h5>
                                <p><?= e((string) $content['usp_description']) ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- CTA -->
                    <div class="about-cta-row">
                        <a href="<?= e((string) $content['cta_href']) ?>" class="about-cta-btn">
                            <?= e((string) $content['cta_label']) ?>
                            <?= abIcon('arrow') ?>
                        </a>
                        <div class="about-cta-excellence">
                            <?= abIcon('check') ?>
                            <span><?= e((string) $content['excellence_text']) ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
}