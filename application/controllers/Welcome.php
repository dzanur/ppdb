<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		// $this->load->view('welcome_message');
		if (!isset($_SESSION['nisn'])) {
			$data['extraJs']  = array("sweetalert.min.js", "select2.min.js",  "ui-blockui.js", "jquery.blockui.min.js", "departemen/fakultas.js");
			$data['extraCss'] = array("sweetalert2.min.css", "select2.min.css");
			$data['title']    = "Management Fakultas";
			$data['nav']      = "template/nav";
			$data['footer']   = true;
			$data['page']     = 'home_view';
			$this->load->view('template', $data);
		} else {
			redirect('home');
		}
	}
}
