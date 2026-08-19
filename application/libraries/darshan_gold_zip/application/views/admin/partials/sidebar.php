<aside class="admin-side">
	<h2>Gold CMS</h2>
	<a href="<?= base_url('admin/dashboard') ?>"><i class="fa-solid fa-gauge-high"></i>Dashboard</a>
	<a href="<?= base_url('admin/settings') ?>"><i class="fa-solid fa-sliders"></i>Settings</a>
	<a href="<?= base_url('admin/sliders') ?>"><i class="fa-solid fa-images"></i>Sliders</a>
	<a href="<?= base_url('admin/pages') ?>"><i class="fa-solid fa-file-lines"></i>Pages</a>
	<a href="<?= base_url('admin/certificates') ?>"><i class="fa-solid fa-certificate"></i>Certificates</a>
	<a href="<?= base_url('admin/gallery') ?>"><i class="fa-solid fa-photo-film"></i>Gallery</a>
	<a href="<?= base_url('admin/categories') ?>"><i class="fa-solid fa-gem"></i>Categories</a>
	<a href="<?= base_url('admin/testimonials') ?>"><i class="fa-solid fa-star"></i>Testimonials</a>
	<a href="<?= base_url('admin/faqs') ?>"><i class="fa-solid fa-circle-question"></i>FAQs</a>
	<a href="<?= base_url('admin/enquiries') ?>"><i class="fa-solid fa-inbox"></i>Enquiries</a>
	<a href="<?= base_url('admin/menu') ?>"><i class="fa-solid fa-bars-staggered"></i>Menu</a>
	<a href="<?= base_url('admin/trust_points') ?>"><i class="fa-solid fa-shield-heart"></i>Trust Points</a>
	<a href="<?= base_url('admin/scheme_steps') ?>"><i class="fa-solid fa-list-check"></i>Scheme Steps</a>
	<a href="<?= base_url('admin/change-password') ?>"><i class="fa-solid fa-key"></i>Change Password</a>
	<a href="<?= base_url('admin/logout') ?>"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
</aside>
<main class="admin-main">
	<header class="admin-top">
		<h1><?= e($title ?? 'Admin') ?></h1>
		<span><?= e($this->session->userdata('admin_name')) ?></span>
	</header>
	<?php if ($this->session->flashdata('success')): ?><div class="alert success"><?= e($this->session->flashdata('success')) ?></div><?php endif; ?>
	<?php if ($this->session->flashdata('error')): ?><div class="alert error"><?= e($this->session->flashdata('error')) ?></div><?php endif; ?>
