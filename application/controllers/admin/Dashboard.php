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
        $this->load->model('admin/admin_model');
    }

    public function index() {
        $data = array('main_content' => 'admin/dashboard_home', 'counts' => $this->admin_model->getCounts());
        $this->load->view('admin/includes/template2', $data);
        //$this->load->view('dashboard_home');
    }

    public function doctors() {
        $data = array('main_content' => 'admin/doctors');
        $this->load->view('admin/includes/template2', $data);
    }

    public function services() {
        $data = array('main_content' => 'admin/services', 'records' => $this->admin_model->getServices());
        $this->load->view('admin/includes/template2', $data);
    }

    public function departments() {
        $data = array('main_content' => 'admin/departments', 'records' => $this->admin_model->getDepartments());
        $this->load->view('admin/includes/template2', $data);
    }

    public function create_doctor() {
        $data = array('main_content' => 'admin/new_doctor', 'dept_names' => $this->admin_model->getAllDepartmentName());
        $this->load->view('admin/includes/template2', $data);
    }

    public function remove_doctor() {
        $data = array('main_content' => 'admin/remove_doctor');
        $this->load->view('admin/includes/template2', $data);
    }

    public function update_doctor() {
        $data = array('main_content' => 'admin/update_doctors');
        $this->load->view('admin/includes/template2', $data);
    }

    public function view_doctors() {
        $data = array('main_content' => 'admin/view_doctors', 'doct_short_info' => $this->admin_model->getDoctorsShortInfo());
        $this->load->view('admin/includes/template2', $data);
    }

}
