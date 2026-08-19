<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'controllers/admin/Crud_admin.php';
class Categories extends Crud_admin { protected $table='jewellery_categories'; protected $title='Jewellery Categories'; protected $upload_dir='uploads/categories'; protected $fields=array('name'=>array('type'=>'text'),'slug'=>array('type'=>'text'),'image'=>array('type'=>'image','max_w'=>800,'max_h'=>800),'description'=>array('type'=>'textarea'),'sort_order'=>array('type'=>'number'),'status'=>array('type'=>'select','options'=>array('active','inactive'))); }
