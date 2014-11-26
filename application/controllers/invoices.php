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

class Invoices extends MY_Controller {

    public function access_map(){

        return array(
                        'index'                 =>'view',
                        'update'                =>'edit',
                        'ajax_product'          => 'view',
                        'ajax_invoice_delete'   => 'view',
                        'ajax_invoice_customer' => 'view',
                        'ajax_invoice_payment'  => 'view'
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
        $crud->set_table('invoices');
        $crud->set_subject('Invoices');

       /**********************************************
        *  Rendering in datatables
        */
        $crud->columns('invoice_status','invoice_number','invoice_date_created','customer_id')
             ->display_as('invoice_number','Invoices no(#)')
             ->display_as('invoice_date_created','Date issued')
             //->display_as('quote_valid_until','Valid until')
             ->display_as('customer_id','Customer');



        $crud->callback_after_delete(array($this,'delete_invoice_n_invoiceitems'));

         /**********************************************
        * When Add button clicked ==> View this part
        */
         if($state=="add"){

            $data['top_title'] = ucwords(strtolower($this->uri->segment('1'))); //URI title.
            $data['top_desc']  = "Change your page purpose here"; /** function purpose here.**/

            $this->load->view('invoice_add',$data);

            if($this->input->post('save')) //when save button clicked
            {
                $postData = $this->input->post();
                $bil      = count($postData['item_name']);
                $invoice          = $this->get_invoice_number();
                $invoice_number   = ($invoice!="") ? $invoice['invoice_number'] : "";
                $invoice_number   = ($invoice_number!="") ? $invoice_number + 1 : 10001;

                /** insert into invoice table **/
                $arrayData = array('invoice_subject'          => $postData['invoice_subject'],
                                   'invoice_date_created'     => $postData['invoice_date_created'],
                                   'invoice_number'           => $invoice_number,
                                   'invoice_valid_until'      => $postData['invoice_valid_until'],
                                   'customer_id'              => $postData['customer_id'],
                                   'invoice_customer_notes'   => $postData['invoice_customer_notes'],
                                   'invoice_status'           => $postData['invoice_status']
                                   );
                $insert = $this->Midae_model->insert_new_data($arrayData,"invoices");
                $invoice_id = $insert;

                /** insert into invoices items table **/
                for($i = 0; $i < $bil; $i++ ){

                    $arrayData = array( 'invoice_id'                  => $invoice_id,
                                        'product_id'                  => $postData['quote_product_id'][$i],
                                        'invoice_item_name'           => $postData['item_name'][$i],
                                        'invoice_item_description'    => $postData['item_description'][$i],
                                        'invoice_item_price'          => $postData['item_price'][$i],
                                        'invoice_item_quantity'       => $postData['item_quantity'][$i],
                                        'invoice_item_discount'       => $postData['item_discount'][$i],
                                        'invoice_item_subtotal'       => $postData['item_subtotal'][$i]
                                      );
                     $this->Midae_model->insert_new_data($arrayData,"invoice_items");

                }

                $this->Midae_model->display_message("save", "invoices");

            }
         }
         else if($state=="edit")
         {
             $data['top_title']     = ucwords(strtolower($this->uri->segment('1'))); //URI title.
             $data['top_desc']      = "Change your page purpose here"; /** function purpose here.**/
             
             $data['invoice_id']    = $this->uri->segment(4) ;
             $table                 = "invoices";
             $where                 = array('invoice_id' => $data['invoice_id']);
             $tableNameToJoin       = "customers";
             $tableRelation         = "invoices.customer_id = customers.customer_id";
             $data['invoice']       = $this->Midae_model->get_specified_row($table,$where,false,$tableNameToJoin, $tableRelation);

             $data['top_title']     .= " No : #".$data['invoice']['invoice_number'];
             $table                 = "invoice_items";
             $data['invoice_items'] = $this->Midae_model->get_all_rows($table,$where, false, false,false, false);

             $table = "invoice_payments";
             $where = array('invoice_payments.invoice_id' => $data['invoice_id']);
             $tableNameToJoin = "payments";
             $tableRelation = "invoice_payments.payment_id = payments.payment_id";
             $data['invoice_payments'] = $this->Midae_model->get_all_rows($table,$where, $tableNameToJoin, $tableRelation,false, false);
             $this->load->view('invoice_edit',$data);

             if($this->input->post('save')) //when save button clicked
            {
                $postData       = $this->input->post();
                           
                $columnToUpdate = array('invoice_subject'          => $postData['invoice_subject'],
                                        'invoice_date_created'     => $postData['invoice_date_created'],
                                        'invoice_valid_until'      => $postData['invoice_valid_until'],
                                        'customer_id'            => $postData['customer_id'],                                   
                                        'invoice_customer_notes'   => $postData['invoice_customer_notes'],
                                        'invoice_status'           => $postData['invoice_status']
                                        );
                $usingCondition = array('invoice_id' => $data['invoice_id']);
                $table          = "invoices";
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
                        /** insert the new entry into invoice_items table **/
                        $arrayData = array( 'invoice_id'                  => $data['invoice_id'],
                                            'product_id'                => $postData['quote_product_id'][$i],
                                            'invoice_item_name'           => $postData['item_name'][$i],
                                            'invoice_item_description'    => $postData['item_description'][$i],
                                            'invoice_item_price'          => $postData['item_price'][$i],
                                            'invoice_item_quantity'       => $postData['item_quantity'][$i],
                                            'invoice_item_discount'       => $postData['item_discount'][$i],
                                            'invoice_item_subtotal'       => $postData['item_subtotal'][$i]
                                          );
                        $table = "invoice_items";
                        $this->Midae_model->insert_new_data($arrayData,$table);
                    }
                    else if($postData['quote_product_id'][$i]!="" && $postData['quote_item_id'][$i] !="")
                    {
                        /** update the current rows, row by row **/
                        $columnToUpdate = array( //'quote_id'                  => $quote_id,
                                            'product_id'                => $postData['quote_product_id'][$i],
                                            'invoice_item_name'           => $postData['item_name'][$i],
                                            'invoice_item_description'    => $postData['item_description'][$i],
                                            'invoice_item_price'          => $postData['item_price'][$i],
                                            'invoice_item_quantity'       => $postData['item_quantity'][$i],
                                            'invoice_item_discount'       => $postData['item_discount'][$i],
                                            'invoice_item_subtotal'       => $postData['item_subtotal'][$i]
                                          );
                        $usingCondition = array('invoice_item_id' => $postData['quote_item_id'][$i]);
                        $table = "invoice_items";
                        $this->Midae_model->update_data($columnToUpdate, $table, $usingCondition);
                    }

                }

                $this->Midae_model->display_message("record", "invoices");

            }
        }
        else if($state=="read"){

             $data['top_title']   = ucwords(strtolower($this->uri->segment('1'))); //URI title.
             $data['top_desc']    = "Change your page purpose here"; /** function purpose here.**/
             
             $data['invoice_id']    = $this->uri->segment(4) ;
             $table = "invoices"; 
             $where = array('invoice_id' =>$data['invoice_id']);
             $tableNameToJoin = "customers";
             $tableRelation = "invoices.customer_id = customers.customer_id";
             $data['invoice'] = $this->Midae_model->get_specified_row($table,$where,false,$tableNameToJoin, $tableRelation);
            
             $table               = "invoice_items";
             $where = array('invoice_id' =>$data['invoice_id']);
             $data['invoice_items'] = $this->Midae_model->get_all_rows($table,$where, false, false,false, false);

             $table ="invoice_payments";
             $where = array('invoice_id' => $data['invoice_id']);
             $data['invoice_payments'] = $this->Midae_model->get_all_rows($table,$where, false, false, false, false);


             $this->load->view('invoice.php', $data);

        }

        else
        {

             $crud->callback_column('invoice_status',array($this,'crud_invoice_status'))
                  ->callback_column('customer_id',array($this,'crud_customer_display'));
             $output              = $crud->render();
            // $output              = array_merge($data,(array)$output);
             $this->load->view('cruds.php',$output);
         }



    }

    public function pdf (){
             $this->load->library('pdf');
             $data['invoice_id']    = $this->uri->segment(3) ;
             $table = "invoices"; 
             $where = array('invoice_id' =>$data['invoice_id']);
             $tableNameToJoin = "customers";
             $tableRelation = "invoices.customer_id = customers.customer_id";
             $data['invoice'] = $this->Midae_model->get_specified_row($table,$where,false,$tableNameToJoin, $tableRelation);
       
             $table = "invoice_items";
             $where = array('invoice_id' =>$data['invoice_id']);
             $data['invoice_items'] = $this->Midae_model->get_all_rows($table,$where, false, false,false, false);

             $table ="invoice_payments";
             $where = array('invoice_id' => $data['invoice_id']);
             $data['invoice_payments'] = $this->Midae_model->get_all_rows($table,$where, false, false, false, false);
             //$this->load->view("invoicepdf", $data);
             $p = new pdf();
             $p->load_view('invoicepdf', $data);
             $p->set_paper('c4', 'potrait');
             $p->render();
             $p->stream("Invoice.pdf");
    }
   

    public function get_invoice_number(){

        $table    = "invoices";
        $order_by = array('invoice_id','desc');
        $data     = $this->Midae_model->get_specified_row($table,false,$order_by,false, false);

        return $data;
    }
    
    
    public function crud_invoice_status($value, $row)
    {
        $stat = "";
        $status = array(0 => '<font color="blue"><strong>DRAFT</strong></font>',
                        1 => '<font color="green"><strong>PAID</strong></font>',
                        2 => '<font color="red"><strong>UNPAID</strong></font>',
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


    public function crud_customer_display($key, $row){
      $table = "customers";
      $where = array('customer_id' => $key);

      $customer = $this->Midae_model->get_specified_row($table,$where,false,false, false);
      $name = $customer['customer_name'];
      return '<a href="customers/index/read/'.$key.'" target="blank">'.$name.'</a>';
    }

    function delete_invoice_n_invoiceitems($invoice_id){

        if($invoice_id)
        {
            $where = array(
                'invoice_id' => $invoice_id
                );
            $this->Midae_model->delete_data("invoice_items", $where);
            $this->Midae_model->delete_data("invoice_payments", $where);
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

    public function ajax_invoice_payment(){

        $jenis = $this->input->post('jenis');
        $data['id_invoice'] = $this->input->post('id_invoice');

        if($jenis=="display"){

            $table = "payments";
            $data['payment_type'] = $this->Midae_model->get_all_rows($table,false, false, false, false, false);
            $this->load->view('invoice_payment_ajax', $data);
        }
        else if($jenis=="add"){

            if($this->input->post('save')){

                $postData   = $this->input->post();
                $table      = "invoice_payments";
                $arrayData  = array('invoice_id'                => $postData['invoice_id'],
                                    'payment_id'                => $postData['payment_id'],
                                    'invoice_payment_amount'    => $postData['invoice_payment_amount'],
                                    'invoice_payment_date'      => $postData['invoice_payment_date'],
                                    'invoice_payment_note'      => $postData['invoice_payment_note'] 
                                   );

                $this->Midae_model->insert_new_data($arrayData,$table);
                $this->Midae_model->display_message("save","invoices/index/edit/{$postData['invoice_id']}");
            }
        }
    }

    public function ajax_invoice_delete(){

        $invoice_item_id = $this->input->post('invoice_item_id');
        $table = "invoice_items";
        $where = array('invoice_item_id' => $invoice_item_id);
        $this->Midae_model->delete_data($table, $where);
    }


    public function ajax_invoice_customer(){

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