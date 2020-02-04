<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function index()
	{
		if(!$this->session->userdata('kategori_pengguna')=='dosen') {
			redirect('login');
		}

		$data = [
			'active_controller' => 'profil',
			'active_function' => 'profil'
		];
		$this->load->view('dosen/template/template', $data);
	}
}
