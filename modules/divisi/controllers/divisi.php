<?php

(defined('BASEPATH')) or exit('No direct script access allowed');

class Divisi extends MY_Controller{

    function __construct()
    {
        parent::__construct();
		$this->load->model('divisi_model');
    }

    function index()
    {
        $this->load->template('divisi');
    }

    function get_data(){
		$data=$this->divisi_model->data_list();
		echo json_encode($data);
	}

	function get_kode(){
		$kode=$this->input->get('id');
		$data=$this->divisi_model->get_data_by_kode($kode);
		echo json_encode($data);
	}

	function simpan_data(){
		$data = array ('success' => false, 'messages' => array());
		$this->form_validation->set_rules('kode_divisi','Kode Divisi', 'required|trim|strip_tags|is_unique[divisi.kode_divisi]'
		,[
            'is_unique' => 'Kode Divisi telah digunakan!'
        ]);
		$this->form_validation->set_rules('nama_divisi','Nama Divisi', 'required|trim|strip_tags');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run() == FALSE) {
			foreach ($_POST as $key => $value) {
				$data['messages'][$key] = form_error($key);
			}   
		}else{
			$data['success'] = true;
			$this->divisi_model->simpan_data();	
		}
		echo json_encode($data);
	}

	function update_data(){
		$data = array ('success' => false, 'messages' => array());
		$this->form_validation->set_rules('kode_divisi','Kode Divisi', 'required|trim|strip_tags');
		$this->form_validation->set_rules('nama_divisi','Nama Divisi', 'required|trim|strip_tags');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run() == FALSE) {
			foreach ($_POST as $key => $value) {
				$data['messages'][$key] = form_error($key);
			}   
		}else{
			$data['success'] = true;
			$this->divisi_model->update_data();	
		}
		echo json_encode($data);
	}

	function hapus_data(){
		$kode=$this->input->post('kode');
		$data=$this->divisi_model->hapus_data($kode);
		echo json_encode($data);
	}
}

