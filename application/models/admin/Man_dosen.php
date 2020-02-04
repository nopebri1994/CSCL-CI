<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Man_dosen extends CI_Model {
	public function tampil_dosen() {
		$this->db->select('id_dosen, nip_dosen, nama_dosen, tempat, tanggal, jenis_kelamin, alamat, kontak, password');
		return $this->db->get('dosen')->result();
	}

	public function proses_tambah_dosen($param) {
		$data = array (
			'nip_dosen' => $param['nip_dosen'],
			'nama_dosen' => $param['nama_dosen'],
			'jenis_kelamin' => $param['jenis_kelamin'],
			'tempat' => $param['tempat'],
			'tanggal' => $param['tanggal'],
			'alamat' => $param['alamat'],
			'kontak' => $param['kontak'],
			'password' => $param['password']

		);
		$this->db->insert('dosen', $data);
		redirect('admin/manajemen_dosen');
	}

	public function hapus_dosen($id_dosen) {
		$this->db->where('id_dosen', $id_dosen);
		$this->db->delete('dosen');
		redirect('admin/manajemen_dosen');
	}

	public function ubah_dosen($id_dosen) {
		$this->db->where('id_dosen', $id_dosen);
		$this->db->select('id_dosen, nip_dosen, nama_dosen, tempat, tanggal, jenis_kelamin, alamat, kontak, password');
		return $this->db->get('dosen')->row_array();
	}

	public function proses_ubah_dosen($param, $id_dosen) {
		$data = array (
			'nip_dosen' => $param['nip_dosen'],
			'nama_dosen' => $param['nama_dosen'],
			'jenis_kelamin' => $param['jenis_kelamin'],
			'tempat' => $param['tempat'],
			'tanggal' => $param['tanggal'],
			'alamat' => $param['alamat'],
			'kontak' => $param['kontak'],
			'password' => $param['password']
		);
		$this->db->where('id_dosen', $id_dosen);
		$this->db->update('dosen', $data);
		redirect('admin/manajemen_dosen');
	}

	public function jumlah_dosen() {
		$query='SELECT count(dosen.id_dosen) as total from dosen';
		return $this->db->query($query);
	}
}
