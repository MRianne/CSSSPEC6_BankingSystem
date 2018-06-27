<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WebsiteController extends BaseController {

	public function __construct() {
		parent::__construct();
	}

	public function index(){
    $this->load->view('website/header');
    $this->load->view('website/loginView');
    $this->load->view('website/footer');
  }
  public function loadView($type){
    $this->load->view('website/header');
    $this->load->view('website/user_navbar');
    $this->load->view('website/'.$type);
    $this->load->view('website/footer');
  }

  public function userChoice($type){
    switch ($type) {
      case 'profile':
      redirect('profile');break;
      case 'bal':
      redirect('balanceInquiry');break;
      case 'funds':
      redirect('transferFunds');break;
      case 'list':
      redirect('transactionList');break;
      case 'logout':
      $this->_logout();break;
      default:
        # code...
      break;
    }
  }

  public function tellerView($type='profile'){
    $this->load->view('website/header');
    $this->load->view('website/teller_navbar');
    $this->load->view('website/'.$type);
    $this->load->view('website/footer'); 
  }

  public function submitLogin(){
    $this->form_validation->set_rules('username','Username','required');
    $this->form_validation->set_rules('password','Password','required');

    if($this->form_validation->run()){
      if($this->input->post('username') == 'teller')
        redirect('teller');
      else
        redirect('profile');
    }
    else{
      $data['error_message'] = validation_errors();
      $data['error_message'] = explode("</p>", $data['error_message']);
      $this->session->set_flashdata('error_message',  $data['error_message'][0]);
      $this->session->set_flashdata('login_data',  $this->input->post());
      redirect('WebsiteController');
    }
  }

  private function _logout(){
    redirect('website');
  }
}
