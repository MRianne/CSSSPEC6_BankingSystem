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

	public function test(){
		echo $this->encryption->decrypt("0349d4fee90cc321ecd0389a576c50a5934bbf724e610f29e1552810b59013fa99e4f50840f859f0ff56ba74ad90b55b4b140aeda738d90ccbead4f437ccb7b5Js78Z2yVFuPgrZ18icaXJASRgpCRTnMorEV+akrGT70=");
		echo $this->encryption->encrypt("030298");
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
			print_r($res);
			echo $this->encryption->decrypt("209bb7429c74ed5ce9e132ad26b2d4effe0a348694ca377865ca10f09f289d3656093afb24fc3c8e9da8b83fbbef9ff7a76d4f68382e42fde829649e5670346bvcBd3c8+jjobQm/POJT1o1rPADdRs2T2A2OnbF9tzx4=");
			if(!isset($res["error_message"])){
				// $data = array(
				// 		"account_id" => $this->session->userdata("authentication_in"),
				// 		"person_id" => $res["person_id"],
				// 		"first_name" => $res["first_name"],
				// 		"middle_name" => $res["middle_name"],
				// 		"last_name" => $res["last_name"],
				// 		"account_type" => $res["account_type"],
				// 		"account_expiry" => $res["account_expiry"],
				// 		"account_status" => $res["account_status"],
				// );
				// $this->session->set_userdata("user_in", $data);
				// $this->session->unset_userdata('authentication_in');
				//redirect('ATM/main');
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
		//redirect('ATM/verify');
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
			else{
				$this->session->set_flashdata('error_message',  $res["error_message"]);
				if($res["attempts"] % 5 == 0) {
					$this->session->unset_userdata('user_in');
					redirect('ATM');
				}
			}
		}
		else{
      $data['error_message'] = validation_errors();
      $data['error_message'] = explode("</p>", $data['error_message']);
      $this->session->set_flashdata('error_message', substr($data['error_message'][0],3));
			redirect('ATM/withdraw/verify');
    }
		redirect('ATM/withdraw/verify');
	}

	public function withdraw(){
		$this->form_validation->set_rules('amount','amount','trim|required|decimal');
		if($this->form_validation->run()){
			$params = $this->setting->withdrawParams();
			if(floatval($this->input->post("amount")) > $params["max"]){
				$data['error_message'] = 'Transaction cannot be processed.<br>Maximum amount per transaction in reached.';
	      $this->session->set_flashdata('error_message', $data['error_message']);
			}
			else if(floatval($this->input->post("amount")) < $params["min"]){
				$data['error_message'] = 'Amount should be divisible by 100 / 200 / 500 / 1000.';
	      $this->session->set_flashdata('error_message', $data['error_message']);
			}
			else{
				$res = $this->transaction->createTransaction($this->input->post("amount"), $this->session->userdata("user_in"));
				if(is_array($res)){
					$this->session->set_flashdata("transaction", $res);
					redirect("ATM/withdraw/receipt");
				}
				else
					$this->session->set_flashdata("error_message", $res);

			}
		}
		else{
			$data['error_message'] = validation_errors();
      $data['error_message'] = explode("</p>", $data['error_message']);
      $this->session->set_flashdata('error_message', substr($data['error_message'][0],3));
		}
		redirect("ATM/main");
	}
}
