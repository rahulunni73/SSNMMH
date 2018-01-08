<?php

/**
 * Description of Main
 * This is the main entry point of this application
 * This controller is is responsible for bring the first login page to the user/login/registration
 * 
 * 
 * @author rahul narayanan unni
 */
class Main extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('admin/main_model');
    }

    public function index($message = '') {

        if (isset($_COOKIE['og_username']) && isset($_COOKIE['og_password']) && $message != 'invalid') {

            if (($this->main_model->user_validation($_COOKIE['og_username'], $_COOKIE['og_password'])) <= 0) {
                $this->index('invalid');
            } else {
                $this->session->set_userdata('username', $_COOKIE['og_username']);
                redirect('admin/dashboard', 'refresh');
            }
        } else {
            $this->load->view('admin/member_login');
        }
    }

    public function load_register_view() {
        $this->load->view('admin/member_register');
    }

    public function validate_member() {
        if (!$this->login_form_validation()) {
            $this->index();
        } else {
            $values = $this->get_login_form_values();
            if (($this->main_model->user_validation($values['user_name'], $values['password'])) <= 0) {
                $this->session->set_flashdata('status_message', 'Invalid username or password');
                redirect('admin/main/index', 'refresh');
            } else {
                $this->set_member_cookies($values);
                $this->session->set_userdata('username', $values['user_name']);
                $this->session->set_flashdata('status_message', 'Login Success');
                redirect('admin/dashboard', 'refresh');
            }
        }
    }

    public function login_form_validation() {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function set_member_cookies($values) {
        $this->session->set_userdata('username', $values['user_name']);
        if ($values['remember_me'] === 1) {
            setcookie('og_username', $values['user_name'], time() + (86400 * 30), '/');
            setcookie('og_password', $values['password'], time() + (86400 * 30), '/');
        }
    }

    public function get_login_form_values() {
        $remember_me = $this->input->post('remember_me');
        $values = array(
            'user_name' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'remember_me' => ($remember_me == "") ? 0 : 1,
        );
        return $values;
    }

    public function register_member() {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
        $this->form_validation->set_rules('password-again', 'Re-type Password', 'trim|required|matches[password]');

        if ($this->form_validation->run() === FALSE) {
            $this->load_register_view(); //if form validation fails load the registration page
        } else {
            //get all fields values from form
            $email = $this->input->post('email');
            $user_name = $this->input->post('username');
            $password = $this->input->post('password');
            $designation = 'Administrator';
            if ($query = $this->main_model->member_registration($user_name, $password, $email, $designation)) {
                $this->session->set_flashdata('status_message', 'Registration  Success');
                redirect('admin/main/index', 'refresh');
            } else {
                $this->load_register_view();
            }
        }
    }

    public function logout_member() {
        $this->session->sess_destroy();
        setcookie('og_username', '', 0, '/');
        setcookie('og_password', '', 0, '/');
        //$this->index('invalid');
        redirect('admin/main', 'refresh');
    }

}
