<?php
$pageMeta = [
    'title' => 'Search Engine Optimization (SEO) Services | WebTecMart Digital',
    'description' => 'Drive sustainable organic traffic and #1 Google rankings with WebTecMart comprehensive SEO services, including technical audits, on-page SEO, and authority link building.',
];
require_once __DIR__ . '/app/templates/header.php';
require_once __DIR__ . '/app/templates/service-page-layout.php';

require_once __DIR__ . '/functions.php';
$dbService = getServiceBySlug('search-engine-optimization');

$serviceData = [
    'icon' => 'trending',
    'title' => 'Search Engine Optimization',
    'tagline' => 'Rank Higher. Convert Better. Scale Organically.',
    'heroDescription' => 'Data-backed SEO strategies that put your brand at the top of Google search results, capturing high-intent customers when they are ready to buy.',
    'overview' => "Search engine optimization is the foundation of long-term digital business growth. Unlike paid ads that stop delivering the moment your budget runs out, a strong organic search presence compounds in value month after month. At WebTecMart, we take a rigorous, white-hat approach to SEO — combining deep technical audits, search intent mapping, content optimization, and authoritative backlink building. Over the past 13+ years, our SEO specialists have ranked 10,000+ keywords on Google Page 1 across competitive B2B, eCommerce, healthcare, real estate, and local service sectors. Whether you need to fix crawl errors, outrank legacy market leaders, or expand your market share, we deliver SEO solutions built for measurable revenue growth.",

    'features' => [
        [
            'title' => 'Comprehensive Technical SEO',
            'description' => 'Fix crawlability, indexation, XML sitemaps, Core Web Vitals, mobile responsiveness, and schema markup so Google ranks your pages effortlessly.',
        ],
        [
            'title' => 'High-Intent Keyword Research',
            'description' => 'Identify commercially valuable search queries and long-tail phrases that bring qualified buyers rather than vanity traffic.',
        ],
        [
            'title' => 'On-Page Content Optimization',
            'description' => 'Optimize title tags, meta descriptions, H1-H3 headings, internal link hierarchy, image alt attributes, and content depth for maximum relevance.',
        ],
        [
            'title' => 'Authority Link Building',
            'description' => 'Earn high-authority, editorial backlinks from reputable industry publications and trusted domains to build rock-solid domain authority.',
        ],
        [
            'title' => 'Local & National Search Strategy',
            'description' => 'Geo-targeted landing pages, Google Business Profile synchronization, and localized citations to win local pack and national searches.',
        ],
        [
            'title' => 'Conversion Rate Optimization (CRO)',
            'description' => 'Align organic landing page design, copy, and CTAs so that incoming search visitors actually turn into inquiries and sales.',
        ],
    ],

    'process' => [
        ['step' => '01', 'title' => 'Full SEO Audit', 'description' => 'We perform an exhaustive audit of your technical health, keyword positions, backlink profile, and direct competitors.'],
        ['step' => '02', 'title' => 'Strategy & Roadmap', 'description' => 'We create a prioritized 3-to-6 month growth roadmap identifying quick wins and high-impact long-term organic opportunities.'],
        ['step' => '03', 'title' => 'Technical Remediation', 'description' => 'Our developers and SEO engineers resolve speed bottlenecks, index errors, broken links, and metadata gaps.'],
        ['step' => '04', 'title' => 'Content & Keyword Alignment', 'description' => 'We optimize existing landing pages and publish intent-driven pillar content engineered to capture targeted search terms.'],
        ['step' => '05', 'title' => 'Authority & Link Acquisition', 'description' => 'We execute ethical digital PR, niche outreach, and content syndication to systematically grow your backlink profile.'],
        ['step' => '06', 'title' => 'Tracking & Transparent Reporting', 'description' => 'Weekly tracking via Google Search Console and GA4 with monthly ranking, traffic, and lead attribution reports.'],
    ],

    'faqs' => [
        [
            'q' => 'How long does SEO take to produce measurable results?',
            'a' => 'While initial technical improvements and indexation fixes often reflect within 4 to 8 weeks, significant ranking jumps and compounding organic traffic growth typically take 3 to 6 months depending on competition, website age, and domain authority.',
        ],
        [
            'q' => 'Do you use white-hat SEO techniques?',
            'a' => 'Yes, 100%. We strictly follow Google Search Essentials and Webmaster Guidelines. We do not use spammy PBNs, automated links, or keyword stuffing, ensuring your website remains secure and penalty-free through Google core algorithm updates.',
        ],
        [
            'q' => 'What is the difference between On-Page and Technical SEO?',
            'a' => 'On-page SEO deals with visible content, keyword placement, headings, internal links, and user experience. Technical SEO ensures search engine crawlers can efficiently crawl, render, index, and interpret the architecture and code of your website.',
        ],
        [
            'q' => 'Can SEO help my local business?',
            'a' => 'Absolutely. Local SEO optimizes your Google Business Profile, local directory citations, and geographic keyword pages so customers in your city or vicinity discover your business in the Google Map Pack and top search results.',
        ],
        [
            'q' => 'Will I receive regular performance reports?',
            'a' => 'Yes. Every client receives monthly reports covering keyword rankings, organic traffic trends, bounce rates, top-performing pages, and actual lead conversions.',
        ],
    ],
];

renderServicePageLayout($dbService ? array_merge($serviceData, $dbService, [
    'heroDescription' => $dbService['hero_description'] ?? ($dbService['summary'] ?? ($serviceData['heroDescription'] ?? '')),
    'overview' => $dbService['body'] ?? ($serviceData['overview'] ?? ''),
    'features' => !empty($dbService['features']) ? $dbService['features'] : ($serviceData['features'] ?? []),
    'process' => !empty($dbService['process']) ? $dbService['process'] : ($serviceData['process'] ?? []),
    'faqs' => !empty($dbService['faqs']) ? $dbService['faqs'] : ($serviceData['faqs'] ?? []),
]) : $serviceData);

require_once __DIR__ . '/app/templates/footer.php';
