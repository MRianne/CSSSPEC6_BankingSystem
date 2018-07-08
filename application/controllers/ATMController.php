<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ATMController extends BaseController {

	public function __construct() {
		parent::__construct();
	}

	public function index(){
		if(!$this->session->userdata("atm_user"))
    	$this->load->view('atm/login');
		else
			redirect('ATM/main');
	}

	public function test(){
		$this->load->view('atm/receipt');
	}

	public function viewVerification($action = ""){

		if($this->session->userdata("atm_user") && $this->session->userdata("atm_user")["action"] != ""){
			if($this->session->userdata("atm_user")["action"] == "authenticate"){
				$data["action"] = $action."Verification";
				$this->load->view('atm/password', $data);
			}
			else{
				redirect("ATM/".$this->session->userdata("atm_user")["action"]);
			}
		}
		else if($this->session->userdata("atm_user") && !empty($action)){
			//locked in verification
			$user = $this->session->userdata("atm_user");
			$user["action"] = "authenticate";
			$this->session->set_userdata("atm_user", $user);
			//go to pin verification
			$data["action"] = $action."Verification";
			$this->load->view('atm/password', $data);
		}
		else if($this->session->userdata("atm_user")){
			redirect('ATM/main');
		}
		else
			redirect('ATM');
	}

	public function viewMain(){
		if($this->session->userdata("atm_user")){
			if($this->session->userdata("atm_user")["action"] == "")
				$this->load->view('atm/main');
			else if($this->session->userdata("atm_user")["action"] == "authenticate" || $this->session->userdata("error_message")){
				// cancel Authentication
				$user = $this->session->userdata("atm_user");
				$user["action"] = "";
				$this->session->set_userdata("atm_user", $user);

				$this->load->view('atm/main');
			}
			else if ($this->session->userdata("atm_user")["action"] != "")
				redirect('ATM/'.$this->session->userdata("atm_user")["action"]);
		}
		else
			redirect('ATM');
	}

	public function viewWithdraw(){
		if($this->session->userdata("atm_user")){
			if($this->session->userdata("atm_user")["action"] == "withdraw")
				$this->load->view('atm/withdraw');
			else if($this->session->userdata("atm_user")["action"] == "authenticate")
				redirect('ATM/verify/withdraw');
			else
				redirect('ATM/main');
		}
		else
			redirect('ATM');
	}

	public function viewBalance(){
		if($this->session->userdata("atm_user")){
			if($this->session->userdata("atm_user")["action"] == "balance"){
				//update atm_user
				$user =  $this->account->get_protected($this->session->userdata("atm_user")["account_id"]);
				$user["action"] = "";
				$this->session->set_userdata('atm_user', $user);

				// set balance details
				$data["account_id"] = $user["account_id"];
				$data["balance"] = $user["balance"];

				$this->load->view("atm/balance", $data);
				}
				else if($this->session->userdata("atm_user")["action"] == "authenticate")
					redirect('ATM/verify/balance');
				else
					redirect('ATM/main');
		}
		else {
			redirect('ATM');
		}
	}

	public function viewReceipt(){
		if($this->session->userdata("atm_user")){
			if($this->session->userdata("atm_transaction")){
				$data["receipt"] = $this->session->userdata("atm_transaction");
				$d = new DateTime($data["receipt"]["date"]);

				$data["receipt"]["time"] = $d->format('H:i:s');
				$data["receipt"]["date"] = $d->format('y/m/d');
				$this->load->view('atm/receipt', $data);
			}
			else
				redirect('ATM/main');
		}
		else
			redirect('ATM');
	}

	public function viewNext(){
		// reset actions
		$user = $this->session->userdata("atm_user");
		$user["action"] = "";
		$this->session->set_userdata("atm_user", $user);
		redirect("ATM/main");
	}

  public function signIn(){
    $this->form_validation->set_rules('accountnum','Account Number','required|exact_length[12]|numeric');

    if($this->form_validation->run()){
			if($this->account->validate_account($this->input->post("accountnum"))){
				$user =  $this->account->get_protected($this->input->post("accountnum"));
				if($user["status"] == "locked"){
					$this->session->set_flashdata('error_message', "Your account is curretly locked.
																				<br>Please go to our nearest branch to unlock your account. ");
					redirect('ATM');
				}
				else if($user["status"] == "deactivated"){
					$this->session->set_flashdata('error_message', "Your account is curretly deactivated.
																				<br>Please go to our nearest branch to re-activate your account. ");
					redirect('ATM');
				}
				else if($account["date_expiry"] >=  new DateTime('now', new DateTimeZone('Asia/Manila'))){
					$this->session->set_flashdata('error_message', "Your account is expired.
																				<br>Please go to our nearest branch to resolve your account. ");
					redirect('ATM');
				}
				else{
					$user["action"] = "";
					$this->session->set_userdata('atm_user', $user);
					redirect("ATM/main");
				}
			}
			else{
				$this->session->set_flashdata('error_message',  "Account Authentication Error");
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
		if($this->session->userdata("atm_user"))
			$this->session->unset_userdata('atm_user');

		redirect('ATM');
	}


	public function withdrawVerification(){
	  $this->form_validation->set_rules('password','Pin','trim|required|exact_length[6]|numeric');

		if($this->input->post("cancel") != null){
			$user = $this->session->userdata("atm_user");
			$user["action"] = "";
			$this->session->set_userdata("atm_user", $user);
			redirect("ATM/main");
		}
    if($this->session->userdata("atm_user") && $this->form_validation->run()){
			$account_id = $this->session->userdata("atm_user")["account_id"];
			$pin = $this->input->post("password");
			if($this->account->authenticate_account($account_id, $pin)){
				//locked in withdraw
				$user = $this->session->userdata("atm_user");
				$user["action"] = "withdraw";
				$this->session->set_userdata("atm_user", $user);
				redirect('ATM/withdraw');
			}
			else{
				$this->session->set_flashdata('error_message',  $res["error_message"]);
				if($res["attempts"] % 5 == 0) {
					$this->session->unset_userdata('atm_user');
					redirect('ATM');
				}
			}
		}
		else{
      $data['error_message'] = validation_errors();
      $data['error_message'] = explode("</p>", $data['error_message']);
      $this->session->set_flashdata('error_message', substr($data['error_message'][0],3));
    }
		redirect('ATM/verify/withdraw');
	}

	public function balanceVerification(){
	  $this->form_validation->set_rules('password','Pin','trim|required|exact_length[6]|numeric');

		if($this->input->post("cancel") != null){
			$user = $this->session->userdata("atm_user");
			$user["action"] = "";
			$this->session->set_userdata("atm_user", $user);
			redirect("ATM/main");
		}
    if($this->session->userdata("atm_user") && $this->form_validation->run()){
			$account_id = $this->session->userdata("atm_user")["account_id"];
			$pin = $this->input->post("password");
			if($this->account->authenticate_account($account_id, $pin)){
				//locked in balance
				$user = $this->account->get_protected($account_id);
				$user["action"] = "balance";
				$this->session->set_userdata("atm_user", $user);
				redirect('ATM/balance');
			}
			else{
				$this->session->set_flashdata('error_message',  $res["error_message"]);
				if($res["attempts"] % 5 == 0) {
					$this->session->unset_userdata('atm_user');
					redirect('ATM');
				}
			}
		}
		else{
      $data['error_message'] = validation_errors();
      $data['error_message'] = explode("</p>", $data['error_message']);
      $this->session->set_flashdata('error_message', substr($data['error_message'][0],3));
    }
		redirect('ATM/verify/balance');
	}

}
