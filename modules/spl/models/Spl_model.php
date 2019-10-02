<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Spl_model extends CI_Model{

		private $_table = "spl";
		
		function __construct(){
			parent::__construct();
        }

		function data_list(){
			$hasil = $this->db->get($this->_table);
			return $hasil->result();
		}
	
		function simpan_data(){			
			$data = array(
				'NPP' => $this->input->post('NPP'), 
				'tgl_lembur' => date('Y-m-d', strtotime($this->input->post('tgl_lembur'))),
				'jumlah_jam_lembur' => $this->input->post('jumlah_jam_lembur'), 
				'keterangan' => $this->input->post('keterangan'),
			);
			$hasil = $this->db->insert($this->_table, $data);
			return $hasil;
		}
	
		function get_data_by_kode($kode){
			$hasil = $this->db->get_where($this->_table, array('id_spl' => $kode))->row_array();
			return $hasil;
		}
	
		function update_data(){
			$id_spl = $this->input->post('id_spl');
			$data = array(
				'NPP' => $this->input->post('NPP'), 
				'tgl_lembur' => date('Y-m-d', strtotime($this->input->post('tgl_lembur'))),
				'jumlah_jam_lembur' => $this->input->post('jumlah_jam_lembur'), 
				'absen_datang' => $this->input->post('absen_datang'),
				'absen_pulang' => $this->input->post('absen_pulang'),
				'keterangan' => $this->input->post('keterangan'),
			);
			$this->db->where('id_spl', $id_spl);
			$hasil = $this->db->update($this->_table, $data);
			return $hasil;
		}
	
		function hapus_data($kode){
			$this->db->where('id_spl', $kode);
			$hasil = $this->db->delete($this->_table);
			return $hasil;
		}

		
		function get_npp(){
			$hasil = $this->db->get("pegawai");
			return $hasil->result();
		}
	}
