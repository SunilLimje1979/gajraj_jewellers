<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'controllers/admin/Crud_admin.php';
class Scheme_steps extends Crud_admin { protected $table='scheme_steps'; protected $title='Scheme Steps'; protected $fields=array('title'=>array('type'=>'text'),'description'=>array('type'=>'textarea'),'sort_order'=>array('type'=>'number'),'status'=>array('type'=>'select','options'=>array('active','inactive'))); }
