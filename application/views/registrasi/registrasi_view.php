<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--favicon icon-->
    <link rel="icon" href="<?= base_url() ?>assets/img/favicon.png" type="image/png" sizes="16x16">

    <!--title-->
    <title>Register - PPDB Kota Tangerang</title>

    <!--build:css-->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/main.css">
    <!-- endbuild -->
    <style>
        div.demo {
            height: 70px;
            width: 300px;
            border: 1px black;
            background: #FF0000;
            position: fixed;
            z-index: 999999;
            top: 20px;
            /* margin-bottom: 30px; */
            left: 45%;
        }

        .demo-text {
            padding-top: 5%;
            color: #FFFFFF;
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="demo">
        <h2 class="demo-text">DEMO VERSION<h2>
    </div>
    <!--preloader start-->
    <div id="preloader">
        <div class="preloader-wrap">
            <img src="<?= base_url() ?>assets/img/kotang.png" width="250px" alt="logo" class="img-fluid" />
            <div class="preloader">
                <i>.</i>
                <i>.</i>
                <i>.</i>
            </div>
        </div>
    </div>
    <!--preloader end-->

    <section class="page-header-section ptb-100 bg-image full-height" data-overlay="8">
        <!-- <div class="background-image-wraper" style="background: url('<?= base_url() ?>assets/img/hero-6.jpg'); opacity: 1;"></div> -->
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="login-signup-wrap p-5 gray-light-bg rounded shadow">
                        <div class="login-signup-header text-center">
                            <!-- <a href="index.html"><img src="<?= base_url() ?>assets/img/logo-color.png" class="img-fluid mb-3" alt="Logo"></a> -->
                            <h4 class="mb-5">Buat Akun Anda</h4>
                        </div>
                        <form class="login-signup-form">
                            <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                    NISN
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <span class="ti-user"></span>
                                    </div>
                                    <input type="text" class="form-control required" name="nisn" id="nisn" placeholder="Masukkan NISN">
                                </div>
                            </div>
                            <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                    Email
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <span class="ti-email"></span>
                                    </div>
                                    <input type="email" class="form-control required" name="email" id="email" placeholder="Masukkan Email">
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                    Password
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <span class="ti-lock"></span>
                                    </div>
                                    <input type="password" class="form-control required" name="password1" id="password1" placeholder="Masukkan Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                    Ulangi Password
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <span class="ti-lock"></span>
                                    </div>
                                    <input type="password" class="form-control required" name="password2" id="password2" placeholder="Masukkan Password Kembali">
                                </div>
                            </div>
                            <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                    Captcha
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                    <!-- <div class="input-icon">
                                        <span class="ti-lock"></span>
                                    </div> -->
                                    <!-- <input type="password" class="form-control" placeholder="Masukkan Password Kembali"> -->
                                    <?= $script ?>
                                    <?= $widget ?>
                                </div>
                            </div>

                            <div class="my-4">
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" id="check-terms">
                                    <label class="custom-control-label small-text" for="check-terms">Saya Menyetujui <a href="#">Syarat &amp; Ketentuan</a></label>
                                </div>
                            </div>

                            <!-- Submit -->
                            <button class="btn btn-block btn-brand-02 border-radius mt-4 mb-3" id="btn-daftar" disabled>
                                Daftar
                            </button>
                        </form>
                        <!-- <div class="other-login-signup my-3">
                            <div class="or-login-signup text-center">
                                <strong>Or Sign Up With</strong>
                            </div>
                        </div>
                        <ul class="list-inline social-login-signup text-center">
                            <li class="list-inline-item my-1">
                                <a href="#" class="btn btn-facebook"><i class="fab fa-facebook-f pr-1"></i> Facebook</a>
                            </li>
                            <li class="list-inline-item my-1">
                                <a href="#" class="btn btn-google"><i class="fab fa-google pr-1"></i> Google</a>
                            </li>
                            <li class="list-inline-item my-1">
                                <a href="#" class="btn btn-twitter"><i class="fab fa-twitter pr-1"></i> Twitter</a>
                            </li>
                        </ul> -->
                        <p class="text-center mb-0">Sudah mempunyai akun? <a href="<?= base_url() ?>login">Masuk</a></p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="copyright-wrap small-text text-center mt-5 text-white">
                        <p class="mb-0">&copy; 2022 - 2023 <a href="<?= base_url() ?>"><strong class="text-light">PPDB Kota Tangerang</strong></a>, All rights reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--scroll bottom to top button start-->
    <div class="scroll-top scroll-to-target primary-bg text-white" data-target="html">
        <span class="fas fa-hand-point-up"></span>
    </div>
    <!--scroll bottom to top button end-->
    <!--build:js-->
    <script src="<?= base_url() ?>assets/js/vendors/jquery-3.5.1.min.js"></script>
    <script src="<?= base_url() ?>assets/js/vendors/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/js/vendors/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/js/vendors/bootstrap-slider.min.js"></script>
    <script src="<?= base_url() ?>assets/js/vendors/jquery.easing.min.js"></script>
    <script src="<?= base_url() ?>assets/js/vendors/owl.carousel.min.js"></script>
    <script src="<?= base_url() ?>assets/js/vendors/countdown.min.js"></script>
    <script src="<?= base_url() ?>assets/js/vendors/jquery.waypoints.min.js"></script>
    <script src="<?= base_url() ?>assets/js/vendors/jquery.rcounterup.js"></script>
    <script src="<?= base_url() ?>assets/js/vendors/magnific-popup.min.js"></script>
    <script src="<?= base_url() ?>assets/js/vendors/validator.min.js"></script>
    <script src="<?= base_url() ?>assets/js/vendors/hs.megamenu.js"></script>
    <script src="<?= base_url() ?>assets/js/app.js"></script>
    <script src="<?= base_url() ?>assets/js/registrasi.js"></script>
    <script>
        var base_url = "<?php echo base_url(); ?>";
    </script>
    <!--endbuild-->
</body>

</html>