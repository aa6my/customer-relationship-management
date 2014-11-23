<?php

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
 * @category   models
 * @package    midae_model.php
 * @author     Nizam <nizam@segimidae.net>
 * @author     Norlihazmey <norlihazmey@segimidae.net>
 * @license    https://ellislab.com/codeigniter/user-guide/license.html
 * @copyright  2014 SEGI MiDae
 * @version    0.4.1
*/

class Midae_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    // Query the database to get some data and return the result
    function get_user_meta()
    {
        $id = $this->session->userdata('user_id');
        $this->db->select('*');
        $this->db->from('user_meta');
        $this->db->where('user_id', $id); 
        $query = $this->db->get();
        return $query->row_array();    
    }


    function get_website()
    {
        $data = array();
        $query = $this->db->query("SELECT *FROM websites");

            foreach ($query->result_array() as $row)
            {
               $data[] = $row;
            }

            return $data;
    }



    function get_customer()
    {
        $data = array();
        $query = $this->db->query("SELECT *FROM customers");

            foreach ($query->result_array() as $row)
            {
               $data[] = $row;
            }

            return $data;
    }

    function get_staff_member()
    {
        $data = array();
        $query = $this->db->query("SELECT *FROM user_meta");

            foreach ($query->result_array() as $row)
            {
               $data[] = $row;
            }

            return $data;
    }

    function get_setting_userrole()
    {
        $data = array();
        $query = $this->db->query("SELECT *FROM user_role");

            foreach ($query->result_array() as $row)
            {
               $data[] = $row;
            }

            return $data;
    }

    function popup($data)
    {
        $this->load->view('popup', $data);
    }


    function get_count_product($table)
    {
        //$data = array();
       return  $this->db->count_all_results($table);

        //return $data;
    }



    /**
     * [insert_new_data insert data into table - any type of table]
     * @param  [type] $arrayData [data value received from controller(column and value already)]
     * @param  [type] $table     [name of table to insert the data]
     * @return [type]            [description]
     */
     function insert_new_data($arrayData,$table)
    {

        $this->db->insert($table,$arrayData);
        //$this->db->_error_message();
       // return  $this->db->_error_message();
        return $this->db->insert_id();
    }





    /**
     * [delete_data delete all type of table]
     * @param  [type] $table [name of table]
     * @param  [type] $where [condition to applied]
     * @return [type]        [description]
     */
    public function delete_data($table, $where){

        $this->db->where($where);
        $this->db->delete($table);
    }



    public function add()
    {
        $this->db->set("start", $this->_formatDate($this->input->post("from")));
        $this->db->set("end", $this->_formatDate($this->input->post("to")));
        $this->db->set("title", $this->input->post("title"));
        $this->db->set("body", $this->input->post("event"));
        $this->db->set("class", $this->input->post("class"));
        if($this->db->insert("events"))
        {
            return TRUE;
        }
        return FALSE;
    }

    public function getAll()
    {
        $query = $this->db->get('events');
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        return object();
    }


    private function _formatDate($date)
    {
        return strtotime(substr($date, 6, 4)."-".substr($date, 0, 2)."-".substr($date, 3, 2)." " .substr($date, 10, 6)) * 1000;
    }



    /**
    * [get_all_rows This function can use for all the tables, default function is to call all the results rows in table]
    * @param  [string] $table [name of table you want to fetch data]
    * @param  [array] $where [condition to apply]
    * @return [type]        [return data sets]
    */
    function get_all_rows($table,$where, $tableNameToJoin, $tableRelation)
    {
            //$data = array();
            //$query = $this->db->query("SELECT *FROM $table");

            $this->db->select('*');
            $this->db->from($table);

            if($where!=false){
               $this->db->where($where);
            }
           
           if($tableNameToJoin && $tableRelation){

                $this->db->join($tableNameToJoin, $tableRelation);
           }
            /*foreach ($query->result_array() as $row)
            {
               $data[] = $row;
            }*/
            $query = $this->db->get();
            return $query->result_array(); 
            //return $data;
    }


    function get_all_rows_jobs($table,$job_id, $tableNameToJoin, $tableRelation)
    {
            

            $this->db->select('*');
            $this->db->from('jobs_task');

            //if($where!=false){
               $this->db->where('job_id',$job_id);

               if($tableNameToJoin && $tableRelation){

                $this->db->join($tableNameToJoin, $tableRelation);
           }


            //}
           // if($order_by!=false)
             //{
                $this->db->order_by('job_task_id','desc');
           // }

            /*foreach ($query->result_array() as $row)
            {
               $data[] = $row;
            }*/
            $query = $this->db->get();
            return $query->row_array(); 
            //return $data;
    }

    function get_all_job_task_row($table,$job_task_id, $tableNameToJoin, $tableRelation)
    {
            

            $this->db->select('*');
            $this->db->from($table);

            //if($where!=false){
               $this->db->where('job_task_id',$job_task_id);
            //}
           // if($order_by!=false)
             //{
                //$this->db->order_by('job_task_id','desc');
           // }

            if($tableNameToJoin && $tableRelation){

                $this->db->join($tableNameToJoin, $tableRelation);
           }
            /*foreach ($query->result_array() as $row)
            {
               $data[] = $row;
            }*/
            /*if($join1!="")
            {
                $this->db->join($join1);
            }*/

            $query = $this->db->get();
            return $query->row_array(); 
            //return $data;
    }

   



    /**
     * [get_specified_row This function can use for all the tables, default function is to call the specified results rows in table]
     * @param  [string] $table [name of table you want to fetch data]
     * @param  [array] $where [where condition]
     * @param  [array] $order_by [order by]
     * @return [type] [return sepcified row]
     */
    function get_specified_row($table,$where,$order_by)
    {
        
        $this->db->select('*');
        $this->db->from($table);

        if($where!=false)
        {
             $this->db->where($where); 
        }

        if($order_by!=false)
        {
            $this->db->order_by($order_by);
        }

        $query = $this->db->get();
        return $query->row_array();    
    }




    /**
     * [update_data update datas in any tables you want]
     * @param  [array] $columnToUpdate [what column you want to update = array value]
     * @param  [string] $tableToUpdate  [what table you want to update]
     * @param  [array] $usingCondition [using condition or not]
     * @return [type]                 [description]
     */
    
    function update_data($columnToUpdate, $tableToUpdate, $usingCondition)
    {
        
        $this->db->where($usingCondition);
        $this->db->update($tableToUpdate, $columnToUpdate);


    }



    /**
     * [display_message display flash message data in view part]
     * @param  [string] $messageType [what type of message you want to display]
     * @param  [string] $urlToGo     [url you want to redirect after making the process ==> if using current url just use current_url()]
     * @return [type]              [description]
     * currently only 3 types of message can appear on page (save, record, error) ->can change the if else to add another type of message
     */
    function display_message($messageType, $urlToGo)
    {
        /**
         * usage :
         * calling this method in controller of course
         * example : display_message("save","jobs/index/add")
         * @var [type]
         */
        if($messageType=="save")
        {
             $this->session->set_flashdata('save', 'Successfully saved');

        }
        else if($messageType=="record")
        {
             $this->session->set_flashdata('record', 'Data successfully recorded');
        }
        else if($messageType=="error")
        {
             $this->session->set_flashdata('error', 'There is an errors in processing, please try again.');
        }
       

       return redirect($urlToGo);
    }




    /*---------------------------------------------------------------
    / Invoices Only
    /------------------------------------------------------------ */

    function get_invoices($status = 'all')
    {
        $this->db->select('*');
        $this->db->from('ci_invoices');
        $this->db->join('ci_clients', 'ci_clients.client_id = ci_invoices.client_id');
        if($status != 'all')
        {
        $this->db->where('ci_invoices.invoice_status', $status);
        }
        $this->db->order_by('invoice_id', 'DESC');
        $invoices = $this->db->get()->result_array();
        $invoice_amount = 0;
        foreach($invoices as $invoice_count=>$invoice)
        {
            $invoice_totals = $this->get_invoice_total_amount($invoice['invoice_id']);
            $invoices[$invoice_count]['invoice_amount'] = $invoice_totals['item_total'] + $invoice_totals['tax_total'] - $invoice['invoice_discount'];
            $invoices[$invoice_count]['total_paid'] = $invoice_totals['amount_paid'];
        }
        return $invoices;
    }
    
    function get_invoice_total_amount($invoice_id = 0)
    {
        $invoice_totals = array();
        $this->db->select('*');
        $this->db->from('ci_invoice_items');
        $this->db->where('ci_invoice_items.invoice_id', $invoice_id);
        $invoice_items = $this->db->get();
        $item_total = 0;
        $tax_total = 0;
        $items_total_discount = 0;
        foreach($invoice_items->result_array() as $item_count=>$item)
        {
            $item_amount = ($item['item_quantity'] * $item['item_price']) - $item['item_discount'];
            if($item['item_taxrate_id'] != 0)
            {
                $tax_rate = $this->common_model->get_tax($item['item_taxrate_id']);
                $tax_total += $item_amount * $tax_rate;
            }
            $item_total = $item_total + $item_amount;
            $items_total_discount += $item['item_discount'];
        }

        $invoice = $this->db->select('invoice_discount')->where('invoice_id', $invoice_id)->get('ci_invoices')->row();

        $amount_paid = $this->get_invoice_paid_amount($invoice_id);
        $invoice_totals['item_total']           = $item_total;
        $invoice_totals['tax_total']            = $tax_total;
        $invoice_totals['sub_total']            = $item_total + $tax_total;
        $invoice_totals['items_total_discount'] = $items_total_discount;
        $invoice_totals['amount_paid']          = $amount_paid;
        $invoice_totals['amount_due']           = $item_total + $tax_total - $amount_paid - $invoice->invoice_discount;

        return $invoice_totals;
    }


}

/* End of file midae_model.php */
/* Location: ./application/models/midae_model.php */

?>