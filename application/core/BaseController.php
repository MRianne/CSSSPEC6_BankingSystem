<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseController extends CI_Controller {


	public function __construct() {
		parent::__construct();
	}

	public function current_user() {
		$user = $this->session->userdata("user");
		return $user;
	}

	public function is_user($user_type) {
		$current_user = $this->current_user();
		return $current_user and $user_type == $current_user->user_type;
	}
}
