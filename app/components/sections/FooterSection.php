<?php
function renderFooterSection(): void
{
    $currentYear = date('Y');

    // Quick Links
    $quickLinks = [
        ['label' => 'Home',          'href' => '/index.php'],
        ['label' => 'About Us',      'href' => '/about.php'],
        ['label' => 'Our Services',  'href' => '/services.php'],
        ['label' => 'Packages',      'href' => '/packages.php'],
        ['label' => 'Portfolio',     'href' => '/portfolio.php'],
        ['label' => 'Blog',          'href' => '/blog.php'],
        ['label' => 'Contact Us',    'href' => '/contact.php'],
    ];

    // Services
    $services = [
        ['label' => 'Digital Business Branding',      'href' => '/digital-business-branding.php'],
        ['label' => 'Website Design & Development',   'href' => '/website-design-development.php'],
        ['label' => 'Search Engine Optimization',     'href' => '/search-engine-optimization.php'],
        ['label' => 'Social Media Optimization',      'href' => '/social-media-optimization.php'],
        ['label' => 'Search Engine Marketing',        'href' => '/search-engine-marketing.php'],
        ['label' => 'Mobile App Development',         'href' => '/mobile-app-development.php'],
    ];

    // Social Icons
    $socialIcons = [
        [
            'label' => 'Facebook',
            'href'  => 'https://facebook.com/webtecmart',
            'color' => '#1877F2',
            'svg'   => '<path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>',
        ],
        [
            'label' => 'Instagram',
            'href'  => 'https://instagram.com/webtecmart',
            'color' => '#E4405F',
            'svg'   => '<rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/>',
        ],
        [
            'label' => 'Twitter',
            'href'  => 'https://twitter.com/webtecmart',
            'color' => '#000000',
            'svg'   => '<path d="M18 2h3l-7.5 8.5L22 22h-6.5l-5-6.5L4 22H1l8-9.5L2 2h6.5l4.5 6L18 2z"/>',
        ],
        [
            'label' => 'LinkedIn',
            'href'  => 'https://linkedin.com/company/webtecmart',
            'color' => '#0A66C2',
            'svg'   => '<path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-4 0v7h-4v-7a6 6 0 0 1 6-6z"/><rect width="4" height="12" x="2" y="9"/><circle cx="4" cy="4" r="2"/>',
        ],
        [
            'label' => 'YouTube',
            'href'  => 'https://youtube.com/webtecmart',
            'color' => '#FF0000',
            'svg'   => '<path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"/><polygon points="9.75 15.02 15.5 11.75 9.75 8.48"/>',
        ],
    ];

    // Icon helper
    function ftIcon(string $name): string {
        $icons = [
            'mail'       => '<rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>',
            'phone'      => '<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>',
            'headphones' => '<path d="M3 14h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H4a1 1 0 0 1-1-1v-7a9 9 0 0 1 18 0v7a1 1 0 0 1-1 1h-2a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3"/>',
            'clock'      => '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>',
            'arrow'      => '<path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>',
            'heart'      => '<path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/>',
        ];
        $path = $icons[$name] ?? '';
        return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">' . $path . '</svg>';
    }
    ?>
    <style>
        /* ============================================================
           FOOTER — Pixel-perfect Next.js clone
        ============================================================ */
        .site-footer {
            position: relative;
            width: 100%;
            background: #1a1a1a;
            overflow: hidden;
            color: #fff;
        }

        /* Top pink accent line */
        .site-footer::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 4px;
            background: linear-gradient(90deg, transparent, #C4007A, transparent);
        }

        /* Decorative blobs */
        .ft-blob {
            position: absolute;
            border-radius: 9999px;
            background: rgba(196, 0, 122, 0.05);
            filter: blur(64px);
            pointer-events: none;
        }
        .ft-blob-1 { top: 0; right: 0; width: 384px; height: 384px; }
        .ft-blob-2 { bottom: 0; left: 0; width: 256px; height: 256px; }

        /* Main padding */
        .ft-inner {
            position: relative;
            z-index: 10;
            padding: 48px 0;
        }

        /* Grid */
        .ft-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 32px;
        }

        /* Brand Column */
        .ft-brand {
            grid-column: span 1 / span 1;
        }
        .ft-brand-link {
            display: inline-flex;
            align-items: center;
            margin-bottom: 16px;
            text-decoration: none;
            transition: transform 0.3s ease;
        }
        .ft-brand-link img {
            width: 48px;
            height: 48px;
            object-fit: contain;
            transition: transform 0.3s ease;
        }
        .ft-brand-link:hover img {
            transform: scale(1.1) rotate(2deg);
        }
        .ft-brand-text { margin-left: 12px; }
        .ft-brand-name {
            font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
            font-size: 1.25rem;
            font-weight: 800;
            color: #fff;
            line-height: 1;
            letter-spacing: -0.02em;
            margin: 0;
        }
        .ft-brand-name .accent { color: #C4007A; }
        .ft-brand-tagline {
            font-size: 10px;
            color: rgba(196, 0, 122, 0.7);
            letter-spacing: 0.25em;
            text-transform: uppercase;
            font-weight: 600;
            margin: 4px 0 0;
        }
        .ft-brand-desc {
            color: #9CA3AF;
            font-size: 0.875rem;
            line-height: 1.6;
            margin: 0 0 16px;
            max-width: 360px;
        }

        /* Social Icons */
        .ft-social {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }
        .ft-social-link {
            width: 36px;
            height: 36px;
            border-radius: 9999px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #9CA3AF;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .ft-social-link svg {
            width: 16px;
            height: 16px;
        }
        .ft-social-link:hover {
            background: rgba(196, 0, 122, 0.15);
            border-color: rgba(196, 0, 122, 0.4);
            color: #C4007A;
            transform: translateY(-3px);
        }

        /* Column Heading */
        .ft-heading {
            color: #fff;
            font-weight: 600;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin: 0 0 16px;
        }

        /* Links List */
        .ft-links {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .ft-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #9CA3AF;
            font-size: 0.875rem;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .ft-link .dash {
            display: inline-block;
            width: 0;
            height: 2px;
            background: #C4007A;
            transition: width 0.3s ease;
            border-radius: 9999px;
        }
        .ft-link:hover {
            color: #C4007A;
        }
        .ft-link:hover .dash {
            width: 6px;
        }

        /* Contact List */
        .ft-contact-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
        .ft-contact-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            color: #9CA3AF;
            font-size: 0.875rem;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .ft-contact-item svg {
            width: 16px;
            height: 16px;
            flex-shrink: 0;
            margin-top: 2px;
            color: #C4007A;
            transition: transform 0.3s ease;
        }
        .ft-contact-item:hover {
            color: #C4007A;
        }
        .ft-contact-item:hover svg {
            transform: scale(1.1);
        }

        /* Newsletter */
        .ft-newsletter {
            margin-top: 16px;
        }
        .ft-newsletter-title {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin: 0 0 8px;
        }
        .ft-newsletter-form {
            display: flex;
            gap: 8px;
        }
        .ft-newsletter-input {
            flex: 1;
            min-width: 0;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 8px 12px;
            font-size: 0.875rem;
            color: #fff;
            font-family: inherit;
            outline: none;
            transition: all 0.3s ease;
        }
        .ft-newsletter-input::placeholder {
            color: #6B7280;
        }
        .ft-newsletter-input:focus {
            border-color: #C4007A;
            box-shadow: 0 0 0 1px #C4007A;
        }
        .ft-newsletter-btn {
            border-radius: 8px;
            background: #C4007A;
            color: #fff;
            padding: 8px 12px;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: background 0.3s ease;
        }
        .ft-newsletter-btn:hover {
            background: #A3005F;
        }
        .ft-newsletter-btn svg {
            width: 16px;
            height: 16px;
        }

        /* Bottom Bar */
        .ft-bottom {
            margin-top: 40px;
            padding-top: 24px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
        .ft-bottom-inner {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 16px;
            text-align: center;
        }
        .ft-copyright {
            color: #6B7280;
            font-size: 0.75rem;
            margin: 0;
        }
        .ft-copyright .accent { color: #C4007A; }

        .ft-bottom-links {
            display: flex;
            align-items: center;
            gap: 24px;
            font-size: 0.75rem;
            color: #6B7280;
            flex-wrap: wrap;
            justify-content: center;
        }
        .ft-bottom-links a {
            color: #6B7280;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .ft-bottom-links a:hover {
            color: #C4007A;
        }
        .ft-bottom-links .divider {
            width: 1px;
            height: 12px;
            background: rgba(255, 255, 255, 0.1);
        }

        .ft-made-with {
            color: #4B5563;
            font-size: 0.75rem;
            display: flex;
            align-items: center;
            gap: 4px;
            margin: 0;
        }
        .ft-made-with svg {
            width: 12px;
            height: 12px;
            color: #C4007A;
            animation: ft-heartbeat 1.4s ease-in-out infinite;
        }
        @keyframes ft-heartbeat {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.2); }
        }

        /* ============================================================
           RESPONSIVE
        ============================================================ */

        /* Small phones ≥ 480px */
        @media (min-width: 480px) {
            .ft-inner { padding: 56px 0; }
            .ft-brand-link img { width: 52px; height: 52px; }
            .ft-brand-name { font-size: 1.375rem; }
            .ft-brand-tagline { font-size: 11px; }
        }

        /* Tablets ≥ 768px — 2 columns */
        @media (min-width: 768px) {
            .ft-inner { padding: 64px 0; }
            .ft-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 32px;
            }
            .ft-brand { grid-column: span 2 / span 2; }
            .ft-social-link { width: 40px; height: 40px; }
            .ft-social-link svg { width: 18px; height: 18px; }
            .ft-bottom-inner {
                flex-direction: row;
                justify-content: space-between;
                text-align: left;
            }
            .ft-bottom-links { justify-content: flex-start; }
        }

        /* Desktop ≥ 1024px — 4 columns */
        @media (min-width: 1024px) {
            .ft-inner { padding: 64px 0; }
            .ft-grid {
                grid-template-columns: repeat(4, minmax(0, 1fr));
                gap: 40px;
            }
            .ft-brand { grid-column: span 1 / span 1; }
        }
    </style>

    <footer class="site-footer" id="siteFooter">

        <!-- Decorative blobs -->
        <div class="ft-blob ft-blob-1"></div>
        <div class="ft-blob ft-blob-2"></div>

        <div class="container">
            <div class="ft-inner">

                <!-- Main Grid -->
                <div class="ft-grid">

                    <!-- Column 1 — Brand -->
                    <div class="ft-brand">
                        <a href="/index.php" class="ft-brand-link" aria-label="WebTecMart Home">
                            <img src="/assets/images/webtecmart-logo.png" alt="WebTecMart Logo" loading="lazy">
                            <div class="ft-brand-text">
                                <h2 class="ft-brand-name">
                                    Web<span class="accent">TecMart</span>
                                </h2>
                                <p class="ft-brand-tagline">Digital Branding Agency</p>
                            </div>
                        </a>

                        <p class="ft-brand-desc">
                            We set new standards to develop the branding of digital businesses with innovative strategies and proven results.
                        </p>

                        <!-- Social Icons -->
                        <div class="ft-social">
                            <?php foreach ($socialIcons as $social): ?>
                                <a
                                    href="<?= htmlspecialchars($social['href']) ?>"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="ft-social-link"
                                    aria-label="<?= htmlspecialchars($social['label']) ?>"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <?= $social['svg'] ?>
                                    </svg>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Column 2 — Quick Links -->
                    <div>
                        <h3 class="ft-heading">Quick Links</h3>
                        <ul class="ft-links">
                            <?php foreach ($quickLinks as $link): ?>
                                <li>
                                    <a href="<?= htmlspecialchars($link['href']) ?>" class="ft-link">
                                        <span class="dash"></span>
                                        <?= htmlspecialchars($link['label']) ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Column 3 — Services -->
                    <div>
                        <h3 class="ft-heading">Our Services</h3>
                        <ul class="ft-links">
                            <?php foreach ($services as $service): ?>
                                <li>
                                    <a href="<?= htmlspecialchars($service['href']) ?>" class="ft-link">
                                        <span class="dash"></span>
                                        <?= htmlspecialchars($service['label']) ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Column 4 — Contact -->
                    <div>
                        <h3 class="ft-heading">Get In Touch</h3>

                        <ul class="ft-contact-list">
                            <li>
                                <a href="mailto:info@webtecmart.com" class="ft-contact-item">
                                    <?= ftIcon('mail') ?>
                                    <span>info@webtecmart.com</span>
                                </a>
                            </li>
                            <li>
                                <a href="tel:+919999674255" class="ft-contact-item">
                                    <?= ftIcon('phone') ?>
                                    <span>+91-9999674255</span>
                                </a>
                            </li>
                            <li>
                                <a href="tel:+919511012625" class="ft-contact-item">
                                    <?= ftIcon('headphones') ?>
                                    <span>Tech Support: +91-9511012625</span>
                                </a>
                            </li>
                            <li>
                                <div class="ft-contact-item">
                                    <?= ftIcon('clock') ?>
                                    <span>Mon - Sat: 9:00 AM - 7:00 PM</span>
                                </div>
                            </li>
                        </ul>

                        <!-- Newsletter -->
                        <div class="ft-newsletter">
                            <h4 class="ft-newsletter-title">Subscribe to Newsletter</h4>
                            <form class="ft-newsletter-form" onsubmit="event.preventDefault(); ftSubscribe(this);">
                                <input
                                    type="email"
                                    class="ft-newsletter-input"
                                    placeholder="Your email"
                                    aria-label="Your email"
                                    required
                                >
                                <button type="submit" class="ft-newsletter-btn" aria-label="Subscribe">
                                    <?= ftIcon('arrow') ?>
                                </button>
                            </form>
                        </div>
                    </div>

                </div>

                <!-- Bottom Bar -->
                <div class="ft-bottom">
                    <div class="ft-bottom-inner">

                        <p class="ft-copyright">
                            &copy; <?= $currentYear ?> <span class="accent">WebTecMart</span>. All Rights Reserved.
                        </p>

                        <div class="ft-bottom-links">
                            <a href="/contact.php">Privacy Policy</a>
                            <span class="divider"></span>
                            <a href="/contact.php">Terms &amp; Conditions</a>
                            <span class="divider"></span>
                            <a href="/index.php">Sitemap</a>
                        </div>

                        <p class="ft-made-with">
                            Made with <?= ftIcon('heart') ?> in India
                        </p>

                    </div>
                </div>

            </div>
        </div>
    </footer>

    <script>
        function ftSubscribe(form) {
            const input = form.querySelector('.ft-newsletter-input');
            const btn = form.querySelector('.ft-newsletter-btn');
            if (!input || !input.value) return;

            // Simple visual feedback
            const originalHTML = btn.innerHTML;
            btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>';
            btn.style.background = '#22C55E';

            setTimeout(() => {
                input.value = '';
                btn.innerHTML = originalHTML;
                btn.style.background = '';
            }, 1800);
        }
    </script>
    <?php
}