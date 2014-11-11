<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->migration->current();
	}
	public function index() {
		$db = $this->db->get('ap_list');
		$this->data['db']=$db;
		$this->data['tables'] = $this->db->list_tables();
		$this->load->view('welcome_message', $this->data);
	}
}

