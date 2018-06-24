<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends BaseModel {

	public $belongs_to = [
		'person' => ['model' => 'Person_Model', 'primary_key' => 'person_id']
	];

	public $_table = 'tbl_users';
	public $primary_key = 'username';

	public function __construct() {
		parent::__construct();
	}
}
