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

    //Display user profile data when accessed
    public function index() {

        //Fetch user info through the model
        $data['UserDetails'] = $this->User_model->getProfileInfo();

        //Send the data to the view
        $this->load->view('profile', $data);
    }

    //When user makes changes to their profile, run this function
    public function updateProfile() {

        //Check the validity of the input data
        $this->form_validation->set_rules('username', 'Username', 'required|max_length[50]');
        $this->form_validation->set_rules('name', 'Name', 'required|max_length[50]');

        //If valid, move on
        if ($this->form_validation->run() == TRUE) {

            //Set the username to current user's username
            $username = $_SESSION['username'];

            //Set the data received into an array
            $data = array(
                'username'=> $this->input->post('username'),
                'name'=> $this->input->post('name')
            );

            //Use the model to update the info of the current user
            $this->User_model->setProfileInfo($data, $username);

            //Update the username session with user's new username
            $_SESSION['username'] = $this->input->post('username');

            //Display a one-time success message on profile update success
            $this->session->set_flashdata("success", "Your profile has been updated!");
            redirect(base_url() . "index.php/profile");
        }
        else {

            //Display a one-time error message on user update failure
            $this->session->set_flashdata("error", "Some information in your profile is not valid!");
            redirect(base_url() . "index.php/profile");
        }
    }
}