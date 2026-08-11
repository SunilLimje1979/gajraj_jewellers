<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'controllers/admin/Crud_admin.php';
class Trust_points extends Crud_admin { protected $table='shop_trust_points'; protected $title='Trust Points'; protected $fields=array('title'=>array('type'=>'text'),'description'=>array('type'=>'textarea'),'icon'=>array('type'=>'text'),'sort_order'=>array('type'=>'number'),'status'=>array('type'=>'select','options'=>array('active','inactive'))); }
