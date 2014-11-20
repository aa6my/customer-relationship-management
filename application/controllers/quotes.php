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
 * @package    invoices.php
 * @author     Nizam <nizam@segimidae.net>
 * @author     Norlihazmey <norlihazmey@segimidae.net>
 * @license    https://ellislab.com/codeigniter/user-guide/license.html
 * @copyright  2014 SEGI MiDae
 * @version    0.4.1
*/

class Quotes extends CI_Controller {

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
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');
    }



    public function index()
    {

       
        $this->output->enable_profiler(TRUE); //Profiler Debug
        $this->load->model('Midae_model');
        $data['user_meta'] = $this->Midae_model->get_user_meta();
        $data['top_title'] = ucwords(strtolower($this->uri->segment('1'))); //URI title.
        $data['top_desc']  = "Change your page purpose here"; //function purpose here.

        //End of component

        $crud  = new grocery_CRUD();
        $state = $crud->getState();
        $crud->set_theme('datatables');
        $crud->set_table('quotes');
        $crud->set_subject('Quotes');        
        
        
       /**********************************************
        *  Rendering in datatables
        */
        $crud->columns('quote_status','quote_id','quote_date_created','invoice_date_created','quote_valid_until','job_task_id')
             ->display_as('quote_id','Quotes no.')
             ->display_as('invoice_date_created','Date issued')
             ->display_as('quote_valid_until','Valid until')
             ->display_as('job_task_id','Item');

        

      

         /**********************************************
        * When Add button clicked ==> View this part
        */
         if($state=="add"){

            $data['top_title'] = ucwords(strtolower($this->uri->segment('1'))); //URI title.
            $data['top_desc']  = "Change your page purpose here"; //function purpose here.*/
            //$data['groupData'] = $this->get_temporary_data();
            $this->load->view('quote_add',$data);
         }
         else if($state=="edit"){
         }
         else{
            $output = $crud->render();
            $output = array_merge($data,(array)$output);
            $this->load->view('cruds.php',$output);
         }


        








       /**********************************************
        * Callback before insert ==> Change form elements into customs element
        */
        
        /*$crud->field_type('quote_status','dropdown', array('0' => 'draft',
                                                           '1' => 'sent',
                                                           '2' => 'viewed',
                                                           '3' => 'approved' , 
                                                           '4' => 'rejected',
                                                           '5' => 'canceled'));*/


        
        


    }

    

}