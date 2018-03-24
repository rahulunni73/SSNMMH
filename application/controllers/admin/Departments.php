<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Create
 *  
 *   this controller is mainly responsible for form validation,creation of doctors,service and departments
 * 
 * @author Rahul Narayanan Unni S
 */

class Departments extends CI_Controller {


    function __construct() {
        parent::__construct();
        $this->load->helper('custom_helper');
        $this->load->model('admin/DepartmentsModel');
    }




    /*helps to create/add department*/
    public function addDepartment() {
        if (!$this->setupFormValidationDepartment()) {
            $this->department_view();//if redirection used, form validation errors not shown
        } else {
            $result = setUpImageUpload(400,251, 'departments',$_FILES['userfile']['name']); //pass the dimensions of the image and file name
            if (!$result['status']) {
                $data = array('main_content' => 'create_departments', 'status_message' => $result['error']);
                //$this->load->view('admin/includes/template2', $data);
                $this->session->set_flashdata('status_message', $result['error']);
                $this->session->set_flashdata('status', false);
                redirect('admin/dashboard/departments', 'refresh');
            } else {
                $values = $this->getFormValuesDepartment();
        		if($this->DepartmentsModel->addNewDepartment($values,$result)) {
            		$this->session->set_flashdata('status_message', 'Department Created Successfully');
            		$this->session->set_flashdata('status', true);
            		redirect('admin/dashboard/create_departments', 'refresh');
        	} 	else {
            		$this->session->set_flashdata('status_message', 'Sorry unable to create department now');
            		$this->session->set_flashdata('status', false);
            		redirect('admin/dashboard/create_departments', 'refresh');
        		}
            }
        }
    }




    /*helps to create/add new department*/
    public function updateDepartmentsDetails()
    {        
        if (!$this->setupFormValidationDepartment()) {
            $this->update_department(); /*if redirection used, form validation errors not shown*/     
        } else {
            $result = setUpImageUpload(400,250, 'departments',$_FILES['userfile']['name']);
             /*pass the dimensions of the image and location*/
            if (!$result['status']) {
                $this->session->set_flashdata('status_message', $result['error']);
                $this->session->set_flashdata('status', false);
                redirect('admin/dashboard/update_departments', 'refresh');
            } else {
                $values = $this->getFormValuesDepartment(); /*get the form values*/
                /*provide values to model class*/  
               if ($this->DepartmentsModel->updateDepartmentInfo($values, $result)) {
            		$this->session->set_flashdata('status_message', 'Department Updated Successfully');
            		$this->session->set_flashdata('status', true);
            		redirect('admin/dashboard/update_departments', 'refresh');
        		} 	else {
            			$this->session->set_flashdata('status_message', 'Sorry unable to update Department now');
            			$this->session->set_flashdata('status', false);
            			redirect('admin/dashboard/update_departments', 'refresh');
        		}
            }
        }
    }


    public function removeDepartment($id, $file_name) {
       if ($this->DepartmentsModel->deleteDepartment($id)) {
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






    public function getSingleDepartmentDetails($did="") {   
     $query = $this->admin_model->getSingleDepartmentInfo($did);
     echo json_encode($query);
    }







        /*setting up validation rule and validating department form - input values*/
    public function setupFormValidationDepartment() {
        $this->form_validation->set_rules('department', 'Department name', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        if ($this->form_validation->run() === FALSE) {
            return false;
        } else {
            return true;
        }
    }

    /*obtaining form values for Department*/
    public function getFormValuesDepartment() {
        $values = array('dept_name' => $this->input->post('department'), 'dept_description' => $this->input->post('description'));
        return $values;
    }

        public function department_view() {
        $data = array('main_content' => 'admin/departments');
        $this->load->view('admin/includes/template2', $data);
    }


}

?>