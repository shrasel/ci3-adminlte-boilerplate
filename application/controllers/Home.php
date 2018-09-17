<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends KN_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {

		$last = date("Y-m-01 00:00:00");

	
		$now = date("Y-m-d H:i:s"); // or your date as well
		

		$this->data['content'] = 'home/index';
		$this->load->view('layout/default', $this->data);

	}

}