<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Api_auth
{
    private $CI;
    public function login($username, $password) {
        // $CI =& get_instance();
        // //$CI->load->add_package_path(APPPATH.'third_party/ezRbac/');
        // //$this->CI->load->library(APPPATH.'third_party/ezRbac/ezRbacHook.php');
        // //include APPPATH.'third_party/ezRbac/ezRbacHook.php';
        // //$CI->load->library(APPPATH.'third_party/ezRbac/ezRbacHook.php');
        // include(APPPATH.'third_party/ezRbac/ezRbacHook.php');
        // $u = $CI->ezrbac->getCurrentUser()->email;
        // $p = $CI->ezrbac->getCurrentUser()->password;
        // if($username == $u && $password == $p)
        if($username == 'test' && $password == 'test')
        {
            return true;            
        }
        else
        {
            return false;           
        }           
    }

}

/* End of file api_auth.php */
/* Location: ./application/libraries/api_auth.php */