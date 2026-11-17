<?php
require_once __DIR__ . '/app/templates/header.php';
require_once __DIR__ . '/app/templates/service-page-layout.php';

require_once __DIR__ . '/functions.php';
$dbService = getServiceBySlug('search-engine-marketing');

$serviceData = [
    'icon' => 'megaphone',
    'title' => 'Search Engine Marketing',
    'tagline' => 'Ads That Actually Perform',
    'heroHeadline' => 'Reach the Right Audience. Generate Quality Leads. Grow Your Business.',
    'heroDescription' => 'We create and manage performance-driven Google Ads campaigns that help businesses increase visibility, attract potential customers and achieve measurable growth across industries.',
    'heroBulletHeading' => 'Our SEM Expertise',
    'heroBulletItems' => [
        [
            'title' => 'Targeted Google Ads Campaigns',
            'description' => 'Reach potential customers actively searching for your products and services.',
        ],
        [
            'title' => 'Quality Lead Generation',
            'description' => 'Attract relevant prospects and generate valuable business enquiries.',
        ],
        [
            'title' => 'Multi-Industry Advertising',
            'description' => 'Customised campaigns for startups, SMEs, enterprises and businesses across industries.',
        ],
        [
            'title' => 'Conversion & Performance Optimisation',
            'description' => 'Improve campaign efficiency through continuous monitoring and optimisation.',
        ],
    ],
    'featuresTitleLead' => 'Expert ',
    'featuresTitleAccent' => 'Google Ads Management',
    'featuresTitleTail' => ' Solutions to Grow Your Business',
    'featuresEyebrow' => 'OUR GOOGLE ADS EXPERTISE',
    'featuresSubtitle' => 'Drive Qualified Traffic. Generate Quality Leads. Maximize Your ROI.',
    'benefitsTitleLead' => 'Why Choose WebTecMart for ',
    'benefitsTitleAccent' => 'Google Ads Management',
    'benefitsTitleTail' => '?',
    'benefitsSubtitle' => "We Don't Just Run Ads. We Build Strategies That Drive Results.",
    'processEyebrow' => 'OUR GOOGLE ADS EXECUTION PROCESS',
    'processTitleLead' => 'Our Proven 5-Step ',
    'processTitleAccent' => 'Google Ads Management',
    'processTitleTail' => ' Process',
    'processSubtitle' => 'From strategy to optimization, our structured approach ensures smarter ad spending, precise targeting, and measurable business growth.',
    'showCaseStudy' => false,
    'showPackages' => false,
    'showTechnologies' => false,
    'benefits' => [
        [
            'icon' => 'target',
            'title' => '01. Strategy-First, Results-Focused',
            'desc' => 'Every campaign begins with understanding your business goals, target audience, competition, and market opportunities. We build customized Google Ads strategies focused on meaningful business outcomes.',
            'metric' => 'Tailored Strategies. Measurable Growth.',
        ],
        [
            'icon' => 'check',
            'title' => '02. 13+ Years of Digital Marketing Expertise',
            'desc' => "Leverage WebTecMart's 13+ years of industry experience and expertise across digital marketing, paid advertising, and online growth strategies for businesses across diverse industries.",
            'metric' => 'Experience That Drives Smarter Decisions.',
        ],
        [
            'icon' => 'dollar',
            'title' => '03. Smarter Ad Spend, Better ROI',
            'desc' => 'We focus on maximizing the value of every advertising rupee through high-intent targeting, negative keywords, intelligent bidding, and continuous budget optimization.',
            'metric' => 'Less Wasted Spend. Higher Returns.',
        ],
        [
            'icon' => 'users',
            'title' => '04. Quality Leads, Not Just Clicks',
            'desc' => 'Our campaigns are designed to attract potential customers who are genuinely interested in your products or services, with conversion-focused messaging and optimized landing pages.',
            'metric' => 'Relevant Traffic. Meaningful Conversions.',
        ],
        [
            'icon' => 'trending',
            'title' => '05. Transparent Tracking & Reporting',
            'desc' => 'Know where your advertising budget goes and what it delivers. We focus on tracking leads, conversions, cost per acquisition, and campaign performance to support data-driven decisions.',
            'metric' => 'Clear Insights. Accountable Performance.',
        ],
        [
            'icon' => 'globe',
            'title' => '06. Global Campaign Experience & Continuous Optimization',
            'desc' => 'With experience serving international markets and B2B businesses, we combine market-specific targeting with ongoing campaign refinement to improve performance and support scalable growth.',
            'metric' => 'Global Reach. Continuous Improvement.',
        ],
    ],
    'overview' => "Paid advertisements on search engine result pages remain one of the fastest ways to get noticed. Unlike SEO, which takes months to build momentum, SEM puts your business in front of high-intent buyers within hours. At WebTechMart, our experienced team builds strategies that can double a business's visibility through smart, targeted SERP campaigns — combining sharp keyword research, compelling ad copy, and relentless bid optimization. Over the last 13 years, we've managed crores in ad spend across 500+ brands, consistently delivering lower CPCs and higher conversion rates. Whether you're a local business fighting for the top spot or an ecommerce brand scaling nationally, we build SEM systems that turn clicks into customers.",

    'features' => [
        [
            'title' => 'Google Ads Management',
            'description' => 'End-to-end management of Search, Display, Shopping, and Performance Max campaigns — built for maximum return on ad spend.',
        ],
        [
            'title' => 'Keyword Research & Bidding',
            'description' => 'Deep keyword research plus smart bidding strategies that put your ads in front of buyers while lowering cost-per-click.',
        ],
        [
            'title' => 'Ad Copy & Creatives',
            'description' => 'Compelling ad copy and creative assets engineered to win clicks — tested continuously to find the highest-performing combinations.',
        ],
        [
            'title' => 'Landing Page Design',
            'description' => 'High-converting landing pages purpose-built for your ads — aligned messaging, strong CTAs, and fast load times.',
        ],
        [
            'title' => 'Conversion Tracking',
            'description' => 'GA4 and Google Ads conversion setup so you know exactly where every rupee goes and which campaigns actually drive revenue.',
        ],
        [
            'title' => 'Competitor & Auction Insights',
            'description' => "Ongoing competitor analysis and auction insights to identify gaps, outbid rivals, and capture traffic they're missing.",
        ],
    ],

    'process' => [
        ['step' => '01', 'title' => 'Business & Market Analysis', 'description' => 'Understand your goals, analyze competitors, identify target audiences, and discover high-intent keywords to build a winning campaign strategy.'],
        ['step' => '02', 'title' => 'Campaign Strategy & Setup', 'description' => 'Create structured Google Ads campaigns with precise targeting, compelling ad copy, optimized keywords, and strategic budget allocation.'],
        ['step' => '03', 'title' => 'Conversion Tracking & Analytics', 'description' => 'Set up accurate tracking for leads, calls, enquiries, and sales to measure campaign performance and identify growth opportunities.'],
        ['step' => '04', 'title' => 'Campaign Launch & Monitoring', 'description' => 'Launch campaigns with controlled budgets, monitor search terms and audience performance, and refine ads to improve traffic quality.'],
        ['step' => '05', 'title' => 'Continuous Optimization & Scaling', 'description' => 'Optimize bids, keywords, ad creatives, and budgets to reduce acquisition costs, improve conversions, and scale successful campaigns.'],
    ],

    'faqs' => [
        [
            'q' => 'How is SEM different from SEO?',
            'a' => 'SEO builds organic visibility over months through content and technical optimization. SEM (paid search) delivers instant visibility the moment you launch. Most businesses use both — SEM for immediate results and SEO for long-term compounding growth.',
        ],
        [
            'q' => 'What budget do I need to get started?',
            'a' => 'Campaigns can start from small budgets and scale as they perform. For most small businesses, we recommend at least ₹20,000–₹30,000/month in ad spend to gather meaningful data — plus our management fee.',
        ],
        [
            'q' => 'How fast will I see results?',
            'a' => 'Traffic starts almost immediately — often within 24–48 hours of launch. Optimization improves steadily over the first 4–8 weeks as we gather enough data to refine targeting, bids, and creatives.',
        ],
        [
            'q' => 'Which platforms do you run SEM on?',
            'a' => 'Primarily Google Ads — Search, Display, Shopping, YouTube, and Performance Max. We also run Microsoft Ads (Bing) when it makes sense for your audience and industry.',
        ],
        [
            'q' => 'How do you report performance?',
            'a' => 'You get a transparent dashboard plus weekly/monthly reports showing spend, impressions, clicks, CTR, CPC, conversions, CPA, and ROAS — with clear recommendations for the next cycle.',
        ],
        [
            'q' => 'Do you offer a fixed fee or percentage of ad spend?',
            'a' => "Both — a fixed monthly retainer or a percentage of ad spend (typically 10–15%). We'll recommend whichever fits your scale and goals best during the free consultation.",
        ],
    ],
];

renderServicePageLayout($dbService ? array_merge($serviceData, $dbService, [
    'heroDescription' => $serviceData['heroDescription'],
    'heroHeadline' => $serviceData['heroHeadline'],
    'heroBulletHeading' => $serviceData['heroBulletHeading'],
    'heroBulletItems' => $serviceData['heroBulletItems'],
    'featuresTitleLead' => $serviceData['featuresTitleLead'],
    'featuresTitleAccent' => $serviceData['featuresTitleAccent'],
    'featuresTitleTail' => $serviceData['featuresTitleTail'],
    'featuresEyebrow' => $serviceData['featuresEyebrow'],
    'featuresSubtitle' => $serviceData['featuresSubtitle'],
    'benefitsTitleLead' => $serviceData['benefitsTitleLead'],
    'benefitsTitleAccent' => $serviceData['benefitsTitleAccent'],
    'benefitsTitleTail' => $serviceData['benefitsTitleTail'],
    'benefitsSubtitle' => $serviceData['benefitsSubtitle'],
    'benefits' => $serviceData['benefits'],
    'processEyebrow' => $serviceData['processEyebrow'],
    'processTitleLead' => $serviceData['processTitleLead'],
    'processTitleAccent' => $serviceData['processTitleAccent'],
    'processTitleTail' => $serviceData['processTitleTail'],
    'processSubtitle' => $serviceData['processSubtitle'],
    'showCaseStudy' => $serviceData['showCaseStudy'],
    'showPackages' => $serviceData['showPackages'],
    'showTechnologies' => $serviceData['showTechnologies'],
    'overview' => $dbService['body'] ?? ($serviceData['overview'] ?? ''),
    'features' => !empty($dbService['features']) ? $dbService['features'] : ($serviceData['features'] ?? []),
    'process' => $serviceData['process'],
    'faqs' => !empty($dbService['faqs']) ? $dbService['faqs'] : ($serviceData['faqs'] ?? []),
]) : $serviceData);

require_once __DIR__ . '/app/templates/footer.php';