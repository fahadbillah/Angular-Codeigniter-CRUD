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
			$this->social_login($login_data);
		} else {
		}
		_json($login_data);
		
	}

	private function email_login()
	{
		# code...
	}

	private function social_login($login_data)
	{
		// if ($login_data['login_type'] === 'facebook') {
		// 	$user_data = array(
		// 		'name' => $login_data['name'], 
		// 		'name' => $login_data['login_type'], 
		// 		'name' => $login_data['login_type'], 
		// 		'name' => $login_data['login_type'], 
		// 		'name' => $login_data['login_type'], 
		// 		'name' => $login_data['login_type'], 
		// 		'name' => $login_data['login_type'], 
		// 		'name' => $login_data['login_type'], 
		// 		'name' => $login_data['login_type'], 
		// 		);

		// }


		$fbApp = new Facebook\FacebookApp('487972194744249', '8d4e044b58d09a6ffc81b2c881ba364f');

		$signedRequest = new Facebook\SignedRequest($fbApp, $login_data['signedRequest']);
		// _dump($signedRequest);

		$fb = new Facebook\Facebook([
			'app_id' => '487972194744249',
			'app_secret' => '8d4e044b58d09a6ffc81b2c881ba364f',
			'default_graph_version' => 'v2.7',
			]);
		
		// _dump($fb);

		$helper = $fb->getJavaScriptHelper();
		// _dump($helper);

		try {
			$accessToken = $helper->getAccessToken();
			// _dump($accessToken);
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
 			 // When Graph returns an error
			_json(array(
				'success' => false,
				'message' => 'Graph returned an error: ' . $e->getMessage(),
				));
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
  			// When validation fails or other local issues
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

		// Logged in
		// echo '<h3>Access Token</h3>';
		// _dump($accessToken->getValue());
		// _dump($accessToken);

		$array = array(
			'fb_access_token' => (string) $accessToken
			);
		
		$this->session->set_userdata( $array );


		_json($this->session->all_userdata());
	}

	public function test()
	{
		$fb = new Facebook\Facebook([
			'app_id' => '487972194744249',
			'app_secret' => '8d4e044b58d09a6ffc81b2c881ba364f',
			'default_graph_version' => 'v2.7',
			]);

		$helper = $fb->getJavaScriptHelper();

		try {
			$accessToken = $helper->getAccessToken();
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
 			 // When Graph returns an error
			_json(array(
				'success' => false,
				'message' => 'Graph returned an error: ' . $e->getMessage(),
				));
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
  			// When validation fails or other local issues
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

		// Logged in
		echo '<h3>Access Token</h3>';
		// var_dump($accessToken->getValue());

		$array = array(
			'fb_access_token' => (string) $accessToken
			);

		$this->session->set_userdata( $array );


		// // _dump($this->session->all_userdata());
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */