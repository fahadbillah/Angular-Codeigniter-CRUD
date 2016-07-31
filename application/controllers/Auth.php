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
			$user_data = $this->facebook_login($login_data);
		} else if ($login_data['login_type'] === 'google') {
			$this->google_login($login_data);
		}else{

		}
		_json($user_data);
	}

	private function email_login()
	{
		# code...
	}

	private function google_login($login_data)
	{
		// _json($login_data);




		$client = new Google_Client();
		$client->setApplicationName(GOOGLE_APPLICATION_NAME);
		$client->setClientId(GOOGLE_CLIENT_ID);
		$client->setClientSecret(GOOGLE_CLIENT_SECRET);
		$client->setRedirectUri('postmessage');
		$plus = new Google_Service_Plus($client);
		$app = new Silex\Application();
		$app['debug'] = true;
		$app->register(new Silex\Provider\TwigServiceProvider(), array(
			'twig.path' => __DIR__,
			));
		$app->register(new Silex\Provider\SessionServiceProvider());
		// Initialize a session for the current user, and render index.html.
		$app->get('/', function () use ($app) {
			// _dump($app);
			$state = md5(rand());
			$sess = array(
				'state' => $state
				);
			
			$this->session->set_userdata( $sess );
			// $app['session']->set('state', $state);
			// return $app['twig']->render('index.html', array(
			// 	'CLIENT_ID' => CLIENT_ID,
			// 	'STATE' => $state,
			// 	'APPLICATION_NAME' => APPLICATION_NAME
			// 	));
		});



			// Upgrade given auth code to token, and store it in the session.
			// POST body of request should be the authorization code.
			// Example URI: /connect?state=...&gplus_id=...
		$app->post('/connect', function (Request $request) use ($app, $client) {
			$token = $this->session->userdata('token');
			// $token = $app['session']->get('token');
			if (empty($token)) {
		        // Ensure that this is no request forgery going on, and that the user
		        // sending us this connect request is the user that was supposed to.
				_dump($request->get('state'));
				_dump($app['session']->get('state'));
				if ($request->get('state') != ($app['session']->get('state'))) {
					_json(array(
						'success' => false,
						'message' => 'Invalid state parameter',
						));
					// return new Response('Invalid state parameter', 401);
				}
			        // Normally the state would be a one-time use token, however in our
			        // simple case, we want a user to be able to connect and disconnect
			        // without reloading the page.  Thus, for demonstration, we don't
			        // implement this best practice.
			        //$app['session']->set('state', '');
				$code = $request->getContent();
			        // Exchange the OAuth 2.0 authorization code for user credentials.
				$client->authenticate($code);
				$token = json_decode($client->getAccessToken());
			        // You can read the Google user ID in the ID token.
			        // "sub" represents the ID token subscriber which in our case
			        // is the user ID. This sample does not use the user ID.
				$attributes = $client->verifyIdToken($token->id_token, CLIENT_ID)
				->getAttributes();
				$gplus_id = $attributes["payload"]["sub"];
			        // Store the token in the session for later use.
				$app['session']->set('token', json_encode($token));
				$response = 'Successfully connected with token: ' . print_r($token, true);
			} else {
				$response = 'Already connected';
			}
			return new Response($response, 200);
		});


	}

	private function facebook_login($login_data)
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