<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Settings extends CI_Controller {

    public function access_map(){
        return array(
            'index'=>'view',
            'update'=>'view'
        );
    }

    public function index() //setting
    {
        // Component
        $this->load->model('Midae_model');
        $data['user_meta'] = $this->Midae_model->get_user_meta();
        $data['top_title'] = ucwords(strtolower($this->uri->segment('1'))); //URI title.
        $data['top_desc'] = "Change your page purpose here"; //function purpose here.
        //End of component
        $this->load->view('settings', $data);
    }

    public function users()
    {
        // Component
        $this->load->model('Midae_model');
        $data['user_meta'] = $this->Midae_model->get_user_meta();
        $data['top_title'] = ucwords(strtolower($this->uri->segment('1'))); //URI title.
        $data['top_desc'] = "Change your page purpose here"; //function purpose here.
        //End of component
        $this->load->view('users', $data);
    }

    public function create_user()
    {
        //$this->load->helper('form');
        $this->load->view('view_create_user');
        //$this->create_user();
    }

    public function create_user_now()
    {
        $userrole = $this->input->post("userrole");
        $firstname = $this->input->post("firstname");
        $lastname = $this->input->post("lastname");
        $email = $this->input->post("email");
        $password = $this->input->post("password");
        $status = $this->input->post("status");

        $x = $this->ezrbac->createUser(array(
            'user_role' => $userrole,
            'meta' => array('first_name'=>$firstname, 'last_name'=>$lastname),
            'email' => $email,
            'password' => $password,
            'status' => $status
        ));

        echo "User created with user id : " . $x;
    }

    public function loginhistory()
    {
        // Component
        $this->load->model('Midae_model');
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