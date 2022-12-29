<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatransaksi extends CI_Controller {
    public function __construct() {
        parent:: __construct();
        $this->load->model('model_datatransaksi');
        if (!$this->session->userdata('user')) {
            redirect('login');
        }
    }

    public function index() {
        $data['datapeminjaman'] = $this->model_datatransaksi->ambil_data_peminjaman()->result();
        $data['datapengembalian'] = $this->model_datatransaksi->ambil_data_pengembalian()->result();
        $data['datauser'] = $this->db->get_where('tuser', ['username' => $this->session->userdata('user')])->row_array();

        $data['title'] = "Riwayat Transaksi";
        $this->load->view('templates/view_header', $data);
        $this->load->view('templates/view_sidebar');
        $this->load->view('templates/view_topbar', $data);
        $this->load->view('contents/transaksi/view_datatransaksi', $data);
        $this->load->view('templates/view_footer');
    }
}