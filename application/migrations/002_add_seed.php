<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Seed extends CI_Migration {


    public function up() {
        $CI =& get_instance();
        $CI->load->library('utilities');
        $id = $CI->utilities->create_random_string();
        $this->person_seed($id);
        $this->user_seed($id);
    }


    public function down() {
        $this->db->where('username', 'admin');
        $this->db->delete('tbl_users');
        $this->db->where('middle_name', 'admin');
        $this->db->delete('tbl_person');
    }


    public function person_seed($id) {
        return $this->db->insert('tbl_person', [
            'person_id'     => $id, 
            'first_name'    => 'admin',
            'middle_name'   => 'admin',
            'last_name'     => 'admin', 
            'date_created'  => date('Y-m-d H:i:s'),
            'date_updated'  => date('Y-m-d H:i:s')
        ]);
    }

    public function user_seed($id) {
        return $this->db->insert('tbl_users', [
            'username'              => 'admin',
            'password'              => 'bcc8d5747e4bd8d68dc3da36734c569e06775b6eb83db1a35d78c00c92d9fa3c41dd7e149b057ca1d7debaefbc94fda3ca9ff3b2379f85727d9869dee05fbeb5p4dSoG+RCTXs/ENauAiKcrttoOILZE/NCJapuBJBieo=',
            'email'                 => 'admin@gmai.com',
            'person_id'             => $id,
            'user_type'             => 'admin',
            'last_login'            => NULL,
            'login_attempts'        => 0,
            'last_password_change'  => date('Y-m-d H:i:s'),
            'status'                => 'OK'
        ]);
    }
}