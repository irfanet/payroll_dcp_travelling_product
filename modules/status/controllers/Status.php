<?php

(defined('BASEPATH')) or exit('No direct script access allowed');

/**
 * Description of site
 *
 * @author https://www.roytuts.com
 */
class Status extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Status_model');
        $this->load->library('form_validation');
    }

    function index()
    {
        $data['status'] = $this->Status_model->getStatus()->result_array();
        $this->load->template('status', $data);
    }

    function deleteStatus($id_status)
    {
        $this->Status_model->deleteStatus($id_status);
        redirect("Status");
    }

    function editStatus($id_status)
    {
        $this->form_validation->set_rules('nama_status', 'Nama Status', 'required');
        if ($this->form_validation->run() == TRUE) {
            $this->Status_model->editStatus($id_status);
        }
        redirect("Status");
    }

    function addStatus()
    {
        $this->form_validation->set_rules('nama_status', 'Nama Status', 'required');
        if ($this->form_validation->run() == TRUE) {
            $this->Status_model->addStatus();
        }
        redirect("Status");
    }
}

/* End of file Site.php */
/* Location: ./application/modules/site/controllers/site.php */
