<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model {

    public function getProfileInfo() {

        $username = $_SESSION['username'];

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $username);

        $query = $this->db->get();

        return $query->result();
    }

    public function setProfileInfo($data, $username) {

        $this->db->where('username', $username);
        $this->db->update('users', $data);
    }
}