<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajemen_mahasiswa extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('admin/Man_mahasiswa');
		$this->load->model('admin/Man_jurusan');
		if($this->session->userdata('login')=='sukses') {
		}
		else {
			redirect('login');
		}
	}

	public function index() {

		$data = [
			'active_controller' => 'manajemen_mahasiswa',
			'active_function' => 'manajemen_mahasiswa'
		];

		$data['tampil'] = $this->Man_mahasiswa->tampil_mahasiswa();

		$this->load->view('admin/template/template', $data);
	}

	public function tambah_mahasiswa() {
		$data = [
			'active_controller' => 'manajemen_mahasiswa',
			'active_function' => 'form_mahasiswa'
		];

		$data['action'] = 'admin/manajemen_mahasiswa/proses_tambah_mahasiswa';

		$data['judul1'] = 'Tambah Data Mahasiswa</li>';
		$data['judul2'] = '<i class="fa fa-plus"></i> Tambah Data Mahasiswa</li>';

		$data['tampil']['nim_mahasiswa'] = '';
		$data['tampil']['nama_mahasiswa'] = '';
		$data['tampil']['jenis_kelamin'] = '';
		$data['tampil']['tempat'] = '';
		$data['tampil']['tanggal'] = '';
		$data['tampil']['alamat'] = '';
		$data['tampil']['kontak'] = '';
		$data['tampil']['password'] = '';
		$data['tampil']['id_jurusan'] = '';
		$data['jurusan']=$this->Man_jurusan->tampil_jurusan();
		$this->load->view('admin/template/template', $data);
	}

	public function proses_tambah_mahasiswa() {
		$param = array(
			'nim_mahasiswa' => $this->input->post('nim_mahasiswa'),
			'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'tempat' => $this->input->post('tempat'),
			'tanggal' => $this->input->post('tanggal'),
			'alamat' => $this->input->post('alamat'),
			'kontak' => $this->input->post('kontak'),
			'password' => $this->input->post('password'),
			'id_jurusan' => $this->input->post('id_jurusan')
		);

		$pesan = "Data Mahasiswa Berhasil Ditambahkan";
		$this->session->set_flashdata('sukses', $pesan);
		$this->Man_mahasiswa->proses_tambah_mahasiswa($param);
		redirect('admin/manajemen_mahasiswa');
	}

	public function hapus_mahasiswa($id_mahasiswa) {
		$pesan = "Data Mahasiswa Berhasil Dihapus";
		$this->session->set_flashdata('sukses', $pesan);
		$this->Man_mahasiswa->hapus_mahasiswa($id_mahasiswa);
	}

	public function ubah_mahasiswa($id_mahasiswa) {
		$data = [
			'active_controller' => 'manajemen_mahasiswa',
			'active_function' => 'form_mahasiswa'
		];

		$data['action'] = 'admin/manajemen_mahasiswa/proses_ubah_mahasiswa/'.$id_mahasiswa;

		$data['judul1'] = 'Ubah Data Mahasiswa</li>';
		$data['judul2'] = '<i class="fa fa-pencil"></i> Ubah Data Mahasiswa</li>';

		$query = $this->Man_mahasiswa->ubah_mahasiswa($id_mahasiswa);

		$data['tampil']['nim_mahasiswa'] = $query['nim_mahasiswa'];
		$data['tampil']['nama_mahasiswa'] = $query['nama_mahasiswa'];
		$data['tampil']['jenis_kelamin'] = $query['jenis_kelamin'];
		$data['tampil']['tempat'] = $query['tempat'];
		$data['tampil']['tanggal'] = $query['tanggal'];
		$data['tampil']['alamat'] = $query['alamat'];
		$data['tampil']['kontak'] = $query['kontak'];
		$data['tampil']['password'] = $query['password'];
		$data['tampil']['id_jurusan'] = $query['jd'];	
		$data['jurusan']=$this->Man_jurusan->tampil_jurusan();
		$this->load->view('admin/template/template', $data);
	}

	public function proses_ubah_mahasiswa($id_mahasiswa) {
		$param = array(
			'nim_mahasiswa' => $this->input->post('nim_mahasiswa'),
			'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'tempat' => $this->input->post('tempat'),
			'tanggal' => $this->input->post('tanggal'),
			'alamat' => $this->input->post('alamat'),
			'kontak' => $this->input->post('kontak'),
			'password' => $this->input->post('password'),
			'id_jurusan' => $this->input->post('id_jurusan')
		);

		$pesan = "Data Mahasiswa Berhasil Diubah";
		$this->session->set_flashdata('sukses', $pesan);
		$this->Man_mahasiswa->proses_ubah_mahasiswa($param, $id_mahasiswa);
		redirect('admin/manajemen_mahasiswa');
	}
}
