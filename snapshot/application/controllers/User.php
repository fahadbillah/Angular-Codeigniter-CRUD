<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('user_profile');
		$this->load->view('footer');
	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */