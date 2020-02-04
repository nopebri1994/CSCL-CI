<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {
	public function __Construct() {
		parent::__Construct();	
	}

	public function index()
	{
		if($this->session->userdata('kategori_pengguna')=='dosen') {
		}
		else {
			redirect('login');
		}
		
		$data = [
			'active_controller' => 'beranda',
			'active_function' => 'beranda'
		];
		
		$this->load->view('dosen/template/template', $data);
	}
}