<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    //On login, this function checks whether there record matching entered username and password
    public function getLoginCredentials($username, $password) {

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $username);
        $this->db->where('password', $password);

        $query = $this->db->get();

        return $query->result();
    }

    //Function enters data of a new user into the system
    public function insertUser($data) {

        $this->db->insert('users', $data);
    }
}