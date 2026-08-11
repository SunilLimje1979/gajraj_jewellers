<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function all()
	{
		$settings = array();
		foreach ($this->db->get('settings')->result() as $row) {
			$settings[$row->setting_key] = $row->setting_value;
		}
		return $settings;
	}

	public function get($key, $default = '')
	{
		$row = $this->db->where('setting_key', $key)->get('settings')->row();
		return $row ? $row->setting_value : $default;
	}

	public function save_many($data)
	{
		foreach ($data as $key => $value) {
			$exists = $this->db->where('setting_key', $key)->count_all_results('settings');
			$payload = array('setting_value' => $value, 'updated_at' => date('Y-m-d H:i:s'));
			if ($exists) {
				$this->db->where('setting_key', $key)->update('settings', $payload);
			} else {
				$payload['setting_key'] = $key;
				$payload['created_at'] = date('Y-m-d H:i:s');
				$this->db->insert('settings', $payload);
			}
		}
	}
}
