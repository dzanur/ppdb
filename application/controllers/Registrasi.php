<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi extends CI_Controller
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
        // $vals =  $vals = [
        //     'word'          => substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 6),
        //     'img_path'      => './assets/img/captcha/',
        //     'img_url'       => base_url('assets/img/captcha/'),
        //     'img_width'     => '250',
        //     'img_height'    => 60,
        //     'expiration'    => 14400,
        //     'word_length'   => 32,
        //     'font_size'     => 48,
        //     'img_id'        => 'Imageid',
        //     'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

        //     'colors'        => [
        //         'background' => [255, 255, 255],
        //         'border'    => [255, 255, 255],
        //         'text'      => [0, 0, 0],
        //         'grid'      => [255, 40, 40]
        //     ]
        // ];

        // $captcha = create_captcha($vals);
        // var_dump($captcha);
        // die();
        // 
        // $this->session->set_userdata('captcha', $captcha['word']);
        if (!isset($_SESSION['nisn'])) {
            $data = array(
                'widget' => $this->recaptcha->getWidget(),
                'script' => $this->recaptcha->getScriptTag()
            );


            // $data['captcha']  = $captcha['image'];
            $this->load->view('registrasi/registrasi_view', $data);
        } else {
            redirect('home');
        }
    }

    public function daftar_akun()
    {
        $response = array();
        $cek_captcha = $this->recaptcha->verifyResponse($_POST['g-recaptcha-response']);
        if ($cek_captcha['success'] == true) {
            $cek_nisn = $this->model->cek_nisn($_POST['nisn']);
            if ($cek_nisn) {
                $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
                    'email'  => "Email tidak valid"
                ]);
                if ($this->form_validation->run() == true) {
                    $pepper        = substr(str_shuffle(md5(microtime()) . md5(rand(1, 99999))), 0, 35);
                    $salt          = substr(str_shuffle(md5(microtime()) . md5(rand(1, 99999))), 0, 40);
                    $hashed        = hash_hmac("sha256", $this->input->post('password1') . $salt, $pepper);
                    $password_hash = password_hash($hashed, PASSWORD_BCRYPT);

                    $data_user = array(
                        "nisn"       => $_POST['nisn'],
                        'email'      => $_POST['email'],
                        'salt'       => $salt,
                        'paper'      => $pepper,
                        'password'   => $password_hash,
                        'flag_aktif' => "N"
                    );
                    $insert = $this->model->insert_user($data_user);

                    if ($insert) {
                        $config = array(
                            'protocol' => 'smtp',
                            'smtp_host' => 'ssl://smtp.googlemail.com',
                            'smtp_port' => 465,
                            'smtp_user' => 'almaalhana3@gmail.com', // change it to yours
                            'smtp_pass' => 'alma.shafila.alshaf_#', // change it to yours
                            'mailtype' => 'html',
                            'charset' => 'iso-8859-1',
                            'wordwrap' => TRUE
                        );
                        $this->load->library('email', $config);
                        $this->email->from('almaalhana3@gmail.com', 'Alma Alhana Putra');
                        $this->email->to($_POST['email']);
                        // $this->email->cc('another@another-example.com');
                        // $this->email->bcc('them@their-example.com');

                        $this->email->subject('Email Test');
                        $this->email->message(base_url() . 'registrasi/verify/' . $_POST['nisn'] . '/' . $password_hash . '');

                        $this->email->send();

                        $response = array("status" => "success", "message" => "Registrasi berhasil");
                    }
                } else {
                    $response = array("status" => "error", "message" => $this->form_validation->error_array()['email']);
                }
            } else {
                $response = array("status" => "error", "message" => 'NISN Sudah Terdaftar');
            }
        } else {
            $response = array("status" => "error", "message" => 'Captcha tidak valid!');
        }

        $this->output->set_output(json_encode($response));
    }

    public function rechaptcha()
    {
        $vals =  $vals = [
            'word'          => substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 6),
            'img_path'      => './assets/img/captcha/',
            'img_url'       => base_url('assets/img/captcha/'),
            'img_width'     => '250',
            'img_height'    => 60,
            'expiration'    => 14400,
            'word_length'   => 32,
            'font_size'     => 48,
            'img_id'        => 'Imageid',
            'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

            'colors'        => [
                'background' => [255, 255, 255],
                'border'    => [255, 255, 255],
                'text'      => [0, 0, 0],
                'grid'      => [255, 40, 40]
            ]
        ];

        $captcha = create_captcha($vals);
        // var_dump($captcha);
        // die();
        // 
        $this->session->set_userdata('captcha', $captcha['word']);


        $this->output->set_output(json_encode($captcha['image']));
    }
}
