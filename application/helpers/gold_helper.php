<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function e($value)
{
	return html_escape($value ?? '');
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
