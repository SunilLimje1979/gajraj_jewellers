<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function active($table, $limit = NULL)
	{
		$this->db->where('status', 'active')->order_by('sort_order', 'ASC')->order_by('id', 'DESC');
		if ($limit) $this->db->limit($limit);
		return $this->db->get($table)->result();
	}

	public function all($table)
	{
		return $this->db->order_by('sort_order', 'ASC')->order_by('id', 'DESC')->get($table)->result();
	}

	public function find($table, $id)
	{
		return $this->db->where('id', (int) $id)->get($table)->row();
	}

	public function by_slug($table, $slug)
	{
		return $this->db->where('slug', $slug)->get($table)->row();
	}

	public function insert($table, $data)
	{
		$data['created_at'] = date('Y-m-d H:i:s');
		$data['updated_at'] = date('Y-m-d H:i:s');
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	public function update($table, $id, $data)
	{
		$data['updated_at'] = date('Y-m-d H:i:s');
		return $this->db->where('id', (int) $id)->update($table, $data);
	}

	public function delete($table, $id)
	{
		return $this->db->where('id', (int) $id)->delete($table);
	}
}
