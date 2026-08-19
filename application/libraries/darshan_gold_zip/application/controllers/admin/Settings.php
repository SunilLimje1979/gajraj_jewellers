<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends Admin_Controller {
	public function index()
	{
		if ($this->input->method() === 'post') {
			$allowed_colors = array('primary_color','secondary_color','accent_color','heading_color','text_color','footer_color','announcement_bg','announcement_text_color');
			$data = $this->input->post(NULL, TRUE);
			$data['maps_embed'] = safe_maps_embed($this->input->post('maps_embed', FALSE));
			unset($data[$this->security->get_csrf_token_name()]);
			foreach ($allowed_colors as $c) {
				if (isset($data[$c]) && !preg_match('/^#[0-9a-fA-F]{6}$/', $data[$c])) unset($data[$c]);
			}
			foreach (array('logo','full_logo','app_image','android_qr','ios_qr') as $field) {
				$dir = in_array($field, array('logo','full_logo'), TRUE) ? 'uploads/logo' : 'uploads/app';
				$img = $this->image_optimizer->process($field, $dir, 1200, 1200);
				if (!empty($img['path'])) $data[$field] = $img['path'];
				if (!empty($img['error'])) $this->session->set_flashdata('error', $img['error']);
			}
			$this->Settings_model->save_many($data);
			$this->session->set_flashdata('success', 'Settings saved.');
			redirect('admin/settings');
		}
		$this->admin_view('admin/settings', array('title' => 'Website Settings', 'settings' => $this->Settings_model->all()));
	}
}
