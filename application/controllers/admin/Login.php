<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function index()
    {

        if(isset($_SESSION['user_id'])){
            redirect('admin/dashboard');
        }

        $data = [];
        if (isset($_SESSION['error'])) {
            //    die($_SESSION['error']);

            $data['error'] = $_SESSION['error'];
        }else{
            $data['error'] = 'NO_ERROR';
        }
        $this->load->view('adminpanel/loginview', $data);
    }

    function login_post()
    {
        // print_r($_POST);
        if (isset($_POST)) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $q = $this->db->query("SELECT * FROM `backend_user` WHERE `username`='$email' AND `password`='$password'");

            if ($q->num_rows()) {
                // valid Creadential
                $result = $q->result_array();
                // echo "<pre>";
                // print_r($result);
                // die();

                $this->session->set_userdata('user_id', $result[0]['uid']);

                redirect('admin/dashboard');
            } else {
                //invalid Creadential
                $this->session->set_flashdata('error', 'Invalid Creadential');
                redirect('admin/login');
            }
        } else {
            die("Invalid Request");
        }
    }

    function logout()
    {
        session_destroy();
        redirect('admin/login');
    }
}
