<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_bukutamu extends CI_Model {
	public function __construct() {
		parent:: __construct();
		$this->load->library('form_validation'); // Load library form_validation untuk proses validasinya
	}

    function ambil_data_bukutamu() {
        $this->db->select('*');
				$this->db->from('tbukutamu');
				$this->db->join('tpengunjung', 'tbukutamu.id_pengunjung = tpengunjung.id_pengunjung');
				$this->db->order_by('tanggal', 'DESC');
        return $this->db->get();
	}
	
	function ambil_data_buku() {
		$this->db->select('judul_buku');
		$this->db->from('tbuku');
		$this->db->order_by('judul_buku', 'ASC');
		return $this->db->get();
	}

	function ambil_data_pengunjung() {
		$this->db->select('*');
		$this->db->from('tpengunjung');
		$this->db->order_by('nama', 'ASC');
		return $this->db->get();
	}

	function autocompleteNama($params = array()) {
		$this->db->select("*");
        $this->db->from('tpengunjung');
        
        //fetch data by conditions
        // if(array_key_exists("kondisi",$params)){
        //     foreach ($params['kondisi'] as $key => $value) {
        //         $this->db->where($key,$value);
        //     }
        // }
        
        //search by terms
        if(!empty($params['cariKeyword'])){
			$this->db->like('nama', $params['cariKeyword']);
			$query = $this->db->get();
            $result = $query->row_array();
        }
        
        $this->db->order_by('nama', 'asc');
        
        // if(array_key_exists("id",$params)){
        //     $this->db->where('id',$params['id']);
        //     $query = $this->db->get();
        //     $result = $query->row_array();
        // }else{
        //     $query = $this->db->get();
        //     $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
        // }

        // return fetched data
        return $result;
    }

    public function validation($inputan, $keperluan){
		if($inputan == 'inputan') {
			$this->form_validation->set_rules('namaSimpan', 'NamaSimpan', 'required|trim', 
				array('required' => 'Nama harus diisi'));
			if ($keperluan == 'Lainnya') {
				$this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim',
					array('required' => 'Keterangan harus diisi'));
			} elseif ($keperluan == 'Pinjam Buku') {
				$this->form_validation->set_rules('buku[]', 'Buku[]', 'required|trim',
					array('required' => 'Keterangan Baca harus diisi'));
			}
		}

		if($this->form_validation->run()) // Jika validasi benar
			return true; // Maka kembalikan hasilnya dengan TRUE
		else // Jika ada data yang tidak sesuai validasi
			return false; // Maka kembalikan hasilnya dengan FALSE
	}
	
	public function validationpengunjung($inputan, $status){
		if($inputan == 'inputandaftar') {
			$this->form_validation->set_rules('namaDaftar', 'NamaDaftar', 'required|trim', 
				array('required' => 'Nama harus diisi'));
			if ($status == '1') {
				$this->form_validation->set_rules('alamatDaftar', 'AlamatDaftar', 'required|trim', 
					array('required' => 'Alamat / Instansi harus diisi'));
			} elseif ($status == '0') {
				$this->form_validation->set_rules('unitkerja', 'Unitkerja', 'required|trim', 
					array('required' => 'Unit Kerja harus diisi'));
			}
		}

		if($this->form_validation->run()) // Jika validasi benar
			return true; // Maka kembalikan hasilnya dengan TRUE
		else // Jika ada data yang tidak sesuai validasi
			return false; // Maka kembalikan hasilnya dengan FALSE
	}

    function simpan($data, $tabel){
		$this->db->insert($tabel, $data); // Untuk mengeksekusi perintah insert data
	}
	
	function simpan_pengunjung($data, $tabel){
		$this->db->insert($tabel, $data); // Untuk mengeksekusi perintah insert data
	}
}