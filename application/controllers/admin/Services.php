<?php
/**
 * Description of Create
 *  
 *   this controller is mainly responsible for form validation,creation of doctors,service and departments
 * 
 * @author Rahul Narayanan Unni S
 */

class Services extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('custom_helper');
        $this->load->model('admin/ServicesModel');
    }

    /*helps to create/add services*/
    public function addService() {
        if (!$this->setupFormValidationService()) {
            $this->department_view();//if redirection used, form validation errors not shown
        } else {
            $result = setUpImageUpload(400,250, 'services',$_FILES['userfile']['name']); //pass the dimensions of the image and file name
            if (!$result['status']) {
                $data = array('main_content' => 'create_services', 'status_message' => $result['error']);
                //$this->load->view('admin/includes/template2', $data);
                $this->session->set_flashdata('status_message', $result['error']);
                $this->session->set_flashdata('status', false);
                redirect('admin/dashboard/departments', 'refresh');
            } else {
                $values = $this->getFormValuesService();
                if($this->ServicesModel->addNewService($values,$result)) {
            		$this->session->set_flashdata('status_message', 'Service Created Successfully');
            		$this->session->set_flashdata('status', true);
            		redirect('admin/dashboard/create_services', 'refresh');
        	} 	else {
            		$this->session->set_flashdata('status_message', 'Sorry unable to create service now');
            		$this->session->set_flashdata('status', false);
            		redirect('admin/dashboard/create_services', 'refresh');
        		}
            }
        }
    }




    /*helps to update services*/
    public function updateServicesDetails()
    {        
        if (!$this->setupFormValidationService()) {
            $this->update_department(); /*if redirection used, form validation errors not shown*/     
        } else {
            $result = setUpImageUpload(400,250, 'services',$_FILES['userfile']['name']);
             /*pass the dimensions of the image and location*/
            if (!$result['status']) {
                $this->session->set_flashdata('status_message', $result['error']);
                $this->session->set_flashdata('status', false);
                redirect('admin/dashboard/update_sevices', 'refresh');
            } else {
                $values = $this->getFormValuesService(); /*get the form values*/
                /*provide values to model class*/  
               if ($this->ServicesModel->updateServiceInfo($values, $result)) {
            		$this->session->set_flashdata('status_message', 'Service Updated Successfully');
            		$this->session->set_flashdata('status', true);
            		redirect('admin/dashboard/update_services', 'refresh');
        		} 	else {
            			$this->session->set_flashdata('status_message', 'Sorry unable to update Service now');
            			$this->session->set_flashdata('status', false);
            			redirect('admin/dashboard/update_services','refresh');
        		}
            }
        }
    }


    public function removeServices($id, $file_name) {
       if ($this->ServicesModel->deleteService($id)) {
            unlink('./assets1/images/services/' . $file_name); //remove the image file 
            $this->session->set_flashdata('status_message', 'Service removed successfully');
            $this->session->set_flashdata('status', true);
            redirect('admin/dashboard/delete_services', 'refresh');
        } else {
            $this->session->set_flashdata('status_message', 'unable to delete services');
            $this->session->set_flashdata('status', false);
            redirect('admin/dashboard/delete_services', 'refresh');
        }
    }



    public function getSingleServiceDetails($did="") {   
     $query = $this->ServicesModel->getSingleServiceInfo($did);
     echo json_encode($query);
    }




        /*setting up validation rule and validating department form - input values*/
    public function setupFormValidationService() {
        $this->form_validation->set_rules('service', 'Service name', 'trim|required');
        $this->form_validation->set_rules('department', 'Department name', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        if ($this->form_validation->run() === FALSE) {
            return false;
        } else {
            return true;
        }
    }

    /*obtaining form values for Department*/
    public function getFormValuesService() {
        $values = array('service_name' => $this->input->post('service'), 'serv_description' => $this->input->post('description'),'dept_id'=>$this->input->post('department'));
        return $values;
    }

        public function services_view() {
        $data = array('main_content' => 'admin/create_services');
        $this->load->view('admin/includes/template2', $data);
    }


}

?>