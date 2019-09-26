<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class divisiModel extends CI_Model{
		function __construct(){
			parent::__construct();
        }

        function getDivisi(){
            return $this->db->get('divisi');
		}
		
		function deleteDivisi($kode_divisi){
			$this->db->where('kode_divisi', $kode_divisi);
			$this->db->delete('divisi');
		}

		function editDivisi($kode_divisi){
            $nama_divisi = $this->input->post('nama_divisi');
			$data = array('nama_divisi' => $nama_divisi);
			$this->db->where('kode_divisi', $kode_divisi);
			$this->db->update('divisi', $data);
		}

		function addDivisi(){
			$kode_divisi = $this->input->post('kode_divisi');
			$nama_divisi = $this->input->post('nama_divisi');
			$data = array(
				'kode_divisi' => $kode_divisi, 
				'nama_divisi' => $nama_divisi);
			$this->db->insert('divisi', $data);
		}
	}
?>