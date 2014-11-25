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
 * @category   core
 * @package    MY_Controller.php
 * @author     Nizam <nizam@segimidae.net>
 * @author     Norlihazmey <norlihazmey@segimidae.net>
 * @license    https://ellislab.com/codeigniter/user-guide/license.html
 * @copyright  2014 SEGI MiDae
 * @version    0.4.1
*/

class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();


        //By do this, all controllers who use this class as parent controller
        //will have $news in their views
        $CI =& get_instance();
        $CI->load->library('session');
        $um = $CI->Midae_model->get_user_meta();
        $tt = ucwords(strtolower($CI->uri->segment('1'))); //URI title.
        $td = "rendered in <strong>{elapsed_time}</strong> seconds"; //function purpose here.
        $is = $this->is_https();

        $this->load->vars(array( 
             'user_meta' => $um,
             'top_title' => $tt,
             'top_desc' => $td,
             'is' => $is

        ));

        //handle conflix ajax request
        if(!$this->input->is_ajax_request()) {
            $this->output->enable_profiler(TRUE);
        }
    }   
    function is_https(){ 
        if ( (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443) 
        {   
            $protocol = "https";
            return $protocol; 
        }
        else 
        {
            $protocol = "http";
            return $protocol; 
        }
    } 
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */