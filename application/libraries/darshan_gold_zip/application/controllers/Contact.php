<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
	public function index()
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[120]');
		$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|max_length[160]');
		$this->form_validation->set_rules('subject', 'Subject', 'trim|required|max_length[160]');
		$this->form_validation->set_rules('message', 'Message', 'trim|required|max_length[2000]');
		if ($this->input->method() === 'post') {
			if ($this->input->post('website')) {
				$this->session->set_flashdata('error', 'Spam protection blocked this enquiry.');
			} elseif ($this->form_validation->run()) {
				$this->db->insert('contact_enquiries', array(
					'name' => $this->input->post('name', TRUE),
					'mobile' => $this->input->post('mobile', TRUE),
					'email' => $this->input->post('email', TRUE),
					'subject' => $this->input->post('subject', TRUE),
					'message' => $this->input->post('message', TRUE),
					'status' => 'new',
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s')
				));
				$this->session->set_flashdata('success', 'Thank you. Our team will contact you soon.');
				redirect('contact-us');
			}
		}
		$this->load->view('frontend/contact', array(
			'settings' => $this->Settings_model->all(),
			'title' => 'Contact Us',
			'menus' => $this->Crud_model->active('menu_items')
		));
	}
}
