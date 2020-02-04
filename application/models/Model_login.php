<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model {

  function cek() {
    $kode_pengguna = set_value('kode_pengguna');
    $katasandi_pengguna = set_value('katasandi_pengguna');
    $level=set_value('level');
    if($level=='admin'){
            $hasil = $this->db->where('kode_pengguna', $kode_pengguna)
                              ->where('katasandi_pengguna', $katasandi_pengguna)
                              ->limit (1)
                              ->get('pengguna');

            if($hasil->num_rows() > 0) {
              return $hasil->row();
            }
            else {
              return array();
            }
      }else if($level=='dosen'){
             $hasil = $this->db->where('nip_dosen', $kode_pengguna)
                              ->where('password', $katasandi_pengguna)
                              ->limit (1)
                              ->get('dosen');

            if($hasil->num_rows() > 0) {
              return $hasil->row();
            }
            else {
              return array();
            }
      }else{
         $hasil = $this->db->where('nim_mahasiswa', $kode_pengguna)
                              ->where('password', $katasandi_pengguna)
                              ->limit (1)
                              ->get('mahasiswa');

            if($hasil->num_rows() > 0) {
              return $hasil->row();
            }
            else {
              return array();
            }
      }
  }
      function menu($level){

      }
}