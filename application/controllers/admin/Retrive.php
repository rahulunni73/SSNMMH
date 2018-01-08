<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of View
 *
 * @author root
 */
class Retrive extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('admin/admin_model');
    }

    public function getDepartmentDetails() {
        $query = $this->admin_model->getDepartments();
        echo json_encode($query);
    }

    public function getServiceDetails() {
        $query = $this->admin_model->getServices();
        echo json_encode($query);
    }

    public function getDoctorsDetails() {
        $query = $this->admin_model->getDoctorsInfo();
        echo json_encode($query);
    }
    
    

}
