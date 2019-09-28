<?php

(defined('BASEPATH')) or exit('No direct script access allowed');

/**
 * Description of site
 *
 * @author https://www.roytuts.com
 */
class Bagian extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Bagian_model');
        $this->load->library('form_validation');
    }

    function index()
    {
        $data['bagian'] = $this->Bagian_model->getBagian()->result_array();
        $this->load->template('bagian', $data);
    }

    function deleteBagian($kode_bagian)
    {
        $this->Bagian_model->deleteBagian($kode_bagian);
        redirect("Bagian");
    }

    function editBagian($kode_bagian)
    {
        $this->form_validation->set_rules('nama_bagian', 'Nama Bagian', 'required');
        if ($this->form_validation->run() == TRUE) {
            $this->Bagian_model->editBagian($kode_bagian);
        }
        redirect("Bagian");
    }

    function addBagian()
    {
        $this->form_validation->set_rules('nama_bagian', 'Nama Bagian', 'required');
        $this->form_validation->set_rules('kode_bagian', 'Kode Bagian', 'required');
        if ($this->form_validation->run() == TRUE) {
            $this->Bagian_model->addBagian();
        }
        redirect("Bagian");
    }
}

/* End of file Site.php */
/* Location: ./application/modules/site/controllers/site.php */
