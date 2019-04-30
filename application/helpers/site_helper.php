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



/*must use  similar
userID      who performed activity
model_id    modified table id

*******method*******
   add,update delete,status
   assigned user  // use when user assigned to WH
   removed user   // use when user removed from WH

Modal name      modified table name
detail          activity description
action_on  used  for which user

*/
    function logs($activity){
		$ci = & get_instance();
		$activity['user_id'] = $ci->session->userdata('user')->id;
		$ci->Common_model->insert_record('user_activity', $activity);
	}

?>