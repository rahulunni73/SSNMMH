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
class ServicesModel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // create/add new department
    public function addNewService($values,$result) {
		$new_insert_data = array(
            'SERVICE_NAME' => $values['service_name'],
            'DESCRIPTIONS' => $values['serv_description'],
            'IMG_PATH' => $result['img_path'],
            'DEPT_ID' => $values['dept_id'],
        );
        $insert = $this->db->insert('Service_Master', $new_insert_data);
        return $insert;
    }


    public function updateServiceInfo($values, $result){
    $data=array();
    if (empty($result['img_path'])) {
        $data = array(
            'DESCRIPTIONS' => $values['serv_description'],
            'DEPT_ID' => $values['dept_id'],
        );
        
           //true means image path is empty
        }else{
         //false image path is not empty new image needs to be updated
                    $data = array(
            'DESCRIPTIONS' => $values['serv_description'],
            'IMG_PATH' => $result['img_path'],
            'DEPT_ID' => $values['dept_id']

        );
        }

        $this->db->where('SERVICE_ID', $values['service_name']);/*serviceId is here provided,dont confuse with this name */
        $update = $this->db->update('Service_Master', $data);
        return $update;
}


    /*delete department*/
    public function deleteService($id) {
        $this->db->where('SERVICE_ID', $id);
        $delete = $this->db->delete('Service_Master');
        return $delete;
    }



    /*get all services details used in service creation page*/
    public function getServices() {
        $this->db->select('SERVICE_ID,SERVICE_NAME,DESCRIPTIONS,IMG_PATH');
        $this->db->from('Service_Master');
        $query = $this->db->get();
        return $query->result();
    }


    //get all service names only used for dropdown menus', used in update service page
    public function getAllServiceName() {
       $result = $this->db->select('SERVICE_ID, SERVICE_NAME')->get('Service_Master')->result_array(); 
        $services = array(); 
        $services['']='Select Service';
        foreach($result as $r) { 
            $services[$r['SERVICE_ID']] = $r['SERVICE_NAME']; 
        } 
        return $services; 
    }

   //get only 1 service record details depends on requested serviceId, used in update service page
    public function getSingleServiceInfo($serviceId) {
     $this->db->select('t1.SERVICE_ID,t1.SERVICE_NAME,t1.DESCRIPTIONS,t1.IMG_PATH,t2.DEPT_NAME,t2.DEPT_ID');
      $this->db->from('Service_Master as t1');
      $this->db->where('t1.SERVICE_ID', $serviceId);
      $this->db->join('Department_Master as t2', 't1.DEPT_ID = t2.DEPT_ID', 'LEFT');
      $query = $this->db->get();
    return $query->result();
    }

}
?>