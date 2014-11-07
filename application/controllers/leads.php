<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Leads extends CI_Controller {

    public function access_map(){
        return array(
            'index'=>'view',
            'update'=>'edit'
        );
    }

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
       // $this->output->enable_profiler(TRUE); //Profiler Debug
        $this->load->model('Midae_model');
        $data['user_meta'] = $this->Midae_model->get_user_meta();
        $data['top_title'] = ucwords(strtolower($this->uri->segment('1'))); //URI title.
        $data['top_desc'] = "Change your page purpose here"; //function purpose here.
        //End of component

        $crud = new grocery_CRUD();
        $state = $crud->getState();
        $crud->set_theme('datatables');
        $crud->set_table('leads');
        $crud->set_subject('leads');
        $crud->set_relation('country_id','country','country_nicename');
        $crud->display_as('lead_name','Lead Name')
             ->display_as('lead_firstname','First Name')
             ->display_as('lead_lastname','Last Name')
             ->display_as('lead_email','Email')
             ->display_as('lead_phone','Phone Number')
             ->display_as('lead_mobile','Mobile Number')
             ->display_as('lead_fax','Fax Number')
             ->display_as('lead_address','Address')
             ->display_as('lead_postcode','Postcode')
             ->display_as('lead_state','State')
             ->display_as('country_id','Country')
             ->display_as('last_update','Date Changes');
        $crud->unset_texteditor('lead_address','full_text');
        $crud->unset_print();

        if($state == "add" | $state == "edit"){
        $crud->fields('lead_name','lead_firstname','lead_lastname','lead_email','lead_phone','lead_mobile','lead_fax','lead_address','lead_postcode','lead_state','country_id');
        $crud->callback_before_insert(array($this,'_last_update'));
        $output = $crud->render();
        $output = array_merge($data,(array)$output);
        $this->load->view('cruds.php',$output);
        }elseif ($state == "read") {
        $crud->fields('lead_name','lead_firstname','lead_lastname','lead_email','lead_phone','lead_mobile','lead_fax','lead_address','lead_postcode','lead_state','country_id','last_update');
        $crud->callback_before_insert(array($this,'_last_update'));
        $output = $crud->render();
        $output = array_merge($data,(array)$output);
        $this->load->view('cruds.php',$output);
        }
        else{
        $crud->columns('lead_name','lead_firstname','lead_lastname','lead_mobile','lead_address');
        $output = $crud->render();
        $output = array_merge($data,(array)$output);
        $this->load->view('cruds.php',$output);
        }

    }

}

/* End of file dashboard.php */
/* Location: ./application/controllers/leads.php */