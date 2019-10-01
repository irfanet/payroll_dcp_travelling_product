<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Honor_lembur_model extends CI_Model{

		private $_table = "setting";
		
		function __construct(){
			parent::__construct();
        }

		function data_list(){
			$hasil = $this->db->get($this->_table);
			return $hasil->result();
		}
	
		function get_data_by_kode($kode){
			$hasil = $this->db->get_where($this->_table, array('id_setting' => $kode))->row_array();
			return $hasil;
		}
	
		function update_data(){
			$id_setting = $this->input->post('id_setting');
			$data = array(
				'nominal' => $this->input->post('nominal')
			);
			$this->db->where('id_setting', $id_setting);
			$hasil = $this->db->update($this->_table, $data);
			return $hasil;
		}
	}
