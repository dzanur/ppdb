<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->helper('captcha');
        // $this->load->library('email');
        $this->load->library('form_validation');
        $this->load->model('siswa/Msiswa', 'model');
        // $this->load->model('departemen/Mfakultas', 'model');
    }

    public function index()
    {
        redirect('siswa/biodata');
    }
}
