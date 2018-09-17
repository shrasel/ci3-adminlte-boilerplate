<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends KN_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('setting');
		$this->load->helper('text');
		$fillable = ['key','value'];

	}

	public function index() {

		$settings = $this->setting->all();
		$new = [];

		foreach($settings as $set){
			$new[$set['key']]=$set['value'];
		}

		$this->data['settings'] = $new;

		$this->data['content'] = 'admin/settings/index';
		$this->load->view('layout/default', $this->data);

	}

	public function save()
	{
		if(!$this->input->post())
		{
			flash_message('_error', 'You are not allowed to make this action!!!');
			redirect('settings');
		}
        
        $data = $this->input->post();

        foreach($data as $key=>$value){
        	$_dt['key']=$key;
        	$_dt['value']=$value;
        	if($this->setting->checkByKey($key))
        		$this->setting->updateByKey($_dt);
        	else
        		$this->setting->save($_dt);	
        }

		flash_message('_success', "Settings Saved Successfully");

		redirect('settings');
		
	}



}