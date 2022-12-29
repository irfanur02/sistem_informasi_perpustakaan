<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanPeminjaman extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('model_laporan_peminjaman');
		if (!$this->session->userdata('user')) {
            redirect('login');
        }
	}

	public function index(){
		$data['title'] = "Laporan Peminjaman";
		$data['laporan']=$this->model_laporan_peminjaman->ambil_data()->result();
		$data['datauser'] = $this->db->get_where('tuser', ['username' => $this->session->userdata('user')])->row_array();
        $this->load->view('templates/view_header', $data);
        $this->load->view('templates/view_sidebar');
        $this->load->view('templates/view_topbar', $data);
        $this->load->view('contents/laporan/laporanpeminjaman/view_laporanpeminjaman',$data);
        $this->load->view('templates/view_footer');
	}

	public function detail($id_pengunjung){
		$data['title']="Detail Laporan Peminjaman";
		$data['detaillaporan']=$this->model_laporan_peminjaman->ambil_data_detail($id_pengunjung)->result();
		$data['pengunjung']=$this->db->get_where('tpengunjung', array('id_pengunjung'=>$id_pengunjung))->row_array();
		$data['datauser'] = $this->db->get_where('tuser', ['username' => $this->session->userdata('user')])->row_array();
		//Menghitung lama pinjam
		// $data['lama_pinjam'] = $this->model_laporan_peminjaman->lama_pinjam();
		$data['lama_pinjam'] = $this->model_laporan_peminjaman->lama_pinjam();
        $this->load->view('templates/view_header', $data);
        $this->load->view('templates/view_sidebar');
        $this->load->view('templates/view_topbar', $data);
        $this->load->view('contents/laporan/laporanpeminjaman/view_laporanpeminjaman_detail',$data);
        $this->load->view('templates/view_footer');
	}

	// public function hitunglamapinjam() {
	// 	$datawaktu = $this->model_laporan_peminjaman->ambil_data_waktu()->result();
	// 	$interval = array();
	// 	foreach ($datawaktu as $selisihtanggal) {
	// 		$tanggal_akhir = $selisihtanggal->tgl_kembali;
	// 		$tanggal_awal = $selisihtanggal->tgl_pinjam;
	// 		$interval = $tanggal_akhir->mysql_query('datediff(tanggal_akhir(), tanggal_awal) as selisihtanggal');
	// 		return $interval->selisihtanggal;
	// 	}
	// }
}

?>	