<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Msiswa extends CI_Model
{
    public function get_detail_siswa($nisn)
    {
        $this->db->select('cp.*,u.email');
        $this->db->from('calon_peserta cp');
        $this->db->join('user u', 'u.nisn = cp.nisn');
        $this->db->where('cp.nisn', $nisn);
        return $this->db->get()->row_array();
    }
}
