<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_User_Model extends BaseModel {

	public $belongs_to = [
		'users' => ['model' => 'User_Model', 'primary_key' => 'username'],
		'customers' => ['model' => 'Customer_Model', 'primary_key' => 'customer_id']
	];

	public $_table = 'tbl_customer_users';
	// public $primary_key = ['username', 'customer_id'];

	public function __construct() {
		parent::__construct();
	}
}
