<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('signup');
		$this->load->view('footer');
	}

}

/* End of file Signup.php */
/* Location: ./application/controllers/Signup.php */