<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_buku extends CI_Model {
    function ambil_databuku() {
        $this->db->select('*');
        $this->db->from('tbuku');
        $this->db->join('tjenisbuku', 'tbuku.id_jenis_buku = tjenisbuku.id_jenis_buku');
        $this->db->join('trak', 'tbuku.id_rak = trak.id_rak');
        $this->db->order_by('tbuku.id_rak', 'ASC');
        //$this->db->order_by('trak.id_rak', 'id_rak = trak.id_rak', 'ASC');
        return $this->db->get();
    }
    
    function ambil_datajenisbuku() {
        $this->db->select('*');
        $this->db->from('tjenisbuku');
        //$this->db->order_by('tjenisbuku.id_jenis_buku', 'ASC');
        return $this->db->get();
    }
    
    function ambil_datarak() {
        $this->db->select('*');
        $this->db->from('trak');
       // $this->db->order_by('trak.id_rak', 'ASC');
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