<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('about');
		$this->load->view('footer');
	}

}

/* End of file about.php */
/* Location: ./application/controllers/about.php */