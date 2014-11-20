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
 * @package    products.php
 * @author     Nizam <nizam@segimidae.net>
 * @author     Norlihazmey <norlihazmey@segimidae.net>
 * @license    https://ellislab.com/codeigniter/user-guide/license.html
 * @copyright  2014 SEGI MiDae
 * @version    0.4.1
*/

class Products extends CI_Controller {

    public function access_map(){
        return array(
            'index'=>'view',
            'update'=>'edit',
            'category'=>'view',
            'test'=>'view'
        );
    }
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
        // Component
        $this->output->enable_profiler(TRUE); //Profiler Debug
        $data['user_meta'] = $this->Midae_model->get_user_meta();
        $data['top_title'] = ucwords(strtolower($this->uri->segment('1'))); //URI title.
        $data['top_desc'] = "Product & Goods"; //function purpose here.
        //End of component

        $crud = new grocery_CRUD();
        $state = $crud->getState();
        $crud->set_theme('datatables');
        $crud->set_table('products');
        $crud->set_subject('Products');
        $crud->set_relation('catproduct_id','catproduct','catproduct_name');
        $crud->display_as('product_sku','Product SKU')
             ->display_as('product_name','Product Name')
             ->display_as('product_desc','Product Description')
             ->display_as('product_quantity','Product Quantity')
             ->display_as('product_amount','Product Amount')
             ->display_as('catproduct_id','Category');
        $crud->unset_texteditor('product_desc','full_text');
        $crud->unset_print();

        if($state == "add" | $state == "edit"){
       	
        $crud->callback_before_insert(array($this,'_last_update'));
        $output = $crud->render();
        $output = array_merge($data,(array)$output);
        $this->load->view('cruds.php',$output);
        }
        else{
        $crud->columns('product_sku','product_name','product_quantity','product_amount');
        $output = $crud->render();
        $output = array_merge($data,(array)$output);
        $this->load->view('cruds.php',$output);
        } 


    }

    public function category()
    {

        // Component
        //$this->output->enable_profiler(TRUE); //Profiler Debug
        $data['user_meta'] = $this->Midae_model->get_user_meta();
        $data['top_title'] = ucwords(strtolower($this->uri->segment('1'))); //URI title.
        $data['top_desc'] = "Product Category"; //function purpose here.
        //End of component

        $crud = new grocery_CRUD();
        $state = $crud->getState();
        $crud->set_theme('datatables');
        $crud->set_table('catproduct');
        $crud->set_subject('Category Products');
        $crud->display_as('catproduct_name','Category Name');
        $crud->unset_print();

        $output = $crud->render();
        $output = array_merge($data,(array)$output);
        $this->load->view('cruds.php',$output);
        

    }

    public function test()
    {
		global $midae;
       	print_r($midae);	
        //print_r($data);
        //
        $data['test1'] = "ayam";
        $data['test2'] = "lembu";
        echo "<br>";
        //echo $midae[0]['first_name'];

        //$this->load->view($data);



    }

}

/* End of file products.php */
/* Location: ./application/controllers/products.php */