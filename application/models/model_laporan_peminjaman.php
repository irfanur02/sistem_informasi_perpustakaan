<?php

class Model_laporan_peminjaman extends CI_Model{
	//membuat fungsi
	function ambil_data(){
        $this->db->select('*');
        $this->db->from('ttransaksi');
        $this->db->join('tpengunjung', 'ttransaksi.id_pengunjung = tpengunjung.id_pengunjung');
        $this->db->group_by('tpengunjung.nama');
        $this->db->order_by('tpengunjung.nama', 'ASC');
        return $this->db->get();
	}

    function ambil_data_detail($id_pengunjung){
        $this->db->select('*, DATEDIFF(tdetailtransaksi.tgl_kembali, ttransaksi.tgl_pinjam) as lama');
        $this->db->from('ttransaksi');
        $this->db->join('tdetailtransaksi', 'ttransaksi.id_transaksi = tdetailtransaksi.id_transaksi');
        $this->db->join('tbuku', 'tdetailtransaksi.id_buku = tbuku.id_buku');
        $this->db->join('tpengunjung', 'ttransaksi.id_pengunjung = tpengunjung.id_pengunjung');
        $this->db->join('tuser', 'ttransaksi.id_user = tuser.id_user');
        $this->db->where('ttransaksi.id_pengunjung', $id_pengunjung);
        return $this->db->get();
    }

    function lama_pinjam(){
        $this->db->select('*, DATEDIFF(ttransaksi.tgl_pinjam, tdetailtransaksi.tgl_kembali) as lama');
        $this->db->from('ttransaksi');
        $this->db->join('tdetailtransaksi', 'ttransaksi.id_transaksi = tdetailtransaksi.id_transaksi');
        $this->db->join('tbuku', 'tdetailtransaksi.id_buku = tbuku.id_buku');
        $this->db->join('tpengunjung', 'ttransaksi.id_pengunjung = tpengunjung.id_pengunjung');
        $this->db->join('tuser', 'ttransaksi.id_user = tuser.id_user');
        return $this->db->get();
    }

    function ambil_data_waktu() {
        $this->db->select('*');
        $this->db->from('ttransaksi');
        $this->db->join('tdetailtransaksi', 'ttransaksi.id_transaksi = tdetailtransaksi.id_transaksi');
        return $this->db->get();
    }
}
?>