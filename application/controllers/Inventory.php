<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends MY_Controller {
	public $inventoryfields;

    public function __construct(){
        parent::__construct();
    	$this->inventoryfields = [
		        ['field' => 'description', 'label' => 'Description', 'rules' => 'required'],
		        ['field' => 'warehouse_id', 'label' => 'Warehouse', 'rules' => 'required'],
		        ['field' => 'amount', 'label' => 'Amount', 'rules' => 'required'],
		        ['field' => 'inventory_type_id', 'label' => 'Inventory Type', 'rules' => 'required'],
		        ['field' => 'min_level', 'label' => 'Minimum Level', 'rules' => 'required'],
		        ['field' => 'checkin_date', 'label' => 'Check In Date', 'rules' => 'required'],
		        ['field' => 'checkin_amount', 'label' => 'Check In Amount', 'rules' => 'required'],
		        ['field' => 'checkin_by', 'label' => 'Check In By Person', 'rules' => 'required'],
		        ['field' => 'checkout_date', 'label' => 'Check Out Date', 'rules' => 'required'],
		        ['field' => 'checkout_amount', 'label' => 'Check Out Amount', 'rules' => 'required'],
		        ['field' => 'checkout_by', 'label' => 'Checkout By Person', 'rules' => 'required'],
		        ['field' => 'send_warehouse_id', 'label' => 'Send To Warehouse', 'rules' => 'required'],
		        ['field' => 'send_date', 'label' => 'Send Date', 'rules' => 'required'],
		        ['field' => 'send_amount', 'label' => 'Send Amount', 'rules' => 'required'],
		        ['field' => 'send_by', 'label' => 'Send By Person', 'rules' => 'required'],
		        ['field' => 'recieve_warehouse_id', 'label' => 'Receive From Warehouse', 'rules' => 'required'],
		        ['field' => 'recieve_date', 'label' => 'Receive Date', 'rules' => 'required'],
		        ['field' => 'recieve_amount', 'label' => 'Receive Amount', 'rules' => 'required'],
		        ['field' => 'recieve_by', 'label' => 'Receive By Person', 'rules' => 'required']
			];
    }
	
	public function index()
	{
		$this->show('inventory/listing');
	}

	public function listing(){
		$select_data = ['i.id as ID ,item_id, i.description, i.amount,  w.name as warehouse, it.name as inventory_type, i.min_level, i.checkin_date, ciu.firstname as checkin_by, i.checkin_amount, i.checkout_date, cou.firstname as checkout_by, i.checkout_amount, sw.name as send_warehouse, send_date, send_amount, su.firstname as send_by, parcel_id, recieve_date, recieve_amount, rw.name as recieve_warehouse, ru.firstname as recieve_by, i.status', false];
		$joins = [
			['table'=>'inventory_type it', 'condition'=>'i.inventory_type_id = it.id', 'type'=>'left'],
			['table'=>'warehouse w', 'condition'=>'i.warehouse_id = w.id', 'type'=>'left'],
			['table'=>'warehouse sw', 'condition'=>'i.send_warehouse_id = sw.id', 'type'=>'left'],
			['table'=>'warehouse rw', 'condition'=>'i.recieve_warehouse_id = rw.id', 'type'=>'left'],
			['table'=>'user u', 'condition'=>'i.user_id = u.id', 'type'=>'left'],
			['table'=>'user ciu', 'condition'=>'i.checkin_by = ciu.id', 'type'=>'left'],
			['table'=>'user cou', 'condition'=>'i.checkout_by = cou.id', 'type'=>'left'],
			['table'=>'user su', 'condition'=>'i.send_by = su.id', 'type'=>'left'],
			['table'=>'user ru', 'condition'=>'i.recieve_by = ru.id', 'type'=>'left'],
		];
        $addColumns = array(
            'actionButtons' => array('<a href="'.base_url().'inventory/$1"><i class="material-icons">edit</i></a><a href="#" class="confirm-modal-trigger" data-id="$1"><i class="material-icons">delete</i></a>','ID')
        );
        $list = $this->Common_model->select_fields_joined_DT($select_data,'inventory i',$joins,'','','','',$addColumns);
        print $list;
	}
	
	public function edit($inventoryId){
		if($this->input->method() == 'post'){
			$existingInventory = $this->Common_model->select_fields_where('inventory','item_id',['id'=>$inventoryId], true);
			if($this->input->post('item_id') != $existingInventory->item_id)
		       $is_unique_item_id =  '|is_unique[inventory.item_id]';
		    else 
		       $is_unique_item_id =  '';

			array_push($this->inventoryfields, ['field' => 'item_id', 'label' => 'Item No.', 'rules' => 'required'.$is_unique_item_id]);

			$this->form_validation->set_rules($this->inventoryfields);

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alert', ['type'=>'error', 'message'=>'Invalid data']);
			}
			else {
				$data = [
					'item_id' => $this->input->post('item_id'),
					'warehouse_id' => $this->input->post('warehouse_id'),
					'description' => $this->input->post('description'),
					// 'user_id' => $this->input->post('user_id'),
					'inventory_type_id' => $this->input->post('inventory_type_id'),
					'min_level' => $this->input->post('min_level'),
					'checkin_date' => date('Y-m-d', strtotime($this->input->post('checkin_date'))),
					'checkin_amount' => $this->input->post('checkin_amount'),
					'checkin_by' => $this->input->post('checkin_by'),
					'checkout_date' => date('Y-m-d', strtotime($this->input->post('checkout_date'))),
					'checkout_amount' => $this->input->post('checkout_amount'),
					'checkout_by' => $this->input->post('checkout_by'),
					'send_warehouse_id' => $this->input->post('send_warehouse_id'),
					'send_date' => date('Y-m-d', strtotime($this->input->post('send_date'))),
					'send_amount' => $this->input->post('send_amount'),
					'send_by' => $this->input->post('send_by'),
					'recieve_warehouse_id' => $this->input->post('recieve_warehouse_id'),
					'recieve_date' => date('Y-m-d', strtotime($this->input->post('recieve_date'))),
					'recieve_amount' => $this->input->post('recieve_amount'),
					'recieve_by' => $this->input->post('recieve_by'),
					'updated_at' => date('Y-m-d h:i:s'),
				];
				$update = $this->Common_model->update('inventory',['id'=>$inventoryId], $data);
				if($update){
					$this->session->set_flashdata('alert', ['type'=>'success', 'message'=>'Inventory info updated successfully']);
					redirect('inventory');
				} else {
					$this->session->set_flashdata('alert', ['type'=>'error', 'message'=>'Error updating']);
					redirect('inventory/'.$inventoryId);
				}
			}
		} else if($this->input->method() == 'delete') { 
			$deleted = $this->Common_model->delete('inventory',['id'=>$inventoryId]);
			if($deleted)
				echo json_encode(['type'=>'success','message'=>'One item has been deleted successfully']);
			else 
				echo json_encode(['type'=>'error','message'=>'Item not deleted']);
			exit;
		} else if($this->input->method() == 'patch') {
			$data = $this->input->input_stream();
			$updated = $this->Common_model->update('inventory', ['id'=>$inventoryId], $data);
			$activity = array('model_id' => $inventoryId,'action_on'=>$inventoryId,'method' => 'Status Upated', 'model_name' => 'spares','detail'=> 'Spare part status updated','rout'=>'inventory/'.$inventoryId);
			logs($activity);
			if($updated)
				echo json_encode(['type'=>'success','message'=>'Item status updated successfully']);
			else 
				echo json_encode(['type'=>'error','message'=>'Error updating item status']);
			exit;
		}
		$data = [
			'users' => $this->Common_model->select('user'),
			'warehouses' => $this->Common_model->select('warehouse'),
			'inventory_types' => $this->Common_model->select('inventory_type'),
			'inventory' => $this->Common_model->select_fields_where('inventory', '*', ['id'=>$inventoryId],true)
		];
		$this->show('inventory/edit', $data);
		

	}

	public function add(){
		if($this->input->method() == 'post'){

			array_push($this->inventoryfields, ['field' => 'item_id', 'label' => 'Item No.', 'rules' => 'required|is_unique[inventory.item_id]']);

			$this->form_validation->set_rules($this->inventoryfields);

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alert', ['type'=>'error', 'message'=>'Invalid Input Data']);
			}
			else {
				$data = [
					'item_id' => $this->input->post('item_id'),
					'warehouse_id' => $this->input->post('warehouse_id'),
					'description' => $this->input->post('description'),
					'amount' => $this->input->post('amount'),
					// 'user_id' => $this->input->post('user_id'),
					'inventory_type_id' => $this->input->post('inventory_type_id'),
					'min_level' => $this->input->post('min_level'),
					'checkin_date' => date('Y-m-d', strtotime($this->input->post('checkin_date'))),
					'checkin_amount' => $this->input->post('checkin_amount'),
					'checkin_by' => $this->input->post('checkin_by'),
					'checkout_date' => date('Y-m-d', strtotime($this->input->post('checkout_date'))),
					'checkout_amount' => $this->input->post('checkout_amount'),
					'checkout_by' => $this->input->post('checkout_by'),
					'send_warehouse_id' => $this->input->post('send_warehouse_id'),
					'send_date' => date('Y-m-d', strtotime($this->input->post('send_date'))),
					'send_amount' => $this->input->post('send_amount'),
					'send_by' => $this->input->post('send_by'),
					'recieve_warehouse_id' => $this->input->post('recieve_warehouse_id'),
					'recieve_date' => date('Y-m-d', strtotime($this->input->post('recieve_date'))),
					'recieve_amount' => $this->input->post('recieve_amount'),
					'recieve_by' => $this->input->post('recieve_by'),
					'updated_at' => date('Y-m-d h:i:s'),
					'created_at' => date('Y-m-d h:i:s'),
				];
				$update = $this->Common_model->insert_record('inventory', $data);
				if($update){
					$this->session->set_flashdata('alert', ['type'=>'success', 'message'=>'Inventory item added successfully']);
					redirect('inventory');
				} else {
					$this->session->set_flashdata('alert', ['type'=>'error', 'message'=>'Error adding']);
					redirect('inventory/add');
				}
			}
		}

		$data = [
			'users' => $this->Common_model->select('user'),
			'warehouses' => $this->Common_model->select('warehouse'),
			'inventory_types' => $this->Common_model->select('inventory_type'),
		];
		$this->show('inventory/add', $data);
		
	}

}
