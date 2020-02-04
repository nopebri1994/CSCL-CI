<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajemen_dosen extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('admin/Man_dosen');

		if($this->session->userdata('login')=='sukses') {
		}
		else {
			redirect('login');
		}
	}

	public function index() {

		$data = [
			'active_controller' => 'manajemen_dosen',
			'active_function' => 'manajemen_dosen'
		];

		$data['tampil'] = $this->Man_dosen->tampil_dosen();

		$this->load->view('admin/template/template', $data);
	}

	public function tambah_dosen() {
		$data = [
			'active_controller' => 'manajemen_dosen',
			'active_function' => 'form_dosen'
		];

		$data['action'] = 'admin/manajemen_dosen/proses_tambah_dosen';

		$data['judul1'] = 'Tambah Data Dosen</li>';
		$data['judul2'] = '<i class="fa fa-plus"></i> Tambah Data Dosen</li>';

		$data['tampil']['nip_dosen'] = '';
		$data['tampil']['nama_dosen'] = '';
		$data['tampil']['jenis_kelamin'] = '';
		$data['tampil']['tempat'] = '';
		$data['tampil']['tanggal'] = '';
		$data['tampil']['alamat'] = '';
		$data['tampil']['kontak'] = '';
		$data['tampil']['password'] = '';

		$this->load->view('admin/template/template', $data);
	}

	public function proses_tambah_dosen() {
		$param = array(
			'nip_dosen' => $this->input->post('nip_dosen'),
			'nama_dosen' => $this->input->post('nama_dosen'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'tempat' => $this->input->post('tempat'),
			'tanggal' => $this->input->post('tanggal'),
			'alamat' => $this->input->post('alamat'),
			'kontak' => $this->input->post('kontak'),
			'password' => $this->input->post('password')
		);

		$pesan = "Data Dosen Berhasil Ditambahkan";
		$this->session->set_flashdata('sukses', $pesan);
		$this->Man_dosen->proses_tambah_dosen($param);
		redirect('admin/manajemen_dosen');
	}

	public function hapus_dosen($id_dosen) {
		$pesan = "Data Dosen Berhasil Dihapus";
		$this->session->set_flashdata('sukses', $pesan);
		$this->Man_dosen->hapus_dosen($id_dosen);
	}

	public function ubah_dosen($id_dosen) {
		$data = [
			'active_controller' => 'manajemen_dosen',
			'active_function' => 'form_dosen'
		];

		$data['action'] = 'admin/manajemen_dosen/proses_ubah_dosen/'.$id_dosen;

		$data['judul1'] = 'Ubah Data Dosen</li>';
		$data['judul2'] = '<i class="fa fa-pencil"></i> Ubah Data Dosen</li>';

		$query = $this->Man_dosen->ubah_dosen($id_dosen);
		$data['tampil']['nip_dosen'] = $query['nip_dosen'];
		$data['tampil']['nama_dosen'] = $query['nama_dosen'];
		$data['tampil']['jenis_kelamin'] = $query['jenis_kelamin'];
		$data['tampil']['tempat'] = $query['tempat'];
		$data['tampil']['tanggal'] = $query['tanggal'];
		$data['tampil']['alamat'] = $query['alamat'];
		$data['tampil']['kontak'] = $query['kontak'];
		$data['tampil']['password'] = $query['password'];

		$this->load->view('admin/template/template', $data);
	}

	public function proses_ubah_dosen($id_dosen) {
		$param = array(
			'nip_dosen' => $this->input->post('nip_dosen'),
			'nama_dosen' => $this->input->post('nama_dosen'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'tempat' => $this->input->post('tempat'),
			'tanggal' => $this->input->post('tanggal'),
			'alamat' => $this->input->post('alamat'),
			'kontak' => $this->input->post('kontak'),
			'password' => $this->input->post('password')
		);

		$pesan = "Data Dosen Berhasil Diubah";
		$this->session->set_flashdata('sukses', $pesan);
		$this->Man_dosen->proses_ubah_dosen($param, $id_dosen);
		redirect('admin/manajemen_dosen');
	}
}
