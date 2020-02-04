<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Man_tenagapengajar extends CI_Model {
	public function tampil_tenagapengajar() {
		$this->db->select('tabel_matkul.id_dosen, tabel_matkul.id_matakuliah, tabel_matkul.id_jurusan, tabel_matkul.id_kelas,
						   nama_dosen, nama_matakuliah, nama_jurusan, nama_kelas, id_matkul');
		$this->db->from('tabel_matkul');
		$this->db->join('dosen', 'dosen.id_dosen=tabel_matkul.id_dosen');
		$this->db->join('mata_kuliah', 'mata_kuliah.id_matakuliah=tabel_matkul.id_matakuliah');
		$this->db->join('jurusan', 'jurusan.id_jurusan=tabel_matkul.id_jurusan');
		$this->db->join('kelas', 'kelas.id_kelas=tabel_matkul.id_kelas');
		return $this->db->get('')->result();
	}
	
	public function proses_tambah_tenagapengajar($param) {
		$data = array (
			'id_dosen' => $this->input->post('dosen'),
			'id_matakuliah' => $this->input->post('matakuliah'),
			'id_jurusan' => $this->input->post('jurusan'),
			'id_kelas' => $this->input->post('kelas')
		);
		$this->db->insert('tabel_matkul', $data);
		redirect('admin/manajemen_tenagapengajar');
	}

	public function ubah_tenagapengajar($id_matkul) {
		$this->db->select('tabel_matkul.id_dosen as d, tabel_matkul.id_matakuliah as mk, tabel_matkul.id_jurusan as j,
						   tabel_matkul.id_kelas as k,
						   nama_dosen, nama_matakuliah, nama_jurusan, nama_kelas, id_matkul');
		$this->db->from('tabel_matkul');
		$this->db->join('dosen', 'dosen.id_dosen=tabel_matkul.id_dosen');
		$this->db->join('mata_kuliah', 'mata_kuliah.id_matakuliah=tabel_matkul.id_matakuliah');
		$this->db->join('jurusan', 'jurusan.id_jurusan=tabel_matkul.id_jurusan');
		$this->db->join('kelas', 'kelas.id_kelas=tabel_matkul.id_kelas');
		$this->db->where('id_matkul', $id_matkul);
		return $this->db->get()->row_array();
	}

	public function proses_ubah_tenagapengajar($param, $id_matkul) {
		$data = array (
			'id_dosen' => $this->input->post('dosen'),
			'id_matakuliah' => $this->input->post('matakuliah'),
			'id_jurusan' => $this->input->post('jurusan'),
			'id_kelas' => $this->input->post('kelas')
		);
		$this->db->where('id_matkul', $id_matkul);
		$this->db->update('tabel_matkul', $data);
		redirect('admin/manajemen_tenagapengajar');
	}

	public function hapus_tenagapengajar($id_matkul) {
		$this->db->where('id_matkul', $id_matkul);
		$this->db->delete('tabel_matkul');
		redirect('admin/manajemen_tenagapengajar');
	}
}
