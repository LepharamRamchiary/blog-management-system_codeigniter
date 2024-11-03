<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property CI_DB $db
 * @property CI_Upload $upload
 * @property CI_Session $session
 */

class Blog extends CI_Controller
{
    public function index()
    {
        $q = $this->db->query("SELECT * FROM `articles` ORDER BY blogid DESC");
        $data['result'] = $q->result_array();


        $this->load->view('adminpanel/viewblog', $data);
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

                $fileurl = "./uploads/" . $data['upload_data']['file_name'];
                $blog_title = $_POST['blog_title'];
                $blog_desc = $_POST['blog_desc'];

                $q = $this->db->query("INSERT INTO `articles`(`blog_title`, `blog_desc`, `blog_img`) VALUES ('$blog_title','$blog_desc','$fileurl')");


                if ($q) {
                    $this->session->set_flashdata('inserted', 'yes');
                    redirect('admin/blog/addblog');
                } else {
                    $this->session->set_flashdata('inserted', 'no');
                    redirect('admin/blog/addblog');
                }

                // $this->load->view('upload_success', $data);
            }
        } else {
            // Image is not passed for Upload
        }
    }

    function editblog($blog_id)
    {
        print_r($blog_id);
        $query = $this->db->query("SELECT `blog_title`, `blog_desc`, `blog_img`, `status` FROM `articles` WHERE `blogid` = '$blog_id'");
        $data['result'] = $query->result_array();
        $data['blog_id'] = $blog_id;
        $this->load->view('adminpanel/editblog', $data);
    }

    function editblog_post()
    {
        // print_r($_POST);
        // die();
        // print_r($_FILES);
        if ($_FILES['file']['name']) {

            // Updating an image
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

                $filename_location = "./uploads/" . $data['upload_data']['file_name'];

                $blog_title = $_POST['blog_title'];
                $blog_desc = $_POST['blog_desc'];
                $blog_id = $_POST['blog_id'];
                $publish_unpublish = $_POST['publish_unpublish'];

                $q = $this->db->query("UPDATE `articles` SET `blog_title` = '$blog_title', `blog_desc` = '$blog_desc', `blog_img` = '$filename_location', `status` = '$publish_unpublish' WHERE `blogid` = '$blog_id'");

                if ($q) {
                    $this->session->set_flashdata('updated', 'yes');
                    redirect('admin/blog');
                } else {
                    $this->session->set_flashdata('updated', 'no');
                    redirect('admin/blog');
                }
            }
        } else {
            // die("Updated without file");
            $blog_title = $_POST['blog_title'];
                $blog_desc = $_POST['blog_desc'];
                $blog_id = $_POST['blog_id'];
                $publish_unpublish = $_POST['publish_unpublish'];

                $q = $this->db->query("UPDATE `articles` SET `blog_title` = '$blog_title', `blog_desc` = '$blog_desc', `status` = '$publish_unpublish' WHERE `blogid` = '$blog_id'");

                if ($q) {
                    $this->session->set_flashdata('updated', 'yes');
                    redirect('admin/blog');
                } else {
                    $this->session->set_flashdata('updated', 'no');
                    redirect('admin/blog');
                }
        }
    }

    function deleteblog()
    {
        // print_r($_POST);

        $delete_id = $_POST['delete_id'];

        $q = $this->db->query("DELETE FROM `articles` WHERE `blogid` = '$delete_id' ");

        if ($q) {
            echo "Deleted";
        } else {
            echo "Not-Deleted";
        }
    }
}
