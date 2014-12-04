<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Apps extends REST_Controller
{
	public $url;

	function __construct(){

		parent::__construct();
		$this->load->helper('url');
		$this->url    = current_url();
		//if($this->input->server('REQUEST_METHOD')=="DELETE"){
		//	$this.dataAll_delete();
		//}
	}

	/**
	 * @param   [type] [parameter]
	 *          [value][table name]
	 *          eg : crm/type/invoices
	 *          
	 * @param   [key] [parameter]
	 *          [value][table primary key or unique value]
	 *          if use this must be include also the val paremeter
	 *          [val][parameter]
	 *          [value][value for the primary key]
	 *          eg : crm/key/invoice_id/val/42
	 *
	 * 			example Full url : crm/type/invoice/key/invoice_id/val/12
	 * 			
	 * ----------------join table(optional-if dont want to use, no need to include join set paramter)---------
	 * @param   [joinid] [parameter]
	 *          [value][id for the table that need to join]
	 *          eg : joinid/invoice_id @@ if want to add more than one join, separeted by '-' respectively
	 *          if use this must be include also the jointo paremeter and type parameter(mainly for first table to select)
	 *          [jointo][parameter]
	 *          [value][name of the table that need to join]
	 *          ex : jointo/invoice_payments
	 *          eg : if more than one - crm/type/invoices/joinid/invoice_id-customer_id/jointo/invoice_payments-customers          
	 * 
	 **************************************************************************************************/
 

	function dataAll_get() 
    {
        if(($this->get('val') && !$this->get('key')) || ($this->get('key') && !$this->get('val')))
        {
        	$this->response(array('error' => 'The key parameter and value parameter must have'), 400);
        }


        if(($this->get('joinid') && !$this->get('jointo')) || ($this->get('jointo') && !$this->get('joinid')))
        {
        	$this->response(array('error' => 'The joinid parameter and jointo parameter must have'), 400);
        }
        
		
		$type    =  $this->get('type'); // get type of table need to fetch data eg:|customers(user/type/customers)|
		$key     =  $this->get('key'); // UNIQUE ID in table to fetch from eg : |customers(user/type/customers/fetch/all@specified/key/customer_id)
		$table   = $type; //asign type into table variable
		
		
		$join_id = $this->get('joinid');
		$join_id = explode('-', $join_id);
		$join_to = $this->get('jointo');
		$join_to = explode('-', $join_to);

        
        if (false !== strpos($this->url,'joinid')) //if joinid name in url variable exist
        {
        	$value = $this->get('val');

        	if($value!="none")  // return join table with condition applied
        	 {
        	 	 $where = array($table.".".$key => $value);
        	 	 $data[$table] = $this->Midae_model->get_data_join($table,$where, $join_to, $join_id, false, false);
        	 	
        	 }

        }
        else
        {       

        	/**
        	 * if specified need and value for $key to fetch from eg : |customers(user/type/customers/val/2/key) == if no unique id just put none as a value
        	 * @var [type]
        	 */
        	$value = $this->get('val');
        	$where = &$same_where; 
        	$where = array($key => $value);

        	 if (false !== strpos($this->url,'val')) //if have val string in url - must be include the key parameter also
        	 {
        	 	 
        	 	 $data[$table] = $this->Midae_model->get_all_rows($table,$same_where, false, false, false, false);

        	 }
        	 else
        	 {

        	 	  $data[$table] = $this->Midae_model->get_all_rows($table,false, false, false, false, false);
        	 }
        	 
        
    }



    



		/*========================================== RESULTS RESPOND =========================================		
    	 *
    	 * if got the data in query, return respond from the server to the client using exact format
    	 */
        if($data)
        {
            $this->response($data, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'User could not be found'), 404);
        }
        /*========================================= END RESULT ================================================*/
    }






    public function dataAll_post()
    {
    	//if($this->input->post('save')){
    		//echo $this->get('cuba');
			//$website_name = $this->input->post('website_name');
			//echo $website_name;
		//}
    	  // 200 being the HTTP response code
    	  
    }

    public function dataAll_delete()
    {
    	$id = $this->uri->segment(3);
        if(!$id)
        {
            $this->response(array('error' =>
                                'An ID must be supplied to delete a customer'), 400);
        }


        if($id) {
            try {
              $customer = $this->Midae_model->delete_data('invoices_test', array('invoice_id' => $id));
            } catch (Exception $e) {
                
                $this->response(array('error' => $e->getMessage()),
                                        $e->getCode());
            }
                $this->response($customer, 200); // 200 being the HTTP response code
        } else
            $this->response(array('error' => 'Widget could not be found'), 404);
        
    }


    public function send_post()
	{
		var_dump($this->request->body);
	}

}