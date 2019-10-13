<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pegawai_model extends CI_Model
{

	private $_table = "pegawai";

	function __construct()
	{
		parent::__construct();
	}

	function data_list()
	{
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('departemen', 'departemen.kd_departemen = pegawai.kd_departemen');
		$this->db->join('jabatan', 'jabatan.kd_jabatan = pegawai.kd_jabatan');
		$this->db->join('line', 'line.kd_line = pegawai.kd_line');
		$this->db->where('is_active', '1');
		$hasil = $this->db->get();
		return $hasil->result_array();
	}
	function data_list_temp()
	{
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->where('is_active', '1');
		$hasil = $this->db->get();
		return $hasil->result_array();
	}

	function data_line()
	{
		$this->db->select('*');
		$this->db->from('line');
		$hasil = $this->db->get();
		return $hasil->result();
	}

	function data_departemen()
	{
		$this->db->select('*');
		$this->db->from('departemen');
		$hasil = $this->db->get();
		return $hasil->result();
	}

	function data_jabatan()
	{
		$this->db->select('*');
		$this->db->from('jabatan');
		$hasil = $this->db->get();
		return $hasil->result();
	}

	function simpan_data()
	{
		$data = array(
			'nik' => $this->input->post('nik'),
			'nama' => $this->input->post('nama'),
			'kd_departemen' => $this->input->post('kd_departemen'),
			'kd_jabatan' => $this->input->post('kd_jabatan'),
			'kd_line' => $this->input->post('kd_line'),
			'gaji_pokok' => $this->input->post('gaji_pokok'),
			'tunj_jabatan' => $this->input->post('tunj_jabatan'),
			'tunj_kinerja' => $this->input->post('tunj_kinerja'),
			'bonus' => $this->input->post('bonus'),
			'insentif' => $this->input->post('insentif'),
			'pph21' => $this->input->post('pph21'),
			'norek' => $this->input->post('norek')
		);
		$hasil = $this->db->insert($this->_table, $data);
		return $hasil;
	}

	function get_data_by_kode($kode)
	{
		$this->db->select('*');
		$hasil = $this->db->get_where($this->_table, array('nik' => $kode))->row_array();
		return $hasil;
	}

	function update_data()
	{
		$nik = $this->input->post('nik');
		$data = array(
			'nama' => $this->input->post('nama'),
			'kd_departemen' => $this->input->post('kd_departemen'),
			'kd_jabatan' => $this->input->post('kd_jabatan'),
			'kd_line' => $this->input->post('kd_line'),
			'gaji_pokok' => $this->input->post('gaji_pokok'),
			'tunj_jabatan' => $this->input->post('tunj_jabatan'),
			'tunj_kinerja' => $this->input->post('tunj_kinerja'),
			'bonus' => $this->input->post('bonus'),
			'insentif' => $this->input->post('insentif'),
			'pph21' => $this->input->post('pph21'),
			'norek' => $this->input->post('norek')
		);
		$this->db->where('nik', $nik);
		$hasil = $this->db->update($this->_table, $data);
		return $hasil;
	}

	function hapus_data($kode)
	{
		$this->db->where('nik', $kode);
		$hasil = $this->db->delete($this->_table);
		return $hasil;
	}

	public function non_aktifkan_pegawai($kode){
		$data = array(
			'is_active' => '0'
		);
		$this->db->where('nik', $kode);
		$hasil = $this->db->update($this->_table, $data);
		return $hasil;
	}

	public function upload_file($filename){
		$this->load->library('upload'); 
		
		$config['upload_path'] = './upload/excel/';
		$config['allowed_types'] = 'xlsx';
		$config['max_size']  = '2048';
		$config['overwrite'] = true;
		$config['file_name'] = $filename;
	
		$this->upload->initialize($config); 
		if($this->upload->do_upload('file')){ 
		$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
		return $return;
		}else{
		$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
		return $return;
		}
	}
  
	public function insert_multiple($data){
	   $this->db->insert_batch($this->_table, $data);
	}

	//pegawai non aktif

	public function aktifkan_pegawai($kode){
		$data = array(
			'is_active' => '1'
		);
		$this->db->where('nik', $kode);
		$hasil = $this->db->update($this->_table, $data);
		return $hasil;
	}

	function data_list_non_aktif()
	{
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('departemen', 'departemen.kd_departemen = pegawai.kd_departemen');
		$this->db->join('jabatan', 'jabatan.kd_jabatan = pegawai.kd_jabatan');
		$this->db->join('line', 'line.kd_line = pegawai.kd_line');
		$this->db->where('is_active', '0');
		$hasil = $this->db->get();
		return $hasil->result();
	}

	function jumlah_non_aktif()
	{
		$this->db->select("COUNT(nik) as jumlah");
		$this->db->from('pegawai');
		$this->db->where('is_active', '0');
		$hasil = $this->db->get();
		return $hasil->result();
	}
}
