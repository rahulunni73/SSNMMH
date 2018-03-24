<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin_model
 *
 * @author Rahul Narayanan Unni S
 */
class InsuranceModel extends CI_Model {

    
    function __construct() {
        parent::__construct();
    }


    //create/add new insurance
    public function addInsurance($values,$result) {       

       $new_insert_data = array(
            'INSUR_NAME' => $values['insur_name'],
            'INSUR_CONTENT' => $values['editor1'],
            'IMG_PATH' => $result['img_path']
        );
        $insert = $this->db->insert('Insurance_Master', $new_insert_data);
        return $insert;
    }



    /*delete insurance*/
    public function removeInsurance($id) {
        $this->db->where('INSUR_ID', $id);
        $delete = $this->db->delete('Insurance_Master');
        return $delete;
    }

    //get insurance company count
    public function getInsuranceCount(){
        $query1 = $this->db->get('Insurance_Master');
        $news_record_count = $query1->num_rows();
        return $news_record_count;
    }


    //get all insurance company lists
    public function getInsuranceInfo() {
        $this->db->select('INSUR_ID,INSUR_NAME,INSUR_CONTENT,IMG_PATH');
        $this->db->from('Insurance_Master');
        $query = $this->db->get();
        return $query->result();
    }



    //get all doctors details
    public function getSingleInsuranceInfo($insuranceId) {
     $this->db->select('INSUR_ID,INSUR_NAME,INSUR_CONTENT,IMG_PATH');
      $this->db->from('Insurance_Master');
      $this->db->where('INSUR_ID', $insuranceId);
      $query = $this->db->get();
        return $query->result();
    

}


    }

?>