<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Divisi_model extends CI_Model{
		function __construct(){
			parent::__construct();
        }

		function data_list(){
			$hasil = $this->db->get('divisi');
			return $hasil->result();
		}
	
		function simpan_data(){
			$kode_divisi=$this->input->post('kode_divisi');
			$nama_divisi=$this->input->post('nama_divisi');
			
			$data = array(
				'kode_divisi' => $kode_divisi, 
				'nama_divisi' => $nama_divisi);
			$hasil = $this->db->insert('divisi', $data);
			return $hasil;
		}
	
		function get_data_by_kode($kode){
			$hsl = $this->db->get_where('divisi', array('kode_divisi' => $kode))->row_array();
			$hasil = array(
				'kode_divisi' => $hsl['kode_divisi'],
				'nama_divisi' => $hsl['nama_divisi'],
			);
			return $hasil;
		}
	
		function update_data(){
			$kode_divisi = $this->input->post('kode_divisi');
			$nama_divisi = $this->input->post('nama_divisi');

			$data = array('nama_divisi' => $nama_divisi);
			$this->db->where('kode_divisi', $kode_divisi);
			$hasil = $this->db->update('divisi', $data);
			return $hasil;
		}
	
		function hapus_data($kode){
			$this->db->where('kode_divisi', $kode);
			$hasil = $this->db->delete('divisi');
			return $hasil;
		}
	}
