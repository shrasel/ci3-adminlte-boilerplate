<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migrate extends CI_Controller
{
	public function __construct(){
		
		parent::__construct();
		
		$this->load->library(array('migration'));

		if(!is_cli()) die('Please run the script from command line. php path/to/your/project/ index.php migrate latest');


	}

	public function index()
	{
		echo 'Run migrate script';
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
