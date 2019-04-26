<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {
	
	public function index()
	{
		$this->show('user/listing');
	}

	public function listing(){
		$select_data = ['id as ID ,username, email, firstname, lastname, status', false];
        $addColumns = array(
            'actionButtons' => array('<a href="'.base_url().'users/$1"><i class="material-icons">edit</i></a><a href="#" class="delete-user" data-id="$1"><i class="material-icons">delete</i></a>','ID')
        );
        $list = $this->Common_model->select_fields_joined_DT($select_data,'user','','','','','',$addColumns);
        print $list;
	}
	
	public function edit($userId){
		if($this->input->method() == 'post'){
			$existingUserInfo = $this->Common_model->select_fields_where('user','email, username',['id'=>$userId], true);
			if($this->input->post('username') != $existingUserInfo->username)
		       $is_unique_usename =  '|is_unique[user.usename]';
		    else 
		       $is_unique_usename =  '';

			if($this->input->post('email') != $existingUserInfo->email)
		       $is_unique_email =  '|is_unique[user.email]';
		    else 
		       $is_unique_email =  '';

			$this->form_validation->set_rules('username', 'Username', 'required'.$is_unique_usename);
			$this->form_validation->set_rules('firstname', 'First Name', 'required');
			$this->form_validation->set_rules('lastname', 'Last Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required'.$is_unique_email);

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alert', ['type'=>'error', 'message'=>'Invalid data']);
				return redirect('users/'.$userId);
			}
			else {
				$data = [
					'username' => $this->input->post('username'),
					'firstname' => $this->input->post('firstname'),
					'lastname' => $this->input->post('lastname'),
					'email' => $this->input->post('email'),
				];
				if(!empty($this->input->post('password')))
					$data['password'] = md5($this->input->post('password'));

				$update = $this->Common_model->update('user',['id'=>$userId], $data);
				if($update){
					$this->session->set_flashdata('alert', ['type'=>'success', 'message'=>'User info update successfully']);
					redirect('users');
				} else {
					$this->session->set_flashdata('alert', ['type'=>'error', 'message'=>'Error updating']);
					redirect('users/'.$userId);
				}
			}
		} else if($this->input->method() == 'delete') { 
			$deleted = $this->Common_model->delete('user',['id'=>$userId]);
			if($deleted)
				echo json_encode(['type'=>'success','message'=>'User deleted successfully']);
			else 
				echo json_encode(['type'=>'error','message'=>'Record not deleted']);
		} else {
			$data = [
				'user' => $this->Common_model->select_fields_where('user','*', ['id'=>$userId], true),
				'roles' => $this->Common_model->select('role')
			];
			$this->show('user/edit', $data);
		}

	}

	public function add(){
		if($this->input->method() == 'post'){
			$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.usename]');
			$this->form_validation->set_rules('firstname', 'First Name', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('lastname', 'Last Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.email]');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alert', ['type'=>'error', 'message'=>'Invalid data']);
				return redirect('users/add');
			}
			else {
				$data = [
					'username' => $this->input->post('username'),
					'firstname' => $this->input->post('firstname'),
					'lastname' => $this->input->post('lastname'),
					'email' => $this->input->post('email'),
					'password' =>md5($this->input->post('password'))
				];

				$insert = $this->Common_model->insert_record('user', $data);
				if($insert){
					$this->session->set_flashdata('alert', ['type'=>'success', 'message'=>'User info added successfully']);
					redirect('users');
				} else {
					$this->session->set_flashdata('alert', ['type'=>'error', 'message'=>'Error adding']);
					redirect('users/add');
				}
			}
		}
		else{
			$data = [
				'roles' => $this->Common_model->select('role')
			];
			$this->show('user/add', $data);
		}
	}
	public function destroy(){

	}
}
