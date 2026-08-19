# Gold Jewellery App Landing Page and Admin CMS

CodeIgniter 3 landing website and small CMS for a jewellery shop mobile app, gold-saving scheme information, policies, certificates, gallery, testimonials, FAQs, and contact enquiries.

## Requirements

- PHP 7.4 or newer
- MySQL 5.7 or newer / MariaDB 10.3 or newer
- PHP extensions: mysqli, mbstring, gd or imagick, fileinfo, session, zlib
- AVIF conversion: Imagick with AVIF support or PHP GD with `imageavif()`

## Installation

1. Create a MySQL database.
2. Import `gold_landing_page.sql`.
3. Update `application/config/database.php` with hostname, username, password, and database name.
4. Set `$config['base_url']` in `application/config/config.php` if auto-detection is not desired.
5. Ensure these folders are writable: `uploads/` and `application/cache/sessions/`.
6. Point your domain or cPanel document root to this folder.

Default admin:

- URL: `/admin/login`
- Username: `admin`
- Password: `123123`

Change the password immediately from `/admin/change-password`.

## AVIF Check

Run one of these commands on the server:

```bash
php -r "var_dump(function_exists('imageavif'));"
php -r "var_dump(class_exists('Imagick') ? Imagick::queryFormats('AVIF') : []);"
```

If neither returns AVIF support, image uploads will show a clear admin error until GD or Imagick is configured.

## Production Notes

- Replace `$config['encryption_key']` with a long random value.
- Use HTTPS and set `$config['cookie_secure'] = TRUE`.
- Keep `ENVIRONMENT` as `production` in `index.php`.
- Confirm `.htaccess` rewriting is enabled on Apache.
- Keep upload folders protected with the included `uploads/.htaccess`.
