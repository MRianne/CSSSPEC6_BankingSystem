<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Person_Model extends BaseModel {

	public $has_many = [
		'users' => ['model' => 'User_Model', 'primary_key' => 'person_id'],
		'customers' => ['model' => 'Customer_Model', 'primary_key' => 'person_id'],
		'transactions' => ['model' => 'Transaction_Model', 'primary_key' => 'person_id']
	];

	public $_table = 'tbl_person';
	public $primary_key = 'person_id';
	public $before_create = ['log_create'];
	public $before_update = ['log_update'];

	public function __construct() {
		parent::__construct();
	}

	protected function log_create($person) {
		$person['date_created'] = $person['date_updated'] = date('Y-m-d H:i:s');
		return $person;
	}

	protected function log_update($person) {
		$person['date_updated'] = date('Y-m-d H:i:s');
		return $person;
	}
}
