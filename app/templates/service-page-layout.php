<?php
/**
 * WebTecMart — Premium Service Page Layout Engine  ("Expo Floor" colour edition, NO BLACK)
 * Same config API as before: renderServicePageLayout(array $config)
 */

function renderServicePageLayout(array $config): void
{
    $icon            = $config['icon'] ?? 'sparkles';
    $title           = $config['title'] ?? 'Website Design & Development';
    $heroTitle       = $config['heroTitle'] ?? $title;
    $heroTitleLead   = $config['heroTitleLead'] ?? '';
    $heroTitleAccent = $config['heroTitleAccent'] ?? '';
    $heroTitleTail   = $config['heroTitleTail'] ?? '';
    $heroPanel       = $config['heroPanel'] ?? false;
    $tagline         = $config['tagline'] ?? 'SMART. SCALABLE. SECURE.';
    $heroDescription = $config['heroDescription'] ?? ($config['hero_description'] ?? '');
    $heroHeadline    = $config['heroHeadline'] ?? '';
    $heroBulletHeading = $config['heroBulletHeading'] ?? '';
    $heroBulletItems  = $config['heroBulletItems'] ?? [];
    $showHeroBullets = $config['showHeroBullets'] ?? true;
    $showHeroActions = $config['showHeroActions'] ?? true;
    $featuresTitleLead = $config['featuresTitleLead'] ?? '';
    $featuresTitleAccent = $config['featuresTitleAccent'] ?? '';
    $featuresTitleTail = $config['featuresTitleTail'] ?? '';
    $featuresEyebrow = $config['featuresEyebrow'] ?? 'SPECIALIZED SOLUTIONS';
    $featuresSubtitle = $config['featuresSubtitle'] ?? '';
    $featureTagOne = $config['featureTagOne'] ?? 'Bespoke custom architecture';
    $featureTagTwo = $config['featureTagTwo'] ?? 'Full mobile & SEO alignment';
    $benefitsTitleLead = $config['benefitsTitleLead'] ?? '';
    $benefitsTitleAccent = $config['benefitsTitleAccent'] ?? '';
    $benefitsTitleTail = $config['benefitsTitleTail'] ?? '';
    $benefitsSubtitle = $config['benefitsSubtitle'] ?? '';
    $processEyebrow = $config['processEyebrow'] ?? 'EXECUTION PIPELINE';
    $processTitleLead = $config['processTitleLead'] ?? '';
    $processTitleAccent = $config['processTitleAccent'] ?? '';
    $processTitleTail = $config['processTitleTail'] ?? '';
    $processSubtitle = $config['processSubtitle'] ?? '';
    $showCaseStudy = $config['showCaseStudy'] ?? true;
    $caseStudyTitle = $config['caseStudyTitle'] ?? '';
    $caseStudyBadge = $config['caseStudyBadge'] ?? 'Verified Case Study Spotlight';
    $caseStudyScreenshots = $config['caseStudyScreenshots'] ?? [];
    $showPackages = $config['showPackages'] ?? true;
    $showTechnologies = $config['showTechnologies'] ?? true;
    $overview        = $config['overview'] ?? ($config['body'] ?? '');
    $features        = $config['features'] ?? [];
    $process         = $config['process'] ?? [];
    $faqs            = $config['faqs'] ?? [];
    $slug            = $config['slug'] ?? 'website-design-development';
    $category        = $config['category'] ?? 'Digital Solutions';

    $benefits = !empty($config['benefits']) ? $config['benefits'] : [
        ['icon' => 'layout', 'title' => 'User Experience (UX) & Clean Navigation', 'desc' => 'Intuitive layouts and clear information architecture designed to guide visitors effortlessly toward booking calls, making purchases, or submitting leads.', 'metric' => '3.4x Higher Conversion Rate'],
        ['icon' => 'search', 'title' => 'Built-In SEO & Organic Search Readiness', 'desc' => 'Engineered from day one with clean semantic HTML, schema structured data, indexable hierarchy, and keyword alignment to rank on Google faster.', 'metric' => 'Top 3 Search Dominance'],
        ['icon' => 'zap', 'title' => 'Speed Optimization & 95+ PageSpeed', 'desc' => 'Lightweight, bloat-free development optimized for sub-1.5 second loading times to reduce bounce rates and maximize Google Core Web Vitals scores.', 'metric' => '< 1.5s Avg. Load Time'],
        ['icon' => 'shield', 'title' => 'Bank-Grade Security & Clean Code', 'desc' => 'Strict security protocols, SSL encryption, sanitized inputs, and modular code architecture that keeps your business data safe from vulnerabilities.', 'metric' => '99.99% Uptime Guarantee'],
        ['icon' => 'target', 'title' => 'Transparent Pricing with Zero Hidden Costs', 'desc' => 'Clear, milestone-based packages with full intellectual property ownership, zero recurring template lock-ins, and transparent delivery scopes.', 'metric' => '100% Scope Transparency'],
        ['icon' => 'users', 'title' => 'Dedicated In-House Specialists & Support', 'desc' => 'Direct access to senior full-stack developers, UI/UX designers, and growth strategists with reliable post-launch maintenance and continuous support.', 'metric' => '24/7 Dedicated Support']
    ];

    $packages = !empty($config['packages']) ? $config['packages'] : [
        [
            'name' => 'Starter Package', 'tagline' => 'For Startups & Small Businesses', 'price' => '₹18,500', 'period' => 'One-Time', 'popular' => false,
            'desc' => 'Essential high-impact foundation built to launch your business online with a polished, mobile-friendly design.',
            'features' => ['Up to 6 Custom Responsive Pages', '100% Mobile & Tablet Optimized', 'Modern UI/UX Design (No Generic Themes)', 'Contact Form & WhatsApp Chat Integration', 'Basic On-Page SEO & Meta Tags Setup', 'Fast Loading Speed Optimization', 'Social Media & Google Maps Integration', '1 Month Free Post-Launch Support'],
            'cta' => 'Choose Starter Plan'
        ],
        [
            'name' => 'Growth Package', 'tagline' => 'Most Popular for Established Brands', 'price' => '₹38,500', 'period' => 'One-Time', 'popular' => true,
            'desc' => 'Complete conversion-focused growth engine engineered to outrank competitors and generate qualified inquiries.',
            'features' => ['Up to 15 Bespoke Responsive Pages', 'Full Custom UI/UX Architecture & Prototyping', 'Dynamic CMS (WordPress, Custom PHP or Headless)', 'Advanced Lead Funnel & Interactive Forms', 'Comprehensive Technical & On-Page SEO', 'Core Web Vitals Speed Tuning (<1.5s Load)', 'Google Analytics 4 & Meta Pixel Tracking', 'Blog / News / Case Studies CMS Engine', '3 Months Priority Support & Maintenance'],
            'cta' => 'Choose Growth Plan'
        ],
        [
            'name' => 'Enterprise Package', 'tagline' => 'For Scale, E-Commerce & Custom Portals', 'price' => 'Custom Quote', 'period' => 'Bespoke Scope', 'popular' => false,
            'desc' => 'Full-scale enterprise architecture, custom e-commerce, or complex web applications built for high traffic.',
            'features' => ['Unlimited / Scalable Custom Pages', 'Custom E-Commerce or Custom Web Application', 'Secure Payment Gateway & Multi-Currency Setup', 'Custom API Integrations & CRM Synchronization', 'Enterprise Security Hardening & Penetration Check', 'Dedicated Senior Tech Lead & Project Manager', 'Automated Daily Backups & CDN Integration', 'Continuous Conversion Rate Optimization (CRO)', '6 Months 24/7 Priority SLA Support'],
            'cta' => 'Discuss Enterprise Scope'
        ]
    ];

    $technologies = !empty($config['technologies']) ? $config['technologies'] : [
        ['name' => 'PHP 8.x', 'cat' => 'Backend'], ['name' => 'WordPress & WooCommerce', 'cat' => 'CMS'], ['name' => 'Shopify', 'cat' => 'E-Commerce'],
        ['name' => 'React & Next.js', 'cat' => 'Frontend'], ['name' => 'Laravel', 'cat' => 'Framework'], ['name' => 'HTML5 & Modern CSS3', 'cat' => 'Standards'],
        ['name' => 'Tailwind & Bootstrap', 'cat' => 'UI Framework'], ['name' => 'MySQL & SQLite', 'cat' => 'Database'],
        ['name' => 'REST APIs & Webhooks', 'cat' => 'Integration'], ['name' => 'Google Cloud & AWS', 'cat' => 'Cloud Hosting']
    ];

    $brandLogos = [
        ['name' => 'Informa Global', 'cat' => 'Trade Events', 'logo' => '/assets/images/logo-1.png'],
        ['name' => 'Bharat Tex Fair', 'cat' => 'Ministry of Textiles', 'logo' => '/assets/images/logos-10.jpeg'],
        ['name' => 'IHGF Delhi Autumn Fair 2027', 'cat' => 'Global Sourcing Fair', 'logo' => '/assets/images/logos-11.jpeg'],
        ['name' => 'Clarion Events', 'cat' => 'Exhibition Leader', 'logo' => '/assets/images/logos-2.png'],
        ['name' => 'London Tech Week', 'cat' => 'Tech Expo', 'logo' => '/assets/images/logos-3.jpeg'],
        ['name' => 'Media 10', 'cat' => 'Design & Media', 'logo' => '/assets/images/logos-4.jpeg'],
        ['name' => 'The AI Summit', 'cat' => 'Enterprise AI', 'logo' => '/assets/images/logos-5.jpeg'],
        ['name' => 'Northstar Travel Group', 'cat' => 'Travel Group', 'logo' => '/assets/images/logos-6.jpeg'],
        ['name' => 'Premier Logistics', 'cat' => 'Industrial Logistics', 'logo' => '/assets/images/logos-9.jpeg'],
        ['name' => 'Innovation Zero', 'cat' => 'CleanTech Congress', 'logo' => '/assets/images/logos-8.jpeg'],
        ['name' => 'Stonex Jewellers', 'cat' => 'Luxury Retail', 'logo' => '/assets/images/stonex-jewellers-logo.png'],
        ['name' => 'BMJ Future Health', 'cat' => 'Healthcare Publishing', 'logo' => '/assets/images/logos-7.jpeg']
    ];

    $caseStudy = $config['caseStudy'] ?? [
        'client' => 'Bharat Tex Fair & IHGF Delhi Fair (Global Sourcing Fair)',
        'result' => '400% Traffic & Inbound Leads Growth',
        'metrics' => [
            ['val' => '400%', 'lbl' => 'Organic Traffic Growth'],
            ['val' => '200+', 'lbl' => 'Top 3 Search Rankings'],
            ['val' => '1,000+', 'lbl' => 'Pre-Registered Buyers'],
            ['val' => '99.9%', 'lbl' => 'Server & Form Uptime']
        ],
        'desc' => 'Engineered high-performance, conversion-optimized digital platforms for India\'s flagship global trade expos, delivering seamless mobile experiences for thousands of international buyers.',
        'link' => '/portfolio.php'
    ];

    $microMarkets = [
        'Connaught Place (CP)', 'South Delhi & Saket', 'Gurgaon Cyber City',
        'Noida Sector 62 & 18', 'Okhla Industrial Area', 'Nehru Place IT Hub',
        'Dwarka Commercial Hub', 'Janakpuri & West Delhi', 'Netaji Subhash Place (NSP)',
        'Faridabad', 'Ghaziabad'
    ];

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
                'trophy'     => '<path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22"/><path d="M14 14.66V17c0 .57.47.98.97 1.21C16.15 18.75 17 20.24 17 22"/><path d="M18 2H6v7a6 6 0 0 0 12 0V2Z"/>',
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

    $e = function ($v) { return htmlspecialchars((string) $v); };
    $accentHead = function ($lead, $accent, $tail, $fallbackHtml) use ($e) {
        if ($accent === '') return $fallbackHtml;
        return $e($lead) . '<span class="xp-acc">' . $e($accent) . '</span>' . $e($tail);
    };
    $ctaArrow = svcIcon('arrow', 16);
    ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;12..96,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        /* ============================================================
           SERVICE PAGE — "Expo Floor" colour edition (NO BLACK)
           ============================================================ */
        .xp {
            --pink:#C4007A; --pink2:#E0398F; --pink3:#FF7BC0;
            --deep:#7E004E;            /* Replaces old black --ink */
            --head:#5E0B45;            /* Headings */
            --blush:#FBEAF3; --soft:#FFF4FA; --gold:#FFB547; --mint:#0E9F6E;
            --text:#4A3342; --mute:#7A6574; --line:rgba(126,0,78,.14);
            --disp:'Bricolage Grotesque','Plus Jakarta Sans',system-ui,sans-serif;
            font-family:'Plus Jakarta Sans',system-ui,-apple-system,sans-serif; color:var(--text); background:#fff; overflow-x:clip; width:100%;
        }
        .xp *, .xp *::before, .xp *::after { box-sizing:border-box; }
        .xp h1,.xp h2,.xp h3,.xp h4 { font-family:var(--disp); margin:0; letter-spacing:-.02em; color:var(--head); }
        .xp p { margin:0; }
        .xp a:focus-visible,.xp button:focus-visible,.xp input:focus-visible,.xp select:focus-visible,.xp textarea:focus-visible { outline:3px solid var(--gold); outline-offset:2px; }
        .xp-wrap { max-width:1200px; margin:0 auto; padding:0 22px; position:relative; z-index:1; }
        @media (min-width:1440px){ .xp-wrap { max-width:1320px; } }
        .xp img,.xp svg,.xp input,.xp select,.xp textarea { max-width:100%; }
        .xp h1,.xp h2,.xp h3,.xp p,.xp li { overflow-wrap:anywhere; }
        .xp-grid { display:grid; gap:18px; grid-template-columns:minmax(0,1fr); }
        .xp-grid > * { min-width:0; }
        @media (min-width:640px){ .xp-g3 { grid-template-columns:repeat(2,minmax(0,1fr)); } }
        @media (min-width:992px){ .xp-g3 { grid-template-columns:repeat(3,minmax(0,1fr)); } }

        /* Buttons */
        .xp-btn { position:relative; display:inline-flex; align-items:center; justify-content:center; gap:10px; padding:14px 26px; border-radius:12px; font-weight:700; font-size:.95rem; line-height:1; font-family:inherit; text-decoration:none; white-space:nowrap; border:2px solid transparent; cursor:pointer; transition:translate .2s, box-shadow .2s, background .2s; }
        .xp-btn svg { flex-shrink:0; }
        .xp-btn--pink { background:var(--pink); color:#fff !important; box-shadow:0 6px 0 var(--deep); border-color:var(--deep); }
        .xp-btn--pink:hover { translate:0 2px; box-shadow:0 4px 0 var(--deep); }
        .xp-btn--pink:active { translate:0 6px; box-shadow:0 0 0 transparent; }
        .xp-btn--ghost { background:transparent; color:#fff !important; border-color:rgba(255,255,255,.35); }
        .xp-btn--ghost:hover { background:rgba(255,255,255,.1); border-color:#fff; }
        .xp-btn--line { background:#fff; color:var(--pink) !important; border-color:var(--pink); }
        .xp-btn--line:hover { background:var(--blush); }
        .xp-btn--block { width:100%; }
        .xp-actions { display:flex; flex-wrap:wrap; gap:14px; align-items:center; }

        /* Hero */
        .xp-hero { position:relative; color:#fff; padding:56px 0 0; background:radial-gradient(60% 70% at 85% 10%,rgba(255,255,255,.18),transparent 65%), radial-gradient(40% 50% at 0% 100%,rgba(255,181,71,.3),transparent 70%), linear-gradient(135deg, #A8006A 0%, #C4007A 45%, #E0398F 100%); overflow:hidden; }
        .xp-hero::before { content:''; position:absolute; inset:0; background-image:radial-gradient(rgba(255,255,255,.15) 1px,transparent 1.2px); background-size:26px 26px; -webkit-mask-image:linear-gradient(180deg,#000 30%,transparent 95%); mask-image:linear-gradient(180deg,#000 30%,transparent 95%); pointer-events:none; }
        .xp-hero-grid { position:relative; z-index:2; display:grid; gap:44px; align-items:start; padding-bottom:60px; grid-template-columns:minmax(0,1fr); }
        .xp-hero-grid > * { min-width:0; }
        @media (min-width:992px){ .xp-hero-grid { grid-template-columns:1.08fr .92fr; gap:56px; align-items:center; } }
        .xp-tag { display:inline-flex; align-items:center; gap:8px; padding:7px 14px 7px 10px; margin-bottom:20px; border-radius:999px; background:rgba(255,255,255,.18); border:1px solid rgba(255,255,255,.45); font-size:.8rem; font-weight:700; color:#fff; -webkit-backdrop-filter: blur(10px); backdrop-filter: blur(10px); }
        .xp-tag i { width:8px; height:8px; border-radius:50%; background:var(--gold); box-shadow:0 0 0 4px rgba(255,181,71,.3); }

        /* 🔥 UPDATED HERO HEADING (Blog Style) 🔥 */
        .xp-hero h1 {
            color:#fff;
            font-size:clamp(2.4rem, 6vw, 4.5rem);
            font-weight:800;
            line-height:1.06;
            margin-bottom:18px;
            text-shadow: 0 4px 0 var(--deep), 0 8px 24px rgba(126, 0, 78, 0.5);
            position: relative;
            z-index: 5;
        }
        .xp-hl {
            position: relative;
            display: inline-block;
            color: var(--gold); /* Solid Yellow */
            text-shadow: 0 4px 0 var(--deep), 0 8px 24px rgba(126, 0, 78, 0.5); /* Portfolio wali deep shadow */
        }
        .xp-hl svg {
            position: absolute;
            left: 0;
            bottom: -10px;
            width: 100%;
            height: 12px;
        }
        .xp-hl svg path {
            stroke: #fff;
            opacity: 0.9;
            stroke-width: 3;
        }
        @keyframes xpShine { to { background-position:200% 0; } }

        .xp-hero-sub { font-family:var(--disp); font-size:clamp(1.1rem,2vw,1.4rem); font-weight:600; line-height:1.35; color:#FFD7EB !important; margin-bottom:14px; max-width:600px; }
        .xp-hero-desc { color:rgba(255,255,255,.88); line-height:1.7; max-width:600px; margin-bottom:22px; }
        .xp-bh { font:700 .96rem var(--disp); color:#fff !important; margin-bottom:10px; }
        .xp-bullets { display:grid; gap:10px 14px; grid-template-columns:minmax(0,1fr); max-width:660px; margin-bottom:26px; }
        @media (min-width:600px){ .xp-bullets { grid-template-columns:1fr 1fr; } }
        .xp-bullet { display:flex; gap:10px; align-items:flex-start; font-size:.9rem; font-weight:600; line-height:1.45; color:#fff; }
        .xp-bullet .dot { display:grid; place-items:center; flex-shrink:0; width:22px; height:22px; border-radius:50%; background:var(--gold); color:var(--deep); font-size:.72rem; font-weight:800; }
        .xp-bullet--card { padding:12px; border-radius:14px; background:rgba(255,255,255,.12); border:1px solid rgba(255,255,255,.25); }
        .xp-bullet--card strong { display:block; font-size:.86rem; margin-bottom:3px; color:#fff; }
        .xp-bullet--card span span { display:block; font-weight:400; font-size:.78rem; line-height:1.5; color:rgba(255,255,255,.8); }
        .xp-hero-panel .xp-hero-copy { padding:26px; border-radius:20px; background:rgba(255,255,255,.12); border:1px solid rgba(255,255,255,.25); }

        /* Quote form = visitor badge */
        .xp-badge-wrap { position:relative; display:flex; justify-content:center; padding-top:64px; }
        .xp-lanyard { position:absolute; top:0; left:50%; width:14px; height:86px; margin-left:-7px; background:linear-gradient(var(--gold),#E58B00); border-radius:0 0 4px 4px; }
        .xp-lanyard::after { content:''; position:absolute; left:50%; bottom:-4px; width:46px; height:12px; margin-left:-23px; background:#A898A2; border-radius:4px; }
        .xp-badge { position:relative; width:100%; max-width:500px; background:#fff; color:var(--text); border-radius:22px; padding:36px 26px 24px; box-shadow:12px 12px 0 var(--deep); }
        .xp-badge::before { content:''; position:absolute; top:12px; left:50%; width:52px; height:9px; margin-left:-26px; border-radius:99px; background:var(--deep); }
        .xp-badge h3 { display:flex; align-items:center; gap:8px; font-size:1.3rem; font-weight:800; margin-bottom:6px; color:var(--head); }
        .xp-badge h3 svg { color:var(--pink); flex-shrink:0; }
        .xp-badge-lead { font-size:.88rem; line-height:1.55; color:var(--mute); margin-bottom:18px; }
        .xp-fld { margin-bottom:12px; }
        .xp-fld input,.xp-fld select,.xp-fld textarea { width:100%; min-width:0; padding:13px 14px; border-radius:10px; border:2px solid #E4DCE6; background:#FCFAFD; font:inherit; font-size:.92rem; color:var(--head); transition:border-color .2s, box-shadow .2s; }
        .xp-fld textarea { min-height:90px; resize:vertical; }
        .xp-fld input:focus,.xp-fld select:focus,.xp-fld textarea:focus { border-color:var(--pink); background:#fff; outline:none; box-shadow:0 0 0 4px rgba(196,0,122,.14); }
        .xp-submit:disabled { opacity:.7; cursor:wait; }
        .xp-pass { margin:18px -26px -24px; padding:14px 26px 18px; background:var(--blush); border-top:2px dashed rgba(126,0,78,.4); border-radius:0 0 22px 22px; position:relative; text-align:center; font-size:.78rem; font-weight:700; color:var(--head); }
        .xp-pass::before,.xp-pass::after { content:''; position:absolute; top:-10px; width:18px; height:18px; border-radius:50%; background:#fff; border:2px solid var(--deep); }
        .xp-pass::before { left:-11px; } .xp-pass::after { right:-11px; }

        /* Ribbon (growing figures) */
        .xp-ribbon { position:relative; z-index:2; background:var(--gold); color:var(--deep); overflow:hidden; border-top:3px solid var(--deep); }
        .xp-ribbon-track { display:flex; width:max-content; animation:xpRun 38s linear infinite; }
        .xp-ribbon:hover .xp-ribbon-track { animation-play-state:paused; }
        .xp-ribbon span { font:800 1.05rem var(--disp); padding:14px 30px; white-space:nowrap; }
        .xp-ribbon span::after { content:'✦'; margin-left:60px; opacity:.6; }
        .xp-ribbon span b { display:inline-block; margin-right:8px; padding:2px 11px; border-radius:8px; background:var(--deep); color:var(--gold); }
        @keyframes xpRun { to { transform:translateX(-50%); } }

        /* Sections */
        .xp-sec { position:relative; padding:76px 0; }
        .xp-head { max-width:760px; margin:0 auto 40px; text-align:center; }
        .xp-head h2 { font-size:clamp(1.85rem,3.5vw,2.8rem); font-weight:800; line-height:1.1; margin-bottom:14px; color:var(--head); }
        .xp-head p { color:var(--mute); line-height:1.65; font-size:1.02rem; }
        .xp-head--dark h2 { color:#fff; } .xp-head--dark p { color:rgba(255,255,255,.85); }
        .xp-kicker { display:inline-block; font-size:.82rem; font-weight:800; color:var(--pink); margin-bottom:12px; padding-left:14px; border-left:4px solid var(--pink); text-align:left; text-transform:uppercase; letter-spacing:.06em; }
        .xp-head--dark .xp-kicker { color:var(--gold); border-color:var(--gold); }
        .xp-acc { color:var(--pink); }
        .xp-head--dark .xp-acc,.xp-cta-card .xp-acc { color:var(--gold); }
        .xp-bar { display:block; width:84px; height:7px; margin:0 auto 16px; background:repeating-linear-gradient(90deg,var(--pink) 0 12px,var(--gold) 12px 24px); }
        .xp-mist { background:var(--soft); background-image:radial-gradient(rgba(126,0,78,.07) 1px,transparent 1.2px); background-size:24px 24px; }
        .xp-dark { background:radial-gradient(50% 60% at 92% 0%,rgba(255,255,255,.18),transparent 70%),radial-gradient(40% 50% at 0% 100%,rgba(255,181,71,.3),transparent 70%),linear-gradient(135deg, #A8006A 0%, #C4007A 45%, #E0398F 100%); color:#fff; }
        .xp-scallop::after { content:''; position:absolute; top:0; left:0; right:0; height:18px; pointer-events:none; background:radial-gradient(circle at 18px 0,var(--gold) 17px,transparent 18px) 0 0/36px 18px repeat-x; }

        /* Brands (logo cards slider) */
        .xp-brands { padding:60px 0 48px; background:var(--soft); background-image:radial-gradient(rgba(126,0,78,.07) 1px,transparent 1.2px); background-size:24px 24px; border-bottom:3px solid var(--deep); }
        .xp-brands .xp-head { margin-bottom:26px; }
        .xp-lg { position:relative; }
        .xp-lg .swiper { overflow:hidden; padding:10px 12px 22px; -webkit-mask-image:linear-gradient(90deg,transparent 0,#000 7%,#000 93%,transparent 100%); mask-image:linear-gradient(90deg,transparent 0,#000 7%,#000 93%,transparent 100%); }
        .xp-lg .swiper-slide { height:auto; }
        .xp-lg-card { display:grid; place-items:center; height:180px; padding:20px; background:#fff; border:2px solid var(--deep); border-radius:20px; box-shadow:5px 5px 0 var(--deep); transition:translate .25s, box-shadow .25s; }
        .xp-lg-card--1 { box-shadow:5px 5px 0 var(--gold); }
        .xp-lg-card--2 { box-shadow:5px 5px 0 var(--pink); }
        .xp-lg-card:hover { translate:-3px -3px; }
        .xp-lg-card img { max-width:100%; max-height:138px; width:auto; height:auto; object-fit:contain; display:block; }
        .xp-lg-pag { display:flex; justify-content:center; gap:8px; margin-top:4px; }
        .xp-lg-pag .swiper-pagination-bullet { width:30px; height:6px; border-radius:0; background:#E3BFD5; opacity:1; margin:0 !important; cursor:pointer; transition:background .3s, width .3s; }
        .xp-lg-pag .swiper-pagination-bullet-active { width:56px; background:var(--pink); }
        .xp-mono { display:grid; place-items:center; width:84px; height:84px; border-radius:20px; background:var(--blush); color:var(--pink); font:800 1.6rem var(--disp); }
        @media (max-width:575px){ .xp-lg-card { height:130px; padding:14px; } .xp-lg-card img { max-height:96px; } }

        /* Stalls */
        .xp-stall { position:relative; display:flex; flex-direction:column; background:#fff; border:2px solid var(--deep); border-radius:18px; padding:54px 24px 24px; box-shadow:6px 6px 0 var(--gold); transition:translate .25s, box-shadow .25s; }
        .xp-stall::before { content:''; position:absolute; top:0; left:0; right:0; height:28px; border-radius:15px 15px 0 0; background:repeating-linear-gradient(90deg,var(--pink) 0 22px,#fff 22px 44px); border-bottom:2px solid var(--deep); }
        .xp-stall:nth-child(even)::before { background:repeating-linear-gradient(90deg,var(--gold) 0 22px,#fff 22px 44px); }
        .xp-stall:hover { translate:-4px -4px; box-shadow:10px 10px 0 var(--pink); }
        .xp-stall h3 { font-size:1.2rem; font-weight:800; line-height:1.25; margin-bottom:8px; color:var(--head); }
        .xp-stall > p { font-size:.92rem; line-height:1.65; color:var(--mute); flex:1; }
        .xp-ico { display:grid; place-items:center; width:48px; height:48px; margin-bottom:14px; border-radius:12px; background:var(--blush); color:var(--pink); border:2px solid var(--deep); box-shadow:3px 3px 0 var(--gold); transition:rotate .3s, scale .3s; }
        .xp-stall:hover .xp-ico { rotate:-8deg; scale:1.08; }
        .xp-tags { display:grid; gap:7px; margin-top:16px; padding-top:14px; border-top:2px dashed var(--line); }
        .xp-tags div { display:flex; align-items:center; gap:7px; font-size:.8rem; font-weight:700; color:var(--text); }
        .xp-tags svg { color:var(--mint); flex-shrink:0; }
        .xp-metric { align-self:flex-start; display:inline-flex; align-items:center; gap:6px; margin-top:14px; padding:5px 12px; border-radius:999px; background:#E6F8F0; color:#0A7A54; border:2px solid var(--deep); font-size:.76rem; font-weight:800; }

        /* Packages */
        .xp-pkg { position:relative; display:flex; flex-direction:column; background:#fff; border:2px solid var(--deep); border-radius:22px; padding:32px 26px 28px; box-shadow:6px 6px 0 var(--gold); transition:translate .25s, box-shadow .25s; }
        .xp-pkg:hover { translate:-3px -3px; box-shadow:9px 9px 0 var(--pink); }
        .xp-pkg.popular { box-shadow:8px 8px 0 var(--gold); border-width:3px; border-color:var(--pink); }
        .xp-pkg.popular:hover { box-shadow:11px 11px 0 var(--gold); }
        .xp-pkg-badge { position:absolute; top:-16px; left:50%; translate:-50% 0; background:var(--gold); color:var(--deep); border:2px solid var(--deep); font:800 .74rem var(--disp); padding:5px 16px; border-radius:999px; box-shadow:3px 3px 0 var(--deep); white-space:nowrap; }
        .xp-pkg h3 { font-size:1.3rem; font-weight:800; margin-bottom:4px; color:var(--head); }
        .xp-pkg-tag { font-size:.82rem; font-weight:800; color:var(--pink); margin-bottom:16px; }
        .xp-pkg-price { padding:14px 0; margin-bottom:14px; border-top:2px dashed var(--line); border-bottom:2px dashed var(--line); }
        .xp-pkg-price b { display:block; font:800 2.2rem var(--disp); color:var(--head); line-height:1.05; }
        .xp-pkg-price span { font-size:.82rem; font-weight:700; color:var(--mute); }
        .xp-pkg-desc { font-size:.88rem; line-height:1.6; color:var(--mute); margin-bottom:18px; }
        .xp-pkg ul { list-style:none; padding:0; margin:0 0 24px; display:grid; gap:10px; flex:1; }
        .xp-pkg li { display:flex; gap:9px; font-size:.86rem; font-weight:600; line-height:1.45; color:var(--text); }
        .xp-pkg li::before { content:'✓'; display:grid; place-items:center; flex-shrink:0; width:20px; height:20px; border-radius:50%; background:var(--pink); color:#fff; font-size:.68rem; font-weight:800; }

        /* Tech */
        .xp-pills { display:flex; flex-wrap:wrap; justify-content:center; gap:12px; max-width:940px; margin:0 auto; }
        .xp-pill { display:inline-flex; align-items:center; gap:8px; padding:9px 18px; border:2px solid var(--deep); border-radius:999px; background:#fff; box-shadow:3px 3px 0 var(--gold); font-weight:700; font-size:.86rem; color:var(--head); transition:translate .2s, box-shadow .2s; }
        .xp-pill:hover { translate:-2px -2px; box-shadow:5px 5px 0 var(--pink); }
        .xp-pill i { width:8px; height:8px; border-radius:50%; background:var(--pink); }
        .xp-pill small { font-size:.72rem; color:var(--pink); font-weight:700; }

        /* Process */
        .xp-step { background:#fff; border:2px solid var(--deep); border-radius:18px; padding:24px 22px; box-shadow:6px 6px 0 var(--gold); transition:translate .25s, box-shadow .25s; }
        .xp-step:hover { translate:-3px -3px; box-shadow:9px 9px 0 var(--pink); }
        .xp-step-n { display:inline-grid; place-items:center; min-width:46px; height:46px; padding:0 8px; margin-bottom:14px; border-radius:12px; background:var(--gold); color:var(--deep); border:2px solid var(--deep); font:800 1.15rem var(--disp); box-shadow:3px 3px 0 var(--deep); }
        .xp-step h3 { font-size:1.15rem; font-weight:800; margin-bottom:8px; color:var(--head); }
        .xp-step p { font-size:.9rem; line-height:1.62; color:var(--mute); }

        /* Case study */
        .xp-case { display:grid; gap:28px; align-items:center; padding:34px; border-radius:22px; background:rgba(255,255,255,.08); border:2px solid rgba(255,255,255,.2); box-shadow:8px 8px 0 var(--gold); grid-template-columns:minmax(0,1fr); backdrop-filter: blur(10px); }
        .xp-case > * { min-width:0; }
        @media (min-width:900px){ .xp-case { grid-template-columns:1.1fr .9fr; padding:42px; gap:44px; } }
        .xp-case-org { display:inline-block; font-size:.78rem; font-weight:800; color:var(--deep); background:var(--gold); padding:6px 12px; border-radius:8px; margin-bottom:14px; border:2px solid var(--deep); box-shadow: 2px 2px 0 var(--deep); }
        .xp-case h3 { color:#fff; font-size:clamp(1.45rem,2.6vw,2rem); font-weight:800; line-height:1.15; margin-bottom:14px; }
        .xp-case p { color:rgba(255,255,255,.85); line-height:1.7; margin-bottom:22px; font-size:.96rem; }
        .xp-stats { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:12px; }
        .xp-stat { padding:18px 14px; border-radius:14px; background:rgba(255,255,255,.12); border:2px solid rgba(255,255,255,.25); transition: translate .25s, background .25s; }
        .xp-stat:hover { translate:0 -4px; background:rgba(255,255,255,.18); }
        .xp-stat b { display:block; font:800 2rem var(--disp); color:var(--gold); line-height:1.05; }
        .xp-stat span { font-size:.78rem; color:rgba(255,255,255,.9); font-weight:700; }
        .xp-shots { display:grid; gap:20px; margin-top:28px; grid-template-columns:minmax(0,1fr); }
        @media (min-width:768px){ .xp-shots { grid-template-columns:repeat(2,minmax(0,1fr)); } }
        .xp-shot { margin:0; padding:10px; background:#fff; border:2px solid var(--deep); border-radius:16px; box-shadow:6px 6px 0 var(--gold); }
        .xp-shot img { display:block; width:100%; height:auto; max-height:520px; object-fit:contain; border-radius:10px; background:#F3F4F6; }
        .xp-shot figcaption { padding:10px 4px 2px; color:var(--head); font-size:.84rem; font-weight:700; line-height:1.45; }

        /* Markets */
        .xp-market-card { max-width:960px; margin:0 auto; padding:38px 30px; text-align:center; border:2px solid var(--deep); border-radius:24px; background:#fff; box-shadow:10px 10px 0 var(--gold); }
        .xp-market-card h3 { font-size:clamp(1.4rem,2.6vw,1.9rem); font-weight:800; margin-bottom:10px; color:var(--head); }
        .xp-market-card > p { max-width:720px; margin:0 auto; color:var(--mute); line-height:1.65; font-size:.94rem; }
        .xp-places { display:flex; flex-wrap:wrap; justify-content:center; gap:8px; margin-top:22px; padding:18px; background:var(--blush); border:2px dashed var(--pink); border-radius:16px; }
        .xp-place { padding:6px 14px; border:2px solid var(--deep); border-radius:999px; background:#fff; color:var(--pink); font-weight:800; font-size:.82rem; box-shadow: 2px 2px 0 var(--gold); }

        /* FAQ */
        .xp-faq-grid { display:grid; gap:40px; grid-template-columns:minmax(0,1fr); }
        .xp-faq-grid > * { min-width:0; }
        @media (min-width:992px){ .xp-faq-grid { grid-template-columns:.8fr 1.2fr; gap:64px; } .xp-faq-grid .xp-head { position:sticky; top:100px; align-self:start; margin:0; text-align:left; } .xp-faq-grid .xp-bar { margin-left:0; } }
        .mb-faq-item { border:2px solid var(--deep); border-radius:14px; margin-bottom:12px; background:#fff; overflow:hidden; transition:box-shadow .2s; box-shadow: 4px 4px 0 var(--gold); }
        .mb-faq-item.active { box-shadow:5px 5px 0 var(--pink); }
        .mb-faq-btn { width:100%; display:flex; justify-content:space-between; align-items:center; gap:16px; padding:18px 20px; background:transparent; border:0; text-align:left; font:800 1.02rem/1.3 var(--disp); color:var(--head); cursor:pointer; }
        .mb-faq-btn-icon { flex-shrink:0; display:grid; place-items:center; width:30px; height:30px; border-radius:8px; background:var(--blush); color:var(--pink); border: 2px solid var(--deep); transition:transform .25s, background .25s, color .25s; }
        .mb-faq-item.active .mb-faq-btn-icon { transform:rotate(45deg); background:var(--pink); color:#fff; }
        .mb-faq-answer { display:none; padding:0 20px 20px; line-height:1.7; color:var(--mute); font-size:.94rem; }
        .mb-faq-item.active .mb-faq-answer { display:block; }

        /* Final CTA */
        .xp-cta { padding:0 0 76px; background: var(--soft); }
        .xp-cta-card { position:relative; overflow:hidden; color:#fff; border-radius:26px; padding:60px 34px; text-align:center; box-shadow:10px 10px 0 var(--gold); background:radial-gradient(50% 80% at 50% 120%,rgba(255,181,71,.45),transparent 70%),radial-gradient(rgba(255,255,255,.2) 1px,transparent 1.2px) 0 0/26px 26px,linear-gradient(135deg, #A8006A 0%, #C4007A 50%, #E0398F 100%); }
        .xp-cta-card::after { content:''; position:absolute; inset:0; border-radius:inherit; padding:3px; pointer-events:none; background:conic-gradient(from var(--xpa), var(--gold), #fff, var(--pink3), var(--gold)); -webkit-mask:linear-gradient(#000 0 0) content-box,linear-gradient(#000 0 0); -webkit-mask-composite:xor; mask:linear-gradient(#000 0 0) content-box exclude,linear-gradient(#000 0 0); animation:xpAngle 6s linear infinite; }
        @property --xpa { syntax:'<angle>'; initial-value:0deg; inherits:false; }
        @keyframes xpAngle { to { --xpa:360deg; } }
        .xp-cta-card > * { position:relative; z-index:2; }
        .xp-cta-card h2 { color:#fff; font-size:clamp(1.8rem,3.6vw,2.9rem); font-weight:800; line-height:1.12; max-width:860px; margin:0 auto 16px; text-shadow: 0 3px 0 rgba(126,0,78,.3); }
        .xp-cta-card p { max-width:660px; margin:0 auto 28px; color:rgba(255,255,255,.92); line-height:1.65; }
        .xp-cta-card .xp-actions { justify-content:center; }
        .xp-cta-foot { margin-top:24px; display:flex; align-items:center; justify-content:center; gap:7px; font-size:.8rem; color:rgba(255,255,255,.75); }

        /* Mobile sticky bar */
        .xp-sticky { position:fixed; left:0; right:0; bottom:0; z-index:999; display:none; gap:10px; padding:10px 14px calc(10px + env(safe-area-inset-bottom)); background:var(--deep); border-top:3px solid var(--gold); translate:0 115%; transition:translate .35s cubic-bezier(.16,1,.3,1); }
        .xp-sticky.on { translate:0 0; }
        .xp-sticky .xp-btn { padding:13px 16px; font-size:.9rem; }
        .xp-sticky .xp-btn--pink { flex:1; box-shadow:0 4px 0 #5C0038; }

        /* Responsive */
        @media (max-width:991px){ .xp-hero-sub,.xp-hero-desc { max-width:none; } }
        @media (max-width:767px){ .xp-sticky { display:flex; } .xp-cta { padding-bottom:96px; } .xp-ribbon span { font-size:.9rem; padding:12px 20px; } .xp-ribbon span::after { margin-left:36px; } }
        @media (max-width:575px){
            .xp-wrap { padding:0 16px; } .xp-sec { padding:56px 0; } .xp-hero { padding-top:36px; }
            .xp-btn { white-space:normal; text-align:center; line-height:1.3; max-width:100%; padding:14px 18px; min-height:48px; }
            .xp-actions .xp-btn { width:100%; }
            .xp-badge { padding:34px 18px 22px; box-shadow:8px 8px 0 var(--deep); } .xp-pass { margin:18px -18px -22px; padding:14px 18px 18px; }
            .xp-fld input,.xp-fld select,.xp-fld textarea { font-size:16px; }
            .xp-stall { padding:50px 20px 22px; box-shadow:4px 4px 0 var(--gold); } .xp-pkg { padding:30px 20px 24px; box-shadow: 4px 4px 0 var(--gold); }
            .xp-case { padding:24px 18px; box-shadow:5px 5px 0 var(--gold); } .xp-stat b { font-size:1.6rem; }
            .xp-market-card { padding:28px 18px; box-shadow:6px 6px 0 var(--gold); } .xp-cta-card { padding:44px 20px; border-radius:20px; box-shadow:6px 6px 0 var(--gold); }
            .mb-faq-btn { padding:16px; font-size:.98rem; } .mb-faq-answer { padding:0 16px 18px; }
            .xp-hero h1 { font-size:clamp(2rem, 9.5vw, 2.6rem); }
        }
        @media (max-width:380px){ .xp-stats { grid-template-columns:1fr; } }
        @media (hover:none){ .xp-stall:hover,.xp-step:hover,.xp-pkg:hover,.xp-pill:hover,.xp-btn--pink:hover,.xp-lg-card:hover { translate:none; } .xp-stall:hover,.xp-step:hover { box-shadow:6px 6px 0 var(--gold); } }
        @media (prefers-reduced-motion:reduce){ .xp-ribbon-track,.xp-hl,.xp-cta-card::after { animation:none; } .xp-btn,.xp-stall,.xp-step,.xp-pkg,.xp-pill,.xp-lg-card { transition:none; } }
    </style>

    <main class="xp mb-page">

        <!-- 1. HERO + QUOTE BADGE + FIGURES RIBBON -->
        <section class="xp-hero<?= $heroPanel ? ' xp-hero-panel' : '' ?>">
            <div class="xp-wrap">
                <div class="xp-hero-grid">
                    <div class="xp-hero-copy">
                        <div class="xp-tag"><i></i><span><?= $e($tagline !== '' ? $tagline : 'SMART. SCALABLE. SECURE.') ?></span></div>

                        <?php
                        if ($heroTitleAccent !== '') {
                            $heroHeadingHtml = $e($heroTitleLead) . '<span class="xp-hl">' . $e($heroTitleAccent) . '<svg viewBox="0 0 300 8" preserveAspectRatio="none" aria-hidden="true"><path d="M2 4C60 1 240 1 298 4" stroke="#FFB547" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>' . $e($heroTitleTail);
                        } else {
                            $rawTitle = trim((string) $heroTitle);
                            $titleWords = preg_split('/\s+/', $rawTitle);
                            if (count($titleWords) > 1) {
                                $lastWord = array_pop($titleWords);
                                $heroHeadingHtml = $e(implode(' ', $titleWords)) . ' <span class="xp-hl">' . $e($lastWord) . '<svg viewBox="0 0 300 8" preserveAspectRatio="none" aria-hidden="true"><path d="M2 4C60 1 240 1 298 4" stroke="#FFB547" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>';
                            } else {
                                $heroHeadingHtml = '<span class="xp-hl">' . $e($rawTitle) . '<svg viewBox="0 0 300 8" preserveAspectRatio="none" aria-hidden="true"><path d="M2 4C60 1 240 1 298 4" stroke="#FFB547" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>';
                            }
                        }
                        ?>
                        <h1><?= $heroHeadingHtml ?></h1>

                        <?php if ($heroHeadline !== ''): ?>
                            <h2 class="xp-hero-sub"><?= $e($heroHeadline) ?></h2>
                        <?php endif; ?>

                        <p class="xp-hero-desc"><?= nl2br($e($heroDescription !== '' ? $heroDescription : $overview)) ?></p>

                        <?php if ($showHeroBullets): ?>
                            <?php if (!empty($heroBulletItems)): ?>
                                <h3 class="xp-bh"><?= $e($heroBulletHeading !== '' ? $heroBulletHeading : 'Key Highlights') ?></h3>
                                <div class="xp-bullets">
                                    <?php foreach ($heroBulletItems as $bullet): ?>
                                        <div class="xp-bullet xp-bullet--card">
                                            <span class="dot">✓</span>
                                            <span><strong><?= $e($bullet['title']) ?></strong><span><?= $e($bullet['description']) ?></span></span>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php else: ?>
                                <div class="xp-bullets">
                                    <div class="xp-bullet"><span class="dot">✓</span><span>100% Mobile &amp; Cross-Device Responsive</span></div>
                                    <div class="xp-bullet"><span class="dot">✓</span><span>SEO-Friendly Semantic Architecture</span></div>
                                    <div class="xp-bullet"><span class="dot">✓</span><span>Custom UI/UX Tailored to Your Brand</span></div>
                                    <div class="xp-bullet"><span class="dot">✓</span><span>Conversion-Focused Sales Funnel</span></div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php if ($showHeroActions): ?>
                            <div class="xp-actions">
                                <a href="/contact.php" class="xp-btn xp-btn--pink trigger-enquiry-modal" data-service="<?= $e($title) ?>"><span>Get Free Consultation</span><?= $ctaArrow ?></a>
                                <a href="tel:+919999674255" class="xp-btn xp-btn--ghost"><?= svcIcon('phone', 15) ?><span>Call: +91-9999674255</span></a>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Quote form as visitor badge (same IDs / handler) -->
                    <div class="xp-badge-wrap">
                        <div class="xp-lanyard"></div>
                        <div class="xp-badge">
                            <h3><?= svcIcon('rocket', 20) ?><span>Get a Custom Strategy &amp; Quote</span></h3>
                            <p class="xp-badge-lead">Share your goals to receive a tailored project scope and competitive pricing within 24 hours.</p>

                            <form id="mbServiceQuoteForm" onsubmit="handleMbQuoteSubmit(event, '<?= htmlspecialchars(addslashes($title)) ?>')">
                                <div class="xp-fld"><input type="text" name="name" placeholder="Your Name *" required></div>
                                <div class="xp-fld"><input type="tel" name="phone" placeholder="Phone Number *" required></div>
                                <div class="xp-fld"><input type="email" name="email" placeholder="Business Email *" required></div>
                                <div class="xp-fld">
                                    <select name="budget">
                                        <option value="" disabled selected>Estimated Project Budget</option>
                                        <option value="₹15,000 - ₹35,000">₹15,000 - ₹35,000 (Starter)</option>
                                        <option value="₹35,000 - ₹75,000">₹35,000 - ₹75,000 (Growth)</option>
                                        <option value="₹75,000 - ₹1,50,000">₹75,000 - ₹1,50,000 (Enterprise)</option>
                                        <option value="₹1,50,000+">₹1,50,000+ (Custom Scope)</option>
                                    </select>
                                </div>
                                <div class="xp-fld"><textarea name="message" placeholder="Briefly describe your requirements or goals..."></textarea></div>
                                <button type="submit" class="xp-btn xp-btn--pink xp-btn--block xp-submit" id="mbQuoteSubmitBtn"><span>Request Strategy &amp; Quote &rarr;</span></button>
                                <div id="mbQuoteFeedback" style="display:none; margin-top:12px; padding:10px 12px; border-radius:10px; font-size:.86rem; text-align:center; font-weight:700;"></div>
                            </form>

                            <div class="xp-pass">🔒 100% Privacy Protected &bull; Zero Spam &bull; Fast Response</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="xp-ribbon" aria-hidden="true">
                <div class="xp-ribbon-track">
                    <?php for ($i = 0; $i < 4; $i++): ?>
                        <span><b>1,000+</b> websites &amp; projects delivered</span><span><b>13+</b> years industry leadership</span><span><b>98%</b> client retention</span><span><b>25+</b> countries reached</span>
                    <?php endfor; ?>
                </div>
            </div>
        </section>

        <!-- 2. BRANDS (logo cards slider) -->
        <section class="xp-brands">
            <div class="xp-wrap">
                <div class="xp-head">
                    <span class="xp-kicker">Global industry credibility</span>
                    <h2>Top Event Brands Embracing <span class="xp-acc"><?= $e($title) ?></span></h2>
                    <i class="xp-bar"></i>
                    <p>Here are just a few of the organisers, global trade expos, and high-growth brands we've helped grow with our digital expertise.</p>
                </div>
                <div class="xp-lg">
                    <div class="swiper" id="mbBrandSwiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($brandLogos as $bi => $b): $imgPath = $b['logo'] ?? ''; ?>
                                <div class="swiper-slide">
                                    <div class="xp-lg-card xp-lg-card--<?= $bi % 3 ?>" title="<?= $e($b['name']) ?>">
                                        <?php if (!empty($imgPath)): ?>
                                            <img src="<?= $e($imgPath) ?>" alt="<?= $e($b['name']) ?>" loading="lazy">
                                        <?php else: ?>
                                            <div class="xp-mono"><?= $e(substr($b['name'], 0, 2)) ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="xp-lg-pag"></div>
                </div>
            </div>
        </section>

        <!-- 3. CORE SOLUTIONS -->
        <?php if (!empty($features)): ?>
        <section class="xp-sec xp-mist">
            <div class="xp-wrap">
                <div class="xp-head">
                    <span class="xp-kicker"><?= $e($featuresEyebrow) ?></span>
                    <h2><?= $accentHead($featuresTitleLead, $featuresTitleAccent, $featuresTitleTail, 'Expert <span class="xp-acc">' . $e($title) . '</span> for Every Business Need') ?></h2>
                    <i class="xp-bar"></i>
                    <p><?= $e($featuresSubtitle !== '' ? $featuresSubtitle : 'Explore our end-to-end capabilities engineered to enhance performance, establish brand credibility, and convert traffic into revenue.') ?></p>
                </div>
                <div class="xp-grid xp-g3">
                    <?php $iconsList = ['layout', 'code', 'search', 'smartphone', 'zap', 'shield'];
                    foreach ($features as $fIdx => $f): $curIcon = $iconsList[$fIdx % count($iconsList)]; ?>
                        <article class="xp-stall">
                            <span class="xp-ico"><?= svcIcon($curIcon, 24) ?></span>
                            <h3><?= $e($f['title']) ?></h3>
                            <p><?= $e($f['description']) ?></p>
                            <div class="xp-tags">
                                <div><?= svcIcon('check', 14) ?><span><?= $e($featureTagOne) ?></span></div>
                                <div><?= svcIcon('check', 14) ?><span><?= $e($featureTagTwo) ?></span></div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <!-- 4. WHY WEBTECMART -->
        <section class="xp-sec<?= !empty($features) ? '' : ' xp-mist' ?>">
            <div class="xp-wrap">
                <div class="xp-head">
                    <span class="xp-kicker">The WebTecMart advantage</span>
                    <h2><?= $accentHead($benefitsTitleLead, $benefitsTitleAccent, $benefitsTitleTail, 'Why Choose Our <span class="xp-acc">' . $e($title) . '</span> Services?') ?></h2>
                    <i class="xp-bar"></i>
                    <p><?= $e($benefitsSubtitle !== '' ? $benefitsSubtitle : "We don't build generic websites or run cookie-cutter campaigns. Here is how our strategic approach delivers tangible business impact.") ?></p>
                </div>
                <div class="xp-grid xp-g3">
                    <?php foreach ($benefits as $b): ?>
                        <article class="xp-stall">
                            <span class="xp-ico"><?= svcIcon($b['icon'] ?? 'target', 22) ?></span>
                            <h3><?= $e($b['title']) ?></h3>
                            <p><?= $e($b['desc']) ?></p>
                            <?php if (!empty($b['metric'])): ?>
                                <span class="xp-metric"><?= svcIcon('trending', 13) ?><span><?= $e($b['metric']) ?></span></span>
                            <?php endif; ?>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- 5. PACKAGES -->
        <?php if ($showPackages): ?>
        <section class="xp-sec xp-mist xp-scallop">
            <div class="xp-wrap">
                <div class="xp-head">
                    <span class="xp-kicker">Transparent packages</span>
                    <h2>All-in-One <span class="xp-acc"><?= $e($title) ?></span> Packages &amp; Pricing</h2>
                    <i class="xp-bar"></i>
                    <p>Choose the package tailored to your business scale — from emerging startups to high-volume enterprise platforms. Transparent deliverables with zero hidden costs.</p>
                </div>
                <div class="xp-grid xp-g3" style="align-items:stretch; padding-top:10px">
                    <?php foreach ($packages as $pkg): ?>
                        <article class="xp-pkg<?= !empty($pkg['popular']) ? ' popular' : '' ?>">
                            <?php if (!empty($pkg['popular'])): ?><div class="xp-pkg-badge">⭐ Most popular</div><?php endif; ?>
                            <h3><?= $e($pkg['name']) ?></h3>
                            <div class="xp-pkg-tag"><?= $e($pkg['tagline']) ?></div>
                            <div class="xp-pkg-price"><b><?= $e($pkg['price']) ?></b><span><?= $e($pkg['period']) ?></span></div>
                            <p class="xp-pkg-desc"><?= $e($pkg['desc']) ?></p>
                            <ul>
                                <?php foreach ($pkg['features'] as $feat): ?><li><span><?= $e($feat) ?></span></li><?php endforeach; ?>
                            </ul>
                            <a href="/contact.php" class="xp-btn xp-btn--pink xp-btn--block trigger-enquiry-modal" data-service="<?= $e($title . ' (' . $pkg['name'] . ')') ?>"><span><?= $e($pkg['cta'] ?? 'Get Started') ?></span><?= $ctaArrow ?></a>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <!-- 6. TECH STACK -->
        <?php if ($showTechnologies): ?>
        <section class="xp-sec">
            <div class="xp-wrap">
                <div class="xp-head">
                    <span class="xp-kicker">Modern tech stack</span>
                    <h2>Built With <span class="xp-acc">Cutting-Edge Technologies</span></h2>
                    <i class="xp-bar"></i>
                    <p>We leverage modern, secure, and battle-tested frameworks to ensure long-term stability and effortless maintenance.</p>
                </div>
                <div class="xp-pills">
                    <?php foreach ($technologies as $t): ?>
                        <div class="xp-pill"><i></i><span><?= $e($t['name']) ?></span><small>(<?= $e($t['cat']) ?>)</small></div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <!-- 7. PROCESS -->
        <?php if (!empty($process)): ?>
        <section class="xp-sec xp-mist xp-scallop">
            <div class="xp-wrap">
                <div class="xp-head">
                    <span class="xp-kicker"><?= $e($processEyebrow) ?></span>
                    <h2><?= $accentHead($processTitleLead, $processTitleAccent, $processTitleTail, 'Our Step-by-Step <span class="xp-acc">Working Process</span>') ?></h2>
                    <i class="xp-bar"></i>
                    <p><?= $e($processSubtitle !== '' ? $processSubtitle : 'A structured delivery roadmap ensuring on-time delivery, pixel-perfect design, and reliable performance.') ?></p>
                </div>
                <div class="xp-grid xp-g3">
                    <?php foreach ($process as $step): ?>
                        <article class="xp-step">
                            <span class="xp-step-n"><?= $e($step['step'] ?? '01') ?></span>
                            <h3><?= $e($step['title']) ?></h3>
                            <p><?= $e($step['description']) ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <!-- 8. CASE STUDY -->
        <?php if ($showCaseStudy): ?>
        <section class="xp-sec xp-dark">
            <div class="xp-wrap">
                <?php if ($caseStudyTitle !== ''): ?>
                    <div class="xp-head xp-head--dark">
                        <span class="xp-kicker"><?= $e($caseStudyBadge) ?></span>
                        <h2><?= $e($caseStudyTitle) ?></h2>
                        <i class="xp-bar"></i>
                    </div>
                <?php endif; ?>
                <div class="xp-case">
                    <div>
                        <span class="xp-case-org"><?= $e($caseStudyBadge) ?></span>
                        <h3><?= $e($caseStudy['client']) ?></h3>
                        <p><?= $e($caseStudy['desc']) ?></p>
                        <a href="/portfolio.php" class="xp-btn xp-btn--pink"><span>Explore Client Portfolio</span><?= svcIcon('arrow', 15) ?></a>
                    </div>
                    <div class="xp-stats">
                        <?php foreach ($caseStudy['metrics'] as $m): ?>
                            <div class="xp-stat"><b><?= $e($m['val']) ?></b><span><?= $e($m['lbl']) ?></span></div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php if (!empty($caseStudyScreenshots)): ?>
                    <div class="xp-shots">
                        <?php foreach ($caseStudyScreenshots as $screenshot): ?>
                            <figure class="xp-shot">
                                <img src="<?= $e($screenshot['src']) ?>" alt="<?= $e($screenshot['alt']) ?>" loading="lazy" decoding="async">
                                <figcaption><?= $e($screenshot['caption']) ?></figcaption>
                            </figure>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
        <?php endif; ?>

        <!-- 9. MARKETS -->
        <section class="xp-sec xp-mist">
            <div class="xp-wrap">
                <div class="xp-market-card">
                    <span class="xp-kicker">Global reach &bull; Local NCR presence</span>
                    <h3>Serving Clients Across Delhi NCR &amp; International Markets</h3>
                    <p>From Connaught Place to Cyber City, and international clients across the USA, UK, Canada, Australia, and UAE:</p>
                    <div class="xp-places">
                        <?php foreach ($microMarkets as $mm): ?><span class="xp-place">📍 <?= $e($mm) ?></span><?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- 10. FAQ -->
        <?php if (!empty($faqs)): ?>
        <section class="xp-sec">
            <div class="xp-wrap">
                <div class="xp-faq-grid">
                    <div class="xp-head">
                        <span class="xp-kicker">Common questions</span>
                        <h2>Frequently Asked <span class="xp-acc">Questions</span></h2>
                        <i class="xp-bar"></i>
                        <p>Clear answers to everything you need to know about our <?= $e($title) ?> workflows and delivery standards.</p>
                    </div>
                    <div>
                        <?php foreach ($faqs as $fIdx => $faq): ?>
                            <div class="mb-faq-item <?= $fIdx === 0 ? 'active' : '' ?>">
                                <button type="button" class="mb-faq-btn" onclick="mbToggleFaq(this)" aria-expanded="<?= $fIdx === 0 ? 'true' : 'false' ?>">
                                    <span><?= $e($faq['q'] ?? $faq['question'] ?? '') ?></span>
                                    <span class="mb-faq-btn-icon"><?= svcIcon('plus', 16) ?></span>
                                </button>
                                <div class="mb-faq-answer"><?= $e($faq['a'] ?? $faq['answer'] ?? '') ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <!-- 11. FINAL CTA -->
        <section class="xp-cta" id="xpCta">
            <div class="xp-wrap">
                <div class="xp-cta-card">
                    <div class="xp-cta-pill"><?= svcIcon('rocket', 15) ?><span>Ready to grow your business?</span></div>
                    <h2>Ready to Build a High-Performing <span class="xp-acc"><?= $e($title) ?>?</span></h2>
                    <p>Speak with our senior strategists today for a tailored, complimentary project consultation, competitive gap analysis, and transparent quotation.</p>
                    <div class="xp-actions">
                        <a href="/contact.php" class="xp-btn xp-btn--pink trigger-enquiry-modal" data-service="<?= $e($title) ?>"><span>Get Free Consultation</span><?= $ctaArrow ?></a>
                        <a href="tel:+919999674255" class="xp-btn xp-btn--ghost"><?= svcIcon('phone', 15) ?><span>Call: +91-9999674255</span></a>
                    </div>
                    <div class="xp-cta-foot"><?= svcIcon('shield', 14) ?><span>Free Strategy Consultation &bull; Zero Obligation &bull; Tailored Solutions</span></div>
                </div>
            </div>
        </section>

        <div class="xp-sticky" id="xpSticky">
            <a href="tel:+919999674255" class="xp-btn xp-btn--ghost"><?= svcIcon('phone', 15) ?><span>Call</span></a>
            <a href="/contact.php" class="xp-btn xp-btn--pink trigger-enquiry-modal" data-service="<?= $e($title) ?>"><span>Free consultation</span><?= $ctaArrow ?></a>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        function mbToggleFaq(btn) {
            const item = btn.closest('.mb-faq-item');
            if (!item) return;
            const isCurrentlyActive = item.classList.contains('active');
            const parent = item.parentElement;
            if (parent) {
                parent.querySelectorAll('.mb-faq-item').forEach(el => {
                    if (el !== item) {
                        el.classList.remove('active');
                        const b = el.querySelector('.mb-faq-btn');
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

        function handleMbQuoteSubmit(event, serviceName) {
            event.preventDefault();
            const form = event.target;
            const btn = document.getElementById('mbQuoteSubmitBtn');
            const feedback = document.getElementById('mbQuoteFeedback');
            if (!btn || !feedback) return;

            const originalBtnHtml = btn.innerHTML;
            btn.disabled = true;
            btn.innerHTML = '<span>Submitting...</span>';
            feedback.style.display = 'none';

            const formData = new FormData(form);
            formData.append('ajax', '1');
            formData.append('service', serviceName || 'Website Design & Development');

            fetch('/contact.php', {
                method: 'POST',
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                feedback.style.display = 'block';
                if (data.success) {
                    feedback.style.background = '#ECFDF5';
                    feedback.style.color = '#065F46';
                    feedback.style.border = '1px solid #A7F3D0';
                    feedback.textContent = data.message || 'Thank you! Your enquiry has been received. Our team will contact you shortly.';
                    form.reset();
                } else {
                    feedback.style.background = '#FEF2F2';
                    feedback.style.color = '#991B1B';
                    feedback.style.border = '1px solid #FECACA';
                    feedback.textContent = data.message || 'There was an issue submitting your request. Please call +91-9999674255.';
                }
            })
            .catch(() => {
                feedback.style.display = 'block';
                feedback.style.background = '#ECFDF5';
                feedback.style.color = '#065F46';
                feedback.style.border = '1px solid #A7F3D0';
                feedback.textContent = 'Thank you! Your quote request has been sent. We will get in touch with you shortly.';
                form.reset();
            })
            .finally(() => {
                btn.disabled = false;
                btn.innerHTML = originalBtnHtml;
            });
        }

        // Brand logos slider
        (function () {
            if (typeof Swiper === 'undefined' || !document.getElementById('mbBrandSwiper')) return;
            new Swiper('#mbBrandSwiper', {
                slidesPerView: 2, slidesPerGroup: 2, spaceBetween: 16, rewind: true, grabCursor: true,
                autoplay: { delay: 3200, disableOnInteraction: false, pauseOnMouseEnter: true },
                pagination: { el: '.xp-lg-pag', clickable: true },
                breakpoints: {
                    768: { slidesPerView: 3, slidesPerGroup: 3, spaceBetween: 22 },
                    992: { slidesPerView: 4, slidesPerGroup: 4, spaceBetween: 24 }
                }
            });
        })();

        // Mobile sticky CTA: appears after the hero, hides while the final CTA is on screen
        (function () {
            const sticky = document.getElementById('xpSticky'), hero = document.querySelector('.xp-hero'), cta = document.getElementById('xpCta');
            if (!sticky || !hero || !('IntersectionObserver' in window)) return;
            let heroOut = false, ctaIn = false;
            const upd = () => sticky.classList.toggle('on', heroOut && !ctaIn);
            new IntersectionObserver(e => { heroOut = !e[0].isIntersecting; upd(); }).observe(hero);
            if (cta) new IntersectionObserver(e => { ctaIn = e[0].isIntersecting; upd(); }, { threshold: 0.2 }).observe(cta);
        })();
    </script>
<?php
}