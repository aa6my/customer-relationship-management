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
 * @category   models
 * @package    jobs.php
 * @author     Author <emi>
 * @author     Another Author <another@example.com>
 * @license    https://ellislab.com/codeigniter/user-guide/license.html
 * @copyright  2014 SEGI MiDae
 * @version    0.4.1
*/
class Jobs extends MY_Controller {

    public function access_map(){
        return array(
            'index'=>'view',
            'update'=>'edit',
            'ajax_job_task' => 'view',
            'ajax_job_task_edit' => 'view',
            'ajax_product' => 'view',
            'job_type' => 'view'
        );
    }

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');

    }

    public function add_job()
    {
         $postData = $this->input->post(); //get ALL input post data from form
         $data = array(

                    'customer_id'         => $postData['customer_id'],
                    'website_id'          => $postData['website_id'],
                    'job_title'           => $postData['job_title'],
                    'job_date_start'      => $postData['job_date_start'],
                    'job_start_time'      => $postData['job_start_time'],
                    'job_end_time'        => $postData['job_end_time'],
                    'job_due_date'        => $postData['job_due_date'],
                    'job_complete_date'   => $postData['job_complete_date'],
                    'user_id'             => $postData['user_id'],
                    'job_tax'             => $postData['job_tax'],
                    /*'job_currency'        => $postData['job_currency'],*/
                    'job_type_id'         => $postData['job_type_id'],
                    'job_status'          => $postData['job_status'],
                    'job_description'     => $postData['job_description'],
                    'job_hour'            => $postData['job_hour'],
                    'job_quote_date'      => $postData['job_quote_date'],
                    'job_renewal_date'    => $postData['job_renewal_date'],
                    'job_task_type'       => $postData['job_task_type'],
                    'job_discount_amount' => $postData['job_discount_amount'],
                    'job_discount_name'   => $postData['job_discount_name'],
                    'job_discount_type'   => $postData['job_discount_type'],
                    'last_update'         => date("Y-m-d")

                    );
    
            $this->Midae_model->insert_new_data($data,'jobs'); //insert data into JOBS table
            return $this->db->insert_id();
    }

    public function get_temporary_data()
    {
            $data['website']   = $this->Midae_model->get_website(); //get websites from database
            $data['customer']  = $this->Midae_model->get_customer(); //get customers from database
            $data['job_type'] = $this->Midae_model->get_all_rows("job_types", false, false, false, false, false); //get all types of  job
            $data['staff']     = $this->Midae_model->get_staff_member();

            return $data;
    }

    
    public function index()
    {

        

        $crud  = new grocery_CRUD();
        $state = $crud->getState();
        $crud->set_theme('datatables');
        $crud->set_table('jobs');
        $crud->set_subject('Jobs');        
        $crud->unset_print();    
        $crud->unset_read();
        $crud->callback_after_delete(array($this,'delete_job_n_jobtask'));     
        $crud->callback_before_insert(array($this,'_last_update'));
        

       
        if($state == "add") //nk display add form dengan edit form
        {
            
            $data['top_title'] = ucwords(strtolower($this->uri->segment('1'))); //URI title.
            $data['top_desc']  = "Change your page purpose here"; //function purpose here.*/
            $data['groupData'] = $this->get_temporary_data();
            $this->load->view('job.php',$data);

           if($this->input->post('save')) // if save button click
           {
               
                //date_default_timezone_set('Asia/Kuala_Lumpur');
                $this->add_job(); //call add job_job function
                $this->Midae_model->display_message("record", "jobs");
                
               
           }
           else if($this->input->post('save_task')) //if save_task button clicked
           {
             

               
               $last_insert_id = $this->add_job(); //call add job_job function then get the last id inserted

               if($last_insert_id)
               {
                    $postData = $this->input->post(); //get ALL input post data from form
                    $data     = array(

                    'job_id'               => $last_insert_id,
                    'job_task_hour'        => $postData['job_task_hour'],
                    'job_task_amount'      => $postData['job_task_amount'],
                    'job_task_due_date'    => $postData['job_task_due_date'],
                    'user_id'              => $postData['user_id'],
                    'job_task_percentage'  => $postData['job_task_percentage'],
                    'job_task_description' => $postData['job_task_description']

                    );
    
      
                    $this->Midae_model->insert_new_data($data,'jobs_task'); //insert data into JOBS_task table                
                    $this->Midae_model->display_message("record", "jobs");
               }
               
               

               
           }
           


        }
        else if($state=="edit")
        {
            
            /**
             * this snippet calling during rendering job view withoud add and edit
             */
            $data['top_title'] = ucwords(strtolower($this->uri->segment('1'))); //URI title.
            $data['top_desc']  = "Change your page purpose here"; //function purpose here.*/
            $data['groupData'] = $this->get_temporary_data();
            
            
            
            $data['job_id']    = $this->uri->segment(4) ; // get the last segment parameter from url
            $where             = array('job_id' => $data['job_id']);
            $data['jobs']      = $this->Midae_model->get_specified_row("jobs",$where,false,false,false);            
            



            
            /**
             * calling after submit button clicked
             */
            if($this->input->post('save')) // if save button click
            {
               $data['job_id'] = $this->uri->segment(4) ;
               $postData       = $this->input->post();
               $columnToUpdate = array(

                    'customer_id'         => $postData['customer_id'],
                    'website_id'          => $postData['website_id'],
                    'job_title'           => $postData['job_title'],
                    'job_date_start'      => $postData['job_date_start'],
                    'job_start_time'      => $postData['job_start_time'],
                    'job_end_time'        => $postData['job_end_time'],
                    'job_due_date'        => $postData['job_due_date'],
                    'job_complete_date'   => $postData['job_complete_date'],
                    'user_id'             => $postData['user_id'],
                    'job_tax'             => $postData['job_tax'],
                    /*'job_currency'        => $postData['job_currency'],*/
                    'job_type_id'         => $postData['job_type_id'],
                    'job_status'          => $postData['job_status'],
                    'job_description'     => $postData['job_description'],
                    'job_note'            => $postData['job_note'],
                    'job_hour'            => $postData['job_hour'],
                    'job_quote_date'      => $postData['job_quote_date'],
                    'job_renewal_date'    => $postData['job_renewal_date'],
                    'job_task_type'       => $postData['job_task_type'],
                    'job_discount_amount' => $postData['job_discount_amount'],
                    'job_discount_name'   => $postData['job_discount_name'],
                    'job_discount_type'   => $postData['job_discount_type'],
                    'last_update'         => date("Y-m-d")

                    );

                $usingCondition = array(

                    'job_id' => $data['job_id']
                    );

               $this->Midae_model->update_data($columnToUpdate,"jobs", $usingCondition);

               //after changes was made, fetch the data again from job table
               $data['jobs'] = $this->Midae_model->get_specified_row("jobs",$where,false,false,false);
               $this->Midae_model->display_message("save", current_url());
               
               
                
               
           }
           $data['token_val'] = $this->security->get_csrf_hash();
           $this->load->view('job_edit.php', $data);

        }
        
        else
        {
            $crud->columns('job_title','job_date_start','job_due_date','job_type_id','job_status','customer_id','website_id');
            $crud->display_as('job_type_id','Job type')
                 ->display_as('customer_id','Customer Name')
                 ->display_as('website_id','Website Name');;
            $crud->callback_column('job_type_id',array($this,'crud_job_type'))
                 ->callback_column('job_status',array($this,'crud_job_status'))
                 ->callback_column('customer_id',array($this,'crud_customer_display'))
                 ->callback_column('website_id',array($this,'crud_website_display'));
            $output = $crud->render();
            //$output = array_merge($data,(array)$output);
            $this->load->view('cruds.php',$output);
        }


           

    }

    public function crud_website_display($key, $row){
      $table = "websites";
      $where = array('website_id' => $key);

      $customer = $this->Midae_model->get_specified_row($table,$where,false,false, false);
      $name = $customer['website_name'];
      return '<a href="websites/index/read/'.$key.'" target="blank">'.$name.'</a>';
    }


    public function crud_customer_display($key, $row){
      $table = "customers";
      $where = array('customer_id' => $key);

      $customer = $this->Midae_model->get_specified_row($table,$where,false,false, false);
      $name = $customer['customer_name'];
      return '<a href="customers/index/read/'.$key.'" target="blank">'.$name.'</a>';
    }

    public function crud_job_type($value, $row)
    {
        $where = array(
                'job_type_id' => $value
            );

        $job_type = $this->Midae_model->get_specified_row("job_types",$where,false,false,false);
       
        return $job_type['job_type_name'];
    }

    public function crud_job_status($value, $row)
    {
       $status = ($value==0) ? "New" : "Existing";
       
       return $status;
    }


    function delete_job_n_jobtask($job_id){

        if($job_id)
        {
            $where = array(
                'job_id' => $job_id
                );
            $this->Midae_model-> delete_data("jobs_task", $where);
            return true;
        }
        else
        {
            return true;
        }

    }


    public function ajax_job_task()
    {
        $where =  array(

            'job_id' => $this->input->post('job_id')
           );

        $tableNameToJoin = 'user_meta';
        $tableRelation = 'user_meta.user_id = jobs_task.user_id';

        if($this->input->post('jenis')=="display")
        {
             //$join1 = array('' =>'');
            
                

            $data['job_task'] = $this->Midae_model->get_all_rows("jobs_task",$where, $tableNameToJoin, $tableRelation, false, false);
            $data['jenis'] = "display";
            $this->load->view('job_ajax_task', $data);
        }
        else if($this->input->post('jenis')=="add")
        {

            $postData       = $this->input->post();
            
            $arrayData = array(

                    'job_id'               => $postData['job_id'],
                    'product_id'           => $postData['product_id'],
                    'job_task_hour'        => $postData['job_task_hour'],
                    'job_task_amount'      => $postData['job_task_amount'],
                    'job_task_due_date'    => $postData['job_task_due_date'],
                    'user_id'              => $postData['user_id'],
                    'job_task_percentage'  => $postData['job_task_percentage'],
                    'job_task_description' => $postData['job_task_description']
                );

            $this->Midae_model->insert_new_data($arrayData,"jobs_task");
           
            $data['job'] = $this->Midae_model->get_all_rows_jobs("jobs_task",$this->input->post('job_id'), $tableNameToJoin, $tableRelation, false, false);
            
            $data['jenis'] = "add";
            $this->load->view('job_ajax_task', $data);
        }
        else if($this->input->post('jenis')=="total")
        {
            $where = array(
                'jobs.job_id' => $this->input->post('job_id')
                );

            $tableRelation = "jobs.job_id = jobs_task.job_id";

            $data['jenis'] = $this->input->post('jenis');

            $data['total'] = $this->Midae_model->get_all_rows('jobs',$where, "jobs_task", $tableRelation, false, false);

            //$data['percentage'] = $data['total']['']

            $this->load->view('job_ajax_task', $data);
        }
        
        
        
        

    }


    public function ajax_job_task_edit(){

        $job_task_id = $this->input->post('job_task_id');

        if($this->input->post('jenis')=="edit" || $this->input->post('jenis')=="display")
        {
            $tableNameToJoin = 'user_meta';
            $tableRelation = 'user_meta.user_id = jobs_task.user_id';
            $data['jenis'] = $this->input->post('jenis');
            $data['num_display'] = $this->input->post('num_display');
            $data['groupData'] = $this->get_temporary_data();
            $data['jobs'] = $this->Midae_model->get_all_job_task_row("jobs_task",$job_task_id, $tableNameToJoin, $tableRelation);
            $this->load->view('job_ajax_task_edit', $data);
            
        }
        else if($this->input->post('jenis')=="save")
        {
             $data['jenis'] = $this->input->post('jenis');
             $postData       = $this->input->post();
             $columnToUpdate = array(

                    //'job_task_id'               => $postData['job_task_id'],
                    'job_task_hour'        => $postData['job_task_hour'],
                    'job_task_amount'      => $postData['job_task_amount'],
                    'job_task_due_date'    => $postData['job_task_due_date'],
                    'user_id'              => $postData['user_id'],
                    'product_id'           => $postData['product_id'],
                    'job_task_percentage'  => $postData['job_task_percentage'],
                    'job_task_description' => $postData['job_task_description']
                );

             $usingCondition = array(

                    'job_task_id' => $postData['job_task_id']
                );

            $this->Midae_model->update_data($columnToUpdate, "jobs_task", $usingCondition);
            $data['jobs'] = $this->Midae_model->get_all_job_task_row("jobs_task",$job_task_id);
             $this->load->view('job_ajax_task_edit', $data);
        }
        else if($this->input->post('jenis')=="delete")
        {

            $where = array(
                'job_task_id' => $this->input->post('job_task_id')
                );
            $this->Midae_model->delete_data("jobs_task", $where);

        }


       
       
       
        
    }


    public function ajax_product(){

        $data['jenis'] = $this->input->post('jenis'); // will display to view part
        $data['add_product'] = $this->input->post('add_product');
        $jenis = $this->input->post('jenis'); //for condition only

        if($jenis=="display")
        {
            $table            = "catproduct";
            $data['category'] = $this->Midae_model->get_all_rows($table,false, false, false, false, false);
            $this->load->view('ajax_product', $data, FALSE);
        }
        else if($jenis=="get_product")
        {
            $table            = "products";
            $catproduct_id   = $this->input->post('catproduct_id');
            $where = array('catproduct_id'=>$catproduct_id);
            $data['product'] = $this->Midae_model->get_all_rows($table,$where, false, false, false, false);
            $this->load->view('ajax_product', $data, FALSE);

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
            $return['product'] = $this->Midae_model->get_all_rows($table,$where, $tableNameToJoin, $tableRelation, false, false);
            echo json_encode($return);
            //$this->load->view('ajax_product', $data, FALSE);


        }

        

    }


    public function job_type(){
        $crud  = new grocery_CRUD();
        $state = $crud->getState();
        $crud->set_theme('datatables');
        $crud->set_table('job_types');
        $crud->set_subject('Job Types');        
        $crud->unset_print();    
        $crud->unset_read();
        $output = $crud->render();
        $this->load->view('cruds.php',$output);
        
    }

}

/* End of file dashboard.php */
/* Location: ./application/controllers/leads.php */