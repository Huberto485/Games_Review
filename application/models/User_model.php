<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model {

    public function getProfileInfo() {

        //Use current user's username
        $username = $_SESSION['username'];

        //Prepare a query statement
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $username);

        //Run the statement
        $query = $this->db->get();

        //Return the results
        return $query->result();
    }

    public function setProfileInfo($data, $username) {

        //Update the user information with data received
        $this->db->where('username', $username);
        $this->db->update('users', $data);
    }
}