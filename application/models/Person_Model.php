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
	public $before_create = ['date_created', 'date_updated'];
	public $before_update = ['date_updated'];

	public function __construct() {
		parent::__construct();
	}
}
