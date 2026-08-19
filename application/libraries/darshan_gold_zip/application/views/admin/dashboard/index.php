<?php
$icons = array(
	'Total enquiries' => 'fa-solid fa-inbox',
	'New enquiries' => 'fa-solid fa-bell',
	'Sliders' => 'fa-solid fa-images',
	'Certificates' => 'fa-solid fa-certificate',
	'Gallery images' => 'fa-solid fa-photo-film',
	'Testimonials' => 'fa-solid fa-star',
	'FAQs' => 'fa-solid fa-circle-question',
	'Active pages' => 'fa-solid fa-file-lines'
);
?>
<div class="stat-grid">
	<?php foreach ($counts as $label => $count): ?>
		<article>
			<i class="<?= e($icons[$label] ?? 'fa-solid fa-chart-simple') ?>"></i>
			<span><?= (int) $count ?></span>
			<p><?= e($label) ?></p>
		</article>
	<?php endforeach; ?>
</div>
<section class="panel">
	<div class="toolbar"><h2>Recent Enquiries</h2><a class="admin-btn secondary" href="<?= base_url('admin/enquiries') ?>"><i class="fa-solid fa-arrow-right"></i>View All</a></div>
	<div class="table-wrap">
		<table>
			<thead><tr><th>Name</th><th>Mobile</th><th>Subject</th><th>Status</th></tr></thead>
			<tbody>
				<?php foreach ($recent as $r): ?>
					<tr><td><?= e($r->name) ?></td><td><?= e($r->mobile) ?></td><td><?= e($r->subject) ?></td><td><span class="status-pill"><?= e($r->status) ?></span></td></tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</section>
