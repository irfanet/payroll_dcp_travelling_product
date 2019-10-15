<?php

(defined('BASEPATH')) or exit('No direct script access allowed');

class Pegawai extends MY_Controller
{

	private $filename = "Data_pegawai";

	function __construct()
	{
		parent::__construct();
		$this->load->model('pegawai_model');
		if ($this->session->userdata('id_user') != TRUE) {
			redirect('auth');
		}
	}

	function index()
	{
		$this->load->template('pegawai');
	}

	function get_data()
	{
		$data = $this->pegawai_model->data_list();
		echo json_encode($data);
	}

	function get_line()
	{
		$data = $this->pegawai_model->data_line();
		echo json_encode($data);
	}

	function get_departemen()
	{
		$data = $this->pegawai_model->data_departemen();
		echo json_encode($data);
	}

	function get_jabatan()
	{
		$data = $this->pegawai_model->data_jabatan();
		echo json_encode($data);
	}

	function get_kode()
	{
		$kode = $this->input->get('id');
		$data = $this->pegawai_model->get_data_by_kode($kode);
		echo json_encode($data);
	}

	function simpan_data()
	{
		$data = array('success' => false, 'messages' => array());
		$this->form_validation->set_rules(
			'nik',
			'NIK',
			'required|trim|strip_tags|is_unique[pegawai.nik]',
			[
				'is_unique' => 'NIK tidak boleh sama!'
			]
		);
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim|strip_tags');
		$this->form_validation->set_rules('kd_line', 'Kode Bagian', 'required|trim|strip_tags');
		$this->form_validation->set_rules('kd_departemen', 'Kode Departemen', 'required|trim|strip_tags');
		$this->form_validation->set_rules('kd_jabatan', 'Kode Jabatan', 'required|trim|strip_tags');
		$this->form_validation->set_rules('norek', 'Norek', 'trim|strip_tags');
		$this->form_validation->set_rules('gaji_pokok', 'Gapok', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('tunj_jabatan', 'Tunjangan Jabatan', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('tunj_kinerja', 'Tunjangan Kinerja', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('bonus', 'Bonus', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('insentif', 'Insentif', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('pph21', 'PPH 21', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run() == FALSE) {
			foreach ($_POST as $key => $value) {
				$data['messages'][$key] = form_error($key);
			}
		} else {
			$data['success'] = true;
			$this->pegawai_model->simpan_data();
		}
		echo json_encode($data);
	}

	function update_data()
	{
		$data = array('success' => false, 'messages' => array());
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim|strip_tags');
		$this->form_validation->set_rules('kd_line', 'Kode Bagian', 'required|trim|strip_tags');
		$this->form_validation->set_rules('kd_departemen', 'Kode Departemen', 'required|trim|strip_tags');
		$this->form_validation->set_rules('kd_jabatan', 'Kode Jabatan', 'required|trim|strip_tags');
		$this->form_validation->set_rules('norek', 'Norek', 'trim|strip_tags');
		$this->form_validation->set_rules('gaji_pokok', 'Gapok', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('tunj_jabatan', 'Tunjangan Jabatan', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('tunj_kinerja', 'Tunjangan Kinerja', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('bonus', 'Bonus', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('insentif', 'Insentif', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('pph21', 'PPH 21', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run() == FALSE) {
			foreach ($_POST as $key => $value) {
				$data['messages'][$key] = form_error($key);
			}
		} else {
			$data['success'] = true;
			$this->pegawai_model->update_data();
		}
		echo json_encode($data);
	}

	function hapus_data()
	{
		$kode = $this->input->post('kode');
		$data = $this->pegawai_model->hapus_data($kode);
		echo json_encode($data);
	}

	function form_upload()
	{
		$this->load->view('import');
	}

	function import_excel(){
        error_reporting(E_ALL ^ E_NOTICE);
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';
        $upload = $this->pegawai_model->upload_file($this->filename);
        if ($upload['result'] == 'failed') {
          $data['upload_error'] = $upload['error'];
        }
        $sql = "DELETE FROM pegawai";
		$this->db->query($sql);
		
		// XLSX
		$excelreader = PHPExcel_IOFactory::createReader("Excel2007");
		$loadexcel = $excelreader->load('upload/excel/'.$this->filename.'.xlsx'); 

		// XLS
        // $excelreader =  new PHPExcel_Reader_Excel5();
        // $loadexcel = $excelreader->load('upload/excel/'.$this->filename.'.xls'); 

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
           
            // $tgl_masuk = $get[8]; 
            // $tgl_keluar = $get[9]; 
            // $tgl_kontrak = $get[10];
            // $tgl = str_replace('/', '-', $get[8]);
            // $tgl_masuk = date('Y-m-d', strtotime($tgl));
            // $tgl_masuk = gmdate("Y-m-d", $unix_date);
            

            // if($get[8]=="  -   -") {
            //   $tgl_masuk = "";
            // }else{
            //   $tgl_masuk = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($get[8]));             
            // }
            // if($get[9]=="  -   -") {
            //   $tgl_keluar = "";
            // }else{
            //   $tgl_keluar = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($get[9]));             
            // }
            // if($get[10]=="  -   -") {
            //   $tgl_kontrak = "";
            // }else{
            //   $tgl_kontrak = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($get[10]));             
            // }
            array_push($data, array(
                'nik'=>$get[1], 
				'nama'=>$get[2],
				'kd_departemen'=>$get[3], 
                'kd_jabatan'=>$get[3], 
                'kd_line'=>$get[4],
                'gaji_pokok'=>$get[11],
                'tunj_jabatan'=>$get[12],
                'tunj_kinerja'=>$get[14], 
                'bonus'=>$get[12],
                'insentif'=>$get[14],
                'pph21'=>$get[14],
                'norek'=>$get[13]
            ));
            }
                    
          $numrow++; 
        }
      
        $this->pegawai_model->insert_multiple($data);
        $this->session->set_flashdata('flash','Pegawai Berhasil ditambahkan');
        redirect("pegawai");
    }

	//pegawai non aktif
	function index_non_aktif()
	{
		$this->load->template('pegawai_non_aktif');
	}

	function get_data_non_aktif()
	{
		$data = $this->pegawai_model->data_list_non_aktif();
		echo json_encode($data);
	}

	function aktifkan_pegawai()
	{
		$kode = $this->input->post('kode');
		$data = $this->pegawai_model->aktifkan_pegawai($kode);
		echo json_encode($data);
	}

	function non_aktifkan_pegawai()
	{
		$kode = $this->input->post('kode');
		$data = $this->pegawai_model->non_aktifkan_pegawai($kode);
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
        $excel->setActiveSheetIndex(0)->setCellValue('G1', "GAJI POKOK"); 
        $excel->setActiveSheetIndex(0)->setCellValue('H1', "TUNJ JABATAN"); 
		$excel->setActiveSheetIndex(0)->setCellValue('I1', "TUNJ KINERJA"); 
		$excel->setActiveSheetIndex(0)->setCellValue('J1', "BONUS"); 
		$excel->setActiveSheetIndex(0)->setCellValue('K1', "INSENTIF"); 
		$excel->setActiveSheetIndex(0)->setCellValue('L1', "PPH21");
		$excel->setActiveSheetIndex(0)->setCellValue('M1', "NOREK");  
    
        $hasil = $this->pegawai_model->data_list_temp();
    
        $no = 1; 
        $numrow = 2; 
        foreach($hasil as $data){ 
          $excel->setActiveSheetIndex()->setCellValue('A'.$numrow, $no);
          $excel->setActiveSheetIndex()->setCellValue('B'.$numrow, $data['nik']);
		  $excel->setActiveSheetIndex()->setCellValue('C'.$numrow, $data['nama']);
		  $excel->setActiveSheetIndex()->setCellValue('D'.$numrow, $data['kd_departemen']);
		  $excel->setActiveSheetIndex()->setCellValue('E'.$numrow, $data['kd_jabatan']);
		  $excel->setActiveSheetIndex()->setCellValue('F'.$numrow, $data['kd_line']);
          $excel->setActiveSheetIndex()->setCellValue('G'.$numrow, $data['gaji_pokok']);
          $excel->setActiveSheetIndex()->setCellValue('H'.$numrow, $data['tunj_jabatan']);
		  $excel->setActiveSheetIndex()->setCellValue('I'.$numrow, $data['tunj_kinerja']);
		  $excel->setActiveSheetIndex()->setCellValue('J'.$numrow, $data['bonus']);
		  $excel->setActiveSheetIndex()->setCellValue('K'.$numrow, $data['insentif']);   
		  $excel->setActiveSheetIndex()->setCellValue('L'.$numrow, $data['pph21']);   
		  $excel->setActiveSheetIndex()->setCellValue('M'.$numrow, $data['norek']);                                        
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
