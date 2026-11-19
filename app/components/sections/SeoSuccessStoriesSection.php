<?php
function renderSeoSuccessStoriesSection(): void
{
    $portfolioItems = successStories();
    if (!$portfolioItems && cmsContentTypeInitialized('success_story')) {
        return;
    }
    if (!$portfolioItems) {
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
                'image' => '/assets/images/case-study-1.jpg',
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
                'title' => 'Autumn fair 2027',
                'industry' => 'Local Business',
                'flag' => '🇦🇪',
                'country' => 'UAE',
                'duration' => '4 Months',
                'result' => 'Top 3 Rankings',
                'description' => 'India is a trusted global sourcing partner, with the 62nd IHGF Delhi Autumn Fair 2027 serving as a one-stop sourcing destination. The fair connects global buyers with Indian exhibitors to discover new products, explore market trends, meet sourcing needs, and unlock export opportunities.',
                'image' => '/assets/images/case-study-2.jpg',
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
                    ['text' => 'Autumn Fair 2027', 'top' => true],
                    ['text' => 'Autumn Fair Dates 2027', 'top' => true],
                    ['text' => 'Autumn Fair Asia 2027'],
                    ['text' => 'Autumn Sourcing Fair 2027'],
                    ['text' => 'Gift Sourcing Fair 2027'],
                    ['text' => 'Gift Fair 2027'],
                    ['text' => 'Delhi Kitchenware Fair 2027'],
                    ['text' => 'Delhi Houseware Fair 2027'],
                    ['text' => 'Delhi Bathroom Accessories Show'],
                    ['text' => 'Bamboo Cane Furniture Fair 2027'],
                    ['text' => 'Bamboo Products Fair 2027'],
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
                'image' => '/assets/images/case-study-3.jpg',
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
                'image' => '/assets/images/case-study-4.jpg',
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
    } else {
        $portfolioItems = array_map(static function (array $item, int $index): array {
            return [
                'id' => $item['id'] ?? ($index + 1),
                'title' => $item['title'] ?? 'Client Success Story',
                'industry' => $item['industry'] ?? 'Business Growth',
                'flag' => $item['flag'] ?? '🇮🇳',
                'country' => $item['country'] ?? 'India',
                'duration' => $item['duration'] ?? 'Ongoing',
                'result' => $item['result'] ?? 'Growth',
                'description' => $item['description'] ?? $item['summary'] ?? '',
                'image' => $item['image'] ?? '/assets/images/case-study-' . (($index % 4) + 1) . '.jpg',
                'imageFit' => $item['imageFit'] ?? 'cover',
                'website' => $item['website'] ?? '',
                'accentFrom' => $item['accentFrom'] ?? '#C4007A',
                'accentTo' => $item['accentTo'] ?? '#E0398F',
                'metrics' => is_array($item['metrics'] ?? null) ? $item['metrics'] : [
                    ['icon' => 'trending', 'value' => 100, 'suffix' => '%', 'label' => 'Growth'],
                ],
                'keywords' => is_array($item['keywords'] ?? null) ? $item['keywords'] : [],
            ];
        }, $portfolioItems, array_keys($portfolioItems));
    }

    $maxVisibleKeywords = 6;

    // Icon helper (guarded so the section can be rendered more than once safely)
    if (!function_exists('spoIcon')) {
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
    }
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;12..96,800&display=swap" rel="stylesheet">

    <style>
        /* ============================================================
           SEO SUCCESS STORIES — "Expo Floor" design
           Same visual language as the B2B Exhibition SEO page:
           ink / pink / gold, hard offset shadows, stall awnings,
           visitor-badge client tags, dot-grid floor.
        ============================================================ */
        .spo-section, .spo-modal-overlay {
            --ink: #1A0613;
            --ink2: #2B0B20;
            --pink: #C4007A;
            --pink2: #E0398F;
            --blush: #FBEAF3;
            --paper: #FFFFFF;
            --mist: #F7F4F8;
            --gold: #FFB547;
            --mint: #0E9F6E;
            --text: #2A2430;
            --mute: #6C6474;
            --line: rgba(26, 6, 19, .12);
            --disp: 'Bricolage Grotesque', 'Plus Jakarta Sans', system-ui, sans-serif;
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            color: var(--text);
        }
        .spo-section *, .spo-section *::before, .spo-section *::after,
        .spo-modal-overlay *, .spo-modal-overlay *::before, .spo-modal-overlay *::after { box-sizing: border-box; }
        .spo-section h2, .spo-section h3, .spo-modal-overlay h3 { font-family: var(--disp); letter-spacing: -.02em; }
        .spo-section a:focus-visible, .spo-section button:focus-visible,
        .spo-modal-overlay a:focus-visible, .spo-modal-overlay button:focus-visible { outline: 3px solid var(--gold); outline-offset: 2px; }

        /* ===== Section shell (dot-grid floor) ===== */
        .spo-section {
            position: relative;
            width: 100%;
            padding: 84px 0 72px;
            background-color: var(--mist);
            background-image: radial-gradient(rgba(26, 6, 19, .07) 1px, transparent 1.2px);
            background-size: 24px 24px;
            overflow: hidden;
        }
        .spo-section::before { /* gold scalloped awning edge */
            content: ''; position: absolute; top: 0; left: 0; right: 0; height: 18px; z-index: 1; pointer-events: none;
            background: radial-gradient(circle at 18px 0, var(--gold) 17px, transparent 18px) 0 0 / 36px 18px repeat-x;
        }
        .spo-section .container { position: relative; z-index: 2; }

        /* Decorative background (kept markup, restyled) */
        .spo-bg { position: absolute; inset: 0; pointer-events: none; z-index: 0; }
        .spo-bg-blob-1, .spo-bg-blob-2 { position: absolute; border-radius: 50%; filter: blur(80px); }
        .spo-bg-blob-1 { top: 4%; right: -6%; width: 420px; height: 420px; background: rgba(196, 0, 122, .16); }
        .spo-bg-blob-2 { bottom: 2%; left: -6%; width: 360px; height: 360px; background: rgba(255, 181, 71, .2); }
        .spo-bg-shape { position: absolute; fill: none; stroke: var(--ink); opacity: .12; }
        .spo-bg-shape-1 { top: 70px; left: 24px; width: 90px; height: 90px; stroke-width: 2; }
        .spo-bg-shape-2 { bottom: 60px; right: 24px; width: 120px; height: 120px; stroke-width: 1.5; }

        /* ===== Header ===== */
        .spo-header { position: relative; z-index: 10; text-align: left; max-width: 720px; margin: 0 0 52px; }
        .spo-pill {
            display: inline-flex; align-items: center; gap: 8px; margin-bottom: 14px; padding: 0 0 0 14px;
            border-left: 4px solid var(--pink); background: none; border-radius: 0; border-top: 0; border-right: 0; border-bottom: 0;
        }
        .spo-pill svg { width: 14px; height: 14px; color: var(--pink); flex-shrink: 0; }
        .spo-pill span { font-size: .82rem; font-weight: 700; color: var(--pink); letter-spacing: 0; text-transform: none; }
        .spo-heading {
            font-size: clamp(2rem, 4vw, 3.1rem); font-weight: 800; line-height: 1.08; color: var(--ink); margin: 0 0 14px;
        }
        .spo-heading .accent {
            position: relative; display: inline-block; color: var(--ink); padding: 0 .12em;
            background: linear-gradient(transparent 58%, var(--gold) 58% 92%, transparent 92%);
        }
        .spo-heading .accent svg { display: none; }
        .spo-subtitle { font-size: 1.02rem; color: var(--mute); max-width: 560px; margin: 0; line-height: 1.65; }
        .spo-header::after { /* stripe bar */
            content: ''; display: block; width: 84px; height: 7px; margin-top: 20px;
            background: repeating-linear-gradient(90deg, var(--pink) 0 12px, var(--gold) 12px 24px);
        }

        /* ===== Case list ===== */
        .spo-list { position: relative; z-index: 10; display: flex; flex-direction: column; gap: 72px; counter-reset: spocase; }

        .spo-case {
            position: relative;
            display: grid;
            grid-template-columns: minmax(0, 1fr);
            gap: 44px;
            align-items: start;
            opacity: 0;
            transform: translateY(40px);
            transition: opacity .7s ease, transform .7s ease;
            counter-increment: spocase;
        }
        .spo-case.visible { opacity: 1; transform: translateY(0); }
        .spo-case > * { min-width: 0; }
        .spo-case::before { /* ghost chapter number */
            content: counter(spocase, decimal-leading-zero);
            position: absolute; top: -34px; right: 0; z-index: 0; pointer-events: none;
            font: 800 clamp(4.5rem, 12vw, 9rem)/1 var(--disp); letter-spacing: -.05em;
            color: transparent; -webkit-text-stroke: 2px rgba(26, 6, 19, .09);
        }
        .spo-mockup-wrap, .spo-details { position: relative; z-index: 1; }

        /* ===== Browser mockup ===== */
        .spo-mockup-wrap { transition: translate .25s ease; }
        .spo-mockup-glow { /* gradient plate behind the frame */
            position: absolute; inset: 0; border-radius: 22px; opacity: .9; translate: 12px 12px; z-index: 0;
        }
        .spo-mockup {
            position: relative; z-index: 1; border-radius: 20px; overflow: hidden;
            border: 2px solid var(--ink); background: var(--ink); padding: 10px 10px 10px;
            box-shadow: 8px 8px 0 var(--ink);
            transition: translate .25s ease, box-shadow .25s ease;
        }
        .spo-mockup-wrap:hover .spo-mockup { translate: -4px -4px; box-shadow: 12px 12px 0 var(--pink); }
        .spo-mockup-wrap:hover .spo-mockup-glow { opacity: 0; }

        .spo-browser { display: flex; align-items: center; gap: 6px; padding: 4px 6px 10px; background: transparent; border: 0; }
        .spo-browser-dot { width: 11px; height: 11px; border-radius: 50%; background: var(--pink); }
        .spo-browser-dot.yellow { background: var(--gold); }
        .spo-browser-dot.green { background: #fff; }
        .spo-browser-dot.red { background: var(--pink); }
        .spo-browser-url {
            flex: 1; min-width: 0; margin-left: 8px; padding: 6px 12px; border-radius: 8px;
            background: rgba(255, 255, 255, .1); color: rgba(255, 255, 255, .7);
            font-size: .72rem; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;
        }

        .spo-preview {
            position: relative; display: flex; align-items: center; justify-content: center;
            height: 250px; width: 100%; overflow: hidden; cursor: pointer; border-radius: 10px;
            background: linear-gradient(145deg, #2D051E 0%, var(--pink) 60%, #E98EBE 100%);
        }
        .spo-preview img { position: absolute; inset: 0; width: 100%; height: 100%; transition: transform .6s ease; }
        .spo-preview img.cover { object-fit: cover; }
        .spo-preview img.contain { object-fit: contain; padding: 14px; background: #fff; }
        .spo-preview:hover img { transform: scale(1.05); }
        .spo-overlay { position: absolute; inset: 0; background: linear-gradient(to top, rgba(26, 6, 19, .55), transparent 55%, rgba(26, 6, 19, .12)); }

        .spo-result-badge { /* gold sticker */
            position: absolute; top: 14px; right: 14px; z-index: 2; rotate: 3deg;
            padding: 7px 12px; border-radius: 10px; border: 2px solid var(--ink);
            background: var(--gold); color: var(--ink); box-shadow: 3px 3px 0 var(--ink);
            font-family: var(--disp); font-weight: 800; font-size: .78rem; line-height: 1.1;
        }
        .spo-click-hint {
            position: absolute; bottom: 12px; left: 50%; transform: translateX(-50%); z-index: 2;
            padding: 6px 12px; border-radius: 999px; font-size: .7rem; font-weight: 700; white-space: nowrap;
        }
        .spo-click-hint.photo { color: #fff; background: rgba(26, 6, 19, .72); border: 1px solid rgba(255, 255, 255, .3); }
        .spo-click-hint.contain { color: var(--ink); background: var(--blush); border: 1px solid rgba(196, 0, 122, .3); }

        /* Client badge = visitor pass */
        .spo-client-badge {
            position: absolute; bottom: -26px; left: 16px; z-index: 3;
            display: flex; align-items: center; gap: 10px;
            padding: 8px 14px 8px 10px; border-radius: 12px; background: #fff;
            border: 2px solid var(--ink); box-shadow: 4px 4px 0 var(--gold);
        }
        .spo-client-avatar {
            width: 34px; height: 34px; border-radius: 50%; display: grid; place-items: center; flex-shrink: 0;
            color: #fff; font-family: var(--disp); font-size: 15px; font-weight: 800; border: 2px solid var(--ink);
        }
        .spo-client-name { font-family: var(--disp); font-size: .85rem; font-weight: 800; color: var(--ink); line-height: 1.15; }
        .spo-client-country { display: flex; align-items: center; gap: 4px; font-size: .7rem; font-weight: 600; color: var(--mute); }

        /* ===== Details ===== */
        .spo-details { padding-top: 14px; }
        .spo-meta { display: flex; flex-wrap: wrap; align-items: center; gap: 10px; margin-bottom: 16px; }
        .spo-industry {
            font-size: .74rem; font-weight: 800; color: var(--ink); background: var(--gold);
            border: 2px solid var(--ink); border-radius: 8px; padding: 5px 11px; text-transform: none; letter-spacing: 0;
        }
        .spo-duration { display: inline-flex; align-items: center; gap: 5px; font-size: .78rem; font-weight: 700; color: var(--mute); }
        .spo-duration svg { width: 14px; height: 14px; color: var(--pink); }
        .spo-website-link {
            display: inline-flex; align-items: center; gap: 5px; font-size: .78rem; font-weight: 700;
            color: var(--pink); text-decoration: none; border-bottom: 2px solid transparent;
        }
        .spo-website-link:hover { border-bottom-color: var(--pink); }
        .spo-website-link svg { width: 13px; height: 13px; }

        .spo-title { font-size: clamp(1.5rem, 2.8vw, 2.1rem); font-weight: 800; line-height: 1.12; color: var(--ink); margin: 0 0 12px; }
        .spo-description { font-size: .98rem; color: var(--mute); line-height: 1.7; margin: 0 0 22px; max-width: 560px; overflow-wrap: anywhere; }

        /* Metrics = hall signage chips */
        .spo-metrics { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 10px; margin-bottom: 24px; }
        .spo-metric {
            display: flex; flex-direction: column; align-items: center; text-align: center; gap: 3px;
            padding: 14px 6px 12px; border-radius: 14px; background: var(--ink); color: #fff;
            border: 2px solid var(--ink); box-shadow: 4px 4px 0 var(--blush);
            transition: translate .25s ease;
        }
        .spo-metric:hover { translate: 0 -4px; }
        .spo-metric svg { width: 18px; height: 18px; color: var(--pink2); }
        .spo-metric .value { font-family: var(--disp); font-size: 1.5rem; font-weight: 800; line-height: 1.05; color: var(--gold); font-variant-numeric: tabular-nums; }
        .spo-metric .label { font-size: .68rem; font-weight: 600; opacity: .8; line-height: 1.25; }

        /* Keywords */
        .spo-keywords-title { font-size: .8rem; font-weight: 800; color: var(--ink); margin-bottom: 12px; padding-left: 10px; border-left: 4px solid var(--gold); text-transform: none; letter-spacing: 0; }
        .spo-keywords { display: flex; flex-wrap: wrap; gap: 8px; }
        .spo-keyword { font-size: .76rem; padding: 7px 12px; border-radius: 999px; line-height: 1.1; white-space: nowrap; max-width: 100%; overflow: hidden; text-overflow: ellipsis; }
        .spo-keyword.top { font-weight: 700; background: var(--pink); color: #fff; border: 2px solid var(--ink); box-shadow: 2px 2px 0 var(--ink); }
        .spo-keyword.regular { font-weight: 600; background: var(--blush); color: var(--ink); border: 2px solid rgba(26, 6, 19, .14); }
        .spo-keyword-more {
            font-size: .76rem; font-weight: 800; padding: 7px 12px; border-radius: 999px; line-height: 1.1;
            border: 2px dashed var(--pink); color: var(--pink); text-decoration: none; background: #fff; transition: background .2s ease;
        }
        .spo-keyword-more:hover { background: var(--blush); }

        .spo-view-link {
            display: inline-flex; align-items: center; gap: 8px; margin-top: 24px; padding: 12px 20px;
            border-radius: 12px; border: 2px solid var(--pink); background: #fff; color: var(--pink);
            font-size: .88rem; font-weight: 700; text-decoration: none; line-height: 1;
            transition: background .2s ease, gap .3s ease;
        }
        .spo-view-link:hover { background: var(--blush); gap: 12px; }
        .spo-view-link svg { width: 15px; height: 15px; }

        /* ===== CTA ===== */
        .spo-cta {
            position: relative; margin-top: 84px; overflow: hidden; border-radius: 26px;
            background: var(--ink); color: #fff; padding: 56px 28px; text-align: center;
        }
        .spo-cta::before {
            content: ''; position: absolute; inset: 0; z-index: 0; width: auto; height: auto; filter: none; border-radius: 0;
            background: radial-gradient(50% 80% at 50% 120%, rgba(196, 0, 122, .7), transparent 70%),
                        radial-gradient(rgba(255, 255, 255, .1) 1px, transparent 1.2px) 0 0 / 26px 26px;
        }
        .spo-cta::after { /* conic glow border */
            content: ''; position: absolute; inset: 0; border-radius: inherit; padding: 3px; pointer-events: none;
            width: auto; height: auto; filter: none; bottom: auto; left: 0; right: 0; top: 0;
            background: conic-gradient(from var(--spoa, 0deg), var(--pink), var(--gold), var(--pink2), var(--pink));
            -webkit-mask: linear-gradient(#000 0 0) content-box, linear-gradient(#000 0 0);
            -webkit-mask-composite: xor;
            mask: linear-gradient(#000 0 0) content-box exclude, linear-gradient(#000 0 0);
            animation: spoAngle 6s linear infinite;
        }
        @property --spoa { syntax: '<angle>'; initial-value: 0deg; inherits: false; }
        @keyframes spoAngle { to { --spoa: 360deg; } }
        .spo-cta-inner { position: relative; z-index: 10; }
        .spo-cta-icon {
            width: 58px; height: 58px; margin: 0 auto 20px; border-radius: 14px; display: grid; place-items: center;
            background: var(--gold); color: var(--ink); border: 2px solid var(--ink); box-shadow: 4px 4px 0 var(--pink);
        }
        .spo-cta-icon svg { width: 28px; height: 28px; color: var(--ink); }
        .spo-cta h3 { font-size: clamp(1.9rem, 3.8vw, 3rem); font-weight: 800; line-height: 1.1; color: #fff; margin: 0 auto 14px; max-width: 760px; }
        .spo-cta h3 .accent { color: var(--gold); }
        .spo-cta p { max-width: 600px; margin: 0 auto 30px; color: rgba(255, 255, 255, .8); line-height: 1.65; font-size: 1rem; }
        .spo-cta-buttons { display: flex; flex-direction: column; align-items: stretch; justify-content: center; gap: 14px; }

        .spo-cta-btn {
            display: inline-flex; align-items: center; justify-content: center; gap: 10px;
            padding: 14px 26px; border-radius: 12px; font-weight: 700; font-size: .95rem; line-height: 1.2;
            text-decoration: none; cursor: pointer; border: 2px solid transparent; text-align: center;
            transition: translate .2s ease, box-shadow .2s ease, background .2s ease;
        }
        .spo-cta-btn svg { width: 16px; height: 16px; flex-shrink: 0; }
        .spo-cta-btn.primary { background: var(--pink); color: #fff; box-shadow: 0 6px 0 #7E004E; }
        .spo-cta-btn.primary:hover { translate: 0 2px; box-shadow: 0 4px 0 #7E004E; transform: none; }
        .spo-cta-btn.primary:active { translate: 0 6px; box-shadow: 0 0 0 #7E004E; }
        .spo-cta-btn.secondary { background: transparent; color: #fff; border-color: rgba(255, 255, 255, .35); }
        .spo-cta-btn.secondary:hover { background: rgba(255, 255, 255, .1); border-color: #fff; color: #fff; }

        /* Bottom deco */
        .spo-bottom-deco { display: flex; justify-content: center; align-items: center; gap: 12px; margin-top: 44px; }
        .spo-bottom-line { width: 48px; height: 3px; background: linear-gradient(to right, transparent, var(--ink)); }
        .spo-bottom-line.right { background: linear-gradient(to left, transparent, var(--ink)); }
        .spo-bottom-dots { display: flex; gap: 5px; align-items: center; }
        .spo-bottom-dots span { display: block; width: 7px; height: 7px; border-radius: 50%; background: rgba(26, 6, 19, .2); }
        .spo-bottom-dots span.active { width: 26px; border-radius: 99px; background: var(--pink); }

        /* ===== MODAL ===== */
        .spo-modal-overlay {
            position: fixed; inset: 0; z-index: 9999; display: none; align-items: center; justify-content: center;
            padding: 12px; opacity: 0; transition: opacity .25s ease;
        }
        .spo-modal-overlay.open { display: flex; opacity: 1; }
        .spo-modal-backdrop { position: absolute; inset: 0; background: rgba(26, 6, 19, .78); backdrop-filter: blur(5px); }
        .spo-modal {
            position: relative; width: 100%; max-width: 700px; max-height: 90vh; overflow-y: auto;
            border-radius: 22px; border: 2px solid var(--ink); background: #fff;
            box-shadow: 10px 10px 0 var(--gold);
            transform: translateY(20px) scale(.97); transition: transform .25s ease;
        }
        .spo-modal-overlay.open .spo-modal { transform: translateY(0) scale(1); }
        .spo-modal-close {
            position: absolute; top: 14px; right: 14px; z-index: 10; width: 38px; height: 38px; border-radius: 10px;
            display: grid; place-items: center; cursor: pointer;
            background: var(--gold); color: var(--ink); border: 2px solid var(--ink); box-shadow: 0 3px 0 var(--ink);
            transition: translate .15s, box-shadow .15s, background .2s;
        }
        .spo-modal-close:hover { translate: 0 2px; box-shadow: 0 1px 0 var(--ink); background: #fff; }
        .spo-modal-close svg { width: 16px; height: 16px; }

        .spo-modal-hero {
            position: relative; display: flex; align-items: flex-end; height: 150px; padding: 20px; overflow: hidden;
            border-bottom: 2px solid var(--ink); background: var(--ink);
        }
        .spo-modal-hero img { position: absolute; inset: 0; width: 100%; height: 100%; }
        .spo-modal-hero img.cover { object-fit: cover; }
        .spo-modal-hero img.contain { object-fit: contain; padding: 10px; background: var(--blush); }
        .spo-modal-hero-tint { position: absolute; inset: 0; }
        .spo-modal-hero-content { position: relative; z-index: 10; display: flex; align-items: center; gap: 12px; }
        .spo-modal-avatar {
            width: 48px; height: 48px; border-radius: 50%; display: grid; place-items: center; flex-shrink: 0;
            background: var(--gold); color: var(--ink); border: 2px solid var(--ink);
            font-family: var(--disp); font-size: 1.15rem; font-weight: 800;
        }
        .spo-modal-title { font-family: var(--disp); font-size: 1.3rem; font-weight: 800; color: #fff; line-height: 1.15; text-shadow: 0 2px 10px rgba(0, 0, 0, .35); }
        .spo-modal-country { display: flex; align-items: center; gap: 4px; font-size: .78rem; font-weight: 600; color: rgba(255, 255, 255, .9); }
        .spo-modal-body { padding: 22px 20px 26px; }
        .spo-modal-body .spo-description { max-width: none; }
        .spo-modal-body .spo-metric { box-shadow: 3px 3px 0 var(--blush); }

        /* ===== Responsive ===== */
        @media (min-width: 576px) {
            .spo-preview { height: 300px; }
            .spo-cta-buttons { flex-direction: row; align-items: center; }
            .spo-modal-overlay { padding: 28px; }
            .spo-modal-body { padding: 28px; }
        }
        @media (min-width: 768px) {
            .spo-metrics { grid-template-columns: repeat(4, minmax(0, 1fr)); }
            .spo-metric .value { font-size: 1.6rem; }
            .spo-cta { padding: 68px 48px; }
        }
        @media (min-width: 992px) {
            .spo-section { padding: 100px 0 84px; }
            .spo-preview { height: 380px; }
            .spo-case { grid-template-columns: minmax(0, 1fr) minmax(0, 1fr); gap: 64px; align-items: center; }
            .spo-case.reversed .spo-mockup-wrap { order: 2; }
            .spo-case.reversed .spo-details { order: 1; }
            .spo-details { padding-top: 0; }
            .spo-metrics { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .spo-case.reversed::before { right: auto; left: 0; }
        }
        @media (min-width: 1200px) {
            .spo-metrics { grid-template-columns: repeat(4, minmax(0, 1fr)); }
        }
        @media (max-width: 575px) {
            .spo-section { padding: 64px 0 56px; }
            .spo-header { margin-bottom: 40px; }
            .spo-list { gap: 60px; }
            .spo-mockup { box-shadow: 5px 5px 0 var(--ink); }
            .spo-mockup-glow { translate: 7px 7px; }
            .spo-client-badge { left: 10px; bottom: -24px; }
            .spo-details { padding-top: 22px; }
            .spo-cta { margin-top: 60px; padding: 44px 20px; border-radius: 20px; }
            .spo-cta-btn { width: 100%; }
            .spo-view-link { width: 100%; justify-content: center; }
            .spo-modal { box-shadow: 6px 6px 0 var(--gold); }
            .spo-bg-shape { display: none; }
        }
        @media (hover: none) {
            .spo-mockup-wrap:hover .spo-mockup, .spo-metric:hover { translate: none; }
            .spo-mockup-wrap:hover .spo-mockup { box-shadow: 8px 8px 0 var(--ink); }
        }
        @media (prefers-reduced-motion: reduce) {
            .spo-case { opacity: 1; transform: none; transition: none; }
            .spo-cta::after, .spo-preview img { animation: none; transition: none; }
        }
    </style>

    <section class="spo-section" id="portfolioSection">

        <!-- Decorative Background -->
        <div class="spo-bg" aria-hidden="true">
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
            <div class="spo-header" data-wtm-reveal="fade-up">
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
                    <div class="spo-case <?= $reversed ? 'reversed' : '' ?>" data-case-index="<?= $index ?>" data-wtm-reveal="fade-up">

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
                                    <?= htmlspecialchars(substr($item['title'], 0, 1)) ?>
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
                                        <div class="value"><span class="count-num" data-counter="<?= $m['value'] ?>" data-counter-suffix="<?= htmlspecialchars($m['suffix']) ?>">0</span><?= htmlspecialchars($m['suffix']) ?></div>
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
            <div class="spo-bottom-deco" aria-hidden="true">
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
        const SPO_DATA = <?= json_encode($portfolioItems, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG) ?>;
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

        // Escape helper so DB-driven text can't break the modal markup
        function spoEsc(v) {
            return String(v == null ? '' : v).replace(/[&<>"']/g, (c) => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]));
        }

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
                : `background: linear-gradient(135deg, ${spoEsc(item.accentFrom)}, ${spoEsc(item.accentTo)});`;

            const tint = item.image
                ? (isContain
                    ? `background: linear-gradient(135deg, ${spoEsc(item.accentFrom)}55, ${spoEsc(item.accentTo)}55);`
                    : `background: linear-gradient(135deg, ${spoEsc(item.accentFrom)}CC, ${spoEsc(item.accentTo)}CC);`)
                : '';

            const visitLink = item.website
                ? `<a href="${spoEsc(item.website)}" target="_blank" rel="noopener noreferrer" class="spo-website-link">Visit Website ${SPO_ICONS.external}</a>`
                : '';

            const metricsHtml = item.metrics.map((m) => `
                <div class="spo-metric">
                    ${SPO_ICONS[m.icon] || ''}
                    <div class="value">${spoEsc(m.value)}${spoEsc(m.suffix)}</div>
                    <div class="label">${spoEsc(m.label)}</div>
                </div>
            `).join('');

            const keywordsHtml = item.keywords.map((k) => `
                <span class="spo-keyword ${k.top ? 'top' : 'regular'}">${spoEsc(k.text)}</span>
            `).join('');

            content.innerHTML = `
                <button type="button" class="spo-modal-close" onclick="spoCloseModal()" aria-label="Close">
                    ${SPO_ICONS.x}
                </button>

                <div class="spo-modal-hero" ${item.image ? '' : `style="${heroBg}"`}>
                    ${item.image ? `
                        <img src="${spoEsc(item.image)}" alt="${spoEsc(item.title)}" class="${isContain ? 'contain' : 'cover'}">
                        <div class="spo-modal-hero-tint" style="${tint}"></div>
                    ` : ''}
                    <div class="spo-modal-hero-content">
                        <div class="spo-modal-avatar">${spoEsc(String(item.title).charAt(0))}</div>
                        <div>
                            <div class="spo-modal-title">${spoEsc(item.title)}</div>
                            <div class="spo-modal-country"><span>${spoEsc(item.flag)}</span> ${spoEsc(item.country)}</div>
                        </div>
                    </div>
                </div>

                <div class="spo-modal-body">
                    <div class="spo-meta">
                        <span class="spo-industry">${spoEsc(item.industry)}</span>
                        <span class="spo-duration">${SPO_ICONS.clock} ${spoEsc(item.duration)}</span>
                        ${visitLink}
                    </div>

                    <p class="spo-description">${spoEsc(item.description)}</p>

                    <div class="spo-metrics">${metricsHtml}</div>

                    <div>
                        <div class="spo-keywords-title">Top Ranking Keywords</div>
                        <div class="spo-keywords">${keywordsHtml}</div>
                    </div>

                    <a href="/contact.php" class="spo-cta-btn primary" style="margin-top: 26px; display: inline-flex;">
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