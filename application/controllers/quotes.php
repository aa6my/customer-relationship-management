<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quotes extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');

        $this->load->library('grocery_CRUD');
    }

	public function index()
	{

        // Component
        //$this->output->enable_profiler(TRUE); //Profiler Debug
        $this->load->model('Midae_model');
        $data['user_meta'] = $this->Midae_model->get_user_meta();
        $data['top_title'] = ucwords(strtolower($this->uri->segment('1'))); //URI title.
        $data['top_desc'] = "Customer Form"; //function purpose here.
        //End of component

            $this->load->view('dashboard.php', $data);
	}

    public function access_map(){
        return array(
            'index'=>'view',
            'update'=>'edit'
        );
    }


  
    public function _customers_output($output = null)
    {
        $this->load->view('customers.php',$output);
    }

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */