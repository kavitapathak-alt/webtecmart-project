<?php
$pageMeta = [
    'title' => 'Content Marketing Services | Strategic Growth - WebTecMart',
    'description' => 'Build brand authority and drive organic customer demand with WebTecMart content marketing services. Editorial strategies, SEO blogs, case studies, and conversion funnels.',
];
require_once __DIR__ . '/app/templates/header.php';
require_once __DIR__ . '/app/templates/service-page-layout.php';

renderServicePageLayout([
    'icon' => 'sparkles',
    'title' => 'Content Marketing Services',
    'tagline' => 'Create Content That Educates, Ranks, and Converts',
    'heroDescription' => 'High-impact content marketing systems tailored to your industry. We craft SEO-driven blog posts, thought leadership articles, case studies, whitepapers, and lead magnets that establish your brand as the undisputed authority in your niche.',
    'overview' => "Content is the engine that powers every modern marketing channel — from organic search and social media to email nurturing and paid ad landing pages. However, publishing generic, uninspired articles with no keyword strategy or distribution plan wastes both time and money. Real content marketing bridges the gap between what your audience is searching for and the solutions your business delivers.

At WebTecMart, we design data-driven editorial calendars that target every stage of the buyer journey: Top-of-Funnel (awareness & problem identification), Middle-of-Funnel (evaluation & comparison guides), and Bottom-of-Funnel (decision-making case studies and buying frameworks). Over the past 13+ years, our content strategists and subject-matter writers have developed thousands of engaging articles, guides, and lead assets that have attracted millions of organic readers and generated qualified business inquiries.",

    'features' => [
        [
            'title' => 'Content Strategy & Editorial Roadmaps',
            'description' => 'Audience persona research, competitor content gap analysis, topic cluster planning, and a structured monthly editorial publication calendar.',
        ],
        [
            'title' => 'SEO-Optimized Blog & Article Writing',
            'description' => 'In-depth, thoroughly researched articles written by experienced writers, optimized for target keywords, user intent, and readability.',
        ],
        [
            'title' => 'B2B Case Studies & Whitepapers',
            'description' => 'High-converting client success stories, research whitepapers, and industry reports that showcase your capabilities and convince decision-makers.',
        ],
        [
            'title' => 'Lead Magnets & Downloadable Assets',
            'description' => 'Conversion-focused eBooks, checklists, templates, and toolkits designed to capture verified email addresses and grow your sales pipeline.',
        ],
        [
            'title' => 'Content Refresh & Optimization',
            'description' => 'Audit and revitalize your existing underperforming blog posts and web pages to reclaim lost rankings and boost organic CTR.',
        ],
        [
            'title' => 'Multi-Channel Distribution',
            'description' => 'Repurpose flagship long-form content into engaging LinkedIn carousels, social posts, email newsletters, and guest publication pitches.',
        ],
    ],

    'process' => [
        ['step' => '01', 'title' => 'Audience & Search Research', 'description' => 'We uncover the pain points, questions, and search habits of your ideal customer personas.'],
        ['step' => '02', 'title' => 'Topic Cluster Strategy', 'description' => 'We organize high-authority topic clusters and pillar pages designed to build topical authority with Google.'],
        ['step' => '03', 'title' => 'Research & Creation', 'description' => 'Our professional writers produce engaging, original content with custom visuals, data points, and expert insights.'],
        ['step' => '04', 'title' => 'SEO & Editorial Polish', 'description' => 'Rigorous editorial review, fact-checking, keyword optimization, internal linking, and meta tag formatting.'],
        ['step' => '05', 'title' => 'Publishing & Amplification', 'description' => 'We format and publish content on your CMS and distribute across social, email, and partner channels.'],
        ['step' => '06', 'title' => 'Performance Measurement', 'description' => 'Track page views, time on page, keyword rankings, organic backlinks earned, and lead form submissions.'],
    ],

    'faqs' => [
        [
            'q' => 'How does content marketing help my business generate leads?',
            'a' => 'By answering your target customers’ specific questions when they are researching solutions, content marketing positions your company as a trusted advisor. Strategically placed calls-to-action, lead magnets, and case studies guide those readers into booking consultations or requesting quotes.',
        ],
        [
            'q' => 'Who writes the content at WebTecMart?',
            'a' => 'Our content is created by seasoned industry copywriters, digital marketing specialists, and professional editors. We conduct thorough research and can work with your internal subject matter experts to capture your authentic brand voice.',
        ],
        [
            'q' => 'How often should a business publish new content?',
            'a' => 'Quality and relevance always triumph over quantity. For most businesses, publishing 2 to 4 comprehensive, well-researched articles per month produces far better search rankings and lead flow than daily low-quality posts.',
        ],
        [
            'q' => 'Do you provide graphics and images for the content?',
            'a' => 'Yes. Every article includes custom header graphics, illustrative diagrams, formatted tables, and optimized images to maximize user engagement and social sharing.',
        ],
    ],
]);

require_once __DIR__ . '/app/templates/footer.php';
