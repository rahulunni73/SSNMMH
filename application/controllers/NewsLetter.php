<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class NewsLetter extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('admin/admin_model');
    }


    public function index(){

    }

    public function newsLetter() {


    	if (!$this->newsSignupFormValidation()) {
            $data = array('main_content' => 'home/contact', 'contact' => 'active');
            $this->load->view('home/includes/common_template', $data);
        } else {
            $values = $this->getFormValuesContacts();
            $this->insert_to_feedback($values);
        }

        $name = $this->input->post("s_name");
        $email = $this->input->post("s_email");
        $insert = $this->admin_model->newsLetterSignup($name, $email);
        if (!$insert) {
            echo json_encode(array('status' => 'Ooops!! something went wrong'));
        } else {
            echo json_encode(array('status' => 'Thank You!!'));
        }
    }


    public function newsSignupFormValidation() {
        $this->form_validation->set_rules('cus_name', 'Name', 'trim|required');
        $this->form_validation->set_rules('cus_email', 'Email', 'trim|required');
        $this->form_validation->set_rules('cus_phone', 'Phone', 'trim|required');
        $this->form_validation->set_rules('cus_subject', 'Subject', 'trim|required');
        $this->form_validation->set_rules('cus_comments', 'Comments', 'trim|required');
        if ($this->form_validation->run() === FALSE) {
            return false;
        } else {
            return true;
        }
    }







}
?>