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

class Quotes extends CI_Controller {

    public function access_map(){
        return array(
            'index'=>'view',
            'update'=>'edit',
            'ajax_product' => 'view'
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
        $data['top_desc']  = "Sales Quote"; //function purpose here.

        //End of component

        $crud  = new grocery_CRUD();
        $state = $crud->getState();
        $crud->set_theme('datatables');
        $crud->set_table('quotes');
        $crud->set_subject('Quotes');        
        
        
       /**********************************************
        *  Rendering in datatables
        */
        $crud->columns('quote_status','quote_id','quote_date_created','invoice_date_created','quote_valid_until','job_task_id')
             ->display_as('quote_id','Quotes no.')
             ->display_as('invoice_date_created','Date issued')
             ->display_as('quote_valid_until','Valid until')
             ->display_as('job_task_id','Item');

        

      

         /**********************************************
        * When Add button clicked ==> View this part
        */
         if($state=="add"){

            $data['top_title'] = ucwords(strtolower($this->uri->segment('1'))); //URI title.
            $data['top_desc']  = "Change your page purpose here"; //function purpose here.*/
            //$data['groupData'] = $this->get_temporary_data();
            $this->load->view('quote_add',$data);
         }
         else if($state=="edit"){
         }
         else{
            $output = $crud->render();
            $output = array_merge($data,(array)$output);
            $this->load->view('cruds.php',$output);
         }



    }


    public function ajax_product(){

        $data['jenis'] = $this->input->post('jenis'); // will display to view part
        //$data['add_product'] = $this->input->post('add_product');
        $jenis = $this->input->post('jenis'); //for condition only

        if($jenis=="display")
        {
            $table            = "catproduct";
            $data['id_table_row'] = $this->input->post('id_table_row');
            $data['current_no'] = $this->input->post('current_no');
            $data['category'] = $this->Midae_model->get_all_rows($table,false, false, false);
            $this->load->view('quote_ajax_product', $data, FALSE);
        }
        else if($jenis=="get_product")
        {
            $table            = "products";
            $data['id_table_row'] = $this->input->post('id_table_row');
            $data['current_no'] = $this->input->post('current_no');
            $catproduct_id   = $this->input->post('catproduct_id');
            $where = array('catproduct_id'=>$catproduct_id);
            $data['product'] = $this->Midae_model->get_all_rows($table,$where, false, false);
            $this->load->view('quote_ajax_product', $data, FALSE);

        }
        else if($jenis=="assign_product")
        {
            header('Content-Type: application/json');
            $table = "products";
            $product_id   = $this->input->post('product_id');
            $catproduct_id   = $this->input->post('catproduct_id');
            $where = array('product_id'=>$product_id);
            $tableNameToJoin = "catproduct";
            $tableRelation = "products.catproduct_id = catproduct.catproduct_id";
            $return['product'] = $this->Midae_model->get_all_rows($table,$where, $tableNameToJoin, $tableRelation);
            echo json_encode($return);
            //$this->load->view('ajax_product', $data, FALSE);


        }

        

    }

    

}