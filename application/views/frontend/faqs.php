<?php $this->load->view('frontend/partials/header'); ?>
<main class="page-wrap">
	<header class="page-hero">
		<p class="eyebrow"><?= e($settings['shop_name'] ?? 'Multi Gold') ?></p>
		<h1>Frequently Asked Questions</h1>
	</header>
	<article class="faq-page">
		<div class="faq">
			<?php foreach ($faqs as $f): ?>
				<details>
					<summary><?= e($f->question) ?></summary>
					<p><?= nl2br(e($f->answer)) ?></p>
				</details>
			<?php endforeach; ?>
		</div>
	</article>
</main>
<?php $this->load->view('frontend/partials/footer'); ?>
