<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review_model extends CI_Model {
    
    public function getUserDetails($username) {

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $username);

        $query = $this->db->get();

        return $query->result();
    }

    public function insertReview($data) {

        //Insert the data of a review into a tuple
        $this->db->insert('reviews', $data);
    }
}