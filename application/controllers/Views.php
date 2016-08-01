<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Views extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		echo "wow";
		$this->load->view('main');
	}

	public function page_missing()
	{
		$data = array(
			'heading' => 'Page Not Found!!!',
			'message' => 'Please try a valid url',
			);
		$this->load->view('errors/html/error_404',$data);
	}

	public function home()
	{
		$this->load->view('ng-views/home');
	}

	public function about()
	{
		$this->load->view('ng-views/about');
	}

	public function signup()
	{
		$this->load->view('ng-views/signup');
	}

	public function login()
	{
		$this->load->view('ng-views/login');
	}
	
	public function logout()
	{
		$this->load->view('ng-views/logout');
	}

	public function social_login_buttons()
	{
		$this->load->view('ng-views/social_login_buttons');
	}

	public function user_profile()
	{
		$this->load->view('ng-views/user_profile');
	}

}

/* End of file Views.php */
	/* Location: ./application/controllers/Views.php */