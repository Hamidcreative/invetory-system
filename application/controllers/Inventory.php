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

		$this->warehouseInventoryfields = [
		        ['field' => 'inventory_id', 'label' => 'Spare Part', 'rules' => 'required'],
		        ['field' => 'checkin_date', 'label' => 'Check In Date', 'rules' => 'required'],
		        ['field' => 'checkin_amount', 'label' => 'Check In Amount', 'rules' => 'required'],
		        ['field' => 'checkin_by', 'label' => 'Check In By Person', 'rules' => 'required'],
		        ['field' => 'checkout_date', 'label' => 'Check Out Date', 'rules' => 'required'],
		        ['field' => 'checkout_amount', 'label' => 'Check Out Amount', 'rules' => 'required'],
		        ['field' => 'checkout_by', 'label' => 'Checkout By Person', 'rules' => 'required'],
		        ['field' => 'warehouse_id', 'label' => 'Send To Warehouse', 'rules' => 'required'],
		        ['field' => 'send_date', 'label' => 'Send Date', 'rules' => 'required'],
		        ['field' => 'send_amount', 'label' => 'Send Amount', 'rules' => 'required'],
		        ['field' => 'send_by', 'label' => 'Send By Person', 'rules' => 'required'],
		        ['field' => 'from_warehouse_id', 'label' => 'From Warehouse', 'rules' => 'required'],
		        ['field' => 'recieve_by', 'label' => 'Receive By Person', 'rules' => 'required']
			];
    }
	
	public function index()
	{
		$this->show('inventory/listing');
	}

	public function listing(){
		$select_data = ['i.id as ID ,i.item_id, i.description, it.name as inventory_type, i.amount, i.quantity, i.min_level, i.status', false];
		$joins = [
			['table'=>'inventory_type it', 'condition'=>'i.inventory_type_id = it.id', 'type'=>'left'],
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
        $list = $this->Common_model->select_fields_joined_DT($select_data,'inventory i',$joins,'',$warehouseId, $warehouseIds, '', $addColumns);
        print $list;
	}

	public function minlevellisting(){
		$select_data = ['id as ID ,item_id, description, amount, quantity, min_level', false];
        $list = $this->Common_model->select_fields_joined_DT($select_data,'inventory');
        print $list;
	}

	public function edit($inventoryId){
        if(isEndUser($this->session->userdata('user')->id)) 
            return redirect('inventory');

        if(!isAdministrator($this->session->userdata('user')->id)){
			$warehouseIds = getUserWareHouseIds($this->session->userdata('user')->id);
			$inventory = $this->Common_model->select_fields_where('inventory','warehouse_id',['id'=>$inventoryId], true);
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
					'warehouse_id' => $this->input->post('warehouse_id'),
					'description' => $this->input->post('description'),
					// 'user_id' => $this->input->post('user_id'),
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
			$activity = array('model_id' => $inventoryId,'action_on'=>$inventoryId,'method' => 'Status Upated', 'model_name' => 'spares','detail'=> 'Spare part status updated','rout'=>'inventory/'.$inventoryId);
			logs($activity);
			if($updated)
				echo json_encode(['type'=>'success','message'=>'Item status updated successfully']);
			else 
				echo json_encode(['type'=>'error','message'=>'Error updating item status']);
			exit;
		}

		$where_in = '';
		if(!isAdministrator($this->session->userdata('user')->id)){
			$where_in = ['col'=>'id', 'val'=>getUserWareHouseIds($this->session->userdata('user')->id)];
		}
		$warehouses = $this->Common_model->select_fields_where('warehouse','*',['status'=>1], FALSE, '', '', '','','',false, $where_in);

		$data = [
			'warehouses' => $warehouses,
			'inventory_types' => $this->Common_model->select_fields_where('inventory_type', '*', ['status'=>1]),
			'inventory' => $this->Common_model->select_fields_where('inventory', '*', ['id'=>$inventoryId],true)
		];
		$this->show('inventory/edit', $data);
	}

	public function add(){
        if(isEndUser($this->session->userdata('user')->id)) 
            return redirect('inventory');

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
			$this->form_validation->set_rules($this->warehouseInventoryfields);

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alert', ['type'=>'error', 'message'=>'Invalid Input Data']);
				redirect('inventory/send_to_warehouse');
			}
			else {
				$data = [
					'inventory_id' => $this->input->post('inventory_id'),
					'checkin_date' => date('Y-m-d', strtotime($this->input->post('checkin_date'))),
					'checkin_amount' => $this->input->post('checkin_amount'),
					'checkin_by' => $this->input->post('checkin_by'),
					'checkout_date' => date('Y-m-d', strtotime($this->input->post('checkout_date'))),
					'checkout_amount' => $this->input->post('checkout_amount'),
					'checkout_by' => $this->input->post('checkout_by'),
					'warehouse_id' => $this->input->post('warehouse_id'),
					'send_date' => date('Y-m-d', strtotime($this->input->post('send_date'))),
					'send_amount' => $this->input->post('send_amount'),
					'send_by' => $this->input->post('send_by'),
					'from_warehouse_id' => $this->input->post('from_warehouse_id'),
					'recieve_by' => $this->input->post('recieve_by'),
					'updated_at' => date('Y-m-d h:i:s'),
					'created_at' => date('Y-m-d h:i:s'),
				];
				$update = $this->Common_model->insert_record('warehouse_item', $data);
				if($update){
					$this->session->set_flashdata('alert', ['type'=>'success', 'message'=>'Spare part send to warehouse successfully']);
					redirect('inventory');
				} else {
					$this->session->set_flashdata('alert', ['type'=>'error', 'message'=>'Error adding']);
					redirect('inventory/add');
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
				'inventories' => $this->Common_model->select_fields_where('inventory', '*', ['status'=>1]),
				'warehouses' => $warehouses,
				'inventory_types' => $this->Common_model->select_fields_where('inventory_type', '*', ['status'=>1])
			];
			$this->show('inventory/send_to_warehouse', $data);
		}
	}

	public function recieve_from_warehouse(){
		if($this->input->method() == 'post'){
		}
		else {
			$where_in = '';
			if(!isAdministrator($this->session->userdata('user')->id)){
				$where_in = ['col'=>'id', 'val'=>getUserWareHouseIds($this->session->userdata('user')->id)];
			}
			$warehouses = $this->Common_model->select_fields_where('warehouse','*',['status'=>1], FALSE, '', '', '','','',false, $where_in);
			$data = [
				'users' => $this->Common_model->select_fields_where('user', '*', ['status'=>1]),
				'inventories' => $this->Common_model->select_fields_where('inventory', '*', ['status'=>1]),
				'warehouses' => $warehouses,
				'inventory_types' => $this->Common_model->select_fields_where('inventory_type', '*', ['status'=>1])
			];
			$this->show('inventory/recieve_from_warehouse', $data);
		}
	}

	public function send_to_technician(){
		if($this->input->method() == 'post'){
		}
		else {
			$where_in = '';
			if(!isAdministrator($this->session->userdata('user')->id)){
				$where_in = ['col'=>'id', 'val'=>getUserWareHouseIds($this->session->userdata('user')->id)];
			}
			$warehouses = $this->Common_model->select_fields_where('warehouse','*',['status'=>1], FALSE, '', '', '','','',false, $where_in);
			$data = [
				'users' => $this->Common_model->select_fields_where('user', '*', ['status'=>1]),
				'inventories' => $this->Common_model->select_fields_where('inventory', '*', ['status'=>1]),
				'warehouses' => $warehouses,
				'inventory_types' => $this->Common_model->select_fields_where('inventory_type', '*', ['status'=>1])
			];
			$this->show('inventory/send_to_technician', $data);
		}
	}

	public function recieve_from_technician(){
		if($this->input->method() == 'post'){
		}
		else {
			$where_in = '';
			if(!isAdministrator($this->session->userdata('user')->id)){
				$where_in = ['col'=>'id', 'val'=>getUserWareHouseIds($this->session->userdata('user')->id)];
			}
			$warehouses = $this->Common_model->select_fields_where('warehouse','*',['status'=>1], FALSE, '', '', '','','',false, $where_in);
			$data = [
				'users' => $this->Common_model->select_fields_where('user', '*', ['status'=>1]),
				'inventories' => $this->Common_model->select_fields_where('inventory', '*', ['status'=>1]),
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
			$file = $_FILES['excel_file']['tmp_name'];
			$handle = fopen($file, "r");
		    if ($file == NULL)
		    	$message = json_encode(['type' => 'error', 'message' => 'Input File is not Valid']);
		    else {
		    	try{
			    	$dataToInsert = [];
			    	$dataToUpdate = [];
			    	$existingItem = $this->Common_model->select_fields('inventory', 'item_id');

			    	$existingItemIds = [];
			    	foreach ($existingItem as $key => $value) {
			    		array_push($existingItemIds, $value->item_id);
			    	}

	            	$this->load->library('excel');
			        $object = PHPExcel_IOFactory::load($file);
					foreach($object->getWorksheetIterator() as $worksheet) {
					    $highestRow = $worksheet->getHighestRow();
					    $highestColumn = $worksheet->getHighestColumn();
					    for($row=2; $row<=$highestRow; $row++) {
					    	$itemId = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					    	$itemType = $worksheet->getCellByColumnAndRow(2, $row)->getValue();

					    	// check item type exist already 
					    	$itemTypeId = $this->Common_model->select_fields_where('inventory_type','id',['name'=>$itemType], true);
					    	if(!$itemTypeId)
					    		// create the type
					    		$itemTypeId = $this->Common_model->insert_record('inventory_type', [
					    			'name' => $itemType,
					    			'description' => $itemType,
					    			'status' => 1,
					    			'created_at' => date('Y-m-d h:i:s'),
					    			'updated_at' => date('Y-m-d h:i:s'),
					    		]);
					    	else 
					    		$itemTypeId = $itemTypeId->id;
					    	// item id is unique in our system , check if exist already than do plus One in the item quantity

					    	if(in_array($itemId, $existingItemIds))
					    		array_push($dataToUpdate, [
					    			'item_id' => $itemId,
					    			'description' => $worksheet->getCellByColumnAndRow(1, $row)->getValue(),
					    			'inventory_type_id' => $itemTypeId ,
					    		]);
					    	else 
					    		array_push($dataToInsert, [
					    			'item_id' => $itemId,
					    			'description' => $worksheet->getCellByColumnAndRow(1, $row)->getValue(),
					    			'inventory_type_id' => $itemTypeId ,
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
		}
	}
	public function barcode(){
		$this->load->view('barcode/index');
	}
}
