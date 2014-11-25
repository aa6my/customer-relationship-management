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
 * @package    dashboard.php
 * @author     Nizam <nizam@segimidae.net>
 * @author     Norlihazmey <norlihazmey@segimidae.net>
 * @license    https://ellislab.com/codeigniter/user-guide/license.html
 * @copyright  2014 SEGI MiDae
 * @version    0.4.1
*/

class Dashboard extends MY_Controller {
    //public $data_site = array();

    public function __construct() 
    {
        parent::__construct();
    }

	public function index()
	{
        $table = "products";
        $data['product'] = $this->Midae_model->get_count_product($table);
        $table = "customers";
        $data['customer'] = $this->Midae_model->get_count_product($table);
        $table = "vendors";
        $data['vendor'] = $this->Midae_model->get_count_product($table);
        $table = "leads";
        $data['lead'] = $this->Midae_model->get_count_product($table);
        $table = "jobs";
        $data['job'] =$this->Midae_model->get_count_product($table);
        $table = "events";
        $data['event'] =$this->Midae_model->get_count_product($table);
        $table = "invoices";
        $data['invoice'] =$this->Midae_model->get_count_product($table);
        $table = "quotes";
        $data['quote'] =$this->Midae_model->get_count_product($table);
        $this->load->view('dashboard', $data);
        //print_r();
	}

    public function access_map(){
        return array(
            'index'=>'view',
            'update'=>'edit'
        );
    }
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */