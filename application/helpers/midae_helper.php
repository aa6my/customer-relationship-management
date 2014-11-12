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
 * @category   helpers
 * @package    midae_helper.php
 * @author     Nizam <nizam@segimidae.net>
 * @author     Norlihazmey <norlihazmey@segimidae.net>
 * @license    https://ellislab.com/codeigniter/user-guide/license.html
 * @copyright  2014 SEGI MiDae
 * @version    0.4.1
*/ 

// Still in progress. Dont not disturb

		global $test;

		$CI =& get_instance();
		$CI->load->model('midae_model');
		$CI->load->database();
		$CI->load->library('session');
		$test['user_meta'] = $CI->midae_model->get_user_meta();
		$test['top_title'] = ucwords(strtolower($CI->uri->segment('1'))); //URI title.



/* End of file midae_helper.php */
/* Location: ./application/helpers/midae_helper.php */