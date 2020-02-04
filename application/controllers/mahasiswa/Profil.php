<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function index()
	{
		if(!$this->session->userdata('kategori_pengguna')=='mahasiswa') {
			redirect('login');
		}

		$data = [
			'active_controller' => 'profil',
			'active_function' => 'profil'
		];
		$this->load->view('mahasiswa/template/template', $data);
	}
}
