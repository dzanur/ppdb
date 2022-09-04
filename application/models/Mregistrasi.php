<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mregistrasi extends CI_Model
{
    public function cek_nisn($nisn)
    {
        $this->db->select('nisn');
        $this->db->from('user');
        $this->db->where('nisn', $nisn);
        // $this->db->where('flag_aktif', "Y");
        $nisn = $this->db->get()->num_rows();
        if ($nisn > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function insert_user($data_user)
    {
        return $this->db->insert('user', $data_user);
    }

    public function login($nisn)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('nisn', $nisn);
        return $this->db->get()->row_array();
    }
}
