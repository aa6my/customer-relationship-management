<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Apps extends REST_Controller
{
	public $url;

	function __construct(){

		parent::__construct();
		$this->load->helper('url');
		$this->url    = current_url();

        /**
         * Set header for cross origin request(CORS)
         * Allow (POST, GET, OPTIONS, PUT, DELETE) method for operations, by default is not available
         * Allow authorization basic authentication
         */
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Allow-Method: POST, GET, OPTIONS, PUT, DELETE');
        header("Access-Control-Allow-Headers: X-Custom-Header, X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");
       
	}

	/************** THIS FUNCTION WILL CHANGE DEPEND ON COMPLEXITY OF CLIENT SIDE REQUESTED ****************************
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
        /************** THIS FUNCTION WILL CHANGE DEPEND ON COMPLEXITY OF CLIENT SIDE REQUESTED ****************************
        *
        *
        */
        

        if(($this->get('val') && !$this->get('k ey')) || ($this->get('key') && !$this->get('val')))
        {
        	$this->response(array('error' => 'The key parameter and value parameter must have'), 400);
        }


        if(($this->get('joinid') && !$this->get('jointo')) || ($this->get('jointo') && !$this->get('joinid')))
        {
        	$this->response(array('error' => 'The joinid parameter and jointo parameter must have'), 400);
        }
        
		
		$type    =  $this->get('type'); // get type of table need to fetch data eg:|customers(user/type/customers)|
		$key     =  $this->get('key');  // UNIQUE ID in table to fetch from eg : |customers(user/type/customers/fetch/all@specified/key/customer_id)
		$table   = $type;               // asign type into table variable
		
		
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


    public function dataAll_options(){
       
       /**
        * OPTIONS requested set header and status to OK
        * This method majority applied for DELETE and PUT operations
        */
        header( "HTTP/1.1 200 OK" );
        exit();
    }



    public function dataAll_post()
    {
        /************** THIS FUNCTION WILL CHANGE DEPEND ON COMPLEXITY OF CLIENT SIDE REQUESTED ****************************
         * insert into table
         * Currently only one table only can insert at mean time
         * Will changes time to time in order to create function for dynamic fucntion
         */
        $table     = $this->post('type'); //this is actually a table name
        $arrayData = $this->post('formData');        
        $insert    = $this->Midae_model->insert_new_data($arrayData,$table);
        
        $this->response(array('Respone'=> 'Success Insert into Data'), 200);
    	  
    }

    public function dataAll_delete()
    {
        /************** THIS FUNCTION WILL CHANGE DEPEND ON COMPLEXITY OF CLIENT SIDE REQUESTED ****************************
         * This function can accept multiple and single table to delete
         * How this can happen? 
         * If want to make multiple delete operation, separate it by '-' :
         * example : type/customer-vendors/key/customer_id-vendor_id/12-30
         * Just separate by '-' symbols to delete multiple table
         * Single table example :
         * example : type/customers/key/customer_id/val/12
         *
         * Multiple table delete notes :
         *     - The 'type','key' and 'val' values must be in order form respectively
         *     - The number of values also must be the same
         *     - If the number of value in 'type' have 3 value, so in 'key' and 'val' also need 3 value otherwise, error will returned
         */
        $loop = false;                          // only for multiple table delete, if have this set to true

        $type  = $this->get('type');            // get type value in url
        if (false !== strpos($type,'-')){       // if '-' existed
            $loop = true;                       // set the loop value to TRUE
            $type  = explode('-', $type);       // and then explode those '-' into array value
        }
        
        $key   = $this->get('key');             // same with type but no need to set loop to true because already set in 'type'
        if (false !== strpos($key,'-')){
            
            $key  = explode('-', $key);
        }
        
        $val   = $this->get('val');             // same with type but no need to set loop to true because already set in 'type'
        if (false !== strpos($val,'-')){
            
            $val  = explode('-', $val);
        }

        // multiple tables delete
        if($loop == true){
            
            $bil = count($type);
            for($i = 0; $i < $bil; $i++){

                $table = $type[$i];
                $where = array($key[$i] => $val[$i]);
                $doDelete = $this->Midae_model->delete_data($table, $where);
            }

            $this->response(array('Multiple tables Delete Success'), 200);
        }
        // single table delete
        else{
                $table = $type;
                $where = array($key => $val);
                $doDelete = $this->Midae_model->delete_data($table, $where);

            $this->response(array('Single table Delete Success'), 200);
        }
        
    }

    public function dataAll_put(){

        /************** THIS FUNCTION WILL CHANGE DEPEND ON COMPLEXITY OF CLIENT SIDE REQUESTED ****************************    
        *
        */
        $tableToUpdate  = $this->put('type');
        $pk             = $this->put('primaryKey');
        $pkVal          = $this->put('primaryKeyVal');
        
        
        $columnToUpdate = $this->put('formData');
        $usingCondition = array($pk => $pkVal);        
        $kk             = $this->Midae_model->update_data($columnToUpdate, $tableToUpdate, $usingCondition);
        $this->response(array('Requestsuccess'), 200);
    }


    public function send_post()
	{
		var_dump($this->request->body);
	}

}