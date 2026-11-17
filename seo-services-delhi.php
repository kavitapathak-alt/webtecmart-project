<?php
$pageMeta = [
    'title' => 'SEO Services in Delhi – Result-Driven SEO to Grow Your Business | WebTecMart',
    'description' => 'Build search visibility that drives real business growth. WebTecMart is the top-rated SEO agency in Delhi NCR providing AI-ready SEO, Google #1 rankings, and qualified organic leads.',
];
require_once __DIR__ . '/app/templates/header.php';
require_once __DIR__ . '/app/components/sections/FooterSection.php';
require_once __DIR__ . '/functions.php';

// ============================================================
// DATA (Loaded from DB with fallbacks)
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
?>

<?php
$h = fn($s) => htmlspecialchars((string) $s);
if (!function_exists('dsIcon')) {
    function dsIcon(string $n, int $s = 22): string {
        $p = [
            'code' => '<path d="m16 18 6-6-6-6"/><path d="m8 6-6 6 6 6"/>',
            'layout' => '<rect width="18" height="18" x="3" y="3" rx="2"/><path d="M3 9h18M9 21V9"/>',
            'search' => '<circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/>',
            'map-pin' => '<path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/>',
            'link' => '<path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/>',
            'sparkles' => '<path d="M12 2l2.4 6.6L21 11l-6.6 2.4L12 20l-2.4-6.6L3 11l6.6-2.4L12 2z"/>',
            'arrow' => '<path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>',
            'phone' => '<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>',
            'check' => '<circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/>',
            'plus' => '<path d="M5 12h14"/><path d="M12 5v14"/>',
            'lock' => '<rect width="18" height="11" x="3" y="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/>',
        ];
        $d = $p[$n] ?? $p['sparkles'];
        return '<svg width="' . $s . '" height="' . $s . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . $d . '</svg>';
    }
}
$em = fn($t) => '<em>' . htmlspecialchars((string) $t) . '</em>';
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

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
      "address": {"@type": "PostalAddress", "streetAddress": "Connaught Place / Nehru Place Commercial Center", "addressLocality": "New Delhi", "addressRegion": "Delhi", "postalCode": "110001", "addressCountry": "IN"},
      "geo": {"@type": "GeoCoordinates", "latitude": 28.6139, "longitude": 77.2090},
      "areaServed": [{"@type": "City", "name": "Delhi"}, {"@type": "City", "name": "New Delhi"}, {"@type": "City", "name": "Noida"}, {"@type": "City", "name": "Gurgaon"}, {"@type": "City", "name": "Faridabad"}, {"@type": "City", "name": "Ghaziabad"}]
    },
    {
      "@type": "FAQPage",
      "mainEntity": [
        <?php foreach (($faqs ?? []) as $fIdx => $fq): ?>
        {
          "@type": "Question",
          "name": <?= json_encode(is_array($fq) ? ($fq['q'] ?? $fq['question'] ?? 'Question') : (string) $fq) ?>,
          "acceptedAnswer": {"@type": "Answer", "text": <?= json_encode(is_array($fq) ? ($fq['a'] ?? $fq['answer'] ?? '') : '') ?>}
        }<?= $fIdx < count($faqs ?? []) - 1 ? ',' : '' ?>
        <?php endforeach; ?>
      ]
    }
  ]
}
</script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,500;12..96,700;12..96,800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap');

    .ds { --ink:#17121F; --ink2:#2A2236; --paper:#FAF8FC; --line:#E4DCEC; --mag:#C4007A; --mag2:#E0398F; --soft:#FBE6F2; --mute:#5E566B; --ok:#0C7A55;
        --display:'Bricolage Grotesque','Plus Jakarta Sans',system-ui,sans-serif; --body:'Plus Jakarta Sans',system-ui,-apple-system,sans-serif;
        font-family:var(--body); color:var(--ink); background:var(--paper); line-height:1.6; width:100%; max-width:100vw; overflow-x:clip; }
    .ds *, .ds *::before, .ds *::after { box-sizing:border-box; }
    .ds h1,.ds h2,.ds h3,.ds h4 { font-family:var(--display); margin:0; color:var(--ink); letter-spacing:-.025em; }
    .ds p { margin:0; }
    .ds h1,.ds h2,.ds h3,.ds p,.ds li,.ds summary { overflow-wrap:break-word; }
    .ds img { max-width:100%; }
    .ds a:focus-visible,.ds button:focus-visible,.ds summary:focus-visible,.ds input:focus-visible,.ds textarea:focus-visible { outline:3px solid var(--mag); outline-offset:2px; }
    .ds-wrap { max-width:1200px; margin:0 auto; padding:0 22px; }
    .ds-sec { padding:84px 0; }
    .ds-sec.alt { background:#fff; border-block:1px solid var(--line); }
    .ds-grid > * { min-width:0; }

    .ds-kicker { font-size:.86rem; font-weight:700; color:var(--mag); margin-bottom:12px; display:flex; align-items:center; gap:8px; }
    .ds-kicker::before { content:""; width:22px; height:2px; background:var(--mag); border-radius:2px; flex:none; }
    .ds-h2 { font-size:clamp(1.9rem,3.8vw,3rem); font-weight:800; line-height:1.07; max-width:22ch; }
    .ds h1 em, .ds-h2 em { font-style:normal; background:linear-gradient(transparent 62%,rgba(224,57,143,.32) 62%,rgba(224,57,143,.32) 92%,transparent 92%); padding:0 .06em; }
    .ds-lede { color:var(--mute); font-size:1.04rem; max-width:58ch; margin-top:16px; }
    .ds-head { margin-bottom:48px; }
    .ds-split { display:grid; gap:18px 56px; align-items:end; }
    @media(min-width:900px){ .ds-split { grid-template-columns:1.2fr 1fr; } .ds-split .ds-lede { margin-top:0; } }
    .ds-side { display:grid; gap:40px; }
    @media(min-width:992px){ .ds-side { grid-template-columns:.8fr 1.2fr; gap:80px; } .ds-side > .sticky { position:sticky; top:100px; align-self:start; } }

    .ds-btn { display:inline-flex; align-items:center; justify-content:center; gap:10px; font:700 .95rem var(--body); padding:14px 24px; border-radius:12px; text-decoration:none; cursor:pointer; border:2px solid transparent; transition:transform .2s,background .2s; white-space:nowrap; }
    .ds-btn.pri { background:var(--mag); color:#fff !important; box-shadow:0 10px 24px -8px rgba(196,0,122,.55); }
    .ds-btn.pri:hover { background:#A80068; transform:translateY(-2px); }
    .ds-btn.ghost { background:transparent; color:var(--ink) !important; border-color:var(--ink); }
    .ds-btn.ghost:hover { background:var(--ink); color:#fff !important; }
    .ds-btn.light { background:#fff; color:var(--mag) !important; }
    .ds-btn.lineW { color:#fff !important; border-color:rgba(255,255,255,.55); }
    .ds-actions { display:flex; gap:12px; flex-wrap:wrap; margin-top:28px; }

    /* hero */
    .ds-hero { padding:56px 0 0; background:radial-gradient(900px 420px at 88% -10%,rgba(224,57,143,.16),transparent 60%),radial-gradient(600px 360px at -5% 30%,rgba(196,0,122,.07),transparent 60%),var(--paper); }
    .ds-hero-grid { display:grid; gap:44px; align-items:start; }
    @media(min-width:992px){ .ds-hero-grid { grid-template-columns:1.1fr .9fr; gap:64px; } }
    .ds-hero h1 { font-size:clamp(2.3rem,5vw,4rem); font-weight:800; line-height:1.04; letter-spacing:-.035em; }
    .ds-hero h1 span.t { display:block; font-size:.52em; font-weight:700; color:var(--mute); margin-bottom:10px; letter-spacing:-.02em; }
    .ds-hero-desc { color:var(--mute); font-size:1.05rem; margin-top:20px; max-width:58ch; }
    .ds-points { list-style:none; margin:26px 0 0; padding:0; display:grid; gap:0 28px; }
    @media(min-width:640px){ .ds-points { grid-template-columns:1fr 1fr; } }
    .ds-points li { display:flex; gap:12px; padding:13px 0; border-bottom:1px solid var(--line); font-size:.92rem; font-weight:600; line-height:1.45; }
    .ds-points svg { color:var(--ok); flex:none; margin-top:2px; }
    .ds-author { display:inline-flex; align-items:center; gap:12px; margin-top:26px; padding:6px 18px 6px 6px; border:1px solid var(--line); border-radius:999px; background:#fff; max-width:100%; }
    .ds-av { width:46px; height:46px; border-radius:50%; overflow:hidden; background:var(--mag); color:#fff; display:grid; place-items:center; font-weight:800; flex:none; }
    .ds-av img { width:100%; height:100%; object-fit:cover; }
    .ds-author b { display:block; font-size:.92rem; line-height:1.2; }
    .ds-author small { display:block; font-size:.76rem; color:var(--mute); line-height:1.35; }
    .ds-author small span { color:var(--mag); font-weight:700; }

    .ds-desk { background:var(--ink); color:#fff; border-radius:24px; padding:30px 26px 24px; position:relative; overflow:hidden; box-shadow:0 30px 60px -24px rgba(23,18,31,.55); }
    .ds-desk::before { content:""; position:absolute; width:260px; height:260px; right:-90px; top:-110px; background:radial-gradient(circle,rgba(224,57,143,.6),transparent 65%); pointer-events:none; }
    .ds-desk > * { position:relative; }
    .ds-desk h3 { color:#fff; font-size:1.55rem; font-weight:700; line-height:1.15; }
    .ds-desk .sub { color:rgba(255,255,255,.74); font-size:.9rem; margin:8px 0 20px; }
    .ds-field { margin-bottom:12px; }
    .ds-field input,.ds-field textarea { width:100%; padding:13px 14px; border-radius:10px; font:500 .92rem var(--body); color:#fff; background:rgba(255,255,255,.07); border:1px solid rgba(255,255,255,.18); }
    .ds-field input::placeholder,.ds-field textarea::placeholder { color:rgba(255,255,255,.55); }
    .ds-field input:focus,.ds-field textarea:focus { background:rgba(255,255,255,.12); border-color:var(--mag2); }
    .ds-field textarea { min-height:92px; resize:vertical; }
    .ds-consent { display:flex; align-items:center; justify-content:space-between; gap:12px; font-size:.84rem; color:rgba(255,255,255,.8); margin:2px 0 16px; flex-wrap:wrap; }
    .ds-consent label { display:inline-flex; gap:8px; align-items:center; cursor:pointer; }
    .ds-consent input { accent-color:var(--mag); width:16px; height:16px; }
    .ds-desk .ds-btn { width:100%; }
    .ds-note { margin-top:16px; padding-top:16px; border-top:1px solid rgba(255,255,255,.14); font-size:.8rem; color:rgba(255,255,255,.7); line-height:1.5; }
    #delHeroFeedback { display:none; margin-top:12px; padding:10px 12px; border-radius:10px; font-size:.86rem; font-weight:600; text-align:center; }

    /* ticker */
    .ds-ticker { margin-top:60px; padding:18px 0; background:#fff; border-block:1px solid var(--line); overflow:hidden; }
    .ds-ticker-label { text-align:center; font-size:.84rem; font-weight:700; color:var(--mute); margin-bottom:14px; padding:0 18px; }
    .ds-track { display:flex; gap:16px; width:max-content; animation:dsTick 45s linear infinite; align-items:center; }
    .ds-ticker:hover .ds-track { animation-play-state:paused; }
    @keyframes dsTick { to { transform:translateX(-50%); } }
    .ds-brand { display:flex; align-items:center; gap:12px; padding:8px 18px; border:1px solid var(--line); border-radius:14px; background:var(--paper); white-space:nowrap; }
    .ds-brand img { height:30px; width:auto; max-width:80px; object-fit:contain; filter:grayscale(1); opacity:.85; }
    .ds-brand i { width:30px; height:30px; border-radius:8px; background:var(--soft); color:var(--mag); display:grid; place-items:center; font:800 .75rem var(--body); font-style:normal; }
    .ds-brand b { display:block; font-size:.86rem; line-height:1.2; }
    .ds-brand small { display:block; font-size:.72rem; color:var(--mag); font-weight:600; }

    /* narrative */
    .ds-nar { display:grid; gap:40px; align-items:center; }
    @media(min-width:992px){ .ds-nar { grid-template-columns:1fr 1fr; gap:64px; } }
    .ds-nar .lead { font-family:var(--display); font-size:1.3rem; font-weight:700; line-height:1.35; margin:20px 0 14px; letter-spacing:-.02em; }
    .ds-nar p.b { color:var(--mute); margin-bottom:12px; }
    .ds-callout { margin:20px 0 0; padding:16px 18px; border-left:4px solid var(--mag); background:var(--soft); border-radius:0 12px 12px 0; font-weight:700; color:var(--ink2); font-size:.95rem; }
    .ds-browser { border:1px solid var(--line); border-radius:18px; overflow:hidden; background:#fff; box-shadow:0 30px 60px -30px rgba(23,18,31,.4); }
    .ds-chrome { display:flex; align-items:center; gap:12px; padding:10px 14px; background:#F4F0F8; border-bottom:1px solid var(--line); }
    .ds-dots { display:flex; gap:6px; } .ds-dots i { width:10px; height:10px; border-radius:50%; background:#D6CCE0; }
    .ds-url { flex:1; min-width:0; background:#fff; border:1px solid var(--line); border-radius:999px; padding:5px 12px; font:500 .76rem monospace; color:var(--mute); white-space:nowrap; overflow:hidden; text-overflow:ellipsis; }
    .ds-vp { position:relative; }
    .ds-vp img { display:block; width:100%; height:auto; }
    .ds-flag { position:absolute; top:12px; right:12px; background:#fff; border:1px solid var(--line); border-radius:10px; padding:6px 12px; font-size:.74rem; font-weight:700; display:flex; gap:8px; align-items:center; box-shadow:0 8px 20px rgba(0,0,0,.12); }
    .ds-flag i { width:8px; height:8px; border-radius:50%; background:#10B981; box-shadow:0 0 0 3px rgba(16,185,129,.25); }

    /* why rows */
    .ds-rows { list-style:none; margin:0; padding:0; border-top:2px solid var(--ink); display:grid; }
    @media(min-width:760px){ .ds-rows.two { grid-template-columns:1fr 1fr; column-gap:48px; } }
    .ds-row { display:flex; gap:18px; padding:24px 0; border-bottom:1px solid var(--line); }
    .ds-ic { width:46px; height:46px; border-radius:12px; background:var(--soft); color:var(--mag); display:grid; place-items:center; flex:none; font-size:1.4rem; }
    .ds-row h3 { font-size:1.15rem; font-weight:700; line-height:1.2; }
    .ds-row p { color:var(--mute); font-size:.92rem; margin-top:6px; }

    /* takeaways */
    .ds-take { display:grid; gap:40px; align-items:start; }
    @media(min-width:992px){ .ds-take { grid-template-columns:1.1fr .9fr; gap:56px; } }
    .ds-checks { list-style:none; padding:0; margin:22px 0; display:grid; gap:0 26px; }
    @media(min-width:640px){ .ds-checks { grid-template-columns:1fr 1fr; } }
    .ds-checks li { display:flex; gap:10px; padding:11px 0; border-bottom:1px solid var(--line); font-size:.88rem; font-weight:600; line-height:1.45; }
    .ds-checks svg { color:var(--ok); flex:none; margin-top:2px; }
    .ds-means { padding:18px 20px; border-radius:16px; background:#fff; border:1px solid var(--line); margin-bottom:20px; }
    .ds-means h4 { font-size:1rem; margin-bottom:10px; }
    .ds-means ul { list-style:none; padding:0; margin:0; display:grid; gap:8px; }
    .ds-means li { font-size:.88rem; color:var(--mute); display:flex; gap:10px; }
    .ds-means li::before { content:"✓"; color:var(--mag); font-weight:800; }
    .ds-tele { background:var(--ink); color:#fff; border-radius:22px; padding:26px; position:relative; overflow:hidden; }
    .ds-tele::after { content:""; position:absolute; right:-100px; bottom:-120px; width:300px; height:300px; background:radial-gradient(circle,rgba(224,57,143,.4),transparent 65%); pointer-events:none; }
    .ds-tele > * { position:relative; z-index:1; }
    .ds-live { display:inline-flex; gap:8px; align-items:center; font-size:.8rem; font-weight:700; color:#34D399; border:1px solid rgba(52,211,153,.4); border-radius:999px; padding:4px 12px; }
    .ds-live i { width:7px; height:7px; border-radius:50%; background:#34D399; }
    .ds-tele h4 { color:#fff; font-size:1.5rem; font-weight:700; line-height:1.15; margin:16px 0 8px; }
    .ds-tele p { color:rgba(255,255,255,.75); font-size:.92rem; }
    .ds-kpis { display:grid; grid-template-columns:repeat(3,1fr); gap:1px; background:rgba(255,255,255,.16); border-radius:14px; overflow:hidden; margin-top:22px; }
    .ds-kpis div { background:#241830; padding:16px 10px; text-align:center; }
    .ds-kpis b { display:block; font:800 1.55rem var(--display); color:#FF8CC2; letter-spacing:-.03em; line-height:1; }
    .ds-kpis span { display:block; font-size:.74rem; color:rgba(255,255,255,.75); margin-top:6px; }
    .ds-tele small { display:block; margin-top:16px; font-size:.78rem; color:rgba(255,255,255,.6); }

    /* offers bento */
    .ds-bento { display:grid; gap:16px; }
    @media(min-width:700px){ .ds-bento { grid-template-columns:repeat(2,1fr); } }
    @media(min-width:1000px){ .ds-bento { grid-template-columns:repeat(6,1fr); } .ds-bento > :nth-child(1) { grid-column:span 4; grid-row:span 2; } .ds-bento > :nth-child(n+2) { grid-column:span 2; } }
    .ds-tile { background:#fff; border:1px solid var(--line); border-radius:20px; padding:26px; display:flex; flex-direction:column; text-decoration:none; color:inherit; transition:border-color .2s,box-shadow .2s; }
    .ds-tile:hover { border-color:var(--mag); box-shadow:0 18px 40px -22px rgba(196,0,122,.45); }
    .ds-tile .ds-ic { margin-bottom:18px; }
    .ds-tile h3 { font-size:1.2rem; font-weight:700; line-height:1.2; }
    .ds-tile p { color:var(--mute); font-size:.92rem; margin:8px 0 18px; flex:1; }
    .ds-tile .more { color:var(--mag); font-weight:700; font-size:.88rem; }
    .ds-tile:hover .more { text-decoration:underline; }
    .ds-tile:first-child { background:var(--ink); border-color:var(--ink); justify-content:flex-end; min-height:300px; }
    .ds-tile:first-child h3 { color:#fff; font-size:clamp(1.6rem,3vw,2.3rem); max-width:16ch; }
    .ds-tile:first-child p { color:rgba(255,255,255,.75); max-width:48ch; flex:none; }
    .ds-tile:first-child .ds-ic { background:var(--mag); color:#fff; }
    .ds-tile:first-child .more { color:#FF8CC2; }

    /* founder */
    .ds-founder { display:grid; gap:36px; align-items:center; }
    @media(min-width:992px){ .ds-founder { grid-template-columns:1.2fr .8fr; gap:56px; } }
    .ds-stats { display:grid; grid-template-columns:repeat(3,1fr); border-top:2px solid var(--ink); margin-top:26px; }
    .ds-stats div { padding:18px 14px 6px 0; }
    .ds-stats div + div { padding-left:18px; border-left:1px solid var(--line); }
    .ds-stats b { display:block; font:800 clamp(1.5rem,3vw,2.2rem) var(--display); letter-spacing:-.03em; line-height:1; }
    .ds-stats span { display:block; font-size:.82rem; color:var(--mute); margin-top:6px; }
    .ds-person { background:var(--ink); color:#fff; border-radius:24px; padding:32px 26px; text-align:center; }
    .ds-person .ph { width:150px; height:150px; border-radius:50%; overflow:hidden; margin:0 auto 16px; border:3px solid var(--mag2); background:#2A1233; display:grid; place-items:center; font:800 2.2rem var(--display); color:#FF8CC2; }
    .ds-person .ph img { width:100%; height:100%; object-fit:cover; }
    .ds-person h4 { color:#fff; font-size:1.4rem; }
    .ds-person .role { color:#FF8CC2; font-weight:700; font-size:.88rem; margin:2px 0 12px; }
    .ds-person p { color:rgba(255,255,255,.75); font-size:.88rem; }

    /* process timeline */
    .ds-line { position:relative; list-style:none; margin:0; padding:0 0 0 34px; max-width:860px; }
    .ds-line::before { content:""; position:absolute; left:11px; top:8px; bottom:8px; width:2px; background:linear-gradient(var(--mag),var(--line)); }
    .ds-step { position:relative; padding:0 0 36px; }
    .ds-step:last-child { padding-bottom:0; }
    .ds-step::before { content:""; position:absolute; left:-33px; top:6px; width:16px; height:16px; border-radius:50%; background:var(--paper); border:4px solid var(--mag); }
    .ds-step .n { font-size:.82rem; font-weight:700; color:var(--mag); }
    .ds-step h3 { font-size:1.4rem; font-weight:700; margin-top:2px; }
    .ds-step p { color:var(--mute); margin-top:6px; max-width:60ch; }

    /* industries */
    .ds-ind { display:grid; gap:0 36px; border-top:2px solid var(--ink); }
    @media(min-width:700px){ .ds-ind { grid-template-columns:1fr 1fr; } }
    @media(min-width:1000px){ .ds-ind { grid-template-columns:repeat(4,1fr); gap:0 28px; } }
    .ds-ind > div { padding:22px 0; border-bottom:1px solid var(--line); }
    .ds-ind .e { font-size:1.7rem; line-height:1; margin-bottom:10px; }
    .ds-ind h4 { font-size:1.05rem; font-weight:700; }
    .ds-ind p { font-size:.86rem; color:var(--mute); margin-top:6px; }

    /* testimonials */
    .ds-q { background:#fff; border:1px solid var(--line); border-radius:22px; padding:30px 26px; height:auto; }
    .ds-q .st { color:#F59E0B; letter-spacing:2px; }
    .ds-q blockquote { margin:14px 0 22px; font-family:var(--display); font-size:1.12rem; line-height:1.5; font-weight:500; letter-spacing:-.01em; }
    .ds-q .by { display:flex; gap:12px; align-items:center; }
    .ds-q .by i { width:44px; height:44px; border-radius:50%; background:var(--mag); color:#fff; display:grid; place-items:center; font:800 1rem var(--body); font-style:normal; flex:none; }
    .ds-q .by b { display:block; font-size:.95rem; line-height:1.2; }
    .ds-q .by small { color:var(--mute); font-size:.8rem; }
    #delFeedbackSwiper { padding-bottom:44px; }
    #delFeedbackSwiper .swiper-slide { height:auto; }
    #delFeedbackSwiper .swiper-pagination-bullet-active { background:var(--mag); }

    /* cases */
    .ds-cases { display:grid; gap:16px; }
    @media(min-width:800px){ .ds-cases { grid-template-columns:repeat(3,1fr); } }
    .ds-case { background:#fff; border:1px solid var(--line); border-radius:20px; padding:26px; display:flex; flex-direction:column; }
    .ds-case .bd { align-self:flex-start; font-size:.78rem; font-weight:700; color:var(--mag); background:var(--soft); padding:4px 12px; border-radius:999px; margin-bottom:16px; }
    .ds-case h3 { font-size:1.2rem; font-weight:700; line-height:1.2; }
    .ds-case .big { font:800 clamp(2.4rem,4vw,3.2rem) var(--display); letter-spacing:-.04em; line-height:1; margin-top:20px; color:var(--mag); }
    .ds-case .bl { font-size:.84rem; font-weight:600; margin-top:6px; }
    .ds-case p { color:var(--mute); font-size:.9rem; margin-top:14px; padding-top:14px; border-top:1px solid var(--line); }

    /* rankings */
    .ds-board { display:grid; gap:14px; margin-bottom:34px; }
    @media(min-width:760px){ .ds-board { grid-template-columns:1fr 1fr; } }
    @media(min-width:1050px){ .ds-board { grid-template-columns:repeat(3,1fr); } }
    .ds-rk { background:#fff; border:1px solid var(--line); border-radius:16px; padding:18px 18px 16px; display:flex; gap:14px; }
    .ds-rk .pos { font:800 1.9rem var(--display); color:var(--mag); letter-spacing:-.04em; line-height:1; min-width:52px; }
    .ds-rk b { display:block; font-size:.98rem; line-height:1.3; }
    .ds-rk small { display:block; color:var(--mute); font-size:.78rem; margin-top:2px; word-break:break-all; }
    .ds-rk .meta { display:flex; flex-wrap:wrap; gap:6px; margin-top:10px; }
    .ds-rk .meta span { font-size:.74rem; font-weight:700; padding:3px 10px; border-radius:999px; background:var(--soft); color:var(--mag); }
    .ds-rk .meta span.g { background:#DDF6EA; color:var(--ok); }
    .ds-tw { background:#fff; border:1px solid var(--line); border-radius:18px; overflow-x:auto; -webkit-overflow-scrolling:touch; }
    .ds-tw table { width:100%; min-width:680px; border-collapse:collapse; font-size:.9rem; }
    .ds-tw th { text-align:left; padding:14px 18px; font-size:.82rem; font-weight:700; background:#F4F0F8; border-bottom:1px solid var(--line); }
    .ds-tw td { padding:14px 18px; border-bottom:1px solid var(--line); color:var(--ink2); }
    .ds-tw tr:last-child td { border-bottom:0; }
    .ds-pos { font-weight:800; color:var(--ok); background:#DDF6EA; padding:3px 10px; border-radius:999px; font-size:.82rem; }

    /* wrap up */
    .ds-wrap-up { display:grid; gap:40px; }
    @media(min-width:992px){ .ds-wrap-up { grid-template-columns:.95fr 1.05fr; gap:70px; align-items:start; } }
    .ds-wrap-up .sub { font-family:var(--display); font-weight:700; font-size:1.2rem; color:var(--mag); margin-top:14px; }
    .ds-wrap-up .body p { color:var(--mute); margin-bottom:14px; }
    .ds-chips { display:flex; flex-wrap:wrap; gap:9px; margin:22px 0; }
    .ds-chips span { padding:8px 16px; border-radius:999px; background:#fff; border:1px solid var(--line); font-size:.86rem; font-weight:600; }
    .ds-goal { font-family:var(--display); font-weight:700; font-size:1.15rem; line-height:1.35; color:var(--ink); margin-bottom:6px; }

    /* faq */
    .ds-faq details { border-bottom:1px solid var(--line); }
    .ds-faq details:first-child { border-top:2px solid var(--ink); }
    .ds-faq summary { list-style:none; cursor:pointer; display:flex; justify-content:space-between; gap:18px; align-items:center; padding:22px 0; font-family:var(--display); font-size:1.15rem; font-weight:700; line-height:1.25; }
    .ds-faq summary::-webkit-details-marker { display:none; }
    .ds-pm { width:32px; height:32px; border-radius:50%; background:var(--soft); color:var(--mag); display:grid; place-items:center; flex:none; transition:transform .25s,background .25s,color .25s; }
    .ds-faq details[open] .ds-pm { transform:rotate(45deg); background:var(--mag); color:#fff; }
    .ds-ans { padding:0 50px 24px 0; color:var(--mute); max-width:66ch; }

    /* cta */
    .ds-cta { background:var(--mag); color:#fff; border-radius:28px; padding:60px 32px; position:relative; overflow:hidden; }
    .ds-cta::before { content:""; position:absolute; inset:0; background:radial-gradient(600px 300px at 90% 0%,rgba(255,255,255,.22),transparent 60%),radial-gradient(500px 300px at 0% 100%,rgba(23,18,31,.35),transparent 60%); }
    .ds-cta > * { position:relative; }
    .ds-cta h2 { color:#fff; font-size:clamp(1.9rem,4vw,3.1rem); font-weight:800; line-height:1.06; max-width:22ch; }
    .ds-cta h3 { color:#FFE3F1; font-size:1.15rem; margin-top:14px; font-weight:600; }
    .ds-cta p { color:rgba(255,255,255,.9); margin:14px 0 0; max-width:62ch; }
    .ds-cta small { display:block; margin-top:22px; font-size:.84rem; color:rgba(255,255,255,.85); }

    @media(max-width:991px){ .ds-side > .sticky { position:static !important; } .ds-h2 { max-width:none; } .ds-desk { max-width:640px; } .ds-ticker { margin-top:48px; } }
    @media(max-width:700px){
        .ds-wrap { padding:0 18px; } .ds-sec { padding:56px 0; } .ds-head { margin-bottom:32px; }
        .ds-hero { padding-top:36px; } .ds-actions { flex-direction:column; } .ds-actions .ds-btn,.ds-cta .ds-btn { width:100%; white-space:normal; text-align:center; }
        .ds-desk { padding:24px 18px 20px; max-width:none; } .ds-field input,.ds-field textarea { font-size:16px; }
        .ds-author { border-radius:20px; } .ds-tile { padding:22px; } .ds-tile:first-child { min-height:0; }
        .ds-kpis b { font-size:1.25rem; } .ds-tele { padding:22px 18px; }
        .ds-stats div { padding-right:8px; } .ds-stats div + div { padding-left:12px; }
        .ds-q { padding:24px 20px; } .ds-q blockquote { font-size:1.02rem; }
        .ds-cta { border-radius:22px; padding:40px 22px; } .ds-ans { padding-right:0; } .ds-faq summary { font-size:1.04rem; }
        .ds-track { animation-duration:34s; }
    }
    @media(max-width:380px){ .ds-wrap { padding:0 14px; } .ds-stats { grid-template-columns:1fr; } .ds-stats div + div { padding-left:0; border-left:0; border-top:1px solid var(--line); margin-top:12px; } }
    @media(prefers-reduced-motion:reduce){ .ds-track { animation:none; } .ds *,.ds *::before { transition:none !important; } }
</style>

<main class="ds">

    <!-- 1. HERO -->
    <section class="ds-hero">
        <div class="ds-wrap">
            <div class="ds-hero-grid ds-grid">
                <div>
                    <h1><span class="t"><?= $h($heroTitle) ?></span><?= $em($heroAccent) ?></h1>
                    <p class="ds-hero-desc"><?= $h($heroDesc) ?></p>
                    <?php if (!empty($heroVisibleBullets)): ?>
                    <ul class="ds-points">
                        <?php foreach ($heroVisibleBullets as $b): ?><li><?= dsIcon('check', 18) ?><span><?= $h($b) ?></span></li><?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                    <div class="ds-actions">
                        <a href="/contact.php" class="ds-btn pri trigger-enquiry-modal" data-service="SEO Services in Delhi"><span>Schedule a free SEO consultation</span><?= dsIcon('arrow', 16) ?></a>
                        <a href="tel:+919999674255" class="ds-btn ghost"><?= dsIcon('phone', 16) ?><span>+91-9999674255</span></a>
                    </div>
                    <div class="ds-author">
                        <div class="ds-av">
                            <?php if (!empty($founderImage) && file_exists(__DIR__ . $founderImage)): ?>
                                <img src="<?= $h($founderImage) ?>" alt="<?= $h($founderName) ?>">
                            <?php else: ?><?= $h($founderInitial) ?><?php endif; ?>
                        </div>
                        <div>
                            <b><?= $h($founderName) ?></b>
                            <small><span><?= $h($founderRole) ?></span> &middot; Published Nov 04, 2025 &middot; Updated Oct 31, 2026</small>
                        </div>
                    </div>
                </div>

                <aside class="ds-desk" aria-label="Request a quote">
                    <h3>Get a custom SEO plan for your business</h3>
                    <p class="sub">Free strategy and projection for your Delhi business.</p>
                    <form id="delHeroQuoteForm" onsubmit="handleHeroQuoteSubmit(event)">
                        <div class="ds-field"><input type="text" name="name" placeholder="Name *" autocomplete="name" required></div>
                        <div class="ds-field"><input type="tel" name="phone" placeholder="Phone number *" autocomplete="tel" required></div>
                        <div class="ds-field"><input type="email" name="email" placeholder="Email *" autocomplete="email" required></div>
                        <div class="ds-field"><textarea name="message" placeholder="Your website URL and goals *" required></textarea></div>
                        <div class="ds-consent">
                            <label><input type="checkbox" checked required><span>I'm not a robot</span></label>
                            <span style="display:inline-flex;gap:6px;align-items:center"><?= dsIcon('lock', 14) ?>Protected</span>
                        </div>
                        <button type="submit" class="ds-btn pri" id="delHeroSubmitBtn"><span>Send my request</span></button>
                        <div id="delHeroFeedback" role="status"></div>
                    </form>
                    <p class="ds-note">Share your website URL, business niche, target location and budget. We'll recommend a customised SEO strategy at a competitive price.</p>
                </aside>
            </div>
        </div>

        <div class="ds-ticker" aria-label="Brands we have worked with">
            <div class="ds-ticker-label">Organisers, trade expos and high-growth brands we have helped with search</div>
            <div class="ds-track">
                <?php foreach (array_merge($brandLogos, $brandLogos) as $b): $lg = $b['logo'] ?? ''; ?>
                    <div class="ds-brand">
                        <?php if ($lg !== ''): ?><img src="<?= $h($lg) ?>" alt="<?= $h($b['name']) ?>" loading="lazy"><?php else: ?><i><?= $h(substr($b['name'], 0, 2)) ?></i><?php endif; ?>
                        <div><b><?= $h($b['name']) ?></b><small><?= $h($b['category'] ?? 'Enterprise brand') ?></small></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 2. NARRATIVE + SERP PROOF -->
    <section class="ds-sec">
        <div class="ds-wrap ds-nar ds-grid">
            <div>
                <div class="ds-kicker"><?= $h(ucfirst(strtolower(explode('•', (string) ($strategicNarrative['eyebrow'] ?? 'Be found by the correct people'))[0]))) ?></div>
                <h2 class="ds-h2">
                    <?= $h($narrativeTitle) ?>
                    <?php if ($narrativeAccent !== ''): ?> <?= $em($narrativeAccent) ?><?php endif; ?>
                </h2>
                <p class="lead"><?= $h($strategicNarrative['lead'] ?? '') ?></p>
                <p class="b"><?= $h($strategicNarrative['p1'] ?? '') ?></p>
                <p class="b"><?= $h($strategicNarrative['p2'] ?? '') ?></p>
                <div class="ds-callout"><?= $h($strategicNarrative['callout'] ?? '') ?></div>
                <div class="ds-actions">
                    <a href="/contact.php" class="ds-btn pri trigger-enquiry-modal" data-service="SEO Services in Delhi"><span>Get a free website analysis</span><?= dsIcon('arrow', 16) ?></a>
                    <a href="tel:+919999674255" class="ds-btn ghost"><span>Call +91-9999674255</span></a>
                </div>
            </div>
            <div class="ds-browser">
                <div class="ds-chrome">
                    <div class="ds-dots"><i></i><i></i><i></i></div>
                    <div class="ds-url">google.com/search?q=spring+sourcing+fair+2027</div>
                </div>
                <div class="ds-vp">
                    <img src="<?= $h($springSerpImage) ?>" alt="Google search for Spring Sourcing Fair 2027 showing IHGF Delhi Fair ranking #1" loading="lazy">
                    <div class="ds-flag"><i></i><span>#1 organic rank &middot; IHGF Delhi Fair</span></div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. WHY CHOOSE US -->
    <section class="ds-sec alt">
        <div class="ds-wrap ds-side ds-grid">
            <div class="sticky">
                <div class="ds-kicker">Why WebTecMart</div>
                <h2 class="ds-h2">What makes WebTecMart the right <?= $em('SEO choice') ?>?</h2>
                <p class="ds-lede">Capabilities built around performance, transparency and sustainable business revenue.</p>
            </div>
            <ul class="ds-rows">
                <?php foreach ($whyCards as $wc): ?>
                    <li class="ds-row">
                        <div class="ds-ic"><?= $h($wc['icon'] ?? '🎯') ?></div>
                        <div><h3><?= $h($wc['title'] ?? '') ?></h3><p><?= $h($wc['desc'] ?? '') ?></p></div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>

    <!-- 4. KEY TAKEAWAYS -->
    <section class="ds-sec">
        <div class="ds-wrap">
            <div class="ds-head ds-split">
                <div>
                    <div class="ds-kicker"><?= $h(ucwords(strtolower((string) ($takeaways['eyebrow'] ?? 'Key takeaways')))) ?></div>
                    <h2 class="ds-h2"><?= $h($takeawaysTitleBase) ?><?php if ($takeawaysTitleAccent !== ''): ?> <?= $em($takeawaysTitleAccent) ?><?php endif; ?></h2>
                </div>
                <p class="ds-lede"><?= $h($takeaways['lead'] ?? '') ?></p>
            </div>
            <div class="ds-take ds-grid">
                <div>
                    <h3 style="font-size:1.25rem">What's included in our SEO services</h3>
                    <ul class="ds-checks">
                        <?php foreach (($takeaways['checklist'] ?? []) as $c): ?><li><?= dsIcon('check', 18) ?><span><?= $h($c) ?></span></li><?php endforeach; ?>
                    </ul>
                    <div class="ds-means">
                        <h4>What this means for your business</h4>
                        <ul>
                            <li>Stronger visibility for the services and locations that matter to you.</li>
                            <li>More relevant visitors finding your business through search.</li>
                            <li>Clear progress tracking to guide ongoing SEO improvements.</li>
                        </ul>
                    </div>
                    <a href="/contact.php" class="ds-btn pri trigger-enquiry-modal" data-service="SEO Services in Delhi"><span>Book your free SEO consultation</span><?= dsIcon('arrow', 16) ?></a>
                </div>
                <div class="ds-tele">
                    <span class="ds-live"><i></i>#1 Google rank &middot; Delhi commercial queries</span>
                    <h4>WebTecMart: top SEO agency in Delhi NCR</h4>
                    <p>Qualified organic revenue backed by 13+ years of experience, 1,000+ client campaigns and high-intent keyword strategy.</p>
                    <div class="ds-kpis">
                        <div><b>+400%</b><span>Organic growth</span></div>
                        <div><b>80+</b><span>#1 keywords</span></div>
                        <div><b>1,393%</b><span>Search clicks</span></div>
                    </div>
                    <small>AI Overview featured entity &middot; Verified GA4 and Search Console 2026</small>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. OFFERS -->
    <section class="ds-sec alt">
        <div class="ds-wrap">
            <div class="ds-head ds-split">
                <div>
                    <div class="ds-kicker">What we offer</div>
                    <h2 class="ds-h2">SEO services that turn <?= $em('search visibility into revenue') ?></h2>
                </div>
                <p class="ds-lede">From technical architecture to local rankings, content, link acquisition and AI-search visibility.</p>
            </div>
            <div class="ds-bento">
                <?php foreach ($offers as $o): ?>
                    <a href="<?= $h($o['link'] ?? '/contact.php') ?>" class="ds-tile">
                        <div class="ds-ic"><?= dsIcon($o['icon'] ?? 'sparkles', 22) ?></div>
                        <h3><?= $h($o['title'] ?? 'SEO Service') ?></h3>
                        <p><?= $h($o['desc'] ?? '') ?></p>
                        <span class="more"><?= $h($o['link_text'] ?? 'Explore service →') ?></span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 6. CHALLENGES -->
    <section class="ds-sec">
        <div class="ds-wrap ds-side ds-grid">
            <div class="sticky">
                <div class="ds-kicker"><?= $h(ucwords(strtolower((string) ($challenges['eyebrow'] ?? 'SEO challenges')))) ?></div>
                <h2 class="ds-h2"><?= $h($challengesTitleBase) ?><?php if ($challengesTitleAccent !== ''): ?> <?= $em($challengesTitleAccent) ?><?php endif; ?></h2>
                <p class="ds-lede"><?= $h($challenges['lead'] ?? '') ?></p>
            </div>
            <ul class="ds-rows">
                <?php foreach (($challenges['items'] ?? []) as $ch): ?>
                    <li class="ds-row">
                        <div class="ds-ic"><?= $h($ch['icon'] ?? '⚡') ?></div>
                        <div><h3><?= $h($ch['title'] ?? '') ?></h3><p><?= $h($ch['desc'] ?? '') ?></p></div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>

    <!-- 7. FOUNDER -->
    <section class="ds-sec alt">
        <div class="ds-wrap">
            <div class="ds-head ds-split">
                <div>
                    <div class="ds-kicker"><?= $h(ucwords(strtolower((string) ($founderSection['eyebrow'] ?? 'Meet the experts')))) ?></div>
                    <h2 class="ds-h2"><?= $h($founderTitleBase) ?><?php if ($founderTitleAccent !== ''): ?> <?= $em($founderTitleAccent) ?><?php endif; ?></h2>
                </div>
                <p class="ds-lede"><?= $h($founderSection['lead'] ?? '') ?></p>
            </div>
            <div class="ds-founder ds-grid">
                <div>
                    <h3 style="font-size:1.5rem">Built on 13+ years of proven technical execution</h3>
                    <p class="ds-lede" style="margin-top:12px">Strong SEO comes from the right people, processes and expertise. Our team focuses on search strategy, technical optimisation, content depth and analytics so campaigns move your real business pipeline.</p>
                    <div class="ds-stats">
                        <?php foreach (($founderSection['stats'] ?? []) as $s): ?><div><b><?= $h($s['val']) ?></b><span><?= $h($s['label']) ?></span></div><?php endforeach; ?>
                    </div>
                    <div class="ds-actions">
                        <a href="/contact.php" class="ds-btn pri trigger-enquiry-modal" data-service="SEO Services in Delhi"><span>Talk to an SEO specialist</span><?= dsIcon('arrow', 16) ?></a>
                        <a href="tel:+919999674255" class="ds-btn ghost"><span>+91-9999674255</span></a>
                    </div>
                </div>
                <div class="ds-person">
                    <div class="ph">
                        <?php if (!empty($founderImage) && file_exists(__DIR__ . $founderImage)): ?><img src="<?= $h($founderImage) ?>" alt="<?= $h($founderName) ?>"><?php else: ?><?= $h($founderInitial) ?><?php endif; ?>
                    </div>
                    <h4><?= $h($founderName) ?></h4>
                    <div class="role"><?= $h($founderRole) ?></div>
                    <p>Directing technical search architecture and high-converting commercial SEO for leading brands across Delhi NCR and international markets.</p>
                </div>
            </div>
            <ul class="ds-rows two" style="margin-top:56px">
                <?php foreach (($founderSection['pillars'] ?? []) as $p): ?>
                    <li class="ds-row"><div class="ds-ic"><?= $h($p['icon'] ?? '⚙️') ?></div><div><h3><?= $h($p['title'] ?? '') ?></h3><p><?= $h($p['desc'] ?? '') ?></p></div></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>

    <!-- 8. PROCESS -->
    <section class="ds-sec">
        <div class="ds-wrap ds-side ds-grid">
            <div class="sticky">
                <div class="ds-kicker">Our process</div>
                <h2 class="ds-h2">How our SEO services in Delhi turn <?= $em('strategy into results') ?></h2>
                <p class="ds-lede">Every business has its own customers, competition and growth goals. We start from where you stand today and build the roadmap from there.</p>
            </div>
            <ol class="ds-line">
                <?php foreach ($processSteps as $i => $p): ?>
                    <li class="ds-step">
                        <div class="n">Step <?= $h(ltrim((string) ($p['step'] ?? ($i + 1)), '0') ?: ($i + 1)) ?></div>
                        <h3><?= $h($p['title'] ?? '') ?></h3>
                        <p><?= $h($p['description'] ?? '') ?></p>
                    </li>
                <?php endforeach; ?>
            </ol>
        </div>
    </section>

    <!-- 9. INDUSTRIES -->
    <section class="ds-sec alt">
        <div class="ds-wrap">
            <div class="ds-head ds-split">
                <div>
                    <div class="ds-kicker">Industry expertise</div>
                    <h2 class="ds-h2">Industries we work with across <?= $em('Delhi NCR and beyond') ?></h2>
                </div>
                <p class="ds-lede">SEO strategies shaped around each vertical's buyer intent, conversion funnel and search landscape.</p>
            </div>
            <div class="ds-ind">
                <?php foreach ($industries as $ind): ?>
                    <div><div class="e"><?= $h($ind['icon'] ?? '') ?></div><h4><?= $h($ind['title'] ?? '') ?></h4><p><?= $h($ind['desc'] ?? '') ?></p></div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 10. TESTIMONIALS -->
    <section class="ds-sec">
        <div class="ds-wrap">
            <div class="ds-head ds-split">
                <div>
                    <div class="ds-kicker">Client testimonials</div>
                    <h2 class="ds-h2">Trusted by organisers, founders and <?= $em('marketing directors') ?></h2>
                </div>
                <p class="ds-lede">Feedback from partners who grew their search visibility and qualified enquiries with WebTecMart.</p>
            </div>
            <div class="swiper" id="delFeedbackSwiper">
                <div class="swiper-wrapper">
                    <?php foreach ($clientFeedback as $fb): ?>
                        <div class="swiper-slide">
                            <figure class="ds-q" style="margin:0">
                                <div class="st" aria-label="5 out of 5 stars">★★★★★</div>
                                <blockquote>“<?= $h($fb['quote'] ?? '') ?>”</blockquote>
                                <figcaption class="by">
                                    <i><?= $h(substr((string) ($fb['author'] ?? 'C'), 0, 1)) ?></i>
                                    <div><b><?= $h($fb['author'] ?? '') ?></b><small><?= $h($fb['role'] ?? '') ?> &middot; <?= $h($fb['company'] ?? '') ?></small></div>
                                </figcaption>
                            </figure>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <!-- 11. CASE STUDIES -->
    <section class="ds-sec alt">
        <div class="ds-wrap">
            <div class="ds-head ds-split">
                <div>
                    <div class="ds-kicker">Verified case studies</div>
                    <h2 class="ds-h2">Real rankings. Real traffic. <?= $em('Real business growth.') ?></h2>
                </div>
                <p class="ds-lede">Documented outcomes from our search campaigns in high-competition industries.</p>
            </div>
            <div class="ds-cases">
                <?php foreach ($cases as $c): ?>
                    <article class="ds-case">
                        <span class="bd"><?= $h($c['badge'] ?? 'SEO growth result') ?></span>
                        <h3><?= $h($c['title'] ?? 'SEO success story') ?></h3>
                        <div class="big"><?= $h($c['stat'] ?? 'Results') ?></div>
                        <div class="bl"><?= $h($c['stat_desc'] ?? '') ?></div>
                        <p><?= $h($c['desc'] ?? '') ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 12. RANKINGS -->
    <section class="ds-sec">
        <div class="ds-wrap">
            <div class="ds-head ds-split">
                <div>
                    <div class="ds-kicker">Live search telemetry</div>
                    <h2 class="ds-h2">Verified Google rankings for our <?= $em('client campaigns') ?></h2>
                </div>
                <p class="ds-lede">A keyword snapshot across competitive commercial and event queries in Delhi NCR and global Google indices.</p>
            </div>
            <?php if (!empty($rankingKeywords)): ?>
            <div class="ds-board">
                <?php foreach ($rankingKeywords as $k): ?>
                    <div class="ds-rk">
                        <div class="pos"><?= $h($k['rank'] ?? '#1') ?></div>
                        <div>
                            <b><?= $h($k['keyword'] ?? '') ?></b>
                            <small><?= $h($k['url'] ?? '') ?></small>
                            <div class="meta">
                                <span class="g"><?= $h($k['trend'] ?? '') ?></span>
                                <span><?= $h($k['volume'] ?? '') ?></span>
                                <span><?= $h($k['intent'] ?? '') ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
            <div class="ds-tw">
                <table>
                    <thead><tr><th>Target search phrase</th><th>Google position</th><th>Est. search volume</th><th>Difficulty</th><th>SERP status</th></tr></thead>
                    <tbody>
                        <?php foreach ($rankings as $rk): ?>
                            <tr>
                                <td style="font-weight:700"><?= $h($rk['kw'] ?? '') ?></td>
                                <td><span class="ds-pos"><?= $h($rk['pos'] ?? '#1') ?></span></td>
                                <td><?= $h($rk['vol'] ?? 'N/A') ?></td>
                                <td><?= $h($rk['diff'] ?? 'Medium') ?></td>
                                <td style="color:var(--ok);font-weight:700">✓ <?= $h($rk['status'] ?? 'Verified') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- 13. WHY SEO IN DELHI -->
    <section class="ds-sec alt">
        <div class="ds-wrap ds-wrap-up ds-grid">
            <div>
                <div class="ds-kicker"><?= $h(ucwords(strtolower((string) ($wrappingUp['eyebrow'] ?? 'Delhi NCR local reach')))) ?></div>
                <h2 class="ds-h2"><?= $h($wrappingUp['title'] ?? 'Why SEO Services in Delhi Matter for Your Business') ?></h2>
                <div class="sub"><?= $h($wrappingUp['sub'] ?? '') ?></div>
            </div>
            <div class="body">
                <p><?= $h($wrappingUp['p1'] ?? '') ?></p>
                <p><?= $h($wrappingUp['p2'] ?? '') ?></p>
                <div class="ds-chips"><?php foreach (($wrappingUp['micro_markets'] ?? []) as $m): ?><span><?= $h($m) ?></span><?php endforeach; ?></div>
                <p class="ds-goal"><?= $h($wrappingUp['goal'] ?? '') ?></p>
                <div class="ds-actions"><a href="/contact.php" class="ds-btn pri trigger-enquiry-modal" data-service="SEO Services in Delhi"><span>Book your free SEO consultation</span><?= dsIcon('arrow', 16) ?></a></div>
            </div>
        </div>
    </section>

    <!-- 14. FAQ -->
    <section class="ds-sec">
        <div class="ds-wrap ds-side ds-grid">
            <div class="sticky">
                <div class="ds-kicker">FAQ</div>
                <h2 class="ds-h2">Questions about <?= $em('SEO services in Delhi') ?></h2>
                <p class="ds-lede">Clear, transparent answers to help you decide.</p>
            </div>
            <div class="ds-faq">
                <?php foreach (($faqs ?? []) as $i => $fq):
                    $q = is_array($fq) ? ($fq['q'] ?? $fq['question'] ?? 'Question') : (string) $fq;
                    $a = is_array($fq) ? ($fq['a'] ?? $fq['answer'] ?? '') : ''; ?>
                    <details name="ds-faq" <?= $i === 0 ? 'open' : '' ?>>
                        <summary><span><?= $h($q) ?></span><span class="ds-pm"><?= dsIcon('plus', 16) ?></span></summary>
                        <div class="ds-ans"><?= nl2br($h($a)) ?></div>
                    </details>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 15. CTA -->
    <section class="ds-sec" style="padding-top:0">
        <div class="ds-wrap">
            <div class="ds-cta">
                <h2><?= $h($ctaBox['headline'] ?? '') ?></h2>
                <h3><?= $h($ctaBox['sub'] ?? '') ?></h3>
                <p><?= $h($ctaBox['text'] ?? '') ?></p>
                <div class="ds-actions">
                    <a href="/contact.php" class="ds-btn light trigger-enquiry-modal" data-service="SEO Services in Delhi"><span><?= $h($ctaBox['btn_text'] ?? 'Book your free SEO consultation') ?></span><?= dsIcon('arrow', 16) ?></a>
                    <a href="tel:+919999674255" class="ds-btn lineW"><?= dsIcon('phone', 16) ?><span><?= $h($ctaBox['call_text'] ?? 'Call: +91-9999674255') ?></span></a>
                </div>
                <small>Free strategy consultation &middot; Zero obligation &middot; Tailored Delhi NCR action plan</small>
            </div>
        </div>
    </section>
</main>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (typeof Swiper !== 'undefined') {
            new Swiper('#delFeedbackSwiper', {
                slidesPerView: 1, spaceBetween: 20, loop: true, grabCursor: true,
                autoplay: { delay: 6000, disableOnInteraction: false, pauseOnMouseEnter: true },
                pagination: { el: '#delFeedbackSwiper .swiper-pagination', clickable: true },
                breakpoints: { 768: { slidesPerView: 2, spaceBetween: 22 } }
            });
        }
    });

    function handleHeroQuoteSubmit(e) {
        e.preventDefault();
        var form = document.getElementById('delHeroQuoteForm');
        var btn = document.getElementById('delHeroSubmitBtn');
        var fb = document.getElementById('delHeroFeedback');
        var label = btn.querySelector('span');
        var original = label.textContent;
        var fd = new FormData(form);
        fd.set('service', 'SEO Services in Delhi');
        fd.set('ajax', '1');
        btn.disabled = true;
        label.textContent = 'Sending...';
        var show = function (ok, msg) {
            fb.style.display = 'block';
            fb.style.background = ok ? '#DDF6EA' : '#FDE2E2';
            fb.style.color = ok ? '#065F46' : '#991B1B';
            fb.textContent = msg;
        };
        fetch('/contact.php', { method: 'POST', body: fd, headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' } })
            .then(function (r) { return r.json(); })
            .then(function (d) {
                if (d && d.success === false) { show(false, d.message || 'Something went wrong. Please call +91-9999674255.'); }
                else { show(true, 'Thank you! Your quote request has been received. Our team will contact you shortly.'); form.reset(); }
            })
            .catch(function () { show(false, 'We could not send your request. Please call +91-9999674255.'); })
            .finally(function () { btn.disabled = false; label.textContent = original; });
    }
</script>

<?php
require_once __DIR__ . '/app/templates/footer.php';
?>