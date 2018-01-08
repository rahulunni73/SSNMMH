<?php

/**
 * Description of Update
 *
 * @author Rahul Narayanan Unni S
 */
class Update extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('admin/admin_model');
    }

    public function update_doctor_details() {
        if (!$this->check_for_form_validation()) {
            $this->update_doctor();
        } else {
            $values = $this->get_doctor_update_form_values();
            $this->update_docMaster($values);
        }
    }

    public function check_for_form_validation() {
        $this->form_validation->set_rules('doct_name', 'Doctor Name', 'trim|required');
        $this->form_validation->set_rules('doct_qual[]', 'Qualification', 'trim|required');
        $this->form_validation->set_rules('doct_spec', 'Specialization', 'trim|required');
        $this->form_validation->set_rules('doct_dept', 'Department', 'trim|required');
        $this->form_validation->set_rules('op_day[]', 'OP Days', 'trim|required');
        $this->form_validation->set_rules('doct_cf', 'Consulting Fee', 'trim|required');
        if ($this->form_validation->run() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function get_doctor_update_form_values() {
        $qualification = $this->input->post('doct_qual');
        $op_days = $this->input->post('op_day');
        $qualficationString = implode(',', $qualification);
        $opDaysString = implode(',', $op_days);
        $values = array(
            'doc_id' => $this->input->post('doc_id'),
            'doctor_name' => $this->input->post('doct_name'),
            'qualficationString' => $qualficationString,
            'specialization' => $this->input->post('doct_spec'),
            'department' => $this->input->post('doct_dept'),
            'opDaysString' => $opDaysString,
            'img_path' => $this->input->post('image_path'),
            'doct_cf' => $this->input->post('doct_cf'),
        );
        return $values;
    }

    public function update_doctor() {
        $data = array('main_content' => 'update_doctors');
        $this->load->view('admin/includes/template2', $data);
    }

    //insert the data collected from doctor form and image path and redirect 
    public function update_docMaster($values) {
        if ($this->admin_model->updateDoctorInfo($values['doc_id'], $values['doctor_name'], $values['qualficationString'], $values['specialization'], $values['department'], $values['opDaysString'], $values['doct_cf'])) {
            $this->session->set_flashdata('status_message', 'Doctor Updated Successfully');
            $this->session->set_flashdata('status', true);
            //$this->update_doctor();
            redirect('admin/dashboard/update_doctor', 'refresh');
        } else {
            $this->session->set_flashdata('status_message', 'Sorry unable to update doctor now');
            $this->session->set_flashdata('status', false);
            //$this->update_doctor();
            redirect('admin/dashboard/update_doctor', 'refresh');
        }
    }

}
