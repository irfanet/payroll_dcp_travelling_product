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
        $this->load->library('form_validation');
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
        $this->form_validation->set_rules('nama_divisi', 'Nama Divisi', 'required');
        if ($this->form_validation->run() == TRUE) {
            $this->divisiModel->editDivisi($kode_divisi);
        }
        redirect("divisi");
    }

    function addDivisi()
    {
        $this->form_validation->set_rules('nama_divisi', 'Nama Divisi', 'required');
        $this->form_validation->set_rules('kode_divisi', 'Kode Divisi', 'required');
        if ($this->form_validation->run() == TRUE) {
            $this->divisiModel->addDivisi();
        }
        redirect("divisi");
    }
}

/* End of file Site.php */
/* Location: ./application/modules/site/controllers/site.php */
