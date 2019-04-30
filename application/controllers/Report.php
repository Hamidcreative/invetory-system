<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends MY_Controller {

    public function index()
    {
        $data = [
            'warehouse' => $this->Common_model->select_fields_where('warehouse','id,name',array('status' => 1),FALSE),
        ];
        $this->show('reports/activity',$data);
    }
    public function inventory_report()
    {
        $data = [
            'warehouse' => $this->Common_model->select_fields_where('warehouse','id,name',array('status' => 1),FALSE),
        ];
        $this->show('reports/inventory',$data);
    }
}