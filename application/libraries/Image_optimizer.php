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
			$image = new Imagick($tmp);
			$image->autoOrient();
			$image->thumbnailImage($max_w, $max_h, TRUE, TRUE);
			$image->setImageFormat('AVIF');
			$image->setImageCompressionQuality(72);
			$image->writeImage(FCPATH.$target);
			$image->clear();
			return array('path' => $target);
		}

		if (function_exists('imageavif')) {
			$src = $this->gd_create($tmp, $mime);
			if (!$src) return array('error' => 'Could not read uploaded image.');
			$w = imagesx($src); $h = imagesy($src);
			$scale = min($max_w / $w, $max_h / $h, 1);
			$nw = (int) floor($w * $scale); $nh = (int) floor($h * $scale);
			$dst = imagecreatetruecolor($nw, $nh);
			imagealphablending($dst, FALSE); imagesavealpha($dst, TRUE);
			imagecopyresampled($dst, $src, 0, 0, 0, 0, $nw, $nh, $w, $h);
			imageavif($dst, FCPATH.$target, 72);
			imagedestroy($src); imagedestroy($dst);
			return array('path' => $target);
		}
		return array('error' => 'Server cannot create AVIF images. Enable Imagick AVIF or PHP GD imageavif().');
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

	private function gd_create($tmp, $mime)
	{
		if ($mime === 'image/jpeg') return imagecreatefromjpeg($tmp);
		if ($mime === 'image/png') return imagecreatefrompng($tmp);
		if ($mime === 'image/webp' && function_exists('imagecreatefromwebp')) return imagecreatefromwebp($tmp);
		if ($mime === 'image/avif' && function_exists('imagecreatefromavif')) return imagecreatefromavif($tmp);
		return FALSE;
	}
}
