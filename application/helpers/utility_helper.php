<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (! function_exists('_json'))
{
	function _json($data)
	{
		echo json_encode($data);
		exit();
	}
}


if (! function_exists('_dump'))
{
	function _dump($data)
	{
		echo "<pre>";
		var_dump($data);
		echo "</pre>";
	}
}


if (! function_exists('generate_random_string'))
{
	function generate_random_string($length = 10){
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
}

/* End of file utility_helper.php */
/* Location: ./application/helpers/utility_helper.php */