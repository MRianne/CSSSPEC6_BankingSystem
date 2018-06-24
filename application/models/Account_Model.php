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
	public $before_create = ['date_created', 'date_updated'];
	public $before_update = ['date_updated'];

	public function __construct() {
		parent::__construct();
	}
}
