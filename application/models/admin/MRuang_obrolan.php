<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MRuang_obrolan extends CI_Model {
	public function tampil_ruangobrolan() {
		$id_dosen=$this->session->userdata('id_dosen');
		$id_mahasiswa=$this->session->userdata('id_mahasiswa');
		$this->db->select('tabel_topik.id_topik, tabel_tujuantopik.id_topik, tabel_topik.id_dosen, judul_topik, isi_topik, tanggal_topik, nama_dosen');
		$this->db->from('tabel_topik');
		$this->db->join('tabel_tujuantopik','tabel_tujuantopik.id_topik=tabel_topik.id_topik');
		$this->db->join('dosen','dosen.id_dosen=tabel_topik.id_dosen');
		if($this->session->userdata('level')=='dosen'){
			$this->db->where('tabel_topik.id_dosen',$id_dosen);
		}else if($this->session->userdata('level')=='mahasiswa'){
			$this->db->join('tabel_mkm','tabel_mkm.id_kelas=tabel_tujuantopik.id_kelas');
			$this->db->where('tabel_mkm.id_mahasiswa',$id_mahasiswa);
		}
		return $this->db->get('')->result();
	}

	public function proses_tambah_ruangobrolan($param) {
		$data = array (
			'judul_topik' => $param['judul_topik'],
			'isi_topik' => $param['isi_topik'],
			'tanggal_topik' => date('Y/m/d'),
			'id_dosen' => $this->input->post('dosen')
		);
		$this->db->insert('tabel_topik', $data);
		redirect('admin/ruang_obrolan');
	}

	public function hapus_ruangobrolan($id_topik) {
		$this->db->where('id_topik', $id_topik);
		$this->db->delete('tabel_tujuantopik');
		$this->db->where('id_topik', $id_topik);
		$this->db->delete('tabel_topik');
		redirect('admin/manajemen_ruangobrolan');
	}
	public function tampil_ruangobrolan_detail($id) {
		$this->db->select('tabel_topik.id_topik, tabel_tujuantopik.id_topik, tabel_topik.id_dosen, judul_topik, isi_topik, tanggal_topik, nama_dosen');
		$this->db->from('tabel_topik');
		$this->db->join('tabel_tujuantopik','tabel_tujuantopik.id_topik=tabel_topik.id_topik');
		$this->db->join('dosen','dosen.id_dosen=tabel_topik.id_dosen');
		$this->db->where('tabel_topik.id_topik',$id);
		return $this->db->get()->row_array();
	}
}
