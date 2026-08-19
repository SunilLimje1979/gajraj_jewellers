<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'controllers/admin/Crud_admin.php';
class Faqs extends Crud_admin { protected $table='faqs'; protected $title='FAQs'; protected $fields=array('question'=>array('type'=>'text'),'answer'=>array('type'=>'textarea'),'category'=>array('type'=>'text'),'sort_order'=>array('type'=>'number'),'status'=>array('type'=>'select','options'=>array('active','inactive'))); }
