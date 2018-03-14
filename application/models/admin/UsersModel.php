<?php 

class UsersModel extends CI_Model {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }


    public function userCreation($values,$result) {
        $user_data = array(
            'USER_NAME' => $values['user_name'],
            'PASSWORD' => $values['password'],
            'EMAIL' => $values['email'],
            'DESIGNATION' => $values['designation'],
            'IMG_PATH'=>$result['img_path']
        );


        $insert = $this->db->insert('Admin_Master', $user_data);
        return $insert;
    }


    public function user_validation($userData) {
        $this->db->select('USER_NAME, PASSWORD');
        $this->db->from('Admin_Master');
        $this->db->where('USER_NAME', $userData['username']);
        $this->db->where('PASSWORD', $userData['password']);
        $this->db->limit(1);
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;
    }




	
}