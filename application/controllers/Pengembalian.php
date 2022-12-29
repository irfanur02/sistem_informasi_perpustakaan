<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian extends CI_Controller {
    public function __construct() {
        parent:: __construct();
        $this->load->model('model_pengembalian');
        if (!$this->session->userdata('user')) {
            redirect('login');
        }
    }

    public function index() {
        $data['datapeminjaman'] = $this->model_pengembalian->ambil_datapeminjam()->result();
        $data['datauser'] = $this->db->get_where('tuser', ['username' => $this->session->userdata('user')])->row_array();
        
        $data['title'] = "Pengembalian Buku";
        $this->load->view('templates/view_header', $data);
        $this->load->view('templates/view_sidebar');
        $this->load->view('templates/view_topbar', $data);
        $this->load->view('contents/transaksi/pengembalian/view_pengembalian', $data);
        $this->load->view('templates/view_footer');
    }
    
    public function detailPengembalian() {
        $id_pengunjung = $this->uri->segment(3);
        $data['detailpeminjaman'] = $this->model_pengembalian->ambil_detailpeminjaman($id_pengunjung)->result();
        $data['datanama'] = $this->db->get_where('tpengunjung', ['id_pengunjung' => $id_pengunjung])->row_array();
        $data['datauser'] = $this->db->get_where('tuser', ['username' => $this->session->userdata('user')])->row_array();
        $data['title'] = "Detail Data Peminjaman";
        
        $this->load->view('templates/view_header', $data);
        $this->load->view('templates/view_sidebar');
        $this->load->view('templates/view_topbar', $data);
        $this->load->view('contents/transaksi/pengembalian/view_detail_pengembalian', $data);
        $this->load->view('templates/view_footer');
    }

    public function bukuKembali() {
        $idDetailTransaksi = $this->uri->segment(3);
        $idBuku = $this->uri->segment(4);
        $idPengunjung = $this->uri->segment(5);
        $tgl_kembali = date('Y-m-d');
        $this->model_pengembalian->ubah_status_pengembalian($idDetailTransaksi, $tgl_kembali);
        $this->model_pengembalian->update_jumlah_buku($idBuku);
        redirect('pengembalian/detailPengembalian/' . $idPengunjung);
    }
}