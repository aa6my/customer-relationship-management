<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    //public $data_site = array();

    public function __construct() 
    {
        parent::__construct();
    }


	public function index()
	{
        // Component
        $this->load->model('Midae_model');
        $data['user_meta'] = $this->Midae_model->get_user_meta();
        $data['top_title'] = ucwords(strtolower($this->uri->segment('1'))); //URI title.
        $data['top_desc'] = "Change your page purpose here"; //function purpose here.
        //End of component
		$this->load->view('dashboard', $data);
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