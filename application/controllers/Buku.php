<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {
    public function __construct() {
        parent:: __construct();
        $this->load->model('model_buku');
        if (!$this->session->userdata('user')) {
            redirect('login');
        }
    }


    public function tambah(){
        $data['title'] = "Tambah Buku";
        $data['datajenisbuku'] = $this->model_buku->ambil_datajenisbuku()->result();
        $data['datarak'] = $this->model_buku->ambil_datarak()->result();
        $data['datauser'] = $this->db->get_where('tuser', ['username' => $this->session->userdata('user')])->row_array();
        $this->load->view('templates/view_header', $data);
        $this->load->view('templates/view_sidebar');
        $this->load->view('templates/view_topbar', $data);
        $this->load->view('contents/manajemen_data/buku/view_buku_input',$data);
        $this->load->view('templates/view_footer');
    }

    public function index() {
        $data['title'] = "Manajemen Buku";
        $data['databuku'] = $this->model_buku->ambil_databuku()->result();
        $data['datajenisbuku'] = $this->model_buku->ambil_datajenisbuku()->result();
        $data['datarak'] = $this->model_buku->ambil_datarak()->result();
        $data['datauser'] = $this->db->get_where('tuser', ['username' => $this->session->userdata('user')])->row_array();
        $this->load->view('templates/view_header', $data);
        $this->load->view('templates/view_sidebar');
        $this->load->view('templates/view_topbar', $data);
        $this->load->view('contents/manajemen_data/buku/view_buku', $data);
        $this->load->view('templates/view_footer');
    }

    public function tambah_aksi() {
        $ISBN = $this->input->post('isbn');
        $JUDUL_BUKU = $this->input->post('judul_buku');
        $NO_INVENTARIS = $this->input->post('no_inventaris');
        $PENGARANG = $this->input->post('pengarang');
        $PENERBIT = $this->input->post('penerbit');
        $JUMLAH = $this->input->post('jumlah');
        $ID_JENIS_BUKU = $this->input->post('id_jenis_buku');
        $ID_RAK = $this->input->post('id_rak');

        $data = array(
            'id_buku' => $this->db->insert_id(),
            'isbn' => $ISBN,
            'judul_buku' => $JUDUL_BUKU,
            'no_inventaris' => $NO_INVENTARIS,
            'id_jenis_buku' => $ID_JENIS_BUKU,
            'id_rak' => $ID_RAK,
            'pengarang' => $PENGARANG,
            'penerbit' => $PENERBIT,
            'jumlah' => $JUMLAH
            );

        $this->model_buku->simpan($data, 'tbuku');
        redirect('buku/index');
    }

    public function edit($id_buku){
        $data['title'] = "Manajemen Buku";
        $where=array('id_buku'=>$id_buku);
        $data['tbuku']=$this->model_buku->edit_data($where,'tbuku')->result();
        $data['datajenisbuku'] = $this->model_buku->ambil_datajenisbuku()->result();
        $data['datarak'] = $this->model_buku->ambil_datarak()->result();
        $data['datauser'] = $this->db->get_where('tuser', ['username' => $this->session->userdata('user')])->row_array();
        $this->load->view('templates/view_header', $data);
        $this->load->view('templates/view_sidebar');
        $this->load->view('templates/view_topbar', $data);
        $this->load->view('contents/manajemen_data/buku/view_buku_edit',$data);
        $this->load->view('templates/view_footer');
    }

    public function update(){
        $ID = $this->input->post('id');
        $ISBN = $this->input->post('isbn');
        $JUDUL_BUKU = $this->input->post('judul_buku');
        $NO_INVENTARIS = $this->input->post('no_inventaris');
        $PENGARANG = $this->input->post('pengarang');
        $PENERBIT = $this->input->post('penerbit');
        $JUMLAH = $this->input->post('jumlah');
        $ID_JENIS_BUKU = $this->input->post('id_jenis_buku');
        $ID_RAK = $this->input->post('id_rak');

        $data = array(
            'isbn' => $ISBN,
            'judul_buku' => $JUDUL_BUKU,
            'no_inventaris' => $NO_INVENTARIS,
            'id_jenis_buku' => $ID_JENIS_BUKU,
            'id_rak' => $ID_RAK,
            'pengarang' => $PENGARANG,
            'penerbit' => $PENERBIT,
            'jumlah' => $JUMLAH
            );

        $where=array(
            'id_buku'=>$ID
            );

        $this->model_buku->update_data($where, $data, 'tbuku');
        redirect('buku/index');
    }

    public function hapus(){
        $id_buku = $this->input->post('id_buku');
        $where=array('id_buku'=>$id_buku);
        $this->model_buku->hapus_data($where, 'tbuku');
        
        $callback = array(
            'status'=>'sukses'
        );
        
		echo json_encode($callback);
    }
}