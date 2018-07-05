<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Update_Tables extends CI_Migration {


	public function up() {
		$this->dbforge->add_column('tbl_accounts', array(
				'invalid_attempts' => array('type' => 'int',
				'default' => 0,
				'constraint' => 5,
				'after' => 'status')
				));
	}

	public function down() {
		$this->dbforge->drop_column('tbl_accounts', 'invalid_attempts');
	}

}
