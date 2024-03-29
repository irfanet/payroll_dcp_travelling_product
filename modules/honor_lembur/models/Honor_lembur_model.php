<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Honor_lembur_model extends CI_Model{

		private $_table = "honor_lembur";
		
		function __construct(){
			parent::__construct();
        }

		function data_list(){
			$hasil = $this->db->get($this->_table);
			return $hasil->result();
		}
	
		function get_data_by_kode($kode){
			$hasil = $this->db->get_where($this->_table, array('id_honor' => $kode))->row_array();
			return $hasil;
		}
	
		function update_data(){
			$id_honor = $this->input->post('id_honor');
			$data = array(
				'honor' => $this->input->post('honor')
			);
			$this->db->where('id_honor', $id_honor);
			$hasil = $this->db->update($this->_table, $data);
			return $hasil;
		}
	}
