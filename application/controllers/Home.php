<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	//Construct the controller function
	public function __construct(){

		parent::__construct();

		//Load helpers
		$this->load->helper('html');
		$this->load->helper('url');	

		//Load the Home model
		$this->load->model('Home_model');
	}
	
	//When landing on page, display all reviews, starting with latest
	public function index() {
		
		//Get all the data from the reviews table
		$data['Reviews'] = $this->Home_model->getAllReviews();

		//Send the data to the view
		$this->load->view('home', $data);
	}

	//This function searches for all rewviews that have a name similar to the input value
	public function getReview() {

		//Get the name of the review from user input
		$reviewName = $this->input->post('reviewName');

		//Load all the reviews into the array
		$data['Review'] = $this->Home_model->getReviews($reviewName);

		//Send the data to the view to display it
		$this->load->view('home', $data);
	}
}