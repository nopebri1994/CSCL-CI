<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Man_kelompok extends CI_Model {
	public function tampil_kelompok() {
		$this->db->select('id_kelompok, nama_kelompok');
		return $this->db->get('tabel_kelompok')->result();
	}

	public function proses_tambah_kelompok($param) {
		$data = array (
			'nama_kelompok' => $param['nama_kelompok']
		);
		$this->db->insert('tabel_kelompok', $data);
		redirect('admin/manajemen_kelompok');
	}

	public function hapus_kelompok($id_kelompok) {
		$this->db->where('id_kelompok', $id_kelompok);
		$this->db->delete('tabel_kelompok');
		redirect('admin/manajemen_kelompok');
	}

	public function ubah_kelompok($id_kelompok) {
		$this->db->where('id_kelompok', $id_kelompok);
		$this->db->select('id_kelompok, nama_kelompok');
		return $this->db->get('tabel_kelompok')->row_array();
	}

	public function proses_ubah_kelompok($param, $id_kelompok) {
		$data = array (
			'nama_kelompok' => $param['nama_kelompok']
		);
		$this->db->where('id_kelompok', $id_kelompok);
		$this->db->update('tabel_kelompok', $data);
		redirect('admin/manajemen_kelompok');
	}

	public function jumlah_kelompok() {
		$query='SELECT count(tabel_kelompok.id_kelompok) as total from tabel_kelompok';
		return $this->db->query($query);
	}
}
