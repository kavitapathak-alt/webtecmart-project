<?php
$pageMeta = [
    'title' => 'Mobile App Development Services | iOS & Android Apps - WebTecMart',
    'description' => 'Build scalable, secure, and user-centric iOS and Android apps with WebTecMart. Flutter, React Native, Native Swift, Kotlin, and enterprise backend engineering.',
];
require_once __DIR__ . '/app/templates/header.php';
require_once __DIR__ . '/app/templates/service-page-layout.php';

require_once __DIR__ . '/functions.php';
$dbService = getServiceBySlug('mobile-app-development');

$serviceData = [
    'icon' => 'smartphone',
    'title' => 'Mobile App Development',
    'tagline' => 'High-Performance iOS & Android Apps Built for Scale',
    'heroDescription' => 'Turn your business vision into an engaging, intuitive mobile application. We build native iOS, Android, and cross-platform Flutter/React Native apps designed for speed, security, and maximum user retention.',
    'overview' => "Mobile devices now account for over 65% of all digital interactions. A poorly architected mobile app costs your business valuable customer trust and revenue. At WebTecMart, we design and engineer scalable mobile applications that users love to open every single day.

From early-stage MVP prototypes to enterprise-grade mobile platforms, our in-house engineering team leverages clean architecture, secure cloud backends, and intuitive UI/UX design. With 13+ years of technical excellence, we help startups, D2C brands, and established enterprises launch high-rating apps across the Apple App Store and Google Play Store.",

    'features' => [
        [
            'title' => 'iOS App Development',
            'description' => 'Native iOS applications built with Swift and SwiftUI, fully optimized for iPhones, iPads, and Apple ecosystem standards.',
        ],
        [
            'title' => 'Android App Development',
            'description' => 'High-performance native Android apps built with Kotlin, engineered to run smoothly across diverse screen sizes and hardware specifications.',
        ],
        [
            'title' => 'Cross-Platform Apps (Flutter & React Native)',
            'description' => 'Single-codebase mobile applications that deliver native performance on both iOS and Android, cutting development timelines and cost.',
        ],
        [
            'title' => 'UI/UX Mobile Design',
            'description' => 'Intuitive user journeys, touch-friendly interfaces, and modern micro-interactions designed to reduce churn and maximize session time.',
        ],
        [
            'title' => 'Backend APIs & Cloud Integration',
            'description' => 'Scalable REST/GraphQL APIs, real-time database synchronization, push notification systems, and secure cloud infrastructure on AWS/Firebase.',
        ],
        [
            'title' => 'App Store Optimization (ASO) & Launch',
            'description' => 'End-to-end management of Apple App Store and Google Play Store approvals, guidelines compliance, and initial organic store rankings.',
        ],
    ],

    'process' => [
        ['step' => '01', 'title' => 'Product Discovery', 'description' => 'We define user personas, feature scopes, technical feasibility, and business monetization goals before writing a single line of code.'],
        ['step' => '02', 'title' => 'UI/UX Prototyping', 'description' => 'We design clickable interactive Figma prototypes so you can experience user flows and validate interactions before development.'],
        ['step' => '03', 'title' => 'Agile Development', 'description' => 'Our developers code in 2-week sprints with milestone demos, maintaining clean modular architecture, unit tests, and secure API links.'],
        ['step' => '04', 'title' => 'Rigorous QA & Testing', 'description' => 'Automated and manual testing across 30+ real iOS and Android devices, ensuring zero crashes, fast load speeds, and battery efficiency.'],
        ['step' => '05', 'title' => 'Store Deployment', 'description' => 'We handle Apple App Store and Google Play Store submission, compliance checks, privacy disclosures, and smooth public releases.'],
        ['step' => '06', 'title' => 'Maintenance & Growth', 'description' => 'Ongoing OS update compatibility, bug fixes, feature iterations, analytics tracking, and continuous app performance enhancements.'],
    ],

    'faqs' => [
        [
            'q' => 'How much does it cost to build a mobile app?',
            'a' => 'Mobile app development cost depends on scope, complexity, and platforms. Basic applications typically start around ₹45,000–₹85,000, while complex custom platforms with custom APIs and payment gateways range higher based on feature specifications.',
        ],
        [
            'q' => 'Should I build a native app or cross-platform (Flutter/React Native)?',
            'a' => 'Cross-platform development with Flutter or React Native is ideal for 85% of businesses because it allows simultaneous launch on iOS and Android with a single codebase, saving 40% time and cost. We recommend Native (Swift/Kotlin) for apps requiring hardware-level computing, complex AR, or heavy background processing.',
        ],
        [
            'q' => 'How long does mobile app development take?',
            'a' => 'A standard mobile app typically takes 6–10 weeks from discovery to App Store release. Complex enterprise apps or multi-sided marketplaces generally require 12–18 weeks with staged agile sprint releases.',
        ],
        [
            'q' => 'Will you help publish our app on the App Store and Google Play?',
            'a' => 'Yes. We manage the entire deployment process, including Apple Developer Account and Google Play Console setup, app signing, store screenshots, privacy policies, and approval guidelines compliance.',
        ],
        [
            'q' => 'Do I own the source code of the developed app?',
            'a' => 'Yes, absolutely. Once final delivery is complete, 100% of the source code, design assets, and intellectual property belong entirely to you with zero hidden licensing fees.',
        ],
        [
            'q' => 'Do you provide post-launch support and maintenance?',
            'a' => 'Yes. All our development packages include free post-launch support, followed by flexible ongoing maintenance retainers for OS upgrades, server monitoring, and feature additions.',
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
