<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Views extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// _dump($_SERVER);
		// _dump(strpos($this->input->server('QUERY_STRING'),'_escaped_fragment_=') === false);
		// exit();
		// _dump($this->input->get('_escaped_fragment_'));


		if ($this->input->get('_escaped_fragment_') === null) {
			$this->load->view('main');
		} else {
			// echo "bot view";
			// $redirect_url = $this->input->server('PATH_INFO');
			// $redirect_url = strpos($redirect_url, '/') === 0 ? substr($redirect_url, 1) : $redirect_url;
			// $redirect_url .= '?_escaped_fragment_=';
			// // _dump(base_url().$redirect_url);

			// redirect(base_url().$redirect_url,'refresh');
			// redirect(base_url().'views/test');
		}

		// echo "wow";
	}

	public function test()
	{
		// _json($_SERVER);
		// echo "this is test";
		// $this->load->view('main');
	}

	public function error_page()
	{
		$this->load->view('errors/html/error_page');
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