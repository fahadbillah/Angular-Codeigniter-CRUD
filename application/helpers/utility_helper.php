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

/* End of file utility_helper.php */
/* Location: ./application/helpers/utility_helper.php */