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
    public function add_new_doctor($doctor_name, $qualification, $specialization, $department, $op_days, $doct_img, $doct_cf) {
        $new_insert_data = array(
            'DOCTOR_NAME' => $doctor_name,
            'QUALIFICATION' => $qualification,
            'SPECIALIZATION' => $specialization,
            'DEPARTMENT' => $department,
            'OPDAYS' => $op_days,
            'IMG_PATH' => $doct_img,
            'CONS_FEE' => $doct_cf
        );
        $insert = $this->db->insert('DOCTORMASTER', $new_insert_data);
        return $insert;
    }

    // create/add new department
    public function add_new_department($dept_name, $dept_description, $dept_img_path) {
        $new_insert_data = array(
            'DEPT_NAME' => $dept_name,
            'DESCRIPTIONS' => $dept_description,
            'IMG_PATH' => $dept_img_path
        );
        $insert = $this->db->insert('DEPARTMENTMASTER', $new_insert_data);
        return $insert;
    }

    //create/add new service
    public function add_new_service($serv_name, $serv_description, $serv_img_path) {
        $new_insert_data = array(
            'SERV_NAME' => $serv_name,
            'DESCRIPTIONS' => $serv_description,
            'IMG_PATH' => $serv_img_path
        );
        $insert = $this->db->insert('SERVICEMASTER', $new_insert_data);
        return $insert;
    }

    public function add_feedbacks($name, $email, $phone, $subject, $comments) {
        $new_insert_data = array(
            'Name' => $name,
            'Email' => $email,
            'Mobile' => $phone,
            'Subject' => $subject,
            'Comments' => $comments
        );
        $insert = $this->db->insert('FEEDBACK', $new_insert_data);
        return $insert;
    }

    public function newsLetterSignup($name, $email) {
        $new_insert_data = array(
            'Name' => $name,
            'Email' => $email,
        );
        $insert = $this->db->insert('NEWSLETTER', $new_insert_data);
        return $insert;
    }

    /* ...................RETRIVES.................................... */

    //get all department details
    public function getDepartments() {
        $this->db->select('DEPT_ID,DEPT_NAME,DESCRIPTIONS,IMG_PATH');
        $this->db->from('DEPARTMENTMASTER');
        $query = $this->db->get();
        return $query->result();
    }

    //get all department names only
    public function getAllDepartmentName() {
       $result = $this->db->select('DEPT_ID, DEPT_NAME')->get('DEPARTMENTMASTER')->result_array(); 

        $departments = array(); 
        foreach($result as $r) { 
            $departments[$r['DEPT_ID']] = $r['DEPT_NAME']; 
        } 
        return $departments; 


    }

    //get all doctors details
    public function getDoctorsInfo() {
        $this->db->select('DOCTOR_ID,DOCTOR_NAME,QUALIFICATION,SPECIALIZATION,DEPARTMENT,OPDAYS,IMG_PATH,CONS_FEE');
        $this->db->from('DOCTORMASTER');
        $query = $this->db->get();
        return $query->result();
    }

    //get all doctor names only
    public function getAllDoctorName() {
        $query = $this->db->get('DOCTORMASTER');
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
        $this->db->from('DOCTORMASTER');
        $query = $this->db->get();
        return $query->result();
    }

    //get all service details
    public function getServices() {
        $this->db->select('SERV_ID,SERV_NAME,DESCRIPTIONS,IMG_PATH');
        $this->db->from('SERVICEMASTER');
        $query = $this->db->get();
        return $query->result();
    }

    public function getCounts() {

        $query1 = $this->db->query('SELECT * FROM DOCTORMASTER');
        $doctorsCount = $query1->num_rows();
        $query2 = $this->db->query('SELECT * FROM SERVICEMASTER');
        $serviceCount = $query2->num_rows();
        $query3 = $this->db->query('SELECT * FROM DEPARTMENTMASTER');
        $departmentCount = $query3->num_rows();

        $counts = array(
            'doctors' => $doctorsCount,
            'departments' => $departmentCount,
            'services' => $serviceCount
        );

        return $counts;
    }

    public function getDeptDoctorsInfo($dept_id) {

        $this->db->select('DOCTOR_ID,DOCTOR_NAME,QUALIFICATION,SPECIALIZATION,DEPARTMENT,OPDAYS,IMG_PATH,CONS_FEE');
        $this->db->from('DOCTORMASTER');
        $this->db->where('DEPARTMENT',$dept_id);
        $query = $this->db->get();
        return $query->result();

    }


    public function getDeptName($dept_id){
        $this->db->select('DEPT_NAME');
        $this->db->from('DEPARTMENTMASTER');
        $this->db->where('DEPT_ID',$dept_id);
        $query = $this->db->get();
        return $query->result();
    }

    /* -------------------DELETION------------------------------ */

    //delete department
    public function deleteDepartment($id) {
        $this->db->where('DEPT_ID', $id);
        $delete = $this->db->delete('DEPARTMENTMASTER');
        return $delete;
    }

    //delete service
    public function deleteService($id) {
        $this->db->where('SERV_ID', $id);
        $delete = $this->db->delete('SERVICEMASTER');
        return $delete;
    }

    public function deleteDoctor($doctor_id) {
        $this->db->where('DOCTOR_ID', $doctor_id);
        $delete = $this->db->delete('DOCTORMASTER');
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
        $update = $this->db->update('DOCTORMASTER', $data);
        return $update;
    }

}
