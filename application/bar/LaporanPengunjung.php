<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanPengunjung extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('model_laporan_pengunjung');
		// $this->load->library('html2pdf');
		if (!$this->session->userdata('user')) {
            redirect('login');
        }
	}

	public function index(){
		$data['title'] = "Laporan Pengunjung";
		// $data['laporan']=$this->model_laporan_pengunjung->ambil_data()->result();
		$data['laporanjumlah'] = $this->model_laporan_pengunjung->jumlah()->result();
		$data['gettahun'] = $this->model_laporan_pengunjung->ambil_tahun()->result();
		$data['datauser'] = $this->db->get_where('tuser', ['username' => $this->session->userdata('user')])->row_array();
        $this->load->view('templates/view_header', $data);
        $this->load->view('templates/view_sidebar');
        $this->load->view('templates/view_topbar',$data);
        $this->load->view('contents/laporan/laporanpengunjung/view_laporanpengunjung',$data);
        $this->load->view('templates/view_footer');
	}
	
	public function detail($tanggal){
		$data['title']="Detail Laporan Pengunjung";
		$data['detaillaporan']=$this->model_laporan_pengunjung->ambil_data_detail($tanggal)->result();
		$data['datauser'] = $this->db->get_where('tuser', ['username' => $this->session->userdata('user')])->row_array();
        $this->load->view('templates/view_header', $data);
        $this->load->view('templates/view_sidebar');
        $this->load->view('templates/view_topbar', $data);
        $this->load->view('contents/laporan/laporanpengunjung/view_laporanpengunjung_detail',$data);
        $this->load->view('templates/view_footer');
	}
	
	public function filter_laporan_pengunjung() {
		// $sql = "select * from evaluasi where month(waktu)='$bulan' and year(waktu) = '$tahun'";
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		
		$html = $this->load->view('contents/laporan/laporanpengunjung/view_tabel_laporan_pengunjung', array(
		'laporanjumlah'=>$this->model_laporan_pengunjung->filter_laporan($bulan, $tahun)->result()), true);

		$callback = array(
			'status'=>'sukses',
			'html'=>$html
		);
		
		echo json_encode($callback);
	}

	public function preview_laporan() {
		$bulan = $this->uri->segment(3);
		$tahun = $this->uri->segment(4);

		switch ($bulan) {
			case '01':
				$namaBulan = "Januari";
				break;
			case '02':
				$namaBulan = "Februari";
				break;
			case '03':
				$namaBulan = "Maret";
				break;
			case '04':
				$namaBulan = "April";
				break;
			case '05':
				$namaBulan = "Mei";
				break;
			case '06':
				$namaBulan = "Juni";
				break;
			case '07':
				$namaBulan = "Juli";
				break;
			case '08':
				$namaBulan = "Agustus";
				break;
			case '09':
				$namaBulan = "September";
				break;
			case '10':
				$namaBulan = "Oktober";
				break;
			case '11':
				$namaBulan = "November";
				break;
			case '12':
				$namaBulan = "Desember";
				break;
		}

		//data bukutamu
		$datatanggal_bukutamu = $this->model_laporan_pengunjung->data_bukutamu($bulan, $tahun)->result();
		
		//data peminjaman
		$datatanggal_peminjaman = $this->model_laporan_pengunjung->data_peminjaman($bulan, $tahun)->result();
		
		$this->load->library('pdf');
		$pdf = new FPDF('l', "mm", 'A4', 'en', false, 'ISO-8859-15', array(2, 2, 2, 2));
		$pdf->AddPage();
		$pdf->setfont('arial', 'b', 16);
		$pdf->cell(280,7, 'Laporan Realisasi Kegiatan Tugas Jabatan', 0, 1, 'C');
		$pdf->setfont('arial', 'b', 13);
		$pdf->cell(280,7, ''. 'Bulan '. $namaBulan .' '. $tahun .'', 0, 1, 'C');
		$pdf->cell(10,7, '', 0, 1);
		$pdf->setfont('arial', 'b', 12);
		$pdf->cell(26, 6, 'Data Buku Tamu', 0, 1, 'L');
		$pdf->setfont('arial', 'b', 10);
		$pdf->cell(26,6, 'TANGGAL', 1, 0, 'C');
		$pdf->cell(40,6, 'KEPERLUAN', 1, 0, 'C');
		$pdf->cell(210,6, 'KETERANGAN', 1, 1, 'C');
		$pdf->setfont('arial', '', 10);
		foreach ($datatanggal_bukutamu as $data) {
			$pdf->cell(26,6, $data->tanggal, 1, 0, 'C');
			$pdf->cell(40,6, $data->keperluan, 1, 0, 'C');
			$pdf->cell(210,6, $data->keterangan, 1, 1, 'L');
			
		}
		$pdf->cell(10,7, '', 0, 1);

		$pdf->setfont('arial', 'b', 12);
		$pdf->cell(26, 6, 'Data Peminjaman', 0, 1, 'L');
		$pdf->setfont('arial', 'b', 10);
		$pdf->cell(26,6, 'TANGGAL', 1, 0, 'C');
		$pdf->cell(250,6, 'BUKU YANG DIPINJAM', 1, 1, 'C');
		$pdf->setfont('arial', '', 10);
		foreach ($datatanggal_peminjaman as $data) {
			$pdf->cell(26,6, $data->tgl_pinjam, 1, 0, 'C');
			$pdf->cell(250,6, $data->judul_buku, 1, 1, 'L');
			// $pdf->cell(100,6, $data->keterangan, 1, 1, 'L');
			
		}
		
		$pdf->OutPut();
	}
}

?>