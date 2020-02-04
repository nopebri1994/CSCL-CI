<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Man_ruangobrolan extends CI_Model {
	public function tampil_ruangobrolan() {
		$id_dosen=$this->session->userdata('id_dosen');
		$this->db->select('tabel_tujuantopik.id_tujuantopik, tabel_topik.id_topik, tabel_tujuantopik.id_topik, tabel_topik.judul_topik, tanggal_topik, isi_topik, id_kelas, id_kelompok');
		$this->db->from('tabel_topik');
		$this->db->join('tabel_tujuantopik','tabel_tujuantopik.id_topik = tabel_topik.id_topik');
		$this->db->where('tabel_topik.id_dosen',$id_dosen);
		return $this->db->get()->result();
	}

	public function proses_tambah_ruangobrolan() {
		
		$data = array('judul_topik' => $this->input->post('judul'),
					  'isi_topik' => $this->input->post('isi'),
					  'tanggal_topik' => date('Y/m/d'),
					  'id_dosen' => $this->session->userdata('id_dosen'),
					);

		$this->db->insert('tabel_topik', $data);
		$query = 'SELECT id_topik FROM tabel_topik ORDER BY id_topik DESC LIMIT 1';
		$last_id = $this->db->query($query);
		
		foreach($last_id->result() as $ls) {
			$id_l = $ls->id_topik;
		}
		
		if($this->input->post('kelas')!="") {
			$data1 = array('id_kelas' => $this->input->post('kelas'),
				           'id_topik' => $id_l,
			);
		}
		else if($kelompok = $this->input->post('kelompok')!="") {
			$data1 = array('id_kelompok' => $kelompok = $this->input->post('kelompok'),
						   'id_topik' => $id_l,
			);
		}
		
		$this->db->insert('tabel_tujuantopik', $data1);	
	}

	public function hapus_ruangobrolan($id_topik) {
		$this->db->where('id_topik', $id_topik);
		$this->db->delete('tabel_tujuantopik');
		$this->db->where('id_topik', $id_topik);
		$this->db->delete('tabel_topik');
		redirect('admin/manajemen_ruangobrolan');
	}

	public function ubah_ruangobrolan($id_topik) {
		$this->db->select('tabel_tujuantopik.id_tujuantopik, tabel_topik.id_topik, tabel_topik.judul_topik, tanggal_topik, isi_topik, id_kelas, id_kelompok');
		$this->db->from('tabel_topik');
		$this->db->join('tabel_tujuantopik','tabel_tujuantopik.id_topik = tabel_topik.id_topik');
		$this->db->where('tabel_topik.id_topik',$id_topik);
		return $this->db->get()->row_array();
	}

	public function proses_ubah_ruangobrolan($param, $id_topik) {
		$data = array (
			'judul_topik' => $param['judul_topik'],
			'isi_topik' => $param['isi_topik'],
			'tanggal_topik' =>date('Y/m/d'),
			'id_dosen' => $this->session->userdata('id_dosen')
		);
		$this->db->select('*');
		$this->db->from('tabel_tujuantopik');
		$this->db->where('id_topik',$id_topik);
		$cek_relasi=$this->db->get()->row_array();

		if($this->input->post('kelas')!="") {
			$data1 = array('id_kelas' => $this->input->post('kelas'),
				           'id_topik' => $id_topik,
				           'id_kelompok'=>null,
				           );
		}
		else if($kelompok = $this->input->post('kelompok')!="") {
			$data1 = array('id_kelompok' => $kelompok = $this->input->post('kelompok'),
						   'id_topik' => $id_topik,
						   'id_kelas'=>null,
			);
		}
		$this->db->where('id_tujuantopik',$cek_relasi['id_tujuantopik']);
		$this->db->update('tabel_tujuantopik', $data1);	
		$this->db->where('id_topik', $id_topik);
		$this->db->update('tabel_topik', $data);
		redirect('admin/manajemen_ruangobrolan');
	}
}
