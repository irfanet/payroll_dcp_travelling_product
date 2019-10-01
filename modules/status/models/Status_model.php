<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Status_model extends CI_Model{

		private $_table = "status";
		
		function __construct(){
			parent::__construct();
        }

		function data_list(){
			$hasil = $this->db->get($this->_table);
			return $hasil->result();
		}
	
		function simpan_data(){			
			$data = array(
				'nama_status' => $this->input->post('nama_status')
			);
			$hasil = $this->db->insert($this->_table, $data);
			return $hasil;
		}
	
		function get_data_by_kode($kode){
			$hasil = $this->db->get_where($this->_table, array('id_status' => $kode))->row_array();
			return $hasil;
		}
	
		function update_data(){
			$id_status = $this->input->post('id_status');
			$data = array(
				'nama_status' => $this->input->post('nama_status')
			);
			$this->db->where('id_status', $id_status);
			$hasil = $this->db->update($this->_table, $data);
			return $hasil;
		}
	
		function hapus_data($kode){
			$this->db->where('id_status', $kode);
			$hasil = $this->db->delete($this->_table);
			return $hasil;
		}
	}
