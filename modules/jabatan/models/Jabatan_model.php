<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Jabatan_model extends CI_Model{
		function __construct(){
			parent::__construct();
        }

        function getJabatan(){
            return $this->db->get('jabatan');
		}
		
		function deleteJabatan($kode_jabatan){
			$this->db->where('kode_jabatan', $kode_jabatan);
			$this->db->delete('jabatan');
		}

		function editJabatan($kode_jabatan){
            $nama_jabatan = $this->input->post('nama_jabatan');
            $status = $this->input->post('status');
			$data = array(
				'nama_jabatan' => $nama_jabatan,
				'status' => $status);
			$this->db->where('kode_jabatan', $kode_jabatan);
			$this->db->update('jabatan', $data);
		}

		function addJabatan(){
			$kode_jabatan = $this->input->post('kode_jabatan');
			$nama_jabatan = $this->input->post('nama_jabatan');
            $status = $this->input->post('status');
			$data = array(
				'kode_jabatan' => $kode_jabatan, 
				'nama_jabatan' => $nama_jabatan,
				'status' => $status);
			$this->db->insert('jabatan', $data);
		}
	}
?>