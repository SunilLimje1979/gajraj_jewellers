<?php $s = $settings;
$download_link = app_download_url($s);
$title_text = isset($page->meta_title) && $page->meta_title ? $page->meta_title : $title . ' | ' . ($s['shop_name'] ?? 'Multi Gold'); ?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= e($title_text) ?></title>
	<meta name="description"
		content="<?= e(isset($page->meta_description) ? $page->meta_description : ($s['meta_description'] ?? 'Premium jewellery shop app for gold-saving schemes.')) ?>">
	<link rel="canonical" href="<?= current_url() ?>">
	<meta property="og:title" content="<?= e($title_text) ?>">
	<meta property="og:description" content="<?= e($s['meta_description'] ?? '') ?>">
	<meta name="twitter:card" content="summary_large_image">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
	<link rel="stylesheet" href="<?= asset_url('assets/css/site.css?v=5') ?>">
	<style>
		:root {
			--primary-color: <?= e($s['primary_color'] ?? '#7a1538') ?>;
			--secondary-color: <?= e($s['secondary_color'] ?? '#d4af37') ?>;
			--accent-color: <?= e($s['accent_color'] ?? '#f6eee3') ?>;
			--heading-color: <?= e($s['heading_color'] ?? '#22171b') ?>;
			--text-color: <?= e($s['text_color'] ?? '#60545a') ?>;
			--footer-color: <?= e($s['footer_color'] ?? '#1b1114') ?>;
			--button-radius: <?= (int) ($s['button_radius'] ?? 24) ?>px;
			--card-radius: <?= (int) ($s['card_radius'] ?? 8) ?>px
		}
	</style>
</head>

<body>
	<?php if (($s['announcement_enabled'] ?? '1') === '1'): ?>
		<div class="announce"
			style="background:<?= e($s['announcement_bg'] ?? '#7a1538') ?>;color:<?= e($s['announcement_text_color'] ?? '#fff') ?>">
			<a
				href="<?= e($s['announcement_link'] ?? '#download') ?>"><?= e($s['announcement_text'] ?? 'Download our official jewellery app') ?></a>
		</div>
	<?php endif; ?>
	<header class="site-header">
		<a class="brand" href="<?= base_url() ?>"><?php if (!empty($s['logo'])): ?><img
					src="<?= upload_url($s['logo']) ?>"
					alt="<?= e($s['shop_name'] ?? 'Logo') ?>"><?php endif; ?><span><?= e($s['shop_name'] ?? 'Multi Gold') ?></span></a>
		<button class="menu-toggle" aria-label="Menu"><i class="fa-solid fa-bars"></i></button>
		<nav class="nav">
			<?php foreach ($menus as $m): ?><a href="<?= base_url($m->url) ?>"
					target="<?= e($m->target) ?>"><?= e($m->label) ?></a><?php endforeach; ?>
			<a class="btn small" href="<?= e($download_link) ?>">Download App</a>
		</nav>
	</header>
