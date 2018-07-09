<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_Model extends BaseModel {

	public $belongs_to = [
		'account' => ['model' => 'Account_Model', 'primary_key' => 'account_id'],
		'person' => ['model' => 'Person_Model', 'primary_key' => 'person_id']
	];

	public $_table = 'tbl_transactions';
	public $primary_key = 'transaction_id';
	public $before_create = ['log_create'];

	public function __construct() {
		parent::__construct();
	}

	protected function log_create($transaction) {
		$transaction['date'] = date('Y-m-d H:i:s');
		return $transaction;
	}
}
