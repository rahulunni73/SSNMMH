<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 *
   Home controller is responsible for loading views with datas from back ends



 */

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('admin/admin_model');
        $this->load->model('admin/DepartmentsModel');
        $this->load->model('admin/DoctorsModel');
        $this->load->model('admin/ServicesModel');
        $this->load->model('admin/NewsModel');
        $this->load->model('admin/InsuranceModel');
        
    }

    //default home page
    public function index() {
        $data = array('main_content' => 'home/home', 'home' => 'active','latest_news' => $this->NewsModel->getLatestNews());
        $this->load->view('home/includes/home_template', $data);
    }

    //contact page
    public function contact() {
        $data = array('main_content' => 'home/contact', 'contact' => 'active');
        $this->load->view('home/includes/common_template', $data);
    }

    //about page
    public function about() {
        $data = array('main_content' => 'home/about', 'about' => 'active');
        $this->load->view('home/includes/common_template', $data);
    }

    //service page
    public function services() {
        $data = array('main_content' => 'home/service', '_active' => 'active','serv_details'=>$this->ServicesModel->getServices());
        $this->load->view('home/includes/common_template', $data);
    }

    //gallery page
    public function gallery() {
        $data = array('main_content' => 'home/gallery', '_active' => 'active');
        $this->load->view('home/includes/common_template', $data);
    }

    //doctors page
    public function doctors() {
        $data = array('main_content' => 'home/doctors', 'doct_active' => 'active','dept_names' => $this->DepartmentsModel->getDepartments(),
            'doctors'=> $this->DoctorsModel->getDoctorsInfo());
        $this->load->view('home/includes/special_template', $data);
    }

    public function profile($doctorId = '',$deptId = ''){ 
            
    $data = array('main_content' => 'home/doctor_profile','doctor'=> $this->DoctorsModel->getSingleDoctorInfo($doctorId),'doctorgroup'=> $this->DoctorsModel->getGroupDoctorInfo($doctorId,$deptId));
            $this->load->view('home/includes/common_template', $data);
    }


    //departments page
    public function departments() {
        $data = array('main_content' => 'home/departments', '_active' => 'active','dept_names' => $this->DepartmentsModel->getDepartments());
        $this->load->view('home/includes/special_template', $data);
    }
    
    //department profile page
    public function deptartmentprof($dept_id = '') {
        $data = array('main_content' => 'home/department_profile','dept_name'=>$this->DepartmentsModel->getDeptName($dept_id),'dept_info' => $this->DepartmentsModel->getDeptDoctorsInfo($dept_id));
        $this->load->view('home/includes/common_template', $data);
    }
    
    
    //inurance page 
    public function insurance(){
        $data = array('main_content' => 'home/insurance','_active' => 'active','insur_details' => $this->InsuranceModel->getInsuranceInfo());
        $this->load->view('home/includes/common_template', $data);
    }

    
        public function newsSingle(){
        $data = array('main_content' => 'home/news_single');
        $this->load->view('home/includes/common_template', $data);   

    }


    public function news(){

        $this->load->library('pagination');

        $this->db->order_by("POSTED_DATE", "desc");
        $query = $this->db->get('News_Master','3',$this->uri->segment(3));
        $data['news'] = $query->result();
        /* total number of rows*/
        $query2 = $this->db->get('News_Master');

        $config['base_url'] = base_url().'index.php/home/news';
        $config['total_rows'] = $this->NewsModel->getNewsCount();
        $config['per_page'] = 3;
        
        $config['full_tag_open']    = '<ul class="pagination" >';
        $config['full_tag_close']   = '</ul>';

        $config['first_tag_open']  =  '<li>';
        $config['last_tag_open'] =  '<li>';
        

        $config['next_tag_open']  =  '<li>';
        $config['prev_tag_open'] =  '<li>';

        $config['num_tag_open']  =  '<li>';
        $config['num_tag_close'] =  '</li>';

        $config['first_tag_close'] =  '</li>';
        $config['last_tag_close'] =  '</li>';

        $config['next_tag_close']  =  '</li>';
        $config['prev_tag_close'] =  '</li>';

        $config['cur_tag_open']  =  "<li class=\"active\"><span><b>";
        $config['cur_tag_close'] =  "</b></span></li>";


        $this->pagination->initialize($config);

        $data['links']  = $this->pagination->create_links();  
        $data['main_content'] = 'home/news';
        $data['_active'] = 'active';
        $this->load->view('home/includes/common_template', $data); 


        /*$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $query = $this->db->get('News_Master',$config['per_page'],$page);
        $data['news'] = $query->result();*/ 

    }



        //inurance page 
    public function insurance_profile($insur_id){
        $data = array('main_content' => 'home/insurance_profile','insur_details' => $this->InsuranceModel->getSingleInsuranceInfo($insur_id));
        $this->load->view('home/includes/common_template', $data);
    }


    public function appointments(){
        $data = array('main_content' => 'home/appointments');
        $this->load->view('home/includes/common_template', $data);

    }



}
