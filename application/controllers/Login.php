<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('regular-views/header');
		$this->load->view('regular-views/login');
		$this->load->view('regular-views/footer');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */