<?php

(defined('BASEPATH')) or exit('No direct script access allowed');

class Pegawai extends MY_Controller{

	private $filename = "Data_pegawai";

    function __construct()
    {
        parent::__construct();
		$this->load->model('pegawai_model');
		if($this->session->userdata('id_user') != TRUE){
            redirect('auth');
        }
    }

    function index()
    {
        $this->load->template('pegawai');
    }

    function get_data(){
		$data=$this->pegawai_model->data_list();
		echo json_encode($data);
	}

    function get_jumlah(){
		$data=$this->pegawai_model->jumlah();
		echo json_encode($data);
	}

    function get_status(){
		$data=$this->pegawai_model->data_status();
		echo json_encode($data);
	}

    function get_bagian(){
		$data=$this->pegawai_model->data_bagian();
		echo json_encode($data);
	}
	
    function get_divisi(){
		$data=$this->pegawai_model->data_divisi();
		echo json_encode($data);
	}

    function get_jabatan(){
		$data=$this->pegawai_model->data_jabatan();
		echo json_encode($data);
	}

	function get_kode(){
		$kode=$this->input->get('id');
		$data=$this->pegawai_model->get_data_by_kode($kode);
		echo json_encode($data);
	}

	function simpan_data(){
		$data = array ('success' => false, 'messages' => array());
		$this->form_validation->set_rules('NPP','NPP', 'required|trim|strip_tags|is_unique[pegawai.NPP]'
		,[
            'is_unique' => 'NPP tidak boleh sama!'
        ]);
		$this->form_validation->set_rules('nama','Nama', 'required|trim|strip_tags');
		$this->form_validation->set_rules('sex','Sex', 'required|trim|strip_tags');
		$this->form_validation->set_rules('id_status','ID Status', 'required|trim|strip_tags');
		$this->form_validation->set_rules('kode_bagian','Kode Bagian', 'required|trim|strip_tags');
		$this->form_validation->set_rules('kode_divisi','Kode Divisi', 'required|trim|strip_tags');
		$this->form_validation->set_rules('kode_jabatan','Kode Jabatan', 'required|trim|strip_tags');
		$this->form_validation->set_rules('tgl_masuk','Tanggal Masuk', 'required|trim|strip_tags');
		$this->form_validation->set_rules('tgl_keluar','Tanggal Keluar', 'trim|strip_tags');
		$this->form_validation->set_rules('tgl_kontrak','Tanggal Kontrak', 'trim|strip_tags');
		$this->form_validation->set_rules('norek','Norek', 'trim|strip_tags');
		$this->form_validation->set_rules('gapok','Gapok', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('tunjangan_tetap','Tunjangan Tetap', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('tunjangan_tidak_tetap','Tunjangan Tidak Tetap', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('tunjangan_pss','Tunjangan PSS', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('potongan_lain','Potongan Lain', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('bpjs','BPJS', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('bonus','Bonus', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('target','Target', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('potongan_target','Potongan Target', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('dapat_lain','Dapat Lain', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run() == FALSE) {
			foreach ($_POST as $key => $value) {
				$data['messages'][$key] = form_error($key);
			}   
		}else{
			$data['success'] = true;
			$this->pegawai_model->simpan_data();	
		}
		echo json_encode($data);
	}

	function update_data(){
		$data = array ('success' => false, 'messages' => array());
		$this->form_validation->set_rules('nama','Nama', 'required|trim|strip_tags');
		$this->form_validation->set_rules('sex','Sex', 'required|trim|strip_tags');
		$this->form_validation->set_rules('id_status','ID Status', 'required|trim|strip_tags');
		$this->form_validation->set_rules('kode_bagian','Kode Bagian', 'required|trim|strip_tags');
		$this->form_validation->set_rules('kode_divisi','Kode Divisi', 'required|trim|strip_tags');
		$this->form_validation->set_rules('kode_jabatan','Kode Jabatan', 'required|trim|strip_tags');
		$this->form_validation->set_rules('tgl_masuk','Tanggal Masuk', 'required|trim|strip_tags');
		$this->form_validation->set_rules('tgl_keluar','Tanggal Keluar', 'trim|strip_tags');
		$this->form_validation->set_rules('tgl_kontrak','Tanggal Kontrak', 'trim|strip_tags');
		$this->form_validation->set_rules('norek','Norek', 'trim|strip_tags');
		$this->form_validation->set_rules('gapok','Gapok', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('tunjangan_tetap','Tunjangan Tetap', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('tunjangan_tidak_tetap','Tunjangan Tidak Tetap', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('tunjangan_pss','Tunjangan PSS', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('potongan_lain','Potongan Lain', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('bpjs','BPJS', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('bonus','Bonus', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('target','Target', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('potongan_target','Potongan Target', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_rules('dapat_lain','Dapat Lain', 'numeric|required|trim|strip_tags');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run() == FALSE) {
			foreach ($_POST as $key => $value) {
				$data['messages'][$key] = form_error($key);
			}   
		}else{
			$data['success'] = true;
			$this->pegawai_model->update_data();	
		}
		echo json_encode($data);
	}

	function hapus_data(){
		$kode=$this->input->post('kode');
		$data=$this->pegawai_model->hapus_data($kode);
		echo json_encode($data);
	}

	function form_upload(){
		$this->load->view('import');
	}

	function import_excel(){
        error_reporting(E_ALL ^ E_NOTICE);
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';
        $upload = $this->pegawai_model->upload_file($this->filename);
        if ($upload['result'] == 'failed') {
          $data['upload_error'] = $upload['error'];
        }
        // $sql = "DELETE FROM pegawai";
		// $this->db->query($sql);
		
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

    function get_data_non_aktif(){
		$data=$this->pegawai_model->data_list_non_aktif();
		echo json_encode($data);
	}

	function aktifkan_pegawai(){
		$kode=$this->input->post('kode');
		$data=$this->pegawai_model->aktifkan_pegawai($kode);
		echo json_encode($data);
	}

	function non_aktifkan_pegawai(){
		$kode=$this->input->post('kode');
		$data=$this->pegawai_model->non_aktifkan_pegawai($kode);
		echo json_encode($data);
	}

    function get_jumlah_non_aktif(){
		$data=$this->pegawai_model->jumlah_non_aktif();
		echo json_encode($data);
	}
}

