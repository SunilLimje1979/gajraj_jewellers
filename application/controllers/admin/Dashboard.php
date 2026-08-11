<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {
	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['counts'] = array(
			'Total enquiries' => $this->db->count_all('contact_enquiries'),
			'New enquiries' => $this->db->where('status', 'new')->count_all_results('contact_enquiries'),
			'Sliders' => $this->db->count_all('sliders'),
			'Certificates' => $this->db->count_all('certificates'),
			'Gallery images' => $this->db->count_all('gallery'),
			'Testimonials' => $this->db->count_all('testimonials'),
			'FAQs' => $this->db->count_all('faqs'),
			'Active pages' => $this->db->where('status', 'active')->count_all_results('pages')
		);
		$data['recent'] = $this->db->order_by('id', 'DESC')->limit(8)->get('contact_enquiries')->result();
		$this->admin_view('admin/dashboard/index', $data);
	}
}
