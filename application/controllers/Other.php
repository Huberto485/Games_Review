<?php

class Other extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->helper('html');
		$this->load->helper('url');
    }

    public function about() {

        $this->load->view('about');
    }
}