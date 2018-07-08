<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class WebsiteController extends BaseController {
	public function __construct() {
		parent::__construct();
	}
	public function index(){
    if(parent::current_user())
      if(parent::current_user()->user_type == 'user')
        return $this->loadView('profile');
      else
        return $this->tellerView('teller');

    $this->load->view('website/header');
    $this->load->view('website/loginView');
    $this->load->view('website/footer');
  }
  public function loadView($type){
    if(parent::current_user() && parent::is_user('user')) {

      $data['role'] = parent::current_user()->user_type;
      $this->load->view('website/header');
      $this->load->view('website/user_navbar');
      $this->load->view('website/'.$type);
      $this->load->view('website/footer');

    } else {
      show_error("Forbidden Access", 403, "GET OUT OF HERE!!");
    }
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
  public function tellerView($type='profile', $id=null){
    if(parent::current_user() && (parent::is_user('admin') || parent::is_user('teller'))) {

      $data['role'] = parent::current_user()->user_type;
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

  public function submitLogin(){
    $this->form_validation->set_rules('username','Username','required');
    $this->form_validation->set_rules('password','Password','required');
    if($this->form_validation->run()){
      if($this->user->authenticate_user($this->input->post('username'), $this->input->post('password'))) {
        $current_user = parent::current_user();
        if($current_user->user_type === 'admin' || $current_user->user_type === 'teller')
          return redirect('teller');
        else if ($current_user->user_type === 'user')
          return redirect('customer');
      }
      return redirect('website');
    } else{
      $data['error_message'] = validation_errors();
      $this->session->set_flashdata('error_message',  $data['error_message']);
      return redirect('website');
    }
  }
  private function _logout(){
    $this->session->unset_userdata("user");
    return redirect('website');
  }
}