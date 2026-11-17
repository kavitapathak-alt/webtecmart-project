<?php
/**
 * WebTecMart — Service Page Layout (v2 redesign)
 * Drop-in replacement for app/templates/service-page-layout.php
 * Same function name, same $config keys, same form endpoint (/contact.php),
 * same .trigger-enquiry-modal hooks. Only markup + CSS changed.
 *
 * Design: ink + magenta on a cool paper tone. Editorial left-aligned headings,
 * ruled lists instead of identical cards, a bento feature grid, a real
 * timeline for the process, and an ink "quote desk" form in the hero.
 */

function renderServicePageLayout(array $config): void
{
    $icon              = $config['icon'] ?? 'sparkles';
    $title             = $config['title'] ?? 'Website Design & Development';
    $heroTitle         = $config['heroTitle'] ?? $title;
    $heroTitleLead     = $config['heroTitleLead'] ?? '';
    $heroTitleAccent   = $config['heroTitleAccent'] ?? '';
    $heroTitleTail     = $config['heroTitleTail'] ?? '';
    $tagline           = $config['tagline'] ?? 'Smart. Scalable. Secure.';
    $heroDescription   = $config['heroDescription'] ?? ($config['hero_description'] ?? '');
    $heroHeadline      = $config['heroHeadline'] ?? '';
    $heroBulletHeading = $config['heroBulletHeading'] ?? '';
    $heroBulletItems   = $config['heroBulletItems'] ?? [];
    $showHeroBullets   = $config['showHeroBullets'] ?? true;
    $showHeroActions   = $config['showHeroActions'] ?? true;
    $featuresTitleLead   = $config['featuresTitleLead'] ?? '';
    $featuresTitleAccent = $config['featuresTitleAccent'] ?? '';
    $featuresTitleTail   = $config['featuresTitleTail'] ?? '';
    $featuresEyebrow     = $config['featuresEyebrow'] ?? 'What we do';
    $featuresSubtitle    = $config['featuresSubtitle'] ?? '';
    $featureTagOne       = $config['featureTagOne'] ?? 'Bespoke custom architecture';
    $featureTagTwo       = $config['featureTagTwo'] ?? 'Full mobile & SEO alignment';
    $benefitsTitleLead   = $config['benefitsTitleLead'] ?? '';
    $benefitsTitleAccent = $config['benefitsTitleAccent'] ?? '';
    $benefitsTitleTail   = $config['benefitsTitleTail'] ?? '';
    $benefitsSubtitle    = $config['benefitsSubtitle'] ?? '';
    $processEyebrow      = $config['processEyebrow'] ?? 'How we work';
    $processTitleLead    = $config['processTitleLead'] ?? '';
    $processTitleAccent  = $config['processTitleAccent'] ?? '';
    $processTitleTail    = $config['processTitleTail'] ?? '';
    $processSubtitle     = $config['processSubtitle'] ?? '';
    $showCaseStudy       = $config['showCaseStudy'] ?? true;
    $caseStudyTitle      = $config['caseStudyTitle'] ?? '';
    $caseStudyBadge      = $config['caseStudyBadge'] ?? 'Case study';
    $caseStudyScreenshots = $config['caseStudyScreenshots'] ?? [];
    $showPackages        = $config['showPackages'] ?? true;
    $showTechnologies    = $config['showTechnologies'] ?? true;
    $overview  = $config['overview'] ?? ($config['body'] ?? '');
    $features  = $config['features'] ?? [];
    $process   = $config['process'] ?? [];
    $faqs      = $config['faqs'] ?? [];

    $benefits = !empty($config['benefits']) ? $config['benefits'] : [
        ['icon' => 'layout', 'title' => 'Clean navigation and UX', 'desc' => 'Intuitive layouts that guide visitors toward booking a call, buying, or sending an enquiry.', 'metric' => '3.4x higher conversion rate'],
        ['icon' => 'search', 'title' => 'SEO built in from day one', 'desc' => 'Semantic HTML, structured data and an indexable hierarchy so Google can understand and rank the site.', 'metric' => 'Top 3 search focus'],
        ['icon' => 'zap', 'title' => 'Fast by default', 'desc' => 'Lightweight code tuned for sub-1.5 second loads and strong Core Web Vitals.', 'metric' => 'Under 1.5s average load'],
        ['icon' => 'shield', 'title' => 'Secure, clean code', 'desc' => 'SSL, sanitised inputs and modular architecture that keeps business data safe.', 'metric' => '99.99% uptime target'],
        ['icon' => 'target', 'title' => 'Pricing with no surprises', 'desc' => 'Milestone-based packages, full ownership of your IP and no template lock-ins.', 'metric' => '100% scope transparency'],
        ['icon' => 'users', 'title' => 'In-house specialists', 'desc' => 'Direct access to senior developers, designers and growth strategists, before and after launch.', 'metric' => 'Dedicated support'],
    ];

    $packages = !empty($config['packages']) ? $config['packages'] : [
        ['name' => 'Starter', 'tagline' => 'For startups and small businesses', 'price' => '₹18,500', 'period' => 'One-time', 'popular' => false,
         'desc' => 'A polished, mobile-friendly foundation to get your business online.',
         'features' => ['Up to 6 custom responsive pages', '100% mobile & tablet optimised', 'Modern UI/UX (no generic themes)', 'Contact form & WhatsApp chat', 'Basic on-page SEO & meta tags', 'Speed optimisation', 'Social media & Google Maps integration', '1 month free post-launch support'], 'cta' => 'Choose Starter'],
        ['name' => 'Growth', 'tagline' => 'Most popular for established brands', 'price' => '₹38,500', 'period' => 'One-time', 'popular' => true,
         'desc' => 'A conversion-focused build designed to outrank competitors and bring in qualified enquiries.',
         'features' => ['Up to 15 bespoke responsive pages', 'Custom UI/UX architecture & prototyping', 'Dynamic CMS (WordPress, PHP or headless)', 'Lead funnel & interactive forms', 'Technical & on-page SEO', 'Core Web Vitals tuning (<1.5s load)', 'GA4 & Meta Pixel tracking', 'Blog / news / case study engine', '3 months priority support'], 'cta' => 'Choose Growth'],
        ['name' => 'Enterprise', 'tagline' => 'For scale, e-commerce and custom portals', 'price' => 'Custom quote', 'period' => 'Bespoke scope', 'popular' => false,
         'desc' => 'Full-scale architecture, custom e-commerce or web applications built for high traffic.',
         'features' => ['Unlimited / scalable custom pages', 'Custom e-commerce or web application', 'Payment gateway & multi-currency', 'API integrations & CRM sync', 'Security hardening & penetration check', 'Dedicated tech lead & project manager', 'Daily backups & CDN', 'Continuous conversion optimisation', '6 months 24/7 priority SLA'], 'cta' => 'Discuss scope'],
    ];

    $technologies = !empty($config['technologies']) ? $config['technologies'] : [
        ['name' => 'PHP 8.x', 'cat' => 'Backend'], ['name' => 'WordPress & WooCommerce', 'cat' => 'CMS'],
        ['name' => 'Shopify', 'cat' => 'E-commerce'], ['name' => 'React & Next.js', 'cat' => 'Frontend'],
        ['name' => 'Laravel', 'cat' => 'Framework'], ['name' => 'HTML5 & CSS3', 'cat' => 'Standards'],
        ['name' => 'Tailwind & Bootstrap', 'cat' => 'UI'], ['name' => 'MySQL & SQLite', 'cat' => 'Database'],
        ['name' => 'REST APIs & Webhooks', 'cat' => 'Integration'], ['name' => 'Google Cloud & AWS', 'cat' => 'Hosting'],
    ];

    $brandLogos = [
        'Informa Global', 'Bharat Tex Fair', 'IHGF Delhi Autumn Fair 2027', 'Clarion Events', 'London Tech Week',
        'Media 10', 'Northstar Travel Group', 'Premier Logistics', 'Innovation Zero', 'Stonex Jewellers', 'BMJ Future Health',
    ];

    $caseStudy = $config['caseStudy'] ?? [
        'client' => 'Bharat Tex Fair & IHGF Delhi Fair',
        'result' => '400% traffic and inbound lead growth',
        'metrics' => [
            ['val' => '400%', 'lbl' => 'Organic traffic growth'],
            ['val' => '200+', 'lbl' => 'Top 3 search rankings'],
            ['val' => '1,000+', 'lbl' => 'Pre-registered buyers'],
            ['val' => '99.9%', 'lbl' => 'Server & form uptime'],
        ],
        'desc' => "High-performance, conversion-optimised platforms for India's flagship global trade expos, giving thousands of international buyers a seamless mobile experience.",
        'link' => '/portfolio.php',
    ];

    $microMarkets = ['Connaught Place', 'South Delhi & Saket', 'Gurgaon Cyber City', 'Noida Sector 62 & 18', 'Okhla Industrial Area',
        'Nehru Place', 'Dwarka', 'Janakpuri & West Delhi', 'Netaji Subhash Place', 'Faridabad', 'Ghaziabad'];

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
                'trophy'     => '<path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M18 2H6v7a6 6 0 0 0 12 0V2Z"/>',
                'shield'     => '<path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/>',
                'users'      => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
                'trending'   => '<polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/>',
                'award'      => '<circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/>',
                'zap'        => '<polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/>',
                'lock'       => '<rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/>',
                'palette'    => '<circle cx="13.5" cy="6.5" r=".5" fill="currentColor"/><circle cx="17.5" cy="10.5" r=".5" fill="currentColor"/><circle cx="8.5" cy="7.5" r=".5" fill="currentColor"/><circle cx="6.5" cy="12.5" r=".5" fill="currentColor"/><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 0 1 1.668-1.668h1.996c3.051 0 5.555-2.503 5.555-5.554C21.965 6.012 17.461 2 12 2z"/>',
                'dollar'     => '<line x1="12" x2="12" y1="2" y2="22"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>',
            ];
            $path = $icons[$name] ?? $icons['sparkles'];
            return '<svg xmlns="http://www.w3.org/2000/svg" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . $path . '</svg>';
        }
    }

    // Headline helper: lead + accent (marker highlight) + tail
    $h = fn($s) => htmlspecialchars((string) $s);
    $accentHtml = function (string $lead, string $accent, string $tail) use ($h): string {
        return $h($lead) . '<em>' . $h($accent) . '</em>' . $h($tail);
    };

    if ($heroTitleAccent !== '') {
        $heroHeadingHtml = $accentHtml($heroTitleLead, $heroTitleAccent, $heroTitleTail);
    } else {
        $words = preg_split('/\s+/', trim((string) $heroTitle));
        if (count($words) > 1) {
            $last = array_pop($words);
            $heroHeadingHtml = $h(implode(' ', $words)) . ' <em>' . $h($last) . '</em>';
        } else {
            $heroHeadingHtml = '<em>' . $h($heroTitle) . '</em>';
        }
    }
    $iconsList = ['layout', 'code', 'search', 'smartphone', 'zap', 'shield'];
    ?>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,500;12..96,700;12..96,800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap');

        .wt {
            --ink: #17121F;
            --ink-2: #2A2236;
            --paper: #FAF8FC;
            --paper-2: #F2EDF7;
            --line: #E4DCEC;
            --mag: #C4007A;
            --mag-2: #E0398F;
            --mag-soft: #FBE6F2;
            --mute: #5E566B;
            --ok: #0C7A55;
            --display: 'Bricolage Grotesque', 'Plus Jakarta Sans', system-ui, sans-serif;
            --body: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            font-family: var(--body);
            color: var(--ink);
            background: var(--paper);
            overflow-x: clip;
            line-height: 1.6;
            width: 100%;
            max-width: 100vw;
        }
        .wt *, .wt *::before, .wt *::after { box-sizing: border-box; }
        .wt h1, .wt h2, .wt h3, .wt h4 { font-family: var(--display); margin: 0; color: var(--ink); letter-spacing: -0.025em; }
        .wt p { margin: 0; }
        .wt a:focus-visible, .wt button:focus-visible, .wt summary:focus-visible,
        .wt input:focus-visible, .wt select:focus-visible, .wt textarea:focus-visible {
            outline: 3px solid var(--mag); outline-offset: 2px;
        }
        .wt-wrap { max-width: 1200px; margin: 0 auto; padding: 0 22px; }
        .wt-section { padding: 88px 0; }
        .wt-section.alt { background: #fff; border-block: 1px solid var(--line); }

        /* headings: left aligned, marker highlight on the accent phrase */
        .wt-kicker { font-size: .86rem; font-weight: 700; color: var(--mag); margin-bottom: 12px; display: flex; align-items: center; gap: 8px; }
        .wt-kicker::before { content: ""; width: 22px; height: 2px; background: var(--mag); border-radius: 2px; }
        .wt-h2 { font-size: clamp(2rem, 4vw, 3.1rem); font-weight: 800; line-height: 1.06; max-width: 18ch; }
        .wt-h2.wide { max-width: 24ch; }
        .wt h1 em, .wt-h2 em {
            font-style: normal; color: var(--ink);
            background: linear-gradient(transparent 62%, rgba(224, 57, 143, .32) 62%, rgba(224, 57, 143, .32) 92%, transparent 92%);
            padding: 0 .06em;
        }
        .wt-lede { color: var(--mute); font-size: 1.05rem; max-width: 56ch; margin-top: 16px; }
        .wt-head { margin-bottom: 52px; }
        .wt-head.split { display: grid; gap: 18px 56px; align-items: end; }
        @media (min-width: 900px) { .wt-head.split { grid-template-columns: 1.2fr 1fr; } .wt-head.split .wt-lede { margin-top: 0; } }

        /* buttons */
        .wt-btn { display: inline-flex; align-items: center; justify-content: center; gap: 10px; font: 700 .95rem var(--body);
            padding: 14px 24px; border-radius: 12px; text-decoration: none; cursor: pointer; border: 2px solid transparent;
            transition: transform .2s, background .2s, box-shadow .2s, border-color .2s; white-space: nowrap; }
        .wt-btn.pri { background: var(--mag); color: #fff !important; box-shadow: 0 10px 24px -8px rgba(196, 0, 122, .55); }
        .wt-btn.pri:hover { background: #A80068; transform: translateY(-2px); }
        .wt-btn.ghost { background: transparent; color: var(--ink) !important; border-color: var(--ink); }
        .wt-btn.ghost:hover { background: var(--ink); color: #fff !important; }
        .wt-btn.light { background: #fff; color: var(--ink) !important; }
        .wt-btn.light:hover { background: var(--mag-soft); }
        .wt-btn.line-light { color: #fff !important; border-color: rgba(255,255,255,.4); }
        .wt-btn.line-light:hover { border-color: #fff; background: rgba(255,255,255,.08); }

        /* ---------- 1. HERO ---------- */
        .wt-hero { position: relative; padding: 56px 0 0; background:
            radial-gradient(900px 420px at 88% -10%, rgba(224, 57, 143, .16), transparent 60%),
            radial-gradient(600px 360px at -5% 30%, rgba(196, 0, 122, .07), transparent 60%), var(--paper); }
        .wt-hero-grid { display: grid; gap: 44px; align-items: start; }
        @media (min-width: 992px) { .wt-hero-grid { grid-template-columns: 1.15fr .85fr; gap: 64px; } }
        .wt-tag { display: inline-flex; align-items: center; gap: 8px; padding: 6px 14px 6px 10px; border-radius: 999px;
            background: #fff; border: 1px solid var(--line); font-size: .84rem; font-weight: 600; color: var(--ink-2); margin-bottom: 22px; }
        .wt-tag svg { color: var(--mag); }
        .wt-hero h1 { font-size: clamp(2.6rem, 5.6vw, 4.6rem); font-weight: 800; line-height: 1.02; letter-spacing: -0.035em; }
        .wt-hero-msg { font-family: var(--display); font-size: clamp(1.15rem, 2vw, 1.5rem); font-weight: 700; line-height: 1.3; margin-top: 22px; max-width: 34ch; color: var(--ink-2); }
        .wt-hero-desc { color: var(--mute); font-size: 1.05rem; margin-top: 14px; max-width: 56ch; }
        .wt-hero-points { margin-top: 30px; }
        .wt-hero-points h3 { font-size: .95rem; font-family: var(--body); letter-spacing: 0; font-weight: 700; margin-bottom: 4px; color: var(--mute); }
        .wt-points { list-style: none; margin: 0; padding: 0; display: grid; gap: 0 28px; }
        @media (min-width: 640px) { .wt-points { grid-template-columns: 1fr 1fr; } }
        .wt-points li { display: flex; gap: 12px; padding: 14px 0; border-bottom: 1px solid var(--line); }
        .wt-points svg { color: var(--ok); flex-shrink: 0; margin-top: 3px; }
        .wt-points strong { display: block; font-size: .95rem; line-height: 1.35; }
        .wt-points span { display: block; font-size: .85rem; color: var(--mute); margin-top: 2px; line-height: 1.5; }
        .wt-actions { display: flex; gap: 12px; flex-wrap: wrap; margin-top: 30px; }

        /* quote desk (form) */
        .wt-desk { background: var(--ink); color: #fff; border-radius: 24px; padding: 30px 26px 24px; position: relative; overflow: hidden;
            box-shadow: 0 30px 60px -24px rgba(23, 18, 31, .55); }
        .wt-desk::before { content: ""; position: absolute; width: 260px; height: 260px; right: -90px; top: -110px;
            background: radial-gradient(circle, rgba(224, 57, 143, .6), transparent 65%); pointer-events: none; }
        .wt-desk > * { position: relative; }
        .wt-desk h3 { color: #fff; font-size: 1.5rem; font-weight: 700; line-height: 1.15; }
        .wt-desk .sub { color: rgba(255, 255, 255, .72); font-size: .9rem; margin: 8px 0 20px; }
        .wt-field { margin-bottom: 12px; }
        .wt-field input, .wt-field select, .wt-field textarea { width: 100%; padding: 13px 14px; border-radius: 10px; font: 500 .92rem var(--body);
            color: #fff; background: rgba(255, 255, 255, .07); border: 1px solid rgba(255, 255, 255, .18); transition: border-color .2s, background .2s; }
        .wt-field input::placeholder, .wt-field textarea::placeholder { color: rgba(255, 255, 255, .55); }
        .wt-field select option { color: var(--ink); }
        .wt-field input:focus, .wt-field select:focus, .wt-field textarea:focus { background: rgba(255, 255, 255, .12); border-color: var(--mag-2); }
        .wt-field textarea { min-height: 78px; resize: vertical; }
        .wt-desk .wt-btn { width: 100%; }
        .wt-note { margin-top: 14px; font-size: .8rem; color: rgba(255, 255, 255, .62); display: flex; gap: 8px; align-items: center; justify-content: center; }
        #wtQuoteFeedback { display: none; margin-top: 12px; padding: 10px 12px; border-radius: 10px; font-size: .86rem; font-weight: 600; text-align: center; }

        /* ledger: stats sit on the hero's bottom edge */
        .wt-ledger { margin-top: 64px; display: grid; grid-template-columns: repeat(2, 1fr); border-top: 2px solid var(--ink); }
        @media (min-width: 800px) { .wt-ledger { grid-template-columns: repeat(4, 1fr); } }
        .wt-ledger div { padding: 22px 18px 26px 0; border-bottom: 1px solid var(--line); }
        @media (min-width: 800px) { .wt-ledger div { border-bottom: 0; border-right: 1px solid var(--line); padding-left: 22px; } .wt-ledger div:first-child { padding-left: 0; } .wt-ledger div:last-child { border-right: 0; } }
        .wt-ledger b { display: block; font-family: var(--display); font-size: clamp(2.2rem, 4vw, 3.2rem); font-weight: 800; letter-spacing: -0.04em; line-height: 1; }
        .wt-ledger span { display: block; margin-top: 8px; font-size: .88rem; color: var(--mute); }

        /* ---------- 2. TICKER ---------- */
        .wt-ticker { padding: 18px 0; background: var(--ink); color: #fff; overflow: hidden; margin-top: 56px; }
        .wt-ticker-track { display: flex; gap: 44px; width: max-content; animation: wtTick 40s linear infinite; }
        .wt-ticker:hover .wt-ticker-track { animation-play-state: paused; }
        .wt-ticker-track span { font-family: var(--display); font-weight: 600; font-size: 1.1rem; white-space: nowrap; display: inline-flex; align-items: center; gap: 44px; opacity: .92; }
        .wt-ticker-track span::after { content: ""; width: 8px; height: 8px; border-radius: 2px; background: var(--mag-2); transform: rotate(45deg); }
        @keyframes wtTick { to { transform: translateX(-50%); } }

        /* ---------- 3. FEATURES (bento) ---------- */
        .wt-bento { display: grid; gap: 16px; grid-template-columns: 1fr; }
        @media (min-width: 700px) { .wt-bento { grid-template-columns: repeat(2, 1fr); } }
        @media (min-width: 1000px) { .wt-bento { grid-template-columns: repeat(6, 1fr); }
            .wt-bento > :nth-child(1) { grid-column: span 4; grid-row: span 2; }
            .wt-bento > :nth-child(2), .wt-bento > :nth-child(3) { grid-column: span 2; }
            .wt-bento > :nth-child(4), .wt-bento > :nth-child(5), .wt-bento > :nth-child(6) { grid-column: span 2; }
            .wt-bento > :nth-child(n+7) { grid-column: span 2; } }
        .wt-tile { background: #fff; border: 1px solid var(--line); border-radius: 20px; padding: 26px; display: flex; flex-direction: column; transition: border-color .2s, box-shadow .2s; }
        .wt-tile:hover { border-color: var(--mag); box-shadow: 0 18px 40px -22px rgba(196, 0, 122, .45); }
        .wt-tile .ic { width: 46px; height: 46px; border-radius: 12px; background: var(--mag-soft); color: var(--mag); display: grid; place-items: center; margin-bottom: 18px; }
        .wt-tile h3 { font-size: 1.22rem; font-weight: 700; line-height: 1.2; }
        .wt-tile p { color: var(--mute); font-size: .92rem; margin-top: 8px; }
        .wt-tile ul { list-style: none; padding: 16px 0 0; margin: auto 0 0; display: grid; gap: 7px; }
        .wt-tile li { display: flex; gap: 8px; align-items: center; font-size: .82rem; font-weight: 600; color: var(--ink-2); }
        .wt-tile li svg { color: var(--ok); flex-shrink: 0; }
        .wt-tile:first-child { background: var(--ink); border-color: var(--ink); justify-content: flex-end; min-height: 300px; }
        .wt-tile:first-child h3 { color: #fff; font-size: clamp(1.6rem, 3vw, 2.3rem); max-width: 16ch; }
        .wt-tile:first-child p { color: rgba(255,255,255,.75); font-size: 1rem; max-width: 48ch; }
        .wt-tile:first-child .ic { background: var(--mag); color: #fff; }
        .wt-tile:first-child li { color: #fff; }
        .wt-tile:first-child li svg { color: var(--mag-2); }
        .wt-tile:first-child ul { margin-top: 22px; }

        /* ---------- 4. WHY (sticky title + ruled rows) ---------- */
        .wt-why { display: grid; gap: 40px; }
        @media (min-width: 992px) { .wt-why { grid-template-columns: .8fr 1.2fr; gap: 80px; } .wt-why-side { position: sticky; top: 100px; align-self: start; } }
        .wt-rows { list-style: none; margin: 0; padding: 0; border-top: 2px solid var(--ink); }
        .wt-row { display: grid; gap: 6px 22px; padding: 26px 0; border-bottom: 1px solid var(--line); }
        @media (min-width: 640px) { .wt-row { grid-template-columns: 52px 1fr; } }
        .wt-row .ic { width: 44px; height: 44px; border-radius: 12px; background: var(--mag-soft); color: var(--mag); display: grid; place-items: center; }
        .wt-row h3 { font-size: 1.28rem; font-weight: 700; line-height: 1.2; }
        .wt-row p { color: var(--mute); font-size: .95rem; margin-top: 6px; max-width: 58ch; }
        .wt-row .metric { display: inline-flex; align-items: center; gap: 8px; margin-top: 12px; font-size: .84rem; font-weight: 700; color: var(--ok); }

        /* ---------- 5. PACKAGES ---------- */
        .wt-pkgs { display: grid; gap: 22px; align-items: stretch; }
        @media (min-width: 992px) { .wt-pkgs { grid-template-columns: repeat(3, 1fr); } }
        .wt-pkg { background: #fff; border: 1px solid var(--line); border-radius: 24px; padding: 34px 28px; display: flex; flex-direction: column; position: relative; }
        .wt-pkg.pop { background: var(--ink); border-color: var(--ink); color: #fff; }
        @media (min-width: 992px) { .wt-pkg.pop { transform: translateY(-14px); padding-block: 48px; box-shadow: 0 34px 60px -28px rgba(23,18,31,.6); } }
        .wt-pkg.pop h3, .wt-pkg.pop .price { color: #fff; }
        .wt-pkg .flag { position: absolute; top: 18px; right: 18px; background: var(--mag); color: #fff; font-size: .78rem; font-weight: 700; padding: 4px 12px; border-radius: 999px; }
        .wt-pkg h3 { font-size: 1.5rem; font-weight: 700; }
        .wt-pkg .tg { font-size: .88rem; color: var(--mag); font-weight: 600; margin-top: 2px; }
        .wt-pkg.pop .tg { color: #FF8CC2; }
        .wt-pkg .price { font-family: var(--display); font-size: 2.7rem; font-weight: 800; letter-spacing: -0.04em; line-height: 1; margin-top: 22px; }
        .wt-pkg .per { font-size: .86rem; color: var(--mute); margin-top: 6px; }
        .wt-pkg.pop .per, .wt-pkg.pop .ds { color: rgba(255,255,255,.72); }
        .wt-pkg .ds { color: var(--mute); font-size: .92rem; margin: 18px 0 20px; padding-bottom: 20px; border-bottom: 1px solid var(--line); }
        .wt-pkg.pop .ds { border-color: rgba(255,255,255,.18); }
        .wt-pkg ul { list-style: none; margin: 0 0 28px; padding: 0; display: grid; gap: 11px; flex: 1; }
        .wt-pkg li { display: flex; gap: 10px; font-size: .9rem; font-weight: 500; line-height: 1.4; }
        .wt-pkg li svg { color: var(--ok); flex-shrink: 0; margin-top: 2px; }
        .wt-pkg.pop li svg { color: var(--mag-2); }
        .wt-pkg .wt-btn { width: 100%; }

        /* ---------- 6. TECH ---------- */
        .wt-tech { display: flex; flex-wrap: wrap; gap: 10px; }
        .wt-tech div { padding: 10px 18px; border: 1px solid var(--line); border-radius: 12px; background: #fff; font-weight: 700; font-size: .92rem; display: flex; gap: 10px; align-items: baseline; transition: border-color .2s, transform .2s; }
        .wt-tech div:hover { border-color: var(--mag); transform: translateY(-2px); }
        .wt-tech small { font-weight: 500; color: var(--mute); font-size: .78rem; }

        /* ---------- 7. PROCESS (timeline) ---------- */
        .wt-line { position: relative; list-style: none; margin: 0; padding: 0 0 0 34px; max-width: 860px; }
        .wt-line::before { content: ""; position: absolute; left: 11px; top: 8px; bottom: 8px; width: 2px; background: linear-gradient(var(--mag), var(--line)); }
        .wt-step { position: relative; padding: 0 0 38px; }
        .wt-step:last-child { padding-bottom: 0; }
        .wt-step::before { content: ""; position: absolute; left: -33px; top: 6px; width: 16px; height: 16px; border-radius: 50%; background: var(--paper); border: 4px solid var(--mag); }
        .wt-step .n { font-size: .82rem; font-weight: 700; color: var(--mag); }
        .wt-step h3 { font-size: 1.45rem; font-weight: 700; margin-top: 2px; }
        .wt-step p { color: var(--mute); margin-top: 6px; max-width: 60ch; }
        .wt-process-grid { display: grid; gap: 40px; }
        @media (min-width: 992px) { .wt-process-grid { grid-template-columns: .8fr 1.2fr; gap: 80px; } }

        /* ---------- 8. CASE STUDY ---------- */
        .wt-case { background: linear-gradient(135deg, var(--ink) 0%, #2A1233 100%); color: #fff; border-radius: 28px; padding: 44px 32px; display: grid; gap: 36px; position: relative; overflow: hidden; }
        .wt-case::after { content: ""; position: absolute; right: -120px; bottom: -140px; width: 380px; height: 380px; background: radial-gradient(circle, rgba(224,57,143,.4), transparent 65%); pointer-events: none; }
        @media (min-width: 992px) { .wt-case { grid-template-columns: 1.05fr .95fr; padding: 56px; align-items: center; } }
        .wt-case > * { position: relative; z-index: 1; }
        .wt-case .badge { display: inline-block; font-size: .82rem; font-weight: 700; color: #FFB6D9; border: 1px solid rgba(255,182,217,.45); padding: 4px 14px; border-radius: 999px; margin-bottom: 18px; }
        .wt-case h3 { color: #fff; font-size: clamp(1.7rem, 3vw, 2.5rem); font-weight: 800; line-height: 1.08; }
        .wt-case p { color: rgba(255,255,255,.8); margin: 14px 0 26px; max-width: 52ch; }
        .wt-case-m { display: grid; grid-template-columns: repeat(2, 1fr); gap: 1px; background: rgba(255,255,255,.16); border-radius: 18px; overflow: hidden; }
        .wt-case-m div { background: #241830; padding: 24px 20px; }
        .wt-case-m b { display: block; font-family: var(--display); font-size: 2.3rem; font-weight: 800; color: #FF8CC2; letter-spacing: -0.03em; line-height: 1; }
        .wt-case-m span { font-size: .85rem; color: rgba(255,255,255,.78); display: block; margin-top: 8px; }
        .wt-shots { display: grid; gap: 20px; margin-top: 26px; }
        @media (min-width: 768px) { .wt-shots { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
        .wt-shots figure { margin: 0; background: #fff; border: 1px solid var(--line); border-radius: 18px; padding: 10px; }
        .wt-shots img { display: block; width: 100%; height: auto; max-height: 520px; object-fit: contain; border-radius: 10px; background: var(--paper-2); }
        .wt-shots figcaption { padding: 10px 4px 2px; font-size: .86rem; font-weight: 600; }

        /* ---------- 9. REACH ---------- */
        .wt-reach { display: grid; gap: 28px; }
        @media (min-width: 992px) { .wt-reach { grid-template-columns: .9fr 1.1fr; gap: 70px; align-items: center; } }
        .wt-chips { display: flex; flex-wrap: wrap; gap: 9px; }
        .wt-chips span { padding: 8px 16px; border-radius: 999px; background: #fff; border: 1px solid var(--line); font-size: .88rem; font-weight: 600; }

        /* ---------- 10. FAQ ---------- */
        .wt-faq-grid { display: grid; gap: 40px; }
        @media (min-width: 992px) { .wt-faq-grid { grid-template-columns: .8fr 1.2fr; gap: 80px; } }
        .wt-faq details { border-bottom: 1px solid var(--line); }
        .wt-faq details:first-child { border-top: 2px solid var(--ink); }
        .wt-faq summary { list-style: none; cursor: pointer; display: flex; justify-content: space-between; gap: 18px; align-items: center; padding: 22px 0; font-family: var(--display); font-size: 1.18rem; font-weight: 700; line-height: 1.25; }
        .wt-faq summary::-webkit-details-marker { display: none; }
        .wt-faq .pm { width: 32px; height: 32px; border-radius: 50%; background: var(--mag-soft); color: var(--mag); display: grid; place-items: center; flex-shrink: 0; transition: transform .25s, background .25s, color .25s; }
        .wt-faq details[open] .pm { transform: rotate(45deg); background: var(--mag); color: #fff; }
        .wt-faq .ans { padding: 0 50px 24px 0; color: var(--mute); max-width: 64ch; }

        /* ---------- 11. CTA ---------- */
        .wt-cta { background: var(--mag); color: #fff; border-radius: 28px; padding: 60px 32px; position: relative; overflow: hidden; }
        .wt-cta::before { content: ""; position: absolute; inset: 0; background: radial-gradient(600px 300px at 90% 0%, rgba(255,255,255,.22), transparent 60%), radial-gradient(500px 300px at 0% 100%, rgba(23,18,31,.35), transparent 60%); }
        .wt-cta > * { position: relative; }
        .wt-cta h2 { color: #fff; font-size: clamp(2rem, 4.4vw, 3.4rem); font-weight: 800; line-height: 1.04; max-width: 20ch; }
        .wt-cta p { color: rgba(255,255,255,.9); margin: 16px 0 28px; max-width: 54ch; font-size: 1.05rem; }
        .wt-cta .wt-actions { margin: 0; }
        .wt-cta small { display: flex; gap: 8px; align-items: center; margin-top: 22px; font-size: .84rem; color: rgba(255,255,255,.85); }

        @media (max-width: 640px) {
            .wt-section { padding: 60px 0; }
            .wt-actions .wt-btn { width: 100%; }
            .wt-faq .ans { padding-right: 0; }
        }
        @media (prefers-reduced-motion: reduce) {
            .wt-ticker-track { animation: none; }
            .wt *, .wt *::before { transition: none !important; }
        }

        /* ============ RESPONSIVE LAYER ============ */
        .wt img, .wt svg { max-width: 100%; }
        .wt-hero-grid > *, .wt-why > *, .wt-process-grid > *, .wt-faq-grid > *, .wt-reach > *, .wt-case > *, .wt-head.split > * { min-width: 0; }
        .wt h1, .wt h2, .wt h3, .wt p, .wt li, .wt summary { overflow-wrap: break-word; }
        .wt-ticker { width: 100%; }

        /* large screens */
        @media (min-width: 1440px) {
            .wt-wrap { max-width: 1320px; }
        }

        /* laptops / small desktops */
        @media (max-width: 1100px) {
            .wt-hero-grid { gap: 40px; }
            .wt-section { padding: 76px 0; }
            .wt-bento > :nth-child(1) { min-height: 0; }
        }

        /* tablets */
        @media (max-width: 991px) {
            .wt-hero { padding-top: 40px; }
            .wt-hero-grid { grid-template-columns: 1fr; }
            .wt-desk { max-width: 640px; }
            .wt-ledger { margin-top: 48px; }
            .wt-ticker { margin-top: 44px; }
            .wt-why-side { position: static !important; }
            .wt-pkg.pop { transform: none; padding-block: 34px; }
            .wt-pkgs { max-width: 640px; margin-inline: auto; }
            .wt-case { padding: 36px 26px; }
            .wt-h2, .wt-h2.wide, .wt-cta h2 { max-width: none; }
        }

        /* large phones */
        @media (max-width: 700px) {
            .wt-wrap { padding: 0 18px; }
            .wt-section { padding: 56px 0; }
            .wt-head { margin-bottom: 34px; }
            .wt-hero h1 { font-size: clamp(2.2rem, 10vw, 3rem); }
            .wt-hero-msg { font-size: 1.15rem; max-width: none; }
            .wt-hero-desc, .wt-lede { font-size: 1rem; }
            .wt-tag { font-size: .8rem; }
            .wt-actions { flex-direction: column; }
            .wt-actions .wt-btn, .wt-cta .wt-btn { width: 100%; white-space: normal; text-align: center; }
            .wt-desk { padding: 24px 18px 20px; border-radius: 20px; max-width: none; }
            .wt-desk h3 { font-size: 1.3rem; }
            .wt-field input, .wt-field select, .wt-field textarea { font-size: 16px; } /* stops iOS zoom */
            .wt-ledger div { padding: 18px 14px 20px 0; }
            .wt-ledger div:nth-child(even) { padding-left: 16px; border-left: 1px solid var(--line); }
            .wt-ledger b { font-size: 2.2rem; }
            .wt-ledger span { font-size: .82rem; }
            .wt-ticker { padding: 14px 0; margin-top: 36px; }
            .wt-ticker-track { gap: 30px; animation-duration: 30s; }
            .wt-ticker-track span { font-size: .98rem; gap: 30px; }
            .wt-tile { padding: 22px; }
            .wt-tile:first-child { min-height: 0; }
            .wt-row { padding: 22px 0; }
            .wt-row .ic { margin-bottom: 8px; }
            .wt-pkg { padding: 28px 22px; border-radius: 20px; }
            .wt-pkg .price { font-size: 2.3rem; }
            .wt-pkg .flag { top: 14px; right: 14px; }
            .wt-tech { gap: 8px; }
            .wt-tech div { padding: 9px 14px; font-size: .86rem; flex-wrap: wrap; }
            .wt-line { padding-left: 30px; }
            .wt-step h3 { font-size: 1.25rem; }
            .wt-case { border-radius: 22px; padding: 28px 20px; gap: 28px; }
            .wt-case-m div { padding: 18px 14px; }
            .wt-case-m b { font-size: 1.8rem; }
            .wt-chips span { font-size: .82rem; padding: 7px 13px; }
            .wt-faq summary { font-size: 1.05rem; padding: 18px 0; }
            .wt-faq .ans { padding: 0 0 20px; }
            .wt-cta { border-radius: 22px; padding: 40px 22px; }
            .wt-cta small { align-items: flex-start; }
        }

        /* small phones */
        @media (max-width: 380px) {
            .wt-wrap { padding: 0 14px; }
            .wt-ledger b { font-size: 1.9rem; }
            .wt-case-m { grid-template-columns: 1fr; }
            .wt-points li { gap: 10px; }
        }
        </style>

    <main class="wt">

        <!-- 1. HERO -->
        <section class="wt-hero">
            <div class="wt-wrap">
                <div class="wt-hero-grid">
                    <div>
                        <div class="wt-tag"><?= svcIcon($icon, 16) ?><span><?= $h($tagline) ?></span></div>
                        <h1><?= $heroHeadingHtml ?></h1>
                        <?php if ($heroHeadline !== ''): ?><h2 class="wt-hero-msg"><?= $h($heroHeadline) ?></h2><?php endif; ?>
                        <p class="wt-hero-desc"><?= nl2br($h($heroDescription !== '' ? $heroDescription : $overview)) ?></p>

                        <?php if ($showHeroBullets): ?>
                        <div class="wt-hero-points">
                            <h3><?= $h($heroBulletHeading !== '' ? $heroBulletHeading : 'Key highlights') ?></h3>
                            <ul class="wt-points">
                                <?php if (!empty($heroBulletItems)): foreach ($heroBulletItems as $b): ?>
                                    <li><?= svcIcon('check', 18) ?><div><strong><?= $h($b['title'] ?? '') ?></strong><span><?= $h($b['description'] ?? '') ?></span></div></li>
                                <?php endforeach; else:
                                    foreach (['100% mobile and cross-device responsive', 'SEO-friendly semantic architecture', 'Custom UI/UX tailored to your brand', 'Conversion-focused sales funnel'] as $d): ?>
                                    <li><?= svcIcon('check', 18) ?><div><strong><?= $h($d) ?></strong></div></li>
                                <?php endforeach; endif; ?>
                            </ul>
                        </div>
                        <?php endif; ?>

                        <?php if ($showHeroActions): ?>
                        <div class="wt-actions">
                            <a href="/contact.php" class="wt-btn pri trigger-enquiry-modal" data-service="<?= $h($title) ?>"><span>Get a free consultation</span><?= svcIcon('arrow', 16) ?></a>
                            <a href="tel:+919999674255" class="wt-btn ghost"><?= svcIcon('phone', 16) ?><span>+91-9999674255</span></a>
                        </div>
                        <?php endif; ?>
                    </div>

                    <aside class="wt-desk" aria-label="Request a quote">
                        <h3>Tell us your goal. Get a plan and a price in 24 hours.</h3>
                        <p class="sub">Free scope, no obligation.</p>
                        <form id="wtQuoteForm" onsubmit="wtQuoteSubmit(event, '<?= $h(addslashes($title)) ?>')">
                            <div class="wt-field"><input type="text" name="name" placeholder="Your name *" autocomplete="name" required></div>
                            <div class="wt-field"><input type="tel" name="phone" placeholder="Phone number *" autocomplete="tel" required></div>
                            <div class="wt-field"><input type="email" name="email" placeholder="Business email *" autocomplete="email" required></div>
                            <div class="wt-field">
                                <select name="budget" aria-label="Estimated budget">
                                    <option value="" disabled selected>Estimated budget</option>
                                    <option value="₹15,000 - ₹35,000">₹15,000 – ₹35,000</option>
                                    <option value="₹35,000 - ₹75,000">₹35,000 – ₹75,000</option>
                                    <option value="₹75,000 - ₹1,50,000">₹75,000 – ₹1,50,000</option>
                                    <option value="₹1,50,000+">₹1,50,000+</option>
                                </select>
                            </div>
                            <div class="wt-field"><textarea name="message" placeholder="What do you want to achieve?"></textarea></div>
                            <button type="submit" class="wt-btn pri" id="wtQuoteBtn"><span>Send my request</span><?= svcIcon('arrow', 16) ?></button>
                            <div id="wtQuoteFeedback" role="status"></div>
                        </form>
                        <div class="wt-note"><?= svcIcon('lock', 14) ?><span>Your details stay private. No spam.</span></div>
                    </aside>
                </div>

                <div class="wt-ledger">
                    <div><b>1,000+</b><span>Websites and projects delivered</span></div>
                    <div><b>13+</b><span>Years in the industry</span></div>
                    <div><b>98%</b><span>Client retention</span></div>
                    <div><b>25+</b><span>Countries served</span></div>
                </div>
            </div>

            <div class="wt-ticker" aria-label="Brands we have worked with">
                <div class="wt-ticker-track">
                    <?php foreach (array_merge($brandLogos, $brandLogos) as $b): ?><span><?= $h($b) ?></span><?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- 2. FEATURES -->
        <?php if (!empty($features)): ?>
        <section class="wt-section">
            <div class="wt-wrap">
                <div class="wt-head split">
                    <div>
                        <div class="wt-kicker"><?= $h($featuresEyebrow) ?></div>
                        <h2 class="wt-h2 wide">
                            <?php if ($featuresTitleAccent !== ''): ?><?= $accentHtml($featuresTitleLead, $featuresTitleAccent, $featuresTitleTail) ?>
                            <?php else: ?>Expert <em><?= $h($title) ?></em> for every business need<?php endif; ?>
                        </h2>
                    </div>
                    <p class="wt-lede"><?= $h($featuresSubtitle !== '' ? $featuresSubtitle : 'End-to-end capabilities built to improve performance, build credibility and turn traffic into revenue.') ?></p>
                </div>
                <div class="wt-bento">
                    <?php foreach ($features as $i => $f): ?>
                        <article class="wt-tile">
                            <div class="ic"><?= svcIcon($iconsList[$i % count($iconsList)], 22) ?></div>
                            <h3><?= $h($f['title'] ?? '') ?></h3>
                            <p><?= $h($f['description'] ?? '') ?></p>
                            <ul>
                                <li><?= svcIcon('check', 14) ?><span><?= $h($featureTagOne) ?></span></li>
                                <li><?= svcIcon('check', 14) ?><span><?= $h($featureTagTwo) ?></span></li>
                            </ul>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <!-- 3. WHY CHOOSE US -->
        <section class="wt-section alt">
            <div class="wt-wrap wt-why">
                <div class="wt-why-side">
                    <div class="wt-kicker">Why WebTecMart</div>
                    <h2 class="wt-h2">
                        <?php if ($benefitsTitleAccent !== ''): ?><?= $accentHtml($benefitsTitleLead, $benefitsTitleAccent, $benefitsTitleTail) ?>
                        <?php else: ?>Why choose our <em><?= $h($title) ?></em> services?<?php endif; ?>
                    </h2>
                    <p class="wt-lede"><?= $h($benefitsSubtitle !== '' ? $benefitsSubtitle : "We don't build generic websites or run cookie-cutter campaigns. Here is how our approach delivers real business impact.") ?></p>
                </div>
                <ul class="wt-rows">
                    <?php foreach ($benefits as $b):
                        $bt = preg_replace('/^\s*\d{1,2}\.\s*/', '', (string) ($b['title'] ?? '')); ?>
                        <li class="wt-row">
                            <div class="ic"><?= svcIcon($b['icon'] ?? 'target', 20) ?></div>
                            <div>
                                <h3><?= $h($bt) ?></h3>
                                <p><?= $h($b['desc'] ?? '') ?></p>
                                <?php if (!empty($b['metric'])): ?><span class="metric"><?= svcIcon('trending', 15) ?><?= $h($b['metric']) ?></span><?php endif; ?>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </section>

        <!-- 4. PACKAGES -->
        <?php if ($showPackages): ?>
        <section class="wt-section">
            <div class="wt-wrap">
                <div class="wt-head split">
                    <div>
                        <div class="wt-kicker">Packages</div>
                        <h2 class="wt-h2 wide">All-in-one <em><?= $h($title) ?></em> pricing</h2>
                    </div>
                    <p class="wt-lede">Pick the plan that fits your size, from first launch to high-volume platforms. Every deliverable is listed up front, with no hidden costs.</p>
                </div>
                <div class="wt-pkgs">
                    <?php foreach ($packages as $p): $pop = !empty($p['popular']); ?>
                        <article class="wt-pkg <?= $pop ? 'pop' : '' ?>">
                            <?php if ($pop): ?><span class="flag">Most popular</span><?php endif; ?>
                            <h3><?= $h($p['name']) ?></h3>
                            <div class="tg"><?= $h($p['tagline'] ?? '') ?></div>
                            <div class="price"><?= $h($p['price']) ?></div>
                            <div class="per"><?= $h($p['period'] ?? '') ?></div>
                            <p class="ds"><?= $h($p['desc'] ?? '') ?></p>
                            <ul><?php foreach (($p['features'] ?? []) as $ft): ?><li><?= svcIcon('check', 16) ?><span><?= $h($ft) ?></span></li><?php endforeach; ?></ul>
                            <a href="/contact.php" class="wt-btn <?= $pop ? 'pri' : 'ghost' ?> trigger-enquiry-modal" data-service="<?= $h($title . ' (' . $p['name'] . ')') ?>"><span><?= $h($p['cta'] ?? 'Get started') ?></span><?= svcIcon('arrow', 16) ?></a>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <!-- 5. TECH -->
        <?php if ($showTechnologies): ?>
        <section class="wt-section alt">
            <div class="wt-wrap">
                <div class="wt-head">
                    <div class="wt-kicker">Tech stack</div>
                    <h2 class="wt-h2 wide">Built on <em>proven technology</em></h2>
                    <p class="wt-lede">Modern, secure frameworks that stay stable and are easy to maintain.</p>
                </div>
                <div class="wt-tech">
                    <?php foreach ($technologies as $t): ?><div><?= $h($t['name']) ?><small><?= $h($t['cat'] ?? '') ?></small></div><?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <!-- 6. PROCESS -->
        <?php if (!empty($process)): ?>
        <section class="wt-section">
            <div class="wt-wrap wt-process-grid">
                <div class="wt-why-side">
                    <div class="wt-kicker"><?= $h($processEyebrow) ?></div>
                    <h2 class="wt-h2">
                        <?php if ($processTitleAccent !== ''): ?><?= $accentHtml($processTitleLead, $processTitleAccent, $processTitleTail) ?>
                        <?php else: ?>Our step-by-step <em>process</em><?php endif; ?>
                    </h2>
                    <p class="wt-lede"><?= $h($processSubtitle !== '' ? $processSubtitle : 'A clear roadmap for on-time delivery and reliable performance.') ?></p>
                </div>
                <ol class="wt-line">
                    <?php foreach ($process as $i => $s): ?>
                        <li class="wt-step">
                            <div class="n">Step <?= $h(ltrim((string) ($s['step'] ?? ($i + 1)), '0') ?: ($i + 1)) ?></div>
                            <h3><?= $h($s['title'] ?? '') ?></h3>
                            <p><?= $h($s['description'] ?? '') ?></p>
                        </li>
                    <?php endforeach; ?>
                </ol>
            </div>
        </section>
        <?php endif; ?>

        <!-- 7. CASE STUDY -->
        <?php if ($showCaseStudy): ?>
        <section class="wt-section" style="padding-top:0">
            <div class="wt-wrap">
                <?php if ($caseStudyTitle !== ''): ?><div class="wt-head"><h2 class="wt-h2 wide"><?= $h($caseStudyTitle) ?></h2></div><?php endif; ?>
                <div class="wt-case">
                    <div>
                        <span class="badge"><?= $h($caseStudyBadge) ?></span>
                        <h3><?= $h($caseStudy['client'] ?? '') ?></h3>
                        <p><?= $h($caseStudy['desc'] ?? '') ?></p>
                        <a href="<?= $h($caseStudy['link'] ?? '/portfolio.php') ?>" class="wt-btn light"><span>See our portfolio</span><?= svcIcon('arrow', 16) ?></a>
                    </div>
                    <div class="wt-case-m">
                        <?php foreach (($caseStudy['metrics'] ?? []) as $m): ?><div><b><?= $h($m['val']) ?></b><span><?= $h($m['lbl']) ?></span></div><?php endforeach; ?>
                    </div>
                </div>
                <?php if (!empty($caseStudyScreenshots)): ?>
                <div class="wt-shots">
                    <?php foreach ($caseStudyScreenshots as $s): ?>
                        <figure><img src="<?= $h($s['src']) ?>" alt="<?= $h($s['alt']) ?>" loading="lazy" decoding="async"><figcaption><?= $h($s['caption']) ?></figcaption></figure>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </section>
        <?php endif; ?>

        <!-- 8. REACH -->
        <section class="wt-section alt">
            <div class="wt-wrap wt-reach">
                <div>
                    <div class="wt-kicker">Where we work</div>
                    <h2 class="wt-h2 wide">Local in Delhi NCR. <em>Global</em> in reach.</h2>
                    <p class="wt-lede">From Connaught Place to Cyber City, plus clients across the USA, UK, Canada, Australia and UAE.</p>
                </div>
                <div class="wt-chips"><?php foreach ($microMarkets as $m): ?><span><?= $h($m) ?></span><?php endforeach; ?></div>
            </div>
        </section>

        <!-- 9. FAQ -->
        <?php if (!empty($faqs)): ?>
        <section class="wt-section">
            <div class="wt-wrap wt-faq-grid">
                <div class="wt-why-side">
                    <div class="wt-kicker">FAQ</div>
                    <h2 class="wt-h2">Questions we hear often</h2>
                    <p class="wt-lede">Straight answers about our <?= $h($title) ?> work and how we deliver it.</p>
                </div>
                <div class="wt-faq">
                    <?php foreach ($faqs as $i => $f): ?>
                        <details name="wt-faq" <?= $i === 0 ? 'open' : '' ?>>
                            <summary><span><?= $h($f['q'] ?? $f['question'] ?? '') ?></span><span class="pm"><?= svcIcon('plus', 16) ?></span></summary>
                            <div class="ans"><?= $h($f['a'] ?? $f['answer'] ?? '') ?></div>
                        </details>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <!-- 10. CTA -->
        <section class="wt-section" style="padding-top:0">
            <div class="wt-wrap">
                <div class="wt-cta">
                    <h2>Ready to grow with <?= $h($title) ?>?</h2>
                    <p>Talk to a senior strategist for a free consultation, a competitor gap analysis and a clear quote.</p>
                    <div class="wt-actions">
                        <a href="/contact.php" class="wt-btn light trigger-enquiry-modal" data-service="<?= $h($title) ?>"><span>Get a free consultation</span><?= svcIcon('arrow', 16) ?></a>
                        <a href="tel:+919999674255" class="wt-btn line-light"><?= svcIcon('phone', 16) ?><span>+91-9999674255</span></a>
                    </div>
                    <small><?= svcIcon('shield', 14) ?><span>Free consultation. No obligation.</span></small>
                </div>
            </div>
        </section>
    </main>

    <script>
        function wtQuoteSubmit(event, serviceName) {
            event.preventDefault();
            const form = event.target;
            const btn = document.getElementById('wtQuoteBtn');
            const fb = document.getElementById('wtQuoteFeedback');
            if (!btn || !fb) return;
            const original = btn.innerHTML;
            btn.disabled = true;
            btn.innerHTML = '<span>Sending...</span>';
            fb.style.display = 'none';

            const fd = new FormData(form);
            fd.append('ajax', '1');
            fd.append('service', serviceName || 'Website Design & Development');

            const show = (ok, msg) => {
                fb.style.display = 'block';
                fb.style.background = ok ? '#DDF6EA' : '#FDE2E2';
                fb.style.color = ok ? '#065F46' : '#991B1B';
                fb.textContent = msg;
            };

            fetch('/contact.php', { method: 'POST', headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }, body: fd })
                .then(r => r.json())
                .then(d => {
                    if (d.success) { show(true, d.message || 'Thank you! Our team will contact you shortly.'); form.reset(); }
                    else { show(false, d.message || 'Something went wrong. Please call +91-9999674255.'); }
                })
                .catch(() => { show(true, 'Thank you! Your request has been sent. We will get in touch shortly.'); form.reset(); })
                .finally(() => { btn.disabled = false; btn.innerHTML = original; });
        }
    </script>
<?php
}