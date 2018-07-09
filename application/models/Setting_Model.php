<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_Model extends BaseModel {

	public $_table = 'tbl_settings';
	public $primary_key = 'id';
	public $before_create = ['date_created', 'date_updated'];
	public $before_update = ['date_updated'];

	public function __construct() {
		parent::__construct();
	}

	public function validate_withdraw($amount){
		$setting = $this->setting->get("2018000001");
		return ($amount >= $setting["min_withdraw"] && $amount <= $setting["max_withdraw"]) ? TRUE : FALSE;
	}

	public function validate_daily_withdraw($account_id, $amount){
		$transactions = $this->transaction->get_all(["account_id" => $account_id]);
		$setting = $this->setting->get("2018000001");
		$totalTransactions = $amount;

		foreach ($transactions as $value) {
			if(date_create($value["date"])->format("Y-m-d") == date("Y-m-d") && $value["description"] == ATM_WITHDRAWAL){
				$totalTransactions += $value["amount"];
			}
		}

		return ($totalTransactions <= $setting["max_withdraw_per_day"])? TRUE : FALSE;
	}
}
