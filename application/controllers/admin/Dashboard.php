<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        if (isset($_SESSION['user_id'])) {
            // die('Session_set' . $_SESSION['user_id']);
            $this->load->view('adminpanel/dashboard');
        } else {
            redirect('admin/Login');
        }
    }
}
