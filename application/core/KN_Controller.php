<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class KN_Controller extends CI_Controller {

	public $data = array();

	public function __construct()
	{
		
		parent::__construct();

		$this->load->library('ion_auth');
		$this->load->helper('inflector');
		
		if (!$this->ion_auth->logged_in())
		{
			redirect('login');
		}

		$this->data['add_js'] = [];
		$this->data['add_css'] = [];
		$this->data['active_user'] = $this->ion_auth->user()->row();

	}

	

}