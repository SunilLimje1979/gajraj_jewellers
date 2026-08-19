<?php
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

$sections = array(
	'Shop / Home Intro' => array(
		'shop_name' => array('type' => 'text'),
		'tagline' => array('type' => 'text'),
		'establishment_year' => array('type' => 'text'),
		'short_description' => array('type' => 'textarea'),
		'shop_full_description' => array('type' => 'html', 'label' => 'Home Intro Description')
	),
	'Mobile App Section' => array(
		'app_heading' => array('type' => 'text'),
		'app_short_description' => array('type' => 'textarea'),
		'app_feature_points' => array('type' => 'html', 'label' => 'App Bullet Points'),
		'android_app_link' => array('type' => 'text', 'label' => 'Android App Link'),
		'ios_app_link' => array('type' => 'text', 'label' => 'iOS App Link'),
		'android_url' => array('type' => 'text', 'label' => 'Legacy Android URL'),
		'ios_url' => array('type' => 'text', 'label' => 'Legacy iOS URL'),
		'android_enabled' => array('type' => 'select', 'options' => array('1','0')),
		'ios_enabled' => array('type' => 'select', 'options' => array('1','0'))
	),
	'How It Works Section' => array(
		'home_steps_heading' => array('type' => 'text', 'label' => 'Section Heading')
	),
	'Footer App CTA' => array(
		'footer_app_heading' => array('type' => 'text', 'label' => 'CTA Heading'),
		'footer_app_description' => array('type' => 'textarea', 'label' => 'CTA Description')
	),
	'Contact Details' => array(
		'email' => array('type' => 'text'),
		'phone' => array('type' => 'text'),
		'alternate_phone' => array('type' => 'text'),
		'whatsapp' => array('type' => 'text'),
		'address' => array('type' => 'textarea'),
		'business_hours' => array('type' => 'text'),
		'gst_number' => array('type' => 'text'),
		'bis_details' => array('type' => 'text'),
		'maps_embed' => array('type' => 'textarea'),
		'maps_url' => array('type' => 'text')
	),
	'Announcement Bar' => array(
		'announcement_enabled' => array('type' => 'select', 'options' => array('1','0')),
		'announcement_text' => array('type' => 'text'),
		'announcement_link' => array('type' => 'text')
	),
	'SEO' => array(
		'meta_title' => array('type' => 'text'),
		'meta_description' => array('type' => 'textarea'),
		'canonical_base_url' => array('type' => 'text')
	),
	'Social Links' => array(
		'facebook' => array('type' => 'text'),
		'instagram' => array('type' => 'text'),
		'youtube' => array('type' => 'text'),
		'linkedin' => array('type' => 'text'),
		'twitter' => array('type' => 'text'),
		'pinterest' => array('type' => 'text')
	),
	'Design' => array(
		'primary_color' => array('type' => 'color'),
		'secondary_color' => array('type' => 'color'),
		'accent_color' => array('type' => 'color'),
		'heading_color' => array('type' => 'color'),
		'text_color' => array('type' => 'color'),
		'footer_color' => array('type' => 'color'),
		'announcement_bg' => array('type' => 'color'),
		'announcement_text_color' => array('type' => 'color'),
		'button_radius' => array('type' => 'number'),
		'card_radius' => array('type' => 'number')
	)
);

$files = array(
	'Brand Images' => array(
		'logo' => 'Logo',
		'full_logo' => 'Full Logo'
	),
	'App Images' => array(
		'app_image' => 'App Promotional Image',
		'android_qr' => 'Android QR',
		'ios_qr' => 'iOS QR'
	)
);

if (!function_exists('setting_label_text')) {
	function setting_label_text($name, $meta)
	{
		return $meta['label'] ?? ucwords(str_replace('_', ' ', $name));
	}
}
?>
<form class="panel admin-form settings-form" method="post" enctype="multipart/form-data">
	<?= csrf_field() ?>
	<?php foreach ($sections as $section_title => $fields): ?>
		<section class="settings-section">
			<header>
				<h2><?= e($section_title) ?></h2>
			</header>
			<div class="form-grid">
				<?php foreach ($fields as $name => $meta): ?>
					<?php
					$value = $settings[$name] ?? ($color_fields[$name] ?? '');
					if ($name === 'maps_embed') $value = html_entity_decode($value, ENT_QUOTES | ENT_HTML5, 'UTF-8');
					$type = $meta['type'];
					?>
					<label class="<?= $type === 'html' ? 'form-field-wide' : '' ?>">
						<?= e(setting_label_text($name, $meta)) ?>
						<?php if ($type === 'color'): ?>
							<?php $color_value = preg_match('/^#[0-9a-fA-F]{6}$/', $value) ? $value : $color_fields[$name]; ?>
							<span class="color-row">
								<input type="color" value="<?= e($color_value) ?>" data-color-picker="<?= e($name) ?>">
								<input id="<?= e($name) ?>" name="<?= e($name) ?>" value="<?= e($color_value) ?>" pattern="^#[0-9a-fA-F]{6}$" maxlength="7">
							</span>
						<?php elseif ($type === 'html'): ?>
							<textarea class="rich" name="<?= e($name) ?>"><?= e($value) ?></textarea>
						<?php elseif ($type === 'textarea'): ?>
							<textarea name="<?= e($name) ?>"><?= e($value) ?></textarea>
						<?php elseif ($type === 'select'): ?>
							<select name="<?= e($name) ?>">
								<?php foreach ($meta['options'] as $opt): ?>
									<option value="<?= e($opt) ?>" <?= (string) $value === (string) $opt ? 'selected' : '' ?>><?= e($opt) ?></option>
								<?php endforeach; ?>
							</select>
						<?php else: ?>
							<input type="<?= e($type) ?>" name="<?= e($name) ?>" value="<?= e($value) ?>">
						<?php endif; ?>
					</label>
				<?php endforeach; ?>
			</div>
		</section>
	<?php endforeach; ?>

	<?php foreach ($files as $section_title => $fields): ?>
		<section class="settings-section">
			<header>
				<h2><?= e($section_title) ?></h2>
			</header>
			<div class="form-grid">
				<?php foreach ($fields as $name => $label): ?>
					<label><?= e($label) ?><input type="file" name="<?= e($name) ?>" accept="image/*"></label>
				<?php endforeach; ?>
			</div>
		</section>
	<?php endforeach; ?>
	<button class="admin-btn">Save Settings</button>
</form>
