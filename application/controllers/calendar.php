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
 * @package    calendar.php
 * @author     Nizam <nizam@segimidae.net>
 * @author     Norlihazmey <norlihazmey@segimidae.net>
 * @license    https://ellislab.com/codeigniter/user-guide/license.html
 * @copyright  2014 SEGI MiDae
 * @version    0.4.1
*/

class Calendar extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function access_map(){
        return array(
            'index'=>'view',
            'getAll'=>'view',
            'events'=>'view',
            'save'=>'view'
        );
    }

    public function index(){

        // Component
        $data['user_meta'] = $this->Midae_model->get_user_meta();
        $data['top_title'] = ucwords(strtolower($this->uri->segment('1'))); //URI title.
        $data['top_desc'] = "List of Planned Events"; //function purpose here.
        //End of component
        $this->load->view('calendar', $data);
    }

    public function view(){

        // Component
        // $this->output->enable_profiler(TRUE); //Profiler Debug
        $data['user_meta'] = $this->Midae_model->get_user_meta();
        $data['top_title'] = ucwords(strtolower($this->uri->segment('1'))); //URI title.
        $data['top_desc'] = "Change your page purpose here"; //function purpose here.
        //End of component

        $crud = new grocery_CRUD();
        $state = $crud->getState();
        $crud->set_theme('datatables');
        $crud->set_table('events');
        $crud->set_subject('Events');
        $crud->callback_edit_field('start',array($this,'_callback_timetostr'));
        $crud->callback_edit_field('end',array($this,'_callback_timetostr'));
        $crud->field_type('class', 'hidden');
        $crud->change_field_type('title', 'readonly');
        $crud->change_field_type('body', 'readonly');
        $crud->unset_texteditor('body','full_text');

        if($state == "add" | $state == "edit"){
        $output = $crud->render();
        $output = array_merge($data,(array)$output);
        $this->load->view('cruds.php',$output);
        }elseif ($state == "read") {
        redirect(base_url() . "calendar");
        }
        else{
        redirect(base_url() . "calendar");
        }

    }
 
    public function _callback_timetostr($value)
    {
        //date_default_timezone_set($this->config->item('timezone'));
        $date = $value / 1000;
        return date('d-m-Y h:i A', $date);
    }

    public function events(){

        // Component
        $data['user_meta'] = $this->Midae_model->get_user_meta();
        $data['top_title'] = ucwords(strtolower($this->uri->segment('1'))); //URI title.
        $data['top_desc'] = "Change your page purpose here"; //function purpose here.
        //End of component
        $this->load->view('add_event', $data);

    }

    public function save()
    {
        $this->form_validation->set_rules('from', 'Desde', 'trim|required|xss_clean');
        $this->form_validation->set_rules('to', 'Hasta', 'trim|required|xss_clean');
        $this->form_validation->set_rules('title', 'Título', 'trim|required|xss_clean');
        $this->form_validation->set_rules('event', 'Evento', 'trim|required|xss_clean');
        $this->form_validation->set_rules('class', 'Tipo de evento', 'trim|required|xss_clean');

        $this->form_validation->set_message('required', 'El  %s es requerido');

        if($this->form_validation->run() == FALSE)
        {
            $this->index();
        }
        else
        {
            $this->Midae_model->add();
            redirect("calendar");
        }
    }

    public function getAll()
    {
        if($this->input->is_ajax_request())
        {
            $this->load->model('Midae_model');
            $events = $this->Midae_model->getAll();
            echo json_encode(
                array(
                    "success" => 1,
                    "result" => $events
                )
            );
        }
    }

    public function render($id = 0)
    {
        if($id != 0)
        {
            echo $id;
        }
    }

}

/* End of file calendar.php */
/* Location: ./application/controllers/calendar.php */