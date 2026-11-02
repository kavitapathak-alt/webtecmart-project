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

    // Icon helper matching exact reference designs
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
    ?>
    <style>
        /* ============================================================
           WHAT WE OFFER — OUR CORE SERVICES SECTION (Black & Hot Pink)
           ============================================================ */
        .core-services-section {
            width: 100%;
            background: #FFFFFF;
            padding: 56px 0 44px;
            position: relative;
            border-bottom: 1px solid #EAEAEA;
        }
        @media (min-width: 768px) {
            .core-services-section {
                padding: 68px 0 52px;
            }
        }

        .core-services-container {
            max-width: 1280px;
            margin: 0 auto;
            padding-left: 20px;
            padding-right: 20px;
            width: 100%;
        }

        /* ===== Header ===== */
        .core-services-header {
            text-align: center;
            margin: 0 auto 36px;
            max-width: 720px;
        }
        @media (min-width: 768px) {
            .core-services-header {
                margin-bottom: 46px;
            }
        }

        .core-services-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #FFF2F7;
            border: 1px solid #EAEAEA;
            padding: 6px 16px;
            border-radius: 9999px;
            margin-bottom: 14px;
        }

        .core-services-pill svg {
            width: 14px;
            height: 14px;
            color: #FF2D75;
            flex-shrink: 0;
        }

        .core-services-pill span {
            font-size: 0.74rem;
            color: #FF2D75;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .core-services-title {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            font-size: clamp(1.9rem, 3.4vw, 2.6rem);
            font-weight: 800;
            color: #111111;
            letter-spacing: -0.025em;
            line-height: 1.18;
            margin: 0 0 12px;
        }

        .core-services-title .accent {
            color: #FF2D75;
            position: relative;
            display: inline-block;
        }

        .core-services-title .accent svg {
            position: absolute;
            left: 0;
            bottom: -4px;
            width: 100%;
            height: 6px;
            pointer-events: none;
        }

        .core-services-subtitle {
            font-size: 1rem;
            color: #4A4A4A;
            margin: 0 auto;
            line-height: 1.6;
            max-width: 600px;
        }

        /* ===== 6-Card Grid ===== */
        .core-services-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }
        @media (min-width: 680px) {
            .core-services-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 24px;
            }
        }
        @media (min-width: 1024px) {
            .core-services-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
                gap: 26px;
            }
        }

        /* ===== Card ===== */
        .core-service-card {
            background: #FFFFFF;
            border: 1px solid #EAEAEA;
            border-radius: 20px;
            padding: 30px 26px 24px 26px;
            display: flex;
            flex-direction: column;
            text-decoration: none;
            color: inherit;
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.03);
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1),
                        box-shadow 0.3s cubic-bezier(0.16, 1, 0.3, 1),
                        border-color 0.3s ease;
            position: relative;
        }

        .core-service-card:hover {
            transform: translateY(-5px);
            border-color: #FF2D75;
            box-shadow: 0 18px 38px rgba(255, 45, 117, 0.12);
        }

        /* Icon Container */
        .core-service-icon {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            background: #FFF2F7;
            border: 1px solid #EAEAEA;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            transition: transform 0.25s ease, background 0.25s ease, color 0.25s ease;
            flex-shrink: 0;
            color: #FF2D75;
        }

        .core-service-card:hover .core-service-icon {
            transform: scale(1.08);
            background: #FF2D75;
            color: #FFFFFF;
            border-color: #FF2D75;
        }

        .core-service-icon svg {
            width: 22px;
            height: 22px;
            stroke-width: 2;
        }

        /* Card Title */
        .core-service-heading {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            font-size: 1.22rem;
            font-weight: 800;
            color: #111111;
            margin: 0 0 10px;
            line-height: 1.32;
            letter-spacing: -0.015em;
            transition: color 0.2s ease;
        }

        .core-service-card:hover .core-service-heading {
            color: #FF2D75;
        }

        /* Description */
        .core-service-desc {
            font-size: 0.9rem;
            color: #4A4A4A;
            line-height: 1.62;
            margin: 0 0 20px;
            flex-grow: 1;
        }

        /* Tags */
        .core-service-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            margin-bottom: 20px;
        }

        .core-service-tag {
            display: inline-flex;
            align-items: center;
            padding: 4px 11px;
            background: #F3F3F3;
            color: #111111;
            border: 1px solid #EAEAEA;
            border-radius: 9999px;
            font-size: 0.74rem;
            font-weight: 600;
            letter-spacing: 0.01em;
            transition: background 0.2s ease, border-color 0.2s ease, color 0.2s ease;
        }

        .core-service-card:hover .core-service-tag {
            background: #FFF2F7;
            color: #FF2D75;
            border-color: rgba(255, 45, 117, 0.3);
        }

        /* Learn More Link */
        .core-service-cta {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: #FF2D75;
            font-weight: 700;
            font-size: 0.92rem;
            text-decoration: none;
            margin-top: auto;
            transition: gap 0.2s ease, color 0.2s ease;
        }

        .core-service-cta svg {
            width: 15px;
            height: 15px;
            stroke-width: 2.5;
            transition: transform 0.2s ease;
        }

        .core-service-card:hover .core-service-cta {
            color: #111111;
        }

        .core-service-card:hover .core-service-cta svg {
            transform: translateX(4px);
        }

        /* ===== B2B & Exhibition SEO Spotlight Banner (Premium Black Card) ===== */
        .core-spotlight-banner {
            margin-top: 48px;
            background: #111111;
            border: 1px solid #292929;
            border-radius: 24px;
            padding: 44px 32px;
            text-align: center;
            box-shadow: 0 16px 48px rgba(0, 0, 0, 0.25);
            position: relative;
            overflow: hidden;
        }
        .core-spotlight-banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #FF2D75, #F65A91);
        }
        .core-spotlight-inner {
            max-width: 860px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }
        .core-spotlight-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 14px;
            border-radius: 9999px;
            background: rgba(255, 45, 117, 0.12);
            border: 1px solid rgba(255, 45, 117, 0.25);
            color: #FF2D75;
            font-size: 0.72rem;
            font-weight: 800;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-bottom: 16px;
        }
        .core-spotlight-eyebrow svg {
            width: 13px;
            height: 13px;
            color: #FF2D75;
        }
        .core-spotlight-heading {
            font-family: 'Plus Jakarta Sans', -apple-system, sans-serif;
            font-size: clamp(1.85rem, 3.4vw, 2.5rem);
            font-weight: 800;
            color: #FFFFFF;
            margin: 0 0 14px;
            line-height: 1.25;
            letter-spacing: -0.02em;
        }
        .core-spotlight-heading .accent {
            color: #FF2D75;
            position: relative;
            display: inline-block;
        }
        .core-spotlight-heading .accent svg {
            position: absolute;
            left: 0;
            bottom: -5px;
            width: 100%;
            height: 6px;
            overflow: visible;
        }
        .core-spotlight-subheading {
            font-size: clamp(1.05rem, 1.8vw, 1.25rem);
            font-weight: 700;
            color: #FFFFFF;
            margin: 0 auto 14px;
            line-height: 1.4;
        }
        .core-spotlight-desc {
            font-size: 0.96rem;
            color: rgba(255, 255, 255, 0.82);
            line-height: 1.68;
            margin: 0 auto 12px;
            max-width: 800px;
        }
        .core-spotlight-subdesc {
            font-size: 0.88rem;
            color: rgba(255, 255, 255, 0.75);
            line-height: 1.6;
            margin: 0 auto 24px;
            max-width: 780px;
        }
        .core-spotlight-subdesc strong {
            color: #FFFFFF;
            font-weight: 700;
        }
        .core-spotlight-pills {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
            margin-bottom: 28px;
        }
        .spotlight-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 0.8rem;
            font-weight: 700;
            color: #FF2D75;
            background: #1A1A1A;
            border: 1px solid #292929;
            padding: 6px 14px;
            border-radius: 9999px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }
        .core-spotlight-actions {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            gap: 14px;
            margin-bottom: 18px;
        }
        .core-spotlight-btn-primary {
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            gap: 8px !important;
            background: #FF2D75;
            color: #FFFFFF !important;
            font-weight: 700;
            font-size: 0.95rem;
            line-height: 1;
            padding: 14px 30px;
            border-radius: 9999px;
            text-decoration: none;
            white-space: nowrap !important;
            box-shadow: 0 10px 24px rgba(255, 45, 117, 0.35);
            transition: all 0.25s ease;
        }
        .core-spotlight-btn-primary:hover {
            background: #F65A91;
            transform: translateY(-2px);
            box-shadow: 0 14px 30px rgba(255, 45, 117, 0.45);
            color: #FFFFFF;
        }
        .core-spotlight-btn-primary svg {
            width: 16px !important;
            height: 16px !important;
            flex-shrink: 0;
            transition: transform 0.2s ease;
        }
        .core-spotlight-btn-primary:hover svg {
            transform: translateX(3px);
        }
        .core-spotlight-btn-secondary {
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            gap: 8px !important;
            background: transparent;
            border: 1.5px solid #333333;
            color: #FFFFFF !important;
            font-weight: 700;
            font-size: 0.95rem;
            line-height: 1;
            padding: 13px 26px;
            border-radius: 9999px;
            text-decoration: none;
            white-space: nowrap !important;
            transition: all 0.25s ease;
        }
        .core-spotlight-btn-secondary:hover {
            border-color: #FF2D75;
            color: #FF2D75 !important;
            background: rgba(255, 45, 117, 0.08);
            transform: translateY(-2px);
        }
        .core-spotlight-footnote {
            font-size: 0.78rem;
            color: rgba(255, 255, 255, 0.5);
            line-height: 1.55;
            margin: 0 auto;
            max-width: 740px;
        }
        @media (max-width: 540px) {
            .core-spotlight-banner {
                padding: 28px 18px;
            }
            .core-spotlight-actions {
                flex-direction: column;
                width: 100%;
            }
            .core-spotlight-btn-primary,
            .core-spotlight-btn-secondary {
                width: 100%;
                text-align: center;
            }
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
                            <path d="M2 3C60 1 240 1 298 3" stroke="#FF2D75" stroke-width="2.5" stroke-linecap="round" fill="none" opacity="0.4"/>
                        </svg>
                    </span>
                </h2>
                <p class="core-services-subtitle">End-to-end digital solutions to help your business thrive</p>
            </div>

            <!-- 6 Services Grid (matches exact reference design) -->
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

            <!-- B2B & Exhibition SEO Flagship Spotlight Callout (Inspired by reference) -->
            <div class="core-spotlight-banner" data-wtm-reveal="fade-up">
                <div class="core-spotlight-inner">

                    <div class="core-spotlight-eyebrow">
                        <?= coreSvcIcon('sparkles') ?>
                        <span>SPECIALIZED FLAGSHIP</span>
                    </div>

                    <h3 class="core-spotlight-heading">
                        Boost Your Event &amp; Exhibition <span class="accent">With SEO.<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#FF2D75" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
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