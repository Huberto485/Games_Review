<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

    //Construct the model
    public function __construct() {

        parent::__construct();
    }

    //Function to get all the reviews from the database
    public function getAllReviews() {

        //Construct a SELECT statement AND sort by latest review
        $this->db->select('*');
        $this->db->from('reviews');
        $this->db->order_by('review_id','DESC');

        //Run the query
        $query = $this->db->get();

        //Return all the selected results
        return $query->result();
    }

    public function getReviews($name) {

        //Construct a SELECT statement AND get all the reviews that have $name value inside them
        $this->db->select('*');
        $this->db->from('reviews');
        $this->db->like('title', $name);

        //Run the query
        $query = $this->db->get();

        //Return all the selected results with the LIKE statement
        return $query->result();
    }
}