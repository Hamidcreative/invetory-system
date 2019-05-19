<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @property Common_model $Common_model It resides all the methods which can be used in most of the controllers.
 * @property Hoosk_model $Hoosk_model It resides all the methods which can be used in most of the controllers.
 */
class MY_Controller extends CI_Controller{

    public $csrf;

    public function __construct()
    {
        parent::__construct();

        $this->load->helper('site_helper');
        $this->load->model('Common_model');
        $this->load->library('datatables');
        
        if(!isUserLogin()){
            return redirect('/login');
        }

        $this->csrf = [
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        ];
        
        $config['upload_path']          = './assets/uploads/avatar/';
        $config['allowed_types']        = 'jpg|png';
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        $this->notifications = $this->getNotifications();
    }

    public function show($viewPath, $data = NULL, $bool = false){
        $data['csrf'] = $this->csrf;
        $data['notifications'] = $this->notifications;
        $this->load->view('configrations/header',$data, $bool);
        $this->load->view('configrations/sidebar',$data, $bool);
        $this->load->view($viewPath, $data, $bool);
        $this->load->view('configrations/footer',$data, $bool);
    }

    public function getNotifications(){
        return [
            'minimumlevelstock' => $this->checkMinimumStock()
        ];
    }

    public function checkMinimumStock(){
        $stock = $this->Common_model->select_fields_where_like_join('inventory i','i.id, i.item_id',
            [['table'=>'warehouse_inventory wi','condition'=>'wi.inventory_id = i.id and wi.quantity <= wi.min_level', 'type'=>'inner']],
        '',  TRUE, '', '', '', ['wi.updated_at','desc']);
        if($stock) return true;
        return false;
    }
}