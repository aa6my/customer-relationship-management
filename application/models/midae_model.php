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
        /*$data = array(
            'app_stuid' => $stuid,
            'app_name' => $name,
            'app_address' => $address,
            'app_postcode' => $postcode,
            'state_id' => $stateid,
            'app_phone' => $phone,
            'course_id' => $courseid,
            'app_sem' => $semester,
            'app_mentor' => $mentor,
            'category_id' => $categoryid,
            'app_details' => $details



        );*/
        $this->db->insert($table,$arrayData);
        $this->db->_error_message();
        return  $this->db->_error_message();
    }

}

?>