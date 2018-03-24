<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of Create
 *  
 *   this controller is mainly responsible for form validation,creation of doctors,service and departments
 * 
 * @author Rahul Narayanan Unni S
 */

class Insurance extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('custom_helper');
        $this->load->model('admin/InsuranceModel');
         
    }

    public function index(){
        $this->create_insurance();
    }

    public function addInsurance(){

         if (!$this->setupFormValidationInsurance()) {
            $this->create_insurance();//if redirection used, form validation errors not shown
        } else {

            $result = setUpImageUpload(400,250,'insurance',$_FILES['userfile']['name']); //pass the dimensions of the image and file name
            if (!$result['status']) {
                $data = array('main_content' => 'create_insurance', 'status_message' => $result['error']);
                // this will report  if any error in image upload 
                $this->session->set_flashdata('status_message', $result['error']);
                $this->session->set_flashdata('status', false);
                redirect('admin/dashboard/create_insurance', 'refresh');
            } else {
                $values = $this->getFormValuesInsurance();
                if ($this->InsuranceModel->addInsurance($values,$result)) {
                    $this->session->set_flashdata('status_message','Insurance Created Successfully');
                    $this->session->set_flashdata('status', true);
                    redirect('admin/dashboard/create_insurance', 'refresh');
                }
                else {
                    $this->session->set_flashdata('status_message','Sorry unable to create Insurance now');
                    $this->session->set_flashdata('status',false);
                    redirect('admin/dashboard/create_insurance', 'refresh');
                }
            }
        }

    }



    public function removeInsurance($insurid, $file_name){

        if ($this->InsuranceModel->removeInsurance($insurid)) {
            unlink('./assets1/images/insurance/' . $file_name); //remove the image file 
            $this->session->set_flashdata('status_message', 'insurance removed successfully');
            $this->session->set_flashdata('status', true);
            redirect('admin/dashboard/remove_insurance', 'refresh');
        } else {
            $this->session->set_flashdata('status_message', 'unable to remove insurance');
            $this->session->set_flashdata('status', false);
            redirect('admin/dashboard/remove_insurance', 'refresh');
        }

    }




    public function getFormValuesInsurance(){
        $values = array('insur_name' => $this->input->post('insur_name'),
            'editor1' => $this->input->post('editor1')
        );
        return $values;
    }



    /*setting up validation rule and validating news form - input values*/
    public function setupFormValidationInsurance(){
        $this->form_validation->set_rules('insur_name', 'Title','trim|required');
        $this->form_validation->set_rules('editor1', 'Content','trim|required');
        if ($this->form_validation->run() === FALSE){
            return false;
        } else {
            return true;
        }
    }


    public function create_insurance()
    {
        $data = array('main_content' => 'admin/create_insurance');
        $this->load->view('admin/includes/template2', $data);
    }



}

?>