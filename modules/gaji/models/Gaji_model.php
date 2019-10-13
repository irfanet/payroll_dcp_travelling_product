<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Gaji_model extends CI_Model
{

	private $_table = "gaji";

	function __construct()
	{
		parent::__construct();
	}

	function data_list()
	{
		$this->db->select('*');
		$this->db->from('pegawai');
		$this->db->join('gaji', 'gaji.nik = pegawai.nik');
		$hasil = $this->db->get();
		return $hasil->result_array();
	}

	function hitung_absen(){

	}
	
	function get_absen_by_npp($npp){
		$hasil = array();
		$query = $this->db->get_where('absen', array('NPP' => $npp))->result_array();
		foreach($query as $absen){
			$hasil['tgl'] = $absen['tgl'];

		}
		return $hasil;
	}
	function get_absen_by_periode($kd_periode,$tgl_mulai, $tgl_selesai,$cek=0){
		$sql = "DELETE FROM gaji";
        $this->db->query($sql);
		
		// $honor_lembur = 19007.5;
		$get_honor = $this->db->get_where('honor_lembur', array('id_honor' => 1))->row_array();
		$honor_lembur = $get_honor['honor'];
		$absensi = $this->db->query("SELECT * FROM absensi WHERE tgl_absensi BETWEEN '$tgl_mulai' AND '$tgl_selesai'")->result_array();
		// $jml_hari_kerja = $this->db->query("SELECT * FROM absensi WHERE tgl_absensi BETWEEN '$tgl_mulai' AND '$tgl_selesai' group by tgl_absensi")->num_rows();
		$jml_hari_kerja = 10;
		$pegawai = $this->db->get('pegawai')->result_array();
		foreach($pegawai as $p){
			$hari_kerja = 0;
			$izin = 0;
			$absen = 0;
			$izin_resmi  = 0;
			$sakit = 0;
			$cuti = 0;
			$tidak_hadir = 0;
			$jml_lembur = 0;
			$menit_terlambat = 0;
			$hari_terlambat = 0;
			$pot_terlambat = 0;

			$nik = $p['nik'];
			$nama = $p['nama'];
			$gaji_pokok = $p['gaji_pokok'];
			$gaji_perhari = $gaji_pokok/($jml_hari_kerja-1); //gajipokok : 25
			$gaji_utama = ($jml_hari_kerja-1) * $gaji_perhari;
			$tunj_jabatan = $p['tunj_jabatan'];
			$tunj_kinerja = $p['tunj_kinerja'];
			$bonus = $p['bonus'];
			$insentif = $p['insentif'];
			$premi_lembur = 0; //????????
			$uang_makan = 0; //????????
			$pengurangan_gaji = 0; //????????

			$pph21 = $p['pph21'];

			foreach($absensi as $a){
				if($a['nik']==$nik){
					if ($a['kd_status'] == "A"){
						$absen++;
						$tidak_hadir++;
					}
					if ($a['kd_status'] == "IZ"){
						$izin++;
						$tidak_hadir++;
					}
					if ($a['kd_status'] == "IR")
						$izin_resmi++;
					if ($a['kd_status'] == "SK")
						$sakit++;
					if ($a['kd_status'] == "CT")
						$cuti++;
					if ($a['kd_status'] == "MS")
						$hari_kerja++;
					if ($a['kd_status'] == "TR"){
						$hari_kerja++;
						$hari_terlambat++;
						$jam_masuk = strtotime('08:00:00');
						$jam_datang = strtotime($a['jam_datang']);
						$terlambat = round(abs($jam_datang - $jam_masuk)/60, 2);	
						$menit_terlambat += $terlambat;		
					}
					$jml_lembur += $a['lembur'];	
				}

			}
	
			//tunjangan
			if($hari_kerja == $jml_hari_kerja){
				$tunj_kehadiran = 100000;
			}else{
				$tunj_kehadiran = 0;
			}
			$lemburan = $jml_lembur * $honor_lembur;

			$total_tunjangan = $tunj_jabatan+$tunj_kinerja+$tunj_kehadiran+$premi_lembur+$lemburan+$insentif+$uang_makan+$bonus+$pengurangan_gaji;
			$total_temp = $gaji_utama+$total_tunjangan;

			//pocongan
			$pot_bpjs_jht = ($gaji_pokok + $tunj_jabatan) * (2 / 100);
			$pot_bpjs_jp = ($gaji_pokok + $tunj_jabatan) * (1 / 100);
			$pot_bpjs_kes = ($gaji_pokok + $tunj_jabatan) * (1 / 100);
			if($hari_terlambat>0)
				$pot_terlambat = $gaji_perhari/((7*60)*$menit_terlambat);
			else
				$pot_terlambat = 0;
			$pot_ketidakhadiran = $gaji_perhari*$tidak_hadir;

			$total_pot = $pot_bpjs_jht+$pot_bpjs_jp+$pot_bpjs_kes+$pph21+$pot_terlambat+$pot_ketidakhadiran;


			$grand_total =  $total_temp - $total_pot;
			$data = array(
				'nik' => $nik,
				'jumlah' => $jml_hari_kerja,
				'hari_kerja' => $hari_kerja,
				'izin' => $izin,
				'absen' => $absen,
				'sakit' => $sakit,
				'izin_resmi' => $izin_resmi,
				'cuti' => $cuti,
				'lemburan' => $jml_lembur,
				'menit_terlambat' => $menit_terlambat,
				'hari_terlambat' => $hari_terlambat,
				'kd_periode' => $kd_periode,
				'bpjs_tk_jht' => $pot_bpjs_jht,
				'bpjs_tk_jp' => $pot_bpjs_jp,
				'bpjs_kes' => $pot_bpjs_kes,
				'honor_lembur' => $lemburan,
				'potongan' => $pot_terlambat,
				'ketidakhadiran' => $pot_ketidakhadiran,
				'total_gaji' => $grand_total
			);
			$this->db->insert('gaji', $data);	

			if($cek == 1){
				$debug = array(
					'nik' => $nik,
					'nama' => $nama,
					'absensi' => array(
						'jumlah' => $jml_hari_kerja,
						'hari_kerja' => $hari_kerja,
						'izin' => $izin,
						'absen' => $absen,
						'sakit' => $sakit,
						'izin_resmi' => $izin_resmi,
						'cuti' => $cuti,
						'lemburan' => $jml_lembur,
						'menit_terlambat' => $menit_terlambat,
						'hari_terlambat' => $hari_terlambat
					),
					'gaji' => array(
						'gaji_pokok' => $gaji_pokok,
						'gaji_utama' => $gaji_utama,
						'gaji_perhari' => $gaji_perhari
					),
					'tunjangan' => array(
						'tunj_jabatan' => $tunj_jabatan,
						'tunj_kinerja' => $tunj_kinerja,
						'tunj_kehadiran' => $tunj_kehadiran,
						'lemburan' => $lemburan,
						'bonus' => $bonus,
						'insentif' => $insentif,
						'total_tunj' => $total_tunjangan,
						'total_sementara' => $total_temp
					),
					'potongan' => array(
						'bpjs_jht' => $pot_bpjs_jht,
						'bpjs_jp' => $pot_bpjs_jp,
						'bpjs_kes' => $pot_bpjs_kes,
						'pph21' => $pph21,
						'pot_terlambat' => $pot_terlambat,
						'pot_ketidakhadiran' => $pot_ketidakhadiran,
						'total_pot' => $total_pot
					),
					'kd_periode' => $kd_periode,
					'total_gaji' => $grand_total,
				);
				$json_string = json_encode($debug, JSON_PRETTY_PRINT);
				echo "<pre>".$json_string."</pre><br>";
			}
		}
	}
	function backup(){
		// $data = array(
		// 	'nik' => $nik,
		// 	'jumlah' => $jml_hari_kerja,
		// 	'hari_kerja' => $hari_kerja,
		// 	'izin' => $izin,
		// 	'absen' => $absen,
		// 	'sakit' => $sakit,
		// 	'izin_resmi' => $izin_resmi,
		// 	'cuti' => $cuti,
		// 	'lemburan' => $jml_lembur,
		// 	'menit_terlambat' => $menit_terlambat,
		// 	'hari_terlambat' => $hari_terlambat,
		// 	'kd_periode' => $kd_periode,
		// 	'total_gaji' => $grand_total,
		// );
	}

	function jumlah()
	{
		$this->db->select("COUNT(NPP) as jumlah, COUNT(case sex when 'Laki-laki' then 1 else null end) as laki, COUNT(case sex when 'Perempuan' then 1 else null end) as perempuan");
		$this->db->from('pegawai');
		$hasil = $this->db->get();
		return $hasil->result();
	}

	function data_status()
	{
		$this->db->select('*');
		$this->db->from('status');
		$hasil = $this->db->get();
		return $hasil->result();
	}

	function data_bagian()
	{
		$this->db->select('*');
		$this->db->from('bagian');
		$hasil = $this->db->get();
		return $hasil->result();
	}

	function data_gaji()
	{
		$this->db->select('*');
		$this->db->from('gaji');
		$hasil = $this->db->get();
		return $hasil->result();
	}

	function data_jabatan()
	{
		$this->db->select('*');
		$this->db->from('jabatan');
		$hasil = $this->db->get();
		return $hasil->result();
	}

	function simpan_data()
	{
		$data = array(
			'NPP' => $this->input->post('NPP'),
			'nama' => $this->input->post('nama'),
			'sex' => $this->input->post('sex'),
			'id_status' => $this->input->post('id_status'),
			'kode_bagian' => $this->input->post('kode_bagian'),
			'kode_gaji' => $this->input->post('kode_gaji'),
			'kode_jabatan' => $this->input->post('kode_jabatan'),
			'tgl_masuk' => date('Y-m-d', strtotime($this->input->post('tgl_masuk'))),
			'tgl_keluar' => date('Y-m-d', strtotime($this->input->post('tgl_keluar'))),
			'tgl_kontrak' => date('Y-m-d', strtotime($this->input->post('tgl_kontrak'))),
			'norek' => $this->input->post('norek'),
			'gapok' => $this->input->post('gapok'),
			'tunjangan_tetap' => $this->input->post('tunjangan_tetap'),
			'tunjangan_tidak_tetap' => $this->input->post('tunjangan_tidak_tetap'),
			'tunjangan_pss' => $this->input->post('tunjangan_pss'),
			'potongan_lain' => $this->input->post('potongan_lain'),
			'bpjs' => $this->input->post('bpjs'),
			'bonus' => $this->input->post('bonus'),
			'target' => $this->input->post('target'),
			'potongan_target' => $this->input->post('potongan_target'),
			'dapat_lain' => $this->input->post('dapat_lain')
		);
		$hasil = $this->db->insert($this->_table, $data);
		return $hasil;
	}

	function get_data_by_kode($kode)
	{
		$this->db->select('*,
		DATE_FORMAT(pegawai.tgl_masuk, "%d-%m-%Y") as tgl_masuk_format,
		DATE_FORMAT(pegawai.tgl_keluar, "%d-%m-%Y") as tgl_keluar_format,
		DATE_FORMAT(pegawai.tgl_kontrak, "%d-%m-%Y") as tgl_kontrak_format');
		$hasil = $this->db->get_where($this->_table, array('NPP' => $kode))->row_array();
		return $hasil;
	}

	function update_data()
	{
		$NPP = $this->input->post('NPP');
		$data = array(
			'nama' => $this->input->post('nama'),
			'sex' => $this->input->post('sex'),
			'id_status' => $this->input->post('id_status'),
			'kode_bagian' => $this->input->post('kode_bagian'),
			'kode_gaji' => $this->input->post('kode_gaji'),
			'kode_jabatan' => $this->input->post('kode_jabatan'),
			'tgl_masuk' => date('Y-m-d', strtotime($this->input->post('tgl_masuk'))),
			'tgl_keluar' => date('Y-m-d', strtotime($this->input->post('tgl_keluar'))),
			'tgl_kontrak' => date('Y-m-d', strtotime($this->input->post('tgl_kontrak'))),
			'norek' => $this->input->post('norek'),
			'gapok' => $this->input->post('gapok'),
			'tunjangan_tetap' => $this->input->post('tunjangan_tetap'),
			'tunjangan_tidak_tetap' => $this->input->post('tunjangan_tidak_tetap'),
			'tunjangan_pss' => $this->input->post('tunjangan_pss'),
			'potongan_lain' => $this->input->post('potongan_lain'),
			'bpjs' => $this->input->post('bpjs'),
			'bonus' => $this->input->post('bonus'),
			'target' => $this->input->post('target'),
			'potongan_target' => $this->input->post('potongan_target'),
			'dapat_lain' => $this->input->post('dapat_lain')
		);
		$this->db->where('NPP', $NPP);
		$hasil = $this->db->update($this->_table, $data);
		return $hasil;
	}

	function hapus_data($kode)
	{
		$this->db->where('NPP', $kode);
		$hasil = $this->db->delete($this->_table);
		return $hasil;
	}

	public function upload_file($filename){
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
  
	public function insert_multiple($data){
	   $this->db->insert_batch($this->_table, $data);
	}
}
