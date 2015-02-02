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
 * @package    finance.php
 * @author     Nizam <nizam@segimidae.net>
 * @author     Norlihazmey <norlihazmey@segimidae.net>
 * @license    https://ellislab.com/codeigniter/user-guide/license.html
 * @copyright  2014 SEGI MiDae
 * @version    0.4.1
*/

class Finance extends MY_Controller {

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
        $this->load->helper('form');
    }

    public function index()
    {

        $data = array();
        $client = $this->input->post('client_id');
        $from_date  = $this->input->post('from_date');
        @$new_from_date = explode('-', $from_date);
        @$new_from_date = $new_from_date[2].'-'.$new_from_date[1].'-'.$new_from_date[0];
        $to_date = $this->input->post('to_date');
        @$new_to_date = explode('-', $to_date);
        @$new_to_date = $new_to_date[2].'-'.$new_to_date[1].'-'.$new_to_date[0];

        $data['from_date'] = $from_date;
        $data['to_date'] = $to_date;

        $data['clients'] = $this->Midae_model->get_all_rows("customers", false, false, false, false, false); //get all types of  job
        
        if($this->input->post('search')){

        if($this->input->post('client_id')!=""){
            $where = array("invoices.customer_id" => $client,"invoice_payments.invoice_payment_date >=" => $new_from_date,"invoice_payments.invoice_payment_date <=" => $new_to_date) ;
        }
        else if($this->input->post('client_id')==""){
            $where = array("invoice_payments.invoice_payment_date >=" => $new_from_date,"invoice_payments.invoice_payment_date <=" => $new_to_date) ;
        }
        
        
        //echo $where;
        

        $tableNameToJoin = array('invoice_payments','payments','customers');
        //$tableNameToJoin = 'payments';
        $tableRelation = array('invoices.invoice_id = invoice_payments.invoice_id',
                               'invoice_payments.payment_id = payments.payment_id',
                               'invoices.customer_id = customers.customer_id'
                               );
        $data['invoices']   = $this->Midae_model->get_all_rows1("invoices", $where, $tableNameToJoin, $tableRelation, false, false); //get all types of  job
        
        }
        else{

        }
                    $this->load->view('finance', $data);

    }

}

/* End of file finance.php */
/* Location: ./application/controllers/finance.php */