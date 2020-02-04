<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajemen_ruangobrolan extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('admin/Man_ruangobrolan');
		$this->load->model('admin/Man_kelas');
		$this->load->model('admin/Man_kelompok');
		if($this->session->userdata('login')=='sukses') {
		}
		else {
			redirect('login');
		}
	}

	public function index() {
		

		$data = [
			'active_controller' => 'manajemen_ruangobrolan',
			'active_function' => 'manajemen_ruangobrolan'
		];
		$data['kelas']=$this->Man_kelas->tampil_kelas();
		$data['kelompok']=$this->Man_kelompok->tampil_kelompok();
		$data['tampil'] = $this->Man_ruangobrolan->tampil_ruangobrolan();

		$this->load->view('admin/template/template', $data);
	}

	public function tambah_ruangobrolan() {
		$data = [
			'active_controller' => 'manajemen_ruangobrolan',
			'active_function' => 'form_ruangobrolan'
		];

		$data['action'] = 'admin/manajemen_ruangobrolan/proses_tambah_ruangobrolan';

		$data['judul1'] = 'Tambah Data Ruang Obrolan</li>';
		$data['judul2'] = '<i class="fa fa-plus"></i> Tambah Data Ruang Obrolan</li>';

		$data['tampil']['id_topik'] = '';
		$data['tampil']['judul_topik'] = '';
		$data['tampil']['isi_topik'] = '';
		$data['tampil']['tanggal'] = '';
		$data['kelas']=$this->Man_kelas->tampil_kelas();
		$data['kelompok']=$this->Man_kelompok->tampil_kelompok();
		$this->load->view('admin/template/template', $data);
	}

	public function proses_tambah_ruangobrolan() {
		$param = array(
			'judul_topik' => $this->input->post('judul_topik')
		);

		$pesan = "Data Ruang Obrolan Berhasil Ditambahkan";
		$this->session->set_flashdata('sukses', $pesan);		
		$this->Man_ruangobrolan->proses_tambah_ruangobrolan();
		redirect('admin/manajemen_ruangobrolan');
	}

	public function hapus_ruangobrolan($id_topik) {
		$pesan = "Data Ruang Obrolan Berhasil Dihapus";
		$this->session->set_flashdata('sukses', $pesan);
		$this->Man_ruangobrolan->hapus_ruangobrolan($id_topik);
	}

	public function ubah_ruangobrolan($id_topik) {
		$data = [
			'active_controller' => 'manajemen_ruangobrolan',
			'active_function' => 'form_ruangobrolan'
		];

		$data['action'] = 'admin/manajemen_ruangobrolan/proses_ubah_ruangobrolan/'.$id_topik;

		$data['judul1'] = 'Ubah Data Ruang Obrolan</li>';
		$data['judul2'] = '<i class="fa fa-pencil"></i> Ubah Data Ruang Obrolan</li>';

		$query = $this->Man_ruangobrolan->ubah_ruangobrolan($id_topik);

		$data['tampil']['id_topik'] = $query['id_topik'];
		$data['tampil']['judul_topik'] = $query['judul_topik'];
		$data['tampil']['isi_topik'] = $query['isi_topik'];
		$data['tampil']['id_kelompok']=$query['id_kelompok'];
		$data['tampil']['id_kelas']=$query['id_kelas'];
		$data['kelas']=$this->Man_kelas->tampil_kelas();
		$data['kelompok']=$this->Man_kelompok->tampil_kelompok();
		$this->load->view('admin/template/template', $data);
	}

	public function proses_ubah_ruangobrolan($id_topik) {
		$param = array(
			'judul_topik' => $this->input->post('judul'),
			'isi_topik' => $this->input->post('isi'),
			);

		$pesan = "Data Ruang Obrolan Berhasil Diubah";
		$this->session->set_flashdata('sukses', $pesan);
		$this->Man_ruangobrolan->proses_ubah_ruangobrolan($param, $id_topik);
		redirect('admin/manajemen_ruangobrolan');
	}
}
