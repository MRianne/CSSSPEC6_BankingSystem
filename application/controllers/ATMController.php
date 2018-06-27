<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ATMController extends BaseController {

	public function __construct() {
		parent::__construct();
	}

	public function index(){
      $this->load->view('atm/login.php');
  }

  public function signIn(){
    $this->form_validation->set_rules('accountnum','Account Number','required|exact_length[12]');
    $this->form_validation->set_rules('pass','Password','required|min_length[4]');

    if($this->form_validation->run()){

    }
    else{
      $data['error_message'] = validation_errors();
      $data['error_message'] = explode("</p>", $data['error_message']);
      $this->session->set_flashdata('error_message',  $data['error_message'][0]);
      $this->session->set_flashdata('login_data',  $this->input->post());
      redirect('ATMController');
    }
  }
}
