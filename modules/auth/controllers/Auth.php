<?php

(defined('BASEPATH')) or exit('No direct script access allowed');

class Auth extends MY_Controller{

    function __construct()
    {
        parent::__construct();
		// $this->load->model('divisi_model');
    }

    function index()
    {
        $this->load->view('login');
    }
}