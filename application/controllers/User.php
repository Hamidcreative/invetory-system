<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {
	
	public function index()
	{
		$this->show('user/listing');
	}

	public function listing(){
		$select_data = ['id as ID ,username, email, firstname, lastname, status', false];
        $addColumns = array(
            'actionButtons' => array('<a href="'.base_url().'users/$1"><i class="material-icons">edit</i></a><a href="#" data-id="$1" data-target=".approval-modal-forstatus" data-toggle="modal"><i class="material-icons">delete</i></a>','ID')
        );
        $list = $this->Common_model->select_fields_joined_DT($select_data,'user','','','','','',$addColumns);
        print $list;
	}
	
	public function edit($userId){
		$data = [
			'user' => $this->Common_model->select_fields_where('user','*', ['id'=>$userId], true),
			'roles' => $this->Common_model->select('role')
		];

		$this->show('user/edit', $data);
	}

	public function add(){
		$this->show('user/add');
	}
	public function destroy(){

	}
}
