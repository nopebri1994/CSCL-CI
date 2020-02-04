<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Man_jurusan extends CI_Model {
	public function tampil_jurusan() {
		$this->db->select('id_jurusan, kode_jurusan, nama_jurusan');
		return $this->db->get('jurusan')->result();
	}

	public function proses_tambah_jurusan($param) {
		$data = array (
			'kode_jurusan' => $param['kode_jurusan'],
			'nama_jurusan' => $param['nama_jurusan']
		);
		$this->db->insert('jurusan', $data);
		redirect('admin/manajemen_jurusan');
	}

	public function hapus_jurusan($id_jurusan) {
		$this->db->where('id_jurusan', $id_jurusan);
		$this->db->delete('jurusan');
		redirect('admin/manajemen_jurusan');
	}

	public function ubah_jurusan($id_jurusan) {
		$this->db->where('id_jurusan', $id_jurusan);
		$this->db->select('id_jurusan, kode_jurusan, nama_jurusan');
		return $this->db->get('jurusan')->row_array();
	}

	public function proses_ubah_jurusan($param, $id_jurusan) {
		$data = array (
			'kode_jurusan' => $param['kode_jurusan'],
			'nama_jurusan' => $param['nama_jurusan']
		);
		$this->db->where('id_jurusan', $id_jurusan);
		$this->db->update('jurusan', $data);
		redirect('admin/manajemen_jurusan');
	}

	public function jumlah_jurusan() {
		$query='SELECT count(jurusan.id_jurusan) as total from jurusan';
		return $this->db->query($query);
	}
}
