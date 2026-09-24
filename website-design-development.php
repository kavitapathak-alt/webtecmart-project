<?php
require_once __DIR__ . '/../app/templates/header.php';
require_once __DIR__ . '/../app/templates/service-page-layout.php';

renderServicePageLayout([
    'icon' => 'layout',
    'title' => 'Website Design & Development',
    'tagline' => 'Websites That Convert',
    'heroDescription' => 'Fast, responsive, and beautifully designed websites built to turn visitors into customers — with clean code, sharp UX, and a design that reflects your brand.',
    'overview' => "First impressions matter online, and we help make yours memorable and robust. Your website is often the first interaction a customer has with your business — and it takes less than 3 seconds to form an opinion. At WebTechMart, we build responsive, easy-to-use websites that work as hard as you do. Over the last 13 years, we've designed and developed 1000+ websites — from sleek business sites to complex e-commerce stores — combining custom design, performance-optimized code, and SEO-friendly architecture. Whether you're launching your first website or rebuilding an outdated one, we deliver sites that look stunning, load fast, and drive real business results.",

    'features' => [
        [
            'title' => 'Custom Design',
            'description' => 'No templates — every website is designed around your brand, your audience, and your goals. Pixel-perfect and uniquely yours.',
        ],
        [
            'title' => 'Responsive Development',
            'description' => 'Looks perfect on mobile, tablet, and desktop. Fully responsive code that adapts to every screen size and device.',
        ],
        [
            'title' => 'E-Commerce Solutions',
            'description' => 'Secure online stores with payment gateway integration, inventory management, and smooth checkout flows.',
        ],
        [
            'title' => 'CMS Integration',
            'description' => 'Easily update content yourself with WordPress, Sanity, or headless CMS — no developer needed for everyday changes.',
        ],
        [
            'title' => 'SEO-Friendly Architecture',
            'description' => 'Clean semantic code, fast load times, structured data, and technical SEO built-in from day one — not bolted on later.',
        ],
        [
            'title' => 'Performance & Security',
            'description' => 'Speed-optimized builds, SSL setup, secure hosting, and ongoing maintenance to keep your site fast, safe, and always up.',
        ],
    ],

    'process' => [
        ['step' => '01', 'title' => 'Discovery',          'description' => 'We learn your business, audience, competitors, and goals — so the website is built around strategy, not just aesthetics.'],
        ['step' => '02', 'title' => 'Wireframe',          'description' => 'We plan the structure, user journey, and content hierarchy of your site before any design begins.'],
        ['step' => '03', 'title' => 'UI Design',          'description' => 'Pixel-perfect designs tailored to your brand — typography, colors, imagery, and interactions that feel right.'],
        ['step' => '04', 'title' => 'Development',        'description' => 'Clean, fast, and SEO-friendly code — built in Next.js, WordPress, or your preferred stack.'],
        ['step' => '05', 'title' => 'Testing',            'description' => 'Rigorous QA across browsers, devices, and screen sizes — plus speed, accessibility, and security checks.'],
        ['step' => '06', 'title' => 'Launch & Support',   'description' => 'Smooth deployment, post-launch monitoring, and ongoing support — because launch day is just the beginning.'],
    ],

    'faqs' => [
        [
            'q' => 'How long does a website take to build?',
            'a' => 'Most business websites are delivered in 4–8 weeks. Larger e-commerce stores or custom web apps typically take 10–16 weeks depending on complexity and integrations.',
        ],
        [
            'q' => 'Will my site be mobile-friendly?',
            'a' => 'Absolutely — every site we build is fully responsive and tested across all major devices, browsers, and screen sizes. Mobile-first is our default approach.',
        ],
        [
            'q' => 'Do you use templates or custom design?',
            'a' => "Always custom. We don't use pre-built templates. Every website is designed from scratch around your brand, goals, and target audience — so it stands out and performs.",
        ],
        [
            'q' => 'Will I be able to update the website myself?',
            'a' => 'Yes — we build with easy-to-use CMS platforms (WordPress, Sanity, or headless CMS) so you can update content, images, and pages without touching a line of code.',
        ],
        [
            'q' => 'Do you provide hosting and domain setup?',
            'a' => 'Yes — we handle domain registration, hosting setup, SSL certificates, and DNS configuration. We also offer managed hosting plans with ongoing maintenance.',
        ],
        [
            'q' => 'What about SEO and speed?',
            'a' => 'Every site we build follows SEO best practices — clean semantic HTML, fast load times, mobile responsiveness, structured data, and optimized images. We also offer dedicated SEO services for ongoing growth.',
        ],
    ],
]);

require_once __DIR__ . '/../app/templates/footer.php';