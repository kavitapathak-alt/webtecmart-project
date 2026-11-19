<?php
function renderTrustedPartnersSection(): void
{
    $content = trustedPartnersContent();
    $logos = trustedPartnerLogos();

    $groupSize = 3;
    $dotCount  = (int) ceil(count($logos) / $groupSize);
    $speedPxPerSec = 45;

    // Triple the logos for seamless infinite loop
    $trackLogos = $logos ? array_merge($logos, $logos, $logos) : [];
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;12..96,800&display=swap" rel="stylesheet">

    <style>
        /* ============================================================
           TRUSTED PARTNERS — "Expo Floor" design
           Logos ride a hall-signage strip as exhibitor badge cards:
           ink borders, hard offset shadows, gold/pink accents.
        ============================================================ */
        .tp-section {
            --ink: #1A0613;
            --pink: #C4007A;
            --pink2: #E0398F;
            --blush: #FBEAF3;
            --mist: #F7F4F8;
            --gold: #FFB547;
            --mute: #6C6474;
            --disp: 'Bricolage Grotesque', 'Plus Jakarta Sans', system-ui, sans-serif;
            position: relative;
            width: 100%;
            padding: 64px 0 56px;
            background: var(--mist);
            overflow: hidden;
            border-top: 3px solid var(--ink);
            border-bottom: 3px solid var(--ink);
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
        }
        .tp-section *, .tp-section *::before, .tp-section *::after { box-sizing: border-box; }
        .tp-section button:focus-visible { outline: 3px solid var(--gold); outline-offset: 3px; }

        /* Old full-height edge overlays are replaced by the marquee fades
           (they would wash out the left-aligned header). Markup is kept. */
        .tp-edge { display: none; }

        /* ===== Header ===== */
        .tp-header { text-align: left; max-width: 720px; margin: 0 0 36px; }
        .tp-badge {
            display: inline-flex; align-items: center; gap: 8px; margin-bottom: 14px; padding: 0 0 0 14px;
            background: none; border: 0; border-left: 4px solid var(--pink); border-radius: 0;
        }
        .tp-badge svg { width: 14px; height: 14px; color: var(--pink); flex-shrink: 0; }
        .tp-badge span { font-size: .82rem; color: var(--pink); font-weight: 700; letter-spacing: 0; text-transform: none; }

        .tp-heading {
            font-family: var(--disp); font-size: clamp(2rem, 4vw, 3.1rem); font-weight: 800;
            color: var(--ink); margin: 0 0 14px; line-height: 1.08; letter-spacing: -.02em;
        }
        .tp-heading .brand-highlight {
            position: relative; display: inline-block; color: var(--ink); padding: 0 .12em;
            background: linear-gradient(transparent 58%, var(--gold) 58% 92%, transparent 92%);
        }
        .tp-heading .brand-highlight svg { display: none; }
        .tp-subtitle { font-size: 1.02rem; color: var(--mute); max-width: 600px; margin: 0; line-height: 1.65; }
        .tp-header::after { /* stripe bar */
            content: ''; display: block; width: 84px; height: 7px; margin-top: 20px;
            background: repeating-linear-gradient(90deg, var(--pink) 0 12px, var(--gold) 12px 24px);
        }

        /* ===== Marquee ===== */
        .tp-marquee-wrap { position: relative; }
        .tp-marquee-fade { position: absolute; top: 0; height: 100%; z-index: 10; pointer-events: none; width: 32px; }
        .tp-marquee-fade-left { left: 0; background: linear-gradient(to right, var(--mist), transparent); }
        .tp-marquee-fade-right { right: 0; background: linear-gradient(to left, var(--mist), transparent); }

        .tp-marquee { overflow: hidden; width: 100%; }
        .tp-track {
            display: flex; width: max-content; align-items: center; gap: 16px;
            padding: 14px 10px 22px; /* room for the hard shadow */
            will-change: transform;
        }

        /* ===== Logo card (exhibitor badge) ===== */
        .tp-card {
            flex-shrink: 0; display: flex; align-items: center; justify-content: center;
            width: 140px; height: 88px; padding: 10px 12px;
            background: #fff; border: 2px solid var(--ink); border-radius: 14px;
            box-shadow: 4px 4px 0 var(--ink);
            transition: translate .25s ease, box-shadow .25s ease;
        }
        .tp-card:nth-child(3n+2) { box-shadow: 4px 4px 0 var(--gold); }
        .tp-card:nth-child(3n) { box-shadow: 4px 4px 0 var(--pink); }
        .tp-card:hover { translate: -3px -3px; box-shadow: 7px 7px 0 var(--pink); }
        .tp-card-inner { position: relative; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; }
        .tp-card img { max-width: 100%; max-height: 100%; object-fit: contain; transition: transform .3s ease; }
        .tp-card:hover img { transform: scale(1.06); }

        /* ===== Dots (bar pagination) ===== */
        .tp-dots { display: flex; justify-content: center; align-items: center; gap: 12px; margin-top: 18px; }
        .tp-dots-line { width: 40px; height: 3px; background: linear-gradient(to right, transparent, var(--ink)); }
        .tp-dots-line-right { background: linear-gradient(to left, transparent, var(--ink)); }
        .tp-dots-inner { display: flex; align-items: center; gap: 8px; }
        .tp-dot {
            height: 6px; width: 24px; border-radius: 0; border: none; padding: 0; cursor: pointer;
            background: rgba(26, 6, 19, .22);
            transition: background .3s ease, width .4s cubic-bezier(.4, 0, .2, 1);
        }
        .tp-dot:hover { background: rgba(196, 0, 122, .55); }
        .tp-dot.active { width: 44px; background: var(--pink); }

        /* ============================================================
           RESPONSIVE
        ============================================================ */
        @media (min-width: 640px) {
            .tp-track { gap: 20px; }
            .tp-card { width: 160px; height: 100px; padding: 12px 14px; }
            .tp-marquee-fade { width: 48px; }
        }
        @media (min-width: 768px) {
            .tp-section { padding: 80px 0 68px; }
            .tp-header { margin-bottom: 44px; }
            .tp-track { gap: 24px; }
            .tp-card { width: 190px; height: 115px; padding: 14px 16px; border-radius: 16px; }
            .tp-marquee-fade { width: 64px; }
        }
        @media (min-width: 1024px) {
            .tp-track { gap: 28px; }
            .tp-card { width: 220px; height: 132px; padding: 16px 20px; }
            .tp-marquee-fade { width: 96px; }
        }
        @media (min-width: 1280px) {
            .tp-track { gap: 32px; }
            .tp-card { width: 240px; height: 145px; }
            .tp-marquee-fade { width: 128px; }
        }
        @media (max-width: 575px) {
            .tp-section { padding: 52px 0 44px; }
            .tp-card { box-shadow: 3px 3px 0 var(--ink); }
            .tp-card:nth-child(3n+2) { box-shadow: 3px 3px 0 var(--gold); }
            .tp-card:nth-child(3n) { box-shadow: 3px 3px 0 var(--pink); }
            .tp-dot { width: 18px; }
            .tp-dot.active { width: 34px; }
        }
        @media (hover: none) {
            .tp-card:hover { translate: none; box-shadow: 4px 4px 0 var(--ink); }
            .tp-card:hover img { transform: none; }
        }
        @media (prefers-reduced-motion: reduce) {
            .tp-card, .tp-card img, .tp-dot { transition: none; }
        }
    </style>

    <section class="tp-section" id="trustedPartners">

        <!-- Decorative edge overlays (hidden, replaced by marquee fades) -->
        <div class="tp-edge tp-edge-left"></div>
        <div class="tp-edge tp-edge-right"></div>

        <div class="container">

            <!-- Header -->
            <div class="tp-header" data-wtm-reveal="fade-up">
                <div class="tp-badge">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/><path d="M20 3v4"/><path d="M22 5h-4"/><path d="M4 17v2"/><path d="M5 18H3"/></svg>
                    <span><?= e((string) ($content['badge'] ?? '')) ?></span>
                </div>

                <h2 class="tp-heading">
                    <?= e((string) ($content['heading_prefix'] ?? '')) ?>
                    <?php if (!empty($content['heading_highlight'])): ?>
                        <span class="brand-highlight">
                            <?= e((string) $content['heading_highlight']) ?>
                            <svg viewBox="0 0 300 6" preserveAspectRatio="none">
                                <path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2" stroke-linecap="round" fill="none" opacity="0.3"/>
                            </svg>
                        </span>
                    <?php endif; ?>
                    <?= e((string) ($content['heading_suffix'] ?? '')) ?>
                </h2>

                <p class="tp-subtitle">
                    <?= e((string) ($content['summary'] ?? '')) ?>
                </p>
            </div>

            <!-- Marquee -->
            <?php if ($logos): ?>
            <div class="tp-marquee-wrap" id="tpMarqueeWrap">
                <div class="tp-marquee-fade tp-marquee-fade-left"></div>
                <div class="tp-marquee-fade tp-marquee-fade-right"></div>

                <div class="tp-marquee">
                    <div class="tp-track" id="tpTrack">
                        <?php foreach ($trackLogos as $i => $logo): ?>
                            <div class="tp-card">
                                <div class="tp-card-inner">
                                    <img
                                        src="<?= e($logo['src']) ?>"
                                        alt="<?= e($logo['alt']) ?>"
                                        loading="lazy"
                                    >
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <!-- Navigation Dots -->
            <?php if ($logos): ?>
            <div class="tp-dots" id="tpDots" aria-label="Partner navigation">
                <div class="tp-dots-line"></div>
                <div class="tp-dots-inner" id="tpDotsInner">
                    <?php for ($i = 0; $i < $dotCount; $i++): ?>
                        <button
                            type="button"
                            class="tp-dot <?= $i === 0 ? 'active' : '' ?>"
                            data-dot-index="<?= $i ?>"
                            aria-label="Go to logo group <?= $i + 1 ?>"
                        ></button>
                    <?php endfor; ?>
                </div>
                <div class="tp-dots-line tp-dots-line-right"></div>
            </div>
            <?php endif; ?>

        </div>
    </section>

    <script>
        (function () {
            // ===== Config =====
            const LOGO_COUNT = <?= count($logos) ?>;
            const GROUP_SIZE = <?= $groupSize ?>;
            const DOT_COUNT  = <?= $dotCount ?>;
            const SPEED      = <?= $speedPxPerSec ?>; // px per second

            const track    = document.getElementById('tpTrack');
            const wrap     = document.getElementById('tpMarqueeWrap');
            const dots     = document.querySelectorAll('.tp-dot');

            if (!track || !wrap) return;

            // ===== Respect reduced motion (no auto-scroll, dots still work) =====
            const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

            // ===== State =====
            let position = 0;                // current translateX offset in px
            let setWidth = 0;                // width of ONE full set of logos
            let isPaused = false;
            let rafId = null;
            let lastTs = null;
            let jumpTarget = null;           // eased target when a dot is clicked
            let lastDot = 0;

            // ===== Measure =====
            function measure() {
                // track.scrollWidth = width of 3 sets
                setWidth = track.scrollWidth / 3;
            }

            // ===== Animation Tick =====
            function tick(ts) {
                if (lastTs === null) lastTs = ts;
                const dt = (ts - lastTs) / 1000;
                lastTs = ts;

                if (setWidth > 0) {
                    // Eased jump to dot
                    if (jumpTarget !== null) {
                        const diff = jumpTarget - position;
                        if (Math.abs(diff) < 0.5) {
                            position = jumpTarget;
                            jumpTarget = null;
                        } else {
                            position += diff * Math.min(1, dt * 6);
                        }
                    }
                    // Auto-scroll (unless paused)
                    else if (!isPaused && !prefersReduced) {
                        position += SPEED * dt;
                    }

                    // Wrap around for seamless loop
                    if (position >= setWidth) position -= setWidth;
                    if (position < 0)          position += setWidth;

                    // Apply transform
                    track.style.transform = 'translateX(-' + position + 'px)';

                    // Update active dot
                    const step = setWidth / LOGO_COUNT;
                    const rawIndex = Math.floor(position / step);
                    const dot = Math.floor(rawIndex / GROUP_SIZE) % DOT_COUNT;
                    if (dot !== lastDot) {
                        lastDot = dot;
                        updateDot(dot);
                    }
                }

                rafId = requestAnimationFrame(tick);
            }

            // ===== Dot UI =====
            function updateDot(index) {
                dots.forEach((d, i) => {
                    d.classList.toggle('active', i === index);
                });
            }

            // ===== Go to dot =====
            function goToDot(index) {
                if (!setWidth) return;
                const step = setWidth / LOGO_COUNT;
                jumpTarget = (index * GROUP_SIZE * step) % setWidth;
                lastDot = index;
                updateDot(index);
            }

            // ===== Pause on hover =====
            wrap.addEventListener('mouseenter', () => { isPaused = true; });
            wrap.addEventListener('mouseleave', () => { isPaused = false; });

            // Touch pause (mobile)
            wrap.addEventListener('touchstart', () => { isPaused = true; }, { passive: true });
            wrap.addEventListener('touchend',   () => { isPaused = false; }, { passive: true });

            // ===== Dot clicks =====
            dots.forEach((d) => {
                d.addEventListener('click', () => {
                    const idx = parseInt(d.getAttribute('data-dot-index'), 10) || 0;
                    goToDot(idx);
                });
            });

            // ===== Init =====
            function init() {
                measure();
                rafId = requestAnimationFrame(tick);
            }

            // Wait for images to load so scrollWidth is correct
            if (document.readyState === 'complete') {
                init();
            } else {
                window.addEventListener('load', init);
            }

            // Re-measure on resize
            let resizeTimer;
            window.addEventListener('resize', () => {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(measure, 150);
            });
        })();
    </script>
    <?php
}