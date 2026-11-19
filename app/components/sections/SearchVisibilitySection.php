<?php

function renderSearchVisibilitySection(): void
{
    $content = homepageVisibilityContent();
    $services = $content['services'];
    ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;12..96,800&display=swap" rel="stylesheet">

    <style>
        /* =========================================================
           SEARCH VISIBILITY — "Expo Floor" design
           The dark hall: ink background, aurora glow, white stall
           cards with gold offset shadows and gold number tabs.
        ========================================================= */

        .search-visibility-section {
            --ink: #1A0613;
            --ink2: #2B0B20;
            --pink: #C4007A;
            --pink2: #E0398F;
            --blush: #FBEAF3;
            --gold: #FFB547;
            --text: #2A2430;
            --mute: #6C6474;
            --disp: 'Bricolage Grotesque', 'Plus Jakarta Sans', system-ui, sans-serif;
            position: relative;
            width: 100%;
            padding: 96px 0 88px;
            color: #fff;
            background:
                radial-gradient(50% 60% at 92% 0%, rgba(196, 0, 122, .38), transparent 70%),
                radial-gradient(40% 50% at 0% 100%, rgba(255, 181, 71, .14), transparent 70%),
                var(--ink);
            overflow: hidden;
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
        }
        .search-visibility-section *, .search-visibility-section *::before, .search-visibility-section *::after { box-sizing: border-box; }
        .search-visibility-section a:focus-visible { outline: 3px solid var(--gold); outline-offset: 3px; }

        /* Decorative background (kept markup, restyled) */
        .search-bg { position: absolute; inset: 0; pointer-events: none; overflow: hidden; }
        .search-bg-grid {
            position: absolute; inset: 0;
            background-image: radial-gradient(rgba(255, 255, 255, .14) 1px, transparent 1.2px);
            background-size: 26px 26px;
            -webkit-mask-image: linear-gradient(180deg, #000 30%, transparent 95%);
                    mask-image: linear-gradient(180deg, #000 30%, transparent 95%);
        }
        .search-bg-glow-top, .search-bg-glow-bottom { position: absolute; border-radius: 50%; filter: blur(80px); }
        .search-bg-glow-top { top: -12%; right: -6%; width: 520px; height: 520px; background: rgba(196, 0, 122, .35); }
        .search-bg-glow-bottom { bottom: -14%; left: 30%; width: 420px; height: 420px; background: rgba(255, 181, 71, .16); }

        .search-visibility-wrap {
            position: relative; z-index: 2; text-align: left;
            max-width: 1280px; margin: 0 auto; padding: 0 22px;
        }

        /* ===== Header ===== */
        .search-section-header { position: relative; z-index: 10; text-align: left; max-width: 720px; margin: 0 0 56px; }
        .search-section-pill {
            display: inline-flex; align-items: center; gap: 8px; margin-bottom: 16px; padding: 0 0 0 14px;
            background: none; border: 0; border-left: 4px solid var(--gold); border-radius: 0; box-shadow: none;
            color: var(--gold); font-size: .82rem; font-weight: 700; letter-spacing: 0; text-transform: none;
        }
        .search-section-pill svg { width: 14px; height: 14px; color: var(--gold); flex-shrink: 0; }
        .search-section-header h2 {
            font-family: var(--disp); font-size: clamp(2rem, 4vw, 3.1rem); font-weight: 800;
            color: #fff; margin: 0 0 16px; line-height: 1.08; letter-spacing: -.02em;
        }
        .search-heading-highlight { position: relative; display: inline-block; color: var(--gold); }
        .search-heading-highlight svg { position: absolute; left: 0; bottom: -6px; width: 100%; height: 8px; pointer-events: none; overflow: visible; }
        .search-heading-highlight path { fill: none; stroke: var(--pink2); stroke-width: 3; stroke-linecap: round; opacity: 1; }
        .search-visibility-intro { font-size: 1.05rem; line-height: 1.7; color: rgba(255, 255, 255, .75); max-width: 600px; margin: 0; }
        .search-section-header::after { /* stripe bar */
            content: ''; display: block; width: 84px; height: 7px; margin-top: 24px;
            background: repeating-linear-gradient(90deg, var(--pink) 0 12px, var(--gold) 12px 24px);
        }

        /* ===== Grid ===== */
        .search-grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 30px; margin-bottom: 64px; }
        .search-grid > * { min-width: 0; }

        .search-card {
            position: relative; overflow: hidden; text-align: left; color: var(--text);
            padding: 30px 26px 24px; background: #fff;
            border: 2px solid var(--ink); border-radius: 18px;
            box-shadow: 6px 6px 0 var(--gold);
            transition: translate .25s ease, box-shadow .25s ease;
        }
        .search-card::before { /* top tab line */
            content: ''; position: absolute; top: 0; left: 0; right: 0; height: 8px;
            background: repeating-linear-gradient(90deg, var(--pink) 0 22px, var(--ink) 22px 44px);
            border-bottom: 2px solid var(--ink);
        }
        .search-card:hover { translate: -4px -4px; box-shadow: 10px 10px 0 var(--pink); border-color: var(--ink); }
        .search-card-content { position: relative; z-index: 2; padding-top: 8px; }

        /* Icon + number */
        .search-icon-wrap { position: relative; display: flex; align-items: center; justify-content: space-between; gap: 12px; margin-bottom: 22px; }
        .search-icon-box {
            display: grid; place-items: center; flex-shrink: 0; width: 56px; height: 56px; border-radius: 12px;
            background: var(--blush); color: var(--pink); border: 2px solid var(--ink); box-shadow: 3px 3px 0 var(--gold);
            transition: rotate .3s ease, scale .3s ease, background .25s ease, color .25s ease;
        }
        .search-card:hover .search-icon-box { rotate: -8deg; scale: 1.08; background: var(--pink); color: #fff; box-shadow: 3px 3px 0 var(--gold); transform: none; }
        .search-icon-box svg { width: 26px; height: 26px; stroke-width: 2; }

        .search-card-number { /* gold number tab */
            display: inline-grid; place-items: center; min-width: 46px; padding: 6px 10px; border-radius: 10px;
            background: var(--gold); color: var(--ink); border: 2px solid var(--ink); box-shadow: 3px 3px 0 var(--ink);
            font-family: var(--disp); font-size: 1.1rem; line-height: 1; font-weight: 800;
            rotate: 3deg; transition: rotate .3s ease;
        }
        .search-card:hover .search-card-number { color: var(--ink); rotate: -3deg; }

        /* Content */
        .search-card h3 {
            margin: 0 0 10px; font-family: var(--disp); color: var(--ink);
            font-size: 1.3rem; line-height: 1.25; font-weight: 700; letter-spacing: -.02em; overflow-wrap: anywhere;
        }
        .search-card:hover h3 { color: var(--ink); }
        .search-card p { margin: 0; color: var(--mute); font-size: .94rem; line-height: 1.65; font-weight: 400; overflow-wrap: anywhere; }

        /* Learn more */
        .search-learn-more {
            position: relative; z-index: 2; display: flex; align-items: center; justify-content: space-between; gap: 8px; width: 100%;
            margin-top: 22px; padding-top: 18px; border-top: 2px dashed rgba(196, 0, 122, .35);
            color: var(--pink); font-size: .9rem; font-weight: 700; text-decoration: none;
            transition: gap .3s ease, color .3s ease;
        }
        .search-learn-more:hover { color: #7E004E; }
        .search-learn-more svg { width: 18px; height: 18px; flex-shrink: 0; transition: transform .3s ease; }
        .search-card:hover .search-learn-more svg { transform: translateX(6px); }

        /* ===== CTA ===== */
        .search-center-cta { text-align: left; }
        .search-center-cta .search-quote-btn {
            display: inline-flex; align-items: center; justify-content: center; gap: 12px;
            padding: 16px 30px; border-radius: 12px; border: 2px solid transparent;
            background: var(--pink); color: #fff !important; font-size: 1rem; font-weight: 700; line-height: 1.2; text-decoration: none;
            box-shadow: 0 6px 0 #7E004E;
            transition: translate .2s ease, box-shadow .2s ease;
        }
        .search-center-cta .search-quote-btn:hover { translate: 0 2px; transform: none; background: var(--pink); box-shadow: 0 4px 0 #7E004E; }
        .search-center-cta .search-quote-btn:active { translate: 0 6px; box-shadow: 0 0 0 #7E004E; }
        .search-quote-btn svg { width: 18px; height: 18px; flex-shrink: 0; }

        /* =========================================================
           RESPONSIVE
        ========================================================= */
        @media (min-width: 1440px) { .search-visibility-wrap { max-width: 1320px; } }
        @media (max-width: 1024px) {
            .search-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 28px; }
        }
        @media (max-width: 767px) {
            .search-visibility-section { padding: 68px 0 64px; }
            .search-section-header { margin-bottom: 40px; }
            .search-grid { grid-template-columns: minmax(0, 1fr); gap: 24px; margin-bottom: 48px; }
            .search-card { padding: 28px 20px 22px; box-shadow: 4px 4px 0 var(--gold); }
            .search-icon-box { width: 50px; height: 50px; }
            .search-icon-box svg { width: 24px; height: 24px; }
            .search-card h3 { font-size: 1.15rem; }
            .search-visibility-wrap { padding: 0 16px; }
            .search-center-cta .search-quote-btn { width: 100%; white-space: normal; text-align: center; min-height: 48px; }
            .search-bg-glow-top, .search-bg-glow-bottom { filter: blur(48px); }
        }
        @media (hover: none) {
            .search-card:hover { translate: none; box-shadow: 6px 6px 0 var(--gold); }
            .search-card:hover .search-icon-box { rotate: none; scale: 1; background: var(--blush); color: var(--pink); }
        }
        @media (prefers-reduced-motion: reduce) {
            .search-card, .search-icon-box, .search-card-number, .search-learn-more svg { transition: none; }
        }
    </style>

    <section class="search-visibility-section">

        <!-- Decorative Background -->
        <div class="search-bg" aria-hidden="true">
            <div class="search-bg-grid"></div>
            <div class="search-bg-glow-top"></div>
            <div class="search-bg-glow-bottom"></div>
        </div>

        <div class="search-visibility-wrap">

            <!-- Header -->
            <div class="search-section-header" data-wtm-reveal="fade-up">
                <div class="search-section-pill">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 2l2.4 6.6L21 11l-6.6 2.4L12 20l-2.4-6.6L3 11l6.6-2.4L12 2z"/></svg>
                    <span><?= e((string) $content['badge']) ?></span>
                </div>

                <h2>
                    <?= e((string) $content['heading_prefix']) ?>
                    <span class="search-heading-highlight">
                        <?= e((string) $content['heading_highlight']) ?>
                        <svg viewBox="0 0 300 6" preserveAspectRatio="none" aria-hidden="true">
                            <path d="M2 3C60 1 240 1 298 3" />
                        </svg>
                    </span>
                </h2>

                <p class="search-visibility-intro"><?= e((string) $content['summary']) ?></p>
            </div>

            <!-- Services -->
            <div class="search-grid" data-reveal-stagger>

                <?php foreach ($services as $service): ?>

                    <article class="search-card">
                        <div class="search-card-content">

                            <!-- Icon -->
                            <div class="search-icon-wrap">
                                <span class="search-icon-box">
                                    <?php if ($service['icon'] === 'map-pin'): ?>
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 5-8 12-8 12S4 15 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="2.5"/></svg>
                                    <?php elseif ($service['icon'] === 'flag'): ?>
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 22V4"/><path d="M5 4c5-3 9 3 14 0v10c-5 3-9-3-14 0"/></svg>
                                    <?php elseif ($service['icon'] === 'globe'): ?>
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M2 12h20"/><path d="M12 2c3 3 4 6 4 10s-1 7-4 10"/><path d="M12 2c-3 3-4 6-4 10s1 7 4 10"/></svg>
                                    <?php elseif ($service['icon'] === 'shopping-cart'): ?>
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="20" r="1"/><circle cx="19" cy="20" r="1"/><path d="M3 4h2l2.5 11h10L20 7H6"/></svg>
                                    <?php elseif ($service['icon'] === 'rocket'): ?>
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 16.5c-1.5 1.5-2 4-2 4s2.5-.5 4-2l2-2"/><path d="M15 5l4 4"/><path d="M13 7c-3 1-5 3-7 6l5 5c3-2 5-4 6-7l-4-4Z"/><path d="M8 15l-3 3"/><path d="M16 8l3-3"/></svg>
                                    <?php elseif ($service['icon'] === 'shield'): ?>
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l8 4v5c0 5-3.5 8-8 9-4.5-1-8-4-8-9V7l8-4Z"/><path d="m9 12 2 2 4-4"/></svg>
                                    <?php endif; ?>
                                </span>
                                <span class="search-card-number">
                                    <?= htmlspecialchars($service['number']) ?>
                                </span>
                            </div>

                            <!-- Content -->
                            <h3><?= htmlspecialchars($service['title']) ?></h3>
                            <p><?= htmlspecialchars($service['text']) ?></p>

                            <!-- Learn More -->
                            <a href="<?= e((string) $service['href']) ?>" class="search-learn-more">
                                <span><?= e((string) $content['learn_more_label']) ?></span>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m13 6 6 6-6 6"/></svg>
                            </a>

                        </div>
                    </article>

                <?php endforeach; ?>

            </div>

            <!-- CTA -->
            <div class="search-center-cta" data-wtm-reveal="fade-up">
                <a href="<?= e((string) $content['quote_href']) ?>" class="search-quote-btn">
                    <span><?= e((string) $content['quote_label']) ?></span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m13 6 6 6-6 6"/></svg>
                </a>
            </div>

        </div>
    </section>

    <?php
}