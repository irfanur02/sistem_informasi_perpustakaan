<?php

class Model_laporan_pengunjung extends CI_Model{
	//membuat fungsi
	function ambil_data(){
		//ambil data dari tabel jadwal
		$this->db->select('*');
		$this->db->from('tbukutamu');
        $this->db->order_by('tanggal', 'DESC');
        $this->db->group_by('tanggal');
		return $this->db->get();
	}

    function ambil_data_detail($tanggal){
        //ambil data dari tabel jadwal
        $this->db->select('*');
        $this->db->from('tbukutamu');
        $this->db->join('tpengunjung', 'tbukutamu.id_pengunjung = tpengunjung.id_pengunjung');
        $this->db->where('tanggal', $tanggal);
        //$this->db->order_by('tanggal', 'DESC');
        //$this->db->group_by('tanggal');
        return $this->db->get();
    }

    function jumlah(){
        $this->db->select('tanggal, COUNT(tanggal) as total');
        // $this->db->where('month(tanggal)='. $bulan .' and year(tanggal)='. $tahun .'');
        $this->db->from('tbukutamu');
        // $this->db->where('tanggal', '' . date('Y-m-d'). '');
        $this->db->group_by('tanggal');  
        $this->db->order_by('tanggal', 'DESC');  
        $hasil = $this->db->get();
        return $hasil;
    }

    function filter_laporan($bulan, $tahun){
        $this->db->select('tanggal, count(tanggal) as total');
        $this->db->where('month(tanggal)='. $bulan .' and year(tanggal)='. $tahun .'');
        $this->db->group_by('tanggal');  
        $this->db->order_by('tanggal', 'DESC');  
        $hasil = $this->db->get('tbukutamu');
        return $hasil;
    }
    
    function data_bukutamu($bulan, $tahun){
        $this->db->select('tanggal, keperluan, keterangan');
        $this->db->where('month(tanggal)='. $bulan .' and year(tanggal)='. $tahun .'');
        $this->db->order_by('tanggal', 'ASC');  
        $hasil = $this->db->get('tbukutamu');
        return $hasil;
    }

    function data_peminjaman($bulan, $tahun) {
        $this->db->select('*');
        $this->db->from('ttransaksi');
        $this->db->join('tdetailtransaksi', 'ttransaksi.id_transaksi = tdetailtransaksi.id_transaksi');
        $this->db->join('tbuku', 'tdetailtransaksi.id_buku = tbuku.id_buku');
        $this->db->where('month(ttransaksi.tgl_pinjam)='. $bulan .' and year(ttransaksi.tgl_pinjam)='. $tahun .'');
        $this->db->order_by('.ttransaksi.tgl_pinjam', 'ASC');  
        return $this->db->get();
    }

    function ambil_tahun() {
        $this->db->select('tanggal');
        $this->db->from('tbukutamu');
        $this->db->order_by('tanggal', 'DESC');
        $this->db->group_by('year(tanggal)');
        return $this->db->get();
    }
}
?>