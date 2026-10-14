# 'WebTecMart Digital Marketing PHP Project

A simple digital marketing agency website built with PHP and SQLite. It includes:

- Home, About, Services, Pricing, Blog, Contact pages
- Lead capture form stored in SQLite database
- Admin login and lead dashboard
- Responsive Bootstrap-like custom styling
- Section-based admin content management for services, testimonials, case studies, blog posts, pricing plans, and page content blocks

## Run locally

From the project root, start the PHP built-in server:

php -S localhost:8000

Then open:

http://localhost:8000

## Admin access

- Email: admin@pixelpulse.digital
- Password: admin123

## Contact form email notifications

Contact form submissions are saved to SQLite before an email notification is sent to `info@webtecmart.com` by default. Set `CONTACT_NOTIFICATION_EMAIL` to change the recipient and `CONTACT_FROM_EMAIL` to set the sender address. PHP `mail()` must be configured to use a working SMTP/sendmail transport on the server; a saved lead is retained even if sending the notification fails.

## Files

- index.php: landing page
- about.php: brand story
- services.php: offerings
- pricing.php: package pricing
- blog.php: marketing insights
- contact.php: lead form
- admin/login.php: admin login
- admin/dashboard.php: dashboard overview
- admin/content.php: section-based website content manager (protected by the existing admin session)
- admin/leads.php: saved leads list
- storage/site.db: SQLite database

The Website Content page groups records by the public page/component that consumes them. Homepage sections currently rendered directly by PHP are identified in a read-only section directory; editing those static sections requires changing their existing components.

## Notes

This project is intentionally lightweight and easy to extend for real-world use.
