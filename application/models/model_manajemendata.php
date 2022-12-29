<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_manajemendata extends CI_Model {
    function ambil_databuku() {
        $this->db->select('*');
        $this->db->from('tbuku');
        $this->db->join('tjenisbuku', 'tbuku.id_jenis_buku = tjenisbuku.id_jenis_buku');
        $this->db->join('trak', 'tbuku.id_rak = trak.id_rak');
        $this->db->order_by('tbuku.id_rak', 'ASC');
        //$this->db->order_by('trak.id_rak', 'id_rak = trak.id_rak', 'ASC');
        return $this->db->get();
    }
    
    function ambil_datajenisbuku() {
        $this->db->select('*');
        $this->db->from('tjenisbuku');
        // $this->db->order_by('tjenisbuku.id_jenis_buku', 'ASC');
        return $this->db->get();
    }
    
    function ambil_datarak() {
        $this->db->select('*');
        $this->db->from('trak');
        // $this->db->order_by('trak.id_rak', 'ASC');
        return $this->db->get();
    }

    public function validation($inputan){
		$this->load->library('form_validation'); // Load library form_validation untuk proses validasinya

		if($inputan == 'inputan') {
			$this->form_validation->set_rules('judulbuku', 'Judulbuku', 'required|trim',
				array('required' => 'Judul Buku harus diisi'));
            // $this->form_validation->set_rules('noinventaris', 'Noinvetaris', 'required|trim',
            //     array('required' => 'No Inventaris harus diisi'));
			// $this->form_validation->set_rules('isbn', 'Isbn', 'required|trim', 
			// 	array('required' => 'ISBN harus diisi'));
			// $this->form_validation->set_rules('pengarang', 'Pengarang', 'required|trim',
			// 	array('required' => 'Pengarang harus diisi'));
			// $this->form_validation->set_rules('penerbit', 'Penerbit', 'required|trim',
			// 	array('required' => 'Penerbit harus diisi'));
			$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim|numeric',
                array('required' => 'Jumlah harus diisi',
                        'numeric' => 'Harus angka'
                ));
			$this->form_validation->set_rules('jenisbuku', 'Jenisbuku', 'required|trim',
				array('required' => 'Jenis Buku harus diisi'));
			$this->form_validation->set_rules('rak', 'Rak', 'required|trim',
				array('required' => 'Rak harus diisi'));
		}

		if($this->form_validation->run()) // Jika validasi benar
			return true; // Maka kembalikan hasilnya dengan TRUE
		else // Jika ada data yang tidak sesuai validasi
			return false; // Maka kembalikan hasilnya dengan FALSE
    }
    
    function simpan($data, $tabel){
		$this->db->insert($tabel, $data); // Untuk mengeksekusi perintah insert data
	}
}