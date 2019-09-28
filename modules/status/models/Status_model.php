<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Status_model extends CI_Model{
		function __construct(){
			parent::__construct();
        }

        function getStatus(){
            return $this->db->get('status');
		}
		
		function deleteStatus($id_status){
			$this->db->where('id_status', $id_status);
			$this->db->delete('status');
		}

		function editStatus($id_status){
            $nama_status = $this->input->post('nama_status');
			$data = array('nama_status' => $nama_status);
			$this->db->where('id_status', $id_status);
			$this->db->update('status', $data);
		}

		function addStatus(){
			$nama_status = $this->input->post('nama_status');
			$data = array(
				'nama_status' => $nama_status);
			$this->db->insert('status', $data);
		}
	}
?>