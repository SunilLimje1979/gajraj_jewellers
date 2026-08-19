<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faqs extends CI_Controller {
	public function index()
	{
		$this->load->view('frontend/faqs', array(
			'settings' => $this->Settings_model->all(),
			'title' => 'FAQs',
			'menus' => $this->Crud_model->active('menu_items'),
			'faqs' => $this->Crud_model->active('faqs')
		));
	}
}
