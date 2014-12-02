<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Apps extends REST_Controller
{
	public $url;

	function __construct(){

		parent::__construct();
		$this->load->helper('url');
		$this->url    = current_url();
	}

	/**
	 * @param   [type] [parameter]
	 *          [value][table name]
	 *          eg : type/invoices
	 *          
	 * @param   [key] [parameter]
	 *          [value][table primary key or unique value]
	 *          if use this must be include also the val paremeter
	 *          [val][parameter]
	 *          [value][value for the primary key]
	 *          eg : key/invoice_id/val/42
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
	 *          eg : if more than one - type/invoices/joinid/invoice_id-customer_id/jointo/invoice_payments-customers          
	 * 
	 */
 

	function dataAll_get() 
    {
    	header('content-type: application/json; charset=utf-8');
		header("access-control-allow-origin: *");
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


    function dataSpecified_get(){

    	$data = array('nama' => 'sdsd');

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

}