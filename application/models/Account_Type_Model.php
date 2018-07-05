<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_Type_Model extends BaseModel {

	public $has_many = [
		'accounts' => ['model' => 'Account_Model', 'primary_key' => 'type_id'],
	];

	public $_table = 'tbl_account_types';
	public $primary_key = 'type_id';
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
}
