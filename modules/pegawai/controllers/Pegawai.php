<?php

(defined('BASEPATH')) or exit('No direct script access allowed');

class Pegawai extends MY_Controller{

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
		$this->form_validation->set_rules('tgl_keluar','Tanggal Keluar', 'required|trim|strip_tags');
		$this->form_validation->set_rules('tgl_kontrak','Tanggal Kontrak', 'required|trim|strip_tags');
		$this->form_validation->set_rules('norek','Norek', 'required|trim|strip_tags');
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
		$this->form_validation->set_rules('tgl_keluar','Tanggal Keluar', 'required|trim|strip_tags');
		$this->form_validation->set_rules('tgl_kontrak','Tanggal Kontrak', 'required|trim|strip_tags');
		$this->form_validation->set_rules('norek','Norek', 'required|trim|strip_tags');
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
}

