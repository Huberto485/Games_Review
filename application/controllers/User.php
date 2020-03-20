<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {

        parent::__construct();

        //load helpers
        $this->load->helper('url');
        $this->load->helper('html');
        
        //load appropriate model
        $this->load->model('User_model');
    }

    public function index() {

        $data['UserDetails'] = $this->User_model->getProfileInfo();

        $this->load->view('profile', $data);
    }

    public function updateProfile() {
        
        $username = $_SESSION['username'];

        $data = array(
            'username'=> $this->input->post('username'),
            'name'=> $this->input->post('name')
        );

        $this->User_model->setProfileInfo($data, $username);

        $_SESSION['username'] = $this->input->post('username');

        $this->session->set_flashdata("success", "Your profile has been updated!");
        redirect(base_url() . "index.php/profile");
    }
}