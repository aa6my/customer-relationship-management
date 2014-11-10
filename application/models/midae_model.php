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

}

?>