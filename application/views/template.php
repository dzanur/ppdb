<?php
$this->load->view('template/header', $extraCss);
$this->load->view($nav);
$this->load->view($page);
// if ($footer == true) {
$this->load->view('template/footer', $extraJs);
// }
