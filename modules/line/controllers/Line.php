<?php

(defined('BASEPATH')) or exit('No direct script access allowed');

class Line extends MY_Controller{

	private $filename = "Data_line";

    function __construct()
    {
        parent::__construct();
		$this->load->model('line_model');
		if($this->session->userdata('id_user') != TRUE){
            redirect('auth');
        }
    }

    function index()
    {
        $this->load->view('line');
    }

    function get_data(){
		$data=$this->line_model->data_list();
		echo json_encode($data);
	}

	function get_kode(){
		$kode=$this->input->get('id');
		$data=$this->line_model->get_data_by_kode($kode);
		echo json_encode($data);
	}

	function simpan_data(){
		$data = array ('success' => false, 'messages' => array());
		$this->form_validation->set_rules('kd_line','Kode Line', 'required|trim|strip_tags|is_unique[line.kd_line]'
		,[
            'is_unique' => 'Kode Line tidak boleh sama!'
        ]);
		$this->form_validation->set_rules('nama_line','Nama Line', 'required|trim|strip_tags');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run() == FALSE) {
			foreach ($_POST as $key => $value) {
				$data['messages'][$key] = form_error($key);
			}   
		}else{
			$data['success'] = true;
			$this->line_model->simpan_data();	
		}
		echo json_encode($data);
	}

	function update_data(){
		$data = array ('success' => false, 'messages' => array());
		$this->form_validation->set_rules('nama_line', 'Nama Line', 'required|trim');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run() == FALSE) {
			foreach ($_POST as $key => $value) {
				$data['messages'][$key] = form_error($key);
			}   
		}else{
			$data['success'] = true;
			$this->line_model->update_data();	
		}
		echo json_encode($data);
	}

	function hapus_data(){
		$kode=$this->input->post('kode');
		$data=$this->line_model->hapus_data($kode);
		echo json_encode($data);
	}

	function form_upload(){
		$this->load->view('import');
	}
	
	function import_excel(){
		error_reporting(E_ALL ^ E_NOTICE);
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';
        $upload = $this->line_model->upload_file($this->filename);
        if ($upload['result'] == 'failed') {
          $data['upload_error'] = $upload['error'];
        }
        $excelreader =  new PHPExcel_Reader_Excel5();
        $loadexcel = $excelreader->load('upload/excel/'.$this->filename.'.xls'); 
        $sheet = $loadexcel->getActiveSheet()->getRowIterator();

	
        $data = array();
        
        $numrow = 0;
        foreach($sheet as $row){
        //    if ($numrow>0){
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false); 
            
            $get = array(); 
            foreach ($cellIterator as $cell) {
            	array_push($get, $cell->getValue()); 
            }           
            array_push($data, array(
                'kd_line'=>$get[0], 
                'nama_line'=>$get[1],
            	));
            }        
          $numrow++; 
        // }
      
        $this->line_model->insert_multiple($data);
        $this->session->set_flashdata('flash','Line Berhasil ditambahkan');
        redirect("line");
    }

}

