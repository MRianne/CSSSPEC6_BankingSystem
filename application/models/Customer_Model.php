<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_Model extends BaseModel {

	public $belongs_to = [
		'person' => ['model' => 'Person_Model', 'primary_key' => 'person_id']
	];

	public $_table = 'tbl_customers';
	public $primary_key = 'customer_id';

	public function __construct() {
		parent::__construct();
	}
}
