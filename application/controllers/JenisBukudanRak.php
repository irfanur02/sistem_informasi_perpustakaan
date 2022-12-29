<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisBukudanRak extends CI_Controller {
    public function __construct() {
        parent:: __construct();
        $this->load->model('model_jenis_buku_dan_rak');
        if (!$this->session->userdata('user')) {
            redirect('login');
        }
    }

    public function index() {
        $data['title'] = "Manajemen Jenis Buku & Rak";
        $data['datajenisbuku'] = $this->model_jenis_buku_dan_rak->ambil_datajenisbuku()->result();
        $data['datajenisrak'] = $this->model_jenis_buku_dan_rak->ambil_datarak()->result();
        $data['datauser'] = $this->db->get_where('tuser', ['username' => $this->session->userdata('user')])->row_array();
        $this->load->view('templates/view_header', $data);
        $this->load->view('templates/view_sidebar');
        $this->load->view('templates/view_topbar', $data);
        $this->load->view('contents/manajemen_data/jenisbukudanrak/view_jenisbukudanrak', $data);
        $this->load->view('templates/view_footer');
    }

    public function tambahjenisbuku(){
        $data['title'] = "Tambah Jenis Buku";
        $data['datajenisbuku'] = $this->model_jenis_buku_dan_rak->ambil_datajenisbuku()->result();
        $data['datauser'] = $this->db->get_where('tuser', ['username' => $this->session->userdata('user')])->row_array();
        $this->load->view('templates/view_header', $data);
        $this->load->view('templates/view_sidebar');
        $this->load->view('templates/view_topbar',$data);
        $this->load->view('contents/manajemen_data/jenisbukudanrak/view_jenisbuku_input',$data);
        $this->load->view('templates/view_footer');
    }

        public function tambahrak(){
        $data['title'] = "Tambah Rak";
        $data['datarak'] = $this->model_jenis_buku_dan_rak->ambil_datarak()->result();
        $data['datauser'] = $this->db->get_where('tuser', ['username' => $this->session->userdata('user')])->row_array();
        $this->load->view('templates/view_header', $data);
        $this->load->view('templates/view_sidebar');
        $this->load->view('templates/view_topbar', $data);
        $this->load->view('contents/manajemen_data/jenisbukudanrak/view_rak_input',$data);
        $this->load->view('templates/view_footer');
    }

    public function tambah_aksi_jenisbuku() {
        $JENIS_BUKU = $this->input->post('jenis_buku');
        $ID_JENIS_BUKU = $this->input->post('id_jenis_buku');

        $data = array(
            'id_jenis_buku' => $this->db->insert_id(),
            'jenis_buku' => $JENIS_BUKU
            );

        $this->model_jenis_buku_dan_rak->simpan($data, 'tjenisbuku');
        redirect('jenisbukudanrak/index');
    }    

    public function tambah_aksi_rak() {
        $RAK = $this->input->post('rak');
        $ID_RAK = $this->input->post('id_rak');

        $data = array(
            'id_rak' => $this->db->insert_id(),
            'rak' => $RAK
            );

        $this->model_jenis_buku_dan_rak->simpan($data, 'trak');
        redirect('jenisbukudanrak/index');
    }

    public function editjenisbuku($id_jenis_buku){
        $data['title'] = "Edit Jenis Buku";
        $where=array('id_jenis_buku'=>$id_jenis_buku);
        $data['tjenisbuku']=$this->model_jenis_buku_dan_rak->edit_data($where,'tjenisbuku')->result();
        $data['datajenisbuku'] = $this->model_jenis_buku_dan_rak->ambil_datajenisbuku()->result();
        $data['datauser'] = $this->db->get_where('tuser', ['username' => $this->session->userdata('user')])->row_array();
        $this->load->view('templates/view_header', $data);
        $this->load->view('templates/view_sidebar');
        $this->load->view('templates/view_topbar', $data);
        $this->load->view('contents/manajemen_data/jenisbukudanrak/view_jenisbuku_edit',$data);
        $this->load->view('templates/view_footer');
    }

    public function updatejenisbuku(){
        $ID = $this->input->post('id');
        $JENIS_BUKU = $this->input->post('jenis_buku');

        $data = array(
            'jenis_buku' => $JENIS_BUKU
            );

        $where=array(
            'id_jenis_buku'=>$ID
            );

        $this->model_jenis_buku_dan_rak->update_data($where, $data, 'tjenisbuku');
        redirect('jenisbukudanrak/index');
    }

    public function hapusjenisbuku(){
        $id_jenis_buku = $this->input->post('id_jenis_buku');
        $where=array('id_jenis_buku'=>$id_jenis_buku);
        $this->model_jenis_buku_dan_rak->hapus_data($where, 'tjenisbuku');

        $callback = array(
            'status'=>"sukses"
        );
        
		$data = json_encode($callback);
		echo $data;
    }    

    public function hapusrak(){
        $id_rak = $this->input->post('id_rak');
        $where=array('id_rak'=>id_rak);
        $this->model_jenis_buku_dan_rak->hapus_data($where, 'trak');

        $callback = array(
            'status'=>"sukses"
        );
        
        $data = json_encode($callback);
    }

    public function editrak($id_rak){
        $data['title'] = "Edit Rak";
        $where=array('id_rak'=>$id_rak);
        $data['trak']=$this->model_jenis_buku_dan_rak->edit_data($where,'trak')->result();
        $data['datarak'] = $this->model_jenis_buku_dan_rak->ambil_datarak()->result();
        $data['datauser'] = $this->db->get_where('tuser', ['username' => $this->session->userdata('user')])->row_array();
        $this->load->view('templates/view_header', $data);
        $this->load->view('templates/view_sidebar');
        $this->load->view('templates/view_topbar', $data);
        $this->load->view('contents/manajemen_data/jenisbukudanrak/view_rak_edit',$data);
        $this->load->view('templates/view_footer');
    }

    public function updaterak(){
        $ID = $this->input->post('id');
        $RAK = $this->input->post('rak');

        $data = array(
            'rak' => $RAK
            );

        $where=array(
            'id_rak'=>$ID
            );

        $this->model_jenis_buku_dan_rak->update_data($where, $data, 'trak');
        redirect('jenisbukudanrak/index');
    }
}