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
<!--header section start-->
<header id="header" class="header-main">
    <!--main header menu start-->
    <div id="logoAndNav" class="main-header-menu-wrap fixed-top" style="background-color: #083C96;">
        <div class="demo">
            <h2 class="demo-text">DEMO VERSION<h2>
        </div>
        <div class="container">
            <nav class="js-mega-menu navbar navbar-expand-md header-nav">

                <!--logo start-->
                <a class="navbar-brand pt-0" href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/img/brand.png" alt="logo" class="img-fluid" /><strong class="text-light"> PPDB Kota Tangerang</strong></a>
                <!--logo end-->

                <!--responsive toggle button start-->
                <button type="button" class="navbar-toggler btn" aria-expanded="false" aria-controls="navBar" data-toggle="collapse" data-target="#navBar">
                    <span id="hamburgerTrigger">
                        <span class="ti-menu"></span>
                    </span>
                </button>
                <!--responsive toggle button end-->

                <!--main menu start-->
                <div id="navBar" class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto main-navbar-nav">
                        <?php if (!isset($_SESSION['nisn'])) { ?>
                            <li class="nav-item custom-nav-item">
                                <a class="nav-link custom-nav-link text-light" href="<?= base_url() ?>#home">Home</a>
                            </li>
                            <li class="nav-item custom-nav-item">
                                <a class="nav-link custom-nav-link text-light" href="<?= base_url() ?>#informasi">Informasi</a>
                            </li>
                            <li class="nav-item custom-nav-item">
                                <a class="nav-link custom-nav-link text-light" href="<?= base_url() ?>#alur-pendaftaran">Alur Pendaftaran</a>
                            </li>

                            <!--button start-->

                            <li class="nav-item header-nav-last-item d-flex align-items-center">
                                <a class="btn btn-brand-03 animated-btn" href="<?= base_url() ?>login">
                                    <span class="fas fa-right-to-bracket pr-2"></span>Login
                                </a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item custom-nav-item">
                                <a class="nav-link custom-nav-link text-light" href="<?= base_url() ?>#informasi">Profil</a>
                            </li>
                            <li class="nav-item custom-nav-item">
                                <a class="nav-link custom-nav-link text-light" href="<?= base_url() ?>#informasi">Pendaftaran</a>
                            </li>
                            <li class="nav-item header-nav-last-item d-flex align-items-center">
                                <a class="btn btn-brand-03 animated-btn" id="btn-logout" href="#">
                                    <span class="fas fa-right-to-bracket pr-2"></span>Logout
                                </a>
                            </li>
                        <?php } ?>
                        <!--button end-->
                    </ul>
                </div>
                <!--main menu end-->
            </nav>
        </div>
    </div>
    <!--main header menu end-->
</header>
<!--header section end-->
<div class="main">