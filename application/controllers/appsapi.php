<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Appsapi extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function access_map(){
        return array(
            'index'=>'view',
            'update'=>'edit'
        );
    }

	function index()
	{
		$this->load->helper('url');
		$this->load->view('api');

		
	}
}
