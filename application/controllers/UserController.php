<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends BaseController {

	public function __construct() {
		parent::__construct();
	}

	public function create() {
		if (parent::is_user('admin') || parent::is_user('teller')) {

			$current_user = parent::current_user();

			$this->form_validation->set_rules('first_name', 'First name', 'trim|required');
			$this->form_validation->set_rules('middle_name', 'Middle name', 'trim|required');
			$this->form_validation->set_rules('last_name', 'Last name', 'trim|required');
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[50]');
			$this->form_validation->set_rules('email', 'E-mail address', 'trim|required|valid_email|is_unique[tbl_users.email]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[30]');
			$this->form_validation->set_rules('passconf', 'Confirm Password', 'trim|required|matches[password]');
			$this->form_validation->set_rules('user_type', 'User Type', 'trim|required|callback_type_check');

			if ($this->form_validation->run()) {
				$person_id = parent::create_person([
					'first_name' => $this->input->post('first_name'),
					'middle_name' => $this->input->post('middle_name'),
					'last_name' => $this->input->post('last_name')
				]);

				$this->user->insert([
					'username' => $this->input->post('username'),
					'password' => $this->encryption->encrypt($this->input->post('password')),
					'email' => $this->input->post('email'),
					'person_id' => $person_id,
					'user_type' => $this->input->post('user_type'),
					'last_login' => null,
					'login_attempts' => 0,
					'last_password_change' => date('Y-m-d H:i:s')
				]);
				return TRUE; // redirect to success
			}

			return FALSE; // return to fail
		} else {
			return FALSE; // return to page
		}
	}

	public function type_check($str) {
		return in_array($str, ['admin', 'teller', 'user']);
	}
}
