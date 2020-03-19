<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller {

    public function __construct() {

        parent::__construct();

        //Load helpers
        $this->load->helper('url');
        $this->load->helper('html');
    }
}