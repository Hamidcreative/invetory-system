<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warehouse extends MY_Controller {
    function __construct(){
        parent::__construct();
    }

    public function index()
    {
        $this->show('wharehouse/listing');
    }

    public function listing(){// whare house listing
        $select_data = ['id as ID ,username, email, firstname, lastname, status', false];
        $addColumn = array(
            'actionButtons' => array('<span class="tbicon"> <a href="'.base_url().'" class="tooltip"><i class="icon-pencil"></i></a> </span>','ID')
        );
        $list = $this->Common_model->select_fields_joined_DT($select_data,'user','','','','','',$addColumn);
        print $list;
    }
    public function add(){ // add wharehouse
        $this->show('wharehouse/add');
    }
    public function destroy(){  //destroy whare hosue

    }
    public function types($param = NULL){// whare house types listing
        if($param === 'listing'){
            $selectData = array('
            id AS ID,
            `name` AS Name,
		    `status` As Status,
		    CASE WHEN status = 1 THEN CONCAT("<span class=\'badge green\'> Published </span>") WHEN status = 0 THEN CONCAT ("<span class=\'badge red\'>Pending</span>") ELSE CONCAT ("<span class=\' badge red\'> ", status, " </span>") END AS Status
		    ',false);
            $addColumns = array(
                'ViewEditActionButtons' => array('<a href="'.base_url().'" id="edit"><i class="material-icons">edit</i></a><a href="#" data-target=".approval-modal-forstatus" data-toggle="modal"><i class="material-icons">delete</i></a>','ID')
            );
            $where = '';
            $returnedData = $this->Common_model->select_fields_joined_DT($selectData,'warehouse_type','',$where,'','','',$addColumns);
            print_r($returnedData);
            return NULL;
        }
        elseif($param === 'delete'){
            if(!$this->input->post()){
                echo "FAIL::No Value Posted";
                return false;
            }
            $id = $this->input->post('id');
            $value = $this->input->post('value');
            if(empty($id) or !is_numeric($id)){
                echo "FAIL::Posted values are not VALID";
                return NULL;
            }
            if(empty($value)){
                echo "FAIL::Posted values are not VALID";
                return NULL;
            }
            $data='';
            if($value == 'delete'){
                $whereUpdate = array( 'id' => $id );
                $returnedData = $this->Common_model->delete('warehouse_type',$whereUpdate);
                    echo "OK::Record Deleted";
                }else{
                    echo "FAIL::Record Not Deleted";
                }
                return NULL;
        }
        elseif($param === 'status'){
            if(!$this->input->post()){
                echo "FAIL::No Value Posted";
                return false;
            }
            $id = $this->input->post('id');
            $value = $this->input->post('value');
            if(empty($id) or !is_numeric($id)){
                echo "FAIL::Posted values are not VALID";
                return NULL;
            }
            if(empty($value)){
                echo "FAIL::Posted values are not VALID";
                return NULL;
            }
            $data='';
            if($value == 'status'){
                $whereUpdate = array('id' => $id);
                $update = array();
                $returnedData = $this->Common_model->update('warehouse_type',$whereUpdate,$update);
                echo "OK::Status Change";
            }else{
                echo "FAIL::Status Not Change";
            }
            return NULL;
        }
        else{
            $this->show('wharehousetypes/listing');
            return NULL;
        }
    }
    public function add_type(){ // add wharehouse
        $this->show('wharehousetypes/add');
    }
    public function destroy_type(){  //destroy whare hosue

    }
}
