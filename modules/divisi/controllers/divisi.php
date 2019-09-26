<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Description of site
 *
 * @author https://www.roytuts.com
 */
class divisi extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $data['divisi'] = $this->db->get('divisi')->result_array();
        $this->load->template('divisi', $data);
    }

}

/* End of file Site.php */
/* Location: ./application/modules/site/controllers/site.php */