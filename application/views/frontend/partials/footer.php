<section id="download" class="final-cta">
	<h2>Buy gold anytime, 24/7 with our official mobile app.</h2>
	<p><?= e($settings['app_short_description'] ?? 'Buy gold of any value, track grams credited to your wallet, view transactions, and request withdrawal securely.') ?>
	</p>
	<div class="actions">
		<?php if (($settings['android_enabled'] ?? '1') === '1'): ?><a class="store"
				href="<?= e($settings['android_url'] ?? '#') ?>"><i class="fa-brands fa-google-play"></i> Play
				Store</a><?php endif; ?>
		<?php if (($settings['ios_enabled'] ?? '1') === '1'): ?><a class="store"
				href="<?= e($settings['ios_url'] ?? '#') ?>"><i class="fa-brands fa-apple"></i> App Store</a><?php endif; ?>
	</div>
</section>
<footer class="footer">
	<div><?php if (!empty($settings['full_logo'])): ?><img class="footer-logo"
				src="<?= upload_url($settings['full_logo']) ?>"
				alt="<?= e($settings['shop_name'] ?? 'Logo') ?>"><?php endif; ?>
		<h3><?= e($settings['shop_name'] ?? 'Multi Gold') ?></h3>
		<p><?= e($settings['short_description'] ?? '') ?></p>
	</div>
	<div>
		<h4>Quick Links</h4>
		<a href="<?= base_url('about-us') ?>">About</a>
		<a href="<?= base_url('contact-us') ?>">Contact</a>
		<a href="<?= asset_url('assets/policy/FAQ.pdf') ?>" target="_blank" rel="noopener">FAQs</a>
		<a href="<?= asset_url('assets/policy/Customer%20Declaration%20%26%20Consent.pdf') ?>" target="_blank" rel="noopener">Customer Declaration & Consent</a>
	</div>
	<div>
		<h4>Policies</h4>
		<a href="<?= asset_url('assets/policy/Privacy%20Policy.pdf') ?>" target="_blank" rel="noopener">Privacy Policy</a>
		<a href="<?= asset_url('assets/policy/Terms%20%26%20Conditions.pdf') ?>" target="_blank" rel="noopener">Terms & Conditions</a>
		<a href="<?= asset_url('assets/policy/Refund%20%26%20Cancellation%20Policy.pdf') ?>" target="_blank" rel="noopener">Refund & Cancellation Policy</a>
		<a href="<?= asset_url('assets/policy/Risk%20Disclaimer%20Notice.pdf') ?>" target="_blank" rel="noopener">Risk Disclaimer</a>
	</div>
	<div>
		<h4>Visit Store</h4>
		<p><?= nl2br(e($settings['address'] ?? '')) ?></p>
		<p><?= e($settings['phone'] ?? '') ?></p>
		<p><?= e($settings['email'] ?? '') ?></p>
	</div>
</footer>
<div class="float-actions">
	<a href="https://wa.me/<?= preg_replace('/\D+/', '', $settings['whatsapp'] ?? '') ?>"><i
			class="fa-brands fa-whatsapp"></i></a>
	<a href="tel:<?= e($settings['phone'] ?? '') ?>"><i class="fa-solid fa-phone"></i></a>
	<a href="#download"><i class="fa-solid fa-download"></i></a>
	<a href="#"><i class="fa-solid fa-arrow-up"></i></a>
</div>
<script src="<?= asset_url('assets/js/site.js') ?>" defer></script>
</body>

</html>
