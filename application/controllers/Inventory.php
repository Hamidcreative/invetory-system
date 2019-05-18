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
			];

		$this->inventorytransferfields = [
		        ['field' => 'item_id', 'label' => 'Item Id', 'rules' => 'required'],
		        ['field' => 'quantity', 'label' => 'Amount', 'rules' => 'required'],
			];
    }
	
	public function index()
	{
		$this->show('inventory/listing');
	}

	public function listing($warehouse_id=''){
		$select_data = ['wi.id as ID ,i.item_id, i.description, it.name as inventory_type, wi.quantity, wi.min_level, wi.status', false];
		$joins = [
			['table'=>'inventory_type it', 'condition'=>'i.inventory_type_id = it.id', 'type'=>'left'],
			['table'=>'warehouse_inventory wi', 'condition'=>'wi.inventory_id = i.id', 'type'=>'inner'],
		];
		$warehouseIds = '';
		$warehouseId = '';
		if(!isAdministrator($this->session->userdata('user')->id)){
			$warehouseIds = getUserWareHouseIds($this->session->userdata('user')->id);
			$warehouseId = 'warehouse_id';
		}
        $addColumns = array(
            'actionButtons' => array('<a href="'.base_url().'inventory/$1"><i class="material-icons">edit</i></a><a href="#" class="confirm-modal-trigger" data-id="$1"><i class="material-icons">delete</i></a>','ID')
        );
        $where = '';
       	if($warehouse_id != '')
       		$where = ['wi.warehouse_id' => $warehouse_id];
       	
        $list = $this->Common_model->select_fields_joined_DT($select_data,'inventory i',$joins,$where,$warehouseId, $warehouseIds, '', $addColumns);
        print $list;
	}

	public function minlevellisting(){
		$select_data = ['id as ID ,item_id, description, amount, quantity, min_level', false];
        $list = $this->Common_model->select_fields_joined_DT($select_data,'inventory');
        print $list;
	}

	public function edit($warehouseInventoryId){
		$inventoryId = $this->input->post('inventory_id');

        if(isEndUser($this->session->userdata('user')->id)) 
            return redirect('inventory');

        if(!isAdministrator($this->session->userdata('user')->id)){
			$warehouseIds = getUserWareHouseIds($this->session->userdata('user')->id);
			$inventory = $this->Common_model->select_fields_where('inventory','warehouse_id',['id'=>$warehouseInventoryId], true);
			// stop user editing spare part of other ware house
			if(!in_array($inventory->warehouse_id, $warehouseIds))
				return redirect('inventory');
		}

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
					'description' => $this->input->post('description'),
					'serial_number' => $this->input->post('serial_number'),
					'inventory_type_id' => $this->input->post('inventory_type_id'),
					'updated_at' => date('Y-m-d h:i:s'),
				];
				$update = $this->Common_model->update('inventory',['id'=>$inventoryId], $data);
				if($update){
					$whID = $this->input->post('warehouse_id');
					$data = [
						'warehouse_id' => $whID,
						'min_level' => $this->input->post('min_level'),
						'quantity' => $this->input->post('amount'),
						'updated_at' => date('Y-m-d h:i:s'),
					];
					// insert into main inventory 
					$this->Common_model->update('warehouse_inventory',['id'=>$warehouseInventoryId], $data);
					$this->session->set_flashdata('alert', ['type'=>'success', 'message'=>'Inventory info updated successfully']);
					$activity = array('warehouse_id' =>$whID,'model_id' => $whID,'method' => 'Updated', 'model_name' => 'Spare','name'=> $this->input->post('item_id'),'detail'=> 'Updated Spare Part','rout'=>'inventory/'.$warehouseInventoryId);
					logs($activity);
					redirect('inventory');
				} else {
					$this->session->set_flashdata('alert', ['type'=>'error', 'message'=>'Error updating']);
					redirect('inventory/'.$warehouseInventoryId);
				}
			}
		} else if($this->input->method() == 'delete') {
			$joins = [
				['table'=>'warehouse_inventory wi', 'condition'=>'wi.inventory_id = i.id', 'type'=>'inner']
			];
			$inventory = $this->Common_model->select_fields_where_like_join('inventory i', 'i.item_id, wi.warehouse_id', $joins, ['wi.id'=>$warehouseInventoryId], true );
			$deleted = $this->Common_model->delete('warehouse_inventory',['id'=>$warehouseInventoryId]);
			if($deleted){
				echo json_encode(['type'=>'success','message'=>'One item has been deleted successfully']);
				$activity = array('warehouse_id' =>$inventory->warehouse_id,'model_id' => $inventory->warehouse_id,'method' => 'Deleted', 'model_name' => 'Spare','name'=> $inventory->item_id,'detail'=> 'Spare Part Deleted','rout'=>'');
				logs($activity);
			}
			else{
				echo json_encode(['type'=>'error','message'=>'Item not deleted']);
			}
			exit;
		} else if($this->input->method() == 'patch') {
			$data = $this->input->input_stream();
			$joins = [
				['table'=>'warehouse_inventory wi', 'condition'=>'wi.inventory_id = i.id', 'type'=>'inner']
			];
			$inventory = $this->Common_model->select_fields_where_like_join('inventory i', 'i.item_id, wi.warehouse_id', $joins, ['wi.id'=>$warehouseInventoryId], true );
			$updated = $this->Common_model->update('warehouse_inventory', ['id'=>$warehouseInventoryId], $data);
			if($updated){
				echo json_encode(['type'=>'success','message'=>'Item status updated successfully']);
				$activity = array('warehouse_id' =>$inventory->warehouse_id,'model_id' => $inventory->warehouse_id,'method' => 'Status Updated', 'model_name' => 'Spare','name'=> $inventory->item_id,'detail'=> 'Status Updated','rout'=>'inventory/'.$warehouseInventoryId);
				logs($activity);
			}
			else 
				echo json_encode(['type'=>'error','message'=>'Error updating item status']);
			exit;
		}
		$where_in = '';
		if(!isAdministrator($this->session->userdata('user')->id)){
			$where_in = ['col'=>'id', 'val'=>getUserWareHouseIds($this->session->userdata('user')->id)];
		}
		$warehouses = $this->Common_model->select_fields_where('warehouse','*',['status'=>1], FALSE, '', '', '','','',false, $where_in);

		$joins = [
			['table'=>'warehouse_inventory wi', 'condition'=>'wi.inventory_id = i.id', 'type'=>'inner']
		];

		$inventories = $this->Common_model->select_fields_where_like_join('inventory i', 'i.item_id, i.description, i.serial_number, i.inventory_type_id, wi.*', $joins, ['wi.id'=>$warehouseInventoryId], true );


		$data = [
			'warehouses' => $warehouses,
			'inventory_types' => $this->Common_model->select_fields_where('inventory_type', '*', ['status'=>1]),
			'inventory' => $inventories
		];
		$this->show('inventory/edit', $data);
	}

	public function add(){
        if(isEndUser($this->session->userdata('user')->id)) 
            return redirect('inventory');

		if($this->input->method() == 'post'){

			$this->form_validation->set_rules($this->inventoryfields);

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alert', ['type'=>'error', 'message'=>'Invalid Input Data']);
			}
			else {
				// check item exist already then get its id
				$itemId = $this->input->post('item_id');
				$inventory = $this->Common_model->select_fields_where('inventory','id',['item_id'=>$itemId], true);
				if($inventory)
					$inventoryId = $inventory->id;
				else { // else add new inventory
					$data = [
						'item_id' => $itemId,
						'description' => $this->input->post('description'),
						'serial_number' => $this->input->post('serial_number'),
						'inventory_type_id' => $this->input->post('inventory_type_id'),
						'updated_at' => date('Y-m-d h:i:s'),
						'created_at' => date('Y-m-d h:i:s'),
					];
					// insert into main inventory table
					$inventoryId = $this->Common_model->insert_record('inventory', $data);
				}
				if($inventoryId){
					// check if exist alrady then add amount
					$warehouseId = $this->input->post('warehouse_id');
					$warehouseInventory = $this->Common_model->select_fields_where('warehouse_inventory','id, quantity',
						['inventory_id'=>$inventoryId, 'warehouse_id'=>$warehouseId], true);

					if($warehouseInventory){
						// update item amount
						$data = [
							'min_level' => $this->input->post('min_level'),
							'quantity' => $warehouseInventory->quantity + $this->input->post('amount'),
							'updated_at' => date('Y-m-d h:i:s'),
						];
						$this->Common_model->update('warehouse_inventory',['id'=>$warehouseInventory->id] ,$data);
						$this->session->set_flashdata('alert', ['type'=>'success', 'message'=>'Inventory item quantity added successfully']);
					}
					else {
						// insert into warehouse item
						$data = [
							'inventory_id' => $inventoryId,
							'warehouse_id' => $warehouseId,
							'min_level' => $this->input->post('min_level'),
							'quantity' => $this->input->post('amount'),
							'updated_at' => date('Y-m-d h:i:s'),
							'created_at' => date('Y-m-d h:i:s'),
						];
						// insert into main inventory table
						$this->Common_model->insert_record('warehouse_inventory', $data);
						$last_insertedid = $this->db->insert_id();
						$this->session->set_flashdata('alert', ['type'=>'success', 'message'=>'Inventory item added successfully']);
						$activity = array('warehouse_id' =>$warehouseId,'model_id' => $warehouseId,'method' => 'Added', 'model_name' => 'Spare','name'=> $itemId,'detail'=> 'Spare Added','rout'=>'inventory/'.$last_insertedid);
						logs($activity);
					}
					redirect('inventory');
				} else {
					$this->session->set_flashdata('alert', ['type'=>'error', 'message'=>'Error adding']);
					redirect('inventory/add');
				}
			}
		}

		$where_in = '';
		if(!isAdministrator($this->session->userdata('user')->id))
			$where_in = ['col'=>'id', 'val'=>getUserWareHouseIds($this->session->userdata('user')->id)];	 

		if(empty($where_in['val']) && !isAdministrator($this->session->userdata('user')->id)){
			echo json_encode(['type'=>'error','message'=>'Contact admin']);
			return redirect('users/'.$this->session->userdata('user')->id);// we will redirect it to message page 
		}
		$warehouses = $this->Common_model->select_fields_where('warehouse','*',['status'=>1], FALSE, '', '', '','','',false, $where_in);

		$data = [
			'warehouses' => $warehouses,
			'inventory_types' => $this->Common_model->select_fields_where('inventory_type', '*', ['status'=>1]),
		];
		$this->show('inventory/add', $data);
	}

	public function send_to_warehouse(){
		if($this->input->method() == 'post'){

			array_push($this->inventorytransferfields, ['field' => 'checkout_by', 'label' => 'Checkout By Person', 'rules' => 'required'], 
		        ['field' => 'from_warehouse_id', 'label' => 'From Warehouse', 'rules' => 'required'],
		        ['field' => 'to_warehouse_id', 'label' => 'To Warehouse', 'rules' => 'required']);

			$this->form_validation->set_rules($this->inventorytransferfields);

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alert', ['type'=>'error', 'message'=>'Invalid Input Data']);
				redirect('inventory/send_to_warehouse');
			}
			else {
				$itemId = $this->input->post('item_id');
				$fromWarehouseId = $this->input->post('from_warehouse_id');
				$quantity = $this->input->post('quantity');
				// check item code exist and get existing amount for that item against that warehouse
				$existingItem = $this->Common_model->select_fields_where_like_join('inventory i', 'i.id, wi.quantity, wi.id as warehouseInventoryId',
				[
					['table'=>'warehouse_inventory wi', 'condition'=>'wi.inventory_id = i.id', 'type'=>'inner']
				],
				[
					'i.item_id' => $itemId,
					'wi.warehouse_id' => $fromWarehouseId,
					'wi.status' => 1,
				], true);

				if(!$existingItem) {
					$this->session->set_flashdata('alert', ['type'=>'error', 'message'=>'Item not exist in selected warehouse']);
					redirect('inventory/send_to_warehouse');
				}

				if($existingItem->quantity < $quantity) {
					$this->session->set_flashdata('alert', ['type'=>'error', 'message'=>'Not enough amount of items exist in selected warehouse']);
					redirect('inventory/send_to_warehouse');
				}

				$this->Common_model->update('warehouse_inventory',[
					'warehouse_id' => $fromWarehouseId,
					'status' => 1,
					'inventory_id' => $existingItem->id
				],[
					'quantity' => $existingItem->quantity - $quantity
				]);
				
				$data = [
					'warehouse_inventory_id' => $existingItem->warehouseInventoryId,
					'to_user_id' => $this->input->post('checkout_by'),
					'quantity' => $this->input->post('quantity'),
					'from_warehouse_id' => $fromWarehouseId,
					'to_warehouse_id' => $this->input->post('to_warehouse_id'),
					'from_user_id' => $this->session->userdata('user')->id,
					'type' => 1,
					'created_at' => date('Y-m-d h:i:s'),
				];
				$insertedId = $this->Common_model->insert_record('inventory_transfer', $data);
				if($insertedId){
					$this->session->set_flashdata('alert', ['type'=>'success', 'message'=>'Spare part send to warehouse successfully']);
					redirect('inventory');
				} else {
					$this->session->set_flashdata('alert', ['type'=>'error', 'message'=>'Error adding']);
					redirect('inventory/send_to_warehouse');
				}
			}
		}
		else {
			$where_in = '';
			if(!isAdministrator($this->session->userdata('user')->id)){
				$where_in = ['col'=>'id', 'val'=>getUserWareHouseIds($this->session->userdata('user')->id)];
			}
			$warehouses = $this->Common_model->select_fields_where('warehouse','*',['status'=>1], FALSE, '', '', '','','',false, $where_in);
			$data = [
				'users' => $this->Common_model->select_fields_where('user', '*', ['status'=>1]),
				'warehouses' => $warehouses,
				'inventory_types' => $this->Common_model->select_fields_where('inventory_type', '*', ['status'=>1])
			];
			$this->show('inventory/send_to_warehouse', $data);
		}
	}

	public function recieve_from_warehouse(){
		if($this->input->method() == 'post'){

			array_push($this->inventorytransferfields, ['field' => 'from_user_id', 'label' => 'From Person', 'rules' => 'required'],
		        ['field' => 'from_warehouse_id', 'label' => 'From Warehouse', 'rules' => 'required'],
		        ['field' => 'to_warehouse_id', 'label' => 'To Warehouse', 'rules' => 'required']);

			$this->form_validation->set_rules($this->inventorytransferfields);

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alert', ['type'=>'error', 'message'=>'Invalid Input Data']);
				redirect('inventory/recieve_from_warehouse');
			}
			else {
				$itemId = $this->input->post('item_id');
				$toWarehouseId = $this->input->post('to_warehouse_id');
				$quantity = $this->input->post('quantity');
				// check item code exist and get existing amount for that item against that warehouse
				$existingItem = $this->Common_model->select_fields_where_like_join('inventory i', 'i.id, wi.quantity, wi.id as warehouseInventoryId',
				[
					['table'=>'warehouse_inventory wi', 'condition'=>'wi.inventory_id = i.id', 'type'=>'inner']
				],
				[
					'i.item_id' => $itemId,
					'wi.warehouse_id' => $toWarehouseId,
					'wi.status' => 1,
				], true);

				if(!$existingItem) {
					$this->session->set_flashdata('alert', ['type'=>'error', 'message'=>'Item not exist in selected warehouse']);
					redirect('inventory/recieve_from_warehouse');
				}

				$this->Common_model->update('warehouse_inventory',[
					'warehouse_id' => $toWarehouseId,
					'status' => 1,
					'inventory_id' => $existingItem->id
				],[
					'quantity' => $existingItem->quantity + $quantity
				]);
				
				$data = [
					'warehouse_inventory_id' => $existingItem->warehouseInventoryId,
					'to_user_id' => $this->session->userdata('user')->id,
					'quantity' => $this->input->post('quantity'),
					'from_warehouse_id' => $this->input->post('from_warehouse_id'),
					'to_warehouse_id' => $toWarehouseId,
					'from_user_id' => $this->input->post('from_user_id'),
					'type' => 2,
					'created_at' => date('Y-m-d h:i:s'),
				];
				$insertedId = $this->Common_model->insert_record('inventory_transfer', $data);
				if($insertedId){
					$this->session->set_flashdata('alert', ['type'=>'success', 'message'=>'Spare part received from warehouse successfully']);
					redirect('inventory');
				} else {
					$this->session->set_flashdata('alert', ['type'=>'error', 'message'=>'Error adding']);
					redirect('inventory/recieve_from_warehouse');
				}
			}
		}
		else {
			$where_in = '';
			if(!isAdministrator($this->session->userdata('user')->id)){
				$where_in = ['col'=>'id', 'val'=>getUserWareHouseIds($this->session->userdata('user')->id)];
			}
			$warehouses = $this->Common_model->select_fields_where('warehouse','*',['status'=>1], FALSE, '', '', '','','',false, $where_in);
			$data = [
				'users' => $this->Common_model->select_fields_where('user', '*', ['status'=>1]),
				'warehouses' => $warehouses,
				'inventory_types' => $this->Common_model->select_fields_where('inventory_type', '*', ['status'=>1])
			];
			$this->show('inventory/recieve_from_warehouse', $data);
		}
	}

	public function send_to_technician(){
		if($this->input->method() == 'post'){

			array_push($this->inventorytransferfields, 
		        ['field' => 'from_warehouse_id', 'label' => 'From Warehouse', 'rules' => 'required'],['field' => 'technician_id', 'label' => 'From Person', 'rules' => 'required']);

			$this->form_validation->set_rules($this->inventorytransferfields);

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alert', ['type'=>'error', 'message'=>'Invalid Input Data']);
				redirect('inventory/send_to_technician');
			}
			else {
				$itemId = $this->input->post('item_id');
				$fromWarehouseId = $this->input->post('from_warehouse_id');
				$quantity = $this->input->post('quantity');
				// check item code exist and get existing amount for that item against that warehouse
				$existingItem = $this->Common_model->select_fields_where_like_join('inventory i', 'i.id, wi.quantity, wi.id as warehouseInventoryId',
				[
					['table'=>'warehouse_inventory wi', 'condition'=>'wi.inventory_id = i.id', 'type'=>'inner']
				],
				[
					'i.item_id' => $itemId,
					'wi.warehouse_id' => $fromWarehouseId,
					'wi.status' => 1,
				], true);

				if(!$existingItem) {
					$this->session->set_flashdata('alert', ['type'=>'error', 'message'=>'Item not exist in selected warehouse']);
					redirect('inventory/send_to_technician');
				}

				if($existingItem->quantity < $quantity) {
					$this->session->set_flashdata('alert', ['type'=>'error', 'message'=>'Not enough amount of items exist in selected warehouse']);
					redirect('inventory/send_to_warehouse');
				}

				$this->Common_model->update('warehouse_inventory',[
					'warehouse_id' => $fromWarehouseId,
					'status' => 1,
					'inventory_id' => $existingItem->id
				],[
					'quantity' => $existingItem->quantity - $quantity
				]);
				
				$data = [
					'warehouse_inventory_id' => $existingItem->warehouseInventoryId,
					'to_user_id' => $this->input->post('technician_id'),
					'quantity' => $this->input->post('quantity'),
					'from_warehouse_id' => $fromWarehouseId,
					'from_user_id' =>$this->session->userdata('user')->id ,
					'type' => 3,
					'created_at' => date('Y-m-d h:i:s'),
				];
				$insertedId = $this->Common_model->insert_record('inventory_transfer', $data);
				if($insertedId){
					$this->session->set_flashdata('alert', ['type'=>'success', 'message'=>'Spare part send to technician successfully']);
					redirect('inventory');
				} else {
					$this->session->set_flashdata('alert', ['type'=>'error', 'message'=>'Error adding']);
					redirect('inventory/send_to_technician');
				}
			}
		}
		else {
			$where_in = '';
			if(!isAdministrator($this->session->userdata('user')->id)){
				$where_in = ['col'=>'id', 'val'=>getUserWareHouseIds($this->session->userdata('user')->id)];
			}
			$warehouses = $this->Common_model->select_fields_where('warehouse','*',['status'=>1], FALSE, '', '', '','','',false, $where_in);
			$data = [
				'users' => $this->Common_model->select_fields_where('user', '*', ['status'=>1]),
				'warehouses' => $warehouses,
				'inventory_types' => $this->Common_model->select_fields_where('inventory_type', '*', ['status'=>1])
			];
			$this->show('inventory/send_to_technician', $data);
		}
	}

	public function recieve_from_technician(){
		if($this->input->method() == 'post'){

			array_push($this->inventorytransferfields, 
		        ['field' => 'to_warehouse_id', 'label' => 'To Warehouse', 'rules' => 'required'],['field' => 'technician_id', 'label' => 'From Person', 'rules' => 'required']);

			$this->form_validation->set_rules($this->inventorytransferfields);

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alert', ['type'=>'error', 'message'=>'Invalid Input Data']);
				redirect('inventory/recieve_from_technician');
			}
			else {
				$itemId = $this->input->post('item_id');
				$toWarehouseId = $this->input->post('to_warehouse_id');
				$quantity = $this->input->post('quantity');
				// check item code exist and get existing amount for that item against that warehouse
				$existingItem = $this->Common_model->select_fields_where_like_join('inventory i', 'i.id, wi.quantity, wi.id as warehouseInventoryId',
				[
					['table'=>'warehouse_inventory wi', 'condition'=>'wi.inventory_id = i.id', 'type'=>'inner']
				],
				[
					'i.item_id' => $itemId,
					'wi.warehouse_id' => $toWarehouseId,
					'wi.status' => 1,
				], true);

				if(!$existingItem) {
					$this->session->set_flashdata('alert', ['type'=>'error', 'message'=>'Item not exist in selected warehouse']);
					redirect('inventory/recieve_from_technician');
				}

				$this->Common_model->update('warehouse_inventory',[
					'warehouse_id' => $toWarehouseId,
					'status' => 1,
					'inventory_id' => $existingItem->id
				],[
					'quantity' => $existingItem->quantity + $quantity
				]);
				
				$data = [
					'warehouse_inventory_id' => $existingItem->warehouseInventoryId,
					'from_user_id' => $this->input->post('technician_id'),
					'quantity' => $this->input->post('quantity'),
					'to_warehouse_id' => $toWarehouseId,
					'to_user_id' =>$this->session->userdata('user')->id ,
					'type' => 4,
					'created_at' => date('Y-m-d h:i:s'),
				];
				$insertedId = $this->Common_model->insert_record('inventory_transfer', $data);
				if($insertedId){
					$this->session->set_flashdata('alert', ['type'=>'success', 'message'=>'Spare part receive from technician successfully']);
					redirect('inventory');
				} else {
					$this->session->set_flashdata('alert', ['type'=>'error', 'message'=>'Error adding']);
					redirect('inventory/recieve_from_technician');
				}
			}
		}
		else {
			$where_in = '';
			if(!isAdministrator($this->session->userdata('user')->id)){
				$where_in = ['col'=>'id', 'val'=>getUserWareHouseIds($this->session->userdata('user')->id)];
			}
			$warehouses = $this->Common_model->select_fields_where('warehouse','*',['status'=>1], FALSE, '', '', '','','',false, $where_in);
			$data = [
				'users' => $this->Common_model->select_fields_where('user', '*', ['status'=>1]),
				'warehouses' => $warehouses,
				'inventory_types' => $this->Common_model->select_fields_where('inventory_type', '*', ['status'=>1])
			];
			$this->show('inventory/recieve_from_technician', $data);
		}
	}

	public function minlevel()
	{
        if(isAdministrator($this->session->userdata('user')->id)) 
			$this->show('inventory/minlevelstock_listing');
	}

	public function import(){
        if(isEndUser($this->session->userdata('user')->id)) 
            return redirect('inventory');

		if($this->input->method() == 'post'){
			$itemTypeId = $this->input->post('inventory_type_id');
			$file = $_FILES['excel_file']['tmp_name'];
			$handle = fopen($file, "r");
		    if ($file == NULL)
		    	$message = json_encode(['type' => 'error', 'message' => 'Input File is not Valid']);
		    else {
		    	try{
			    	$dataToInsert = [];
			    	$dataToUpdate = [];
			    	$existingItem = $this->Common_model->select_fields('inventory', 'item_id, quantity');

			    	$existingItemIds = [];
			    	foreach ($existingItem as $key => $value) {
			    		$existingItemIds[strval($value->item_id)] = $value->quantity;
			    	}

	            	$this->load->library('excel');
			        $object = PHPExcel_IOFactory::load($file);
					foreach($object->getWorksheetIterator() as $worksheet) {
					    $highestRow = $worksheet->getHighestRow();
					    $highestColumn = $worksheet->getHighestColumn();
					    for($row=2; $row<=$highestRow; $row++) {
					    	$itemId = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					    	$itemType = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					    	// item id is unique in our system , check if exist already than do plus One in the item quantity
					    	if(array_key_exists(strval($itemId), $existingItemIds)){
					    		$existingItemIds[strval($itemId)] += 1;
					    		array_push($dataToUpdate, [
					    			'item_id' => $itemId,
					    			'description' => $worksheet->getCellByColumnAndRow(1, $row)->getValue(),
					    			'inventory_type_id' => $itemTypeId,
					    			'quantity' => $existingItemIds[strval($itemId)],
					    		]);
					    	}
					    	else 
					    		array_push($dataToInsert, [
					    			'item_id' => $itemId,
					    			'description' => $worksheet->getCellByColumnAndRow(1, $row)->getValue(),
					    			'inventory_type_id' => $itemTypeId,
					    			'min_level' => 1,
					    			'quantity' => 1,
					    			'warehouse_id' => 1,
					    			'status' => 1,
					    		]);

					    }
					}

					if(!empty($dataToInsert))
						$this->Common_model->insert_multiple('inventory', $dataToInsert);
					if(!empty($dataToUpdate))
						$this->Common_model->update_multiple('inventory', $dataToUpdate, 'item_id');
			      
			      	$message = json_encode(['type' => 'success', 'message' => 'File has been imported successfully']);

			    } catch(Exception $e){
			    	$message = json_encode(['type' => 'error', 'message' => 'Error Importing']);
			    }
		    }
		    echo $message;
		} else {
			$data = [
				'inventory_types' => $this->Common_model->select_fields_where('inventory_type', '*', ['status'=>1]),
			];
			$this->show('inventory/import', $data);
		}
	}

	public function barcode(){
		$this->load->view('barcode/index');
	}

	public function item($itemId) {
		$item = $this->Common_model->select_fields_where('inventory', '*', ['item_id'=>$itemId], true);
		if($item)
			echo json_encode(['item'=>$item, 'type'=>'success']);
		else 
			echo json_encode(['type'=>'error','message'=>'Item not exist with entered item code']);
	}
}
