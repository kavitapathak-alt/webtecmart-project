/**
 * WebTecMart Motion & Interaction Engine 2026
 * Lightweight (~8KB), Framework-free, Hardware-Accelerated Animations
 * Inspired by Framer Motion and modern digital agency physics.
 */

(function () {
    'use strict';

    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    // ============================================================
    // 1. SCROLL REVEAL ENGINE (Framer Motion Staggered Style)
    // ============================================================
    function initScrollReveal() {
        if (prefersReducedMotion) {
            document.querySelectorAll('[data-wtm-reveal], [data-reveal]').forEach(el => {
                el.classList.add('wtm-revealed');
            });
            return;
        }

        // Auto-assign staggered delays to child cards inside containers with data-reveal-stagger
        document.querySelectorAll('[data-reveal-stagger]').forEach(parent => {
            const children = parent.children;
            const baseDelay = parseInt(parent.getAttribute('data-reveal-stagger-base') || '100', 10);
            const step = parseInt(parent.getAttribute('data-reveal-stagger-step') || '90', 10);
            Array.from(children).forEach((child, index) => {
                if (!child.hasAttribute('data-wtm-reveal') && !child.hasAttribute('data-reveal')) {
                    child.setAttribute('data-wtm-reveal', 'fade-up');
                }
                const delayMs = baseDelay + (index * step);
                child.style.transitionDelay = `${delayMs}ms`;
            });
        });

        const revealObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('wtm-revealed');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            root: null,
            threshold: 0.12,
            rootMargin: '0px 0px -40px 0px'
        });

        document.querySelectorAll('[data-wtm-reveal], [data-reveal]').forEach(el => {
            revealObserver.observe(el);
        });
    }

    // ============================================================
    // 2. ANIMATED STATISTICS COUNTER ENGINE
    // ============================================================
    function initCounters() {
        const counterElements = document.querySelectorAll('[data-counter]');
        if (!counterElements.length) return;

        if (prefersReducedMotion) {
            counterElements.forEach(el => {
                const target = el.getAttribute('data-counter');
                const suffix = el.getAttribute('data-counter-suffix') || '';
                const prefix = el.getAttribute('data-counter-prefix') || '';
                el.textContent = `${prefix}${target}${suffix}`;
            });
            return;
        }

        const counterObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.4 });

        counterElements.forEach(el => counterObserver.observe(el));
    }

    function animateCounter(el) {
        const rawTarget = el.getAttribute('data-counter') || '0';
        const target = parseFloat(rawTarget.replace(/[^0-9.]/g, '')) || 0;
        const prefix = el.getAttribute('data-counter-prefix') || '';
        const suffix = el.getAttribute('data-counter-suffix') || '';
        const duration = parseInt(el.getAttribute('data-counter-duration') || '1800', 10);
        const startTime = performance.now();

        // Ease-out cubic: 1 - Math.pow(1 - progress, 3)
        function update(currentTime) {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const easeOutProgress = 1 - Math.pow(1 - progress, 3);
            const currentVal = Math.floor(easeOutProgress * target);

            el.textContent = `${prefix}${currentVal.toLocaleString()}${suffix}`;

            if (progress < 1) {
                requestAnimationFrame(update);
            } else {
                el.textContent = `${prefix}${target.toLocaleString()}${suffix}`;
            }
        }
        requestAnimationFrame(update);
    }

    // ============================================================
    // 3. UNIVERSAL TOUCH-FRIENDLY SLIDER ENGINE (WtmSlider)
    // ============================================================
    class WtmSlider {
        constructor(container, options = {}) {
            this.container = typeof container === 'string' ? document.querySelector(container) : container;
            if (!this.container) return;

            this.track = this.container.querySelector('.wtm-slider-track') || this.container.firstElementChild;
            if (!this.track) return;

            this.slides = Array.from(this.track.children);
            if (!this.slides.length) return;

            this.options = Object.assign({
                perView: { mobile: 1, tablet: 2, desktop: 3 },
                autoplay: true,
                autoplayDelay: 5000,
                loop: true,
                gap: 24,
                prevBtn: null,
                nextBtn: null,
                dotsWrap: null
            }, options);

            this.currentIndex = 0;
            this.autoTimer = null;
            this.isPointerDown = false;
            this.startX = 0;
            this.currentTranslate = 0;
            this.prevTranslate = 0;

            this.init();
        }

        getVisibleCount() {
            const width = window.innerWidth;
            if (width < 640) return this.options.perView.mobile || 1;
            if (width < 1024) return this.options.perView.tablet || 2;
            return this.options.perView.desktop || 3;
        }

        getMaxIndex() {
            const count = this.getVisibleCount();
            return Math.max(0, this.slides.length - count);
        }

        init() {
            this.container.style.overflow = 'hidden';
            this.container.style.position = 'relative';
            this.track.style.display = 'flex';
            this.track.style.transition = 'transform 0.5s cubic-bezier(0.16, 1, 0.3, 1)';
            this.track.style.willChange = 'transform';

            this.updateLayout();
            this.bindEvents();
            this.renderDots();
            this.updateControls();

            if (this.options.autoplay && !prefersReducedMotion) {
                this.startAutoplay();
            }
        }

        updateLayout() {
            const visible = this.getVisibleCount();
            const gap = this.options.gap;
            const containerWidth = this.container.clientWidth;
            const slideWidth = (containerWidth - (gap * (visible - 1))) / visible;

            this.slideWidth = slideWidth;
            this.track.style.gap = `${gap}px`;

            this.slides.forEach(slide => {
                slide.style.flex = `0 0 ${slideWidth}px`;
                slide.style.width = `${slideWidth}px`;
                slide.style.boxSizing = 'border-box';
            });

            this.moveTo(this.currentIndex, false);
        }

        moveTo(index, animate = true) {
            const max = this.getMaxIndex();
            this.currentIndex = Math.max(0, Math.min(index, max));
            const offset = (this.slideWidth + this.options.gap) * this.currentIndex;

            this.track.style.transition = animate ? 'transform 0.5s cubic-bezier(0.16, 1, 0.3, 1)' : 'none';
            this.track.style.transform = `translateX(-${offset}px)`;

            this.updateControls();
            this.updateActiveDots();
        }

        next() {
            const max = this.getMaxIndex();
            if (this.currentIndex >= max) {
                if (this.options.loop) {
                    this.moveTo(0);
                }
            } else {
                this.moveTo(this.currentIndex + 1);
            }
        }

        prev() {
            const max = this.getMaxIndex();
            if (this.currentIndex <= 0) {
                if (this.options.loop) {
                    this.moveTo(max);
                }
            } else {
                this.moveTo(this.currentIndex - 1);
            }
        }

        bindEvents() {
            window.addEventListener('resize', () => {
                clearTimeout(this.resizeTimeout);
                this.resizeTimeout = setTimeout(() => this.updateLayout(), 150);
            });

            // Navigation Buttons
            if (this.options.prevBtn) {
                const btn = typeof this.options.prevBtn === 'string' ? document.querySelector(this.options.prevBtn) : this.options.prevBtn;
                if (btn) btn.addEventListener('click', () => { this.pauseAutoplay(); this.prev(); });
            }
            if (this.options.nextBtn) {
                const btn = typeof this.options.nextBtn === 'string' ? document.querySelector(this.options.nextBtn) : this.options.nextBtn;
                if (btn) btn.addEventListener('click', () => { this.pauseAutoplay(); this.next(); });
            }

            // Hover & Focus Pause
            this.container.addEventListener('mouseenter', () => this.stopAutoplay());
            this.container.addEventListener('mouseleave', () => this.resumeAutoplay());
            this.container.addEventListener('focusin', () => this.stopAutoplay());
            this.container.addEventListener('focusout', () => this.resumeAutoplay());

            // Touch / Pointer Swipe Gestures
            this.track.addEventListener('pointerdown', (e) => this.onPointerDown(e));
            window.addEventListener('pointermove', (e) => this.onPointerMove(e));
            window.addEventListener('pointerup', () => this.onPointerUp());
            window.addEventListener('pointercancel', () => this.onPointerUp());
        }

        onPointerDown(e) {
            this.isPointerDown = true;
            this.startX = e.clientX;
            this.pauseAutoplay();
        }

        onPointerMove(e) {
            if (!this.isPointerDown) return;
            const diffX = e.clientX - this.startX;
            // threshold drag feel
            if (Math.abs(diffX) > 10) {
                e.preventDefault();
            }
        }

        onPointerUp(e) {
            if (!this.isPointerDown) return;
            this.isPointerDown = false;
        }

        renderDots() {
            if (!this.options.dotsWrap) return;
            const wrap = typeof this.options.dotsWrap === 'string' ? document.querySelector(this.options.dotsWrap) : this.options.dotsWrap;
            if (!wrap) return;

            const max = this.getMaxIndex();
            wrap.innerHTML = '';
            for (let i = 0; i <= max; i++) {
                const dot = document.createElement('button');
                dot.className = `wtm-slider-dot ${i === this.currentIndex ? 'active' : ''}`;
                dot.setAttribute('type', 'button');
                dot.setAttribute('aria-label', `Go to slide ${i + 1}`);
                dot.addEventListener('click', () => {
                    this.pauseAutoplay();
                    this.moveTo(i);
                });
                wrap.appendChild(dot);
            }
        }

        updateActiveDots() {
            if (!this.options.dotsWrap) return;
            const wrap = typeof this.options.dotsWrap === 'string' ? document.querySelector(this.options.dotsWrap) : this.options.dotsWrap;
            if (!wrap) return;
            const dots = wrap.querySelectorAll('.wtm-slider-dot');
            dots.forEach((dot, index) => {
                dot.classList.toggle('active', index === this.currentIndex);
            });
        }

        updateControls() {
            const max = this.getMaxIndex();
            if (this.options.prevBtn) {
                const btn = typeof this.options.prevBtn === 'string' ? document.querySelector(this.options.prevBtn) : this.options.prevBtn;
                if (btn && !this.options.loop) btn.disabled = this.currentIndex <= 0;
            }
            if (this.options.nextBtn) {
                const btn = typeof this.options.nextBtn === 'string' ? document.querySelector(this.options.nextBtn) : this.options.nextBtn;
                if (btn && !this.options.loop) btn.disabled = this.currentIndex >= max;
            }
        }

        startAutoplay() {
            this.stopAutoplay();
            this.autoTimer = setInterval(() => {
                this.next();
            }, this.options.autoplayDelay);
        }

        stopAutoplay() {
            if (this.autoTimer) {
                clearInterval(this.autoTimer);
                this.autoTimer = null;
            }
        }

        pauseAutoplay() {
            this.stopAutoplay();
            clearTimeout(this.resumeTimer);
            this.resumeTimer = setTimeout(() => {
                if (this.options.autoplay && !prefersReducedMotion) {
                    this.startAutoplay();
                }
            }, 8000);
        }

        resumeAutoplay() {
            if (this.options.autoplay && !prefersReducedMotion) {
                this.startAutoplay();
            }
        }
    }

    // Expose global WtmSlider
    window.WtmSlider = WtmSlider;

    // ============================================================
    // 4. BOOTSTRAP INITIALIZATION ON DOM READY
    // ============================================================
    function init() {
        initScrollReveal();
        initCounters();

        // Auto-initialize testimonials slider if present
        const testiWrap = document.querySelector('#testimonials-slider-wrap');
        if (testiWrap) {
            new WtmSlider(testiWrap, {
                perView: { mobile: 1, tablet: 2, desktop: 3 },
                prevBtn: '#testi-prev-btn',
                nextBtn: '#testi-next-btn',
                dotsWrap: '#testi-dots-wrap',
                autoplay: true,
                autoplayDelay: 6000,
                loop: true,
                gap: 28
            });
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
