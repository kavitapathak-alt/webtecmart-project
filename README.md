# 'WebTecMart Digital Marketing PHP Project

A simple digital marketing agency website built with PHP and SQLite. It includes:

- Home, About, Services, Pricing, Blog, Contact pages
- Lead capture form stored in SQLite database
- Admin login and lead dashboard
- Responsive Bootstrap-like custom styling

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
- admin/leads.php: saved leads list
- storage/site.db: SQLite database

## Notes

This project is intentionally lightweight and easy to extend for real-world use.
