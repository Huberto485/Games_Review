<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment_model extends CI_Model {

    public function loadComments($reviewId) {

        $this->db->select('*');
        $this->db->from('comments');
        $this->db->where('FK_comment_review', $reviewId);
        $this->db->order_by('comment_id', 'DESC');

        $query = $this->db->get();

        return $query->result();
    }

    public function insertComment($data) {

        //Insert the comment into the comments table
        $this->db->insert('comments', $data);
    }
}