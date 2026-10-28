# WebTecMart Digital Marketing PHP Project

A professional digital marketing agency website built with PHP and SQLite. It includes:

- **Public Pages**:
  - `index.php`: High-converting landing page with consultation form, case studies, partner logos, and dynamic latest blog section.
  - `about.php`: Brand story, milestones, core values, and stats.
  - `services.php`: Complete digital services catalog and interactive services modal.
  - `packages.php`: Transparent package pricing, features, add-ons, and FAQs.
  - `portfolio.php`: SEO case studies and client projects showcase.
  - `blogs.php`: Blog directory with search, category filtering, and clean responsive card layout.
  - `blog.php`: Individual blog article page supporting clean slug and ID routing (`/blog/:slug` or `/blog/:id`), custom `<title>` tags, structured headings, and formatted markdown.
  - `contact.php`: AJAX-enabled lead capture form with instant validation, database logging, and email dispatch.

- **Dedicated Service Pages**:
  - `search-engine-optimization.php`: Comprehensive SEO services, technical audits, on-page optimization, and authority link building.
  - `seo-services-delhi.php`: Geo-targeted, SEO-friendly service page targeting Delhi NCR with schema markup, local reviews, and Delhi locality coverage.
  - `website-design-development.php`: Responsive, mobile-first web design and custom development.
  - `digital-business-branding.php`: Corporate brand identity, logo design, brand positioning, and guidelines.
  - `search-engine-marketing.php`: High-ROI PPC, Google Search, Display, and Performance Max campaigns.
  - `social-media-optimization.php`: Social media branding and engagement across Instagram, Meta, and LinkedIn.
  - `mobile-app-development.php`: Native and hybrid iOS/Android mobile application engineering.
  - `ecommerce-seo.php`: E-Commerce store optimization for Shopify, WooCommerce, and Magento stores.
  - `content-marketing.php`: Topic clusters, B2B case studies, whitepapers, and conversion funnels.
  - `performance-marketing.php`: Full-funnel performance marketing and paid media management.
  - `local-seo.php`: Google Business Profile (GBP) and Google Map 3-Pack optimization.

- **Required Inner & Legal Pages**:
  - `privacy-policy.php`: Complete privacy policy and data protection disclosure.
  - `terms-conditions.php`: Service terms, payment retainers, IP rights, and liability terms.
  - `sitemap.php`: HTML sitemap linking all pages, services, articles, and legal documents.

- **Admin CMS & Lead Management (`admin/`)**:
  - `admin/login.php`: Secure session-based authentication.
  - `admin/dashboard.php`: Real-time analytics, lead metrics, and shortcuts.
  - `admin/leads.php`: View, filter, and export captured website leads.
  - `admin/content.php`: Section-based CMS to manage service cards, blog articles, SEO case studies, and testimonials.

---

## Run Locally

From the project root, start the PHP built-in server with the custom router:

```bash
php -S localhost:8000 router.php
```

Then open in your browser:
[http://localhost:8000](http://localhost:8000)

---

## Admin Access

- **Email**: `admin@webtecmart.com` (or `admin@pixelpulse.digital`)
- **Password**: `admin123`

---

## Contact Form & Email Notifications

Enquiry submissions are automatically saved to SQLite (`storage/site.db`) and logged to `storage/mail.log`.

For live email delivery to `pathakkavita730@gmail.com`:
1. Configure your SMTP mailbox settings in `.env`:
   ```env
   SMTP_HOST=mail.your-domain.com
   SMTP_PORT=587
   SMTP_ENCRYPTION=tls
   SMTP_USERNAME=your-mailbox@your-domain.com
   SMTP_PASSWORD=your-secret-password
   MAIL_FROM_ADDRESS=your-mailbox@your-domain.com
   MAIL_FROM_NAME="WebTecMart Digital"
   CONTACT_NOTIFICATION_EMAIL=pathakkavita730@gmail.com
   ```
2. Run `composer install --no-dev` (PHPMailer is already bundled and preconfigured in `vendor/`).
3. If SMTP is not yet configured, the system logs the full inquiry to SQLite and `storage/mail.log`, ensuring no customer inquiries are ever lost.
