<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Cetak_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function get_slip(){
		$this->db->select("*")->from("pegawai, gaji, departemen, jabatan");
		$this->db->where("pegawai.nik=gaji.nik");
		$this->db->where("pegawai.kd_departemen=departemen.kd_departemen");
		$this->db->where("pegawai.kd_jabatan=jabatan.kd_jabatan");
		$this->db->where("pegawai.norek IS NULL");
		$this->db->order_by("pegawai.kd_departemen asc, pegawai.nama asc");
		return $this->db->get()->result_array();
	}

	function get_transfer(){
		$this->db->select("*")->from("pegawai, gaji, departemen, jabatan");
		$this->db->where("pegawai.nik=gaji.nik");
		$this->db->where("pegawai.kd_departemen=departemen.kd_departemen");
		$this->db->where("pegawai.kd_jabatan=jabatan.kd_jabatan");
		$this->db->where("pegawai.norek IS NOT NULL");
		$this->db->order_by("pegawai.kd_departemen asc, pegawai.nama asc");
		return $this->db->get()->result_array();
	}

	function get_rekap(){
		$this->db->select("*")->from("pegawai, gaji, departemen, jabatan, line");
		$this->db->where("pegawai.nik=gaji.nik");
		$this->db->where("pegawai.kd_departemen=departemen.kd_departemen");
		$this->db->where("pegawai.kd_jabatan=jabatan.kd_jabatan");
		$this->db->where("pegawai.kd_line=line.kd_line");
		$this->db->order_by("pegawai.kd_departemen asc, pegawai.nama asc");
		return $this->db->get()->result_array();
	}

	function get_absensi(){
		$this->db->select("*")->from("pegawai, absensi");
		$this->db->where("pegawai.nik=absensi.nik");
		$this->db->order_by("pegawai.nama asc");
		return $this->db->get()->result_array();
	}

	function get_log_absensi(){
		$this->db->select("*")->from("pegawai, log_absensi");
		$this->db->where("pegawai.nik=log_absensi.nik");
		$this->db->order_by("pegawai.nama asc");
		return $this->db->get()->result_array();
	}

	function get_kalender_detail(){
		$periode = $this->db->select('*')->order_by('id_periode', "desc")->limit(1)->get('kalender')->row_array();
		$tglStart=$periode['tgl_mulai'];
		$tglEnd=$periode['tgl_selesai'];
		$this->db->select('*, 
		DATE_FORMAT(kalender_detail.tgl, "%d") as hari');
		$this->db->from("kalender_detail");
		$this->db->where('kalender_detail.tgl >=', $tglStart);
		$this->db->where('kalender_detail.tgl <=', $tglEnd);
		$hasil = $this->db->get();
		return $hasil->result_array();
	}
}
