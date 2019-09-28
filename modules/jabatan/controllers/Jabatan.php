<?php

(defined('BASEPATH')) or exit('No direct script access allowed');

/**
 * Description of site
 *
 * @author https://www.roytuts.com
 */
class Jabatan extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Jabatan_model');
        $this->load->library('form_validation');
    }

    function index()
    {
        $data['jabatan'] = $this->Jabatan_model->getJabatan()->result_array();
        $this->load->template('jabatan', $data);
    }

    function deleteJabatan($kode_jabatan)
    {
        $this->Jabatan_model->deleteJabatan($kode_jabatan);
        redirect("Jabatan");
    }

    function editJabatan($kode_jabatan)
    {
        $this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run() == TRUE) {
            $this->Jabatan_model->editJabatan($kode_jabatan);
        }
        redirect("Jabatan");
    }

    function addJabatan()
    {
        $this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required');
        $this->form_validation->set_rules('kode_jabatan', 'Kode Jabatan', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run() == TRUE) {
            $this->Jabatan_model->addJabatan();
        }
        redirect("Jabatan");
    }
}

/* End of file Site.php */
/* Location: ./application/modules/site/controllers/site.php */
