<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventorytypes extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function index($param = NULL){
        if(isEndUser($this->session->userdata('user')->id))
            return redirect('inventory');

        if($param === 'listing'){
            $selectData = array('
            id AS ID,
            `name` AS Name,
		    `status` As Status,
		    CASE WHEN status = 1 THEN CONCAT("<span  data-id=\'0\' class=\'badge green statusmodal\'> Published </span>") WHEN status = 0 THEN CONCAT ("<span data-id=\'1\' class=\'badge red statusmodal\'>Pending    </span>") ELSE CONCAT ("<span  data-id=\'1\' class=\' badge red statusmodal\'> ", status, " </span>") END AS Status
		    ',false);
            $addColumns = array(
                'ViewEditActionButtons' => array('<a href="'.base_url().'inventory/types/edit/$1" id="edit"><i class="material-icons">edit</i></a><a class=""><i class="material-icons deletemodal">delete</i></a>','ID')
            );
            $where = '';
            $returnedData = $this->Common_model->select_fields_joined_DT($selectData,'inventory_type','',$where,'','','',$addColumns);
            print_r($returnedData);
            return NULL;
        }
        elseif($param === 'delete'){
            if(isEndUser($this->session->userdata('user')->id)) 
            return redirect('inventory');

            if($this->input->post()) {
                $id = $this->input->post('id');
                $deleted = $this->Common_model->delete('inventory_type', ['id' => $id]);
                if ($deleted)
                    echo json_encode(['type' => 'success', 'message' => 'Record deleted successfully']);
                else
                    echo json_encode(['type' => 'error', 'message' => 'Record not deleted']);
            }
        }
        elseif($param === 'status'){
            if(isEndUser($this->session->userdata('user')->id)) 
            return redirect('inventory');
        
            $id = $this->input->post('id');
            $status = $this->input->post('status');
            $whereUpdate = array('id' => $id);
            $update = array('status'=>$status);
            $returnedData = $this->Common_model->update('inventory_type',$whereUpdate,$update);
            if ($returnedData)
                echo json_encode(['type' => 'success', 'message' => 'Record updated successfully']);
            else
                echo json_encode(['type' => 'error', 'message' => 'Record not updated']);
        }
        else{
            $this->show('inventorytypes/listing');
            return NULL;
        }
    }
    public function add(){ // add warehouse type
        if(isEndUser($this->session->userdata('user')->id)) 
            return redirect('inventory');

        if($this->input->method() == 'post'){
            $this->form_validation->set_rules('name', 'Name', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('alert', ['type'=>'error', 'message'=>'Invalid data']);
                return redirect('inventorytypes/add');
            }
            else {
                $data = [
                    'name' => $this->input->post('name'),
                ];
                $insert = $this->Common_model->insert_record('inventory_type', $data);
                if($insert){
                    $this->session->set_flashdata('alert', ['type'=>'success', 'message'=>'warehouse Types info Added successfully']);
                    redirect('inventory/types');
                } else {
                    $this->session->set_flashdata('alert', ['type'=>'error', 'message'=>'Error updating']);
                    redirect('inventorytypes/add');
                }
            }
        }else {
            $this->show('inventorytypes/add');
        }
    }
    public function edit($id){ // edit warehouse
        if(isEndUser($this->session->userdata('user')->id)) 
            return redirect('inventory');

        if($this->input->method() == 'post'){
            $this->form_validation->set_rules('name', 'Name', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('alert', ['type'=>'error', 'message'=>'Invalid data']);
                return redirect('inventorytypes/edit/'.$id);
            }
            else {
                $data = [
                    'name' => $this->input->post('name'),
                ];
                $update = $this->Common_model->update('inventory_type',['id'=>$id], $data);
                if($update){
                    $this->session->set_flashdata('alert', ['type'=>'success', 'message'=>'Inventory Types info updated successfully']);
                    redirect('inventory/types');
                } else {
                    $this->session->set_flashdata('alert', ['type'=>'error', 'message'=>'Error updating']);
                    redirect('inventorytypes/edit/'.$id);
                }
            }
        }else {
            $data = [
                'inventory' => $this->Common_model->select_fields_where('inventory_type','*', ['id'=>$id], true),
            ];
            $this->show('inventorytypes/edit', $data);
        }
    }
}