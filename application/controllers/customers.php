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
 * @package    customers.php
 * @author     Nizam <nizam@segimidae.net>
 * @author     Norlihazmey <norlihazmey@segimidae.net>
 * @license    https://ellislab.com/codeigniter/user-guide/license.html
 * @copyright  2014 SEGI MiDae
 * @version    0.4.1
*/

class Customers extends MY_Controller {

    public function access_map(){
        return array(
            'index'=>'view',
            'update'=>'edit'
        );
    }

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {

        $crud = new grocery_CRUD();
        $state = $crud->getState();
        $crud->set_theme('datatables');
        $crud->set_table('customers');
        $crud->set_subject('customers');
        $crud->set_relation('country_id','country','country_nicename');
        $crud->display_as('customer_name','Customer Name')
             ->display_as('customer_firstname','First Name')
             ->display_as('customer_lastname','Last Name')
             ->display_as('customer_email','Email')
             ->display_as('customer_phone','Phone Number')
             ->display_as('customer_mobile','Mobile Number')
             ->display_as('customer_fax','Fax Number')
             ->display_as('customer_address','Address')
             ->display_as('customer_postcode','Postcode')
             ->display_as('customer_state','State')
             ->display_as('country_id','Country')
             ->display_as('last_update','Date Changes');
        $crud->unset_texteditor('customer_address','full_text');
        $crud->unset_print();

        if($state == "add" | $state == "edit"){
        $crud->fields('customer_name','customer_firstname','customer_lastname','customer_email','customer_phone','customer_mobile','customer_fax','customer_address','customer_postcode','customer_state','country_id');
        $crud->callback_before_insert(array($this,'_last_update'));
        $output = $crud->render();
        //$output = array_merge($data,(array)$output);
        $this->load->view('cruds.php',$output);
        }elseif ($state == "read") {
        $crud->fields('customer_name','customer_firstname','customer_lastname','customer_email','customer_phone','customer_mobile','customer_fax','customer_address','customer_postcode','customer_state','country_id','last_update');
        $crud->callback_before_insert(array($this,'_last_update'));
        $output = $crud->render();
        //$output = array_merge($data,(array)$output);
        $this->load->view('cruds.php',$output);
        }
        else{
        $crud->columns('customer_name','customer_firstname','customer_lastname','customer_mobile','customer_address');
        $output = $crud->render();
        //$output = array_merge($data,(array)$output);
        $this->load->view('cruds.php',$output);
        }

    }

}

/* End of file customers.php */
/* Location: ./application/controllers/customers.php */