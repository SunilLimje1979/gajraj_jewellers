<?='<?xml version="1.0" encoding="UTF-8"?>'."\n"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<url><loc><?= base_url() ?></loc></url>
<url><loc><?= base_url('about-us') ?></loc></url>
<url><loc><?= base_url('gold-saving-scheme') ?></loc></url>
<url><loc><?= base_url('mobile-app') ?></loc></url>
<url><loc><?= base_url('certificates') ?></loc></url>
<url><loc><?= base_url('contact-us') ?></loc></url>
<?php foreach ($pages as $p): ?><url><loc><?= base_url($p->slug) ?></loc></url><?php endforeach; ?>
</urlset>
