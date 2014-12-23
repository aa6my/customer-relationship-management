<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Api_auth extends CI_Controller
{
    private $CI;
    /*function __construct(){

        parent::__construct();
        header('Access-Control-Allow-Origin: '.$_SERVER['HTTP_ORIGIN'].'');
        header('Access-Control-Allow-Credentials: true');
        header("Access-Control-Allow-Headers: X-Custom-Header, X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    }*/

    public function login($username, $password) 
    {
         $CI =& get_instance();
         $CI->load->model('Midae_model');
         $CI->load->library('encrypt');
                
        $where = array('email' => $username);
        $customer = $CI->Midae_model->get_specified_row("system_users",$where,false,false, false);

        if(!empty($customer)){
             
             if($CI->encrypt->sha1($password . $customer['salt']) === $customer['password']) //if password match with the database
             {
                
                     
                     return true; 
             }
             else
             {
                return false;           
             }   
        
        }
    }

       

}

/* End of file api_auth.php */
/* Location: ./application/libraries/api_auth.php */