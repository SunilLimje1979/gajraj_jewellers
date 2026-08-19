<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Enquiries extends Admin_Controller {
	public function index(){ $status=$this->input->get('status',TRUE); if($status)$this->db->where('status',$status); $data=array('title'=>'Contact Enquiries','rows'=>$this->db->order_by('id','DESC')->get('contact_enquiries')->result()); $this->admin_view('admin/enquiries',$data); }
	public function update($id){ $this->db->where('id',(int)$id)->update('contact_enquiries',array('status'=>$this->input->post('status',TRUE),'internal_note'=>$this->input->post('internal_note',TRUE),'updated_at'=>date('Y-m-d H:i:s'))); $this->session->set_flashdata('success','Enquiry updated.'); redirect('admin/enquiries'); }
	public function delete($id){ $this->db->where('id',(int)$id)->delete('contact_enquiries'); redirect('admin/enquiries'); }
	public function export(){ header('Content-Type:text/csv'); header('Content-Disposition:attachment; filename="enquiries.csv"'); $out=fopen('php://output','w'); fputcsv($out,array('Name','Mobile','Email','Subject','Status','Message','Created')); foreach($this->db->order_by('id','DESC')->get('contact_enquiries')->result_array() as $r) fputcsv($out,array($r['name'],$r['mobile'],$r['email'],$r['subject'],$r['status'],$r['message'],$r['created_at'])); fclose($out); }
}
