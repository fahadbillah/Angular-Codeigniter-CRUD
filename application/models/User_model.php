<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
	}

	public function create_user($user_data)
	{
		return $this->db->insert('users', $user_data);
	}

	public function ban_user($user_id)
	{
		$data = array(
			'status' => 'banned',
			);
		$condition = array(
			'user_id' => $user_id,
			);
		return $this->db->update('users', $data, $condition);
	}

	public function deactivate_user($user_id)
	{
		$data = array(
			'status' => 'deactivated',
			);
		$condition = array(
			'user_id' => $user_id,
			);
		return $this->db->update('users', $data, $condition);
	}

	public function activate_user($user_id)
	{
		$data = array(
			'status' => 'active',
			);
		$condition = array(
			'user_id' => $user_id,
			);
		return $this->db->update('users', $data, $condition);
	}

	public function check_if_social_user_exists($user_data)
	{
		$this->db->where('social_id', $user_data['social_id']);
		$this->db->where('login_type', 'facebook');
		$this->db->from('users');
		return (boolean) $this->db->count_all_results(); 
	}

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */