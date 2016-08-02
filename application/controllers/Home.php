<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		echo "static view";
		$data = array('title' => 'Home');
		$this->load->view('regular-views/header');
		$this->load->view('regular-views/home', $data);
		$this->load->view('regular-views/footer');
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */