<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{
    public function index()
    {
        $this->load->view('adminpanel/viewblog');
    }
    function addblog()
    {
        $this->load->view('adminpanel/addblog');
    }

    function addblog_post()
    {
        // print_r($_POST);
        // print_r($_FILES);

        if ($_FILES) {
            // Image is passed for Upload
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
        
            $this->load->library('upload', $config);

            if (! $this->upload->do_upload('file')) {
                $error = array('error' => $this->upload->display_errors());

                die("Error");
                // $this->load->view('upload_form', $error);
            } else {
                $data = array('upload_data' => $this->upload->data());

                // echo "<pre>";
                // print_r($data);
                // echo $data['upload_data']['file_name'];

                $fileurl = "./uploads/".$data['upload_data']['file_name'];
                $blog_title = $_POST['blog_title'];
                $blog_desc = $_POST['blog_desc'];

                $q = $this->db->query("INSERT INTO `articles`(`blog_title`, `blog_desc`, `blog_img`) VALUES ('$blog_title','$blog_desc','$fileurl')");


                if($q){
                    $this->session->set_flashdata('inserted', 'yes');
                    redirect('admin/blog/addblog');
                }else{
                    $this->session->set_flashdata('inserted', 'no');
                    redirect('admin/blog/addblog');
                }

                // $this->load->view('upload_success', $data);
            }
        } else {
            // Image is not passed for Upload
        }
    }
}
