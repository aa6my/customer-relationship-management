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
 * @package    vendors.php
 * @author     Nizam <nizam@segimidae.net>
 * @author     Norlihazmey <norlihazmey@segimidae.net>
 * @license    https://ellislab.com/codeigniter/user-guide/license.html
 * @copyright  2014 SEGI MiDae
 * @version    0.4.1
*/

class Vendors extends MY_Controller {

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
        $crud->set_table('vendors');
        $crud->set_subject('Vendors');
        $crud->set_relation('country_id','country','country_nicename');
        $crud->display_as('vendor_name','Vendor Name')
             ->display_as('vendor_firstname','First Name')
             ->display_as('vendor_lastname','Last Name')
             ->display_as('vendor_email','Email')
             ->display_as('vendor_phone','Phone Number')
             ->display_as('vendor_mobile','Mobile Number')
             ->display_as('vendor_fax','Fax Number')
             ->display_as('vendor_address','Address')
             ->display_as('vendor_postcode','Postcode')
             ->display_as('vendor_state','State')
             ->display_as('country_id','Country')
             ->display_as('last_update','Date Changes');

        $crud->unset_texteditor('vendor_address','full_text');
        $crud->unset_print();

        
        

        if($state == "add" | $state == "edit"){
        $crud->fields('vendor_name','vendor_firstname','vendor_lastname','vendor_email','vendor_phone','vendor_mobile','vendor_fax','vendor_address','vendor_postcode','vendor_state','country_id');
        $crud->callback_before_insert(array($this,'_last_update'));

        $output = $crud->render();
        //$output = array_merge($data,(array)$output);
        $this->load->view('cruds.php',$output);
        }elseif ($state == "read") {
        $crud->fields('vendor_name','vendor_firstname','vendor_lastname','vendor_email','vendor_phone','vendor_mobile','vendor_fax','vendor_address','vendor_postcode','vendor_state','country_id','last_update');
        $crud->callback_before_insert(array($this,'_last_update'));
        $output = $crud->render();
        //$output = array_merge($data,(array)$output);
        $this->load->view('cruds.php',$output);
        }
        else{
        $crud->columns('vendor_name','vendor_firstname','vendor_lastname','vendor_mobile','vendor_address');
        
        $crud->set_rules('vendor_name','Vendor Name', 'required');
        $crud->set_rules('vendor_firstname','Vendor First Name', 'required');
        $crud->set_rules('vendor_lastname','Vendor Last Name', 'required');
        $crud->set_rules('vendor_email', 'Vendor Email', 'valid_email|required');
        $crud->set_rules('vendor_phone', 'Vendor Phone','integer|required');
        $crud->set_rules('vendor_mobile','Vendor Mobile', 'integer|required');
        $crud->set_rules('vendor_address', 'Vendor Address', 'required');
        $crud->set_rules('vendor_postcode', 'Vendor Postcode' ,'integer|required');
        $crud->set_rules('vendor_state', 'Vendor State', 'required');
        $crud->set_rules('country_id', 'Vendor Country', 'required');
        

        $output = $crud->render();
        //$output = array_merge($data,(array)$output);
        $this->load->view('cruds.php',$output);
        }

    }

}

/* End of file vendors.php */
/* Location: ./application/controllers/vendors.php */