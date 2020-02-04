<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajemen_kontrakmatakuliah extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('admin/Man_kontrakmatakuliah');
		$this->load->model('admin/Man_mahasiswa');
		$this->load->model('admin/Man_kelas');
		$this->load->model('admin/Man_matakuliah');
		if($this->session->userdata('login')=='sukses') {
		}
		else {
			redirect('login');
		}
	}

	public function index() {

		$data = [
			'active_controller' => 'manajemen_kontrakmatakuliah',
			'active_function' => 'manajemen_kontrakmatakuliah'
		];

		$data['tampil'] = $this->Man_kontrakmatakuliah->tampil_kontrakmatakuliah();

		$this->load->view('admin/template/template', $data);
	}

	public function tambah_kontrakmatakuliah() {
		$data = [
			'active_controller' => 'manajemen_kontrakmatakuliah',
			'active_function' => 'form_kontrakmatakuliah'
		];

		$data['action'] = 'admin/manajemen_kontrakmatakuliah/proses_tambah_kontrakmatakuliah';

		$data['judul1'] = 'Tambah Data Kontrak Mata Kuliah</li>';
		$data['judul2'] = '<i class="fa fa-plus"></i> Tambah Data Kontrak Mata Kuliah</li>';

		$data['tampil']['nama_mahasiswa'] = '';
		$data['tampil']['nama_kelas'] = '';
		$data['tampil']['nama_matakuliah'] = '';
		$data['tampil']['id_mahasiswa'] = '';
		$data['mahasiswa']=$this->Man_mahasiswa->tampil_mahasiswa();
		$data['tampil']['id_kelas'] = '';
		$data['kelas']=$this->Man_kelas->tampil_kelas();
		$data['tampil']['id_matakuliah'] = '';
		$data['matakuliah']=$this->Man_matakuliah->tampil_matakuliah();
		
		$this->load->view('admin/template/template', $data);
	}

	public function proses_tambah_kontrakmatakuliah() {
		$param = array(
			'id_mahasiswa' => $this->input->post('id_mahasiswa'),
			'id_kelas' => $this->input->post('id_kelas'),
			'id_matakuliah' => $this->input->post('id_matakuliah')
		);

		$pesan = "Data Kontrak Mata Kuliah Berhasil Ditambahkan";
		$this->session->set_flashdata('sukses', $pesan);
		$this->Man_kontrakmatakuliah->proses_tambah_kontrakmatakuliah($param);
		redirect('admin/manajemen_kontrakmatakuliah');
	}

	public function ubah_kontrakmatakuliah($id_mkm) {
		$data = [
			'active_controller' => 'manajemen_kontrakmatakuliah',
			'active_function' => 'form_kontrakmatakuliah'
		];

		$data['action'] = 'admin/manajemen_kontrakmatakuliah/proses_ubah_kontrakmatakuliah/'.$id_mkm;

		$data['judul1'] = 'Ubah Data Kontrak Mata Kuliah</li>';
		$data['judul2'] = '<i class="fa fa-pencil"></i> Ubah Data Kontrak Mata Kuliah</li>';

		$query = $this->Man_kontrakmatakuliah->ubah_kontrakmatakuliah($id_mkm);

		$data['tampil']['nama_mahasiswa'] = $query['nama_mahasiswa'];
		$data['tampil']['nama_kelas'] = $query['nama_kelas'];
		$data['tampil']['nama_matakuliah'] = $query['nama_matakuliah'];
		$data['tampil']['id_mahasiswa'] = $query['m'];
		$data['mahasiswa']=$this->Man_mahasiswa->tampil_mahasiswa();
		$data['tampil']['id_kelas'] = $query['k'];
		$data['kelas']=$this->Man_kelas->tampil_kelas();
		$data['tampil']['id_matakuliah'] = $query['mt'];
		$data['matakuliah']=$this->Man_matakuliah->tampil_matakuliah();

		$this->load->view('admin/template/template', $data);
	}

	public function proses_ubah_kontrakmatakuliah($id_mkm) {
		$param = array(
			'id_mahasiswa' => $this->input->post('id_mahasiswa'),
			'id_kelas' => $this->input->post('id_kelas'),
			'id_matakuliah' => $this->input->post('id_matakuliah')
		);

		$pesan = "Data Kontrak Mata Kuliah Berhasil Diubah";
		$this->session->set_flashdata('sukses', $pesan);
		$this->Man_kontrakmatakuliah->proses_ubah_kontrakmatakuliah($param, $id_mkm);
		redirect('admin/manajemen_kontrakmatakuliah');
	}

	public function hapus_kontrakmatakuliah($id_mkm) {
		$pesan = "Data Kontrak Mata Kuliah Berhasil Dihapus";
		$this->session->set_flashdata('sukses', $pesan);
		$this->Man_kontrakmatakuliah->hapus_kontrakmatakuliah($id_mkm);
	}
}
