<?php
function renderTrustedPartnersSection(): void
{
    // Aapke logos — yahan apne actual logo paths daalein
    $logos = [
        ['name' => 'Client Logo 1',  'src' => '/logo-1.png'],
        ['name' => 'Client Logo 2',  'src' => '/logos-2.png'],
        ['name' => 'Client Logo 3',  'src' => '/logos-3.jpeg'],
        ['name' => 'Client Logo 4',  'src' => '/logos-4.jpeg'],
        ['name' => 'Client Logo 5',  'src' => '/logos-5.jpeg'],
        ['name' => 'Client Logo 6',  'src' => '/logos-6.jpeg'],
        ['name' => 'Client Logo 7',  'src' => '/logos-7.jpeg'],
        ['name' => 'Client Logo 8',  'src' => '/logos-8.jpeg'],
        ['name' => 'Client Logo 9',  'src' => '/logos-9.jpeg'],
        ['name' => 'Client Logo 10', 'src' => '/logos-10.jpeg'],
        ['name' => 'Client Logo 11', 'src' => '/logos-11.jpeg'],
    ];

    $groupSize = 3;
    $dotCount  = (int) ceil(count($logos) / $groupSize);
    $speedPxPerSec = 45;

    // Triple the logos for seamless infinite loop
    $trackLogos = array_merge($logos, $logos, $logos);
    ?>
    <style>
        /* ============================================================
           TRUSTED PARTNERS SECTION — Infinite Marquee
        ============================================================ */
        .tp-section {
            position: relative;
            width: 100%;
            padding: 24px 0;
            background: #FBF8F1;
            overflow: hidden;
            border-top: 1px solid rgba(196, 0, 122, 0.05);
            border-bottom: 1px solid rgba(196, 0, 122, 0.05);
        }

        /* Edge fade overlays (full height) */
        .tp-edge {
            position: absolute;
            top: 0;
            height: 100%;
            width: 25%;
            pointer-events: none;
            z-index: 10;
        }

        .tp-edge-left {
            left: 0;
            background: linear-gradient(to right, #FBF8F1, transparent);
        }

        .tp-edge-right {
            right: 0;
            background: linear-gradient(to left, #FBF8F1, transparent);
        }

        /* ===== Header ===== */
        .tp-header {
            text-align: center;
            margin-bottom: 24px;
        }

        .tp-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(196, 0, 122, 0.1);
            padding: 6px 10px;
            border-radius: 9999px;
            margin-bottom: 12px;
        }

        .tp-badge svg {
            width: 12px;
            height: 12px;
            color: #C4007A;
            flex-shrink: 0;
        }

        .tp-badge span {
            font-size: 10px;
            color: #C4007A;
            font-weight: 600;
            letter-spacing: 0.025em;
            text-transform: uppercase;
        }

        .tp-heading {
            font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
            font-size: 1.25rem;
            font-weight: 700;
            color: #111827;
            margin: 0;
            line-height: 1.3;
        }

        .tp-heading .brand-highlight {
            color: #C4007A;
            position: relative;
            display: inline-block;
        }

        .tp-heading .brand-highlight svg {
            position: absolute;
            left: 0;
            bottom: -4px;
            width: 100%;
            height: 6px;
        }

        .tp-subtitle {
            font-size: 0.75rem;
            color: #6B7280;
            margin: 6px 0 0;
        }

        /* ===== Marquee ===== */
        .tp-marquee-wrap {
            position: relative;
        }

        /* Gradient overlays (marquee specific) */
        .tp-marquee-fade {
            position: absolute;
            top: 0;
            height: 100%;
            z-index: 10;
            pointer-events: none;
            width: 32px;
        }

        .tp-marquee-fade-left {
            left: 0;
            background: linear-gradient(to right, #FBF8F1, transparent);
        }

        .tp-marquee-fade-right {
            right: 0;
            background: linear-gradient(to left, #FBF8F1, transparent);
        }

        /* Marquee viewport */
        .tp-marquee {
            overflow: hidden;
            width: 100%;
        }

        /* Marquee track */
        .tp-track {
            display: flex;
            width: max-content;
            align-items: center;
            gap: 12px;
            padding: 12px 0;
            will-change: transform;
        }

        /* ===== Logo Card ===== */
        .tp-card {
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff;
            border-radius: 16px;
            border: 1px solid rgba(196, 0, 122, 0.1);
            padding: 8px 10px;
            width: 120px;
            height: 80px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .tp-card:hover {
            box-shadow: 0 10px 15px -3px rgba(196, 0, 122, 0.1), 0 4px 6px -2px rgba(196, 0, 122, 0.05);
            transform: translateY(-4px);
            border-color: rgba(196, 0, 122, 0.3);
        }

        .tp-card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .tp-card img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            transition: all 0.3s ease;
        }

        .tp-card:hover img {
            transform: scale(1.05);
            filter: brightness(1.1);
        }

        /* ===== Dots ===== */
        .tp-dots {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            margin-top: 24px;
        }

        .tp-dots-line {
            width: 32px;
            height: 1px;
            background: linear-gradient(to right, transparent, rgba(196, 0, 122, 0.3));
        }

        .tp-dots-line-right {
            background: linear-gradient(to left, transparent, rgba(196, 0, 122, 0.3));
        }

        .tp-dots-inner {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .tp-dot {
            height: 4px;
            width: 4px;
            border-radius: 9999px;
            background: rgba(196, 0, 122, 0.2);
            border: none;
            padding: 0;
            cursor: pointer;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .tp-dot:hover {
            background: rgba(196, 0, 122, 0.4);
        }

        .tp-dot.active {
            width: 16px;
            background: #C4007A;
        }

        /* ============================================================
           RESPONSIVE
        ============================================================ */

        /* Small (≥ 640px) */
        @media (min-width: 640px) {
            .tp-section { padding: 32px 0; }
            .tp-header { margin-bottom: 32px; }
            .tp-badge { gap: 8px; padding: 8px 12px; margin-bottom: 16px; }
            .tp-badge svg { width: 14px; height: 14px; }
            .tp-badge span { font-size: 11px; }
            .tp-heading { font-size: 1.5rem; }
            .tp-subtitle { font-size: 0.875rem; margin-top: 8px; }
            .tp-track { gap: 16px; padding: 16px 0; }
            .tp-card { width: 150px; height: 95px; padding: 10px 12px; border-radius: 18px; }
            .tp-marquee-fade { width: 48px; }
            .tp-dots { gap: 12px; margin-top: 28px; }
            .tp-dots-line { width: 40px; }
            .tp-dots-inner { gap: 6px; }
            .tp-dot { height: 6px; width: 6px; }
            .tp-dot.active { width: 20px; }
        }

        /* Medium (≥ 768px) */
        @media (min-width: 768px) {
            .tp-section { padding: 40px 0; }
            .tp-header { margin-bottom: 40px; }
            .tp-badge svg { width: 16px; height: 16px; }
            .tp-badge span { font-size: 14px; }
            .tp-heading { font-size: 1.875rem; }
            .tp-subtitle { font-size: 1rem; }
            .tp-track { gap: 20px; }
            .tp-card { width: 180px; height: 110px; padding: 12px 16px; border-radius: 20px; }
            .tp-marquee-fade { width: 64px; }
            .tp-dots { margin-top: 32px; }
            .tp-dots-line { width: 48px; }
            .tp-dot.active { width: 24px; }
        }

        /* Large (≥ 1024px) */
        @media (min-width: 1024px) {
            .tp-section { padding: 48px 0; }
            .tp-track { gap: 24px; }
            .tp-card { width: 210px; height: 130px; padding: 16px 20px; }
            .tp-marquee-fade { width: 96px; }
        }

        /* Extra Large (≥ 1280px) */
        @media (min-width: 1280px) {
            .tp-track { gap: 28px; }
            .tp-card { width: 240px; height: 145px; }
            .tp-marquee-fade { width: 128px; }
        }
    </style>

    <section class="tp-section" id="trustedPartners">

        <!-- Decorative edge overlays -->
        <div class="tp-edge tp-edge-left"></div>
        <div class="tp-edge tp-edge-right"></div>

        <div class="container">

            <!-- Header -->
            <div class="tp-header">
                <div class="tp-badge">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/><path d="M20 3v4"/><path d="M22 5h-4"/><path d="M4 17v2"/><path d="M5 18H3"/></svg>
                    <span>Trusted Partners</span>
                </div>

                <h2 class="tp-heading">
                    Trusted by
                    <span class="brand-highlight">
                        Leading Brands
                        <svg viewBox="0 0 300 6" preserveAspectRatio="none">
                            <path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2" stroke-linecap="round" fill="none" opacity="0.3"/>
                        </svg>
                    </span>
                    &amp; Startups
                </h2>

                <p class="tp-subtitle">
                    Join 500+ businesses that trust WebTecMart for their digital growth
                </p>
            </div>

            <!-- Marquee -->
            <div class="tp-marquee-wrap" id="tpMarqueeWrap">
                <div class="tp-marquee-fade tp-marquee-fade-left"></div>
                <div class="tp-marquee-fade tp-marquee-fade-right"></div>

                <div class="tp-marquee">
                    <div class="tp-track" id="tpTrack">
                        <?php foreach ($trackLogos as $i => $logo): ?>
                            <div class="tp-card">
                                <div class="tp-card-inner">
                                    <img
                                        src="<?= htmlspecialchars($logo['src']) ?>"
                                        alt="<?= htmlspecialchars($logo['name']) ?>"
                                        loading="lazy"
                                        onerror="this.style.display='none'; this.parentElement.innerHTML='<span style=\'font-size:1.5rem;font-weight:800;color:#C4007A;\'>'+'<?= strtoupper(substr($logo['name'], -1)) ?>'+'</span>';"
                                    >
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Navigation Dots -->
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
                    else if (!isPaused) {
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

            // ===== Respect reduced motion =====
            const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            if (prefersReduced) {
                // Still show track, just don't auto-scroll
            }

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