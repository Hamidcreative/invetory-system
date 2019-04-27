<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends MY_Controller {
	
	public function index()
	{
		$this->show('inventory/listing');
	}

	public function listing(){
		$select_data = ['i.id as ID ,item_id, i.description, w.name as warehouse, u.firstname as user, it.name as inventory_type, i.min_level, i.status', false];
		$joins = [
			['table'=>'warehouse w', 'condition'=>'i.warehouse_id = w.id', 'type'=>'inner'],
			['table'=>'user u', 'condition'=>'i.user_id = u.id', 'type'=>'inner'],
			['table'=>'inventory_type it', 'condition'=>'i.inventory_type_id = it.id', 'type'=>'inner'],
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

			$this->form_validation->set_rules('item_id', 'Item No.', 'required'.$is_unique_item_id);
			$this->form_validation->set_rules('description', 'Description', 'required');
			$this->form_validation->set_rules('warehouse_id', 'Warehouse', 'required');
			$this->form_validation->set_rules('user_id', 'User', 'required');
			$this->form_validation->set_rules('inventory_type_id', 'Inventory Type', 'required');
			$this->form_validation->set_rules('min_level', 'Minimum Level', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alert', ['type'=>'error', 'message'=>'Invalid data']);
			}
			else {
				$data = [
					'item_id' => $this->input->post('item_id'),
					'warehouse_id' => $this->input->post('warehouse_id'),
					'description' => $this->input->post('description'),
					'user_id' => $this->input->post('user_id'),
					'inventory_type_id' => $this->input->post('inventory_type_id'),
					'min_level' => $this->input->post('min_level'),
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
			$this->form_validation->set_rules('item_id', 'Item No.', 'required|is_unique[inventory.item_id]');
			$this->form_validation->set_rules('description', 'Description', 'required');
			$this->form_validation->set_rules('warehouse_id', 'Warehouse', 'required');
			$this->form_validation->set_rules('user_id', 'User', 'required');
			$this->form_validation->set_rules('inventory_type_id', 'Inventory Type', 'required');
			$this->form_validation->set_rules('min_level', 'Minimum Level', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alert', ['type'=>'error', 'message'=>'Invalid Input Data']);
			}
			else {
				$data = [
					'item_id' => $this->input->post('item_id'),
					'warehouse_id' => $this->input->post('warehouse_id'),
					'description' => $this->input->post('description'),
					'user_id' => $this->input->post('user_id'),
					'inventory_type_id' => $this->input->post('inventory_type_id'),
					'min_level' => $this->input->post('min_level'),
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
	public function destroy(){

	}
}
