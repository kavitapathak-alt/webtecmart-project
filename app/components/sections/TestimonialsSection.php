<?php
function renderTestimonialsSection(): void
{
    // ===== Testimonials Data =====
    $testimonials = [
        [
            'name'     => 'Satpal Singh',
            'role'     => 'CEO, TechSolutions India',
            'quote'    => 'Working with the team felt different from day one — clear communication, timely delivery, and results we could actually measure. Our online visibility increased by 200% within 6 months.',
            'image'    => 'https://randomuser.me/api/portraits/men/32.jpg',
            'elevated' => true,
            'rating'   => 5,
        ],
        [
            'name'     => 'Tushar Sharma',
            'role'     => 'Founder, StyleHub Fashion',
            'quote'    => 'They understood exactly what our brand needed and executed it without endless back and forth. Highly recommend the team for anyone looking to grow their digital presence.',
            'image'    => 'https://randomuser.me/api/portraits/men/54.jpg',
            'elevated' => false,
            'rating'   => 5,
        ],
        [
            'name'     => 'Rawat Verma',
            'role'     => 'Director, GreenTech Solutions',
            'quote'    => 'Professional, prompt, and genuinely invested in our growth. The kind of partnership every business hopes to find. Their SEO strategies helped us rank #1 on Google.',
            'image'    => 'https://randomuser.me/api/portraits/men/76.jpg',
            'elevated' => true,
            'rating'   => 5,
        ],
        [
            'name'     => 'Shishir Kumar',
            'role'     => 'Marketing Head, DigitalFirst Agency',
            'quote'    => 'Everything finally feels cohesive. The whole experience was smooth and the results speak for themselves. Our social media engagement increased by 300%.',
            'image'    => 'https://randomuser.me/api/portraits/men/85.jpg',
            'elevated' => false,
            'rating'   => 5,
        ],
        [
            'name'     => 'Priya Patel',
            'role'     => 'Owner, Wellness World',
            'quote'    => 'From website design to digital marketing, they handled everything seamlessly. Their comprehensive solutions saved us time and money. Highly recommended!',
            'image'    => 'https://randomuser.me/api/portraits/women/44.jpg',
            'elevated' => true,
            'rating'   => 5,
        ],
        [
            'name'     => 'Vikram Malhotra',
            'role'     => 'CTO, FinTech Solutions',
            'quote'    => 'The Performance Marketing team is exceptional. They delivered our app on time with all the features we requested. Our users love the experience.',
            'image'    => 'https://randomuser.me/api/portraits/men/91.jpg',
            'elevated' => false,
            'rating'   => 5,
        ],
    ];

    $managedTestimonials = testimonials();
    if (!$managedTestimonials && cmsContentTypeInitialized('testimonial')) {
        return;
    }
    if ($managedTestimonials) {
        $testimonials = array_map(static function (array $item, int $index): array {
            return [
                'name' => $item['name'] ?? $item['title'] ?? 'WebTecMart Client',
                'role' => $item['role'] ?? 'Client',
                'quote' => $item['quote'] ?? $item['summary'] ?? '',
                'image' => $item['image'] ?? 'https://randomuser.me/api/portraits/lego/' . ($index + 1) . '.jpg',
                'elevated' => $index % 2 === 0,
                'rating' => max(1, min(5, (int) ($item['rating'] ?? 5))),
            ];
        }, $managedTestimonials, array_keys($managedTestimonials));
    }
    ?>

    <style>
        /* ============================================================
           MODERN TESTIMONIALS SLIDER SECTION
           ============================================================ */
        .testi-section {
            position: relative;
            width: 100%;
            padding: 72px 0 84px;
            background: #FBF8F1;
            overflow: hidden;
        }
        @media (min-width: 768px) {
            .testi-section { padding: 96px 0 108px; }
        }

        .testi-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 20px;
            position: relative;
            z-index: 2;
        }

        .testi-header {
            text-align: center;
            max-width: 720px;
            margin: 0 auto 52px;
        }
        .testi-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(196, 0, 122, 0.1);
            color: #C4007A;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            padding: 6px 14px;
            border-radius: 9999px;
            margin-bottom: 12px;
        }
        .testi-pill svg { width: 14px; height: 14px; color: #C4007A; }
        .testi-title {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: clamp(2rem, 3.8vw, 2.75rem);
            font-weight: 800;
            color: #111827;
            margin: 0 0 12px;
            line-height: 1.18;
            letter-spacing: -0.02em;
        }
        .testi-title span { color: #C4007A; }
        .testi-subtitle {
            font-size: 1.05rem;
            color: #4B5563;
            margin: 0 auto;
            line-height: 1.65;
        }

        /* Slider Controls Header */
        .testi-controls-bar {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 12px;
            margin-bottom: 24px;
        }
        .testi-nav-btn {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: #FFFFFF;
            border: 1.5px solid #F1E5ED;
            color: #111827;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(0,0,0,0.04);
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .testi-nav-btn:hover {
            background: #C4007A;
            color: #FFFFFF;
            border-color: #C4007A;
            transform: scale(1.08);
            box-shadow: 0 8px 18px rgba(196, 0, 122, 0.3);
        }
        .testi-nav-btn svg { width: 18px; height: 18px; stroke-width: 2.5; }

        /* Carousel Wrapper */
        .testi-slider-outer {
            width: 100%;
            overflow: hidden;
            padding: 36px 0 16px;
        }
        .testi-slider-track {
            display: flex;
            transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: transform;
        }

        /* Testimonial Card */
        .testi-slide {
            box-sizing: border-box;
            flex-shrink: 0;
            padding-top: 28px;
        }
        .testi-card-box {
            background: #FFFFFF;
            border-radius: 24px;
            border: 1.5px solid #F1F4F8;
            padding: 44px 28px 28px;
            box-shadow: 0 8px 24px -4px rgba(17, 24, 39, 0.05);
            position: relative;
            display: flex;
            flex-direction: column;
            height: 100%;
            transition: transform 0.35s ease, box-shadow 0.35s ease, border-color 0.35s ease;
        }
        .testi-card-box:hover {
            transform: translateY(-8px);
            border-color: rgba(196, 0, 122, 0.3);
            box-shadow: 0 20px 35px -8px rgba(196, 0, 122, 0.12);
        }

        /* Avatar floating */
        .testi-avatar {
            position: absolute;
            top: -26px;
            left: 28px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            border: 4px solid #FFFFFF;
            box-shadow: 0 8px 18px rgba(196, 0, 122, 0.2);
            overflow: hidden;
            background: #FCE8F3;
        }
        .testi-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        /* Quote Icon */
        .testi-quote-mark {
            color: #FCE8F3;
            font-size: 3rem;
            line-height: 1;
            position: absolute;
            top: 14px;
            right: 24px;
            pointer-events: none;
            font-family: serif;
        }

        .testi-quote-body {
            font-size: 0.95rem;
            color: #4B5563;
            line-height: 1.7;
            margin: 0 0 24px;
            flex-grow: 1;
            font-style: italic;
        }

        .testi-stars {
            display: flex;
            gap: 4px;
            color: #F59E0B;
            margin-bottom: 14px;
        }
        .testi-stars svg { width: 16px; height: 16px; fill: currentColor; }

        .testi-author-name {
            font-size: 1.1rem;
            font-weight: 700;
            color: #111827;
            margin: 0 0 4px;
        }
        .testi-author-role {
            font-size: 0.825rem;
            color: #C4007A;
            font-weight: 600;
        }

        /* Dots */
        .testi-dots-row {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            margin-top: 36px;
        }
        .wtm-slider-dot {
            width: 10px;
            height: 10px;
            border-radius: 9999px;
            background: #E5D5DF;
            border: none;
            padding: 0;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .wtm-slider-dot.active {
            width: 28px;
            background: #C4007A;
            box-shadow: 0 2px 8px rgba(196, 0, 122, 0.4);
        }
    </style>

    <section class="testi-section" id="testimonialsSection">
        <div class="testi-container">

            <!-- Section Header -->
            <div class="testi-header" data-wtm-reveal="fade-up">
                <span class="testi-pill">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/></svg>
                    Client Testimonials
                </span>
                <h2 class="testi-title">What Our <span class="accent">Clients Say</span></h2>
                <p class="testi-subtitle">Verified feedback from high-growth brands and enterprise partners we've scaled across search, branding &amp; media.</p>
            </div>

            <!-- Arrow Controls -->
            <div class="testi-controls-bar">
                <button type="button" class="testi-nav-btn" id="testi-prev-btn" aria-label="Previous testimonial">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="m15 18-6-6 6-6"/></svg>
                </button>
                <button type="button" class="testi-nav-btn" id="testi-next-btn" aria-label="Next testimonial">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="m9 18 6-6-6-6"/></svg>
                </button>
            </div>

            <!-- Slider Outer Wrap -->
            <div class="testi-slider-outer" id="testimonials-slider-wrap">
                <div class="testi-slider-track wtm-slider-track">
                    <?php foreach ($testimonials as $t): ?>
                        <div class="testi-slide">
                            <div class="testi-card-box">
                                <div class="testi-avatar">
                                    <img src="<?= htmlspecialchars($t['image']) ?>" alt="<?= htmlspecialchars($t['name']) ?>" loading="lazy">
                                </div>
                                <div class="testi-quote-mark">&ldquo;</div>

                                <div class="testi-stars">
                                    <?php for ($s = 0; $s < ($t['rating'] ?? 5); $s++): ?>
                                        <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                    <?php endfor; ?>
                                </div>

                                <p class="testi-quote-body">&ldquo;<?= htmlspecialchars($t['quote']) ?>&rdquo;</p>

                                <div class="testi-author-info">
                                    <h4 class="testi-author-name"><?= htmlspecialchars($t['name']) ?></h4>
                                    <span class="testi-author-role"><?= htmlspecialchars($t['role']) ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Dots -->
            <div class="testi-dots-row" id="testi-dots-wrap"></div>

        </div>
    </section>
    <?php
}
