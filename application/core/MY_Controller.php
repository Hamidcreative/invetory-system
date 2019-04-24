<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @property Common_model $Common_model It resides all the methods which can be used in most of the controllers.
 * @property Hoosk_model $Hoosk_model It resides all the methods which can be used in most of the controllers.
 */
class MY_Controller extends CI_Controller{


    public function __construct()
    {
        parent::__construct();
    }
        public function show($viewPath, $data = NULL, $bool = false){
        $this->load->view('configrations/header',$data, $bool);
        $this->load->view($viewPath, $data, $bool);
        $this->load->view('configrations/footer',$data, $bool);
    }
}