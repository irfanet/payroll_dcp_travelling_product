<?php

(defined('BASEPATH')) or exit('No direct script access allowed');

class Gaji extends MY_Controller
{

	private $filename = "Data_gaji";

	function __construct()
	{
		parent::__construct();
		$this->load->model('gaji_model');
		if ($this->session->userdata('id_user') != TRUE) {
			redirect('auth');
		}
	}

	function index()
	{
		$this->load->template('gaji_new');
	}
	function hitung_gaji()
	{

		$periode = $this->db->select('*')->order_by('id_periode', "desc")->limit(1)->get('kalender')->row_array();
		$tgl_mulai = $periode['tgl_mulai'];
		$tgl_selesai = $periode['tgl_selesai'];
		$kd_periode = $periode['kd_periode'];
		$hasil = $this->gaji_model->get_absen_by_periode($kd_periode,$tgl_mulai, $tgl_selesai);
		echo json_encode($hasil);
		redirect('gaji','refresh');	
	}
	function hitung_gaji_json()
	{

		$periode = $this->db->select('*')->order_by('id_periode', "desc")->limit(1)->get('kalender')->row_array();
		$tgl_mulai = $periode['tgl_mulai'];
		$tgl_selesai = $periode['tgl_selesai'];
		$kd_periode = $periode['kd_periode'];
		$hasil = $this->gaji_model->get_absen_by_periode($kd_periode,$tgl_mulai, $tgl_selesai, 1);
		echo json_encode($hasil);
		
	}

	function get_data()
	{
		$data = $this->gaji_model->data_list();
		echo json_encode($data);
	}

	function simpan_data()
	{
		$data = array('success' => false, 'messages' => array());
		$this->form_validation->set_rules(
			'NPP',
			'NPP',
			'required|trim|strip_tags|is_unique[pegawai.NPP]',
			[
				'is_unique' => 'NPP tidak boleh sama!'
			]
		);
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim|strip_tags');
		$this->form_validation->set_rules('sex', 'Sex', 'required|trim|strip_tags');
		$this->form_validation->set_rules('id_status', 'ID Status', 'required|trim|strip_tags');
		$this->form_validation->set_rules('kode_bagian', 'Kode Bagian', 'required|trim|strip_tags');
		$this->form_validation->set_rules('kode_divisi', 'Kode Divisi', 'required|trim|strip_tags');
		$this->form_validation->set_rules('kode_jabatan', 'Kode Jabatan', 'required|trim|strip_tags');
		$this->form_validation->set_rules('tgl_masuk', 'Tanggal Masuk', 'required|trim|strip_tags');
		$this->form_validation->set_rules('tgl_keluar', 'Tanggal Keluar', 'required|trim|strip_tags');
		$this->form_validation->set_rules('tgl_kontrak', 'Tanggal Kontrak', 'required|trim|strip_tags');
		$this->form_validation->set_rules('norek', 'Norek', 'required|trim|strip_tags');
		$this->form_validation->set_rules('gapok', 'Gapok', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('tunjangan_tetap', 'Tunjangan Tetap', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('tunjangan_tidak_tetap', 'Tunjangan Tidak Tetap', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('tunjangan_pss', 'Tunjangan PSS', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('potongan_lain', 'Potongan Lain', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('bpjs', 'BPJS', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('bonus', 'Bonus', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('target', 'Target', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('potongan_target', 'Potongan Target', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('dapat_lain', 'Dapat Lain', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run() == FALSE) {
			foreach ($_POST as $key => $value) {
				$data['messages'][$key] = form_error($key);
			}
		} else {
			$data['success'] = true;
			$this->gaji_model->simpan_data();
		}
		echo json_encode($data);
	}

	function hapus_data()
	{
		$kode = $this->input->post('kode');
		$data = $this->gaji_model->hapus_data($kode);
		echo json_encode($data);
	}

	public function export(){
		include APPPATH . 'third_party/PHPExcel/PHPExcel.php';   
        $excel = new PHPExcel();
	
		 $excel->getProperties()->setCreator('Payroll DCP Travelling Product')
		 ->setLastModifiedBy('Payroll DCP Travelling Product')
		 ->setTitle($this->filename)
		 ->setSubject($this->filename)
		 ->setDescription($this->filename)
		 ->setKeywords($this->filename);

        $excel->setActiveSheetIndex(0)->setCellValue('A1', "NO"); 
        $excel->setActiveSheetIndex(0)->setCellValue('B1', "NIK"); 
		$excel->setActiveSheetIndex(0)->setCellValue('C1', "NAMA KARYAWAN");
		$excel->setActiveSheetIndex(0)->setCellValue('D1', "DEPARTEMEN"); 
		$excel->setActiveSheetIndex(0)->setCellValue('E1', "JABATAN"); 
		$excel->setActiveSheetIndex(0)->setCellValue('F1', "LINE"); 		 
        $excel->setActiveSheetIndex(0)->setCellValue('G1', "JUMLAH"); 
        $excel->setActiveSheetIndex(0)->setCellValue('H1', "HARI KERJA"); 
		$excel->setActiveSheetIndex(0)->setCellValue('I1', "IZIN"); 
		$excel->setActiveSheetIndex(0)->setCellValue('J1', "SAKIT"); 
		$excel->setActiveSheetIndex(0)->setCellValue('K1', "ABSEN");
		$excel->setActiveSheetIndex(0)->setCellValue('L1', "IZIN RESMI");
		$excel->setActiveSheetIndex(0)->setCellValue('M1', "CUTI");
		$excel->setActiveSheetIndex(0)->setCellValue('N1', "LEMBURAN");
		$excel->setActiveSheetIndex(0)->setCellValue('O1', "MENIT TERLAMBAT");
		$excel->setActiveSheetIndex(0)->setCellValue('P1', "HARI TERLAMBAT");
		$excel->setActiveSheetIndex(0)->setCellValue('Q1', "GAJI POKOK");
		$excel->setActiveSheetIndex(0)->setCellValue('R1', "TUNJ JABATAN");
		$excel->setActiveSheetIndex(0)->setCellValue('S1', "TUNJ KINERJA"); 
		$excel->setActiveSheetIndex(0)->setCellValue('T1', "BONUS");
		$excel->setActiveSheetIndex(0)->setCellValue('U1', "INSENTIF");
		$excel->setActiveSheetIndex(0)->setCellValue('V1', "BPJS KT JHT");
		$excel->setActiveSheetIndex(0)->setCellValue('W1', "BPJS KT JP");
		$excel->setActiveSheetIndex(0)->setCellValue('X1', "BPJS KES");
		$excel->setActiveSheetIndex(0)->setCellValue('Y1', "PPH21");
		$excel->setActiveSheetIndex(0)->setCellValue('Z1', "PERIODE");
		$excel->setActiveSheetIndex(0)->setCellValue('AA1', "GRAND TOTAL");
    
        $hasil = $this->gaji_model->data_list();
    
        $no = 1; 
        $numrow = 2; 
        foreach($hasil as $data){ 
          $excel->setActiveSheetIndex()->setCellValue('A'.$numrow, $no);
          $excel->setActiveSheetIndex()->setCellValue('B'.$numrow, $data['nik']);
		  $excel->setActiveSheetIndex()->setCellValue('C'.$numrow, $data['nama']);
		  $excel->setActiveSheetIndex()->setCellValue('D'.$numrow, $data['kd_departemen']);
		  $excel->setActiveSheetIndex()->setCellValue('E'.$numrow, $data['kd_jabatan']);
		  $excel->setActiveSheetIndex()->setCellValue('F'.$numrow, $data['kd_line']);
          $excel->setActiveSheetIndex()->setCellValue('G'.$numrow, $data['jumlah']);
          $excel->setActiveSheetIndex()->setCellValue('H'.$numrow, $data['hari_kerja']);
		  $excel->setActiveSheetIndex()->setCellValue('I'.$numrow, $data['izin']);
		  $excel->setActiveSheetIndex()->setCellValue('J'.$numrow, $data['sakit']);
		  $excel->setActiveSheetIndex()->setCellValue('K'.$numrow, $data['absen']);  
		  $excel->setActiveSheetIndex()->setCellValue('L'.$numrow, $data['izin_resmi']);  
		  $excel->setActiveSheetIndex()->setCellValue('M'.$numrow, $data['cuti']);
		  $excel->setActiveSheetIndex()->setCellValue('N'.$numrow, $data['lemburan']);    
		  $excel->setActiveSheetIndex()->setCellValue('O'.$numrow, $data['menit_terlambat']);  
		  $excel->setActiveSheetIndex()->setCellValue('P'.$numrow, $data['hari_terlambat']); 
		  $excel->setActiveSheetIndex()->setCellValue('Q'.$numrow, $data['gaji_pokok']);       
		  $excel->setActiveSheetIndex()->setCellValue('R'.$numrow, $data['tunj_jabatan']); 
		  $excel->setActiveSheetIndex()->setCellValue('S'.$numrow, $data['tunj_kinerja']);     
		  $excel->setActiveSheetIndex()->setCellValue('T'.$numrow, $data['bonus']);
		  $excel->setActiveSheetIndex()->setCellValue('U'.$numrow, $data['insentif']);   
		  $excel->setActiveSheetIndex()->setCellValue('V'.$numrow, $data['bpjs_tk_jht']);
		  $excel->setActiveSheetIndex()->setCellValue('W'.$numrow, $data['bpjs_tk_jp']); 
		  $excel->setActiveSheetIndex()->setCellValue('X'.$numrow, $data['bpjs_kes']);
		  $excel->setActiveSheetIndex()->setCellValue('Y'.$numrow, $data['pph21']);                     
		  $excel->setActiveSheetIndex()->setCellValue('Z'.$numrow, $data['kd_periode']);
		  $excel->setActiveSheetIndex()->setCellValue('AA'.$numrow, $data['total_gaji']);             
          $no++; 
          $numrow++; 
        }
    
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    
        $excel->getActiveSheet(0)->setTitle("Laporan Data Transaksi");
		$excel->setActiveSheetIndex(0);

    
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'.$this->filename.'.xlsx"'); 
        header('Cache-Control: max-age=0');
	
		// $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write = new PHPExcel_Writer_Excel2007($excel);
		ob_end_clean();
		$write->save('php://output');

		// $write = new PHPExcel_Writer_CSV($excel);
		// $write->setInputEncoding('utf-8');
        // $write->setDelimiter(";")->save('php://output');
    }
}