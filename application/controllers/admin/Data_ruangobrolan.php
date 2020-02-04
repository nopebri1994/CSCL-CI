<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_ruangobrolan extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('admin/MData_ruangobrolan');
		$this->load->model('admin/MRuang_obrolan');
		$this->load->model('admin/Man_dosen');
		$this->load->model('admin/Man_mahasiswa');
	}

	public function index() {
		if($this->session->userdata('kategori_pengguna')=='admin') {
		}
		else {
			redirect('login');
		}

		$data = [
			'active_controller' => 'data_ruangobrolan',
			'active_function' => 'data_ruangobrolan'
		];

		$data['tampil'] = $this->MData_ruangobrolan->tampil_dataruangobrolan();

		$this->load->view('admin/template/template', $data);
	}

	function input_msg() {
		$this->MData_ruangobrolan->input_msg();
		$segment=$this->input->post('segment');

		$id="admin/ruang_obrolan/topik_ruangobrolan/$segment";
		redirect($id);
	}
}
