<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public $csrf;

	function __construct() {
		parent::__construct();

        $this->load->helper('site_helper');
        $this->load->model('Common_model');

		$this->csrf = [
	        'name' => $this->security->get_csrf_token_name(),
	        'hash' => $this->security->get_csrf_hash()
		];
	}

	public function login()
	{	
        if(isUserLogin()) redirect('/');

		if($this->input->method() == 'post'){
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if ($this->form_validation->run() == FALSE){

            	$this->session->set_flashdata('alert', ['type'=>'error', 'message'=>'Username or Email missing']);
                redirect('login');
            } else { 
            	$username = $this->input->post('username');
            	$password = $this->input->post('password');
            	if(authenticateUser($username, $password)){
            		$this->session->set_userdata('loggedin', true);
            		redirect('dashboard');
            	} else {
            		$this->session->set_flashdata('alert',['type'=>'error', 'message'=>'Invalid Credentials']);
            		redirect('login');
            	}
            }
		}
		else
			$this->load->view('auth/login',['csrf'=>$this->csrf]);
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
}
