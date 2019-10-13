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
		$this->db->join('bagian', 'bagian.kode_bagian = pegawai.kode_bagian');
		$this->db->join('jabatan', 'jabatan.kode_jabatan = pegawai.kode_jabatan');
		$this->db->join('divisi', 'divisi.kode_divisi = pegawai.kode_divisi');
		$this->db->join('status', 'status.id_status = pegawai.id_status');
		$this->db->where('active_status', '1');
		$hasil = $this->db->get();
		return $hasil->result();
	}

	function jumlah()
	{
		$this->db->select("COUNT(NPP) as jumlah, COUNT(case sex when 'Laki-laki' then 1 else null end) as laki, COUNT(case sex when 'Perempuan' then 1 else null end) as perempuan");
		$this->db->from('pegawai');
		$this->db->where('active_status', '1');
		$hasil = $this->db->get();
		return $hasil->result();
	}

	function data_status()
	{
		$this->db->select('*');
		$this->db->from('status');
		$hasil = $this->db->get();
		return $hasil->result();
	}

	function data_bagian()
	{
		$this->db->select('*');
		$this->db->from('bagian');
		$hasil = $this->db->get();
		return $hasil->result();
	}

	function data_divisi()
	{
		$this->db->select('*');
		$this->db->from('divisi');
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
			'NPP' => $this->input->post('NPP'),
			'nama' => $this->input->post('nama'),
			'sex' => $this->input->post('sex'),
			'id_status' => $this->input->post('id_status'),
			'kode_bagian' => $this->input->post('kode_bagian'),
			'kode_divisi' => $this->input->post('kode_divisi'),
			'kode_jabatan' => $this->input->post('kode_jabatan'),
			'tgl_masuk' => date('Y-m-d', strtotime($this->input->post('tgl_masuk'))),
			'tgl_keluar' => date('Y-m-d', strtotime($this->input->post('tgl_keluar'))),
			'tgl_kontrak' => date('Y-m-d', strtotime($this->input->post('tgl_kontrak'))),
			'norek' => $this->input->post('norek'),
			'gapok' => $this->input->post('gapok'),
			'tunjangan_tetap' => $this->input->post('tunjangan_tetap'),
			'tunjangan_tidak_tetap' => $this->input->post('tunjangan_tidak_tetap'),
			'tunjangan_pss' => $this->input->post('tunjangan_pss'),
			'potongan_lain' => $this->input->post('potongan_lain'),
			'bpjs' => $this->input->post('bpjs'),
			'bonus' => $this->input->post('bonus'),
			'target' => $this->input->post('target'),
			'potongan_target' => $this->input->post('potongan_target'),
			'dapat_lain' => $this->input->post('dapat_lain')
		);
		$hasil = $this->db->insert($this->_table, $data);
		return $hasil;
	}

	function get_data_by_kode($kode)
	{
		$this->db->select('*,
		DATE_FORMAT(pegawai.tgl_masuk, "%d-%m-%Y") as tgl_masuk_format,
		DATE_FORMAT(pegawai.tgl_keluar, "%d-%m-%Y") as tgl_keluar_format,
		DATE_FORMAT(pegawai.tgl_kontrak, "%d-%m-%Y") as tgl_kontrak_format');
		$hasil = $this->db->get_where($this->_table, array('NPP' => $kode))->row_array();
		return $hasil;
	}

	function update_data()
	{
		$NPP = $this->input->post('NPP');
		$data = array(
			'nama' => $this->input->post('nama'),
			'sex' => $this->input->post('sex'),
			'id_status' => $this->input->post('id_status'),
			'kode_bagian' => $this->input->post('kode_bagian'),
			'kode_divisi' => $this->input->post('kode_divisi'),
			'kode_jabatan' => $this->input->post('kode_jabatan'),
			'tgl_masuk' => date('Y-m-d', strtotime($this->input->post('tgl_masuk'))),
			'tgl_keluar' => date('Y-m-d', strtotime($this->input->post('tgl_keluar'))),
			'tgl_kontrak' => date('Y-m-d', strtotime($this->input->post('tgl_kontrak'))),
			'norek' => $this->input->post('norek'),
			'gapok' => $this->input->post('gapok'),
			'tunjangan_tetap' => $this->input->post('tunjangan_tetap'),
			'tunjangan_tidak_tetap' => $this->input->post('tunjangan_tidak_tetap'),
			'tunjangan_pss' => $this->input->post('tunjangan_pss'),
			'potongan_lain' => $this->input->post('potongan_lain'),
			'bpjs' => $this->input->post('bpjs'),
			'bonus' => $this->input->post('bonus'),
			'target' => $this->input->post('target'),
			'potongan_target' => $this->input->post('potongan_target'),
			'dapat_lain' => $this->input->post('dapat_lain')
		);
		$this->db->where('NPP', $NPP);
		$hasil = $this->db->update($this->_table, $data);
		return $hasil;
	}

	function hapus_data($kode)
	{
		$this->db->where('NPP', $kode);
		$hasil = $this->db->delete($this->_table);
		return $hasil;
	}

	public function non_aktifkan_pegawai($kode){
		$data = array(
			'active_status' => '0'
		);
		$this->db->where('NPP', $kode);
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
			'jml_cuti' => '0',
			'jml_tdk_datang' => '0',
			'active_status' => '1'
		);
		$this->db->where('NPP', $kode);
		$hasil = $this->db->update($this->_table, $data);
		return $hasil;
	}

	function data_list_non_aktif()
	{
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('bagian', 'bagian.kode_bagian = pegawai.kode_bagian');
		$this->db->join('jabatan', 'jabatan.kode_jabatan = pegawai.kode_jabatan');
		$this->db->join('divisi', 'divisi.kode_divisi = pegawai.kode_divisi');
		$this->db->join('status', 'status.id_status = pegawai.id_status');
		$this->db->where('active_status', '0');
		$hasil = $this->db->get();
		return $hasil->result();
	}

	function jumlah_non_aktif()
	{
		$this->db->select("COUNT(NPP) as jumlah, COUNT(case sex when 'Laki-laki' then 1 else null end) as laki, COUNT(case sex when 'Perempuan' then 1 else null end) as perempuan");
		$this->db->from('pegawai');
		$this->db->where('active_status', '0');
		$hasil = $this->db->get();
		return $hasil->result();
	}
}
