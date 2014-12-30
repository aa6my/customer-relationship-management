<?php
    /**
    * @property CI_Loader           $load
    * @property CI_Form_validation  $form_validation
    * @property CI_Input            $input
    * @property CI_DB_active_record $db
    * @property CI_Session          $session
    */

  class Install_actions extends Ci_Model
  {
      private $error;

      public function __construct(){
        parent::__construct();
       // $this->config->load('config');
      }
      
      protected function set_error($error)
      {
          $this->error=$error;
      }
      
      function get_error()
      {
          return $this->error;
      }

      function is_installed()
      {
          return ((defined('INSTALLED')) AND (INSTALLED===TRUE));
      }
      
      private function check_database()
      {
          @mysql_connect($this->input->post('database_host'),$this->input->post('database_user'),$this->input->post('database_password'));
          
          if (mysql_errno()!=0)
          {
              $this->set_error(mysql_error());
              return FALSE;
          }
          
          @mysql_select_db($this->input->post('database_name'));
          
          if (mysql_errno()!=0)
          {
              $this->set_error(mysql_error());
              return FALSE;
          }
          
          return TRUE;
      }

    function generateSalt()
    {
        return uniqid('',true);
    }

    function generate_password($salt) {
        return substr($salt,rand(1,5),6);
    }
      
      function install()
      {
          if (!$this->check_database())
          {
              return FALSE;
          }
          
          $sql=file_get_contents(BASEPATH.'../crm.sql');
          $sql=explode(';',$sql);
          foreach($sql as $query)
          {
             
              $str = trim($query);
              if (!empty($str)) { 
                @mysql_query($query);
              } 
              else{
                continue;
              }
              
              if (mysql_errno()!=0)
              {
                  $this->set_error(mysql_error());
                  return FALSE;
              }
          }

          $username = $this->input->post('username');
          $firstname = $this->input->post('firstname');
          $lastname = $this->input->post('lastname');
          $phone = $this->input->post('phone');
          $salt = $this->generateSalt();          
          $password = sha1($this->input->post('admin_password').$salt);
          
          mysql_query('INSERT INTO system_users (
            email,
            password,
            salt,
            user_role_id,
            last_login,
            last_login_ip,
            reset_request_code,
            reset_request_time,
            reset_request_ip,
            verification_status,
            status) 
              VALUES(
            "'.$username.'",
            "'.$password.'",
            "'.$salt.'",
            1,
            "",
            "",
            NULL,
            NULL,
            NULL,
            1,
            1)');

          $id = mysql_insert_id();

          mysql_query('INSERT INTO user_meta(
            user_id,
            first_name,
            last_name,
            phone) 
              VALUES(
            "'.$id.'",
            "'.$firstname.'",
            "'.$lastname.'",
            "'.$phone.'")');


          
          $config_folder=APPPATH.'config/';
          
          $config_file=file_get_contents($config_folder.'constants.php')."\r\ndefine('INSTALLED',TRUE);";
          
          file_put_contents($config_folder.'constants.php',$config_file);
          
                   
          $config_files=preg_replace(
                       array(                            
                            "/config\['enable_hooks'\] = FALSE;/si"
                       ),
                       array(
                           
                           'config[\'enable_hooks\'] = TRUE;' 
                       ),
                       file_get_contents($config_folder.'config.php')
          );
          file_put_contents($config_folder.'config.php',$config_files);

          /*$htaccess=file_get_contents(BASEPATH.'../.htaccess');

          $rr = preg_replace(
                            "/RewriteBase \/.*?/si", "RewriteBase mm", $htaccess
                        );
          file_put_contents(BASEPATH.'../.htaccess',$rr);*/
          
          
         /* $autoload['model'] = array('');
          
          $config_file=preg_replace(
                       array(
                            "/autoload\['libraries'\] = array\(\);/si"
                       ),
                       array(
                            'autoload[\'libraries\'] = array(\'database\',\'driver\',\'session\');'
                       ),
                       file_get_contents($config_folder.'autoload.php')
          );
          
          file_put_contents($config_folder.'autoload.php',$config_file);*/
          
          
          $config_file=preg_replace(
                       array(
                            "/'hostname' => '',/si",
                            "/'username' => '',/si",
                            "/'password' => '',/si",
                            "/'database' => '',/si"
                       ),
                       array(
                            '\'hostname\' => \''.$this->input->post('database_host').'\',',
                            '\'username\' => \''.$this->input->post('database_user').'\',',
                            '\'password\' => \''.$this->input->post('database_password').'\',',
                            '\'database\' => \''.$this->input->post('database_name').'\','
                       ),
                       file_get_contents($config_folder.'database.php')
          );
          
          file_put_contents($config_folder.'database.php',$config_file);
          
          return TRUE;
      }
      
      function check_compability()
      {
          $errors=array();
          if (!file_exists(BASEPATH.'../.htaccess'))
          {
              $errors[]=$this->lang->line('.htaccess file is missing in root folder');
          }
          
          foreach(array('config.php','database.php','constants.php','autoload.php','routes.php') as $file)
          {
            if (!is_writable(BASEPATH.'../application/config/'.$file))
            {
                $errors[]=sprintf($this->lang->line($this->lang->line('File "%s" is not writeable')),'application/config/'.$file);
            }
          }
          $this->set_error($errors);
          
          return (count($errors)>0)?FALSE:TRUE;
      }
  }
?>