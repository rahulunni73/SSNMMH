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
class DepartmentsModel extends CI_Model {

    function __construct() {
        parent::__construct();
    }



    // create/add new department
    public function addNewDepartment($values,$result) {
		$new_insert_data = array(
            'DEPT_NAME' => $values['dept_name'],
            'DESCRIPTIONS' => $values['dept_description'],
            'IMG_PATH' => $result['img_path']
        );
        $insert = $this->db->insert('Department_Master', $new_insert_data);
        return $insert;
    }


    public function updateDepartmentInfo($values, $result){
  	$data=array();
    if (empty($result['img_path'])) {
        $data = array(
            'DESCRIPTIONS' => $values['dept_description'],
        );
           //true means image path is empty
        }else{
         //false image path is not empty new image needs to be updated
                    $data = array(
            'DESCRIPTIONS' => $values['dept_description'],
            'IMG_PATH' => $result['img_path'],
        );

        }
        $this->db->where('DEPT_ID', $values['dept_name']);/*department is here provided dont confuse with this name */
        $update = $this->db->update('Department_Master', $data);
        return $update;
}


    //delete department
    public function deleteDepartment($id) {
        $this->db->where('DEPT_ID', $id);
        $delete = $this->db->delete('Department_Master');
        return $delete;
    }



    //get all department details used in department creation page
    public function getDepartments() {
        $this->db->select('DEPT_ID,DEPT_NAME,DESCRIPTIONS,IMG_PATH,ICON_PATH');
        $this->db->from('Department_Master');
        $query = $this->db->get();
        return $query->result();
    }

    //get all department names only used for dropdown menus'
    public function getAllDepartmentName() {
       $result = $this->db->select('DEPT_ID, DEPT_NAME')->get('Department_Master')->result_array(); 
        $departments = array(); 
        $departments['']='Select Department';
        foreach($result as $r) { 
            $departments[$r['DEPT_ID']] = $r['DEPT_NAME']; 
        } 
        return $departments; 
    }


    public function getDeptName($dept_id){
        $this->db->select('DEPT_NAME');
        $this->db->from('Department_Master');
        $this->db->where('DEPT_ID',$dept_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function getDeptDoctorsInfo($dept_id) {
    
$this->db->select('t1.DOCT_ID,t1.DOC_NAME,t1.QUALIFICATION,t1.SPECIALIZATION,t1.OPDAYS,t1.IMG_PATH,t1.CONS_FEE,t2.DESCRIPTIONS,t1.DEPT_ID');
      $this->db->from('Doctor_Master as t1');
      $this->db->where('t1.DEPT_ID', $dept_id);
      $this->db->join('Department_Master as t2', 't1.DEPT_ID = t2.DEPT_ID', 'LEFT');
      $query = $this->db->get();
      $result= $query->result();
      $rows = array();
    
      foreach($result as $r) {
            $rows[] = $r;
       }
        return $rows; 
    }

}
?>