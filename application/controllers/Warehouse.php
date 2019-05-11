<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warehouse extends MY_Controller {
    function __construct(){
        parent::__construct();
        if(!isAdministrator($this->session->userdata('user')->id)) return redirect('inventory');
    }

    public function index($param = NULL){// whare house  listing
        if($param === 'listing'){
            $selectData = array('
            WH.id AS ID,
            WH.name AS Name,
		    WH.status As Status,
		    warehouse_type.name As Type,
		    CASE WHEN WH.status = 1 THEN CONCAT("<span  data-id=\'0\' class=\'badge green statusmodal\'> Published </span>") WHEN WH.status = 0 THEN CONCAT ("<span data-id=\'1\' class=\'badge red statusmodal\'>Pending    </span>") ELSE CONCAT ("<span  data-id=\'1\' class=\' badge red statusmodal\'> ", WH.status, " </span>") END AS Status
		    ',false);
            $addColumns = array(
                'ViewEditActionButtons' => array('<a href="'.base_url().'warehouse/view/$1" id="view"><i class="material-icons">remove_red_eye</i></a><a href="'.base_url().'warehouse/edit/$1" id="edit"><i class="material-icons">edit</i></a><a class=""><i class="material-icons deletemodal">delete</i></a>','ID')
            );
            $where = '';
            $joins = array(
                array(
                    'table'     => 'warehouse WH',
                    'condition' => 'WH.warehouse_type_id = warehouse_type.id',
                    'type'      => 'Right'
                )
            );
            $returnedData = $this->Common_model->select_fields_joined_DT($selectData,'warehouse_type',$joins,'','','','',$addColumns);
            print_r($returnedData);
            return NULL;
        }
        elseif($param === 'delete'){
            if($this->input->post()) {
                $id = $this->input->post('id');
                 $name = $this->Common_model->select_fields_where('warehouse','name', ['id' => $id],true);
                 $this->Common_model->delete('warehouse', ['id' => $id]);
                // delete warehouse permissions
                $permission = $this->Common_model->select_fields_where('permissions', 'id', ['code' => $id.'_view_WH']);
                $deleted =$this->Common_model->delete('permissions',['id' => $permission[0]->id]);
                $this->Common_model->delete('user_permissions',['permission_id' => $permission[0]->id]);
                if ($deleted){
                    echo json_encode(['type' => 'success', 'message' => 'Record deleted successfully']);
                    $activity = array('warehouse_id' =>$id,'model_id' => $id,'method' => 'Deleted', 'model_name' => 'Warehouse','name'=> $name->name,'detail'=> 'Wareouse Deleted','rout'=>'');
                    logs($activity);
                }
                else{
                    echo json_encode(['type' => 'error', 'message' => 'Record not deleted']);
                }


            }
        }
        elseif($param === 'status'){
            $id = $this->input->post('id');
            $status = $this->input->post('status');
            $whereUpdate = array('id' => $id);
            $update = array('status'=>$status);
            $returnedData = $this->Common_model->update('warehouse',$whereUpdate,$update);
            if ($returnedData){
                echo json_encode(['type' => 'success', 'message' => 'Record updated successfully']);
                $name = $this->Common_model->select_fields_where('warehouse','name', ['id' => $id],true);
                $activity = array('warehouse_id' =>$id,'model_id' => $id,'method' => 'Status Updated', 'model_name' => 'Warehouse','name'=> $name->name,'detail'=> 'Status updated','rout'=>'warehouse/view/'.$id);
                logs($activity);
            }else{
                echo json_encode(['type' => 'error', 'message' => 'Record not updated']);
            }

        }
        else{
            $this->show('warehouse/listing');
            return NULL;
        }
    }

    public function add(){ // add warehouse
        if($this->input->method() == 'post'){
            $this->form_validation->set_rules('name', 'Name', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('alert', ['type'=>'error', 'message'=>'Invalid data']);
                return redirect('warehouse/add');
            }
            else {
                $data = [
                    'name' => $this->input->post('name'),
                    'descrption' => $this->input->post('descrption'),
                    'warehouse_type_id' => $this->input->post('types'),
                ];
                $insert = $this->Common_model->insert_record('warehouse', $data);
                $whId = $this->db->insert_id();
                $permissions = [
                    'name' => 'View Warehouse',
                    'code' => $whId.'_view_WH',
                ];
                $this->Common_model->insert_record('permissions', $permissions);
                if($insert){
                    $this->session->set_flashdata('alert', ['type'=>'success', 'message'=>'warehouse info Added successfully']);
                    $activity = array('warehouse_id' =>$whId,'model_id' => $whId,'method' => 'Added', 'model_name' => 'Warehouse','name'=> $this->input->post('name'),'detail'=> 'Warehouse Added','rout'=>'warehouse/view/'.$whId);
                    logs($activity);
                    redirect('warehouse');
                } else {
                    $this->session->set_flashdata('alert', ['type'=>'error', 'message'=>'Error updating']);
                    redirect('warehouse/add');
                }
            }
        }else {
            $data = [
                'types' => $this->Common_model->select_fields_where('warehouse_type','id,name',array('status' => 1),FALSE),
            ];
            $this->show('warehouse/add', $data);
        }
    }

    public function edit($id){ // Edit warehouse
        if($this->input->method() == 'post'){
            $this->form_validation->set_rules('name', 'Name', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('alert', ['type'=>'error', 'message'=>'Invalid data']);
                return redirect('warehouse/'.$id);
            }
            else {
                $data = [
                    'name' => $this->input->post('name'),
                    'descrption' => $this->input->post('descrption'),
                    'warehouse_type_id' => $this->input->post('types'),
                ];
                $update = $this->Common_model->update('warehouse',['id'=>$id], $data);
                if($update){
                    $this->session->set_flashdata('alert', ['type'=>'success', 'message'=>'warehouse info updated successfully']);
                    $activity = array('warehouse_id' =>$id,'model_id' => $id,'method' => 'Updated', 'model_name' => 'Warehouse','name' => $this->input->post('name'),'detail'=> 'Warehouse Updated','rout'=>'warehouse/view/'.$id);
                    logs($activity);
                    redirect('warehouse');
                } else {
                    $this->session->set_flashdata('alert', ['type'=>'error', 'message'=>'Error updating']);
                    redirect('warehouse/'.$id);
                }
            }
        }else {
            $data = [
                'warehouse' => $this->Common_model->select_fields_where('warehouse','*', ['id'=>$id], true),
                'types' => $this->Common_model->select_fields_where('warehouse_type','id,name',array('status' => 1),FALSE),
            ];
            $this->show('warehouse/edit', $data);
        }
    }

    public function view($id){ // view warehouse

            $wheres = array(
                'code' => $id . '_view_WH'
            );
            $permissionsid = $this->Common_model->select_fields_where('permissions', 'id', $wheres, TRUE);
            $where = [];
            if ($permissionsid)
                $where = array('permission_id' => $permissionsid->id);

            $joins = array(
                array(
                    'table' => 'user_permissions up',
                    'condition' => 'up.user_id = user.id',
                    'type' => 'Right'
                )
            );
            $whusers = $this->Common_model->select_fields_where_like_join('user', 'user.id,user.username', $joins, $where);
            $data = [
                'warehouse' => $this->Common_model->select_fields_where('warehouse', '*', ['id' => $id], true),
                'whusers' => $whusers,
                'allusers' => $this->Common_model->select_where_not_in('user', $whusers),
            ];

        if(isset($data['warehouse'])) {
            $this->show('warehouse/view', $data);
        }else{
            $this->load->view('errors/pages/notfound');
        }
}

    public function assignusers(){  // Assigned permissions to view warehouse
        $userID = $this->input->post('userID');
        $task    = $this->input->post('div');
        $whID   = $this->input->post('whID');

        $where = array(
            'code'=>$whID.'_view_WH'
        );
        $permissionsid = $this->Common_model->select_fields_where('permissions', 'id',$where,TRUE);
        if($task == 'divs1'){
            $data = [
                'user_id' => $userID,
                'permission_id' => $permissionsid->id,
            ];
            $insert = $this->Common_model->insert_record('user_permissions', $data);
            if ($insert){
                echo json_encode(['type' => 'success', 'message' => 'Assigned user successfully']);
                $name = $this->Common_model->select_fields_where('warehouse','name', ['id' => $whID],true);
                $activity = array('warehouse_id' =>$whID ,'model_id' => $whID, 'method' => 'Added User', 'model_name' => 'Warehouse','name' => $name->name,'detail'=> 'Assigned user to  Warehouse','rout'=>'warehouse/view/'.$whID);
                logs($activity);
            }
            else{
                echo json_encode(['type' => 'error', 'message' => 'Record not updated']);
            }
        }elseif ($task == 'divs2'){
            $where = [
                'user_id' => $userID,
                'permission_id' => $permissionsid->id,
            ];
            $deleted = $this->Common_model->delete('user_permissions',$where);
            if ($deleted){
                echo json_encode(['type' => 'wanning', 'message' => 'Removed user successfully']);
                $name = $this->Common_model->select_fields_where('warehouse','name', ['id' => $whID],true);
                $activity = array('warehouse_id' =>$whID,'model_id' => $whID,'method' => 'Removed user', 'model_name' => 'Warehouse','name'=> $name->name,'detail'=> 'Removed user from  Warehouse','rout'=>'warehouse/view/'.$whID);
                logs($activity);
            }
            else
                echo json_encode(['type' => 'error', 'message' => 'Record not updated']);
        }else{

            echo json_encode(['type' => 'error', 'message' => 'Record not updated']);
        }
    }

    public function types($param = NULL){// whare house types listing
        if($param === 'listing'){
            $selectData = array('
            id AS ID,
            `name` AS Name,
		    `status` As Status,
		    CASE WHEN status = 1 THEN CONCAT("<span  data-id=\'0\' class=\'badge green statusmodal\'> Published </span>") WHEN status = 0 THEN CONCAT ("<span data-id=\'1\' class=\'badge red statusmodal\'>Pending    </span>") ELSE CONCAT ("<span  data-id=\'1\' class=\' badge red statusmodal\'> ", status, " </span>") END AS Status
		    ',false);
            $addColumns = array(
                'ViewEditActionButtons' => array('<a href="'.base_url().'warehouse/types/edit/$1" id="edit"><i class="material-icons">edit</i></a><a class=""><i class="material-icons deletemodal">delete</i></a>','ID')
            );
            $where = '';
            $returnedData = $this->Common_model->select_fields_joined_DT($selectData,'warehouse_type','',$where,'','','',$addColumns);
            print_r($returnedData);
            return NULL;
        }
        elseif($param === 'delete'){
            if($this->input->post()) {
                $id = $this->input->post('id');
                $name = $this->Common_model->select_fields_where('warehouse_type','name', ['id' => $id],true);
                $deleted = $this->Common_model->delete('warehouse_type', ['id' => $id]);
                if ($deleted){
                    echo json_encode(['type' => 'success', 'message' => 'Record deleted successfully']);
                    $activity = array('warehouse_id' =>'','model_id' => '','method' => 'Deleted', 'model_name' => 'Warehouse Type','name'=> $name->name,'detail'=> 'Removed Warehouse Types','rout'=>'');
                    logs($activity);
                }else{
                    echo json_encode(['type' => 'error', 'message' => 'Record not deleted']);
                }
            }
        }
        elseif($param === 'status'){
            $id = $this->input->post('id');
            $status = $this->input->post('status');
            $whereUpdate = array('id' => $id);
            $update = array('status'=>$status);
            $returnedData = $this->Common_model->update('warehouse_type',$whereUpdate,$update);
            if ($returnedData){
                echo json_encode(['type' => 'success', 'message' => 'Record updated successfully']);
                $name = $this->Common_model->select_fields_where('warehouse_type','name', ['id' => $id],true);
                $activity = array('warehouse_id' =>'','model_id' => '','method' => 'Status Updated', 'model_name' => 'Warehouse Type','name'=> $name->name,'detail'=> 'Warehouse types status updated','rout'=>'');
                logs($activity);
            }
            else{
                echo json_encode(['type' => 'error', 'message' => 'Record not updated']);
            }
        }
        else{
            $this->show('warehousetypes/listing');
            return NULL;
        }
    }

    public function add_type(){ // add warehouse type
        if($this->input->method() == 'post'){
            $this->form_validation->set_rules('name', 'Name', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('alert', ['type'=>'error', 'message'=>'Invalid data']);
                return redirect('warehouse/types/add');
            }
            else {
                $data = [
                    'name' => $this->input->post('name'),
                ];
                $insert = $this->Common_model->insert_record('warehouse_type', $data);
                if($insert){
                    $this->session->set_flashdata('alert', ['type'=>'success', 'message'=>'warehouse Types info Added successfully']);
                    $activity = array('warehouse_id' =>'','model_id' => '','method' => 'Added', 'model_name' => 'Warehouse Type','name'=> $this->input->post('name'),'detail'=> 'Warehouse types Added','rout'=>'');
                    logs($activity);
                    redirect('warehouse/types');
                } else {
                    $this->session->set_flashdata('alert', ['type'=>'error', 'message'=>'Error updating']);
                    redirect('warehouse/types/add');
                }
            }
        }else {
            $this->show('warehousetypes/add');
        }
    }   

    public function edit_type($id){ // edit warehouse
        if($this->input->method() == 'post'){
            $this->form_validation->set_rules('name', 'Name', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('alert', ['type'=>'error', 'message'=>'Invalid data']);
                return redirect('warehouse/types/'.$id);
            }
            else {
                $data = [
                    'name' => $this->input->post('name'),
                ];
                $update = $this->Common_model->update('warehouse_type',['id'=>$id], $data);
                if($update){
                    $this->session->set_flashdata('alert', ['type'=>'success', 'message'=>'warehouse Types info updated successfully']);
                    $activity = array('warehouse_id' =>'','model_id' => '','method' => 'Updated', 'model_name' => 'Warehouse Type','name'=> $this->input->post('name'),'detail'=> 'Warehouse types Updated','rout'=>'');
                    logs($activity);
                    redirect('warehouse/types');
                } else {
                    $this->session->set_flashdata('alert', ['type'=>'error', 'message'=>'Error updating']);
                    redirect('warehouse/types/'.$id);
                }
            }
        }else {
            $data = [
                'warehouse' => $this->Common_model->select_fields_where('warehouse_type','*', ['id'=>$id], true),
            ];
            $this->show('warehousetypes/edit', $data);
        }        
    }     

    public function inventorylisting($warehouseId) {
        $select_data = ['wi.id as ID ,i.item_id, i.description, it.name as inventory_type, wi.send_amount as quantity, i.min_level, wi.status', false];
        $joins = [
            ['table'=>'warehouse_item wi', 'condition'=>'wi.inventory_id = i.id', 'type'=>'inner'],
            ['table'=>'inventory_type it', 'condition'=>'i.inventory_type_id = it.id', 'type'=>'left'],
        ];
        $addColumns = array(
            'actionButtons' => array('<a href="'.base_url().'warehouse/'.$warehouseId.'/inventory/$1"><i class="material-icons">edit</i></a><a href="#" class="confirm-modal-trigger" data-id="$1"><i class="material-icons">delete</i></a>','ID')
        );
        $list = $this->Common_model->select_fields_joined_DT($select_data,'inventory i',$joins,['wi.warehouse_id'=>$warehouseId],'', '', '', $addColumns);
        print $list;
    }

    public function inventory($warehouseId, $warehouseitemId){
        if($this->input->method() == 'post'){
            $data = [
                'send_amount' => $this->input->post('send_amount'),
                'warehouse_id' => $this->input->post('warehouse_id'),
            ];
            $update = $this->Common_model->update('warehouse_item',['id'=>$warehouseitemId], $data);
            if($update){
                $this->session->set_flashdata('alert', ['type'=>'success', 'message'=>'warehouse item info updated successfully']);
                redirect('warehouse/view/'.$warehouseId);
            } else {
                $this->session->set_flashdata('alert', ['type'=>'error', 'message'=>'Error updating']);
                redirect('warehouse/'.$warehouseId.'/inventory/'.$warehouseitemId);
            }
        }else {
            $where_in = '';
            if(!isAdministrator($this->session->userdata('user')->id)){
                $where_in = ['col'=>'id', 'val'=>getUserWareHouseIds($this->session->userdata('user')->id)];
            }
            $warehouses = $this->Common_model->select_fields_where('warehouse','*',['status'=>1], FALSE, '', '', '','','',false, $where_in);
            $data = [
                'users' => $this->Common_model->select_fields_where('user', '*', ['status'=>1]),
                'warehouses' => $warehouses,
                'inventory_types' => $this->Common_model->select_fields_where('inventory_type', '*', ['status'=>1]),
                'warehouseitem' => $this->Common_model->select_fields_where_like_join('warehouse_item wi','wi.*, i.item_id, i.description, i.inventory_type_id, i.min_level',
                    [['table'=>'inventory i', 'condition'=>'i.id = wi.inventory_id', 'type'=>'inner']],
                 ['wi.id'=>$warehouseitemId], true)
            ];
            $this->show('warehouse/edit_inventory', $data);
        }
    }
}
