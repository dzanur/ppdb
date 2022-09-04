<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mbiodata extends CI_Model
{
    public function update_data($user)
    {
        $this->db->set($user);
        $this->db->where('nisn', $_SESSION['nisn']);
        $update = $this->db->update('user');
        if ($update) {
            return array("status" => "success", "message" => "Data berhasil di update");
        } else {
            return array("status" => "error", "message" => "Data gagal di update");
        }
    }

    public function get_file_foto($nisn)
    {
        $this->db->select('file_foto');
        $this->db->from('user');
        $this->db->where('nisn', $nisn);
        return $this->db->get()->row_array();
    }
    public function get_detail_siswa($nisn)
    {
        $this->db->select('cp.*,u.email');
        $this->db->from('calon_peserta cp');
        $this->db->join('user u', 'u.nisn = cp.nisn');
        $this->db->where('cp.nisn', $nisn);
        return $this->db->get()->row_array();
    }
}
