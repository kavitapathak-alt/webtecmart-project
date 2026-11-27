<?php
require_once __DIR__ . '/config.php';

function serviceCards(): array
{
    $defaults = [
        [
            'title' => 'SEO Growth',
            'summary' => 'Rank higher on Google and bring ready-to-buy traffic that converts.',
            'icon' => '📈',
            'href' => '/seo-services-delhi.php',
        ],
        [
            'title' => 'Paid Ads',
            'summary' => 'Scale leads with strategic Google, Meta, and YouTube ad campaigns.',
            'icon' => '🎯',
            'href' => '/search-engine-marketing.php',
        ],
        [
            'title' => 'Social Media',
            'summary' => 'Build a consistent brand presence with creative content and engagement.',
            'icon' => '📱',
            'href' => '/social-media-optimization.php',
        ],
        [
            'title' => 'Web Design',
            'summary' => 'Turn visitors into leads with conversion-focused, mobile-first websites.',
            'icon' => '💻',
            'href' => '/website-design-development.php',
        ],
    ];

    return cmsContent('service', $defaults);
}

function serviceDetailPages(): array
{
    $defaults = [
        [
            'title' => 'Local SEO',
            'summary' => 'Help nearby customers discover and choose your business with a stronger local search presence.',
            'body' => 'Local SEO helps your business appear when nearby customers search for the products and services you offer. We improve your local listings, location pages, reviews, and website signals to turn relevant searches into calls, visits, and enquiries.',
            'metadata' => [
                'slug' => 'local-seo',
                'icon' => 'search',
                'tagline' => 'Be found by nearby customers',
                'hero_description' => 'Build a stronger presence in local search and connect with customers ready to take action in your area.',
                'features' => [
                    ['title' => 'Google Business Profile', 'description' => 'Improve your profile, business information, services, and local visibility.'],
                    ['title' => 'Local keyword strategy', 'description' => 'Target the searches customers use when looking for your services nearby.'],
                    ['title' => 'Location pages', 'description' => 'Create useful location content that helps search engines and customers understand where you work.'],
                ],
                'process' => [
                    ['step' => '01', 'title' => 'Audit', 'description' => 'Review your local listings, website, competitors, and current search visibility.'],
                    ['step' => '02', 'title' => 'Improve', 'description' => 'Prioritize listing, content, and technical updates for your target locations.'],
                    ['step' => '03', 'title' => 'Grow', 'description' => 'Track visibility and leads, then refine the strategy using real performance data.'],
                ],
                'faqs' => [
                    ['q' => 'How long does local SEO take?', 'a' => 'Timing depends on your location, competition, and current presence. We track progress and focus on sustainable improvements.'],
                    ['q' => 'Can you support multiple locations?', 'a' => 'Yes. We can plan location-specific listings and pages around the areas your business serves.'],
                ],
            ],
        ],
        [
            'title' => 'National SEO',
            'summary' => 'Grow organic visibility across your country with a strategy built around your market and customers.',
            'body' => 'National SEO helps businesses reach customers across a country rather than focusing on one local area. We align technical foundations, useful content, and authority building with the search demand and competition in your market.',
            'metadata' => [
                'slug' => 'national-seo',
                'icon' => 'search',
                'tagline' => 'Reach customers nationwide',
                'hero_description' => 'Build search visibility across your country with a focused strategy for the audiences and markets you want to reach.',
                'features' => [
                    ['title' => 'National keyword research', 'description' => 'Find valuable search opportunities across your products, services, and markets.'],
                    ['title' => 'Content and landing pages', 'description' => 'Build helpful pages that match customer intent and support national reach.'],
                    ['title' => 'Technical SEO', 'description' => 'Resolve crawl, indexation, speed, and site structure issues that limit organic growth.'],
                ],
                'process' => [
                    ['step' => '01', 'title' => 'Research', 'description' => 'Understand your goals, audience, search demand, and national competitors.'],
                    ['step' => '02', 'title' => 'Plan', 'description' => 'Create a prioritized roadmap across technical SEO, content, and authority.'],
                    ['step' => '03', 'title' => 'Optimize', 'description' => 'Implement improvements and refine them using rankings, traffic, and lead data.'],
                ],
                'faqs' => [
                    ['q' => 'Is national SEO different from local SEO?', 'a' => 'Yes. National SEO targets a broader market, while local SEO focuses on visibility in specific locations and local results.'],
                    ['q' => 'Can a small business compete nationally?', 'a' => 'A focused niche and a realistic content and technical plan can help businesses compete for relevant national searches.'],
                ],
            ],
        ],
        [
            'title' => 'International SEO',
            'summary' => 'Reach customers in new countries with search content and technical signals tailored to each market.',
            'body' => 'International SEO helps your website serve customers across countries and languages. We plan market-specific content, site structure, and technical signals so search engines can understand which pages are relevant to each audience.',
            'metadata' => [
                'slug' => 'international-seo',
                'icon' => 'globe',
                'tagline' => 'Expand into global markets',
                'hero_description' => 'Make your website easier to discover in the countries and languages that matter to your business.',
                'features' => [
                    ['title' => 'Market research', 'description' => 'Evaluate search demand, customer intent, and competitors in each target market.'],
                    ['title' => 'International site structure', 'description' => 'Plan country and language URLs and technical signals for a clear user experience.'],
                    ['title' => 'Localized content', 'description' => 'Adapt content to local language, expectations, and search behavior.'],
                ],
                'process' => [
                    ['step' => '01', 'title' => 'Select markets', 'description' => 'Prioritize target countries and understand their search opportunity.'],
                    ['step' => '02', 'title' => 'Set foundations', 'description' => 'Plan site structure, technical setup, and localization requirements.'],
                    ['step' => '03', 'title' => 'Grow visibility', 'description' => 'Publish and optimize market-specific pages while measuring performance.'],
                ],
                'faqs' => [
                    ['q' => 'Do I need a separate website for each country?', 'a' => 'Not always. The best domain and URL structure depends on your markets, resources, and business goals.'],
                    ['q' => 'Is translation enough for international SEO?', 'a' => 'Translation alone is rarely sufficient. Content should also reflect local search intent and audience expectations.'],
                ],
            ],
        ],
        [
            'title' => 'E-Commerce SEO',
            'summary' => 'Help shoppers discover your products through stronger product, category, and technical pages.',
            'body' => 'E-commerce SEO improves how shoppers discover and navigate your online store from search. We focus on product and category page quality, site architecture, technical health, and useful content that supports product discovery and sales.',
            'metadata' => [
                'slug' => 'ecommerce-seo',
                'icon' => 'search',
                'tagline' => 'Turn product searches into sales',
                'hero_description' => 'Make your products easier to find with a search strategy designed for online stores and their customers.',
                'features' => [
                    ['title' => 'Product and category SEO', 'description' => 'Improve page titles, descriptions, content, and internal links across your catalog.'],
                    ['title' => 'Store technical health', 'description' => 'Address crawlability, indexation, duplicate URLs, and performance issues.'],
                    ['title' => 'Product discovery', 'description' => 'Make it easier for shoppers and search engines to navigate your product range.'],
                ],
                'process' => [
                    ['step' => '01', 'title' => 'Audit store', 'description' => 'Review your catalog, site structure, technical setup, and search performance.'],
                    ['step' => '02', 'title' => 'Prioritize', 'description' => 'Identify the product and category opportunities with the strongest potential.'],
                    ['step' => '03', 'title' => 'Optimize', 'description' => 'Improve priority pages and measure organic discovery and business outcomes.'],
                ],
                'faqs' => [
                    ['q' => 'Can SEO help a large product catalog?', 'a' => 'Yes. A scalable approach to templates, categories, and technical controls can support larger catalogs.'],
                    ['q' => 'Do product descriptions matter?', 'a' => 'Clear, useful, unique product information helps shoppers make decisions and helps search engines understand each page.'],
                ],
            ],
        ],
        [
            'title' => 'SEO for Small Business',
            'summary' => 'Build a practical SEO foundation that helps small businesses attract the right customers.',
            'body' => 'Small business SEO focuses on the search opportunities that matter most to your customers and your capacity. We prioritize a clear website foundation, relevant content, and measurable improvements rather than unnecessary complexity.',
            'metadata' => [
                'slug' => 'small-business-seo',
                'icon' => 'rocket',
                'tagline' => 'Make every search opportunity count',
                'hero_description' => 'A practical, focused SEO plan can help your small business reach the people looking for what you offer.',
                'features' => [
                    ['title' => 'SEO foundations', 'description' => 'Improve the technical and on-page basics that help search engines understand your website.'],
                    ['title' => 'Customer-focused content', 'description' => 'Answer the questions your customers ask with clear and useful website content.'],
                    ['title' => 'Progress reporting', 'description' => 'Track search visibility, website visits, and enquiries to guide ongoing priorities.'],
                ],
                'process' => [
                    ['step' => '01', 'title' => 'Understand', 'description' => 'Learn about your business, customers, and the search terms that matter.'],
                    ['step' => '02', 'title' => 'Prioritize', 'description' => 'Build an achievable plan around your highest-value opportunities.'],
                    ['step' => '03', 'title' => 'Improve', 'description' => 'Make steady improvements and review outcomes with clear reporting.'],
                ],
                'faqs' => [
                    ['q' => 'Does a small business need SEO?', 'a' => 'SEO can help customers discover your business when they are researching products or services like yours.'],
                    ['q' => 'How much content do I need?', 'a' => 'Start with clear, useful pages for your core offerings and expand based on customer needs and search data.'],
                ],
            ],
        ],
        [
            'title' => 'Online Presence & Reputation',
            'summary' => 'Strengthen how customers find and perceive your brand across search and review platforms.',
            'body' => 'A strong online reputation helps customers make informed decisions about your business. We help improve the accuracy and quality of your search presence, support responsible review practices, and create a clear process for monitoring brand visibility.',
            'metadata' => [
                'slug' => 'online-reputation-management',
                'icon' => 'check',
                'tagline' => 'Build trust across your online presence',
                'hero_description' => 'Present a consistent, helpful brand presence and support customer trust across search and review platforms.',
                'features' => [
                    ['title' => 'Presence audit', 'description' => 'Review how your brand appears in search results, listings, and review platforms.'],
                    ['title' => 'Review response guidance', 'description' => 'Create a thoughtful process for responding to customer feedback.'],
                    ['title' => 'Brand content', 'description' => 'Improve useful, accurate pages that help customers understand your business.'],
                ],
                'process' => [
                    ['step' => '01', 'title' => 'Review', 'description' => 'Assess your current brand presence and identify gaps or inconsistencies.'],
                    ['step' => '02', 'title' => 'Improve', 'description' => 'Prioritize accurate information, useful content, and customer response processes.'],
                    ['step' => '03', 'title' => 'Monitor', 'description' => 'Track feedback and visibility, then update your approach as needed.'],
                ],
                'faqs' => [
                    ['q' => 'Can you remove negative reviews?', 'a' => 'We support responsible review management and accurate information, but do not promise removal of genuine customer feedback.'],
                    ['q' => 'How can we build a stronger reputation?', 'a' => 'Consistent service, accurate business information, helpful content, and professional responses all support customer trust.'],
                ],
            ],
        ],
    ];

    $defaults = array_map(static function (array $page): array {
        $metadata = $page['metadata'] ?? [];
        unset($page['metadata']);
        return array_merge($page, is_array($metadata) ? $metadata : []);
    }, $defaults);

    if (!databaseAvailable()) {
        return $defaults;
    }

    try {
    $seedMarker = db()->prepare('SELECT 1 FROM cms_content_type_state WHERE content_type = :type');
    $seedMarker->execute([':type' => 'service_detail_defaults_v1']);
    if (!$seedMarker->fetchColumn()) {
        $storedPages = db()->query("SELECT metadata FROM content_items WHERE content_type = 'service_detail'")->fetchAll(PDO::FETCH_COLUMN);
        $storedSlugs = [];
        foreach ($storedPages as $storedMetadata) {
            $storedMetadata = json_decode($storedMetadata ?: '', true);
            if (!is_array($storedMetadata)) continue;
            if (isset($storedMetadata['metadata']) && is_array($storedMetadata['metadata'])) {
                $storedMetadata = array_merge($storedMetadata, $storedMetadata['metadata']);
            }
            if (!empty($storedMetadata['slug'])) $storedSlugs[] = (string) $storedMetadata['slug'];
        }

        $nextOrder = (int) db()->query("SELECT COALESCE(MAX(sort_order), -1) + 1 FROM content_items WHERE content_type = 'service_detail'")->fetchColumn();
        $insert = db()->prepare('INSERT INTO content_items (content_type, title, summary, body, metadata, sort_order) VALUES (:type, :title, :summary, :body, :metadata, :sort_order)');
        foreach ($defaults as $page) {
            if (in_array((string) $page['slug'], $storedSlugs, true)) continue;
            $insert->execute([
                ':type' => 'service_detail',
                ':title' => $page['title'],
                ':summary' => $page['summary'],
                ':body' => $page['body'],
                ':metadata' => json_encode($page, JSON_UNESCAPED_UNICODE),
                ':sort_order' => $nextOrder++,
            ]);
        }
        $markSeeded = db()->prepare('INSERT OR IGNORE INTO cms_content_type_state (content_type) VALUES (:type)');
        $markSeeded->execute([':type' => 'service_detail_defaults_v1']);
    }

    $pages = cmsContent('service_detail', $defaults);
    $defaultsBySlug = [];
    foreach ($defaults as $defaultPage) $defaultsBySlug[$defaultPage['slug']] = $defaultPage;
    foreach ($pages as &$page) {
        if (isset($page['metadata']) && is_array($page['metadata'])) {
            $page = array_merge($page, $page['metadata']);
            unset($page['metadata']);
        }
        $slug = (string) ($page['slug'] ?? '');
        if (isset($defaultsBySlug[$slug])) {
            $page = array_merge($defaultsBySlug[$slug], $page);
            foreach (['title', 'summary', 'body', 'tagline', 'hero_description'] as $requiredField) {
                if (trim((string) ($page[$requiredField] ?? '')) === '') {
                    $page[$requiredField] = $defaultsBySlug[$slug][$requiredField] ?? '';
                }
            }
        }
    }
    unset($page);
    return $pages;
    } catch (Throwable $exception) {
        error_log('Service detail CMS unavailable: ' . $exception->getMessage());
        return $defaults;
    }
}

function ensureServiceDetailExists(string $slug): ?array
{
    $cleanSlug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug), '-'));
    if ($cleanSlug === '') return null;

    try {
        $stmt = db()->prepare('SELECT * FROM content_items WHERE content_type = "service_detail" AND (metadata LIKE :s1 OR metadata LIKE :s2 OR title LIKE :s3) LIMIT 1');
        $stmt->execute([
            ':s1' => '%"slug":"' . $cleanSlug . '"%',
            ':s2' => '%"slug":"' . $slug . '"%',
            ':s3' => '%' . $slug . '%',
        ]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $meta = json_decode($row['metadata'] ?: '', true);
            if (is_array($meta)) {
                if (isset($meta['metadata']) && is_array($meta['metadata'])) {
                    $meta = array_merge($meta, $meta['metadata']);
                }
                $row = array_merge($row, $meta);
            }
            return $row;
        }

        // Define default blueprints for all services
        $serviceCatalog = [
            'seo-services-delhi' => [
                'title' => 'SEO Services in Delhi',
                'category' => 'SEO',
                'slug' => 'seo-services-delhi',
                'icon' => 'search',
                'tagline' => 'Result-Driven SEO to Grow Your Business',
                'hero_title' => 'SEO Services in Delhi',
                'hero_accent' => 'Result-Driven SEO to Grow Your Business',
                'hero_description' => 'Boost your website’s search visibility, improve Google rankings, and attract relevant visitors with our Organic SEO services. Our SEO strategies focus on increasing organic traffic, improving keyword rankings, and strengthening your online presence for sustainable growth.',
                'summary' => 'Boost your website’s search visibility, improve Google rankings, and attract relevant visitors with our Organic SEO services.',
                'body' => "The digital market is extremely competitive in Delhi. There are customers who are always looking in Google for businesses, products and services — and businesses that show up at the right time have a higher chance of capturing that customer.\n\nWebTecMart offers SEO services in Delhi, which goes beyond rankings. We use technical SEO, keyword research, content optimisation, local SEO and authority building to create a search strategy that's in line with your business goals.",
                'founder_name' => 'Jitin Madaan',
                'founder_role' => 'Performance Marketing Strategist',
                'founder_image' => '/assets/images/jitin-madaan.png',
                'is_delhi_seo' => 1,
                'hero_bullets' => [
                    'Enhance Google Rankings for relevant, high-value keywords',
                    'Bring in Targeted Organic Traffic from ready-to-buy customers',
                    'Increase website leads and enquiries with search optimisation',
                    'Create Long-Term Visibility by following a sustainable organic strategy'
                ],
                'offers' => [
                    ['icon' => 'code', 'title' => 'Technical SEO', 'desc' => 'We enhance the performance of your site by addressing crawling, indexing, Core Web Vitals, server response times, and architecture to ensure search bots navigate effortlessly.', 'link' => '/technical-seo.php', 'link_text' => 'Explore Technical SEO →'],
                    ['icon' => 'layout', 'title' => 'On-Page Optimization', 'desc' => 'Content without optimization cannot perform. We optimize title tags, meta descriptions, header structures (H1-H6), internal linking, and semantic keyword relevance.', 'link' => '/on-page-seo.php', 'link_text' => 'Explore On-Page SEO →'],
                    ['icon' => 'search', 'title' => 'Keyword Research & Strategy', 'desc' => 'Searching for the appropriate keywords will guide users straight to your site. We dissect intent, competition, and search volume to capture high-value buyer searches.', 'link' => '/keyword-research.php', 'link_text' => 'Explore Keyword Research →'],
                    ['icon' => 'map-pin', 'title' => 'Local SEO & Google 3-Pack', 'desc' => 'Dominate Google Maps across Delhi, Noida, Gurgaon, and NCR. Optimize your Google Business Profile, citations, reviews, and proximity signals to drive nearby calls.', 'link' => '/local-seo.php', 'link_text' => 'Explore Local SEO →'],
                    ['icon' => 'link', 'title' => 'High-Authority Link Building', 'desc' => 'Earn high-authority editorial backlinks and digital PR citations from verified Indian media and industry portals that supercharge domain trust.', 'link' => '/off-page-seo.php', 'link_text' => 'Explore Off-Page SEO →'],
                    ['icon' => 'sparkles', 'title' => 'AI-Ready SEO (AEO & GEO)', 'desc' => 'Position your brand prominently within Google AI Overviews, Perplexity, Gemini, and ChatGPT search recommendations through structured entity data.', 'link' => '/ai-seo-strategy.php', 'link_text' => 'Explore AI-Ready SEO →']
                ],
                'why_cards' => [
                    ['icon' => '🎯', 'title' => 'Business-First Keyword Targeting', 'desc' => 'We target high-intent transactional and commercial search queries that attract real decision-makers.'],
                    ['icon' => '⚙️', 'title' => 'Technical SEO Foundations', 'desc' => 'Clean code, Core Web Vitals optimization, mobile responsiveness, and structured schema data.'],
                    ['icon' => '📍', 'title' => 'Delhi NCR Local Domination', 'desc' => 'Local 3-Pack rankings, verified Google Business Profile signals, and location landing pages.'],
                    ['icon' => '📈', 'title' => 'Transparent ROI & Analytics', 'desc' => 'Real-time GA4 tracking, keyword telemetry, lead tracking, and monthly executive performance reviews.'],
                    ['icon' => '⚡', 'title' => 'AI Search Optimization', 'desc' => 'Optimized for Google AI Overviews, Gemini, ChatGPT search, and semantic knowledge graphs.'],
                    ['icon' => '🏆', 'title' => '13+ Years of Proven Experience', 'desc' => 'Battle-tested digital expertise across search engines, content marketing, websites, and growth strategy.']
                ],
                'challenges' => [
                    'eyebrow' => 'SEO CHALLENGES',
                    'title' => 'What is Holding Your Site Back in Google Search?',
                    'lead' => 'There are several common SEO challenges that businesses in Delhi encounter. Delhi is among the most competitive business hubs in India. Whether it is a local service provider, a start-up, or a reputable brand, businesses are vying for the same search audience.',
                    'items' => [
                        ['icon' => '⚔️', 'title' => 'Intense Local Competition', 'desc' => 'Firms fight it out for exposure in Google Search and Google Maps in Delhi. A basic SEO campaign is not sufficient to beat competitors.'],
                        ['icon' => '📉', 'title' => 'Low or Irrelevant Organic Traffic', 'desc' => 'Getting visitors does not equal getting prospective customers. When you get visitors that do not buy, you get zero enquiries.'],
                        ['icon' => '🎯', 'title' => 'Poor Keyword Targeting', 'desc' => 'Competing for vanity keywords that do not have buyer intent wastes valuable time and resources.'],
                        ['icon' => '📍', 'title' => 'Weak Local Search Visibility', 'desc' => 'Local visibility is vital if customers look for services nearby. We optimize your Google Business Profile and local citations.'],
                        ['icon' => '⚙️', 'title' => 'Technical SEO Problems', 'desc' => 'Slow pages, broken links, indexing problems, duplicate content, and weak internal linking impact search crawlers.'],
                        ['icon' => '💸', 'title' => 'Overdependence on Paid Advertising', 'desc' => 'Paid ads provide instant exposure, but stop the second ad spend pauses. SEO creates an organic stream that continues delivering.']
                    ]
                ],
                'founder_section' => [
                    'eyebrow' => 'MEET THE EXPERTS',
                    'title' => 'The People Behind Your SEO Growth',
                    'lead' => 'Strategy, SEO, Content and Technical Expertise — Working Together. We deliver sustainable search growth by leveraging SEO strategy, technical optimisation, content expertise and digital experience.',
                    'name' => 'Jitin Madaan',
                    'role' => 'Performance Marketing Strategist',
                    'stats' => [
                        ['val' => '13+ Years', 'label' => 'Industry Experience'],
                        ['val' => '1000+', 'label' => 'Projects & Businesses Served'],
                        ['val' => '95%', 'label' => 'Client Retention Rate']
                    ],
                    'pillars' => [
                        ['icon' => '⚙️', 'title' => 'SEO Strategy & Technical Expertise', 'desc' => 'Keyword strategy, technical audits, competitor analysis, website structure and performance optimization.'],
                        ['icon' => '📝', 'title' => 'Content & Search Optimisation', 'desc' => 'Useful, search-optimized content aligned to user intent, keyword opportunities and your brand expertise.'],
                        ['icon' => '🚀', 'title' => 'Digital Growth Support', 'desc' => 'Interconnected growth across SEO, content, website development and performance marketing.']
                    ]
                ],
                'process' => [
                    ['step' => '01', 'title' => 'Research & Discovery', 'description' => 'Keyword analysis, competitor research, search intent and an in-depth website review.'],
                    ['step' => '02', 'title' => 'Technical Audit & Foundation', 'description' => 'Solid technical restructuring to ensure your site is properly crawled, indexed and ranked by Google.'],
                    ['step' => '03', 'title' => 'Keyword Strategy & Search Intent', 'description' => 'Finding keywords that have the right balance of search volume, competition and commercial buyer intent.'],
                    ['step' => '04', 'title' => 'On-Page & Content Optimisation', 'description' => 'Optimizing headers, metadata, internal links, and creating high-value topical content clusters.'],
                    ['step' => '05', 'title' => 'Authority Building & Off-Page Signals', 'description' => 'Quality external backlinks, local citations and high-authority PR placements to boost domain credibility.'],
                    ['step' => '06', 'title' => 'Measurement, Refinement & Growth', 'description' => 'Continuous tracking of keyword rankings, organic traffic, leads and conversions in GA4 and Search Console.']
                ],
                'faqs' => [
                    ['q' => 'What are SEO services and why does my business need them?', 'a' => "SEO Services increase your site's presence in search engines and make it easier for anyone searching for your goods or services to find your site."],
                    ['q' => 'How long does SEO take to show results?', 'a' => "SEO is a long-term approach; on-page and technical updates can reflect in 30-60 days, while competitive rankings build sustainably over 3-6 months."],
                    ['q' => 'How can Local SEO help my Delhi business?', 'a' => "Local SEO puts your business in Google Maps 3-Pack and localized search results when customers in Delhi NCR search for your services."],
                    ['q' => 'What does an SEO agency in Delhi actually do?', 'a' => "We handle keyword research, technical SEO, on-page optimization, content marketing, local citations, backlink authority, and monthly reporting."],
                    ['q' => 'Is it possible to create leads with SEO and not just traffic?', 'a' => "Yes. The goal of commercial SEO is targeting high-intent buyer keywords and conversion-optimized landing pages to generate inquiries and sales."],
                    ['q' => 'Which is better, SEO or Google Ads?', 'a' => "Google Ads provides immediate paid traffic, while SEO creates compounding, permanent organic authority without paying per click."],
                    ['q' => 'How to select the ideal SEO firm in Delhi?', 'a' => "Choose an agency with verified case studies, transparent reporting, white-hat practices, and clear business growth metrics like WebTecMart."],
                    ['q' => 'Which businesses can benefit from SEO services?', 'a' => "B2B brands, e-commerce stores, local clinics, lawyers, real estate, manufacturing, educational institutes, and startups."],
                    ['q' => 'Does WebTecMart provide Local, National and International SEO?', 'a' => "Yes, we tailor search campaigns for local Delhi NCR micro-markets, pan-India commercial reach, and multi-lingual international markets."],
                    ['q' => 'What is the price of SEO services in Delhi?', 'a' => "Pricing depends on your industry competition and scope. We offer transparent monthly packages tailored to your growth goals."]
                ]
            ],
            'website-design-development' => [
                'title' => 'Website Design & Development',
                'category' => 'Web Development',
                'slug' => 'website-design-development',
                'icon' => 'layout',
                'tagline' => 'Websites That Convert',
                'hero_title' => 'Website Design & Development',
                'hero_description' => 'High-performance, conversion-focused websites designed to strengthen your online presence, engage your audience, and turn visitors into customers with WebTecMart.',
                'summary' => 'High-performance, conversion-focused websites designed to strengthen your online presence.',
                'body' => "Your website is the foundation of your digital presence — and we help make it work harder for your business. At WebTecMart, we design and develop responsive, user-friendly, SEO-ready websites that are built to attract visitors, build trust, and generate results. With 13+ years of experience and 1000+ websites delivered, our team combines creative design, performance-focused development, and digital marketing expertise.",
                'features' => [
                    ['title' => 'Custom Design', 'description' => 'No generic templates — designed around your brand, your audience, and your business goals.'],
                    ['title' => 'Responsive Development', 'description' => 'Fast, responsive layouts that deliver seamless experiences across mobile, tablet, and desktop.'],
                    ['title' => 'E-Commerce Solutions', 'description' => 'Online stores with secure payment integration, product management, and smooth checkouts.'],
                    ['title' => 'CMS Integration', 'description' => 'Intuitive CMS solutions letting your team update pages, text, and images without a developer.'],
                    ['title' => 'SEO-Friendly Architecture', 'description' => 'Built with clean semantic HTML, schema data, fast loading speeds, and indexable hierarchy.'],
                    ['title' => 'Performance & Security', 'description' => 'Optimized for sub-1.5s loading, SSL encryption, and high Google Core Web Vitals scores.']
                ],
                'process' => [
                    ['step' => '01', 'title' => 'Discovery', 'description' => 'Understanding your business, target audience, competitors, and goals.'],
                    ['step' => '02', 'title' => 'Strategy & Wireframe', 'description' => 'Planning website structure, user journey, content hierarchy, and conversion points.'],
                    ['step' => '03', 'title' => 'UI/UX Design', 'description' => 'Modern, engaging visual interface reflecting your brand identity.'],
                    ['step' => '04', 'title' => 'Development', 'description' => 'Coding clean, fast, secure, and SEO-friendly pages.'],
                    ['step' => '05', 'title' => 'Testing & Launch', 'description' => 'Rigorous cross-browser testing, mobile verification, and smooth deployment.']
                ],
                'faqs' => [
                    ['q' => 'How long does a website take to build?', 'a' => 'Most business websites take 4–6 weeks; larger e-commerce stores take 8–14 weeks depending on scope.'],
                    ['q' => 'Will my website be mobile-friendly and responsive?', 'a' => 'Yes, every website is fully mobile-responsive and tested across smartphones, tablets, laptops, and desktops.'],
                    ['q' => 'Can our team update content, text, and images ourselves?', 'a' => 'Yes, we provide an easy, non-technical admin panel to update text, images, blogs, and pages anytime without a developer.'],
                    ['q' => 'Is SEO included in website development?', 'a' => 'Yes, core technical SEO like clean semantic HTML, meta tags, schema data, fast speeds, and indexing structure is built in.'],
                    ['q' => 'Do you use pre-made templates or custom design?', 'a' => 'We create bespoke custom designs around your unique brand identity, target demographic, and conversion goals.'],
                    ['q' => 'Do you provide hosting, domain, and SSL security?', 'a' => 'Yes, WebTecMart configures secure cloud hosting, SSL encryption, DNS setup, automated backups, and Cloudflare CDN.'],
                    ['q' => 'Who owns the intellectual property and source code?', 'a' => 'You do. Upon project completion, 100% of the code, design assets, and intellectual property rights belong entirely to you.'],
                    ['q' => 'Can you integrate third-party tools like CRMs and payment gateways?', 'a' => 'Yes, we seamlessly integrate Razorpay, Stripe, WhatsApp Business API, HubSpot, Zoho, and email automation.'],
                    ['q' => 'How does the website help generate qualified leads?', 'a' => 'We build strategic conversion funnels, clear CTAs, inquiry forms, and GA4 event tracking to turn visitors into inquiries.'],
                    ['q' => 'What post-launch support and maintenance do you offer?', 'a' => 'All packages include complimentary post-launch support, followed by flexible ongoing maintenance retainers.']
                ]
            ],
            'digital-business-branding' => [
                'title' => 'Digital Business Branding',
                'category' => 'Branding',
                'slug' => 'digital-business-branding',
                'icon' => 'paintbrush',
                'tagline' => 'Branding That Leaves a Lasting Impression',
                'hero_title' => 'Digital Business Branding',
                'hero_description' => 'Build an authoritative, memorable brand identity that stands out in competitive digital markets and commands buyer trust with WebTecMart.',
                'summary' => 'Build an authoritative, memorable brand identity that commands buyer trust.',
                'body' => 'Branding is the foundation of digital business success. We craft comprehensive brand positioning, visual identities, logo suites, typography systems, and brand guidelines that resonate with your customers and set you apart from competitors.',
                'features' => [
                    ['title' => 'Brand Strategy & Positioning', 'description' => 'Define your brand archetype, core value proposition, tone of voice, and competitive edge.'],
                    ['title' => 'Visual Identity & Logo Design', 'description' => 'Iconic logos, brand typography, color palettes, and stationery designed for modern screens.'],
                    ['title' => 'Brand Style Guidelines', 'description' => 'Comprehensive brand manuals defining rules for digital, print, and social media consistency.'],
                    ['title' => 'Marketing Collateral', 'description' => 'Brochures, pitch decks, business cards, letterheads, and social media kit assets.'],
                    ['title' => 'Digital Brand Experience', 'description' => 'Cohesive brand storytelling across websites, landing pages, email templates, and ads.'],
                    ['title' => 'Reputation & Entity Branding', 'description' => 'Building online brand trust and Google Knowledge Panel entity credibility.']
                ],
                'process' => [
                    ['step' => '01', 'title' => 'Brand Discovery', 'description' => 'Exploring your vision, company history, competitors, and target demographics.'],
                    ['step' => '02', 'title' => 'Concept & Strategy', 'description' => 'Developing brand moodboards, positioning angles, and creative directions.'],
                    ['step' => '03', 'title' => 'Design & Iteration', 'description' => 'Crafting logos, visual assets, and typography systems with collaborative feedback.'],
                    ['step' => '04', 'title' => 'Guidelines & Delivery', 'description' => 'Final vector assets, brand manual, and digital rollout toolkit.']
                ],
                'faqs' => [
                    ['q' => 'What is included in a branding package?', 'a' => 'Logo suite, brand guidelines, color system, typography, business stationery, and social media kit.'],
                    ['q' => 'How long does a branding project take?', 'a' => 'Typically 2 to 4 weeks for complete brand identity and guidelines.'],
                    ['q' => 'Do I get full copyright ownership of my brand assets?', 'a' => 'Yes, you receive 100% intellectual property ownership and source vector files.'],
                    ['q' => 'What if I already have a logo but need a full identity?', 'a' => 'We can build a complete visual identity system around your existing logo, or modernize it if desired.'],
                    ['q' => 'Do you help with digital and print rollout?', 'a' => 'Yes, we assist with applying your brand across website, social channels, business stationery, and marketing decks.'],
                    ['q' => 'How does strategic branding impact customer trust?', 'a' => 'A cohesive, professional brand identity builds immediate commercial credibility, commanding higher perceived value and loyalty.'],
                    ['q' => 'Will I receive vector source files?', 'a' => 'Yes, you get all vector files (AI, EPS, SVG, PDF, Figma) and high-res exports for web, mobile, and print use.'],
                    ['q' => 'How many design revisions are included?', 'a' => 'Our branding packages include collaborative revision rounds to ensure every element aligns with your vision.'],
                    ['q' => 'Do you create packaging and merchandise design?', 'a' => 'Yes, we design custom packaging, boxes, labels, employee kits, and trade expo merchandise.'],
                    ['q' => 'How do we get started with a branding project?', 'a' => 'Contact our team for a brand discovery session. We will audit your current positioning and deliver a custom roadmap.']
                ]
            ],
            'search-engine-marketing' => [
                'title' => 'Search Engine Marketing (Google Ads)',
                'category' => 'Paid Advertising',
                'slug' => 'search-engine-marketing',
                'icon' => 'megaphone',
                'tagline' => 'High-ROAS Paid Search Campaigns',
                'hero_title' => 'Search Engine Marketing (PPC)',
                'hero_description' => 'Maximize your return on ad spend with precision-targeted Google Search, Display, Shopping, and Remarketing campaigns managed by certified PPC specialists.',
                'summary' => 'Maximize return on ad spend with precision-targeted Google Ads campaigns.',
                'body' => 'Pay-Per-Click advertising delivers immediate commercial visibility. At WebTecMart, we engineer high-converting PPC campaigns that eliminate wasted ad spend and drive qualified inquiries.',
                'features' => [
                    ['title' => 'Google Search Ads', 'description' => 'Capture high-intent buyers the exact moment they search for your products or services.'],
                    ['title' => 'Display & Remarketing', 'description' => 'Re-engage past website visitors across Google Display Network to boost conversion rates.'],
                    ['title' => 'Google Shopping Campaigns', 'description' => 'Drive e-commerce product sales with optimized Performance Max and Merchant Center feeds.'],
                    ['title' => 'Landing Page Optimization', 'description' => 'High-converting landing pages built for quality scores, fast load, and maximum lead capture.'],
                    ['title' => 'Negative Keyword Pruning', 'description' => 'Relentless negative keyword management to eliminate junk clicks and stretch budget further.'],
                    ['title' => 'Conversion Tracking & GA4', 'description' => 'Accurate revenue attribution, offline conversion tracking, and transparent ROAS reporting.']
                ],
                'process' => [
                    ['step' => '01', 'title' => 'Audit & Account Setup', 'description' => 'Analyzing past account history, competitor bids, and commercial search queries.'],
                    ['step' => '02', 'title' => 'Campaign Architecture', 'description' => 'Structuring ad groups, keyword match types, ad copy variants, and ad extensions.'],
                    ['step' => '03', 'title' => 'Tracking & Launch', 'description' => 'Setting up Google Tag Manager, enhanced conversions, and launching campaigns.'],
                    ['step' => '04', 'title' => 'Weekly ROAS Optimization', 'description' => 'Bid adjustments, query pruning, ad testing, and budget reallocation for top performance.']
                ],
                'faqs' => [
                    ['q' => 'How much budget do I need for Google Ads?', 'a' => 'Budgets vary by industry competition; we recommend starting with ₹20,000 to ₹50,000/month in ad spend to gather sufficient statistical data and optimize campaigns efficiently.'],
                    ['q' => 'How quickly will I see qualified leads from PPC?', 'a' => 'Google Ads campaigns can start driving high-intent traffic and qualified buyer leads within 24 to 48 hours of campaign launch.'],
                    ['q' => 'Do you take a percentage of ad spend or a flat fee?', 'a' => 'We offer transparent, milestone-based management packages with zero hidden fees. You pay the ad network directly, and our fee is purely for expert campaign architecture, daily optimization, and reporting.'],
                    ['q' => 'What campaign types do you handle in Google Ads?', 'a' => 'We manage Google Search Ads, Performance Max (PMax), Display Banner Remarketing, YouTube In-Stream Ads, and Google Shopping campaigns for e-commerce.'],
                    ['q' => 'How do you lower Cost-Per-Click (CPC) and improve Quality Score?', 'a' => 'We craft hyper-relevant ad copy, build tightly themed ad groups, add comprehensive ad assets/extensions, and optimize landing page speed and relevance to achieve 8/10 to 10/10 Quality Scores.'],
                    ['q' => 'How do you prevent wasted budget on junk clicks?', 'a' => 'We conduct weekly negative keyword audits, exclude irrelevant audience segments, eliminate click-fraud traffic, and restrict geo-targeting strictly to profitable commercial locations.'],
                    ['q' => 'Who owns our Google Ads account and campaign data?', 'a' => 'You do. The Google Ads account is created under your corporate billing profile. You retain 100% ownership of your historical ad data, conversion tags, and campaign assets at all times.'],
                    ['q' => 'How do you track conversions and prove Return on Ad Spend (ROAS)?', 'a' => 'We configure Google Tag Manager (GTM), GA4 eCommerce tracking, enhanced conversions, and offline CRM lead value tracking to report exact cost-per-lead (CPL) and return on ad spend.'],
                    ['q' => 'Can you audit and repair an existing, underperforming Google Ads account?', 'a' => 'Yes. We perform a complete 40-point Google Ads audit analyzing wasted ad spend, negative keyword gaps, bidding strategies, and landing page bottlenecks with actionable fixes.'],
                    ['q' => 'What is the synergy between Google Ads (SEM) and Organic SEO?', 'a' => 'Google Ads gives you immediate top-of-page visibility while testing high-converting keywords. We take the highest-converting PPC search queries and feed them into your SEO strategy for long-term organic authority.']
                ]
            ],
            'social-media-optimization' => [
                'title' => 'Social Media Optimization & Marketing',
                'category' => 'Social Media',
                'slug' => 'social-media-optimization',
                'icon' => 'share',
                'tagline' => 'Engage, Grow & Convert Across Social',
                'hero_title' => 'Social Media Optimization',
                'hero_description' => 'Build a loyal, engaged community and turn followers into paying customers with creative social media management, reel production, and paid social campaigns.',
                'summary' => 'Build an engaged community and turn followers into customers with creative social media.',
                'body' => 'In today’s connected marketplace, social media is your digital storefront. We design thumb-stopping graphics, viral short-form video reels, and data-backed content calendars that amplify your brand reach across Instagram, LinkedIn, Facebook, and YouTube.',
                'features' => [
                    ['title' => 'Monthly Content Calendar', 'description' => 'Planned strategic content themes, carousel infographics, educational posts, and promotional graphics.'],
                    ['title' => 'Reels & Short-Form Video', 'description' => 'Engaging video scripts, editing, captions, and trending audio tailored for Instagram Reels and YouTube Shorts.'],
                    ['title' => 'LinkedIn B2B Thought Leadership', 'description' => 'Executive personal branding and company page growth to attract corporate decision-makers.'],
                    ['title' => 'Community Management', 'description' => 'Daily comment moderation, DM responses, follower engagement, and hashtag strategy.'],
                    ['title' => 'Paid Social Advertising', 'description' => 'Targeted Meta (Facebook & Instagram) ad funnels for lead generation, retargeting, and sales.'],
                    ['title' => 'Analytics & Growth Reports', 'description' => 'Monthly tracking of follower growth, reach, engagement rate, website clicks, and conversions.']
                ],
                'process' => [
                    ['step' => '01', 'title' => 'Social Audit', 'description' => 'Reviewing existing profiles, audience demographics, and competitor benchmarks.'],
                    ['step' => '02', 'title' => 'Strategy & Moodboard', 'description' => 'Establishing visual aesthetic, content pillars, voice tone, and posting schedules.'],
                    ['step' => '03', 'title' => 'Creation & Approval', 'description' => 'Designing graphics and editing reels in advance for client review and sign-off.'],
                    ['step' => '04', 'title' => 'Publishing & Engagement', 'description' => 'Scheduled posting, active community engagement, and performance analysis.']
                ],
                'faqs' => [
                    ['q' => 'How many posts and reels will be published each week?', 'a' => 'Our standard packages include 3 to 5 high-impact posts and viral short-form reels per week, complemented by daily interactive stories and community engagement.'],
                    ['q' => 'Do you create all graphics, captions, and short videos in-house?', 'a' => 'Yes. Our creative team handles complete concept ideation, custom graphic design, copywriting, hashtag research, and video reel editing with trending audio.'],
                    ['q' => 'Which social media platforms do you specialize in?', 'a' => 'We manage and scale Instagram, LinkedIn, Facebook, YouTube, and X (formerly Twitter), tailoring content formats to each platform’s unique audience.'],
                    ['q' => 'How do you grow authentic followers and avoid fake bots?', 'a' => 'We focus strictly on organic audience attraction: high-value carousel graphics, algorithm-favored video reels, niche community interactions, and targeted hashtag strategies. We never use fake followers or bots.'],
                    ['q' => 'Can you run paid social advertising (Meta & LinkedIn Ads)?', 'a' => 'Yes. We build high-converting paid social funnels for lead generation, retargeting website visitors, and driving e-commerce transactions across Facebook, Instagram, and LinkedIn.'],
                    ['q' => 'Can our team review and approve posts before they go live?', 'a' => 'Yes. We prepare monthly content calendars with completed designs and copy 7 to 10 days in advance for your review and approval before scheduling.'],
                    ['q' => 'How do you handle comments and customer inquiries on our profiles?', 'a' => 'We monitor comments, mentions, and direct messages, providing friendly responses, filtering spam, and escalating high-priority customer inquiries directly to your sales team.'],
                    ['q' => 'What metrics are included in the monthly performance report?', 'a' => 'We track reach, impressions, follower growth rate, engagement rate, website referral clicks, top-performing posts, and lead conversions.'],
                    ['q' => 'How long does it take to see measurable brand engagement from social media?', 'a' => 'Visual consistency and engagement improvements typically appear within 3 to 4 weeks. Meaningful follower community growth and inbound inquiries compound strongly over 60 to 90 days.'],
                    ['q' => 'Do you offer personal branding for founders and executives on LinkedIn?', 'a' => 'Yes. We curate executive thought-leadership articles, opinion carousels, and networking strategies that position company leaders as industry authorities.']
                ]
            ],
            'mobile-app-development' => [
                'title' => 'Mobile App Development',
                'category' => 'App Development',
                'slug' => 'mobile-app-development',
                'icon' => 'smartphone',
                'tagline' => 'Seamless Mobile Experiences for iOS & Android',
                'hero_title' => 'Mobile App Development',
                'hero_description' => 'Turn your app vision into reality with native and cross-platform mobile apps for iOS and Android, engineered for performance, security, and user retention.',
                'summary' => 'Native and cross-platform mobile apps for iOS and Android engineered for high retention.',
                'body' => 'With mobile representing over 70% of digital traffic, a dedicated mobile application gives your business a direct, high-engagement channel to your customers. WebTecMart builds intuitive, secure mobile apps using Flutter, React Native, iOS Swift, and Android Kotlin.',
                'features' => [
                    ['title' => 'Cross-Platform Apps', 'description' => 'Single codebase Flutter and React Native apps delivering 100% native performance on iOS & Android.'],
                    ['title' => 'Native iOS & Android', 'description' => 'Platform-specific Swift and Kotlin development for complex hardware and performance needs.'],
                    ['title' => 'UI/UX Mobile Design', 'description' => 'Figma interactive prototypes, user journey mapping, and intuitive mobile gesture navigation.'],
                    ['title' => 'Backend API Architecture', 'description' => 'Scalable REST/GraphQL APIs, cloud databases, user authentication, and third-party integrations.'],
                    ['title' => 'Push Notifications & Engagement', 'description' => 'Targeted push messaging, in-app messaging, and analytics to maximize retention and lifetime value.'],
                    ['title' => 'App Store Optimization (ASO)', 'description' => 'Optimizing app titles, descriptions, screenshots, and keywords to rank in Google Play and App Store.']
                ],
                'process' => [
                    ['step' => '01', 'title' => 'App Discovery', 'description' => 'Defining app architecture, features, user personas, and technical specifications.'],
                    ['step' => '02', 'title' => 'UI/UX Prototyping', 'description' => 'Creating clickable wireframes and high-fidelity screen designs in Figma.'],
                    ['step' => '03', 'title' => 'Agile Development', 'description' => 'Sprint-based frontend and backend development with bi-weekly progress demos.'],
                    ['step' => '04', 'title' => 'QA & Store Launch', 'description' => 'Device testing, bug fixing, and managing complete Google Play & Apple App Store publishing.']
                ],
                'faqs' => [
                    ['q' => 'Which is better: Flutter/React Native or Native iOS/Android?', 'a' => 'Cross-platform frameworks (Flutter & React Native) cut development costs and time-to-market by 40% while delivering 60fps native performance for 90% of business applications. For hardware-intensive apps or 3D gaming, we develop native Swift and Kotlin.'],
                    ['q' => 'Do you handle the entire Google Play and Apple App Store submission?', 'a' => 'Yes. We manage end-to-end publishing, including App Store compliance review, screenshot graphics, privacy declarations, and developer account setup.'],
                    ['q' => 'Will I receive 100% ownership of the mobile app source code?', 'a' => 'Yes. Upon final project completion, full repository code ownership, API documentation, and intellectual property rights are transferred entirely to your organization.'],
                    ['q' => 'How long does it take to develop a custom mobile application?', 'a' => 'A Minimum Viable Product (MVP) or business app takes 6 to 10 weeks. Complex platforms with multi-role portals and real-time APIs typically take 12 to 16 weeks.'],
                    ['q' => 'Can you build a web admin panel to manage app users and data?', 'a' => 'Yes. Every mobile app we develop comes with a responsive, secure web-based admin dashboard where you can manage user accounts, push notifications, orders, and analytical data.'],
                    ['q' => 'How do you ensure app security and customer data privacy?', 'a' => 'We implement SSL/TLS certificate pinning, end-to-end data encryption, JWT token-based authentication, and follow OWASP Mobile Security guidelines.'],
                    ['q' => 'Can you integrate payment gateways like Razorpay, Stripe, and Apple Pay?', 'a' => 'Yes. We seamlessly integrate Razorpay, Stripe, PayU, Apple Pay, Google Pay, biometric logins (FaceID / Fingerprint), and SMS/WhatsApp OTP verification.'],
                    ['q' => 'How do you test apps to prevent crashes across different devices?', 'a' => 'We run automated and manual QA across 50+ real Android and iOS device models, verifying memory consumption, battery drain, offline caching, and responsive UI scaling.'],
                    ['q' => 'What post-launch maintenance and OS updates do you provide?', 'a' => 'All apps include 3 months of complimentary warranty support. We also provide annual maintenance packages to ensure ongoing compatibility with new iOS and Android OS releases.'],
                    ['q' => 'Do you provide App Store Optimization (ASO) to get more downloads?', 'a' => 'Yes. We optimize your app title, subtitle, keyword tags, description copy, and icon/screenshot design to maximize discoverability and organic downloads.']
                ]
            ],
            'b2b-exhibition-seo' => [
                'title' => 'B2B & Exhibition SEO Services',
                'category' => 'SEO',
                'slug' => 'b2b-exhibition-seo',
                'icon' => 'sparkles',
                'tagline' => 'Event SEO That Fills Trade Halls',
                'hero_title' => 'B2B & Exhibition SEO Services',
                'hero_description' => 'We uncover hidden search opportunities and build a customized, deadline-driven Event SEO strategy that drives pre-registered trade buyers, sells out exhibitor stalls, and delivers measurable results.',
                'summary' => 'Deadline-driven Event SEO strategy that drives pre-registered trade buyers and sells out exhibitor stalls.',
                'body' => 'High-performance websites for B2B trade fairs and exhibitions, combining event website development with strategic SEO to drive organic growth and registrations.',
                'features' => [
                    ['title' => 'Event Intent Keyword Strategy', 'description' => 'Capturing buyer registrations and exhibitor inquiries around trade show dates and product categories.'],
                    ['title' => 'Fast Event Landing Pages', 'description' => 'High-converting mobile registration pages built for speed and deadline-driven attendance.'],
                    ['title' => 'Exhibitor SEO Directory', 'description' => 'Indexable exhibitor portals that earn topical authority and long-tail product queries.'],
                    ['title' => 'Speaker & Agenda Schema', 'description' => 'Structured Event schema markup to win rich Google search result snippets.'],
                    ['title' => 'International Trade PR & Backlinks', 'description' => 'Editorial mentions on global trade portals that build immense domain authority.'],
                    ['title' => 'Registration Funnel GA4 Tracking', 'description' => 'Real-time tracking of buyer delegate registrations and commercial exhibition inquiries.']
                ],
                'process' => [
                    ['step' => '01', 'title' => 'Event Search Audit', 'description' => 'Analyzing past edition search footprint, competitors, and sourcing demand.'],
                    ['step' => '02', 'title' => 'Technical & Schema Architecture', 'description' => 'Restructuring event URLs, Event schema, and exhibitor listings.'],
                    ['step' => '03', 'title' => 'Topical Content Sprint', 'description' => 'Publishing targeted buyer guides, exhibitor highlights, and attendee information.'],
                    ['step' => '04', 'title' => 'Sprint to Show Dates', 'description' => 'Aggressive optimization during peak registration windows to fill the hall.']
                ],
                'faqs' => [
                    ['q' => 'When should event SEO begin before an upcoming trade exhibition?', 'a' => 'Ideally 6 to 9 months before opening date. This allows sufficient time to index event pages, rank for competitive industry trade queries, and capture delegate registrations as soon as visitor campaigns launch.'],
                    ['q' => 'Can SEO help sell commercial exhibitor booths as well as attract visitors?', 'a' => 'Yes. We target high-intent commercial exhibitor queries such as "book stall at textile expo", "exhibit at B2B manufacturing fair", and product sourcing searches to generate qualified inbound exhibitor leads.'],
                    ['q' => 'How do you preserve historical domain authority when updating websites for new annual editions?', 'a' => 'We establish a permanent URL hierarchy (e.g., domain.com/edition-2027) while maintaining evergreen canonical master pages and 301 redirects, ensuring your site accumulates search equity year after year without link rot.'],
                    ['q' => 'Do you implement Schema markup for Event dates, venues, tickets, and speaker schedules?', 'a' => 'Yes. We embed Google-compliant Event Schema (JSON-LD) with start/end dates, venue geo-coordinates, ticket availability, performer/speaker profiles, and organizer credentials for rich snippets in Google Search.'],
                    ['q' => 'How do you target international trade buyers and global sourcing delegations?', 'a' => 'We implement multi-regional hreflang tags, currency selectors, and international buyer keyword targeting to attract trade delegations from the Middle East, Europe, North America, and Asia.'],
                    ['q' => 'Can you build an indexable exhibitor directory that drives long-tail search traffic?', 'a' => 'Yes. We structure indexable exhibitor profile pages highlighting individual product catalogs and booth numbers, capturing thousands of niche B2B product search queries.'],
                    ['q' => 'How do you track delegate registrations and exhibitor inquiries in GA4?', 'a' => 'We configure GA4 custom event tracking for badge registrations, PDF brochure downloads, hall layout views, and exhibitor inquiry forms with automated attribution modeling.'],
                    ['q' => 'What digital PR and trade media backlink strategies do you use for expos?', 'a' => 'We secure editorial placements, press release syndication, and calendar listings across verified trade publications, government export boards, and industry associations.'],
                    ['q' => 'What post-event SEO strategy do you implement between exhibition editions?', 'a' => 'Post-show, we publish post-show reports, highlight reels, and pre-registration interest lists for the next edition, maintaining search visibility and building anticipation all year round.'],
                    ['q' => 'What proof of results do you have in the trade exhibition industry?', 'a' => 'WebTecMart has successfully optimized major trade expos including Bharat Tex (Ministry of Textiles), IHGF Delhi Autumn & Spring Fair, Clarion Events, Innovation Zero, and BMJ Future Health with over 400% organic attendance growth.']
                ]
            ]
        ];

        $data = $serviceCatalog[$cleanSlug] ?? [
            'title' => ucwords(str_replace('-', ' ', $cleanSlug)),
            'category' => 'Digital Marketing',
            'slug' => $cleanSlug,
            'icon' => 'sparkles',
            'tagline' => 'Specialized Digital Growth Solutions',
            'hero_title' => ucwords(str_replace('-', ' ', $cleanSlug)),
            'hero_description' => 'Professional digital marketing, design, and search engine optimization services engineered to drive measurable growth for your business.',
            'summary' => 'Professional digital solutions engineered to drive measurable business growth.',
            'body' => 'WebTecMart delivers data-driven digital marketing solutions designed around your commercial objectives.',
            'features' => [
                ['title' => 'Strategic Planning', 'description' => 'Comprehensive market research and customized execution roadmap.'],
                ['title' => 'Execution Excellence', 'description' => 'Delivered by senior in-house developers, designers, and growth strategists.'],
                ['title' => 'Measurable ROI', 'description' => 'Transparent analytics tracking and continuous optimization.']
            ],
            'process' => [
                ['step' => '01', 'title' => 'Discovery', 'description' => 'Understanding business objectives and target audience.'],
                ['step' => '02', 'title' => 'Strategy', 'description' => 'Crafting an actionable roadmap.'],
                ['step' => '03', 'title' => 'Execution', 'description' => 'Implementation with precision and quality.'],
                ['step' => '04', 'title' => 'Optimization', 'description' => 'Continuous refinement based on performance data.']
            ],
            'faqs' => [
                ['q' => 'How do we get started?', 'a' => 'Contact our team for a free strategy consultation and custom proposal.'],
                ['q' => 'What is the turnaround time?', 'a' => 'Timelines depend on project scope; standard delivery is 2 to 6 weeks.']
            ]
        ];

        $nextOrder = (int) db()->query("SELECT COALESCE(MAX(sort_order), -1) + 1 FROM content_items WHERE content_type = 'service_detail'")->fetchColumn();
        $payloadJson = json_encode($data, JSON_UNESCAPED_UNICODE);
        
        $insert = db()->prepare('INSERT INTO content_items (content_type, title, summary, body, metadata, sort_order, is_active) VALUES ("service_detail", :title, :summary, :body, :metadata, :sort_order, 1)');
        $insert->execute([
            ':title' => $data['title'],
            ':summary' => $data['summary'],
            ':body' => $data['body'],
            ':metadata' => $payloadJson,
            ':sort_order' => $nextOrder
        ]);
        $newId = (int) db()->lastInsertId();

        $stmt = db()->prepare('SELECT * FROM content_items WHERE id = :id LIMIT 1');
        $stmt->execute([':id' => $newId]);
        $newRow = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($newRow) {
            $newRow = array_merge($newRow, $data);
            return $newRow;
        }
    } catch (\Throwable $e) {
        error_log('ensureServiceDetailExists error: ' . $e->getMessage());
    }

    return null;
}

function getServiceBySlug(string $slug): ?array
{
    $cleanSlug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug), '-'));
    foreach (serviceDetailPages() as $sp) {
        $s = strtolower(trim((string) ($sp['slug'] ?? '')));
        if ($s === $cleanSlug || $s === strtolower($slug)) {
            return $sp;
        }
    }
    // Direct DB fallback by metadata slug or title
    try {
        $stmt = db()->prepare('SELECT id, title, summary, body, metadata, is_active FROM content_items WHERE content_type = "service_detail" AND (metadata LIKE :s1 OR metadata LIKE :s2 OR title LIKE :s3) LIMIT 1');
        $stmt->execute([
            ':s1' => '%"slug":"' . $cleanSlug . '"%',
            ':s2' => '%"slug":"' . $slug . '"%',
            ':s3' => '%' . $slug . '%',
        ]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $meta = json_decode($row['metadata'] ?: '', true);
            if (is_array($meta)) {
                if (isset($meta['metadata']) && is_array($meta['metadata'])) {
                    $meta = array_merge($meta, $meta['metadata']);
                }
                $row = array_merge($row, $meta);
            }
            return $row;
        }
    } catch (\Throwable $e) {}

    // Auto-seed and return if not found
    return ensureServiceDetailExists($slug);
}

function pricingPlans(): array
{
    $defaults = [
        [
            'name' => 'Starter',
            'price' => '₹18,999',
            'description' => 'Perfect for small businesses ready to build initial digital demand.',
            'features' => ['SEO setup', 'Landing page', 'Monthly reporting', '1 campaign strategy'],
            'popular' => false,
        ],
        [
            'name' => 'Growth',
            'price' => '₹39,999',
            'description' => 'Built for brands that want faster growth and consistent lead flow.',
            'features' => ['Paid ads management', 'SEO + content plan', 'CRM setup', 'Weekly optimization'],
            'popular' => true,
        ],
        [
            'name' => 'Scale',
            'price' => '₹79,999',
            'description' => 'High-touch marketing systems for large-volume leads and sales pipeline.',
            'features' => ['Multi-channel campaigns', 'Analytics dashboard', 'Conversion tracking', 'Dedicated strategist'],
            'popular' => false,
        ],
    ];

    return cmsContent('pricing', $defaults);
}

function packagesPageContent(): array
{
    $defaults = [
        'title' => 'Choose Your Package',
        'summary' => 'Select the perfect plan for your business needs. All packages include our expert support and proven strategies.',
        'page_meta_title' => 'Digital Marketing Packages | WebTecMart',
        'page_meta_description' => 'Compare WebTecMart digital marketing packages, pricing plans, add-ons and support options.',
        'hero_badge' => 'Pricing Plans',
        'heading_prefix' => 'Choose Your',
        'heading_highlight' => 'Package',
        'monthly_label' => 'Monthly',
        'yearly_label' => 'Yearly',
        'save_badge' => 'Save 20%',
        'popular_badge' => 'Most Popular',
        'monthly_period_label' => '/month',
        'yearly_period_label' => '/year',
        'packages' => [
            [
                'id' => 'basic',
                'name' => 'Basic',
                'icon' => 'zap',
                'monthly' => 9999,
                'yearly' => 99990,
                'description' => 'Perfect for startups and small businesses looking to establish their digital presence.',
                'features' => ['Website Design & Development', 'Basic SEO (10 Keywords)', 'Social Media Setup (3 Platforms)', 'Monthly Performance Report', 'Email Support', '1 GB Hosting', '5 Pages Website', 'Mobile Responsive Design'],
                'popular' => false,
                'buttonText' => 'Get Started',
                'buttonHref' => '/contact.php',
            ],
            [
                'id' => 'professional',
                'name' => 'Professional',
                'icon' => 'rocket',
                'monthly' => 24999,
                'yearly' => 249990,
                'description' => 'Ideal for growing businesses that need comprehensive digital marketing solutions.',
                'features' => ['Advanced Website Design & Development', 'Advanced SEO (30 Keywords)', 'Social Media Management (5 Platforms)', 'Content Marketing (4 Posts/Month)', 'Email & WhatsApp Support', '5 GB Hosting', '15 Pages Website', 'Mobile Responsive Design', 'Google Analytics Setup', 'Monthly Strategy Call'],
                'popular' => true,
                'buttonText' => 'Start Now',
                'buttonHref' => '/contact.php',
            ],
            [
                'id' => 'enterprise',
                'name' => 'Enterprise',
                'icon' => 'crown',
                'monthly' => 49999,
                'yearly' => 499990,
                'description' => 'Complete solution for large businesses and enterprises with advanced needs.',
                'features' => ['Custom Website Development', 'Premium SEO (50+ Keywords)', 'Social Media Management (All Platforms)', 'Content Marketing (8 Posts/Month)', '24/7 Priority Support', 'Unlimited Hosting', 'Unlimited Pages', 'Mobile App Integration', 'Advanced Analytics & Reporting', 'Dedicated Account Manager', 'Quarterly Strategy Review', 'Custom Development'],
                'popular' => false,
                'buttonText' => 'Contact Sales',
                'buttonHref' => '/contact.php',
            ],
        ],
        'addons_heading_prefix' => 'Customize Your',
        'addons_heading_highlight' => 'Package',
        'addons_subtitle' => 'Add these services to create a package that perfectly fits your needs',
        'addons' => [
            ['name' => 'Additional SEO Keywords', 'price' => '₹500/keyword'],
            ['name' => 'Social Media Ads Management', 'price' => '₹15,000/month'],
            ['name' => 'Email Marketing Setup', 'price' => '₹10,000'],
            ['name' => 'Content Writing (Per Blog)', 'price' => '₹2,500'],
            ['name' => 'Advanced Analytics Dashboard', 'price' => '₹5,000/month'],
            ['name' => 'Dedicated Account Manager', 'price' => '₹20,000/month'],
        ],
        'trust_badges' => [
            ['icon' => 'award', 'title' => '13+ Years', 'subtitle' => 'of Excellence'],
            ['icon' => 'users', 'title' => '1000+', 'subtitle' => 'Happy Clients'],
            ['icon' => 'shield', 'title' => '98%', 'subtitle' => 'Satisfaction Rate'],
            ['icon' => 'clock', 'title' => '24/7', 'subtitle' => 'Support Available'],
        ],
        'faq_heading_prefix' => 'Frequently Asked',
        'faq_heading_highlight' => 'Questions',
        'faq_subtitle' => 'Everything you need to know about our packages and services',
        'faqs' => [
            ['question' => 'Can I upgrade my package later?', 'answer' => 'Yes, you can upgrade your package at any time. We\'ll prorate the difference and ensure a smooth transition.'],
            ['question' => 'What happens if I need to cancel?', 'answer' => 'You can cancel your subscription anytime. We offer a 30-day money-back guarantee if you\'re not satisfied with our services.'],
            ['question' => 'Do you offer custom packages?', 'answer' => 'Yes, we offer custom packages tailored to your specific business needs. Contact us for a personalized quote.'],
            ['question' => 'How long does it take to see results?', 'answer' => 'Results vary depending on the service. SEO typically takes 3-6 months, while website development can be completed in 4-8 weeks.'],
        ],
        'cta_title' => 'Need a Custom Package?',
        'cta_description' => 'Contact us and we\'ll create a package tailored specifically for your business needs.',
        'cta_primary_label' => 'Contact Us',
        'cta_primary_href' => '/contact.php',
        'cta_phone' => '+919999674255',
        'cta_phone_label' => 'Call: +91-9999674255',
    ];
    $items = cmsContent('packages_page', [$defaults]);
    $content = array_merge($defaults, $items[0] ?? []);
    foreach (['packages', 'addons', 'trust_badges', 'faqs'] as $field) {
        if (!isset($content[$field]) || !is_array($content[$field])) $content[$field] = $defaults[$field];
    }
    foreach ($content['packages'] as $index => &$package) {
        $package = array_merge($defaults['packages'][$index] ?? [], is_array($package) ? $package : []);
        if (!isset($package['features']) || !is_array($package['features'])) $package['features'] = [];
    }
    unset($package);
    return $content;
}

function testimonials(): array
{
    $defaults = [
        [
            'name' => 'Aarav Mehta',
            'role' => 'Founder, UrbanNest Realty',
            'quote' => 'We doubled our lead count in 90 days, and the reporting was crystal clear.',
        ],
        [
            'name' => 'Riya Shah',
            'role' => 'Director, FreshCart',
            'quote' => 'The team understood our market and built campaigns that actually converted.',
        ],
        [
            'name' => 'Vikram S.',
            'role' => 'Owner, BrightCare Clinic',
            'quote' => 'From strategy to creatives to funnels, everything felt aligned and results-driven.',
        ],
    ];

    return cmsContent('testimonial', $defaults);
}

function successStories(): array
{
    $defaults = [
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
                ['icon' => 'search', 'value' => 200, 'suffix' => '+', 'label' => 'Keywords Ranked'],
                ['icon' => 'trophy', 'value' => 80, 'suffix' => '+', 'label' => 'Top 3 Rankings'],
                ['icon' => 'chart', 'value' => 180, 'suffix' => '+', 'label' => 'Leads / Month'],
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
            'description' => 'India is a trusted global sourcing partner, with the 62nd IHGF Delhi Autumn Fair 2027 serving as a one-stop sourcing destination.',
            'image' => '/assets/images/case-study-2.jpg',
            'imageFit' => 'contain',
            'website' => 'https://ihgfdelhifair.in/',
            'accentFrom' => '#C4007A',
            'accentTo' => '#E0398F',
            'metrics' => [
                ['icon' => 'trending', 'value' => 300, 'suffix' => '%', 'label' => 'Footfall Increase'],
                ['icon' => 'search', 'value' => 85, 'suffix' => '+', 'label' => 'Keywords Ranked'],
                ['icon' => 'trophy', 'value' => 22, 'suffix' => '', 'label' => 'Top 3 Rankings'],
                ['icon' => 'chart', 'value' => 10, 'suffix' => '', 'label' => 'Locations Ranked #1'],
            ],
            'keywords' => [
                ['text' => 'Autumn Fair', 'top' => true],
                ['text' => 'Autumn Fair 2027', 'top' => true],
                ['text' => 'Autumn Fair Dates 2027', 'top' => true],
                ['text' => 'Autumn Fair Asia 2027'],
                ['text' => 'Autumn Sourcing Fair 2027'],
            ],
        ],
    ];

    return cmsContent('success_story', $defaults);
}

function slugify(string $text): string
{
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    if (function_exists('iconv')) {
        $trans = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        if ($trans !== false) $text = $trans;
    }
    $text = preg_replace('~[^-\w]+~', '', $text);
    $text = trim($text, '-');
    $text = preg_replace('~-+~', '-', $text);
    $text = strtolower($text);
    return $text !== '' ? $text : 'post';
}

function getBlogPost($identifier): ?array
{
    $posts = blogPosts();
    if (is_numeric($identifier) && (int) $identifier > 0) {
        $id = (int) $identifier;
        foreach ($posts as $post) {
            if ((int) ($post['id'] ?? 0) === $id) {
                return $post;
            }
        }
    }
    $slug = trim((string) $identifier);
    if ($slug !== '') {
        foreach ($posts as $post) {
            if (($post['slug'] ?? '') === $slug) {
                return $post;
            }
        }
    }
    return null;
}

function blogUrl(array $post): string
{
    $slug = !empty($post['slug']) ? $post['slug'] : (!empty($post['title']) ? slugify($post['title']) : '');
    if ($slug !== '') {
        return '/blog.php?slug=' . urlencode($slug);
    }
    return '/blog.php?id=' . ((int) ($post['id'] ?? 0));
}

function blogPosts(): array
{
    $defaults = [
        [
            'title' => 'SEO wins that actually move revenue',
            'summary' => 'Focus on intent, content depth, and technical clarity to attract higher-value visitors.',
            'body' => "# Focus on search intent\n\nContent that answers what people are looking for can attract more qualified visitors.\n\n## Build useful, trustworthy content\n\nCombine technical clarity with helpful information to turn organic traffic into business results.",
            'image' => '/assets/images/placeholder.jpg',
            'category' => 'SEO',
            'author' => 'WebTecMart',
            'date' => 'October 15, 2026',
            'readTime' => '4 min read',
            'likes' => 0,
        ],
        [
            'title' => 'How PPC campaigns scale without wasting budget',
            'summary' => 'Use tighter audience targeting and landing page alignment to improve efficiency.',
            'body' => "# Plan campaigns around outcomes\n\nStart with clear goals and relevant audiences to make each campaign more effective.\n\n## Improve landing page alignment\n\nMatch each ad to a focused landing page and use performance data to guide ongoing optimization.",
            'image' => '/assets/images/placeholder.jpg',
            'category' => 'Paid Advertising',
            'author' => 'WebTecMart',
            'date' => 'October 15, 2026',
            'readTime' => '5 min read',
            'likes' => 0,
        ],
        [
            'title' => 'Content systems for consistent lead flow',
            'summary' => 'Build an editorial calendar that powers organic reach and steady customer demand.',
            'body' => "# Create a consistent content system\n\nA practical editorial calendar helps your team publish useful content regularly.\n\n## Turn content into demand\n\nConnect each article to the questions your customers ask and the next step they can take.",
            'image' => '/assets/images/placeholder.jpg',
            'category' => 'Content Marketing',
            'author' => 'WebTecMart',
            'date' => 'October 15, 2026',
            'readTime' => '4 min read',
            'likes' => 0,
        ],
    ];

    $posts = cmsContent('blog', $defaults);
    foreach ($posts as &$post) {
        $post['id'] = (int) ($post['id'] ?? 0);
        $post['title'] = (string) ($post['title'] ?? 'Untitled Article');
        $post['summary'] = (string) ($post['summary'] ?? '');
        $post['body'] = (string) ($post['body'] ?? '');
        $post['image'] = !empty($post['image']) ? (string) $post['image'] : '/assets/images/placeholder.jpg';
        $post['category'] = !empty($post['category']) ? (string) $post['category'] : 'Digital Marketing';
        $post['author'] = !empty($post['author']) ? (string) $post['author'] : 'WebTecMart Team';
        $post['date'] = !empty($post['date']) ? (string) $post['date'] : date('F j, Y');
        $post['readTime'] = !empty($post['readTime']) ? (string) $post['readTime'] : '4 min read';
        $post['likes'] = (int) ($post['likes'] ?? 0);
        if (empty($post['slug'])) {
            $post['slug'] = slugify($post['title']);
        }
    }
    unset($post);

    // User requested: Newly added blogs should always appear at the top (newest ID first)
    usort($posts, static function (array $a, array $b): int {
        return ((int) ($b['id'] ?? 0)) <=> ((int) ($a['id'] ?? 0));
    });

    return $posts;
}

function homepageSections(): array
{
    $defaults = [
        ['title' => 'Hero Section', 'summary' => 'Main homepage headline, description and consultation form.'],
        ['title' => 'Trusted Partners', 'summary' => 'Trusted brands and partner logos section.'],
        ['title' => 'About WebTecMart', 'summary' => 'Agency introduction, metrics and growth promise.'],
        ['title' => 'What We Do', 'summary' => 'Services overview cards shown on the homepage.'],
        ['title' => 'Search Visibility', 'summary' => 'SEO service cards and free quote CTA.'],
        ['title' => 'SEO Portfolio', 'summary' => 'SEO success story and case study section.'],
        ['title' => 'Testimonials', 'summary' => 'Client testimonials and reviews.'],
        ['title' => 'Contact Form', 'summary' => 'Homepage enquiry form and contact information.'],
    ];

    return cmsContent('homepage', $defaults);
}

function homepageHeroContent(): array
{
    $defaults = [[
        'title' => 'Boost Your AI-Powered Digital Marketing With Us',
        'heading_prefix' => 'Boost Your',
        'heading_underline' => 'AI-Powered',
        'heading_highlight' => 'Digital Marketing',
        'heading_suffix' => 'With Us',
        'summary' => 'Transform Visibility into Growth',
        'body' => 'WebTecMart combines SEO, performance marketing, creative content, social media, web development and digital branding to help businesses get found, reach the right audience and turn visibility into growth.',
        'description_secondary' => 'Your business deserves more than just an online presence. From startups and B2B businesses to local service providers and growing enterprises, we create digital solutions tailored to your business objectives.',
        'badge' => 'Digital Growth Agency',
        'benefits' => "Build awareness of your brand or product\nGenerate quality leads\nBuild a credible online presence\nTurn visitors into customers",
        'form_title' => 'Get Your Free Consultation',
        'form_subtitle' => 'Tell us about your business and get a tailored digital growth plan.',
        'contact_for_label' => 'Contact for:',
        'contact_for' => 'Digital Marketing, SEO, Websites & Branding',
        'name_placeholder' => 'Full Name *',
        'email_placeholder' => 'Email Address *',
        'phone_placeholder' => 'Phone Number *',
        'company_placeholder' => 'Company / Website *',
        'service_placeholder' => 'Select Service Required *',
        'service_options' => "SEO (Search Engine Optimization)\nPPC / Google Ads\nMeta / Google Ads\nSocial Media Advertising\nWebsite Design & Development\nSocial Media Optimization\nDigital Business Branding\nE-commerce SEO\nContent Marketing\nMobile App Development\nOther",
        'message_placeholder' => 'Enter your message here',
        'consent_text' => "Yes, I'm happy for you to use my information",
        'robot_text' => "I'm not a robot",
        'recaptcha_text' => 'reCAPTCHA',
        'submit_label' => 'Get Free Consultation',
        'phone_label' => 'or call us on',
        'phone_number' => '+91-9999674255',
        'trust_first' => 'Quick Response',
        'trust_second' => 'No Spam, Ever',
        'trust_third' => 'Free Consultation',
    ]];
    $items = cmsContent('hero_content', $defaults);
    return array_merge($defaults[0], $items[0] ?? []);
}

function trustedPartnersContent(): array
{
    $defaults = [[
        'title' => 'Trusted by Leading Brands & Startups',
        'summary' => 'Join 500+ businesses that trust WebTecMart for their digital growth',
        'badge' => 'Trusted Partners',
        'heading_prefix' => 'Trusted by',
        'heading_highlight' => 'Leading Brands',
        'heading_suffix' => '& Startups',
    ]];
    $items = cmsContent('trusted_partners_content', $defaults);
    return array_merge($defaults[0], $items[0] ?? []);
}

function trustedPartnerLogos(): array
{
    $defaults = [
        ['name' => 'Client Logo 1', 'src' => '/assets/images/logo-1.png'],
        ['name' => 'Client Logo 2', 'src' => '/assets/images/logos-2.png'],
        ['name' => 'Client Logo 3', 'src' => '/assets/images/logos-3.jpeg'],
        ['name' => 'Client Logo 4', 'src' => '/assets/images/logos-4.jpeg'],
        ['name' => 'Client Logo 5', 'src' => '/assets/images/logos-5.jpeg'],
        ['name' => 'Client Logo 6', 'src' => '/assets/images/logos-6.jpeg'],
        ['name' => 'Client Logo 7', 'src' => '/assets/images/logos-7.jpeg'],
        ['name' => 'Client Logo 8', 'src' => '/assets/images/logos-8.jpeg'],
        ['name' => 'Client Logo 9', 'src' => '/assets/images/logos-9.jpeg'],
        ['name' => 'Client Logo 10', 'src' => '/assets/images/logos-10.jpeg'],
        ['name' => 'Client Logo 11', 'src' => '/assets/images/logos-11.jpeg'],
    ];
    $items = array_map(static function (array $logo): array {
        return [
            'title' => $logo['name'],
            'summary' => $logo['name'],
            'image' => $logo['src'],
        ];
    }, $defaults);

    return array_map(static function (array $item): array {
        return [
            'name' => (string) ($item['title'] ?? ''),
            'alt' => (string) (($item['summary'] ?? '') !== '' ? $item['summary'] : ($item['title'] ?? '')),
            'src' => (string) ($item['image'] ?? ''),
        ];
    }, cmsContent('partner', $items));
}

function homepageVisibilityContent(): array
{
    $defaults = [
        'title' => 'Increase Your Business\'s Search Visibility',
        'summary' => 'Target the right audience at the right time with our comprehensive search engine optimization strategies.',
        'badge' => 'Search Visibility',
        'heading_prefix' => 'Increase Your Business\'s',
        'heading_highlight' => 'Search Visibility',
        'learn_more_label' => 'Learn More',
        'quote_label' => 'REQUEST FREE QUOTE',
        'quote_href' => '/contact',
        'services' => [
            ['number' => '01', 'icon' => 'map-pin', 'title' => 'Local SEO', 'text' => 'We work on the organic factors that help a business grow locally. With our Local SEO strategies, customers searching nearby for what you offer will find you first.', 'href' => '/services'],
            ['number' => '02', 'icon' => 'flag', 'title' => 'National SEO', 'text' => 'Looking to grow your business across your own country? National SEO is the right fit — we sharpen your website\'s ranking in a way that turns visibility into real leads and sales.', 'href' => '/services'],
            ['number' => '03', 'icon' => 'globe', 'title' => 'International SEO', 'text' => 'Reaching clients across borders is tough without the right approach. Our International SEO services help you rank for the right keywords and earn backlinks from relevant global sites.', 'href' => '/services'],
            ['number' => '04', 'icon' => 'shopping-cart', 'title' => 'E-Commerce SEO', 'text' => 'For online stores, ranking on Google\'s first page isn\'t optional, it\'s essential. We make sure your products are easy to find so potential customers can discover and order them with ease.', 'href' => '/services'],
            ['number' => '05', 'icon' => 'rocket', 'title' => 'SEO for Small Business', 'text' => 'Startups often struggle with weak visibility online and on social media. Our Startup SEO services target the right customers by identifying business-focused keywords and showcasing your offerings through a strong website.', 'href' => '/services'],
            ['number' => '06', 'icon' => 'shield', 'title' => 'Online Presence & Reputation', 'text' => 'Online Reputation Management is a key part of any SEO strategy, shaping how your brand is perceived by controlling what appears on Google\'s front page for your name and terms.', 'href' => '/services'],
        ],
    ];
    $items = cmsContent('homepage_visibility', [$defaults]);
    $content = array_merge($defaults, $items[0] ?? []);
    if (!isset($content['services']) || !is_array($content['services'])) $content['services'] = $defaults['services'];
    $visibilitySlugMap = [
        0 => 'local-seo',
        1 => 'national-seo',
        2 => 'international-seo',
        3 => 'ecommerce-seo',
        4 => 'small-business-seo',
        5 => 'online-reputation-management',
    ];
    $dbPagesBySlug = [];
    foreach (serviceDetailPages() as $detailPage) {
        $slug = (string) ($detailPage['slug'] ?? '');
        if ($slug !== '') $dbPagesBySlug[$slug] = $detailPage;
    }
    foreach ($content['services'] as $index => &$service) {
        $service = array_merge($defaults['services'][$index] ?? ['number' => sprintf('%02d', $index + 1), 'icon' => 'globe', 'title' => '', 'text' => '', 'href' => '/seo-services-delhi.php'], is_array($service) ? $service : []);
        $targetSlug = $visibilitySlugMap[$index] ?? '';
        if ($targetSlug && isset($dbPagesBySlug[$targetSlug])) {
            $dbItem = $dbPagesBySlug[$targetSlug];
            if (!empty($dbItem['title'])) {
                $service['title'] = $dbItem['title'];
            }
            if (!empty($dbItem['summary'])) {
                $service['text'] = $dbItem['summary'];
            }
            if (file_exists(__DIR__ . '/' . $targetSlug . '.php')) {
                $service['href'] = '/' . $targetSlug . '.php';
            } else {
                $service['href'] = '/service.php?slug=' . rawurlencode($targetSlug);
            }
        }
    }
    unset($service);
    return $content;
}

function portfolioPageContent(): array
{
    $defaults = [
        'title' => 'Our Work',
        'summary' => 'Explore our portfolio of successful projects and see how we\'ve helped businesses achieve remarkable growth',
        'badge' => 'Our Portfolio',
        'heading_prefix' => 'Our',
        'heading_highlight' => 'Work',
        'all_projects_label' => 'All Projects',
        'stats' => [
            ['icon' => 'briefcase', 'value' => '500+', 'label' => 'Projects Delivered'],
            ['icon' => 'users', 'value' => '300+', 'label' => 'Happy Clients'],
            ['icon' => 'award', 'value' => '50+', 'label' => 'Awards Won'],
            ['icon' => 'trending', 'value' => '98%', 'label' => 'Client Satisfaction'],
        ],
        'categories' => [
            ['id' => 'branding', 'label' => 'Branding'],
            ['id' => 'web', 'label' => 'Web Design'],
            ['id' => 'seo', 'label' => 'SEO'],
            ['id' => 'social', 'label' => 'Social Media'],
            ['id' => 'app', 'label' => 'App Development'],
        ],
        'view_details_label' => 'View Details',
        'view_project_label' => 'View Project',
        'empty_message' => 'No projects found in this category.',
        'modal_results_label' => 'Key Results',
        'modal_cta_label' => 'Start Your Project',
        'cta_heading' => 'Ready to Create Your Success Story?',
        'cta_description' => 'Let\'s work together to create amazing digital experiences that help your business grow.',
        'cta_primary_label' => 'Start Your Project',
        'cta_primary_href' => '/contact.php',
        'cta_secondary_label' => 'Explore Our Services',
        'cta_secondary_href' => '/services.php',
    ];
    $items = cmsContent('portfolio_page', [$defaults]);
    $content = array_merge($defaults, $items[0] ?? []);
    if (!isset($content['stats']) || !is_array($content['stats'])) $content['stats'] = $defaults['stats'];
    if (!isset($content['categories']) || !is_array($content['categories'])) $content['categories'] = $defaults['categories'];
    return $content;
}

function portfolioProjects(): array
{
    $defaults = [
        ['title' => 'TechSolutions India', 'summary' => 'Complete digital branding and identity design for a leading tech solutions company. We created a modern, professional brand identity that reflects their innovative approach.', 'category' => 'branding', 'categoryLabel' => 'Branding', 'image' => '/portfolio/project-1.jpg', 'results' => ['300% Brand Recognition', '50% Increase in Leads', 'Award Winning Design'], 'client' => 'TechSolutions India', 'year' => '2024', 'link' => '#'],
        ['title' => 'StyleHub Fashion', 'summary' => 'Responsive e-commerce website design and development for a premium fashion brand. The website features seamless shopping experience and modern UI/UX.', 'category' => 'web', 'categoryLabel' => 'Web Design', 'image' => '/portfolio/project-2.jpg', 'results' => ['400% Increase in Sales', '200% More Traffic', '5-Star User Rating'], 'client' => 'StyleHub Fashion', 'year' => '2024', 'link' => '#'],
        ['title' => 'GreenTech Solutions', 'summary' => 'Comprehensive SEO strategy that helped a green tech company rank #1 on Google for 50+ keywords and achieve 300% organic growth.', 'category' => 'seo', 'categoryLabel' => 'SEO', 'image' => '/portfolio/project-3.jpg', 'results' => ['50+ Keywords Ranked #1', '300% Organic Growth', '200% More Leads'], 'client' => 'GreenTech Solutions', 'year' => '2023', 'link' => '#'],
        ['title' => 'Wellness World', 'summary' => 'Social media management and content strategy that grew a wellness brand\'s following from 5K to 50K+ followers with 5x engagement.', 'category' => 'social', 'categoryLabel' => 'Social Media', 'image' => '/portfolio/project-4.jpg', 'results' => ['50K+ Followers', '5x Engagement Rate', '200% More Traffic'], 'client' => 'Wellness World', 'year' => '2023', 'link' => '#'],
        ['title' => 'FinTech Solutions', 'summary' => 'Cross-platform mobile app for a fintech startup. The app features secure payments, user-friendly interface, and real-time analytics.', 'category' => 'app', 'categoryLabel' => 'App Development', 'image' => '/portfolio/project-5.jpg', 'results' => ['10K+ Downloads', '4.8 Star Rating', '100K+ Transactions'], 'client' => 'FinTech Solutions', 'year' => '2024', 'link' => '#'],
        ['title' => 'DigitalFirst Agency', 'summary' => 'Complete rebranding for a digital marketing agency including logo design, brand guidelines, and marketing collateral.', 'category' => 'branding', 'categoryLabel' => 'Branding', 'image' => '/portfolio/project-6.jpg', 'results' => ['200% Brand Recognition', '150% More Inquiries', 'Industry Award'], 'client' => 'DigitalFirst Agency', 'year' => '2024', 'link' => '#'],
        ['title' => 'GreenEnergy Hub', 'summary' => 'Local SEO campaign for a green energy company that increased foot traffic and online inquiries by 300% across 10+ locations.', 'category' => 'seo', 'categoryLabel' => 'SEO', 'image' => '/portfolio/project-7.jpg', 'results' => ['10+ Locations Ranked #1', '300% Foot Traffic', '500% Online Inquiries'], 'client' => 'GreenEnergy Hub', 'year' => '2023', 'link' => '#'],
        ['title' => 'ShopSmart App', 'summary' => 'E-commerce mobile app with AI-powered product recommendations, seamless checkout, and personalized shopping experience.', 'category' => 'app', 'categoryLabel' => 'App Development', 'image' => '/portfolio/project-8.jpg', 'results' => ['50K+ Downloads', '4.9 Star Rating', '200% More Sales'], 'client' => 'ShopSmart', 'year' => '2024', 'link' => '#'],
        ['title' => 'EcoFriendly Living', 'summary' => 'Modern, sustainable website design for an eco-friendly lifestyle brand with focus on user experience and conversion optimization.', 'category' => 'web', 'categoryLabel' => 'Web Design', 'image' => '/portfolio/project-9.jpg', 'results' => ['150% More Conversions', '100% Traffic Increase', 'Best Design Award'], 'client' => 'EcoFriendly Living', 'year' => '2023', 'link' => '#'],
    ];
    $projects = cmsContent('portfolio_project', $defaults);
    $projectIds = db()->query("SELECT id FROM content_items WHERE content_type = 'portfolio_project' AND is_active = 1 ORDER BY sort_order ASC, id ASC")->fetchAll(PDO::FETCH_COLUMN);
    foreach ($projects as $index => &$project) {
        $project['id'] = (int) ($projectIds[$index] ?? 0);
    }
    foreach ($projects as &$project) {
        $project['description'] = (string) ($project['summary'] ?? '');
        if (!isset($project['results']) || !is_array($project['results'])) $project['results'] = [];
    }
    unset($project);
    return $projects;
}

function aboutPageContent(): array
{
    $defaults = [
        'title' => 'Complete Digital Branding Agency',
        'summary' => 'We set new standards to develop the branding of digital businesses with innovative strategies and proven results. For over 13 years, we\'ve been the trusted partner for 1000+ businesses worldwide.',
        'page_meta_title' => 'About WebTecMart | Digital Branding Agency',
        'page_meta_description' => 'Learn about WebTecMart, our story, values, team, milestones, and digital growth approach.',
        'badge' => 'About WebTecMart',
        'hero_prefix' => 'Complete',
        'hero_highlight' => 'Digital Branding',
        'hero_suffix' => 'Agency',
        'story_heading_prefix' => 'Our',
        'story_heading_highlight' => 'Story',
        'story_paragraphs' => [
            'WebTecMart is the No.1 digital service provider from the last 13 years in the industry, strengthening over 1000+ online businesses with comprehensive digital marketing solutions.',
            'We aim at transforming every idea into the proposition that results in revolutionary business growth. IT, Digital Marketing, and Online Reputation Management services offered by us are at par with industry standards.',
            'We come up with innovative and futuristic options that help you sustain in a competitive market environment. Our team is dedicated to delivering excellence and driving measurable growth for your business.',
        ],
        'story_visual_brand' => 'WebTecMart',
        'story_visual_tagline' => 'Digital Branding Agency',
        'stats' => [
            ['icon' => 'award', 'value' => '13+', 'label' => 'Years Experience', 'description' => 'Industry leaders since 2013'],
            ['icon' => 'users', 'value' => '1000+', 'label' => 'Happy Clients', 'description' => 'Businesses strengthened online'],
            ['icon' => 'briefcase', 'value' => '50+', 'label' => 'Expert Team', 'description' => 'Passionate professionals'],
            ['icon' => 'trending', 'value' => '500+', 'label' => 'Brands Trust Us', 'description' => 'Across diverse industries'],
        ],
        'values_heading_prefix' => 'Our',
        'values_heading_highlight' => 'Core Values',
        'values_subtitle' => 'The principles that guide everything we do at WebTecMart',
        'core_values' => [
            ['icon' => 'target', 'title' => 'Concept is King', 'description' => 'We believe every great digital success starts with a powerful, unique concept that sets your brand apart from the competition.'],
            ['icon' => 'lightbulb', 'title' => 'Innovative Solutions', 'description' => 'Our futuristic strategies help you stay ahead in competitive markets with cutting-edge digital solutions and creative thinking.'],
            ['icon' => 'handshake', 'title' => 'Client-Centric Approach', 'description' => 'We listen to your vision and transform your ideas into customized, growth-focused digital strategies that deliver results.'],
            ['icon' => 'rocket', 'title' => 'Results-Driven', 'description' => 'Data-driven decisions and analytical expertise ensure your business achieves measurable, sustainable growth and ROI.'],
        ],
        'journey_heading_prefix' => 'Our',
        'journey_heading_highlight' => 'Journey',
        'journey_subtitle' => 'Milestones that have shaped our success story',
        'milestones' => [
            ['year' => '2013', 'title' => 'Founded', 'description' => 'WebTecMart was established with a vision to revolutionize digital branding.'],
            ['year' => '2015', 'title' => 'First 100 Clients', 'description' => 'Reached the milestone of 100+ satisfied clients across various industries.'],
            ['year' => '2018', 'title' => 'Expansion', 'description' => 'Expanded services to include SEO, SMO, and Performance Marketing.'],
            ['year' => '2020', 'title' => '500+ Brands', 'description' => 'Trusted by 500+ brands and startups for digital marketing solutions.'],
            ['year' => '2023', 'title' => 'Global Reach', 'description' => 'Expanded reach to international clients across 15+ countries.'],
            ['year' => '2026', 'title' => '1000+ Success', 'description' => 'Strengthened 1000+ online businesses with comprehensive solutions.'],
        ],
        'usp_items' => [
            ['icon' => 'handshake', 'title' => 'Our USP', 'description' => 'We host a very qualified team, which are great listeners as well. Our digital wizard experts possess analytical skills to build customized and innovative plans for clients.'],
            ['icon' => 'shield', 'title' => 'Quality Commitment', 'description' => 'We deliver excellence in every project, ensuring your brand stands out with innovative strategies and exceptional execution.'],
            ['icon' => 'zap', 'title' => 'Fast & Reliable', 'description' => 'We deliver projects on time with transparent communication and measurable results that drive business growth.'],
        ],
        'cta_title' => 'Ready to Start Your Digital Journey?',
        'cta_description' => 'Let\'s work together to create digital experiences that help you grow.',
        'cta_primary_label' => 'Get Free Consultation',
        'cta_primary_href' => '/contact.php',
        'cta_secondary_label' => 'Explore Our Services',
        'cta_secondary_href' => '/services.php',
    ];
    $items = cmsContent('about_page', [$defaults]);
    $content = array_merge($defaults, $items[0] ?? []);
    foreach (['story_paragraphs', 'stats', 'core_values', 'milestones', 'usp_items'] as $field) {
        if (!isset($content[$field]) || !is_array($content[$field])) $content[$field] = $defaults[$field];
    }
    return $content;
}

function homepageAboutContent(): array
{
    $defaults = [
        'title' => 'Complete Digital Branding Agency',
        'summary' => 'Helping Your Business Get Found, Get Clicked, and Grow',
        'badge' => 'About WebTecMart',
        'heading_prefix' => 'Complete',
        'heading_highlight' => 'Digital Branding',
        'heading_suffix' => 'Agency',
        'image_src' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1200&q=80',
        'image_alt' => 'WebTecMart digital branding agency team collaborating',
        'brand_name' => 'WebTecMart',
        'brand_tagline' => 'Digital Branding Agency',
        'stats' => [
            ['icon' => 'award', 'value' => '13+', 'label' => 'Years Experience'],
            ['icon' => 'shield', 'value' => '100%', 'label' => 'Ethical Agency'],
            ['icon' => 'dollar', 'value' => 'Affordable', 'label' => 'Agency Fee'],
            ['icon' => 'users2', 'value' => '11', 'label' => 'In-House Team'],
        ],
        'why_heading' => 'Why Businesses Choose WebTecMart',
        'why_points' => [
            '👤 Dedicated Account Manager',
            '📊 Transparent Reporting',
            '📈 ROI-Driven Strategies',
            '⚡ Fast Support & Execution',
        ],
        'trust_prefix' => 'Trusted by',
        'trust_highlight' => '500+ brands',
        'trust_suffix' => 'across industries',
        'content_heading_prefix' => 'Your Trusted Partner in',
        'content_heading_highlight' => 'Digital Growth',
        'paragraphs' => [
            'WebTecMart is the No.1 digital service provider from the last 13 years in the industry, strengthening over 1000+ online businesses with comprehensive digital marketing solutions.',
            'We aim at transforming every idea into the proposition that results in revolutionary business growth. IT, Digital Marketing, and Online Reputation Management services offered by us are at par. We come up with innovative and futuristic options that help you sustain in a competitive market environment.',
        ],
        'features' => [
            ['icon' => 'rocket', 'title' => '360° Digital Solutions', 'description' => 'From website development and SEO to branding, social media, paid advertising, and mobile apps—we provide everything your business needs to grow under one roof.'],
            ['icon' => 'target', 'title' => 'Growth-Focused Strategies', 'description' => 'Every campaign is built with one goal in mind: attracting qualified traffic, generating leads, increasing conversions, and maximizing your ROI.'],
            ['icon' => 'brain', 'title' => 'Innovation Meets Performance', 'description' => 'We combine creative thinking, AI-powered insights, and data-driven strategies to deliver digital solutions that keep your brand ahead of the competition.'],
            ['icon' => 'handshake', 'title' => 'Your Long-Term Growth Partner', 'description' => 'We don\'t just complete projects—we build lasting partnerships. Our team works as an extension of your business, providing transparent communication, continuous optimization, and dedicated support.'],
        ],
        'usp_title' => 'Our USP',
        'usp_description' => 'We host a very qualified team, which are great listeners as well. Our digital wizard experts possess analytical skills to build customized and innovative plans for clients.',
        'cta_label' => 'Learn More About Us',
        'cta_href' => '/about.php',
        'excellence_text' => '13+ Years of Excellence',
    ];
    $items = cmsContent('homepage_about', [$defaults]);
    $content = array_merge($defaults, $items[0] ?? []);
    foreach (['stats', 'why_points', 'paragraphs', 'features'] as $field) {
        if (!isset($content[$field]) || !is_array($content[$field])) $content[$field] = $defaults[$field];
    }
    return $content;
}

function servicesPageContent(): array
{
    $defaults = [
        'title' => 'Boost Your Growth with Strategic Digital Marketing Services',
        'summary' => 'Fill your sales pipeline using digital marketing services that combine targeted campaigns, high-converting websites, and AI-powered optimization to attract high-intent customers ready to convert.',
        'page_meta_title' => 'Digital Marketing Services | WebTecMart',
        'page_meta_description' => 'Explore WebTecMart digital marketing, SEO, web design, social media, and performance marketing services.',
        'hero_badge' => 'What We Offer',
        'hero_heading_prefix' => 'Boost Your Growth with Strategic',
        'hero_heading_highlight' => 'Digital Marketing Services',
        'hero_primary_label' => 'Contact Us',
        'hero_primary_href' => '/contact.php',
        'button_separator_label' => 'OR',
        'hero_phone' => '+919999674255',
        'hero_phone_label' => 'Call Now',
        'quote_title' => 'Request A Quote',
        'quote_name_placeholder' => 'Name*',
        'quote_phone_placeholder' => 'Phone No*',
        'quote_email_placeholder' => 'Email*',
        'quote_message_placeholder' => 'Type Your Message*',
        'robot_label' => "I'm not a robot",
        'recaptcha_label' => 'reCAPTCHA',
        'quote_submit_label' => 'Submit',
        'intro_eyebrow' => 'Smart. Scalable. Secure.',
        'intro_heading_prefix' => 'Transform Your Digital Strategy with',
        'intro_heading_highlight' => 'ROI-Focused Marketing Services',
        'intro_paragraphs' => [
            'In today\'s fast-changing digital ecosystem, results-driven marketing has become the hallmark of quantifiable business achievement. At WebTecMart, we deliver data-driven, ROI-oriented digital marketing services designed to address the evolving demands of modern brands. As one of India\'s top-performing agencies, we enable companies to grow faster through calculated strategy, intelligent automation, and cross-channel execution.',
            'Our skilled team makes sure every rupee spent on marketing is leveraged to drive maximum impact. We design highly converting campaigns for search, social, and paid platforms — all supported by rich analytics and performance data. Unlike conventional marketing, our approach is solely about measurable results: leads, clicks, conversions, and sales.',
        ],
        'website_pre' => 'Want A Professional Website',
        'website_heading' => 'That Converts Visitors Into Customers?',
        'website_description' => 'Partner with our expert web design services to build a responsive, high-converting website. Contact us now and get a free quote tailored to your business needs.',
        'website_primary_label' => 'Request Proposal',
        'website_primary_href' => '/contact.php',
        'website_phone' => '+919999674255',
        'website_phone_label' => 'Contact Now',
        'website_image' => 'https://images.unsplash.com/photo-1556157382-97eda2d62296?w=700&h=800&fit=crop&q=80',
        'website_image_alt' => 'Professional consultant with laptop',
        'stats' => [
            ['icon' => 'award', 'value' => '13+', 'label' => 'Years of Excellence'],
            ['icon' => 'users', 'value' => '1000+', 'label' => 'Happy Clients'],
            ['icon' => 'trending', 'value' => '500+', 'label' => 'Projects Delivered'],
            ['icon' => 'clock', 'value' => '98%', 'label' => 'Client Retention'],
        ],
        'services_eyebrow' => 'What We Offer',
        'services_heading_prefix' => 'Our',
        'services_heading_highlight' => 'Core Services',
        'services_subtitle' => 'End-to-end digital solutions to help your business thrive',
        'main_service_link_label' => 'Learn More',
        'main_service_link_href' => '/contact.php',
        'main_services' => [
            ['icon' => 'paintbrush', 'title' => 'Digital Business Branding', 'description' => 'Any web business can flourish and develop only if it is rightly promoted. "BRANDING" is highly crucial for a digital business\'s success, and you can assure a well-framed campaign with our digital marketing experts.', 'features' => ['Brand Strategy', 'Visual Identity', 'Brand Positioning', 'Brand Guidelines']],
            ['icon' => 'code', 'title' => 'Website Design & Development', 'description' => 'We help make the first impression of the website memorable and robust. By providing a mix of relevant content and graphics, we provide responsive, easy-to-use websites.', 'features' => ['Responsive Design', 'UI/UX', 'E-Commerce', 'CMS Integration']],
            ['icon' => 'search', 'title' => 'SEO Services in Delhi', 'description' => 'Target high-intent search queries and dominate local and national search results with specialized SEO strategies.', 'features' => ['Local SEO', 'National SEO', 'Technical SEO', 'Keyword Research']],
            ['icon' => 'share', 'title' => 'Social Media Optimization', 'description' => 'Now is the correct time that the audience starts craving for your content. This is only possible with engaging and innovative social media campaigns that our experts are well-versed with.', 'features' => ['Content Strategy', 'Social Media Management', 'Influencer Marketing', 'Community Building']],
            ['icon' => 'megaphone', 'title' => 'Search Engine Marketing', 'description' => 'Our professionals have the relevant practice of marketing businesses that use paid advertisements on SERPs. Our strategies help businesses increase visibility two folds.', 'features' => ['PPC Campaigns', 'Google Ads', 'Bing Ads', 'Retargeting']],
            ['icon' => 'smartphone', 'title' => 'Performance Marketing', 'description' => 'There are 2 million + mobile users today, which means having apps have become the need of the hour. Businesses are left with no choice but to come up with easy-to-use apps.', 'features' => ['iOS Development', 'Android Development', 'Cross-Platform', 'App Store Optimization']],
        ],
        'seo_badge' => 'SEO Services',
        'seo_heading_prefix' => 'Increase Your Business\'s',
        'seo_heading_highlight' => 'Search Visibility',
        'seo_subtitle' => 'Our SEO strategies help you rank higher and reach your target audience effectively',
        'seo_services' => [
            ['icon' => 'mappin', 'title' => 'Local SEO', 'description' => 'We work on the organic factors that help a business grow locally. With our Local SEO strategies, customers searching nearby for what you offer will find you first.', 'benefits' => ['Local Visibility', 'Google Maps Ranking', 'Local Citations']],
            ['icon' => 'globe', 'title' => 'National SEO', 'description' => 'Looking to grow your business across your own country? National SEO is the right fit — we sharpen your website\'s ranking in a way that turns visibility into real leads and sales.', 'benefits' => ['National Reach', 'Lead Generation', 'Brand Awareness']],
            ['icon' => 'earth', 'title' => 'International SEO', 'description' => 'Reaching clients across borders is tough without the right approach. Our International SEO services help you rank for the right keywords and earn backlinks from relevant global sites.', 'benefits' => ['Global Reach', 'Multi-Language', 'International Backlinks']],
        ],
        'seo_quote_label' => 'REQUEST FREE QUOTE',
        'seo_quote_href' => '/contact.php',
        'results_heading_prefix' => 'How Our Services',
        'results_heading_highlight' => 'Drive Real Business Results',
        'results' => [
            ['title' => 'Expert Teams, Proven Results', 'description' => 'At WebTecMart, our professionals are experts in delivering quality digital services that produce measurable results. With experience across industries like e-commerce, healthcare, automotive, and more, we help brands achieve their marketing objectives with confidence.'],
            ['title' => 'Deep Understanding of the Market', 'description' => 'With years of on-ground experience, WebTecMart is well-versed in local market trends, culture, and consumer behavior. This insight allows us to create highly contextual and relevant campaigns that speak to your target audience.'],
            ['title' => 'Data-Driven Strategies with Real-Time Optimization', 'description' => 'We use cutting-edge data intelligence to optimize campaigns in real time. Our solutions are driven by real-time analytics, ensuring your budget is used efficiently for maximum return on investment.'],
            ['title' => 'Complete In-House Team', 'description' => 'With strategy, design, content, and analytics experts, WebTecMart provides a balanced, cohesive approach. This in-house team structure enables smooth execution and quick campaign adjustments.'],
            ['title' => 'Innovative Tech Solutions', 'description' => 'Always improving, WebTecMart adopts the newest marketing technologies, such as AI-powered tools for hyper-targeted campaigns and automated processes that maximize personalization and scalability.'],
        ],
        'process_heading_prefix' => 'Our',
        'process_heading_highlight' => 'Process',
        'process_subtitle' => 'How we deliver exceptional results for your business',
        'process' => [
            ['step' => '01', 'title' => 'Discovery', 'description' => 'We understand your business goals, target audience, and market landscape.'],
            ['step' => '02', 'title' => 'Strategy', 'description' => 'We craft a customized strategy tailored to your unique business needs.'],
            ['step' => '03', 'title' => 'Execution', 'description' => 'Our experts implement the strategy with precision and attention to detail.'],
            ['step' => '04', 'title' => 'Optimization', 'description' => 'We continuously monitor, analyze, and optimize for better results.'],
        ],
        'faq_heading_prefix' => 'Frequently Asked',
        'faq_heading_highlight' => 'Questions',
        'faqs' => [
            ['q' => 'Why is digital marketing more critical today?', 'a' => 'As one of the fastest-growing digital economies, India represents tremendous potential for digital marketing success. Businesses that establish visibility early gain a significant competitive edge.'],
            ['q' => 'How does WebTecMart help brands grow?', 'a' => 'We combine strategy, design, and data-driven execution across SEO, paid media, and web development to deliver measurable growth — leads, traffic, and revenue — not just vanity metrics.'],
            ['q' => 'How do you keep pace with evolving trends?', 'a' => 'Our team continuously tracks algorithm updates, consumer behavior shifts, and emerging platforms, adapting strategies in real time to keep your brand ahead of the competition.'],
            ['q' => 'Why should I choose WebTecMart for my business?', 'a' => 'With 13+ years of experience, a 98% client retention rate, and a fully in-house team, we deliver end-to-end digital solutions tailored to your specific goals and industry.'],
        ],
        'cta_title' => 'Ready to Grow Your Business?',
        'cta_description' => 'Let\'s work together to create digital experiences that help you grow.',
        'cta_primary_label' => 'Get Free Consultation',
        'cta_primary_href' => '/contact.php',
        'cta_secondary_label' => 'View Our Portfolio',
        'cta_secondary_href' => '/portfolio.php',
        'proposal_pre' => 'Your Needs, Our Priority',
        'proposal_heading_prefix' => 'Request a',
        'proposal_heading_highlight' => 'Free Proposal',
        'proposal_heading_suffix' => 'Today',
        'proposal_name_placeholder' => 'Name*',
        'proposal_phone_placeholder' => 'Phone No*',
        'proposal_email_placeholder' => 'Email*',
        'proposal_message_placeholder' => 'Type Your Message*',
        'proposal_robot_label' => "I'm not a robot",
        'proposal_recaptcha_label' => 'reCAPTCHA',
        'proposal_submit_label' => 'Submit',
    ];
    $items = cmsContent('services_page', [$defaults]);
    $content = array_merge($defaults, $items[0] ?? []);
    foreach (['intro_paragraphs', 'stats', 'main_services', 'seo_services', 'results', 'process', 'faqs'] as $field) {
        if (!isset($content[$field]) || !is_array($content[$field])) $content[$field] = $defaults[$field];
    }

    // Dynamically synchronize main_services and seo_services with database records from service_detail
    $dbPages = serviceDetailPages();
    $dbPagesBySlug = [];
    foreach ($dbPages as $dp) {
        if (!empty($dp['slug'])) {
            $dbPagesBySlug[$dp['slug']] = $dp;
        }
    }

    $coreSlugMap = [
        0 => 'digital-business-branding',
        1 => 'website-design-development',
        2 => 'seo-services-delhi',
        3 => 'social-media-optimization',
        4 => 'search-engine-marketing',
        5 => 'performance-marketing',
    ];
    foreach ($content['main_services'] as $idx => &$ms) {
        $slug = $coreSlugMap[$idx] ?? '';
        if (!$slug || !isset($dbPagesBySlug[$slug])) {
            foreach ($dbPagesBySlug as $s => $dp) {
                if (stripos($dp['title'], $ms['title']) !== false || stripos($ms['title'], $dp['title']) !== false) {
                    $slug = $s;
                    break;
                }
            }
        }
        if ($slug && isset($dbPagesBySlug[$slug])) {
            $dbItem = $dbPagesBySlug[$slug];
            if (!empty($dbItem['title'])) $ms['title'] = $dbItem['title'];
            if (!empty($dbItem['summary'])) $ms['description'] = $dbItem['summary'];
            if (!empty($dbItem['features'])) {
                $ms['features'] = array_map(function($f) {
                    return is_array($f) ? ($f['title'] ?? '') : (string) $f;
                }, $dbItem['features']);
            }
            if (file_exists(__DIR__ . '/' . $slug . '.php')) {
                $ms['href'] = '/' . $slug . '.php';
            } else {
                $ms['href'] = '/service.php?slug=' . rawurlencode($slug);
            }
        }
    }
    unset($ms);

    $seoSlugMap = [
        0 => 'local-seo',
        1 => 'national-seo',
        2 => 'international-seo',
    ];
    foreach ($content['seo_services'] as $idx => &$ss) {
        $slug = $seoSlugMap[$idx] ?? '';
        if (!$slug || !isset($dbPagesBySlug[$slug])) {
            foreach ($dbPagesBySlug as $s => $dp) {
                if (stripos($dp['title'], $ss['title']) !== false || stripos($ss['title'], $dp['title']) !== false) {
                    $slug = $s;
                    break;
                }
            }
        }
        if ($slug && isset($dbPagesBySlug[$slug])) {
            $dbItem = $dbPagesBySlug[$slug];
            if (!empty($dbItem['title'])) $ss['title'] = $dbItem['title'];
            if (!empty($dbItem['summary'])) $ss['description'] = $dbItem['summary'];
            if (!empty($dbItem['features'])) {
                $ss['benefits'] = array_map(function($f) {
                    return is_array($f) ? ($f['title'] ?? '') : (string) $f;
                }, array_slice($dbItem['features'], 0, 3));
            }
            $ss['slug'] = $slug;
            if (file_exists(__DIR__ . '/' . $slug . '.php')) {
                $ss['href'] = '/' . $slug . '.php';
            } else {
                $ss['href'] = '/service.php?slug=' . rawurlencode($slug);
            }
        }
    }
    unset($ss);

    return $content;
}

function renderPageAddons(string $page): void
{
    $stmt = db()->prepare('SELECT title, summary, body, metadata FROM content_items WHERE content_type = :type AND is_active = 1 ORDER BY sort_order ASC, id ASC');
    $stmt->execute([':type' => 'page']);

    $addons = [];
    foreach ($stmt->fetchAll() as $row) {
        $metadata = json_decode($row['metadata'] ?? '', true);
        if (is_array($metadata) && ($metadata['page'] ?? '') === $page) {
            $addons[] = [$row, $metadata];
        }
    }

    if (!$addons) {
        return;
    }
    ?>
    <style>
        .cms-page-addons { background:#fff7fa; padding:34px 0; border-bottom:1px solid rgba(196,0,122,.1); }
        .cms-page-addon { max-width:900px; margin:0 auto 16px; padding:22px; border:1px solid rgba(196,0,122,.14); border-radius:18px; background:#fff; }
        .cms-page-addon:last-child { margin-bottom:0; }
        .cms-page-addon h2 { margin:0 0 8px; color:#1a1425; font-size:1.6rem; }
        .cms-page-addon p { margin:8px 0 0; color:#6b6478; line-height:1.7; }
        .cms-page-addon img { display:block; width:100%; max-height:320px; object-fit:cover; border-radius:13px; margin-bottom:16px; }
    </style>
    <section class="cms-page-addons">
        <div class="container">
            <?php foreach ($addons as [$row, $metadata]): ?>
                <article class="cms-page-addon">
                    <?php if (!empty($metadata['image'])): ?><img src="<?= e($metadata['image']) ?>" alt="<?= e($row['title']) ?>"><?php endif; ?>
                    <h2><?= e($row['title']) ?></h2>
                    <?php if ($row['summary'] !== ''): ?><p><?= e($row['summary']) ?></p><?php endif; ?>
                    <?php if ($row['body'] !== ''): ?><p><?= e($row['body']) ?></p><?php endif; ?>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
    <?php
}

function cmsContent(string $type, array $defaults): array
{
    // FIX: `id` added to SELECT (blog items need $row['id'])
    $stmt = db()->prepare('SELECT id, title, summary, body, metadata FROM content_items WHERE content_type = :type AND is_active = 1 ORDER BY sort_order ASC, id ASC');
    $stmt->execute([':type' => $type]);
    $rows = $stmt->fetchAll();

    if (!$rows) {
        $existingCount = db()->prepare('SELECT COUNT(*) FROM content_items WHERE content_type = :type');
        $existingCount->execute([':type' => $type]);
        if ((int) $existingCount->fetchColumn() > 0) {
            $initialized = db()->prepare('INSERT OR IGNORE INTO cms_content_type_state (content_type) VALUES (:type)');
            $initialized->execute([':type' => $type]);
            return [];
        }

        $state = db()->prepare('SELECT 1 FROM cms_content_type_state WHERE content_type = :type');
        $state->execute([':type' => $type]);
        if ($state->fetchColumn()) {
            return [];
        }

        $insert = db()->prepare('INSERT INTO content_items (content_type, title, summary, body, metadata, sort_order) VALUES (:type, :title, :summary, :body, :metadata, :sort_order)');
        foreach ($defaults as $index => $item) {
            $insert->execute([
                ':type' => $type,
                ':title' => $item['title'] ?? $item['name'] ?? 'Untitled',
                ':summary' => $item['summary'] ?? $item['quote'] ?? $item['description'] ?? '',
                ':body' => $item['body'] ?? '',
                ':metadata' => json_encode($item, JSON_UNESCAPED_UNICODE),
                ':sort_order' => $index,
            ]);
        }
        $initialized = db()->prepare('INSERT OR IGNORE INTO cms_content_type_state (content_type) VALUES (:type)');
        $initialized->execute([':type' => $type]);
        return $defaults;
    }

    $initialized = db()->prepare('INSERT OR IGNORE INTO cms_content_type_state (content_type) VALUES (:type)');
    $initialized->execute([':type' => $type]);

    return array_map(function (array $row) use ($type): array {
        $item = json_decode($row['metadata'] ?? '', true);
        if (!is_array($item)) {
            $item = [];
        }
        if ($type === 'blog') {
            $item['id'] = (int) ($row['id'] ?? 0);
        }
        $item['title'] = $row['title'];
        $item['summary'] = $row['summary'] ?? '';
        if ($row['body'] !== '') {
            $item['body'] = $row['body'];
        }
        if ($type === 'pricing') {
            $item = [
                'name' => $row['title'],
                'price' => $item['price'] ?? 'Contact us',
                'description' => $row['summary'] ?? '',
                'features' => $row['body'] !== '' ? preg_split('/\r\n|\r|\n/', $row['body']) : [],
                'popular' => (bool) ($item['popular'] ?? false),
            ];
        }
        return $item;
    }, $rows);
}

function cmsAllContent(): array
{
    return db()->query('SELECT * FROM content_items ORDER BY content_type ASC, sort_order ASC, id ASC')->fetchAll();
}

function cmsContentTypeInitialized(string $type): bool
{
    $stmt = db()->prepare('SELECT 1 FROM cms_content_type_state WHERE content_type = :type LIMIT 1');
    $stmt->execute([':type' => $type]);
    return (bool) $stmt->fetchColumn();
}

function cmsGetById(int $id): ?array
{
    $stmt = db()->prepare('SELECT * FROM content_items WHERE id = :id LIMIT 1');
    $stmt->execute([':id' => $id]);
    $row = $stmt->fetch();
    return $row ?: null;
}

function cmsSave(string $type, string $title, string $summary, string $body, array $metadata = [], ?int $id = null): void
{
    $payload = json_encode($metadata, JSON_UNESCAPED_UNICODE);

    if ($id !== null) {
        $stmt = db()->prepare('UPDATE content_items SET content_type = :type, title = :title, summary = :summary, body = :body, metadata = :metadata, updated_at = CURRENT_TIMESTAMP WHERE id = :id');
        $stmt->execute([
            ':type' => $type,
            ':title' => $title,
            ':summary' => $summary,
            ':body' => $body,
            ':metadata' => $payload,
            ':id' => $id,
        ]);
        return;
    }

    $stmt = db()->prepare('INSERT INTO content_items (content_type, title, summary, body, metadata, sort_order) VALUES (:type, :title, :summary, :body, :metadata, :sort_order)');
    $stmt->execute([
        ':type' => $type,
        ':title' => $title,
        ':summary' => $summary,
        ':body' => $body,
        ':metadata' => $payload,
        ':sort_order' => 999,
    ]);
}

function cmsDelete(int $id): void
{
    $stmt = db()->prepare('DELETE FROM content_items WHERE id = :id');
    $stmt->execute([':id' => $id]);
}

function cmsSetActive(int $id, bool $isActive): void
{
    $stmt = db()->prepare('UPDATE content_items SET is_active = :is_active, updated_at = CURRENT_TIMESTAMP WHERE id = :id');
    $stmt->execute([
        ':is_active' => $isActive ? 1 : 0,
        ':id' => $id,
    ]);
}

function uploadCmsImage(array $file): string
{
    $error = (int) ($file['error'] ?? UPLOAD_ERR_NO_FILE);
    if ($error === UPLOAD_ERR_NO_FILE) {
        return '';
    }

    if ($error !== UPLOAD_ERR_OK) {
        $uploadErrors = [
            UPLOAD_ERR_INI_SIZE => 'The image is larger than this server allows. Choose a smaller image (max 4 MB) or increase upload_max_filesize and post_max_size.',
            UPLOAD_ERR_FORM_SIZE => 'The image exceeds the maximum size allowed by the form (max 4 MB).',
            UPLOAD_ERR_PARTIAL => 'The image upload was interrupted. Please try again.',
            UPLOAD_ERR_NO_TMP_DIR => 'The server is missing its temporary upload folder. Please contact your hosting provider.',
            UPLOAD_ERR_CANT_WRITE => 'The server could not save the uploaded image. Please check disk permissions.',
            UPLOAD_ERR_EXTENSION => 'A server extension stopped the image upload.',
        ];
        throw new RuntimeException($uploadErrors[$error] ?? 'The image upload failed. Please try again or use an image URL.');
    }

    $maxBytes = 4 * 1024 * 1024; // 4 MB limit
    if (($file['size'] ?? 0) > $maxBytes) {
        throw new RuntimeException('Images must be 4 MB or smaller.');
    }
    if (empty($file['tmp_name']) || !is_uploaded_file($file['tmp_name'])) {
        throw new RuntimeException('The uploaded image could not be verified.');
    }

    $mime = '';
    if (class_exists('finfo')) {
        try {
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $mime = (string) $finfo->file($file['tmp_name']);
        } catch (Throwable $e) {
            $mime = '';
        }
    }
    if ($mime === '' && function_exists('mime_content_type')) {
        $mime = (string) @mime_content_type($file['tmp_name']);
    }
    if ($mime === '' && function_exists('getimagesize')) {
        $imgInfo = @getimagesize($file['tmp_name']);
        if (!empty($imgInfo['mime'])) {
            $mime = (string) $imgInfo['mime'];
        }
    }
    if ($mime === '') {
        $clientExt = strtolower(pathinfo((string) ($file['name'] ?? ''), PATHINFO_EXTENSION));
        $extMap = [
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'webp' => 'image/webp',
            'gif' => 'image/gif',
        ];
        $mime = $extMap[$clientExt] ?? '';
    }

    $extensions = [
        'image/jpeg' => 'jpg',
        'image/png' => 'png',
        'image/webp' => 'webp',
        'image/gif' => 'gif',
    ];
    if (!isset($extensions[$mime])) {
        throw new RuntimeException('Use a JPG, PNG, WEBP, or GIF image.');
    }

    $primaryDir = __DIR__ . '/public/assets/uploads/content';
    $secondaryDir = __DIR__ . '/assets/uploads/content';

    foreach ([$primaryDir, $secondaryDir] as $dir) {
        if (!is_dir($dir)) {
            @mkdir($dir, 0777, true);
        }
    }

    $filename = bin2hex(random_bytes(12)) . '.' . $extensions[$mime];
    $primaryPath = $primaryDir . '/' . $filename;
    $secondaryPath = $secondaryDir . '/' . $filename;

    if (!move_uploaded_file($file['tmp_name'], $primaryPath)) {
        if (!move_uploaded_file($file['tmp_name'], $secondaryPath)) {
            throw new RuntimeException('The uploaded image could not be saved. Check server permissions.');
        }
        @copy($secondaryPath, $primaryPath);
    } else {
        @copy($primaryPath, $secondaryPath);
    }

    @chmod($primaryPath, 0666);
    @chmod($secondaryPath, 0666);

    return '/public/assets/uploads/content/' . $filename;
}

function latestLeads(): array
{
    $stmt = db()->query('SELECT * FROM leads ORDER BY created_at DESC LIMIT 5');
    return $stmt->fetchAll();
}

function createLead(array $lead): int
{
    $stmt = db()->prepare(
        'INSERT INTO leads (name, email, phone, company, service, budget, message)
         VALUES (:name, :email, :phone, :company, :service, :budget, :message)'
    );
    $stmt->execute([
        ':name' => $lead['name'],
        ':email' => $lead['email'],
        ':phone' => $lead['phone'],
        ':company' => $lead['company'],
        ':service' => $lead['service'],
        ':budget' => $lead['budget'],
        ':message' => $lead['message'],
    ]);

    return (int) db()->lastInsertId();
}

function sendLeadNotification(array $lead, int $leadId): bool
{
    $recipient = getenv('CONTACT_NOTIFICATION_EMAIL') ?: 'pathakkavita730@gmail.com';
    $smtpHost = trim((string) (getenv('SMTP_HOST') ?: ''));
    $fromAddress = getenv('MAIL_FROM_ADDRESS')
        ?: (getenv('CONTACT_FROM_EMAIL') ?: (getenv('SMTP_USERNAME') ?: 'info@webtecmart.com'));
    $fromName = getenv('MAIL_FROM_NAME') ?: 'WebTecMart Leads';

    if (!filter_var($recipient, FILTER_VALIDATE_EMAIL) || !filter_var($fromAddress, FILTER_VALIDATE_EMAIL)) {
        error_log('Lead notification email configuration contains an invalid email address.');
        return false;
    }

    $clientName = htmlspecialchars($lead['name'] ?? 'Potential Client', ENT_QUOTES, 'UTF-8');
    $clientEmail = htmlspecialchars($lead['email'] ?? '', ENT_QUOTES, 'UTF-8');
    $clientPhone = htmlspecialchars($lead['phone'] ?? 'N/A', ENT_QUOTES, 'UTF-8');
    $clientCompany = htmlspecialchars($lead['company'] ?? 'N/A', ENT_QUOTES, 'UTF-8');
    $clientService = htmlspecialchars($lead['service'] ?? 'General Enquiry', ENT_QUOTES, 'UTF-8');
    $clientBudget = htmlspecialchars($lead['budget'] ?? 'Not specified', ENT_QUOTES, 'UTF-8');
    $clientMessage = nl2br(htmlspecialchars($lead['message'] ?? 'No message provided.', ENT_QUOTES, 'UTF-8'));
    $timestamp = date('d M Y, h:i A T');

    $isEventWebsiteDemo = strpos((string) ($lead['service'] ?? ''), 'Event Website Demo Request') === 0;
    $subject = ($isEventWebsiteDemo ? 'New Event Website Demo Request' : '⚡ New Website Enquiry')
        . ' #' . $leadId . ' - ' . ($lead['name'] ?? 'Client');

    $plainBody = implode("\r\n", [
        "========================================",
        "  NEW WEBSITE ENQUIRY #" . $leadId,
        "  WebTecMart Digital Growth Agency",
        "========================================",
        "",
        "Lead ID: #" . $leadId,
        "Received: " . $timestamp,
        "",
        "--- CLIENT DETAILS ---",
        "Name: " . ($lead['name'] ?? ''),
        "Email: " . ($lead['email'] ?? ''),
        "Phone: " . ($lead['phone'] ?? ''),
        "Company / Website: " . ($lead['company'] ?? 'N/A'),
        "Service Required: " . ($lead['service'] ?? 'General'),
        "Budget: " . ($lead['budget'] ?? 'Not specified'),
        "",
        "--- MESSAGE ---",
        $lead['message'] ?? '',
        "",
        "========================================",
        "To reply directly to this client, email: " . ($lead['email'] ?? ''),
    ]);

    $htmlBody = <<<HTML
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<style>
body { font-family: 'Segoe UI', Arial, sans-serif; background-color: #f7f3f6; margin: 0; padding: 24px; color: #2d242c; }
.card { max-width: 620px; margin: 0 auto; background: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 30px rgba(196,0,122,0.12); border: 1px solid #fce8f3; }
.header { background: linear-gradient(135deg, #A3005F, #C4007A, #E0398F); padding: 32px 28px; color: #ffffff; }
.header h1 { margin: 0 0 6px 0; font-size: 24px; font-weight: 800; }
.header p { margin: 0; font-size: 14px; opacity: 0.9; }
.badge { display: inline-block; background: rgba(255,255,255,0.22); padding: 4px 12px; border-radius: 50px; font-size: 12px; font-weight: 700; margin-bottom: 12px; }
.body { padding: 28px; }
.section-title { font-size: 13px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.08em; color: #C4007A; margin: 0 0 14px 0; border-bottom: 2px solid #fce8f3; padding-bottom: 6px; }
.info-table { width: 100%; border-collapse: collapse; margin-bottom: 22px; }
.info-table td { padding: 9px 0; vertical-align: top; font-size: 14px; line-height: 1.5; border-bottom: 1px solid #f8f1f5; }
.info-table td.label { width: 140px; font-weight: 700; color: #6b5866; }
.info-table td.val { color: #1a1519; font-weight: 500; }
.info-table td.val a { color: #C4007A; text-decoration: none; font-weight: 700; }
.msg-box { background: #fff5fa; border: 1px solid #fbcfe6; border-left: 4px solid #C4007A; border-radius: 10px; padding: 16px; font-size: 14px; line-height: 1.6; margin-bottom: 24px; color: #3d0023; }
.btn-wrap { text-align: center; margin: 24px 0 10px; }
.reply-btn { display: inline-block; background: linear-gradient(90deg, #C4007A, #E0398F); color: #ffffff !important; text-decoration: none; padding: 12px 28px; border-radius: 50px; font-weight: 700; font-size: 14px; box-shadow: 0 6px 18px rgba(196,0,122,0.35); }
.footer { background: #faf5f8; padding: 18px 28px; font-size: 12px; color: #8e7a88; text-align: center; border-top: 1px solid #fce8f3; }
</style>
</head>
<body>
<div class="card">
  <div class="header">
    <span class="badge">LEAD #{$leadId}</span>
    <h1>New Website Enquiry</h1>
    <p>A new customer submitted an enquiry on WebTecMart.</p>
  </div>
  <div class="body">
    <div class="section-title">Client Details</div>
    <table class="info-table">
      <tr><td class="label">Full Name</td><td class="val"><strong>{$clientName}</strong></td></tr>
      <tr><td class="label">Email Address</td><td class="val"><a href="mailto:{$clientEmail}">{$clientEmail}</a></td></tr>
      <tr><td class="label">Phone Number</td><td class="val"><a href="tel:{$clientPhone}">{$clientPhone}</a></td></tr>
      <tr><td class="label">Company / Site</td><td class="val">{$clientCompany}</td></tr>
      <tr><td class="label">Service</td><td class="val"><strong>{$clientService}</strong></td></tr>
      <tr><td class="label">Budget</td><td class="val">{$clientBudget}</td></tr>
      <tr><td class="label">Received At</td><td class="val">{$timestamp}</td></tr>
    </table>
    
    <div class="section-title">Client Message</div>
    <div class="msg-box">{$clientMessage}</div>
    
    <div class="btn-wrap">
      <a class="reply-btn" href="mailto:{$clientEmail}?subject=Re: Your enquiry at WebTecMart (#{$leadId})">Reply to {$clientName} &rarr;</a>
    </div>
  </div>
  <div class="footer">
    WebTecMart Digital Growth Agency &bull; <a href="https://webtecmart.com" style="color:#C4007A;">webtecmart.com</a> &bull; Saved to SQLite Leads
  </div>
</div>
</body>
</html>
HTML;

    // Log email to storage/mail.log for tracking and audit
    $logDir = __DIR__ . '/storage';
    if (is_dir($logDir)) {
        $logEntry = "[" . date('Y-m-d H:i:s') . "] LEAD #{$leadId} TO: {$recipient} | FROM: {$lead['email']} | NAME: {$lead['name']}\n";
        file_put_contents($logDir . '/mail.log', $logEntry, FILE_APPEND);
    }

    $emailSent = false;

    // 1. Try PHPMailer if SMTP or autoload exists
    $autoload = __DIR__ . '/vendor/autoload.php';
    if (is_file($autoload)) {
        require_once $autoload;
        if (class_exists(\PHPMailer\PHPMailer\PHPMailer::class)) {
            try {
                $mailer = new \PHPMailer\PHPMailer\PHPMailer(true);
                $mailer->CharSet = 'UTF-8';
                
                if ($smtpHost !== '') {
                    $mailer->isSMTP();
                    $mailer->Host = $smtpHost;
                    $mailer->Port = (int) (getenv('SMTP_PORT') ?: 587);
                    $mailer->SMTPAuth = (getenv('SMTP_USERNAME') ?: '') !== '';
                    if ($mailer->SMTPAuth) {
                        $mailer->Username = (string) getenv('SMTP_USERNAME');
                        $mailer->Password = (string) (getenv('SMTP_PASSWORD') ?: '');
                    }
                    $encryption = strtolower((string) (getenv('SMTP_ENCRYPTION') ?: 'tls'));
                    if ($encryption === 'tls') {
                        $mailer->SMTPSecure = \PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
                    } elseif ($encryption === 'ssl') {
                        $mailer->SMTPSecure = \PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS;
                    }
                } else {
                    $mailer->isMail();
                }

                $mailer->setFrom($fromAddress, $fromName);
                $mailer->addAddress($recipient);
                $mailer->addReplyTo($lead['email'], $lead['name'] ?? '');
                $mailer->isHTML(true);
                $mailer->Subject = $subject;
                $mailer->Body = $htmlBody;
                $mailer->AltBody = $plainBody;

                $emailSent = $mailer->send();
            } catch (\Throwable $error) {
                error_log('PHPMailer lead notification failed: ' . $error->getMessage());
                $emailSent = false;
            }
        }
    }

    // 2. Fallback to native mail() if PHPMailer didn't succeed
    if (!$emailSent) {
        $boundary = md5((string) time());
        $headers = [
            'From: ' . $fromName . ' <' . $fromAddress . '>',
            'Reply-To: ' . ($lead['name'] ?? '') . ' <' . $lead['email'] . '>',
            'MIME-Version: 1.0',
            'Content-Type: multipart/alternative; boundary="' . $boundary . '"',
            'X-Mailer: WebTecMart PHP/' . phpversion(),
        ];
        
        $multipartBody = "--" . $boundary . "\r\n" .
            "Content-Type: text/plain; charset=UTF-8\r\n\r\n" .
            $plainBody . "\r\n\r\n" .
            "--" . $boundary . "\r\n" .
            "Content-Type: text/html; charset=UTF-8\r\n\r\n" .
            $htmlBody . "\r\n\r\n" .
            "--" . $boundary . "--";

        $emailSent = @mail($recipient, $subject, $multipartBody, implode("\r\n", $headers));
    }

    // In local development or if mail delivery is unconfigured on server,
    // consider saved if logged so lead process succeeds and user sees confirmation
    if (!$emailSent && ($smtpHost === '' || $smtpHost === 'mail.your-domain.com')) {
        // Log that email notification was simulated/logged locally
        if (is_dir($logDir)) {
            file_put_contents($logDir . '/mail.log', "  -> Notice: SMTP not yet configured in .env. Notification logged successfully to SQLite and mail.log.\n", FILE_APPEND);
        }
        return true;
    }

    return (bool) $emailSent;
}