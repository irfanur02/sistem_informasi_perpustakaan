<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_peminjaman extends CI_Model {
    function ambil_data_buku() {
        $this->db->select('*');
        $this->db->from('tbuku');
        // $this->db->join('tjenisbuku', 'tbuku.id_jenis_buku = tjenisbuku.id_jenis_buku');
        // $this->db->join('trak', 'tjenisbuku.id_rak = trak.id_rak');
        return $this->db->get();
    }

    function simpan_transaksi($data, $tabel) {
        $this->db->insert($tabel, $data);
    }

    function simpan_detail_transaksi($data, $tabel) {
        $this->db->insert($tabel, $data);
    }

    function update_jml_buku($where, $tabel) {
        $this->db->set('jumlah', 'jumlah-1');
        $this->db->where('id_buku', $where);
        $this->db->update('tbuku');
    }

    function cari_status_buku($idbuku) {
        $this->db->select('*');
        $this->db->from('ttransaksi');
        $this->db->join('tdetailtransaksi', 'tdetailtransaksi.id_transaksi = ttransaksi.id_transaksi');
        $this->db->where('tdetailtransaksi.status', '0');
        $this->db->where('tdetailtransaksi.id_buku', $idbuku);
        return $this->db->get();
    }

    function ambil_idTransaksi() {
        $this->db->select_max('id_transaksi');
        $this->db->from('ttransaksi');
        return $this->db->get();
    }
}