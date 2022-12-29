 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {
    public function __construct() {
        parent:: __construct();
        $this->load->model('model_peminjaman');
        if (!$this->session->userdata('user')) {
            redirect('login');
        }
    }

    public function index() {
        $data['databuku'] = $this->model_peminjaman->ambil_data_buku()->result();
        $data['datauser'] = $this->db->get_where('tuser', ['username' => $this->session->userdata('user')])->row_array();

        $data['title'] = "Peminjaman Buku";
        $this->load->view('templates/view_header', $data);
        $this->load->view('templates/view_sidebar');
        $this->load->view('templates/view_topbar', $data);
        $this->load->view('contents/transaksi/peminjaman/view_peminjaman', $data);
        $this->load->view('templates/view_footer');
    }

    public function autocompletePeminjaman() {
        $returnData = $this->db->get('tpengunjung');
        // Return results as json encoded array
        echo json_encode($returnData->result());
    }

    public function status_buku() {
        $idbuku = $this->input->post('idbuku');
        $detail_buku = $this->model_peminjaman->cari_status_buku($idbuku)->row_array();
        
        $tgl_kembali = $detail_buku['tgl_harus_kembali'];

        $status_buku_kembali = array(
            "status" => "sukses",
            "tgl_kembali" => $tgl_kembali
        );

        echo json_encode($status_buku_kembali);
        // echo "{\"list_event\":" . $data . "}";
    }

    public function transaksi() {
        $tgl_pinjam = date('Y-m-d');
        $id_pengunjung = $this->input->post('idpengunjung');
        $status = $this->input->post('status');
        $dataidbuku = $this->input->post('dataidbuku');
        $id_user = $this->input->post('iduser');
        
        if ($status == "0") {
            $tgl_harus_pinjam = new DateTime();
            $tgl_harus_pinjam->add(new DateInterval('P14D'));
        } else if ($status == "1") {
            $tgl_harus_pinjam = new DateTime();
            $tgl_harus_pinjam->add(new DateInterval('P1D'));
        }

        // $tgl_harus_pinjam = $this->model_peminjaman->get_tgl_harus_kembali($status);

        // simpan ke ttransaksi
        $datatransaksi = array(
            'id_transaksi' => $this->db->insert_id(),
            'id_pengunjung' => $id_pengunjung,
            'id_user' => $id_user,
            'tgl_pinjam' => $tgl_pinjam,
            'tgl_harus_kembali' => $tgl_harus_pinjam->format('Y-m-d')
        );

        $this->model_peminjaman->simpan_transaksi($datatransaksi, 'ttransaksi');
        
        //simpan ke tdetailtransaksi
        $id_transaksi = $this->model_peminjaman->ambil_idTransaksi()->row();
        $id_transaksi = $id_transaksi->id_transaksi;
        // $id_transaksi = explode("", $id_transaksi);
        foreach ($dataidbuku as $idbuku) {
            $datadetailtransaksi = array(
                'id_detail_transaksi' => $this->db->insert_id(),
                'id_transaksi' => $id_transaksi,
                'id_buku' => $idbuku,
                'tgl_kembali' => 'NULL',
                'status' => '0'
            );

            $this->model_peminjaman->simpan_detail_transaksi($datadetailtransaksi, 'tdetailtransaksi');

            $this->model_peminjaman->update_jml_buku($idbuku, 'tbuku');
        }

        $callback = array(
            'status'=>'sukses'
        );
        
		echo json_encode($callback);
    }
}