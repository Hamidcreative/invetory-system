<?php
	
	function authenticateUser($username, $password){
		$ci = & get_instance();
		$password = md5($password);
		$user = $ci->Common_model->select_fields_where('user', '*', ['username'=>$username, 'password'=>$password], true);
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

?>