<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Pagenotfound extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->output->set_status_header('404');
        $data = array('main_content' => 'home/404');
        $this->load->view('includes/template', $data);
    }

}
