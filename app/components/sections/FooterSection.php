<?php
function renderFooterSection(): void
{
    $currentYear = date('Y');

    // Quick Links
    $quickLinks = [
        ['label' => 'Home',          'href' => '/'],
        ['label' => 'About Us',      'href' => '/about.php'],
        ['label' => 'Our Services',  'href' => '/services.php'],
        ['label' => 'Packages',      'href' => '/packages.php'],
        ['label' => 'Portfolio',     'href' => '/portfolio.php'],
        ['label' => 'Blog',          'href' => '/blogs.php'],
        ['label' => 'Contact Us',    'href' => '/contact.php'],
    ];

    // Services
    $services = [
        ['label' => 'B2B & Exhibition SEO',           'href' => '/b2b-exhibition-seo.php'],
        ['label' => 'SEO Services in Delhi NCR',      'href' => '/seo-services-delhi.php'],
        ['label' => 'Website Design & Development',   'href' => '/website-design-development.php'],
        ['label' => 'Digital Business Branding',      'href' => '/digital-business-branding.php'],
        ['label' => 'Search Engine Marketing (PPC)',  'href' => '/search-engine-marketing.php'],
        ['label' => 'Social Media Optimization',      'href' => '/social-media-optimization.php'],
        ['label' => 'Mobile App Development',         'href' => '/mobile-app-development.php'],
        ['label' => 'E-Commerce SEO Services',        'href' => '/ecommerce-seo.php'],
    ];

    // Social Icons
    $socialIcons = [
        [
            'label' => 'Facebook',
            'href'  => 'https://facebook.com/webtecmart',
            'svg'   => '<path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>',
        ],
        [
            'label' => 'Instagram',
            'href'  => 'https://instagram.com/webtecmart',
            'svg'   => '<rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/>',
        ],
        [
            'label' => 'Twitter',
            'href'  => 'https://twitter.com/webtecmart',
            'svg'   => '<path d="M18 2h3l-7.5 8.5L22 22h-6.5l-5-6.5L4 22H1l8-9.5L2 2h6.5l4.5 6L18 2z"/>',
        ],
        [
            'label' => 'LinkedIn',
            'href'  => 'https://linkedin.com/company/webtecmart',
            'svg'   => '<path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-4 0v7h-4v-7a6 6 0 0 1 6-6z"/><rect width="4" height="12" x="2" y="9"/><circle cx="4" cy="4" r="2"/>',
        ],
        [
            'label' => 'YouTube',
            'href'  => 'https://youtube.com/webtecmart',
            'svg'   => '<path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"/><polygon points="9.75 15.02 15.5 11.75 9.75 8.48"/>',
        ],
    ];

    // Icon helper
    if (!function_exists('ftIcon')) {
        function ftIcon(string $name): string {
            $icons = [
                'mail'       => '<rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>',
                'phone'      => '<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>',
                'headphones' => '<path d="M3 14h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H4a1 1 0 0 1-1-1v-7a9 9 0 0 1 18 0v7a1 1 0 0 1-1 1h-2a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3"/>',
                'clock'      => '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>',
                'arrow'      => '<path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>',
                'heart'      => '<path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/>',
                'pin'        => '<path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"/><circle cx="12" cy="10" r="3"/>',
                'up'         => '<path d="m18 15-6-6-6 6"/>',
            ];
            $path = $icons[$name] ?? '';
            return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">' . $path . '</svg>';
        }
    }
    ?>
    <style>
        /* ============================================================
           FOOTER — "Expo Floor" theme (matches B2B Exhibition SEO page)
           ============================================================ */
        .xpf {
            --ink: #1A0613;
            --ink2: #2B0B20;
            --pink: #C4007A;
            --pink2: #E0398F;
            --blush: #FBEAF3;
            --gold: #FFB547;
            --mint: #0E9F6E;
            --text: #2A2430;
            --mute: #6C6474;
            --disp: 'Bricolage Grotesque', 'Plus Jakarta Sans', system-ui, sans-serif;
            position: relative;
            background: var(--ink);
            color: #fff;
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            overflow: clip;
        }
        .xpf *, .xpf *::before, .xpf *::after { box-sizing: border-box; }
        .xpf h2, .xpf h3, .xpf h4, .xpf b, .xpf strong {
            font-family: var(--disp);
            margin: 0;
            letter-spacing: -.02em;
        }
        .xpf p, .xpf ul, .xpf li, .xpf a { margin: 0; }
        .xpf a { color: inherit; text-decoration: none; }
        .xpf a:focus-visible, .xpf button:focus-visible, .xpf input:focus-visible {
            outline: 3px solid var(--gold);
            outline-offset: 3px;
        }

        /* dotted floor-plan backdrop */
        .xpf::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: radial-gradient(rgba(255,255,255,.1) 1px, transparent 1.2px);
            background-size: 26px 26px;
            -webkit-mask-image: linear-gradient(180deg, transparent 0%, #000 30%, #000 100%);
                    mask-image: linear-gradient(180deg, transparent 0%, #000 30%, #000 100%);
            pointer-events: none;
        }
        .xpf::after {
            content: '';
            position: absolute;
            inset: 0;
            pointer-events: none;
            background:
                radial-gradient(55% 70% at 0% 0%, rgba(196,0,122,.35), transparent 65%),
                radial-gradient(45% 60% at 100% 10%, rgba(255,181,71,.14), transparent 70%);
        }
        .xpf-wrap {
            position: relative;
            z-index: 1;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 22px;
        }

        /* awning strip */
        .xpf-awning {
            position: relative;
            z-index: 2;
            height: 20px;
            background: repeating-linear-gradient(90deg, var(--pink) 0 26px, var(--ink) 26px 52px);
            border-bottom: 2px solid var(--gold);
        }

        /* ---- top mini CTA band ---- */
        .xpf-band {
            position: relative;
            z-index: 1;
            display: grid;
            gap: 20px;
            align-items: center;
            padding: 34px 0;
            border-bottom: 1px dashed rgba(255,255,255,.14);
        }
        @media (min-width: 900px) {
            .xpf-band { grid-template-columns: 1.3fr .7fr; }
        }
        .xpf-band h2 {
            font-size: clamp(1.5rem, 2.8vw, 2.15rem);
            font-weight: 800;
            line-height: 1.12;
            margin-bottom: 8px;
        }
        .xpf-band h2 span { color: var(--gold); }
        .xpf-band p {
            color: rgba(255,255,255,.66);
            line-height: 1.6;
            font-size: .95rem;
        }
        .xpf-band-actions { display: flex; flex-wrap: wrap; gap: 12px; }

        .xpf-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            padding: 13px 22px;
            border-radius: 11px;
            font-weight: 700;
            font-size: .9rem;
            line-height: 1;
            border: 2px solid transparent;
            white-space: nowrap;
            transition: transform .2s ease, box-shadow .2s ease, background .2s ease;
        }
        .xpf-btn svg { width: 16px; height: 16px; flex-shrink: 0; }
        .xpf-btn--pink {
            background: var(--pink);
            color: #fff !important;
            box-shadow: 0 5px 0 #7E004E;
        }
        .xpf-btn--pink:hover { translate: 0 2px; box-shadow: 0 3px 0 #7E004E; }
        .xpf-btn--pink:active { translate: 0 5px; box-shadow: 0 0 0 #7E004E; }
        .xpf-btn--gold {
            background: var(--gold);
            color: var(--ink) !important;
            box-shadow: 0 5px 0 #B77400;
        }
        .xpf-btn--gold:hover { translate: 0 2px; box-shadow: 0 3px 0 #B77400; }

        /* ---- main columns ---- */
        .xpf-main {
            position: relative;
            z-index: 1;
            display: grid;
            gap: 40px;
            padding: 52px 0 44px;
            grid-template-columns: minmax(0, 1fr);
        }
        @media (min-width: 640px) {
            .xpf-main { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        }
        @media (min-width: 992px) {
            .xpf-main { grid-template-columns: 1.35fr .8fr .8fr 1.15fr; gap: 48px; }
        }

        /* brand */
        .xpf-brand-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 18px;
        }
        .xpf-logo {
            display: grid;
            place-items: center;
            width: 44px;
            height: 44px;
            border-radius: 11px;
            background: var(--pink);
            color: #fff;
            font-family: var(--disp);
            font-weight: 800;
            font-size: 1.2rem;
            border: 2px solid var(--gold);
            box-shadow: 3px 3px 0 var(--gold);
            flex-shrink: 0;
            overflow: hidden;
        }
        .xpf-logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        .xpf-brand-badge b {
            font-size: 1.3rem;
            font-weight: 800;
            line-height: 1.1;
        }
        .xpf-brand-badge b .accent { color: var(--pink2); }
        .xpf-brand-badge small {
            display: block;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: .7rem;
            font-weight: 600;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: var(--gold);
            margin-top: 3px;
        }
        .xpf-about {
            color: rgba(255,255,255,.66);
            line-height: 1.7;
            font-size: .92rem;
            margin-bottom: 22px;
            max-width: 340px;
        }

        /* ticket-stub contact card */
        .xpf-stub {
            position: relative;
            background: var(--ink2);
            border: 2px solid var(--gold);
            border-radius: 14px;
            padding: 18px 18px 16px;
            max-width: 380px;
        }
        .xpf-stub::before, .xpf-stub::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 14px;
            height: 14px;
            margin-top: -7px;
            border-radius: 50%;
            background: var(--ink);
            border: 2px solid var(--gold);
        }
        .xpf-stub::before { left: -9px; }
        .xpf-stub::after { right: -9px; }
        .xpf-stub small {
            display: block;
            font-size: .68rem;
            font-weight: 800;
            letter-spacing: .14em;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 10px;
        }
        .xpf-stub-row {
            display: flex;
            gap: 10px;
            align-items: flex-start;
            font-size: .88rem;
            line-height: 1.5;
            color: rgba(255,255,255,.85);
            padding: 7px 0;
            border-top: 1px dashed rgba(255,255,255,.14);
        }
        .xpf-stub-row:first-of-type { border-top: 0; }
        .xpf-stub-row svg {
            width: 16px;
            height: 16px;
            color: var(--pink2);
            flex-shrink: 0;
            margin-top: 2px;
        }
        .xpf-stub-row a { color: #fff; font-weight: 700; }
        .xpf-stub-row a:hover { color: var(--gold); }
        .xpf-stub-row span {
            display: block;
            font-size: .76rem;
            color: rgba(255,255,255,.5);
            font-weight: 500;
        }

        /* link columns */
        .xpf-col h3 {
            font-size: .8rem;
            font-weight: 800;
            letter-spacing: .13em;
            text-transform: uppercase;
            color: var(--gold);
            padding-bottom: 12px;
            margin-bottom: 16px;
            border-bottom: 2px solid rgba(255,255,255,.1);
            position: relative;
        }
        .xpf-col h3::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -2px;
            width: 38px;
            height: 2px;
            background: var(--pink);
        }
        .xpf-links {
            list-style: none;
            padding: 0;
            display: grid;
            gap: 9px;
        }
        .xpf-links a {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            font-size: .9rem;
            color: rgba(255,255,255,.7);
            line-height: 1.45;
            transition: color .2s ease, translate .2s ease;
        }
        .xpf-links a::before {
            content: '';
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--pink);
            flex-shrink: 0;
            transition: background .2s ease, scale .2s ease;
        }
        .xpf-links a:hover { color: #fff; translate: 4px 0; }
        .xpf-links a:hover::before { background: var(--gold); scale: 1.3; }

        /* newsletter */
        .xpf-news h3 { margin-bottom: 14px; }
        .xpf-news p {
            font-size: .88rem;
            line-height: 1.6;
            color: rgba(255,255,255,.62);
            margin-bottom: 16px;
        }
        .xpf-form { display: grid; gap: 10px; }
        .xpf-input {
            width: 100%;
            min-width: 0;
            padding: 13px 14px;
            border-radius: 10px;
            border: 2px solid rgba(255,255,255,.16);
            background: rgba(255,255,255,.06);
            color: #fff;
            font-family: inherit;
            font-size: .9rem;
            transition: border-color .2s, background .2s, box-shadow .2s;
        }
        .xpf-input::placeholder { color: rgba(255,255,255,.4); }
        .xpf-input:focus {
            outline: none;
            border-color: var(--gold);
            background: rgba(255,255,255,.1);
            box-shadow: 0 0 0 4px rgba(255,181,71,.16);
        }
        .xpf-form .xpf-btn { width: 100%; }
        .xpf-form-note {
            font-size: .72rem;
            color: rgba(255,255,255,.4);
            line-height: 1.5;
            margin-top: 2px;
        }
        .xpf-msg {
            display: none;
            margin-top: 10px;
            padding: 11px 13px;
            border-radius: 9px;
            font-size: .82rem;
            font-weight: 600;
            background: rgba(14,159,110,.16);
            border: 1px solid rgba(14,159,110,.5);
            color: #7BF0C4;
        }
        .xpf-msg.on { display: block; }

        /* social chips */
        .xpf-social { display: flex; gap: 9px; margin-top: 18px; flex-wrap: wrap; }
        .xpf-social a {
            display: grid;
            place-items: center;
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: rgba(255,255,255,.07);
            border: 2px solid rgba(255,255,255,.14);
            color: rgba(255,255,255,.8);
            transition: background .2s, border-color .2s, color .2s, translate .2s, box-shadow .2s;
        }
        .xpf-social a svg { width: 17px; height: 17px; }
        .xpf-social a:hover {
            background: var(--gold);
            border-color: var(--gold);
            color: var(--ink);
            translate: 0 -3px;
            box-shadow: 0 4px 0 #B77400;
        }

        /* stat ribbon */
        .xpf-ribbon {
            position: relative;
            z-index: 1;
            overflow: hidden;
            border-top: 2px solid rgba(255,255,255,.1);
            border-bottom: 2px solid rgba(255,255,255,.1);
            background: rgba(255,255,255,.03);
        }
        .xpf-ribbon-track {
            display: flex;
            width: max-content;
            animation: xpfRun 40s linear infinite;
        }
        .xpf-ribbon:hover .xpf-ribbon-track { animation-play-state: paused; }
        .xpf-ribbon span {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 13px 30px;
            font-family: var(--disp);
            font-weight: 700;
            font-size: .88rem;
            color: rgba(255,255,255,.75);
            white-space: nowrap;
        }
        .xpf-ribbon span b { color: var(--gold); }
        .xpf-ribbon span::after { content: '✦'; color: var(--pink); margin-left: 20px; }
        @keyframes xpfRun { to { transform: translateX(-50%); } }

        /* bottom bar */
        .xpf-bottom {
            position: relative;
            z-index: 1;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 12px 24px;
            padding: 22px 0 26px;
            font-size: .82rem;
            color: rgba(255,255,255,.5);
        }
        .xpf-bottom p { line-height: 1.6; }
        .xpf-bottom p b { color: rgba(255,255,255,.8); }
        .xpf-bottom p .accent { color: var(--pink2); }
        .xpf-legal { display: flex; flex-wrap: wrap; gap: 6px 18px; }
        .xpf-legal a {
            color: rgba(255,255,255,.6);
            transition: color .2s;
            position: relative;
        }
        .xpf-legal a:hover { color: var(--gold); }
        .xpf-legal a + a::before {
            content: '';
            position: absolute;
            left: -10px;
            top: 50%;
            width: 3px;
            height: 3px;
            margin-top: -1.5px;
            border-radius: 50%;
            background: rgba(255,255,255,.3);
        }
        .xpf-top {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 14px;
            border-radius: 9px;
            border: 2px solid rgba(255,255,255,.16);
            background: transparent;
            color: #fff;
            font-family: var(--disp);
            font-weight: 700;
            font-size: .8rem;
            cursor: pointer;
            transition: background .2s, border-color .2s, color .2s;
        }
        .xpf-top svg { width: 15px; height: 15px; transition: translate .2s; }
        .xpf-top:hover { background: var(--gold); border-color: var(--gold); color: var(--ink); }
        .xpf-top:hover svg { translate: 0 -2px; }

        /* reduce motion */
        @media (prefers-reduced-motion: reduce) {
            .xpf-ribbon-track { animation: none; }
            .xpf-btn, .xpf-links a, .xpf-social a, .xpf-top { transition: none; }
        }
        /* mobile hardening */
        @media (max-width: 575px) {
            .xpf-wrap { padding: 0 16px; }
            .xpf-band { padding: 26px 0; }
            .xpf-band-actions .xpf-btn { width: 100%; }
            .xpf-main { gap: 34px; padding: 40px 0 34px; }
            .xpf-input { font-size: 16px; }
            .xpf-bottom { flex-direction: column; align-items: flex-start; }
            .xpf-stub { max-width: 100%; }
        }
    </style>

    <footer class="xpf" id="siteFooter" role="contentinfo">
        <div class="xpf-awning" aria-hidden="true"></div>

        <div class="xpf-wrap">

            <!-- mini CTA band -->
            <div class="xpf-band">
                <div>
                    <h2>Your next edition deserves a <span>fuller hall.</span></h2>
                    <p>Event website, exhibition SEO and trade-buyer acquisition — planned around your show dates, not after them.</p>
                </div>
                <div class="xpf-band-actions">
                    <a href="/b2b-exhibition-seo.php#event-audit-form" class="xpf-btn xpf-btn--pink">
                        <span>Free Event SEO Audit</span><?= ftIcon('arrow') ?>
                    </a>
                    <a href="tel:+919999674255" class="xpf-btn xpf-btn--gold">
                        <?= ftIcon('phone') ?><span>Call Now</span>
                    </a>
                </div>
            </div>

            <!-- main columns -->
            <div class="xpf-main">

                <!-- Column 1 — Brand + contact stub -->
                <div>
                    <div class="xpf-brand-badge">
                        <span class="xpf-logo" aria-hidden="true">
                            <img src="/assets/images/webtecmart-logo.png" alt="" loading="lazy">
                        </span>
                        <div>
                            <b>Web<span class="accent">TecMart</span></b>
                            <small>Digital Branding Agency</small>
                        </div>
                    </div>

                    <p class="xpf-about">
                        We set new standards to develop the branding of digital businesses with innovative strategies and proven results.
                    </p>

                    <div class="xpf-stub">
                        <small>Visitor Info Desk</small>
                        <div class="xpf-stub-row">
                            <?= ftIcon('pin') ?>
                            <div>New Delhi NCR, India<span>Serving brands nationwide</span></div>
                        </div>
                        <div class="xpf-stub-row">
                            <?= ftIcon('phone') ?>
                            <div><a href="tel:+919999674255">+91-9999674255</a><span>Mon–Sat, 9:00–19:00 IST</span></div>
                        </div>
                        <div class="xpf-stub-row">
                            <?= ftIcon('headphones') ?>
                            <div><a href="tel:+919511012625">+91-9511012625</a><span>Tech support line</span></div>
                        </div>
                        <div class="xpf-stub-row">
                            <?= ftIcon('mail') ?>
                            <div><a href="mailto:info@webtecmart.com">info@webtecmart.com</a><span>Replies within 24 hours</span></div>
                        </div>
                    </div>

                    <div class="xpf-social" aria-label="Social profiles">
                        <?php foreach ($socialIcons as $social): ?>
                            <a
                                href="<?= htmlspecialchars($social['href']) ?>"
                                target="_blank"
                                rel="noopener noreferrer"
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
                <nav class="xpf-col" aria-label="Quick links">
                    <h3>Quick Links</h3>
                    <ul class="xpf-links">
                        <?php foreach ($quickLinks as $link): ?>
                            <li>
                                <a href="<?= htmlspecialchars($link['href']) ?>">
                                    <?= htmlspecialchars($link['label']) ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>

                <!-- Column 3 — Services -->
                <nav class="xpf-col" aria-label="Services">
                    <h3>Our Services</h3>
                    <ul class="xpf-links">
                        <?php foreach ($services as $service): ?>
                            <li>
                                <a href="<?= htmlspecialchars($service['href']) ?>">
                                    <?= htmlspecialchars($service['label']) ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>

                <!-- Column 4 — Newsletter -->
                <div class="xpf-news">
                    <h3 class="xpf-col" style="margin:0 0 14px;">Get In Touch</h3>
                    <p>One email a month: ranking shifts, SEO plays and registration benchmarks for digital brands. No filler.</p>
                    <form class="xpf-form" id="xpfNews" onsubmit="return ftSubscribe(this)">
                        <input
                            class="xpf-input"
                            type="email"
                            name="email"
                            placeholder="you@company.com"
                            aria-label="Email address"
                            required
                        >
                        <button type="submit" class="xpf-btn xpf-btn--pink">
                            <span>Subscribe to Newsletter</span><?= ftIcon('arrow') ?>
                        </button>
                        <p class="xpf-form-note">* For businesses and brands only. Unsubscribe anytime.</p>
                        <div class="xpf-msg" id="xpfNewsMsg">You're on the list — check your inbox for a confirmation.</div>
                    </form>

                    <div class="xpf-stub-row" style="margin-top:18px;border-top:1px dashed rgba(255,255,255,.14);padding-top:14px;">
                        <?= ftIcon('clock') ?>
                        <div>Mon – Sat<span>9:00 AM – 7:00 PM IST</span></div>
                    </div>
                </div>

            </div>
        </div>

        <!-- stat ribbon -->
        <div class="xpf-ribbon" aria-hidden="true">
            <div class="xpf-ribbon-track">
                <?php for ($i = 0; $i < 4; $i++): ?>
                    <span><b>400%</b> organic growth</span>
                    <span><b>200+</b> keywords ranked</span>
                    <span><b>80+</b> top 3 worldwide</span>
                    <span><b>10,000+</b> buyer registrations</span>
                    <span><b>100%</b> white-hat</span>
                <?php endfor; ?>
            </div>
        </div>

        <div class="xpf-wrap">
            <div class="xpf-bottom">
                <p>&copy; <?= $currentYear ?> <b>Web<span class="accent">TecMart</span></b>. All rights reserved.</p>
                <div class="xpf-legal">
                    <a href="/contact.php">Privacy Policy</a>
                    <a href="/contact.php">Terms &amp; Conditions</a>
                    <a href="/">Sitemap</a>
                </div>
                <button type="button" class="xpf-top" onclick="ftToTop()">
                    <?= ftIcon('up') ?><span>Back to top</span>
                </button>
            </div>
        </div>
    </footer>

    <script>
        function ftToTop() {
            if (window.xpLenis) {
                window.xpLenis.scrollTo(0, { duration: 1.1 });
            } else {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        }

        function ftSubscribe(form) {
            const input = form.querySelector('.xpf-input');
            const btn = form.querySelector('button[type="submit"]');
            const msg = form.querySelector('.xpf-msg');
            if (!input || !input.value) return false;

            const span = btn.querySelector('span');
            const original = span ? span.textContent : '';
            btn.disabled = true;
            if (span) span.textContent = 'Subscribing…';

            const data = new FormData();
            data.set('email', input.value);
            data.set('service', 'Newsletter — Footer');
            data.set('ajax', '1');

            fetch('/contact.php', {
                method: 'POST',
                body: data,
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
            })
            .then(function () {
                if (msg) msg.classList.add('on');
                form.reset();
            })
            .catch(function () {
                if (msg) {
                    msg.textContent = "Couldn't subscribe right now — please email info@webtecmart.com.";
                    msg.classList.add('on');
                }
            })
            .finally(function () {
                btn.disabled = false;
                if (span) span.textContent = original;
            });
            return false;
        }
    </script>
    <?php
    require_once __DIR__ . '/../modals/EnquiryModal.php';
    renderEnquiryModal();
}