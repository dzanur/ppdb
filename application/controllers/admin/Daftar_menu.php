<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->helper('captcha');
        // $this->load->library('email');
        $this->load->library('form_validation');
        $this->load->model('admin/Mdaftar_menu', 'model');
        // $this->load->model('departemen/Mfakultas', 'model');
    }

    public function index()
    {
        if (isset($_SESSION['nisn'])) {
            $data['extraJs']  = array("sweetalert2.min.js", "select2.min.js",  "ui-blockui.js", "jquery.blockui.min.js", "bootstrap-file-input.js", "jquery.dataTables.min.js", "admin/daftar_menu.js");
            $data['extraCss'] = array("sweetalert2.min.css", "select2.min.css", "jquery.dataTables.min.css");
            $data['title']    = "Daftar Menu";
            $data['nav']      = "admin/template/nav";
            // $data['detail']   = $this->model->get_detail_siswa($_SESSION['nisn']);
            // echo "<pre>";
            // var_dump($data['detail']);
            $data['page']     = 'admin/daftar_menu_view';
            $this->load->view('admin/template', $data);
        } else {
            redirect('welcome');
        }
    }

    public function list_menu()
    {
        $draw   = intval($this->input->post('draw'));
        $json   = array();
        $limit  = intval($this->input->post('length'));
        $offset = intval($this->input->post('start'));
        $search = $this->input->post('search');


        $data   = $this->model->list_menu($limit, $offset, $search['value']);

        $total = $this->model->count_list_menu($search['value']);

        if ($data != false) {
            $no = 1;
            foreach ($data as $rows) {
                $json[] = array(
                    'no'             => $no++,
                    'nama_menu'       => $rows->nama_menu,
                    'menu_id'        => $rows->menu_id,
                    'actions'        => '<a class="btn btn-xs btn-primary" target="_blank">Edit</a>'
                );
            }
        }

        $result = [
            'draw'                   => $draw,
            'recordsTotal'           => $total,
            'recordsFiltered'        => $total,
            'data'                   => $json
        ];

        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }
}
