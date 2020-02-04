<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajemen_kelas extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('admin/Man_kelas');
		if($this->session->userdata('login')=='sukses') {
		}
		else {
			redirect('login');
		}
	}

	public function index() {
		

		$data = [
			'active_controller' => 'manajemen_kelas',
			'active_function' => 'manajemen_kelas'
		];

		$data['tampil'] = $this->Man_kelas->tampil_kelas();

		$this->load->view('admin/template/template', $data);
	}

	public function tambah_kelas() {
		$data = [
			'active_controller' => 'manajemen_kelas',
			'active_function' => 'form_kelas'
		];

		$data['action'] = 'admin/manajemen_kelas/proses_tambah_kelas';

		$data['judul1'] = 'Tambah Data Kelas</li>';
		$data['judul2'] = '<i class="fa fa-plus"></i> Tambah Data Kelas</li>';

		$data['tampil']['kode_kelas'] = '';
		$data['tampil']['nama_kelas'] = '';
		$data['tampil']['tahun_ajaran'] = '';

		$this->load->view('admin/template/template', $data);
	}

	public function proses_tambah_kelas() {
		$param = array(
			'kode_kelas' => $this->input->post('kode_kelas'),
			'nama_kelas' => $this->input->post('nama_kelas'),
			'tahun_ajaran' => $this->input->post('tahun_ajaran')
		);

		$pesan = "Data Kelas Berhasil Ditambahkan";
		$this->session->set_flashdata('sukses', $pesan);
		$this->Man_kelas->proses_tambah_kelas($param);
		redirect('admin/manajemen_kelas');
	}

	public function hapus_kelas($id_kelas) {
		$pesan = "Data Kelas Berhasil Dihapus";
		$this->session->set_flashdata('sukses', $pesan);
		$this->Man_kelas->hapus_kelas($id_kelas);
	}

	public function ubah_kelas($id_kelas) {
		$data = [
			'active_controller' => 'manajemen_kelas',
			'active_function' => 'form_kelas'
		];

		$data['action'] = 'admin/manajemen_kelas/proses_ubah_kelas/'.$id_kelas;

		$data['judul1'] = 'Ubah Data Kelas</li>';
		$data['judul2'] = '<i class="fa fa-pencil"></i> Ubah Data Kelas</li>';

		$query = $this->Man_kelas->ubah_kelas($id_kelas);
		$data['tampil']['kode_kelas'] = $query['kode_kelas'];
		$data['tampil']['nama_kelas'] = $query['nama_kelas'];
		$data['tampil']['tahun_ajaran'] = $query['tahun_ajaran'];

		$this->load->view('admin/template/template', $data);
	}

	public function proses_ubah_kelas($id_kelas) {
		$param = array(
			'kode_kelas' => $this->input->post('kode_kelas'),
			'nama_kelas' => $this->input->post('nama_kelas'),
			'tahun_ajaran' => $this->input->post('tahun_ajaran')
		);

		$pesan = "Data Kelas Berhasil Diubah";
		$this->session->set_flashdata('sukses', $pesan);
		$this->Man_kelas->proses_ubah_kelas($param, $id_kelas);
		redirect('admin/manajemen_kelas');
	}
}
