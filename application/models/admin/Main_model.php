<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Main_model
 *
 * @author root
 */
class Main_model extends CI_Model {

    function __construct() {

        parent::__construct();

        $this->load->database();
    }

    public function member_registration($user_name, $password, $email, $designation) {

        $new_insert_data = array(
            'USER_NAME' => $user_name,
            'PASSWORD' => $password,
            'EMAIL' => $email,
            'DESIGNATION' => $designation
        );
        $insert = $this->db->insert('MEMBERS', $new_insert_data);
        return $insert;
    }

    public function user_validation($user_name, $password) {
        $this->db->select('USER_NAME, PASSWORD');
        $this->db->from('MEMBERS');
        $this->db->where('USER_NAME', $user_name);
        $this->db->where('PASSWORD', $password);
        $this->db->limit(1);
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;
    }

}
