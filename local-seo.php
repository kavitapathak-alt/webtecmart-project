<?php
$pageMeta = [
    'title' => 'Local SEO Services | Dominate Google Maps & 3-Pack - WebTecMart',
    'description' => 'Drive local customers and phone calls with WebTecMart Local SEO services. Google Business Profile optimization, local citations, map rankings, and reviews.',
];
require_once __DIR__ . '/app/templates/header.php';
require_once __DIR__ . '/app/templates/service-page-layout.php';

require_once __DIR__ . '/functions.php';
$dbService = getServiceBySlug('local-seo');

$serviceData = [
    'icon' => 'mappin',
    'title' => 'Local SEO Services',
    'tagline' => 'Be Discovered When Nearby Customers Search for Your Services',
    'heroDescription' => 'Rank in the coveted Google Map 3-Pack and capture high-intent local buyers in your city, district, and surrounding neighborhoods looking for your services right now.',
    'overview' => "Over 46% of all Google searches have local commercial intent, and nearly 80% of local mobile searches result in an offline purchase or phone call within 24 hours. When nearby customers search for 'best service near me' or your service category in their city, showing up in the Google Local 3-Pack is the difference between an overflowing appointment calendar and an empty shop.

At WebTecMart, we implement comprehensive local search growth campaigns. We optimize your Google Business Profile (GBP), ensure 100% NAP (Name, Address, Phone) consistency across hundreds of Indian and global directories, build localized landing pages, manage review generation systems, and acquire geographically relevant local backlinks. Over the last 13+ years, our local SEO specialists have helped clinics, retail outlets, legal practices, real estate firms, restaurants, and service providers turn local search into their #1 source of calls and walk-in customers.",

    'features' => [
        [
            'title' => 'Google Business Profile (GBP) Optimization',
            'description' => 'Complete profile setup, category selection, service menu enrichment, geo-tagged photo uploads, and weekly posts to maximize local visibility.',
        ],
        [
            'title' => 'Local Map Pack (3-Pack) Ranking',
            'description' => 'Strategic proximity optimization and location authority signals engineered to place your business in the top 3 Google Maps results.',
        ],
        [
            'title' => 'Local Directory & Citation Building',
            'description' => 'Submit and synchronize accurate NAP details across verified Indian business directories including Justdial, Sulekha, IndiaMart, and YellowPages.',
        ],
        [
            'title' => 'Geo-Targeted Service Landing Pages',
            'description' => 'Create high-converting landing pages tailored to specific cities, neighborhoods, and service areas with LocalBusiness schema markup.',
        ],
        [
            'title' => 'Review Generation & Reputation Management',
            'description' => 'Automated customer review request workflows and guidance on handling customer feedback to establish 5-star trust.',
        ],
        [
            'title' => 'Local Competitor Reverse-Engineering',
            'description' => 'Analyze top-ranking competitors in your exact pin code to systematically outrank them for high-value localized searches.',
        ],
    ],

    'process' => [
        ['step' => '01', 'title' => 'Local Presence Audit', 'description' => 'We audit your GBP profile health, existing directory citations, duplicate listings, and local competitor ranking signals.'],
        ['step' => '02', 'title' => 'GBP Profile Enhancement', 'description' => 'Optimize business categories, business descriptions, operational hours, services, and upload high-resolution geo-tagged images.'],
        ['step' => '03', 'title' => 'Citation Cleanup & Sync', 'description' => 'Fix inconsistent addresses or phone numbers across the web to build strong algorithmic trust with Google.'],
        ['step' => '04', 'title' => 'Local Content & Schema', 'description' => 'Deploy LocalBusiness and GeoCoordinates structured data and publish localized service pages targeting your key areas.'],
        ['step' => '05', 'title' => 'Review Systems & Local Links', 'description' => 'Implement review collection workflows and acquire local backlinks from community portals, sponsorships, and local press.'],
        ['step' => '06', 'title' => 'Monthly Call & Lead Tracking', 'description' => 'Track Google Maps calls, direction requests, website clicks, and keyword positions with transparent monthly reporting.'],
    ],

    'faqs' => [
        [
            'q' => 'What is the Google Local 3-Pack?',
            'a' => 'The Google 3-Pack is the prominent block of three business listings displayed alongside a map at the very top of Google search results for local queries. Securing a spot here drives up to 70% of all local phone calls and clicks.',
        ],
        [
            'q' => 'Can you help if our business serves multiple cities or branches?',
            'a' => 'Yes. We specialize in multi-location local SEO. We optimize individual GBP listings for each branch or location, create dedicated location pages on your website, and build localized citation portfolios for each territory.',
        ],
        [
            'q' => 'How important are Google reviews for local rankings?',
            'a' => 'Customer reviews are one of the strongest ranking factors for the Google Map Pack. Regular, positive reviews containing keywords related to your services significantly boost your visibility and conversion rate.',
        ],
        [
            'q' => 'How soon can we expect more phone calls and visits?',
            'a' => 'After completing initial GBP optimization, citation synchronization, and photo updates, businesses often see noticeable increases in calls, direction requests, and map impressions within 30 to 60 days.',
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
