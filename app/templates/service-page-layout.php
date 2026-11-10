<?php
/**
 * WebTecMart — Premium Service Page Layout Engine
 * Inspired by industry-leading agency standards (Matebiz reference & WebTecMart design framework).
 * 
 * Comprehensive Architecture:
 * 1. Hero Section with Strategic Value Copy, Checkmarks, Dual CTAs & Matebiz-style Interactive Quote Form
 * 2. Growing Figures / Authority Metrics Counter Banner (1000+ Projects, 13+ Years, 98% Retention, 25+ Countries)
 * 3. Global Industry Credibility Marquee (Top Trade Fairs & Enterprise Brands)
 * 4. Core Solutions & Specialized Offerings Grid (6 Feature Cards with Deliverable Pills)
 * 5. Strategic Advantage / Why Choose WebTecMart (6 Value Pillars: UX, SEO, Speed, Security, Pricing, Support)
 * 6. All-in-One Service Packages & Pricing (Starter, Growth [Most Popular], Enterprise)
 * 7. Modern Technologies & Frameworks Stack
 * 8. 5-Stage Proven Working Process Roadmap
 * 9. Flagship Case Study Spotlight (Bharat Tex & IHGF Delhi Fair)
 * 10. Global Reach & Local NCR Expertise
 * 11. Accessible Interactive FAQ Accordion
 * 12. High-Impact Conversion CTA Banner
 */

function renderServicePageLayout(array $config): void
{
    $icon            = $config['icon'] ?? 'sparkles';
    $title           = $config['title'] ?? 'Website Design & Development';
    $tagline         = $config['tagline'] ?? 'SMART. SCALABLE. SECURE.';
    $heroDescription = $config['heroDescription'] ?? ($config['hero_description'] ?? '');
    $overview        = $config['overview'] ?? ($config['body'] ?? '');
    $features        = $config['features'] ?? [];
    $process         = $config['process'] ?? [];
    $faqs            = $config['faqs'] ?? [];
    $slug            = $config['slug'] ?? 'website-design-development';
    $category        = $config['category'] ?? 'Digital Solutions';

    // Domain-Specific Benefits / Why Choose Us
    $benefits = !empty($config['benefits']) ? $config['benefits'] : [
        [
            'icon' => 'layout',
            'title' => 'User Experience (UX) & Clean Navigation',
            'desc' => 'Intuitive layouts and clear information architecture designed to guide visitors effortlessly toward booking calls, making purchases, or submitting leads.',
            'metric' => '3.4x Higher Conversion Rate'
        ],
        [
            'icon' => 'search',
            'title' => 'Built-In SEO & Organic Search Readiness',
            'desc' => 'Engineered from day one with clean semantic HTML, schema structured data, indexable hierarchy, and keyword alignment to rank on Google faster.',
            'metric' => 'Top 3 Search Dominance'
        ],
        [
            'icon' => 'zap',
            'title' => 'Speed Optimization & 95+ PageSpeed',
            'desc' => 'Lightweight, bloat-free development optimized for sub-1.5 second loading times to reduce bounce rates and maximize Google Core Web Vitals scores.',
            'metric' => '< 1.5s Avg. Load Time'
        ],
        [
            'icon' => 'shield',
            'title' => 'Bank-Grade Security & Clean Code',
            'desc' => 'Strict security protocols, SSL encryption, sanitized inputs, and modular code architecture that keeps your business data safe from vulnerabilities.',
            'metric' => '99.99% Uptime Guarantee'
        ],
        [
            'icon' => 'target',
            'title' => 'Transparent Pricing with Zero Hidden Costs',
            'desc' => 'Clear, milestone-based packages with full intellectual property ownership, zero recurring template lock-ins, and transparent delivery scopes.',
            'metric' => '100% Scope Transparency'
        ],
        [
            'icon' => 'users',
            'title' => 'Dedicated In-House Specialists & Support',
            'desc' => 'Direct access to senior full-stack developers, UI/UX designers, and growth strategists with reliable post-launch maintenance and continuous support.',
            'metric' => '24/7 Dedicated Support'
        ]
    ];

    // Packages / Pricing Tiers (Matebiz Signature Feature)
    $packages = !empty($config['packages']) ? $config['packages'] : [
        [
            'name' => 'Starter Package',
            'tagline' => 'For Startups & Small Businesses',
            'price' => '₹18,500',
            'period' => 'One-Time',
            'popular' => false,
            'desc' => 'Essential high-impact foundation built to launch your business online with a polished, mobile-friendly design.',
            'features' => [
                'Up to 6 Custom Responsive Pages',
                '100% Mobile & Tablet Optimized',
                'Modern UI/UX Design (No Generic Themes)',
                'Contact Form & WhatsApp Chat Integration',
                'Basic On-Page SEO & Meta Tags Setup',
                'Fast Loading Speed Optimization',
                'Social Media & Google Maps Integration',
                '1 Month Free Post-Launch Support'
            ],
            'cta' => 'Choose Starter Plan'
        ],
        [
            'name' => 'Growth Package',
            'tagline' => 'Most Popular for Established Brands',
            'price' => '₹38,500',
            'period' => 'One-Time',
            'popular' => true,
            'desc' => 'Complete conversion-focused growth engine engineered to outrank competitors and generate qualified inquiries.',
            'features' => [
                'Up to 15 Bespoke Responsive Pages',
                'Full Custom UI/UX Architecture & Prototyping',
                'Dynamic CMS (WordPress, Custom PHP or Headless)',
                'Advanced Lead Funnel & Interactive Forms',
                'Comprehensive Technical & On-Page SEO',
                'Core Web Vitals Speed Tuning (<1.5s Load)',
                'Google Analytics 4 & Meta Pixel Tracking',
                'Blog / News / Case Studies CMS Engine',
                '3 Months Priority Support & Maintenance'
            ],
            'cta' => 'Choose Growth Plan'
        ],
        [
            'name' => 'Enterprise Package',
            'tagline' => 'For Scale, E-Commerce & Custom Portals',
            'price' => 'Custom Quote',
            'period' => 'Bespoke Scope',
            'popular' => false,
            'desc' => 'Full-scale enterprise architecture, custom e-commerce, or complex web applications built for high traffic.',
            'features' => [
                'Unlimited / Scalable Custom Pages',
                'Custom E-Commerce or Custom Web Application',
                'Secure Payment Gateway & Multi-Currency Setup',
                'Custom API Integrations & CRM Synchronization',
                'Enterprise Security Hardening & Penetration Check',
                'Dedicated Senior Tech Lead & Project Manager',
                'Automated Daily Backups & CDN Integration',
                'Continuous Conversion Rate Optimization (CRO)',
                '6 Months 24/7 Priority SLA Support'
            ],
            'cta' => 'Discuss Enterprise Scope'
        ]
    ];

    // Technologies Stack
    $technologies = !empty($config['technologies']) ? $config['technologies'] : [
        ['name' => 'PHP 8.x', 'cat' => 'Backend'],
        ['name' => 'WordPress & WooCommerce', 'cat' => 'CMS'],
        ['name' => 'Shopify', 'cat' => 'E-Commerce'],
        ['name' => 'React & Next.js', 'cat' => 'Frontend'],
        ['name' => 'Laravel', 'cat' => 'Framework'],
        ['name' => 'HTML5 & Modern CSS3', 'cat' => 'Standards'],
        ['name' => 'Tailwind & Bootstrap', 'cat' => 'UI Framework'],
        ['name' => 'MySQL & SQLite', 'cat' => 'Database'],
        ['name' => 'REST APIs & Webhooks', 'cat' => 'Integration'],
        ['name' => 'Google Cloud & AWS', 'cat' => 'Cloud Hosting']
    ];

    // Brand Marquee Logos
    $brandLogos = [
        ['name' => 'Informa Global', 'cat' => 'Trade Events'],
        ['name' => 'Bharat Tex Fair', 'cat' => 'Ministry of Textiles'],
        ['name' => 'IHGF Delhi Autumn Fair 2027', 'cat' => 'Global Sourcing Fair'],
        ['name' => 'Clarion Events', 'cat' => 'Exhibition Leader'],
        ['name' => 'London Tech Week', 'cat' => 'Tech Expo'],
        ['name' => 'Media 10', 'cat' => 'Design & Media'],
        ['name' => 'Northstar Travel Group', 'cat' => 'Travel Group'],
        ['name' => 'Premier Logistics', 'cat' => 'Industrial Logistics'],
        ['name' => 'Innovation Zero', 'cat' => 'CleanTech Congress'],
        ['name' => 'Stonex Jewellers', 'cat' => 'Luxury Retail'],
        ['name' => 'BMJ Future Health', 'cat' => 'Healthcare Publishing']
    ];

    // Default Case Study
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

    // Delhi NCR Micro-markets
    $microMarkets = [
        'Connaught Place (CP)', 'South Delhi & Saket', 'Gurgaon Cyber City', 
        'Noida Sector 62 & 18', 'Okhla Industrial Area', 'Nehru Place IT Hub', 
        'Dwarka Commercial Hub', 'Janakpuri & West Delhi', 'Netaji Subhash Place (NSP)', 
        'Faridabad', 'Ghaziabad'
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
    ?>

    <style>
        /* ============================================================
           MATEBIZ-INSPIRED PREMIER SERVICE PAGE STYLING (WebTecMart)
           Palette: Magenta #C4007A, Deep Charcoal #111827, Soft Pink #FFF5FA
           ============================================================ */
        .mb-page {
            width: 100%;
            background: #FFFFFF;
            color: #1F1B2A;
            overflow-x: hidden;
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
        }

        .mb-container {
            max-width: 1240px;
            margin: 0 auto;
            padding-left: 20px;
            padding-right: 20px;
            position: relative;
            z-index: 2;
        }

        /* Common Section Headings */
        .mb-section-header {
            text-align: center;
            max-width: 820px;
            margin: 0 auto 32px;
        }
        .mb-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: #FFF0F7;
            border: 1px solid rgba(196, 0, 122, 0.22);
            padding: 5px 14px;
            border-radius: 9999px;
            margin-bottom: 12px;
            color: #C4007A;
            font-size: 0.74rem;
            font-weight: 800;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }
        .mb-eyebrow svg {
            width: 13px;
            height: 13px;
            color: #C4007A;
            flex-shrink: 0;
        }
        .mb-section-title {
            font-size: clamp(1.9rem, 3.2vw, 2.65rem);
            font-weight: 850;
            color: #111827;
            margin: 0 0 10px;
            line-height: 1.15;
            letter-spacing: -0.03em;
        }
        .mb-section-title .accent {
            color: #C4007A;
            position: relative;
            display: inline-block;
        }
        .mb-section-title .accent svg {
            position: absolute;
            left: 0;
            bottom: -3px;
            width: 100%;
            height: 6px;
            pointer-events: none;
        }
        .mb-section-title::after {
            content: "";
            display: block;
            width: 44px;
            height: 3px;
            margin: 10px auto 0;
            border-radius: 999px;
            background: linear-gradient(90deg, #C4007A, #E0398F);
        }
        .mb-section-sub {
            font-size: 0.98rem;
            color: #4B5563;
            line-height: 1.6;
            max-width: 720px;
            margin: 0 auto;
        }

        /* Buttons */
        .mb-btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: linear-gradient(135deg, #C4007A 0%, #E0398F 100%);
            color: #FFFFFF !important;
            font-weight: 700;
            font-size: 0.94rem;
            padding: 13px 26px;
            border-radius: 9999px;
            text-decoration: none;
            box-shadow: 0 8px 22px rgba(196, 0, 122, 0.28);
            transition: all 0.25s ease;
            white-space: nowrap;
            border: none;
            cursor: pointer;
        }
        .mb-btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 28px rgba(196, 0, 122, 0.38);
            color: #FFFFFF !important;
        }
        .mb-btn-secondary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: #FFFFFF;
            border: 1.5px solid rgba(196, 0, 122, 0.24);
            color: #C4007A !important;
            font-weight: 700;
            font-size: 0.94rem;
            padding: 12px 22px;
            border-radius: 9999px;
            text-decoration: none;
            transition: all 0.25s ease;
            white-space: nowrap;
            cursor: pointer;
        }
        .mb-btn-secondary:hover {
            background: #FFF0F7;
            border-color: #C4007A;
            transform: translateY(-2px);
        }

        /* ========================================================
           1. HERO SECTION (2-COL WITH MATEBIZ QUOTE FORM)
           ======================================================== */
        .mb-hero {
            position: relative;
            padding: 40px 0 34px;
            background: linear-gradient(180deg, #FFF5FA 0%, #FFFFFF 100%);
            border-bottom: 1px solid rgba(196, 0, 122, 0.08);
        }
        .mb-hero-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 36px;
            align-items: center;
        }
        @media (min-width: 992px) {
            .mb-hero-grid {
                grid-template-columns: 1.12fr 0.88fr;
                gap: 44px;
            }
        }
        .mb-hero-title {
            font-size: clamp(2rem, 3.4vw, 2.9rem);
            font-weight: 850;
            color: #111827;
            line-height: 1.14;
            letter-spacing: -0.03em;
            margin: 0 0 14px;
        }
        .mb-hero-desc {
            font-size: 1.05rem;
            line-height: 1.62;
            color: #374151;
            margin: 0 0 18px;
        }
        .mb-hero-bullets {
            display: grid;
            grid-template-columns: 1fr;
            gap: 9px;
            margin: 0 0 22px;
        }
        @media (min-width: 600px) {
            .mb-hero-bullets {
                grid-template-columns: 1fr 1fr;
            }
        }
        .mb-bullet-item {
            display: flex;
            align-items: center;
            gap: 9px;
            font-size: 0.88rem;
            font-weight: 600;
            color: #1F2937;
        }
        .mb-bullet-item .dot {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #FFF0F7;
            border: 1px solid rgba(196, 0, 122, 0.25);
            color: #C4007A;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.72rem;
            font-weight: 800;
            flex-shrink: 0;
        }
        .mb-hero-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 22px;
        }

        /* Hero Quote Form Card (Matebiz Hallmark) */
        .mb-quote-card {
            background: #FFFFFF;
            border: 1.5px solid rgba(196, 0, 122, 0.18);
            border-radius: 20px;
            padding: 26px 24px;
            box-shadow: 0 16px 40px rgba(196, 0, 122, 0.09);
            position: relative;
        }
        .mb-quote-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 4px;
            background: linear-gradient(90deg, #C4007A, #E0398F);
            border-radius: 20px 20px 0 0;
        }
        .mb-quote-head h3 {
            font-size: 1.22rem;
            font-weight: 850;
            color: #111827;
            margin: 0 0 4px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .mb-quote-head p {
            font-size: 0.85rem;
            color: #6B7280;
            margin: 0 0 18px;
            line-height: 1.45;
        }
        .mb-form-group {
            margin-bottom: 11px;
        }
        .mb-form-group input,
        .mb-form-group select,
        .mb-form-group textarea {
            width: 100%;
            box-sizing: border-box;
            padding: 11px 14px;
            border-radius: 10px;
            border: 1px solid #E5E7EB;
            background: #FBFAFC;
            font-size: 0.88rem;
            color: #111827;
            font-family: inherit;
            outline: none;
            transition: all 0.2s ease;
        }
        .mb-form-group input:focus,
        .mb-form-group select:focus,
        .mb-form-group textarea:focus {
            border-color: #C4007A;
            background: #FFFFFF;
            box-shadow: 0 0 0 3px rgba(196, 0, 122, 0.1);
        }
        .mb-form-group textarea {
            min-height: 75px;
            resize: vertical;
        }
        .mb-form-trust {
            font-size: 0.76rem;
            color: #6B7280;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            margin-top: 10px;
        }

        /* ========================================================
           2. GROWING FIGURES / METRICS STRIP (Matebiz Signature)
           ======================================================== */
        .mb-figures-strip {
            background: linear-gradient(135deg, #111827 0%, #1F1B2A 100%);
            color: #FFFFFF;
            padding: 30px 0;
            position: relative;
            border-top: 1px solid rgba(196, 0, 122, 0.3);
            border-bottom: 1px solid rgba(196, 0, 122, 0.3);
        }
        .mb-figures-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            text-align: center;
        }
        @media (min-width: 900px) {
            .mb-figures-grid {
                grid-template-columns: repeat(4, 1fr);
                gap: 28px;
            }
        }
        .mb-fig-card {
            padding: 12px 14px;
            border-right: 1px solid rgba(255, 255, 255, 0.1);
        }
        .mb-fig-card:last-child {
            border-right: none;
        }
        @media (max-width: 899px) {
            .mb-fig-card:nth-child(2) {
                border-right: none;
            }
        }
        .mb-fig-val {
            font-size: clamp(2rem, 3.2vw, 2.7rem);
            font-weight: 850;
            color: #FFFFFF;
            line-height: 1;
            margin-bottom: 6px;
            background: linear-gradient(135deg, #FFFFFF 0%, #FFB6D9 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .mb-fig-lbl {
            font-size: 0.82rem;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.8);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        /* ========================================================
           3. BRAND LOGOS MARQUEE (Global Industry Credibility)
           ======================================================== */
        .mb-brands-section {
            padding: 24px 0 28px;
            background: #FFFFFF;
            border-bottom: 1px solid rgba(196, 0, 122, 0.08);
            overflow: hidden;
        }
        .mb-marquee-wrap {
            overflow: hidden;
            position: relative;
            padding: 10px 0;
        }
        .mb-marquee-wrap::before,
        .mb-marquee-wrap::after {
            content: '';
            position: absolute;
            top: 0; bottom: 0;
            width: 70px;
            z-index: 2;
            pointer-events: none;
        }
        .mb-marquee-wrap::before {
            left: 0;
            background: linear-gradient(90deg, #FFFFFF 0%, rgba(255,255,255,0) 100%);
        }
        .mb-marquee-wrap::after {
            right: 0;
            background: linear-gradient(270deg, #FFFFFF 0%, rgba(255,255,255,0) 100%);
        }
        .mb-marquee-track {
            display: flex;
            gap: 16px;
            width: max-content;
            animation: mbMarqueeScroll 35s linear infinite;
        }
        .mb-marquee-wrap:hover .mb-marquee-track {
            animation-play-state: paused;
        }
        @keyframes mbMarqueeScroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .mb-brand-pill {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 8px 16px;
            background: #FFF8FC;
            border: 1px solid rgba(196, 0, 122, 0.18);
            border-radius: 9999px;
            white-space: nowrap;
        }
        .mb-brand-pill .b-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #C4007A;
        }
        .mb-brand-pill .b-name {
            font-size: 0.86rem;
            font-weight: 800;
            color: #111827;
        }
        .mb-brand-pill .b-cat {
            font-size: 0.72rem;
            font-weight: 700;
            color: #C4007A;
            text-transform: uppercase;
        }

        /* ========================================================
           4. CORE SOLUTIONS GRID (6 Distinct Feature Cards)
           ======================================================== */
        .mb-solutions-section {
            padding: 42px 0 46px;
            background: linear-gradient(180deg, #FFFFFF 0%, #FFF5FA 100%);
        }
        .mb-solutions-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }
        @media (min-width: 640px) {
            .mb-solutions-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        @media (min-width: 992px) {
            .mb-solutions-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 24px;
            }
        }
        .mb-solution-card {
            background: #FFFFFF;
            border: 1.5px solid rgba(196, 0, 122, 0.14);
            border-radius: 18px;
            padding: 24px;
            box-shadow: 0 4px 18px rgba(196, 0, 122, 0.04);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            display: flex;
            flex-direction: column;
        }
        .mb-solution-card:hover {
            transform: translateY(-4px);
            border-color: #C4007A;
            box-shadow: 0 12px 30px rgba(196, 0, 122, 0.14);
        }
        .mb-sol-icon-box {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            background: #FFF0F7;
            border: 1px solid rgba(196, 0, 122, 0.18);
            color: #C4007A;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 14px;
        }
        .mb-sol-title {
            font-size: 1.15rem;
            font-weight: 800;
            color: #111827;
            margin: 0 0 8px;
        }
        .mb-sol-desc {
            font-size: 0.88rem;
            line-height: 1.55;
            color: #4B5563;
            margin: 0 0 16px;
            flex: 1;
        }
        .mb-sol-tags {
            display: flex;
            flex-direction: column;
            gap: 6px;
            margin-top: auto;
            padding-top: 14px;
            border-top: 1px solid rgba(196, 0, 122, 0.1);
        }
        .mb-sol-tag {
            font-size: 0.78rem;
            font-weight: 600;
            color: #374151;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .mb-sol-tag svg {
            width: 14px;
            height: 14px;
            color: #059669;
            flex-shrink: 0;
        }

        /* ========================================================
           5. WHY CHOOSE WEBTECMART (6 Advantage Pillars)
           ======================================================== */
        .mb-why-section {
            padding: 42px 0 46px;
            background: #FFFFFF;
        }
        .mb-why-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 18px;
        }
        @media (min-width: 640px) {
            .mb-why-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        @media (min-width: 992px) {
            .mb-why-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 22px;
            }
        }
        .mb-why-card {
            background: #FFFFFF;
            border: 1.5px solid rgba(196, 0, 122, 0.14);
            border-radius: 16px;
            padding: 22px;
            transition: all 0.3s ease;
        }
        .mb-why-card:hover {
            transform: translateY(-3px);
            border-color: #C4007A;
            box-shadow: 0 10px 24px rgba(196, 0, 122, 0.1);
        }
        .mb-why-head {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 10px;
        }
        .mb-why-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: #FFF0F7;
            color: #C4007A;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .mb-why-title {
            font-size: 1rem;
            font-weight: 800;
            color: #111827;
            margin: 0;
        }
        .mb-why-desc {
            font-size: 0.86rem;
            line-height: 1.55;
            color: #4B5563;
            margin: 0 0 12px;
        }
        .mb-why-metric {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 10px;
            background: #ECFDF5;
            color: #059669;
            border-radius: 999px;
            font-size: 0.74rem;
            font-weight: 700;
        }

        /* ========================================================
           6. ALL-IN-ONE PACKAGES & PRICING (Matebiz Signature)
           ======================================================== */
        .mb-packages-section {
            padding: 44px 0 50px;
            background: linear-gradient(180deg, #FFF5FA 0%, #FFFFFF 100%);
            border-top: 1px solid rgba(196, 0, 122, 0.08);
            border-bottom: 1px solid rgba(196, 0, 122, 0.08);
        }
        .mb-packages-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 24px;
            align-items: stretch;
        }
        @media (min-width: 992px) {
            .mb-packages-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 28px;
            }
        }
        .mb-pkg-card {
            background: #FFFFFF;
            border: 1.5px solid rgba(196, 0, 122, 0.16);
            border-radius: 22px;
            padding: 30px 24px;
            position: relative;
            display: flex;
            flex-direction: column;
            box-shadow: 0 6px 20px rgba(196, 0, 122, 0.04);
            transition: all 0.3s ease;
        }
        .mb-pkg-card:hover {
            transform: translateY(-5px);
            border-color: #C4007A;
            box-shadow: 0 16px 36px rgba(196, 0, 122, 0.14);
        }
        .mb-pkg-card.popular {
            border: 2.5px solid #C4007A;
            box-shadow: 0 12px 36px rgba(196, 0, 122, 0.16);
            background: #FFFFFF;
        }
        .mb-pkg-badge-popular {
            position: absolute;
            top: -14px;
            left: 50%;
            transform: translateX(-50%);
            background: linear-gradient(135deg, #C4007A 0%, #E0398F 100%);
            color: #FFFFFF;
            font-size: 0.72rem;
            font-weight: 800;
            padding: 4px 16px;
            border-radius: 9999px;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            box-shadow: 0 4px 14px rgba(196, 0, 122, 0.35);
        }
        .mb-pkg-name {
            font-size: 1.3rem;
            font-weight: 850;
            color: #111827;
            margin: 0 0 4px;
        }
        .mb-pkg-tagline {
            font-size: 0.8rem;
            font-weight: 700;
            color: #C4007A;
            margin: 0 0 14px;
        }
        .mb-pkg-price-box {
            margin: 0 0 14px;
            padding-bottom: 14px;
            border-bottom: 1px solid rgba(196, 0, 122, 0.12);
        }
        .mb-pkg-price {
            font-size: 2.1rem;
            font-weight: 850;
            color: #111827;
            line-height: 1;
        }
        .mb-pkg-period {
            font-size: 0.82rem;
            color: #6B7280;
            font-weight: 600;
        }
        .mb-pkg-desc {
            font-size: 0.85rem;
            color: #4B5563;
            line-height: 1.5;
            margin: 0 0 18px;
        }
        .mb-pkg-features {
            list-style: none;
            padding: 0;
            margin: 0 0 24px;
            display: flex;
            flex-direction: column;
            gap: 9px;
            flex: 1;
        }
        .mb-pkg-features li {
            font-size: 0.84rem;
            color: #1F2937;
            font-weight: 600;
            display: flex;
            align-items: flex-start;
            gap: 8px;
            line-height: 1.4;
        }
        .mb-pkg-features li svg {
            width: 15px;
            height: 15px;
            color: #C4007A;
            flex-shrink: 0;
            margin-top: 2px;
        }

        /* ========================================================
           7. MODERN TECHNOLOGIES STACK
           ======================================================== */
        .mb-tech-section {
            padding: 36px 0 40px;
            background: #FFFFFF;
            text-align: center;
        }
        .mb-tech-pills {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            justify-content: center;
            max-width: 900px;
            margin: 0 auto;
        }
        .mb-tech-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            border-radius: 9999px;
            background: #FFF8FC;
            border: 1px solid rgba(196, 0, 122, 0.2);
            color: #111827;
            font-size: 0.86rem;
            font-weight: 700;
            transition: all 0.2s ease;
        }
        .mb-tech-pill:hover {
            background: #FFF0F7;
            border-color: #C4007A;
            color: #C4007A;
            transform: translateY(-2px);
        }
        .mb-tech-pill .dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #C4007A;
        }

        /* ========================================================
           8. WORKING PROCESS ROADMAP (5-Step Pipeline)
           ======================================================== */
        .mb-process-section {
            padding: 42px 0 46px;
            background: linear-gradient(180deg, #FFFFFF 0%, #FFF5FA 100%);
        }
        .mb-process-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 18px;
        }
        @media (min-width: 640px) {
            .mb-process-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        @media (min-width: 992px) {
            .mb-process-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 22px;
            }
        }
        .mb-process-card {
            background: #FFFFFF;
            border: 1.5px solid rgba(196, 0, 122, 0.14);
            border-radius: 18px;
            padding: 24px;
            position: relative;
            box-shadow: 0 4px 16px rgba(196, 0, 122, 0.04);
            transition: all 0.3s ease;
        }
        .mb-process-card:hover {
            transform: translateY(-3px);
            border-color: #C4007A;
            box-shadow: 0 10px 24px rgba(196, 0, 122, 0.12);
        }
        .mb-proc-num {
            font-size: 1.8rem;
            font-weight: 900;
            color: rgba(196, 0, 122, 0.22);
            line-height: 1;
            margin-bottom: 8px;
        }
        .mb-proc-title {
            font-size: 1.08rem;
            font-weight: 800;
            color: #111827;
            margin: 0 0 6px;
        }
        .mb-proc-desc {
            font-size: 0.86rem;
            line-height: 1.55;
            color: #4B5563;
            margin: 0;
        }

        /* ========================================================
           9. VERIFIED CASE STUDY SPOTLIGHT
           ======================================================== */
        .mb-casestudy-section {
            padding: 40px 0 44px;
            background: #FFFFFF;
        }
        .mb-casestudy-card {
            background: linear-gradient(135deg, #111827 0%, #1F1B2A 100%);
            border-radius: 22px;
            padding: 34px 30px;
            color: #FFFFFF;
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.16);
            border: 1.5px solid rgba(196, 0, 122, 0.35);
        }
        .mb-cs-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 28px;
            align-items: center;
        }
        @media (min-width: 992px) {
            .mb-cs-grid {
                grid-template-columns: 1.15fr 0.85fr;
                gap: 40px;
            }
        }
        .mb-cs-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(196, 0, 122, 0.25);
            border: 1px solid rgba(255, 45, 117, 0.5);
            color: #FFB6D9;
            font-size: 0.74rem;
            font-weight: 800;
            padding: 4px 12px;
            border-radius: 9999px;
            margin-bottom: 12px;
            text-transform: uppercase;
        }
        .mb-cs-title {
            font-size: clamp(1.4rem, 2.4vw, 1.9rem);
            font-weight: 850;
            color: #FFFFFF;
            margin: 0 0 10px;
            line-height: 1.22;
        }
        .mb-cs-desc {
            font-size: 0.94rem;
            line-height: 1.6;
            color: rgba(255, 255, 255, 0.85);
            margin: 0 0 20px;
        }
        .mb-cs-metrics {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 14px;
        }
        .mb-cs-metric-box {
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 14px;
            padding: 14px 16px;
            text-align: center;
        }
        .mb-cs-metric-val {
            font-size: 1.7rem;
            font-weight: 850;
            color: #FF5A96;
            line-height: 1;
            margin-bottom: 4px;
        }
        .mb-cs-metric-lbl {
            font-size: 0.76rem;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.8);
            text-transform: uppercase;
        }

        /* ========================================================
           10. MICRO-MARKETS & GLOBAL REACH (Matebiz Hallmark)
           ======================================================== */
        .mb-markets-section {
            padding: 34px 0 38px;
            background: #FFF8FC;
            text-align: center;
            border-top: 1px solid rgba(196, 0, 122, 0.1);
        }
        .mb-market-pills {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 10px;
            max-width: 980px;
            margin: 14px auto 0;
        }
        .mb-market-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 14px;
            border-radius: 9999px;
            border: 1px solid rgba(196, 0, 122, 0.25);
            background: #FFFFFF;
            color: #111827;
            font-size: 0.82rem;
            font-weight: 700;
        }
        .mb-market-pill::before {
            content: "•";
            color: #C4007A;
            font-size: 1rem;
        }

        /* ========================================================
           11. INTERACTIVE FAQ ACCORDION
           ======================================================== */
        .mb-faq-section {
            padding: 42px 0 48px;
            background: #FFFFFF;
        }
        .mb-faq-wrap {
            max-width: 860px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
        .mb-faq-item {
            border: 1.5px solid rgba(196, 0, 122, 0.14);
            border-radius: 14px;
            background: #FFFFFF;
            overflow: hidden;
            transition: all 0.25s ease;
        }
        .mb-faq-item:hover,
        .mb-faq-item.active {
            border-color: #C4007A;
            box-shadow: 0 4px 16px rgba(196, 0, 122, 0.08);
        }
        .mb-faq-btn {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            padding: 16px 20px;
            background: transparent;
            border: none;
            text-align: left;
            font-size: 0.98rem;
            font-weight: 800;
            color: #111827;
            cursor: pointer;
            font-family: inherit;
        }
        .mb-faq-btn-icon {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: #FFF0F7;
            color: #C4007A;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: transform 0.25s ease;
        }
        .mb-faq-item.active .mb-faq-btn-icon {
            transform: rotate(45deg);
            background: #C4007A;
            color: #FFFFFF;
        }
        .mb-faq-answer {
            display: none;
            padding: 0 20px 18px;
            font-size: 0.9rem;
            line-height: 1.6;
            color: #4B5563;
        }
        .mb-faq-item.active .mb-faq-answer {
            display: block;
        }

        /* ========================================================
           12. CONVERSION CTA BANNER
           ======================================================== */
        .mb-cta-section {
            padding: 38px 0 46px;
            background: #FFFFFF;
        }
        .mb-cta-box {
            background: linear-gradient(135deg, #111827 0%, #1F1B2A 100%);
            border-radius: 24px;
            padding: 44px 32px;
            text-align: center;
            color: #FFFFFF;
            position: relative;
            overflow: hidden;
            border: 2px solid rgba(196, 0, 122, 0.35);
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.16);
        }
        .mb-cta-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(196, 0, 122, 0.25);
            border: 1px solid rgba(255, 45, 117, 0.5);
            color: #FFB6D9;
            font-size: 0.74rem;
            font-weight: 800;
            padding: 4px 14px;
            border-radius: 9999px;
            margin-bottom: 12px;
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }
        .mb-cta-box h2 {
            font-size: clamp(1.8rem, 3.2vw, 2.6rem);
            font-weight: 850;
            color: #FFFFFF;
            margin: 0 0 12px;
            line-height: 1.2;
        }
        .mb-cta-box h2 span {
            color: #FF5A96;
        }
        .mb-cta-box p {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.85);
            max-width: 680px;
            margin: 0 auto 24px;
            line-height: 1.6;
        }
        .mb-cta-btns {
            display: flex;
            justify-content: center;
            gap: 14px;
            flex-wrap: wrap;
        }

        @media (max-width: 520px) {
            .mb-cta-btns {
                flex-direction: column;
                align-items: stretch;
            }
            .mb-cta-btns a {
                width: 100%;
                text-align: center;
            }
        }
    </style>

    <main class="mb-page">

        <!-- ========================================================
             1. HERO SECTION (2-COL WITH MATEBIZ QUOTE FORM)
        ======================================================== -->
        <section class="mb-hero">
            <div class="mb-container">
                <div class="mb-hero-grid">

                    <!-- Left: Hero Headline, Description & CTAs -->
                    <div class="mb-hero-left">
                        <div class="mb-eyebrow">
                            <?= svcIcon('sparkles') ?>
                            <span><?= htmlspecialchars($tagline !== '' ? $tagline : 'SMART. SCALABLE. SECURE.') ?></span>
                        </div>

                        <?php
                        $rawTitle = trim((string) $title);
                        $titleWords = preg_split('/\s+/', $rawTitle);
                        if (count($titleWords) > 1) {
                            $lastWord = array_pop($titleWords);
                            $firstPart = implode(' ', $titleWords);
                            $heroHeadingHtml = htmlspecialchars($firstPart) . ' <span class="accent">' . htmlspecialchars($lastWord) . '<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>';
                        } else {
                            $heroHeadingHtml = '<span class="accent">' . htmlspecialchars($rawTitle) . '<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>';
                        }
                        ?>
                        <h1 class="mb-hero-title">
                            <?= $heroHeadingHtml ?>
                        </h1>

                        <p class="mb-hero-desc">
                            <?= htmlspecialchars($heroDescription !== '' ? $heroDescription : $overview) ?>
                        </p>

                        <!-- Key Highlights Checklist -->
                        <div class="mb-hero-bullets">
                            <div class="mb-bullet-item">
                                <span class="dot">✓</span>
                                <span>100% Mobile & Cross-Device Responsive</span>
                            </div>
                            <div class="mb-bullet-item">
                                <span class="dot">✓</span>
                                <span>SEO-Friendly Semantic Architecture</span>
                            </div>
                            <div class="mb-bullet-item">
                                <span class="dot">✓</span>
                                <span>Custom UI/UX Tailored to Your Brand</span>
                            </div>
                            <div class="mb-bullet-item">
                                <span class="dot">✓</span>
                                <span>Conversion-Focused Sales Funnel</span>
                            </div>
                        </div>

                        <div class="mb-hero-actions">
                            <a href="/contact.php" class="mb-btn-primary trigger-enquiry-modal" data-service="<?= htmlspecialchars($title) ?>">
                                <span>Get Free Consultation</span>
                                <?= svcIcon('arrow', 16) ?>
                            </a>
                            <a href="tel:+919999674255" class="mb-btn-secondary">
                                <?= svcIcon('phone', 15) ?>
                                <span>Call: +91-9999674255</span>
                            </a>
                        </div>
                    </div>

                    <!-- Right: Matebiz-Style Interactive Quote Form -->
                    <div class="mb-hero-right">
                        <div class="mb-quote-card">
                            <div class="mb-quote-head">
                                <h3>
                                    <?= svcIcon('rocket', 20) ?>
                                    <span>Get a Custom Strategy &amp; Quote</span>
                                </h3>
                                <p>Share your goals to receive a tailored project scope and competitive pricing within 24 hours.</p>
                            </div>

                            <form id="mbServiceQuoteForm" onsubmit="handleMbQuoteSubmit(event, '<?= htmlspecialchars(addslashes($title)) ?>')">
                                <div class="mb-form-group">
                                    <input type="text" name="name" placeholder="Your Name *" required>
                                </div>
                                <div class="mb-form-group">
                                    <input type="tel" name="phone" placeholder="Phone Number *" required>
                                </div>
                                <div class="mb-form-group">
                                    <input type="email" name="email" placeholder="Business Email *" required>
                                </div>
                                <div class="mb-form-group">
                                    <select name="budget">
                                        <option value="" disabled selected>Estimated Project Budget</option>
                                        <option value="₹15,000 - ₹35,000">₹15,000 - ₹35,000 (Starter)</option>
                                        <option value="₹35,000 - ₹75,000">₹35,000 - ₹75,000 (Growth)</option>
                                        <option value="₹75,000 - ₹1,50,000">₹75,000 - ₹1,50,000 (Enterprise)</option>
                                        <option value="₹1,50,000+">₹1,50,000+ (Custom Scope)</option>
                                    </select>
                                </div>
                                <div class="mb-form-group">
                                    <textarea name="message" placeholder="Briefly describe your requirements or goals..."></textarea>
                                </div>
                                <button type="submit" class="mb-btn-primary" id="mbQuoteSubmitBtn" style="width: 100%; font-size: 0.96rem; padding: 13px;">
                                    <span>Request Strategy &amp; Quote &rarr;</span>
                                </button>
                                <div id="mbQuoteFeedback" style="display: none; margin-top: 10px; padding: 8px 12px; border-radius: 8px; font-size: 0.84rem; text-align: center; font-weight: 700;"></div>
                            </form>

                            <div class="mb-form-trust">
                                <span>🔒 100% Privacy Protected &bull; Zero Spam &bull; Fast Response</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- ========================================================
             2. GROWING FIGURES / METRICS STRIP (Matebiz Signature)
        ======================================================== -->
        <section class="mb-figures-strip">
            <div class="mb-container">
                <div class="mb-figures-grid">
                    <div class="mb-fig-card">
                        <div class="mb-fig-val">1,000+</div>
                        <div class="mb-fig-lbl">Websites &amp; Projects Delivered</div>
                    </div>
                    <div class="mb-fig-card">
                        <div class="mb-fig-val">13+</div>
                        <div class="mb-fig-lbl">Years Industry Leadership</div>
                    </div>
                    <div class="mb-fig-card">
                        <div class="mb-fig-val">98%</div>
                        <div class="mb-fig-lbl">Client Retention Rate</div>
                    </div>
                    <div class="mb-fig-card">
                        <div class="mb-fig-val">25+</div>
                        <div class="mb-fig-lbl">Countries Reached Globally</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========================================================
             3. BRAND LOGOS MARQUEE (Global Industry Credibility)
        ======================================================== -->
        <section class="mb-brands-section">
            <div class="mb-container">
                <div style="text-align: center; margin-bottom: 12px;">
                    <span style="font-size: 0.74rem; font-weight: 800; color: #C4007A; letter-spacing: 0.08em; text-transform: uppercase;">
                        TRUSTED BY INDUSTRY LEADERS &bull; GLOBAL TRADE EXPOS &bull; HIGH-GROWTH BRANDS
                    </span>
                </div>
                <div class="mb-marquee-wrap" tabindex="0">
                    <div class="mb-marquee-track">
                        <?php 
                        $duplicatedLogos = array_merge($brandLogos, $brandLogos);
                        foreach ($duplicatedLogos as $b): 
                        ?>
                            <div class="mb-brand-pill">
                                <span class="b-dot"></span>
                                <span class="b-name"><?= htmlspecialchars($b['name']) ?></span>
                                <span class="b-cat"><?= htmlspecialchars($b['cat']) ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========================================================
             4. CORE SOLUTIONS GRID (6 Distinct Feature Cards)
        ======================================================== -->
        <?php if (!empty($features)): ?>
        <section class="mb-solutions-section">
            <div class="mb-container">
                <div class="mb-section-header">
                    <div class="mb-eyebrow">
                        <?= svcIcon('sparkles') ?>
                        <span>SPECIALIZED SOLUTIONS</span>
                    </div>
                    <h2 class="mb-section-title">
                        Expert <span class="accent"><?= htmlspecialchars($title) ?><svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span> for Every Business Need
                    </h2>
                    <p class="mb-section-sub">
                        Explore our end-to-end capabilities engineered to enhance performance, establish brand credibility, and convert traffic into revenue.
                    </p>
                </div>

                <div class="mb-solutions-grid">
                    <?php 
                    $iconsList = ['layout', 'code', 'search', 'smartphone', 'zap', 'shield'];
                    foreach ($features as $fIdx => $f): 
                        $curIcon = $iconsList[$fIdx % count($iconsList)];
                    ?>
                        <div class="mb-solution-card">
                            <div class="mb-sol-icon-box">
                                <?= svcIcon($curIcon, 24) ?>
                            </div>
                            <h3 class="mb-sol-title"><?= htmlspecialchars($f['title']) ?></h3>
                            <p class="mb-sol-desc"><?= htmlspecialchars($f['description']) ?></p>
                            <div class="mb-sol-tags">
                                <div class="mb-sol-tag">
                                    <?= svcIcon('check', 14) ?>
                                    <span>Bespoke custom architecture</span>
                                </div>
                                <div class="mb-sol-tag">
                                    <?= svcIcon('check', 14) ?>
                                    <span>Full mobile &amp; SEO alignment</span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <!-- ========================================================
             5. WHY CHOOSE WEBTECMART (6 Advantage Pillars)
        ======================================================== -->
        <section class="mb-why-section">
            <div class="mb-container">
                <div class="mb-section-header">
                    <div class="mb-eyebrow">
                        <?= svcIcon('sparkles') ?>
                        <span>THE WEBTECMART ADVANTAGE</span>
                    </div>
                    <h2 class="mb-section-title">
                        Why Choose Our <span class="accent"><?= htmlspecialchars($title) ?><svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span> Services?
                    </h2>
                    <p class="mb-section-sub">
                        We don't build generic websites or run cookie-cutter campaigns. Here is how our strategic approach delivers tangible business impact.
                    </p>
                </div>

                <div class="mb-why-grid">
                    <?php foreach ($benefits as $b): ?>
                        <div class="mb-why-card">
                            <div class="mb-why-head">
                                <div class="mb-why-icon">
                                    <?= svcIcon($b['icon'] ?? 'target', 20) ?>
                                </div>
                                <h3 class="mb-why-title"><?= htmlspecialchars($b['title']) ?></h3>
                            </div>
                            <p class="mb-why-desc"><?= htmlspecialchars($b['desc']) ?></p>
                            <?php if (!empty($b['metric'])): ?>
                                <span class="mb-why-metric">
                                    <?= svcIcon('trending', 13) ?>
                                    <span><?= htmlspecialchars($b['metric']) ?></span>
                                </span>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- ========================================================
             6. ALL-IN-ONE PACKAGES & PRICING (Matebiz Signature)
        ======================================================== -->
        <section class="mb-packages-section">
            <div class="mb-container">
                <div class="mb-section-header">
                    <div class="mb-eyebrow">
                        <?= svcIcon('sparkles') ?>
                        <span>TRANSPARENT PACKAGES</span>
                    </div>
                    <h2 class="mb-section-title">
                        All-in-One <span class="accent"><?= htmlspecialchars($title) ?><svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span> Packages &amp; Pricing
                    </h2>
                    <p class="mb-section-sub">
                        Choose the package tailored to your business scale — from emerging startups to high-volume enterprise platforms. Transparent deliverables with zero hidden costs.
                    </p>
                </div>

                <div class="mb-packages-grid">
                    <?php foreach ($packages as $pkg): ?>
                        <div class="mb-pkg-card <?= !empty($pkg['popular']) ? 'popular' : '' ?>">
                            <?php if (!empty($pkg['popular'])): ?>
                                <div class="mb-pkg-badge-popular">⭐ MOST POPULAR</div>
                            <?php endif; ?>

                            <h3 class="mb-pkg-name"><?= htmlspecialchars($pkg['name']) ?></h3>
                            <div class="mb-pkg-tagline"><?= htmlspecialchars($pkg['tagline']) ?></div>

                            <div class="mb-pkg-price-box">
                                <div class="mb-pkg-price"><?= htmlspecialchars($pkg['price']) ?></div>
                                <div class="mb-pkg-period"><?= htmlspecialchars($pkg['period']) ?></div>
                            </div>

                            <p class="mb-pkg-desc"><?= htmlspecialchars($pkg['desc']) ?></p>

                            <ul class="mb-pkg-features">
                                <?php foreach ($pkg['features'] as $feat): ?>
                                    <li>
                                        <?= svcIcon('check', 15) ?>
                                        <span><?= htmlspecialchars($feat) ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>

                            <a href="/contact.php" class="mb-btn-primary trigger-enquiry-modal" data-service="<?= htmlspecialchars($title . ' (' . $pkg['name'] . ')') ?>" style="width: 100%; text-align: center;">
                                <span><?= htmlspecialchars($pkg['cta'] ?? 'Get Started') ?></span>
                                <?= svcIcon('arrow', 16) ?>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- ========================================================
             7. MODERN TECHNOLOGIES STACK
        ======================================================== -->
        <section class="mb-tech-section">
            <div class="mb-container">
                <div class="mb-section-header">
                    <div class="mb-eyebrow">
                        <?= svcIcon('code') ?>
                        <span>MODERN TECH STACK</span>
                    </div>
                    <h2 class="mb-section-title">
                        Built With <span class="accent">Cutting-Edge Technologies<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                    </h2>
                    <p class="mb-section-sub">
                        We leverage modern, secure, and battle-tested frameworks to ensure long-term stability and effortless maintenance.
                    </p>
                </div>

                <div class="mb-tech-pills">
                    <?php foreach ($technologies as $t): ?>
                        <div class="mb-tech-pill">
                            <span class="dot"></span>
                            <span><?= htmlspecialchars($t['name']) ?></span>
                            <span style="font-size: 0.72rem; color: #C4007A; text-transform: uppercase;">(<?= htmlspecialchars($t['cat']) ?>)</span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- ========================================================
             8. WORKING PROCESS ROADMAP (5-Step Pipeline)
        ======================================================== -->
        <?php if (!empty($process)): ?>
        <section class="mb-process-section">
            <div class="mb-container">
                <div class="mb-section-header">
                    <div class="mb-eyebrow">
                        <?= svcIcon('sparkles') ?>
                        <span>EXECUTION PIPELINE</span>
                    </div>
                    <h2 class="mb-section-title">
                        Our Step-by-Step <span class="accent">Working Process<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                    </h2>
                    <p class="mb-section-sub">
                        A structured delivery roadmap ensuring on-time delivery, pixel-perfect design, and reliable performance.
                    </p>
                </div>

                <div class="mb-process-grid">
                    <?php foreach ($process as $step): ?>
                        <div class="mb-process-card">
                            <div class="mb-proc-num"><?= htmlspecialchars($step['step'] ?? '01') ?></div>
                            <h3 class="mb-proc-title"><?= htmlspecialchars($step['title']) ?></h3>
                            <p class="mb-proc-desc"><?= htmlspecialchars($step['description']) ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <!-- ========================================================
             9. VERIFIED CASE STUDY SPOTLIGHT
        ======================================================== -->
        <section class="mb-casestudy-section">
            <div class="mb-container">
                <div class="mb-casestudy-card">
                    <div class="mb-cs-grid">
                        <div>
                            <div class="mb-cs-badge">
                                🇮🇳 Verified Case Study Spotlight
                            </div>
                            <h3 class="mb-cs-title"><?= htmlspecialchars($caseStudy['client']) ?></h3>
                            <p class="mb-cs-desc"><?= htmlspecialchars($caseStudy['desc']) ?></p>
                            <a href="/portfolio.php" class="mb-btn-primary" style="padding: 11px 22px; font-size: 0.88rem;">
                                <span>Explore Client Portfolio</span>
                                <?= svcIcon('arrow', 15) ?>
                            </a>
                        </div>
                        <div>
                            <div class="mb-cs-metrics">
                                <?php foreach ($caseStudy['metrics'] as $m): ?>
                                    <div class="mb-cs-metric-box">
                                        <div class="mb-cs-metric-val"><?= htmlspecialchars($m['val']) ?></div>
                                        <div class="mb-cs-metric-lbl"><?= htmlspecialchars($m['lbl']) ?></div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========================================================
             10. MICRO-MARKETS & GLOBAL REACH (Matebiz Hallmark)
        ======================================================== -->
        <section class="mb-markets-section">
            <div class="mb-container">
                <div class="mb-eyebrow">
                    <?= svcIcon('globe') ?>
                    <span>GLOBAL REACH &bull; LOCAL NCR PRESENCE</span>
                </div>
                <h3 style="font-size: 1.35rem; font-weight: 850; color: #111827; margin: 0 0 6px;">
                    Serving Clients Across Delhi NCR &amp; International Markets
                </h3>
                <p style="font-size: 0.88rem; color: #4B5563; max-width: 720px; margin: 0 auto;">
                    From Connaught Place to Cyber City, and international clients across the USA, UK, Canada, Australia, and UAE:
                </p>
                <div class="mb-market-pills">
                    <?php foreach ($microMarkets as $mm): ?>
                        <span class="mb-market-pill"><?= htmlspecialchars($mm) ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- ========================================================
             11. INTERACTIVE FAQ ACCORDION
        ======================================================== -->
        <?php if (!empty($faqs)): ?>
        <section class="mb-faq-section">
            <div class="mb-container">
                <div class="mb-section-header">
                    <div class="mb-eyebrow">
                        <?= svcIcon('sparkles') ?>
                        <span>COMMON QUESTIONS</span>
                    </div>
                    <h2 class="mb-section-title">
                        Frequently Asked <span class="accent">Questions<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                    </h2>
                    <p class="mb-section-sub">
                        Clear answers to everything you need to know about our <?= htmlspecialchars($title) ?> workflows and delivery standards.
                    </p>
                </div>

                <div class="mb-faq-wrap">
                    <?php foreach ($faqs as $fIdx => $faq): ?>
                        <div class="mb-faq-item <?= $fIdx === 0 ? 'active' : '' ?>">
                            <button type="button" class="mb-faq-btn" onclick="mbToggleFaq(this)" aria-expanded="<?= $fIdx === 0 ? 'true' : 'false' ?>">
                                <span><?= htmlspecialchars($faq['q'] ?? $faq['question'] ?? '') ?></span>
                                <span class="mb-faq-btn-icon">
                                    <?= svcIcon('plus', 16) ?>
                                </span>
                            </button>
                            <div class="mb-faq-answer">
                                <?= htmlspecialchars($faq['a'] ?? $faq['answer'] ?? '') ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <!-- ========================================================
             12. CONVERSION CTA BANNER
        ======================================================== -->
        <section class="mb-cta-section">
            <div class="mb-container">
                <div class="mb-cta-box">
                    <div class="mb-cta-pill">
                        <?= svcIcon('rocket') ?>
                        <span>READY TO GROW YOUR BUSINESS?</span>
                    </div>
                    <h2>Ready to Build a High-Performing <span><?= htmlspecialchars($title) ?>?</span></h2>
                    <p>
                        Speak with our senior strategists today for a tailored, complimentary project consultation, competitive gap analysis, and transparent quotation.
                    </p>

                    <div class="mb-cta-btns">
                        <a href="/contact.php" class="mb-btn-primary trigger-enquiry-modal" data-service="<?= htmlspecialchars($title) ?>">
                            <span>Get Free Consultation</span>
                            <?= svcIcon('arrow', 16) ?>
                        </a>
                        <a href="tel:+919999674255" class="mb-btn-secondary" style="background: rgba(255,255,255,0.1); color: #FFFFFF !important; border-color: rgba(255,255,255,0.25);">
                            <?= svcIcon('phone', 15) ?>
                            <span>Call: +91-9999674255</span>
                        </a>
                    </div>

                    <div style="margin-top: 20px; font-size: 0.78rem; color: rgba(255,255,255,0.7); display: flex; align-items: center; justify-content: center; gap: 6px;">
                        <?= svcIcon('shield', 14) ?>
                        <span>Free Strategy Consultation &bull; Zero Obligation &bull; Tailored Solutions</span>
                    </div>
                </div>
            </div>
        </section>

    </main>

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
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    feedback.style.display = 'block';
                    feedback.style.background = '#ECFDF5';
                    feedback.style.color = '#065F46';
                    feedback.style.border = '1px solid #A7F3D0';
                    feedback.textContent = data.message || 'Thank you! Your enquiry has been received. Our team will contact you shortly.';
                    form.reset();
                } else {
                    feedback.style.display = 'block';
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
    </script>
<?php
}
