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
            'update'=>'edit',
            'data_hightchart' => 'view'
        );
    }

    public function data_hightchart(){

        $tahun = $this->input->post('tahun');
        $tahun = ($tahun!="") ? $tahun : date('Y');
        $bulan = array(1 => 'Jan',
                       2 => 'Feb',
                       3 => 'Mac',
                       4 => 'Apr',
                       5 => 'May',
                       6 => 'June',
                       7 => 'July',
                       8 => 'Aug',
                       9 => 'Sep',
                       10 => 'Oct',
                       11 => 'Nov',
                       12 => 'Dec');

        $data = $this->Midae_model->get_data_highchart($tahun);
        $month = array();
        $amount = array();
        $amount['name'] = "Amount";
        $textTahun = array();
        $textTahun['tahun'] = $tahun;
       

        foreach($data as $k => $v){

                if(array_key_exists($v['month'],$bulan)){
                    
                    $month['month'][] = $bulan[$v['month']];
                }
        }
               
                
     

        $results = array();
        foreach($data as $key => $value){

            $amount['data'][] = $value['amount'];
        }

        $results = array();       
        array_push($results, $amount); 
        array_push($results, $month);
        array_push($results, $textTahun);
        print json_encode($results, JSON_NUMERIC_CHECK);

    }
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */