<?php
require_once __DIR__ . '/config.php';

function serviceCards(): array
{
    $defaults = [
        [
            'title' => 'SEO Growth',
            'summary' => 'Rank higher on Google and bring ready-to-buy traffic that converts.',
            'icon' => '📈',
            'href' => '/search-engine-optimization.php',
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
            'title' => 'Autumn fair 2026',
            'industry' => 'Local Business',
            'flag' => '🇦🇪',
            'country' => 'UAE',
            'duration' => '4 Months',
            'result' => 'Top 3 Rankings',
            'description' => 'India is a trusted global sourcing partner, with the 62nd IHGF Delhi Autumn Fair 2026 serving as a one-stop sourcing destination.',
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
                ['text' => 'Autumn Fair 2026', 'top' => true],
                ['text' => 'Autumn Fair Dates 2026', 'top' => true],
                ['text' => 'Autumn Fair Asia 2026'],
                ['text' => 'Autumn Sourcing Fair 2026'],
            ],
        ],
    ];

    return cmsContent('success_story', $defaults);
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
    foreach ($posts as $index => &$post) {
        $post = array_merge($defaults[$index] ?? [], $post);
    }
    unset($post);
    $postIds = db()->query("SELECT id FROM content_items WHERE content_type = 'blog' AND is_active = 1 ORDER BY sort_order ASC, id ASC")->fetchAll(PDO::FETCH_COLUMN);
    foreach ($posts as $index => &$post) {
        if (isset($postIds[$index])) $post['id'] = (int) $postIds[$index];
    }
    unset($post);
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
    foreach ($content['services'] as $index => &$service) {
        $service = array_merge($defaults['services'][$index] ?? ['number' => sprintf('%02d', $index + 1), 'icon' => 'globe', 'title' => '', 'text' => '', 'href' => '/search-engine-optimization.php'], is_array($service) ? $service : []);
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
            ['icon' => 'search', 'title' => 'Search Engine Optimization', 'description' => '75% of online users refer to the search engines\' first page. Hence, it has become essential for businesses to be on the very first page. We help you rank higher on search.', 'features' => ['On-Page SEO', 'Off-Page SEO', 'Technical SEO', 'Keyword Research']],
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
    if (($file['error'] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_NO_FILE) {
        return '';
    }

    if (($file['error'] ?? UPLOAD_ERR_OK) !== UPLOAD_ERR_OK) {
        throw new RuntimeException('The image upload failed. Please try again.');
    }
    if (($file['size'] ?? 0) > 5 * 1024 * 1024) {
        throw new RuntimeException('Images must be 5 MB or smaller.');
    }
    if (empty($file['tmp_name']) || !is_uploaded_file($file['tmp_name'])) {
        throw new RuntimeException('The uploaded image could not be verified.');
    }

    $mime = (new finfo(FILEINFO_MIME_TYPE))->file($file['tmp_name']);
    $extensions = [
        'image/jpeg' => 'jpg',
        'image/png' => 'png',
        'image/webp' => 'webp',
        'image/gif' => 'gif',
    ];
    if (!isset($extensions[$mime])) {
        throw new RuntimeException('Use a JPG, PNG, WEBP, or GIF image.');
    }

    $directory = __DIR__ . '/public/assets/uploads/content';
    if (!is_dir($directory)) {
        if (!mkdir($directory, 0755, true) && !is_dir($directory)) {
            throw new RuntimeException('The image upload directory is not available.');
        }
    }

    $filename = bin2hex(random_bytes(12)) . '.' . $extensions[$mime];
    if (!move_uploaded_file($file['tmp_name'], $directory . '/' . $filename)) {
        throw new RuntimeException('The uploaded image could not be saved.');
    }

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
    if (!filter_var($recipient, FILTER_VALIDATE_EMAIL) || !filter_var($fromAddress, FILTER_VALIDATE_EMAIL)) {
        error_log('Lead notification email configuration contains an invalid email address.');
        return false;
    }

    $subject = 'New website enquiry #' . $leadId;
    $body = implode("\r\n", [
        'A new enquiry was saved on the WebTecMart website.',
        '',
        'Name: ' . $lead['name'],
        'Email: ' . $lead['email'],
        'Phone: ' . $lead['phone'],
        'Company / Website: ' . $lead['company'],
        'Service: ' . $lead['service'],
        'Budget: ' . $lead['budget'],
        '',
        'Message:',
        $lead['message'],
    ]);

    if ($smtpHost !== '') {
        $autoload = __DIR__ . '/vendor/autoload.php';
        if (!is_file($autoload)) {
            error_log('Lead notification email could not be sent: Composer dependencies are not installed.');
            return false;
        }

        require_once $autoload;
        if (!class_exists(\PHPMailer\PHPMailer\PHPMailer::class)) {
            error_log('Lead notification email could not be sent: PHPMailer is unavailable.');
            return false;
        }

        try {
            $mailer = new \PHPMailer\PHPMailer\PHPMailer(true);
            $mailer->CharSet = 'UTF-8';
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
            } elseif ($encryption !== '' && $encryption !== 'none') {
                error_log('Lead notification email could not be sent: SMTP_ENCRYPTION must be tls, ssl, or none.');
                return false;
            }

            $mailer->setFrom($fromAddress, getenv('MAIL_FROM_NAME') ?: 'WebTecMart');
            $mailer->addAddress($recipient);
            $mailer->addReplyTo($lead['email'], $lead['name']);
            $mailer->Subject = $subject;
            $mailer->Body = $body;

            return $mailer->send();
        } catch (\PHPMailer\PHPMailer\Exception $error) {
            error_log('Lead notification email failed: ' . $error->getMessage());
            return false;
        }
    }

    $headers = [
        'From' => 'WebTecMart <' . $fromAddress . '>',
        'Reply-To' => $lead['email'],
        'Content-Type' => 'text/plain; charset=UTF-8',
    ];

    return mail($recipient, $subject, $body, $headers);
}