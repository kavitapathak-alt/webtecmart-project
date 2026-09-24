<?php
function renderTestimonialsSection(): void
{
    // ===== Testimonials Data =====
    $testimonials = [
        [
            'name'     => 'Satpal Singh',
            'role'     => 'CEO, TechSolutions India',
            'quote'    => 'Working with the team felt different from day one — clear communication, timely delivery, and results we could actually measure. Our online visibility increased by 200% within 6 months.',
            'image'    => 'https://randomuser.me/api/portraits/men/32.jpg',
            'elevated' => true,
            'rating'   => 5,
        ],
        [
            'name'     => 'Tushar Sharma',
            'role'     => 'Founder, StyleHub Fashion',
            'quote'    => 'They understood exactly what our brand needed and executed it without endless back and forth. Highly recommend the team for anyone looking to grow their digital presence.',
            'image'    => 'https://randomuser.me/api/portraits/men/54.jpg',
            'elevated' => false,
            'rating'   => 5,
        ],
        [
            'name'     => 'Rawat Verma',
            'role'     => 'Director, GreenTech Solutions',
            'quote'    => 'Professional, prompt, and genuinely invested in our growth. The kind of partnership every business hopes to find. Their SEO strategies helped us rank #1 on Google.',
            'image'    => 'https://randomuser.me/api/portraits/men/76.jpg',
            'elevated' => true,
            'rating'   => 5,
        ],
        [
            'name'     => 'Shishir Kumar',
            'role'     => 'Marketing Head, DigitalFirst Agency',
            'quote'    => 'Everything finally feels cohesive. The whole experience was smooth and the results speak for themselves. Our social media engagement increased by 300%.',
            'image'    => 'https://randomuser.me/api/portraits/men/85.jpg',
            'elevated' => false,
            'rating'   => 5,
        ],
        [
            'name'     => 'Priya Patel',
            'role'     => 'Owner, Wellness World',
            'quote'    => 'From website design to digital marketing, they handled everything seamlessly. Their comprehensive solutions saved us time and money. Highly recommended!',
            'image'    => 'https://randomuser.me/api/portraits/women/44.jpg',
            'elevated' => true,
            'rating'   => 5,
        ],
        [
            'name'     => 'Vikram Malhotra',
            'role'     => 'CTO, FinTech Solutions',
            'quote'    => 'The Performance Marketing team is exceptional. They delivered our app on time with all the features we requested. Our users love the experience.',
            'image'    => 'https://randomuser.me/api/portraits/men/91.jpg',
            'elevated' => false,
            'rating'   => 5,
        ],
    ];

    $managedTestimonials = testimonials();
    if ($managedTestimonials) {
        $testimonials = array_map(static function (array $item, int $index): array {
            return [
                'name' => $item['name'] ?? $item['title'] ?? 'WebTecMart Client',
                'role' => $item['role'] ?? 'Client',
                'quote' => $item['quote'] ?? $item['summary'] ?? '',
                'image' => $item['image'] ?? 'https://randomuser.me/api/portraits/lego/' . ($index + 1) . '.jpg',
                'elevated' => $index % 2 === 0,
                'rating' => 5,
            ];
        }, $managedTestimonials, array_keys($managedTestimonials));
    }

    $total = count($testimonials);
    ?>
    <style>
        /* ============================================================
           TESTIMONIALS SECTION — Slider clone
        ============================================================ */
        .testi-section {
            position: relative;
            width: 100%;
            padding: 16px 0;
            background: #FBF8F1;
            overflow: hidden;
        }

        /* ===== Decorative Background ===== */
        .testi-bg {
            position: absolute;
            inset: 0;
            pointer-events: none;
        }

        .testi-bg-blob-1 {
            position: absolute;
            top: 0;
            right: 0;
            width: 50%;
            height: 50%;
            background: linear-gradient(to bottom left, rgba(196, 0, 122, 0.05), transparent);
            border-radius: 9999px;
            filter: blur(64px);
        }

        .testi-bg-blob-2 {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 33.333%;
            height: 50%;
            background: linear-gradient(to top right, rgba(196, 0, 122, 0.05), transparent);
            border-radius: 9999px;
            filter: blur(64px);
        }

        .testi-bg-quote {
            position: absolute;
            fill: none;
            stroke: #C4007A;
            stroke-width: 2;
            opacity: 0.1;
            font-family: serif;
        }

        .testi-bg-quote-1 { top: 40px; right: 20px; width: 80px; height: 80px; }
        .testi-bg-quote-2 { bottom: 40px; left: 20px; width: 80px; height: 80px; }

        /* ===== Header ===== */
        .testi-header {
            position: relative;
            z-index: 10;
            text-align: center;
            margin-bottom: 32px;
        }

        .testi-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(196, 0, 122, 0.1);
            padding: 6px 10px;
            border-radius: 9999px;
            margin-bottom: 12px;
        }

        .testi-pill svg {
            width: 12px;
            height: 12px;
            color: #C4007A;
            flex-shrink: 0;
        }

        .testi-pill span {
            font-size: 10px;
            color: #C4007A;
            font-weight: 600;
            letter-spacing: 0.025em;
            text-transform: uppercase;
        }

        .testi-heading {
            font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: #111827;
            margin: 0;
            line-height: 1.2;
        }

        .testi-heading .accent {
            color: #C4007A;
            position: relative;
            display: inline-block;
        }

        .testi-heading .accent svg {
            position: absolute;
            left: 0;
            bottom: -4px;
            width: 100%;
            height: 6px;
        }

        .testi-subtitle {
            font-size: 0.75rem;
            color: #6B7280;
            max-width: 640px;
            margin: 12px auto 0;
        }

        /* ===== Slider Wrapper ===== */
        .testi-slider {
            position: relative;
            z-index: 10;
        }

        /* Navigation Arrows */
        .testi-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 20;
            width: 32px;
            height: 32px;
            border-radius: 9999px;
            background: #fff;
            border: 1px solid rgba(196, 0, 122, 0.2);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            color: #111827;
            padding: 0;
        }

        .testi-nav:hover:not(:disabled) {
            background: #C4007A;
            color: #fff;
            border-color: #C4007A;
        }

        .testi-nav:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .testi-nav:disabled:hover {
            background: #fff;
            color: #111827;
            border-color: rgba(196, 0, 122, 0.2);
        }

        .testi-nav svg {
            width: 16px;
            height: 16px;
        }

        .testi-nav-prev { left: -8px; }
        .testi-nav-next { right: -8px; }

        /* ===== Cards Grid ===== */
        .testi-grid-wrap {
            overflow: hidden;
            padding-top: 44px; /* space for overlapping avatars */
        }

        .testi-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 32px;
            transition: opacity 0.3s ease;
        }

        /* Card Item Wrapper (for elevated offset) */
        .testi-item {
            position: relative;
            padding-top: 40px;
            transition: all 0.5s ease;
        }

        /* Card */
        .testi-card {
            position: relative;
            height: 100%;
            border-radius: 16px;
            background: #fff;
            padding: 40px 16px 20px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .testi-card:hover {
            transform: translateY(-8px);
        }

        /* Elevated variant */
        .testi-item.elevated .testi-card {
            box-shadow: 0 18px 40px -15px rgba(196, 0, 122, 0.25);
            box-shadow: 0 18px 40px -15px rgba(196, 0, 122, 0.25), 0 0 0 1px rgba(196, 0, 122, 0.1);
        }

        .testi-item:not(.elevated) .testi-card {
            box-shadow: 0 8px 26px -14px rgba(0, 0, 0, 0.12);
        }

        .testi-item:not(.elevated) .testi-card:hover {
            box-shadow: 0 14px 32px -14px rgba(196, 0, 122, 0.2);
        }

        /* Avatar overlapping top */
        .testi-avatar-wrap {
            position: absolute;
            top: -36px;
            left: 50%;
            transform: translateX(-50%);
        }

        .testi-avatar-outer {
            width: 64px;
            height: 64px;
            border-radius: 9999px;
            background: linear-gradient(to bottom right, #E0398F, #C4007A);
            padding: 3px;
            box-shadow: 0 10px 15px -3px rgba(196, 0, 122, 0.25);
            transition: transform 0.3s ease;
        }

        .testi-item:hover .testi-avatar-outer {
            transform: scale(1.1);
        }

        .testi-avatar-inner {
            width: 100%;
            height: 100%;
            border-radius: 9999px;
            overflow: hidden;
            box-shadow: 0 0 0 2px #fff;
        }

        .testi-avatar-inner img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        /* Quote icon */
        .testi-quote-icon {
            display: block;
            margin: 0 auto 8px;
            width: 16px;
            height: 16px;
            color: rgba(196, 0, 122, 0.7);
        }

        .testi-quote-icon svg {
            width: 100%;
            height: 100%;
            fill: currentColor;
        }

        /* Quote text */
        .testi-text {
            font-size: 0.75rem;
            color: #4B5563;
            line-height: 1.625;
            margin: 0 0 12px;
            display: -webkit-box;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Stars */
        .testi-stars {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 2px;
            margin-bottom: 8px;
        }

        .testi-stars svg {
            width: 12px;
            height: 12px;
            fill: #F4C430;
            color: #F4C430;
        }

        /* Name & Role */
        .testi-name {
            font-weight: 700;
            color: #111111;
            font-size: 0.875rem;
            margin: 0;
        }

        .testi-role {
            display: block;
            font-size: 0.6875rem;
            font-weight: 400;
            color: #C4007A;
            margin-top: 2px;
        }

        /* ===== Dots ===== */
        .testi-dots {
            display: flex;
            justify-content: center;
            gap: 6px;
            margin-top: 24px;
        }

        .testi-dot {
            height: 6px;
            width: 6px;
            border-radius: 9999px;
            background: rgba(196, 0, 122, 0.3);
            border: none;
            padding: 0;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .testi-dot:hover {
            background: rgba(196, 0, 122, 0.5);
        }

        .testi-dot.active {
            width: 20px;
            background: #C4007A;
        }

        /* ===== CTA ===== */
        .testi-cta {
            text-align: center;
            margin-top: 32px;
        }

        .testi-cta a {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            border-radius: 9999px;
            background: linear-gradient(to right, #C4007A, #E0398F);
            padding: 10px 20px;
            font-weight: 700;
            color: #fff;
            box-shadow: 0 10px 15px -3px rgba(196, 0, 122, 0.25);
            transition: all 0.3s ease;
            font-size: 0.75rem;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }

        .testi-cta a:hover {
            transform: scale(1.02);
            box-shadow: 0 20px 25px -5px rgba(196, 0, 122, 0.35);
            color: #fff;
        }

        .testi-cta a svg {
            width: 12px;
            height: 12px;
        }

        /* ===== Bottom Decorative Dots ===== */
        .testi-bottom-deco {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            margin-top: 32px;
        }

        .testi-bottom-line {
            width: 32px;
            height: 1px;
            background: linear-gradient(to right, transparent, rgba(196, 0, 122, 0.3));
        }

        .testi-bottom-line.right {
            background: linear-gradient(to left, transparent, rgba(196, 0, 122, 0.3));
        }

        .testi-bottom-dots {
            display: flex;
            gap: 2px;
            align-items: center;
        }

        .testi-bottom-dots span {
            display: block;
            width: 4px;
            height: 4px;
            border-radius: 9999px;
            background: rgba(196, 0, 122, 0.2);
        }

        .testi-bottom-dots span.active {
            width: 16px;
            background: #C4007A;
        }

        /* ============================================================
           RESPONSIVE
        ============================================================ */

        /* Small (≥ 640px) */
        @media (min-width: 640px) {
            .testi-section { padding: 20px 0; }
            .testi-header { margin-bottom: 40px; }
            .testi-pill { gap: 8px; padding: 8px 12px; }
            .testi-pill svg { width: 14px; height: 14px; }
            .testi-pill span { font-size: 11px; }
            .testi-heading { font-size: 1.875rem; }
            .testi-subtitle { font-size: 0.875rem; }
            .testi-nav { width: 36px; height: 36px; }
            .testi-nav-prev { left: -12px; }
            .testi-nav-next { right: -12px; }
            .testi-grid-wrap { padding-top: 48px; }
            .testi-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 20px; }
            .testi-item { padding-top: 44px; }
            .testi-card { border-radius: 18px; padding: 44px 20px 24px; }
            .testi-avatar-wrap { top: -40px; }
            .testi-avatar-outer { width: 72px; height: 72px; }
            .testi-quote-icon { width: 18px; height: 18px; margin-bottom: 10px; }
            .testi-text { font-size: 0.75rem; }
            .testi-stars svg { width: 14px; height: 14px; }
            .testi-name { font-size: 1rem; }
            .testi-role { font-size: 0.75rem; }
            .testi-dots { gap: 8px; margin-top: 28px; }
            .testi-dot { height: 8px; width: 8px; }
            .testi-dot.active { width: 24px; }
            .testi-cta { margin-top: 36px; }
            .testi-cta a { padding: 12px 24px; font-size: 0.875rem; gap: 8px; }
            .testi-cta a svg { width: 14px; height: 14px; }
            .testi-bottom-deco { margin-top: 36px; gap: 12px; }
            .testi-bottom-line { width: 40px; }
            .testi-bottom-dots { gap: 4px; }
            .testi-bottom-dots span { width: 6px; height: 6px; }
            .testi-bottom-dots span.active { width: 20px; }
        }

        /* Medium (≥ 768px) */
        @media (min-width: 768px) {
            .testi-section { padding: 24px 0; }
            .testi-heading { font-size: 1.875rem; }
            .testi-subtitle { font-size: 1rem; }
            .testi-nav { width: 40px; height: 40px; }
            .testi-grid { gap: 24px; }
            .testi-item { padding-top: 48px; }
            .testi-card { border-radius: 20px; padding: 48px 24px 28px; }
            .testi-avatar-wrap { top: -44px; }
            .testi-avatar-outer { width: 88px; height: 88px; }
            .testi-avatar-inner { box-shadow: 0 0 0 3px #fff; }
            .testi-quote-icon { width: 20px; height: 20px; margin-bottom: 12px; }
            .testi-text { font-size: 0.875rem; }
            .testi-stars svg { width: 14px; height: 14px; }
            .testi-name { font-size: 1rem; }
            .testi-dots { margin-top: 32px; }
            .testi-dot.active { width: 32px; }
            .testi-cta a { padding: 14px 28px; font-size: 1rem; }
            .testi-cta a svg { width: 16px; height: 16px; }
        }

        /* Large (≥ 1024px) — 4 columns */
        @media (min-width: 1024px) {
            .testi-grid { grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 32px; }
            .testi-item { padding-top: 44px; }
            .testi-item.elevated { margin-top: -12px; }
            .testi-card { padding: 48px 24px 28px; }
        }

        /* Extra small adjustments for arrows on mobile */
        @media (max-width: 639px) {
            .testi-nav {
                width: 32px;
                height: 32px;
            }
            .testi-nav-prev { left: 4px; }
            .testi-nav-next { right: 4px; }
        }
    </style>

    <section class="testi-section" id="testimonialsSection">

        <!-- Decorative Background -->
        <div class="testi-bg">
            <div class="testi-bg-blob-1"></div>
            <div class="testi-bg-blob-2"></div>

            <svg class="testi-bg-quote testi-bg-quote-1" viewBox="0 0 100 100">
                <text x="10" y="70" font-size="80" fill="none" stroke="#C4007A" stroke-width="2">"</text>
            </svg>
            <svg class="testi-bg-quote testi-bg-quote-2" viewBox="0 0 100 100">
                <text x="10" y="70" font-size="80" fill="none" stroke="#C4007A" stroke-width="2">"</text>
            </svg>
        </div>

        <div class="container">

            <!-- Header -->
            <div class="testi-header">
                <div class="testi-pill">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/><path d="M20 3v4"/><path d="M22 5h-4"/><path d="M4 17v2"/><path d="M5 18H3"/></svg>
                    <span>Testimonials</span>
                </div>

                <h2 class="testi-heading">
                    What Our
                    <span class="accent">
                        Clients Say
                        <svg viewBox="0 0 300 6" preserveAspectRatio="none">
                            <path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2" stroke-linecap="round" fill="none" opacity="0.3"/>
                        </svg>
                    </span>
                </h2>

                <p class="testi-subtitle">
                    Real feedback from real clients we've helped grow across digital marketing, branding &amp; web.
                </p>
            </div>

            <!-- Slider -->
            <div class="testi-slider" id="testiSlider">

                <!-- Navigation Arrows -->
                <button class="testi-nav testi-nav-prev" id="testiPrev" aria-label="Previous testimonials" disabled>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                </button>

                <button class="testi-nav testi-nav-next" id="testiNext" aria-label="Next testimonials">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                </button>

                <!-- Cards Grid -->
                <div class="testi-grid-wrap">
                    <div class="testi-grid" id="testiGrid">
                        <!-- Rendered by JS -->
                    </div>
                </div>
            </div>

            <!-- Dots Indicator -->
            <div class="testi-dots" id="testiDots" aria-label="Testimonials navigation">
                <!-- Rendered by JS -->
            </div>

            <!-- CTA -->
            <div class="testi-cta">
                <a href="/contact.php">
                    Share Your Experience
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </a>
            </div>

            <!-- Bottom Decorative Dots -->
            <div class="testi-bottom-deco">
                <div class="testi-bottom-line"></div>
                <div class="testi-bottom-dots">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span class="active"></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="testi-bottom-line right"></div>
            </div>

        </div>
    </section>

    <script>
        (function () {
            // ===== Data from PHP =====
            const TESTIMONIALS = <?= json_encode($testimonials, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>;
            const TOTAL = TESTIMONIALS.length;

            // ===== DOM =====
            const grid  = document.getElementById('testiGrid');
            const dots  = document.getElementById('testiDots');
            const prev  = document.getElementById('testiPrev');
            const next  = document.getElementById('testiNext');

            if (!grid) return;

            // ===== State =====
            let visibleCards = 4;
            let currentIndex = 0;
            let autoPlay = true;
            let autoTimer = null;
            let resumeTimer = null;

            // ===== SVG helpers =====
            const starSVG = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>';
            const quoteSVG = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"/><path d="M15 21c3 0 7-1 7-8V5c0-1.25-.757-2.017-2-2h-4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2h.75c0 2.25.25 4-2.75 4v3c0 1 0 1 1 1z"/></svg>';

            // ===== Determine visible cards =====
            function updateVisibleCards() {
                const w = window.innerWidth;
                if (w < 640) visibleCards = 1;
                else if (w < 1024) visibleCards = 2;
                else visibleCards = 4;

                // Clamp currentIndex
                const maxIndex = Math.max(0, TOTAL - visibleCards);
                if (currentIndex > maxIndex) currentIndex = maxIndex;

                render();
            }

            // ===== Render cards =====
            function render() {
                const visible = TESTIMONIALS.slice(currentIndex, currentIndex + visibleCards);

                grid.innerHTML = visible.map((t) => {
                    const elevatedClass = t.elevated ? 'elevated' : '';
                    const stars = starSVG.repeat(t.rating || 5);

                    return `
                        <div class="testi-item ${elevatedClass}">
                            <div class="testi-card">
                                <div class="testi-avatar-wrap">
                                    <div class="testi-avatar-outer">
                                        <div class="testi-avatar-inner">
                                            <img src="${t.image}" alt="${t.name}" loading="lazy">
                                        </div>
                                    </div>
                                </div>

                                <div class="testi-quote-icon">${quoteSVG}</div>
                                <p class="testi-text">${t.quote}</p>
                                <div class="testi-stars">${stars}</div>
                                <p class="testi-name">
                                    ${t.name}
                                    <span class="testi-role">${t.role}</span>
                                </p>
                            </div>
                        </div>
                    `;
                }).join('');

                // Update arrows
                if (prev) prev.disabled = currentIndex === 0;
                if (next) next.disabled = currentIndex >= TOTAL - visibleCards;

                // Update dots
                renderDots();

                // Show/hide arrows if not needed
                const showArrows = visibleCards < TOTAL;
                if (prev) prev.style.display = showArrows ? 'flex' : 'none';
                if (next) next.style.display = showArrows ? 'flex' : 'none';
                if (dots) dots.style.display = showArrows ? 'flex' : 'none';
            }

            // ===== Render dots =====
            function renderDots() {
                if (!dots) return;
                const maxIndex = Math.max(0, TOTAL - visibleCards);
                let html = '';
                for (let i = 0; i <= maxIndex; i++) {
                    html += `<button class="testi-dot ${i === currentIndex ? 'active' : ''}" data-index="${i}" aria-label="Go to testimonial set ${i + 1}"></button>`;
                }
                dots.innerHTML = html;

                dots.querySelectorAll('.testi-dot').forEach((d) => {
                    d.addEventListener('click', () => {
                        currentIndex = parseInt(d.getAttribute('data-index'), 10) || 0;
                        pauseAutoPlay();
                        render();
                    });
                });
            }

            // ===== Navigation =====
            function goPrev() {
                currentIndex = Math.max(0, currentIndex - 1);
                pauseAutoPlay();
                render();
            }

            function goNext() {
                const maxIndex = Math.max(0, TOTAL - visibleCards);
                currentIndex = Math.min(maxIndex, currentIndex + 1);
                pauseAutoPlay();
                render();
            }

            if (prev) prev.addEventListener('click', goPrev);
            if (next) next.addEventListener('click', goNext);

            // ===== Auto-play =====
            function startAutoPlay() {
                stopAutoPlay();
                if (!autoPlay) return;
                autoTimer = setInterval(() => {
                    const maxIndex = Math.max(0, TOTAL - visibleCards);
                    if (currentIndex >= maxIndex) {
                        currentIndex = 0;
                    } else {
                        currentIndex++;
                    }
                    render();
                }, 5000);
            }

            function stopAutoPlay() {
                if (autoTimer) {
                    clearInterval(autoTimer);
                    autoTimer = null;
                }
            }

            function pauseAutoPlay() {
                stopAutoPlay();
                if (resumeTimer) clearTimeout(resumeTimer);
                resumeTimer = setTimeout(() => {
                    if (autoPlay) startAutoPlay();
                }, 10000);
            }

            // ===== Init =====
            updateVisibleCards();
            startAutoPlay();

            // Resize handler
            let resizeTimer;
            window.addEventListener('resize', () => {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(() => {
                    updateVisibleCards();
                }, 150);
            });
        })();
    </script>
    <?php
}