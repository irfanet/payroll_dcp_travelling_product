<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Absensi_model extends CI_Model{

		private $_table = "absensi";

		function __construct(){
			parent::__construct();
        }

		function data_list(){
			$this->db->select('*')
			->from('absensi')
			->join('pegawai', 'absensi.nik = pegawai.nik','inner')
			->join('status_kehadiran', 'absensi.kd_status = status_kehadiran.kd_status','inner');
			$hasil = $this->db->get();
			return $hasil->result_array();
		}
		function export_excel(){
			$this->db->select('*')
			->from('absensi')
			->join('pegawai', 'absensi.nik = pegawai.nik','inner')
			->join('departemen', 'pegawai.kd_departemen = departemen.kd_departemen','inner')
			->join('line', 'line.kd_line = line.kd_line','inner')
			->join('status_kehadiran', 'absensi.kd_status = status_kehadiran.kd_status','inner');
			$hasil = $this->db->get();
			return $hasil->result();
		}
		function koreksi_data_list(){
			$hasil = $this->db->query("SELECT * FROM pegawai where nik NOT IN (SELECT nik FROM absensi WHERE tgl_absensi='2019-10-15')");
			// $hasil = $this->db->query("SELECT nik,* FROM pegawai as a WHERE NOT EXISTS(SELECT nik,* FROM absensi as b WHERE b.nik=a.nik)");
			return $hasil->result();
		}
		function get_terlambat(){
			$this->db->select('*')
			->from('absensi')
			->join('pegawai', 'absensi.nik = pegawai.nik','inner')
			->join('status_kehadiran', 'absensi.kd_status = status_kehadiran.kd_status','inner')
			->where('absensi.kd_status','TR');
			$hasil = $this->db->get();
			return $hasil->result();
		}
		function get_masuk_normal(){
			$this->db->select('*')
			->from('absensi')
			->join('pegawai', 'absensi.nik = pegawai.nik','inner')
			->join('status_kehadiran', 'absensi.kd_status = status_kehadiran.kd_status','inner')
			->where('absensi.kd_status','MS');
			$hasil = $this->db->get();
			return $hasil->result();
		}
		function get_nik(){
			$hasil = $this->db->get("pegawai");
			return $hasil->result();
		}
		function get_status(){
			$hasil = $this->db->get("status_kehadiran");
			return $hasil->result();
		}
	
		function simpan_data(){
			$data = array(
				'nik' => $this->input->post('nik'), 
				'tgl_absensi' => date('Y-m-d', strtotime($this->input->post('tgl_absensi'))),
				'jam_datang' => $this->input->post('jam_datang'), 
				'jam_pulang' => $this->input->post('jam_pulang'),
				'kd_status' => $this->input->post('kd_status')
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
				'nik' => $this->input->post('nik'), 
				'tgl_absensi' =>  date('Y-m-d', strtotime($this->input->post('tgl_absensi'))),
				'jam_datang' => $this->input->post('jam_datang'), 
				'jam_pulang' => $this->input->post('jam_pulang'),
				'kd_status' => $this->input->post('kd_status'),
				'lembur' => $this->input->post('lembur')
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
			// $updateArray = array();
			// foreach($data_absensi as $data){
			// 	$updateArray[] = array(
			// 		'nik'=>$data['nik'],
			// 		'absen_datang' => $data['jam_datang'],
			// 		'absen_pulang' => $data['jam_pulang']
			// 	);
			// } 
			// $this->db->update_batch('spl', $updateArray, 'nik');
           	$this->db->insert_batch($this->_table, $data_absensi);
        }
	}
