<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function registration()
	{
		$registration_data = $this->input->post();
	}

	public function email_registration()
	{
		$registration_data = $this->input->post();
	}

	public function social_registration()
	{
		$registration_data = $this->input->post();
	}

	public function login()
	{
		$login_data = $this->input->post();
		if ($login_data['login_type'] === 'facebook') {
			$user_data = $this->social_login($login_data);
		} else if ($login_data['login_type'] === 'facebook') {
			$this->social_login($login_data);
		}else{

		}
		_json($user_data);
	}

	private function email_login()
	{
		# code...
	}

	private function social_login($login_data)
	{
		$fbApp = new Facebook\FacebookApp('487972194744249', '8d4e044b58d09a6ffc81b2c881ba364f');

		$signedRequest = new Facebook\SignedRequest($fbApp, $login_data['signedRequest']);

		$fb = new Facebook\Facebook([
			'app_id' => '487972194744249',
			'app_secret' => '8d4e044b58d09a6ffc81b2c881ba364f',
			'default_graph_version' => 'v2.7',
			]);

		$helper = $fb->getJavaScriptHelper();

		try {
			$accessToken = $helper->getAccessToken();
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
			_json(array(
				'success' => false,
				'message' => 'Graph returned an error: ' . $e->getMessage(),
				));
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
			_json(array(
				'success' => false,
				'message' => 'Facebook SDK returned an error: ' . $e->getMessage(),
				));
		}

		if (! isset($accessToken)) {
			_json(array(
				'success' => false,
				'message' => 'No cookie set or no OAuth data could be obtained from cookie.',
				));
		}

		try {
			$response = $fb->get('/me?fields=id,name,first_name,last_name,age_range,link,gender,locale,picture,timezone,updated_time,verified', (string) $accessToken);
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
			_json(array(
				'success' => false,
				'message' => 'Graph returned an error: ' . $e->getMessage(),
				));
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
			_json(array(
				'success' => false,
				'message' => 'Facebook SDK returned an error: ' . $e->getMessage(),
				));
		}

		$user = $response->getGraphUser();

		$sess = array(
			'name' => $user['name'],
			'profile_picture' => $user['picture']['url'],
			'gender' => $user['gender'],
			'language' => $user['locale'],
			'social_id' => $user['id'],
			'timezone' => $user['timezone'],
			'login_type' => 'facebook',
			);
		$this->load->model('user_model');

		if (!$this->user_model->check_if_social_user_exists($sess)) {
			$create_user_data = $sess;
			$create_user_data['token'] = generate_random_string(40);
			$create_user_data['referral_id'] = generate_random_string(13);
			$create_user_data['user_type'] = 'user';
			$this->user_model->create_user($create_user_data);
		}
		
		$sess['fb_access_token'] = (string) $accessToken;
		$this->session->set_userdata( $sess );
		unset($sess['fb_access_token']);
		return $sess;
	}

	public function logout()
	{
		$this->session->sess_destroy();
		_json(array(
			'success' => true,
			'message' => 'Logout Successful!',
			));
	}

	public function test()
	{
		// $this->session->sess_destroy();
		_dump($this->session->all_userdata());
	}
}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */