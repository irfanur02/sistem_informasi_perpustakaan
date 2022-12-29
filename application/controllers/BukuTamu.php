<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BukuTamu extends CI_Controller {
    public function __construct() {
        parent:: __construct();
        $this->load->model('model_bukutamu');
        if (!$this->session->userdata('user')) {
            redirect('login');
        }
    }

    public function index() {
        $data['tamu'] = $this->model_bukutamu->ambil_data_bukutamu()->result();
        $data['judulbuku'] = $this->model_bukutamu->ambil_data_buku()->result();
        $data['datapengunjung'] = $this->model_bukutamu->ambil_data_pengunjung()->result();
        $data['datauser'] = $this->db->get_where('tuser', ['username' => $this->session->userdata('user')])->row_array();

        $data['title'] = "Buku Tamu";
        $this->load->view('templates/view_header', $data);
        $this->load->view('templates/view_sidebar');
        $this->load->view('templates/view_topbar', $data);
        $this->load->view('contents/buku_tamu/view_buku_tamu', $data);
        $this->load->view('templates/view_footer');
    }

    public function autocompleteBukutamu() {
        $returnData = $this->db->get('tpengunjung');
        // Return results as json encoded array
        echo json_encode($returnData->result());
    }

    public function daftar_pengunjung() {
        $NAMA = $this->input->post('namaDaftar');
        $STATUS = $this->input->post('status');
        if ($STATUS == 'nonpegawai') {
            $STATUS = '1';
            $ALAMAT = $this->input->post('alamatDaftar');
            $UNITKERJA = '-';
        } elseif ($STATUS == 'pegawai') {
            $STATUS = '0';
            $UNITKERJA = $this->input->post('unitkerja');
            $ALAMAT = '-';
        }

        $data = array(
            'id_pengunjung' => $this->db->insert_id(),
            'nama' => $NAMA,
            'alamat' => $ALAMAT,
            'status' => $STATUS,
            'unit_kerja' => $UNITKERJA
        );
            
        $this->model_bukutamu->simpan_pengunjung($data, 'tpengunjung');
                
        $callback = array(
            'status'=>'sukses',
            'pesan'=>'Daftar telah Berhasil'
        );
        
		echo json_encode($callback);
    }

    public function tambah_aksi() {
        $TANGGAL = date('Y-m-d');
        $ID_PENGUNJUNG = $this->input->post('id_pengunjung');
        $KEPERLUAN = $this->input->post('keperluan');
        
        if ($KEPERLUAN == 'baca') {
            $KEPERLUAN = 'Baca Buku';
            $KETERANGAN = $this->input->post('buku');
            if (!is_array($KETERANGAN)) {
                $KETERANGAN = array();
            }
            $KETERANGAN = implode(", ", $KETERANGAN);
        } elseif ($KEPERLUAN == 'pinjam') {
            $KEPERLUAN = 'Pinjam Buku';
            $KETERANGAN = '-';
        } elseif ($KEPERLUAN == 'lainnya') {
            $KEPERLUAN = 'Lainnya';
            $KETERANGAN = $this->input->post('keterangan');
        }

        if($this->model_bukutamu->validation("inputan", $KEPERLUAN)){ // Jika validasi sukses atau hasil validasi adalah true
            // $KEPERLUAN = $KETERANGAN;
            $data = array(
                'id_buku_tamu' => $this->db->insert_id(),
                'id_pengunjung' => $ID_PENGUNJUNG,
                'keperluan' => $KEPERLUAN,
                'keterangan' => $KETERANGAN,
                'tanggal' => $TANGGAL
            );

            $this->model_bukutamu->simpan($data, 'tbukutamu'); // Panggil fungsi simpan() yang ada di model_bukutamu.php

            // Load ulang view.php agar data yang baru bisa muncul di tabel pada view.php
            $html = $this->load->view('contents/buku_tamu/view_data_tamu', array('tamu'=>$this->model_bukutamu->ambil_data_bukutamu()->result()), true);
                
            $callback = array(
                'status'=>'sukses',
                'pesan'=>'Data berhasil disimpan',
                'html'=>$html
            );
		}else{
            $callback = array(
                'status'=>'gagal',
				'pesan'=>validation_errors()
			);
		}
        
		echo json_encode($callback);
    }

    public function rekap_tambah_aksi() {
        $TANGGAL = $this->input->post('tanggal');
        $TANGGAL = explode("/", $TANGGAL);
        $jumlahTanggal = count($TANGGAL);

        for ($i = ($jumlahTanggal-1); $i >= 0; $i--){
            $hasil_akhir[] = $jumlahTanggal[$i];
        }
        
        $hasilTANGGAL = implode("/", $hasil_akhir);
        $ID_PENGUNJUNG = $this->input->post('id_pengunjung');
        var_dump($ID_PENGUNJUNG);
        die;
        $KEPERLUAN = $this->input->post('keperluan');
        
        if ($KEPERLUAN == 'baca') {
            $KEPERLUAN = 'Baca Buku';
            $KETERANGAN = $this->input->post('buku');
            if (!is_array($KETERANGAN)) {
                $KETERANGAN = array();
            }
            $KETERANGAN = implode(", ", $KETERANGAN);
        } elseif ($KEPERLUAN == 'pinjam') {
            $KEPERLUAN = 'Pinjam Buku';
            $KETERANGAN = '-';
        } elseif ($KEPERLUAN == 'lainnya') {
            $KEPERLUAN = 'Lainnya';
            $KETERANGAN = $this->input->post('keterangan');
        }

        if($this->model_bukutamu->validation("inputan", $KEPERLUAN)){ // Jika validasi sukses atau hasil validasi adalah true
            // $KEPERLUAN = $KETERANGAN;
            $data = array(
                'id_buku_tamu' => $this->db->insert_id(),
                'id_pengunjung' => $ID_PENGUNJUNG,
                'keperluan' => $KEPERLUAN,
                'keterangan' => $KETERANGAN,
                'tanggal' => $hasilTANGGAL
            );

            $this->model_bukutamu->simpan($data, 'tbukutamu'); // Panggil fungsi simpan() yang ada di model_bukutamu.php
                
            $callback = array(
                'status'=>'sukses',
                'pesan'=>'Data berhasil disimpan'
            );
		}else{
            $callback = array(
                'status'=>'gagal',
				'pesan'=>validation_errors()
			);
		}
        
		echo json_encode($callback);
    }
}