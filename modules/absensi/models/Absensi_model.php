<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Absensi_model extends CI_Model{

		private $_table = "absensi";

		function __construct(){
			parent::__construct();
        }

		function data_list(){
			$hasil = $this->db->get($this->_table);
			return $hasil->result();
		}
		function koreksi_data_list(){
			$this->db->select('*')
			->from('absensi')
			->join('pegawai', 'absensi.NPP = pegawai.NPP','outer');
   			$hasil = $this->db->get();
			return $hasil->result();
		}
		function get_npp(){
			$hasil = $this->db->get("pegawai");
			return $hasil->result();
		}
	
		function simpan_data(){
			$data = array(
				'NPP' => $this->input->post('NPP'), 
				'tgl' => date('Y-m-d', strtotime($this->input->post('tgl'))),
				'jam_datang' => $this->input->post('jam_datang'), 
				'jam_pulang' => $this->input->post('jam_pulang'),
				'keterangan' => $this->input->post('keterangan')
			);
			$hasil = $this->db->insert($this->_table, $data);
			return $hasil;
		}
	
		function get_data_by_kode($kode){
			$hasil = $this->db->get_where($this->_table, array('id_absensi' => $kode))->row_array();
			return $hasil;
		}
	
		function update_data(){
			$id_absensi = $this->input->post('id_absensi');
			$data = array(
				'NPP' => $this->input->post('NPP'), 
				'tgl' =>  date('Y-m-d', strtotime($this->input->post('tgl'))),
				'jam_datang' => $this->input->post('jam_datang'), 
				'jam_pulang' => $this->input->post('jam_pulang'),
				'keterangan' => $this->input->post('keterangan')
			);
			$this->db->where('id_absensi', $id_absensi);
			$hasil = $this->db->update($this->_table, $data);
			return $hasil;
		}
	
		function hapus_data($kode){
			$this->db->where('id_absensi', $kode);
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
      
        function insert_multiple($data_absensi){
			$updateArray = array();
			foreach($data_absensi as $data){
				$updateArray[] = array(
					'npp'=>$data['npp'],
					'absen_datang' => $data['jam_datang'],
					'absen_pulang' => $data['jam_pulang']
				);
			} 
			$this->db->update_batch('spl', $updateArray, 'npp');
           	$this->db->insert_batch($this->_table, $data_absensi);
        }
	}
