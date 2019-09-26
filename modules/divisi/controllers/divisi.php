<?php

(defined('BASEPATH')) or exit('No direct script access allowed');

/**
 * Description of site
 *
 * @author https://www.roytuts.com
 */
class divisi extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('divisiModel');
    }

    function index()
    {
        $data['divisi'] = $this->divisiModel->getDivisi()->result_array();
        $this->load->template('divisi', $data);
    }

    function deleteDivisi($kode_divisi)
    {
        $this->divisiModel->deleteDivisi($kode_divisi);
        redirect("divisi");
    }

    function editDivisi($kode_divisi)
    {
        $this->divisiModel->editDivisi($kode_divisi);
        redirect('divisi');
    }

    function addDivisi(){
        $this->divisiModel->addDivisi();
        redirect('divisi');
    }
}

/* End of file Site.php */
/* Location: ./application/modules/site/controllers/site.php */
