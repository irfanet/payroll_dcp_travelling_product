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
				'kd_jabatan' => $this->input->post('kd_jabatan'),
				'nama_jabatan' => $this->input->post('nama_jabatan')
			);
			$hasil = $this->db->insert($this->_table, $data);
			return $hasil;
		}
	
		function get_data_by_kode($kode){
			$hasil = $this->db->get_where($this->_table, array('kd_jabatan' => $kode))->row_array();
			return $hasil;
		}
	
		function update_data(){
			$kd_jabatan = $this->input->post('kd_jabatan');
			$data = array(
				'nama_jabatan' => $this->input->post('nama_jabatan')
			);
			$this->db->where('kd_jabatan', $kd_jabatan);
			$hasil = $this->db->update($this->_table, $data);
			return $hasil;
		}
	
		function hapus_data($kode){
			$this->db->where('kd_jabatan', $kode);
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
