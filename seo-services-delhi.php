<?php
$pageMeta = [
    'title' => 'SEO Services in Delhi – Result-Driven SEO to Grow Your Business | WebTecMart',
    'description' => 'Build search visibility that drives real business growth. WebTecMart is the top-rated SEO agency in Delhi NCR providing AI-ready SEO, Google #1 rankings, and qualified organic leads.',
];
require_once __DIR__ . '/app/templates/header.php';
require_once __DIR__ . '/app/components/sections/FooterSection.php';
require_once __DIR__ . '/functions.php';

// ============================================================
// 100% DYNAMIC DATA ARCHITECTURE (Loaded from DB with Fallbacks)  — UNCHANGED
// ============================================================
$dbService = getServiceBySlug('seo-services-delhi') ?: [];

$heroTitle = $dbService['hero_title'] ?? 'SEO Services in Delhi';
$heroAccent = $dbService['hero_accent'] ?? 'Result-Driven SEO to Grow Your Business';
$heroDesc = $dbService['hero_description'] ?? 'Boost your website’s search visibility, improve Google rankings, and attract relevant visitors with our Organic SEO services. Our SEO strategies focus on increasing organic traffic, improving keyword rankings, and strengthening your online presence for sustainable growth.';
$heroBullets = $dbService['hero_bullets'] ?? [
    'Enhance Google Rankings for relevant, high-value keywords',
    'Bring in Targeted Organic Traffic from ready-to-buy customers',
    'Increase website leads and enquiries with search optimisation',
    'Create Long-Term Visibility by following a sustainable organic strategy'
];
$heroVisibleBullets = is_array($heroBullets) ? $heroBullets : [];
$founderName = $dbService['founder_name'] ?? 'Jitin Madaan';
$founderRole = $dbService['founder_role'] ?? 'Performance Marketing Strategist';
$founderImage = $dbService['founder_image'] ?? '/assets/images/jitin-madaan.png';
$founderInitial = 'JM';

$rankingKeywords = $dbService['keyword_ranking_showcase'] ?? [
    ['keyword' => 'Bharat Tex 2026 Fair', 'url' => 'bharat-tex.com', 'rank' => '#1', 'trend' => '↑ 17 Positions', 'volume' => '49,500/mo', 'intent' => 'Commercial'],
    ['keyword' => 'Best SEO Company in Delhi NCR', 'url' => 'webtecmart.com/seo-services-delhi.php', 'rank' => '#1', 'trend' => '↑ 13 Positions', 'volume' => '14,800/mo', 'intent' => 'High Intent'],
    ['keyword' => 'IHGF Autumn Fair Delhi 2027', 'url' => 'ihgfdelhi.in', 'rank' => '#1', 'trend' => '↑ 25 Positions', 'volume' => '22,000/mo', 'intent' => 'Buyer Intent'],
    ['keyword' => 'B2B Exhibition SEO Services', 'url' => 'webtecmart.com/b2b-exhibition-seo.php', 'rank' => '#1', 'trend' => '↑ 30 Positions', 'volume' => '8,100/mo', 'intent' => 'B2B'],
    ['keyword' => 'Local SEO Services in Delhi', 'url' => 'webtecmart.com/local-seo.php', 'rank' => '#1', 'trend' => '↑ 23 Positions', 'volume' => '12,100/mo', 'intent' => 'Local Intent'],
    ['keyword' => 'Technical SEO Services Delhi', 'url' => 'webtecmart.com/technical-seo.php', 'rank' => '#1', 'trend' => '↑ 19 Positions', 'volume' => '6,400/mo', 'intent' => 'Technical'],
];

$microMarketPills = $dbService['micro_markets'] ?? ['Connaught Place (CP)', 'South Delhi & Saket', 'New Delhi', 'Rohini', 'Dwarka Commercial Hub', 'Janakpuri & West Delhi', 'Punjab Bagh & Rajouri Garden', 'Okhla Industrial Area', 'Noida & Greater Noida', 'Pitampura & Rohini', 'Ghaziabad', 'Faridabad'];

$serpImage = $dbService['serp_image'] ?? '/assets/images/seo-takeaways-preview.png';
$springSerpImage = $dbService['spring_serp_image'] ?? '/assets/images/spring-sourcing-fair-serp-highlight.png';

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

$offers = $dbService['offers'] ?? [
    ['icon' => 'code', 'title' => 'Technical SEO', 'desc' => 'We enhance the performance of your site by addressing crawling, indexing, Core Web Vitals, server response times, and architecture to ensure search bots navigate effortlessly.', 'link' => '/technical-seo.php', 'link_text' => 'Explore Technical SEO →'],
    ['icon' => 'layout', 'title' => 'On-Page Optimization', 'desc' => 'Content without optimization cannot perform. We optimize title tags, meta descriptions, header structures (H1-H6), internal linking, and semantic keyword relevance.', 'link' => '/on-page-seo.php', 'link_text' => 'Explore On-Page SEO →'],
    ['icon' => 'search', 'title' => 'Keyword Research & Strategy', 'desc' => 'Searching for the appropriate keywords will guide users straight to your site. We dissect intent, competition, and search volume to capture high-value buyer searches.', 'link' => '/keyword-research.php', 'link_text' => 'Explore Keyword Research →'],
    ['icon' => 'map-pin', 'title' => 'Local SEO & Google 3-Pack', 'desc' => 'Dominate Google Maps across Delhi, Noida, Gurgaon, and NCR. Optimize your Google Business Profile, citations, reviews, and proximity signals to drive nearby calls.', 'link' => '/local-seo.php', 'link_text' => 'Explore Local SEO →'],
    ['icon' => 'link', 'title' => 'High-Authority Link Building', 'desc' => 'Earn high-authority editorial backlinks and digital PR citations from verified Indian media and industry portals that supercharge domain trust.', 'link' => '/off-page-seo.php', 'link_text' => 'Explore Off-Page SEO →'],
    ['icon' => 'sparkles', 'title' => 'AI-Ready SEO (AEO & GEO)', 'desc' => 'Position your brand prominently within Google AI Overviews, Perplexity, Gemini, and ChatGPT search recommendations through structured entity data.', 'link' => '/ai-seo-strategy.php', 'link_text' => 'Explore AI-Ready SEO →']
];

$challenges = $dbService['challenges'] ?? [
    'eyebrow' => 'SEO CHALLENGES',
    'title' => 'What is Holding Your Site Back in Google Search?',
    'lead' => 'There are several common SEO challenges that businesses in Delhi encounter. Delhi is among the most competitive business hub in India. Whether it\'s a local service provider or a start-up, or a reputable brand or an e-commerce company, businesses are vying for the same search audience. Having a website is not sufficient: Your website has to be optimised for the right keywords, have valuable content, a solid technical underpinning, a good user experience and also a website strategy that aligns with your customers\' search intent.',
    'items' => [
        ['icon' => '⚔️', 'title' => 'Intense Local Competition', 'desc' => 'Firms fight it out for exposure in Google Search and Google Maps in Delhi. A basic SEO campaign can\'t be sufficient to beat the competition. We define your competitors, learn about their search footprint and create a strategy based on what\'s possible in your market.'],
        ['icon' => '📉', 'title' => 'Low or Irrelevant Organic Traffic', 'desc' => 'Getting visitors does not equal getting prospective customers. When you get visitors that don\'t want to buy, you get no enquiries. We pay special attention to relevant commercial keywords and search intent to get visitors that are more likely to take action.'],
        ['icon' => '🎯', 'title' => 'Poor Keyword Targeting', 'desc' => 'Competing for high-ranking keywords that don\'t have the proper intent, meaning, or business value can be a waste of time and resources. By leveraging our keyword research, we discover opportunities throughout commercial, transactional, informational and local searches.'],
        ['icon' => '📍', 'title' => 'Weak Local Search Visibility', 'desc' => 'Local visibility is important if your customers are looking for services in their vicinity. We optimize your website and Google Business Profile to ensure your business is found in relevant local searches across Delhi and Delhi NCR.'],
        ['icon' => '⚙️', 'title' => 'Technical SEO Problems', 'desc' => 'Slow pages, broken links, poor website structure, indexing problems, duplicate content and weak internal linking impact search engine crawling. We assess and resolve these areas in our technical SEO audit.'],
        ['icon' => '💸', 'title' => 'Overdependence on Paid Advertising', 'desc' => 'Paid ads provide instant exposure, but only while you continue spending. With SEO, you create an organic traffic stream that continues delivering qualified visibility. We help businesses achieve a healthier balance of acquisition.']
    ]
];
$challengesTitle = trim((string) ($challenges['title'] ?? 'What is Holding Your Site Back in Google Search?'));
$challengesTitleBase = $challengesTitle;
$challengesTitleAccent = '';
if (preg_match('/\s+(Google Search\??)\s*$/i', $challengesTitle, $titleMatch, PREG_OFFSET_CAPTURE)) {
    $challengesTitleBase = trim(substr($challengesTitle, 0, $titleMatch[0][1]));
    $challengesTitleAccent = trim($titleMatch[1][0]);
}

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
        ['icon' => '⚙️', 'title' => 'SEO Strategy & Technical Expertise', 'desc' => 'Our SEO experts specialize in keyword strategy, technical audits, competitor analysis, website structure and performance optimization to build a solid foundation for organic growth.'],
        ['icon' => '📝', 'title' => 'Content & Search Optimisation', 'desc' => 'Our content team produces useful, search optimized content that\'s aligned to user intent, keyword opportunities and your brand\'s expertise — empowering your website to offer actual value and boost search visibility at the same time.'],
        ['icon' => '🚀', 'title' => 'Digital Growth Support', 'desc' => 'SEO is best suited when it is integrated with the broader digital landscape. Our team has SEO, content, website development and digital marketing skills to build a more interconnected growth strategy.']
    ]
];
$founderTitle = trim((string) ($founderSection['title'] ?? 'The People Behind Your SEO Growth'));
$founderTitleBase = $founderTitle;
$founderTitleAccent = '';
if (preg_match('/\s+(SEO Growth)\s*$/i', $founderTitle, $titleMatch, PREG_OFFSET_CAPTURE)) {
    $founderTitleBase = trim(substr($founderTitle, 0, $titleMatch[0][1]));
    $founderTitleAccent = trim($titleMatch[1][0]);
}

$processSteps = $dbService['process'] ?? [
    ['step' => '01', 'title' => 'Research & Discovery', 'description' => 'We start with knowing your business, your audience, your competition and your online presence. Our research includes keyword analysis, competitor research, search intent and an in-depth website review.'],
    ['step' => '02', 'title' => 'Technical Audit & Foundation', 'description' => 'A solid technical structure is required to ensure that your site can be properly crawled, indexed and understood by Google.'],
    ['step' => '03', 'title' => 'Keyword Strategy & Search Intent', 'description' => 'Finding keywords that have the right balance of search volume, competition and commercial intent.'],
    ['step' => '04', 'title' => 'On-Page & Content Optimisation', 'description' => 'We refine existing content and identify opportunities for new content to target high-value keyword themes.'],
    ['step' => '05', 'title' => 'Authority Building & Off-Page Signals', 'description' => 'Quality external signals, local citations and high-authority links help to improve your website\'s credibility.'],
    ['step' => '06', 'title' => 'Measurement, Refinement & Growth', 'description' => 'We regularly monitor keyword rankings, organic traffic, leads and conversions to adapt and scale strategy.']
];

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

$clientFeedback = $dbService['client_feedback'] ?? [
    ['quote' => "Thank you so much WebTecMart. We've noticed a phenomenal improvement in commercial search visibility, keyword engagement, and subsequently a large proportion of our verified customer enquiries are coming directly through the website. Thanks again for being so proactive and hands-on with the SEO work...", 'author' => 'Libby Powell', 'role' => 'Marketing Director', 'company' => 'Innovation Zero', 'rating' => 5],
    ['quote' => "WebTecMart has completely evolved our strategic thinking when it comes to enterprise websites. One of our greatest success stories was converting our legacy domain to an optimized search architecture which led to a 731% increase in website users and a 164% uplift in organic search conversions...", 'author' => 'Louise Smith', 'role' => 'Associate Director', 'company' => 'Society of Petroleum Engineers', 'rating' => 5],
    ['quote' => "Their support, keyword clustering, and best practice guidance helped ensure we now have a user friendly, SEO efficient, creative, and high performing landing site for our target audience across Delhi NCR and international markets...", 'author' => 'Ali McQueen', 'role' => 'Head of Marketing', 'company' => 'RoarB2B', 'rating' => 5],
    ['quote' => "From zero organic visibility to ranking #1 for over 45 high-commercial search phrases within 6 months. WebTecMart is by far the most knowledgeable, data-driven, and trustworthy SEO team in Delhi NCR.", 'author' => 'Rajesh Singhania', 'role' => 'Managing Director', 'company' => 'Stonex Luxury Retail', 'rating' => 5]
];

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

$cases = is_array($dbService['case_results'] ?? null) ? $dbService['case_results'] : [
    ['title' => 'IHGF Delhi Fair & Spring Sourcing 2027', 'badge' => 'Global Sourcing & Trade Fair', 'stat' => '#1 Rank', 'stat_desc' => 'Google Top Result for High-Volume Sourcing Phrases', 'desc' => 'Complete technical restructuring and multi-lingual topical clustering established dominant Google SERP presence ahead of international competitors.'],
    ['title' => 'Stonex Luxury Retail Network', 'badge' => 'Luxury Retail & E-Commerce', 'stat' => '+420%', 'stat_desc' => 'Qualified Commercial Inquiries in 6 Months', 'desc' => 'Local 3-Pack domination across South Delhi, Noida, and Gurugram combined with high-intent diamond jewelry keyword ranking.'],
    ['title' => 'Innovation Zero World Congress', 'badge' => 'CleanTech & Enterprise Events', 'stat' => '12.4x', 'stat_desc' => 'Organic Inbound Delegate Registrations', 'desc' => 'Engineered topical authority and speaker knowledge graphs captured decision-makers and C-suite attendees across pan-India and UK search.']
];

$rankings = is_array($dbService['rankings'] ?? null) ? $dbService['rankings'] : [
    ['kw' => 'spring sourcing fair 2027', 'pos' => '#1', 'vol' => '18,500/mo', 'diff' => 'High', 'status' => 'Verified Top Result'],
    ['kw' => 'ihgf delhi fair 2027', 'pos' => '#1', 'vol' => '27,100/mo', 'diff' => 'High', 'status' => 'Verified Top Result'],
    ['kw' => 'top b2b exhibition seo company delhi', 'pos' => '#1', 'vol' => '4,800/mo', 'diff' => 'Medium', 'status' => 'AI Overview Featured'],
    ['kw' => 'seo company pitampura rohini', 'pos' => '#1', 'vol' => '3,200/mo', 'diff' => 'Medium', 'status' => 'Google Maps 3-Pack'],
    ['kw' => 'best seo services south delhi', 'pos' => '#1', 'vol' => '5,400/mo', 'diff' => 'High', 'status' => 'Organic Dominance']
];

$wrappingUp = is_array($dbService['wrapping_up'] ?? null) ? $dbService['wrapping_up'] : [
    'eyebrow' => 'DELHI NCR LOCAL REACH',
    'title' => 'Why SEO Services in Delhi Matter for Your Business',
    'sub' => 'Build Visibility. Earn Trust. Generate Sustainable Growth.',
    'p1' => 'The digital market is extremely competitive in Delhi. There are customers who are always looking in Google for businesses, products and services — and businesses that show up at the right time have a higher chance of capturing that customer.',
    'p2' => 'WebTecMart offers SEO services in Delhi, which goes beyond rankings. We use technical SEO, keyword research, content optimisation, local SEO and authority building to create a search strategy that\'s in line with your business goals.',
    'micro_markets' => ['Pitampura', 'Rohini', 'Dwarka', 'Janakpuri', 'South Delhi', 'Connaught Place', 'Saket', 'Punjabi Bagh', 'Noida', 'Gurgaon', 'Faridabad', 'Ghaziabad'],
    'goal' => 'Our goal is simple: Make your business discoverable, build trust, and convert search visibility into growth.'
];

$faqs = $dbService['faqs'] ?? [
    ['q' => 'What are SEO services and why does my business need them?', 'a' => "SEO Services increase your site's presence in search engines and make it easier for anyone who searches for your goods or services to find your site. Combating local, commercial and industry-specific searches and building a sustainable source of organic traffic for businesses in Delhi is where SEO comes into the picture."],
    ['q' => 'How long does SEO take to show results?', 'a' => "SEO is a long-term approach, and there is no guarantee of results, depending on your site, the competition, the industry, the keywords you're targeting and how well your site is being found in the search engines. Technical and on page optimisation can bring about changes fairly quickly, whereas building authority and targeting competitive keywords may take a longer period of time, but need consistent optimisation."],
    ['q' => 'How can Local SEO help my Delhi business?', 'a' => "Local SEO puts your business in front of mobile searches that are related to your area and services. It can help people find your business when they look for local products and/or services, and can help you be seen in queries that are relevant to your business."],
    ['q' => 'What does an SEO agency in Delhi actually do?', 'a' => "An SEO agency will be able to work on keyword research, technical SEO, on page optimisation, content optimisation, local SEO, internal linking, authority building, competitor analysis and monitoring performance. The exact approach will vary, depending on the business and goals."],
    ['q' => 'Is it possible to create leads with SEO and not traffic?', 'a' => "Yes. The goal of SEO isn't to bring as many visitors as possible, it's to bring the right ones. Through focusing on search intent and optimising content and calls to action, landing pages, SEO can help to drive inquiries, registrations, sales and other conversions."],
    ['q' => 'Which is better, SEO or Google Ads?', 'a' => "SEO isn't the same thing as Google Ads. While SEO is about long-term organic visibility, Google Ads can offer instant paid visibility. A lot of businesses leverage both of them as part of an extensive digital marketing campaign."],
    ['q' => 'How to select the Ideal SEO firm in Delhi?', 'a' => "Find an SEO firm that has a clear understanding of your business, is able to articulate their approach, has a business objective that is relevant to your business, has a clear reporting system and isn't promising to rank websites in the improbable. A successful SEO partner should be able to tell you not only what they'll be working on, but why it is important to your business."],
    ['q' => 'Which businesses can benefit from SEO services?', 'a' => "SEO can help virtually any business that has customers find it online. SEO can be beneficial for local businesses, e-commerce retailers, professional services, real estate companies, healthcare providers, educational institutions, tech companies and B2B types of companies as well."],
    ['q' => 'Does WebTecMart provide Local, National and International SEO?', 'a' => "Yes. WebTecMart can develop SEO strategies for businesses targeting customers locally in Delhi and Delhi NCR, across India or in international markets. The method and web design is modified based on the target market."],
    ['q' => 'What is the price of SEO services in Delhi?', 'a' => "The cost of SEO services varies based on website size, competition, location, keywords, content needs, and the technical complexity and business goals. WebTecMart also provides several SEO packages and will be able to design a personalised approach to suit your needs."]
];

$ctaBox = $dbService['cta_box'] ?? [
    'headline' => 'So You\'re Ready to Take the Plunge and Grow Your Business With SEO?',
    'sub' => 'Let\'s Make Your Search Visibility Business Opportunities',
    'text' => 'From local SEO in Delhi to national SEO across India, e-commerce SEO to full-fledged organic growth, WebTecMart has you covered to create a stronger search presence. Give us a brief description of your business, website and growth objectives. We will know the opportunities and understand what we need to put our SEO strategy into.',
    'btn_text' => 'Book Your Free SEO Consultation',
    'call_text' => 'Call: +91-9999674255'
];

// ---------- view helpers (design only) ----------
$arrow = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>';
$phoneIco = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>';
$offIcons = [
    'code' => '<path d="m16 18 6-6-6-6"/><path d="m8 6-6 6 6 6"/>',
    'layout' => '<rect width="18" height="18" x="3" y="3" rx="2"/><path d="M3 9h18M9 21V9"/>',
    'search' => '<circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/>',
    'map-pin' => '<path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/>',
    'link' => '<path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/>',
    'sparkles' => '<path d="M12 2l2.4 6.6L21 11l-6.6 2.4L12 20l-2.4-6.6L3 11l6.6-2.4L12 2z"/>',
];
$e = function ($v) { return htmlspecialchars((string) $v); };
$headAccent = function ($base, $accent) use ($e) {
    return $e($base) . ($accent !== '' ? ' <span class="xp-acc">' . $e($accent) . '</span>' : '');
};
?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;12..96,800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<!-- Schema.org JSON-LD (unchanged) -->
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
      "geo": { "@type": "GeoCoordinates", "latitude": 28.6139, "longitude": 77.2090 },
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
   SEO SERVICES DELHI — "Expo Floor" design
   Magenta (#C4007A) + Gold (#FFB547) + Deep (#7E004E)
   Matches B2B Exhibition SEO page design system exactly.
   ============================================================ */
.xp {
    --pink:#C4007A; --pink2:#E0398F; --pink3:#FF7BC0;
    --deep:#7E004E; --head:#5E0B45;
    --blush:#FBEAF3; --soft:#FFF4FA; --gold:#FFB547; --mint:#0E9F6E;
    --text:#4A3342; --mute:#7A6574; --line:rgba(126,0,78,.14);

    /* Remap legacy vars so any leftover reference still works */
    --ink:var(--deep); --ink2:#5C0038; --paper:#fff; --card:#fff; --mist:var(--soft);
    --h:var(--head); --bd:var(--deep);

    --disp:'Bricolage Grotesque','Plus Jakarta Sans',system-ui,sans-serif;
    font-family:'Plus Jakarta Sans',system-ui,-apple-system,sans-serif;
    color:var(--text); background:#fff; overflow-x:clip; width:100%;
}
body.del-theme-dark .xp { --paper:#150A16; --card:#1E0F22; --mist:#1A0D1E; --text:#EADCE8; --mute:#B9A6B4; --line:rgba(255,255,255,.14); --h:#fff; --bd:#5A2A52; --head:#fff; --blush:#2A1230; --deep:#8B1A5E; }

.xp *,.xp *::before,.xp *::after{box-sizing:border-box}
.xp h1,.xp h2,.xp h3,.xp h4{font-family:var(--disp);margin:0;letter-spacing:-.02em;color:var(--h)}
.xp p{margin:0}
.xp a:focus-visible,.xp button:focus-visible,.xp input:focus-visible,.xp textarea:focus-visible,.xp select:focus-visible{outline:3px solid var(--gold);outline-offset:2px}
.xp ::selection{background:var(--pink);color:#fff}
.xp-wrap{max-width:1200px;margin:0 auto;padding:0 22px;position:relative;z-index:1}
@media (min-width:1440px){.xp-wrap{max-width:1320px}}
.xp img,.xp svg,.xp input,.xp textarea,.xp table{max-width:100%}
.xp h1,.xp h2,.xp h3,.xp p,.xp li{overflow-wrap:anywhere}
.xp-grid{display:grid;gap:18px;grid-template-columns:minmax(0,1fr)}
.xp-grid>*{min-width:0}
@media(min-width:640px){.xp-g2,.xp-g3,.xp-g4{grid-template-columns:repeat(2,minmax(0,1fr))}}
@media(min-width:992px){.xp-g3{grid-template-columns:repeat(3,minmax(0,1fr))}.xp-g4{grid-template-columns:repeat(4,minmax(0,1fr))}}

/* ===== Buttons ===== */
.xp-btn{position:relative;overflow:hidden;display:inline-flex;align-items:center;justify-content:center;gap:10px;padding:14px 26px;border-radius:12px;font:700 .95rem/1.2 inherit;font-family:inherit;text-decoration:none;white-space:nowrap;border:2px solid transparent;cursor:pointer;transition:translate .2s,box-shadow .2s,background .2s}
.xp-btn svg{flex-shrink:0}
.xp-btn--pink{background:var(--pink);color:#fff!important;box-shadow:0 6px 0 var(--deep)}
.xp-btn--pink:hover{translate:0 2px;box-shadow:0 4px 0 var(--deep)}
.xp-btn--pink:active{translate:0 6px;box-shadow:0 0 0 transparent}
.xp-btn--ghost{background:transparent;color:#fff!important;border-color:rgba(255,255,255,.5)}
.xp-btn--ghost:hover{background:rgba(255,255,255,.12);border-color:#fff}
.xp-btn--line{background:#fff;color:var(--pink)!important;border-color:var(--deep);box-shadow:0 4px 0 var(--deep)}
.xp-btn--line:hover{background:var(--blush);translate:0 2px;box-shadow:0 2px 0 var(--deep)}
.xp-btn--white{background:#fff;color:var(--pink)!important;box-shadow:0 6px 0 var(--deep)}
.xp-btn--white:hover{translate:0 2px;box-shadow:0 4px 0 var(--deep)}
.xp-actions{display:flex;flex-wrap:wrap;gap:14px;align-items:center}
.xp-ripple{position:absolute;width:12px;height:12px;margin:-6px 0 0 -6px;border-radius:50%;background:currentColor;opacity:.3;pointer-events:none;animation:xpRipple .65s ease-out forwards}
@keyframes xpRipple{to{transform:scale(22);opacity:0}}

/* ===== HERO ===== */
.xp-hero{position:relative;color:#fff;padding:60px 0 0;background:
    radial-gradient(60% 70% at 88% 0%,rgba(255,181,71,.38),transparent 65%),
    radial-gradient(50% 60% at 0% 100%,rgba(255,255,255,.18),transparent 70%),
    linear-gradient(135deg,#A8006A 0%,#C4007A 45%,#E0398F 100%);
    overflow:hidden}
.xp-hero::before{content:'';position:absolute;inset:0;background-image:radial-gradient(rgba(255,255,255,.15) 1px,transparent 1.2px);background-size:26px 26px;-webkit-mask-image:linear-gradient(180deg,#000 30%,transparent 95%);mask-image:linear-gradient(180deg,#000 30%,transparent 95%);pointer-events:none}
.xp-hero-grid{position:relative;z-index:2;display:grid;gap:44px;align-items:center;padding-bottom:64px;grid-template-columns:minmax(0,1fr)}
.xp-hero-grid>*{min-width:0}
@media(min-width:992px){.xp-hero-grid{grid-template-columns:1.08fr .92fr;gap:56px}}
.xp-tag{display:inline-flex;align-items:center;gap:8px;padding:7px 15px 7px 11px;margin-bottom:22px;border-radius:999px;background:rgba(255,255,255,.18);border:1px solid rgba(255,255,255,.45);font-size:.78rem;font-weight:700;color:#fff;backdrop-filter:blur(10px)}
.xp-tag i{width:8px;height:8px;border-radius:50%;background:var(--gold);box-shadow:0 0 0 4px rgba(255,181,71,.25);flex-shrink:0}
.xp-hero h1{color:#fff;font-size:clamp(2.2rem,4.6vw,3.8rem);font-weight:800;line-height:1.05;margin-bottom:18px;text-shadow:0 3px 0 rgba(126,0,78,.35)}
.xp-hero h1 em{display:block;margin-top:8px;font-style:normal;font-size:.66em;line-height:1.2;color:#FFD7EB}
.xp-hero-desc{color:rgba(255,255,255,.88);line-height:1.7;max-width:600px;margin-bottom:22px}
.xp-bullets{list-style:none;padding:0;margin:0 0 26px;display:grid;gap:10px 16px;grid-template-columns:minmax(0,1fr);max-width:640px}
@media(min-width:600px){.xp-bullets{grid-template-columns:1fr 1fr}}
.xp-bullets li{display:flex;gap:10px;align-items:flex-start;font-size:.9rem;font-weight:600;line-height:1.45;color:#fff}
.xp-bullets li::before{content:'✓';display:grid;place-items:center;flex-shrink:0;width:22px;height:22px;border-radius:50%;background:var(--gold);color:var(--deep);font-size:.72rem;font-weight:800}
.xp-author{display:inline-flex;align-items:center;gap:12px;margin-top:26px;padding:8px 18px 8px 8px;border-radius:999px;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.28)}
.xp-author-av{width:46px;height:46px;border-radius:50%;overflow:hidden;flex-shrink:0;display:grid;place-items:center;background:var(--deep);color:#fff;font:800 .95rem var(--disp);border:2px solid var(--gold)}
.xp-author-av img{width:100%;height:100%;object-fit:cover;display:block}
.xp-author b{display:flex;align-items:center;gap:7px;font:800 .95rem var(--disp);color:#fff}
.xp-author b i{width:7px;height:7px;border-radius:50%;background:#34D399;box-shadow:0 0 0 3px rgba(52,211,153,.25)}
.xp-author small{display:block;font-size:.74rem;line-height:1.4;color:rgba(255,255,255,.72)}
.xp-author small span{color:var(--gold);font-weight:700}

/* ===== Quote form as visitor badge ===== */
.xp-badge-wrap{position:relative;display:flex;justify-content:center;padding-top:64px;perspective:1100px}
.xp-lanyard{position:absolute;top:0;left:50%;width:14px;height:86px;margin-left:-7px;background:linear-gradient(var(--gold),#E58B00);border-radius:0 0 4px 4px;z-index:3}
.xp-lanyard::after{content:'';position:absolute;left:50%;bottom:-4px;width:46px;height:12px;margin-left:-23px;background:#A898A2;border-radius:4px}
.xp-badge{position:relative;z-index:2;width:100%;max-width:500px;background:#fff;color:var(--text);border:2px solid var(--deep);border-radius:22px;padding:36px 26px 24px;box-shadow:12px 12px 0 var(--deep)}
.xp-badge::before{content:'';position:absolute;top:12px;left:50%;width:52px;height:9px;margin-left:-26px;border-radius:99px;background:var(--deep)}
.xp-badge h3{font-size:1.35rem;font-weight:800;color:var(--head);margin-bottom:6px}
.xp-badge>p,.xp-badge-note{font-size:.88rem;line-height:1.55;color:var(--mute)}
.xp-badge>p{margin-bottom:18px}
.xp-fld{margin-bottom:12px}
.xp-fld input,.xp-fld textarea{width:100%;min-width:0;padding:13px 14px;border-radius:10px;border:2px solid #E4DCE6;background:#FCFAFD;font:inherit;font-size:.92rem;color:var(--head);transition:border-color .2s,box-shadow .2s}
.xp-fld textarea{min-height:96px;resize:vertical}
.xp-fld input:focus,.xp-fld textarea:focus{border-color:var(--pink);background:#fff;outline:none;box-shadow:0 0 0 4px rgba(196,0,122,.14)}
.xp-consent{display:flex;align-items:center;justify-content:space-between;gap:12px;margin:2px 0 14px;font-size:.84rem;color:var(--text)}
.xp-consent label{display:inline-flex;align-items:center;gap:8px;cursor:pointer}
.xp-consent input{accent-color:var(--pink)}
.xp-submit{width:100%}
.xp-submit:disabled{opacity:.7;cursor:wait}
.xp-fb{display:none;margin-top:12px;padding:11px 12px;border-radius:10px;background:#E6F8F0;color:#065F46;border:1px solid #A7F3D0;font-size:.86rem;font-weight:600;text-align:center}
.xp-pass{margin:18px -26px -24px;padding:16px 26px 20px;background:var(--blush);border-top:2px dashed rgba(126,0,78,.4);border-radius:0 0 22px 22px;position:relative}
.xp-pass::before,.xp-pass::after{content:'';position:absolute;top:-10px;width:18px;height:18px;border-radius:50%;background:#fff;border:2px solid var(--deep)}
.xp-pass::before{left:-11px}.xp-pass::after{right:-11px}
.xp-badge-note{color:var(--head);font-size:.8rem}

/* ===== Ribbon ===== */
.xp-ribbon{position:relative;z-index:2;background:var(--gold);color:var(--deep);overflow:hidden;border-top:3px solid var(--deep);border-bottom:3px solid var(--deep)}
.xp-ribbon-track{display:flex;width:max-content;animation:xpRun 38s linear infinite}
.xp-ribbon:hover .xp-ribbon-track{animation-play-state:paused}
.xp-ribbon span{font:800 1.05rem var(--disp);padding:14px 30px;white-space:nowrap}
.xp-ribbon span::after{content:'✦';margin-left:60px;opacity:.55}
.xp-ribbon span b{display:inline-block;margin-right:8px;padding:2px 11px;border-radius:8px;background:var(--deep);color:var(--gold)}
@keyframes xpRun{to{transform:translateX(-50%)}}

/* ===== Sections ===== */
.xp-sec{position:relative;padding:76px 0}
.xp-head{max-width:760px;margin-bottom:40px}
.xp-head h2{font-size:clamp(1.85rem,3.5vw,2.8rem);font-weight:800;line-height:1.1;margin-bottom:14px;color:var(--head)}
.xp-head p{color:var(--mute);line-height:1.65;font-size:1.02rem}
.xp-head--dark h2{color:#fff}
.xp-head--dark p{color:rgba(255,255,255,.8)}
.xp-head--c{margin-left:auto;margin-right:auto;text-align:center}
.xp-kicker{display:inline-block;font-size:.82rem;font-weight:800;color:var(--pink);margin-bottom:12px;padding-left:14px;border-left:4px solid var(--pink);text-transform:uppercase;letter-spacing:.06em}
.xp-head--dark .xp-kicker{color:var(--gold);border-color:var(--gold)}
.xp-acc{color:var(--pink)}
.xp-head--dark .xp-acc,.xp-cta-card .xp-acc{color:var(--gold)}
.xp-bar{display:block;width:84px;height:7px;margin:0 0 16px;background:repeating-linear-gradient(90deg,var(--pink) 0 12px,var(--gold) 12px 24px)}
.xp-head--c .xp-bar{margin-left:auto;margin-right:auto}
.xp-mist{background:var(--soft);background-image:radial-gradient(rgba(126,0,78,.07) 1px,transparent 1.2px);background-size:24px 24px}
.xp-dark{background:radial-gradient(50% 60% at 92% 0%,rgba(255,181,71,.15),transparent 70%),linear-gradient(160deg,var(--deep) 0%,#A8006A 100%);color:#fff}
.xp-scallop::after{content:'';position:absolute;top:0;left:0;right:0;height:18px;pointer-events:none;background:radial-gradient(circle at 18px 0,var(--gold) 17px,transparent 18px) 0 0/36px 18px repeat-x}

/* ===== Brands ===== */
.xp-brands{padding:44px 0;background:#fff;border-bottom:3px solid var(--deep)}
.xp-brands .xp-head{margin-bottom:24px}
.xp-marq{position:relative;overflow-x:auto;overflow-y:hidden;scrollbar-width:none;cursor:grab;border:2px solid var(--deep);border-radius:18px;background:#fff;box-shadow:6px 6px 0 var(--gold);padding:16px 14px}
.xp-marq::-webkit-scrollbar{display:none}
.xp-marq-track{display:flex;gap:14px;width:max-content;align-items:center;animation:xpRun3 40s linear infinite}
.xp-marq:hover .xp-marq-track,.xp-marq:focus-within .xp-marq-track,.xp-marq:active .xp-marq-track{animation-play-state:paused}
@keyframes xpRun3{to{transform:translateX(-33.333%)}}
.xp-brand{display:flex;align-items:center;gap:10px;padding:8px 16px;white-space:nowrap;border:2px solid var(--deep);border-radius:999px;background:#fff;box-shadow:3px 3px 0 var(--gold)}
.xp-brand img{height:30px;width:auto;max-width:80px;object-fit:contain;filter:grayscale(1)}
.xp-brand:hover img{filter:none}
.xp-brand b{display:block;font:700 .86rem var(--disp);color:var(--head)}
.xp-brand span{display:block;font-size:.68rem;font-weight:700;color:var(--pink)}
.xp-mono{display:grid;place-items:center;width:30px;height:30px;border-radius:8px;background:var(--blush);color:var(--pink);font:800 .75rem var(--disp)}

/* ===== Stalls ===== */
.xp-stall{position:relative;background:#fff;border:2px solid var(--deep);border-radius:18px;padding:54px 24px 24px;box-shadow:6px 6px 0 var(--gold);transition:translate .25s,box-shadow .25s;display:block;text-decoration:none;color:inherit}
.xp-stall::before{content:'';position:absolute;top:0;left:0;right:0;height:28px;border-radius:15px 15px 0 0;background:repeating-linear-gradient(90deg,var(--pink) 0 22px,#fff 22px 44px);border-bottom:2px solid var(--deep)}
.xp-stall:nth-child(even)::before{background:repeating-linear-gradient(90deg,var(--gold) 0 22px,#fff 22px 44px)}
.xp-stall:hover{translate:-4px -4px;box-shadow:10px 10px 0 var(--pink)}
.xp-stall h3,.xp-stall h4{font-size:1.2rem;font-weight:800;line-height:1.25;margin-bottom:8px;color:var(--head)}
.xp-stall p{font-size:.92rem;line-height:1.65;color:var(--mute)}
.xp-ico{display:grid;place-items:center;width:48px;height:48px;margin-bottom:14px;border-radius:12px;background:var(--blush);color:var(--pink);border:2px solid var(--deep);box-shadow:3px 3px 0 var(--gold);font-size:1.4rem;transition:rotate .3s,scale .3s}
.xp-stall:hover .xp-ico{rotate:-8deg;scale:1.08}
.xp-stall--flex{display:flex;flex-direction:column;height:100%}
.xp-stall--flex p{flex-grow:1}
.xp-more{margin-top:16px;font-weight:800;font-size:.88rem;color:var(--pink)}
.xp-stall--sm{padding:46px 20px 20px}
.xp-stall--sm::before{height:22px;border-radius:15px 15px 0 0}

/* ===== Split ===== */
.xp-split{display:grid;gap:44px;align-items:center;grid-template-columns:minmax(0,1fr)}
.xp-split>*{min-width:0}
@media(min-width:992px){.xp-split{grid-template-columns:1fr 1fr;gap:60px}}
.xp-copy h2{font-size:clamp(1.85rem,3.5vw,2.8rem);font-weight:800;line-height:1.1;margin-bottom:16px;color:var(--head)}
.xp-copy p{line-height:1.7;color:var(--mute);margin-bottom:14px}
.xp-copy p.xp-lead{font-size:1.08rem;font-weight:600;color:var(--text)}
.xp-callout{margin:6px 0 22px;padding:14px 16px;border-left:5px solid var(--pink);background:var(--blush);border-radius:0 12px 12px 0;font-weight:700;color:var(--pink);font-size:.92rem}
.xp-browser{background:var(--deep);border-radius:18px;padding:12px;box-shadow:14px 14px 0 var(--blush),0 0 0 2px var(--deep)}
.xp-browser-bar{display:flex;align-items:center;gap:14px;padding:4px 6px 12px}
.xp-dots{display:flex;gap:6px}
.xp-dots span{width:11px;height:11px;border-radius:50%;background:var(--pink)}
.xp-dots span:nth-child(2){background:var(--gold)}
.xp-dots span:nth-child(3){background:#fff}
.xp-url{flex:1;min-width:0;background:rgba(255,255,255,.15);color:rgba(255,255,255,.85);font-size:.72rem;padding:6px 12px;border-radius:8px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
.xp-screen{position:relative;background:#fff;border-radius:10px;overflow:hidden}
.xp-screen img{display:block;width:100%;height:auto}
.xp-float{position:absolute;top:12px;right:12px;display:inline-flex;align-items:center;gap:8px;padding:8px 13px;border-radius:12px;background:var(--gold);color:var(--deep);border:2px solid var(--deep);box-shadow:3px 3px 0 var(--deep);font:800 .76rem var(--disp)}
.xp-float i{width:8px;height:8px;border-radius:50%;background:var(--mint);box-shadow:0 0 0 3px rgba(14,159,110,.25)}

/* ===== Telemetry card ===== */
.xp-tele{background:var(--deep);color:#fff;border-radius:18px;padding:12px;box-shadow:14px 14px 0 var(--blush),0 0 0 2px var(--deep)}
.xp-tele-body{background:#5C0038;border-radius:12px;padding:20px 18px}
.xp-live{display:inline-flex;align-items:center;gap:7px;background:#E6F8F0;color:#0A7A54;font-size:.74rem;font-weight:800;padding:5px 11px;border-radius:99px;margin-bottom:12px}
.xp-live i{width:7px;height:7px;border-radius:50%;background:var(--mint)}
.xp-tele h4{color:#fff;font-size:1.2rem;line-height:1.25;margin-bottom:8px}
.xp-tele p{font-size:.86rem;line-height:1.6;color:rgba(255,255,255,.78);margin-bottom:16px}
.xp-chips{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:8px}
.xp-chip{text-align:center;padding:12px 4px;border-radius:10px;background:rgba(255,255,255,.1);border:2px solid rgba(255,255,255,.22)}
.xp-chip b{display:block;font:800 1.3rem var(--disp);color:var(--gold);line-height:1.1}
.xp-chip span{font-size:.66rem;font-weight:600;opacity:.85}
.xp-tele-foot{display:flex;justify-content:space-between;gap:8px;flex-wrap:wrap;margin-top:14px;font-size:.72rem;color:rgba(255,255,255,.7)}
.xp-tele-foot b{color:var(--gold)}

/* ===== Checklist ===== */
.xp-check{list-style:none;padding:0;margin:18px 0 22px;display:grid;gap:10px 16px;grid-template-columns:minmax(0,1fr)}
@media(min-width:600px){.xp-check{grid-template-columns:1fr 1fr}}
.xp-check li{display:flex;gap:10px;font-size:.88rem;font-weight:600;line-height:1.5;color:var(--text)}
.xp-check li::before{content:'✓';display:grid;place-items:center;flex-shrink:0;width:22px;height:22px;border-radius:50%;background:var(--pink);color:#fff;font-size:.72rem;font-weight:800}
.xp-out{margin:0 0 20px;padding:18px;border:2px solid var(--deep);border-radius:16px;background:#fff;box-shadow:5px 5px 0 var(--gold)}
.xp-out h4{font-size:1rem;margin-bottom:10px;color:var(--head)}
.xp-out ul{list-style:none;margin:0;padding:0;display:grid;gap:8px}
.xp-out li{display:flex;gap:9px;font-size:.86rem;line-height:1.5;color:var(--mute)}
.xp-out li::before{content:'✓';color:var(--pink);font-weight:800}

/* ===== Founder card ===== */
.xp-fcard{display:grid;grid-template-columns:minmax(0,1fr);border:2px solid var(--deep);border-radius:24px;overflow:hidden;background:#fff;box-shadow:10px 10px 0 var(--gold)}
@media(min-width:900px){.xp-fcard{grid-template-columns:.75fr 1.25fr}}
.xp-fside{padding:38px 28px;color:#fff;text-align:center;display:flex;flex-direction:column;align-items:center;gap:10px;background:
    radial-gradient(circle at 12% 0%,rgba(255,181,71,.42),transparent 55%),
    radial-gradient(circle at 100% 100%,rgba(126,0,78,.45),transparent 55%),
    var(--pink)}
.xp-fphoto{width:150px;height:150px;border-radius:50%;overflow:hidden;border:4px solid var(--gold);box-shadow:5px 5px 0 var(--deep);background:var(--blush);display:grid;place-items:center;font:800 2.2rem var(--disp);color:var(--pink)}
.xp-fphoto img{width:100%;height:100%;object-fit:cover;display:block}
.xp-fside h4{color:#fff;font-size:1.35rem;margin-top:8px}
.xp-fside b{color:var(--gold);font-size:.86rem}
.xp-fside p{font-size:.86rem;line-height:1.6;color:rgba(255,255,255,.92)}
.xp-fmain{padding:34px 30px}
.xp-fmain h3{font-size:1.4rem;font-weight:800;margin-bottom:10px;color:var(--head)}
.xp-fmain>p{line-height:1.65;color:var(--mute);margin-bottom:6px}
.xp-fstats{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:10px;margin:20px 0}
.xp-fstat{text-align:center;padding:14px 6px;border:2px solid var(--deep);border-radius:14px;background:var(--blush);box-shadow:3px 3px 0 var(--gold)}
.xp-fstat b{display:block;font:800 1.4rem var(--disp);color:var(--pink);line-height:1.1}
.xp-fstat span{font-size:.72rem;font-weight:700;color:var(--mute)}
.xp-pillars{display:grid;gap:16px;padding:0 30px 34px;grid-template-columns:minmax(0,1fr)}
@media(min-width:768px){.xp-pillars{grid-template-columns:repeat(3,minmax(0,1fr))}}
.xp-fwide{grid-column:1/-1}

/* ===== Process ===== */
.xp-step{position:relative;background:#fff;border:2px solid var(--deep);border-radius:18px;padding:24px 22px;box-shadow:6px 6px 0 var(--gold);transition:translate .25s,box-shadow .25s}
.xp-step:hover{translate:-3px -3px;box-shadow:9px 9px 0 var(--pink)}
.xp-step-n{display:inline-grid;place-items:center;min-width:46px;height:46px;padding:0 8px;margin-bottom:14px;border-radius:12px;background:var(--deep);color:var(--gold);border:2px solid var(--deep);font:800 1.15rem var(--disp);box-shadow:3px 3px 0 var(--gold)}
.xp-step h3{font-size:1.15rem;font-weight:800;margin-bottom:8px;color:var(--head)}
.xp-step p{font-size:.9rem;line-height:1.62;color:var(--mute)}

/* ===== Feedback slider ===== */
.xp-fb-card{height:100%;padding:30px 26px;border-radius:22px;background:radial-gradient(50% 60% at 92% 0%,rgba(255,181,71,.15),transparent 70%),linear-gradient(160deg,#5C0038 0%,var(--deep) 100%);border:2px solid rgba(255,255,255,.18);box-shadow:8px 8px 0 var(--gold)}
.xp-fb-card .xp-stars{color:var(--gold);font-size:1.1rem;margin-bottom:12px;letter-spacing:2px}
.xp-fb-card blockquote{margin:0 0 20px;font-size:.98rem;line-height:1.7;color:rgba(255,255,255,.88)}
.xp-who{display:flex;align-items:center;gap:12px}
.xp-who i{display:grid;place-items:center;width:44px;height:44px;border-radius:50%;background:var(--pink);color:#fff;font:800 1rem var(--disp);font-style:normal;border:2px solid var(--gold)}
.xp-who b{display:block;font:800 .98rem var(--disp);color:#fff}
.xp-who span{font-size:.78rem;color:rgba(255,255,255,.7)}
#delFeedbackSwiper{overflow:hidden;padding:4px 14px 14px 4px;margin:-4px -14px -14px -4px}
#delFeedbackSwiper .swiper-slide{height:auto}
#delFeedbackSwiper .swiper-pagination{position:relative;margin-top:26px;display:flex;justify-content:center;gap:8px}
#delFeedbackSwiper .swiper-pagination-bullet{width:44px;height:6px;border-radius:0;background:rgba(255,255,255,.3);opacity:1;margin:0!important;transition:background .3s,width .3s}
#delFeedbackSwiper .swiper-pagination-bullet-active{background:var(--gold);width:72px}

/* ===== Case cards + table ===== */
.xp-rc{background:#fff;border:2px solid var(--deep);border-radius:18px;overflow:hidden;display:flex;flex-direction:column;transition:translate .25s,box-shadow .25s;box-shadow:4px 4px 0 var(--gold)}
.xp-rc:hover{translate:-3px -3px;box-shadow:6px 6px 0 var(--pink)}
.xp-rc-head{padding:14px 18px;background:var(--deep);color:#fff}
.xp-rc-head span{display:inline-block;font-size:.7rem;font-weight:800;background:var(--pink);padding:3px 10px;border-radius:99px;color:#fff}
.xp-rc-head h3{color:#fff;font-size:1.05rem;margin-top:8px;line-height:1.25}
.xp-rc-stat{padding:18px;text-align:center;border-bottom:1px solid var(--line)}
.xp-rc-stat b{display:block;font:800 2.2rem var(--disp);color:var(--pink);line-height:1.05}
.xp-rc-stat span{font-size:.76rem;font-weight:600;color:var(--mute)}
.xp-rc p{padding:16px 18px;font-size:.88rem;line-height:1.62;color:var(--mute);flex-grow:1}
.xp-table-wrap{overflow-x:auto;border:2px solid var(--deep);border-radius:18px;background:#fff;margin-top:30px;box-shadow:6px 6px 0 var(--gold)}
.xp-table{width:100%;min-width:720px;border-collapse:collapse}
.xp-table th{text-align:left;padding:14px 18px;background:var(--blush);color:var(--head);font-size:.8rem;font-weight:800;border-bottom:2px solid var(--deep)}
.xp-table td{padding:15px 18px;font-size:.9rem;border-bottom:1px solid var(--line);vertical-align:middle;color:var(--text)}
.xp-table tr:last-child td{border-bottom:0}
.xp-table tbody tr:hover{background:#FFF9FC}
.xp-medal{display:inline-grid;place-items:center;min-width:40px;height:40px;padding:0 6px;border-radius:50%;background:var(--gold);color:var(--deep);font:800 .9rem var(--disp);border:2px solid var(--deep);box-shadow:2px 2px 0 var(--deep)}
.xp-ok{color:var(--mint);font-weight:800;font-size:.84rem}
@media(max-width:760px){
    .xp-table-wrap{border:0;background:transparent;overflow:visible;box-shadow:none}
    .xp-table{min-width:0;display:block}
    .xp-table thead{display:none}
    .xp-table tbody{display:grid;gap:16px}
    .xp-table tr{display:block;background:#fff;border:2px solid var(--deep);border-radius:16px;box-shadow:5px 5px 0 var(--gold)}
    .xp-table td{display:flex;justify-content:space-between;gap:14px;text-align:right;padding:11px 16px;border-bottom:1px dashed var(--line)}
    .xp-table td::before{content:attr(data-label);flex-shrink:0;text-align:left;font-size:.72rem;font-weight:800;color:var(--mute)}
    .xp-table td:first-child{background:var(--blush);border-radius:12px 12px 0 0}
}

/* ===== Wrap-up card ===== */
.xp-wrapcard{max-width:920px;margin:0 auto;padding:40px 34px;border:2px solid var(--deep);border-radius:24px;background:#fff;box-shadow:10px 10px 0 var(--gold);text-align:center}
.xp-wrapcard h2{font-size:clamp(1.7rem,3.2vw,2.5rem);font-weight:800;line-height:1.1;margin-bottom:8px;color:var(--head)}
.xp-wrapcard h3{font-size:1.05rem;color:var(--pink);margin-bottom:18px}
.xp-wrapcard p{line-height:1.7;color:var(--mute);margin-bottom:14px}
.xp-pills{display:flex;flex-wrap:wrap;justify-content:center;gap:8px;margin:6px 0 22px;padding:18px;background:var(--blush);border-radius:16px;border:2px dashed rgba(126,0,78,.4)}
.xp-pill{padding:6px 14px;border:2px solid var(--deep);border-radius:999px;background:#fff;color:var(--pink);font-weight:700;font-size:.82rem}
.xp-goal{font:800 1.05rem var(--disp);color:var(--head)!important}

/* ===== FAQ ===== */
.xp-faq-grid{display:grid;gap:40px;grid-template-columns:minmax(0,1fr)}
.xp-faq-grid>*{min-width:0}
@media(min-width:992px){.xp-faq-grid{grid-template-columns:.8fr 1.2fr;gap:64px}.xp-faq-grid .xp-head{position:sticky;top:100px;align-self:start;margin-bottom:0}}
.del-faq-item{border:2px solid var(--deep);border-radius:14px;margin-bottom:12px;background:#fff;overflow:hidden;transition:box-shadow .2s;box-shadow:4px 4px 0 var(--gold)}
.del-faq-item.active{box-shadow:5px 5px 0 var(--pink)}
.del-faq-btn{width:100%;display:flex;justify-content:space-between;align-items:center;gap:16px;padding:18px 20px;background:transparent;border:0;text-align:left;font:800 1.02rem/1.3 var(--disp);color:var(--head);cursor:pointer}
.del-faq-btn .icon{flex-shrink:0;display:grid;place-items:center;width:30px;height:30px;border-radius:8px;background:var(--blush);color:var(--pink);font-size:1.2rem;line-height:1;transition:transform .25s,background .25s,color .25s;border:2px solid var(--deep)}
.del-faq-item.active .icon{transform:rotate(45deg);background:var(--pink);color:#fff}
.del-faq-answer{display:none;padding:0 20px 20px;line-height:1.7;color:var(--mute);font-size:.94rem}
.del-faq-item.active .del-faq-answer{display:block}

/* ===== Final CTA ===== */
.xp-cta{padding:0 0 76px}
.xp-cta-card{position:relative;overflow:hidden;color:#fff;border-radius:26px;padding:60px 34px;text-align:center;box-shadow:10px 10px 0 var(--gold);background:
    radial-gradient(50% 80% at 50% 120%,rgba(255,181,71,.45),transparent 70%),
    radial-gradient(rgba(255,255,255,.18) 1px,transparent 1.2px) 0 0/26px 26px,
    linear-gradient(135deg,#A8006A 0%,#C4007A 50%,#E0398F 100%)}
.xp-cta-card::before{content:'';position:absolute;inset:0;border-radius:inherit;padding:3px;pointer-events:none;background:conic-gradient(from var(--xpa,0deg),var(--gold),#fff,var(--pink3),var(--gold));-webkit-mask:linear-gradient(#000 0 0) content-box,linear-gradient(#000 0 0);-webkit-mask-composite:xor;mask:linear-gradient(#000 0 0) content-box exclude,linear-gradient(#000 0 0);animation:xpAngle 6s linear infinite}
@property --xpa{syntax:'<angle>';initial-value:0deg;inherits:false}
@keyframes xpAngle{to{--xpa:360deg}}
.xp-cta-card>*{position:relative;z-index:2}
.xp-cta-card h2{color:#fff;font-size:clamp(1.8rem,3.6vw,2.9rem);font-weight:800;line-height:1.12;max-width:860px;margin:0 auto 14px;text-shadow:0 3px 0 rgba(126,0,78,.3)}
.xp-cta-card h3{color:#FFD7EB;font-size:1.1rem;font-weight:600;margin-bottom:14px}
.xp-cta-card p{max-width:700px;margin:0 auto 28px;color:rgba(255,255,255,.92);line-height:1.65}
.xp-cta-card .xp-actions{justify-content:center}
.xp-cta-foot{margin-top:24px;font-size:.8rem;color:rgba(255,255,255,.72)}

/* ===== Sticky mobile + theme toggle ===== */
.xp-sticky{position:fixed;left:0;right:0;bottom:0;z-index:999;display:none;gap:10px;padding:10px 14px calc(10px + env(safe-area-inset-bottom));background:var(--deep);border-top:3px solid var(--gold);translate:0 115%;transition:translate .35s cubic-bezier(.16,1,.3,1)}
.xp-sticky.on{translate:0 0}
.xp-sticky .xp-btn{padding:13px 16px;font-size:.9rem}
.xp-sticky .xp-btn--pink{flex:1;box-shadow:0 4px 0 #5C0038}
.del-theme-toggle-floating{position:fixed;left:max(18px,env(safe-area-inset-left));bottom:max(18px,env(safe-area-inset-bottom));z-index:1050;display:inline-flex;align-items:center;justify-content:center;gap:8px;min-height:46px;padding:0 15px;border:2px solid var(--deep);border-radius:12px;background:#fff;color:var(--deep);font:700 .84rem 'Plus Jakarta Sans',system-ui,sans-serif;cursor:pointer;box-shadow:3px 3px 0 var(--deep)}
.del-theme-toggle-floating svg{width:17px;height:17px}
.del-theme-toggle-floating .del-theme-icon-sun,.del-theme-dark .del-theme-toggle-floating .del-theme-icon-moon{display:none}
.del-theme-dark .del-theme-toggle-floating .del-theme-icon-sun{display:block}
.del-theme-dark .del-theme-toggle-floating{background:#2A1230;color:#fff;border-color:#5A2A52;box-shadow:3px 3px 0 #5A2A52}
.del-theme-dark{color-scheme:dark;background:#150A16}
.del-theme-dark .site-header,.del-theme-dark .site-header.scrolled{background:rgba(21,10,22,.97);border-bottom-color:rgba(255,255,255,.12)}
.del-theme-dark .site-header .brand,.del-theme-dark .site-header .brand-name,.del-theme-dark .site-header .nav-link{color:#F8FAFC}
.del-theme-dark .mobile-menu{background:#1B1022;border-color:rgba(255,255,255,.12)}
/* Dark-mode tweaks for cards */
.del-theme-dark .xp-stall,.del-theme-dark .xp-badge,.del-theme-dark .xp-brands,.del-theme-dark .xp-brand,.del-theme-dark .xp-marq,.del-theme-dark .xp-out,.del-theme-dark .xp-rc,.del-theme-dark .xp-table-wrap,.del-theme-dark .xp-wrapcard,.del-theme-dark .xp-fcard,.del-theme-dark .del-faq-item{background:var(--card);color:var(--text)}
.del-theme-dark .xp-stall h3,.del-theme-dark .xp-stall h4,.del-theme-dark .xp-fmain h3,.del-theme-dark .xp-wrapcard h2,.del-theme-dark .del-faq-btn,.del-theme-dark .xp-step h3,.del-theme-dark .xp-out h4,.del-theme-dark .xp-badge h3{color:var(--h)}
.del-theme-dark .xp-fld input,.del-theme-dark .xp-fld textarea{background:#150A16;color:#fff;border-color:#5A2A52}
.del-theme-dark .xp-consent{color:#B9A6B4}
.del-theme-dark .xp-table td{color:var(--text)}
.del-theme-dark .xp-table th{background:#2A1230;color:#fff}
.del-theme-dark .xp-pill{background:#2A1230;color:#fff}
.del-theme-dark .xp-pass{background:#2A1230}

/* ===== Responsive ===== */
@media(max-width:991px){.xp-hero h1,.xp-hero-desc{max-width:none}}
@media(max-width:767px){
    .xp-sticky{display:flex}
    .xp-cta{padding-bottom:96px}
    .del-theme-toggle-floating{bottom:84px}
    .xp-ribbon span{font-size:.9rem;padding:12px 20px}
    .xp-ribbon span::after{margin-left:36px}
}
@media(max-width:575px){
    .xp-wrap{padding:0 16px}
    .xp-sec{padding:56px 0}
    .xp-hero{padding-top:36px}
    .xp-btn{white-space:normal;text-align:center;line-height:1.3;max-width:100%;padding:14px 18px;min-height:48px}
    .xp-actions .xp-btn{width:100%}
    .xp-badge{padding:34px 18px 22px;box-shadow:8px 8px 0 var(--deep)}
    .xp-pass{margin:18px -18px -22px;padding:14px 18px 18px}
    .xp-fld input,.xp-fld textarea{font-size:16px}
    .xp-stall{padding:50px 20px 22px;box-shadow:4px 4px 0 var(--gold)}
    .xp-browser,.xp-tele{box-shadow:7px 7px 0 var(--blush),0 0 0 2px var(--deep)}
    .xp-fmain{padding:26px 18px}
    .xp-pillars{padding:0 18px 26px}
    .xp-fcard{box-shadow:6px 6px 0 var(--gold)}
    .xp-fstats{grid-template-columns:repeat(2,minmax(0,1fr))}
    .xp-fstat b{font-size:1.2rem}
    .xp-wrapcard{padding:28px 18px;box-shadow:6px 6px 0 var(--gold)}
    .xp-cta-card{padding:44px 20px;border-radius:20px;box-shadow:6px 6px 0 var(--gold)}
    .del-faq-btn{padding:16px;font-size:.98rem}
    .del-faq-answer{padding:0 16px 18px}
    .xp-author{border-radius:20px}
    .xp-chips{gap:6px}
    .xp-chip b{font-size:1.05rem}
    #delFeedbackSwiper .swiper-pagination-bullet{width:26px}
    #delFeedbackSwiper .swiper-pagination-bullet-active{width:44px}
}
@media(hover:none){
    .xp-stall:hover,.xp-rc:hover,.xp-step:hover,.xp-btn--pink:hover,.xp-btn--white:hover{translate:none}
    .xp-stall:hover{box-shadow:6px 6px 0 var(--gold)}
}
@media(prefers-reduced-motion:reduce){
    .xp-ribbon-track,.xp-marq-track,.xp-cta-card::before{animation:none}
    .xp-btn,.xp-stall,.xp-rc,.xp-step{transition:none}
}
</style>

<main class="xp del-seo-page">

    <!-- 1. HERO -->
    <section class="xp-hero">
        <div class="xp-wrap">
            <div class="xp-hero-grid">
                <div>
                    <div class="xp-tag"><i></i><span>SEO agency in Delhi NCR &bull; 13+ years</span></div>
                    <h1><?= $e($heroTitle) ?><em><?= $e($heroAccent) ?></em></h1>
                    <p class="xp-hero-desc"><?= $e($heroDesc) ?></p>
                    <ul class="xp-bullets">
                        <?php foreach ($heroVisibleBullets as $bullet): ?>
                            <li><span><?= $e($bullet) ?></span></li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="xp-actions">
                        <a href="/contact.php" class="xp-btn xp-btn--pink trigger-enquiry-modal" data-service="SEO Services in Delhi"><span>Schedule a Free SEO Consultation</span><?= $arrow ?></a>
                        <a href="tel:+919999674255" class="xp-btn xp-btn--ghost"><?= $phoneIco ?><span>Call: +91-9999674255</span></a>
                    </div>
                    <div class="xp-author">
                        <div class="xp-author-av">
                            <?php if (!empty($founderImage) && file_exists(__DIR__ . $founderImage)): ?>
                                <img src="<?= $e($founderImage) ?>" alt="<?= $e($founderName) ?>">
                            <?php else: ?>
                                <span><?= $e($founderInitial) ?></span>
                            <?php endif; ?>
                        </div>
                        <div>
                            <b><?= $e($founderName) ?><i></i></b>
                            <small><span><?= $e($founderRole) ?></span> &bull; Published: Nov 04, 2025 &bull; Updated: Oct 31, 2026</small>
                        </div>
                    </div>
                </div>

                <div class="xp-badge-wrap">
                    <div class="xp-lanyard"></div>
                    <div class="xp-badge">
                        <h3>Request A Quote</h3>
                        <p>Fill out the form below to receive a custom SEO strategy and projection for your Delhi business.</p>
                        <form id="delHeroQuoteForm" onsubmit="handleHeroQuoteSubmit(event)">
                            <div class="xp-fld"><input type="text" name="name" placeholder="Name *" required></div>
                            <div class="xp-fld"><input type="tel" name="phone" placeholder="Phone No *" required></div>
                            <div class="xp-fld"><input type="email" name="email" placeholder="Email *" required></div>
                            <div class="xp-fld"><textarea name="message" placeholder="Type Your Message *" required></textarea></div>
                            <div class="xp-consent">
                                <label><input type="checkbox" checked required><span>I'm not a robot</span></label>
                                <span>🔒 Protected</span>
                            </div>
                            <button type="submit" class="xp-btn xp-btn--pink xp-submit" id="delHeroSubmitBtn"><span>Submit →</span></button>
                            <div class="xp-fb" id="delHeroFeedback"></div>
                        </form>
                        <div class="xp-pass">
                            <p class="xp-badge-note">Share your website URL, business niche, target location, and budget, and we’ll recommend a customised SEO strategy at competitive prices. Get in touch today to grow your business organically!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="xp-ribbon" aria-hidden="true">
            <div class="xp-ribbon-track">
                <?php for ($i = 0; $i < 4; $i++): ?>
                    <span><b>13+</b> years experience</span><span><b>1000+</b> projects served</span><span><b>95%</b> client retention</span><span><b>80+</b> keywords at #1</span>
                <?php endfor; ?>
            </div>
        </div>
    </section>

    <!-- 2. BRANDS -->
    <section class="xp-brands">
        <div class="xp-wrap">
            <div class="xp-head xp-head--c">
                <span class="xp-kicker">Global industry credibility</span>
                <h2>Top Event Brands Embracing <span class="xp-acc">SEO</span></h2>
                <i class="xp-bar"></i>
                <p>Here are just a few of the organisers, global trade expos, and high-growth brands we've helped with strategic search optimisation campaigns.</p>
            </div>
            <div class="xp-marq" tabindex="0" role="region" aria-label="Client brands, horizontally scrollable">
                <div class="xp-marq-track">
                    <?php $tripleLogos = array_merge($brandLogos, $brandLogos, $brandLogos);
                    foreach ($tripleLogos as $b): $imgPath = $b['logo'] ?? ''; ?>
                        <div class="xp-brand">
                            <?php if (!empty($imgPath)): ?>
                                <img src="<?= $e($imgPath) ?>" alt="<?= $e($b['name']) ?>" loading="lazy">
                            <?php else: ?>
                                <div class="xp-mono"><?= $e(substr($b['name'], 0, 2)) ?></div>
                            <?php endif; ?>
                            <div><b><?= $e($b['name']) ?></b><span><?= $e($b['category'] ?? 'Enterprise Brand') ?></span></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. NARRATIVE + WHY -->
    <section class="xp-sec">
        <div class="xp-wrap">
            <div class="xp-split">
                <div class="xp-copy">
                    <span class="xp-kicker"><?= $e($strategicNarrative['eyebrow'] ?? 'BE FOUND BY THE CORRECT PEOPLE • GENERATE BETTER LEADS • GROW ORGANICALLY') ?></span>
                    <h2><?= $headAccent($narrativeTitle, $narrativeAccent) ?></h2>
                    <p class="xp-lead"><?= $e($strategicNarrative['lead'] ?? '') ?></p>
                    <p><?= $e($strategicNarrative['p1'] ?? '') ?></p>
                    <p><?= $e($strategicNarrative['p2'] ?? '') ?></p>
                    <div class="xp-callout"><?= $e($strategicNarrative['callout'] ?? '') ?></div>
                    <div class="xp-actions">
                        <a href="/contact.php" class="xp-btn xp-btn--pink trigger-enquiry-modal" data-service="SEO Services in Delhi"><span>Complimentary Website Analysis</span><?= $arrow ?></a>
                        <a href="tel:+919999674255" class="xp-btn xp-btn--line"><span>Call +91-9999674255</span></a>
                    </div>
                </div>
                <div class="xp-browser">
                    <div class="xp-browser-bar">
                        <div class="xp-dots"><span></span><span></span><span></span></div>
                        <div class="xp-url">google.com/search?q=spring+sourcing+fair+2027</div>
                    </div>
                    <div class="xp-screen">
                        <img src="<?= $e($springSerpImage) ?>" alt="Google Search Spring Sourcing Fair 2027 IHGF Delhi Fair #1 Ranking WebTecMart" loading="lazy">
                        <div class="xp-float"><i></i>#1 Organic Rank &bull; IHGF Delhi Fair</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="xp-sec xp-mist xp-scallop">
        <div class="xp-wrap">
            <div class="xp-head xp-head--c">
                <span class="xp-kicker">Why choose WebTecMart</span>
                <h2>What Makes WebTecMart the Perfect <span class="xp-acc">SEO Choice</span>?</h2>
                <i class="xp-bar"></i>
                <p>Battle-tested capabilities built around performance, transparency, and sustainable business revenue.</p>
            </div>
            <div class="xp-grid xp-g3">
                <?php foreach ($whyCards as $wc): ?>
                    <article class="xp-stall">
                        <span class="xp-ico"><?= $e($wc['icon'] ?? '🎯') ?></span>
                        <h3><?= $e($wc['title'] ?? '') ?></h3>
                        <p><?= $e($wc['desc'] ?? '') ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 4. KEY TAKEAWAYS -->
    <section class="xp-sec">
        <div class="xp-wrap">
            <div class="xp-head xp-head--c">
                <span class="xp-kicker"><?= $e($takeaways['eyebrow'] ?? 'KEY TAKEAWAYS') ?></span>
                <h2><?= $headAccent($takeawaysTitleBase, $takeawaysTitleAccent) ?></h2>
                <i class="xp-bar"></i>
                <p><?= $e($takeaways['lead'] ?? '') ?></p>
            </div>
            <div class="xp-split" style="align-items:start">
                <div class="xp-copy">
                    <h3 style="font-size:1.2rem;font-weight:800">What's included in our SEO services:</h3>
                    <ul class="xp-check">
                        <?php foreach (($takeaways['checklist'] ?? []) as $chk): ?><li><span><?= $e($chk) ?></span></li><?php endforeach; ?>
                    </ul>
                    <div class="xp-out">
                        <h4>What this means for your business</h4>
                        <ul>
                            <li>Stronger visibility for the services and locations that matter to you.</li>
                            <li>More relevant visitors finding your business through search.</li>
                            <li>Clear progress tracking to guide ongoing SEO improvements.</li>
                        </ul>
                    </div>
                    <a href="/contact.php" class="xp-btn xp-btn--pink trigger-enquiry-modal" data-service="SEO Services in Delhi"><span>Book Your Free SEO Consultation</span><?= $arrow ?></a>
                </div>
                <div class="xp-tele">
                    <div class="xp-browser-bar">
                        <div class="xp-dots"><span></span><span></span><span></span></div>
                        <div class="xp-url">google.com/search?q=best+seo+company+delhi</div>
                    </div>
                    <div class="xp-tele-body">
                        <div class="xp-live"><i></i>🏆 #1 Ranked in Delhi NCR</div>
                        <h4>WebTecMart &mdash; Top SEO Agency in Delhi NCR</h4>
                        <p>Driving qualified organic buyer revenue with 13+ years experience, 1,000+ verified client campaigns, and high-intent keyword strategies.</p>
                        <div class="xp-chips">
                            <div class="xp-chip"><b>+400%</b><span>Organic Growth</span></div>
                            <div class="xp-chip"><b>80+</b><span>#1 Keywords</span></div>
                            <div class="xp-chip"><b>1,393%</b><span>Search Clicks</span></div>
                        </div>
                        <div class="xp-tele-foot"><b>⚡ AI Overview Featured Entity</b><span>Verified GA4 &bull; Search Console 2026</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. WHAT WE OFFER -->
    <section class="xp-sec xp-mist xp-scallop">
        <div class="xp-wrap">
            <div class="xp-head xp-head--c">
                <span class="xp-kicker">What we offer</span>
                <h2>Comprehensive SEO Services That Turn <span class="xp-acc">Search Visibility Into Revenue</span></h2>
                <i class="xp-bar"></i>
                <p>From technical architecture to local rankings, content strategy, high-authority link acquisition, and AI-search visibility. Discover what's included in our SEO solutions:</p>
            </div>
            <div class="xp-grid xp-g3">
                <?php foreach ($offers as $off):
                    $offIcon = $off['icon'] ?? 'sparkles'; ?>
                    <a href="<?= $e($off['link'] ?? '/contact.php') ?>" class="xp-stall xp-stall--flex">
                        <span class="xp-ico"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><?= $offIcons[$offIcon] ?? $offIcons['sparkles'] ?></svg></span>
                        <h3><?= $e($off['title'] ?? 'SEO Service') ?></h3>
                        <p><?= $e($off['desc'] ?? '') ?></p>
                        <span class="xp-more"><?= $e($off['link_text'] ?? 'Explore Service →') ?></span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 6. CHALLENGES -->
    <section class="xp-sec">
        <div class="xp-wrap">
            <div class="xp-head xp-head--c">
                <span class="xp-kicker"><?= $e($challenges['eyebrow'] ?? 'SEO CHALLENGES') ?></span>
                <h2><?= $headAccent($challengesTitleBase, $challengesTitleAccent) ?></h2>
                <i class="xp-bar"></i>
                <p><?= $e($challenges['lead'] ?? '') ?></p>
            </div>
            <div class="xp-grid xp-g3">
                <?php foreach (($challenges['items'] ?? []) as $ch): ?>
                    <article class="xp-stall">
                        <span class="xp-ico"><?= $e($ch['icon'] ?? '⚡') ?></span>
                        <h3><?= $e($ch['title'] ?? '') ?></h3>
                        <p><?= $e($ch['desc'] ?? '') ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 7. FOUNDER / EXPERTS -->
    <section class="xp-sec xp-mist xp-scallop">
        <div class="xp-wrap">
            <div class="xp-head xp-head--c">
                <span class="xp-kicker"><?= $e($founderSection['eyebrow'] ?? 'MEET THE EXPERTS') ?></span>
                <h2><?= $headAccent($founderTitleBase, $founderTitleAccent) ?></h2>
                <i class="xp-bar"></i>
                <p><?= $e($founderSection['lead'] ?? '') ?></p>
            </div>
            <div class="xp-fcard">
                <div class="xp-fside">
                    <div class="xp-fphoto">
                        <?php if (!empty($founderImage) && file_exists(__DIR__ . $founderImage)): ?>
                            <img src="<?= $e($founderImage) ?>" alt="<?= $e($founderName) ?>">
                        <?php else: ?><span><?= $e($founderInitial) ?></span><?php endif; ?>
                    </div>
                    <h4><?= $e($founderName) ?></h4>
                    <b><?= $e($founderRole) ?></b>
                    <p>Directing technical search architecture and high-converting commercial SEO for leading brands across Delhi NCR and international markets.</p>
                </div>
                <div class="xp-fmain">
                    <h3>Built on 13+ Years of Proven Technical Execution</h3>
                    <p>Strong SEO comes from combining the right people, processes and expertise. Our team is focused on search strategy, technical optimisation, content depth, and analytics to ensure campaigns directly advance real business pipeline.</p>
                    <div class="xp-fstats">
                        <?php foreach (($founderSection['stats'] ?? []) as $fst): ?>
                            <div class="xp-fstat"><b><?= $e($fst['val']) ?></b><span><?= $e($fst['label']) ?></span></div>
                        <?php endforeach; ?>
                    </div>
                    <div class="xp-actions">
                        <a href="/contact.php" class="xp-btn xp-btn--pink trigger-enquiry-modal" data-service="SEO Services in Delhi"><span>Discuss With an SEO Specialist</span><?= $arrow ?></a>
                        <a href="tel:+919999674255" class="xp-btn xp-btn--line"><span>Call: +91-9999674255</span></a>
                    </div>
                </div>
                <div class="xp-pillars xp-fwide">
                    <?php foreach (($founderSection['pillars'] ?? []) as $plr): ?>
                        <article class="xp-stall xp-stall--sm">
                            <span class="xp-ico"><?= $e($plr['icon'] ?? '⚙️') ?></span>
                            <h4><?= $e($plr['title'] ?? '') ?></h4>
                            <p><?= $e($plr['desc'] ?? '') ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- 8. PROCESS -->
    <section class="xp-sec">
        <div class="xp-wrap">
            <div class="xp-head xp-head--c">
                <span class="xp-kicker">Our process</span>
                <h2>How Our SEO Services in Delhi Turn <span class="xp-acc">Strategy Into Results</span></h2>
                <i class="xp-bar"></i>
                <p>Each business has its own set of customers, competition and goals for growth. We begin by understanding where you stand today and create a roadmap that gets you where you want to be.</p>
            </div>
            <div class="xp-grid xp-g3">
                <?php foreach ($processSteps as $p): ?>
                    <article class="xp-step">
                        <span class="xp-step-n"><?= $e($p['step']) ?></span>
                        <h3><?= $e($p['title']) ?></h3>
                        <p><?= $e($p['description']) ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 9. INDUSTRIES -->
    <section class="xp-sec xp-mist xp-scallop">
        <div class="xp-wrap">
            <div class="xp-head xp-head--c">
                <span class="xp-kicker">Industry expertise</span>
                <h2>Industries We Work With Across <span class="xp-acc">Delhi NCR &amp; Beyond</span></h2>
                <i class="xp-bar"></i>
                <p>Proven SEO strategies tailored to vertical-specific buyer intent, conversion funnels, and search landscapes.</p>
            </div>
            <div class="xp-grid xp-g4">
                <?php foreach ($industries as $ind): ?>
                    <article class="xp-stall xp-stall--sm">
                        <span class="xp-ico"><?= $e($ind['icon']) ?></span>
                        <h4><?= $e($ind['title']) ?></h4>
                        <p><?= $e($ind['desc']) ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 10. CLIENT FEEDBACK -->
    <section class="xp-sec xp-dark">
        <div class="xp-wrap">
            <div class="xp-head xp-head--dark">
                <span class="xp-kicker">Client testimonials</span>
                <h2>Trusted by Organisers, Founders &amp; <span class="xp-acc">Marketing Directors</span></h2>
                <i class="xp-bar"></i>
                <p>Real feedback from partners who transformed their search visibility and qualified commercial inquiries with WebTecMart.</p>
            </div>
            <div class="swiper" id="delFeedbackSwiper">
                <div class="swiper-wrapper">
                    <?php foreach ($clientFeedback as $fb): ?>
                        <div class="swiper-slide">
                            <div class="xp-fb-card">
                                <div class="xp-stars">★★★★★</div>
                                <blockquote>"<?= $e($fb['quote']) ?>"</blockquote>
                                <div class="xp-who">
                                    <i><?= $e(substr($fb['author'], 0, 1)) ?></i>
                                    <div><b><?= $e($fb['author']) ?></b><span><?= $e($fb['role']) ?> &bull; <?= $e($fb['company']) ?></span></div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <!-- 11. CASES + RANKINGS -->
    <section class="xp-sec">
        <div class="xp-wrap">
            <div class="xp-head xp-head--c">
                <span class="xp-kicker">Verified case studies</span>
                <h2>Real Rankings. Real Traffic. <span class="xp-acc">Real Business Growth.</span></h2>
                <i class="xp-bar"></i>
                <p>Explore documented outcomes from our targeted search campaigns across high-competition industries.</p>
            </div>
            <div class="xp-grid xp-g3">
                <?php foreach ($cases as $c): ?>
                    <article class="xp-rc">
                        <div class="xp-rc-head"><span><?= $e($c['badge'] ?? 'SEO Growth Result') ?></span><h3><?= $e($c['title'] ?? 'SEO Success Story') ?></h3></div>
                        <div class="xp-rc-stat"><b><?= $e($c['stat'] ?? 'Results') ?></b><span><?= $e($c['stat_desc'] ?? 'Business growth through search visibility') ?></span></div>
                        <p><?= $e($c['desc'] ?? '') ?></p>
                    </article>
                <?php endforeach; ?>
            </div>

            <div class="xp-head" style="margin:56px 0 0"><span class="xp-kicker">Live search telemetry</span>
                <h2 style="font-size:clamp(1.6rem,3vw,2.3rem)">Verified Google Rankings for Our <span class="xp-acc">Client Campaigns</span></h2>
                <p>Live keyword snapshot across competitive commercial and event search queries in Delhi NCR and global Google indices.</p>
            </div>
            <div class="xp-table-wrap">
                <table class="xp-table">
                    <thead><tr><th>Target Search Phrase</th><th>Google Position</th><th>Est. Search Volume</th><th>Difficulty</th><th>SERP Status</th></tr></thead>
                    <tbody>
                        <?php foreach ($rankings as $rk): ?>
                            <tr>
                                <td data-label="Keyword"><strong>🔍 <?= $e($rk['kw'] ?? 'Search keyword') ?></strong></td>
                                <td data-label="Position"><span class="xp-medal"><?= $e($rk['pos'] ?? '#1') ?></span></td>
                                <td data-label="Volume"><?= $e($rk['vol'] ?? 'N/A') ?></td>
                                <td data-label="Difficulty"><?= $e($rk['diff'] ?? 'Medium') ?></td>
                                <td data-label="Status"><span class="xp-ok">✓ <?= $e($rk['status'] ?? 'Verified') ?></span></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- 12. WRAPPING UP -->
    <section class="xp-sec xp-mist xp-scallop">
        <div class="xp-wrap">
            <div class="xp-wrapcard">
                <span class="xp-kicker"><?= $e($wrappingUp['eyebrow'] ?? 'DELHI NCR LOCAL REACH') ?></span>
                <h2><?= $e($wrappingUp['title'] ?? 'Why SEO Services in Delhi Matter for Your Business') ?></h2>
                <h3><?= $e($wrappingUp['sub'] ?? '') ?></h3>
                <p><?= $e($wrappingUp['p1'] ?? '') ?></p>
                <p><?= $e($wrappingUp['p2'] ?? '') ?></p>
                <div class="xp-pills" aria-label="Target micro-markets across Delhi NCR">
                    <?php foreach (($wrappingUp['micro_markets'] ?? []) as $mm): ?><span class="xp-pill">📍 <?= $e($mm) ?></span><?php endforeach; ?>
                </div>
                <p class="xp-goal"><?= $e($wrappingUp['goal'] ?? '') ?></p>
                <a href="/contact.php" class="xp-btn xp-btn--pink trigger-enquiry-modal" data-service="SEO Services in Delhi"><span>Book Your Free SEO Consultation</span><?= $arrow ?></a>
            </div>
        </div>
    </section>

    <!-- 13. FAQ -->
    <section class="xp-sec">
        <div class="xp-wrap">
            <div class="xp-faq-grid">
                <div class="xp-head">
                    <span class="xp-kicker">Frequently asked questions</span>
                    <h2>Frequently Asked Questions About <span class="xp-acc">SEO Services in Delhi</span></h2>
                    <i class="xp-bar"></i>
                    <p>Clear, transparent answers to help you make an informed decision for your digital growth:</p>
                </div>
                <div>
                    <?php foreach (($faqs ?? []) as $idx => $fq):
                        $faqQuestion = is_array($fq) ? ($fq['q'] ?? $fq['question'] ?? 'Question') : (string) $fq;
                        $faqAnswer = is_array($fq) ? ($fq['a'] ?? $fq['answer'] ?? '') : ''; ?>
                        <div class="del-faq-item<?= $idx === 0 ? ' active' : '' ?>">
                            <button class="del-faq-btn" onclick="toggleDelFaq(this)">
                                <span><?= $e($faqQuestion) ?></span>
                                <span class="icon"><?= $idx === 0 ? '−' : '+' ?></span>
                            </button>
                            <div class="del-faq-answer"><?= nl2br($e($faqAnswer)) ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- 14. FINAL CTA -->
    <section class="xp-cta">
        <div class="xp-wrap">
            <div class="xp-cta-card">
                <h2><?= $e($ctaBox['headline'] ?? "So You're Ready to Take the Plunge and") ?></h2>
                <h3><?= $e($ctaBox['sub'] ?? '') ?></h3>
                <p><?= $e($ctaBox['text'] ?? '') ?></p>
                <div class="xp-actions">
                    <button type="button" class="xp-btn xp-btn--white trigger-enquiry-modal" data-service="SEO Services in Delhi"><span><?= $e($ctaBox['btn_text'] ?? 'Book Your Free SEO Consultation') ?></span><?= $arrow ?></button>
                    <a href="tel:+919999674255" class="xp-btn xp-btn--ghost"><?= $phoneIco ?><span><?= $e($ctaBox['call_text'] ?? 'Call: +91-9999674255') ?></span></a>
                </div>
                <div class="xp-cta-foot">Free Strategy Consultation &bull; Zero Obligation &bull; Tailored Delhi NCR Action Plan</div>
            </div>
        </div>
    </section>

    <div class="xp-sticky" id="xpSticky">
        <a href="tel:+919999674255" class="xp-btn xp-btn--ghost"><?= $phoneIco ?><span>Call</span></a>
        <a href="/contact.php" class="xp-btn xp-btn--pink trigger-enquiry-modal" data-service="SEO Services in Delhi"><span>Free SEO audit</span><?= $arrow ?></a>
    </div>
</main>

<button type="button" class="del-theme-toggle del-theme-toggle-floating" id="delThemeToggleFloating" aria-label="Switch to dark mode" aria-pressed="false">
    <svg class="del-theme-icon-moon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20.9 13A9 9 0 0 1 11 3.1 9 9 0 1 0 20.9 13Z"/></svg>
    <svg class="del-theme-icon-sun" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="4"/><path d="M12 2v2m0 16v2M4.93 4.93l1.42 1.42m11.3 11.3 1.42 1.42M2 12h2m16 0h2M4.93 19.07l1.42-1.42m11.3-11.3 1.42-1.42"/></svg>
    <span class="del-theme-toggle-label">Dark mode</span>
</button>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Theme toggle
        const themeToggles = document.querySelectorAll('.del-theme-toggle');
        const applyTheme = (isDark) => {
            document.body.classList.toggle('del-theme-dark', isDark);
            themeToggles.forEach(toggle => {
                toggle.setAttribute('aria-pressed', String(isDark));
                toggle.setAttribute('aria-label', isDark ? 'Switch to light mode' : 'Switch to dark mode');
                toggle.querySelector('.del-theme-toggle-label').textContent = isDark ? 'Light mode' : 'Dark mode';
            });
        };
        try { applyTheme(window.localStorage.getItem('del-seo-theme') === 'dark'); }
        catch (error) { console.error('Unable to load the saved display theme.', error); applyTheme(false); }
        themeToggles.forEach(toggle => {
            toggle.addEventListener('click', () => {
                const isDark = !document.body.classList.contains('del-theme-dark');
                applyTheme(isDark);
                try { window.localStorage.setItem('del-seo-theme', isDark ? 'dark' : 'light'); }
                catch (error) { console.error('Unable to save the selected display theme.', error); }
            });
        });

        // Feedback slider
        if (typeof Swiper !== 'undefined') {
            new Swiper('#delFeedbackSwiper', {
                slidesPerView: 1, spaceBetween: 20, loop: true, grabCursor: true,
                autoplay: { delay: 5000, disableOnInteraction: false, pauseOnMouseEnter: true },
                pagination: { el: '#delFeedbackSwiper .swiper-pagination', clickable: true },
                breakpoints: { 768: { slidesPerView: 2, spaceBetween: 22 } }
            });
        }

        // Mobile sticky CTA
        const sticky = document.getElementById('xpSticky'), hero = document.querySelector('.xp-hero'), cta = document.querySelector('.xp-cta');
        if (sticky && hero && 'IntersectionObserver' in window) {
            let heroOut = false, ctaIn = false;
            const upd = () => sticky.classList.toggle('on', heroOut && !ctaIn);
            new IntersectionObserver(e => { heroOut = !e[0].isIntersecting; upd(); }).observe(hero);
            if (cta) new IntersectionObserver(e => { ctaIn = e[0].isIntersecting; upd(); }, { threshold: 0.2 }).observe(cta);
        }

        // Click ripple on buttons
        const main = document.querySelector('main.xp');
        if (main) main.addEventListener('click', function (e) {
            const b = e.target.closest && e.target.closest('.xp-btn');
            if (!b) return;
            const r = b.getBoundingClientRect(), d = document.createElement('i');
            d.className = 'xp-ripple';
            d.style.left = (e.clientX - r.left) + 'px';
            d.style.top = (e.clientY - r.top) + 'px';
            b.appendChild(d);
            setTimeout(() => d.remove(), 700);
        });
    });

    // FAQ Toggle
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

    // Hero Quote Form AJAX
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

        const done = () => {
            fb.style.display = 'block';
            fb.innerText = "Thank you! Your quote request has been received. Our team will contact you shortly.";
            form.reset();
            btn.disabled = false;
            btn.querySelector('span').innerText = 'Submit →';
        };

        fetch('/contact.php', {
            method: 'POST',
            body: formData,
            headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
        })
        .then(res => res.json())
        .then(done)
        .catch(done);
    }
</script>

<?php
require_once __DIR__ . '/app/templates/footer.php';
?>