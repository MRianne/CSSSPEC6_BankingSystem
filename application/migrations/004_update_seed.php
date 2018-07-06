<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Update_seed extends CI_Migration {


    public function up() {
        $this->account_type_seed();
        $this->setting_seed();
        $this->person_seed();
        $this->user_seed();
        $this->customer_seed();
        $this->customer_user_seed();
        $this->account_seed();
    }


    public function down() {
        $this->db->where('username', 'MRianne');
        $this->db->delete('tbl_customer_users');
        $this->db->where('customer_id', 'X2vzvhdzMRB');
        $this->db->delete('tbl_customers');
        $this->db->where('username', 'MRianne');
        $this->db->delete('tbl_users');
        $this->db->where('person_id', 'X1vzvhdzMRB');
        $this->db->delete('tbl_person');
        $this->db->where('account_id', '635345603021');
        $this->db->delete('tbl_accounts');
        $this->db->where('type_id', 'sav_col300');
        $this->db->delete('tbl_account_types');
        $this->db->where('id', '2018000001');
        $this->db->delete('tbl_settings');
    }

    public function customer_seed() {
        return $this->db->insert('tbl_customers', [
            'customer_id'            => 'X2vzvhdzMRB',
            'person_id'              => 'X1vzvhdzMRB',
            'gender'                 => 'F',
            'present_address'        => 'Valenzuela City',
            'permanent_address'      => 'Valenzuela City',
            'email'                  => 'megrianne.bautista32@gmail.com',
            'contact_no'             => '09265096353',
            'birth_date'             =>  strtotime('1998-03-02'),
            'birth_place'            => 'Manila City',
            'nationality'            => 'Filipino',
            'citizenship'            => 'Filipino',
            'sss_no'                 => '2056978512',
            'tin_no'                 => '124879653',
            'employment_status'      => 'student',
            'nature_of_employment'   => 'N/A',
            'source_of_funds'        => 'PArents'
        ]);
    }

    public function person_seed() {
        return $this->db->insert('tbl_person', [
            'person_id'     => 'X1vzvhdzMRB',
            'first_name'    => 'atm',
            'middle_name'   => 'atm',
            'last_name'     => 'atm',
            'date_created'  => date('Y-m-d H:i:s'),
            'date_updated'  => date('Y-m-d H:i:s')
        ]);
    }

    public function customer_user_seed(){
        return $this->db->insert('tbl_customer_users', [
            'username'     => 'MRianne',
            'customer_id'  => 'X2vzvhdzMRB'
        ]);
    }

    public function user_seed() {
        return $this->db->insert('tbl_users', [
            'username'              => 'MRianne',
            'password'              => 'e488a3a9deb13fa78d98d667c677059fdf50bf90dbe074e86585e8ecbaef630919d75a5f9943b2cdc70a14c6c8d7e95377ab6540d5764e5364bbfe3a891ae3eeU1Wci9sCH3ipl4yBLIKQwAoFM+v7tt89iN7kBdIcmYc=',
            'email'                 => 'megrianne.bautista32@gmail.com',
            'person_id'             => 'X1vzvhdzMRB',
            'user_type'             => 'user',
            'last_login'            => NULL,
            'login_attempts'        => 0,
            'last_password_change'  => date('Y-m-d H:i:s'),
            'status'                => 'OK'
        ]);
    }

    public function account_seed() {
        return $this->db->insert('tbl_accounts', [
            'account_id'     => '635345603021',
            'account_pin'    => 'e488a3a9deb13fa78d98d667c677059fdf50bf90dbe074e86585e8ecbaef630919d75a5f9943b2cdc70a14c6c8d7e95377ab6540d5764e5364bbfe3a891ae3eeU1Wci9sCH3ipl4yBLIKQwAoFM+v7tt89iN7kBdIcmYc=',
            'customer_id'    => 'X2vzvhdzMRB',
            'type_id'        => 'sav_col300',
            'balance'        => "600.00",
            'status'         => "active",
            'date_created'   => date('Y-m-d H:i:s'),
            'date_updated'   => date('Y-m-d H:i:s'),
            'date_expiry'    => date('Y-m-d H:i:s', strtotime('+5 years'))
        ]);
    }


    public function setting_seed() {
        return $this->db->insert('tbl_settings', [
            'id'                      => '2018000001',
            'min_withdraw'            => 100.00,
            'max_withdraw'            => 10000.00,
            'max_withdraw_per_day'    => 50000.00,
            'sc_below_req_adb'        => 100.00,
            'monthly_dormancy_charge' => 50.00,
            'otc_withdrawal_fee'      => 100.00
        ]);
    }

    public function account_type_seed() {
      return $this->db->insert('tbl_account_types', [
          'type_id'         => 'sav_col300',
          'description'     => 'College Savings 300',
          'initial_deposit' => 300.00,
          'min_monthly_adb' => 500.00,
          'req_daily_bal'   => 500.00,
          'interest_rate'   => 0.1,
          'date_created'    => date('Y-m-d H:i:s'),
          'date_updated'    => date('Y-m-d H:i:s'),
      ]);
    }

}
