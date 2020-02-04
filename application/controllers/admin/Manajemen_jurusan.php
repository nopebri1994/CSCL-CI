<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajemen_jurusan extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('admin/Man_jurusan');
		if($this->session->userdata('login')=='sukses') {
		}
		else {
			redirect('login');
		}
	}

	public function index() {
		
		$data = [
			'active_controller' => 'manajemen_jurusan',
			'active_function' => 'manajemen_jurusan'
		];

		$data['tampil'] = $this->Man_jurusan->tampil_jurusan();

		$this->load->view('admin/template/template', $data);
	}

	public function tambah_jurusan() {
		$data = [
			'active_controller' => 'manajemen_jurusan',
			'active_function' => 'form_jurusan'
		];

		$data['action'] = 'admin/manajemen_jurusan/proses_tambah_jurusan';

		$data['judul1'] = 'Tambah Data Jurusan</li>';
		$data['judul2'] = '<i class="fa fa-plus"></i> Tambah Data Jurusan</li>';

		$data['tampil']['kode_jurusan'] = '';
		$data['tampil']['nama_jurusan'] = '';

		$this->load->view('admin/template/template', $data);
	}

	public function proses_tambah_jurusan() {
		$param = array(
			'kode_jurusan' => $this->input->post('kode_jurusan'),
			'nama_jurusan' => $this->input->post('nama_jurusan')
		);

		$pesan = "Data Jurusan Berhasil Ditambahkan";
		$this->session->set_flashdata('sukses', $pesan);
		$this->Man_jurusan->proses_tambah_jurusan($param);
		redirect('admin/manajemen_jurusan');
	}

	public function hapus_jurusan($id_jurusan) {
		$pesan = "Data Jurusan Berhasil Dihapus";
		$this->session->set_flashdata('sukses', $pesan);
		$this->Man_jurusan->hapus_jurusan($id_jurusan);
	}

	public function ubah_jurusan($id_jurusan) {
		$data = [
			'active_controller' => 'manajemen_jurusan',
			'active_function' => 'form_jurusan'
		];

		$data['action'] = 'admin/manajemen_jurusan/proses_ubah_jurusan/'.$id_jurusan;

		$data['judul1'] = 'Ubah Data Jurusan</li>';
		$data['judul2'] = '<i class="fa fa-pencil"></i> Ubah Data Jurusan</li>';

		$query = $this->Man_jurusan->ubah_jurusan($id_jurusan);
		$data['tampil']['kode_jurusan'] = $query['kode_jurusan'];
		$data['tampil']['nama_jurusan'] = $query['nama_jurusan'];

		$this->load->view('admin/template/template', $data);
	}

	public function proses_ubah_jurusan($id_jurusan) {
		$param = array(
			'kode_jurusan' => $this->input->post('kode_jurusan'),
			'nama_jurusan' => $this->input->post('nama_jurusan')
		);

		$pesan = "Data Jurusan Berhasil Diubah";
		$this->session->set_flashdata('sukses', $pesan);
		$this->Man_jurusan->proses_ubah_jurusan($param, $id_jurusan);
		redirect('admin/manajemen_jurusan');
	}
}
