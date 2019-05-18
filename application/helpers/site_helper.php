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
		if(file_exists('assets/uploads/avatar/'.$path) && !empty($path))
			return base_url('assets/uploads/avatar/'.$path);
		else 
			return base_url('assets/uploads/avatar/default.svg');
	}

	function isEmailExist($email){
		$ci = & get_instance();
		$email = $ci->Common_model->select_fields_where('user', 'email', ['email'=>$email,'status'=>1], true);
		if($email){
			return true;
		} else {
			return false;
		}
	}
 

if(!function_exists('getEmailConfig')) {
	function getEmailConfig()
	{
		$config = array();
		$config['useragent'] =  "CodeIgniter";
		$config['protocol']  = "smtp";
		$config['smtp_host'] = "smtp01.crystone.se";
		$config['smtp_port'] = 587;
		$config['mailtype']  = "html";
		$config['charset']   = "utf-8";
		$config['newline']   = "rn";
		$config['wordwrap']  = TRUE;
		$config['isLive']    = TRUE;
		$config['smtp_user'] = "hamid.creativetech@inventory.3gns.com";
		$config['smtp_pass'] = "Creative84";
		return $config;
	}
}

if(!function_exists('sendEmail')) {
	function sendEmail($recipient, $subject, $message)
	{
		$ci = & get_instance();
		$ci->load->library('email');

		$siteEmail  =  'hamid.creativetech@inventory.3gns.com';
		$config     = getEmailConfig();
		if($config['isLive'] == TRUE ){
			$ci->email->initialize($config);
			$ci->email->from($siteEmail, 'From: Inventory management System');
			$ci->email->to($recipient);
			$ci->email->subject($subject);
			$ci->email->message($message);
			if($ci->email->send()){
				return true;
			}else{
				return false;
			}
		}
		return true;
	}
}
if(!function_exists('update_user_pasword')) {
	function update_user_pasword($email , $password)
	{
		$ci = &get_instance();
		$result = $ci->Common_model->select_fields_where('user', 'email,username', ['email' => $email], true);
		if ($result) {
			$ci->Common_model->update('user', ['email' => $result->email], ['password' => md5($password)]);
			return $result->username;
		} else {
			return false;

		}
	}
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

	function getUserRole($userId) {
		$ci = & get_instance();
		$joins = [
			['table'=>'user_role ur', 'condition'=>'ur.role_id = r.id', 'type'=>'inner']
		];
		$role = $ci->Common_model->select_fields_where_like_join('role r', 'r.name', $joins, ['ur.user_id'=>$userId], true);
		return $role->name;
	}

	function isAdministrator($userId) {
		$ci = & get_instance();
		if($ci->session->userdata('user_role') == 'Administrator') return true;
		return false;
	}

	function isSuperUser($userId) {
		$ci = & get_instance();
		if($ci->session->userdata('user_role') == 'Super User') return true;
		return false;
	}

	function isEndUser($userId) {
		$ci = & get_instance();
		if($ci->session->userdata('user_role') == 'End User') return true;
		return false;
	}

	function getUserWareHouseIds($userId) {
		$ci = & get_instance();
		$joins = [
			['table'=>'user_permissions up', 'condition'=>'up.permission_id = p.id', 'type'=>'inner']
		];
		$warehouseIds = $ci->Common_model->select_fields_where_like_join('permissions p', "REPLACE(p.code, '_view_WH', '') as id", $joins, ['up.user_id'=>$userId, 'p.name'=>'View Warehouse']);
		$wh_ids = [];
		if($warehouseIds){
			foreach ($warehouseIds as $key => $value) {
				array_push($wh_ids, $value->id);
			}
		}
		return $wh_ids;
	}
	function isActive($controller,$method=null){
		$ci = get_instance();
		$class  = $ci->router->fetch_class();
		$function = $ci->router->fetch_method();

			return ( $class == $controller && $function == $method) ? 'active' : '';
		 


	}

?>