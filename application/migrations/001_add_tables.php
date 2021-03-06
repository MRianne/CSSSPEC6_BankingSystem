<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Tables extends CI_Migration {


	public function up() {
		$this->person();
		$this->users();
		$this->customers();
		$this->customer_users();
		$this->account_types();
		$this->accounts();
		$this->transactions();
		$this->settings();
	}

	public function down() {
		$this->dbforge->drop_table('tbl_settings', TRUE);
		$this->dbforge->drop_table('tbl_transactions', TRUE);
		$this->dbforge->drop_table('tbl_accounts', TRUE);
		$this->dbforge->drop_table('tbl_account_types', TRUE);
		$this->dbforge->drop_table('tbl_customer_users', TRUE);
		$this->dbforge->drop_table('tbl_customers', TRUE);
		$this->dbforge->drop_table('tbl_users', TRUE);
		$this->dbforge->drop_table('tbl_person', TRUE);
	}

	public function settings() {
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'auto_increment' => TRUE 
			],
			'min_withdraw' => [
				'type' => 'DECIMAL',
				'constraint' => '17,2'
			],
			'max_withdraw' => [
				'type' => 'DECIMAL',
				'constraint' => '17,2'
			],
			'max_withdraw_per_day' => [
				'type' => 'DECIMAL',
				'constraint' => '17,2'
			],
			'sc_below_req_adb' => [
				'type' => 'DECIMAL',
				'constraint' => '17,2'
			],
			'monthly_dormancy_charge' => [
				'type' => 'DECIMAL',
				'constraint' => '17,2'
			],
			'otc_withdrawal_fee' => [
				'type' => 'DECIMAL',
				'constraint' => '17,2'
			]
		]);

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('tbl_settings', TRUE);
	}

	public function person() {
		$this->dbforge->add_field([
			'person_id' => [
				'type' => 'VARCHAR',
				'constraint' => 11
			],
			'first_name' => [
				'type' => 'VARCHAR',
				'constraint' => 200
			],
			'middle_name' => [
				'type' => 'VARCHAR',
				'constraint' => 200
			],
			'last_name' => [
				'type' => 'VARCHAR',
				'constraint' => 200
			],
			'date_created' => [
				'type' => 'DATETIME'
			],
			'date_updated' => [
				'type' => 'DATETIME'
			]
		]);

		$this->dbforge->add_key('person_id', TRUE);
		$this->dbforge->create_table('tbl_person', TRUE);
	}

	public function users() {
		$this->dbforge->add_field([
			'username' => [
				'type' => 'VARCHAR',
				'constraint' => 50
			],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => 255
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => 255
			],
			'person_id' => [
				'type' => 'VARCHAR',
				'constraint' => 11
			],
			'user_type' => [
				'type' => 'VARCHAR',
				'constraint' => 11
			],
			'last_login' => [
				'type' => 'DATETIME',
				'null' => TRUE
			],
			'login_attempts' => [
				'type' => 'TINYINT',
				'constraint' => 3
			],
			'last_password_change' => [
				'type' => 'DATETIME'
			],
			'status' => [
				'type' => 'VARCHAR',
				'constraint' => 11
			],
			'CONSTRAINT `tbl_users_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `tbl_person` (`person_id`) ON DELETE CASCADE ON UPDATE CASCADE'
		]);

		$this->dbforge->add_key('username', TRUE);
		$this->dbforge->add_key('person_id');
		$this->dbforge->create_table('tbl_users', TRUE);
	}

	public function customers() {
		$this->dbforge->add_field([
			'customer_id' => [
				'type' => 'VARCHAR',
				'constraint' => 11
			],
			'person_id' => [
				'type' => 'VARCHAR',
				'constraint' => 11
			],
			'gender' => [
				'type' => 'CHAR',
				'constraint' => 1
			],
			'present_address' => [
				'type' => 'VARCHAR',
				'constraint' => 255
			],
			'permanent_address' => [
				'type' => 'VARCHAR',
				'constraint' => 255
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => 100
			],
			'contact_no' => [
				'type' => 'VARCHAR',
				'constraint' => 20
			],
			'birth_date' => [
				'type' => 'DATE'
			],
			'birth_place' => [
				'type' => 'VARCHAR',
				'constraint' => 100
			],
			'nationality' => [
				'type' => 'VARCHAR',
				'constraint' => 100
			],
			'citizenship' => [
				'type' => 'VARCHAR',
				'constraint' => 100
			],
			'sss_no' => [
				'type' => 'INT',
				'constraint' => 10
			],
			'tin_no' => [
				'type' => 'INT',
				'constraint' => 9
			],
			'employment_status' => [
				'type' => 'VARCHAR',
				'constraint' => 50
			],
			'nature_of_employment' => [
				'type' => 'VARCHAR',
				'constraint' => 3
			],
			'source_of_funds' => [
				'type' => 'VARCHAR',
				'constraint' => 50
			],
			'CONSTRAINT `tbl_customers_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `tbl_person` (`person_id`) ON DELETE CASCADE ON UPDATE CASCADE'
		]);

		$this->dbforge->add_key('customer_id', TRUE);
		$this->dbforge->add_key('person_id');
		$this->dbforge->create_table('tbl_customers', TRUE);
	}

	public function customer_users() {
		$this->dbforge->add_field([
			'username' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
				'unique' => TRUE
			],
			'customer_id' => [
				'type' => 'VARCHAR',
				'constraint' => 11,
				'unique' => TRUE
			],
			'CONSTRAINT `tbl_customer_users_ibfk_1` FOREIGN KEY (`username`) REFERENCES `tbl_users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE',
			'CONSTRAINT `tbl_customer_users_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE'
		]);

		$this->dbforge->add_key('username', TRUE);
		$this->dbforge->add_key('customer_id', TRUE);
		$this->dbforge->create_table('tbl_customer_users', TRUE);
	}
	public function account_types() {
		$this->dbforge->add_field([
			'type_id' => [
				'type' => 'VARCHAR',
				'constraint' => 11
			],
			'description' => [
				'type' => 'VARCHAR',
				'constraint' => 100
			],
			'initial_deposit' => [
				'type' => 'DECIMAL',
				'constraint' => '17,2'
			],
			'min_monthly_adb' => [
				'type' => 'DECIMAL',
				'constraint' => '17,2'
			],
			'req_daily_bal' => [
				'type' => 'DECIMAL',
				'constraint' =>'17,2'
			],
			'interest_rate' => [
				'type' => 'DECIMAL',
				'constraint' => '6,5'
			],
			'date_created' => [
				'type' => 'DATETIME'
			],
			'date_updated' => [
				'type' => 'DATETIME'
			]
		]);

		$this->dbforge->add_key('type_id', TRUE);
		$this->dbforge->create_table('tbl_account_types', TRUE);
	}
	public function accounts() {
		$this->dbforge->add_field([
			'account_id' => [
				'type' => 'VARCHAR',
				'constraint' => 12
			],
			'account_pin' => [
				'type' => 'VARCHAR',
				'constraint' => 255
			],
			'customer_id' => [
				'type' => 'VARCHAR',
				'constraint' => 11
			],
			'type_id' => [
				'type' => 'VARCHAR',
				'constraint' => 11
			],
			'balance' => [
				'type' => 'DECIMAL',
				'constraint' => '17,2'
			],
			'status' => [
				'type' => 'VARCHAR',
				'constraint' => 11
			],
			'date_created' => [
				'type' => 'DATETIME'
			],
			'date_updated' => [
				'type' => 'DATETIME'
			],
			'date_expiry' => [
				'type' => 'DATETIME',
				'null' => TRUE
			],

			'CONSTRAINT `tbl_accounts_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE',
			'CONSTRAINT `tbl_accounts_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `tbl_account_types` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE'
		]);

		$this->dbforge->add_key('account_id', TRUE);
		$this->dbforge->add_key('customer_id');
		$this->dbforge->add_key('type_id');
		$this->dbforge->create_table('tbl_accounts', TRUE);
	}

	public function transactions() {
		$this->dbforge->add_field([
			'transaction_id' => [
				'type' => 'VARCHAR',
				'constraint' => 11
			],
			'account_id' => [
				'type' => 'VARCHAR',
				'constraint' => 12
			],
			'description' => [
				'type' => 'VARCHAR',
				'constraint' => 100
			],
			'amount' => [
				'type' => 'DECIMAL',
				'constraint' => '17,2'
			],
			'type' => [ // DEBIT or CREDIT
				'type' => 'VARCHAR',
				'constraint' => 6
			],
			'balance' => [
				'type' => 'DECIMAL',
				'constraint' => '17,2'
			],
			'status' => [
				'type' => 'VARCHAR',
				'constraint' => 11
			],
			'person_id' => [
				'type' => 'VARCHAR',
				'constraint' => 11
			],
			'date' => [
				'type' => 'DATETIME'
			],

			'CONSTRAINT `tbl_transactions_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `tbl_accounts` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE',
			'CONSTRAINT `tbl_transactions_ibfk_2` FOREIGN KEY (`person_id`) REFERENCES `tbl_person` (`person_id`) ON DELETE CASCADE ON UPDATE CASCADE'
		]);

		$this->dbforge->add_key('transaction_id', TRUE);
		$this->dbforge->add_key('account_id');
		$this->dbforge->add_key('user_id');
		$this->dbforge->create_table('tbl_transactions', TRUE);
	}
}