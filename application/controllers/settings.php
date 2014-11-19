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
 * @package    settings.php
 * @author     Nizam <nizam@segimidae.net>
 * @author     Norlihazmey <norlihazmey@segimidae.net>
 * @license    https://ellislab.com/codeigniter/user-guide/license.html
 * @copyright  2014 SEGI MiDae
 * @version    0.4.1
*/

class Settings extends CI_Controller {

    public function access_map(){
        return array(
            'index'=>'view',
            'update'=>'view',
            'create_user'=>'view',
            'create_user_now'=>'view',
            'updatesetting'=>'view',
            'updateemail'=>'view',
            'users'=>'view',
            'email'=>'view',
            'update_user_now' => 'view'
        );
    }

    public function __construct() 
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
    }

    public function index() //setting
    {
        // Component
        $data['user_meta'] = $this->Midae_model->get_user_meta();
        $data['top_title'] = ucwords(strtolower($this->uri->segment('1'))); //URI title.
        $data['top_desc'] = "Change your page purpose here"; //function purpose here.
        //End of component
        $this->load->view('settings', $data);
    }

    public function users()
    {
        // Component
        $data['user_meta'] = $this->Midae_model->get_user_meta();
        $data['top_title'] = ucwords(strtolower($this->uri->segment('2'))); //URI title.
        $data['top_desc'] = "Change your page purpose here"; //function purpose here.
        $this->output->enable_profiler(TRUE); //Profiler Debug
        //End of component
 
        $crud = new grocery_CRUD();
        $state = $crud->getState();
        $crud->set_theme('datatables');
        $crud->set_table('system_users');
        $crud->set_subject('Users');
        $crud->set_relation('user_role_id','user_role','role_name');
        $crud->display_as('email','Email')
             ->display_as('user_role_id', 'User Role')
             ->display_as('last_login_ip','IP Address');
        $crud->set_field_upload('file_content','assets/uploads/files');
        $crud->unset_print();
        $crud->unset_read();
        $crud->unset_export();
        $crud->callback_after_delete(array($this,'delete_user_meta'));  

        if($state == "add"){
        $data['user_role'] = $this->Midae_model->get_setting_userrole();
        $this->load->view('view_create_user', $data);
        }elseif($state == "edit"){
        $tableNameToJoin = 'user_meta';
        $tableRelation = 'user_meta.user_id = system_users.id';
        $where = array('user_meta.user_id' => $this->uri->segment(4));
        $data['details'] = $this->Midae_model->get_all_rows('system_users',$where, $tableNameToJoin, $tableRelation);
        $data['user_role'] = $this->Midae_model->get_setting_userrole();
        $this->load->view('edit_user', $data);
        }else{
        $crud->columns('email','user_role_id','last_login','last_login_ip');
        $output = $crud->render();
        $output = array_merge($data,(array)$output);
        $this->load->view('users.php',$output);
        }

    }

    function delete_user_meta($user_id){

        if($user_id)
        {
            $where = array(
                'user_id' => $user_id
                );
            $this->Midae_model-> delete_data("user_meta", $where);
            return true;
        }
        else
        {
            return true;
        }

    }

    function email() {

        // Component
        $data['user_meta'] = $this->Midae_model->get_user_meta();
        $data['top_title'] = ucwords(strtolower($this->uri->segment('2'))); //URI title.
        $data['top_desc'] = "Change your page purpose here"; //function purpose here.
        //End of component 
        
        $this->load->view('setting-email', $data);
    }
        

    public function create_user_now()
    {
        $this->load->library(array('form_validation','session'));
 
        //set validation rules
        $this->form_validation->set_rules('userrole', 'User Role', 'required|xss_clean|max_length[200]');
        $this->form_validation->set_rules('firstname', 'Title', 'required|xss_clean|max_length[200]');
        $this->form_validation->set_rules('lastname', 'Title', 'required|xss_clean|max_length[200]');
        $this->form_validation->set_rules('email', 'Title', 'required|xss_clean|max_length[200]');
        $this->form_validation->set_rules('password', 'Title', 'required|xss_clean|max_length[200]');

        
 
        if ($this->form_validation->run() == FALSE)
        {
            //if not validation
            $this->create_user();
        }
        else
        {
            $userrole = $this->input->post("userrole");
            $firstname = $this->input->post("firstname");
            $lastname = $this->input->post("lastname");
            $email = $this->input->post("email");
            $password = $this->input->post("password");
            $status = '1';
            $verificationstatus = '1';

            $this->ezrbac->createUser(array(
            'user_role_id' => $userrole,
            'meta' => array('first_name'=>$firstname, 'last_name'=>$lastname),
            'email' => $email,
            'password' => $password,
            'status' => $status,
            'verification_status' => $verificationstatus
            ));

            $data['title'] = "Success";
            $data['text'] = "New user registered";
            $data['timer'] = "2000";
            $data['classfunc'] = "settings/users";
            $this->Midae_model->popup($data);

        }   
    }

    public function update_user_now()
    {
        $this->load->library(array('form_validation','session'));
 
        //set validation rules
        $this->form_validation->set_rules('userrole', 'User Role', 'required|xss_clean|max_length[200]');
        $this->form_validation->set_rules('firstname', 'Title', 'required|xss_clean|max_length[200]');
        $this->form_validation->set_rules('lastname', 'Title', 'required|xss_clean|max_length[200]');
        $this->form_validation->set_rules('email', 'Title', 'required|xss_clean|max_length[200]');
        $this->form_validation->set_rules('password', 'Title', 'required|xss_clean|max_length[200]');

        
 
        if ($this->form_validation->run() == FALSE)
        {
            //if not validation
            $this->create_user();
        }
        else
        {
            $userrole = $this->input->post("userrole");
            $email = $this->input->post("email");
            $firstname = $this->input->post("firstname");
            $lastname = $this->input->post("lastname");
            $password = $this->input->post("password");

            $this->ezuser->set_new_password($password, $email);
            $this->ezrbac->updateUser(array(
            'id' => $this->uri->segment(3),
            'user_role_id' => $userrole,
            'meta' => array('first_name'=>$firstname, 'last_name'=>$lastname)
            ));

            $data['title'] = "Success";
            $data['text'] = "User updated";
            $data['timer'] = "2000";
            $data['classfunc'] = "settings/users";
            $this->Midae_model->popup($data);

        }   
    }

    public function updatesetting()
    {
     $update_data=array(
        'sitename'=>$this->input->post('sitename'),
        'sitedescription'=>$this->input->post('sitedescription'),
        'timezone'=>$this->input->post('timezone')
        );
     $success = $this->Siteconfig_model->update_config($update_data);
     if($success) redirect("/settings");
    }

    public function updateemail()
    {
     $update_data=array(
        'email'=>$this->input->post('email'),
        'emailpassword'=>$this->input->post('emailpassword'),
        'protocol'=>$this->input->post('protocol'),
        'smtp_host'=>$this->input->post('smtp_host'),
        'smtp_port'=>$this->input->post('smtp_port'),
        'smtp_timeout'=>$this->input->post('smtp_timeout'),
        'charset'=>$this->input->post('charset'),
        'newline'=>$this->input->post('newline'),
        'wordwrap(str)'=>$this->input->post('wordwrap'),
        'mailtype'=>$this->input->post('mailtype')
        );
     $success = $this->Siteconfig_model->update_config($update_data);
     if($success) redirect("/settings/email");
    }

}

/* End of file settings.php */
/* Location: ./application/controllers/settings.php */