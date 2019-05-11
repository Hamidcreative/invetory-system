<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Export extends MY_Controller {
	
	function __construct(){
        parent::__construct();
        if(!isAdministrator($this->session->userdata('user')->id)) return redirect('inventory');
    }

	public function index()
	{
		$data = [];
		$this->show('export/index',$data);
	}

	public function database(){
		if($this->input->method() == 'post'){
			$tables = ['user','warehouse','warehouse_type','inventory','inventory_type','user_activity'];
			$module = $this->input->post('module');
			$tablesToExport = [];
			if(isset($tables[$module])){
				array_push($tablesToExport, $tables[$module]);
				$filename = ucwords($tables[$module]);
			}
			else {
				$tablesToExport = array_merge($tables, ['role', 'permissions', 'user_role', 'user_permissions']);

				$filename = 'Database';
			}

            $this->load->library('excel');
	         //activate worksheet number 1
			foreach($tablesToExport as $key => $table) {
				$list = $this->Common_model->select_fields($table,'*', FALSE, '', '',true);
	        	$this->excel->setActiveSheetIndex($key);
	        	$this->excel->getActiveSheet()->setTitle(ucwords($table));
				$columns = $this->db->list_fields($table);
	            $rowIndex = count($list)+1;
	            $this->excel->getActiveSheet()->fromArray($columns, null, 'A1');//anotther way of making bold
	            $first_letter = PHPExcel_Cell::stringFromColumnIndex(0);
	            $last_letter = PHPExcel_Cell::stringFromColumnIndex(count($columns) - 1);
	            $header_range = "{$first_letter}1:{$last_letter}1";
	            $this->excel->getActiveSheet()->getStyle($header_range)->getFont()->setBold(true);

	            $this->excel->getActiveSheet()->fromArray($list, null, 'A2');
            	$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
            	$this->excel->createSheet();
			}
	        $this->excel->setActiveSheetIndex(0);

            $filename .= '_'.date("Y-m-d") . "-" . time() . '.xlsx';
            $dirPath = FCPATH . 'uploads/generated_reports/';
            $filePath = $dirPath . $filename;
            if (!is_dir(FCPATH . 'uploads/generated_reports')) {
                mkdir($dirPath, 0777, true);
            }

            header('Content-Type: application/vnd.ms-excel'); //mime type
            header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
            header('Cache-Control: max-age=0'); //no cache

            //force user to download the Excel file without writing it to server's HD
            $objWriter->save('php://output');
			$activity = array('warehouse_id' =>'','model_id' => '','method' => 'Database Exported', 'model_name' => 'Database','name'=> $filename,'detail'=> 'Database Exported','rout'=>'');
			logs($activity);

		}
	}
}
