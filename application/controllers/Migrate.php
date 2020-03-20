<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migrate extends CI_Controller {

    public function index() {

        //Load the migration library to help us migrate
        $this->load->library('migration');

        //If current migration version is also the migration version in the DB, then do not migrate
        if($this->migration->current() === FALSE) {

            show_error($this->migration->error_string());
        }
    }
}