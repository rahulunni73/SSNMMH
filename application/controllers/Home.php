<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 *
   Home controller is responsible for loading views with datas from back ends



 */

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('admin/admin_model');
    }

    //default home page
    public function index() {
        $data = array('main_content' => 'home/home', 'home' => 'active');
        $this->load->view('home/includes/home_template', $data);
    }

    //contact page
    public function contact() {
        $data = array('main_content' => 'home/contact', 'contact' => 'active');
        $this->load->view('home/includes/common_template', $data);
    }

    //about page
    public function about() {
        $data = array('main_content' => 'home/about', 'about' => 'active');
        $this->load->view('home/includes/common_template', $data);
    }

    //service page
    public function services() {
        $data = array('main_content' => 'home/service', 'service' => 'active');
        $this->load->view('home/includes/common_template', $data);
    }

    //gallery page
    public function gallery() {
        $data = array('main_content' => 'home/gallery', 'gallery' => 'active');
        $this->load->view('home/includes/common_template', $data);
    }

    //doctors page
    public function doctors() {
        $data = array('main_content' => 'home/doctors', 'doctors' => 'active','dept_names' => $this->admin_model->getDepartments(),
            'doctors'=> $this->admin_model->getDoctorsInfo());
        $this->load->view('home/includes/special_template', $data);
    }

    //departments page
    public function departments() {
        $data = array('main_content' => 'home/departments', 'department' => 'active','dept_names' => $this->admin_model->getDepartments());
        $this->load->view('home/includes/special_template', $data);
    }
    
    //department profile page
    public function deptartmentprof($dept_id = '') {
        $data = array('main_content' => 'home/department_profile','dept_name'=>$this->admin_model->getDeptName($dept_id),'dept_info' => $this->admin_model->getDeptDoctorsInfo($dept_id));
        $this->load->view('home/includes/common_template', $data);
    }
    
    
    //inurance page 
    public function insurance(){
        $data = array('main_content' => 'home/insurance');
        $this->load->view('home/includes/common_template', $data);
    }
    
    

}
