<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_jenis_buku_dan_rak extends CI_Model {
    function ambil_datajenisbuku() {
        $this->db->select('*');
        $this->db->from('tjenisbuku');
        $this->db->order_by('jenis_buku', 'ASC');
        return $this->db->get();
    }

    function ambil_datarak() {
        $this->db->select('*');
        $this->db->from('trak');
        $this->db->order_by('rak', 'ASC');
        return $this->db->get();
    }
    
    function simpan($data, $tabel){
		$this->db->insert($tabel, $data); // Untuk mengeksekusi perintah insert data
	}

    function edit_data($where,$tabel){
    return $this->db->get_where($tabel, $where);
  }

    function update_data($where,$data,$tabel){
    $this->db->where($where);
    $this->db->update($tabel,$data);
  }

    function hapus_data($where, $tabel){
        $this->db->where($where);
        $this->db->delete($tabel);
    }
}