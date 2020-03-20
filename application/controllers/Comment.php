<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Comment extends CI_Controller{

    public function __construct() {

        parent::__construct();

        //load helpers
        $this->load->helper('url');
        $this->load->helper('html');

        //Load comment model
        $this->load->model('Comment_model');
    }

    //When a comment form is submitted, run this function
    public function addComment() {

        //Check the validity of the data posted
        $this->form_validation->set_rules('comment_text', 'Comment Text', 'required|min_length[1]|max_length[200]');

        //Get the ID of the review from the form, it will allow us to input
        //the ID of the review into the comment table, so that we can display
        //the right comment, under the right review.
        $reviewId = $this->input->post('review_id');

        //Run the validation and check whether all the tests pass
        if($this->form_validation->run() == TRUE) {

            //If user isn't logged in, set the name to Anonymous
            $username = 'Anonymous';

            //If logged in, then set the userame variable to current Username session data
            if(isset($_SESSION['username'])){

                $username = $_SESSION['username'];
            }

            //Set the data into an array
            $data = array(
                'FK_comment_review' => $reviewId,
                'FK_comment_username' => $username,
                'comment_text' => $this->input->post('comment_text')
            );

            //Send the data to the model to insert it into the database
            $this->Comment_model->insertComment($data);

            //Display a one-time success message when the comment is added
            $this->session->set_flashdata("success", "Your comment has been posted!");
            redirect(base_url() . "index.php/review/" . $reviewId);
        }
        //The form failed to validate
        else {

            //Send a one-time error message
            $this->session->set_flashdata("error", "Can't post an empty comment!");
            redirect(base_url() . "index.php/review/" . $reviewId);
        }
    }
}