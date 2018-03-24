<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Create
 *  
 *   this controller is mainly responsible for form validation,creation of doctors,service and departments
 * 
 * @author Rahul Narayanan Unni S
 */

class Doctors extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('custom_helper');
        $this->load->model('admin/DoctorsModel');
    }


    /*helps to create/add new doctor*/
    public function addDoctor(){
        if (!$this->setupFormValidationDoctor()) {
            $this->create_doctor();//if redirection used, form validation errors not shown
        } else {
            $result = setUpImageUpload(128,128,'doctors',$_FILES['userfile']['name']); //pass the dimensions of the image and file name
            if (!$result['status']) {
                $data = array('main_content' => 'new_doctor', 'status_message' => $result['error']);
                // this will report  if any error in image upload 
                $this->session->set_flashdata('status_message', $result['error']);
                $this->session->set_flashdata('status', false);
                redirect('admin/dashboard/create_doctor', 'refresh');
            } else {
                $values = $this->getFormValuesDoctors();
				if ($this->DoctorsModel->add_new_doctor($values,$result)) {
            		$this->session->set_flashdata('status_message','Doctor Created Successfully');
            		$this->session->set_flashdata('status', true);
            		redirect('admin/dashboard/create_doctor', 'refresh');
            	}
            	else {
            		$this->session->set_flashdata('status_message','Sorry unable to create doctor now');
            		$this->session->set_flashdata('status', false);
            		redirect('admin/dashboard/create_doctor', 'refresh');
        		}
            }
        }
    }



    /*helps to edit/update new doctor*/
    public function updateDoctorDetails()
    {    
        if (!$this->setupFormValidationDoctor()) {
            $this->update_doctor(); /*if redirection used, form validation errors not shown*/          
        } else {
            $result = setUpImageUpload(128, 128, 'doctors'); /*pass the dimensions of the image*/
            if (!$result['status']) {
                $this->session->set_flashdata('status_message', $result['error']);
                $this->session->set_flashdata('status', false);
                redirect('admin/dashboard/update_doctor', 'refresh');
            } else {
	                $values = $this->getFormValuesDoctors(); /*get the form values*/
	                if ($this->DoctorsModel->updateDoctorInfo($values, $result)) {
		            	$this->session->set_flashdata('status_message', 'Doctor Updated Successfully');
		            	$this->session->set_flashdata('status', true);
		            	redirect('admin/dashboard/update_doctor', 'refresh');
        			}else {
		            	$this->session->set_flashdata('status_message', 'Sorry unable to update doctor now');
		            	$this->session->set_flashdata('status', false);
		            	redirect('admin/dashboard/update_doctor', 'refresh');
        			}
            }
        } 
}



    public function removeDoctor() {        
        $doctor_id = $this->input->post('doctor_id');
        $dept_name = $this->input->post('department');
        $img_path = $this->input->post('image_path');
        $contents = explode('/', $img_path);
        $img_file_name = end($contents);
        if (($this->DoctorsModel->deleteDoctor($doctor_id)) === 0) {
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



    /*setting up validation rule and validating doctor form - input values*/
    public function setupFormValidationDoctor(){
        $this->form_validation->set_rules('doctor_name', 'Doctor Name', 'trim|required');
        $this->form_validation->set_rules('qualification[]', 'Qualification', 'trim|required');
        $this->form_validation->set_rules('specialization', 'Specialization', 'trim|required');
        $this->form_validation->set_rules('department', 'Department', 'trim|required');
        $this->form_validation->set_rules('opdays[]', 'OP Days', 'trim|required');
        $this->form_validation->set_rules('consultation_fee', 'Consulting Fee', 'trim|required');
        if ($this->form_validation->run() === FALSE){
            return false;
        } else {
            return true;
        }
    }


    /*obtaining form values for Dcoctor*/
    public function getFormValuesDoctors(){
        $qualification = $this->input->post('qualification[]');
        $op_days = $this->input->post('opdays[]');
        $news_venue = implode(',', $qualification);
        $opDaysString = implode(',', $op_days);
        $values = array('doctor_name' => $this->input->post('doctor_name'),
            'qualficationString' => $qualficationString,
            'specialization' => $this->input->post('specialization'),
            'dept_id' => $this->input->post('department'),/*department is here getting*/
            'opDaysString' => $opDaysString,
            'doct_cf' => $this->input->post('consultation_fee')
        );
        return $values;
    }


    public function getSingleDoctorDetails($uid="") {    
    $query = $this->DoctorsModel->getSingleDoctorInfo($uid);
    echo json_encode($query);
    }


    public function getDoctorsDetails() {
        $query = $this->DoctorsModel->getDoctorsInfo();
        echo json_encode($query);
    }



      public function update_doctor()
    {
        $data = array('main_content' => 'admin/update_doctors');
        $this->load->view('admin/includes/template2', $data);
    }



}

?>