<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Settings extends CI_Controller {

    public function access_map(){
        return array(
            'index'=>'view',
            'update'=>'view',
            'create_user'=>'view',
            'create_user_now'=>'view'
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
        $data['top_title'] = ucwords(strtolower($this->uri->segment('1'))); //URI title.
        $data['top_desc'] = "Change your page purpose here"; //function purpose here.
        //End of component
        $this->load->view('users', $data);
    }

    public function create_user()
    {
        $data['user_role'] = $this->Midae_model->get_setting_userrole();
        $this->load->view('view_create_user', $data);
        //$this->create_user();
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

            $this->ezrbac->createUser(array(
            'user_role' => $userrole,
            'meta' => array('first_name'=>$firstname, 'last_name'=>$lastname),
            'email' => $email,
            'password' => $password,
            'status' => $status
            ));

            $data['title'] = "Success";
            $data['text'] = "New user registered";
            $data['timer'] = "2000";
            $data['classfunc'] = "settings/users";
            $this->Midae_model->popup($data);

        }   
    }

    public function loginhistory()
    {
        // Component
        $data['user_meta'] = $this->Midae_model->get_user_meta();
        $data['top_title'] = ucwords(strtolower($this->uri->segment('1'))); //URI title.
        $data['top_desc'] = "Change your page purpose here"; //function purpose here.
        //End of component
        $this->load->view('loginhistory', $data);
    }

    public function updatesetting()
    {
     $update_data=array(
        'sitename'=>$this->input->post('sitename'),
        'sitedescription'=>$this->input->post('sitedescription')
        );
     $success = $this->Siteconfig_model->update_config($update_data);
     if($success) redirect("/settings");
    }

}
?>