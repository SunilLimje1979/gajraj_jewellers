<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificate extends CI_Controller {
	public function index()
	{
		$this->load->view('frontend/certificates', array(
			'settings' => $this->Settings_model->all(),
			'title' => 'Certificates',
			'menus' => $this->Crud_model->active('menu_items'),
			'certificates' => $this->Crud_model->active('certificates')
		));
	}
}
