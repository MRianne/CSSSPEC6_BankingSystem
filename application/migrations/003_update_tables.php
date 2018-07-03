<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Update_Tables extends CI_Migration {


	public function up() {
		$this->dbforge->add_column('tbl_accounts', array(
				'invalid_attempts' => array('type' => 'int',
				'after' => 'status'),
				'date_updated' => array('Attributes' => 'on update CURRENT_TIMESTAMP')
				));
		$this->dbforge->add_column('tbl_account_types', array(
				'min_balance' => array('type' => 'DECIMAL',
				'after' => 'initial_deposit',
				'constraint' => '17,2' )
				));
	}

	public function down() {
		$this->dbforge->drop_column('tbl_accounts', 'invalid_attempts');
		$this->dbforge->drop_column('tbl_account_types', 'min_balance');
		$this->dbforge->drop_column('tbl_accounts', 'date_updated');
	}

}
