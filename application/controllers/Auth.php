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
            		// save user role in session
            		$this->session->set_userdata('user_role', getUserRole($this->session->userdata('user')->id));
					$activity = array('warehouse_id' =>'','model_id' => '','method' => 'Logged in', 'model_name' => 'User','name'=> $username,'detail'=> 'User logged in','rout'=>'users/'.$this->session->userdata('user')->id);
					logs($activity);
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
	public function forgetpassword(){
		if(isUserLogin()) redirect('/');

		if($this->input->method() == 'post'){
			$this->form_validation->set_rules('email', 'eamil', 'required');
			if ($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('alert', ['type'=>'error', 'message'=>'Username or Email missing']);
				redirect('forgetpassword');
			} else {
				$email = $this->input->post('email');
				if(isEmailExist($email)){
					$password = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789') , 0 , 10 );
					$username =update_user_pasword($email,$password);
					if($username){
						$subject = "Reset Password Inventory Management";
						$message = 'Inventory management System'.'<br><br>';
						$message .= "Hi: "."           ". $username ."<br><br>";
						$message .= "Your User Name: "."           ". $username ."<br>";
						$message .= "Your Password: "."            ". $password.'<br><br>';
						$message .= "<a href='".base_url()."login'>Click Here To Login</a><br>";
						if(sendEmail($email,$subject, $message )){
							$this->session->set_flashdata('alert',['type'=>'success', 'message'=>'New Password has been sent to your mail, Please check your Email and Login.']);
							redirect('login');
						}else{
							$this->session->set_flashdata('alert',['type'=>'error', 'message'=>'Something happended wrong please try again!!']);
							redirect('forgetpassword');
						}
					}else{
						$this->session->set_flashdata('alert',['type'=>'error', 'message'=>'Invalid Credentials Username or Email dose not Exist!']);
						redirect('forgetpassword');
					}
				} else {
					$this->session->set_flashdata('alert',['type'=>'error', 'message'=>'Invalid Credentials Username or Email dose not Exist!']);
					redirect('forgetpassword');
				}
			}
		}
		else
			$this->load->view('auth/forgetpassword',['csrf'=>$this->csrf]);
	}
}
