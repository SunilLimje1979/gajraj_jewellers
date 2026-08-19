<?php $this->load->view('frontend/partials/header'); ?>
<main class="page-wrap">
	<header class="page-hero"><p class="eyebrow"><?= e($settings['shop_name'] ?? 'Multi Gold') ?></p><h1><?= e($page->title ?? $title) ?></h1></header>
	<article class="content"><?= $page ? $page->content : '<p>Scheme information will be available soon.</p>' ?></article>
</main>
<?php $this->load->view('frontend/partials/footer'); ?>
