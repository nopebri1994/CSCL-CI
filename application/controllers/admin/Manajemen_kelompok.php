<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajemen_kelompok extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('admin/Man_kelompok');
		if($this->session->userdata('login')=='sukses') {
		}
		else {
			redirect('login');
		}
	}

	public function index() {
		

		$data = [
			'active_controller' => 'manajemen_kelompok',
			'active_function' => 'manajemen_kelompok'
		];

		$data['tampil'] = $this->Man_kelompok->tampil_kelompok();

		$this->load->view('admin/template/template', $data);
	}

	public function tambah_kelompok() {
		$data = [
			'active_controller' => 'manajemen_kelompok',
			'active_function' => 'form_kelompok'
		];

		$data['action'] = 'admin/manajemen_kelompok/proses_tambah_kelompok';

		$data['judul1'] = 'Tambah Data Kelompok</li>';
		$data['judul2'] = '<i class="fa fa-plus"></i> Tambah Data Kelompok</li>';

		$data['tampil']['nama_kelompok'] = '';

		$this->load->view('admin/template/template', $data);
	}

	public function proses_tambah_kelompok() {
		$param = array(
			'nama_kelompok' => $this->input->post('nama_kelompok')
		);

		$pesan = "Data Kelompok Berhasil Ditambahkan";
		$this->session->set_flashdata('sukses', $pesan);
		$this->Man_kelompok->proses_tambah_kelompok($param);
		redirect('admin/manajemen_kelompok');
	}

	public function hapus_kelompok($id_kelompok) {
		$pesan = "Data Kelompok Berhasil Dihapus";
		$this->session->set_flashdata('sukses', $pesan);
		$this->Man_kelompok->hapus_kelompok($id_kelompok);
	}

	public function ubah_kelompok($id_kelompok) {
		$data = [
			'active_controller' => 'manajemen_kelompok',
			'active_function' => 'form_kelompok'
		];

		$data['action'] = 'admin/manajemen_kelompok/proses_ubah_kelompok/'.$id_kelompok;

		$data['judul1'] = 'Ubah Data Kelompok</li>';
		$data['judul2'] = '<i class="fa fa-pencil"></i> Ubah Data Kelompok</li>';

		$query = $this->Man_kelompok->ubah_kelompok($id_kelompok);
		$data['tampil']['nama_kelompok'] = $query['nama_kelompok'];

		$this->load->view('admin/template/template', $data);
	}

	public function proses_ubah_kelompok($id_kelompok) {
		$param = array(
			'nama_kelompok' => $this->input->post('nama_kelompok')
		);

		$pesan = "Data Kelompok Berhasil Diubah";
		$this->session->set_flashdata('sukses', $pesan);
		$this->Man_kelompok->proses_ubah_kelompok($param, $id_kelompok);
		redirect('admin/manajemen_kelompok');
	}
}
