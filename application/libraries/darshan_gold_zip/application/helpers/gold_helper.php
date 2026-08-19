<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function e($value)
{
	return html_escape($value ?? '');
}

function safe_maps_embed($value)
{
	$value = html_entity_decode(trim((string) $value), ENT_QUOTES | ENT_HTML5, 'UTF-8');
	if ($value === '') return '';

	if (!preg_match('/<iframe\b[^>]*\bsrc=(["\'])(.*?)\1[^>]*><\/iframe>/is', $value, $match)) {
		return '';
	}

	$src = html_entity_decode($match[2], ENT_QUOTES | ENT_HTML5, 'UTF-8');
	$parts = parse_url($src);
	$host = strtolower($parts['host'] ?? '');
	$path = strtolower($parts['path'] ?? '');
	$query = strtolower($parts['query'] ?? '');

	$is_google_host = (bool) preg_match('/(^|\.)google\.[a-z.]+$/', $host);
	$is_embed_url = strpos($path, '/maps/embed') === 0 || ($host === 'maps.google.com' && strpos($query, 'output=embed') !== FALSE);
	if (($parts['scheme'] ?? '') !== 'https' || !$is_google_host || !$is_embed_url) {
		return '';
	}

	return '<iframe class="contact-map" src="'.html_escape($src).'" width="100%" height="320" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
}

function gold_slug($text)
{
	$text = strtolower(trim($text));
	$text = preg_replace('/[^a-z0-9]+/i', '-', $text);
	return trim($text, '-') ?: 'page';
}

function csrf_field()
{
	$CI =& get_instance();
	return '<input type="hidden" name="'.$CI->security->get_csrf_token_name().'" value="'.$CI->security->get_csrf_hash().'">';
}

function admin_logged_in()
{
	$CI =& get_instance();
	return (bool) $CI->session->userdata('admin_id');
}

function asset_url($path)
{
	return base_url(ltrim($path, '/'));
}

function upload_url($path)
{
	return $path ? base_url($path) : '';
}
