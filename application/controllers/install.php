<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  /**
    * @property CI_Loader           $load
    * @property CI_Form_validation  $form_validation
    * @property CI_Input            $input
    * @property CI_DB_active_record $db
    * @property CI_Session          $session
    * @property install_actions       $install_actions
    */
    
  class Install extends CI_Controller
  {
      function __construct()
      {
          parent::__construct();
          $this->load->model('install_actions');
      }
      
      function index()
      {
         if ($this->install_actions->is_installed())
         {
             exit($this->load->view('layout/success_page',array('message'=>'<h3 class="font-bold">'.$this->lang->line('Application already installed.').'</h3> <br/><a class="btn btn-primary m-t" href="'.$this->config->item('base_url').'">Go To Application</a>'),TRUE));
         }
         
         $this->load->view('install/index');
      }
      
      function save_config()
      {
          $this->load->library('form_validation');
          $this->form_validation->set_rules(array(
                array('field'=>'database_host','rules'=>'required','label'=>'Database host required'),
                array('field'=>'database_name','rules'=>'required','label'=>'Database name required'),
                array('field'=>'database_user','rules'=>'required','label'=>'Database user required'),
                //array('field'=>'database_password','rules'=>'required','label'=>'Database password required'),
                array('field'=>'firstname','rules'=>'required','label'=>'Firstname host required'),
                array('field'=>'lastname','rules'=>'required','label'=>'Lastname required'),
                array('field'=>'phone','rules'=>'required','label'=>'Phone number required'),
                array('field'=>'admin_password','rules'=>'required','label'=>'Your password required'),
                array('field'=>'username','rules'=>'required','label'=>'Your username required'),
          ));

          /*$this->form_validation->set_rules(array(
                array('field'=>'database_host','rules'=>'required','label'=>$this->lang->line('Database host')),
                array('field'=>'database_name','rules'=>'required','label'=>$this->lang->line('Database name')),
                array('field'=>'database_user','rules'=>'required','label'=>$this->lang->line('Database user')),
                array('field'=>'database_password','rules'=>'required','label'=>$this->lang->line('Database password')),
                array('field'=>'admin_password','rules'=>'required','label'=>$this->lang->line('Your password')),
                array('field'=>'username','rules'=>'required','label'=>$this->lang->line('Your username')),
          ));*/
          
          if ($this->form_validation->run()===FALSE)
          {
              exit($this->load->view('layout/error',array('message'=>$this->form_validation->error_string()),TRUE));
          }
          
          $this->load->model('install_actions');
          if (!$this->install_actions->install())
          {
              exit($this->load->view('layout/error',array('message'=>$this->install_actions->get_error()),TRUE));
          }
          
          $this->load->view('layout/success',array('message'=>'Application sucessfully installed. You can login as admin'));
          $this->load->view('layout/redirect',array('url'=>$this->input->post('base_url')));
      }
  }
?>