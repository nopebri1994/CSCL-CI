<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajemen_tenagapengajar extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('admin/Man_tenagapengajar');
		$this->load->model('admin/Man_dosen');
		$this->load->model('admin/Man_matakuliah');
		$this->load->model('admin/Man_jurusan');
		$this->load->model('admin/Man_kelas');

		if($this->session->userdata('login')=='sukses') {
		}
		else {
			redirect('login');
		}
	}

	public function index() {

		$data = [
			'active_controller' => 'manajemen_tenagapengajar',
			'active_function' => 'manajemen_tenagapengajar'
		];

		$data['tampil'] = $this->Man_tenagapengajar->tampil_tenagapengajar();

		$this->load->view('admin/template/template', $data);
	}

	public function tambah_tenagapengajar() {
		$data = [
			'active_controller' => 'manajemen_tenagapengajar',
			'active_function' => 'form_tenagapengajar'
		];

		$data['action'] = 'admin/manajemen_tenagapengajar/proses_tambah_tenagapengajar';

		$data['judul1'] = 'Tambah Data Tenaga Pengajar</li>';
		$data['judul2'] = '<i class="fa fa-plus"></i> Tambah Data Tenaga Pengajar</li>';

		$data['tampil']['nama_dosen'] = '';
		$data['tampil']['nama_matakuliah'] = '';
		$data['tampil']['nama_jurusan'] = '';
		$data['tampil']['nama_kelas'] = '';
		$data['tampil']['id_dosen'] = '';
		$data['dosen']=$this->Man_dosen->tampil_dosen();
		$data['tampil']['id_matakuliah'] = '';
		$data['matakuliah']=$this->Man_matakuliah->tampil_matakuliah();
		$data['tampil']['id_jurusan'] = '';
		$data['jurusan']=$this->Man_jurusan->tampil_jurusan();
		$data['tampil']['id_kelas'] = '';
		$data['kelas']=$this->Man_kelas->tampil_kelas();
		
		$this->load->view('admin/template/template', $data);
	}

	public function proses_tambah_tenagapengajar() {
		$param = array(
			'id_dosen' => $this->input->post('id_dosen'),
			'id_matakuliah' => $this->input->post('id_matakuliah'),
			'id_jurusan' => $this->input->post('id_jurusan'),
			'id_kelas' => $this->input->post('id_kelas')
		);

		$pesan = "Data Tenaga Pengajar Berhasil Ditambahkan";
		$this->session->set_flashdata('sukses', $pesan);
		$this->Man_tenagapengajar->proses_tambah_tenagapengajar($param);
		redirect('admin/manajemen_tenagapengajar');
	}

	public function ubah_tenagapengajar($id_matkul) {
		$data = [
			'active_controller' => 'manajemen_tenagapengajar',
			'active_function' => 'form_tenagapengajar'
		];

		$data['action'] = 'admin/manajemen_tenagapengajar/proses_ubah_tenagapengajar/'.$id_matkul;

		$data['judul1'] = 'Ubah Data Tenaga Pengajar</li>';
		$data['judul2'] = '<i class="fa fa-pencil"></i> Ubah Data Tenaga Pengajar</li>';

		$query = $this->Man_tenagapengajar->ubah_tenagapengajar($id_matkul);

		$data['tampil']['nama_dosen'] = $query['nama_dosen'];
		$data['tampil']['nama_matakuliah'] = $query['nama_matakuliah'];
		$data['tampil']['nama_jurusan'] = $query['nama_jurusan'];
		$data['tampil']['nama_kelas'] = $query['nama_kelas'];
		$data['tampil']['id_dosen'] = $query['d'];
		$data['dosen']=$this->Man_dosen->tampil_dosen();
		$data['tampil']['id_matakuliah'] = $query['mk'];
		$data['matakuliah']=$this->Man_matakuliah->tampil_matakuliah();
		$data['tampil']['id_jurusan'] = $query['j'];
		$data['jurusan']=$this->Man_jurusan->tampil_jurusan();
		$data['tampil']['id_kelas'] = $query['k'];
		$data['kelas']=$this->Man_kelas->tampil_kelas();
		$this->load->view('admin/template/template', $data);
	}

	public function proses_ubah_tenagapengajar($id_matkul) {
		$param = array(
			'id_dosen' => $this->input->post('id_dosen'),
			'id_matakuliah' => $this->input->post('id_matakuliah'),
			'id_jurusan' => $this->input->post('id_jurusan'),
			'id_kelas' => $this->input->post('id_kelas')
		);

		$pesan = "Data Tenaga Pengajar Berhasil Diubah";
		$this->session->set_flashdata('sukses', $pesan);
		$this->Man_tenagapengajar->proses_ubah_tenagapengajar($param, $id_matkul);
		redirect('admin/manajemen_tenagapengajar');
	}

	public function hapus_tenagapengajar($id_matkul) {
		$pesan = "Data Tenaga Pengajar Berhasil Dihapus";
		$this->session->set_flashdata('sukses', $pesan);
		$this->Man_tenagapengajar->hapus_tenagapengajar($id_matkul);
	}
}
