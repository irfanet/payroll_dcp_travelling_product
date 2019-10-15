<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Spl_model extends CI_Model{

		private $_table = "absensi";
		
		function __construct(){
			parent::__construct();
        }

		function data_list(){
			$tgl = $this->get_tgl_terbaru();
			$this->db->select('*')
			->from('absensi')
			->join('pegawai', 'absensi.nik = pegawai.nik','inner')
			->where('absensi.lembur >','0')
			->where('absensi.tgl_absensi =',$tgl);
			$hasil = $this->db->get();
			return $hasil->result();
		}
	
		function simpan_data(){			
			$data = array(
				'NPP' => $this->input->post('NPP'), 
				'tgl_lembur' => date('Y-m-d', strtotime($this->input->post('tgl_lembur'))),
				'jumlah_jam_lembur' => $this->input->post('jumlah_jam_lembur'), 
				'keterangan' => $this->input->post('keterangan'),
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
				'lembur' => $this->input->post('lembur'),
			);
			$this->db->where('id_absensi', $id_absensi);
			$hasil = $this->db->update($this->_table, $data);
			return $hasil;
		}
	
		function hapus_data($kode){
			$data = array(
				'lembur' => 0,
			);
			$this->db->where('id_absensi', $kode);
			$hasil = $this->db->update($this->_table, $data);
			return $hasil;
		}

		
		function get_nik(){
			$tgl = $this->get_tgl_terbaru();
			$this->db->select('*')
			->from('absensi')
			->join('pegawai', 'absensi.nik = pegawai.nik','inner')
			->where('absensi.tgl_absensi =',$tgl)
			->where("(kd_status='TR' OR kd_status='MS')");
			// ->where('absensi.kd_status =','TR')
			// ->or_where('absensi.kd_status =','MS');
			$hasil = $this->db->get();
			return $hasil->result();
		}

		function tambah_spl(){
			$count = $this->input->post('jml');
				for($i = 0; $i<$count; $i++){
				$id_absensi[$i]=$_POST['id_absensi_nik'][$i];
			}
			for($i = 0; $i<$count; $i++){ 
				$entries[] = array( 
					'id_absensi'=>$id_absensi[$i],
					'lembur' => $this->input->post('lembur')
				); 
			}
			$this->db->update_batch('absensi', $entries, 'id_absensi');
		}
		function get_tgl_terbaru(){
			$this->db->select('tgl_absensi')
			->from($this->_table)
			->order_by('tgl_absensi', 'desc')
			->limit(1);
			$hasil = $this->db->get();

			foreach($hasil->result_array() as $h){
				$tgl = $h['tgl_absensi'];
			}
			return $tgl;
		}
	}
