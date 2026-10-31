<?php
/**
 * WebTecMart — Premium Service Page Layout
 * Reusable layout engine powering all public-facing service pages.
 * 
 * Features:
 * - 2-Column Desktop Hero with Signature Pill, Magenta Highlight & Curved SVG Underline
 * - Interactive Service Preview Glassmorphism Card with Live Metrics
 * - Trust & Strategic Benefits Section ("Why Your Business Needs [Service]")
 * - Strategic Approach & Methodology (4 Pillars)
 * - Service Features & Deliverables with Custom Tag Pills
 * - 5-Step Connected Working Process Roadmap
 * - Authentic Results & Case Studies (Bharat Tex & IHGF Delhi Fair)
 * - The WebTecMart Advantage (13+ Years Experience, Dedicated Specialists)
 * - Accessible Interactive FAQ Accordion
 * - High-Impact Conversion CTA Banner
 */

function renderServicePageLayout(array $config): void
{
    $icon            = $config['icon'] ?? 'sparkles';
    $title           = $config['title'] ?? 'Service';
    $tagline         = $config['tagline'] ?? '';
    $heroDescription = $config['heroDescription'] ?? ($config['hero_description'] ?? '');
    $overview        = $config['overview'] ?? ($config['body'] ?? '');
    $features        = $config['features'] ?? [];
    $process         = $config['process'] ?? [];
    $faqs            = $config['faqs'] ?? [];
    $slug            = $config['slug'] ?? '';
    $category        = $config['category'] ?? '';

    // Smart Domain-Specific Defaults for Benefits if not explicitly passed
    $benefits = $config['benefits'] ?? [
        [
            'icon' => 'trending',
            'title' => 'High-Intent Customer Acquisition',
            'desc' => 'Capture qualified prospects actively searching for solutions, turning organic and paid interest into measurable inbound inquiries and sales pipeline.',
            'metric' => '3x Average Lead Lift'
        ],
        [
            'icon' => 'shield',
            'title' => 'Durable Market Authority',
            'desc' => 'Build a resilient digital footprint that outranks competitors and establishes your brand as the trusted industry leader in your category.',
            'metric' => 'Top 3 Search Dominance'
        ],
        [
            'icon' => 'target',
            'title' => 'Optimized ROI & Lower CAC',
            'desc' => 'Every campaign, page, and workflow is engineered to maximize conversion rates, lowering customer acquisition cost while scaling revenue sustainably.',
            'metric' => '99.8% Client Satisfaction'
        ]
    ];

    // Strategic Approach / What We Do Pillars
    $approach = $config['approach'] ?? [
        [
            'number' => '01',
            'title' => 'Deep Audit & Competitive Intel',
            'desc' => 'We analyze your current visibility, target audience behavior, search intent gaps, and direct competitors to uncover high-impact growth levers.'
        ],
        [
            'number' => '02',
            'title' => 'Data-Driven Custom Architecture',
            'desc' => 'No cookie-cutter templates. We architect a tailored strategy built strictly around your business goals, target markets, and budget efficiency.'
        ],
        [
            'number' => '03',
            'title' => 'Flawless Technical & Creative Execution',
            'desc' => 'Our in-house engineers and marketing specialists execute campaigns with clean code, search-optimized structure, and compelling creatives.'
        ],
        [
            'number' => '04',
            'title' => 'Continuous Optimization & Reporting',
            'desc' => 'We monitor performance weekly through Google Analytics 4 and custom dashboards, continuously testing and refining for compounding results.'
        ]
    ];

    // Default Case Study
    $caseStudy = $config['caseStudy'] ?? [
        'client' => 'Bharat Tex Fair 2026 (Ministry of Textiles, Govt. of India)',
        'result' => '400% Organic Growth',
        'metrics' => [
            ['val' => '400%', 'lbl' => 'Organic Growth'],
            ['val' => '200+', 'lbl' => 'Keywords Ranked'],
            ['val' => '80+', 'lbl' => 'Top 3 Positions'],
            ['val' => '180+', 'lbl' => 'Leads / Month']
        ],
        'desc' => 'Positioned India\'s premier mega-textile expo at the very top of global search queries, driving verified international buyer delegations and high-value registrations.',
        'link' => '/portfolio.php'
    ];

    // Why Choose WebTecMart Differentiators
    $whyPoints = $config['whyPoints'] ?? [
        [
            'icon' => 'award',
            'title' => '13+ Years Proven Track Record',
            'desc' => 'Over a decade of digital excellence in Delhi NCR and nationwide, serving 1,000+ businesses with authentic, sustainable growth.'
        ],
        [
            'icon' => 'users',
            'title' => 'Dedicated In-House Specialists',
            'desc' => 'You work directly with experienced strategists, full-stack developers, and certified ad managers — no junior outsourcing.'
        ],
        [
            'icon' => 'shield',
            'title' => '100% White-Hat & Transparent',
            'desc' => 'Strict adherence to Google Search Essentials and ad network policies with comprehensive bi-weekly transparent reporting.'
        ],
        [
            'icon' => 'rocket',
            'title' => 'Tailored For Business Revenue',
            'desc' => 'We focus on business metrics that actually matter — inbound inquiries, booked calls, and revenue growth, not just vanity impressions.'
        ]
    ];

    // Icon SVG helper
    if (!function_exists('svcIcon')) {
        function svcIcon(string $name, int $size = 20): string {
            $icons = [
                'sparkles'   => '<path d="M12 2l2.4 6.6L21 11l-6.6 2.4L12 20l-2.4-6.6L3 11l6.6-2.4L12 2z"/>',
                'layout'     => '<rect width="18" height="7" x="3" y="3" rx="1"/><rect width="9" height="7" x="3" y="14" rx="1"/><rect width="5" height="7" x="16" y="14" rx="1"/>',
                'code'       => '<path d="m16 18 6-6-6-6"/><path d="m8 6-6 6 6 6"/>',
                'search'     => '<circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/>',
                'share'      => '<path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"/><polyline points="16 6 12 2 8 6"/><line x1="12" x2="12" y1="2" y2="15"/>',
                'megaphone'  => '<path d="m3 11 18-5v12L3 14v-3z"/><path d="M11.6 16.8a3 3 0 1 1-5.8-1.6"/>',
                'smartphone' => '<rect width="14" height="20" x="5" y="2" rx="2" ry="2"/><path d="M12 18h.01"/>',
                'globe'      => '<circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/>',
                'check'      => '<circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/>',
                'arrow'      => '<path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>',
                'plus'       => '<path d="M5 12h14"/><path d="M12 5v14"/>',
                'minus'      => '<path d="M5 12h14"/>',
                'phone'      => '<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>',
                'rocket'     => '<path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"/><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"/><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"/><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"/>',
                'target'     => '<circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/>',
                'trophy'     => '<path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22"/><path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22"/><path d="M18 2H6v7a6 6 0 0 0 12 0V2Z"/>',
                'shield'     => '<path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/>',
                'users'      => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
                'trending'   => '<polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/>',
                'award'      => '<circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/>',
                'mappin'     => '<path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/>',
            ];
            $path = $icons[$name] ?? $icons['sparkles'];
            return '<svg xmlns="http://www.w3.org/2000/svg" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . $path . '</svg>';
        }
    }
    ?>

    <style>
        /* ============================================================
           PREMIUM SERVICE PAGE STYLING
           ============================================================ */
        .svc-page {
            width: 100%;
            background: #FBF8F1;
            color: #1F1B2A;
            overflow: hidden;
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
        }

        .svc-container {
            max-width: 1240px;
            margin: 0 auto;
            padding-left: 20px;
            padding-right: 20px;
            position: relative;
            z-index: 2;
        }

        /* ===== SIGNATURE SECTION HEADERS ===== */
        .svc-section-header {
            text-align: center;
            max-width: 720px;
            margin: 0 auto 28px;
        }
        .svc-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(196, 0, 122, 0.08);
            border: 1px solid rgba(196, 0, 122, 0.15);
            padding: 5px 14px;
            border-radius: 9999px;
            margin-bottom: 10px;
            color: #C4007A;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }
        .svc-eyebrow svg {
            width: 13px;
            height: 13px;
            color: #C4007A;
            flex-shrink: 0;
        }
        .svc-section-title {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            font-size: clamp(1.85rem, 3.2vw, 2.5rem);
            font-weight: 800;
            color: #111827;
            margin: 0 0 8px;
            line-height: 1.18;
            letter-spacing: -0.02em;
        }
        .svc-section-title .accent {
            color: #C4007A;
            position: relative;
            display: inline-block;
        }
        .svc-section-title .accent svg {
            position: absolute;
            left: 0;
            bottom: -4px;
            width: 100%;
            height: 6px;
            pointer-events: none;
        }
        .svc-section-sub {
            font-size: 0.95rem;
            color: #4B5563;
            line-height: 1.55;
            max-width: 640px;
            margin: 0 auto;
        }

        /* ===== HERO SECTION (2-COL) ===== */
        .svc-hero {
            position: relative;
            padding: 36px 0 32px;
            background: linear-gradient(180deg, rgba(252, 232, 243, 0.4) 0%, rgba(251, 248, 241, 0) 100%);
            border-bottom: 1px solid rgba(196, 0, 122, 0.06);
        }
        .svc-hero-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 32px;
            align-items: center;
        }
        @media (min-width: 992px) {
            .svc-hero-grid {
                grid-template-columns: 1.15fr 0.85fr;
                gap: 48px;
            }
        }

        .svc-hero-left {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        .svc-hero-title {
            font-size: clamp(2rem, 3.6vw, 3.1rem);
            font-weight: 800;
            color: #111827;
            line-height: 1.15;
            letter-spacing: -0.02em;
            margin: 0 0 14px;
        }
        .svc-hero-title .accent {
            color: #C4007A;
            position: relative;
            display: inline-block;
        }
        .svc-hero-title .accent svg {
            position: absolute;
            left: 0;
            bottom: -4px;
            width: 100%;
            height: 6px;
            pointer-events: none;
        }
        .svc-hero-desc {
            font-size: 1.02rem;
            line-height: 1.62;
            color: #4B5563;
            margin: 0 0 24px;
            max-width: 620px;
        }
        .svc-hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 28px;
            width: 100%;
        }
        .svc-btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: linear-gradient(135deg, #C4007A 0%, #E0398F 100%);
            color: #FFFFFF !important;
            font-weight: 700;
            font-size: 0.92rem;
            line-height: 1;
            padding: 13px 26px;
            border-radius: 9999px;
            text-decoration: none;
            box-shadow: 0 10px 24px rgba(196, 0, 122, 0.28);
            transition: all 0.25s ease;
            white-space: nowrap !important;
            word-break: keep-all !important;
            flex-shrink: 0;
        }
        .svc-btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 28px rgba(196, 0, 122, 0.38);
            color: #FFFFFF;
        }
        .svc-btn-primary svg {
            width: 16px !important;
            height: 16px !important;
            min-width: 16px !important;
            min-height: 16px !important;
            max-width: 16px !important;
            max-height: 16px !important;
            flex-shrink: 0 !important;
            display: inline-block;
            transition: transform 0.2s ease;
        }
        .svc-btn-primary:hover svg {
            transform: translateX(3px);
        }
        .svc-btn-secondary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: #FFFFFF;
            border: 1.5px solid rgba(196, 0, 122, 0.2);
            color: #C4007A !important;
            font-weight: 700;
            font-size: 0.92rem;
            line-height: 1;
            padding: 13px 22px;
            border-radius: 9999px;
            text-decoration: none;
            transition: all 0.25s ease;
            white-space: nowrap !important;
            word-break: keep-all !important;
            flex-shrink: 0;
        }
        .svc-btn-secondary:hover {
            background: rgba(196, 0, 122, 0.05);
            border-color: #C4007A;
            transform: translateY(-2px);
        }
        .svc-btn-secondary svg {
            width: 15px !important;
            height: 15px !important;
            min-width: 15px !important;
            min-height: 15px !important;
            max-width: 15px !important;
            max-height: 15px !important;
            flex-shrink: 0 !important;
            display: inline-block;
        }

        /* Trust Strip under hero buttons */
        .svc-hero-trust {
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
            padding-top: 14px;
            border-top: 1px solid rgba(196, 0, 122, 0.1);
            width: 100%;
        }
        .svc-trust-item {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.78rem;
            font-weight: 700;
            color: #374151;
        }
        .svc-trust-item svg {
            width: 14px;
            height: 14px;
            color: #C4007A;
            flex-shrink: 0;
        }

        /* Hero Right Preview Card */
        .svc-preview-card {
            background: #FFFFFF;
            border: 1.5px solid rgba(196, 0, 122, 0.12);
            border-radius: 24px;
            padding: 28px;
            box-shadow: 0 16px 40px rgba(196, 0, 122, 0.08);
            position: relative;
            overflow: hidden;
        }
        .svc-preview-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #C4007A, #E0398F);
        }
        .svc-preview-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .svc-preview-icon-box {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            background: linear-gradient(135deg, rgba(196, 0, 122, 0.12), rgba(224, 57, 143, 0.06));
            display: grid;
            place-items: center;
            color: #C4007A;
        }
        .svc-preview-icon-box svg {
            width: 24px;
            height: 24px;
        }
        .svc-preview-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #ECFDF5;
            color: #059669;
            font-size: 0.72rem;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 9999px;
            border: 1px solid rgba(5, 150, 105, 0.2);
        }
        .svc-preview-badge .pulse {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #059669;
            box-shadow: 0 0 0 3px rgba(5, 150, 105, 0.2);
            animation: svcPulse 2s infinite;
        }
        @keyframes svcPulse {
            0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(5, 150, 105, 0.7); }
            70% { transform: scale(1); box-shadow: 0 0 0 6px rgba(5, 150, 105, 0); }
            100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(5, 150, 105, 0); }
        }
        .svc-preview-title {
            font-size: 1.15rem;
            font-weight: 800;
            color: #111827;
            margin: 0 0 6px;
        }
        .svc-preview-tagline {
            font-size: 0.85rem;
            color: #6B7280;
            margin: 0 0 18px;
            line-height: 1.45;
        }
        .svc-preview-points {
            list-style: none;
            padding: 0;
            margin: 0 0 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .svc-preview-points li {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.84rem;
            font-weight: 600;
            color: #374151;
        }
        .svc-preview-points svg {
            width: 14px;
            height: 14px;
            color: #C4007A;
            flex-shrink: 0;
        }
        .svc-preview-stat-card {
            background: linear-gradient(135deg, #FFF0F7 0%, #FDF2F8 100%);
            border: 1px solid rgba(196, 0, 122, 0.15);
            border-radius: 14px;
            padding: 14px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .svc-preview-stat-info .num {
            font-size: 1.35rem;
            font-weight: 800;
            color: #C4007A;
            line-height: 1;
        }
        .svc-preview-stat-info .lbl {
            font-size: 0.72rem;
            font-weight: 600;
            color: #6B7280;
            margin-top: 3px;
        }
        .svc-preview-stat-badge {
            background: #FFFFFF;
            border: 1px solid rgba(196, 0, 122, 0.2);
            color: #C4007A;
            font-size: 0.72rem;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 8px;
            white-space: nowrap;
        }

        /* ===== STRATEGIC BENEFITS SECTION ===== */
        .svc-benefits-section {
            padding: 36px 0 28px;
            background: #FFFFFF;
            border-bottom: 1px solid rgba(196, 0, 122, 0.06);
        }
        .svc-benefits-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }
        @media (min-width: 768px) {
            .svc-benefits-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }
        .svc-benefit-card {
            background: #FDF9FB;
            border: 1.5px solid rgba(196, 0, 122, 0.1);
            border-radius: 18px;
            padding: 24px;
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .svc-benefit-card:hover {
            transform: translateY(-4px);
            border-color: #C4007A;
            box-shadow: 0 14px 32px rgba(196, 0, 122, 0.08);
        }
        .svc-benefit-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: rgba(196, 0, 122, 0.1);
            color: #C4007A;
            display: grid;
            place-items: center;
            margin-bottom: 16px;
        }
        .svc-benefit-icon svg {
            width: 20px;
            height: 20px;
        }
        .svc-benefit-card h3 {
            font-size: 1.1rem;
            font-weight: 800;
            color: #111827;
            margin: 0 0 8px;
            line-height: 1.3;
        }
        .svc-benefit-card p {
            font-size: 0.88rem;
            color: #4B5563;
            line-height: 1.6;
            margin: 0 0 16px;
            flex: 1;
        }
        .svc-benefit-metric {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 0.76rem;
            font-weight: 700;
            color: #C4007A;
            background: #FFFFFF;
            padding: 4px 10px;
            border-radius: 8px;
            border: 1px solid rgba(196, 0, 122, 0.15);
            width: fit-content;
        }

        /* ===== APPROACH & METHODOLOGY ===== */
        .svc-approach-section {
            padding: 36px 0 28px;
            background: #FBF8F1;
        }
        .svc-overview-banner {
            background: #FFFFFF;
            border: 1.5px solid rgba(196, 0, 122, 0.12);
            border-radius: 20px;
            padding: 26px;
            margin-bottom: 28px;
            box-shadow: 0 6px 20px rgba(196, 0, 122, 0.04);
        }
        .svc-overview-banner h3 {
            font-size: 1.15rem;
            font-weight: 800;
            color: #111827;
            margin: 0 0 10px;
        }
        .svc-overview-banner p {
            font-size: 0.94rem;
            line-height: 1.68;
            color: #4B5563;
            margin: 0;
        }

        .svc-approach-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }
        @media (min-width: 640px) {
            .svc-approach-grid { grid-template-columns: repeat(2, 1fr); }
        }
        @media (min-width: 1024px) {
            .svc-approach-grid { grid-template-columns: repeat(4, 1fr); }
        }
        .svc-approach-card {
            background: #FFFFFF;
            border: 1.5px solid rgba(196, 0, 122, 0.08);
            border-radius: 18px;
            padding: 22px;
            transition: all 0.3s ease;
            position: relative;
        }
        .svc-approach-card:hover {
            transform: translateY(-4px);
            border-color: #C4007A;
            box-shadow: 0 12px 28px rgba(196, 0, 122, 0.08);
        }
        .svc-approach-num {
            font-size: 1.8rem;
            font-weight: 900;
            color: rgba(196, 0, 122, 0.18);
            line-height: 1;
            margin-bottom: 12px;
            letter-spacing: -0.04em;
        }
        .svc-approach-card h4 {
            font-size: 1.02rem;
            font-weight: 800;
            color: #111827;
            margin: 0 0 8px;
            line-height: 1.3;
        }
        .svc-approach-card p {
            font-size: 0.84rem;
            color: #4B5563;
            line-height: 1.55;
            margin: 0;
        }

        /* ===== FEATURES & DELIVERABLES ===== */
        .svc-features-section {
            padding: 36px 0 30px;
            background: #FFFFFF;
            border-top: 1px solid rgba(196, 0, 122, 0.06);
            border-bottom: 1px solid rgba(196, 0, 122, 0.06);
        }
        .svc-features-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }
        @media (min-width: 640px) {
            .svc-features-grid { grid-template-columns: repeat(2, 1fr); }
        }
        @media (min-width: 992px) {
            .svc-features-grid { grid-template-columns: repeat(3, 1fr); }
        }
        .svc-feature-card {
            background: #FDF9FB;
            border: 1.5px solid rgba(196, 0, 122, 0.08);
            border-radius: 20px;
            padding: 24px;
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
        }
        .svc-feature-card:hover {
            transform: translateY(-4px);
            border-color: #C4007A;
            background: #FFFFFF;
            box-shadow: 0 14px 34px rgba(196, 0, 122, 0.09);
        }
        .svc-feature-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 14px;
        }
        .svc-feature-icon {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: linear-gradient(135deg, rgba(196, 0, 122, 0.12), rgba(224, 57, 143, 0.06));
            color: #C4007A;
            display: grid;
            place-items: center;
        }
        .svc-feature-icon svg {
            width: 18px;
            height: 18px;
        }
        .svc-feature-pill {
            font-size: 0.68rem;
            font-weight: 700;
            color: #C4007A;
            background: #FFFFFF;
            border: 1px solid rgba(196, 0, 122, 0.15);
            padding: 3px 8px;
            border-radius: 6px;
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }
        .svc-feature-card h3 {
            font-size: 1.05rem;
            font-weight: 800;
            color: #111827;
            margin: 0 0 8px;
            line-height: 1.35;
        }
        .svc-feature-card p {
            font-size: 0.86rem;
            color: #4B5563;
            line-height: 1.6;
            margin: 0;
            flex: 1;
        }

        /* ===== PROCESS ROADMAP ===== */
        .svc-process-section {
            padding: 36px 0 30px;
            background: #FBF8F1;
        }
        .svc-process-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 16px;
        }
        @media (min-width: 640px) {
            .svc-process-grid { grid-template-columns: repeat(2, 1fr); }
        }
        @media (min-width: 1024px) {
            .svc-process-grid { grid-template-columns: repeat(5, 1fr); }
        }
        .svc-process-item {
            background: #FFFFFF;
            border: 1.5px solid rgba(196, 0, 122, 0.1);
            border-radius: 18px;
            padding: 22px;
            position: relative;
            transition: all 0.3s ease;
        }
        .svc-process-item:hover {
            transform: translateY(-4px);
            border-color: #C4007A;
            box-shadow: 0 12px 28px rgba(196, 0, 122, 0.08);
        }
        .svc-process-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: linear-gradient(135deg, #C4007A, #E0398F);
            color: #FFFFFF;
            font-weight: 800;
            font-size: 0.82rem;
            margin-bottom: 12px;
            box-shadow: 0 4px 12px rgba(196, 0, 122, 0.25);
        }
        .svc-process-item h3 {
            font-size: 0.98rem;
            font-weight: 800;
            color: #111827;
            margin: 0 0 6px;
            line-height: 1.3;
        }
        .svc-process-item p {
            font-size: 0.82rem;
            color: #4B5563;
            line-height: 1.5;
            margin: 0;
        }

        /* ===== PROVEN CASE STUDY SPOTLIGHT ===== */
        .svc-casestudy-section {
            padding: 36px 0 30px;
            background: #FFFFFF;
            border-top: 1px solid rgba(196, 0, 122, 0.06);
            border-bottom: 1px solid rgba(196, 0, 122, 0.06);
        }
        .svc-casestudy-card {
            background: linear-gradient(135deg, #FFF0F7 0%, #FFFFFF 100%);
            border: 1.5px solid rgba(196, 0, 122, 0.18);
            border-radius: 24px;
            padding: 32px 28px;
            box-shadow: 0 16px 40px rgba(196, 0, 122, 0.06);
        }
        .svc-casestudy-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 28px;
            align-items: center;
        }
        @media (min-width: 992px) {
            .svc-casestudy-grid {
                grid-template-columns: 1.2fr 0.8fr;
            }
        }
        .svc-casestudy-content .flag-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #FFFFFF;
            border: 1px solid rgba(196, 0, 122, 0.2);
            color: #C4007A;
            font-weight: 700;
            font-size: 0.72rem;
            padding: 4px 10px;
            border-radius: 9999px;
            margin-bottom: 12px;
            text-transform: uppercase;
        }
        .svc-casestudy-title {
            font-size: clamp(1.4rem, 2.4vw, 1.85rem);
            font-weight: 800;
            color: #111827;
            margin: 0 0 10px;
            line-height: 1.25;
        }
        .svc-casestudy-desc {
            font-size: 0.94rem;
            color: #4B5563;
            line-height: 1.62;
            margin: 0 0 20px;
        }
        .svc-metrics-strip {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }
        @media (min-width: 640px) {
            .svc-metrics-strip { grid-template-columns: repeat(4, 1fr); }
        }
        .svc-metric-box {
            background: #FFFFFF;
            border: 1px solid rgba(196, 0, 122, 0.15);
            border-radius: 14px;
            padding: 12px 14px;
            text-align: center;
        }
        .svc-metric-box .val {
            font-size: 1.35rem;
            font-weight: 800;
            color: #C4007A;
            line-height: 1.1;
        }
        .svc-metric-box .lbl {
            font-size: 0.72rem;
            font-weight: 600;
            color: #6B7280;
            margin-top: 3px;
        }

        /* ===== WHY CHOOSE WEBTECMART ===== */
        .svc-why-section {
            padding: 36px 0 30px;
            background: #FBF8F1;
        }
        .svc-why-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }
        @media (min-width: 640px) {
            .svc-why-grid { grid-template-columns: repeat(2, 1fr); }
        }
        @media (min-width: 1024px) {
            .svc-why-grid { grid-template-columns: repeat(4, 1fr); }
        }
        .svc-why-card {
            background: #FFFFFF;
            border: 1.5px solid rgba(196, 0, 122, 0.1);
            border-radius: 18px;
            padding: 24px;
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
        }
        .svc-why-card:hover {
            transform: translateY(-4px);
            border-color: #C4007A;
            box-shadow: 0 12px 30px rgba(196, 0, 122, 0.08);
        }
        .svc-why-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: rgba(196, 0, 122, 0.1);
            color: #C4007A;
            display: grid;
            place-items: center;
            margin-bottom: 14px;
        }
        .svc-why-icon svg {
            width: 20px;
            height: 20px;
        }
        .svc-why-card h4 {
            font-size: 1.05rem;
            font-weight: 800;
            color: #111827;
            margin: 0 0 8px;
            line-height: 1.35;
        }
        .svc-why-card p {
            font-size: 0.85rem;
            color: #4B5563;
            line-height: 1.55;
            margin: 0;
            flex: 1;
        }

        /* ===== FAQ ACCORDION ===== */
        .svc-faq-section {
            padding: 36px 0 32px;
            background: #FFFFFF;
            border-top: 1px solid rgba(196, 0, 122, 0.06);
        }
        .svc-faq-wrap {
            max-width: 860px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
        .svc-faq-item {
            background: #FDF9FB;
            border: 1.5px solid rgba(196, 0, 122, 0.1);
            border-radius: 14px;
            overflow: hidden;
            transition: all 0.25s ease;
        }
        .svc-faq-item:hover {
            border-color: rgba(196, 0, 122, 0.3);
        }
        .svc-faq-item.active {
            border-color: #C4007A;
            background: #FFFFFF;
            box-shadow: 0 8px 24px rgba(196, 0, 122, 0.07);
        }
        .svc-faq-btn {
            width: 100%;
            background: none;
            border: none;
            padding: 16px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            font-family: inherit;
            font-size: 0.98rem;
            font-weight: 700;
            color: #111827;
            text-align: left;
            cursor: pointer;
            transition: color 0.2s ease;
        }
        .svc-faq-item.active .svc-faq-btn {
            color: #C4007A;
        }
        .svc-faq-btn-icon {
            width: 28px;
            height: 28px;
            border-radius: 8px;
            background: rgba(196, 0, 122, 0.08);
            color: #C4007A;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            transition: transform 0.25s ease, background 0.25s ease;
        }
        .svc-faq-item.active .svc-faq-btn-icon {
            background: #C4007A;
            color: #FFFFFF;
            transform: rotate(45deg);
        }
        .svc-faq-btn-icon svg {
            width: 14px;
            height: 14px;
        }
        .svc-faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.35s cubic-bezier(0.16, 1, 0.3, 1), padding 0.35s ease;
            font-size: 0.9rem;
            color: #4B5563;
            line-height: 1.65;
            padding: 0 20px;
        }
        .svc-faq-item.active .svc-faq-answer {
            max-height: 400px;
            padding: 0 20px 18px;
        }

        /* ===== CONVERSION CTA BANNER ===== */
        .svc-cta-section {
            padding: 32px 0 44px;
            background: #FBF8F1;
        }
        .svc-cta-box {
            background: linear-gradient(135deg, #2D051E 0%, #0F172A 100%);
            border-radius: 26px;
            padding: 44px 32px;
            text-align: center;
            color: #FFFFFF;
            position: relative;
            overflow: hidden;
            box-shadow: 0 20px 48px rgba(15, 23, 42, 0.2);
        }
        .svc-cta-box::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(196, 0, 122, 0.45), transparent 70%);
            pointer-events: none;
        }
        .svc-cta-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.25);
            color: #FFFFFF;
            font-size: 0.74rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            padding: 5px 14px;
            border-radius: 9999px;
            margin-bottom: 14px;
        }
        .svc-cta-pill svg {
            width: 13px !important;
            height: 13px !important;
            min-width: 13px !important;
            min-height: 13px !important;
            flex-shrink: 0 !important;
            color: #F4C4DE;
            display: inline-block;
        }
        .svc-cta-box h2 {
            font-size: clamp(1.75rem, 3.4vw, 2.6rem);
            font-weight: 800;
            line-height: 1.25;
            margin: 0 0 12px;
            color: #FFFFFF;
        }
        .svc-cta-box h2 span {
            color: #F4C4DE;
        }
        .svc-cta-box p {
            font-size: 0.98rem;
            color: rgba(255, 255, 255, 0.85);
            max-width: 620px;
            margin: 0 auto 26px;
            line-height: 1.6;
        }
        .svc-cta-btns {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            gap: 16px;
            width: 100%;
            max-width: 700px;
            margin: 0 auto;
        }
        .svc-cta-btn-main {
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            gap: 10px !important;
            white-space: nowrap !important;
            word-break: keep-all !important;
            background: linear-gradient(135deg, #C4007A 0%, #E0398F 100%);
            color: #FFFFFF !important;
            font-size: 0.95rem;
            font-weight: 700;
            line-height: 1;
            padding: 14px 28px;
            border-radius: 9999px;
            text-decoration: none;
            box-shadow: 0 10px 24px rgba(196, 0, 122, 0.4);
            transition: all 0.25s ease;
            flex-shrink: 0;
            box-sizing: border-box;
        }
        .svc-cta-btn-main span {
            white-space: nowrap !important;
            word-break: keep-all !important;
        }
        .svc-cta-btn-main svg {
            width: 18px !important;
            height: 18px !important;
            min-width: 18px !important;
            min-height: 18px !important;
            max-width: 18px !important;
            max-height: 18px !important;
            flex-shrink: 0 !important;
            display: inline-block;
            transition: transform 0.2s ease;
        }
        .svc-cta-btn-main:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 30px rgba(196, 0, 122, 0.5);
            color: #FFFFFF;
        }
        .svc-cta-btn-main:hover svg {
            transform: translateX(3px);
        }
        .svc-cta-btn-phone {
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            gap: 10px !important;
            white-space: nowrap !important;
            word-break: keep-all !important;
            background: rgba(255, 255, 255, 0.1);
            border: 1.5px solid rgba(255, 255, 255, 0.3);
            color: #FFFFFF !important;
            font-size: 0.95rem;
            font-weight: 700;
            line-height: 1;
            padding: 14px 26px;
            border-radius: 9999px;
            text-decoration: none;
            transition: all 0.25s ease;
            flex-shrink: 0;
            box-sizing: border-box;
        }
        .svc-cta-btn-phone span {
            white-space: nowrap !important;
            word-break: keep-all !important;
        }
        .svc-cta-btn-phone svg {
            width: 18px !important;
            height: 18px !important;
            min-width: 18px !important;
            min-height: 18px !important;
            max-width: 18px !important;
            max-height: 18px !important;
            flex-shrink: 0 !important;
            display: inline-block;
            color: #FFFFFF;
        }
        .svc-cta-btn-phone:hover {
            background: rgba(255, 255, 255, 0.2);
            border-color: #FFFFFF;
            transform: translateY(-2px);
        }
        .svc-cta-guarantee {
            margin-top: 24px;
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            flex-wrap: wrap;
        }
        .svc-cta-guarantee svg {
            width: 15px !important;
            height: 15px !important;
            min-width: 15px !important;
            min-height: 15px !important;
            max-width: 15px !important;
            max-height: 15px !important;
            flex-shrink: 0 !important;
            display: inline-block;
            color: #F4C4DE;
        }
        @media (max-width: 520px) {
            .svc-cta-btns {
                flex-direction: column;
                align-items: stretch;
            }
            .svc-cta-btn-main,
            .svc-cta-btn-phone {
                width: 100%;
                text-align: center;
            }
        }
    </style>

    <main class="svc-page">

        <!-- ========================================================
             1. HERO SECTION (2-COL DESKTOP)
        ======================================================== -->
        <section class="svc-hero">
            <div class="svc-container">
                <div class="svc-hero-grid">

                    <!-- Left: Hero Copy -->
                    <div class="svc-hero-left" data-wtm-reveal="fade-up">

                        <div class="svc-eyebrow">
                            <?= svcIcon('sparkles') ?>
                            <span><?= htmlspecialchars($tagline !== '' ? $tagline : 'DIGITAL GROWTH AGENCY') ?></span>
                        </div>

                        <h1 class="svc-hero-title">
                            <?= htmlspecialchars($title) ?>
                            <span class="accent">
                                Excellence
                                <svg viewBox="0 0 300 6" preserveAspectRatio="none" aria-hidden="true">
                                    <path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none" opacity="0.35"/>
                                </svg>
                            </span>
                        </h1>

                        <p class="svc-hero-desc">
                            <?= htmlspecialchars($heroDescription !== '' ? $heroDescription : $overview) ?>
                        </p>

                        <div class="svc-hero-actions">
                            <a href="/contact.php" class="svc-btn-primary trigger-enquiry-modal" data-service="<?= htmlspecialchars($title) ?>">
                                <span>Get Free Consultation</span>
                                <?= svcIcon('arrow', 16) ?>
                            </a>
                            <a href="tel:+919999674255" class="svc-btn-secondary">
                                <?= svcIcon('phone', 15) ?>
                                <span>Call: +91-9999674255</span>
                            </a>
                        </div>

                        <!-- Trust Strip -->
                        <div class="svc-hero-trust">
                            <div class="svc-trust-item">
                                <?= svcIcon('award') ?>
                                <span>13+ Years Experience</span>
                            </div>
                            <div class="svc-trust-item">
                                <?= svcIcon('users') ?>
                                <span>1,000+ Clients Delivered</span>
                            </div>
                            <div class="svc-trust-item">
                                <?= svcIcon('shield') ?>
                                <span>100% White-Hat Quality</span>
                            </div>
                            <div class="svc-trust-item">
                                <?= svcIcon('target') ?>
                                <span>4.9/5 Rating</span>
                            </div>
                        </div>

                    </div>

                    <!-- Right: Glassmorphism Preview Card -->
                    <div class="svc-hero-right" data-wtm-reveal="fade-up">
                        <div class="svc-preview-card">
                            <div class="svc-preview-head">
                                <div class="svc-preview-icon-box">
                                    <?= svcIcon($icon) ?>
                                </div>
                                <div class="svc-preview-badge">
                                    <span class="pulse"></span>
                                    <span>Verified Agency Capability</span>
                                </div>
                            </div>

                            <h3 class="svc-preview-title"><?= htmlspecialchars($title) ?></h3>
                            <p class="svc-preview-tagline">Custom growth engine built for measurable ROI and verified lead acquisition.</p>

                            <ul class="svc-preview-points">
                                <li>
                                    <?= svcIcon('check') ?>
                                    <span>Bespoke strategic planning tailored to your exact industry</span>
                                </li>
                                <li>
                                    <?= svcIcon('check') ?>
                                    <span>Dedicated account manager &amp; certified digital specialists</span>
                                </li>
                                <li>
                                    <?= svcIcon('check') ?>
                                    <span>Bi-weekly transparent conversion &amp; visibility reporting</span>
                                </li>
                                <li>
                                    <?= svcIcon('check') ?>
                                    <span>Zero long-term lock-in contracts — performance backed</span>
                                </li>
                            </ul>

                            <div class="svc-preview-stat-card">
                                <div class="svc-preview-stat-info">
                                    <div class="num">+340%</div>
                                    <div class="lbl">Avg. Organic &amp; Lead Growth</div>
                                </div>
                                <span class="svc-preview-stat-badge">Top Tier Partner</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- ========================================================
             2. TRUST & STRATEGIC BENEFITS SECTION
        ======================================================== -->
        <section class="svc-benefits-section">
            <div class="svc-container">

                <div class="svc-section-header" data-wtm-reveal="fade-up">
                    <div class="svc-eyebrow">
                        <?= svcIcon('sparkles') ?>
                        <span>WHY IT MATTERS</span>
                    </div>
                    <h2 class="svc-section-title">
                        Why Your Business Needs <span class="accent">Professional <?= htmlspecialchars($title) ?><svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none" opacity="0.35"/></svg></span>
                    </h2>
                    <p class="svc-section-sub">
                        Digital competition is fierce. Here is how specialized execution compounds into lasting business value.
                    </p>
                </div>

                <div class="svc-benefits-grid">
                    <?php foreach ($benefits as $b): ?>
                        <div class="svc-benefit-card" data-wtm-reveal="fade-up">
                            <div class="svc-benefit-icon">
                                <?= svcIcon($b['icon'] ?? 'target') ?>
                            </div>
                            <h3><?= htmlspecialchars($b['title']) ?></h3>
                            <p><?= htmlspecialchars($b['desc']) ?></p>
                            <?php if (!empty($b['metric'])): ?>
                                <div class="svc-benefit-metric">
                                    <?= svcIcon('trending') ?>
                                    <span><?= htmlspecialchars($b['metric']) ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </section>

        <!-- ========================================================
             3. STRATEGIC APPROACH / WHAT WE DO
        ======================================================== -->
        <section class="svc-approach-section">
            <div class="svc-container">

                <?php if ($overview !== ''): ?>
                    <div class="svc-overview-banner" data-wtm-reveal="fade-up">
                        <h3>Detailed Overview of <?= htmlspecialchars($title) ?></h3>
                        <p><?= htmlspecialchars($overview) ?></p>
                    </div>
                <?php endif; ?>

                <div class="svc-section-header" data-wtm-reveal="fade-up">
                    <div class="svc-eyebrow">
                        <?= svcIcon('sparkles') ?>
                        <span>PROVEN METHODOLOGY</span>
                    </div>
                    <h2 class="svc-section-title">
                        How WebTecMart Delivers <span class="accent">Real Impact<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none" opacity="0.35"/></svg></span>
                    </h2>
                    <p class="svc-section-sub">
                        Our 4-pillar strategic delivery framework ensures every rupee and hour invested yields compound returns.
                    </p>
                </div>

                <div class="svc-approach-grid">
                    <?php foreach ($approach as $app): ?>
                        <div class="svc-approach-card" data-wtm-reveal="fade-up">
                            <div class="svc-approach-num"><?= htmlspecialchars($app['number']) ?></div>
                            <h4><?= htmlspecialchars($app['title']) ?></h4>
                            <p><?= htmlspecialchars($app['desc']) ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </section>

        <!-- ========================================================
             4. SERVICE FEATURES & DELIVERABLES
        ======================================================== -->
        <?php if (!empty($features)): ?>
        <section class="svc-features-section">
            <div class="svc-container">

                <div class="svc-section-header" data-wtm-reveal="fade-up">
                    <div class="svc-eyebrow">
                        <?= svcIcon('sparkles') ?>
                        <span>WHAT'S INCLUDED</span>
                    </div>
                    <h2 class="svc-section-title">
                        Core Features &amp; <span class="accent">Deliverables<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none" opacity="0.35"/></svg></span>
                    </h2>
                    <p class="svc-section-sub">
                        Everything required to build, rank, scale, and convert. Fully managed with zero hidden costs.
                    </p>
                </div>

                <div class="svc-features-grid">
                    <?php foreach ($features as $f): ?>
                        <div class="svc-feature-card" data-wtm-reveal="fade-up">
                            <div class="svc-feature-top">
                                <div class="svc-feature-icon">
                                    <?= svcIcon('check') ?>
                                </div>
                                <span class="svc-feature-pill">Deliverable</span>
                            </div>
                            <h3><?= htmlspecialchars($f['title']) ?></h3>
                            <p><?= htmlspecialchars($f['description']) ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </section>
        <?php endif; ?>

        <!-- ========================================================
             5. WORKING PROCESS TIMELINE (01 - 05)
        ======================================================== -->
        <?php if (!empty($process)): ?>
        <section class="svc-process-section">
            <div class="svc-container">

                <div class="svc-section-header" data-wtm-reveal="fade-up">
                    <div class="svc-eyebrow">
                        <?= svcIcon('sparkles') ?>
                        <span>EXECUTION ROADMAP</span>
                    </div>
                    <h2 class="svc-section-title">
                        Our Step-by-Step <span class="accent">Working Process<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none" opacity="0.35"/></svg></span>
                    </h2>
                    <p class="svc-section-sub">
                        A structured, transparent delivery pipeline from initial discovery to compounding growth.
                    </p>
                </div>

                <div class="svc-process-grid">
                    <?php foreach ($process as $step): ?>
                        <div class="svc-process-item" data-wtm-reveal="fade-up">
                            <div class="svc-process-badge"><?= htmlspecialchars($step['step'] ?? '01') ?></div>
                            <h3><?= htmlspecialchars($step['title']) ?></h3>
                            <p><?= htmlspecialchars($step['description']) ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </section>
        <?php endif; ?>

        <!-- ========================================================
             6. PROVEN CASE STUDY SPOTLIGHT
        ======================================================== -->
        <section class="svc-casestudy-section">
            <div class="svc-container">

                <div class="svc-section-header" data-wtm-reveal="fade-up">
                    <div class="svc-eyebrow">
                        <?= svcIcon('sparkles') ?>
                        <span>PROVEN RESULTS</span>
                    </div>
                    <h2 class="svc-section-title">
                        Real Case Studies. <span class="accent">Verified Impact.<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none" opacity="0.35"/></svg></span>
                    </h2>
                    <p class="svc-section-sub">
                        We don't invent achievements. Here is how our strategic digital solutions delivered real milestones for our partners.
                    </p>
                </div>

                <div class="svc-casestudy-card" data-wtm-reveal="fade-up">
                    <div class="svc-casestudy-grid">
                        <div class="svc-casestudy-content">
                            <span class="flag-pill">
                                🇮🇳 Flagship Case Study
                            </span>
                            <h3 class="svc-casestudy-title"><?= htmlspecialchars($caseStudy['client']) ?></h3>
                            <p class="svc-casestudy-desc"><?= htmlspecialchars($caseStudy['desc']) ?></p>
                            <a href="<?= htmlspecialchars($caseStudy['link']) ?>" class="svc-btn-primary" style="padding: 10px 22px; font-size: 0.86rem;">
                                Explore Full SEO Portfolio
                                <?= svcIcon('arrow') ?>
                            </a>
                        </div>

                        <div class="svc-casestudy-stats">
                            <div class="svc-metrics-strip">
                                <?php foreach ($caseStudy['metrics'] as $m): ?>
                                    <div class="svc-metric-box">
                                        <div class="val"><?= htmlspecialchars($m['val']) ?></div>
                                        <div class="lbl"><?= htmlspecialchars($m['lbl']) ?></div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- ========================================================
             7. THE WEBTECMART ADVANTAGE (WHY CHOOSE US)
        ======================================================== -->
        <section class="svc-why-section">
            <div class="svc-container">

                <div class="svc-section-header" data-wtm-reveal="fade-up">
                    <div class="svc-eyebrow">
                        <?= svcIcon('sparkles') ?>
                        <span>AGENCY ADVANTAGE</span>
                    </div>
                    <h2 class="svc-section-title">
                        Why Forward-Thinking Brands <span class="accent">Choose Us<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none" opacity="0.35"/></svg></span>
                    </h2>
                    <p class="svc-section-sub">
                        Authentic strengths, zero fluff, and a relentless focus on customer revenue.
                    </p>
                </div>

                <div class="svc-why-grid">
                    <?php foreach ($whyPoints as $wp): ?>
                        <div class="svc-why-card" data-wtm-reveal="fade-up">
                            <div class="svc-why-icon">
                                <?= svcIcon($wp['icon']) ?>
                            </div>
                            <h4><?= htmlspecialchars($wp['title']) ?></h4>
                            <p><?= htmlspecialchars($wp['desc']) ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </section>

        <!-- ========================================================
             8. INTERACTIVE FAQ ACCORDION
        ======================================================== -->
        <?php if (!empty($faqs)): ?>
        <section class="svc-faq-section">
            <div class="svc-container">

                <div class="svc-section-header" data-wtm-reveal="fade-up">
                    <div class="svc-eyebrow">
                        <?= svcIcon('sparkles') ?>
                        <span>COMMON QUESTIONS</span>
                    </div>
                    <h2 class="svc-section-title">
                        Frequently Asked <span class="accent">Questions<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none" opacity="0.35"/></svg></span>
                    </h2>
                    <p class="svc-section-sub">
                        Clear answers to everything you need to know about our <?= htmlspecialchars($title) ?> workflows.
                    </p>
                </div>

                <div class="svc-faq-wrap">
                    <?php foreach ($faqs as $i => $faq): ?>
                        <div class="svc-faq-item <?= $i === 0 ? 'active' : '' ?>" data-wtm-reveal="fade-up">
                            <button type="button" class="svc-faq-btn" onclick="svcToggleFaq(this)" aria-expanded="<?= $i === 0 ? 'true' : 'false' ?>">
                                <span><?= htmlspecialchars($faq['q'] ?? $faq['question'] ?? '') ?></span>
                                <span class="svc-faq-btn-icon">
                                    <?= svcIcon('plus') ?>
                                </span>
                            </button>
                            <div class="svc-faq-answer">
                                <?= htmlspecialchars($faq['a'] ?? $faq['answer'] ?? '') ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </section>
        <?php endif; ?>

        <!-- ========================================================
             9. CONVERSION CTA BANNER
        ======================================================== -->
        <section class="svc-cta-section">
            <div class="svc-container">
                <div class="svc-cta-box" data-wtm-reveal="fade-up">

                    <div class="svc-cta-pill">
                        <?= svcIcon('rocket') ?>
                        <span>READY TO SCALE?</span>
                    </div>

                    <h2>Ready to Grow Your Business with <span><?= htmlspecialchars($title) ?>?</span></h2>
                    <p>
                        Speak with our senior strategists today for a tailored, complimentary growth audit and clear action roadmap for your business.
                    </p>

                    <div class="svc-cta-btns">
                        <a href="/contact.php" class="svc-cta-btn-main trigger-enquiry-modal" data-service="<?= htmlspecialchars($title) ?>">
                            <span>Get Free Consultation</span>
                            <?= svcIcon('arrow', 18) ?>
                        </a>
                        <a href="tel:+919999674255" class="svc-cta-btn-phone">
                            <?= svcIcon('phone', 18) ?>
                            <span>Call: +91-9999674255</span>
                        </a>
                    </div>

                    <div class="svc-cta-guarantee">
                        <?= svcIcon('shield', 15) ?>
                        <span>Free Strategy Consultation &bull; Zero Obligation &bull; Tailored Solutions</span>
                    </div>

                </div>
            </div>
        </section>

    </main>

    <script>
        function svcToggleFaq(btn) {
            const item = btn.closest('.svc-faq-item');
            if (!item) return;
            const isCurrentlyActive = item.classList.contains('active');

            // Optional: close other open items in the same list
            const parent = item.parentElement;
            if (parent) {
                parent.querySelectorAll('.svc-faq-item').forEach(el => {
                    if (el !== item) {
                        el.classList.remove('active');
                        const b = el.querySelector('.svc-faq-btn');
                        if (b) b.setAttribute('aria-expanded', 'false');
                    }
                });
            }

            if (isCurrentlyActive) {
                item.classList.remove('active');
                btn.setAttribute('aria-expanded', 'false');
            } else {
                item.classList.add('active');
                btn.setAttribute('aria-expanded', 'true');
            }
        }
    </script>
<?php
}
