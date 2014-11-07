<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public $data_site = array();

    public function __construct() 
    {
        parent::__construct();
        $this->data_site['top_title'] = ucwords(strtolower($this->uri->segment('1'))); //URI title.
        $this->data_site['top_desc'] = "Change your page purpose here"; //function purpose here.
    }


	public function index()
	{
		$this->load->view('dashboard', $this->data_site);
	}

    public function access_map(){
        return array(
            'index'=>'view',
            'update'=>'edit'
        );
    }
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */