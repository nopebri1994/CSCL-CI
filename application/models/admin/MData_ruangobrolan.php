<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MData_ruangobrolan extends CI_Model {
	public function tampil_dataruangobrolan() {
		$this->db->select('tabel_forum.id_topik, tabel_forum.id_dosen, tabel_forum.id_mahasiswa,
						   judul_topik, nama_dosen, nama_mahasiswa, tabel_forum.isi_forum, tabel_forum.tanggal, id_forum');
		$this->db->from('tabel_forum');
		$this->db->join('tabel_topik', 'tabel_topik.id_topik=tabel_forum.id_topik');
		$this->db->join('dosen', 'dosen.id_dosen=tabel_forum.id_dosen');
		$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa=tabel_forum.id_mahasiswa');
		return $this->db->get('')->result();
	}

	function tampil_dataruangobrolan_isi($id) {
		$this->db->select('tabel_forum.id_topik, tabel_forum.id_dosen, tabel_forum.id_mahasiswa,
						   judul_topik, tabel_forum.isi_forum, tabel_forum.tanggal, id_forum');
		$this->db->from('tabel_forum');
		$this->db->join('tabel_topik', 'tabel_topik.id_topik=tabel_forum.id_topik');
		$this->db->where('tabel_forum.id_topik',$id);
		return $this->db->get('')->result();
	}
	function input_msg() {
		if($this->session->userdata('level')=='dosen'){
		$data=array(
					'isi_forum'=>$this->input->post('message'),
					'tanggal'=>date('Y/m/d'),
					'id_topik'=>$this->input->post('segment'),
					'id_dosen'=>$this->session->userdata('id_dosen'),
					'id_mahasiswa'=>null
				);
		$this->db->insert('tabel_forum',$data);
	}else{
		$data=array(
					'isi_forum'=>$this->input->post('message'),
					'tanggal'=>date('Y/m/d'),
					'id_topik'=>$this->input->post('segment'),
					'id_dosen'=>null,
					'id_mahasiswa'=>$this->session->userdata('id_mahasiswa')
				);
		$this->db->insert('tabel_forum',$data);
	}
	}
}
