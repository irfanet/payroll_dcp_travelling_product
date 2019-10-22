<?php

(defined('BASEPATH')) or exit('No direct script access allowed');

class Honor_lembur extends MY_Controller{

    function __construct()
    {
        parent::__construct();
		$this->load->model('honor_lembur_model');
		if($this->session->userdata('id_user') != TRUE){
            redirect('auth');
        }
    }

    function index()
    {
        $this->load->view('honor_lembur');
    }

    function get_data(){
		$data=$this->honor_lembur_model->data_list();
		echo json_encode($data);
	}

	function get_kode(){
		$kode=$this->input->get('id');
		$data=$this->honor_lembur_model->get_data_by_kode($kode);
		echo json_encode($data);
	}

	function update_data(){
		$data = array ('success' => false, 'messages' => array());
		$this->form_validation->set_rules('honor', 'Honor Lembur', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run() == FALSE) {
			foreach ($_POST as $key => $value) {
				$data['messages'][$key] = form_error($key);
			}   
		}else{
			$data['success'] = true;
			$this->honor_lembur_model->update_data();	
		}
		echo json_encode($data);
	}
}

