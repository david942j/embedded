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
		/*$db = $this->db->get('ap_list');
		$this->data['db']=$db;
		$this->data['tables'] = $this->db->list_tables();*/
		$this->data['cpuinfo'] = file_get_contents('/proc/cpuinfo');
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

	public function wire() {
		if($this->current_user()===FALSE)return ;
		$this->data['user'] = $this->current_user();

	}

	public function wireless() {
		if($this->current_user()===FALSE)return ;
		$this->data['user'] = $this->current_user();
		$this->data['wpa_conf']=$this->db->get('ap_list');
		$this->load->view('wireless', $this->data);
	}

	private function current_user() {
		$this->check_data_created();
		$user = $this->session->userdata('username');
		if($user===FALSE)$this->load->view('login');
		return $user;
	}

	private function check_data_created() {
		$rows = $this->db->get_where('users', array('username' => 'david942j'));
		if($rows->num_rows()==0) {
			$this->db->insert('users', array(
					'username' => 'david942j',
					'password' => 'cfcd208495d565ef66e7dff9f98764da'
				));
		}

		$rows = $this->db->get('ap_list');
		if($rows->num_rows()==0) {
			$data = $this->parse_wpa();
			foreach($data as $row) {
				$this->db->insert('ap_list',$row);
			}
		}
	}

	private function encryption($str) {
		$salt = 'j&!*3dsaio';
		return md5($salt+$str);
	}

	private function parse_wpa() {
		$str = file_get_contents('/etc/wpa1.conf');
		$str = preg_replace('!\s+!', ' ', str_replace(array("{","}","=","\"")," ",$str));
		$arr = explode(' ', $str);
		$ret = array();
		$count=0;
		for($i=0;$i<count($arr);$i++) {
			if($arr[$i]=='network') {
				$ret[$count] = array(
					'ssid'=> $arr[$i+2],
					'type'=>'wpa',
					'psk'=> $arr[$i+4], 
					'priority'=> intval($arr[$i+6])
				);
				$count+=1;
				$i+=6;
			}
			else if($arr[$i]!='')show_error('error when parsing /etc/wpa1.conf'.$arr[$i]);
		}
		return $ret;
	}
}
