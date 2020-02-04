<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruang_obrolan extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('admin/MRuang_obrolan');
		$this->load->model('admin/Man_dosen');
		$this->load->model('admin/MData_ruangobrolan');
		$this->load->model('admin/Man_mahasiswa');

		if($this->session->userdata('login')=='sukses') {
		}
		else {
			redirect('login');
		}
	}

	public function index() {

		$data = [
			'active_controller' => 'ruang_obrolan',
			'active_function' => 'ruang_obrolan'
		];

		$data['tampil'] = $this->MRuang_obrolan->tampil_ruangobrolan();

		$this->load->view('admin/template/template', $data);
	}

	function topik_ruangobrolan() {
		$id=$this->uri->segment(4);
	
		$data = ['active_controller' => 'ruang_obrolan',
				 'active_function' => 'data_forum',
				 'tampil'=>$this->MRuang_obrolan->tampil_ruangobrolan_detail($id),
				 'comment'=>$this->MData_ruangobrolan->tampil_dataruangobrolan_isi($id),
				 'nama_mhs'=>$this->Man_mahasiswa->tampil_mahasiswa(),
				  'nama_dosen'=>$this->Man_dosen->tampil_dosen(),
				 'id_segment'=>$id,
		];

		$this->load->view('admin/template/template', $data);
	}

	public function tambah_ruangobrolan() {
		$data = [
			'active_controller' => 'ruang_obrolan',
			'active_function' => 'form_ruangobrolan'
		];

		$data['action'] = 'admin/ruang_obrolan/proses_tambah_ruangobrolan';

		$data['judul1'] = 'Tambah Data Ruang Obrolan</li>';
		$data['judul2'] = '<i class="fa fa-plus"></i> Tambah Data Ruang Obrolan</li>';

		$data['tampil']['judul_topik'] = '';
		$data['tampil']['isi_topik'] = '';
		$data['tampil']['nama_dosen'] = '';
		$data['tampil']['id_dosen'] = '';
		$data['dosen']=$this->Man_dosen->tampil_dosen();
		
		$this->load->view('admin/template/template', $data);
	}

	public function proses_tambah_ruangobrolan() {
		$param = array(
			'judul_topik' => $this->input->post('judul_topik'),
			'isi_topik' => $this->input->post('isi_topik'),
			'id_dosen' => $this->input->post('id_dosen')
		);

		$pesan = "Data Ruang Obrolan Berhasil Ditambahkan";
		$this->session->set_flashdata('sukses', $pesan);
		$this->MRuang_obrolan->proses_tambah_ruangobrolan($param);
		redirect('admin/data_kelompok');
	}

	public function hapus_ruangobrolan($id_topik) {
		$pesan = "Data Ruang Obrolan Berhasil Dihapus";
		$this->session->set_flashdata('sukses', $pesan);
		$this->MRuang_obrolan->hapus_ruangobrolan($id_topik);
	}
}
