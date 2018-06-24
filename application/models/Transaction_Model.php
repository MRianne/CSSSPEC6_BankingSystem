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
}
