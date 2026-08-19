<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image_optimizer {
	private $allowed = array('image/jpeg', 'image/png', 'image/webp', 'image/avif');

	public function process($field, $dir, $max_w = 1600, $max_h = 1600)
	{
		if (empty($_FILES[$field]['name'])) return array('path' => '');
		if ($_FILES[$field]['size'] > 5 * 1024 * 1024) return array('error' => 'Image must be 5MB or less.');
		$tmp = $_FILES[$field]['tmp_name'];
		$mime = function_exists('mime_content_type') ? mime_content_type($tmp) : $_FILES[$field]['type'];
		if (!in_array($mime, $this->allowed, TRUE)) return array('error' => 'Only JPG, PNG, WebP, or AVIF images are allowed.');
		$info = @getimagesize($tmp);
		if (!$info || $info[0] < 80 || $info[1] < 80) return array('error' => 'Image dimensions are invalid.');
		if (!is_dir(FCPATH.$dir)) mkdir(FCPATH.$dir, 0755, TRUE);
		$name = bin2hex(random_bytes(16));
		$target = rtrim($dir, '/').'/'.$name.'.avif';

		if (class_exists('Imagick') && in_array('AVIF', Imagick::queryFormats('AVIF'), TRUE)) {
			try {
				$image = new Imagick($tmp);
				$image->autoOrient();
				$image->thumbnailImage($max_w, $max_h, TRUE, TRUE);
				$image->setImageFormat('AVIF');
				$image->setImageCompressionQuality(72);
				$image->writeImage(FCPATH.$target);
				$image->clear();
				if (is_file(FCPATH.$target) && filesize(FCPATH.$target) > 0) return array('path' => $target);
			} catch (Exception $e) {
				if (isset($image) && $image instanceof Imagick) $image->clear();
			}
		}

		if (function_exists('imageavif')) {
			$src = $this->gd_create($tmp, $mime);
			if ($src) {
				$w = imagesx($src); $h = imagesy($src);
				$scale = min($max_w / $w, $max_h / $h, 1);
				$nw = (int) floor($w * $scale); $nh = (int) floor($h * $scale);
				$dst = imagecreatetruecolor($nw, $nh);
				imagealphablending($dst, FALSE); imagesavealpha($dst, TRUE);
				imagecopyresampled($dst, $src, 0, 0, 0, 0, $nw, $nh, $w, $h);
				$saved = imageavif($dst, FCPATH.$target, 72);
				imagedestroy($src); imagedestroy($dst);
				if ($saved && is_file(FCPATH.$target) && filesize(FCPATH.$target) > 0) return array('path' => $target);
			}
		}
		return $this->save_original($field, $dir, $name, $mime);
	}

	public function pdf($field, $dir)
	{
		if (empty($_FILES[$field]['name'])) return array('path' => '');
		if ($_FILES[$field]['size'] > 8 * 1024 * 1024) return array('error' => 'PDF must be 8MB or less.');
		$mime = function_exists('mime_content_type') ? mime_content_type($_FILES[$field]['tmp_name']) : $_FILES[$field]['type'];
		if ($mime !== 'application/pdf') return array('error' => 'Only PDF files are allowed.');
		if (!is_dir(FCPATH.$dir)) mkdir(FCPATH.$dir, 0755, TRUE);
		$target = rtrim($dir, '/').'/'.bin2hex(random_bytes(16)).'.pdf';
		return move_uploaded_file($_FILES[$field]['tmp_name'], FCPATH.$target) ? array('path' => $target) : array('error' => 'Could not save PDF.');
	}

	public function icon($field, $dir)
	{
		if (empty($_FILES[$field]['name'])) return array('path' => '');
		if ($_FILES[$field]['size'] > 2 * 1024 * 1024) return array('error' => 'Icon must be 2MB or less.');

		$tmp = $_FILES[$field]['tmp_name'];
		$mime = function_exists('mime_content_type') ? mime_content_type($tmp) : $_FILES[$field]['type'];
		$ext = strtolower(pathinfo($_FILES[$field]['name'], PATHINFO_EXTENSION));
		$allowed = array(
			'image/png' => 'png',
			'image/svg+xml' => 'svg',
			'image/x-icon' => 'ico',
			'image/x-ico' => 'ico',
			'image/vnd.microsoft.icon' => 'ico',
		);

		if ($ext === 'svg') {
			$svg = file_get_contents($tmp);
			if (!preg_match('/<svg\b/i', $svg) || preg_match('/<script\b|on\w+\s*=|javascript:/i', $svg)) {
				return array('error' => 'SVG icon is invalid or unsafe.');
			}
			$save_ext = 'svg';
		} elseif ($ext === 'png' && $mime === 'image/png' && @getimagesize($tmp)) {
			$save_ext = 'png';
		} elseif ($ext === 'ico' && (isset($allowed[$mime]) || @getimagesize($tmp))) {
			$save_ext = 'ico';
		} else {
			return array('error' => 'Only PNG, SVG, or ICO icons are allowed.');
		}

		if (!is_dir(FCPATH.$dir)) mkdir(FCPATH.$dir, 0755, TRUE);
		$target = rtrim($dir, '/').'/'.bin2hex(random_bytes(16)).'.'.$save_ext;
		return move_uploaded_file($tmp, FCPATH.$target) ? array('path' => $target) : array('error' => 'Could not save uploaded icon.');
	}

	private function gd_create($tmp, $mime)
	{
		if ($mime === 'image/jpeg') return imagecreatefromjpeg($tmp);
		if ($mime === 'image/png') return imagecreatefrompng($tmp);
		if ($mime === 'image/webp' && function_exists('imagecreatefromwebp')) return imagecreatefromwebp($tmp);
		if ($mime === 'image/avif' && function_exists('imagecreatefromavif')) return imagecreatefromavif($tmp);
		return FALSE;
	}

	private function save_original($field, $dir, $name, $mime)
	{
		$extensions = array(
			'image/jpeg' => 'jpg',
			'image/png' => 'png',
			'image/webp' => 'webp',
			'image/avif' => 'avif',
		);
		if (empty($extensions[$mime])) return array('error' => 'Only JPG, PNG, WebP, or AVIF images are allowed.');

		$target = rtrim($dir, '/').'/'.$name.'.'.$extensions[$mime];
		return move_uploaded_file($_FILES[$field]['tmp_name'], FCPATH.$target) ? array('path' => $target) : array('error' => 'Could not save uploaded image.');
	}
}
