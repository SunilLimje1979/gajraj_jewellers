<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
	public function view($slug)
	{
		$page = $this->Crud_model->by_slug('pages', $slug);
		if (!$page || $page->status !== 'active') return $this->not_found();
		$this->load->view('frontend/page', $this->front_data($page->title, array('page' => $page)));
	}

	public function about()
	{
		$page = (object) array('title' => 'About Jewellery Shop', 'content' => $this->Settings_model->get('shop_full_description'));
		$this->load->view('frontend/page', $this->front_data('About Us', array('page' => $page)));
	}

	public function scheme()
	{
		$page = $this->Crud_model->by_slug('pages', 'gold-saving-scheme');
		$this->load->view('frontend/page', $this->front_data('Gold Saving Scheme', array('page' => $page)));
	}

	public function mobile_app()
	{
		$this->load->view('frontend/mobile_app', $this->front_data('Mobile App'));
	}

	public function not_found()
	{
		$this->output->set_status_header('404');
		$this->load->view('frontend/404', $this->front_data('Page Not Found'));
	}

	private function front_data($title, $extra = array())
	{
		return array_merge(array(
			'settings' => $this->Settings_model->all(),
			'title' => $title,
			'menus' => $this->Crud_model->active('menu_items')
		), $extra);
	}
}
