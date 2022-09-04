<?php
$this->load->view('admin/template/header', $extraCss);
$this->load->view($nav);
$this->load->view($page);
// if ($footer == true) {
$this->load->view('admin/template/footer', $extraJs);
// }
