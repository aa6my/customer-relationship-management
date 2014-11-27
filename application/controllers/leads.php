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
 * @package    leads.php
 * @author     Nizam <nizam@segimidae.net>
 * @author     Norlihazmey <norlihazmey@segimidae.net>
 * @license    https://ellislab.com/codeigniter/user-guide/license.html
 * @copyright  2014 SEGI MiDae
 * @version    0.4.1
*/

class Leads extends MY_Controller {

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
        $crud->set_table('leads');
        $crud->set_subject('leads');
        $crud->set_relation('country_id','country','country_nicename');
        $crud->display_as('lead_name','Lead Name')
             ->display_as('lead_firstname','First Name')
             ->display_as('lead_lastname','Last Name')
             ->display_as('lead_email','Email')
             ->display_as('lead_phone','Phone Number')
             ->display_as('lead_mobile','Mobile Number')
             ->display_as('lead_fax','Fax Number')
             ->display_as('lead_address','Address')
             ->display_as('lead_postcode','Postcode')
             ->display_as('lead_state','State')
             ->display_as('country_id','Country')
             ->display_as('last_update','Date Changes');
        $crud->unset_texteditor('lead_address','full_text');
        $crud->unset_print();

        if($state == "add" | $state == "edit"){
        $crud->fields('lead_name','lead_firstname','lead_lastname','lead_email','lead_phone','lead_mobile','lead_fax','lead_address','lead_postcode','lead_state','country_id');
        $crud->callback_before_insert(array($this,'_last_update'));
        $output = $crud->render();
        //$output = array_merge($data,(array)$output);
        $this->load->view('cruds.php',$output);
        }elseif ($state == "read") {
        $crud->fields('lead_name','lead_firstname','lead_lastname','lead_email','lead_phone','lead_mobile','lead_fax','lead_address','lead_postcode','lead_state','country_id','last_update');
        $crud->callback_before_insert(array($this,'_last_update'));
        $output = $crud->render();
        //$output = array_merge($data,(array)$output);
        $this->load->view('cruds.php',$output);
        }
        else{
        $crud->columns('lead_name','lead_firstname','lead_lastname','lead_mobile','lead_address');

        $crud->set_rules('lead_name','Lead Name', 'required');
        $crud->set_rules('lead_firstname','Lead First Name', 'required');
        $crud->set_rules('lead_lastname', 'Lead Last Name', 'required');
        $crud->set_rules('lead_email','Lead Email','valid_email|required');
        $crud->set_rules('lead_phone','Lead Phone','integer|required');
        $crud->set_rules('lead_address','Lead Address','required');
        $crud->set_rules('lead_postcode','Lead Postcode', 'integer|required');
        $crud->set_rules('lead_state','Lead State', 'required');
        $crud->set_rules('country_id','Lead Country' , 'required');

        $output = $crud->render();
        //$output = array_merge($data,(array)$output);
        $this->load->view('cruds.php',$output);
        }

    }

}

/* End of file leads.php */
/* Location: ./application/controllers/leads.php */