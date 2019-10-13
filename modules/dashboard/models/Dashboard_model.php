<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Dashboard_model extends CI_Model{

		private $_table = "gaji";
		
		function __construct(){
			parent::__construct();
		}
		
		function get_aktif(){
			return $this->db->select("count(nik) as pegawai_aktif")->from("pegawai")->where("is_active=1")->get()->row();
		}

		function get_non_aktif(){
			return $this->db->select("count(nik) as pegawai_non_aktif")->from("pegawai")->where("is_active=0")->get()->row();
		}

		function get_hari_kerja(){
			return $this->db->select("count(tgl) as hari_kerja")->from("kalender_detail")->where("tgl>=(SELECT tgl_mulai FROM kalender ORDER BY id_periode DESC LIMIT 1)")->where("tgl<=(SELECT tgl_selesai FROM kalender ORDER BY id_periode DESC LIMIT 1)")->get()->row();
		}

		function get_honor(){
			return $this->db->select("honor")->from("honor_lembur")->get()->row();
		}
	}
