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

function clean_rich_html($value)
{
	$value = trim((string) $value);
	if ($value === '') return '';

	$allowed = array('h1','h2','h3','h4','h5','h6','p','ul','ol','li','strong','b','em','i','u','a','br','hr','blockquote');

	if (!class_exists('DOMDocument')) {
		$value = preg_replace('/<(script|style|iframe|object|embed)\b[^>]*>.*?<\/\1>/is', '', $value);
		$value = strip_tags($value, '<h1><h2><h3><h4><h5><h6><p><ul><ol><li><strong><b><em><i><u><a><br><hr><blockquote>');
		$value = preg_replace('/\s+(style|class|id|width|height|face|size|color)=("[^"]*"|\'[^\']*\'|[^\s>]+)/i', '', $value);
		return trim($value);
	}

	$dom = new DOMDocument('1.0', 'UTF-8');
	libxml_use_internal_errors(TRUE);
	$dom->loadHTML('<?xml encoding="UTF-8"><div id="rich-root">'.$value.'</div>', LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
	libxml_clear_errors();

	$root = $dom->getElementsByTagName('div')->item(0);
	if (!$root) return '';

	$clean_node = function ($node) use (&$clean_node, $allowed, $root) {
		if ($node->nodeType !== XML_ELEMENT_NODE) return;

		$tag = strtolower($node->nodeName);
		if (in_array($tag, array('script','style','iframe','object','embed'), TRUE)) {
			$node->parentNode->removeChild($node);
			return;
		}

		if (!in_array($tag, $allowed, TRUE) && $node !== $root) {
			$moved = array();
			while ($node->firstChild) {
				$moved[] = $node->firstChild;
				$node->parentNode->insertBefore($node->firstChild, $node);
			}
			$node->parentNode->removeChild($node);
			foreach ($moved as $child) $clean_node($child);
			return;
		}

		if ($node->hasAttributes()) {
			$keep_href = '';
			if ($tag === 'a') {
				$href = trim($node->getAttribute('href'));
				if (preg_match('/^(https?:|mailto:|tel:|#)/i', $href)) $keep_href = $href;
			}
			while ($node->attributes->length) {
				$node->removeAttributeNode($node->attributes->item(0));
			}
			if ($keep_href !== '') $node->setAttribute('href', $keep_href);
		}

		$children = array();
		foreach ($node->childNodes as $child) $children[] = $child;
		foreach ($children as $child) $clean_node($child);
	};

	$children = array();
	foreach ($root->childNodes as $child) $children[] = $child;
	foreach ($children as $child) $clean_node($child);

	$html = '';
	foreach ($root->childNodes as $child) $html .= $dom->saveHTML($child);
	return trim($html);
}

function app_download_url($settings, $platform = 'android')
{
	$first_valid = function ($keys) use ($settings) {
		foreach ($keys as $key) {
			$value = trim((string) ($settings[$key] ?? ''));
			if ($value !== '' && $value !== '#') return $value;
		}
		return '#download';
	};

	if ($platform === 'ios') {
		return $first_valid(array('ios_app_link','ios_url'));
	}
	return $first_valid(array('android_app_link','android_url','ios_app_link','ios_url'));
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
