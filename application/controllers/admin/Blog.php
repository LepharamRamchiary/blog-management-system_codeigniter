<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{
    public function index()
    {
       $this->load->view('adminpanel/viewblog');
    }
    function addblog(){
        $this->load->view('adminpanel/addblog');
    }

    function addblog_post(){
        print_r($_POST);
    }
}

