<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Man_matakuliah extends CI_Model {
	public function tampil_matakuliah() {
		$this->db->select('id_matakuliah, kode_matakuliah, nama_matakuliah');
		return $this->db->get('mata_kuliah')->result();
	}

	public function proses_tambah_matakuliah($param) {
		$data = array (
			'kode_matakuliah' => $param['kode_matakuliah'],
			'nama_matakuliah' => $param['nama_matakuliah']
		);
		$this->db->insert('mata_kuliah', $data);
		redirect('admin/manajemen_matakuliah');
	}

	public function hapus_matakuliah($id_matakuliah) {
		$this->db->where('id_matakuliah', $id_matakuliah);
		$this->db->delete('mata_kuliah');
		redirect('admin/manajemen_matakuliah');
	}

	public function ubah_matakuliah($id_matakuliah) {
		$this->db->where('id_matakuliah', $id_matakuliah);
		$this->db->select('id_matakuliah, kode_matakuliah, nama_matakuliah');
		return $this->db->get('mata_kuliah')->row_array();
	}

	public function proses_ubah_matakuliah($param, $id_matakuliah) {
		$data = array (
			'kode_matakuliah' => $param['kode_matakuliah'],
			'nama_matakuliah' => $param['nama_matakuliah']
		);
		$this->db->where('id_matakuliah', $id_matakuliah);
		$this->db->update('mata_kuliah', $data);
		redirect('admin/manajemen_matakuliah');
	}

	public function jumlah_matakuliah() {
		$query='SELECT count(mata_kuliah.id_matakuliah) as total from mata_kuliah';
		return $this->db->query($query);
	}
}
