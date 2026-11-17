<?php
require_once __DIR__ . '/functions.php';

$formStatus = $_SESSION['contact_form_status'] ?? '';
unset($_SESSION['contact_form_status']);

$pageMeta = [
    'title' => 'Book an Event Website Demo | WebTecMart',
    'description' => 'Request a personalised demo of WebTecMart event website design, development, and organic SEO services for B2B exhibitions and trade fairs.',
];
require_once __DIR__ . '/app/templates/header.php';
?>

<style>
    .ed-page {
        min-height: calc(100vh - 120px);
        padding: 48px 0 56px;
        background: #FFF8FC;
        color: #1F1B2A;
        font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
    }
    .ed-container {
        width: min(1120px, calc(100% - 40px));
        margin: 0 auto;
    }
    .ed-heading {
        max-width: 760px;
        margin: 0 auto 34px;
        text-align: center;
    }
    .ed-eyebrow {
        display: inline-flex;
        margin-bottom: 14px;
        padding: 6px 14px;
        border: 1px solid rgba(196, 0, 122, 0.2);
        border-radius: 999px;
        background: rgba(196, 0, 122, 0.08);
        color: #C4007A;
        font-size: 0.72rem;
        font-weight: 800;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }
    .ed-heading h1 {
        margin: 0 0 12px;
        color: #111827;
        font-size: clamp(2rem, 4vw, 2.8rem);
        font-weight: 800;
        line-height: 1.15;
        letter-spacing: -0.025em;
    }
    .ed-heading h1 span {
        color: #C4007A;
    }
    .ed-heading p {
        max-width: 680px;
        margin: 0 auto;
        color: #6B7280;
        font-size: 1rem;
        line-height: 1.65;
    }
    .ed-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 22px;
        align-items: stretch;
    }
    @media (min-width: 900px) {
        .ed-grid {
            grid-template-columns: 0.9fr 1.1fr;
            gap: 26px;
        }
    }
    .ed-info,
    .ed-form-card {
        border-radius: 22px;
        padding: 28px;
    }
    .ed-info {
        position: relative;
        overflow: hidden;
        background: linear-gradient(140deg, #26051C, #111827);
        box-shadow: 0 16px 36px rgba(17, 24, 39, 0.16);
        color: #FFFFFF;
    }
    .ed-info::after {
        position: absolute;
        top: -90px;
        right: -80px;
        width: 240px;
        height: 240px;
        border-radius: 50%;
        background: rgba(196, 0, 122, 0.22);
        content: "";
        filter: blur(40px);
        pointer-events: none;
    }
    .ed-info-content {
        position: relative;
        z-index: 1;
    }
    .ed-info h2,
    .ed-form-card h2 {
        margin: 0 0 10px;
        font-size: 1.4rem;
        font-weight: 800;
        line-height: 1.3;
    }
    .ed-info h2 span {
        color: #F4C4DE;
    }
    .ed-info > .ed-info-content > p,
    .ed-form-intro {
        margin: 0 0 22px;
        font-size: 0.92rem;
        line-height: 1.65;
    }
    .ed-info > .ed-info-content > p {
        color: rgba(255, 255, 255, 0.76);
    }
    .ed-benefits {
        display: grid;
        gap: 0;
        margin: 0 0 24px;
        padding: 0;
        list-style: none;
    }
    .ed-benefits li {
        display: flex;
        gap: 10px;
        padding: 13px 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.14);
        color: rgba(255, 255, 255, 0.88);
        font-size: 0.88rem;
        line-height: 1.5;
    }
    .ed-benefits li::before {
        flex: 0 0 auto;
        color: #F4C4DE;
        content: "\2713";
        font-weight: 800;
    }
    .ed-contact-note {
        margin: 0;
        color: rgba(255, 255, 255, 0.72);
        font-size: 0.84rem;
        line-height: 1.6;
    }
    .ed-contact-note a {
        color: #FFFFFF;
        font-weight: 700;
        text-decoration: none;
    }
    .ed-form-card {
        border: 1.5px solid rgba(196, 0, 122, 0.15);
        background: #FFFFFF;
        box-shadow: 0 14px 36px rgba(196, 0, 122, 0.07);
    }
    .ed-form-card h2 {
        color: #111827;
    }
    .ed-form-intro {
        color: #6B7280;
    }
    .ed-status {
        margin: 0 0 18px;
        padding: 12px 14px;
        border-radius: 10px;
        font-size: 0.88rem;
        line-height: 1.5;
    }
    .ed-status.success {
        border: 1px solid #A7F3D0;
        background: #ECFDF5;
        color: #065F46;
    }
    .ed-status.error {
        border: 1px solid #FECACA;
        background: #FEF2F2;
        color: #991B1B;
    }
    .ed-form {
        display: grid;
        gap: 15px;
    }
    .ed-fields {
        display: grid;
        grid-template-columns: 1fr;
        gap: 14px;
    }
    @media (min-width: 600px) {
        .ed-fields {
            grid-template-columns: 1fr 1fr;
        }
    }
    .ed-field {
        display: grid;
        gap: 6px;
    }
    .ed-field label {
        color: #374151;
        font-size: 0.82rem;
        font-weight: 700;
    }
    .ed-field input,
    .ed-field select,
    .ed-field textarea {
        width: 100%;
        min-height: 44px;
        padding: 10px 12px;
        border: 1px solid #E5E7EB;
        border-radius: 10px;
        background: #FAFAFA;
        color: #111827;
        font: inherit;
        font-size: 0.88rem;
    }
    .ed-field textarea {
        min-height: 110px;
        resize: vertical;
    }
    .ed-field input:focus,
    .ed-field select:focus,
    .ed-field textarea:focus {
        border-color: #C4007A;
        outline: 0;
        background: #FFFFFF;
        box-shadow: 0 0 0 3px rgba(196, 0, 122, 0.12);
    }
    .ed-submit {
        display: inline-flex;
        min-height: 48px;
        align-items: center;
        justify-content: center;
        gap: 9px;
        padding: 12px 22px;
        border: 0;
        border-radius: 999px;
        background: linear-gradient(135deg, #C4007A, #E0398F);
        box-shadow: 0 8px 20px rgba(196, 0, 122, 0.22);
        color: #FFFFFF;
        cursor: pointer;
        font: inherit;
        font-size: 0.94rem;
        font-weight: 700;
    }
    .ed-submit:hover {
        box-shadow: 0 12px 26px rgba(196, 0, 122, 0.32);
        transform: translateY(-1px);
    }
    .ed-privacy {
        margin: 0;
        color: #6B7280;
        font-size: 0.75rem;
        line-height: 1.5;
        text-align: center;
    }
    @media (max-width: 575px) {
        .ed-page { padding: 34px 0 42px; }
        .ed-container { width: min(1120px, calc(100% - 28px)); }
        .ed-info,
        .ed-form-card { padding: 22px 18px; }
    }
</style>

<main class="ed-page">
    <div class="ed-container">
        <header class="ed-heading">
            <div class="ed-eyebrow">EVENT WEBSITE DEMO</div>
            <h1>Book a <span>Demo</span></h1>
            <p>Tell us about your event and get a personalised walkthrough of how WebTecMart can help improve your event website, organic visibility and registrations.</p>
        </header>

        <div class="ed-grid" id="demo">
            <section class="ed-info" aria-labelledby="ed-info-title">
                <div class="ed-info-content">
                    <h2 id="ed-info-title">A website built for <span>event growth</span></h2>
                    <p>Explore practical ideas for turning your event website into a stronger platform for discovery, engagement and registrations.</p>
                    <ul class="ed-benefits">
                        <li>Event-focused design for B2B exhibitions and trade fairs</li>
                        <li>Organic SEO foundations built into your website strategy</li>
                        <li>Clear journeys for visitors, exhibitors and sponsors</li>
                        <li>Responsive experiences designed to drive enquiries and registrations</li>
                    </ul>
                    <p class="ed-contact-note">Prefer to speak with us? Call <a href="tel:+919999674255">+91-9999674255</a> or email <a href="mailto:info@webtecmart.com">info@webtecmart.com</a>.</p>
                </div>
            </section>

            <section class="ed-form-card" aria-labelledby="ed-form-title">
                <h2 id="ed-form-title">Tell us about your event</h2>
                <p class="ed-form-intro">Share a few details and our team will contact you to arrange your demo.</p>

                <?php if (in_array($formStatus, ['success', 'email_failed'], true)): ?>
                    <div class="ed-status success" role="status">
                        <?= $formStatus === 'success'
                            ? 'Thanks! Your demo request has been received. Our team will contact you within 24 hours.'
                            : 'Your request was saved, but the email notification could not be sent. Please call us directly.' ?>
                    </div>
                <?php elseif (in_array($formStatus, ['invalid', 'error'], true)): ?>
                    <div class="ed-status error" role="alert">
                        <?= $formStatus === 'invalid'
                            ? 'Please enter your name, phone number and a valid email address.'
                            : 'We could not save your request. Please try again or contact us by phone.' ?>
                    </div>
                <?php endif; ?>

                <form class="ed-form" method="POST" action="/contact.php">
                    <input type="hidden" name="redirect_to" value="/event-website-demo.php#demo">
                    <div class="ed-fields">
                        <div class="ed-field">
                            <label for="ed-name">Full name *</label>
                            <input id="ed-name" type="text" name="name" autocomplete="name" required>
                        </div>
                        <div class="ed-field">
                            <label for="ed-company">Company</label>
                            <input id="ed-company" type="text" name="company" autocomplete="organization">
                        </div>
                        <div class="ed-field">
                            <label for="ed-email">Email address *</label>
                            <input id="ed-email" type="email" name="email" autocomplete="email" required>
                        </div>
                        <div class="ed-field">
                            <label for="ed-phone">Phone number *</label>
                            <input id="ed-phone" type="tel" name="phone" autocomplete="tel" required>
                        </div>
                    </div>
                    <div class="ed-field">
                        <label for="ed-service">What would you like to explore?</label>
                        <select id="ed-service" name="service">
                            <option value="Event Website Demo Request - Design and development">Event website design and development</option>
                            <option value="Event Website Demo Request - SEO">Event website SEO</option>
                            <option value="Event Website Demo Request - Design and SEO">Website design and SEO</option>
                        </select>
                    </div>
                    <div class="ed-field">
                        <label for="ed-message">Tell us about your event</label>
                        <textarea id="ed-message" name="message" placeholder="Event name, dates, industry, or what you would like to improve" required></textarea>
                    </div>
                    <button class="ed-submit" type="submit">
                        Request my demo
                        <span aria-hidden="true">&rarr;</span>
                    </button>
                    <p class="ed-privacy">Your details will only be used to respond to your demo request.</p>
                </form>
            </section>
        </div>
    </div>
</main>

<?php require_once __DIR__ . '/app/templates/footer.php'; ?>
