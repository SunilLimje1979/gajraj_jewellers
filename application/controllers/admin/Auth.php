<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
	}

	public function login()
	{
		if ($this->session->userdata('admin_id')) redirect('admin/dashboard');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->input->method() === 'post' && $this->form_validation->run()) {
			$username = $this->input->post('username', TRUE);
			if ($this->Admin_model->too_many_attempts($username)) {
				$this->session->set_flashdata('error', 'Too many failed attempts. Try again after 15 minutes.');
			} else {
				$admin = $this->Admin_model->find_by_username($username);
				$ok = $admin && password_verify($this->input->post('password'), $admin->password_hash);
				$this->Admin_model->log_attempt($username, $ok);
				if ($ok) {
					$this->session->sess_regenerate(TRUE);
					$this->session->set_userdata(array('admin_id' => $admin->id, 'admin_name' => $admin->name));
					if ($this->input->post('remember_username')) set_cookie('remember_admin_username', $username, 2592000);
					redirect('admin/dashboard');
				}
				$this->session->set_flashdata('error', 'Invalid username or password.');
			}
		}
		$this->load->view('admin/auth/login');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin/login');
	}

	public function change_password()
	{
		if (!$this->session->userdata('admin_id')) redirect('admin/login');
		$this->form_validation->set_rules('current_password', 'Current password', 'required');
		$this->form_validation->set_rules('new_password', 'New password', 'required|min_length[6]');
		if ($this->input->method() === 'post' && $this->form_validation->run()) {
			$admin = $this->db->where('id', $this->session->userdata('admin_id'))->get('admins')->row();
			if ($admin && password_verify($this->input->post('current_password'), $admin->password_hash)) {
				$this->db->where('id', $admin->id)->update('admins', array('password_hash' => password_hash($this->input->post('new_password'), PASSWORD_DEFAULT), 'updated_at' => date('Y-m-d H:i:s')));
				$this->session->set_flashdata('success', 'Password changed.');
				redirect('admin/dashboard');
			}
			$this->session->set_flashdata('error', 'Current password is incorrect.');
		}
		$this->load->view('admin/auth/change_password');
	}
}
