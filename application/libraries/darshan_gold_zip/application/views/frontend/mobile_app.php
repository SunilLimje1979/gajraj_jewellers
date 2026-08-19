<?php $this->load->view('frontend/partials/header'); ?>
<main>
	<section class="app-band grid two">
		<div>
			<p class="eyebrow">Vault App</p>
			<h1><?= e($settings['app_heading'] ?? 'Official jewellery app') ?></h1>
			<p><?= e($settings['app_short_description'] ?? '') ?></p>
			<ul class="checks">
				<li>Your shop is always open. Buy gold anytime, anywhere – powered by secure cloud infrastructure.</li>
				<li>Digital in their phone, physical in your store. Customers can withdraw gold anytime at your store</li>
				<li>Fast. Easy. Trusted UPI-powered, instant, and secure transactions</li>
				<li>Every gram and transaction is secured & ensured. The most trusted digital investment</li>
				<li>Secure today’s price, save smarter. Lock today’s rate instantly and grow your digital wallet</li>
				<li>Regulated, reliable, risk-free. Powered by SEBI/RBI-compliant providers – ensuring trust & legal safety</li>
			</ul>
			<div class="actions"><a class="store" href="<?= e($settings['android_url'] ?? '#') ?>"><i
						class="fa-brands fa-google-play"></i> Play Store</a><a class="store"
					href="<?= e($settings['ios_url'] ?? '#') ?>"><i class="fa-brands fa-apple"></i> App Store</a></div>
		</div>
		<div class="qr-pair"><?php if (!empty($settings['android_qr'])): ?><img
					src="<?= upload_url($settings['android_qr']) ?>"
					alt="Android QR"><?php endif; ?><?php if (!empty($settings['ios_qr'])): ?><img
					src="<?= upload_url($settings['ios_qr']) ?>" alt="iOS QR"><?php endif; ?></div>
	</section>
</main>
<?php $this->load->view('frontend/partials/footer'); ?>