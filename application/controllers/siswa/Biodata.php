<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Biodata extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->helper('captcha');
        // $this->load->library('email');
        $this->load->library('form_validation');
        $this->load->model('siswa/Mbiodata', 'model');
        // $this->load->model('departemen/Mfakultas', 'model');
    }

    public function index()
    {
        if (isset($_SESSION['nisn'])) {
            $data['extraJs']  = array("sweetalert2.min.js", "select2.min.js",  "ui-blockui.js", "jquery.blockui.min.js", "bootstrap-file-input.js", "siswa/biodata.js");
            $data['extraCss'] = array("sweetalert2.min.css", "select2.min.css");
            $data['title']    = "Biodata Calon Peserta Didik Baru";
            $data['nav']      = "template/nav";
            $data['detail']   = $this->model->get_detail_siswa($_SESSION['nisn']);
            // echo "<pre>";
            // var_dump($data['detail']);
            $data['page']     = 'siswa/biodata_siswa_view';
            $this->load->view('template', $data);
        } else {
            redirect('welcome');
        }
    }

    public function simpan_perubahan()
    {
        // var_dump($_FILES);
        // die();
        try {
            $path_file           = './assets/siswa/foto/';
            $file_tagihan        = $_FILES['file_foto']['name'];
            $file_tagihan_temp   = $_FILES['file_foto']['tmp_name'];
            $file_parts          = pathinfo($file_tagihan);
            $filename            = $file_parts['filename'];
            $file_extension      = $file_parts['extension'];

            $flag_upload_error = false;
            $is_upload_file    = false;

            // $nama_file_tagihan = preg_replace("/[^A-Za-z0-9]/", '_', $filename);

            $nama_file_tagihan = $_SESSION['nisn'] . "_profil";
            if (file_exists($path_file . $nama_file_tagihan)) {
                unlink($path_file . $nama_file_tagihan);
            }

            if (!file_exists($path_file)) {
                mkdir($path_file);
            }
            $config['upload_path']   = $path_file;
            $config['allowed_types'] = "png|jpg|jpeg";
            $config['overwrite']     = true;
            $config['file_name']     = $nama_file_tagihan;
            $config['max_size']      = "100000000";
            $this->load->library('upload', $config);

            // reinitialize the library again since we have multiple uploads
            $this->upload->initialize($config);

            if ($this->upload->do_upload('file_foto')) {
                $user = array(
                    "file_foto"   => $nama_file_tagihan . '.' . $file_extension
                );
                $response =  $this->model->update_data($user);
            } else {
                $response['status'] = "error";
                $response['message'] = $this->upload->display_errors();
            }
        } catch (Exception $ex) {
            $response['status'] = "error";
            $response['message'] = $ex;
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    public function update_session()
    {
        unset($_SESSION["foto"]);
        $foto = $this->model->get_file_foto($_SESSION['nisn']);
        $_SESSION['foto'] = $foto['file_foto'];
        redirect('siswa/biodata');
    }
}
