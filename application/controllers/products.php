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

class Products extends MY_Controller {

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
        //$output = array_merge($data,(array)$output);
        $this->load->view('cruds.php',$output);
        }
        else{
        $crud->columns('product_sku','product_name','product_quantity','product_amount');

        $crud->set_rules('product_sku','Product SKU', 'required');
        $crud->set_rules('product_name','Product Name', 'required');
        $crud->set_rules('product_desc', 'Product Description', 'required');
        $crud->set_rules('product_quantity','Product Quantity','integer|required');
        $crud->set_rules('product_amount','Product Amount','numeric|required');
        $crud->set_rules('catproduct_id','Product Category','required');

        $output = $crud->render();
        //$output = array_merge($data,(array)$output);
        $this->load->view('cruds.php',$output);
        } 


    }

    public function category()
    {
        $crud = new grocery_CRUD();
        $state = $crud->getState();
        $crud->set_theme('datatables');
        $crud->set_table('catproduct');
        $crud->set_subject('Product Category');
        $crud->display_as('catproduct_name','Category Name');
        $crud->unset_print();

        $output = $crud->render();
        //$output = array_merge($data,(array)$output);
        $this->load->view('cruds.php',$output);
        

    }

}

/* End of file products.php */
/* Location: ./application/controllers/products.php */