<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review_model extends CI_Model {
    
    public function getUserDetails($username) {

        //Prepare query statement
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $username);

        //Execute the query
        $query = $this->db->get();

        //Return the data that was fetched
        return $query->result();
    }

    public function getReview($reviewId) {

        //Prepare a query
        $this->db->select('*');
        $this->db->from('reviews');
        $this->db->where('review_id', $reviewId);
        $this->db->join('users', 'users.user_id = reviews.FK_review_username');

        //Execute the query
        $query = $this->db->get();

        //Return the record that was fetched
        return $query->result();
    }

    public function insertReview($data) {

        //Insert the data of a review into a tuple
        $this->db->insert('reviews', $data);
    }
}