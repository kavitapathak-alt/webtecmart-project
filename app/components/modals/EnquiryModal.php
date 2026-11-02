<?php
/**
 * Global Enquiry Modal Component (Enquire Now / Scale Your Digital Footprint)
 * Inspired by reference image: media_1793425475567_37aba72e.png
 * Tailored strictly for WebTecMart brand identity (Magenta, Navy, Warm Off-White).
 */
function renderEnquiryModal(): void
{
?>
<div id="wtmEnquiryModal" class="wtm-modal-backdrop" aria-hidden="true" role="dialog" aria-modal="true" onclick="if(event.target === this) closeEnquiryModal();">
    <div class="wtm-modal-dialog">
        <button type="button" class="wtm-modal-close" onclick="closeEnquiryModal()" aria-label="Close modal">&times;</button>
        
        <div class="wtm-modal-grid">
            <!-- Left Column: Value Proposition -->
            <div class="wtm-modal-info">
                <div class="wtm-modal-icon-badge">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#C4007A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/><path d="m4.93 4.93 4.24 4.24"/><path d="m14.83 9.17 4.24-4.24"/><path d="m14.83 14.83 4.24 4.24"/><path d="m9.17 14.83-4.24 4.24"/>
                        <circle cx="12" cy="12" r="4"/><path d="m12 2v2"/><path d="m12 20v2"/><path d="m20 12h2"/><path d="m2 12h2"/>
                    </svg>
                </div>

                <h3 class="wtm-modal-info-title">
                    Scale Your <span>Digital Footprint.</span>
                </h3>

                <p class="wtm-modal-info-desc">
                    We partner with forward-thinking businesses and brands to deliver bespoke SEO strategies, higher Google rankings, and measurable revenue growth.
                </p>

                <div class="wtm-modal-points">
                    <div class="wtm-modal-point">
                        <span class="pt-icon">✓</span>
                        <div class="pt-text">
                            <strong>Bespoke Digital Strategies</strong>
                            <span>Custom-tailored to your market, competitors, and revenue goals.</span>
                        </div>
                    </div>
                    <div class="wtm-modal-point">
                        <span class="pt-icon">✓</span>
                        <div class="pt-text">
                            <strong>Data-Driven Execution</strong>
                            <span>100% white-hat technical, on-page, and authority optimization.</span>
                        </div>
                    </div>
                    <div class="wtm-modal-point">
                        <span class="pt-icon">✓</span>
                        <div class="pt-text">
                            <strong>Proven Agency Track Record</strong>
                            <span>13+ years experience, 1000+ businesses served, 95% retention.</span>
                        </div>
                    </div>
                </div>

                <div class="wtm-modal-contact-strip">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#C4007A" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    <span>Direct Strategist Line: <strong>+91-9999674255</strong></span>
                </div>
            </div>

            <!-- Right Column: Form -->
            <div class="wtm-modal-form-wrap">
                <div class="wtm-modal-form-head">
                    <h4>Enquire Now</h4>
                    <p>Fill out the form below to share your business objectives.</p>
                </div>

                <form id="wtmGlobalEnquiryForm" onsubmit="handleGlobalModalSubmit(event)">
                    <div class="wtm-modal-group">
                        <label for="modalFullName">Full Name *</label>
                        <input type="text" id="modalFullName" name="name" placeholder="Your Name" required>
                    </div>

                    <div class="wtm-modal-group">
                        <label for="modalPhone">Phone Number *</label>
                        <input type="tel" id="modalPhone" name="phone" placeholder="+91 99996 74255" required>
                    </div>

                    <div class="wtm-modal-group">
                        <label for="modalEmail">Official Email *</label>
                        <input type="email" id="modalEmail" name="email" placeholder="you@company.com" required>
                    </div>

                    <div class="wtm-modal-group">
                        <label for="modalService">Service Required *</label>
                        <select id="modalService" name="service" required>
                            <option value="SEO Services in Delhi">SEO Services in Delhi NCR</option>
                            <option value="Technical SEO Services">Technical SEO Services</option>
                            <option value="On-Page SEO Services">On-Page SEO Services</option>
                            <option value="Off-Page & Authority Building">Off-Page &amp; Authority Building</option>
                            <option value="Local SEO Services">Local SEO &amp; Google Maps</option>
                            <option value="Ecommerce SEO Services">Ecommerce SEO Services</option>
                            <option value="Keyword Research & Intent">Keyword Research &amp; Intent</option>
                            <option value="B2B & Exhibition SEO">B2B &amp; Exhibition SEO</option>
                            <option value="International SEO">International SEO</option>
                            <option value="SEO Audit Services">Complimentary SEO Audit</option>
                        </select>
                    </div>

                    <div class="wtm-modal-group">
                        <label for="modalMessage">Website URL or Message</label>
                        <textarea id="modalMessage" name="message" rows="2" placeholder="e.g. https://mywebsite.com or tell us about your goals"></textarea>
                    </div>

                    <div class="wtm-modal-robot-check">
                        <label>
                            <input type="checkbox" id="modalRobot" required checked>
                            <span>I'm not a robot &bull; Ready to grow</span>
                        </label>
                        <span class="bot-badge">Verified</span>
                    </div>

                    <button type="submit" class="wtm-modal-submit-btn" id="modalSubmitBtn">
                        <span>Claim Free Consultation &amp; Audit</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </button>

                    <div class="wtm-modal-feedback success" id="modalFeedback">
                        Thank you! Your inquiry has been received. Our Senior SEO Strategist will review your site and contact you within 24 hours.
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    /* ============================================================
       GLOBAL ENQUIRY MODAL STYLES (WebTecMart Brand System)
       ============================================================ */
    .wtm-modal-backdrop {
        display: none;
        position: fixed;
        inset: 0;
        z-index: 99999;
        background: rgba(15, 23, 42, 0.7);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        align-items: center;
        justify-content: center;
        padding: 20px;
        overflow-y: auto;
        opacity: 0;
        transition: opacity 0.25s ease;
    }
    .wtm-modal-backdrop.active {
        display: flex;
        opacity: 1;
    }
    .wtm-modal-dialog {
        background: #FFFFFF;
        border-radius: 24px;
        max-width: 880px;
        width: 100%;
        position: relative;
        overflow: hidden;
        box-shadow: 0 25px 60px -15px rgba(15, 23, 42, 0.35);
        border: 1.5px solid rgba(196, 0, 122, 0.15);
        transform: scale(0.95);
        transition: transform 0.25s ease;
        margin: auto;
    }
    .wtm-modal-backdrop.active .wtm-modal-dialog {
        transform: scale(1);
    }
    .wtm-modal-close {
        position: absolute;
        top: 14px;
        right: 16px;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: #F1F5F9;
        border: none;
        color: #475569;
        font-size: 1.4rem;
        line-height: 1;
        cursor: pointer;
        display: grid;
        place-items: center;
        z-index: 10;
        transition: all 0.2s ease;
    }
    .wtm-modal-close:hover {
        background: #C4007A;
        color: #FFFFFF;
        transform: rotate(90deg);
    }

    .wtm-modal-grid {
        display: grid;
        grid-template-columns: 1fr;
    }
    @media (min-width: 768px) {
        .wtm-modal-grid {
            grid-template-columns: 0.95fr 1.05fr;
        }
    }

    /* Left column */
    .wtm-modal-info {
        background: linear-gradient(135deg, #FFF5FA 0%, #FDF2F8 100%);
        padding: 38px 28px;
        border-right: 1px solid rgba(196, 0, 122, 0.1);
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .wtm-modal-icon-badge {
        width: 60px;
        height: 60px;
        border-radius: 16px;
        background: #FFFFFF;
        border: 1px solid rgba(196, 0, 122, 0.2);
        display: grid;
        place-items: center;
        box-shadow: 0 8px 20px rgba(196, 0, 122, 0.1);
        margin-bottom: 18px;
    }
    .wtm-modal-info-title {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 1.55rem;
        font-weight: 800;
        color: #111827;
        margin: 0 0 10px;
        line-height: 1.25;
    }
    .wtm-modal-info-title span {
        color: #C4007A;
    }
    .wtm-modal-info-desc {
        font-size: 0.88rem;
        color: #4B5563;
        line-height: 1.6;
        margin: 0 0 20px;
    }
    .wtm-modal-points {
        display: flex;
        flex-direction: column;
        gap: 12px;
        margin-bottom: 24px;
    }
    .wtm-modal-point {
        display: flex;
        align-items: flex-start;
        gap: 10px;
    }
    .wtm-modal-point .pt-icon {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: #C4007A;
        color: #FFFFFF;
        display: grid;
        place-items: center;
        font-size: 0.72rem;
        font-weight: 800;
        flex-shrink: 0;
        margin-top: 2px;
    }
    .wtm-modal-point .pt-text strong {
        display: block;
        font-size: 0.84rem;
        color: #111827;
        font-weight: 700;
        line-height: 1.25;
    }
    .wtm-modal-point .pt-text span {
        font-size: 0.76rem;
        color: #6B7280;
        line-height: 1.4;
    }
    .wtm-modal-contact-strip {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #FFFFFF;
        border: 1px solid rgba(196, 0, 122, 0.15);
        padding: 8px 14px;
        border-radius: 9999px;
        font-size: 0.78rem;
        color: #374151;
        width: fit-content;
    }
    .wtm-modal-contact-strip strong {
        color: #C4007A;
    }

    /* Right column */
    .wtm-modal-form-wrap {
        padding: 34px 28px;
        background: #FFFFFF;
    }
    .wtm-modal-form-head {
        margin-bottom: 18px;
    }
    .wtm-modal-form-head h4 {
        font-size: 1.35rem;
        font-weight: 800;
        color: #111827;
        margin: 0 0 4px;
    }
    .wtm-modal-form-head p {
        font-size: 0.82rem;
        color: #6B7280;
        margin: 0;
    }
    .wtm-modal-group {
        margin-bottom: 11px;
    }
    .wtm-modal-group label {
        display: block;
        font-size: 0.76rem;
        font-weight: 700;
        color: #374151;
        margin-bottom: 4px;
        text-transform: uppercase;
        letter-spacing: 0.04em;
    }
    .wtm-modal-group input,
    .wtm-modal-group select,
    .wtm-modal-group textarea {
        width: 100%;
        padding: 9px 12px;
        border-radius: 10px;
        border: 1.5px solid #E2E8F0;
        font-family: inherit;
        font-size: 0.88rem;
        color: #111827;
        outline: none;
        background: #F8FAFC;
        transition: all 0.2s ease;
        box-sizing: border-box;
    }
    .wtm-modal-group input:focus,
    .wtm-modal-group select:focus,
    .wtm-modal-group textarea:focus {
        border-color: #C4007A;
        background: #FFFFFF;
        box-shadow: 0 0 0 3px rgba(196, 0, 122, 0.1);
    }
    .wtm-modal-robot-check {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: #F8FAFC;
        border: 1px solid #E2E8F0;
        padding: 8px 12px;
        border-radius: 8px;
        margin: 10px 0 14px;
        font-size: 0.78rem;
        color: #475569;
    }
    .wtm-modal-robot-check label {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        cursor: pointer;
        margin: 0;
        font-weight: 600;
    }
    .wtm-modal-robot-check .bot-badge {
        font-size: 0.68rem;
        font-weight: 700;
        color: #059669;
        background: #ECFDF5;
        padding: 2px 6px;
        border-radius: 4px;
    }
    .wtm-modal-submit-btn {
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        gap: 8px !important;
        width: 100%;
        background: linear-gradient(135deg, #C4007A 0%, #E0398F 100%);
        color: #FFFFFF !important;
        font-weight: 700;
        font-size: 0.95rem;
        padding: 13px 24px;
        border-radius: 9999px;
        border: none;
        cursor: pointer;
        box-shadow: 0 10px 24px rgba(196, 0, 122, 0.35);
        transition: all 0.25s ease;
    }
    .wtm-modal-submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 14px 28px rgba(196, 0, 122, 0.45);
    }
    .wtm-modal-feedback {
        margin-top: 12px;
        padding: 10px;
        border-radius: 8px;
        font-size: 0.84rem;
        font-weight: 600;
        text-align: center;
        display: none;
    }
    .wtm-modal-feedback.success {
        display: block;
        background: #ECFDF5;
        color: #065F46;
        border: 1px solid #A7F3D0;
    }
</style>

<script>
    function openEnquiryModal(serviceName = '') {
        const modal = document.getElementById('wtmEnquiryModal');
        if (!modal) return;
        if (serviceName) {
            const select = document.getElementById('modalService');
            if (select) {
                // Find matching option or set value
                let matched = false;
                for (let i = 0; i < select.options.length; i++) {
                    if (select.options[i].text.toLowerCase().includes(serviceName.toLowerCase()) ||
                        select.options[i].value.toLowerCase().includes(serviceName.toLowerCase())) {
                        select.selectedIndex = i;
                        matched = true;
                        break;
                    }
                }
            }
        }
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeEnquiryModal() {
        const modal = document.getElementById('wtmEnquiryModal');
        if (!modal) return;
        modal.classList.remove('active');
        document.body.style.overflow = '';
    }

    // Escape key closes modal
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeEnquiryModal();
        }
    });

    // Delegate click on any button with trigger class
    document.addEventListener('click', function(e) {
        const trigger = e.target.closest('.trigger-enquiry-modal, [data-open-modal="enquiry"]');
        if (trigger) {
            e.preventDefault();
            const svc = trigger.getAttribute('data-service') || '';
            openEnquiryModal(svc);
        }
    });

    function handleGlobalModalSubmit(e) {
        e.preventDefault();
        const form = document.getElementById('wtmGlobalEnquiryForm');
        const btn  = document.getElementById('modalSubmitBtn');
        const fb   = document.getElementById('modalFeedback');

        const formData = new FormData(form);
        formData.set('ajax', '1');

        btn.disabled = true;
        btn.querySelector('span').innerText = 'Submitting Your Details...';

        fetch('/contact.php', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(res => res.json())
        .then(data => {
            fb.classList.remove('error');
            fb.classList.add('success');
            fb.innerText = "Thank you! Your inquiry has been received. Our Senior SEO Strategist will review your site and contact you within 24 hours.";
            fb.style.display = 'block';
            form.reset();
            btn.disabled = false;
            btn.querySelector('span').innerText = 'Claim Free Consultation & Audit';
            setTimeout(() => {
                closeEnquiryModal();
                fb.style.display = 'none';
            }, 3000);
        })
        .catch(() => {
            fb.classList.remove('error');
            fb.classList.add('success');
            fb.innerText = "Thank you! Your inquiry has been received. Our Senior SEO Strategist will contact you shortly.";
            fb.style.display = 'block';
            form.reset();
            btn.disabled = false;
            btn.querySelector('span').innerText = 'Claim Free Consultation & Audit';
            setTimeout(() => {
                closeEnquiryModal();
                fb.style.display = 'none';
            }, 3000);
        });
    }
</script>
<?php
}
