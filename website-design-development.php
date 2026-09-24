<?php

require_once __DIR__ . '/../app/templates/header.php';
require_once __DIR__ . '/../app/templates/service-page-layout.php';

renderServicePageLayout([
    'icon' => 'layout',

    'title' => 'Website Design & Development',

    'tagline' => 'Websites That Convert',

    'heroDescription' => 'High-performance, conversion-focused websites designed to strengthen your online presence, engage your audience, and turn visitors into customers with WebTecMart.',

    'overview' => "Your website is the foundation of your digital presence — and we help make it work harder for your business. At WebTecMart, we design and develop responsive, user-friendly, SEO-ready websites that are built to attract visitors, build trust, and generate results. With 13+ years of experience and 1000+ websites delivered, our team combines creative design, performance-focused development, and digital marketing expertise to create websites that support your business growth. Whether you're launching a new website or upgrading an existing one, WebTecMart delivers digital experiences built around your brand, audience, and business goals.",

    'features' => [

        [
            'title' => 'Custom Design',
            'description' => 'No templates — every website is designed around your brand, your audience, and your goals. WebTecMart creates unique, conversion-focused designs that strengthen your digital presence.',
        ],

        [
            'title' => 'Responsive Development',
            'description' => 'Fast, responsive websites that deliver a seamless experience across mobile, tablet, and desktop while keeping users engaged.',
        ],

        [
            'title' => 'E-Commerce Solutions',
            'description' => 'Conversion-focused online stores with secure payment integration, product management, smooth checkout experiences, and scalable functionality.',
        ],

        [
            'title' => 'CMS Integration',
            'description' => 'Easy-to-manage CMS solutions that let your team update pages, content, images, and products without depending on a developer.',
        ],

        [
            'title' => 'SEO-Friendly Architecture',
            'description' => 'SEO-ready website architecture with clean code, optimized content structure, fast loading speeds, mobile responsiveness, and technical SEO best practices.',
        ],

        [
            'title' => 'Performance & Security',
            'description' => 'Optimized websites built for speed, security, reliability, and a smooth user experience that supports your digital marketing goals.',
        ],
    ],

    'process' => [

        [
            'step' => '01',
            'title' => 'Discovery',
            'description' => 'We understand your business, target audience, competitors, market, and digital marketing goals before planning your website.',
        ],

        [
            'step' => '02',
            'title' => 'Strategy & Wireframe',
            'description' => 'We plan the website structure, user journey, content hierarchy, and conversion points to create a strong foundation for your online presence.',
        ],

        [
            'step' => '03',
            'title' => 'UI Design',
            'description' => 'Our team creates a modern, engaging interface that reflects your brand identity while keeping usability and conversions at the center.',
        ],

        [
            'step' => '04',
            'title' => 'Development',
            'description' => 'We develop fast, scalable, secure, and SEO-friendly websites using the technology and CMS best suited to your business requirements.',
        ],

        [
            'step' => '05',
            'title' => 'Testing & Optimization',
            'description' => 'We test your website across browsers and devices while checking performance, responsiveness, accessibility, security, and SEO fundamentals.',
        ],

        [
            'step' => '06',
            'title' => 'Launch & Digital Growth',
            'description' => 'After a smooth launch, we help you maintain, optimize, and grow your website through ongoing digital marketing, SEO, and performance improvements.',
        ],
    ],

    'faqs' => [

        [
            'q' => 'How long does a website take to build?',
            'a' => 'Most business websites are delivered in 4–8 weeks. Larger e-commerce websites and custom web applications may take 10–16 weeks depending on the project scope, functionality, and integrations.',
        ],

        [
            'q' => 'Will my website be mobile-friendly?',
            'a' => 'Absolutely. Every website we build is fully responsive and optimized for mobile, tablet, and desktop devices. We focus on delivering a consistent and user-friendly experience across screen sizes.',
        ],

        [
            'q' => 'Do you use templates or create custom websites?',
            'a' => 'We create websites around your business requirements, brand identity, target audience, and marketing goals. Our approach focuses on creating a unique digital presence rather than simply relying on generic templates.',
        ],

        [
            'q' => 'Will I be able to update the website myself?',
            'a' => 'Yes. We can integrate easy-to-use CMS platforms such as WordPress, Sanity, or other suitable solutions so your team can manage content, images, pages, and products without technical expertise.',
        ],

        [
            'q' => 'Do you provide hosting and domain setup?',
            'a' => 'Yes. WebTecMart can assist with domain configuration, hosting setup, SSL certificates, DNS configuration, deployment, and ongoing website maintenance.',
        ],

        [
            'q' => 'Will my website be optimized for SEO?',
            'a' => 'Yes. We build websites with SEO fundamentals in mind, including clean structure, fast loading times, mobile responsiveness, optimized images, semantic HTML, metadata, and technical SEO best practices. We also provide dedicated SEO and digital marketing services for long-term growth.',
        ],

        [
            'q' => 'Can you help generate leads through my website?',
            'a' => 'Yes. We design websites with conversion and lead generation in mind. This can include strategically placed calls-to-action, contact forms, landing pages, WhatsApp integration, lead tracking, analytics, and other marketing integrations.',
        ],

        [
            'q' => 'Can WebTecMart manage my digital marketing after the website launch?',
            'a' => 'Yes. WebTecMart provides digital marketing services including SEO, search engine marketing, social media marketing, content marketing, branding, and other digital growth solutions to help businesses build and grow their online presence.',
        ],
    ],
]);

require_once __DIR__ . '/../app/templates/footer.php';