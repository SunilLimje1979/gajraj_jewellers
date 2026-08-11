<?php
$fields = array(
	'shop_name','tagline','establishment_year','short_description','email','phone','alternate_phone','whatsapp',
	'address','business_hours','gst_number','bis_details','maps_embed','maps_url','android_url','ios_url',
	'app_heading','app_short_description','facebook','instagram','youtube','linkedin','twitter','pinterest',
	'meta_title','meta_description','canonical_base_url','announcement_text','announcement_link',
	'primary_color','secondary_color','accent_color','heading_color','text_color','footer_color','announcement_bg',
	'announcement_text_color','button_radius','card_radius'
);
$color_fields = array(
	'primary_color' => '#7a1538',
	'secondary_color' => '#d4af37',
	'accent_color' => '#f6eee3',
	'heading_color' => '#22171b',
	'text_color' => '#60545a',
	'footer_color' => '#1b1114',
	'announcement_bg' => '#7a1538',
	'announcement_text_color' => '#ffffff'
);
?>
<form class="panel admin-form" method="post" enctype="multipart/form-data">
	<?= csrf_field() ?>
	<div class="form-grid">
		<?php foreach ($fields as $f): ?>
			<?php $value = $settings[$f] ?? ($color_fields[$f] ?? ''); ?>
			<label>
				<?= ucwords(str_replace('_', ' ', $f)) ?>
				<?php if (isset($color_fields[$f])): ?>
					<?php $color_value = preg_match('/^#[0-9a-fA-F]{6}$/', $value) ? $value : $color_fields[$f]; ?>
					<span class="color-row">
						<input type="color" value="<?= e($color_value) ?>" data-color-picker="<?= e($f) ?>">
						<input id="<?= e($f) ?>" name="<?= e($f) ?>" value="<?= e($color_value) ?>" pattern="^#[0-9a-fA-F]{6}$" maxlength="7">
					</span>
				<?php elseif (strpos($f, 'description') !== FALSE || in_array($f, array('address', 'maps_embed'), TRUE)): ?>
					<textarea name="<?= e($f) ?>"><?= e($value) ?></textarea>
				<?php else: ?>
					<input name="<?= e($f) ?>" value="<?= e($value) ?>">
				<?php endif; ?>
			</label>
		<?php endforeach; ?>
		<label>Announcement Enabled<select name="announcement_enabled"><option value="1">1</option><option value="0" <?= (($settings['announcement_enabled'] ?? '') === '0') ? 'selected' : '' ?>>0</option></select></label>
		<label>Android Enabled<select name="android_enabled"><option value="1">1</option><option value="0" <?= (($settings['android_enabled'] ?? '') === '0') ? 'selected' : '' ?>>0</option></select></label>
		<label>iOS Enabled<select name="ios_enabled"><option value="1">1</option><option value="0" <?= (($settings['ios_enabled'] ?? '') === '0') ? 'selected' : '' ?>>0</option></select></label>
		<label>Logo<input type="file" name="logo" accept="image/*"></label>
		<label>App Promotional Image<input type="file" name="app_image" accept="image/*"></label>
		<label>Android QR<input type="file" name="android_qr" accept="image/*"></label>
		<label>iOS QR<input type="file" name="ios_qr" accept="image/*"></label>
	</div>
	<button class="admin-btn">Save Settings</button>
</form>
