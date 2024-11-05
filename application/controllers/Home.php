<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
        $this->load->model('BlogModel', "bm");
        $result=$this->bm->fetch_all_blog();
        // echo "<pre>";
        // print_r($result);
        // die();

        $data['result'] = $result;

		$this->load->view('blog_list_page', $data);
	}

    function blog_detail($blog_id=0)
    {
        
    }
}
