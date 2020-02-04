<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {
	public function __Construct() {
		parent::__Construct();	
	}

	public function index()
	{
		if($this->session->userdata('kategori_pengguna')=='mahasiswa') {
		}
		else {
			redirect('login');
		}

		$data = [
			'active_controller' => 'beranda',
			'active_function' => 'beranda'
		];
		
		$this->load->view('mahasiswa/template/template', $data);
	}
}