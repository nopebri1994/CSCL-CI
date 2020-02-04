<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Man_kelas extends CI_Model {
	public function tampil_kelas() {
		$this->db->select('id_kelas, kode_kelas, nama_kelas, tahun_ajaran');
		return $this->db->get('kelas')->result();
	}

	public function proses_tambah_kelas($param) {
		$data = array (
			'kode_kelas' => $param['kode_kelas'],
			'nama_kelas' => $param['nama_kelas'],
			'tahun_ajaran' => $param['tahun_ajaran']
		);
		$this->db->insert('kelas', $data);
		redirect('admin/manajemen_kelas');
	}

	public function hapus_kelas($id_kelas) {
		$this->db->where('id_kelas', $id_kelas);
		$this->db->delete('kelas');
		redirect('admin/manajemen_kelas');
	}

	public function ubah_kelas($id_kelas) {
		$this->db->where('id_kelas', $id_kelas);
		$this->db->select('id_kelas, kode_kelas, nama_kelas, tahun_ajaran');
		return $this->db->get('kelas')->row_array();
	}

	public function proses_ubah_kelas($param, $id_kelas) {
		$data = array (
			'kode_kelas' => $param['kode_kelas'],
			'nama_kelas' => $param['nama_kelas'],
			'tahun_ajaran' => $param['tahun_ajaran']
		);
		$this->db->where('id_kelas', $id_kelas);
		$this->db->update('kelas', $data);
		redirect('admin/manajemen_kelas');
	}

	public function jumlah_kelas() {
		$query='SELECT count(kelas.id_kelas) as total from kelas';
		return $this->db->query($query);
	}
}
