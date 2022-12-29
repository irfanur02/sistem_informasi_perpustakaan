<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_datatransaksi extends CI_Model {
	public function __construct() {
		parent:: __construct();
    }

    function ambil_data_peminjaman() {
        $this->db->select('*');
        $this->db->from('ttransaksi');
        $this->db->join('tdetailtransaksi', 'ttransaksi.id_transaksi = tdetailtransaksi.id_transaksi');
        $this->db->join('tbuku', 'tdetailtransaksi.id_buku = tbuku.id_buku');
        $this->db->join('tpengunjung', 'ttransaksi.id_pengunjung = tpengunjung.id_pengunjung');
        $this->db->order_by('ttransaksi.tgl_pinjam', 'DESC');
        return $this->db->get();
    }

    function ambil_data_pengembalian() {
        $this->db->select('*');
        $this->db->from('tdetailtransaksi');
        $this->db->join('tbuku', 'tdetailtransaksi.id_buku = tbuku.id_buku');
        $this->db->join('ttransaksi', 'tdetailtransaksi.id_transaksi = ttransaksi.id_transaksi');
        $this->db->join('tpengunjung', 'ttransaksi.id_pengunjung = tpengunjung.id_pengunjung');
        $this->db->where('tdetailtransaksi.status', '1');
        $this->db->order_by('tdetailtransaksi.tgl_kembali', 'DESC');
        return $this->db->get();
    }
}