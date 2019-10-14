<?php

(defined('BASEPATH')) or exit('No direct script access allowed');

class Absensi extends MY_Controller{

	private $filename = "Data_absensi";
    function __construct()
    {
        parent::__construct();
		$this->load->model('absensi_model');
		if($this->session->userdata('id_user') != TRUE){
            redirect('auth');
        }
    }

    function index()
    {
        $this->load->template('absensi_new');
    }

    function get_data(){
		$data=$this->absensi_model->data_list();
		echo json_encode($data);
	}
	function get_terlambat(){
		$data=$this->absensi_model->get_terlambat();
		echo json_encode($data);
	}
    function get_masuk_normal(){
		$data=$this->absensi_model->get_masuk_normal();
		echo json_encode($data);
	}


	function koreksi_absensi()
    {
        $this->load->template('koreksi_absensi');
    }

    function get_koreksi_data(){
		$data=$this->absensi_model->koreksi_data_list();
		echo json_encode($data);
	}

	function get_kode(){
		$kode=$this->input->get('id');
		$data=$this->absensi_model->get_data_by_kode($kode);
		echo json_encode($data);
	}

	function simpan_data(){
		$data = array ('success' => false, 'messages' => array());
		$this->form_validation->set_rules('NPP','NPP', 'required|trim|strip_tags');
		$this->form_validation->set_rules('tgl','Tanggal', 'required|trim|strip_tags');
		$this->form_validation->set_rules('jam_datang','Jam Datang', 'required|trim');
		$this->form_validation->set_rules('jam_pulang','Jam Pulang', 'required|trim');
		$this->form_validation->set_rules('keterangan','Keterangan', 'trim|strip_tags');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run() == FALSE) {
			foreach ($_POST as $key => $value) {
				$data['messages'][$key] = form_error($key);
			}   
		}else{
			$data['success'] = true;
			$this->absensi_model->simpan_data();	
		}
		echo json_encode($data);
	}

	function update_data(){
		$data = array ('success' => false, 'messages' => array());
		$this->form_validation->set_rules('nik','nik', 'required|trim|strip_tags');
		$this->form_validation->set_rules('tgl_absensi','Tanggal', 'required|trim|strip_tags');
		$this->form_validation->set_rules('jam_datang','Jam Datang', 'required|trim');
		$this->form_validation->set_rules('jam_pulang','Jam Pulang', 'required|trim');
		$this->form_validation->set_rules('lembur','Lembur', 'trim|strip_tags');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run() == FALSE) {
			foreach ($_POST as $key => $value) {
				$data['messages'][$key] = form_error($key);
			}   
		}else{
			$data['success'] = true;
			$this->absensi_model->update_data();	
		}
		echo json_encode($data);
	}

	function hapus_data(){
		$kode=$this->input->post('kode');
		$data=$this->absensi_model->hapus_data($kode);
		echo json_encode($data);
	}

	function form_upload(){
		$this->load->view('import');
	}

	function import_excel(){
		error_reporting(E_ALL ^ E_NOTICE);
		$tgl_absensi = $this->input->post('import_tgl_absensi');
		$tgl_absensi = date('Y-m-d', strtotime($tgl_absensi));
		$sql = "DELETE FROM absensi";
        $this->db->query($sql);
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';
        $upload = $this->absensi_model->upload_file($this->filename);
        if ($upload['result'] == 'failed') {
          $data['upload_error'] = $upload['error'];
        }
        $excelreader =  new PHPExcel_Reader_Excel5();
        $loadexcel = $excelreader->load('upload/excel/'.$this->filename.'.xls'); 
        $sheet = $loadexcel->getActiveSheet()->getRowIterator();
		 

        $data = array();
        
        $numrow = 0;
        foreach($sheet as $row){
           if ($numrow>0){
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false); 
            
            $get = array(); 
            foreach ($cellIterator as $cell) {
            	array_push($get, $cell->getValue()); 
			}           
			
			$tgl = date('Y-m-d', strtotime($get[5]));
			$jam_masuk = strtotime('08:00:00');
			// $jam_pulang = strtotime('16:30:00');
			// $jam_datang = strtotime($get[9]);
			if(strtotime($get[9]) > $jam_masuk){
				// $terlambat = round(abs($jam_datang - $jam_masuk)/60, 2);
				$kd_status = "TR";
			}else if(strtotime($get[9]) <= $jam_masuk){
				$kd_status = "MS";
			}

		
            array_push($data, array(
                'nik'=>$get[2], 
				'tgl_absensi'=> $tgl_absensi,
				'jam_datang'=>$get[9],
				'jam_pulang'=>$get[10],
				'kd_status'=>$kd_status,
				// 'keterlambatan'=>$terlambat,
				'lembur'=>''
            	));
			}
          $numrow++; 
        }
      
        $this->absensi_model->insert_multiple($data);
        $this->session->set_flashdata('flash','Absensi Berhasil diupload');
        redirect("absensi");
	}
	function get_nik(){
		$data=$this->absensi_model->get_nik();
		echo json_encode($data);
	}
	function get_status(){
		$data=$this->absensi_model->get_status();
		echo json_encode($data);
	}
	function get_pegawai_by_kode(){
		$kode=$this->input->get('id');
		$data=$this->absensi_model->get_pegawai_by_kode($kode);
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
        $excel->setActiveSheetIndex(0)->setCellValue('G1', "TGL ABSENSI"); 
        $excel->setActiveSheetIndex(0)->setCellValue('H1', "JAM MASUK"); 
		$excel->setActiveSheetIndex(0)->setCellValue('I1', "JAM PULANG"); 
		$excel->setActiveSheetIndex(0)->setCellValue('J1', "STATUS"); 
		$excel->setActiveSheetIndex(0)->setCellValue('K1', "LEMBUR"); 
    
        $hasil = $this->absensi_model->data_list();
    
        $no = 1; 
        $numrow = 2; 
        foreach($hasil as $data){ 
          $excel->setActiveSheetIndex()->setCellValue('A'.$numrow, $no);
          $excel->setActiveSheetIndex()->setCellValue('B'.$numrow, $data['nik']);
		  $excel->setActiveSheetIndex()->setCellValue('C'.$numrow, $data['nama']);
		  $excel->setActiveSheetIndex()->setCellValue('D'.$numrow, $data['kd_departemen']);
		  $excel->setActiveSheetIndex()->setCellValue('E'.$numrow, $data['kd_jabatan']);
		  $excel->setActiveSheetIndex()->setCellValue('F'.$numrow, $data['kd_line']);
          $excel->setActiveSheetIndex()->setCellValue('G'.$numrow, $data['tgl_absensi']);
          $excel->setActiveSheetIndex()->setCellValue('H'.$numrow, $data['jam_datang']);
		  $excel->setActiveSheetIndex()->setCellValue('I'.$numrow, $data['jam_pulang']);
		  $excel->setActiveSheetIndex()->setCellValue('J'.$numrow, $data['nama_status']);
		  $excel->setActiveSheetIndex()->setCellValue('K'.$numrow, $data['lembur']);                                        
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


