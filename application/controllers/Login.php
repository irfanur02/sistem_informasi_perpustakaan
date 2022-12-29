<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct() {
        parent:: __construct();
    }

    public function index() {
        
        $this->form_validation->set_rules('user', 'User', 'required|trim',
            array('required' => 'Username Harus diisi',
                    'trim' => 'Username Belum diisi')
        );
        $this->form_validation->set_rules('password', 'Password', 'required|trim',
            array('required' => 'Password Harus diisi',
            'trim' => 'Password Belum diisi')
        );
		if ($this->form_validation->run() == false) {
            $data['title'] = "Login Perpustkaan";
            $this->load->view('templates/view_login_header', $data);
            $this->load->view('contents/login/view_login');
            $this->load->view('templates/view_login_footer');
		} else {
			$this->_login();
		}
    }

    private function _login() {
		$user = $this->input->post('user');
		$password = $this->input->post('password');

		$datauser = $this->db->get_where('tuser', ['username' => $user])->row_array();

		if ($datauser) {	//jika user ada
            if ($password == $datauser['password']) {
                $data = [
                    'user' => $datauser['username']
                ];

                $this->session->set_userdata($data);
                redirect('bukutamu');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password Salah !</div>');
                redirect('login');
            }
		} else {	//jika user tidak ada
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username tidak Terdaftar!</div>');
			redirect('login');
		}
    }
    
    public function logout() {
		$this->session->unset_userdata('user');

		$this->session->set_flashdata('message', '<div id="notifLogout" class="alert alert-success" role="alert">Anda Telah Keluar!</div>');
		redirect('login');
    }
    
    // public function blocked() {
	// 	$this->load->view('login/blocked');
	// }
}