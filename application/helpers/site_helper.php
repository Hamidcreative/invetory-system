<?php
	
	function authenticateUser($username, $password){
		$ci = & get_instance();
		$password = md5($password);
		$user = $ci->Common_model->select_fields_where('user', '*', ['username'=>$username, 'password'=>$password, 'status'=>1], true);
		if($user){
			// save user in session
			$ci->session->set_userdata('user', $user);
			return true;
		} else 
			return false;
	}

	function isUserLogin(){
		$ci = & get_instance();
		if($ci->session->userdata('loggedin'))
			return true;
		return false;
	}

	function defaultVal($type){
		switch ($type) {
			case 'avatar':
				return 'default.svg';
				break;
			
			default:
				# code...
				break;
		}
	}

	function checkFilePath($path){
		if(file_exists($path))
			return base_url($path);
		else 
			return base_url('assets/uploads/avatar/default.svg');
	}
?>