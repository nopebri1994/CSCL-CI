<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_kelompok extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('admin/MData_kelompok');
		$this->load->model('admin/Man_kelompok');
		$this->load->model('admin/Man_mahasiswa');
		if($this->session->userdata('login')=='sukses') {
		}
		else {
			redirect('login');
		}
	}

	public function index() {
	

		$data = [
			'active_controller' => 'data_kelompok',
			'active_function' => 'data_kelompok'
		];

		$data['tampil'] = $this->MData_kelompok->tampil_datakelompok();

		$this->load->view('admin/template/template', $data);
	}

	public function tambah_datakelompok() {
		$data = [
			'active_controller' => 'data_kelompok',
			'active_function' => 'form_datakelompok'
		];

		$data['action'] = 'admin/data_kelompok/proses_tambah_datakelompok';

		$data['judul1'] = 'Tambah Data Kelompok</li>';
		$data['judul2'] = '<i class="fa fa-plus"></i> Tambah Data Kelompok</li>';

		$data['tampil']['nama_kelompok'] = '';
		$data['tampil']['nama_mahasiswa'] = '';
		$data['tampil']['id_kelompok'] = '';
		$data['kelompok']=$this->Man_kelompok->tampil_kelompok();
		$data['tampil']['id_mahasiswa'] = '';
		$data['mahasiswa']=$this->Man_mahasiswa->tampil_mahasiswa();
		
		$this->load->view('admin/template/template', $data);
	}

	public function proses_tambah_datakelompok() {
		$param = array(
			'id_kelompok' => $this->input->post('id_kelompok'),
			'id_mahasiswa' => $this->input->post('id_mahasiswa')
		);

		$pesan = "Data Kelompok Berhasil Ditambahkan";
		$this->session->set_flashdata('sukses', $pesan);
		$this->MData_kelompok->proses_tambah_datakelompok($param);
		redirect('admin/data_kelompok');
	}

	public function ubah_datakelompok($id_datakelompok) {
		$data = [
			'active_controller' => 'data_kelompok',
			'active_function' => 'form_datakelompok'
		];

		$data['action'] = 'admin/data_kelompok/proses_ubah_datakelompok/'.$id_datakelompok;

		$data['judul1'] = 'Ubah Data Kelompok</li>';
		$data['judul2'] = '<i class="fa fa-pencil"></i> Ubah Data Kelompok</li>';

		$query = $this->MData_kelompok->ubah_datakelompok($id_datakelompok);

		$data['tampil']['nama_kelompok'] = $query['nama_kelompok'];
		$data['tampil']['nama_mahasiswa'] = $query['nama_mahasiswa'];
		$data['tampil']['id_kelompok'] = $query['ke'];
		$data['kelompok']=$this->Man_kelompok->tampil_kelompok();
		$data['tampil']['id_mahasiswa'] = $query['m'];
		$data['mahasiswa']=$this->Man_mahasiswa->tampil_mahasiswa();

		$this->load->view('admin/template/template', $data);
	}

	public function proses_ubah_datakelompok($id_datakelompok) {
		$param = array(
			'id_kelompok' => $this->input->post('id_kelompok'),
			'id_mahasiswa' => $this->input->post('id_mahasiswa')
		);

		$pesan = "Data Kelompok Berhasil Diubah";
		$this->session->set_flashdata('sukses', $pesan);
		$this->MData_kelompok->proses_ubah_datakelompok($param, $id_datakelompok);
		redirect('admin/data_kelompok');
	}

	public function hapus_datakelompok($id_datakelompok) {
		$pesan = "Data Kelompok Berhasil Dihapus";
		$this->session->set_flashdata('sukses', $pesan);
		$this->MData_kelompok->hapus_datakelompok($id_datakelompok);
	}
}
