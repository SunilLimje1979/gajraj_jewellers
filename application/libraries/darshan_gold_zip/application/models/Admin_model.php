<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function find_by_username($username)
	{
		return $this->db->where('username', $username)->where('status', 'active')->get('admins')->row();
	}

	public function too_many_attempts($username)
	{
		$since = date('Y-m-d H:i:s', time() - 900);
		return $this->db->where('username', $username)->where('success', 0)->where('created_at >=', $since)->count_all_results('login_attempts') >= 5;
	}

	public function log_attempt($username, $success)
	{
		$this->db->insert('login_attempts', array(
			'username' => $username,
			'ip_address' => $this->input->ip_address(),
			'success' => $success ? 1 : 0,
			'created_at' => date('Y-m-d H:i:s')
		));
	}
}
