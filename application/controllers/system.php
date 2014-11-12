<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class System extends CI_Controller {
	function __construct(){
		parent::__construct();
		if (!$this->migration->current())
			show_error($this->migration->error_string());
	}

	public function index() {
		if($this->current_user()===FALSE)return ;
		$this->data['user'] = $this->current_user();
		$db = $this->db->get('ap_list');
		$this->data['db']=$db;
		$this->data['tables'] = $this->db->list_tables();
		$this->load->view('index', $this->data);
	}

	public function login() {
		$username = $_POST['username'];
		$password = $this->encryption($_POST['password']);
		$rows = $this->db->get_where('users', array('username' => $username,'password'=>$password));
		if($rows->num_rows()==0) {
			show_error('login error.');
			return ;
		}
		else {
			$this->session->set_userdata(array('username'=>$username));
			$this->index();
		}
	}

	private function current_user() {
		$this->check_admin_created();
		$user = $this->session->userdata('username');
		if($user===FALSE)$this->load->view('login');
		return $user;
	}

	private function check_admin_created() {
		$rows = $this->db->get_where('users', array('username' => 'david942j'));
		if($rows->num_rows()==0) {
			$this->db->insert('users', array(
					'username' => 'david942j',
					'password' => 'cfcd208495d565ef66e7dff9f98764da'
				));
		}
	}

	private function encryption($str) {
		$salt = 'j&!*3dsaio';
		return md5($salt+$str);
	}
}
