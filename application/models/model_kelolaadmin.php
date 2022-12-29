<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kelolaadmin extends CI_Model {
    function update_data($where, $data, $tabel){
        $this->db->where($where);
        $this->db->update($tabel, $data);
    }
    
    function simpan_data($data, $tabel){
        $this->db->insert($tabel, $data);
    }

    function iduser_terbaru(){
        $this->db->select_max('id_user');
        $this->db->from('tuser');
        return $this->db->get();
    }
}