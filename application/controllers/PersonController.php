<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PersonController extends BaseController {

	public function __construct() {
		parent::__construct();
	}

	public function create($person) {

		$person['person_id'] = $this->utilities->create_random_string(11);
		return $this->person->insert($person);
	}
}
