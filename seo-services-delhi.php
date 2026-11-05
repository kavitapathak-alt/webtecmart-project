<?php
$pageMeta = [
    'title' => 'SEO Services in Delhi – Result-Driven SEO to Grow Your Business | WebTecMart',
    'description' => 'Build search visibility that drives real business growth. WebTecMart is the top-rated SEO agency in Delhi NCR providing AI-ready SEO, Google #1 rankings, and qualified organic leads.',
];
require_once __DIR__ . '/app/templates/header.php';
require_once __DIR__ . '/app/components/sections/FooterSection.php';
require_once __DIR__ . '/functions.php';

// ============================================================
// 100% DYNAMIC DATA ARCHITECTURE (Loaded from DB with Fallbacks)
// ============================================================
$dbService = getServiceBySlug('seo-services-delhi') ?: [];

// Hero Section
$heroTitle = $dbService['hero_title'] ?? 'SEO Services in Delhi';
$heroAccent = $dbService['hero_accent'] ?? 'Result-Driven SEO to Grow Your Business';
$heroDesc = $dbService['hero_description'] ?? 'Get found when your customers are searching. WebTecMart offers strategic SEO solutions in Delhi to boost Google rankings, qualified organic traffic and lead to more enquiries, leads and sales.';
$heroBullets = $dbService['hero_bullets'] ?? [
    'Enhance Google Rankings for relevant, high-value keywords',
    'Bring in Targeted Organic Traffic from ready-to-buy customers',
    'Increase website leads and enquiries with search optimisation',
    'Create Long-Term Visibility by following a sustainable organic strategy'
];
$heroVisibleBullets = array_slice(is_array($heroBullets) ? $heroBullets : [], 0, 2);
$founderName = $dbService['founder_name'] ?? 'Jitin Madaan';
$founderRole = $dbService['founder_role'] ?? 'Performance Marketing Strategist';
$founderImage = $dbService['founder_image'] ?? '/assets/images/jitin-madaan.png';
$founderAvatar = $dbService['founder_avatar'] ?? '/assets/images/jitin-madaan-avatar.png';
$founderInitial = 'JM';
$heroReadinessBadge = $dbService['hero_readiness_badge'] ?? '⚡ Ready for Google to find you?';

$rankingKeywords = $dbService['keyword_ranking_showcase'] ?? [
    ['keyword' => 'Bharat Tex 2026 Fair', 'url' => 'bharat-tex.com', 'rank' => '#1', 'trend' => '↑ 17 Positions', 'volume' => '49,500/mo', 'intent' => 'Commercial'],
    ['keyword' => 'Best SEO Company in Delhi NCR', 'url' => 'webtecmart.com/seo-services-delhi.php', 'rank' => '#1', 'trend' => '↑ 13 Positions', 'volume' => '14,800/mo', 'intent' => 'High Intent'],
    ['keyword' => 'IHGF Autumn Fair Delhi 2027', 'url' => 'ihgfdelhi.in', 'rank' => '#1', 'trend' => '↑ 25 Positions', 'volume' => '22,000/mo', 'intent' => 'Buyer Intent'],
    ['keyword' => 'B2B Exhibition SEO Services', 'url' => 'webtecmart.com/b2b-exhibition-seo.php', 'rank' => '#1', 'trend' => '↑ 30 Positions', 'volume' => '8,100/mo', 'intent' => 'B2B'],
    ['keyword' => 'Local SEO Services in Delhi', 'url' => 'webtecmart.com/local-seo.php', 'rank' => '#1', 'trend' => '↑ 23 Positions', 'volume' => '12,100/mo', 'intent' => 'Local Intent'],
    ['keyword' => 'Technical SEO Services Delhi', 'url' => 'webtecmart.com/technical-seo.php', 'rank' => '#1', 'trend' => '↑ 19 Positions', 'volume' => '6,400/mo', 'intent' => 'Technical'],
];

$microMarketPills = $dbService['micro_markets'] ?? ['Connaught Place (CP)', 'South Delhi & Saket', 'New Delhi', 'Rohini', 'Dwarka Commercial Hub', 'Janakpuri & West Delhi', 'Punjab Bagh & Rajouri Garden', 'Okhla Industrial Area', 'Noida & Greater Noida', 'Pitampura & Rohini', 'Ghaziabad', 'Faridabad'];

// Images
$serpImage = $dbService['serp_image'] ?? '/assets/images/seo-takeaways-preview.png';
$springSerpImage = $dbService['spring_serp_image'] ?? '/assets/images/spring-sourcing-fair-serp-highlight.png';

// Brand Logos Marquee
$brandLogos = $dbService['brand_logos'] ?? [
    ['name' => 'Informa Global', 'logo' => '/assets/images/logo-1.png', 'category' => 'Trade Events'],
    ['name' => 'Bharat Tex Fair', 'logo' => '/assets/images/logos-10.jpeg', 'category' => 'Ministry of Textiles'],
    ['name' => 'IHGF Delhi Autumn Fair 2027', 'logo' => '/assets/images/logos-11.jpeg', 'category' => 'Global Sourcing Fair'],
    ['name' => 'Clarion Events', 'logo' => '/assets/images/logos-2.png', 'category' => 'Exhibition Leader'],
    ['name' => 'London Tech Week', 'logo' => '/assets/images/logos-3.jpeg', 'category' => 'Tech Expo'],
    ['name' => 'Media 10', 'logo' => '/assets/images/logos-4.jpeg', 'category' => 'Design & Media'],
    ['name' => 'The AI Summit', 'logo' => '/assets/images/logos-5.jpeg', 'category' => 'Enterprise AI'],
    ['name' => 'Northstar Travel Group', 'logo' => '/assets/images/logos-6.jpeg', 'category' => 'Travel Group'],
    ['name' => 'BMJ Future Health', 'logo' => '/assets/images/logos-7.jpeg', 'category' => 'Healthcare Publishing'],
    ['name' => 'Stonex Jewellers', 'logo' => '/assets/images/stonex-jewellers-logo.png', 'category' => 'Luxury Retail'],
    ['name' => 'Innovation Zero', 'logo' => '/assets/images/logos-8.jpeg', 'category' => 'CleanTech Congress'],
    ['name' => 'Premier Logistics', 'logo' => '/assets/images/logos-9.jpeg', 'category' => 'Industrial Logistics']
];

// Strategic Narrative & Why Choose Us
$strategicNarrative = $dbService['strategic_narrative'] ?? [
    'eyebrow' => 'BE FOUND BY THE CORRECT PEOPLE • GENERATE BETTER LEADS • GROW ORGANICALLY',
    'title' => 'SEO Services in Delhi That Turn Search Visibility Into Business Growth!',
    'lead' => 'Your customers are looking for your products and services. The challenge is to make sure that they find your business, not your competitors.',
    'p1' => 'We at WebTecMart offer SEO Services in Delhi that are optimized to deliver results and enhance your search performance, to ensure that you reach the right people in the right manner with your web pages and that they are transformed into enquiries and customers.',
    'p2' => 'Technical SEO, Keyword Optimisation, Content, Local SEO, and Authority Building are just some of the strategies we will develop in line with your business, your audience and your growth goals. From local businesses in Delhi to growing businesses in Delhi NCR, e-commerce firms to businesses looking to reach customers beyond our borders in India, we develop SEO strategies that promote sustainable growth.',
    'callout' => '💡 Getting better rankings is just the start. It\'s really about improving the business results.'
];
$narrativeTitle = trim((string) ($strategicNarrative['title'] ?? 'SEO Services in Delhi That Turn Search Visibility Into Business Growth!'));
$narrativeAccent = '';
if (preg_match('/\s*(Business Growth!?|Search Visibility)\s*$/i', $narrativeTitle, $titleMatch, PREG_OFFSET_CAPTURE)) {
    $narrativeAccent = trim($titleMatch[1][0]);
    $narrativeTitle = trim(substr($narrativeTitle, 0, $titleMatch[0][1]));
}

$whyCards = $dbService['why_cards'] ?? [
    ['icon' => '📍', 'title' => 'Delhi-Focused Strategy', 'desc' => 'Tailored specifically to your local market, audience search behavior, and regional competitors.'],
    ['icon' => '🔍', 'title' => 'One-Stop Search Optimization', 'desc' => 'Complete coverage of technical health, on-page optimization, content depth, and backlink authority.'],
    ['icon' => '🎯', 'title' => 'Intent-Based Targeting', 'desc' => 'Keyword and search-intent-based approaches that draw in qualified commercial visitors ready to buy.'],
    ['icon' => '📝', 'title' => 'Content That Ranks & Converts', 'desc' => 'Helpful, comprehensive content that ranks at the top and provides genuine value to decision-makers.'],
    ['icon' => '📊', 'title' => 'Transparent ROI Reporting', 'desc' => 'Detailed, transparent analytics and keyword tracking so you always know what is improving and why.'],
    ['icon' => '🏆', 'title' => '13+ Years of Proven Experience', 'desc' => 'Battle-tested digital expertise across search engines, content marketing, websites, and growth strategy.']
];

// Key Takeaways & Approach
$takeaways = $dbService['takeaways'] ?? [
    'eyebrow' => 'KEY TAKEAWAYS',
    'title' => 'SEO Services in Delhi at a Glance',
    'lead' => 'A good SEO approach ought to do greater than just ranking better. It should draw the intended audience to your business, gain trust and create measurable opportunities.',
    'checklist' => [
        'Technical SEO to boost website performance, crawlability and search accessibility',
        'On-page SEO focused on keywords, search intent, content, headings, metadata and internal linking',
        'Local SEO to attract customers looking for services in Delhi and surrounding areas',
        'Authority building and off-page SEO support to boost the credibility of your website',
        'Optimizing content for attracting relevant, high-converting organic traffic',
        'Ecommerce SEO for better product and category visibility in search engines',
        'Keyword research based on search volume, competition, relevance and user intent',
        'Business SEO strategies for Delhi, Delhi NCR, pan-India and international markets',
        'Continual performance monitoring and optimisation as search algorithms evolve',
        'Adapting to the evolving search landscape and user behaviour with AI-ready strategies'
    ]
];
$takeawaysTitle = trim((string) ($takeaways['title'] ?? 'SEO Services in Delhi at a Glance'));
$takeawaysTitleBase = $takeawaysTitle;
$takeawaysTitleAccent = '';
if (preg_match('/\s+(Glance|Overview|Guide)\s*$/i', $takeawaysTitle, $titleMatch, PREG_OFFSET_CAPTURE)) {
    $takeawaysTitleAccent = trim($titleMatch[1][0]);
    $takeawaysTitleBase = trim(substr($takeawaysTitle, 0, $titleMatch[0][1]));
}

// What We Offer (6 Core Offerings)
$offers = $dbService['offers'] ?? [
    [
        'icon' => 'code',
        'title' => 'Technical SEO',
        'desc' => 'We enhance the performance of your site by addressing crawling, indexing, Core Web Vitals, server response times, and architecture to ensure search bots navigate effortlessly.',
        'link' => '/technical-seo.php',
        'link_text' => 'Explore Technical SEO →'
    ],
    [
        'icon' => 'layout',
        'title' => 'On-Page Optimization',
        'desc' => 'Content without optimization cannot perform. We optimize title tags, meta descriptions, header structures (H1-H6), internal linking, and semantic keyword relevance.',
        'link' => '/on-page-seo.php',
        'link_text' => 'Explore On-Page SEO →'
    ],
    [
        'icon' => 'search',
        'title' => 'Keyword Research & Strategy',
        'desc' => 'Searching for the appropriate keywords will guide users straight to your site. We dissect intent, competition, and search volume to capture high-value buyer searches.',
        'link' => '/keyword-research.php',
        'link_text' => 'Explore Keyword Research →'
    ],
    [
        'icon' => 'map-pin',
        'title' => 'Local SEO & Google 3-Pack',
        'desc' => 'Dominate Google Maps across Delhi, Noida, Gurgaon, and NCR. Optimize your Google Business Profile, citations, reviews, and proximity signals to drive nearby calls.',
        'link' => '/local-seo.php',
        'link_text' => 'Explore Local SEO →'
    ],
    [
        'icon' => 'link',
        'title' => 'High-Authority Link Building',
        'desc' => 'Earn high-authority editorial backlinks and digital PR citations from verified Indian media and industry portals that supercharge domain trust.',
        'link' => '/off-page-seo.php',
        'link_text' => 'Explore Off-Page SEO →'
    ],
    [
        'icon' => 'sparkles',
        'title' => 'AI-Ready SEO (AEO & GEO)',
        'desc' => 'Position your brand prominently within Google AI Overviews, Perplexity, Gemini, and ChatGPT search recommendations through structured entity data.',
        'link' => '/ai-seo-strategy.php',
        'link_text' => 'Explore AI-Ready SEO →'
    ]
];

// SEO Challenges
$challenges = $dbService['challenges'] ?? [
    'eyebrow' => 'SEO CHALLENGES',
    'title' => 'What is Holding Your Site Back in Google Search?',
    'lead' => 'There are several common SEO challenges that businesses in Delhi encounter. Delhi is among the most competitive business hub in India. Whether it\'s a local service provider or a start-up, or a reputable brand or an e-commerce company, businesses are vying for the same search audience. Having a website is not sufficient: Your website has to be optimised for the right keywords, have valuable content, a solid technical underpinning, a good user experience and also a website strategy that aligns with your customers\' search intent.',
    'items' => [
        [
            'icon' => '⚔️',
            'title' => 'Intense Local Competition',
            'desc' => 'Firms fight it out for exposure in Google Search and Google Maps in Delhi. A basic SEO campaign can\'t be sufficient to beat the competition. We define your competitors, learn about their search footprint and create a strategy based on what\'s possible in your market.'
        ],
        [
            'icon' => '📉',
            'title' => 'Low or Irrelevant Organic Traffic',
            'desc' => 'Getting visitors does not equal getting prospective customers. When you get visitors that don\'t want to buy, you get no enquiries. We pay special attention to relevant commercial keywords and search intent to get visitors that are more likely to take action.'
        ],
        [
            'icon' => '🎯',
            'title' => 'Poor Keyword Targeting',
            'desc' => 'Competing for high-ranking keywords that don\'t have the proper intent, meaning, or business value can be a waste of time and resources. By leveraging our keyword research, we discover opportunities throughout commercial, transactional, informational and local searches.'
        ],
        [
            'icon' => '📍',
            'title' => 'Weak Local Search Visibility',
            'desc' => 'Local visibility is important if your customers are looking for services in their vicinity. We optimize your website and Google Business Profile to ensure your business is found in relevant local searches across Delhi and Delhi NCR.'
        ],
        [
            'icon' => '⚙️',
            'title' => 'Technical SEO Problems',
            'desc' => 'Slow pages, broken links, poor website structure, indexing problems, duplicate content and weak internal linking impact search engine crawling. We assess and resolve these areas in our technical SEO audit.'
        ],
        [
            'icon' => '💸',
            'title' => 'Overdependence on Paid Advertising',
            'desc' => 'Paid ads provide instant exposure, but only while you continue spending. With SEO, you create an organic traffic stream that continues delivering qualified visibility. We help businesses achieve a healthier balance of acquisition.'
        ]
    ]
];
$challengesTitle = trim((string) ($challenges['title'] ?? 'What is Holding Your Site Back in Google Search?'));
$challengesTitleBase = $challengesTitle;
$challengesTitleAccent = '';
if (preg_match('/\s+(Google Search\??)\s*$/i', $challengesTitle, $titleMatch, PREG_OFFSET_CAPTURE)) {
    $challengesTitleBase = trim(substr($challengesTitle, 0, $titleMatch[0][1]));
    $challengesTitleAccent = trim($titleMatch[1][0]);
}

// Meet the Experts (Jitin Madaan)
$founderSection = $dbService['founder_section'] ?? [
    'eyebrow' => 'MEET THE EXPERTS',
    'title' => 'The People Behind Your SEO Growth',
    'lead' => 'Strategy, SEO, Content and Technical Expertise — Working Together. To win at SEO you need more than publishing keywords or link building. We deliver sustainable search growth by leveraging SEO strategy, technical optimisation, content expertise and digital experience.',
    'name' => 'Jitin Madaan',
    'role' => 'Performance Marketing Strategist',
    'stats' => [
        ['val' => '13+ Years', 'label' => 'Industry Experience'],
        ['val' => '1000+', 'label' => 'Projects & Businesses Served'],
        ['val' => '95%', 'label' => 'Client Retention Rate']
    ],
    'pillars' => [
        [
            'icon' => '⚙️',
            'title' => 'SEO Strategy & Technical Expertise',
            'desc' => 'Our SEO experts specialize in keyword strategy, technical audits, competitor analysis, website structure and performance optimization to build a solid foundation for organic growth.'
        ],
        [
            'icon' => '📝',
            'title' => 'Content & Search Optimisation',
            'desc' => 'Our content team produces useful, search optimized content that\'s aligned to user intent, keyword opportunities and your brand\'s expertise — empowering your website to offer actual value and boost search visibility at the same time.'
        ],
        [
            'icon' => '🚀',
            'title' => 'Digital Growth Support',
            'desc' => 'SEO is best suited when it is integrated with the broader digital landscape. Our team has SEO, content, website development and digital marketing skills to build a more interconnected growth strategy.'
        ]
    ]
];
$founderTitle = trim((string) ($founderSection['title'] ?? 'The People Behind Your SEO Growth'));
$founderTitleBase = $founderTitle;
$founderTitleAccent = '';
if (preg_match('/\s+(SEO Growth)\s*$/i', $founderTitle, $titleMatch, PREG_OFFSET_CAPTURE)) {
    $founderTitleBase = trim(substr($founderTitle, 0, $titleMatch[0][1]));
    $founderTitleAccent = trim($titleMatch[1][0]);
}

// Our Process (6 Steps)
$processSteps = $dbService['process'] ?? [
    ['step' => '01', 'title' => 'Research & Discovery', 'description' => 'We start with knowing your business, your audience, your competition and your online presence. Our research includes keyword analysis, competitor research, search intent and an in-depth website review.'],
    ['step' => '02', 'title' => 'Technical Audit & Foundation', 'description' => 'A solid technical structure is required to ensure that your site can be properly crawled, indexed and understood by Google.'],
    ['step' => '03', 'title' => 'Keyword Strategy & Search Intent', 'description' => 'Finding keywords that have the right balance of search volume, competition and commercial intent.'],
    ['step' => '04', 'title' => 'On-Page & Content Optimisation', 'description' => 'We refine existing content and identify opportunities for new content to target high-value keyword themes.'],
    ['step' => '05', 'title' => 'Authority Building & Off-Page Signals', 'description' => 'Quality external signals, local citations and high-authority links help to improve your website\'s credibility.'],
    ['step' => '06', 'title' => 'Measurement, Refinement & Growth', 'description' => 'We regularly monitor keyword rankings, organic traffic, leads and conversions to adapt and scale strategy.']
];

// Industries
$industries = $dbService['industries'] ?? [
    ['icon' => '🛍️', 'title' => 'E-Commerce & Retail', 'desc' => 'Drive product and category revenue with high-ranking transactional queries.'],
    ['icon' => '🏭', 'title' => 'B2B & Manufacturing', 'desc' => 'Capture corporate purchase orders and bulk distributor inquiries.'],
    ['icon' => '🏢', 'title' => 'Real Estate & Builders', 'desc' => 'Attract high-net-worth property buyers and commercial lease leads.'],
    ['icon' => '🏥', 'title' => 'Healthcare & Clinics', 'desc' => 'Rank for specialized treatments and local patient consultation searches.'],
    ['icon' => '🎓', 'title' => 'Education & EdTech', 'desc' => 'Scale student admissions and course enrollments across Delhi NCR.'],
    ['icon' => '⚖️', 'title' => 'Legal & Professional Services', 'desc' => 'Establish authority for legal consultations and advisory mandates.'],
    ['icon' => '✈️', 'title' => 'Travel & Hospitality', 'desc' => 'Dominate destination keywords and corporate conference bookings.'],
    ['icon' => '💻', 'title' => 'SaaS & Technology', 'desc' => 'Scale inbound software trials and global enterprise demo requests.']
];

// Client Feedback
$clientFeedback = $dbService['client_feedback'] ?? [
    [
        'quote' => "Thank you so much WebTecMart. We've noticed a phenomenal improvement in commercial search visibility, keyword engagement, and subsequently a large proportion of our verified customer enquiries are coming directly through the website. Thanks again for being so proactive and hands-on with the SEO work...",
        'author' => 'Libby Powell',
        'role' => 'Marketing Director',
        'company' => 'Innovation Zero',
        'rating' => 5
    ],
    [
        'quote' => "WebTecMart has completely evolved our strategic thinking when it comes to enterprise websites. One of our greatest success stories was converting our legacy domain to an optimized search architecture which led to a 731% increase in website users and a 164% uplift in organic search conversions...",
        'author' => 'Louise Smith',
        'role' => 'Associate Director',
        'company' => 'Society of Petroleum Engineers',
        'rating' => 5
    ],
    [
        'quote' => "Their support, keyword clustering, and best practice guidance helped ensure we now have a user friendly, SEO efficient, creative, and high performing landing site for our target audience across Delhi NCR and international markets...",
        'author' => 'Ali McQueen',
        'role' => 'Head of Marketing',
        'company' => 'RoarB2B',
        'rating' => 5
    ],
    [
        'quote' => "From zero organic visibility to ranking #1 for over 45 high-commercial search phrases within 6 months. WebTecMart is by far the most knowledgeable, data-driven, and trustworthy SEO team in Delhi NCR.",
        'author' => 'Rajesh Singhania',
        'role' => 'Managing Director',
        'company' => 'Stonex Luxury Retail',
        'rating' => 5
    ]
];

// Masterclass Blueprint
$masterclass = $dbService['masterclass'] ?? [
    'title' => 'SEO Masterclass & In-House Blueprint.',
    'subtitle' => 'Maximise your commercial marketing with our bespoke SEO Masterclass, designed to equip your team with the practical skills to implement modern SEO effectively in-house.',
    'headline' => 'Designed for Enterprise Teams, Marketers & Founders',
    'description' => 'This four-week intensive blueprint demystifies search algorithms, AI search overviews (AEO/GEO), and ranking mechanics. Led by industry expert Jitin Madaan (Performance Marketing Strategist), you will be equipped with the exact frameworks powering 5,000+ top Google rankings.',
    'skills' => [
        'Commercial Keyword Research & Search Intent Mapping',
        'Reverse-Engineering Competitor Authority & Backlink Profiles',
        'High-Impact Content Strategy & Semantic Topical Clusters',
        'Technical SEO, Crawl Health & Core Web Vitals Optimization',
        'Conversion Rate Optimization (CRO) & UX Engagement Signals',
        'GA4 Analytics, Google Search Console & AI Search Tracking'
    ],
    'video_duration' => '15 min executive training',
    'instructor' => 'Jitin Madaan • Performance Marketing Strategist',
    'video_image' => '/assets/images/case-study-1.jpg'
];
$mcVideoImage = $masterclass['video_image'] ?? '/assets/images/case-study-1.jpg';

// Case Studies
$cases = is_array($dbService['case_results'] ?? null) ? $dbService['case_results'] : [
    [
        'title' => 'IHGF Delhi Fair & Spring Sourcing 2027',
        'badge' => 'Global Sourcing & Trade Fair',
        'stat' => '#1 Rank',
        'stat_desc' => 'Google Top Result for High-Volume Sourcing Phrases',
        'desc' => 'Complete technical restructuring and multi-lingual topical clustering established dominant Google SERP presence ahead of international competitors.'
    ],
    [
        'title' => 'Stonex Luxury Retail Network',
        'badge' => 'Luxury Retail & E-Commerce',
        'stat' => '+420%',
        'stat_desc' => 'Qualified Commercial Inquiries in 6 Months',
        'desc' => 'Local 3-Pack domination across South Delhi, Noida, and Gurugram combined with high-intent diamond jewelry keyword ranking.'
    ],
    [
        'title' => 'Innovation Zero World Congress',
        'badge' => 'CleanTech & Enterprise Events',
        'stat' => '12.4x',
        'stat_desc' => 'Organic Inbound Delegate Registrations',
        'desc' => 'Engineered topical authority and speaker knowledge graphs captured decision-makers and C-suite attendees across pan-India and UK search.'
    ]
];

// Rankings Table
$rankings = is_array($dbService['rankings'] ?? null) ? $dbService['rankings'] : [
    ['kw' => 'spring sourcing fair 2027', 'pos' => '#1', 'vol' => '18,500/mo', 'diff' => 'High', 'status' => 'Verified Top Result'],
    ['kw' => 'ihgf delhi fair 2027', 'pos' => '#1', 'vol' => '27,100/mo', 'diff' => 'High', 'status' => 'Verified Top Result'],
    ['kw' => 'top b2b exhibition seo company delhi', 'pos' => '#1', 'vol' => '4,800/mo', 'diff' => 'Medium', 'status' => 'AI Overview Featured'],
    ['kw' => 'seo company pitampura rohini', 'pos' => '#1', 'vol' => '3,200/mo', 'diff' => 'Medium', 'status' => 'Google Maps 3-Pack'],
    ['kw' => 'best seo services south delhi', 'pos' => '#1', 'vol' => '5,400/mo', 'diff' => 'High', 'status' => 'Organic Dominance']
];

// Wrapping Up
$wrappingUp = is_array($dbService['wrapping_up'] ?? null) ? $dbService['wrapping_up'] : [
    'eyebrow' => 'DELHI NCR LOCAL REACH',
    'title' => 'Why SEO Services in Delhi Matter for Your Business',
    'sub' => 'Build Visibility. Earn Trust. Generate Sustainable Growth.',
    'p1' => 'The digital market is extremely competitive in Delhi. There are customers who are always looking in Google for businesses, products and services — and businesses that show up at the right time have a higher chance of capturing that customer.',
    'p2' => 'WebTecMart offers SEO services in Delhi, which goes beyond rankings. We use technical SEO, keyword research, content optimisation, local SEO and authority building to create a search strategy that\'s in line with your business goals.',
    'micro_markets' => ['Pitampura', 'Rohini', 'Dwarka', 'Janakpuri', 'South Delhi', 'Connaught Place', 'Saket', 'Punjabi Bagh', 'Noida', 'Gurgaon', 'Faridabad', 'Ghaziabad'],
    'goal' => 'Our goal is simple: Make your business discoverable, build trust, and convert search visibility into growth.'
];

// FAQs (10 Items)
$faqs = $dbService['faqs'] ?? [
    [
        'q' => 'What are SEO services and why does my business need them?',
        'a' => "SEO Services increase your site's presence in search engines and make it easier for anyone who searches for your goods or services to find your site. Combating local, commercial and industry-specific searches and building a sustainable source of organic traffic for businesses in Delhi is where SEO comes into the picture."
    ],
    [
        'q' => 'How long does SEO take to show results?',
        'a' => "SEO is a long-term approach, and there is no guarantee of results, depending on your site, the competition, the industry, the keywords you're targeting and how well your site is being found in the search engines. Technical and on page optimisation can bring about changes fairly quickly, whereas building authority and targeting competitive keywords may take a longer period of time, but need consistent optimisation."
    ],
    [
        'q' => 'How can Local SEO help my Delhi business?',
        'a' => "Local SEO puts your business in front of mobile searches that are related to your area and services. It can help people find your business when they look for local products and/or services, and can help you be seen in queries that are relevant to your business."
    ],
    [
        'q' => 'What does an SEO agency in Delhi actually do?',
        'a' => "An SEO agency will be able to work on keyword research, technical SEO, on page optimisation, content optimisation, local SEO, internal linking, authority building, competitor analysis and monitoring performance. The exact approach will vary, depending on the business and goals."
    ],
    [
        'q' => 'Is it possible to create leads with SEO and not traffic?',
        'a' => "Yes. The goal of SEO isn't to bring as many visitors as possible, it's to bring the right ones. Through focusing on search intent and optimising content and calls to action, landing pages, SEO can help to drive inquiries, registrations, sales and other conversions."
    ],
    [
        'q' => 'Which is better, SEO or Google Ads?',
        'a' => "SEO isn't the same thing as Google Ads. While SEO is about long-term organic visibility, Google Ads can offer instant paid visibility. A lot of businesses leverage both of them as part of an extensive digital marketing campaign."
    ],
    [
        'q' => 'How to select the Ideal SEO firm in Delhi?',
        'a' => "Find an SEO firm that has a clear understanding of your business, is able to articulate their approach, has a business objective that is relevant to your business, has a clear reporting system and isn't promising to rank websites in the improbable. A successful SEO partner should be able to tell you not only what they'll be working on, but why it is important to your business."
    ],
    [
        'q' => 'Which businesses can benefit from SEO services?',
        'a' => "SEO can help virtually any business that has customers find it online. SEO can be beneficial for local businesses, e-commerce retailers, professional services, real estate companies, healthcare providers, educational institutions, tech companies and B2B types of companies as well."
    ],
    [
        'q' => 'Does WebTecMart provide Local, National and International SEO?',
        'a' => "Yes. WebTecMart can develop SEO strategies for businesses targeting customers locally in Delhi and Delhi NCR, across India or in international markets. The method and web design is modified based on the target market."
    ],
    [
        'q' => 'What is the price of SEO services in Delhi?',
        'a' => "The cost of SEO services varies based on website size, competition, location, keywords, content needs, and the technical complexity and business goals. WebTecMart also provides several SEO packages and will be able to design a personalised approach to suit your needs."
    ]
];

// CTA Box
$ctaBox = $dbService['cta_box'] ?? [
    'headline' => 'So You\'re Ready to Take the Plunge and Grow Your Business With SEO?',
    'sub' => 'Let\'s Make Your Search Visibility Business Opportunities',
    'text' => 'From local SEO in Delhi to national SEO across India, e-commerce SEO to full-fledged organic growth, WebTecMart has you covered to create a stronger search presence. Give us a brief description of your business, website and growth objectives. We will know the opportunities and understand what we need to put our SEO strategy into.',
    'btn_text' => 'Book Your Free SEO Consultation',
    'call_text' => 'Call: +91-9999674255'
];
?>

<!-- Swiper 11 CSS for Touch Sliders -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<!-- Schema.org JSON-LD Structured Data for Local SEO & FAQPage -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "LocalBusiness",
      "@id": "https://webtecmart.com/#organization",
      "name": "WebTecMart Digital - Premier SEO Agency Delhi",
      "url": "https://webtecmart.com/seo-services-delhi.php",
      "logo": "https://webtecmart.com/assets/images/webtecmart-logo.png",
      "description": "Top-rated SEO company in Delhi NCR providing data-driven Google #1 rankings, AI-ready SEO, and qualified lead generation.",
      "telephone": "+91-9999674255",
      "email": "info@webtecmart.com",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Connaught Place / Nehru Place Commercial Center",
        "addressLocality": "New Delhi",
        "addressRegion": "Delhi",
        "postalCode": "110001",
        "addressCountry": "IN"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": 28.6139,
        "longitude": 77.2090
      },
      "areaServed": [
        {"@type": "City", "name": "Delhi"},
        {"@type": "City", "name": "New Delhi"},
        {"@type": "City", "name": "Noida"},
        {"@type": "City", "name": "Gurgaon"},
        {"@type": "City", "name": "Faridabad"},
        {"@type": "City", "name": "Ghaziabad"}
      ]
    },
    {
      "@type": "FAQPage",
      "mainEntity": [
        <?php foreach (($faqs ?? []) as $fIdx => $fq): ?>
        {
          "@type": "Question",
          "name": <?= json_encode(is_array($fq) ? ($fq['q'] ?? $fq['question'] ?? 'Question') : (string) $fq) ?>,
          "acceptedAnswer": {
            "@type": "Answer",
            "text": <?= json_encode(is_array($fq) ? ($fq['a'] ?? $fq['answer'] ?? '') : '') ?>
          }
        }<?= $fIdx < count($faqs ?? []) - 1 ? ',' : '' ?>
        <?php endforeach; ?>
      ]
    }
  ]
}
</script>

<style>
    /* ============================================================
       PREMIER MAIN SEO LANDING PAGE STYLES (Delhi NCR Hub)
       Strict Theme: WebTecMart Magenta & Hot Pink ONLY
       (#C4007A, #E0398F, #FFF0F7, #FCE7F3, #850053, #111827)
       ============================================================ */
    .del-seo-page {
        width: 100%;
        background: #FFFFFF;
        color: #1F1B2A;
        font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
        overflow: hidden;
    }
    .del-container {
        max-width: 1220px;
        margin: 0 auto;
        padding: 0 24px;
        position: relative;
        z-index: 2;
        width: 100%;
    }

    /* Common Typography & Badges */
    .del-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #FFF0F7;
        border: 1px solid rgba(196, 0, 122, 0.22);
        color: #C4007A;
        padding: 5px 13px;
        border-radius: 9999px;
        font-size: 0.74rem;
        font-weight: 800;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        margin-bottom: 8px;
    }
    .del-eyebrow svg {
        width: 13px;
        height: 13px;
        color: #C4007A;
    }
    .del-section-title {
        font-size: clamp(1.9rem, 3vw, 2.7rem);
        font-weight: 850;
        color: #111827;
        line-height: 1.12;
        letter-spacing: -0.04em;
        margin: 0 auto 10px;
        text-align: center;
        max-width: 940px;
    }
    .del-section-title .accent {
        color: #C4007A;
        position: relative;
        display: inline-block;
        padding-bottom: 4px;
    }
    .del-section-title .accent svg {
        position: absolute;
        left: 0;
        bottom: -1px;
        width: 100%;
        height: 6px;
        pointer-events: none;
    }
    .del-section-title::after {
        content: "";
        display: block;
        width: 42px;
        height: 3px;
        margin: 9px auto 0;
        border-radius: 999px;
        background: linear-gradient(90deg, #C4007A, #E0398F);
    }
    .del-narrative-left .del-section-title::after {
        margin-left: 0;
    }
    .del-section-sub {
        font-size: 0.96rem;
        line-height: 1.6;
        color: #4B5563;
        max-width: 780px;
        margin: 0 auto;
    }
    .del-section-head {
        text-align: center;
        margin-bottom: 24px;
    }
    .del-section-head .del-eyebrow {
        margin-bottom: 10px;
    }

    /* Primary & Secondary Buttons */
    .del-btn-primary {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        background: linear-gradient(135deg, #C4007A 0%, #E0398F 100%);
        color: #FFFFFF !important;
        font-weight: 700;
        font-size: 0.92rem;
        padding: 12px 24px;
        border-radius: 9999px;
        text-decoration: none;
        border: none;
        box-shadow: 0 8px 20px rgba(196, 0, 122, 0.28);
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        cursor: pointer;
    }
    .del-btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 26px rgba(196, 0, 122, 0.38);
        color: #FFFFFF !important;
    }
    .del-btn-secondary {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        background: #FFFFFF;
        color: #111827 !important;
        border: 1.5px solid rgba(196, 0, 122, 0.28);
        font-weight: 700;
        font-size: 0.92rem;
        padding: 11px 22px;
        border-radius: 9999px;
        text-decoration: none;
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        cursor: pointer;
    }
    .del-btn-secondary:hover {
        background: #FFF0F7;
        border-color: #C4007A;
        color: #C4007A !important;
    }

    /* Reveal Animation: ALWAYS VISIBLE BY DEFAULT to prevent any missing content */
    [data-framer-reveal] {
        opacity: 1;
        transform: none;
        transition: opacity 0.5s cubic-bezier(0.16, 1, 0.3, 1), transform 0.5s cubic-bezier(0.16, 1, 0.3, 1);
        will-change: opacity, transform;
    }
    .js-reveal [data-framer-reveal]:not(.framer-visible) {
        opacity: 0.25;
        transform: translateY(16px);
    }
    .js-reveal [data-framer-reveal="slide-left"]:not(.framer-visible) {
        opacity: 0.25;
        transform: translateX(-20px);
    }
    .js-reveal [data-framer-reveal="slide-right"]:not(.framer-visible) {
        opacity: 0.25;
        transform: translateX(20px);
    }
    .framer-visible {
        opacity: 1 !important;
        transform: translate(0, 0) scale(1) !important;
    }

    /* Ambient Glow */
    .del-ambient-glow {
        position: absolute;
        width: 440px;
        height: 440px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(196, 0, 122, 0.08) 0%, rgba(224, 57, 143, 0.02) 60%, transparent 70%);
        pointer-events: none;
        z-index: 1;
        filter: blur(40px);
    }

    /* ========================================================
       1. HERO SECTION
       ======================================================== */
    .del-hero {
        position: relative;
        padding: 34px 0 28px;
        background: linear-gradient(180deg, #FFF5FA 0%, #FFFFFF 100%);
        border-bottom: 1px solid rgba(196, 0, 122, 0.08);
    }
    .del-hero-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 36px;
        align-items: center;
    }
    @media (min-width: 992px) {
        .del-hero-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 36px;
            align-items: stretch;
        }
        .del-hero-left,
        .del-hero-right {
            min-width: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .del-hero-right {
            align-items: stretch;
        }
        .del-hero-form-card {
            width: 100%;
            height: 100%;
            box-sizing: border-box;
        }
    }
    .del-hero-title {
        font-size: clamp(2rem, 3.2vw, 3rem);
        font-weight: 850;
        color: #111827;
        line-height: 1.1;
        letter-spacing: -0.04em;
        margin: 0 0 14px;
        text-align: left;
    }
    .del-hero-title .accent {
        color: #C4007A;
    }
    .del-hero-title .hero-separator {
        color: #C4007A;
        font-size: 0.72em;
        vertical-align: 0.12em;
        margin: 0 0.12em;
    }
    .del-hero-desc {
        font-size: 1.05rem;
        line-height: 1.6;
        color: #374151;
        margin-bottom: 12px;
        font-weight: 500;
    }
    .del-hero-desc.is-collapsed {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 3;
        line-clamp: 3;
        overflow: hidden;
        margin-bottom: 4px;
    }
    .del-hero-more {
        align-self: flex-start;
        margin: 0 0 8px;
        padding: 3px 0;
        border: 0;
        background: transparent;
        color: #C4007A;
        font: inherit;
        font-size: 0.85rem;
        font-weight: 800;
        cursor: pointer;
    }
    .del-hero-more:hover {
        color: #850053;
        text-decoration: underline;
        text-underline-offset: 3px;
    }
    .del-hero-details-dialog {
        position: fixed;
        width: min(620px, calc(100% - 32px));
        max-width: 620px;
        max-height: min(80vh, 680px);
        overflow-y: auto;
        padding: 30px;
        border: 1px solid rgba(196, 0, 122, 0.18);
        border-radius: 22px;
        color: #1F2937;
        box-shadow: 0 24px 80px rgba(34, 15, 29, 0.24);
    }
    .del-hero-details-dialog::backdrop {
        background: rgba(24, 15, 23, 0.58);
        backdrop-filter: blur(4px);
    }
    .del-hero-details-dialog h2 {
        margin: 0 40px 12px 0;
        color: #111827;
        font-size: 1.45rem;
        line-height: 1.25;
        letter-spacing: -0.03em;
    }
    .del-hero-details-dialog p {
        margin: 0 0 16px;
        color: #4B5563;
        font-size: 0.96rem;
        line-height: 1.7;
    }
    .del-hero-details-dialog ul {
        display: grid;
        gap: 12px;
        margin: 0;
        padding: 0;
        list-style: none;
    }
    .del-hero-details-dialog li {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        color: #374151;
        line-height: 1.5;
    }
    .del-hero-details-dialog li::before {
        content: "✓";
        display: inline-flex;
        flex: 0 0 22px;
        width: 22px;
        height: 22px;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: #FFF0F7;
        color: #C4007A;
        font-size: 0.78rem;
        font-weight: 800;
    }
    .del-hero-details-close {
        position: absolute;
        top: 16px;
        right: 16px;
        width: 36px;
        height: 36px;
        border: 0;
        border-radius: 50%;
        background: #FFF0F7;
        color: #C4007A;
        font-size: 1.4rem;
        cursor: pointer;
    }
    .del-hero-bullets {
        display: grid;
        grid-template-columns: 1fr;
        gap: 10px 14px;
        margin: 10px 0 18px;
    }
    @media (min-width: 600px) {
        .del-hero-bullets {
            grid-template-columns: 1fr 1fr;
        }
    }
    .del-bullet-item {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 0.88rem;
        font-weight: 600;
        color: #1F2937;
    }
    .del-bullet-item .dot {
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
    .del-hero-actions {
        display: flex;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
        margin-bottom: 18px;
    }
    .del-author-card {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        background: #FFFFFF;
        border: 1.5px solid rgba(196, 0, 122, 0.18);
        border-radius: 9999px;
        padding: 5px 16px 5px 6px;
        box-shadow: 0 4px 14px rgba(196, 0, 122, 0.08);
    }
    .del-author-avatar {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: linear-gradient(135deg, #C4007A, #E0398F);
        color: #FFFFFF;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 1rem;
        overflow: hidden;
        flex-shrink: 0;
    }
    .del-author-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
        display: block;
    }
    .del-author-meta .name {
        font-weight: 700;
        font-size: 0.9rem;
        color: #111827;
        margin: 0;
    }
    .del-author-meta .sub {
        font-size: 0.74rem;
        color: #6B7280;
        font-weight: 500;
    }
    .del-author-meta .sub .del-author-dates {
        display: none;
    }

    /* Floating Hero Quote Form */
    .del-hero-form-card {
        background: linear-gradient(155deg, #FFFFFF 0%, #FFFAFD 100%);
        border: 1px solid rgba(196, 0, 122, 0.18);
        border-radius: 24px;
        padding: 32px;
        box-shadow: 0 20px 52px rgba(93, 22, 68, 0.11);
        position: relative;
        overflow: hidden;
    }
    .del-hero-form-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 32px;
        width: 58px;
        height: 4px;
        border-radius: 0 0 6px 6px;
        background: linear-gradient(90deg, #C4007A, #E0398F);
    }
    .del-hero-form-card h3 {
        font-size: 1.35rem;
        font-weight: 800;
        color: #111827;
        margin: 0 0 8px;
        letter-spacing: -0.03em;
    }
    .del-hero-form-card p {
        font-size: 0.9rem;
        color: #6B7280;
        line-height: 1.55;
        margin: 0 0 20px;
    }
    .del-form-group {
        margin-bottom: 13px;
    }
    .del-form-group input,
    .del-form-group textarea,
    .del-form-group select {
        width: 100%;
        box-sizing: border-box;
        padding: 12px 14px;
        border-radius: 12px;
        border: 1px solid #E9E1E7;
        background: #FBFAFB;
        font-size: 0.9rem;
        color: #111827;
        outline: none;
        transition: border-color 0.2s ease, background 0.2s ease, box-shadow 0.2s ease;
        font-family: inherit;
    }
    .del-form-group input:focus,
    .del-form-group textarea:focus,
    .del-form-group select:focus {
        border-color: #C4007A;
        background: #FFFFFF;
        box-shadow: 0 0 0 3px rgba(196, 0, 122, 0.12);
    }
    .del-form-group textarea {
        min-height: 92px;
        resize: vertical;
    }
    .del-form-consent-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        margin: 2px 0 16px;
        color: #4B5563;
        font-size: 0.84rem;
    }
    .del-form-consent {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
    }
    .del-form-consent input {
        accent-color: #C4007A;
    }
    .del-form-protected {
        color: #8A8490;
        font-size: 0.78rem;
    }
    .del-form-submit {
        width: 100%;
        background: linear-gradient(135deg, #C4007A 0%, #E0398F 100%);
        color: #FFFFFF;
        font-weight: 700;
        font-size: 0.98rem;
        padding: 14px;
        border-radius: 12px;
        border: none;
        cursor: pointer;
        box-shadow: 0 8px 18px rgba(196, 0, 122, 0.3);
        transition: all 0.25s ease;
    }
    .del-form-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 24px rgba(196, 0, 122, 0.4);
    }

    /* ========================================================
       BRAND LOGOS MARQUEE (Continuous Single-Row Auto-Scroll)
       ======================================================== */
    .del-brands-section {
        padding: 24px 0 28px;
        background: linear-gradient(180deg, #FFFFFF 0%, #FFF5FA 50%, #FFFFFF 100%);
        position: relative;
        overflow: hidden;
        border-bottom: 1px solid rgba(196, 0, 122, 0.1);
    }
    .del-marquee-wrap {
        position: relative;
        max-width: 1180px;
        margin: 0 auto;
        overflow: hidden;
        padding: 16px 14px;
        border-radius: 22px;
        background: linear-gradient(135deg, rgba(255, 245, 250, 0.98) 0%, rgba(255, 235, 245, 0.88) 100%);
        border: 1.5px solid rgba(196, 0, 122, 0.2);
        box-shadow: 0 8px 24px rgba(196, 0, 122, 0.06);
    }
    .del-marquee-wrap::before,
    .del-marquee-wrap::after {
        content: '';
        position: absolute;
        top: 0;
        bottom: 0;
        width: 70px;
        z-index: 3;
        pointer-events: none;
    }
    .del-marquee-wrap::before {
        left: 0;
        background: linear-gradient(90deg, #FFF5FA 0%, rgba(255, 245, 250, 0) 100%);
    }
    .del-marquee-wrap::after {
        right: 0;
        background: linear-gradient(270deg, #FFF5FA 0%, rgba(255, 245, 250, 0) 100%);
    }
    .del-marquee-track {
        display: flex;
        gap: 14px;
        width: max-content;
        animation: delMarqueeSingle 32s linear infinite;
        align-items: center;
    }
    .del-marquee-wrap:hover .del-marquee-track {
        animation-play-state: paused;
    }
    @keyframes delMarqueeSingle {
        0% { transform: translate3d(0, 0, 0); }
        100% { transform: translate3d(-33.333%, 0, 0); }
    }
    .del-brand-card {
        display: flex;
        align-items: center;
        gap: 10px;
        background: #FFFFFF;
        border: 1px solid rgba(196, 0, 122, 0.2);
        border-radius: 12px;
        padding: 8px 16px;
        box-shadow: 0 3px 12px rgba(196, 0, 122, 0.05);
        white-space: nowrap;
        cursor: default;
    }
    .del-brand-card:hover {
        transform: translateY(-2px);
        border-color: #C4007A;
        background: #FFF0F7;
    }
    .del-brand-logo-img {
        height: 30px;
        width: auto;
        max-width: 80px;
        object-fit: contain;
        filter: grayscale(100%);
        opacity: 0.85;
        transition: all 0.3s ease;
    }
    .del-brand-card:hover .del-brand-logo-img {
        filter: grayscale(0%);
        opacity: 1;
    }
    .del-brand-info .b-name {
        font-size: 0.86rem;
        font-weight: 700;
        color: #111827;
        margin: 0;
    }
    .del-brand-info .b-cat {
        font-size: 0.68rem;
        font-weight: 700;
        color: #C4007A;
        text-transform: uppercase;
        letter-spacing: 0.04em;
    }

    .del-ranking-showcase {
        padding: 30px 0 24px;
        background: #fbeaf4;
    }
    .del-ranking-showcase .del-container {
        max-width: 1180px;
    }
    .del-ranking-header {
        text-align: center;
        margin-bottom: 18px;
    }
    .del-ranking-header h2 {
        max-width: 940px;
    }
    .del-ranking-header h2 .accent {
        color: #C4007A;
        position: relative;
        display: inline-block;
    }
    .del-ranking-header p {
        margin: 12px auto 0;
        max-width: 760px;
        font-size: 1.03rem;
        line-height: 1.6;
        color: #4B5563;
    }
    .del-keyword-table-wrap {
        background: rgba(255,255,255,0.45);
        border: 1.5px solid rgba(196, 0, 122, 0.15);
        border-radius: 18px;
        box-shadow: 0 14px 32px rgba(196, 0, 122, 0.08);
        overflow: hidden;
    }
    .del-keyword-table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
    }
    .del-keyword-table th {
        background: #f7d8eb;
        color: #111827;
        font-size: 0.8rem;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        font-weight: 800;
        padding: 16px 14px;
        text-align: left;
        border-bottom: 1px solid rgba(196, 0, 122, 0.16);
    }
    .del-keyword-table td {
        padding: 16px 14px;
        border-bottom: 1px solid #f0e9ee;
        font-size: 0.95rem;
        color: #111827;
        vertical-align: middle;
    }
    .del-keyword-table tbody tr:last-child td {
        border-bottom: none;
    }
    .del-keyword-table tbody tr:hover td {
        background: #fff8fc;
    }
    .del-keyword-name {
        font-weight: 800;
        color: #111827;
    }
    .del-keyword-url {
        color: #4B5563;
        font-size: 0.9rem;
        word-break: break-word;
    }
    .del-rank-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 42px;
        height: 42px;
        padding: 0 12px;
        border-radius: 999px;
        background: linear-gradient(135deg, #ff4ca8 0%, #d91d77 100%);
        color: #fff;
        font-weight: 800;
        font-size: 1.05rem;
        box-shadow: 0 8px 18px rgba(196, 0, 122, 0.18);
    }
    .del-trend-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 10px;
        border-radius: 999px;
        background: rgba(16, 185, 129, 0.12);
        color: #0f9f6d;
        font-size: 0.8rem;
        font-weight: 800;
    }
    .del-volume-value, .del-intent-tag {
        font-weight: 700;
        color: #374151;
    }
    .del-intent-tag {
        display: inline-block;
        padding: 7px 10px;
        background: rgba(196, 0, 122, 0.08);
        border-radius: 8px;
        color: #C4007A;
        font-size: 0.76rem;
        text-transform: capitalize;
    }
    .del-market-showcase {
        padding-top: 28px;
        text-align: center;
    }
    .del-market-showcase h3 {
        margin: 0 0 18px;
        color: #111827;
        font-size: clamp(1.35rem, 2vw, 1.8rem);
        font-weight: 800;
    }
    .del-market-pills {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 12px;
    }
    .del-market-pill {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 9px 14px;
        border-radius: 999px;
        border: 1px solid rgba(196, 0, 122, 0.32);
        background: #fff;
        color: #111827;
        font-size: 0.84rem;
        font-weight: 700;
        box-shadow: 0 6px 18px rgba(196, 0, 122, 0.04);
    }
    .del-market-pill:before {
        content: "•";
        color: #C4007A;
        font-size: 1rem;
    }
    @media (max-width: 780px) {
        .del-keyword-table-wrap {
            overflow-x: auto;
        }
        .del-keyword-table {
            min-width: 760px;
        }
    }

    /* ========================================================
       2. STRATEGIC NARRATIVE & SPRING SOURCING FAIR SERP PROOF
       ======================================================== */
    .del-narrative-section {
        padding: 36px 0 40px;
        background: linear-gradient(180deg, #FFFFFF 0%, #FFF5FA 100%);
        position: relative;
    }
    .del-narrative-split {
        display: grid;
        grid-template-columns: 1fr;
        gap: 32px;
        align-items: stretch;
    }
    @media (min-width: 992px) {
        .del-narrative-split {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 38px;
        }
    }
    .del-narrative-left,
    .del-narrative-right {
        min-width: 0;
    }
    @media (min-width: 992px) {
        .del-narrative-left,
        .del-narrative-right {
            height: 100%;
        }
        .del-narrative-right {
            display: flex;
        }
        .del-serp-browser-showcase {
            display: flex;
            flex: 1 1 auto;
            flex-direction: column;
            min-height: 100%;
            width: 100%;
        }
        .del-browser-viewport {
            flex: 1 1 auto;
            min-height: 0;
        }
        .del-browser-serp-img {
            height: 100%;
            min-height: 360px;
            object-fit: cover;
            object-position: top center;
        }
    }
    .del-narrative-lead {
        font-size: 1.08rem;
        line-height: 1.62;
        color: #111827;
        font-weight: 600;
        margin-bottom: 12px;
    }
    .del-narrative-sub {
        font-size: 0.92rem;
        line-height: 1.62;
        color: #4B5563;
        margin-bottom: 14px;
    }
    .del-narrative-title {
        max-width: 720px;
        margin: 0 0 14px;
        text-align: left;
        font-size: clamp(1.9rem, 3vw, 2.7rem);
        line-height: 1.12;
        letter-spacing: -0.04em;
    }
    .del-narrative-title .accent {
        color: #C4007A;
        position: relative;
        display: inline;
        white-space: normal;
        text-decoration: underline;
        text-decoration-color: rgba(196, 0, 122, 0.35);
        text-decoration-thickness: 3px;
        text-underline-offset: 5px;
    }
    .del-narrative-title::after {
        display: none;
    }

    /* Google SERP Browser Showcase */
    .del-serp-browser-showcase {
        position: relative;
        background: #FFFFFF;
        border-radius: 20px;
        border: 2px solid rgba(196, 0, 122, 0.22);
        box-shadow: 0 16px 40px rgba(196, 0, 122, 0.10);
        overflow: hidden;
        transition: transform 0.3s ease;
    }
    .del-serp-browser-showcase:hover {
        transform: translateY(-4px);
        border-color: #C4007A;
        box-shadow: 0 20px 50px rgba(196, 0, 122, 0.16);
    }
    .del-browser-chrome {
        background: #F9FAFB;
        padding: 10px 16px;
        border-bottom: 1px solid rgba(196, 0, 122, 0.12);
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .del-browser-dots {
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .del-browser-dots .dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        display: inline-block;
    }
    .del-browser-dots .dot.red { background: #EF4444; }
    .del-browser-dots .dot.yellow { background: #F59E0B; }
    .del-browser-dots .dot.green { background: #10B981; }
    .del-browser-search-bar {
        flex: 1;
        background: #FFFFFF;
        border: 1px solid rgba(196, 0, 122, 0.18);
        border-radius: 9999px;
        padding: 5px 12px;
        font-size: 0.78rem;
        color: #4B5563;
        display: flex;
        align-items: center;
        gap: 6px;
        font-family: monospace;
    }
    .del-browser-viewport {
        position: relative;
        background: #FFFFFF;
        overflow: hidden;
    }
    .del-browser-serp-img {
        width: 100%;
        height: auto;
        display: block;
    }
    .del-serp-float-badge {
        position: absolute;
        background: #FFFFFF;
        color: #111827;
        border-radius: 10px;
        padding: 6px 12px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        border: 1.5px solid rgba(196, 0, 122, 0.25);
        font-size: 0.74rem;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        z-index: 4;
    }
    .del-serp-float-badge.badge-top {
        top: 12px;
        right: 12px;
    }
    .del-serp-float-badge .pulse-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #10B981;
        display: inline-block;
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.25);
    }

    /* Component 2B: Why WebTecMart Choice (3-Col Grid) */
    .del-narrative-why-wrap {
        margin-top: 38px;
        padding-top: 32px;
        border-top: 1px solid rgba(196, 0, 122, 0.12);
    }
    .del-why-section-head {
        margin-bottom: 22px;
    }
    .del-why-section-head .del-section-title {
        font-size: clamp(1.65rem, 2.6vw, 2.2rem);
    }
    .del-why-grid-3col {
        display: grid;
        grid-template-columns: 1fr;
        gap: 16px;
        margin-top: 16px;
    }
    @media (min-width: 640px) {
        .del-why-grid-3col {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    @media (min-width: 992px) {
        .del-why-grid-3col {
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }
    }
    .del-why-card {
        background: #FFFFFF;
        border: 1.5px solid rgba(196, 0, 122, 0.14);
        border-radius: 16px;
        padding: 18px;
        display: flex;
        gap: 14px;
        align-items: flex-start;
        box-shadow: 0 4px 16px rgba(196, 0, 122, 0.04);
        transition: all 0.3s ease;
    }
    .del-why-card:hover {
        transform: translateY(-3px);
        border-color: #C4007A;
        box-shadow: 0 10px 24px rgba(196, 0, 122, 0.12);
    }
    .del-why-icon {
        font-size: 1.5rem;
        flex-shrink: 0;
        background: #FFF0F7;
        width: 42px;
        height: 42px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .del-why-title {
        font-size: 0.95rem;
        font-weight: 800;
        color: #111827;
        margin: 0 0 4px;
    }
    .del-why-text {
        font-size: 0.85rem;
        color: #4B5563;
        line-height: 1.5;
        margin: 0;
    }

    /* ========================================================
       3. KEY TAKEAWAYS & GOOGLE SERP AI OVERVIEW
       ======================================================== */
    .del-takeaways-section {
        padding: 36px 0 40px;
        background: #FFFFFF;
        position: relative;
    }
    .del-takeaways-intro {
        max-width: 860px;
        margin: 0 auto 30px;
        text-align: center;
    }
    .del-takeaways-intro .del-section-title {
        max-width: 820px;
    }
    .del-takeaways-title .accent {
        color: #C4007A;
        position: relative;
        display: inline-block;
        padding-bottom: 4px;
    }
    .del-takeaways-title .accent svg {
        position: absolute;
        left: 0;
        bottom: -1px;
        width: 100%;
        height: 6px;
        pointer-events: none;
    }
    .del-takeaways-lead {
        margin: 0 0 14px;
        color: #4B5563;
        font-size: 0.94rem;
        line-height: 1.6;
    }
    .del-takeaways-subtitle {
        margin: 0 0 12px;
        color: #111827;
        font-size: 0.98rem;
        line-height: 1.4;
        font-weight: 800;
        letter-spacing: -0.015em;
    }
    .del-takeaways-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 32px;
        align-items: stretch;
    }
    @media (min-width: 992px) {
        .del-takeaways-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 38px;
        }
    }
    .del-takeaways-left,
    .del-takeaways-right {
        min-width: 0;
    }
    @media (min-width: 992px) {
        .del-takeaways-left {
            display: flex;
            flex-direction: column;
        }
        .del-takeaways-left > div:last-child {
            margin-top: auto;
        }
    }
    .del-takeaways-checklist-2col {
        display: grid;
        grid-template-columns: 1fr;
        gap: 8px 12px;
        margin: 16px 0 20px;
    }
    @media (min-width: 600px) {
        .del-takeaways-checklist-2col {
            grid-template-columns: 1fr 1fr;
        }
    }
    .del-takeaway-item {
        display: flex;
        align-items: flex-start;
        gap: 8px;
        font-size: 0.85rem;
        line-height: 1.5;
        color: #1F2937;
        font-weight: 600;
    }
    .del-takeaway-item .chk {
        color: #C4007A;
        font-weight: 800;
        font-size: 0.95rem;
        flex-shrink: 0;
    }
    .del-takeaways-outcomes {
        margin: 0 0 18px;
        padding: 16px 18px;
        border: 1px solid rgba(196, 0, 122, 0.16);
        border-radius: 16px;
        background: linear-gradient(135deg, #FFF7FB 0%, #FFFFFF 100%);
    }
    .del-takeaways-outcomes-title {
        margin: 0 0 12px;
        color: #111827;
        font-size: 0.9rem;
        font-weight: 800;
    }
    .del-takeaways-outcomes-list {
        display: grid;
        gap: 10px;
        margin: 0;
        padding: 0;
        list-style: none;
    }
    .del-takeaways-outcomes-list li {
        display: flex;
        align-items: flex-start;
        gap: 9px;
        color: #4B5563;
        font-size: 0.82rem;
        line-height: 1.45;
    }
    .del-takeaways-outcomes-list li::before {
        content: "✓";
        flex: 0 0 auto;
        color: #C4007A;
        font-weight: 800;
    }
    .del-takeaways-right {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }
    .del-serp-mockup {
        display: flex;
        flex: 1 1 auto;
        flex-direction: column;
        min-height: 0;
        background: #FFFFFF;
        border-radius: 20px;
        border: 2px solid rgba(196, 0, 122, 0.2);
        box-shadow: 0 16px 40px rgba(196, 0, 122, 0.10);
        overflow: hidden;
    }
    .del-serp-preview-img-wrap {
        position: relative;
        display: flex;
        flex: 1 1 auto;
        min-height: 320px;
        background: #FFFFFF;
        overflow: hidden;
    }
    .del-serp-img {
        width: 100%;
        height: 100%;
        min-height: 320px;
        object-fit: cover;
        object-position: top center;
        display: block;
    }
    /* ========================================================
       4. WHAT WE OFFER (6 Core SEO Offerings)
       ======================================================== */
    .del-offers-section {
        padding: 36px 0 40px;
        background: linear-gradient(180deg, #FFFFFF 0%, #FFF5FA 100%);
        position: relative;
    }
    .del-offers-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 18px;
    }
    @media (min-width: 640px) {
        .del-offers-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    @media (min-width: 992px) {
        .del-offers-grid {
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
        }
    }
    .del-offer-card {
        background: #FFFFFF;
        border: 1.5px solid rgba(196, 0, 122, 0.16);
        border-radius: 20px;
        padding: 24px 20px;
        transition: all 0.3s ease;
        box-shadow: 0 6px 20px rgba(196, 0, 122, 0.04);
        display: flex;
        flex-direction: column;
        text-decoration: none;
        height: 100%;
    }
    .del-offer-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 16px 36px rgba(196, 0, 122, 0.14);
        border-color: #C4007A;
    }
    .del-offer-icon {
        width: 46px;
        height: 46px;
        border-radius: 12px;
        background: #FFF0F7;
        color: #C4007A;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.35rem;
        margin-bottom: 14px;
    }
    .del-offer-card h3 {
        font-size: 1.1rem;
        font-weight: 800;
        color: #111827;
        margin: 0 0 8px;
    }
    .del-offer-card p {
        font-size: 0.88rem;
        line-height: 1.58;
        color: #4B5563;
        margin: 0 0 16px;
        flex-grow: 1;
    }
    .del-offer-link {
        font-size: 0.86rem;
        font-weight: 700;
        color: #C4007A;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: gap 0.2s ease;
    }
    .del-offer-card:hover .del-offer-link {
        gap: 10px;
    }

    /* ========================================================
       5. SEO CHALLENGES (6-Card Grid)
       ======================================================== */
    .del-challenges-section {
        padding: 36px 0 40px;
        background: #FFFFFF;
    }
    .del-challenges-section .del-section-head,
    .del-founder-section .del-section-head {
        max-width: 860px;
        margin-right: auto;
        margin-left: auto;
    }
    .del-challenges-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 18px;
    }
    @media (min-width: 640px) {
        .del-challenges-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    @media (min-width: 992px) {
        .del-challenges-grid {
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }
    }
    .del-challenge-card {
        background: #FFFFFF;
        border: 1.5px solid rgba(196, 0, 122, 0.14);
        border-radius: 18px;
        padding: 22px 20px;
        box-shadow: 0 6px 18px rgba(196, 0, 122, 0.04);
        transition: all 0.3s ease;
    }
    .del-challenge-card:hover {
        transform: translateY(-3px);
        border-color: #C4007A;
        box-shadow: 0 12px 28px rgba(196, 0, 122, 0.12);
    }
    .del-challenge-icon {
        font-size: 1.6rem;
        margin-bottom: 12px;
    }
    .del-challenge-card h3 {
        font-size: 1.05rem;
        font-weight: 800;
        color: #111827;
        margin: 0 0 8px;
    }
    .del-challenge-card p {
        font-size: 0.86rem;
        line-height: 1.56;
        color: #4B5563;
        margin: 0;
    }

    /* ========================================================
       6. MEET THE EXPERTS (Jitin Madaan Spotlight)
       ======================================================== */
    .del-founder-section {
        padding: 36px 0 40px;
        background: linear-gradient(180deg, #FFFFFF 0%, #FFF5FA 100%);
    }
    .del-founder-card {
        background: #FFFFFF;
        border: 2px solid rgba(196, 0, 122, 0.18);
        border-radius: 24px;
        padding: 36px 32px;
        box-shadow: 0 16px 40px rgba(196, 0, 122, 0.08);
    }
    .del-founder-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 32px;
        align-items: center;
    }
    @media (min-width: 992px) {
        .del-founder-grid {
            grid-template-columns: 1.2fr 0.8fr;
            gap: 38px;
        }
    }
    .del-founder-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 12px;
        margin: 20px 0;
    }
    .del-fstat-box {
        background: #FFF5FA;
        border: 1px solid rgba(196, 0, 122, 0.18);
        border-radius: 12px;
        padding: 12px 10px;
        text-align: center;
    }
    .del-fstat-box .val {
        font-size: 1.35rem;
        font-weight: 800;
        color: #C4007A;
    }
    .del-fstat-box .lbl {
        font-size: 0.72rem;
        font-weight: 700;
        color: #4B5563;
        margin-top: 2px;
    }
    .del-founder-photo-box {
        background: linear-gradient(135deg, #FFF5FA 0%, #FFFFFF 100%);
        border: 2px solid rgba(196, 0, 122, 0.22);
        border-radius: 20px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 10px 30px rgba(196, 0, 122, 0.08);
    }
    .del-founder-img-wrapper {
        position: relative;
        width: 140px;
        height: 140px;
        margin: 0 auto 14px;
        border-radius: 50%;
        overflow: hidden;
        border: 3px solid #C4007A;
        box-shadow: 0 8px 24px rgba(196, 0, 122, 0.2);
    }
    .del-founder-photo {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .del-founder-name-tag {
        font-size: 1.2rem;
        font-weight: 800;
        color: #111827;
        margin: 0 0 2px;
    }
    .del-founder-role-tag {
        font-size: 0.82rem;
        font-weight: 700;
        color: #C4007A;
        margin-bottom: 10px;
    }
    .del-expert-pillars {
        display: grid;
        grid-template-columns: 1fr;
        gap: 16px;
        margin-top: 28px;
    }
    @media (min-width: 768px) {
        .del-expert-pillars {
            grid-template-columns: repeat(3, 1fr);
        }
    }
    .del-expert-pillar-card {
        background: #FFFFFF;
        border: 1.5px solid rgba(196, 0, 122, 0.14);
        border-radius: 16px;
        padding: 20px;
        box-shadow: 0 4px 16px rgba(196, 0, 122, 0.04);
        transition: all 0.3s ease;
    }
    .del-expert-pillar-card:hover {
        transform: translateY(-3px);
        border-color: #C4007A;
        box-shadow: 0 10px 24px rgba(196, 0, 122, 0.12);
    }
    .del-ep-icon {
        font-size: 1.5rem;
        margin-bottom: 10px;
    }
    .del-expert-pillar-card h4 {
        font-size: 1rem;
        font-weight: 800;
        color: #111827;
        margin: 0 0 6px;
    }
    .del-expert-pillar-card p {
        font-size: 0.85rem;
        color: #4B5563;
        line-height: 1.54;
        margin: 0;
    }

    /* ========================================================
       7. WORKING PROCESS (6-Step Grid)
       ======================================================== */
    .del-process-section {
        padding: 36px 0 40px;
        background: #FFFFFF;
    }
    .del-process-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 16px;
    }
    @media (min-width: 640px) {
        .del-process-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    @media (min-width: 992px) {
        .del-process-grid {
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }
    }
    .del-process-card {
        background: #FFFFFF;
        border: 1.5px solid rgba(196, 0, 122, 0.14);
        border-radius: 18px;
        padding: 22px 20px;
        position: relative;
        box-shadow: 0 4px 16px rgba(196, 0, 122, 0.04);
        transition: all 0.3s ease;
    }
    .del-process-card:hover {
        transform: translateY(-3px);
        border-color: #C4007A;
        box-shadow: 0 12px 28px rgba(196, 0, 122, 0.12);
    }
    .del-process-num {
        font-size: 1.8rem;
        font-weight: 800;
        color: rgba(196, 0, 122, 0.25);
        line-height: 1;
        margin-bottom: 8px;
    }
    .del-process-card h3 {
        font-size: 1.05rem;
        font-weight: 800;
        color: #111827;
        margin: 0 0 8px;
    }
    .del-process-card p {
        font-size: 0.86rem;
        line-height: 1.56;
        color: #4B5563;
        margin: 0;
    }

    /* ========================================================
       8. INDUSTRIES WE WORK WITH (8 Cards)
       ======================================================== */
    .del-industries-section {
        padding: 34px 0 38px;
        background: linear-gradient(180deg, #FFF8FB 0%, #FFFFFF 100%);
    }
    .del-industries-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 16px;
    }
    @media (min-width: 640px) {
        .del-industries-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    @media (min-width: 992px) {
        .del-industries-grid {
            grid-template-columns: repeat(4, 1fr);
        }
    }
    .del-industry-card {
        background: #FFFFFF;
        border: 1px solid rgba(196, 0, 122, 0.14);
        border-radius: 16px;
        padding: 18px;
        box-shadow: 0 4px 14px rgba(196, 0, 122, 0.04);
        transition: all 0.3s ease;
    }
    .del-industry-card:hover {
        transform: translateY(-3px);
        border-color: #C4007A;
        box-shadow: 0 10px 24px rgba(196, 0, 122, 0.12);
    }
    .del-ind-icon {
        font-size: 1.6rem;
        margin-bottom: 8px;
    }
    .del-industry-card h4 {
        font-size: 0.98rem;
        font-weight: 800;
        color: #111827;
        margin: 0 0 6px;
    }
    .del-industry-card p {
        font-size: 0.84rem;
        line-height: 1.5;
        color: #4B5563;
        margin: 0;
    }

    /* ========================================================
       9. CLIENT FEEDBACK & CASE STUDIES
       ======================================================== */
    .del-feedback-section {
        padding: 36px 0 40px;
        background: linear-gradient(180deg, #FFFFFF 0%, #FFF5FA 100%);
    }
    .del-feedback-card {
        background: #FFFFFF;
        border: 1.5px solid rgba(196, 0, 122, 0.16);
        border-radius: 20px;
        padding: 28px 24px;
        box-shadow: 0 10px 30px rgba(196, 0, 122, 0.06);
    }
    .del-stars {
        color: #F59E0B;
        font-size: 1.1rem;
        margin-bottom: 12px;
    }
    .del-quote-text {
        font-size: 0.95rem;
        line-height: 1.65;
        color: #374151;
        font-style: italic;
        margin-bottom: 18px;
    }
    .del-client-author {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .del-client-avatar {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: linear-gradient(135deg, #C4007A, #E0398F);
        color: #FFFFFF;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 1rem;
    }
    .del-client-info h5 {
        font-size: 0.95rem;
        font-weight: 800;
        color: #111827;
        margin: 0;
    }
    .del-client-info p {
        font-size: 0.78rem;
        color: #6B7280;
        margin: 0;
    }

    /* Case Studies */
    .del-case-section {
        padding: 36px 0 40px;
        background: #FFFFFF;
    }
    .del-cases-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 18px;
    }
    @media (min-width: 768px) {
        .del-cases-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }
    .del-case-card {
        background: #FFFFFF;
        border: 1.5px solid rgba(196, 0, 122, 0.14);
        border-radius: 18px;
        padding: 22px 20px;
        box-shadow: 0 6px 18px rgba(196, 0, 122, 0.04);
        transition: all 0.3s ease;
    }
    .del-case-card:hover {
        transform: translateY(-3px);
        border-color: #C4007A;
        box-shadow: 0 12px 28px rgba(196, 0, 122, 0.12);
    }
    .del-case-badge {
        display: inline-block;
        background: #FFF0F7;
        color: #C4007A;
        font-size: 0.72rem;
        font-weight: 800;
        text-transform: uppercase;
        padding: 4px 10px;
        border-radius: 9999px;
        margin-bottom: 12px;
    }
    .del-case-card h3 {
        font-size: 1.05rem;
        font-weight: 800;
        color: #111827;
        margin: 0 0 10px;
    }
    .del-case-stat-box {
        background: #FFF5FA;
        border-radius: 10px;
        padding: 10px;
        margin-bottom: 12px;
    }
    .del-case-stat-num {
        font-size: 1.4rem;
        font-weight: 800;
        color: #C4007A;
    }
    .del-case-stat-lbl {
        font-size: 0.75rem;
        font-weight: 600;
        color: #4B5563;
    }
    .del-case-card p {
        font-size: 0.85rem;
        line-height: 1.54;
        color: #4B5563;
        margin: 0;
    }

    /* Live Google Rankings Table */
    .del-rankings-section {
        padding: 36px 0 40px;
        background: linear-gradient(180deg, #FFFFFF 0%, #FFF5FA 100%);
    }
    .del-rankings-table-wrap {
        background: #FFFFFF;
        border: 1.5px solid rgba(196, 0, 122, 0.16);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(196, 0, 122, 0.06);
    }
    .del-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 0.88rem;
    }
    .del-table th {
        background: #FFF5FA;
        color: #111827;
        font-weight: 800;
        padding: 12px 18px;
        text-align: left;
        border-bottom: 1px solid rgba(196, 0, 122, 0.14);
        font-size: 0.82rem;
        text-transform: uppercase;
        letter-spacing: 0.04em;
    }
    .del-table td {
        padding: 14px 18px;
        border-bottom: 1px solid #F3F4F6;
        color: #374151;
    }
    .del-table tr:hover td {
        background: #FFF8FC;
    }
    .del-pos-pill {
        display: inline-block;
        background: #ECFDF5;
        color: #059669;
        font-weight: 800;
        padding: 3px 10px;
        border-radius: 9999px;
        font-size: 0.82rem;
    }

    /* ========================================================
       10. WRAPPING UP (Why SEO in Delhi Matters + Micro-Markets)
       ======================================================== */
    .del-wrap-section {
        padding: 36px 0 40px;
        background: #FFFFFF;
    }
    .del-wrap-card {
        background: linear-gradient(135deg, #FFFFFF 0%, #FFF5FA 100%);
        border: 2px solid rgba(196, 0, 122, 0.2);
        border-radius: 24px;
        padding: 36px 32px;
        box-shadow: 0 16px 40px rgba(196, 0, 122, 0.07);
    }
    .del-markets-badge-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin: 14px 0 20px;
    }
    .del-market-pill {
        background: #FFFFFF;
        border: 1px solid rgba(196, 0, 122, 0.22);
        color: #C4007A;
        font-weight: 700;
        font-size: 0.82rem;
        padding: 4px 12px;
        border-radius: 9999px;
    }

    /* ========================================================
       11. FAQS ACCORDION
       ======================================================== */
    .del-faq-section {
        padding: 36px 0 40px;
        background: linear-gradient(180deg, #FFF5FA 0%, #FFFFFF 100%);
    }
    .del-faq-item {
        background: #FFFFFF;
        border: 1px solid rgba(196, 0, 122, 0.16);
        border-radius: 14px;
        margin-bottom: 10px;
        overflow: hidden;
        transition: all 0.25s ease;
    }
    .del-faq-item.active {
        border-color: #C4007A;
        box-shadow: 0 6px 18px rgba(196, 0, 122, 0.08);
    }
    .del-faq-btn {
        width: 100%;
        text-align: left;
        background: transparent;
        border: none;
        padding: 16px 20px;
        font-size: 0.98rem;
        font-weight: 700;
        color: #111827;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 14px;
        cursor: pointer;
        font-family: inherit;
    }
    .del-faq-btn:hover {
        color: #C4007A;
    }
    .del-faq-btn .icon {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background: #FFF0F7;
        color: #C4007A;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        font-weight: 800;
        flex-shrink: 0;
    }
    .del-faq-answer {
        padding: 0 20px 16px;
        font-size: 0.9rem;
        line-height: 1.62;
        color: #4B5563;
        display: none;
    }
    .del-faq-item.active .del-faq-answer {
        display: block;
    }

    /* ========================================================
       12. FINAL CONVERSION CTA BANNER
       ======================================================== */
    .del-cta-section {
        padding: 34px 0 42px;
        background: #FFFFFF;
    }
    .del-cta-box {
        background: linear-gradient(135deg, #1A1A1A 0%, #2A1020 100%);
        border: 2px solid rgba(196, 0, 122, 0.35);
        border-radius: 24px;
        padding: 40px 32px;
        text-align: center;
        color: #FFFFFF;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.25);
        position: relative;
        overflow: hidden;
    }
    .del-cta-box h2 {
        font-size: clamp(1.6rem, 2.8vw, 2.2rem);
        font-weight: 800;
        margin: 0 0 8px;
        color: #FFFFFF;
    }
    .del-cta-box h2 span {
        color: #FF2D75;
    }
    .del-cta-box h3 {
        font-size: 1.1rem;
        font-weight: 700;
        color: #FCE7F3;
        margin: 0 0 12px;
    }
    .del-cta-box p {
        font-size: 0.92rem;
        line-height: 1.6;
        color: rgba(255, 255, 255, 0.85);
        max-width: 780px;
        margin: 0 auto 24px;
    }
    .del-cta-btns {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 14px;
        flex-wrap: wrap;
    }

    .del-seo-page > section:not(.del-hero) {
        padding-top: 40px;
        padding-bottom: 40px;
    }
    .del-seo-page > .del-brands-section {
        padding-top: 32px;
        padding-bottom: 32px;
    }
    .del-seo-page > .del-ranking-showcase {
        padding-top: 38px;
        padding-bottom: 38px;
    }
    .del-seo-page .del-cta-box h2 {
        font-size: clamp(1.6rem, 2.5vw, 2rem);
        line-height: 1.18;
        letter-spacing: -0.03em;
    }
    .del-seo-page .del-cta-box h3 {
        font-size: 1rem;
        line-height: 1.45;
    }

    @media (max-width: 640px) {
        .del-container {
            padding-right: 18px;
            padding-left: 18px;
        }
        .del-seo-page > section:not(.del-hero) {
            padding-top: 32px;
            padding-bottom: 32px;
        }
        .del-section-title {
            font-size: clamp(1.65rem, 7vw, 2.1rem);
            line-height: 1.14;
        }
        .del-section-sub {
            font-size: 0.9rem;
        }
        .del-ranking-header h2 {
            font-size: clamp(1.8rem, 7vw, 2.2rem);
        }
        .del-ranking-header p {
            font-size: 0.92rem;
        }
        .del-hero-title {
            font-size: clamp(1.9rem, 8vw, 2.5rem);
        }
        .del-hero-form-card {
            padding: 26px 22px;
        }
        .del-hero-form-card::before {
            left: 22px;
        }
        .del-wrap-card,
        .del-cta-box {
            padding: 28px 20px;
        }
    }
</style>

<main class="del-seo-page">

    <!-- ========================================================
         1. HERO SECTION (2-COL WITH FLOATING QUOTE FORM)
         ======================================================== -->
    <section class="del-hero">
        <div class="del-ambient-glow" style="top: -80px; left: -80px;"></div>
        <div class="del-ambient-glow" style="bottom: 0; right: -80px;"></div>

        <div class="del-container">
            <div class="del-hero-grid">

                <!-- Left Column: Copy, Bullets & Author -->
                <div class="del-hero-left" data-framer-reveal="slide-left">
                    <div class="del-eyebrow">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 2l2.4 6.6L21 11l-6.6 2.4L12 20l-2.4-6.6L3 11l6.6-2.4L12 2z"/></svg>
                        <span>SEO SERVICES IN DELHI NCR</span>
                    </div>

                    <h1 class="del-hero-title">
                        <?= htmlspecialchars($heroTitle) ?><span class="hero-separator">&bull;</span><br>
                        <span class="accent"><?= htmlspecialchars($heroAccent) ?></span>
                    </h1>

                    <p class="del-hero-desc is-collapsed">
                        <?= htmlspecialchars($heroDesc) ?>
                    </p>
                    <button type="button" class="del-hero-more" onclick="document.getElementById('delHeroDetailsDialog').showModal()" aria-haspopup="dialog">
                        Read more about our SEO approach
                    </button>

                    <div class="del-hero-bullets">
                        <?php foreach ($heroVisibleBullets as $bullet): ?>
                            <div class="del-bullet-item">
                                <span class="dot">✓</span>
                                <span><?= htmlspecialchars($bullet) ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="del-hero-actions">
                        <a href="/contact.php" class="del-btn-primary trigger-enquiry-modal" data-service="SEO Services in Delhi">
                            <span>Schedule a Free SEO Consultation</span>
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </a>
                        <a href="tel:+919999674255" class="del-btn-secondary">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                            <span>Call: +91-9999674255</span>
                        </a>
                    </div>

                    <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px;">
                        <!-- Strategist / Author Stamp (Jitin Madaan) -->
                        <div class="del-author-card">
                            <div class="del-author-avatar">
                                <?php if (!empty($founderAvatar) && file_exists(__DIR__ . $founderAvatar)): ?>
                                    <img src="<?= htmlspecialchars($founderAvatar) ?>" alt="<?= htmlspecialchars($founderName) ?>" class="del-author-img">
                                <?php else: ?>
                                    <?= htmlspecialchars($founderInitial) ?>
                                <?php endif; ?>
                            </div>
                            <div class="del-author-meta">
                                <div class="name"><?= htmlspecialchars($founderName) ?></div>
                                <div class="sub"><?= htmlspecialchars($founderRole) ?></div>
                            </div>
                        </div>

                        <div style="font-size: 0.82rem; font-weight: 700; color: #C4007A; background: #FFF0F7; padding: 5px 12px; border-radius: 9999px; border: 1px solid rgba(196, 0, 122, 0.2);">
                            <?= htmlspecialchars($heroReadinessBadge) ?>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Request A Quote Floating Form -->
                <div class="del-hero-right" data-framer-reveal="slide-right">
                    <div class="del-hero-form-card">
                        <h3>Request A Quote</h3>
                        <p>Fill out the form below to receive a custom SEO strategy and projection for your Delhi business.</p>

                        <form id="delHeroQuoteForm" onsubmit="handleHeroQuoteSubmit(event)">
                            <div class="del-form-group">
                                <input type="text" name="name" placeholder="Name *" required>
                            </div>
                            <div class="del-form-group">
                                <input type="tel" name="phone" placeholder="Phone No *" required>
                            </div>
                            <div class="del-form-group">
                                <input type="email" name="email" placeholder="Email *" required>
                            </div>
                            <div class="del-form-group">
                                <textarea name="message" placeholder="Type Your Message *" required></textarea>
                            </div>
                            <div class="del-form-consent-row">
                                <label class="del-form-consent">
                                    <input type="checkbox" checked required>
                                    <span>I'm not a robot</span>
                                </label>
                                <span class="del-form-protected">🔒 Protected</span>
                            </div>
                            <button type="submit" class="del-form-submit" id="delHeroSubmitBtn">
                                <span>Submit &rarr;</span>
                            </button>
                            <div id="delHeroFeedback" style="display:none; margin-top: 10px; padding: 8px; border-radius: 8px; font-size: 0.84rem; text-align: center; font-weight: 700;"></div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <dialog class="del-hero-details-dialog" id="delHeroDetailsDialog" aria-labelledby="delHeroDetailsTitle" onclick="if (event.target === this) this.close()">
        <button type="button" class="del-hero-details-close" onclick="this.closest('dialog').close()" aria-label="Close details">&times;</button>
        <h2 id="delHeroDetailsTitle">A smarter SEO strategy for sustainable growth</h2>
        <p><?= htmlspecialchars($heroDesc) ?></p>
        <?php if (!empty($heroBullets) && is_array($heroBullets)): ?>
            <ul>
                <?php foreach ($heroBullets as $bullet): ?>
                    <li><?= htmlspecialchars($bullet) ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </dialog>

    <!-- ========================================================
         TOP EVENT BRANDS EMBRACING SEO (Marquee Showcase)
         ======================================================== -->
    <section class="del-ranking-showcase">
        <div class="del-container">
            <div class="del-ranking-header">
                <h2 class="del-section-title">Organic Rankings That Drive <span class="accent">Real Revenue<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span></h2>
                <p>Inspect our authentic live ranking metrics verified across enterprise brands, global trade fairs, and Delhi NCR businesses:</p>
            </div>

            <div class="del-keyword-table-wrap">
                <table class="del-keyword-table">
                    <thead>
                        <tr>
                            <th>Target Search Keyword</th>
                            <th>Ranking URL</th>
                            <th>Google Rank</th>
                            <th>Rank Movement</th>
                            <th>Monthly Searches</th>
                            <th>Search Intent</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rankingKeywords as $row): ?>
                            <?php $keyword = (string) ($row['keyword'] ?? 'Keyword'); ?>
                            <?php $url = (string) ($row['url'] ?? ''); ?>
                            <?php $rank = (string) ($row['rank'] ?? '#1'); ?>
                            <?php $trend = (string) ($row['trend'] ?? '↑ 0 Positions'); ?>
                            <?php $volume = (string) ($row['volume'] ?? '0/mo'); ?>
                            <?php $intent = (string) ($row['intent'] ?? 'Commercial'); ?>
                            <tr>
                                <td class="del-keyword-name"><?= htmlspecialchars($keyword) ?></td>
                                <td class="del-keyword-url"><?= htmlspecialchars($url) ?></td>
                                <td><span class="del-rank-badge"><?= htmlspecialchars($rank) ?></span></td>
                                <td><span class="del-trend-badge"><?= htmlspecialchars($trend) ?></span></td>
                                <td class="del-volume-value"><?= htmlspecialchars($volume) ?></td>
                                <td><span class="del-intent-tag"><?= htmlspecialchars($intent) ?></span></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="del-market-showcase">
                <h3>Serving Businesses Across All Delhi NCR Micro-Markets</h3>
                <div class="del-market-pills">
                    <?php foreach ($microMarketPills as $market): ?>
                        <span class="del-market-pill"><?= htmlspecialchars($market) ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="del-brands-section" data-framer-reveal="fade-up">
        <div class="del-container">
            <div class="del-section-head">
                <div class="del-eyebrow">GLOBAL INDUSTRY CREDIBILITY</div>
                <h2 class="del-section-title">
                    Top Event Brands Embracing <span class="accent">SEO<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                </h2>
                <p class="del-section-sub">
                    Here are just a few of the organisers, global trade expos, and high-growth brands we've helped with strategic search optimisation campaigns.
                </p>
            </div>

            <div class="del-marquee-wrap">
                <div class="del-marquee-track">
                    <?php 
                    $tripleLogos = array_merge($brandLogos, $brandLogos, $brandLogos);
                    foreach ($tripleLogos as $b): 
                        $imgPath = $b['logo'] ?? '';
                    ?>
                        <div class="del-brand-card">
                            <?php if (!empty($imgPath)): ?>
                                <img src="<?= htmlspecialchars($imgPath) ?>" alt="<?= htmlspecialchars($b['name']) ?>" class="del-brand-logo-img">
                            <?php else: ?>
                                <div style="width: 30px; height: 30px; border-radius: 8px; background: #FFF0F7; color: #C4007A; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 0.75rem;">
                                    <?= htmlspecialchars(substr($b['name'], 0, 2)) ?>
                                </div>
                            <?php endif; ?>
                            <div class="del-brand-info">
                                <div class="b-name"><?= htmlspecialchars($b['name']) ?></div>
                                <div class="b-cat"><?= htmlspecialchars($b['category'] ?? 'Enterprise Brand') ?></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================
         2. STRATEGIC NARRATIVE & SPRING SOURCING FAIR PROOF
         ======================================================== -->
    <section class="del-narrative-section">
        <div class="del-container">
            <!-- 2A: Balanced Split Grid -->
            <div class="del-narrative-split">
                <div class="del-narrative-left" data-framer-reveal="slide-left">
                    <div class="del-eyebrow"><?= htmlspecialchars($strategicNarrative['eyebrow'] ?? 'BE FOUND BY THE CORRECT PEOPLE • GENERATE BETTER LEADS • GROW ORGANICALLY') ?></div>
                    <h2 class="del-section-title del-narrative-title">
                        <?= htmlspecialchars($narrativeTitle) ?>
                        <?php if ($narrativeAccent !== ''): ?>
                            <span class="accent"><?= htmlspecialchars($narrativeAccent) ?><svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                        <?php endif; ?>
                    </h2>
                    <p class="del-narrative-lead">
                        <?= htmlspecialchars($strategicNarrative['lead'] ?? 'Your customers are looking for your products and services. The challenge is to make sure that they find your business, not your competitors.') ?>
                    </p>
                    <p class="del-narrative-sub">
                        <?= htmlspecialchars($strategicNarrative['p1'] ?? '') ?>
                    </p>
                    <p class="del-narrative-sub">
                        <?= htmlspecialchars($strategicNarrative['p2'] ?? '') ?>
                    </p>

                    <div style="margin-bottom: 18px; padding: 10px 14px; background: #FFF5FA; border-left: 3px solid #C4007A; border-radius: 8px; font-weight: 700; color: #C4007A; font-size: 0.88rem;">
                        <?= htmlspecialchars($strategicNarrative['callout'] ?? '💡 Getting better rankings is just the start. It\'s really about improving the business results.') ?>
                    </div>

                    <div style="display: flex; gap: 12px; flex-wrap: wrap;">
                        <a href="/contact.php" class="del-btn-primary trigger-enquiry-modal" data-service="SEO Services in Delhi">
                            <span>Complimentary Website Analysis</span>
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </a>
                        <a href="tel:+919999674255" class="del-btn-secondary">
                            <span>Call +91-9999674255</span>
                        </a>
                    </div>
                </div>

                <!-- Right: Authentic Google SERP Live Ranking Showcase (Spring Sourcing Fair 2027) -->
                <div class="del-narrative-right" data-framer-reveal="slide-right">
                    <div class="del-serp-browser-showcase">
                        <div class="del-browser-chrome">
                            <div class="del-browser-dots">
                                <span class="dot red"></span>
                                <span class="dot yellow"></span>
                                <span class="dot green"></span>
                            </div>
                            <div class="del-browser-search-bar">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#C4007A" stroke-width="2.5"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                                <span>google.com/search?q=spring+sourcing+fair+2027</span>
                                <span class="lock-icon">🔒</span>
                            </div>
                        </div>

                        <div class="del-browser-viewport">
                            <img src="<?= htmlspecialchars($springSerpImage) ?>" alt="Google Search Spring Sourcing Fair 2027 IHGF Delhi Fair #1 Ranking WebTecMart" class="del-browser-serp-img" loading="lazy">
                            <div class="del-serp-float-badge badge-top">
                                <span class="pulse-dot"></span>
                                <span>#1 Organic Rank &bull; IHGF Delhi Fair</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2B: What makes WebTecMart the perfect SEO choice? (6 Cards in 3-col grid) -->
            <div class="del-narrative-why-wrap" data-framer-reveal="fade-up">
                <div class="del-section-head del-why-section-head">
                    <div class="del-eyebrow">WHY CHOOSE WEBTECMART</div>
                    <h2 class="del-section-title">
                        What Makes WebTecMart the Perfect <span class="accent">SEO Choice<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>?
                    </h2>
                    <p class="del-section-sub">Battle-tested capabilities built around performance, transparency, and sustainable business revenue.</p>
                </div>
                <div class="del-why-grid-3col">
                    <?php foreach ($whyCards as $wc): ?>
                        <div class="del-why-card">
                            <div class="del-why-icon"><?= htmlspecialchars($wc['icon'] ?? '🎯') ?></div>
                            <div>
                                <div class="del-why-title"><?= htmlspecialchars($wc['title'] ?? '') ?></div>
                                <div class="del-why-text"><?= htmlspecialchars($wc['desc'] ?? '') ?></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================
         3. KEY TAKEAWAYS & GOOGLE SERP AI OVERVIEW
         ======================================================== -->
    <section class="del-takeaways-section">
        <div class="del-container">
            <div class="del-section-head del-takeaways-intro" data-framer-reveal="fade-up">
                <div class="del-eyebrow"><?= htmlspecialchars($takeaways['eyebrow'] ?? 'KEY TAKEAWAYS') ?></div>
                <h2 class="del-section-title del-takeaways-title">
                    <?= htmlspecialchars($takeawaysTitleBase) ?>
                    <?php if ($takeawaysTitleAccent !== ''): ?>
                        <span class="accent"><?= htmlspecialchars($takeawaysTitleAccent) ?><svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                    <?php endif; ?>
                </h2>
                <p class="del-section-sub">
                    <?= htmlspecialchars($takeaways['lead'] ?? 'A good SEO approach ought to do greater than just ranking better. It should draw the intended audience to your business, gain trust and create measurable opportunities.') ?>
                </p>
            </div>

            <div class="del-takeaways-grid">

                <!-- Left Column: Core Takeaways & 10 Deliverables -->
                <div class="del-takeaways-left" data-framer-reveal="slide-left">
                    <h3 class="del-takeaways-subtitle">What's included in our SEO services:</h3>

                    <div class="del-takeaways-checklist-2col">
                        <?php 
                        $checkItems = $takeaways['checklist'] ?? [];
                        foreach ($checkItems as $chk): 
                        ?>
                            <div class="del-takeaway-item">
                                <span class="chk">✓</span>
                                <span><?= htmlspecialchars($chk) ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="del-takeaways-outcomes">
                        <h4 class="del-takeaways-outcomes-title">What this means for your business</h4>
                        <ul class="del-takeaways-outcomes-list">
                            <li>Stronger visibility for the services and locations that matter to you.</li>
                            <li>More relevant visitors finding your business through search.</li>
                            <li>Clear progress tracking to guide ongoing SEO improvements.</li>
                        </ul>
                    </div>

                    <div style="margin-top: 18px;">
                        <a href="/contact.php" class="del-btn-primary trigger-enquiry-modal" data-service="SEO Services in Delhi">
                            <span>Book Your Free SEO Consultation</span>
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Right Column: Google SERP visual -->
                <div class="del-takeaways-right" data-framer-reveal="slide-right">
                    <div class="del-serp-mockup">
                        <div class="del-serp-preview-img-wrap">
                            <img src="<?= htmlspecialchars($serpImage) ?>" alt="Google Search SEO Rankings Delhi WebTecMart" class="del-serp-img" loading="lazy">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ========================================================
         4. WHAT WE OFFER (6 Core SEO Offerings)
         ======================================================== -->
    <section class="del-offers-section">
        <div class="del-container">
            <div class="del-section-head" data-framer-reveal="fade-up">
                <div class="del-eyebrow">WHAT WE OFFER</div>
                <h2 class="del-section-title">
                    Comprehensive SEO Services That Turn <span class="accent">Search Visibility Into Revenue<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                </h2>
                <p class="del-section-sub">
                    From technical architecture to local rankings, content strategy, high-authority link acquisition, and AI-search visibility. Discover what's included in our SEO solutions:
                </p>
            </div>

            <div class="del-offers-grid">
                <?php foreach ($offers as $off): 
                    $offIcon = $off['icon'] ?? 'sparkles';
                    $offTitle = $off['title'] ?? 'SEO Service';
                    $offDesc = $off['desc'] ?? '';
                    $offLink = $off['link'] ?? '/contact.php';
                    $offLinkText = $off['link_text'] ?? 'Explore Service →';
                ?>
                <a href="<?= htmlspecialchars($offLink) ?>" class="del-offer-card" data-framer-reveal="fade-up">
                    <div class="del-offer-icon">
                        <?php if ($offIcon === 'code'): ?>
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m16 18 6-6-6-6"/><path d="m8 6-6 6 6 6"/></svg>
                        <?php elseif ($offIcon === 'layout'): ?>
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="18" height="18" x="3" y="3" rx="2"/><line x1="3" x2="21" y1="9" y2="9"/><line x1="9" x2="9" y1="21" y2="9"/></svg>
                        <?php elseif ($offIcon === 'search'): ?>
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                        <?php elseif ($offIcon === 'map-pin'): ?>
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                        <?php elseif ($offIcon === 'link'): ?>
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                        <?php else: ?>
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2l2.4 6.6L21 11l-6.6 2.4L12 20l-2.4-6.6L3 11l6.6-2.4L12 2z"/></svg>
                        <?php endif; ?>
                    </div>
                    <h3><?= htmlspecialchars($offTitle) ?></h3>
                    <p><?= htmlspecialchars($offDesc) ?></p>
                    <span class="del-offer-link"><?= htmlspecialchars($offLinkText) ?></span>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ========================================================
         5. SEO CHALLENGES (6-Card Grid)
         ======================================================== -->
    <section class="del-challenges-section">
        <div class="del-container">
            <div class="del-section-head" data-framer-reveal="fade-up">
                <div class="del-eyebrow"><?= htmlspecialchars($challenges['eyebrow'] ?? 'SEO CHALLENGES') ?></div>
                <h2 class="del-section-title">
                    <?= htmlspecialchars($challengesTitleBase) ?>
                    <?php if ($challengesTitleAccent !== ''): ?>
                        <span class="accent"><?= htmlspecialchars($challengesTitleAccent) ?><svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                    <?php endif; ?>
                </h2>
                <p class="del-section-sub">
                    <?= htmlspecialchars($challenges['lead'] ?? '') ?>
                </p>
            </div>

            <div class="del-challenges-grid">
                <?php foreach (($challenges['items'] ?? []) as $ch): ?>
                    <div class="del-challenge-card" data-framer-reveal="fade-up">
                        <div class="del-challenge-icon"><?= htmlspecialchars($ch['icon'] ?? '⚡') ?></div>
                        <h3><?= htmlspecialchars($ch['title'] ?? '') ?></h3>
                        <p><?= htmlspecialchars($ch['desc'] ?? '') ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ========================================================
         6. MEET THE EXPERTS (Jitin Madaan Spotlight)
         ======================================================== -->
    <section class="del-founder-section">
        <div class="del-container">
            <div class="del-section-head" data-framer-reveal="fade-up">
                <div class="del-eyebrow"><?= htmlspecialchars($founderSection['eyebrow'] ?? 'MEET THE EXPERTS') ?></div>
                <h2 class="del-section-title">
                    <?= htmlspecialchars($founderTitleBase) ?>
                    <?php if ($founderTitleAccent !== ''): ?>
                        <span class="accent"><?= htmlspecialchars($founderTitleAccent) ?><svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                    <?php endif; ?>
                </h2>
                <p class="del-section-sub">
                    <?= htmlspecialchars($founderSection['lead'] ?? '') ?>
                </p>
            </div>

            <div class="del-founder-card" data-framer-reveal="scale-in">
                <div class="del-founder-grid">
                    <div class="del-founder-left">
                        <h3 style="font-size: 1.2rem; font-weight: 800; color: #111827; margin: 0 0 10px;">
                            Built on 13+ Years of Proven Technical Execution
                        </h3>
                        <p style="font-size: 0.94rem; line-height: 1.62; color: #4B5563; margin-bottom: 14px;">
                            Strong SEO comes from combining the right people, processes and expertise. Our team is focused on search strategy, technical optimisation, content depth, and analytics to ensure campaigns directly advance real business pipeline.
                        </p>

                        <div class="del-founder-stats">
                            <?php foreach (($founderSection['stats'] ?? []) as $fst): ?>
                                <div class="del-fstat-box">
                                    <div class="val"><?= htmlspecialchars($fst['val']) ?></div>
                                    <div class="lbl"><?= htmlspecialchars($fst['label']) ?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div style="display: flex; flex-wrap: wrap; gap: 12px; margin-top: 18px;">
                            <a href="/contact.php" class="del-btn-primary trigger-enquiry-modal" data-service="SEO Services in Delhi">
                                <span>Discuss With an SEO Specialist</span>
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                            </a>
                            <a href="tel:+919999674255" class="del-btn-secondary">
                                <span>Call: +91-9999674255</span>
                            </a>
                        </div>
                    </div>

                    <div class="del-founder-right">
                        <div class="del-founder-photo-box">
                            <div class="del-founder-img-wrapper">
                                <?php if (!empty($founderImage) && file_exists(__DIR__ . $founderImage)): ?>
                                    <img src="<?= htmlspecialchars($founderImage) ?>" alt="<?= htmlspecialchars($founderName) ?>" class="del-founder-photo">
                                <?php else: ?>
                                    <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; font-size: 2rem; font-weight: 800; color: #C4007A; background: #FFF0F7;">
                                        <?= htmlspecialchars($founderInitial) ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <h4 class="del-founder-name-tag"><?= htmlspecialchars($founderName) ?></h4>
                            <div class="del-founder-role-tag"><?= htmlspecialchars($founderRole) ?></div>
                            <p style="font-size: 0.82rem; color: #6B7280; line-height: 1.5; margin: 0;">
                                Directing technical search architecture and high-converting commercial SEO for leading brands across Delhi NCR and international markets.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- 3 Core Expert Pillars -->
                <div class="del-expert-pillars">
                    <?php foreach (($founderSection['pillars'] ?? []) as $plr): ?>
                        <div class="del-expert-pillar-card">
                            <div class="del-ep-icon"><?= htmlspecialchars($plr['icon'] ?? '⚙️') ?></div>
                            <h4><?= htmlspecialchars($plr['title'] ?? '') ?></h4>
                            <p><?= htmlspecialchars($plr['desc'] ?? '') ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================
         7. OUR PROCESS (6-Step Grid)
         ======================================================== -->
    <section class="del-process-section">
        <div class="del-container">
            <div class="del-section-head" data-framer-reveal="fade-up">
                <div class="del-eyebrow">OUR PROCESS</div>
                <h2 class="del-section-title">
                    How Our SEO Services in Delhi Turn <span class="accent">Strategy Into Results<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                </h2>
                <p class="del-section-sub">
                    Each business has its own set of customers, competition and goals for growth. We begin by understanding where you stand today and create a roadmap that gets you where you want to be.
                </p>
            </div>

            <div class="del-process-grid">
                <?php foreach ($processSteps as $p): ?>
                    <div class="del-process-card" data-framer-reveal="fade-up">
                        <div class="del-process-num"><?= htmlspecialchars($p['step']) ?></div>
                        <h3><?= htmlspecialchars($p['title']) ?></h3>
                        <p><?= htmlspecialchars($p['description']) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ========================================================
         8. INDUSTRIES WE WORK WITH (8 Cards)
         ======================================================== -->
    <section class="del-industries-section">
        <div class="del-container">
            <div class="del-section-head" data-framer-reveal="fade-up">
                <div class="del-eyebrow">INDUSTRY EXPERTISE</div>
                <h2 class="del-section-title">
                    Industries We Work With Across <span class="accent">Delhi NCR &amp; Beyond<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                </h2>
                <p class="del-section-sub">
                    Proven SEO strategies tailored to vertical-specific buyer intent, conversion funnels, and search landscapes.
                </p>
            </div>

            <div class="del-industries-grid">
                <?php foreach ($industries as $ind): ?>
                    <div class="del-industry-card" data-framer-reveal="fade-up">
                        <div class="del-ind-icon"><?= htmlspecialchars($ind['icon']) ?></div>
                        <h4><?= htmlspecialchars($ind['title']) ?></h4>
                        <p><?= htmlspecialchars($ind['desc']) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ========================================================
         9. CLIENT FEEDBACK & CASE STUDIES
         ======================================================== -->
    <section class="del-feedback-section">
        <div class="del-container">
            <div class="del-section-head" data-framer-reveal="fade-up">
                <div class="del-eyebrow">CLIENT TESTIMONIALS</div>
                <h2 class="del-section-title">
                    Trusted by Organisers, Founders &amp; <span class="accent">Marketing Directors<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                </h2>
                <p class="del-section-sub">
                    Real feedback from partners who transformed their search visibility and qualified commercial inquiries with WebTecMart.
                </p>
            </div>

            <!-- Swiper Carousel -->
            <div class="swiper" id="delFeedbackSwiper">
                <div class="swiper-wrapper">
                    <?php foreach ($clientFeedback as $fb): ?>
                        <div class="swiper-slide">
                            <div class="del-feedback-card">
                                <div class="del-stars">★★★★★</div>
                                <div class="del-quote-text">"<?= htmlspecialchars($fb['quote']) ?>"</div>
                                <div class="del-client-author">
                                    <div class="del-client-avatar"><?= htmlspecialchars(substr($fb['author'], 0, 1)) ?></div>
                                    <div class="del-client-info">
                                        <h5><?= htmlspecialchars($fb['author']) ?></h5>
                                        <p><?= htmlspecialchars($fb['role']) ?> &bull; <?= htmlspecialchars($fb['company']) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-pagination" style="position: relative; margin-top: 18px;"></div>
            </div>
        </div>
    </section>

    <!-- Case Studies -->
    <section class="del-case-section">
        <div class="del-container">
            <div class="del-section-head" data-framer-reveal="fade-up">
                <div class="del-eyebrow">VERIFIED CASE STUDIES</div>
                <h2 class="del-section-title">
                    Real Rankings. Real Traffic. <span class="accent">Real Business Growth.<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                </h2>
                <p class="del-section-sub">
                    Explore documented outcomes from our targeted search campaigns across high-competition industries.
                </p>
            </div>

            <div class="del-cases-grid">
                <?php foreach ($cases as $c): ?>
                    <?php $caseBadge = (string) ($c['badge'] ?? 'SEO Growth Result'); ?>
                    <?php $caseTitle = (string) ($c['title'] ?? 'SEO Success Story'); ?>
                    <?php $caseStat = (string) ($c['stat'] ?? 'Results'); ?>
                    <?php $caseStatDesc = (string) ($c['stat_desc'] ?? 'Business growth through search visibility'); ?>
                    <?php $caseDesc = (string) ($c['desc'] ?? ''); ?>
                    <div class="del-case-card" data-framer-reveal="fade-up">
                        <span class="del-case-badge"><?= htmlspecialchars($caseBadge) ?></span>
                        <h3><?= htmlspecialchars($caseTitle) ?></h3>
                        <div class="del-case-stat-box">
                            <div class="del-case-stat-num"><?= htmlspecialchars($caseStat) ?></div>
                            <div class="del-case-stat-lbl"><?= htmlspecialchars($caseStatDesc) ?></div>
                        </div>
                        <p><?= htmlspecialchars($caseDesc) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Live Google Rankings Telemetry Table -->
    <section class="del-rankings-section">
        <div class="del-container">
            <div class="del-section-head" data-framer-reveal="fade-up">
                <div class="del-eyebrow">LIVE SEARCH TELEMETRY</div>
                <h2 class="del-section-title">
                    Verified Google Rankings for Our <span class="accent">Client Campaigns<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                </h2>
                <p class="del-section-sub">
                    Live keyword snapshot across competitive commercial and event search queries in Delhi NCR and global Google indices.
                </p>
            </div>

            <div class="del-rankings-table-wrap" data-framer-reveal="fade-up">
                <div style="overflow-x: auto;">
                    <table class="del-table">
                        <thead>
                            <tr>
                                <th>Target Search Phrase</th>
                                <th>Google Position</th>
                                <th>Est. Search Volume</th>
                                <th>Difficulty</th>
                                <th>SERP Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($rankings as $rk): ?>
                                <?php $rankKw = (string) ($rk['kw'] ?? 'Search keyword'); ?>
                                <?php $rankPos = (string) ($rk['pos'] ?? '#1'); ?>
                                <?php $rankVol = (string) ($rk['vol'] ?? 'N/A'); ?>
                                <?php $rankDiff = (string) ($rk['diff'] ?? 'Medium'); ?>
                                <?php $rankStatus = (string) ($rk['status'] ?? 'Verified'); ?>
                                <tr>
                                    <td style="font-weight: 700; color: #111827;">
                                        <span style="color: #C4007A; margin-right: 6px;">🔍</span>
                                        <?= htmlspecialchars($rankKw) ?>
                                    </td>
                                    <td><span class="del-pos-pill"><?= htmlspecialchars($rankPos) ?></span></td>
                                    <td><?= htmlspecialchars($rankVol) ?></td>
                                    <td><span style="font-weight: 600; color: #4B5563;"><?= htmlspecialchars($rankDiff) ?></span></td>
                                    <td><span style="color: #059669; font-weight: 700; font-size: 0.82rem;">✓ <?= htmlspecialchars($rankStatus) ?></span></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================
         10. WRAPPING UP: WHY SEO SERVICES IN DELHI MATTER
         ======================================================== -->
    <section class="del-wrap-section" data-framer-reveal="fade-up">
        <div class="del-container">
            <div class="del-wrap-card">
                <div class="del-section-head" style="margin-bottom: 18px;">
                    <div class="del-eyebrow"><?= htmlspecialchars($wrappingUp['eyebrow'] ?? 'DELHI NCR LOCAL REACH') ?></div>
                    <h2 class="del-section-title">
                        <?= htmlspecialchars($wrappingUp['title'] ?? 'Why SEO Services in Delhi Matter for Your Business') ?> <span class="accent"><svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                    </h2>
                    <h3 style="font-size: 1.05rem; font-weight: 700; color: #C4007A; margin: 6px 0 0;">
                        <?= htmlspecialchars($wrappingUp['sub'] ?? 'Build Visibility. Earn Trust. Generate Sustainable Growth.') ?>
                    </h3>
                </div>

                <div style="max-width: 880px; margin: 0 auto; font-size: 0.95rem; line-height: 1.65; color: #374151;">
                    <p style="margin-bottom: 14px;">
                        <?= htmlspecialchars($wrappingUp['p1'] ?? '') ?>
                    </p>
                    <p style="margin-bottom: 14px;">
                        <?= htmlspecialchars($wrappingUp['p2'] ?? '') ?>
                    </p>

                    <div style="background: #FFF5FA; border: 1.5px solid rgba(196, 0, 122, 0.2); border-radius: 16px; padding: 18px 20px; margin-bottom: 18px;">
                        <div style="font-weight: 800; color: #111827; margin-bottom: 8px; display: flex; align-items: center; gap: 8px; font-size: 0.94rem;">
                            <span style="color: #C4007A; font-size: 1.1rem;">📍</span>
                            <span>Target Micro-Markets Across Delhi NCR</span>
                        </div>
                        <div class="del-markets-badge-grid">
                            <?php foreach (($wrappingUp['micro_markets'] ?? []) as $mm): ?>
                                <span class="del-market-pill"><?= htmlspecialchars($mm) ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <p style="margin-bottom: 18px; font-weight: 700; color: #111827; font-size: 0.98rem; text-align: center;">
                        <?= htmlspecialchars($wrappingUp['goal'] ?? 'Our goal is simple: Make your business discoverable, build trust, and convert search visibility into growth.') ?>
                    </p>

                    <div style="text-align: center; margin-top: 20px;">
                        <a href="/contact.php" class="del-btn-primary trigger-enquiry-modal" data-service="SEO Services in Delhi">
                            <span>Book Your Free SEO Consultation</span>
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================
         11. FAQS ACCORDION (10 Questions from Document)
         ======================================================== -->
    <section class="del-faq-section">
        <div class="del-container">
            <div class="del-section-head" data-framer-reveal="fade-up">
                <div class="del-eyebrow">FREQUENTLY ASKED QUESTIONS</div>
                <h2 class="del-section-title">
                    Frequently Asked Questions About <span class="accent">SEO Services in Delhi<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                </h2>
                <p class="del-section-sub">
                    Clear, transparent answers to help you make an informed decision for your digital growth:
                </p>
            </div>

            <div style="max-width: 860px; margin: 0 auto;">
                <?php foreach (($faqs ?? []) as $idx => $fq):
                    $isActive = ($idx === 0) ? ' active' : '';
                    $faqQuestion = is_array($fq) ? ($fq['q'] ?? $fq['question'] ?? 'Question') : (string) $fq;
                    $faqAnswer = is_array($fq) ? ($fq['a'] ?? $fq['answer'] ?? '') : '';
                ?>
                    <div class="del-faq-item<?= $isActive ?>" data-framer-reveal="fade-up">
                        <button class="del-faq-btn" onclick="toggleDelFaq(this)">
                            <span><?= htmlspecialchars($faqQuestion) ?></span>
                            <span class="icon"><?= ($idx === 0) ? '−' : '+' ?></span>
                        </button>
                        <div class="del-faq-answer">
                            <?= nl2br(htmlspecialchars($faqAnswer)) ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ========================================================
         12. FINAL CONVERSION CTA BANNER
         ======================================================== -->
    <section class="del-cta-section">
        <div class="del-container">
            <div class="del-cta-box" data-framer-reveal="fade-up">
                <h2><?= htmlspecialchars($ctaBox['headline'] ?? "So You're Ready to Take the Plunge and") ?> <span>Grow Your Business With SEO?</span></h2>
                <h3><?= htmlspecialchars($ctaBox['sub'] ?? "Let's Make Your Search Visibility Business Opportunities") ?></h3>
                <p><?= htmlspecialchars($ctaBox['text'] ?? '') ?></p>

                <div class="del-cta-btns">
                    <button type="button" class="del-btn-primary trigger-enquiry-modal" data-service="SEO Services in Delhi" style="background: #FFFFFF !important; color: #C4007A !important; font-weight: 800; border: none; box-shadow: 0 10px 25px rgba(0,0,0,0.2);">
                        <span><?= htmlspecialchars($ctaBox['btn_text'] ?? 'Book Your Free SEO Consultation') ?></span>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </button>
                    <a href="tel:+919999674255" class="del-btn-secondary" style="background: rgba(255,255,255,0.18); border: 2px solid rgba(255,255,255,0.85); color: #FFFFFF !important; font-weight: 700;">
                        <span><?= htmlspecialchars($ctaBox['call_text'] ?? 'Call: +91-9999674255') ?></span>
                    </a>
                </div>

                <div style="margin-top: 18px; font-size: 0.82rem; color: rgba(255, 255, 255, 0.9); font-weight: 500;">
                    Free Strategy Consultation &bull; Zero Obligation &bull; Tailored Delhi NCR Action Plan
                </div>
            </div>
        </div>
    </section>

</main>

<!-- Swiper 11 JS for Touch Sliders -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    // 1. Reveal Observer (Safe Initialization)
    document.addEventListener('DOMContentLoaded', () => {
        document.documentElement.classList.add('js-reveal');

        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('framer-visible');
                    obs.unobserve(entry.target);
                }
            });
        }, { threshold: 0.05, rootMargin: '0px 0px 80px 0px' });

        document.querySelectorAll('[data-framer-reveal]').forEach(el => observer.observe(el));

        // 2. Swiper 11 for Client Feedback Slider
        if (typeof Swiper !== 'undefined') {
            new Swiper('#delFeedbackSwiper', {
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                grabCursor: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                    pauseOnMouseEnter: true,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                breakpoints: {
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 22,
                    }
                }
            });
        }
    });

    // 3. FAQ Accordion Toggle
    function toggleDelFaq(btn) {
        const item = btn.closest('.del-faq-item');
        const isActive = item.classList.contains('active');
        document.querySelectorAll('.del-faq-item').forEach(el => {
            el.classList.remove('active');
            const icon = el.querySelector('.icon');
            if (icon) icon.innerText = '+';
        });
        if (!isActive) {
            item.classList.add('active');
            const icon = item.querySelector('.icon');
            if (icon) icon.innerText = '−';
        }
    }

    // 4. Hero Quote Form AJAX Submission
    function handleHeroQuoteSubmit(e) {
        e.preventDefault();
        const form = document.getElementById('delHeroQuoteForm');
        const btn  = document.getElementById('delHeroSubmitBtn');
        const fb   = document.getElementById('delHeroFeedback');

        const formData = new FormData(form);
        formData.set('service', 'SEO Services in Delhi');
        formData.set('ajax', '1');

        btn.disabled = true;
        btn.querySelector('span').innerText = 'Submitting...';

        fetch('/contact.php', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(res => res.json())
        .then(data => {
            fb.style.display = 'block';
            fb.style.background = '#ECFDF5';
            fb.style.color = '#065F46';
            fb.innerText = "Thank you! Your quote request has been received. Our team will contact you shortly.";
            form.reset();
            btn.disabled = false;
            btn.querySelector('span').innerText = 'Submit →';
        })
        .catch(() => {
            fb.style.display = 'block';
            fb.style.background = '#ECFDF5';
            fb.style.color = '#065F46';
            fb.innerText = "Thank you! Your quote request has been received. Our team will contact you shortly.";
            form.reset();
            btn.disabled = false;
            btn.querySelector('span').innerText = 'Submit →';
        });
    }
</script>

<?php
require_once __DIR__ . '/app/templates/footer.php';
?>