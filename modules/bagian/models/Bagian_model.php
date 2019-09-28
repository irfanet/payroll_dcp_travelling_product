<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Bagian_model extends CI_Model{
		function __construct(){
			parent::__construct();
        }

        function getBagian(){
            return $this->db->get('bagian');
		}
		
		function deleteBagian($kode_bagian){
			$this->db->where('kode_bagian', $kode_bagian);
			$this->db->delete('bagian');
		}

		function editBagian($kode_bagian){
            $nama_bagian = $this->input->post('nama_bagian');
			$data = array('nama_bagian' => $nama_bagian);
			$this->db->where('kode_bagian', $kode_bagian);
			$this->db->update('bagian', $data);
		}

		function addBagian(){
			$kode_bagian = $this->input->post('kode_bagian');
			$nama_bagian = $this->input->post('nama_bagian');
			$data = array(
				'kode_bagian' => $kode_bagian, 
				'nama_bagian' => $nama_bagian);
			$this->db->insert('bagian', $data);
		}
	}
?>