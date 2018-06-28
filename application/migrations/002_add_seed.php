<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Seed extends CI_Migration {


    public function up() {
        $this->person_seed();
        $this->user_seed();
    }


    public function down() {
        $this->db->where('person_id', 'X1vzvhdzWBV');
        $this->db->delete('tbl_users');
        $this->db->where('person_id', 'X1vzvhdzWBV');
        $this->db->delete('tbl_person');
    }


    public function person_seed() {
        return $this->db->insert('tbl_person', [
            'person_id'     => 'X1vzvhdzWBV', 
            'first_name'    => 'admin',
            'middle_name'   => 'admin',
            'last_name'     => 'admin', 
            'date_created'  => date('Y-m-d H:i:s'),
            'date_updated'  => date('Y-m-d H:i:s')
        ]);
    }

    public function user_seed() {
        return $this->db->insert('tbl_users', [
            'username'              => 'admin',
            'password'              => '2b3f46f8633f2ea28877c7ce88eea55a1217d0b2cd2173170d59956a306cd9fbb56187827d53ebf242286fe251264c2b87f02dccd91f19cb07630c25f118ac65XKGIicAnbz1m/ZL80gJpC2ecQFICRR/0lU/RW/ABr7M=',
            'email'                 => 'admin@gmai.com',
            'person_id'             => 'X1vzvhdzWBV',
            'user_type'             => 'admin',
            'last_login'            => NULL,
            'login_attempts'        => 0,
            'last_password_change'  => date('Y-m-d H:i:s'),
            'status'                => 'OK'
        ]);
    }
}