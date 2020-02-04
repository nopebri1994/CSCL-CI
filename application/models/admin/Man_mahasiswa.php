<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Man_mahasiswa extends CI_Model {
	public function tampil_mahasiswa() {
		$this->db->select('mahasiswa.id_mahasiswa, jurusan.id_jurusan, mahasiswa.id_jurusan, jurusan.nama_jurusan, nim_mahasiswa, nama_mahasiswa, tempat, tanggal, jenis_kelamin, alamat, kontak, nama_jurusan, password');
		$this->db->from('mahasiswa');
		$this->db->join('jurusan','jurusan.id_jurusan=mahasiswa.id_jurusan');
		return $this->db->get()->result();
	}

	public function proses_tambah_mahasiswa($param) {
		$data = array (
			'nim_mahasiswa' => $param['nim_mahasiswa'],
			'nama_mahasiswa' => $param['nama_mahasiswa'],
			'jenis_kelamin' => $param['jenis_kelamin'],
			'tempat' => $param['tempat'],
			'tanggal' => $param['tanggal'],
			'alamat' => $param['alamat'],
			'kontak' => $param['kontak'],
			'password' => $param['password'],
			'id_jurusan' => $this->input->post('jurusan')
		);
		$this->db->insert('mahasiswa', $data);
		redirect('admin/manajemen_mahasiswa');
	}

	public function hapus_mahasiswa($id_mahasiswa) {
		$this->db->where('id_mahasiswa', $id_mahasiswa);
		$this->db->delete('mahasiswa');
		redirect('admin/manajemen_mahasiswa');
	}

	public function ubah_mahasiswa($id_mahasiswa) {
		$this->db->select('mahasiswa.id_mahasiswa, jurusan.id_jurusan as jd, jurusan.nama_jurusan, nim_mahasiswa, nama_mahasiswa, tempat, tanggal, jenis_kelamin, alamat, kontak, nama_jurusan, password');
		$this->db->from('mahasiswa');
		$this->db->join('jurusan','jurusan.id_jurusan=mahasiswa.id_jurusan');
		$this->db->where('id_mahasiswa', $id_mahasiswa);
		return $this->db->get()->row_array();
	}

	public function proses_ubah_mahasiswa($param, $id_mahasiswa) {
		$data = array (
			'nim_mahasiswa' => $param['nim_mahasiswa'],
			'nama_mahasiswa' => $param['nama_mahasiswa'],
			'jenis_kelamin' => $param['jenis_kelamin'],
			'tempat' => $param['tempat'],
			'tanggal' => $param['tanggal'],
			'alamat' => $param['alamat'],
			'kontak' => $param['kontak'],
			'password' => $param['password'],
			'id_jurusan' => $this->input->post('jurusan')
		);
		$this->db->where('id_mahasiswa', $id_mahasiswa);
		$this->db->update('mahasiswa', $data);
		redirect('admin/manajemen_mahasiswa');
	}

	public function jumlah_mahasiswa() {
		$query='SELECT count(mahasiswa.id_mahasiswa) as total from mahasiswa';
		return $this->db->query($query);
	}
}
