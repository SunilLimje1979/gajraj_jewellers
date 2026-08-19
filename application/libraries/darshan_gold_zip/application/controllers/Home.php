<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$data = $this->front_data('Home');
		$data['sliders'] = $this->Crud_model->active('sliders');
		$data['categories'] = $this->Crud_model->active('jewellery_categories', 8);
		$data['gallery'] = $this->Crud_model->active('gallery', 8);
		$data['certificates'] = $this->Crud_model->active('certificates', 4);
		$data['testimonials'] = $this->Crud_model->active('testimonials', 6);
		$data['faqs'] = $this->Crud_model->active('faqs', 8);
		$data['trust_points'] = $this->Crud_model->active('shop_trust_points', 8);
		$data['scheme_steps'] = $this->Crud_model->active('scheme_steps', 6);
		$this->load->view('frontend/home', $data);
	}

	private function front_data($title)
	{
		$settings = $this->Settings_model->all();
		return array('settings' => $settings, 'title' => $title, 'menus' => $this->Crud_model->active('menu_items'));
	}
}
