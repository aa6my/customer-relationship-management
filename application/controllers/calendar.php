<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calendar extends CI_Controller {

    public function access_map(){
        return array(
            'index'=>'view',
            'update'=>'edit',
        );
    }

    public function index($year = null, $month = null){

        // Component
        $this->load->model('Midae_model');
        $data['user_meta'] = $this->Midae_model->get_user_meta();
        $data['top_title'] = ucwords(strtolower($this->uri->segment('1'))); //URI title.
        $data['top_desc'] = "Change your page purpose here"; //function purpose here.
        //End of component
        date_default_timezone_set('Asia/Kuala_Lumpur');
        if( !$year ){
            $year = date('Y');
        }
        if( !$month ){
            $month = date('m');
        }

        $this->load->model("Calendar_model");

        if( $day = $this->input->post("day") ){

            $this->Calendar_model->add_calendar_data(
                "$year-$month-$day",
                $this->input->post("data")
            );
        }

        $calendar = array(
            "calendar" => $this->Calendar_model->generate($year, $month)
        );
        $calendar = array_merge($data,(array)$calendar);
        $this->load->view("calendar", $calendar);

    }
}