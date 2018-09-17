<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migrate extends CI_Controller
{
	public function __construct(){
		
		parent::__construct();
		
		$this->load->library(array('migration'));


	}

	public function index()
	{
		debug('Run migrate script');
	}

	public function latest(){
		if ($this->migration->latest() === FALSE){
			show_error($this->migration->error_string());
		}
	}

	public function reset(){

		if($this->migration->version(0)){
			if ($this->migration->latest() === FALSE){
				show_error($this->migration->error_string());
			}
		}else
		show_error($this->migration->error_string());
		
	}

	public function version($version_number){

		if($this->migration->version($version_number)){
			if ($this->migration->version($version_number) === FALSE){
				show_error($this->migration->error_string());
			}
		}else
		show_error($this->migration->error_string());
		
	}

}
