<?php

(defined('BASEPATH')) or exit('No direct script access allowed');

class Kalender extends MY_Controller{

    function __construct()
    {
        parent::__construct();
		$this->load->model('kalender_model');
		if($this->session->userdata('id_user') != TRUE){
            redirect('auth');
        }
    }

    function index()
    {
        $this->load->template('kalender');
    }

    function get_data(){
		$data=$this->kalender_model->data_list();
		echo json_encode($data);
	}

    function get_table(){
		$periode = $this->db->select('*')->order_by('id_periode', "desc")->limit(1)->get('kalender')->row_array();
		$tglStart=$periode['tgl_mulai'];
		$tglEnd=$periode['tgl_selesai'];
		$data=$this->kalender_model->data_list_detail($tglStart, $tglEnd);
		echo json_encode($data);
	}

	function get_kode(){
		$kode=$this->input->get('id');
		$data=$this->kalender_model->get_data_by_kode($kode);
		echo json_encode($data);
	}

	function get_jumlah(){
		$data=$this->kalender_model->jumlah();
		echo json_encode($data);
	}

	function atur_periode(){
		$data = array ('success' => false, 'messages' => array());
		$this->form_validation->set_rules('kd_periode','Judul Periode', 'required|trim|strip_tags');
		$this->form_validation->set_rules('tgl_mulai','Tanggal Mulai', 'required|trim|strip_tags');
		$this->form_validation->set_rules('tgl_selesai','Tanggal Selesai', 'required|trim|strip_tags');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run() == FALSE) {
			foreach ($_POST as $key => $value) {
				$data['messages'][$key] = form_error($key);
			}   
		}else{
			$data['success'] = true;
			$this->kalender_model->simpan_data();
		}
		echo json_encode($data);
	}

	function update_data(){
		$data = array ('success' => false, 'messages' => array());
		$this->form_validation->set_rules('tgl', 'Tanggal', 'required|trim|strip_tags');
		$this->form_validation->set_rules('status', 'Status', 'required|trim|strip_tags');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run() == FALSE) {
			foreach ($_POST as $key => $value) {
				$data['messages'][$key] = form_error($key);
			}   
		}else{
			$data['success'] = true;
			$this->kalender_model->update_data();	
		}
		echo json_encode($data);
	}
}

