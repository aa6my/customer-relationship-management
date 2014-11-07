<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Websites extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');

        $this->load->library('grocery_CRUD');
    }

    public function index()
    {

            //$this->_customers_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            //$this->load->view('header');
            $crud->set_table('customers');
            $crud->columns('customerName','contactLastName','phone','city','country','salesRepEmployeeNumber','creditLimit');
            $crud->display_as('salesRepEmployeeNumber','from Employeer')
                 ->display_as('customerName','Name')
                 ->display_as('contactLastName','Last Name');
            $crud->set_subject('Customer');
            $crud->set_relation('salesRepEmployeeNumber','employees','lastName');
            $crud->unset_print();
            $data['top_title'] = ucwords(strtolower($this->uri->segment('1'))); //URI title.
            $data['top_desc'] = "Change your page purpose here"; //function purpose here.
            
            $output = $crud->render();
            $output = array_merge($data,(array)$output);

            $this->load->view('cruds.php',$output);
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