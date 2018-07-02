<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ATMController extends BaseController {

	public function __construct() {
		parent::__construct();
	}

	public function index(){
		if(!$this->session->userdata("authentication_in") && !$this->session->userdata("user_in"))
    	$this->load->view('atm/login');
		else if($this->session->userdata("authentication_in"))
			redirect('ATM/verify');
		else if($this->session->userdata("user_in"))
			redirect('ATM/main');
	}

	public function viewVerification(){
		if($this->session->userdata("authentication_in")){
			$data["action"] = "accountVerification";
			$this->load->view('atm/password', $data);
		}
		else if($this->session->userdata("user_in") && $this->session->userdata("action")){
			$data["action"] = $this->session->userdata("action")."Verification";
			$this->load->view('atm/password', $data);
		}
		else if($this->session->userdata("user_in")){
			redirect('ATM/main');
		}
		else
			redirect('ATM');
	}

	public function viewMain(){
		if($this->session->userdata("user_in"))
			$this->load->view('atm/main');
		else
			redirect('ATM');
	}

	public function viewWithdraw(){
		if($this->session->userdata("user_in")){
			if($this->session->userdata("verification")){
				$this->load->view('atm/withdraw');
			}
			else{
				$this->session->set_flashdata('action', "withdraw");
				redirect('ATM/withdraw/verify');
			}
		}
		else
			redirect('ATM');
	}

  public function signIn(){
    $this->form_validation->set_rules('accountnum','Account Number','required|exact_length[12]');

    if($this->form_validation->run()){
			$res = $this->account->atm_login($this->input->post("accountnum"));
			if(is_array($res)){
				$this->session->set_userdata('authentication_in', $this->input->post("accountnum"));
				redirect("ATM/verify");
			}
			else{
				$this->session->set_flashdata('error_message',  $res);
				redirect('ATM');
			}
    }
    else{
      $data['error_message'] = validation_errors();
      $data['error_message'] = explode("</p>", $data['error_message']);
      $this->session->set_flashdata('error_message', substr($data['error_message'][0],3));
      redirect('ATM');
    }
  }

	public function signOut(){
		if($this->session->userdata("user_in"))
			$this->session->unset_userdata('user_in');

		redirect('ATM');
	}

	public function accountVerification(){
	  $this->form_validation->set_rules('password','Pin','required|exact_length[6]|numeric');

    if($this->form_validation->run()){
			$res = $this->account->atm_verification(
							$this->session->userdata("authentication_in"),
							$this->input->post("password"),
							"account");
			if(!isset($res["error_message"])){
				$data = array(
						"account_id" => $this->session->userdata("authentication_in"),
						"person_id" => $res["person_id"],
						"first_name" => $res["first_name"],
						"middle_name" => $res["middle_name"],
						"last_name" => $res["last_name"],
						"account_type" => $res["account_type"],
						"account_expiry" => $res["account_expiry"],
						"account_status" => $res["account_status"],
				);
				$this->session->set_userdata("user_in", $data);
				$this->session->unset_userdata('authentication_in');
				redirect('ATM/main');
			}
			else if(isset($res["attempts"])){
				$this->session->set_flashdata('error_message',  $res["error_message"]);
				if($res["attempts"] % 5 == 0) {
					$this->session->unset_userdata('authentication_in');
					redirect('ATM');
				}
			}
			else{
				$this->session->set_flashdata('error_message',  $res["error_message"]);
			}
		}
		else{
      $data['error_message'] = validation_errors();
      $data['error_message'] = explode("</p>", $data['error_message']);
      $this->session->set_flashdata('error_message', substr($data['error_message'][0],3));
    }
		redirect('ATM/verify');
	}

	public function withdrawVerification(){
	  $this->form_validation->set_rules('password','Pin','required|exact_length[6]|numeric');

    if($this->form_validation->run()){
			$res = $this->account->atm_verification(
							$this->session->userdata("user_in"),
							$this->input->post("password"),
							"withdraw");
			if(!isset($res["error_message"])){
				$this->session->set_flashdata('verification',  $res);
				redirect('ATM/withdraw');
			}
			else if(isset($res["attempts"])){
				$this->session->set_flashdata('error_message',  $res["error_message"]);
				if($res["attempts"] % 5 == 0) {
					$this->session->unset_userdata('authentication_in');
					redirect('ATM');
				}
			}
			else{
				$this->session->set_flashdata('error_message',  $res["error_message"]);
				redirect('ATM/main');
			}
		}
		else{
      $data['error_message'] = validation_errors();
      $data['error_message'] = explode("</p>", $data['error_message']);
      $this->session->set_flashdata('error_message', substr($data['error_message'][0],3));
    }
		//redirect('ATM/withdraw/verify');
	}
}
