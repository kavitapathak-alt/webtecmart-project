<?php
function renderSeoSuccessStoriesSection(): void
{
    // ===== Portfolio Data =====
    $portfolioItems = [
        [
            'id' => 1,
            'title' => 'Bharat Tex Fair 2026',
            'industry' => 'Global Textile Event',
            'flag' => '🇮🇳',
            'country' => 'India',
            'duration' => '9 Months',
            'result' => '400% Organic Growth',
            'description' => 'Global textile event supported by the Ministry of Textiles, Government of India. Transformed organic visibility and established dominance in global textile search space.',
            'image' => '/case-study-1.jpg',
            'imageFit' => 'cover',
            'website' => 'https://bharat-tex.com/',
            'accentFrom' => '#C4007A',
            'accentTo' => '#E0398F',
            'metrics' => [
                ['icon' => 'trending', 'value' => 400, 'suffix' => '%', 'label' => 'Organic Growth'],
                ['icon' => 'search',   'value' => 200, 'suffix' => '+', 'label' => 'Keywords Ranked'],
                ['icon' => 'trophy',   'value' => 80,  'suffix' => '+', 'label' => 'Top 3 Rankings'],
                ['icon' => 'chart',    'value' => 180, 'suffix' => '+', 'label' => 'Leads / Month'],
            ],
            'keywords' => [
                ['text' => 'World largest textile fair 2026', 'top' => true],
                ['text' => 'Global textile Fair', 'top' => true],
                ['text' => 'Global textile sourcing fair 2026', 'top' => true],
                ['text' => 'Website Development'],
                ['text' => 'Digital Marketing Agency'],
            ],
        ],
        [
            'id' => 2,
            'title' => 'Autumn fair 2026',
            'industry' => 'Local Business',
            'flag' => '🇦🇪',
            'country' => 'UAE',
            'duration' => '4 Months',
            'result' => 'Top 3 Rankings',
            'description' => 'India is a trusted global sourcing partner, with the 62nd IHGF Delhi Autumn Fair 2026 serving as a one-stop sourcing destination. The fair connects global buyers with Indian exhibitors to discover new products, explore market trends, meet sourcing needs, and unlock export opportunities.',
            'image' => '/case-study-2.jpg',
            'imageFit' => 'contain',
            'website' => 'https://ihgfdelhifair.in/',
            'accentFrom' => '#C4007A',
            'accentTo' => '#E0398F',
            'metrics' => [
                ['icon' => 'trending', 'value' => 300, 'suffix' => '%', 'label' => 'Footfall Increase'],
                ['icon' => 'search',   'value' => 85,  'suffix' => '+', 'label' => 'Keywords Ranked'],
                ['icon' => 'trophy',   'value' => 22,  'suffix' => '',  'label' => 'Top 3 Rankings'],
                ['icon' => 'chart',    'value' => 10,  'suffix' => '',  'label' => 'Locations Ranked #1'],
            ],
            'keywords' => [
                ['text' => 'Autumn Fair', 'top' => true],
                ['text' => 'Autumn Fair 2026', 'top' => true],
                ['text' => 'Autumn Fair Dates 2026', 'top' => true],
                ['text' => 'Autumn Fair Asia 2026'],
                ['text' => 'Autumn Sourcing Fair 2026'],
                ['text' => 'Gift Sourcing Fair 2026'],
                ['text' => 'Gift Fair 2026'],
                ['text' => 'Delhi Kitchenware Fair 2026'],
                ['text' => 'Delhi Houseware Fair 2026'],
                ['text' => 'Delhi Bathroom Accessories Show'],
                ['text' => 'Bamboo Cane Furniture Fair 2026'],
                ['text' => 'Bamboo Products Fair 2026'],
                ['text' => 'Outdoor Garden Products Fair 2026'],
                ['text' => 'Outdoors and Garden Fair Delhi 2026'],
                ['text' => 'Furniture Accessories Fair 2026'],
            ],
        ],
        [
            'id' => 3,
            'title' => '61st Spring fair',
            'industry' => 'Global Expansion',
            'flag' => '🇬🇧',
            'country' => 'United Kingdom',
            'duration' => '9 Months',
            'result' => '150+ Leads / Month',
            'description' => "Expanded a SaaS company's organic reach into 15+ countries through international SEO architecture and targeted backlink building.",
            'image' => '/case-study-3.jpg',
            'imageFit' => 'cover',
            'website' => 'https://ihgfdelhifair.in/',
            'accentFrom' => '#C4007A',
            'accentTo' => '#E0398F',
            'metrics' => [
                ['icon' => 'trending', 'value' => 400, 'suffix' => '%', 'label' => 'Organic Growth'],
                ['icon' => 'search',   'value' => 200, 'suffix' => '+', 'label' => 'Keywords Ranked'],
                ['icon' => 'trophy',   'value' => 48,  'suffix' => '',  'label' => 'Top 3 Rankings'],
                ['icon' => 'chart',    'value' => 150, 'suffix' => '+', 'label' => 'Leads / Month'],
            ],
            'keywords' => [
                ['text' => 'Spring Fair', 'top' => true],
                ['text' => 'Spring Fair 2026', 'top' => true],
                ['text' => 'Spring Fair Dates 2026', 'top' => true],
                ['text' => 'Spring Fair Asia 2026'],
                ['text' => 'Spring Sourcing Fair 2026'],
                ['text' => 'Furniture Accessories Fair 2026'],
                ['text' => 'Furniture Accessories Trade Show 2026'],
                ['text' => 'Spring Delhi Furniture 2026'],
                ['text' => 'Spring Furniture Fair 2026'],
                ['text' => 'IHGF Delhi Furniture 2026'],
                ['text' => 'IHGF Furniture Fair 2026'],
                ['text' => 'Delhi Kitchenware Fair 2026'],
                ['text' => 'Delhi Houseware Fair 2026'],
                ['text' => 'Delhi Bathroom Accessories Show'],
                ['text' => 'Delhi Fashion Jewellery Show'],
                ['text' => 'Lamp & Lighting Products Fair 2026'],
                ['text' => 'Handmade Table Lamps Fair 2026'],
                ['text' => 'Lamps and Lighting Accessories Show 2026'],
                ['text' => 'Council for Handicrafts'],
                ['text' => 'Trade Fair Council'],
                ['text' => 'Handicrafts Export Promotion Council'],
                ['text' => 'Trade Fair Council India'],
                ['text' => 'Handicraft Trade Fair Council'],
                ['text' => 'Handicraft Trade Fair Council India'],
                ['text' => 'Export Council India'],
                ['text' => 'Handicraft Export Council India'],
                ['text' => 'Export Promotion Councils of India'],
                ['text' => 'Handicrafts Promotion Council'],
            ],
        ],
        [
            'id' => 4,
            'title' => 'Flowbyte Startup',
            'industry' => 'Startup',
            'flag' => '🇺🇸',
            'country' => 'United States',
            'duration' => '8 Months',
            'result' => '50K Monthly Visitors',
            'description' => 'Took an early-stage tech startup from zero to 50K monthly visitors through strategic content and deep technical SEO.',
            'image' => '/case-study-4.jpg',
            'imageFit' => 'cover',
            'website' => '',
            'accentFrom' => '#C4007A',
            'accentTo' => '#E0398F',
            'metrics' => [
                ['icon' => 'trending', 'value' => 500, 'suffix' => '%', 'label' => 'Organic Traffic'],
                ['icon' => 'search',   'value' => 95,  'suffix' => '+', 'label' => 'Keywords Ranked'],
                ['icon' => 'trophy',   'value' => 18,  'suffix' => '',  'label' => 'Top 3 Rankings'],
                ['icon' => 'chart',    'value' => 52,  'suffix' => 'K', 'label' => 'Monthly Visitors'],
            ],
            'keywords' => [
                ['text' => 'Website Development', 'top' => true],
                ['text' => 'SEO Company', 'top' => true],
                ['text' => 'Digital Marketing Agency'],
                ['text' => 'Google Ads Agency'],
                ['text' => 'Local SEO Services'],
            ],
        ],
    ];

    $maxVisibleKeywords = 6;

    // Icon helper
    function spoIcon(string $name): string {
        $icons = [
            'sparkles' => '<path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/><path d="M20 3v4"/><path d="M22 5h-4"/><path d="M4 17v2"/><path d="M5 18H3"/>',
            'arrow'    => '<path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>',
            'trending' => '<polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/>',
            'clock'    => '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>',
            'search'   => '<circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/>',
            'external' => '<path d="M15 3h6v6"/><path d="M10 14 21 3"/><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>',
            'rocket'   => '<path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"/><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"/><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"/><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"/>',
            'trophy'   => '<path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22"/><path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22"/><path d="M18 2H6v7a6 6 0 0 0 12 0V2Z"/>',
            'chart'    => '<path d="M3 3v18h18"/><path d="M18 17V9"/><path d="M13 17V5"/><path d="M8 17v-3"/>',
            'x'        => '<path d="M18 6 6 18"/><path d="m6 6 12 12"/>',
        ];
        $path = $icons[$name] ?? '';
        return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">' . $path . '</svg>';
    }
    ?>
    <style>
        /* ============================================================
           SEO PORTFOLIO SECTION
        ============================================================ */
        .spo-section {
            position: relative;
            width: 100%;
            padding: 8px 0;
            background: #FBF8F1;
            overflow: hidden;
        }

        /* Decorative Background */
        .spo-bg {
            position: absolute;
            inset: 0;
            pointer-events: none;
        }
        .spo-bg-blob-1 {
            position: absolute;
            top: 0; right: 0;
            width: 50%; height: 50%;
            background: linear-gradient(to bottom left, rgba(196, 0, 122, 0.05), transparent);
            border-radius: 9999px;
            filter: blur(64px);
        }
        .spo-bg-blob-2 {
            position: absolute;
            bottom: 0; left: 0;
            width: 33.333%; height: 50%;
            background: linear-gradient(to top right, rgba(196, 0, 122, 0.05), transparent);
            border-radius: 9999px;
            filter: blur(64px);
        }
        .spo-bg-shape {
            position: absolute;
            fill: none;
            stroke: #C4007A;
            opacity: 0.1;
        }
        .spo-bg-shape-1 { top: 40px; left: 20px; width: 80px; height: 80px; stroke-width: 2; }
        .spo-bg-shape-2 { bottom: 40px; right: 20px; width: 96px; height: 96px; stroke-width: 1.5; }

        /* Header */
        .spo-header {
            position: relative;
            z-index: 10;
            text-align: center;
            margin-bottom: 24px;
        }
        .spo-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(196, 0, 122, 0.1);
            padding: 6px 10px;
            border-radius: 9999px;
            margin-bottom: 12px;
        }
        .spo-pill svg { width: 12px; height: 12px; color: #C4007A; flex-shrink: 0; }
        .spo-pill span {
            font-size: 10px;
            color: #C4007A;
            font-weight: 600;
            letter-spacing: 0.025em;
            text-transform: uppercase;
        }
        .spo-heading {
            font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: #111827;
            margin: 0;
            line-height: 1.2;
        }
        .spo-heading .accent {
            color: #C4007A;
            position: relative;
            display: inline-block;
        }
        .spo-heading .accent svg {
            position: absolute;
            left: 0;
            bottom: -4px;
            width: 100%;
            height: 6px;
        }
        .spo-subtitle {
            font-size: 0.75rem;
            color: #6B7280;
            max-width: 576px;
            margin: 12px auto 0;
        }

        /* Case Studies Container */
        .spo-list {
            position: relative;
            z-index: 10;
            display: flex;
            flex-direction: column;
            gap: 40px;
        }

        /* Case Study Block */
        .spo-case {
            display: grid;
            grid-template-columns: 1fr;
            gap: 24px;
            align-items: start;
            opacity: 0;
            transform: translateY(40px);
            transition: opacity 0.7s ease, transform 0.7s ease;
        }
        .spo-case.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Mockup Wrapper */
        .spo-mockup-wrap {
            position: relative;
        }
        .spo-mockup-glow {
            position: absolute;
            inset: -2px;
            border-radius: 20px;
            opacity: 0;
            filter: blur(12px);
            transition: opacity 0.5s ease;
        }
        .spo-mockup-wrap:hover .spo-mockup-glow { opacity: 0.6; }

        .spo-mockup {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid rgba(196, 0, 122, 0.1);
            background: #fff;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        /* Browser Chrome */
        .spo-browser {
            display: flex;
            align-items: center;
            gap: 4px;
            padding: 8px 12px;
            border-bottom: 1px solid rgba(196, 0, 122, 0.1);
            background: #FBF8F1;
        }
        .spo-browser-dot {
            width: 8px;
            height: 8px;
            border-radius: 9999px;
        }
        .spo-browser-dot.red { background: rgba(248, 113, 113, 0.6); }
        .spo-browser-dot.yellow { background: rgba(250, 204, 21, 0.6); }
        .spo-browser-dot.green { background: rgba(74, 222, 128, 0.6); }
        .spo-browser-url {
            margin-left: 8px;
            font-size: 8px;
            color: #9CA3AF;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        /* Preview Image */
        .spo-preview {
            position: relative;
            height: 224px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            cursor: pointer;
            background: linear-gradient(to bottom right, #FDF0F6, #fff);
        }
        .spo-preview img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            transition: transform 0.6s ease;
        }
        .spo-preview img.cover { object-fit: cover; }
        .spo-preview img.contain {
            object-fit: contain;
            padding: 12px;
            background: linear-gradient(to bottom right, #FDF0F6, #fff);
        }
        .spo-preview:hover img { transform: scale(1.05); }

        .spo-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.4), transparent 50%, rgba(0, 0, 0, 0.1));
        }

        .spo-result-badge {
            position: absolute;
            top: 12px;
            right: 12px;
            border-radius: 9999px;
            background: #C4007A;
            color: #fff;
            font-size: 9px;
            font-weight: 700;
            padding: 4px 8px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        .spo-click-hint {
            position: absolute;
            bottom: 12px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 8px;
            padding: 4px 8px;
            border-radius: 9999px;
            white-space: nowrap;
        }
        .spo-click-hint.photo {
            color: rgba(255, 255, 255, 0.5);
            background: rgba(0, 0, 0, 0.5);
        }
        .spo-click-hint.contain {
            color: #6B7280;
            background: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(196, 0, 122, 0.1);
        }

        /* Client Badge */
        .spo-client-badge {
            position: absolute;
            bottom: -16px;
            left: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
            background: #fff;
            border: 1px solid rgba(196, 0, 122, 0.1);
            border-radius: 12px;
            padding: 6px 10px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }
        .spo-client-avatar {
            width: 28px;
            height: 28px;
            border-radius: 9999px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 12px;
            font-weight: 700;
            flex-shrink: 0;
        }
        .spo-client-name {
            font-size: 10px;
            font-weight: 600;
            color: #111827;
            line-height: 1.1;
        }
        .spo-client-country {
            font-size: 8px;
            color: #6B7280;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        /* Details */
        .spo-details {
            padding-top: 24px;
        }

        .spo-meta {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 8px;
            margin-bottom: 12px;
        }
        .spo-industry {
            font-size: 9px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #C4007A;
            background: rgba(196, 0, 122, 0.1);
            border: 1px solid rgba(196, 0, 122, 0.2);
            border-radius: 9999px;
            padding: 4px 8px;
        }
        .spo-duration {
            font-size: 9px;
            font-weight: 600;
            color: #6B7280;
            display: flex;
            align-items: center;
            gap: 4px;
        }
        .spo-duration svg { width: 10px; height: 10px; color: #C4007A; }
        .spo-website-link {
            font-size: 9px;
            font-weight: 600;
            color: #C4007A;
            display: flex;
            align-items: center;
            gap: 4px;
            text-decoration: none;
        }
        .spo-website-link:hover { text-decoration: underline; }
        .spo-website-link svg { width: 10px; height: 10px; }

        .spo-title {
            font-size: 1rem;
            font-weight: 700;
            color: #111827;
            margin: 0 0 8px;
        }
        .spo-description {
            font-size: 0.75rem;
            color: #4B5563;
            line-height: 1.625;
            margin: 0 0 16px;
        }

        /* Metrics Grid */
        .spo-metrics {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 6px;
            margin-bottom: 16px;
        }
        .spo-metric {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: 2px;
            border-radius: 12px;
            background: rgba(196, 0, 122, 0.05);
            border: 1px solid rgba(196, 0, 122, 0.1);
            padding: 6px;
        }
        .spo-metric svg {
            width: 14px;
            height: 14px;
            color: #C4007A;
        }
        .spo-metric .value {
            font-size: 0.875rem;
            font-weight: 700;
            color: #111827;
            font-variant-numeric: tabular-nums;
        }
        .spo-metric .label {
            font-size: 9px;
            color: #6B7280;
            line-height: 1.2;
        }

        /* Keywords */
        .spo-keywords-title {
            font-size: 9px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #6B7280;
            margin-bottom: 8px;
        }
        .spo-keywords {
            display: flex;
            flex-wrap: wrap;
            gap: 6px 8px;
        }
        .spo-keyword {
            font-size: 9px;
            padding: 4px 8px;
            border-radius: 9999px;
            line-height: 1;
            white-space: nowrap;
        }
        .spo-keyword.top {
            font-weight: 600;
            background: #C4007A;
            color: #fff;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }
        .spo-keyword.regular {
            font-weight: 500;
            background: #FDF0F6;
            border: 1px solid rgba(196, 0, 122, 0.1);
            color: #374151;
        }
        .spo-keyword-more {
            font-size: 9px;
            font-weight: 600;
            padding: 4px 8px;
            border-radius: 9999px;
            border: 1px dashed rgba(196, 0, 122, 0.4);
            color: #C4007A;
            text-decoration: none;
            line-height: 1;
            transition: all 0.2s ease;
        }
        .spo-keyword-more:hover {
            background: rgba(196, 0, 122, 0.1);
        }

        /* View Full Case Study Link */
        .spo-view-link {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            margin-top: 16px;
            font-size: 0.75rem;
            font-weight: 600;
            color: #C4007A;
            text-decoration: none;
            transition: gap 0.3s ease;
        }
        .spo-view-link:hover { gap: 8px; }
        .spo-view-link svg {
            width: 12px;
            height: 12px;
            transition: transform 0.3s ease;
        }
        .spo-view-link:hover svg { transform: translateX(2px); }

        /* ===== CTA CARD ===== */
        .spo-cta {
            position: relative;
            margin-top: 40px;
            border-radius: 20px;
            border: 1px solid rgba(196, 0, 122, 0.1);
            background: #fff;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            overflow: hidden;
        }
        .spo-cta::before {
            content: '';
            position: absolute;
            top: 0; right: 0;
            width: 144px; height: 144px;
            background: rgba(196, 0, 122, 0.05);
            border-radius: 9999px;
            filter: blur(48px);
        }
        .spo-cta::after {
            content: '';
            position: absolute;
            bottom: 0; left: 0;
            width: 112px; height: 112px;
            background: rgba(196, 0, 122, 0.05);
            border-radius: 9999px;
            filter: blur(48px);
        }
        .spo-cta-inner { position: relative; z-index: 10; }
        .spo-cta-icon {
            width: 40px;
            height: 40px;
            margin: 0 auto 12px;
            border-radius: 16px;
            background: linear-gradient(to bottom right, #C4007A, #E0398F);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 15px -3px rgba(196, 0, 122, 0.2);
        }
        .spo-cta-icon svg { width: 20px; height: 20px; color: #fff; }
        .spo-cta h3 {
            font-size: 1.25rem;
            font-weight: 700;
            color: #111827;
            margin: 0 0 8px;
        }
        .spo-cta h3 .accent { color: #C4007A; }
        .spo-cta p {
            font-size: 0.75rem;
            color: #6B7280;
            max-width: 672px;
            margin: 0 auto 20px;
        }
        .spo-cta-buttons {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        .spo-cta-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            border-radius: 9999px;
            padding: 10px 20px;
            font-size: 0.75rem;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
        }
        .spo-cta-btn.primary {
            background: linear-gradient(to right, #C4007A, #E0398F);
            color: #fff;
            box-shadow: 0 10px 15px -3px rgba(196, 0, 122, 0.25);
        }
        .spo-cta-btn.primary:hover {
            transform: scale(1.02);
            box-shadow: 0 20px 25px -5px rgba(196, 0, 122, 0.35);
        }
        .spo-cta-btn.primary svg { width: 12px; height: 12px; }
        .spo-cta-btn.secondary {
            border: 2px solid #C4007A;
            color: #C4007A;
            background: transparent;
        }
        .spo-cta-btn.secondary:hover {
            background: #C4007A;
            color: #fff;
        }

        /* Bottom Decorative */
        .spo-bottom-deco {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            margin-top: 32px;
        }
        .spo-bottom-line {
            width: 32px;
            height: 1px;
            background: linear-gradient(to right, transparent, rgba(196, 0, 122, 0.3));
        }
        .spo-bottom-line.right {
            background: linear-gradient(to left, transparent, rgba(196, 0, 122, 0.3));
        }
        .spo-bottom-dots {
            display: flex;
            gap: 4px;
            align-items: center;
        }
        .spo-bottom-dots span {
            display: block;
            width: 4px; height: 4px;
            border-radius: 9999px;
            background: rgba(196, 0, 122, 0.2);
        }
        .spo-bottom-dots span.active {
            width: 16px;
            background: #C4007A;
        }

        /* ===== MODAL ===== */
        .spo-modal-overlay {
            position: fixed;
            inset: 0;
            z-index: 9999;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 8px;
            opacity: 0;
            transition: opacity 0.25s ease;
        }
        .spo-modal-overlay.open {
            display: flex;
            opacity: 1;
        }
        .spo-modal-backdrop {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(4px);
        }
        .spo-modal {
            position: relative;
            width: 100%;
            max-width: 672px;
            max-height: 90vh;
            overflow-y: auto;
            border-radius: 20px;
            border: 1px solid rgba(196, 0, 122, 0.1);
            background: #fff;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            transform: translateY(20px) scale(0.97);
            transition: transform 0.25s ease;
        }
        .spo-modal-overlay.open .spo-modal {
            transform: translateY(0) scale(1);
        }
        .spo-modal-close {
            position: absolute;
            top: 12px;
            right: 12px;
            z-index: 10;
            width: 32px;
            height: 32px;
            border-radius: 9999px;
            background: rgba(196, 0, 122, 0.1);
            color: #C4007A;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.2s ease;
        }
        .spo-modal-close:hover { background: rgba(196, 0, 122, 0.2); }
        .spo-modal-close svg { width: 16px; height: 16px; }

        .spo-modal-hero {
            height: 112px;
            position: relative;
            display: flex;
            align-items: flex-end;
            padding: 16px;
            overflow: hidden;
        }
        .spo-modal-hero img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
        }
        .spo-modal-hero img.cover { object-fit: cover; }
        .spo-modal-hero img.contain {
            object-fit: contain;
            padding: 8px;
            background: #FDF0F6;
        }
        .spo-modal-hero-tint {
            position: absolute;
            inset: 0;
        }
        .spo-modal-hero-content {
            position: relative;
            z-index: 10;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .spo-modal-avatar {
            width: 40px;
            height: 40px;
            border-radius: 9999px;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            font-size: 1rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .spo-modal-title {
            font-size: 1rem;
            font-weight: 700;
            color: #fff;
            line-height: 1.2;
        }
        .spo-modal-country {
            font-size: 10px;
            color: rgba(255, 255, 255, 0.8);
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .spo-modal-body {
            padding: 16px;
        }

        /* ============================================================
           RESPONSIVE
        ============================================================ */

        @media (min-width: 480px) {
            .spo-section { padding: 12px 0; }
            .spo-pill { gap: 8px; padding: 8px 12px; }
            .spo-pill svg { width: 14px; height: 14px; }
            .spo-pill span { font-size: 11px; }
            .spo-heading { font-size: 1.875rem; }
            .spo-subtitle { font-size: 0.875rem; }
            .spo-list { gap: 48px; }
            .spo-browser { gap: 6px; padding: 10px 14px; }
            .spo-browser-dot { width: 10px; height: 10px; }
            .spo-browser-url { font-size: 9px; }
            .spo-preview { height: 256px; }
            .spo-result-badge { font-size: 10px; padding: 4px 8px; top: 12px; right: 12px; }
            .spo-click-hint { font-size: 9px; padding: 4px 8px; }
            .spo-client-badge { bottom: -20px; padding: 8px 12px; gap: 12px; }
            .spo-client-avatar { width: 32px; height: 32px; font-size: 14px; }
            .spo-client-name { font-size: 12px; }
            .spo-client-country { font-size: 9px; }
            .spo-details { padding-top: 32px; }
            .spo-industry, .spo-duration, .spo-website-link { font-size: 10px; padding: 4px 10px; }
            .spo-title { font-size: 1.125rem; margin-bottom: 8px; }
            .spo-description { font-size: 0.875rem; margin-bottom: 20px; }
            .spo-metrics { gap: 8px; margin-bottom: 20px; }
            .spo-metric { padding: 8px; }
            .spo-metric svg { width: 16px; height: 16px; }
            .spo-metric .value { font-size: 1rem; }
            .spo-metric .label { font-size: 10px; }
            .spo-keywords-title { font-size: 10px; }
            .spo-keyword, .spo-keyword-more { font-size: 10px; padding: 6px 10px; }
            .spo-view-link { font-size: 0.875rem; }
            .spo-view-link svg { width: 14px; height: 14px; }
            .spo-cta { margin-top: 48px; padding: 24px; border-radius: 24px; }
            .spo-cta-icon { width: 48px; height: 48px; }
            .spo-cta-icon svg { width: 24px; height: 24px; }
            .spo-cta h3 { font-size: 1.5rem; }
            .spo-cta p { font-size: 0.875rem; margin-bottom: 24px; }
            .spo-cta-buttons { flex-direction: row; gap: 12px; }
            .spo-cta-btn { padding: 12px 24px; font-size: 0.875rem; }
            .spo-cta-btn.primary svg { width: 14px; height: 14px; }
            .spo-bottom-deco { margin-top: 36px; gap: 12px; }
            .spo-bottom-line { width: 40px; }
            .spo-bottom-dots { gap: 4px; }
            .spo-bottom-dots span { width: 6px; height: 6px; }
            .spo-bottom-dots span.active { width: 20px; }
            .spo-modal-hero { height: 128px; padding: 20px; }
            .spo-modal-avatar { width: 44px; height: 44px; font-size: 1.125rem; }
            .spo-modal-title { font-size: 1.125rem; }
            .spo-modal-country { font-size: 12px; }
            .spo-modal-body { padding: 20px; }
        }

        @media (min-width: 640px) {
            .spo-bg-shape-1 { width: 96px; height: 96px; top: 80px; left: 40px; }
            .spo-bg-shape-2 { width: 128px; height: 128px; bottom: 80px; right: 40px; }
        }

        @media (min-width: 768px) {
            .spo-section { padding: 12px 0; }
            .spo-heading { font-size: 1.875rem; }
            .spo-subtitle { font-size: 1rem; }
            .spo-list { gap: 56px; }
            .spo-browser { gap: 6px; padding: 12px 16px; }
            .spo-browser-dot { width: 10px; height: 10px; }
            .spo-browser-url { font-size: 10px; margin-left: 12px; }
            .spo-preview { height: 288px; }
            .spo-result-badge { font-size: 12px; padding: 4px 12px; top: 16px; right: 16px; }
            .spo-click-hint { font-size: 12px; padding: 4px 12px; bottom: 16px; }
            .spo-client-badge { bottom: -20px; left: 24px; padding: 10px; gap: 12px; }
            .spo-client-avatar { width: 36px; height: 36px; font-size: 14px; }
            .spo-client-name { font-size: 12px; }
            .spo-client-country { font-size: 10px; }
            .spo-details { padding-top: 32px; }
            .spo-industry, .spo-duration, .spo-website-link { font-size: 11px; }
            .spo-title { font-size: 1.25rem; margin-bottom: 12px; }
            .spo-description { font-size: 1rem; margin-bottom: 24px; }
            .spo-metrics { grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 10px; margin-bottom: 24px; }
            .spo-metric { padding: 12px; gap: 4px; }
            .spo-metric svg { width: 20px; height: 20px; }
            .spo-metric .value { font-size: 1.25rem; }
            .spo-metric .label { font-size: 11px; }
            .spo-keywords-title { font-size: 12px; margin-bottom: 12px; }
            .spo-keyword, .spo-keyword-more { font-size: 12px; padding: 8px 12px; }
            .spo-view-link { font-size: 0.875rem; margin-top: 24px; }
            .spo-cta { margin-top: 56px; padding: 32px; }
            .spo-cta-icon { width: 56px; height: 56px; margin-bottom: 20px; }
            .spo-cta-icon svg { width: 28px; height: 28px; }
            .spo-cta h3 { font-size: 1.875rem; margin-bottom: 12px; }
            .spo-cta p { font-size: 1rem; margin-bottom: 32px; }
            .spo-cta-buttons { gap: 16px; }
            .spo-cta-btn { padding: 14px 32px; font-size: 1rem; }
            .spo-cta-btn.primary svg { width: 16px; height: 16px; }
            .spo-modal-overlay { padding: 32px; }
            .spo-modal { border-radius: 24px; }
            .spo-modal-close { top: 16px; right: 16px; width: 36px; height: 36px; }
            .spo-modal-close svg { width: 16px; height: 16px; }
            .spo-modal-hero { height: 160px; padding: 24px; }
            .spo-modal-avatar { width: 48px; height: 48px; font-size: 1.125rem; }
            .spo-modal-title { font-size: 1.25rem; }
            .spo-modal-body { padding: 24px; }
        }

        @media (min-width: 1024px) {
            .spo-section { padding: 24px 0; }
            .spo-header { margin-bottom: 48px; }
            .spo-heading { font-size: 2.25rem; }
            .spo-bg-shape-1 { width: 128px; height: 128px; top: 80px; left: 40px; }
            .spo-bg-shape-2 { width: 160px; height: 160px; bottom: 80px; right: 40px; }
            .spo-list { gap: 64px; }
            .spo-preview { height: 384px; }
            .spo-case {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 48px;
            }
            .spo-case.reversed .spo-mockup-wrap { order: 2; }
            .spo-case.reversed .spo-details { order: 1; }
            .spo-details { padding-top: 0; }
        }

        @media (min-width: 1280px) {
            .spo-case { gap: 56px; }
            .spo-cta { padding: 56px; }
        }
    </style>

    <section class="spo-section" id="portfolioSection">

        <!-- Decorative Background -->
        <div class="spo-bg">
            <div class="spo-bg-blob-1"></div>
            <div class="spo-bg-blob-2"></div>
            <svg class="spo-bg-shape spo-bg-shape-1" viewBox="0 0 100 100">
                <rect x="15" y="15" width="70" height="70" transform="rotate(45 50 50)" />
            </svg>
            <svg class="spo-bg-shape spo-bg-shape-2" viewBox="0 0 100 100">
                <circle cx="50" cy="50" r="35" />
                <circle cx="50" cy="50" r="25" />
            </svg>
        </div>

        <div class="container">

            <!-- Header -->
            <div class="spo-header">
                <div class="spo-pill">
                    <?= spoIcon('sparkles') ?>
                    <span>Our SEO Portfolio</span>
                </div>
                <h2 class="spo-heading">
                    Proven SEO
                    <span class="accent">
                        Success Stories
                        <svg viewBox="0 0 300 6" preserveAspectRatio="none">
                            <path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2" stroke-linecap="round" fill="none" opacity="0.3"/>
                        </svg>
                    </span>
                </h2>
                <p class="spo-subtitle">
                    Real businesses. Real rankings. Real organic growth.
                </p>
            </div>

            <!-- Case Studies -->
            <div class="spo-list">
                <?php foreach ($portfolioItems as $index => $item):
                    $reversed = ($index % 2 === 1);
                    $websiteClean = $item['website'] ? preg_replace('#^https?://#', '', $item['website']) : 'webtecmart.com/results/' . $item['id'];
                    $totalKeywords = count($item['keywords']);
                    $visibleKeywords = array_slice($item['keywords'], 0, $maxVisibleKeywords);
                    $hiddenCount = $totalKeywords - $maxVisibleKeywords;
                ?>
                    <div class="spo-case <?= $reversed ? 'reversed' : '' ?>" data-case-index="<?= $index ?>">

                        <!-- Mockup -->
                        <div class="spo-mockup-wrap">
                            <div class="spo-mockup-glow" style="background: linear-gradient(135deg, <?= $item['accentFrom'] ?>, <?= $item['accentTo'] ?>)"></div>

                            <div class="spo-mockup">
                                <!-- Browser Chrome -->
                                <div class="spo-browser">
                                    <span class="spo-browser-dot red"></span>
                                    <span class="spo-browser-dot yellow"></span>
                                    <span class="spo-browser-dot green"></span>
                                    <span class="spo-browser-url"><?= htmlspecialchars($websiteClean) ?></span>
                                </div>

                                <!-- Preview -->
                                <a href="/portfolio.php?id=<?= $item['id'] ?>" class="spo-preview" data-modal-open="<?= $index ?>" onclick="event.preventDefault(); spoOpenModal(<?= $index ?>)">
                                    <?php if ($item['image']): ?>
                                        <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['title']) ?>" class="<?= $item['imageFit'] === 'contain' ? 'contain' : 'cover' ?>" loading="lazy">
                                        <?php if ($item['imageFit'] !== 'contain'): ?>
                                            <div class="spo-overlay"></div>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <span class="spo-result-badge"><?= htmlspecialchars($item['result']) ?></span>
                                    <span class="spo-click-hint <?= $item['imageFit'] === 'contain' ? 'contain' : 'photo' ?>">
                                        Click to View Details
                                    </span>
                                </a>
                            </div>

                            <!-- Client Badge -->
                            <div class="spo-client-badge">
                                <div class="spo-client-avatar" style="background: linear-gradient(135deg, <?= $item['accentFrom'] ?>, <?= $item['accentTo'] ?>)">
                                    <?= htmlspecialchars(mb_substr($item['title'], 0, 1)) ?>
                                </div>
                                <div>
                                    <div class="spo-client-name"><?= htmlspecialchars($item['title']) ?></div>
                                    <div class="spo-client-country">
                                        <span><?= $item['flag'] ?></span> <?= htmlspecialchars($item['country']) ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Details -->
                        <div class="spo-details">
                            <div class="spo-meta">
                                <span class="spo-industry"><?= htmlspecialchars($item['industry']) ?></span>
                                <span class="spo-duration">
                                    <?= spoIcon('clock') ?> <?= htmlspecialchars($item['duration']) ?>
                                </span>
                                <?php if ($item['website']): ?>
                                    <a href="<?= htmlspecialchars($item['website']) ?>" target="_blank" rel="noopener noreferrer" class="spo-website-link">
                                        Visit Website <?= spoIcon('external') ?>
                                    </a>
                                <?php endif; ?>
                            </div>

                            <h3 class="spo-title"><?= htmlspecialchars($item['title']) ?></h3>
                            <p class="spo-description"><?= htmlspecialchars($item['description']) ?></p>

                            <!-- Metrics -->
                            <div class="spo-metrics">
                                <?php foreach ($item['metrics'] as $m): ?>
                                    <div class="spo-metric" data-count-value="<?= $m['value'] ?>" data-count-suffix="<?= htmlspecialchars($m['suffix']) ?>">
                                        <?= spoIcon($m['icon']) ?>
                                        <div class="value"><span class="count-num">0</span><?= htmlspecialchars($m['suffix']) ?></div>
                                        <div class="label"><?= htmlspecialchars($m['label']) ?></div>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <!-- Keywords -->
                            <div>
                                <div class="spo-keywords-title">Top Ranking Keywords</div>
                                <div class="spo-keywords">
                                    <?php foreach ($visibleKeywords as $k): ?>
                                        <span class="spo-keyword <?= !empty($k['top']) ? 'top' : 'regular' ?>">
                                            <?= htmlspecialchars($k['text']) ?>
                                        </span>
                                    <?php endforeach; ?>
                                    <?php if ($hiddenCount > 0): ?>
                                        <a href="/portfolio.php?id=<?= $item['id'] ?>" class="spo-keyword-more" data-modal-open="<?= $index ?>" onclick="event.preventDefault(); spoOpenModal(<?= $index ?>)">
                                            +<?= $hiddenCount ?> More
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- View Full Link -->
                            <a href="/portfolio.php?id=<?= $item['id'] ?>" class="spo-view-link" data-modal-open="<?= $index ?>" onclick="event.preventDefault(); spoOpenModal(<?= $index ?>)">
                                View Full Case Study
                                <?= spoIcon('external') ?>
                            </a>
                        </div>

                    </div>
                <?php endforeach; ?>
            </div>

            <!-- CTA Card -->
            <div class="spo-cta">
                <div class="spo-cta-inner">
                    <div class="spo-cta-icon">
                        <?= spoIcon('rocket') ?>
                    </div>
                    <h3>
                        Ready to Get
                        <span class="accent">Results</span> Like These?
                    </h3>
                    <p>
                        Let's discuss how our SEO services can help your business achieve remarkable growth and visibility.
                    </p>
                    <div class="spo-cta-buttons">
                        <a href="/contact.php" class="spo-cta-btn primary">
                            Start Your SEO Journey
                            <?= spoIcon('arrow') ?>
                        </a>
                        <a href="/services.php" class="spo-cta-btn secondary">
                            Explore All Services
                        </a>
                    </div>
                </div>
            </div>

            <!-- Bottom Decorative -->
            <div class="spo-bottom-deco">
                <div class="spo-bottom-line"></div>
                <div class="spo-bottom-dots">
                    <span></span><span></span><span></span>
                    <span class="active"></span>
                    <span></span><span></span><span></span>
                </div>
                <div class="spo-bottom-line right"></div>
            </div>

        </div>
    </section>

    <!-- Modal (single, shared) -->
    <div class="spo-modal-overlay" id="spoModal">
        <div class="spo-modal-backdrop" onclick="spoCloseModal()"></div>
        <div class="spo-modal" id="spoModalContent"></div>
    </div>

    <script>
        // ===== Data for JS modal =====
        const SPO_DATA = <?= json_encode($portfolioItems, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>;
        const SPO_MAX_KEYWORDS = <?= $maxVisibleKeywords ?>;

        // ===== Icon SVGs (for modal) =====
        const SPO_ICONS = {
            trending: `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>`,
            search:   `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>`,
            trophy:   `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22"/><path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22"/><path d="M18 2H6v7a6 6 0 0 0 12 0V2Z"/></svg>`,
            chart:    `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3v18h18"/><path d="M18 17V9"/><path d="M13 17V5"/><path d="M8 17v-3"/></svg>`,
            clock:    `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>`,
            external: `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 3h6v6"/><path d="M10 14 21 3"/><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/></svg>`,
            arrow:    `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>`,
            x:        `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>`,
        };

        // ===== Scroll animation (fade in on view) =====
        const spoObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    entry.target.querySelectorAll('[data-count-value]').forEach(animateCounter);
                    spoObserver.unobserve(entry.target);
                }
            });
        }, { rootMargin: '-120px' });

        document.querySelectorAll('.spo-case').forEach((el) => spoObserver.observe(el));

        // ===== Counter animation =====
        function animateCounter(el) {
            if (el.dataset.animated === '1') return;
            el.dataset.animated = '1';
            const end = parseInt(el.getAttribute('data-count-value'), 10) || 0;
            const numEl = el.querySelector('.count-num');
            if (!numEl) return;
            const duration = 1600;
            const startTime = performance.now();

            function tick(now) {
                const progress = Math.min((now - startTime) / duration, 1);
                const eased = 1 - Math.pow(1 - progress, 3);
                numEl.textContent = Math.round(eased * end);
                if (progress < 1) requestAnimationFrame(tick);
            }
            requestAnimationFrame(tick);
        }

        // ===== Modal =====
        function spoOpenModal(index) {
            const item = SPO_DATA[index];
            if (!item) return;

            const modal = document.getElementById('spoModal');
            const content = document.getElementById('spoModalContent');

            const isContain = item.imageFit === 'contain';
            const heroBg = item.image
                ? ''
                : `background: linear-gradient(135deg, ${item.accentFrom}, ${item.accentTo});`;

            const tint = item.image
                ? (isContain
                    ? `background: linear-gradient(135deg, ${item.accentFrom}55, ${item.accentTo}55);`
                    : `background: linear-gradient(135deg, ${item.accentFrom}CC, ${item.accentTo}CC);`)
                : '';

            const websiteClean = item.website ? item.website.replace(/^https?:\/\//, '') : '';
            const visitLink = item.website
                ? `<a href="${item.website}" target="_blank" rel="noopener noreferrer" class="spo-website-link">Visit Website ${SPO_ICONS.external}</a>`
                : '';

            const metricsHtml = item.metrics.map((m) => `
                <div class="spo-metric">
                    ${SPO_ICONS[m.icon] || ''}
                    <div class="value">${m.value}${m.suffix}</div>
                    <div class="label">${m.label}</div>
                </div>
            `).join('');

            const keywordsHtml = item.keywords.map((k) => `
                <span class="spo-keyword ${k.top ? 'top' : 'regular'}">${k.text}</span>
            `).join('');

            content.innerHTML = `
                <button type="button" class="spo-modal-close" onclick="spoCloseModal()" aria-label="Close">
                    ${SPO_ICONS.x}
                </button>

                <div class="spo-modal-hero" ${item.image ? '' : `style="${heroBg}"`}>
                    ${item.image ? `
                        <img src="${item.image}" alt="${item.title}" class="${isContain ? 'contain' : 'cover'}">
                        <div class="spo-modal-hero-tint" style="${tint}"></div>
                    ` : ''}
                    <div class="spo-modal-hero-content">
                        <div class="spo-modal-avatar">${item.title.charAt(0)}</div>
                        <div>
                            <div class="spo-modal-title">${item.title}</div>
                            <div class="spo-modal-country"><span>${item.flag}</span> ${item.country}</div>
                        </div>
                    </div>
                </div>

                <div class="spo-modal-body">
                    <div class="spo-meta">
                        <span class="spo-industry">${item.industry}</span>
                        <span class="spo-duration">${SPO_ICONS.clock} ${item.duration}</span>
                        ${visitLink}
                    </div>

                    <p class="spo-description">${item.description}</p>

                    <div class="spo-metrics">${metricsHtml}</div>

                    <div>
                        <div class="spo-keywords-title">Top Ranking Keywords</div>
                        <div class="spo-keywords">${keywordsHtml}</div>
                    </div>

                    <a href="/contact.php" class="spo-cta-btn primary" style="margin-top: 24px; display: inline-flex;">
                        Get Results Like This
                        ${SPO_ICONS.arrow}
                    </a>
                </div>
            `;

            modal.classList.add('open');
            document.body.style.overflow = 'hidden';
        }

        function spoCloseModal() {
            document.getElementById('spoModal').classList.remove('open');
            document.body.style.overflow = '';
        }

        // Esc key close
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') spoCloseModal();
        });
    </script>
    <?php
}