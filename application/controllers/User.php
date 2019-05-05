<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller
{

	public function index()
	{
		if(!isAdministrator($this->session->userdata('user')->id)) 
			return redirect('inventory');

		$this->show('user/listing');
	}

	public function listing()
	{
		$select_data = ['id as ID ,username, email, firstname, lastname, status', false];
		$addColumns = array(
			'actionButtons' => array('<a href="' . base_url() . 'users/$1"><i class="material-icons">edit</i></a><a href="#" class="confirm-modal-trigger" data-id="$1"><i class="material-icons">delete</i></a>', 'ID')
		);
		$list = $this->Common_model->select_fields_joined_DT($select_data, 'user', '', '', '', '', '', $addColumns);
		print $list;
	}

	public function edit($userId)
	{
		if(!isAdministrator($this->session->userdata('user')->id)) {
			if($this->input->method() == 'patch' or $this->input->method() == 'delete' or $this->session->userdata('user')->id != $userId)
            	return redirect('inventory');
		}

		if ($this->input->method() == 'post') {
			$existingUserInfo = $this->Common_model->select_fields_where('user', 'email, username', ['id' => $userId], true);
			if ($this->input->post('username') != $existingUserInfo->username)
				$is_unique_usename = '|is_unique[user.username]';
			else
				$is_unique_usename = '';

			if ($this->input->post('email') != $existingUserInfo->email)
				$is_unique_email = '|is_unique[user.email]';
			else
				$is_unique_email = '';

			$this->form_validation->set_rules('username', 'Username', 'required' . $is_unique_usename);
			$this->form_validation->set_rules('firstname', 'First Name', 'required');
			$this->form_validation->set_rules('lastname', 'Last Name', 'required');

			if(isAdministrator($this->session->userdata('user')->id)) 
				$this->form_validation->set_rules('roles', 'Role', 'required');

			$this->form_validation->set_rules('email', 'Email', 'required' . $is_unique_email);

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alert', ['type' => 'error', 'message' => 'Invalid data']);
				return redirect('users/' . $userId);
			} else {
				$data = [
					'username' => $this->input->post('username'),
					'firstname' => $this->input->post('firstname'),
					'lastname' => $this->input->post('lastname'),
					'email' => $this->input->post('email'),
					'notes' => $this->input->post('notes'),
					'updated_at' => date('Y-m-d h:i:s'),
				];
				if (!empty($this->input->post('password')))
					$data['password'] = md5($this->input->post('password'));


				if (!empty($_FILES['avatar']['name'])) {
					if ($this->upload->do_upload('avatar'))
						$data['avatar'] = $this->upload->data('file_name');
				}

				$update = $this->Common_model->update('user', ['id' => $userId], $data);
				if ($update) {
					// update user info saved in session
					if($this->session->userdata('user')->id == $userId)
						$this->session->set_userdata('user', $this->Common_model->select_fields_where('user','*',['id'=>$userId], true));
					
					if(isAdministrator($this->session->userdata('user')->id)) 
						// update user role
						$this->updateUserRole($this->input->post('roles'), $userId);

					$this->session->set_flashdata('alert', ['type' => 'success', 'message' => 'User info update successfully']);
					redirect('users');
				} else {
					$this->session->set_flashdata('alert', ['type' => 'error', 'message' => 'Error updating']);
					redirect('users/' . $userId);
				}
			}
		} else if ($this->input->method() == 'delete') {
			$deleted = $this->Common_model->delete('user', ['id' => $userId]);
			if ($deleted)
				echo json_encode(['type' => 'success', 'message' => 'User deleted successfully']);
			else
				echo json_encode(['type' => 'error', 'message' => 'Record not deleted']);
		} else if ($this->input->method() == 'patch') {
			$data = $this->input->input_stream();
			$updated = $this->Common_model->update('user', ['id' => $userId], $data);
			if ($updated)
				echo json_encode(['type' => 'success', 'message' => 'User status updated successfully']);
			else
				echo json_encode(['type' => 'error', 'message' => 'Error updating user status']);
		} else {
			$user = $this->Common_model->select_fields_where('user', '*', ['id' => $userId], true);
			$userrole = $this->Common_model->select_fields_where('user_role', 'role_id', ['user_id' => $userId], true);
			if ($userrole)
				$user->roles = $userrole->role_id;
			else
				$user->roles = '';
			$data = [
				'user' => $user,
				'roles' => $this->Common_model->select('role')
			];
			$this->show('user/edit', $data);
		}

	}

	public function add()
	{
		if(!isAdministrator($this->session->userdata('user')->id)) 
			return redirect('inventory');

		if ($this->input->method() == 'post') {
			$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
			$this->form_validation->set_rules('firstname', 'First Name', 'required');
			$this->form_validation->set_rules('roles', 'Role', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('lastname', 'Last Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.email]');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alert', ['type' => 'error', 'message' => 'Invalid Input Data']);
			} else {
				$data = [
					'username' => $this->input->post('username'),
					'firstname' => $this->input->post('firstname'),
					'lastname' => $this->input->post('lastname'),
					'email' => $this->input->post('email'),
					'password' => md5($this->input->post('password')),
					'notes' => $this->input->post('notes'),
					'created_at' => date('Y-m-d h:i:s'),
					'updated_at' => date('Y-m-d h:i:s'),
				];

				if (!$this->upload->do_upload('avatar'))
					$this->session->set_flashdata('alert', ['type' => 'error', 'message' => $this->upload->display_errors()]);
				else {
					$data['avatar'] = $this->upload->data('file_name');

					$insert = $this->Common_model->insert_record('user', $data);

					if ($insert) {
						// create user role
						$role = $this->input->post('roles');
						$this->Common_model->insert_record('user_role', ['user_id' => $insert, 'role_id' => $role]);
						$this->session->set_flashdata('alert', ['type' => 'success', 'message' => 'User info added successfully']);
						redirect('users');
					} else {
						$this->session->set_flashdata('alert', ['type' => 'error', 'message' => 'Error adding']);
						redirect('users/add');
					}
				}
			}
		}

		$data = [
			'roles' => $this->Common_model->select('role')
		];
		$this->show('user/add', $data);

	}

	protected function updateUserRole($roleId, $userId)
	{
		// check if existing role is same than no need to change any thing
		$userRole = $this->Common_model->select_fields_where('user_role', 'id, role_id', ['user_id' => $userId], true);
		if ($userRole) {
			if ($userRole->role_id != $roleId)
				$this->Common_model->update('user_role', ['id' => $userRole->id], ['role_id' => $roleId]);
		} else {
			$this->Common_model->insert_record('user_role', ['role_id' => $roleId, 'user_id' => $userId]);

		}
	}
}
