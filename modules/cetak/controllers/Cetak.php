<?php

(defined('BASEPATH')) or exit('No direct script access allowed');

class Cetak extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('Pdf');
		$this->load->model('cetak_model');
		if ($this->session->userdata('id_user') != TRUE) {
			redirect('auth');
		}
	}

	function index()
	{
		$this->load->template('cetak');
	}

	function slip_gaji()
	{
		$data['gaji'] = $this->cetak_model->get_slip();
		$this->load->view('slip_gaji', $data);
	}

	function cetak_transfer()
	{
		$data['gaji'] = $this->cetak_model->get_transfer();
		$this->load->view('transfer_bank', $data);
	}

	function rekap_gaji()
	{
		$data['gaji'] = $this->cetak_model->get_rekap();
		$this->load->view('rekap_gaji', $data);
	}

	function absensi()
	{
		$periode = $this->db->select('*')->order_by('id_periode', "desc")->limit(1)->get('kalender')->row_array();
		$data['tgl_mulai'] = $periode['tgl_mulai'];
		$data['tgl_selesai'] = $periode['tgl_selesai'];
		$data['kalender_detail'] = $this->cetak_model->get_kalender_detail();
		$data['absensi'] = $this->cetak_model->get_absensi();
		$data['log_absensi'] = $this->cetak_model->get_log_absensi();
		$data['gaji'] = $this->cetak_model->get_rekap();
		$this->load->view('absensi', $data);
	}
}
