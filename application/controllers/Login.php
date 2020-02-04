<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('model_login');
	}

//fungsi login 
	public function index() {
		$this->form_validation->set_rules('kode_pengguna', 'Kode_pengguna', 'required');
		$this->form_validation->set_rules('katasandi_pengguna', 'Katasandi_pengguna', 'required');
		$level=set_value('level');
		$sukses='sukses';
		if($this->form_validation->run() == FALSE) {
			$this->load->view('login');
		}
		else {
			$valid_user = $this->model_login->cek();

			if($valid_user == FALSE) {
				$this->session->set_flashdata('k', '<div class="alert alert-warning alert-dismissable">
													<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
													<i class="fa fa-exclamation-circle">&nbsp;</i> <strong>Nama Pengguna / Kata Sandi Salah !</strong>
													</div>');
				redirect('login');
			}else {

				if($level=='admin')	{
					//jika password dan username cocok
					$this->session->set_userdata('kode_pengguna', $valid_user->kode_pengguna);
					$this->session->set_userdata('kategori_pengguna', $valid_user->kategori_pengguna);
					$this->session->set_userdata('nama_pengguna', $valid_user->nama_pengguna);
					$this->session->set_userdata('level', 'admin');
					$this->session->set_userdata('login', $sukses);
				}else if($level=='dosen'){
					$this->session->set_userdata('kode_pengguna', $valid_user->nip_dosen);
					$this->session->set_userdata('nama_pengguna', $valid_user->nama_dosen);
					$this->session->set_userdata('id_dosen', $valid_user->id_dosen);
					$this->session->set_userdata('level', 'dosen');
					$this->session->set_userdata('login', $sukses);
				}else{
					$this->session->set_userdata('kode_pengguna', $valid_user->nim_mahasiswa);
					$this->session->set_userdata('nama_pengguna', $valid_user->nama_mahasiswa);
					$this->session->set_userdata('id_mahasiswa', $valid_user->id_mahasiswa);
					$this->session->set_userdata('level', 'mahasiswa');
					$this->session->set_userdata('login', $sukses);
					
				}
				redirect('admin/beranda');
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
