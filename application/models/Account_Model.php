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

	protected function validate_balance($id, $amount) {
		return $this->account->get($id)['balance'] > $amount ? TRUE : FALSE;
	}

	public function validate_account($id, $pin) {
		$account = $this->account->get($id);
		if ($account && $this->encryption->decrypt($account['account_pin']) === $pin) {
			unset($account['account_pin']);
			return TRUE;
		}
		return FALSE;
	}

	public function get_protected($id) {
		$account = $this->account->with('account_type')->get($id);
		unset($account['account_pin']);
		return $account;
	}

	public function get_all_protected() {
		$accounts = $this->account->with('account_type')->get_all();
		foreach ($accounts as $account) {
			unset($account['account_pin']);
		}
		return $accounts;
	}
}
