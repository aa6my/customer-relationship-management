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
 * @package    users.php
 * @author     Nizam <nizam@segimidae.net>
 * @author     Norlihazmey <norlihazmey@segimidae.net>
 * @license    https://ellislab.com/codeigniter/user-guide/license.html
 * @copyright  2014 SEGI MiDae
 * @version    0.4.1
*/

class Users extends CI_Controller {
	
    public function index()
	{
        //$this->load->helper('form');
		//$this->load->view('view_create_user');
        //$this->create_user();
	}

    public function access_map(){
        return array(
            'index'=>'view',
            'update'=>'edit',
            'create_user'=>'view',
            'create_user_now'=>'view'
        );
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
        /*$password = $this->input->post("password");*/
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

}

/* End of file users.php */
/* Location: ./application/controllers/users.php */