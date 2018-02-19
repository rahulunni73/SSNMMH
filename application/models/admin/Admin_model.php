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
class Admin_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /* ..................................CREATION......................................... */

    //create/add new doctor
    public function add_new_doctor($doctor_name, $qualification, $specialization, $department_id, $op_days, $doct_img, $doct_cf) {



       $new_insert_data = array(
            'DOC_NAME' => $doctor_name,
            'QUALIFICATION' => $qualification,
            'SPECIALIZATION' => $specialization,
            'OPDAYS' => $op_days,
            'IMG_PATH' => $doct_img,
            'CONS_FEE' => $doct_cf,
            'DEPT_ID' => $department_id,
        );

       
        $insert = $this->db->insert('Doctor_Master', $new_insert_data);
        return $insert;
    }

    // create/add new department
    public function add_new_department($dept_name, $dept_description, $dept_img_path) {
        $new_insert_data = array(
            'DEPT_NAME' => $dept_name,
            'DESCRIPTIONS' => $dept_description,
            'IMG_PATH' => $dept_img_path
        );
        $insert = $this->db->insert('Department_Master', $new_insert_data);
        return $insert;
    }

    //create/add new service
    public function add_new_service($serv_name, $serv_description, $serv_img_path) {
        $new_insert_data = array(
            'SERV_NAME' => $serv_name,
            'DESCRIPTIONS' => $serv_description,
            'IMG_PATH' => $serv_img_path
        );
        $insert = $this->db->insert('Service_Master', $new_insert_data);
        return $insert;
    }

    public function add_Feedbacks($name, $email, $phone, $subject, $comments) {
        $new_insert_data = array(
            'Name' => $name,
            'Email' => $email,
            'Mobile' => $phone,
            'Subject' => $subject,
            'Comments' => $comments
        );
        $insert = $this->db->insert('Feedback', $new_insert_data);
        return $insert;
    }

    public function News_LetterSignup($name, $email) {
        $new_insert_data = array(
            'Name' => $name,
            'Email' => $email,
        );
        $insert = $this->db->insert('News_Letter', $new_insert_data);
        return $insert;
    }

    /* ...................RETRIVES.................................... */

    //get all department details
    public function getDepartments() {
        $this->db->select('DEPT_ID,DEPT_NAME,DESCRIPTIONS,IMG_PATH');
        $this->db->from('Department_Master');
        $query = $this->db->get();
        return $query->result();
    }

    //get all department names only
    public function getAllDepartmentName() {
       $result = $this->db->select('DEPT_ID, DEPT_NAME')->get('Department_Master')->result_array(); 

        $departments = array(); 
        foreach($result as $r) { 
            $departments[$r['DEPT_ID']] = $r['DEPT_NAME']; 
        } 
        return $departments; 


    }

    //get all doctors details
    public function getDoctorsInfo() {
        $this->db->select('DOCTOR_ID,DOCTOR_NAME,QUALIFICATION,SPECIALIZATION,DEPARTMENT,OPDAYS,IMG_PATH,CONS_FEE');
        $this->db->from('Doctor_Master');
        $query = $this->db->get();
        return $query->result();
    }

    //get all doctor names only
    public function getAllDoctorName() {
        $query = $this->db->get('Doctor_Master');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[DOCTOR_NAME] = $row->DOCTOR_NAME;
            }
        }
        return $data;
    }

    //get doctors dept,name,img_path
    public function getDoctorsShortInfo() {
        $this->db->select('DOCTOR_NAME,DEPARTMENT,IMG_PATH');
        $this->db->from('Doctor_Master');
        $query = $this->db->get();
        return $query->result();
    }

    //get all service details
    public function getServices() {
        $this->db->select('SERV_ID,SERV_NAME,DESCRIPTIONS,IMG_PATH');
        $this->db->from('Service_Master');
        $query = $this->db->get();
        return $query->result();
    }

    public function getCounts() {

        $query1 = $this->db->query('SELECT * FROM Doctor_Master');
        $doctorsCount = $query1->num_rows();
        $query2 = $this->db->query('SELECT * FROM Service_Master');
        $serviceCount = $query2->num_rows();
        $query3 = $this->db->query('SELECT * FROM Department_Master');
        $departmentCount = $query3->num_rows();

        $counts = array(
            'doctors' => $doctorsCount,
            'departments' => $departmentCount,
            'services' => $serviceCount
        );

        return $counts;
    }

    public function getDeptDoctorsInfo($dept_id) {
    
$this->db->select('t1.DOCT_ID,t1.DOC_NAME,t1.QUALIFICATION,t1.SPECIALIZATION,t1.OPDAYS,t1.IMG_PATH,t1.CONS_FEE,t2.DESCRIPTIONS');
      $this->db->from('Doctor_Master as t1');
      $this->db->where('t1.DEPT_ID', $dept_id);
      $this->db->join('Department_Master as t2', 't1.DEPT_ID = t2.DEPT_ID', 'LEFT');
      $query = $this->db->get();
        return $query->result();
    }


    public function getDeptName($dept_id){
        $this->db->select('DEPT_NAME');
        $this->db->from('Department_Master');
        $this->db->where('DEPT_ID',$dept_id);
        $query = $this->db->get();
        return $query->result();
    }

    /* -------------------DELETION------------------------------ */

    //delete department
    public function deleteDepartment($id) {
        $this->db->where('DEPT_ID', $id);
        $delete = $this->db->delete('Department_Master');
        return $delete;
    }

    //delete service
    public function deleteService($id) {
        $this->db->where('SERV_ID', $id);
        $delete = $this->db->delete('Service_Master');
        return $delete;
    }

    public function deleteDoctor($doctor_id) {
        $this->db->where('DOCTOR_ID', $doctor_id);
        $delete = $this->db->delete('Doctor_Master');
        $temp = $this->db->affected_rows();
        return $temp;
    }

    /* ..............................UPDATION......................................... */

    public function updateDoctorInfo($doc_id, $doctor_name, $qualification, $specialization, $department, $op_days, $doct_cf) {

        $data = array('DOCTOR_NAME' => $doctor_name,
            'QUALIFICATION' => $qualification,
            'SPECIALIZATION' => $specialization,
            'DEPARTMENT' => $department,
            'OPDAYS' => $op_days,
            'CONS_FEE' => $doct_cf
        );
        $this->db->where('DOCTOR_ID', $doc_id);
        $update = $this->db->update('Doctor_Master', $data);
        return $update;
    }

}
