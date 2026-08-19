<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_admin extends Admin_Controller {
	protected $table;
	protected $title;
	protected $fields = array();
	protected $upload_dir = '';

	public function index()
	{
		$this->admin_view('admin/crud/index', array('title' => $this->title, 'rows' => $this->Crud_model->all($this->table), 'fields' => $this->fields, 'base' => $this->uri->segment(1).'/'.$this->uri->segment(2)));
	}

	public function create()
	{
		$this->save();
	}

	public function edit($id)
	{
		$this->save($id);
	}

	private function save($id = NULL)
	{
		$row = $id ? $this->Crud_model->find($this->table, $id) : NULL;
		if ($this->input->method() === 'post') {
			$data = array();
			foreach ($this->fields as $name => $meta) {
				if (in_array($meta['type'], array('image','file'), TRUE)) continue;
				$data[$name] = $this->input->post($name, $meta['type'] !== 'html');
			}
			if (isset($data['title']) && isset($this->fields['slug']) && empty($data['slug'])) $data['slug'] = gold_slug($data['title']);
			if (isset($data['name']) && isset($this->fields['slug']) && empty($data['slug'])) $data['slug'] = gold_slug($data['name']);
			foreach ($this->fields as $name => $meta) {
				if ($meta['type'] === 'image') {
					$img = $this->image_optimizer->process($name, $this->upload_dir, $meta['max_w'] ?? 1600, $meta['max_h'] ?? 1600);
					if (!empty($img['path'])) $data[$name] = $img['path'];
					if (!empty($img['error'])) $this->session->set_flashdata('error', $img['error']);
				}
				if ($meta['type'] === 'file') {
					$file = $this->image_optimizer->pdf($name, $this->upload_dir);
					if (!empty($file['path'])) $data[$name] = $file['path'];
					if (!empty($file['error'])) $this->session->set_flashdata('error', $file['error']);
				}
			}
			$id ? $this->Crud_model->update($this->table, $id, $data) : $this->Crud_model->insert($this->table, $data);
			$this->session->set_flashdata('success', 'Saved successfully.');
			redirect('admin/'.$this->uri->segment(2));
		}
		$this->admin_view('admin/crud/form', array('title' => $this->title, 'fields' => $this->fields, 'row' => $row));
	}

	public function delete($id)
	{
		$this->Crud_model->delete($this->table, $id);
		$this->session->set_flashdata('success', 'Deleted.');
		redirect('admin/'.$this->uri->segment(2));
	}
}
