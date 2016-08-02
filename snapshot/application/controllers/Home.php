<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('home');
		$this->load->view('footer');
	}

	public function test()
	{
		$this->load->view('header');
		$this->load->view('about');
		$this->load->view('footer');
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */