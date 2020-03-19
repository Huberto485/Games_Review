<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review extends CI_Controller {

    public function __construct() {

        parent::__construct();

        //Load helpers
        $this->load->helper('url');
        $this->load->helper('html');   
        
        //Load the models
        $this->load->model('Review_model');
        $this->load->model('Comment_model');
    }

    public function loadReview() {

        $reviewId = $this->uri->segment(2,0);
        
        $data['ReviewData'] = $this->Review_model->getReview($reviewId);

        $data['CommentData'] = $this->Comment_model->loadComments($reviewId);

        $this->load->view('review', $data);
    }

    //Function called when a user first visits the './create_review' page
    public function createReviewIndex() {

        $this->load->view('create_review');
    }

    //Function called when a user submits a form on the './create_review' page
    public function createReview() {

        //Check if username is present and if user tried to send their review
        if(isset($_SESSION['username']) && $_POST['createReview']) {

            //Set validation for the fields of the 'createReview' form
            //FIELD 1: id of the form box; FIELD 2: name displayed in the error; FIELD 3: limits of the field
            $this->form_validation->set_rules('title', 'Title', 'required|min_length[5]|max_length[50]');
            $this->form_validation->set_rules('image', 'Image', 'required|max_length[100]');
            $this->form_validation->set_rules('review', 'Review', 'required|max_length[1000]');

            //Run the validation and check whether all the tests pass
            if ($this->form_validation->run() == TRUE) {

                //Session 'username' is already checked for presence, therefore we can use it to get id of the user
                $username = $_SESSION['username'];

                //Initiate user ID variable
                $userId = "1";

                //Get all user information for a particular user
                $userDetails = $this->Review_model->getUserDetails($username);

                //Extract the user ID from the record
                foreach($userDetails as $details) {
                    $userId = $details->user_id;
                }

                //Insert all the needed data to fill out a review tuple into an array
                $data = array(
                    'FK_review_username' => $userId,
                    'title' => $_POST['title'],
                    'image' => $_POST['image'],
                    'review_text' => $_POST['review']
                );

                //Send the array to the model
                $this->Review_model->insertReview($data);

                //Show a message informing the user for clarity
                $this->session->set_flashdata("success","Your game review has been posted!");
            }
        }
        else {
            
            //Show a message informing the user for clarity
            $this->session->set_flashdata("error", "You must be logged in to write a review!");
        }
        
        //Send data to the view
        $this->load->view('create_review');
    }
}