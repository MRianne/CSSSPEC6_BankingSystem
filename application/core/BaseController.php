<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseController extends CI_Controller {


	public function __construct() {
		parent::__construct();
	}

	public function create_person($person) {
		$person['person_id'] = $this->utilities->create_random_string(11);
		$this->person->insert($person);
		return $person['person_id'];
	}

	public function update_person($id, $data) {
		$this->person->update($id, $data);
		return $id;
	}
	public function current_user() {
		$user = $this->session->userdata("user");
		return $user;
	}

	public function is_user($user_type) {
		$current_user = $this->current_user();
		return $current_user and $user_type === $current_user->user_type;
	}

	public function view($type='profile', $data){
    if($this->current_user()) {

      $data['role'] = $this->current_user()->user_type;
      if($type === 'createUserAccount')
        $data['temporary_password'] = $this->utilities->create_random_string(8);
      if($type === 'createAccount') {
        $data['types'] = $this->account_type->get_all();
        $data['id'] = $id;
      }

      $this->load->view('website/header');
      $this->load->view('website/teller_navbar');
      $this->load->view('website/'.$type, $data);
      $this->load->view('website/footer');
      
    } else {
      show_error("Forbidden Access", 403, "GET OUT OF HERE!!");
    }
  }
}
