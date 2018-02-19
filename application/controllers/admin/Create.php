<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Create
 *  
 *   this controller is mainly responsible for form validation,creation of doctors,service and departments
 * 
 * @author Rahul Narayanan Unni S
 */

class Create extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('admin/admin_model');
    }

    //helps to create/add new doctor
    public function addDoctor() {
        if (!$this->setupFormValidationDoctor()) {
            $this->create_doctor();//if redirection used, form validation errors not shown
        } else {
            $result = $this->setUpImageUpload(128, 128, 'doctors'); //pass the dimensions of the image
            if (!$result['status']) {
                $data = array('main_content' => 'new_doctor', 'status_message' => $result['error']);
                //$this->load->view('admin/includes/template2', $data);
                // this will report  if any error in image upload 
                $this->session->set_flashdata('status_message', $result['error']);
                $this->session->set_flashdata('status', false);
                redirect('admin/dashboard/create_doctor', 'refresh');
            } else {
                $values = $this->get_form_values_doctors();

                $this->insert_to_docMaster($values, $result);
            }
        }
    }

    
    //helps to create/add department
    public function addDepartment() {

        if (!$this->setupFormValidationDepartment()) {
            $this->department_view();//if redirection used, form validation errors not shown
        } else {
            $result = $this->setUpImageUpload(400, 250, 'departments'); //pass the dimensions of the image
            if (!$result['status']) {
                $data = array('main_content' => 'departments', 'status_message' => $result['error']);
                //$this->load->view('admin/includes/template2', $data);
                $this->session->set_flashdata('status_message', $result['error']);
                $this->session->set_flashdata('status', false);
                redirect('admin/dashboard/departments', 'refresh');

            } else {
                $values = $this->get_form_values_department();
                $this->insert_to_deptMaster($values, $result);
            }
        }
    }

    //helps to create/add service
    public function addService() {

        if (!$this->setupFormValidationService()) {
            $this->service_view(); //if redirection used, form validation errors not shown
        } else {
            $result = $this->setUpImageUpload(400, 250, 'services'); //pass the dimensions of the image
            if (!$result['status']) {
                $data = array('main_content' => 'services', 'status_message' => $result['error']);
                $this->load->view('admin/includes/template2', $data);
            } else {
                $values = $this->get_form_values_service();
                $this->insert_to_servMaster($values, $result);
            }
        }
    }
    
       

    //setting up validation rule and validating service form - input values
    public function setupFormValidationService() {
        $this->form_validation->set_rules('serv_name', 'Service name', 'trim|required');
        $this->form_validation->set_rules('serv_description', 'Service Description', 'trim|required');
        if ($this->form_validation->run() === FALSE) {
            return false;
        } else {
            return true;
        }
    }
    //obtaining form values for Service
    public function get_form_values_service() {
        $values = array('serv_name' => $this->input->post('serv_name'), 'serv_description' => $this->input->post('serv_description'));
        return $values;
    }
   
    
    
    //setting up validation rule and validating department form - input values
    public function setupFormValidationDepartment() {
        $this->form_validation->set_rules('dept_name', 'Department name', 'trim|required');
        $this->form_validation->set_rules('dept_description', 'Description', 'trim|required');
        if ($this->form_validation->run() === FALSE) {
            return false;
        } else {
            return true;
        }
    }
        //obtaining form values for Department
    public function get_form_values_department() {
        $values = array('dept_name' => $this->input->post('dept_name'), 'dept_description' => $this->input->post('dept_description'));
        return $values;
    }

    
    
    
    
    
    //setting up validation rule and validating doctor form - input values
    public function setupFormValidationDoctor() {
        $this->form_validation->set_rules('doct_name', 'Doctor Name', 'trim|required');
        $this->form_validation->set_rules('doct_qual[]', 'Qualification', 'trim|required');
        $this->form_validation->set_rules('doct_spec', 'Specialization', 'trim|required');
        $this->form_validation->set_rules('doct_dept', 'Department', 'trim|required');
        $this->form_validation->set_rules('op_day[]', 'OP Days', 'trim|required');
        $this->form_validation->set_rules('doct_cf', 'Consulting Fee', 'trim|required');
        if ($this->form_validation->run() === FALSE) {
            return false;
        } else {
            return true;
        }
    }
    //obtaining form values for Dcoctor
    public function get_form_values_doctors() {
        $qualification = $this->input->post('doct_qual');
        $op_days = $this->input->post('op_day');
        $qualficationString = implode(',', $qualification);
        $opDaysString = implode(',', $op_days);
        $values = array('doctor_name' => $this->input->post('doct_name'),
            'qualficationString' => $qualficationString,
            'specialization' => $this->input->post('doct_spec'),
            'department' => $this->input->post('doct_dept'),
            'opDaysString' => $opDaysString,
            'doct_cf' => $this->input->post('doct_cf')
        );


        return $values;
    }

        
    
    
    //configuring image path in asstets folder and returns uploaded image path
    public function setUpImageUpload($width, $height, $folder_name = '') {
        $config['upload_path'] = './assets1/images/' . $folder_name; //setting up image file location
        $config['allowed_types'] = 'gif|jpg|png|jpeg'; //type of images can upload
        $config['max_size'] = '200';
        $config['max_width'] = $width;
        $config['max_height'] = $height;
        $this->load->library('upload', $config);
        $this->upload->initialize($config); //update configure files with these settings
        if (!$this->upload->do_upload()) {
            $result = array('status' => false,
                'error' => $this->upload->display_errors());
            return $result;
        } else {
            $data = $this->upload->data();
            $result = array(
                'status' => true, 'img_path' => $data['file_name']
            );
            return $result;
        }
    }

    
    
    
    
    public function create_doctor() {
        $data = array('main_content' => 'new_doctor');
        $this->load->view('admin/includes/template2', $data);
    }

    public function department_view() {
        $data = array('main_content' => 'departments');
        $this->load->view('admin/includes/template2', $data);
    }
    
        public function service_view() {
        $data = array('main_content' => 'services');
        $this->load->view('admin/includes/template2', $data);
    }

    
    
    
    
    
    //insert the data collected from doctor form and image path and redirect 
    public function insert_to_docMaster($values, $result) {
        if ($this->admin_model->add_new_doctor($values['doctor_name'], $values['qualficationString'], $values['specialization'], $values['department'], $values['opDaysString'], $result['img_path'], $values['doct_cf'])) {
            $this->session->set_flashdata('status_message', 'Doctor Created Successfully');
            $this->session->set_flashdata('status', true);
            redirect('admin/dashboard/create_doctor', 'refresh');
        } else {
            $this->session->set_flashdata('status_message', 'Sorry unable to create doctor now');
            $this->session->set_flashdata('status', false);
            redirect('admin/dashboard/create_doctor', 'refresh');
        }
    }

    public function insert_to_deptMaster($values, $result) {
        if ($this->admin_model->add_new_department($values['dept_name'], $values['dept_description'], $result['img_path'])) {
            $this->session->set_flashdata('status_message', 'Department Created Successfully');
            $this->session->set_flashdata('status', true);
            redirect('admin/dashboard/departments', 'refresh');
        } else {
            $this->session->set_flashdata('status_message', 'Sorry unable to create department now');
            $this->session->set_flashdata('status', false);
            redirect('admin/dashboard/departments', 'refresh');
        }
    }

    public function insert_to_servMaster($values, $result) {
        if ($this->admin_model->add_new_service($values['serv_name'], $values['serv_description'], $result['img_path'])) {
            $this->session->set_flashdata('status_message', 'service created successfully');
            $this->session->set_flashdata('status', true);
            redirect('admin/dashboard/services', 'refresh');
        } else {
            $this->session->set_flashdata('status_message', 'Sorry unable to create service now');
            $this->session->set_flashdata('status', false);
            redirect('admin/dashboard/services', 'refresh');
        }
    }

}
