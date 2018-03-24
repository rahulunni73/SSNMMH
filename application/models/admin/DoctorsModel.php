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
class DoctorsModel extends CI_Model {

    function __construct() {
        parent::__construct();
    }


    //create/add new doctor
    public function add_new_doctor($values,$result) {
       $new_insert_data = array(
            'DOC_NAME' => $values['doctor_name'],
            'QUALIFICATION' => $values['qualficationString'],
            'SPECIALIZATION' => $values['specialization'],
            'OPDAYS' => $values['opDaysString'],
            'IMG_PATH' => $result['img_path'],
            'CONS_FEE' => $values['doct_cf'],
            'DEPT_ID' => $values['dept_id']
        );
        $insert = $this->db->insert('Doctor_Master', $new_insert_data);
        return $insert;
    }

public function updateDoctorInfo($values, $result)
{
    $data = array();
    if (empty($result['img_path'])) {
        $data = array(
            'QUALIFICATION' => $values['qualficationString'],
            'SPECIALIZATION' => $values['specialization'],
            'OPDAYS' => $values['opDaysString'],
            'CONS_FEE' => $values['doct_cf'],
            'DEPT_ID' => $values['dept_id']
        );
        // true means image path is empty
        
    }
    else {
        // false image path is not empty
        $data = array(
            'QUALIFICATION' => $values['qualficationString'],
            'SPECIALIZATION' => $values['specialization'],
            'OPDAYS' => $values['opDaysString'],
            'IMG_PATH' => $result['img_path'],
            'CONS_FEE' => $values['doct_cf'],
            'DEPT_ID' => $values['dept_id']
        );
    }
    $this->db->where('DOCT_ID', $values['doctor_name']);/*$values['doctor_name'] holds doctor id*/
    $update = $this->db->update('Doctor_Master', $data);
    return $update;
}




    /*get doctors dept,name,img_path, used view_doctors page*/
    public function getDoctorsShortInfo() {
      $this->db->select('t1.DOC_NAME,t1.IMG_PATH,t2.DEPT_NAME');
      $this->db->from('Doctor_Master as t1');
      $this->db->join('Department_Master as t2', 't1.DEPT_ID = t2.DEPT_ID', 'LEFT');
      $query = $this->db->get();
        return $query->result();
    }
  

      /*used to delete a doctor used in delete_doctor page*/  
      public function deleteDoctor($doctor_id) {
        $this->db->where('DOCT_ID', $doctor_id);
        $delete = $this->db->delete('Doctor_Master');
        $temp = $this->db->affected_rows();
        return $temp;
    }


    //get all doctor names only with doctor id, used in delete_doctor page
    public function getAllDoctorName() {
    $result = $this->db->select('DOCT_ID, DOC_NAME')->get('Doctor_Master')->result_array(); 
        $doctors = array();
        $doctors[''] = 'Select Doctor'; 
        foreach($result as $r) { 
            $doctors[$r['DOCT_ID']] = $r['DOC_NAME']; 
        } 
        return $doctors; 
    }



    //get all doctors details
    public function getSingleDoctorInfo($doctorsId) {
     $this->db->select('t1.DOCT_ID,t1.DOC_NAME,t1.QUALIFICATION,t1.SPECIALIZATION,t1.OPDAYS,t1.IMG_PATH,t1.CONS_FEE,t2.DEPT_NAME,t2.DEPT_ID');
      $this->db->from('Doctor_Master as t1');
      $this->db->where('t1.DOCT_ID', $doctorsId);
      $this->db->join('Department_Master as t2', 't1.DEPT_ID = t2.DEPT_ID', 'LEFT');
      $query = $this->db->get();
        return $query->result();
    }



    //get all doctors details
    public function getGroupDoctorInfo($doctorsId,$deptId) {
     $this->db->select('t1.DOCT_ID,t1.DOC_NAME,t1.QUALIFICATION,t1.SPECIALIZATION,t1.OPDAYS,t1.IMG_PATH,t1.CONS_FEE,t2.DEPT_NAME,t2.DEPT_ID');
      $this->db->from('Doctor_Master as t1');
      $this->db->where('t1.DOCT_ID <>', $doctorsId);
      $this->db->where('t1.DEPT_ID', $deptId);
      $this->db->join('Department_Master as t2', 't1.DEPT_ID = t2.DEPT_ID', 'LEFT');
      $query = $this->db->get();
        return $query->result();
    }

    //get all doctors details
    public function getDoctorsInfo() {
     $this->db->select('t1.DOCT_ID,t1.DOC_NAME,t1.QUALIFICATION,t1.SPECIALIZATION,t1.OPDAYS,t1.IMG_PATH,t1.CONS_FEE,t2.DEPT_NAME,t2.DEPT_ID');
      $this->db->from('Doctor_Master as t1');
      $this->db->join('Department_Master as t2', 't1.DEPT_ID = t2.DEPT_ID', 'LEFT');
      $query = $this->db->get();
        return $query->result();
    }


}
?>