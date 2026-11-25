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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;12..96,800&display=swap" rel="stylesheet">

    <style>
        /* ============================================================
           TESTIMONIALS — "Expo Floor" design
           Magenta (#C4007A) + Gold (#FFB547) + Deep (#7E004E)
           Exhibitor-badge cards, gold stars, gold arrow keys.
           Matches B2B / SEO Delhi / Services / Contact / Blog pages.
        ============================================================ */
        .testi-section {
            --pink: #C4007A;
            --pink2: #E0398F;
            --pink3: #FF7BC0;
            --deep: #7E004E;
            --head: #5E0B45;
            --blush: #FBEAF3;
            --soft: #FFF4FA;
            --gold: #FFB547;
            --mint: #0E9F6E;
            --text: #4A3342;
            --mute: #7A6574;
            --line: rgba(126, 0, 78, .14);

            /* Legacy alias */
            --ink: var(--deep);

            --disp: 'Bricolage Grotesque', 'Plus Jakarta Sans', system-ui, sans-serif;
            position: relative;
            width: 100%;
            padding: 96px 0 88px;
            background:
                radial-gradient(40% 50% at 100% 0%, rgba(255, 181, 71, .28), transparent 70%),
                var(--blush);
            overflow: hidden;
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
        }
        .testi-section *, .testi-section *::before, .testi-section *::after { box-sizing: border-box; }
        .testi-section button:focus-visible { outline: 3px solid var(--gold); outline-offset: 3px; }
        .testi-section ::selection { background: var(--pink); color: #fff; }

        /* Background Elements */
        .testi-bg { position: absolute; inset: 0; pointer-events: none; overflow: hidden; }
        .testi-bg-grid {
            position: absolute; inset: 0;
            background-image: radial-gradient(rgba(126, 0, 78, .08) 1px, transparent 1.2px);
            background-size: 24px 24px;
            -webkit-mask-image: linear-gradient(180deg, #000 40%, transparent 100%);
                    mask-image: linear-gradient(180deg, #000 40%, transparent 100%);
        }
        .testi-bg-blob-1, .testi-bg-blob-2 { position: absolute; border-radius: 50%; filter: blur(80px); }
        .testi-bg-blob-1 { top: 6%; left: -8%; width: 440px; height: 440px; background: rgba(255, 181, 71, .22); }
        .testi-bg-blob-2 { bottom: 4%; right: -8%; width: 380px; height: 380px; background: rgba(196, 0, 122, .16); }

        .testi-container { max-width: 1280px; margin: 0 auto; padding: 0 22px; position: relative; z-index: 2; }

        /* ===== Header ===== */
        .testi-header { text-align: left; max-width: 720px; margin: 0 0 36px; }
        .testi-pill {
            display: inline-flex; align-items: center; gap: 8px;
            margin-bottom: 16px; padding: 0 0 0 14px;
            background: none; border: 0; border-left: 4px solid var(--pink);
            border-radius: 0; box-shadow: none;
            color: var(--pink); font-size: .82rem; font-weight: 800;
            letter-spacing: .06em; text-transform: uppercase;
        }
        .testi-pill svg { width: 14px; height: 14px; color: var(--pink); flex-shrink: 0; }
        .testi-title {
            font-family: var(--disp); font-size: clamp(2rem, 4vw, 3.1rem); font-weight: 800;
            color: var(--head); margin: 0 0 16px; line-height: 1.08; letter-spacing: -.02em;
        }
        .testi-title .accent {
            position: relative; display: inline-block; color: var(--head); padding: 0 .12em;
            background: linear-gradient(transparent 58%, var(--gold) 58% 92%, transparent 92%);
        }
        .testi-title .accent svg { display: none; }
        .testi-subtitle { font-size: 1.02rem; color: var(--mute); margin: 0; line-height: 1.65; max-width: 600px; }
        .testi-header::after {
            content: ''; display: block; width: 84px; height: 7px; margin-top: 22px;
            background: repeating-linear-gradient(90deg, var(--pink) 0 12px, var(--gold) 12px 24px);
        }

        /* ===== Arrow controls ===== */
        .testi-controls-bar { display: flex; justify-content: flex-start; align-items: center; gap: 12px; margin-bottom: 14px; }
        .testi-nav-btn {
            display: grid; place-items: center; width: 50px; height: 50px; border-radius: 12px;
            background: var(--gold); color: var(--deep);
            border: 2px solid var(--deep); cursor: pointer;
            box-shadow: 0 4px 0 var(--deep);
            transition: translate .15s, box-shadow .15s, background .2s, color .2s;
        }
        .testi-nav-btn:hover {
            translate: 0 2px; box-shadow: 0 2px 0 var(--deep);
            background: #fff; color: var(--deep); border-color: var(--deep);
            transform: none;
        }
        .testi-nav-btn:active { translate: 0 4px; box-shadow: 0 0 0 var(--deep); }
        .testi-nav-btn svg { width: 22px; height: 22px; stroke-width: 2.5; }

        /* ===== Slider ===== */
        .testi-slider-outer { width: 100%; overflow: hidden; padding: 30px 0 30px; cursor: grab; }
        .testi-slider-outer:active { cursor: grabbing; }
        .testi-slider-track { display: flex; transition: transform .6s cubic-bezier(.16, 1, .3, 1); will-change: transform; }
        .testi-slide { box-sizing: border-box; flex-shrink: 0; padding: 0 16px; padding-top: 40px; }

        /* Card (visitor badge) */
        .testi-card-box {
            position: relative; display: flex; flex-direction: column; height: 100%;
            background: #fff;
            border: 2px solid var(--deep); border-radius: 18px;
            padding: 52px 28px 26px;
            box-shadow: 6px 6px 0 var(--deep);
            transition: translate .25s ease, box-shadow .25s ease;
        }
        .testi-slide:nth-child(3n+2) .testi-card-box { box-shadow: 6px 6px 0 var(--gold); }
        .testi-slide:nth-child(3n) .testi-card-box { box-shadow: 6px 6px 0 var(--pink); }
        .testi-card-box:hover {
            translate: -3px -3px;
            border-color: var(--deep);
            box-shadow: 10px 10px 0 var(--pink);
            transform: none;
        }

        /* Avatar (visitor photo, pinned like a badge) */
        .testi-avatar {
            position: absolute; top: -38px; left: 26px;
            width: 76px; height: 76px; border-radius: 50%;
            border: 3px solid var(--deep);
            background: var(--blush);
            overflow: hidden;
            box-shadow: 3px 3px 0 var(--gold);
        }
        .testi-avatar img { width: 100%; height: 100%; object-fit: cover; display: block; }

        /* Quote mark */
        .testi-quote-mark {
            position: absolute; top: 14px; right: 22px; pointer-events: none;
            font: 800 5.5rem/1 var(--disp);
            color: transparent;
            -webkit-text-stroke: 2px rgba(126, 0, 78, .28);
        }

        /* Stars */
        .testi-stars { display: flex; gap: 3px; color: var(--gold); margin-bottom: 16px; }
        .testi-stars svg { width: 20px; height: 20px; fill: currentColor; stroke: var(--deep); stroke-width: 1.2; stroke-linejoin: round; }

        .testi-quote-body {
            position: relative; z-index: 2; flex-grow: 1; margin: 0 0 22px;
            font-size: .98rem; color: var(--text); line-height: 1.7; font-weight: 500; overflow-wrap: anywhere;
        }

        /* Author */
        .testi-author-info { margin-top: auto; padding-top: 16px; border-top: 2px dashed rgba(126, 0, 78, .35); }
        .testi-author-name {
            font-family: var(--disp); font-size: 1.2rem; font-weight: 800;
            color: var(--head); margin: 0 0 6px; letter-spacing: -.01em;
        }
        .testi-author-role {
            display: inline-block; padding: 4px 10px; border-radius: 8px;
            background: var(--blush);
            color: var(--pink); font-size: .78rem; font-weight: 800;
        }

        /* ===== Dots (bar pagination) ===== */
        .testi-dots-row { display: flex; justify-content: flex-start; align-items: center; gap: 8px; margin-top: 22px; }
        .wtm-slider-dot {
            width: 44px; height: 6px; border-radius: 0; border: none; padding: 0; cursor: pointer;
            background: rgba(126, 0, 78, .22);
            transition: background .3s ease, width .4s cubic-bezier(.16, 1, .3, 1);
        }
        .wtm-slider-dot:hover { background: rgba(196, 0, 122, .6); }
        .wtm-slider-dot.active { width: 72px; background: var(--pink); box-shadow: none; }

        /* ===== Responsive ===== */
        @media (min-width: 1440px) { .testi-container { max-width: 1320px; } }
        @media (max-width: 768px) {
            .testi-section { padding: 68px 0 64px; }
            .testi-container { padding: 0 16px; }
            .testi-card-box { padding: 48px 22px 22px; box-shadow: 4px 4px 0 var(--deep); }
            .testi-slide:nth-child(3n+2) .testi-card-box { box-shadow: 4px 4px 0 var(--gold); }
            .testi-slide:nth-child(3n) .testi-card-box { box-shadow: 4px 4px 0 var(--pink); }
            .testi-avatar { top: -34px; left: 20px; width: 68px; height: 68px; }
            .testi-quote-mark { font-size: 4rem; top: 12px; right: 18px; }
            .testi-controls-bar { gap: 10px; }
            .testi-nav-btn { width: 46px; height: 46px; }
            .wtm-slider-dot { width: 26px; }
            .wtm-slider-dot.active { width: 44px; }
            .testi-bg-blob-1, .testi-bg-blob-2 { filter: blur(48px); }
        }
        @media (hover: none) {
            .testi-card-box:hover { translate: none; }
        }
        @media (prefers-reduced-motion: reduce) {
            .testi-slider-track, .testi-card-box, .wtm-slider-dot, .testi-nav-btn { transition: none; }
        }
    </style>

    <section class="testi-section" id="testimonialsSection">
        <!-- Background -->
        <div class="testi-bg" aria-hidden="true">
            <div class="testi-bg-grid"></div>
            <div class="testi-bg-blob-1"></div>
            <div class="testi-bg-blob-2"></div>
        </div>

        <div class="testi-container">

            <!-- Section Header -->
            <div class="testi-header" data-wtm-reveal="fade-up">
                <span class="testi-pill">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/></svg>
                    Client Testimonials
                </span>
                <h2 class="testi-title">
                    What Our 
                    <span class="accent">
                        Clients Say
                        <svg viewBox="0 0 300 6" preserveAspectRatio="none">
                            <path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="3" stroke-linecap="round" fill="none" opacity="0.4"/>
                        </svg>
                    </span>
                </h2>
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
                <div class="testi-slider-track wtm-slider-track" id="testi-track">
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

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const track = document.getElementById('testi-track');
            const prevBtn = document.getElementById('testi-prev-btn');
            const nextBtn = document.getElementById('testi-next-btn');
            const dotsWrap = document.getElementById('testi-dots-wrap');
            const sliderOuter = document.getElementById('testimonials-slider-wrap');
            
            if (!track) return;

            const slides = track.querySelectorAll('.testi-slide');
            if (slides.length === 0) return;

            let currentIndex = 0;
            let slidesPerView = 3;
            let totalPages = 1;

            function updateLayout() {
                const width = window.innerWidth;
                if (width < 768) {
                    slidesPerView = 1;
                } else if (width < 1024) {
                    slidesPerView = 2;
                } else {
                    slidesPerView = 3;
                }

                const slideWidth = 100 / slidesPerView;
                slides.forEach(slide => {
                    slide.style.width = slideWidth + '%';
                });

                totalPages = Math.ceil(slides.length / slidesPerView);
                if (currentIndex >= totalPages) currentIndex = Math.max(0, totalPages - 1);

                buildDots();
                goToSlide(currentIndex);
            }

            function buildDots() {
                if (!dotsWrap) return;
                dotsWrap.innerHTML = '';
                for (let i = 0; i < totalPages; i++) {
                    const dot = document.createElement('button');
                    dot.className = 'wtm-slider-dot' + (i === currentIndex ? ' active' : '');
                    dot.setAttribute('aria-label', 'Go to slide group ' + (i + 1));
                    dot.addEventListener('click', () => {
                        currentIndex = i;
                        goToSlide(currentIndex);
                    });
                    dotsWrap.appendChild(dot);
                }
            }

            function goToSlide(index) {
                if (index < 0) index = totalPages - 1;
                if (index >= totalPages) index = 0;
                currentIndex = index;

                const translateX = -(currentIndex * 100);
                track.style.transform = `translateX(${translateX}%)`;

                if (dotsWrap) {
                    const dots = dotsWrap.querySelectorAll('.wtm-slider-dot');
                    dots.forEach((dot, i) => {
                        dot.classList.toggle('active', i === currentIndex);
                    });
                }
            }

            prevBtn?.addEventListener('click', () => {
                goToSlide(currentIndex - 1);
            });

            nextBtn?.addEventListener('click', () => {
                goToSlide(currentIndex + 1);
            });

            // Touch / Drag support
            let isDragging = false;
            let startX = 0;

            sliderOuter.addEventListener('mousedown', (e) => {
                isDragging = true;
                startX = e.pageX;
                sliderOuter.style.cursor = 'grabbing';
            });
            window.addEventListener('mousemove', (e) => {
                if (!isDragging) return;
                const dx = e.pageX - startX;
                if (dx > 50) {
                    goToSlide(currentIndex - 1);
                    isDragging = false;
                } else if (dx < -50) {
                    goToSlide(currentIndex + 1);
                    isDragging = false;
                }
            });
            window.addEventListener('mouseup', () => {
                isDragging = false;
                sliderOuter.style.cursor = 'grab';
            });

            sliderOuter.addEventListener('touchstart', (e) => {
                startX = e.touches[0].pageX;
            }, { passive: true });
            sliderOuter.addEventListener('touchend', (e) => {
                const dx = e.changedTouches[0].pageX - startX;
                if (dx > 50) goToSlide(currentIndex - 1);
                else if (dx < -50) goToSlide(currentIndex + 1);
            }, { passive: true });

            window.addEventListener('resize', updateLayout);
            updateLayout();
        });
    </script>
    <?php
}