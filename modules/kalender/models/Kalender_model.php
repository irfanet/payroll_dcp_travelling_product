<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kalender_model extends CI_Model
{

	private $_table = "kalender";

	function __construct()
	{
		parent::__construct();
	}

	function data_list()
	{
		$this->db->select('*, 
		DATE_FORMAT(kalender.tgl_mulai, "%d-%m-%Y") as tgl_mulai_format, 
		DATE_FORMAT(kalender.tgl_selesai, "%d-%m-%Y") as tgl_selesai_format');
		$this->db->from($this->_table);
		$this->db->limit(1);
		$this->db->order_by('id_kalender', 'DESC');
		$hasil = $this->db->get();
		return $hasil->result();
	}

	function data_list_detail($tglStart, $tglEnd)
	{
		$this->db->select('*, 
		DATE_FORMAT(kalender_detail.tgl, "%d-%m-%Y") as tgl_format, 
		DATE_FORMAT(kalender_detail.tgl, "%a") as hari');
		$this->db->from("kalender_detail");
		$this->db->where('kalender_detail.tgl >=', $tglStart);
		$this->db->where('kalender_detail.tgl <=', $tglEnd);
		$hasil = $this->db->get();
		return $hasil->result();
	}

	function jumlah()
	{
		$tglStart=$this->input->get('tglStart');
		$tglEnd=$this->input->get('tglEnd');
		$this->db->select("COUNT(case status when 'L' then 1 else null end) as libur, COUNT(case status when 'B' then 1 else null end)+COUNT(case status when 'S' then 1 else null end) as masuk");
		$this->db->from('kalender_detail');
		$this->db->where('tgl >=', $tglStart);
		$this->db->where('tgl <=', $tglEnd);
		$hasil = $this->db->get();
		return $hasil->result();
	}

	function simpan_data()
	{
		$data = array(
			'judul_periode' => $this->input->post('judul_periode'),
			'tgl_mulai' => date('Y-m-d', strtotime($this->input->post('tgl_mulai'))),
			'tgl_selesai' => date('Y-m-d', strtotime($this->input->post('tgl_selesai')))
		);
		$mulai = date('Y-m-d', strtotime($this->input->post('tgl_mulai')));
		$selesai = date('Y-m-d', strtotime($this->input->post('tgl_selesai') . "+1 day"));

		$begin = new DateTime($mulai);
		$end = new DateTime($selesai);

		$interval = DateInterval::createFromDateString('1 day');
		$period = new DatePeriod($begin, $interval, $end);

		foreach ($period as $dt) {
			$status = '';
			if ($dt->format("D") == 'Sun') {
				$status = 'L';
			} else if ($dt->format("D") == 'Mon') {
				$status = 'B';
			} else if ($dt->format("D") == 'Tue') {
				$status = 'B';
			} else if ($dt->format("D") == 'Wed') {
				$status = 'B';
			} else if ($dt->format("D") == 'Thu') {
				$status = 'B';
			} else if ($dt->format("D") == 'Fri') {
				$status = 'B';
			} else if ($dt->format("D") == 'Sat') {
				$status = 'S';
			}
			$data_detail = array(
				'tgl' => $dt->format("Y-m-d"),
				'status' => $status
			);
			$insert_query = $this->db->insert_string('kalender_detail', $data_detail);
			$insert_query = str_replace('INSERT INTO', 'INSERT IGNORE INTO', $insert_query);
			$this->db->query($insert_query);
		}
		$hasil = $this->db->insert($this->_table, $data);
		return $hasil;
	}

	function get_data_by_kode($kode)
	{
		$hasil = $this->db->get_where('kalender_detail', array('tgl' => $kode))->row_array();
		return $hasil;
	}

	function update_data()
	{
		$tgl = $this->input->post('tgl');
		$data = array(
			'status' => $this->input->post('status')
		);
		$this->db->where('tgl', $tgl);
		$hasil = $this->db->update('kalender_detail', $data);
		return $hasil;
	}
}
