<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_Type_Model extends BaseModel {

	public $has_many = [
		'accounts' => ['model' => 'Account_Model', 'primary_key' => 'type_id'],
	];

	public $_table = 'tbl_account_types';
	public $primary_key = 'type_id';
	public $before_create = ['date_created', 'date_updated'];
	public $before_update = ['date_updated'];

	public function __construct() {
		parent::__construct();
	}
}
