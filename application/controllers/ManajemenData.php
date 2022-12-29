<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManajemenData extends CI_Controller {
    public function __construct() {
        parent:: __construct();
        $this->load->model('model_manajemendata');
        if (!$this->session->userdata('user')) {
            redirect('login');
        }
    }

    public function index() {
        $data['title'] = "Manajemen Buku";
        $data['databuku'] = $this->model_manajemendata->ambil_databuku()->result();
        $data['datajenisbuku'] = $this->model_manajemendata->ambil_datajenisbuku()->result();
        $data['datarak'] = $this->model_manajemendata->ambil_datarak()->result();
        $data['datauser'] = $this->db->get_where('tuser', ['username' => $this->session->userdata('user')])->row_array();
        $this->load->view('templates/view_header', $data);
        $this->load->view('templates/view_sidebar');
        $this->load->view('templates/view_topbar', $data);
        $this->load->view('contents/manajemen_data/buku/view_buku', $data);
        $this->load->view('templates/view_footer');
    }

    public function tambah_aksi() {
        $JUDULBUKU = $this->input->post('judul_buku');
        $NOINVENTARIS = $this->input->post('no_inventaris');
        $ISBN = $this->input->post('isbn');
        $PENGARANG = $this->input->post('pengarang');
        $PENERBIT = $this->input->post('penerbit');
        $JUMLAH = $this->input->post('jumlah');
        $JENISBUKU = $this->input->post('id_jenis_buku');
        $RAK = $this->input->post('id_rak');

        $data = array(
            'id_buku' => $this->db->insert_id(),
            'isbn' => $ISBN,
            'judul_buku' => $JUDULBUKU,
            'no_inventaris' => $NOINVENTARIS,
            'id_jenis_buku' => $JENISBUKU,
            'id_rak' => $RAK,
            'pengarang' => $PENGARANG,
            'penerbit' => $PENERBIT,
            'jumlah' => $JUMLAH
        );

        $this->model_manajemendata->simpan($data, 'tbuku'); // Panggil fungsi simpan() yang ada dimodel_bukutamu.php
        
        $callback = array(
            'status'=>'sukses'
        );
        
		echo json_encode($callback);
    }
}