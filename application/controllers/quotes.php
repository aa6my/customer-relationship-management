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
 * @package    quotes.php
 * @author     Nizam <nizam@segimidae.net>
 * @author     Norlihazmey <norlihazmey@segimidae.net>
 * @license    https://ellislab.com/codeigniter/user-guide/license.html
 * @copyright  2014 SEGI MiDae
 * @version    0.4.1
*/

class Quotes extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');

        $this->load->library('grocery_CRUD');
    }

	public function index()
	{


	}

    public function access_map(){
        return array(
            'index'=>'view',
            'update'=>'edit'
        );
    }

}

/* End of file quotes.php */
/* Location: ./application/controllers/quotes.php */