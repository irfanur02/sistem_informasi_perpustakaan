<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaAdmin extends CI_Controller {
    public function __construct() {
        parent:: __construct();
        $this->load->model('model_kelolaadmin');
        if (!$this->session->userdata('user')) {
            redirect('login');
        }
    }

    public function ubah_profil() {
        $id_user = $this->input->post('iduseradmin');
        $nama_user = $this->input->post('namaadmin');
        $nama_user = strtoupper($nama_user);
        $username = $this->input->post('usernameadmin');
        $password = $this->input->post('passwordadmin');
        $inisialnama = substr($nama_user, 0, 1);
        
        switch ($inisialnama) {
            case 'A':
                $foto_profil = "a.png";
                break;
            case 'B':
                $foto_profil = "b.png";
                break;
            case 'C':
                $foto_profil = "c.png";
                break;
            case 'D':
                $foto_profil = "d.png";
                break;
            case 'E':
                $foto_profil = "e.png";
                break;
            case 'F':
                $foto_profil = "f.png";
                break;
            case 'G':
                $foto_profil = "g.png";
                break;
            case 'H':
                $foto_profil = "h.png";
                break;
            case 'I':
                $foto_profil = "i.png";
                break;
            case 'J':
                $foto_profil = "j.png";
                break;
            case 'K':
                $foto_profil = "k.png";
                break;
            case 'L':
                $foto_profil = "l.png";
                break;
            case 'M':
                $foto_profil = "m.png";
                break;
            case 'N':
                $foto_profil = "n.png";
                break;
            case 'O':
                $foto_profil = "o.png";
                break;
            case 'P':
                $foto_profil = "p.png";
                break;
            case 'Q':
                $foto_profil = 'q.png';
                break;
            case 'R':
                $foto_profil = "r.png";
                break;
            case 'S':
                $foto_profil = "s.png";
                break;
            case 'T':
                $foto_profil = "t.png";
                break;
            case 'U':
                $foto_profil = "u.png";
                break;
            case 'V':
                $foto_profil = "v.png";
                break;
            case 'W':
                $foto_profil = "w.png";
                break;
            case 'X':
                $foto_profil = "x.png";
                break;
            case 'Y':
                $foto_profil = "y.png";
                break;
            case 'Z':
                $foto_profil = "z.png";
                break;
        }

        // var_dump($foto_profil);
        // die;
        $data = array(
            'nama_user' => $nama_user,
            'username' => $username,
            'password' => $password,
            'foto_profil' => $foto_profil
        );

        $where = array(
            'id_user' => $id_user
        );

        $this->model_kelolaadmin->update_data($where, $data, 'tuser');

        $callback = array(
            'status'=>'sukses'
        );
        
        echo json_encode($callback);
        
        $this->session->unset_userdata('user');
        $datauserbaru = $this->db->get_where('tuser', ['username' => $username])->row_array();
        $data = [
                'user' => $datauserbaru['username']
            ];

        $this->session->set_userdata($data);
    }

    public function tambah_profil() {
        $nama_usersimpan = $this->input->post('namaadminsimpan');
        $nama_usersimpan = strtoupper($nama_usersimpan);
        $usernamesimpan = $this->input->post('usernameadminsimpan');
        $passwordsimpan = $this->input->post('passwordadminsimpan');
        $inisialnama = substr($nama_usersimpan, 0, 1);
        
        switch ($inisialnama) {
            case 'A':
                $foto_profil = "a.png";
                break;
            case 'B':
                $foto_profil = "b.png";
                break;
            case 'C':
                $foto_profil = "c.png";
                break;
            case 'D':
                $foto_profil = "d.png";
                break;
            case 'E':
                $foto_profil = "e.png";
                break;
            case 'F':
                $foto_profil = "f.png";
                break;
            case 'G':
                $foto_profil = "g.png";
                break;
            case 'H':
                $foto_profil = "h.png";
                break;
            case 'I':
                $foto_profil = "i.png";
                break;
            case 'J':
                $foto_profil = "j.png";
                break;
            case 'K':
                $foto_profil = "k.png";
                break;
            case 'L':
                $foto_profil = "l.png";
                break;
            case 'M':
                $foto_profil = "m.png";
                break;
            case 'N':
                $foto_profil = "n.png";
                break;
            case 'O':
                $foto_profil = "o.png";
                break;
            case 'P':
                $foto_profil = "p.png";
                break;
            case 'Q':
                $foto_profil = 'q.png';
                break;
            case 'R':
                $foto_profil = "r.png";
                break;
            case 'S':
                $foto_profil = "s.png";
                break;
            case 'T':
                $foto_profil = "t.png";
                break;
            case 'U':
                $foto_profil = "u.png";
                break;
            case 'V':
                $foto_profil = "v.png";
                break;
            case 'W':
                $foto_profil = "w.png";
                break;
            case 'X':
                $foto_profil = "x.png";
                break;
            case 'Y':
                $foto_profil = "y.png";
                break;
            case 'Z':
                $foto_profil = "z.png";
                break;
        }

        $data = array(
            'id_user' => $this->db->insert_id(),
            'nama_user' => $nama_usersimpan,
            'username' => $usernamesimpan,
            'password' => $passwordsimpan,
            'foto_profil' => $foto_profil
        );

        $this->model_kelolaadmin->simpan_data($data, 'tuser');

        $callback = array(
            'status'=>'sukses'
        );
        
        echo json_encode($callback);

        $this->session->unset_userdata('user');

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert"><b>Akun Anda telah dibuat</b>, <br> Anda sekarang bisa menggunakannya akun tersebut</div>');

        $iduserbaru = $this->model_kelolaadmin->iduser_terbaru()->row();
        $iduserbaru = $iduserbaru->id_user;
        
        $datauserbaru = $this->db->get_where('tuser', array('id_user' => $iduserbaru))->row_array();
        
        $data = [
            'user' => $datauserbaru['username']
        ];

        $this->session->set_userdata($data);
    }
}