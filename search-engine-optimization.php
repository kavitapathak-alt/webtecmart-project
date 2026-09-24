<?php
require_once __DIR__ . '/../app/templates/header.php';
require_once __DIR__ . '/../app/templates/service-page-layout.php';

renderServicePageLayout([
    'icon' => 'megaphone',
    'title' => 'Search Engine Marketing',
    'tagline' => 'Ads That Actually Perform',
    'heroDescription' => 'Google Ads and PPC campaigns engineered for maximum ROI and instant visibility — so your business shows up the moment customers start searching.',
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
        ['step' => '01', 'title' => 'Research', 'description' => 'We study your goals, market, audience, and competitors — mapping keywords, intent, and the exact opportunities worth bidding on.'],
        ['step' => '02', 'title' => 'Strategy', 'description' => "We build a clear campaign roadmap — channels, budgets, keyword groups, ad messaging, and the KPIs we'll track against."],
        ['step' => '03', 'title' => 'Setup',    'description' => 'Campaign structure, keyword lists, ad creatives, landing pages, and conversion tracking are all built and connected.'],
        ['step' => '04', 'title' => 'Launch',   'description' => 'Campaigns go live with tight monitoring — we watch impressions, clicks, CPC, and conversions from the very first hour.'],
        ['step' => '05', 'title' => 'Optimize', 'description' => 'Daily monitoring and A/B testing — we refine keywords, bids, ads, and audiences to squeeze more results from every rupee.'],
        ['step' => '06', 'title' => 'Scale',    'description' => "Scale what works, cut what doesn't. We double down on winning campaigns while protecting your ROAS and CPA."],
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
]);

require_once __DIR__ . '/../app/templates/footer.php';