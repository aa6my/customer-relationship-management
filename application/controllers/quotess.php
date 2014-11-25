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

class Quotess extends MY_Controller {

    public function access_map(){

        return array(
                        'index'             =>'view',
                        'update'            =>'edit',
                        'ajax_product'      => 'view',
                        'ajax_quote_delete' => 'view',
                        'ajax_quote_customer' => 'view',
                        'pdf' => 'view'
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


        $crud  = new grocery_CRUD();
        $state = $crud->getState();
        $crud->set_theme('datatables');
        $crud->set_table('quotes');
        $crud->set_subject('Quotes');

       /**********************************************
        *  Rendering in datatables
        */
        $crud->columns('quote_status','quote_id','quote_date_created','quote_valid_until','job_task_id')
             ->display_as('quote_id','Quotes no(#)')
             ->display_as('quote_date_created','Date issued')
             ->display_as('quote_valid_until','Valid until')
             ->display_as('job_task_id','Item');



        $crud->callback_after_delete(array($this,'delete_quote_n_quoteitems'));

         /**********************************************
        * When Add button clicked ==> View this part
        */
         if($state=="add"){

            
         }
         else if($state=="edit")
         {
             
        }
        else if($state=="read"){

             $data['top_title']   = ucwords(strtolower($this->uri->segment('1'))); //URI title.
             $data['top_desc']    = "Change your page purpose here"; /** function purpose here.**/
             
             $data['quote_id']    = $this->uri->segment(4) ;
             $table = "quotes"; 
             $where = array('quote_id' =>$data['quote_id']);
             $tableNameToJoin = "customers";
             $tableRelation = "quotes.customer_id = customers.customer_id";
             $data['quote'] = $this->Midae_model->get_specified_row($table,$where,false,$tableNameToJoin, $tableRelation);
             
            // $data['quote_item_id'] = $this->uri->segment(4);
             $table = "quote_items";
             $where = array('quote_id' =>$data['quote_id']);
             //$tableNameToJoin = "products";
             //$tableRelation = "quote_items.product_id = products.product_id";
             $data['quote_items'] = $this->Midae_model->get_all_rows($table,$where, false, false, false, false);
             $this->load->view('quote.php',$data);

          
        

        }

        else
        {

             $crud->callback_column('quote_status',array($this,'crud_quote_status'));
             $output              = $crud->render();
             //$output              = array_merge($data,(array)$output);
             $this->load->view('cruds.php',$output);
         }



    }

     public function pdf (){
        $this->load->library('pdf');
        //$id = $this->uri->segment(4);            
       //$this->pdf->load_view('invoicepdf', $data);
        //$this->pdf->render();
        //$this->pdf->stream("Invoice.pdf");
        //
             $data['quote_id']    = $this->uri->segment(3) ;
             $table = "quotes"; 
             $where = array('quote_id' =>$data['quote_id']);
             $tableNameToJoin = "customers";
             $tableRelation = "quotes.customer_id = customers.customer_id";
             $data['quote'] = $this->Midae_model->get_specified_row($table,$where,false,$tableNameToJoin, $tableRelation);
             
             $table = "quote_items";
             $where = array('quote_id' =>$data['quote_id']);
             $data['quote_items'] = $this->Midae_model->get_all_rows($table,$where, false, false, false, false);
             $this->load->view("quotepdf", $data);
               //$this->pdf->load_view('invoicepdf', $data);
        //$this->pdf->render();
        //$this->pdf->stream("Invoice.pdf");
    }
    

    public function crud_quote_status($value, $row)
    {
        $stat = "";
        $status = array(0 => '<font color="blue"><strong>DRAFT</strong></font>',
                        1 => '<font color="green"><strong>ACCEPTED</strong></font>',
                        2 => '<font color="red"><strong>REJECTED</strong></font>',
                        3 => '<font color="yellow"><strong>CANCELED</strong></font>'
                        );

        foreach($status as $key => $val){

            if($value==$key){
                $stat = $val;
                break;
            }
        }



        return $stat;
    }

    function delete_quote_n_quoteitems($quote_id){

        if($quote_id)
        {
            $where = array(
                'quote_id' => $quote_id
                );
            $this->Midae_model-> delete_data("quote_items", $where);
            return true;
        }
        else
        {
            return true;
        }

    }


    public function ajax_product(){

        $data['jenis']         = $this->input->post('jenis'); // will display to view part
        $jenis                 = $this->input->post('jenis'); //for condition only

        if($jenis=="display")
        {
            $table                = "catproduct";
            $data['id_table_row'] = $this->input->post('id_table_row');
            $data['current_no']   = $this->input->post('current_no');
            $data['category']     = $this->Midae_model->get_all_rows($table,false, false, false, false, false);
            $this->load->view('quote_ajax_product', $data, FALSE);
        }
        else if($jenis=="get_product")
        {
            $table                = "products";
            $data['id_table_row'] = $this->input->post('id_table');
            $data['current_no']   = $this->input->post('no');
            $catproduct_id        = $this->input->post('catproduct_id');
            $where                = array('catproduct_id'=>$catproduct_id);
            $data['product']      = $this->Midae_model->get_all_rows($table,$where, false, false, false, false);
            $this->load->view('quote_ajax_product', $data, FALSE);

        }
        else if($jenis=="assign_product")
        {
            header('Content-Type: application/json');
            $table             = "products";
            $product_id        = $this->input->post('product_id');
            $catproduct_id     = $this->input->post('catproduct_id');
            $where             = array('product_id'=>$product_id);
            $tableNameToJoin   = "catproduct";
            $tableRelation     = "products.catproduct_id = catproduct.catproduct_id";
            $return['product'] = $this->Midae_model->get_all_rows($table,$where, $tableNameToJoin, $tableRelation, false, false);
            echo json_encode($return);
            


        }



    }


    public function ajax_quote_delete(){

        $quote_item_id = $this->input->post('quote_item_id');
        $table = "quote_items";
        $where = array('quote_item_id' => $quote_item_id);
        $this->Midae_model->delete_data($table, $where);
    }


    public function ajax_quote_customer(){

           $name = $this->input->post('name_startsWith');
           $table = "customers";
           $where = array('customer_name LIKE' => $name.'%');
           //$likes = array('customer_name'=>$name);
           //$places = "after";
           $data['customer'] = $this->Midae_model->get_all_rows($table,$where, false, false, false, false);

           // if($_GET['type'] == 'country'){
               /* $result = mysql_query("SELECT name FROM country where name LIKE '".strtoupper($_GET['name_startsWith'])."%'");  
                $data = array();
                while ($row = mysql_fetch_array($result)) {
                    array_push($data, $row['name']);    
                }   */
          echo json_encode($data['customer']);
            //}


    }



}