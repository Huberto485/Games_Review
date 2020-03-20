<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    //Construct the controller
    public function __construct() {

        parent::__construct();
        
        //Load the helpers
        $this->load->helper('url');
        $this->load->helper('html');

        //Load authorisation model
        $this->load->model('Auth_model');
        
        //Load libraries
        $this->load->library('session');
    }

    //When user submits a form in the login screen, run this function
    public function login(){

        //Check validity of the form
        $this->form_validation->set_rules('username', 'Username', 'required|max_length[50]');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[50]');

        //If valid, move on
        if ($this->form_validation->run() == TRUE) {

            //Get the data from the from
            $username = $_POST['username'];
            $password = md5($_POST['password']);

            //Use the form credentials to get the right user record
            $UserDetails = $this->Auth_model->getLoginCredentials($username, $password);

            //Assign the returned data to a user instance
            foreach($UserDetails as $user) {

                //If a username is present, move on
                if ($user->username) {
                    
                    //Set a one-time success message on session called Success
                    $this->session->set_flashdata("success", "You are logged in");

                    //Initiate User_logged session
                    $_SESSION['user_logged'] = TRUE;

                    //Set the Username session to contain current user's username
                    $_SESSION['username'] = $user->username;

                    //Take the user to their profile
                    redirect("profile");
                }
                //Else display a message
                else {

                    //Display a one-time error message on page refresh
                    $this->session->set_flashdata("error", "Information entered does not match any record");

                    //Refresh the page
                    redirect("login", "refresh");
                }
            }
        }

        //Load the Login view
        $this->load->view('login');
    }

    //Execute this function when user clicks logout on the nav bar
    public function logout() {

        //Destroy the session and take the user back to the home page
        session_destroy();
        redirect(base_url() . "index.php");
    }

    //When a user submits a register form, run this function
    public function register() {
        
        //Check whether the form is posted again
        if (isset($_POST['register'])) {
            

            ////////////////////////////
            //////// VALIDATION ////////
            ////////////////////////////
            
            //Notice: Field 1 = object ID; Field 2 = Displaye Name; Field 3 = limitations
            $this->form_validation->set_rules('username', 'Username', 'required|min_length[3]|max_length[50]');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[50]');
            $this->form_validation->set_rules('name', 'Name', 'max_length[50]');

            //Check if there are errors in the input data, if none then run
            if ($this->form_validation->run() == TRUE) {
                
                //Data is set into the array
                $data = array(
                    'username'=>$_POST['username'],
                    'password'=>md5($_POST['password']),
                    'name'=>$_POST['name'],
                );
                
                //Send the data to the model
                $this->Auth_model->insertUser($data);

                //Display a success message to the user on success
                $this->session->set_flashdata("success", "Your account has been registered. You can now log into your account!");
                redirect("","refresh");
            }
        }

        //Load the register view
        $this->load->view('register');
    }
}