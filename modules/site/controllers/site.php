<?php

(defined('BASEPATH')) or exit('No direct script access allowed');

/**
 * Description of site
 *
 * @author https://www.roytuts.com
 */
class Site extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->load->library('Pdf');
        $this->load->view('download_pdf');      
    }
}

/* End of file Site.php */
/* Location: ./application/modules/site/controllers/site.php */
