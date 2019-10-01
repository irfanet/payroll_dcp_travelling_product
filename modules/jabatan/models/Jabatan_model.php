<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Jabatan_model extends CI_Model{

		private $_table = "jabatan";
		
		function __construct(){
			parent::__construct();
        }

		function data_list(){
			$hasil = $this->db->get($this->_table);
			return $hasil->result();
		}
	
		function simpan_data(){			
			$data = array(
				'kode_jabatan' => $this->input->post('kode_jabatan'),
				'nama_jabatan' => $this->input->post('nama_jabatan'),
				'status' => $this->input->post('status')
			);
			$hasil = $this->db->insert($this->_table, $data);
			return $hasil;
		}
	
		function get_data_by_kode($kode){
			$hasil = $this->db->get_where($this->_table, array('kode_jabatan' => $kode))->row_array();
			return $hasil;
		}
	
		function update_data(){
			$kode_jabatan = $this->input->post('kode_jabatan');
			$data = array(
				'nama_jabatan' => $this->input->post('nama_jabatan'),
				'status' => $this->input->post('status')
			);
			$this->db->where('kode_jabatan', $kode_jabatan);
			$hasil = $this->db->update($this->_table, $data);
			return $hasil;
		}
	
		function hapus_data($kode){
			$this->db->where('kode_jabatan', $kode);
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
