<?php

function renderSearchVisibilitySection(): void
{
    $services = [
        [
            'number' => '01',
            'icon' => 'map-pin',
            'title' => 'Local SEO',
            'text' => 'We work on the organic factors that help a business grow locally. With our Local SEO strategies, customers searching nearby for what you offer will find you first.',
        ],
        [
            'number' => '02',
            'icon' => 'flag',
            'title' => 'National SEO',
            'text' => "Looking to grow your business across your own country? National SEO is the right fit — we sharpen your website's ranking in a way that turns visibility into real leads and sales.",
        ],
        [
            'number' => '03',
            'icon' => 'globe',
            'title' => 'International SEO',
            'text' => 'Reaching clients across borders is tough without the right approach. Our International SEO services help you rank for the right keywords and earn backlinks from relevant global sites.',
        ],
        [
            'number' => '04',
            'icon' => 'shopping-cart',
            'title' => 'E-Commerce SEO',
            'text' => "For online stores, ranking on Google's first page isn't optional, it's essential. We make sure your products are easy to find so potential customers can discover and order them with ease.",
        ],
        [
            'number' => '05',
            'icon' => 'rocket',
            'title' => 'SEO for Small Business',
            'text' => 'Startups often struggle with weak visibility online and on social media. Our Startup SEO services target the right customers by identifying business-focused keywords and showcasing your offerings through a strong website.',
        ],
        [
            'number' => '06',
            'icon' => 'shield',
            'title' => 'Online Presence & Reputation',
            'text' => "Online Reputation Management is a key part of any SEO strategy, shaping how your brand is perceived by controlling what appears on Google's front page for your name and terms.",
        ],
    ];
    ?>

    <style>
        /* =========================================================
           SEARCH VISIBILITY SECTION
           React/Tailwind UI converted to PHP/CSS
        ========================================================= */

        .search-visibility-section {
            position: relative;
            width: 100%;
            padding: 32px 0;
            background: #FBF8F1;
            overflow: hidden;
        }

        /* Decorative background */
        .search-bg {
            position: absolute;
            inset: 0;
            pointer-events: none;
            overflow: hidden;
        }

        .search-bg-glow-top {
            position: absolute;
            top: 0;
            right: 0;
            width: 50%;
            height: 50%;
            background: linear-gradient(
                135deg,
                rgba(196, 0, 122, 0.05),
                transparent
            );
            border-radius: 999px;
            filter: blur(60px);
        }

        .search-bg-glow-bottom {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 33%;
            height: 50%;
            background: linear-gradient(
                45deg,
                rgba(196, 0, 122, 0.05),
                transparent
            );
            border-radius: 999px;
            filter: blur(60px);
        }

        .search-bg-diamond {
            position: absolute;
            top: 80px;
            left: 40px;
            width: 128px;
            height: 128px;
            opacity: 0.1;
        }

        .search-bg-circle {
            position: absolute;
            bottom: 80px;
            right: 40px;
            width: 160px;
            height: 160px;
            opacity: 0.1;
        }

        .search-visibility-wrap {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        /* Header */
        .search-section-header {
            margin-bottom: 48px;
        }

        .search-section-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            margin-bottom: 16px;
            border-radius: 999px;
            background: rgba(196, 0, 122, 0.10);
            color: #C4007A;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }

        .search-section-pill svg {
            width: 15px;
            height: 15px;
        }

        .search-visibility-wrap h2 {
            margin: 0;
            color: #111827;
            font-size: clamp(2rem, 4vw, 2.5rem);
            line-height: 1.2;
            font-weight: 700;
            letter-spacing: -0.025em;
        }

        .search-heading-highlight {
            position: relative;
            display: inline-block;
            color: #C4007A;
        }

        .search-heading-highlight svg {
            position: absolute;
            left: 0;
            bottom: -8px;
            width: 100%;
            height: 6px;
        }

        .search-heading-highlight path {
            fill: none;
            stroke: #C4007A;
            stroke-width: 2;
            stroke-linecap: round;
            opacity: 0.3;
        }

        .search-visibility-intro {
            max-width: 672px;
            margin: 12px auto 0;
            color: #6B7280;
            font-size: 1rem;
            line-height: 1.6;
        }

        /* Grid */
        .search-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 32px;
        }

        /* Card */
        .search-card {
            position: relative;
            overflow: hidden;
            padding: 32px;
            text-align: left;
            background: #fff;
            border: 1px solid rgba(196, 0, 122, 0.10);
            border-radius: 16px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.03);
            transition:
                transform 0.5s ease,
                box-shadow 0.5s ease,
                border-color 0.5s ease;
        }

        .search-card:hover {
            transform: translateY(-8px);
            border-color: rgba(196, 0, 122, 0.30);
            box-shadow: 0 20px 35px rgba(0, 0, 0, 0.10);
        }

        /* Hover gradient */
        .search-card::before {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: inherit;
            background: linear-gradient(
                135deg,
                rgba(196, 0, 122, 0.05),
                transparent
            );
            opacity: 0;
            transition: opacity 0.5s ease;
            pointer-events: none;
        }

        .search-card:hover::before {
            opacity: 1;
        }

        .search-card-content {
            position: relative;
            z-index: 2;
        }

        /* Icon */
        .search-icon-wrap {
            position: relative;
            margin-bottom: 20px;
        }

        .search-icon-box {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 56px;
            height: 56px;
            border-radius: 12px;
            background: linear-gradient(
                135deg,
                #C4007A,
                #E0398F
            );
            color: #fff;
            box-shadow: none;
            transition:
                transform 0.3s ease,
                box-shadow 0.3s ease;
        }

        .search-card:hover .search-icon-box {
            transform: scale(1.10);
            box-shadow: 0 10px 25px rgba(196, 0, 122, 0.30);
        }

        .search-icon-box svg {
            width: 24px;
            height: 24px;
            stroke-width: 2;
        }

        /* Number */
        .search-card-number {
            position: absolute;
            top: -8px;
            right: -8px;
            color: rgba(196, 0, 122, 0.20);
            font-size: 0.75rem;
            line-height: 1;
            font-weight: 700;
            transition: color 0.3s ease;
        }

        .search-card:hover .search-card-number {
            color: rgba(196, 0, 122, 0.40);
        }

        /* Content */
        .search-card h3 {
            margin: 0 0 12px;
            color: #111827;
            font-size: 1.25rem;
            line-height: 1.35;
            font-weight: 700;
            transition: color 0.3s ease;
        }

        .search-card:hover h3 {
            color: #C4007A;
        }

        .search-card p {
            margin: 0;
            color: #4B5563;
            font-size: 0.875rem;
            line-height: 1.65;
        }

        /* Learn more */
        .search-learn-more {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            gap: 4px;
            margin-top: 16px;
            padding-top: 16px;
            border-top: 1px solid rgba(196, 0, 122, 0.05);
            color: #C4007A;
            font-size: 0.875rem;
            font-weight: 600;
            text-decoration: none;
            transition: gap 0.3s ease, color 0.3s ease;
        }

        .search-learn-more:hover {
            gap: 8px;
            color: #A3005F;
        }

        .search-learn-more svg {
            width: 16px;
            height: 16px;
            transition: transform 0.3s ease;
        }

        .search-card:hover .search-learn-more svg {
            transform: translateX(4px);
        }

        /* CTA */
        .search-center-cta {
            margin-top: 48px;
            text-align: center;
        }

        .search-center-cta .search-quote-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 14px 32px;
            border-radius: 999px;
            background: linear-gradient(
                to right,
                #C4007A,
                #E0398F
            );
            color: #fff;
            font-size: 1rem;
            font-weight: 700;
            text-decoration: none;
            box-shadow: 0 10px 25px rgba(196, 0, 122, 0.25);
            transition:
                transform 0.3s ease,
                box-shadow 0.3s ease;
        }

        .search-center-cta .search-quote-btn:hover {
            transform: scale(1.02);
            box-shadow: 0 14px 30px rgba(196, 0, 122, 0.35);
        }

        .search-quote-btn svg {
            width: 16px;
            height: 16px;
        }

        /* Bottom decoration */
        .search-bottom-decoration {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-top: 40px;
        }

        .search-bottom-line {
            width: 48px;
            height: 1px;
        }

        .search-bottom-line.left {
            background: linear-gradient(
                to right,
                transparent,
                rgba(196, 0, 122, 0.30)
            );
        }

        .search-bottom-line.right {
            background: linear-gradient(
                to left,
                transparent,
                rgba(196, 0, 122, 0.30)
            );
        }

        .search-bottom-dots {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .search-bottom-dots span {
            display: block;
            width: 6px;
            height: 6px;
            border-radius: 999px;
            background: rgba(196, 0, 122, 0.20);
        }

        .search-bottom-dots span.active {
            width: 24px;
            background: #C4007A;
        }

        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 1024px) {
            .search-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 24px;
            }

            .search-card {
                padding: 24px;
            }

            .search-section-header {
                margin-bottom: 40px;
            }
        }

        @media (max-width: 767px) {
            .search-visibility-section {
                padding: 34px 0 28px;
            }

            .search-bg-diamond {
                top: 40px;
                left: 20px;
                width: 80px;
                height: 80px;
            }

            .search-bg-circle {
                bottom: 40px;
                right: 20px;
                width: 96px;
                height: 96px;
            }

            .search-section-header {
                margin-bottom: 32px;
            }

            .search-section-pill {
                gap: 6px;
                padding: 6px 10px;
                margin-bottom: 12px;
                font-size: 0.625rem;
            }

            .search-section-pill svg {
                width: 12px;
                height: 12px;
            }

            .search-visibility-wrap h2 {
                font-size: clamp(1.75rem, 8vw, 2.25rem);
            }

            .search-heading-highlight svg {
                bottom: -5px;
            }

            .search-visibility-intro {
                margin-top: 8px;
                font-size: 0.75rem;
            }

            .search-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .search-card {
                padding: 20px;
                border-radius: 16px;
            }

            .search-icon-wrap {
                margin-bottom: 16px;
            }

            .search-icon-box {
                width: 44px;
                height: 44px;
                border-radius: 10px;
            }

            .search-icon-box svg {
                width: 18px;
                height: 18px;
            }

            .search-card h3 {
                margin-bottom: 8px;
                font-size: 1rem;
            }

            .search-card p {
                font-size: 0.75rem;
            }

            .search-learn-more {
                margin-top: 12px;
                padding-top: 12px;
                font-size: 0.75rem;
            }

            .search-learn-more svg {
                width: 14px;
                height: 14px;
            }

            .search-center-cta {
                margin-top: 32px;
            }

            .search-center-cta .search-quote-btn {
                padding: 10px 20px;
                font-size: 0.75rem;
            }

            .search-quote-btn svg {
                width: 14px;
                height: 14px;
            }

            .search-bottom-decoration {
                gap: 8px;
                margin-top: 32px;
            }

            .search-bottom-line {
                width: 32px;
            }

            .search-bottom-dots {
                gap: 3px;
            }

            .search-bottom-dots span {
                width: 4px;
                height: 4px;
            }

            .search-bottom-dots span.active {
                width: 16px;
            }
        }
    </style>

    <section class="search-visibility-section">

        <!-- Decorative Background -->
        <div class="search-bg">

            <div class="search-bg-glow-top"></div>
            <div class="search-bg-glow-bottom"></div>

            <svg
                class="search-bg-diamond"
                viewBox="0 0 100 100"
                aria-hidden="true"
            >
                <rect
                    x="15"
                    y="15"
                    width="70"
                    height="70"
                    fill="none"
                    stroke="#C4007A"
                    stroke-width="2"
                    transform="rotate(45 50 50)"
                />
            </svg>

            <svg
                class="search-bg-circle"
                viewBox="0 0 100 100"
                aria-hidden="true"
            >
                <circle
                    cx="50"
                    cy="50"
                    r="35"
                    fill="none"
                    stroke="#C4007A"
                    stroke-width="1.5"
                />
                <circle
                    cx="50"
                    cy="50"
                    r="25"
                    fill="none"
                    stroke="#C4007A"
                    stroke-width="1.5"
                />
            </svg>

        </div>

        <div class="container search-visibility-wrap">

            <!-- Header -->
            <div class="search-section-header">

                <div class="search-section-pill">
                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        aria-hidden="true"
                    >
                        <path d="M12 3l1.9 5.8H20l-4.9 3.6 1.9 5.8-5-3.6-5 3.6 1.9-5.8L4 8.8h6.1z"/>
                    </svg>

                    <span>Search Visibility</span>
                </div>

                <h2>
                    Increase Your Business's
                    <span class="search-heading-highlight">
                        Search Visibility

                        <svg
                            viewBox="0 0 300 6"
                            preserveAspectRatio="none"
                            aria-hidden="true"
                        >
                            <path d="M2 3C60 1 240 1 298 3" />
                        </svg>
                    </span>
                </h2>

                <p class="search-visibility-intro">
                    Target the right audience at the right time with our comprehensive
                    search engine optimization strategies.
                </p>

            </div>

            <!-- Services -->
            <div class="search-grid">

                <?php foreach ($services as $service): ?>

                    <article class="search-card">

                        <div class="search-card-content">

                            <!-- Icon -->
                            <div class="search-icon-wrap">

                                <span class="search-icon-box">

                                    <?php if ($service['icon'] === 'map-pin'): ?>

                                        <svg viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M20 10c0 5-8 12-8 12S4 15 4 10a8 8 0 1 1 16 0Z"/>
                                            <circle cx="12" cy="10" r="2.5"/>
                                        </svg>

                                    <?php elseif ($service['icon'] === 'flag'): ?>

                                        <svg viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M5 22V4"/>
                                            <path d="M5 4c5-3 9 3 14 0v10c-5 3-9-3-14 0"/>
                                        </svg>

                                    <?php elseif ($service['icon'] === 'globe'): ?>

                                        <svg viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="10"/>
                                            <path d="M2 12h20"/>
                                            <path d="M12 2c3 3 4 6 4 10s-1 7-4 10"/>
                                            <path d="M12 2c-3 3-4 6-4 10s1 7 4 10"/>
                                        </svg>

                                    <?php elseif ($service['icon'] === 'shopping-cart'): ?>

                                        <svg viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <circle cx="9" cy="20" r="1"/>
                                            <circle cx="19" cy="20" r="1"/>
                                            <path d="M3 4h2l2.5 11h10L20 7H6"/>
                                        </svg>

                                    <?php elseif ($service['icon'] === 'rocket'): ?>

                                        <svg viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M4.5 16.5c-1.5 1.5-2 4-2 4s2.5-.5 4-2l2-2"/>
                                            <path d="M15 5l4 4"/>
                                            <path d="M13 7c-3 1-5 3-7 6l5 5c3-2 5-4 6-7l-4-4Z"/>
                                            <path d="M8 15l-3 3"/>
                                            <path d="M16 8l3-3"/>
                                        </svg>

                                    <?php elseif ($service['icon'] === 'shield'): ?>

                                        <svg viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M12 3l8 4v5c0 5-3.5 8-8 9-4.5-1-8-4-8-9V7l8-4Z"/>
                                            <path d="m9 12 2 2 4-4"/>
                                        </svg>

                                    <?php endif; ?>

                                </span>

                                <span class="search-card-number">
                                    <?= htmlspecialchars($service['number']) ?>
                                </span>

                            </div>

                            <!-- Content -->
                            <h3>
                                <?= htmlspecialchars($service['title']) ?>
                            </h3>

                            <p>
                                <?= htmlspecialchars($service['text']) ?>
                            </p>

                            <!-- Learn More -->
                            <a
                                href="/services"
                                class="search-learn-more"
                            >
                                <span>Learn More</span>

                                <svg
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    aria-hidden="true"
                                >
                                    <path d="M5 12h14"/>
                                    <path d="m13 6 6 6-6 6"/>
                                </svg>
                            </a>

                        </div>

                    </article>

                <?php endforeach; ?>

            </div>

            <!-- CTA -->
            <div class="search-center-cta">

                <a
                    href="/contact"
                    class="search-quote-btn"
                >
                    <span>REQUEST FREE QUOTE</span>

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        aria-hidden="true"
                    >
                        <path d="M5 12h14"/>
                        <path d="m13 6 6 6-6 6"/>
                    </svg>
                </a>

            </div>

            <!-- Bottom Decoration -->
            <div class="search-bottom-decoration">

                <div class="search-bottom-line left"></div>

                <div class="search-bottom-dots">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span class="active"></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

                <div class="search-bottom-line right"></div>

            </div>

        </div>
    </section>

    <?php
}