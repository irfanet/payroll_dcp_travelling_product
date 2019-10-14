<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Cetak_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function get_periode(){
		return $this->db->select('*')->order_by('id_periode', "desc")->limit(1)->get('kalender')->row_array();
	}

	function get_slip(){
		$this->db->select("*")->from("pegawai, gaji, departemen, jabatan");
		$this->db->where("pegawai.nik=gaji.nik");
		$this->db->where("pegawai.kd_departemen=departemen.kd_departemen");
		$this->db->where("pegawai.kd_jabatan=jabatan.kd_jabatan");
		$this->db->where("pegawai.norek IS NULL");
		$this->db->order_by("pegawai.kd_departemen asc");
		return $this->db->get()->result_array();
	}

	function get_transfer(){
		$this->db->select("*")->from("pegawai, gaji, departemen, jabatan");
		$this->db->where("pegawai.nik=gaji.nik");
		$this->db->where("pegawai.kd_departemen=departemen.kd_departemen");
		$this->db->where("pegawai.kd_jabatan=jabatan.kd_jabatan");
		$this->db->where("pegawai.norek IS NOT NULL");
		$this->db->order_by("pegawai.kd_departemen asc");
		return $this->db->get()->result_array();
	}

	function get_rekap(){
		$this->db->select("*")->from("pegawai, gaji, departemen, jabatan, line");
		$this->db->where("pegawai.nik=gaji.nik");
		$this->db->where("pegawai.kd_departemen=departemen.kd_departemen");
		$this->db->where("pegawai.kd_jabatan=jabatan.kd_jabatan");
		$this->db->where("pegawai.kd_line=line.kd_line");
		$this->db->order_by("pegawai.kd_departemen asc");
		return $this->db->get()->result_array();
	}
}
