<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Man_kontrakmatakuliah extends CI_Model {
	public function tampil_kontrakmatakuliah() {
		$this->db->select('tabel_mkm.id_mahasiswa, tabel_mkm.id_kelas, tabel_mkm.id_matakuliah,
						   nama_mahasiswa, nama_kelas, nama_matakuliah, id_mkm');
		$this->db->from('tabel_mkm');
		$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa=tabel_mkm.id_mahasiswa');
		$this->db->join('kelas', 'kelas.id_kelas=tabel_mkm.id_kelas');
		$this->db->join('mata_kuliah', 'mata_kuliah.id_matakuliah=tabel_mkm.id_matakuliah');
		return $this->db->get('')->result();
	}
	
	public function proses_tambah_kontrakmatakuliah($param) {
		$data = array (
			'id_mahasiswa' => $this->input->post('mahasiswa'),
			'id_kelas' => $this->input->post('kelas'),
			'id_matakuliah' => $this->input->post('matakuliah')
		);
		$this->db->insert('tabel_mkm', $data);
		redirect('admin/manajemen_kontrakmatakuliah');
	}

	public function ubah_kontrakmatakuliah($id_mkm) {
		$this->db->select('tabel_mkm.id_mahasiswa as m, tabel_mkm.id_kelas as k, tabel_mkm.id_matakuliah as mt,
						   nama_mahasiswa, nama_kelas, nama_matakuliah, id_mkm');
		$this->db->from('tabel_mkm');
		$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa=tabel_mkm.id_mahasiswa');
		$this->db->join('kelas', 'kelas.id_kelas=tabel_mkm.id_kelas');
		$this->db->join('mata_kuliah', 'mata_kuliah.id_matakuliah=tabel_mkm.id_matakuliah');
		$this->db->where('id_mkm', $id_mkm);
		return $this->db->get()->row_array();
	}

	public function proses_ubah_kontrakmatakuliah($param, $id_mkm) {
		$data = array (
			'id_mahasiswa' => $this->input->post('mahasiswa'),
			'id_kelas' => $this->input->post('kelas'),
			'id_matakuliah' => $this->input->post('matakuliah')
		);
		$this->db->where('id_mkm', $id_mkm);
		$this->db->update('tabel_mkm', $data);
		redirect('admin/manajemen_kontrakmatakuliah');
	}

	public function hapus_kontrakmatakuliah($id_mkm) {
		$this->db->where('id_mkm', $id_mkm);
		$this->db->delete('tabel_mkm');
		redirect('admin/manajemen_kontrakmatakuliah');
	}
}
