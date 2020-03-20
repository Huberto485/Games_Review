<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment_model extends CI_Model {

    public function loadComments($reviewId) {

        //Prepare a statement to run
        $this->db->select('*');
        $this->db->from('comments');
        $this->db->where('FK_comment_review', $reviewId);
        $this->db->order_by('comment_id', 'DESC');

        //Run the query
        $query = $this->db->get();

        //Return the query result
        return $query->result();
    }

    public function insertComment($data) {

        //Insert the comment into the comments table
        $this->db->insert('comments', $data);
    }
}