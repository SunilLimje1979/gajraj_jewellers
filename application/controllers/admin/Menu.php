<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'controllers/admin/Crud_admin.php';
class Menu extends Crud_admin { protected $table='menu_items'; protected $title='Menu Items'; protected $fields=array('label'=>array('type'=>'text'),'url'=>array('type'=>'text'),'target'=>array('type'=>'select','options'=>array('_self','_blank')),'sort_order'=>array('type'=>'number'),'status'=>array('type'=>'select','options'=>array('active','inactive'))); }
