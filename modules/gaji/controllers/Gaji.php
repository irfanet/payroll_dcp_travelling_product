<?php

(defined('BASEPATH')) or exit('No direct script access allowed');

class Gaji extends MY_Controller
{

	private $filename = "Data_gaji";

	function __construct()
	{
		parent::__construct();
		$this->load->model('gaji_model');
		if ($this->session->userdata('id_user') != TRUE) {
			redirect('auth');
		}
	}

	function index()
	{
		$this->load->template('gaji');
	}
	function hitung_gaji()
	{

		$periode = $this->db->select('*')->order_by('id_kalender', "desc")->limit(1)->get('kalender')->row_array();
		$tgl_mulai = $periode['tgl_mulai'];
		$tgl_selesai = $periode['tgl_selesai'];
		$hasil = $this->gaji_model->get_absen_by_periode($tgl_mulai, $tgl_selesai);
		echo json_encode($hasil);


		// $pegawai = $this->db->get('pegawai')->result_array();
		// $absen = $this->db->get('absen')->result_array();
		// foreach($pegawai as $p){
		// 	$npp = $p['NPP'];
		// 	$this->gaji_model->get_absen_by_npp($npp);
		// 	}
		// }

	}

	function get_data()
	{
		$data = $this->gaji_model->data_list();
		echo json_encode($data);
	}

	function simpan_data()
	{
		$data = array('success' => false, 'messages' => array());
		$this->form_validation->set_rules(
			'NPP',
			'NPP',
			'required|trim|strip_tags|is_unique[pegawai.NPP]',
			[
				'is_unique' => 'NPP tidak boleh sama!'
			]
		);
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim|strip_tags');
		$this->form_validation->set_rules('sex', 'Sex', 'required|trim|strip_tags');
		$this->form_validation->set_rules('id_status', 'ID Status', 'required|trim|strip_tags');
		$this->form_validation->set_rules('kode_bagian', 'Kode Bagian', 'required|trim|strip_tags');
		$this->form_validation->set_rules('kode_divisi', 'Kode Divisi', 'required|trim|strip_tags');
		$this->form_validation->set_rules('kode_jabatan', 'Kode Jabatan', 'required|trim|strip_tags');
		$this->form_validation->set_rules('tgl_masuk', 'Tanggal Masuk', 'required|trim|strip_tags');
		$this->form_validation->set_rules('tgl_keluar', 'Tanggal Keluar', 'required|trim|strip_tags');
		$this->form_validation->set_rules('tgl_kontrak', 'Tanggal Kontrak', 'required|trim|strip_tags');
		$this->form_validation->set_rules('norek', 'Norek', 'required|trim|strip_tags');
		$this->form_validation->set_rules('gapok', 'Gapok', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('tunjangan_tetap', 'Tunjangan Tetap', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('tunjangan_tidak_tetap', 'Tunjangan Tidak Tetap', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('tunjangan_pss', 'Tunjangan PSS', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('potongan_lain', 'Potongan Lain', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('bpjs', 'BPJS', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('bonus', 'Bonus', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('target', 'Target', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('potongan_target', 'Potongan Target', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('dapat_lain', 'Dapat Lain', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run() == FALSE) {
			foreach ($_POST as $key => $value) {
				$data['messages'][$key] = form_error($key);
			}
		} else {
			$data['success'] = true;
			$this->gaji_model->simpan_data();
		}
		echo json_encode($data);
	}

	function hapus_data()
	{
		$kode = $this->input->post('kode');
		$data = $this->gaji_model->hapus_data($kode);
		echo json_encode($data);
	}
}