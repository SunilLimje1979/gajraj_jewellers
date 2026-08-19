<?php $this->load->view('frontend/partials/header'); ?>
<main>
	<section class="hero">
		<?php foreach ($sliders as $slide) { ?>
			<?php
			$primary_link = preg_match('/download|play store/i', (string) $slide->primary_text) ? app_download_url($settings) : $slide->primary_link;
			$secondary_link = preg_match('/download|play store/i', (string) $slide->secondary_text) ? app_download_url($settings) : $slide->secondary_link;
			?>
			<article class="hero-slide"
				style="background-image:linear-gradient(rgba(0,0,0,<?php echo (float) $slide->overlay_opacity; ?>),rgba(0,0,0,<?php echo (float) $slide->overlay_opacity; ?>)),url('<?php echo upload_url($slide->desktop_image); ?>')">
				<div class="hero-copy <?php echo e($slide->text_align); ?>">
					<p class="eyebrow"><?php echo e($slide->subheading); ?></p>
					<h1><?php echo e($slide->heading); ?></h1>
					<p><?php echo e($slide->description); ?></p>
					<div class="actions"><a class="btn"
							href="<?php echo e($primary_link); ?>"><?php echo e($slide->primary_text); ?></a><a
							class="btn ghost"
							href="<?php echo e($secondary_link); ?>"><?php echo e($slide->secondary_text); ?></a>
					</div>
				</div>
			</article>
		<?php } ?>
	</section>
	<section class="intro grid two">
		<div>
			<p class="eyebrow">Trusted since <?php echo e($settings['establishment_year'] ?? '1998'); ?></p>
			<h2><?php echo e($settings['shop_name'] ?? 'Multi Gold Jewellers'); ?></h2>
			<div class="rich-content"><?php echo $settings['shop_full_description'] ?? ''; ?></div>
		</div>
		<div class="stats"><?php foreach ($trust_points as $p) { ?>
				<article><?php if (!empty($p->icon_image)) { ?><img class="trust-icon" src="<?php echo upload_url($p->icon_image); ?>" alt="" loading="lazy"><?php } else { ?><i class="<?php echo e($p->icon); ?>"></i><?php } ?>
					<h3><?php echo e($p->title); ?></h3>
					<p><?php echo e($p->description); ?></p>
				</article><?php } ?>
		</div>
	</section>
	<section class="app-band grid two">
		<div>
			<p class="eyebrow">Vault App</p>
			<h2><?php echo e($settings['app_heading'] ?? 'Manage your gold scheme from your phone'); ?></h2>
			<p><?php echo e($settings['app_short_description'] ?? ''); ?></p>
			<div class="checks rich-content">
				<?php echo $settings['app_feature_points'] ?? '<ul><li>Your shop is always open. Buy gold anytime, anywhere - powered by secure cloud infrastructure.</li><li>Digital in their phone, physical in your store. Customers can withdraw gold anytime at your store.</li><li>Fast. Easy. Trusted UPI-powered, instant, and secure transactions.</li><li>Every gram and transaction is secured and ensured.</li><li>Secure today\'s price, save smarter. Lock today\'s rate instantly and grow your digital wallet.</li><li>Regulated, reliable, risk-free. Powered by compliant providers for trust and legal safety.</li></ul>'; ?>
			</div>
			<div class="actions">
				<?php if (($settings['android_enabled'] ?? '1') === '1'): ?><a class="store" href="<?php echo e(app_download_url($settings, 'android')); ?>"><i
							class="fa-brands fa-google-play"></i> Play Store</a><?php endif; ?>
				<?php if (($settings['ios_enabled'] ?? '1') === '1'): ?><a class="store"
						href="<?php echo e(app_download_url($settings, 'ios')); ?>"><i class="fa-brands fa-apple"></i> App
						Store</a><?php endif; ?>
			</div>
		</div>
		<!-- <div class="phone-card"><?php if (!empty($settings['app_image'])) { ?><img
					src="<?php echo upload_url($settings['app_image']); ?>" alt="Mobile app preview"
					loading="lazy"><?php } else { ?>
				<div class="phone-mock">Gold Scheme<br>Progress 72%</div><?php } ?>
		</div> -->
		<div class="phone-card">
			<div class="phone-mock">
				<?php if (!empty($settings['app_image'])) { ?><img
						src="<?php echo upload_url($settings['app_image']); ?>" alt="Mobile app preview"
						loading="lazy"><?php } else { ?>Gold Scheme<br>Progress 72% <?php } ?>
			</div>
		</div>
	</section>
	<section>
		<p class="eyebrow">How It Works</p>
		<h2><?php echo e($settings['home_steps_heading'] ?? 'Simple monthly gold-saving steps'); ?></h2>
		<div class="cards steps"><?php foreach ($scheme_steps as $i => $step) { ?>
				<article><span><?php echo $i + 1; ?></span>
					<h3><?php echo e($step->title); ?></h3>
					<p><?php echo e($step->description); ?></p>
				</article><?php } ?>
		</div>
	</section>

	<!-- <section>
		<p class="eyebrow">Collection Preview</p>
		<h2>Explore jewellery categories</h2>
		<div class="cards"><?php foreach ($categories as $cat) { ?>
				<article><?php if ($cat->image) { ?><img src="<?php echo upload_url($cat->image); ?>"
							alt="<?php echo e($cat->name); ?>" loading="lazy"><?php } ?>
					<h3><?php echo e($cat->name); ?></h3>
					<p><?php echo e($cat->description); ?></p>
				</article><?php } ?>
		</div>
	</section> -->

	<!-- <section>
		<p class="eyebrow">Gallery</p>
		<h2>Inside our jewellery world</h2>
		<div class="gallery-grid"><?php foreach ($gallery as $g) { ?><a href="<?php echo upload_url($g->image); ?>"><img
						src="<?php echo upload_url($g->image); ?>" alt="<?php echo e($g->title); ?>"
						loading="lazy"></a><?php } ?></div>
	</section> -->

	<!-- <section>
		<p class="eyebrow">Certificates</p>
		<h2>Business and trust documents</h2>
		<div class="cards"><?php foreach ($certificates as $c) { ?>
				<article>
					<h3><?php echo e($c->title); ?></h3>
					<p><?php echo e($c->certificate_type); ?></p>
					<p><?php echo e($c->description); ?></p><?php if ($c->download_enabled) { ?><a class="text-link"
							href="<?php echo upload_url($c->file_path); ?>" download>Download</a><?php } ?>
				</article><?php } ?>
		</div>
	</section> -->

	<!-- <section>
		<p class="eyebrow">Customers</p>
		<h2>Words from families we serve</h2>
		<div class="cards"><?php foreach ($testimonials as $t) { ?>
				<article>
					<div class="stars"><?php echo str_repeat('★', (int) $t->rating); ?></div>
					<p><?php echo e($t->review); ?></p>
					<h3><?php echo e($t->customer_name); ?></h3><small><?php echo e($t->city); ?></small>
				</article><?php } ?>
		</div>
	</section> -->

	<section>
		<p class="eyebrow">FAQ</p>
		<h2>Common questions</h2>
		<div class="faq"><?php foreach ($faqs as $f) { ?>
				<details>
					<summary><?php echo e($f->question); ?></summary>
					<p><?php echo e($f->answer); ?></p>
				</details><?php } ?>
		</div>
		<div class="actions"><a class="btn" href="<?php echo base_url('faqs'); ?>">View All FAQs</a></div>
	</section>
</main>
<?php $this->load->view('frontend/partials/footer'); ?>
