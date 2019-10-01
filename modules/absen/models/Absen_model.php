<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Absen_model extends CI_Model{

		private $_table = "absen";

		function __construct(){
			parent::__construct();
        }

		function data_list(){
			$hasil = $this->db->get($this->_table);
			return $hasil->result();
		}
	
		function simpan_data(){
			$kode_divisi=$this->input->post('kode_divisi');
			$nama_divisi=$this->input->post('nama_divisi');
			
			$data = array(
				'kode_divisi' => $kode_divisi, 
				'nama_divisi' => $nama_divisi);
			$hasil = $this->db->insert($this->_table, $data);
			return $hasil;
		}
	
		function get_data_by_kode($kode){
			$hsl = $this->db->get_where($this->_table, array('kode_divisi' => $kode))->row_array();
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
			$hasil = $this->db->update($this->_table, $data);
			return $hasil;
		}
	
		function hapus_data($kode){
			$this->db->where('kode_divisi', $kode);
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
