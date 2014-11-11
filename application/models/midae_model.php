<?php

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

     function insert_new_data($arrayData,$table)
    {

        $this->db->insert($table,$arrayData);
        $this->db->_error_message();
        return  $this->db->_error_message();
    }

    public function add()
    {
        $this->db->set("start", $this->_formatDate($this->input->post("from")));
        $this->db->set("end", $this->_formatDate($this->input->post("to")));
        $this->db->set("url", $this->input->post("url"));
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
    * @return [type]        [return data sets]
    */
    function get_all_rows($table)
    {
            $data = array();
            $query = $this->db->query("SELECT *FROM $table");

            foreach ($query->result_array() as $row)
            {
               $data[] = $row;
            }

            return $data;
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
             $this->session->set_flashdata('record', 'New Job successfully recorded');
        }
        else if($messageType=="error")
        {
             $this->session->set_flashdata('error', 'There is an errors in processing, please try again.');
        }
       

       return redirect($urlToGo);
    }


}

?>