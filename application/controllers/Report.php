<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends MY_Controller {

    public function index()
    {
        if(!isAdministrator($this->session->userdata('user')->id)) 
            return redirect('inventory');

        $data = [
            'warehouse' => $this->Common_model->select_fields_where('warehouse','id,name',array('status' => 1),FALSE),
        ];
        $this->show('reports/activity',$data);
    }
    public function inventory_report()
    {
        if(isEndUser($this->session->userdata('user')->id)) 
            return redirect('inventory');

        $data = [
            'warehouse' => $this->Common_model->select_fields_where('warehouse','id,name',array('status' => 1),FALSE),
        ];
        $this->show('reports/inventory',$data);
    }
}