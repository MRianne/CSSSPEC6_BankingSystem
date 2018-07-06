<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_Model extends BaseModel {

	public $belongs_to = [
		'customer' => ['model' => 'Customer_Model', 'primary_key' => 'customer_id'],
		'account_type' => ['model' => 'Account_Type_Model', 'primary_key' => 'type_id']
	];

	public $has_many = [
		'transactions' => ['model' => 'Transaction_Model', 'primary_key' => 'account_id']
	];

	public $_table = 'tbl_accounts';
	public $primary_key = 'account_id';
	public $before_create = ['log_create'];
	public $before_update = ['log_update'];

	public function __construct() {
		parent::__construct();
	}

	protected function log_create($account) {
		$account['date_created'] = $account['date_updated'] = date('Y-m-d H:i:s');
		return $account;
	}

	protected function log_update($account) {
		$account['date_updated'] = date('Y-m-d H:i:s');
		return $account;
	}

	public function validate_balance($id, $amount) {
		return $this->account->get($id)['balance'] > $amount ? TRUE : FALSE;
	}

	public function authenticate_account($id, $pin) {
		$account = $this->account->get($id);
		if ($account && $this->encryption->decrypt($account['account_pin']) === $pin) {
			unset($account['account_pin']);
			return TRUE;
		}
		return FALSE;
	}

	public function validate_account($id) {
		if($this->account->get($id))
			return TRUE;
		return FALSE;
	}

	public function get_protected($id) {
		$account = $this->account->with('account_type')->get($id);
		unset($account['account_pin']);
		return $account;
	}

	public function atm_login($id){
		$account = $this->account->get($id);
		if($account){
			$data["account_id"] = $account["account_id"];
			if($account["status"] == "locked")
				return "Your account is curretly locked.
					<br>Please go to our nearest branch to unlock your account. ";
			else if($account["status"] == "deactivated")
				return "Your account is curretly deactivated.
					<br>Please go to our nearest branch to re-activate your account. ";
			else if($account["date_expiry"] >=  new DateTime('now', new DateTimeZone('Asia/Manila')))
				return "Your account is expired.
					<br>Please go to our nearest branch to resolve your account. ";
			else
					return $data;
		}
		else
		return "Account Authentication Error";
	}

	public function atm_verification($id, $pin, $purpose){
		$account = $this->account->get($id);
		return $account;
		// if ($account && $this->encryption->decrypt($account['account_pin']) === $pin) {
		// 	if($purpose == "account"){
		// 		$person_id = $this->customer->get($account['customer_id'])["person_id"];
		// 		$person =  $this->person->get($person_id);
		// 		$person["account_type"] = $account["type_id"];
		// 		$person["account_status"] = $account["status"];
		// 		$person["account_expiry"] = $account["date_expiry"];
		// 		//return $person;
		// 	}
		// 	else if($purpose == "withdraw"){
		// 		return true;
		// 	}
		// }
		// else{
			// $attempts = $this->_atm_invalid_attempts($account);
			// return array('error_message' => "Invalid Pin (".$attempts.")",
			//							'attempts' => $attempts);
		//}
	}

	private function _atm_invalid_attempts($account){
		$data = array();
		$data["invalid_attempts"] = $account["invalid_attempts"] + 1;

		if($data["invalid_attempts"] % 5 == 0) $data["status"] = "locked";

		$this->db->set($data);
		$this->db->where('account_id', $account["account_id"]);
		$this->db->update('tbl_accounts');

		if($this->db->affected_rows() == 1)	return $data["invalid_attempts"];
		else return $account["invalid_attempts"];
	}

	public function get_all_protected() {
		$accounts = $this->account->with('account_type')->get_all();
		foreach ($accounts as $account) {
			unset($account['account_pin']);
		}
		return $accounts;
	}
}
