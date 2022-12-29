<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pengembalian extends CI_Model {
    function ambil_datapeminjam() {
        $this->db->select('*');
        $this->db->from('ttransaksi');
        $this->db->join('tdetailtransaksi', 'tdetailtransaksi.id_transaksi = ttransaksi.id_transaksi');
        $this->db->join('tpengunjung', 'ttransaksi.id_pengunjung = tpengunjung.id_pengunjung');
        $this->db->where('tdetailtransaksi.status', 0);
        $this->db->group_by('ttransaksi.id_pengunjung');
        $this->db->order_by('ttransaksi.id_pengunjung', 'DESC');
        return $this->db->get();
    }

    function ambil_detailpeminjaman($id_pengunjung) {
        $this->db->select('*');
        $this->db->from('ttransaksi');
        $this->db->join('tdetailtransaksi', 'tdetailtransaksi.id_transaksi = ttransaksi.id_transaksi');
        $this->db->join('tbuku', 'tdetailtransaksi.id_buku = tbuku.id_buku');
        $this->db->where('ttransaksi.id_pengunjung', $id_pengunjung);
        $this->db->order_by('ttransaksi.tgl_pinjam', 'DESC');
        return $this->db->get();
    }

    function ubah_status_pengembalian($idDetailTransaksi, $tgl_kembali) {
        $data = array(
            'tgl_kembali' => $tgl_kembali,
            'status' => 1
        );
        $this->db->where('id_detail_transaksi', $idDetailTransaksi);
        $this->db->update('tdetailtransaksi', $data);
        // $this->db->select('*');
        // $this->db->from('tdetailtransaksi');
        // $this->db->join('ttransaksi', 'tdetailtransaksi.id_transaksi = ttransaksi.id_transaksi');
    }

    function update_jumlah_buku($idBuku) {
        $data = array(
            'jumlah' => 1
        );
        $this->db->where('id_buku', $idBuku);
        $this->db->update('tbuku', $data);
        // $this->db->set('jumlah', 'jumlah+1');
        // $this->db->where('id_buku', $idBuku);
        // $this->db->update('tbuku');
    }

    function status_peminjaman_pengunjung($id_pengunjung, $id_transaksi) {
        $this->db->select('tdetailtransaksi.status');
        $this->db->from('tdetailtransaksi');
        $this->db->join('ttransaksi', 'tdetailtransaksi.id_transaksi = ttransaksi.id_transaksi');
        $this->db->where('ttransaksi.id_pengunjung', $id_pengunjung);
        $this->db->where('ttransaksi.id_transaksi', $id_transaksi);
        return $this->db->get();
    }
}