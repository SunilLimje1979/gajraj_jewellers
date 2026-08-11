<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Controller extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('admin_id')) redirect('admin/login');
	}

	protected function admin_view($view, $data = array())
	{
		$this->load->view('admin/partials/header', $data);
		$this->load->view('admin/partials/sidebar', $data);
		$this->load->view($view, $data);
		$this->load->view('admin/partials/footer');
	}
}
