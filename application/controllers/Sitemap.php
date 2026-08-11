<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitemap extends CI_Controller {
	public function index()
	{
		$this->output->set_content_type('application/xml');
		$pages = $this->Crud_model->active('pages');
		$this->load->view('frontend/sitemap', array('pages' => $pages));
	}
}
