<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'controllers/admin/Crud_admin.php';
class Gallery extends Crud_admin { protected $table='gallery'; protected $title='Gallery'; protected $upload_dir='uploads/gallery'; protected $fields=array('title'=>array('type'=>'text'),'category'=>array('type'=>'text'),'image'=>array('type'=>'image','max_w'=>1600,'max_h'=>1600),'description'=>array('type'=>'textarea'),'sort_order'=>array('type'=>'number'),'status'=>array('type'=>'select','options'=>array('active','inactive'))); }
