<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends BaseModel {

	public $belongs_to = [
		'person' => ['model' => 'Person_Model', 'primary_key' => 'person_id']
	];

	public $_table = 'tbl_users';
	public $primary_key = 'username';

	public function __construct() {
		parent::__construct();
	}

	public function authenticate_user($username, $password) {
		$user = $this->user->as_object()->with('person')->get_by(['username' => $username]);
		if ($user && $this->encryption->decrypt($user->password) === $password) {
			$user->customer_id = $this->customer->get_by(['person_id' => $user->person['person_id']])['customer_id'];
			unset($user->password);
			$this->session->set_userdata("user", $user);
			$this->user->update($user->username, ['last_login' => date("Y-m-d H:i:s")]);
			$this->user->update($user->username, ['login_attempts' => 0]);
			return TRUE;
		}
		$this->session->set_flashdata("error_message", "Incorrect email address or password.");
		if($user)
			$this->user->update($user->username, ['login_attempts' => $user->login_attempts+1]);
		return FALSE;
	}

	public function get_protected($id) {
		$user = $this->user->get($id);
		unset($user['password']);
		return $user;
	}

	public function get_all_protected() {
		$users = $this->user->get_all();
		foreach ($users as $user) {
			unset($user['password']);
		}
	}
}
