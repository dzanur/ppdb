<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('captcha');
        // $this->load->library('email');
        $this->load->library('form_validation');
        $this->load->model('Mregistrasi', 'model');
        // $this->load->model('departemen/Mfakultas', 'model');
    }

    public function index()
    {
        // $data['extraJs']  = array("sweetalert.min.js", "select2.min.js",  "ui-blockui.js", "jquery.blockui.min.js", "departemen/fakultas.js");
        // $data['extraCss'] = array("sweetalert2.min.css", "select2.min.css", "login.css");
        // $data['title']    = "Login";
        // $data['nav']      = "login/nav";
        // $data['page']     = 'login/login_view';
        // $data['footer']   = false;
        // var_dump($nisn);
        // die();
        // $nisn == null ?? $this->session->set_flashdata('message', "Registrasi berhasil");
        if (!isset($_SESSION['nisn'])) {
            $this->load->view('login/login_view');
        } else {
            redirect('home');
        }
    }

    public function auth()
    {
        // var_dump($_POST);
        $query = $this->model->login($_POST['nisn']);
        // var_dump($query);
        // die();
        if ($query != null) {
            $hashed =  hash_hmac("sha256", $_POST['password'] . $query['salt'], $query['paper']);
            // $password_hash = password_hash($hashed, PASSWORD_BCRYPT);

            // var_dump(password_verify($hashed, $query['password']));
            if (password_verify($hashed, $query['password'])) {
                // var_dump('password_benar');
                $_SESSION['nisn'] = $query['nisn'];
                $_SESSION['foto'] = $query['file_foto'];
                $response = array("status" => "success", "message" => '<div class="alert alert-success" role="alert">Login berhasil</div>');
            } else {
                $response = array("status" => "error", "message" => '<div class="alert alert-danger" role="alert">Username/Password salah!</div>');
            }
        } else {
            // var_dump('user tidak ada');
            $response = array("status" => "error", "message" => '<div class="alert alert-danger" role="alert">Username/Password salah!</div>');
        }
        $this->output->set_output(json_encode($response));
    }

    public function logout()
    {
        session_destroy();
        redirect('login');
    }
}
