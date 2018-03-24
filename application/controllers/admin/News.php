<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of Create
 *  
 *   this controller is mainly responsible for form validation,creation of doctors,service and departments
 * 
 * @author Rahul Narayanan Unni S
 */

class News extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('custom_helper');
        $this->load->model('admin/NewsModel');
         
    }

    public function index(){
        $this->create_news();
    }

    public function addNews(){

         if (!$this->setupFormValidationNews()) {
            $this->create_news();//if redirection used, form validation errors not shown
        } else {

            $result = setUpImageUpload(800,800,'news',$_FILES['userfile']['name']); //pass the dimensions of the image and file name

            if (!$result['status']) {
                $data = array('main_content' => 'create_news', 'status_message' => $result['error']);
                // this will report  if any error in image upload 
                $this->session->set_flashdata('status_message', $result['error']);
                $this->session->set_flashdata('status', false);
                redirect('admin/dashboard/create_news', 'refresh');
            } else {
                $values = $this->getFormValuesNews();
                if ($this->NewsModel->addNews($values,$result)) {
                    $this->session->set_flashdata('status_message','News Created Successfully');
                    $this->session->set_flashdata('status', true);
                    redirect('admin/dashboard/create_news', 'refresh');
                }
                else {
                    $this->session->set_flashdata('status_message','Sorry unable to create news now');
                    $this->session->set_flashdata('status', false);
                    redirect('admin/dashboard/create_news', 'refresh');
                }
            }
        }

    }



    public function removeNews($newsId, $file_name){

        if ($this->NewsModel->removeNews($newsId)) {
            unlink('./assets1/images/news/' . $file_name); //remove the image file 
            $this->session->set_flashdata('status_message', 'news removed successfully');
            $this->session->set_flashdata('status', true);
            redirect('admin/dashboard/remove_news', 'refresh');
        } else {
            $this->session->set_flashdata('status_message', 'unable to remove news');
            $this->session->set_flashdata('status', false);
            redirect('admin/dashboard/remove_news', 'refresh');
        }

    }




    public function getFormValuesNews(){
        $values = array('news_title' => $this->input->post('news_title'),
            'date' => $this->input->post('date'),
            'news_venue' => $this->input->post('news_venue'),
            'editor1' => $this->input->post('editor1')
        );
        return $values;
    }



    /*setting up validation rule and validating news form - input values*/
    public function setupFormValidationNews(){
        $this->form_validation->set_rules('news_title', 'Title','trim|required');
        $this->form_validation->set_rules('date', 'Date', 'trim|required');
        $this->form_validation->set_rules('news_venue', 'Venue','trim|required');
        $this->form_validation->set_rules('editor1', 'Content','trim|required');
        if ($this->form_validation->run() === FALSE){
            return false;
        } else {
            return true;
        }
    }


    public function create_news()
    {
        $data = array('main_content' => 'admin/create_news');
        $this->load->view('admin/includes/template2', $data);
    }



}

?>