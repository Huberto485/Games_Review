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

    public function login(){

        $this->form_validation->set_rules('username', 'Username', 'required|max_length[50]');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[50]');

        if ($this->form_validation->run() == TRUE) {

            $username = $_POST['username'];
            $password = md5($_POST['password']);

            $this->db->select('*');
            $this->db->from('users');
            $this->db->where(array('username' => $username, 'password' => $password));
            $query = $this->db->get();

            $user = $query->row();

            if ($user->username) {
                
                $this->session->set_flashdata("success", "You are logged in");

                $_SESSION['user_logged'] = TRUE;
                $_SESSION['username'] = $user->username;
                redirect("profile");
            } 
            else {

                $this->session->set_flashdata("error", "Information entered does not match any record");
                redirect("login", "refresh");
            }
        }

        $this->load->view('login');
    }


    public function logout() {

        session_destroy();
        redirect(base_url() . "index.php");
    }

    public function register() {
        
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