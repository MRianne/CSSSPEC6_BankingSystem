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
  public function createAccountView(){
    if(parent::current_user()) {
      $temporary_password = $this->utilities->create_random_string(8);
      $this->load->view('website/header');
      $this->load->view('website/teller_navbar');
      $this->load->view('website/createAccount', ['role' => parent::current_user()->user_type, 'temporary_password' => $temporary_password]);
      $this->load->view('website/footer');
    } else {
      show_error("Forbidden Access", 403, "GET OUT OF HERE!!");
    }

  }

  public function submitLogin(){
    $this->form_validation->set_rules('username','Username','required');
    $this->form_validation->set_rules('password','Password','required');
    if($this->form_validation->run()){
      if($this->user->authenticate_user($this->input->post('username'), $this->input->post('password'))) {
        $current_user = parent::current_user();
        if($current_user->user_type === 'admin' || $current_user->user_type === 'teller')
          return redirect('teller');
        else if ($current_user->user_type === 'user')
          return redirect('profile');
      }
      return redirect('website');
    } else{
      $data['error_message'] = validation_errors();
      $data['error_message'] = explode("</p>", $data['error_message']);
      $this->session->set_flashdata('error_message',  $data['error_message'][0]);
      return redirect('website');
    }
  }
  private function _logout(){
    $this->session->unset_userdata("user");
    return redirect('website');
  }
}