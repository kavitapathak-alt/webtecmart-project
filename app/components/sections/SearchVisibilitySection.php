<?php

function renderSearchVisibilitySection(): void
{
    $content = homepageVisibilityContent();
    $services = $content['services'];
    ?>

    <style>
        /* =========================================================
           SEARCH VISIBILITY SECTION — Black & Hot Pink Theme
        ========================================================= */

        .search-visibility-section {
            position: relative;
            width: 100%;
            padding: 56px 0 44px;
            background: #FFFFFF;
            overflow: hidden;
            border-bottom: 1px solid #EAEAEA;
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
            width: 45%;
            height: 45%;
            background: radial-gradient(circle, rgba(255, 45, 117, 0.05), transparent 70%);
            border-radius: 999px;
            filter: blur(50px);
        }

        .search-bg-glow-bottom {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 35%;
            height: 45%;
            background: radial-gradient(circle, rgba(246, 90, 145, 0.06), transparent 70%);
            border-radius: 999px;
            filter: blur(50px);
        }

        .search-bg-diamond {
            position: absolute;
            top: 80px;
            left: 40px;
            width: 128px;
            height: 128px;
            opacity: 0.12;
        }

        .search-bg-circle {
            position: absolute;
            bottom: 80px;
            right: 40px;
            width: 160px;
            height: 160px;
            opacity: 0.12;
        }

        .search-visibility-wrap {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        /* Header */
        .search-section-header {
            position: relative;
            z-index: 10;
            text-align: center;
            margin-bottom: 38px;
        }

        .search-section-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #FFF2F7;
            border: 1px solid #EAEAEA;
            padding: 6px 16px;
            border-radius: 9999px;
            margin-bottom: 14px;
            color: #FF2D75;
            font-size: 0.74rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .search-section-pill svg {
            width: 13px;
            height: 13px;
            color: #FF2D75;
            flex-shrink: 0;
        }

        .search-visibility-wrap h2 {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            font-size: clamp(1.9rem, 3.4vw, 2.6rem);
            font-weight: 800;
            color: #111111;
            margin: 0 0 12px;
            line-height: 1.2;
            letter-spacing: -0.02em;
        }

        .search-heading-highlight {
            position: relative;
            display: inline-block;
            color: #FF2D75;
        }

        .search-heading-highlight svg {
            position: absolute;
            left: 0;
            bottom: -4px;
            width: 100%;
            height: 6px;
            pointer-events: none;
        }

        .search-heading-highlight path {
            fill: none;
            stroke: #FF2D75;
            stroke-width: 2.5;
            stroke-linecap: round;
            opacity: 0.4;
        }

        .search-visibility-intro {
            font-size: 1rem;
            line-height: 1.6;
            color: #4A4A4A;
            max-width: 640px;
            margin: 0 auto;
        }

        /* Grid */
        .search-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 24px;
        }

        /* Card */
        .search-card {
            position: relative;
            overflow: hidden;
            padding: 30px;
            text-align: left;
            background: #FFFFFF;
            border: 1px solid #EAEAEA;
            border-radius: 20px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.03);
            transition:
                transform 0.4s cubic-bezier(0.16, 1, 0.3, 1),
                box-shadow 0.4s cubic-bezier(0.16, 1, 0.3, 1),
                border-color 0.3s ease;
        }

        .search-card:hover {
            transform: translateY(-6px);
            border-color: #FF2D75;
            box-shadow: 0 16px 36px rgba(255, 45, 117, 0.12);
        }

        /* Hover gradient */
        .search-card::before {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: inherit;
            background: linear-gradient(
                135deg,
                rgba(255, 45, 117, 0.04),
                transparent
            );
            opacity: 0;
            transition: opacity 0.4s ease;
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
            width: 52px;
            height: 52px;
            border-radius: 14px;
            background: #FF2D75;
            color: #FFFFFF;
            box-shadow: 0 6px 18px rgba(255, 45, 117, 0.3);
            transition:
                transform 0.3s ease,
                box-shadow 0.3s ease,
                background 0.3s ease;
        }

        .search-card:hover .search-icon-box {
            transform: scale(1.08);
            background: #F65A91;
            box-shadow: 0 10px 24px rgba(255, 45, 117, 0.4);
        }

        .search-icon-box svg {
            width: 22px;
            height: 22px;
            stroke-width: 2;
        }

        /* Number */
        .search-card-number {
            position: absolute;
            top: -6px;
            right: -6px;
            color: rgba(255, 45, 117, 0.22);
            font-size: 0.85rem;
            line-height: 1;
            font-weight: 800;
            transition: color 0.3s ease;
        }

        .search-card:hover .search-card-number {
            color: #FF2D75;
        }

        /* Content */
        .search-card h3 {
            margin: 0 0 10px;
            color: #111111;
            font-size: 1.22rem;
            line-height: 1.35;
            font-weight: 800;
            transition: color 0.3s ease;
        }

        .search-card:hover h3 {
            color: #FF2D75;
        }

        .search-card p {
            margin: 0;
            color: #4A4A4A;
            font-size: 0.9rem;
            line-height: 1.62;
        }

        /* Learn more */
        .search-learn-more {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            gap: 6px;
            margin-top: 18px;
            padding-top: 16px;
            border-top: 1px solid #EAEAEA;
            color: #FF2D75;
            font-size: 0.9rem;
            font-weight: 700;
            text-decoration: none;
            transition: gap 0.3s ease, color 0.3s ease;
        }

        .search-learn-more:hover {
            gap: 9px;
            color: #111111;
        }

        .search-learn-more svg {
            width: 15px;
            height: 15px;
            transition: transform 0.3s ease;
        }

        .search-card:hover .search-learn-more svg {
            transform: translateX(4px);
        }

        /* CTA */
        .search-center-cta {
            margin-top: 36px;
            text-align: center;
        }

        .search-center-cta .search-quote-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 14px 34px;
            border-radius: 999px;
            background: #FF2D75;
            color: #FFFFFF;
            font-size: 0.95rem;
            font-weight: 700;
            text-decoration: none;
            box-shadow: 0 10px 24px rgba(255, 45, 117, 0.35);
            transition:
                transform 0.3s ease,
                box-shadow 0.3s ease,
                background 0.3s ease;
        }

        .search-center-cta .search-quote-btn:hover {
            background: #F65A91;
            transform: translateY(-2px);
            box-shadow: 0 14px 30px rgba(255, 45, 117, 0.45);
            color: #FFFFFF;
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
            margin-top: 36px;
        }

        .search-bottom-line {
            width: 48px;
            height: 1px;
        }

        .search-bottom-line.left {
            background: linear-gradient(
                to right,
                transparent,
                #EAEAEA
            );
        }

        .search-bottom-line.right {
            background: linear-gradient(
                to left,
                transparent,
                #EAEAEA
            );
        }

        .search-bottom-dots {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .search-bottom-dots span {
            display: block;
            width: 6px;
            height: 6px;
            border-radius: 999px;
            background: #EAEAEA;
        }

        .search-bottom-dots span.active {
            width: 22px;
            background: #FF2D75;
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
                margin-bottom: 22px;
            }
        }

        @media (max-width: 767px) {
            .search-visibility-section {
                padding: 20px 0 22px;
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
            position: relative;
            z-index: 10;
            text-align: center;
            margin-bottom: 22px;
        }

        .search-section-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #FFF2F7;
            border: 1px solid #EAEAEA;
            padding: 5px 14px;
            border-radius: 9999px;
            margin-bottom: 10px;
            color: #FF2D75;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .search-section-pill svg {
            width: 13px;
            height: 13px;
            color: #FF2D75;
            flex-shrink: 0;
        }

        .search-visibility-wrap h2 {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            font-size: clamp(1.85rem, 3.2vw, 2.5rem);
            font-weight: 800;
            color: #111111;
            margin: 0 0 8px;
            line-height: 1.18;
            letter-spacing: -0.02em;
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
                    stroke="#FF2D75"
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
                    stroke="#FF2D75"
                    stroke-width="1.5"
                />
                <circle
                    cx="50"
                    cy="50"
                    r="25"
                    fill="none"
                    stroke="#FF2D75"
                    stroke-width="1.5"
                />
            </svg>

        </div>

        <div class="container search-visibility-wrap">

            <!-- Header -->
            <div class="search-section-header" data-wtm-reveal="fade-up">

                <div class="search-section-pill">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 2l2.4 6.6L21 11l-6.6 2.4L12 20l-2.4-6.6L3 11l6.6-2.4L12 2z"/></svg>

                    <span><?= e((string) $content['badge']) ?></span>
                </div>

                <h2>
                    <?= e((string) $content['heading_prefix']) ?>
                    <span class="search-heading-highlight">
                        <?= e((string) $content['heading_highlight']) ?>

                        <svg
                            viewBox="0 0 300 6"
                            preserveAspectRatio="none"
                            aria-hidden="true"
                        >
                            <path d="M2 3C60 1 240 1 298 3" />
                        </svg>
                    </span>
                </h2>

                <p class="search-visibility-intro"><?= e((string) $content['summary']) ?></p>

            </div>

            <!-- Services -->
            <div class="search-grid" data-reveal-stagger>

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
                                href="<?= e((string) $service['href']) ?>"
                                class="search-learn-more"
                            >
                                <span><?= e((string) $content['learn_more_label']) ?></span>

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
                    href="<?= e((string) $content['quote_href']) ?>"
                    class="search-quote-btn"
                >
                    <span><?= e((string) $content['quote_label']) ?></span>

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