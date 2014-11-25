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

class Quotes extends MY_Controller {

    public function access_map(){

        return array(
                        'index'             =>'view',
                        'update'            =>'edit',
                        'ajax_product'      => 'view',
                        'ajax_quote_delete' => 'view',
                        'ajax_quote_customer' => 'view',
                        'convert_to_invoive' => 'view'
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

        //$this->output->enable_profiler(false);
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

            $data['top_title'] = ucwords(strtolower($this->uri->segment('1'))); //URI title.
            $data['top_desc']  = "Change your page purpose here"; /** function purpose here.**/

            $this->load->view('quote_add',$data);

            if($this->input->post('save')) //when save button clicked
            {
                $postData = $this->input->post();
                $bil      = count($postData['item_name']);

                /** insert into quote table **/
                $arrayData = array('quote_subject'          => $postData['quote_subject'],
                                   'quote_date_created'     => $postData['quote_date_created'],
                                   'quote_valid_until'      => $postData['quote_valid_until'],
                                   'customer_id'            => $postData['customer_id'],
                                   'quote_customer_notes'   => $postData['quote_customer_notes'],
                                   'quote_status'           => $postData['quote_status']
                                   );
                $insert = $this->Midae_model->insert_new_data($arrayData,"quotes");
                $quote_id = $insert;

                /** insert into quote items table **/
                for($i = 0; $i < $bil; $i++ ){

                    $arrayData = array( 'quote_id'                  => $quote_id,
                                        'product_id'                => $postData['quote_product_id'][$i],
                                        'quote_item_name'           => $postData['item_name'][$i],
                                        'quote_item_description'    => $postData['item_description'][$i],
                                        'quote_item_price'          => $postData['item_price'][$i],
                                        'quote_item_quantity'       => $postData['item_quantity'][$i],
                                        'quote_item_discount'       => $postData['item_discount'][$i],
                                        'quote_item_subtotal'       => $postData['item_subtotal'][$i]
                                      );
                     $this->Midae_model->insert_new_data($arrayData,"quote_items");

                }

                $this->Midae_model->display_message("save", "quotes");

            }
         }
         else if($state=="edit")
         {
             $data['top_title']   = ucwords(strtolower($this->uri->segment('1'))); //URI title.
             $data['top_desc']    = "Change your page purpose here"; /** function purpose here.**/

             $data['quote_id']    = $this->uri->segment(4) ;
             $table               = "quotes";
             $where               = array('quote_id' => $data['quote_id']);
             $tableNameToJoin = "customers";
             $tableRelation = "quotes.customer_id = customers.customer_id";
             $data['quote']       = $this->Midae_model->get_specified_row($table,$where,false,$tableNameToJoin, $tableRelation);
             $table               = "quote_items";
             $data['quote_items'] = $this->Midae_model->get_all_rows($table,$where, false, false,false, false);
             $this->load->view('quote_edit',$data);

             if($this->input->post('save')) //when save button clicked
            {
                $postData       = $this->input->post();
                           
                $columnToUpdate = array('quote_subject'          => $postData['quote_subject'],
                                        'quote_date_created'     => $postData['quote_date_created'],
                                        'quote_valid_until'      => $postData['quote_valid_until'],
                                        'customer_id'            => $postData['customer_id'],                                   
                                        'quote_customer_notes'   => $postData['quote_customer_notes'],
                                        'quote_status'           => $postData['quote_status']
                                        );
                $usingCondition = array('quote_id' => $data['quote_id']);
                $table          = "quotes";
                $update         = $this->Midae_model->update_data($columnToUpdate, $table, $usingCondition);
                
                
                $bil            = count($postData['item_name']);
                for($i = 0; $i < $bil; $i++ )
                {
                    if($postData['quote_product_id'][$i] =="" && $postData['quote_item_id'][$i] == "")
                    {
                        /** no need to insert the empty rows **/
                    }
                    else if($postData['quote_product_id'][$i]!="" && $postData['quote_item_id'][$i] =="")
                    {
                        /** insert the new entry into quote_items table **/
                        $arrayData = array( 'quote_id'                  => $data['quote_id'],
                                            'product_id'                => $postData['quote_product_id'][$i],
                                            'quote_item_name'           => $postData['item_name'][$i],
                                            'quote_item_description'    => $postData['item_description'][$i],
                                            'quote_item_price'          => $postData['item_price'][$i],
                                            'quote_item_quantity'       => $postData['item_quantity'][$i],
                                            'quote_item_discount'       => $postData['item_discount'][$i],
                                            'quote_item_subtotal'       => $postData['item_subtotal'][$i]
                                          );
                        $table = "quote_items";
                        $this->Midae_model->insert_new_data($arrayData,$table);
                    }
                    else if($postData['quote_product_id'][$i]!="" && $postData['quote_item_id'][$i] !="")
                    {
                        /** update the current rows, row by row **/
                        $columnToUpdate = array( //'quote_id'                  => $quote_id,
                                            'product_id'                => $postData['quote_product_id'][$i],
                                            'quote_item_name'           => $postData['item_name'][$i],
                                            'quote_item_description'    => $postData['item_description'][$i],
                                            'quote_item_price'          => $postData['item_price'][$i],
                                            'quote_item_quantity'       => $postData['item_quantity'][$i],
                                            'quote_item_discount'       => $postData['item_discount'][$i],
                                            'quote_item_subtotal'       => $postData['item_subtotal'][$i]
                                          );
                        $usingCondition = array('quote_item_id' => $postData['quote_item_id'][$i]);
                        $table = "quote_items";
                        $this->Midae_model->update_data($columnToUpdate, $table, $usingCondition);
                    }

                }

                $this->Midae_model->display_message("record", "quotes");

            }
        }
        else if($state=="read"){

             $data['top_title']   = ucwords(strtolower($this->uri->segment('1'))); //URI title.
             $data['top_desc']    = "Change your page purpose here"; /** function purpose here.**/
             $this->load->view('quote',$data);

        }

        else
        {

             $crud->callback_column('quote_status',array($this,'crud_quote_status'));
             $output              = $crud->render();
            // $output              = array_merge($data,(array)$output);
             $this->load->view('cruds.php',$output);
         }



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

    public function get_invoice_number(){

        $table               = "invoices";
        $order_by = array('invoice_id','desc');
        $data = $this->Midae_model->get_specified_row($table,false,$order_by,false, false);

        return $data;
    }


    public function convert_to_invoive(){

        /**
         * will call this function to fetch data from quote and quote items table, then insert all of them into invoice and invoices item
         * after all. delete all the data from quote table
         */
        $data['quote_id'] = $this->uri->segment(3) ;
        $table            = "quotes";
        $where            = array('quote_id' => $data['quote_id']);
        $quotes           = $this->Midae_model->get_specified_row($table,$where,false,false, false);
        $invoice          = $this->get_invoice_number();
        $invoice_number   = ($invoice=="") ? $invoice['invoice_number'] : "";
        $invoice_number   = ($invoice_number!="") ? $invoice_number + 1 : 10001;
        $arrayData        = array( 'customer_id'            =>$quotes['customer_id'],
                                   'invoice_subject'        => $quotes['quote_subject'],
                                   'invoice_date_created'   => date('Y-m-d'),
                                   'invoice_number'         => $invoice_number,
                                   'invoice_customer_notes' => $quotes['quote_customer_notes'],
                                   'invoice_valid_until'    => $quotes['quote_valid_until'],
                                   'invoice_status'         => $quotes['quote_status']
                                   );
        $table            = "invoices";
        
        $invoice_id = $this->Midae_model->insert_new_data($arrayData,$table);
        
    
        $table               = "quote_items";
        $quote_items = $this->Midae_model->get_all_rows($table,$where, false, false, false, false);
        $bil = count($quote_items);
       
        for($i = 0; $i < $bil; $i++)
        {

            $arrayData = array('invoice_id'                 => $invoice_id,
                               'product_id'                 => @$quote_items[$i]['product_id'],
                               'invoice_item_name'          => @$quote_items[$i]['quote_item_name'],
                               'invoice_item_description'   => @$quote_items[$i]['quote_item_description'],
                               'invoice_item_price'         => @$quote_items[$i]['quote_item_price'],
                               'invoice_item_quantity'      => @$quote_items[$i]['quote_item_quantity'],
                               'invoice_item_discount'      => @$quote_items[$i]['quote_item_discount'],
                               'invoice_item_subtotal'      => @$quote_items[$i]['quote_item_subtotal']
                               );
            $table               = "invoice_items";
            $this->Midae_model->insert_new_data($arrayData,$table);
                
        }

        $this->Midae_model->delete_data("quotes", array('quote_id' => $data['quote_id']));
        $this->Midae_model->delete_data("quote_items", array('quote_id' => $data['quote_id']));
        $this->Midae_model->display_message("convert", "invoices/index/edit/$invoice_id");
       
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
           $likes = $name;
           //$places = "after";
           $data['customer'] = $this->Midae_model->get_all_rows_quote($table,$where, false, false, false);

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