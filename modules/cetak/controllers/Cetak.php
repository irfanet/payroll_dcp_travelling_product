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
		$this->load->view('absensi');
	}
}
