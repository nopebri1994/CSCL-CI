<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MData_kelompok extends CI_Model {
	public function tampil_datakelompok() {
		$this->db->select('data_kelompok.id_kelompok, data_kelompok.id_mahasiswa,
						   nama_kelompok, nama_mahasiswa, id_datakelompok');
		$this->db->from('data_kelompok');
		$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa=data_kelompok.id_mahasiswa');
		$this->db->join('tabel_kelompok', 'tabel_kelompok.id_kelompok=data_kelompok.id_kelompok');
		return $this->db->get('')->result();
	}
	
	public function proses_tambah_datakelompok($param) {
		$data = array (
			'id_kelompok' => $this->input->post('kelompok'),
			'id_mahasiswa' => $this->input->post('mahasiswa')
		);
		$this->db->insert('data_kelompok', $data);
		redirect('admin/data_kelompok');
	}

	public function ubah_datakelompok($id_datakelompok) {
		$this->db->select('data_kelompok.id_kelompok as ke, data_kelompok.id_mahasiswa as m,
						   nama_kelompok, nama_mahasiswa, id_datakelompok');
		$this->db->from('data_kelompok');
		$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa=data_kelompok.id_mahasiswa');
		$this->db->join('tabel_kelompok', 'tabel_kelompok.id_kelompok=data_kelompok.id_kelompok');
		$this->db->where('id_datakelompok', $id_datakelompok);
		return $this->db->get()->row_array();
	}

	public function proses_ubah_datakelompok($param, $id_datakelompok) {
		$data = array (
			'id_kelompok' => $this->input->post('kelompok'),
			'id_mahasiswa' => $this->input->post('mahasiswa')
		);
		$this->db->where('id_datakelompok', $id_datakelompok);
		$this->db->update('data_kelompok', $data);
		redirect('admin/data_kelompok');
	}

	public function hapus_datakelompok($id_datakelompok) {
		$this->db->where('id_datakelompok', $id_datakelompok);
		$this->db->delete('data_kelompok');
		redirect('admin/data_kelompok');
	}
}
