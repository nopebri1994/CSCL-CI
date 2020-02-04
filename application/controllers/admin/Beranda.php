<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {
	public function __Construct() {
		parent::__Construct();
		$this->load->model('admin/Man_matakuliah');
		$this->load->model('admin/Man_jurusan');
		$this->load->model('admin/Man_kelas');	
		if($this->session->userdata('login')=='sukses') {
		}
		else {
			redirect('login');
		}

	}

	public function index() {
		$data = [
			'active_controller' => 'beranda',
			'active_function' => 'beranda'
		];
		
		$data['jumlah_matakuliah']=$this->Man_matakuliah->jumlah_matakuliah();
		$data['jumlah_jurusan']=$this->Man_jurusan->jumlah_jurusan();
		$data['jumlah_kelas']=$this->Man_kelas->jumlah_kelas();
		
		$this->load->view('admin/template/template', $data);
	}
}