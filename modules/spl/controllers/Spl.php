<?php

(defined('BASEPATH')) or exit('No direct script access allowed');

class Spl extends MY_Controller{

    function __construct()
    {
        parent::__construct();
		$this->load->model('spl_model');
		if($this->session->userdata('id_user') != TRUE){
            redirect('auth');
        }
    }

    function index()
    {
        $this->load->view('spl_new');
    }

    function get_data(){
		$data=$this->spl_model->data_list();
		echo json_encode($data);
	}

	function get_kode(){
		$kode=$this->input->get('id');
		$data=$this->spl_model->get_data_by_kode($kode);
		echo json_encode($data);
	}

	function simpan_data(){
		$data = array ('success' => false, 'messages' => array());
		// $this->form_validation->set_rules('id_absensi_nik','id_absensi_nik', 'required|callback_check_default');
		$this->form_validation->set_rules('lembur','Jumlah Jam Lembur', 'required|numeric|trim|strip_tags');
		// $this->form_validation->set_rules('keterangan','Keterangan', 'required|trim|strip_tags');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run() == FALSE) {
			foreach ($_POST as $key => $value) {
				$data['messages'][$key] = form_error($key);
			}   
		}else{
			$data['success'] = true;
			$this->spl_model->tambah_spl();	
		}
		echo json_encode($data);
	}

	function update_data(){
		$data = array ('success' => false, 'messages' => array());
		$this->form_validation->set_rules('lembur','Lembur', 'required|trim|strip_tags');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run() == FALSE) {
			foreach ($_POST as $key => $value) {
				$data['messages'][$key] = form_error($key);
			}   
		}else{
			$data['success'] = true;
			$this->spl_model->update_data();	
		}
		echo json_encode($data);
	}

	function hapus_data(){
		$kode=$this->input->post('kode');
		$data=$this->spl_model->hapus_data($kode);
		echo json_encode($data);
	}

	function get_nik(){
		$data=$this->spl_model->get_nik();
		echo json_encode($data);
	}
	function get_tgl(){
		$data=$this->spl_model->get_tgl_terbaru();
		echo json_encode($data);
	}
}

