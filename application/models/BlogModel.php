<?php
class BlogModel extends CI_Model
{
    function fetch_all_blog()
    {
        $result = $this->db->query(" SELECT `blogid`, `blog_title`, `blog_desc`, `blog_img`, `status`, `created_on`, `updated` FROM `articles` WHERE status = '1' ");

        return $result->result_array();
    }

    function fetch_blog_detail($blog_id)
    {
        $result = $this->db->query(" SELECT `blogid`, `blog_title`, `blog_desc`, `blog_img`, `status`, `created_on`, `updated` FROM `articles` WHERE blogid = '$blog_id' ");

        return $result->result_array();
    }
}
