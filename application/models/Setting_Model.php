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

	public function withdrawParams(){
		$setting = $this->setting->get("2018000001");
		return array("min"=> $setting["min_withdraw"], "max"=> $setting["max_withdraw"]);
	}
}
