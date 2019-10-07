<?php

(defined('BASEPATH')) or exit('No direct script access allowed');

class Pegawai extends MY_Controller
{

	private $filename = "Data_pegawai";

	function __construct()
	{
		parent::__construct();
		$this->load->model('pegawai_model');
		if ($this->session->userdata('id_user') != TRUE) {
			redirect('auth');
		}
	}

	function index()
	{
		$this->load->template('pegawai');
	}

	function get_data()
	{
		$data = $this->pegawai_model->data_list();
		echo json_encode($data);
	}

	function get_line()
	{
		$data = $this->pegawai_model->data_line();
		echo json_encode($data);
	}

	function get_departemen()
	{
		$data = $this->pegawai_model->data_departemen();
		echo json_encode($data);
	}

	function get_jabatan()
	{
		$data = $this->pegawai_model->data_jabatan();
		echo json_encode($data);
	}

	function get_kode()
	{
		$kode = $this->input->get('id');
		$data = $this->pegawai_model->get_data_by_kode($kode);
		echo json_encode($data);
	}

	function simpan_data()
	{
		$data = array('success' => false, 'messages' => array());
		$this->form_validation->set_rules(
			'nik',
			'NIK',
			'required|trim|strip_tags|is_unique[pegawai.nik]',
			[
				'is_unique' => 'NIK tidak boleh sama!'
			]
		);
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim|strip_tags');
		$this->form_validation->set_rules('kd_line', 'Kode Bagian', 'required|trim|strip_tags');
		$this->form_validation->set_rules('kd_departemen', 'Kode Departemen', 'required|trim|strip_tags');
		$this->form_validation->set_rules('kd_jabatan', 'Kode Jabatan', 'required|trim|strip_tags');
		$this->form_validation->set_rules('norek', 'Norek', 'trim|strip_tags');
		$this->form_validation->set_rules('gaji_pokok', 'Gapok', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('tunj_jabatan', 'Tunjangan Jabatan', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('tunj_kinerja', 'Tunjangan Kinerja', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('bonus', 'Bonus', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('insentif', 'Insentif', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('pph21', 'PPH 21', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run() == FALSE) {
			foreach ($_POST as $key => $value) {
				$data['messages'][$key] = form_error($key);
			}
		} else {
			$data['success'] = true;
			$this->pegawai_model->simpan_data();
		}
		echo json_encode($data);
	}

	function update_data()
	{
		$data = array('success' => false, 'messages' => array());
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim|strip_tags');
		$this->form_validation->set_rules('kd_line', 'Kode Bagian', 'required|trim|strip_tags');
		$this->form_validation->set_rules('kd_departemen', 'Kode Departemen', 'required|trim|strip_tags');
		$this->form_validation->set_rules('kd_jabatan', 'Kode Jabatan', 'required|trim|strip_tags');
		$this->form_validation->set_rules('norek', 'Norek', 'trim|strip_tags');
		$this->form_validation->set_rules('gaji_pokok', 'Gapok', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('tunj_jabatan', 'Tunjangan Jabatan', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('tunj_kinerja', 'Tunjangan Kinerja', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('bonus', 'Bonus', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('insentif', 'Insentif', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('pph21', 'PPH 21', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run() == FALSE) {
			foreach ($_POST as $key => $value) {
				$data['messages'][$key] = form_error($key);
			}
		} else {
			$data['success'] = true;
			$this->pegawai_model->update_data();
		}
		echo json_encode($data);
	}

	function hapus_data()
	{
		$kode = $this->input->post('kode');
		$data = $this->pegawai_model->hapus_data($kode);
		echo json_encode($data);
	}

	function form_upload()
	{
		$this->load->view('import');
	}

	function import_excel()
	{
		error_reporting(E_ALL ^ E_NOTICE);
		include APPPATH . 'third_party/PHPExcel/PHPExcel.php';
		$upload = $this->pegawai_model->upload_file($this->filename);
		if ($upload['result'] == 'failed') {
			$data['upload_error'] = $upload['error'];
		}
		$sql = "DELETE FROM pegawai";
		$this->db->query($sql);

		$excelreader =  new PHPExcel_Reader_Excel5();
		$loadexcel = $excelreader->load('upload/excel/' . $this->filename . '.xls');
		$sheet = $loadexcel->getActiveSheet()->getRowIterator();

		$data = array();

		$numrow = 0;
		foreach ($sheet as $row) {
			if ($numrow > 0) {
				$cellIterator = $row->getCellIterator();
				$cellIterator->setIterateOnlyExistingCells(false);

				$get = array();
				foreach ($cellIterator as $cell) {
					array_push($get, $cell->getValue());
				}
				array_push($data, array(
					'nik' => $get[1],
					'nama' => $get[2],
					'kd_departemen' => $get[3],
					'kd_jabatan' => $get[4],
					'kd_line' => $get[5],
					'gaji_pokok' => $get[6],
					'tunj_jabatan' => $get[7],
					'tunj_kinerja' => $get[8],
					'bonus' => $get[9],
					'insentif' => $get[10],
					'pph21' => $get[11],
					'norek' => $get[12]
				));
			}

			$numrow++;
		}

		$this->pegawai_model->insert_multiple($data);
		$this->session->set_flashdata('flash', 'Pegawai Berhasil ditambahkan');
		redirect("pegawai");
	}

	//pegawai non aktif
	function index_non_aktif()
	{
		$this->load->template('pegawai_non_aktif');
	}

	function get_data_non_aktif()
	{
		$data = $this->pegawai_model->data_list_non_aktif();
		echo json_encode($data);
	}

	function aktifkan_pegawai()
	{
		$kode = $this->input->post('kode');
		$data = $this->pegawai_model->aktifkan_pegawai($kode);
		echo json_encode($data);
	}

	function non_aktifkan_pegawai()
	{
		$kode = $this->input->post('kode');
		$data = $this->pegawai_model->non_aktifkan_pegawai($kode);
		echo json_encode($data);
	}
}
