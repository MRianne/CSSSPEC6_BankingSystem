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
		// $this->setting->validate_daily_withdraw($this->session->userdata("atm_user")["account_id"], 40000);
		// $data["user"] = $this->customer->with("person")->get($this->session->userdata("atm_user")["customer_id"]);
		// print_r($data["user"]);
		// $this->load->view("ATM/main");
	}

	public function viewVerification($action = ""){

		if($this->session->userdata("atm_user") && $this->session->userdata("atm_user")["action"] != ""){
			if($this->session->userdata("atm_user")["action"] == "authenticate"){
				$data["action"] = $action;
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
			$data["action"] = $action;
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
			$person = $this->customer->with("person")->get($this->session->userdata("atm_user")["customer_id"])["person"];
			if($this->session->userdata("atm_user")["action"] == "")
				$this->load->view('atm/main', array("user" => $person["first_name"]));
			else if($this->session->userdata("atm_user")["action"] == "authenticate" || $this->session->userdata("error_message")){
				// cancel Authentication
				$user = $this->session->userdata("atm_user");
				$user["action"] = "";
				$this->session->set_userdata("atm_user", $user);

				$this->load->view('atm/main', array("user" => $person["first_name"]));
			}
			else if ($this->session->userdata("atm_user")["action"] != "")
				redirect('ATM/'.$this->session->userdata("atm_user")["action"]);
		}
		else
			redirect('ATM');
	}

	public function viewTransaction($action){
		if($this->session->userdata("atm_user")){
			if($this->session->userdata("atm_user")["action"] == $action)
				$this->load->view('atm/'.$action);
			else if($this->session->userdata("atm_user")["action"] == "authenticate")
				redirect('ATM/verify/'.$action);
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
				$user["action"] = "balance";
				$this->session->set_userdata('atm_user', $user);

				// set balance details
				$data["account"] = substr($user["account_id"],8);
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

	public function viewChangePin(){
		if($this->session->userdata("atm_user")){
			if($this->session->userdata("atm_user")["action"] == "pin")
				$this->load->view('atm/pin');
			else if($this->session->userdata("atm_user")["action"] == "authenticate")
				redirect('ATM/verify/pin');
			else
				redirect('ATM/main');
		}
		else
			redirect('ATM');
	}

	public function viewNext(){
		// delete receipt
		if($this->session->userdata("atm_transaction")){
			$this->session->unset_userdata('atm_transaction');
		}
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
		if($this->session->userdata("atm_transaction"))
			$this->session->unset_userdata('atm_transaction');
		redirect('ATM');
	}

	public function verification(){
		$this->form_validation->set_rules('password','Pin','trim|required|exact_length[6]|numeric');
		$action = $this->input->post("action");
		echo $action;
		if($this->input->post("cancel") != null){
			$this->viewNext();
		}
    if($this->session->userdata("atm_user") && $this->form_validation->run()){
			$account_id = $this->session->userdata("atm_user")["account_id"];
			$pin = $this->input->post("password");
			if($this->account->authenticate_account($account_id, $pin)){
				//locked in withdraw
				$user = $this->session->userdata("atm_user");
				$user["action"] = $action;
				$this->session->set_userdata("atm_user", $user);
				redirect('ATM/'.$action);
			}
			else{
				// count invalid attempts
				$account = $this->session->userdata("atm_user");
				$update = array('invalid_attempts' => $account['invalid_attempts'] + 1);
				if(($account['invalid_attempts'] + 1) % 5 == 0){
					$update["status"] = "locked";
					$this->account->update($account["account_id"], $update);
					$this->session->unset_userdata('atm_user');
					$this->session->set_flashdata('error_message', 'Invalid Pin attempt exceeded allowable count. Account Locked.');
					redirect('ATM');
				}
				else{
					$this->account->update($account["account_id"], $update);
					$updated_account = $this->account->get_protected($account["account_id"]);
					$updated_account["action"] = "";
					$this->session->set_userdata('atm_user', $updated_account);
					$this->session->set_flashdata('error_message', 'Invalid Pin (' . $updated_account["invalid_attempts"] . ')');
				}
			}
		}
		else{
      $data['error_message'] = validation_errors();
      $data['error_message'] = explode("</p>", $data['error_message']);
      $this->session->set_flashdata('error_message', substr($data['error_message'][0],3));
    }
		redirect('ATM/verify/'.$action);
	}

}
