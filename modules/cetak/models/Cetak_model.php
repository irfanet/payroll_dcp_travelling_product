<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Cetak_model extends CI_Model{

		private $_table = "gaji";
		
		function __construct(){
			parent::__construct();
        }

		function data_list(){
			$hasil = $this->db->get($this->_table);
			return $hasil->result();
		}
	
		function simpan_data(){			
			$data = array(
				'kode_bagian' => $this->input->post('kode_bagian'),
				'nama_bagian' => $this->input->post('nama_bagian')
			);
			$hasil = $this->db->insert($this->_table, $data);
			return $hasil;
		}
	
		function get_data_by_kode($kode){
			$hasil = $this->db->get_where($this->_table, array('kode_bagian' => $kode))->row_array();
			return $hasil;
		}
	
		function update_data(){
			$kode_bagian = $this->input->post('kode_bagian');
			$data = array(
				'nama_bagian' => $this->input->post('nama_bagian')
			);
			$this->db->where('kode_bagian', $kode_bagian);
			$hasil = $this->db->update($this->_table, $data);
			return $hasil;
		}
	
		function hapus_data($kode){
			$this->db->where('kode_bagian', $kode);
			$hasil = $this->db->delete($this->_table);
			return $hasil;
		}

		function upload_file($filename){
            $this->load->library('upload');
            
            $config['upload_path'] = './upload/excel/';
            $config['allowed_types'] = 'xls|xlsx';
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
      
        function insert_multiple($data){
           $this->db->insert_batch($this->_table, $data);
        }
	}
