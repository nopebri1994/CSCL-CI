<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajemen_matakuliah extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('admin/Man_matakuliah');
		if($this->session->userdata('login')=='sukses') {
		}
		else {
			redirect('login');
		}
	}

	public function index() {

		$data = [
			'active_controller' => 'manajemen_matakuliah',
			'active_function' => 'manajemen_matakuliah'
		];

		$data['tampil'] = $this->Man_matakuliah->tampil_matakuliah();

		$this->load->view('admin/template/template', $data);
	}

	public function tambah_matakuliah() {
		$data = [
			'active_controller' => 'manajemen_matakuliah',
			'active_function' => 'form_matakuliah'
		];

		$data['action'] = 'admin/manajemen_matakuliah/proses_tambah_matakuliah';

		$data['judul1'] = 'Tambah Data Mata Kuliah</li>';
		$data['judul2'] = '<i class="fa fa-plus"></i> Tambah Data Mata Kuliah</li>';

		$data['tampil']['kode_matakuliah'] = '';
		$data['tampil']['nama_matakuliah'] = '';

		$this->load->view('admin/template/template', $data);
	}

	public function proses_tambah_matakuliah() {
		$param = array(
			'kode_matakuliah' => $this->input->post('kode_matakuliah'),
			'nama_matakuliah' => $this->input->post('nama_matakuliah')
		);

		$pesan = "Data Mata Kuliah Berhasil Ditambahkan";
		$this->session->set_flashdata('sukses', $pesan);
		$this->Man_matakuliah->proses_tambah_matakuliah($param);
		redirect('admin/manajemen_matakuliah');
	}

	public function hapus_matakuliah($id_matakuliah) {
		$pesan = "Data Mata Kuliah Berhasil Dihapus";
		$this->session->set_flashdata('sukses', $pesan);
		$this->Man_matakuliah->hapus_matakuliah($id_matakuliah);
	}

	public function ubah_matakuliah($id_matakuliah) {
		$data = [
			'active_controller' => 'manajemen_matakuliah',
			'active_function' => 'form_matakuliah'
		];

		$data['action'] = 'admin/manajemen_matakuliah/proses_ubah_matakuliah/'.$id_matakuliah;

		$data['judul1'] = 'Ubah Data Mata Kuliah';
		$data['judul2'] = '<i class="fa fa-pencil"></i> Ubah Data Mata Kuliah</li>';

		$query = $this->Man_matakuliah->ubah_matakuliah($id_matakuliah);
		$data['tampil']['kode_matakuliah'] = $query['kode_matakuliah'];
		$data['tampil']['nama_matakuliah'] = $query['nama_matakuliah'];

		$this->load->view('admin/template/template', $data);
	}

	public function proses_ubah_matakuliah($id_matakuliah) {
		$param = array(
			'kode_matakuliah' => $this->input->post('kode_matakuliah'),
			'nama_matakuliah' => $this->input->post('nama_matakuliah')
		);

		$pesan = "Data Mata Kuliah Berhasil Diubah";
		$this->session->set_flashdata('sukses', $pesan);
		$this->Man_matakuliah->proses_ubah_matakuliah($param, $id_matakuliah);
		redirect('admin/manajemen_matakuliah');
	}
}
