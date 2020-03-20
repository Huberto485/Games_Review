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

    public function addComment() {

        $this->form_validation->set_rules('comment_text', 'Comment Text', 'required|min_length[1]|max_length[200]');

        $reviewId = $this->input->post('review_id');

        //Run the validation and check whether all the tests pass
        if($this->form_validation->run() == TRUE) {

            $username = 'Anonymous';

            if(isset($_SESSION['username'])){

                $username = $_SESSION['username'];
            }

            $data = array(
                'FK_comment_review' => $reviewId,
                'FK_comment_username' => $username,
                'comment_text' => $this->input->post('comment_text')
            );

            $this->Comment_model->insertComment($data);

            $this->session->set_flashdata("success", "Your comment has been posted!");
            redirect(base_url() . "index.php/review/" . $reviewId);
        }
        else {

            $this->session->set_flashdata("error", "Can't post an empty comment!");
            redirect(base_url() . "index.php/review/" . $reviewId);
        }
    }
}