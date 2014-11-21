<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**

    +-+-+-+-+ +-+-+-+-+-+
    |S|E|G|I| |M|i|D|a|e|
    +-+-+-+-+ +-+-+-+-+-+

 * Customer Relationship Management [CRM]
 *
 * http://www.segimidae.net
 *
 * PHP version 5
 *
 * @category   controllers
 * @package    invoices.php
 * @author     Nizam <nizam@segimidae.net>
 * @author     Norlihazmey <norlihazmey@segimidae.net>
 * @license    https://ellislab.com/codeigniter/user-guide/license.html
 * @copyright  2014 SEGI MiDae
 * @version    0.4.1
*/

class Invoices extends CI_Controller {

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

       
        $this->output->enable_profiler(TRUE); //Profiler Debug
        $this->load->model('Midae_model');
        $data['user_meta'] = $this->Midae_model->get_user_meta();
        $data['top_title'] = ucwords(strtolower($this->uri->segment('1'))); //URI title.
        $data['top_desc']  = "Sale Transaction"; //function purpose here.

        //End of component

        $crud  = new grocery_CRUD();
        $state = $crud->getState();
        $crud->set_theme('datatables');
        $crud->set_table('invoices');
        $crud->set_subject('Invoices');        
        //$crud->unset_print();    
        //$crud->unset_read();
        //$crud->callback_after_delete(array($this,'delete_job_n_jobtask'));     
        //$crud->callback_before_insert(array($this,'_last_update'));
        
        
        /** lepas ni tambah mn2 relation **/
        $crud->columns('invoice_status','invoice_number','invoice_due_date','invoice_date_created','job_status');
       /* $crud->display_as('job_type_id','Job type');
        $crud->callback_column('job_type_id',array($this,'crud_job_type'))
             ->callback_column('job_status',array($this,'crud_job_status'));*/
        $output = $crud->render();
        $output = array_merge($data,(array)$output);
        $this->load->view('cruds.php',$output);


        
	}

    


   /* public function _customers_output($output = null)
    {
        $this->load->view('customers.php',$output);
    }*/

}

/* End of file invoices.php */
/* Location: ./application/controllers/invoices.php */