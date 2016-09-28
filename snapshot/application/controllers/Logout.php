<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('logout');
		$this->load->view('footer');
	}

}

/* End of file Logout.php */
/* Location: ./application/controllers/Logout.php */