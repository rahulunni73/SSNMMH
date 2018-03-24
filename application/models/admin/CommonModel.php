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
class CommonModel extends CI_Model {

    function __construct() {
        parent::__construct();
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


}?>
