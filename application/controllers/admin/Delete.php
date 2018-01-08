<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Delete
 *
 * @author Rahul Narayanan Unni S
 */
class Delete extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('admin/admin_model');
    }

    public function removeDepartment($id, $file_name) {
        if ($this->admin_model->deleteDepartment($id)) {
            unlink('./assets1/images/departments/' . $file_name); //remove the image file 
            $this->session->set_flashdata('status_message', 'Department removed successfully');
            $this->session->set_flashdata('status', true);
            redirect('admin/dashboard/departments', 'refresh');
        } else {
            $this->session->set_flashdata('status_message', 'unable to delete department');
            $this->session->set_flashdata('status', false);
            redirect('admin/dashboard/departments', 'refresh');
        }
    }

    public function removeService($id,$file_name) {

        if ($this->admin_model->deleteService($id)) {
            unlink('./assets1/images/services/' . $file_name); //remove the image file 
            $this->session->set_flashdata('status_message', 'Service removed successfully');
            $this->session->set_flashdata('status', true);
            redirect('admin/dashboard/services', 'refresh');
        } else {
            $this->session->set_flashdata('status_message', 'unable to delete service');
            $this->session->set_flashdata('status', false);
            redirect('admin/dashboard/services', 'refresh');
        }
    }

    public function removeDoctor() {
        
        $doctor_id = $this->input->post('doctor_id');
        //$doctor_name = $this->input->post('doctList');
        //$dept_name = $this->input->post('deptList');
        $img_path = $this->input->post('image_path');
        $contents = explode('/', $img_path);
        $img_file_name = end($contents);
        
        print_r($doctor_id);

        if (($this->admin_model->deleteDoctor($doctor_id)) === 0) {
            $this->session->set_flashdata('status_message', 'Sorry unable to delete the doctor');
            $this->session->set_flashdata('status', false);
            redirect('admin/dashboard/remove_doctor', 'refresh');
        } else {
            unlink('./assets1/images/doctors/' . $img_file_name);
            $this->session->set_flashdata('status_message', 'Doctor removed successfully');
            $this->session->set_flashdata('status', true);
            redirect('admin/dashboard/remove_doctor', 'refresh');
        }
    }

}
