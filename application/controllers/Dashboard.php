<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	function __construct(){
        parent::__construct();
        if(!isAdministrator($this->session->userdata('user')->id)) return redirect('inventory');
    }

	public function index() {
		$data = array(
			'warehoses' => $this->Common_model->count_all_row('warehouse'),
			'users' => $this->Common_model->count_all_row('user'),
			'spares' => $this->Common_model->count_all_row('inventory'),

		);
		$this->show('dashboard/index',$data);
	}

	public function activity_listing($param = NULL){  //  User activity listing
		if($param === 'listing'){
			$selectData = array('
            user_activity.id AS ID,
            user.username AS Name,
            user_activity.name AS for_user,  
            user_activity.method AS Activity,		     	     
		    user_activity.model_name As Modal,	     
		    user_activity.model_id As Modalid,	     
		    user_activity.created_at As Date,
		    user_activity.rout As Rout,
		    ',false);
			$addColumns = array(
				'ViewEditActionButtons' => array('<a href="'.base_url().'for_user" id="view"><i class="material-icons">remove_red_eye</i></a><a class=""><i class="material-icons deletemodal">delete</i></a>','ID')
			);
			$where = '';
			if(!empty($this->input->post('whID'))){
				$where = array(
					"warehouse_id"  => $this->input->post('whID')
				);
			}
			$joins = array(
				array(
					'table'     => 'user',
					'condition' =>  'user.id = user_activity.user_id ',
					'type'      => 'LEFT'
				)
			);
			$returnedData = $this->Common_model->select_fields_joined_DT($selectData,'user_activity',$joins,$where,'','','',$addColumns);
			print_r($returnedData);
			return NULL;
		}
		elseif($param === 'delete'){
			if($this->input->post()) {
				$id = $this->input->post('id');
				$deleted = $this->Common_model->delete('user_activity', ['id' => $id]);
				if ($deleted)
					echo json_encode(['type' => 'success', 'message' => 'Record deleted successfully']);
				else
					echo json_encode(['type' => 'error', 'message' => 'Record not deleted']);
			}
		}
		else{
			return NULL;
		}
	}
	
	public function spares_listing($param = NULL) // Spare parts logs report
	{
		if ($param === 'listing') {
			$selectData = array('
            user_activity.id AS ID,
            user.username AS Name,
            user_activity.name AS for_user,  
            user_activity.method AS Activity,		     	     
		    user_activity.model_name As Modal,	     
		    user_activity.model_id As Modalid,	     
		    user_activity.created_at As Date,
		    user_activity.rout As Rout,
		    ', false);
			$addColumns = array(
				'ViewEditActionButtons' => array('<a href="' . base_url() . 'for_user" id="view"><i class="material-icons">remove_red_eye</i></a><a class=""><i class="material-icons deletemodal">delete</i></a>', 'ID')
			);
			$where = array("model_name" => 'Spare');
			if (!empty($this->input->post('whID'))) {
				$where = array(
					"model_name" => 'Spare',
					"warehouse_id" => $this->input->post('whID')
				);
			}
			$joins = array(
				array(
					'table' => 'user',
					'condition' => 'user.id = user_activity.user_id ',
					'type' => 'LEFT'
				)
			);
			$returnedData = $this->Common_model->select_fields_joined_DT($selectData, 'user_activity', $joins, $where, '', '', '', $addColumns);
			print_r($returnedData);
			return NULL;
		} elseif ($param === 'delete') {
			if ($this->input->post()) {
				$id = $this->input->post('id');
				$deleted = $this->Common_model->delete('user_activity', ['id' => $id]);
				if ($deleted)
					echo json_encode(['type' => 'success', 'message' => 'Record deleted successfully']);
				else
					echo json_encode(['type' => 'error', 'message' => 'Record not deleted']);
			}
		} else {
			return NULL;
		}
	}
}
