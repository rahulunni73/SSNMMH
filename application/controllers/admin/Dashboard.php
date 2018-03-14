<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dashboard
 *
 * @author Rahul Narayanan Unni
 */
class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('admin/CommonModel');
        $this->load->model('admin/DoctorsModel');
        $this->load->model('admin/DepartmentsModel');
        $this->load->model('admin/ServicesModel');
    }

    public function index() {
    
     if ( $this->session->userdata('username') != '') {
        $data = array('main_content' => 'admin/dashboard_home', 'counts' => $this->CommonModel->getCounts());
        $this->load->view('admin/includes/template2', $data);;

        } else {
            $this->load->view('admin/member_login');
        }
    }


    //load doctors add/edit/delete/create page
    public function doctors() {
        $data = array('main_content' => 'admin/doctors');
        $this->load->view('admin/includes/template2', $data);
    }

    public function services() {
        $data = array('main_content' => 'admin/services');
        $this->load->view('admin/includes/template2', $data);
    }

    public function departments() {
        $data = array('main_content' => 'admin/departments');
        $this->load->view('admin/includes/template2', $data);
    }


    //load create new doctor form page
    public function create_doctor() {
        $data = array('main_content' => 'admin/new_doctor', 'dept_names' => $this->DepartmentsModel->getAllDepartmentName());
        $this->load->view('admin/includes/template2', $data);
    }

    public function remove_doctor() {
        $data = array('main_content' => 'admin/remove_doctor','doct_names' => $this->DoctorsModel->getAllDoctorName(),'dept_names' => $this->DepartmentsModel->getAllDepartmentName());
        $this->load->view('admin/includes/template2', $data);
    }

    public function update_doctor() {
        $data = array('main_content' => 'admin/update_doctors','doct_names' => $this->DoctorsModel->getAllDoctorName(),'dept_names' => $this->DepartmentsModel->getAllDepartmentName());
        $this->load->view('admin/includes/template2', $data);
    }

    public function view_doctors() {
        $data = array('main_content' => 'admin/view_doctors', 'doct_short_info' => $this->DoctorsModel->getDoctorsShortInfo());
        $this->load->view('admin/includes/template2', $data);
    }



    public function create_departments() {
        $data = array('main_content' => 'admin/create_departments', 'records' => $this->DepartmentsModel->getDepartments());
        $this->load->view('admin/includes/template2', $data);
    }

    public function update_departments() {
        $data = array('main_content' => 'admin/update_departments', 'dept_names' => $this->DepartmentsModel->getAllDepartmentName());
        $this->load->view('admin/includes/template2', $data);
    }
    
    public function view_departments() {
        $data = array('main_content' => 'admin/view_departments','dept_details' =>$this->DepartmentsModel->getDepartments());
        $this->load->view('admin/includes/template2', $data);
    }

    public function delete_departments() {
    $data = array('main_content'=>'admin/delete_departments','dept_details'=>$this->DepartmentsModel->getDepartments());
        $this->load->view('admin/includes/template2', $data);
    }



    public function create_services() {
        $data = array('main_content' => 'admin/create_services', 'dept_names' => $this->DepartmentsModel->getAllDepartmentName());
        $this->load->view('admin/includes/template2', $data);
    }

    public function update_services() {
        $data = array('main_content' => 'admin/update_services', 'serv_names' => $this->ServicesModel->getAllServiceName(),'dept_names' => $this->DepartmentsModel->getAllDepartmentName());
        $this->load->view('admin/includes/template2', $data);
    }
    
    public function view_services() {
        $data = array('main_content' => 'admin/view_services','serv_details' =>$this->ServicesModel->getServices());
        $this->load->view('admin/includes/template2', $data);
    }

    public function delete_services() {
    $data = array('main_content'=>'admin/delete_services','serv_details'=>$this->ServicesModel->getServices());
        $this->load->view('admin/includes/template2', $data);
    }







    

}
