<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Description of site
 *
 * @author https://www.roytuts.com
 */
class Pegawai_excel extends MY_Controller {

    private $filename = "Data_Pegawai";

    function __construct() {
        parent::__construct();
        $this->load->model('pegawai_excel_model');
    }

    function index() {
        $this->load->view('import');
    }
    function import(){
        error_reporting(E_ALL ^ E_NOTICE);
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';
        $upload = $this->pegawai_excel_model->upload_file($this->filename);
        if ($upload['result'] == 'failed') {
          $data['upload_error'] = $upload['error'];
        }
        $sql = "DELETE FROM pegawai";
        $this->db->query($sql);

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
           
            // $tgl_masuk = $get[8]; 
            // $tgl_keluar = $get[9]; 
            // $tgl_kontrak = $get[10];
            // $tgl = str_replace('/', '-', $get[8]);
            // $tgl_masuk = date('Y-m-d', strtotime($tgl));
            // $tgl_masuk = gmdate("Y-m-d", $unix_date);
            

            if($get[8]=="  -   -") {
              $tgl_masuk = "";
            }else{
              $tgl_masuk = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($get[8]));             
            }
            if($get[9]=="  -   -") {
              $tgl_keluar = "";
            }else{
              $tgl_keluar = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($get[9]));             
            }
            if($get[10]=="  -   -") {
              $tgl_kontrak = "";
            }else{
              $tgl_kontrak = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($get[10]));             
            }
            array_push($data, array(
                'npp'=>$get[1], 
                'nama'=>$get[2],
                'sex'=>$get[3], 
                'id_status'=>$get[4],
                'kode_bagian'=>$get[5],
                'kode_divisi'=>$get[6],
                'kode_jabatan'=>$get[7], 
                'tgl_masuk'=>$tgl_masuk,
                'tgl_keluar'=>$tgl_keluar,
                'tgl_kontrak'=>$tgl_kontrak,
                'norek'=>$get[11],
                'gapok'=>$get[12],
                'tunjangan_tetap'=>$get[13],
                'tunjangan_tidak_tetap'=>$get[14],
                'tunjangan_pss'=>$get[15],
                'potongan_lain'=>$get[16],
                'bpjs'=>$get[17],
                'bonus'=>$get[18],
                'target'=>$get[19],
                'potongan_target'=>$get[20],
                'dapat_lain'=>$get[21],
                'jml_cuti'=>$get[22],
                'jml_tdk_datang'=>$get[23],
            ));
            }
                    
          $numrow++; 
        }
      
        $this->pegawai_excel_model->insert_multiple($data);
        $this->session->set_flashdata('flash','Pegawai Berhasil ditambahkan');
        redirect("pegawai_excel");
    }

}