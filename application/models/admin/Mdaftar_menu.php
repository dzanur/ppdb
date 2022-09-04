<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mdaftar_menu extends CI_Model
{
    public function list_menu($limit, $offset, $search)
    {
        $this->db->select('*');
        $this->db->from('menuid');
        if ($search != "") {
            $this->db->where("(nama_menu LIKE '%" . $search .  "%')", null, false);
        }
        return $this->db->get('', $limit, $offset)->result();
    }

    public function count_list_menu($search)
    {
        $this->db->select('*');
        $this->db->from('menuid');
        if ($search != "") {
            $this->db->where("(nama_menu LIKE '%" . $search .  "%')", null, false);
        }
        return $this->db->get()->num_rows();
    }
}
