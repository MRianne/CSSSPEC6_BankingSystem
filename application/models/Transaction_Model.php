<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_Model extends BaseModel {

	public $belongs_to = [
		'account' => ['model' => 'Account_Model', 'primary_key' => 'account_id'],
		'person' => ['model' => 'Person_Model', 'primary_key' => 'person_id']
	];

	public $_table = 'tbl_transactions';
	public $primary_key = 'transaction_id';
	public $before_create = ['date'];

	public function __construct() {
		parent::__construct();
	}

	public function createTransaction($amount, $user){
		$curr = $this->account->get($user["account_id"])["balance"];
		$customer_id = $this->account->get($user["account_id"])['customer_id'];
		$person = $this->customer->get($customer_id)["person_id"];
		$date = new DateTime('now', new DateTimeZone('Asia/Manila'));
		if($amount <= $curr){
			$params = array(
				"transaction_id" => random_string('alnum',11),
				"account_id" => $user["account_id"],
				"description" => ATM_WITHDRAWAL,
				"amount" => $amount,
				"type" => "withdraw",
				"balance" => ($curr - $amount),
				"status" => "accepted",
				"person_id" => $person,
				"date" => $date->format('Y-m-d H:i:s')
			);
			$this->db->insert('tbl_transactions', $params);
			if($this->db->affected_rows() == 1) return $params;
			else "Transaction cannot be processed";
		}
		else{
			return "Transaction cannot be processed";
		}
	}
}
