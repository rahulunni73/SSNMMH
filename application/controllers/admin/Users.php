<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Users extends CI_Controller {

public function __construct()
{
	parent::__construct();
	$this->load->helper('custom_helper');
	$this->load->model('admin/UsersModel');
}

	public function index($message = '')
	{
		if (isset($_COOKIE['og_username']) && isset($_COOKIE['og_password']) && $message != 'invalid') {
			$userData = array(
				'username' => $_COOKIE['og_username'],
				'password' => $_COOKIE['og_password']
			);
			if (($this->UsersModel->user_validation($userData)) <= 0) {
				$this->index('invalid');
			}
			else {
				$this->session->set_userdata('username', $_COOKIE['og_username']);
				redirect('admin/dashboard', 'refresh');
			}
		}
		else {
			$this->load->view('admin/member_login');
		}
	}


	public function viewRegistration()
	{
		$this->load->view('admin/member_register'); /*registration page load*/
	}



/*________________________________REGISTRATION MODULE____________________________________________*/



	public function userRegistration()
	{
		if (!$this->registrationFormValidation()) {
		}
		else {
			$result = setUpImageUpload(160,160, 'users', $_FILES['userfile']['name']); //pass the dimensions of the image and file name
			if (!$result['status']) {
				$this->session->set_flashdata('status_message', $result['error']);
				$this->session->set_flashdata('status', false);
				redirect('admin/users/viewRegistration', 'refresh');
			}
			else {
				$values = $this->getRegitrationFormValues();
	        	if($this->UsersModel->userCreation($values, $result)) {
		            $this->session->set_flashdata('status_message', 'User Registered Successfully');
		            $this->session->set_flashdata('status', true);
		            redirect('admin/users/viewRegistration', 'refresh');
	        	} else {
		            $this->session->set_flashdata('status_message', 'Sorry unable to Register user now');
		            $this->session->set_flashdata('status', false);
		            redirect('admin/users/viewRegistration', 'refresh');
	        	}
			}
		}
	}


	public function registrationFormValidation()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('password-again', 'Re-type Password', 'trim|required|matches[password]');
		if ($this->form_validation->run() === FALSE) {
			/*if form validation fails load the registration page*/
			$this->viewRegistration();
		}
		else {
			return true;
		}
	}

	public function getRegitrationFormValues()
	{
		// get all fields values from form
		$values = array(
			'user_name' => $this->input->post('username') ,
			'email' => $this->input->post('email') ,
			'password' => $this->input->post('password') ,
			'designation' => 'Administrator'
		);
		return $values;
	}



/*____________________________END OF REGISTRATION MODULE____________________________________________*/




/*____________________________________LOGIN MODULE__________________________________________________*/


	/* login and validation user exist or not*/
	public function validateUser()
	{
		if (!$this->loginFormValidation()) {
			$this->index();
		}
		else {
			$values = $this->getLoginFormValues();
			$userData = array(
				'username' => $values['user_name'],
				'password' => $values['password'],
				'remember_me' => $values['remember_me']
			);
			$result = $this->UsersModel->user_validation($userData);
			if ($result <= 0) {
				$this->session->set_flashdata('status_message', 'Invalid username or password');
				redirect('admin/users/index', 'refresh');
			}
			else {

				$this->setMemberCookies($values);
				$this->session->set_userdata('username', $values['user_name']);
				$this->session->set_flashdata('status_message', 'Login Success');
				redirect('admin/dashboard', 'refresh');
			}
		}
	}


	//validate the  login form
	public function loginFormValidation()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() === FALSE) {
			return FALSE;
		}
		else {
			return TRUE;
		}
	}


	//get Login forms values
	public function getLoginFormValues()
	{
		$remember_me = $this->input->post('remember_me');
		$values = array(
			'user_name' => $this->input->post('username') ,
			'password' => $this->input->post('password') ,
			'remember_me' => ($remember_me == "") ? 0 : 1,
		);
		return $values;
	}

	//logout
	public function logout()
	{
		$this->session->sess_destroy();
	        setcookie('og_username', '', 0, '/');
	        setcookie('og_password', '', 0, '/');

			$this->load->view('admin/member_login');
	}


	public function setMemberCookies($values)
	{
		$this->session->set_userdata('username', $values['user_name']);
		if ($values['remember_me'] === 1) {
			setcookie('og_username', $values['user_name'], time() + (86400 * 30) , '/');
			setcookie('og_password', $values['password'], time() + (86400 * 30) , '/');
		}
	}


/*_______________________________END OF LOGIN MODULE__________________________________________________*/
 
}

?>
