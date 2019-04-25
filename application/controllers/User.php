<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {
	
	public function index()
	{
		$this->show('user/listing');
	}

	public function listing(){
		$select_data = ['id as ID ,username, email, firstname, lastname, status', false];
        $addColumn = array(
          'actionButtons' => array('<span class="tbicon"> <a href="'.base_url().'" class="tooltip"><i class="icon-pencil"></i></a> </span>','ID')
        );
        $list = $this->Common_model->select_fields_joined_DT($select_data,'user','','','','','',$addColumn);
        print $list;
	}
}
