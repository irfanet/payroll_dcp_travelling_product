<?php

(defined('BASEPATH')) or exit('No direct script access allowed');

class Absen extends MY_Controller{

	private $filename = "Data_absen";
    function __construct()
    {
        parent::__construct();
		$this->load->model('absen_model');
		if($this->session->userdata('id_user') != TRUE){
            redirect('auth');
        }
    }

    function index()
    {
        $this->load->template('absen');
    }

    function get_data(){
		$data=$this->absen_model->data_list();
		echo json_encode($data);
	}

	function koreksi_absen()
    {
        $this->load->template('koreksi_absen');
    }

    function get_koreksi_data(){
		$data=$this->absen_model->koreksi_data_list();
		echo json_encode($data);
	}

	function get_kode(){
		$kode=$this->input->get('id');
		$data=$this->absen_model->get_data_by_kode($kode);
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
			$this->absen_model->simpan_data();	
		}
		echo json_encode($data);
	}

	function update_data(){
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
			$this->absen_model->update_data();	
		}
		echo json_encode($data);
	}

	function hapus_data(){
		$kode=$this->input->post('kode');
		$data=$this->absen_model->hapus_data($kode);
		echo json_encode($data);
	}

	function form_upload(){
		$this->load->view('import');
	}

	function import_excel(){
		error_reporting(E_ALL ^ E_NOTICE);
		$sql = "DELETE FROM absen";
        $this->db->query($sql);
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';
        $upload = $this->absen_model->upload_file($this->filename);
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
		
            array_push($data, array(
                'npp'=>$get[2], 
				'tgl'=>$tgl,
				'jam_datang'=>$get[9],
				'jam_pulang'=>$get[10],
            	));
			}
			
			// $data = array(
			// 	array(
			// 		'NPP' => $get[2],
			// 		'jam_datang' => $get[9],
			// 		'Settings Value' => 'True'
			// 	),
			// 	array(
			// 		'ID' => 2,
			// 		'Settings Name' => 'World',
			// 		'Settings Value' => 'Good'
			// 	)
			// );
			// $this->db->update_batch('tableName', $data, 'id'); 
          $numrow++; 
        }
      
        $this->absen_model->insert_multiple($data);
        $this->session->set_flashdata('flash','Pegawai Berhasil ditambahkan');
        redirect("absen/form_upload");
	}
	function get_npp(){
		$data=$this->absen_model->get_npp();
		echo json_encode($data);
	}
	
}

