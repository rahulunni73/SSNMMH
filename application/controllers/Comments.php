<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Comments extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('admin/admin_model');
    }

    public function pushFeedback() {

        if (!$this->commentFormValidation()) {
            $data = array('main_content' => 'home/contact', 'contact' => 'active');
            $this->load->view('home/includes/common_template', $data);
        } else {
            $values = $this->get_form_values_contacts();
            $this->insert_to_feedback($values);
        }
    }

    public function newsLetterSignup() {
        $name = $this->input->post("name");
        $email = $this->input->post("email");
        $insert = $this->admin_model->newsLetterSignup($name, $email);
        if (!$insert) {
            echo json_encode(array('status' => 'Ooops!! something went wrong'));
        } else {
            echo json_encode(array('status' => 'Congratulations!!'));
        }
    }

    public function commentFormValidation() {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required');
        $this->form_validation->set_rules('comments', 'Comments', 'trim|required');
        if ($this->form_validation->run() === FALSE) {
            return false;
        } else {
            return true;
        }
    }

    //obtaining form values for Dcoctor
    public function get_form_values_contacts() {
        $values = array('name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'subject' => $this->input->post('subject'),
            'comments' => $this->input->post('comments')
        );
        return $values;
    }

    //insert the data collected from doctor form and image path and redirect 
    public function insert_to_feedback($values) {
        if ($this->admin_model->add_feedbacks($values['name'], $values['email'], $values['phone'], $values['subject'], $values['comments'])) {
            $this->session->set_flashdata('status_message', 'Thank you for your valuable feedback ');
            $this->session->set_flashdata('status', true);
            redirect('home/contact', 'refresh');
        } else {
            $this->session->set_flashdata('status_message', 'Sorry unable send your feedback');
            $this->session->set_flashdata('status', false);
            redirect('home/contact', 'refresh');
        }
    }

}
