<?php
function renderWhatWeDoSection(): void
{
    // 6 Core Services data matching the design reference exactly
    $services = [
        [
            'id' => 'branding',
            'slug' => 'digital-business-branding',
            'href' => '/digital-business-branding.php',
            'icon' => 'pen',
            'title' => 'Digital Business Branding',
            'description' => 'Any web business can flourish and develop only if it is rightly promoted. "BRANDING" is highly crucial for a digital business\'s success, and you can assure a well-framed campaign with our digital marketing experts.',
            'tags' => ['Brand Strategy', 'Visual Identity', 'Brand Positioning', 'Brand Guidelines'],
        ],
        [
            'id' => 'website',
            'slug' => 'website-design-development',
            'href' => '/website-design-development.php',
            'icon' => 'code',
            'title' => 'Website Design & Development',
            'description' => 'We help make the first impression of the website memorable and robust. By providing a mix of relevant content and graphics, we provide responsive, easy-to-use websites.',
            'tags' => ['Responsive Design', 'UI/UX', 'E-Commerce', 'CMS Integration'],
        ],
        [
            'id' => 'seo',
            'slug' => 'seo-services-delhi',
            'href' => '/seo-services-delhi.php',
            'icon' => 'search',
            'title' => 'SEO Services in Delhi',
            'description' => 'Target high-intent search queries and dominate local and national search results with specialized SEO strategies.',
            'tags' => ['Local SEO', 'National SEO', 'Technical SEO', 'Keyword Research'],
        ],
        [
            'id' => 'smo',
            'slug' => 'social-media-optimization',
            'href' => '/social-media-optimization.php',
            'icon' => 'share',
            'title' => 'Social Media Optimization',
            'description' => 'Now is the correct time that the audience starts craving for your content. This is only possible with engaging and innovative social media campaigns that our experts are well-versed with.',
            'tags' => ['Content Strategy', 'Social Media Management', 'Influencer Marketing', 'Community Building'],
        ],
        [
            'id' => 'sem',
            'slug' => 'search-engine-marketing',
            'href' => '/search-engine-marketing.php',
            'icon' => 'megaphone',
            'title' => 'Search Engine Marketing',
            'description' => 'Our professionals have the relevant practice of marketing businesses that use paid advertisements on SERPs. Our strategies help businesses increase visibility two folds.',
            'tags' => ['PPC Campaigns', 'Google Ads', 'Bing Ads', 'Retargeting'],
        ],
        [
            'id' => 'performance',
            'slug' => 'performance-marketing',
            'href' => '/performance-marketing.php',
            'icon' => 'smartphone',
            'title' => 'Performance Marketing',
            'description' => 'There are 2 million + mobile users today, which means having apps have become the need of the hour. Businesses are left with no choice but to come up with easy-to-use apps.',
            'tags' => ['iOS Development', 'Android Development', 'Cross-Platform', 'AppStore Optimization'],
        ],
    ];

    // Synchronize core services with live database records
    foreach ($services as &$svc) {
        $slug = $svc['slug'] ?? '';
        if ($slug !== '') {
            $dbSvc = getServiceBySlug($slug);
            if ($dbSvc) {
                if (!empty($dbSvc['title'])) $svc['title'] = $dbSvc['title'];
                if (!empty($dbSvc['summary'])) $svc['description'] = $dbSvc['summary'];
                if (!empty($dbSvc['features'])) {
                    $svc['tags'] = array_map(function($f) {
                        return is_array($f) ? ($f['title'] ?? '') : (string) $f;
                    }, $dbSvc['features']);
                }
            }
        }
    }
    unset($svc);

    // Icon helper (guarded so the section can be rendered more than once safely)
    if (!function_exists('coreSvcIcon')) {
        function coreSvcIcon(string $name): string {
            $icons = [
                'pen' => '<path d="m18 2 4 4-12 12H6v-4L18 2Z"/><path d="m15 5 4 4"/><circle cx="5" cy="19" r="1.5"/>',
                'code' => '<path d="m16 18 6-6-6-6"/><path d="m8 6-6 6 6 6"/>',
                'search' => '<circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/>',
                'share' => '<path d="M4 14v4a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-4"/><polyline points="16 8 12 4 8 8"/><line x1="12" y1="4" x2="12" y2="15"/>',
                'megaphone' => '<path d="m3 11 18-5v12L3 14v-3z"/><path d="M11.6 16.8a3 3 0 1 1-5.8-1.6"/>',
                'smartphone' => '<rect width="14" height="20" x="5" y="2" rx="2" ry="2"/><path d="M12 18h.01"/>',
                'arrow' => '<path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>',
                'sparkles' => '<path d="m12 3-1.9 5.8a2 2 0 0 1-1.3 1.3L3 12l5.8 1.9a2 2 0 0 1 1.3 1.3L12 21l1.9-5.8a2 2 0 0 1 1.3-1.3L21 12l-5.8-1.9a2 2 0 0 1-1.3-1.3L12 3z"/>',
            ];
            $path = $icons[$name] ?? '';
            return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">' . $path . '</svg>';
        }
    }
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;12..96,800&display=swap" rel="stylesheet">

    <style>
        /* ============================================================
           OUR CORE SERVICES — "Expo Floor" design
           Magenta (#C4007A) + Gold (#FFB547) + Deep (#7E004E)
           Each service is a trade-fair stall with an awning.
           Matches B2B / SEO Delhi / Services / Contact / Blog pages.
        ============================================================ */
        .core-services-section {
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
            --line: rgba(126, 0, 78, .14);

            /* Legacy aliases */
            --ink: var(--deep);
            --ink2: #5C0038;
            --mist: var(--soft);

            --disp: 'Bricolage Grotesque', 'Plus Jakarta Sans', system-ui, sans-serif;
            position: relative;
            width: 100%;
            padding: 84px 0 72px;
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            color: var(--text);
            background-color: var(--soft);
            background-image: radial-gradient(rgba(126, 0, 78, .07) 1px, transparent 1.2px);
            background-size: 24px 24px;
            overflow: hidden;
        }
        .core-services-section *, .core-services-section *::before, .core-services-section *::after { box-sizing: border-box; }
        .core-services-section::before { /* gold scalloped awning edge */
            content: ''; position: absolute; top: 0; left: 0; right: 0; height: 18px; pointer-events: none;
            background: radial-gradient(circle at 18px 0, var(--gold) 17px, transparent 18px) 0 0 / 36px 18px repeat-x;
        }
        .core-services-section a:focus-visible { outline: 3px solid var(--gold); outline-offset: 3px; }
        .core-services-section ::selection { background: var(--pink); color: #fff; }

        .core-services-container {
            position: relative; z-index: 1;
            max-width: 1280px; margin: 0 auto; padding: 0 22px; width: 100%;
        }

        /* ===== Header ===== */
        .core-services-header { text-align: left; max-width: 720px; margin: 0 0 52px; }
        .core-services-pill {
            display: inline-flex; align-items: center; gap: 8px;
            margin-bottom: 14px; padding: 0 0 0 14px;
            border-left: 4px solid var(--pink);
            background: none; border-radius: 0; border-top: 0; border-right: 0; border-bottom: 0;
        }
        .core-services-pill svg { width: 14px; height: 14px; color: var(--pink); flex-shrink: 0; }
        .core-services-pill span { font-size: .82rem; font-weight: 800; color: var(--pink); letter-spacing: .06em; text-transform: uppercase; }
        .core-services-title {
            font-family: var(--disp); font-size: clamp(2rem, 4vw, 3.1rem); font-weight: 800;
            color: var(--head); letter-spacing: -.02em; line-height: 1.08; margin: 0 0 14px;
        }
        .core-services-title .accent {
            position: relative; display: inline-block; color: var(--head); padding: 0 .12em;
            background: linear-gradient(transparent 58%, var(--gold) 58% 92%, transparent 92%);
        }
        .core-services-title .accent svg { display: none; }
        .core-services-subtitle { font-size: 1.02rem; color: var(--mute); margin: 0; line-height: 1.65; max-width: 560px; }
        .core-services-header::after { /* stripe bar */
            content: ''; display: block; width: 84px; height: 7px; margin-top: 20px;
            background: repeating-linear-gradient(90deg, var(--pink) 0 12px, var(--gold) 12px 24px);
        }

        /* ===== Stall grid ===== */
        .core-services-grid { display: grid; grid-template-columns: minmax(0, 1fr); gap: 26px; counter-reset: stall; }
        @media (min-width: 680px) { .core-services-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 28px; } }
        @media (min-width: 1024px) { .core-services-grid { grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 32px; } }
        .core-services-grid > * { min-width: 0; }

        .core-service-card {
            position: relative; display: flex; flex-direction: column; counter-increment: stall;
            background: #fff; color: inherit; text-decoration: none;
            border: 2px solid var(--deep); border-radius: 18px; padding: 56px 24px 24px;
            box-shadow: 6px 6px 0 var(--gold);
            transition: translate .25s ease, box-shadow .25s ease;
        }
        .core-service-card::before { /* awning */
            content: ''; position: absolute; top: 0; left: 0; right: 0; height: 28px; border-radius: 15px 15px 0 0;
            background: repeating-linear-gradient(90deg, var(--pink) 0 22px, #fff 22px 44px);
            border-bottom: 2px solid var(--deep);
        }
        .core-service-card:nth-child(even)::before { background: repeating-linear-gradient(90deg, var(--gold) 0 22px, #fff 22px 44px); }
        .core-service-card::after { /* stall number plate */
            content: counter(stall, decimal-leading-zero);
            position: absolute; top: 42px; right: 18px;
            font: 800 2.4rem/1 var(--disp); letter-spacing: -.04em;
            color: transparent; -webkit-text-stroke: 2px rgba(126, 0, 78, .14);
            pointer-events: none;
        }
        .core-service-card:hover { translate: -4px -4px; box-shadow: 10px 10px 0 var(--pink); }

        .core-service-icon {
            display: grid; place-items: center; flex-shrink: 0;
            width: 52px; height: 52px; margin-bottom: 18px;
            border-radius: 12px; background: var(--blush); color: var(--pink);
            border: 2px solid var(--deep); box-shadow: 3px 3px 0 var(--gold);
            transition: rotate .3s ease, scale .3s ease;
        }
        .core-service-card:hover .core-service-icon { rotate: -8deg; scale: 1.08; background: var(--blush); }
        .core-service-icon svg { width: 24px; height: 24px; color: var(--pink); }

        .core-service-heading {
            font-family: var(--disp); font-size: 1.3rem; font-weight: 800; line-height: 1.25;
            letter-spacing: -.02em; color: var(--head); margin: 0 0 10px; overflow-wrap: anywhere;
        }
        .core-service-card:hover .core-service-heading { color: var(--head); }
        .core-service-desc { font-size: .94rem; line-height: 1.65; color: var(--mute); margin: 0 0 18px; flex-grow: 1; overflow-wrap: anywhere; }

        .core-service-tags { display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 22px; }
        .core-service-tag {
            display: inline-flex; align-items: center; padding: 5px 11px; border-radius: 999px;
            background: var(--blush); color: var(--head);
            border: 2px solid rgba(126, 0, 78, .16);
            font-size: .74rem; font-weight: 600; letter-spacing: 0;
            transition: background .2s ease, border-color .2s ease;
        }
        .core-service-card:hover .core-service-tag { background: var(--blush); border-color: var(--pink); }

        .core-service-cta {
            display: inline-flex; align-items: center; gap: 8px; margin-top: auto; align-self: flex-start;
            padding: 11px 18px; border-radius: 12px;
            border: 2px solid var(--deep); background: #fff;
            color: var(--pink); font-weight: 800; font-size: .86rem; line-height: 1; text-decoration: none;
            box-shadow: 0 3px 0 var(--deep);
            transition: background .2s ease, gap .25s ease, translate .2s ease, box-shadow .2s ease;
        }
        .core-service-cta svg { width: 15px; height: 15px; transition: transform .2s ease; }
        .core-service-card:hover .core-service-cta { background: var(--blush); color: var(--pink); gap: 12px; translate: 0 1px; box-shadow: 0 2px 0 var(--deep); }
        .core-service-card:hover .core-service-cta svg { transform: translateX(3px); }

        /* ===== Flagship spotlight ===== */
        .core-spotlight-banner {
            position: relative; margin-top: 84px; overflow: hidden; border-radius: 26px;
            background:
                radial-gradient(50% 70% at 100% 0%, rgba(255, 181, 71, .35), transparent 70%),
                radial-gradient(40% 50% at 0% 100%, rgba(255, 255, 255, .16), transparent 70%),
                linear-gradient(135deg, #A8006A 0%, var(--pink) 50%, var(--pink2) 100%);
            color: #fff; padding: 60px 28px; text-align: center; border: 0;
            box-shadow: 10px 10px 0 var(--gold);
        }
        .core-spotlight-banner::before { /* dot grid */
            content: ''; position: absolute; inset: 0; height: auto; right: 0; left: 0; top: 0;
            background: radial-gradient(rgba(255, 255, 255, .15) 1px, transparent 1.2px) 0 0 / 26px 26px;
            -webkit-mask-image: linear-gradient(180deg, #000 20%, transparent 100%);
                    mask-image: linear-gradient(180deg, #000 20%, transparent 100%);
            pointer-events: none;
        }
        .core-spotlight-banner::after { /* conic glow border */
            content: ''; position: absolute; inset: 0; border-radius: inherit; padding: 3px; pointer-events: none;
            background: conic-gradient(from var(--cswa, 0deg), var(--gold), #fff, var(--pink3), var(--gold));
            -webkit-mask: linear-gradient(#000 0 0) content-box, linear-gradient(#000 0 0);
            -webkit-mask-composite: xor;
            mask: linear-gradient(#000 0 0) content-box exclude, linear-gradient(#000 0 0);
            animation: coreSwAngle 6s linear infinite;
        }
        @property --cswa { syntax: '<angle>'; initial-value: 0deg; inherits: false; }
        @keyframes coreSwAngle { to { --cswa: 360deg; } }
        .core-spotlight-inner { position: relative; z-index: 2; max-width: 860px; margin: 0 auto; }

        .core-spotlight-eyebrow {
            display: inline-flex; align-items: center; gap: 8px;
            margin-bottom: 18px; padding: 7px 14px 7px 10px;
            border-radius: 999px;
            background: rgba(255, 255, 255, .18); border: 1px solid rgba(255, 255, 255, .45);
            color: #fff; font-size: .8rem; font-weight: 800; letter-spacing: .06em; text-transform: uppercase;
            backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);
        }
        .core-spotlight-eyebrow svg { width: 14px; height: 14px; color: var(--gold); }
        .core-spotlight-heading {
            font-family: var(--disp); font-size: clamp(2rem, 4.2vw, 3.4rem); font-weight: 800;
            color: #fff; margin: 0 0 14px; line-height: 1.06; letter-spacing: -.02em;
            text-shadow: 0 3px 0 rgba(126, 0, 78, .3);
        }
        .core-spotlight-heading .accent { position: relative; display: inline-block; color: var(--gold); }
        .core-spotlight-heading .accent svg { position: absolute; left: 0; bottom: -6px; width: 100%; height: 6px; overflow: visible; }
        .core-spotlight-heading .accent svg path { stroke: var(--pink3); }
        .core-spotlight-subheading {
            font-family: var(--disp); font-size: clamp(1.1rem, 2vw, 1.4rem); font-weight: 600;
            color: #FFD7EB; margin: 0 auto 14px; line-height: 1.35; max-width: 640px;
        }
        .core-spotlight-desc { font-size: 1rem; color: rgba(255, 255, 255, .9); line-height: 1.7; margin: 0 auto 12px; max-width: 780px; }
        .core-spotlight-subdesc { font-size: .92rem; color: rgba(255, 255, 255, .78); line-height: 1.65; margin: 0 auto 26px; max-width: 760px; }
        .core-spotlight-subdesc strong { color: var(--gold); font-weight: 800; }

        .core-spotlight-pills { display: flex; flex-wrap: wrap; justify-content: center; gap: 12px; margin-bottom: 30px; }
        .spotlight-pill {
            display: inline-flex; align-items: center; gap: 6px;
            padding: 8px 14px; border-radius: 10px;
            background: var(--gold); color: var(--deep);
            border: 2px solid var(--deep); box-shadow: 3px 3px 0 var(--deep);
            font-family: var(--disp); font-weight: 800; font-size: .8rem; line-height: 1.2;
        }
        .spotlight-pill:nth-child(even) { background: #fff; }

        .core-spotlight-actions { display: flex; flex-direction: row; flex-wrap: wrap; justify-content: center; align-items: center; gap: 14px; margin-bottom: 22px; }
        .core-spotlight-btn-primary, .core-spotlight-btn-secondary {
            display: inline-flex !important; align-items: center !important; justify-content: center !important; gap: 10px !important;
            padding: 15px 26px; border-radius: 12px;
            font-weight: 800; font-size: .95rem; line-height: 1.2;
            text-decoration: none; text-align: center; border: 2px solid transparent;
            transition: translate .2s ease, box-shadow .2s ease, background .2s ease;
        }
        .core-spotlight-btn-primary {
            background: var(--pink); color: #fff !important;
            box-shadow: 0 6px 0 var(--deep);
            white-space: nowrap !important;
        }
        .core-spotlight-btn-primary:hover { translate: 0 2px; transform: none; box-shadow: 0 4px 0 var(--deep); color: #fff; }
        .core-spotlight-btn-primary:active { translate: 0 6px; box-shadow: 0 0 0 var(--deep); }
        .core-spotlight-btn-primary svg { width: 16px !important; height: 16px !important; flex-shrink: 0; transition: transform .2s ease; }
        .core-spotlight-btn-primary:hover svg { transform: translateX(3px); }
        .core-spotlight-btn-secondary {
            background: transparent; color: #fff !important;
            border-color: rgba(255, 255, 255, .5);
            white-space: nowrap !important;
        }
        .core-spotlight-btn-secondary:hover { background: rgba(255, 255, 255, .12); border-color: #fff; transform: none; }

        .core-spotlight-footnote {
            margin: 0 auto; max-width: 740px; padding-top: 18px;
            border-top: 1px dashed rgba(255, 255, 255, .3);
            font-size: .8rem; color: rgba(255, 255, 255, .72); line-height: 1.6;
        }

        /* ===== Responsive ===== */
        @media (max-width: 767px) {
            .core-services-section { padding: 68px 0 56px; }
            .core-services-header { margin-bottom: 40px; }
            .core-spotlight-banner { margin-top: 60px; padding: 46px 20px; box-shadow: 6px 6px 0 var(--gold); }
            .core-service-card::after { font-size: 2rem; }
        }
        @media (max-width: 575px) {
            .core-services-container { padding: 0 16px; }
            .core-service-card { padding: 54px 20px 22px; box-shadow: 4px 4px 0 var(--gold); }
            .core-spotlight-banner { border-radius: 20px; }
            .core-spotlight-actions { flex-direction: column; width: 100%; }
            .core-spotlight-btn-primary, .core-spotlight-btn-secondary { width: 100%; white-space: normal !important; min-height: 48px; }
            .core-service-cta { width: 100%; justify-content: center; }
            .spotlight-pill { font-size: .76rem; }
        }
        @media (min-width: 1440px) { .core-services-container { max-width: 1320px; } }
        @media (hover: none) {
            .core-service-card:hover { translate: none; box-shadow: 6px 6px 0 var(--gold); }
            .core-service-card:hover .core-service-icon { rotate: none; scale: 1; }
        }
        @media (prefers-reduced-motion: reduce) {
            .core-spotlight-banner::after { animation: none; }
            .core-service-card, .core-service-icon, .core-service-cta svg { transition: none; }
        }
    </style>

    <section class="core-services-section" id="core-services">
        <div class="core-services-container">

            <!-- Section Header -->
            <div class="core-services-header" data-wtm-reveal="fade-up">
                <div class="core-services-pill">
                    <?= coreSvcIcon('sparkles') ?>
                    <span>WHAT WE OFFER</span>
                </div>
                <h2 class="core-services-title">
                    Our
                    <span class="accent">
                        Core Services
                        <svg viewBox="0 0 300 6" preserveAspectRatio="none">
                            <path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none" opacity="0.35"/>
                        </svg>
                    </span>
                </h2>
                <p class="core-services-subtitle">End-to-end digital solutions to help your business thrive</p>
            </div>

            <!-- 6 Services Grid -->
            <div class="core-services-grid" data-reveal-stagger>
                <?php foreach ($services as $svc): ?>
                    <a href="<?= htmlspecialchars($svc['href']) ?>" class="core-service-card">
                        <div class="core-service-icon">
                            <?= coreSvcIcon($svc['icon']) ?>
                        </div>
                        <h3 class="core-service-heading"><?= htmlspecialchars($svc['title']) ?></h3>
                        <p class="core-service-desc"><?= htmlspecialchars($svc['description']) ?></p>

                        <div class="core-service-tags">
                            <?php foreach ($svc['tags'] as $tag): ?>
                                <span class="core-service-tag"><?= htmlspecialchars($tag) ?></span>
                            <?php endforeach; ?>
                        </div>

                        <span class="core-service-cta">
                            Learn More
                            <?= coreSvcIcon('arrow') ?>
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>

            <!-- B2B & Exhibition SEO Flagship Spotlight Callout -->
            <div class="core-spotlight-banner" data-wtm-reveal="fade-up">
                <div class="core-spotlight-inner">

                    <div class="core-spotlight-eyebrow">
                        <?= coreSvcIcon('sparkles') ?>
                        <span>SPECIALIZED FLAGSHIP</span>
                    </div>

                    <h3 class="core-spotlight-heading">
                        Boost Your Event &amp; Exhibition <span class="accent">With SEO.<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                    </h3>

                    <h4 class="core-spotlight-subheading">
                        Want to attract more attendees, sponsors, exhibitors, and increase revenue?
                    </h4>

                    <p class="core-spotlight-desc">
                        We'll help you uncover hidden opportunities and improve your exhibition website's performance with a customized Event SEO strategy that drives pre-registered trade buyers, sells out stalls, and delivers measurable results.
                    </p>

                    <p class="core-spotlight-subdesc">
                        The organic search engine partner behind <strong>Bharat Tex Fair (Ministry of Textiles)</strong> and <strong>IHGF Delhi Autumn Fair (EPCH)</strong>. If you have any questions about how to kick-start your SEO strategy get in touch today.
                    </p>

                    <div class="core-spotlight-pills">
                        <span class="spotlight-pill">✓ Attract Global Attendees</span>
                        <span class="spotlight-pill">✓ Sell Out Exhibitor Stalls</span>
                        <span class="spotlight-pill">✓ Multi-Date Google Event Schema</span>
                        <span class="spotlight-pill">✓ 400%+ Organic Lift Proven</span>
                    </div>

                    <div class="core-spotlight-actions">
                        <a href="/b2b-exhibition-seo.php" class="core-spotlight-btn-primary">
                            <span>Let's Talk Optimization</span>
                            <?= coreSvcIcon('arrow') ?>
                        </a>
                        <a href="tel:+919999674255" class="core-spotlight-btn-secondary">
                            <span>Call: +91-9999674255</span>
                        </a>
                    </div>

                    <p class="core-spotlight-footnote">
                        * While results can't be guaranteed, events and trade exhibitions are uniquely positioned to perform exceptionally well with effective search engine optimization.
                    </p>

                </div>
            </div>

        </div>
    </section>
    <?php
}