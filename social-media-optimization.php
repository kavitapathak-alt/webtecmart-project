<?php
require_once __DIR__ . '/../app/templates/header.php';
require_once __DIR__ . '/../app/templates/service-page-layout.php';

renderServicePageLayout([
    'icon' => 'share',
    'title' => 'Social Media Optimization',
    'tagline' => 'Turn Followers Into Fans',
    'heroDescription' => 'Creative social campaigns that grow communities, boost engagement, and keep your brand in the conversation — across every platform your audience actually uses.',
    'overview' => "Audiences today are looking for content that speaks to them — not just another post in their feed. Social media has become the first place people discover, research, and judge brands. At WebTechMart, we create engaging, innovative social media campaigns that keep your brand part of the conversation and your audience coming back for more. Over the last 13 years, we've helped 500+ brands build thriving social communities — combining scroll-stopping content, smart paid amplification, and data-driven optimization. Whether you're a local business building a loyal following or a national brand scaling engagement, we build SMO strategies that turn followers into fans and fans into customers.",

    'features' => [
        [
            'title' => 'Content Creation',
            'description' => 'Scroll-stopping visuals, reels, carousels, and posts — designed to match your brand voice and stop the scroll.',
        ],
        [
            'title' => 'Community Management',
            'description' => 'We reply, engage, and build real relationships — turning casual followers into loyal brand advocates.',
        ],
        [
            'title' => 'Paid Social Advertising',
            'description' => 'Targeted ad campaigns on Instagram, Facebook, LinkedIn, and more — built to reach the right audience at the right moment.',
        ],
        [
            'title' => 'Social Media Strategy',
            'description' => 'Channel-by-channel strategy backed by audience research, competitor analysis, and platform-specific best practices.',
        ],
        [
            'title' => 'Influencer Collaborations',
            'description' => 'Identify and partner with the right creators to expand reach and build trust with your target audience.',
        ],
        [
            'title' => 'Analytics & Reporting',
            'description' => "Clear monthly reporting on reach, engagement, follower growth, and conversions — so you always know what's working.",
        ],
    ],

    'process' => [
        ['step' => '01', 'title' => 'Audit',    'description' => "We review your current social presence, competitors, and audience to identify what's working and where the gaps are."],
        ['step' => '02', 'title' => 'Strategy', 'description' => 'We build a tailored content calendar, channel plan, tone of voice, and posting schedule aligned with your goals.'],
        ['step' => '03', 'title' => 'Create',   'description' => 'Design, copywriting, and creative production — every post, reel, and story crafted to match your brand.'],
        ['step' => '04', 'title' => 'Publish',  'description' => 'We post at optimal times across all channels, manage engagement, and reply to comments and DMs daily.'],
        ['step' => '05', 'title' => 'Amplify',  'description' => 'We boost top-performing posts with paid ads and run targeted campaigns to expand reach and drive conversions.'],
        ['step' => '06', 'title' => 'Optimize', 'description' => 'Monthly reviews and A/B testing — we use data to improve content, timing, and ad spend every single month.'],
    ],

    'faqs' => [
        [
            'q' => 'Which social media platforms do you handle?',
            'a' => 'Instagram, Facebook, LinkedIn, Twitter/X, YouTube, Pinterest, and Threads. We recommend the platforms based on where your target audience actually spends time — not just the popular ones.',
        ],
        [
            'q' => 'Do you create all the content?',
            'a' => 'Yes — content design, captions, hashtags, reels scripting, story templates, and everything in between. You just approve and we publish.',
        ],
        [
            'q' => 'How often will you post?',
            'a' => "It depends on your plan — typically 12–20 posts per month per platform, plus daily stories. We build a content calendar upfront so you always know what's coming.",
        ],
        [
            'q' => 'How long until I see results?',
            'a' => 'Engagement and follower growth typically start showing within 4–6 weeks with consistent posting. Meaningful conversion impact usually takes 2–3 months as your audience warms up.',
        ],
        [
            'q' => 'Do you also run paid social ads?',
            'a' => 'Yes — we handle both organic and paid. We boost high-performing posts and build full-funnel ad campaigns on Meta, LinkedIn, and YouTube depending on your goals.',
        ],
        [
            'q' => 'How do you measure success?',
            'a' => 'We track reach, engagement rate, follower growth, website clicks, leads, and sales — tied to the specific KPIs we set with you in the strategy phase. No vanity metrics, only numbers that matter.',
        ],
    ],
]);

require_once __DIR__ . '/../app/templates/footer.php';