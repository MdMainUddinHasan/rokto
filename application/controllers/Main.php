<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->data = array();
          $this->data['menu']='home';
        //	$this->load->model(array('Main_model'));
    }

    public function index() {

          $this->data['menu']='home';
        $this->data['city_division'] = $this->Main_model->detailed_result('*',  array('where'=>array('status' => 'Active')), 0, 0, array('table_pk' => 'city_division_id', 'table' => 'city_division'));
        $this->data['location'] = $this->Main_model->detailed_result('*',  array('where'=>array('status' => 'Active')), 0, 0, array('table_pk' => 'location_id', 'table' => 'location'));

        $this->data['header'] = $this->load->view('client/header', $this->data, true);
        $this->data['content'] = $this->load->view('client/home', $this->data, true);
        $this->data['footer'] = $this->load->view('client/footer', $this->data, true);
        $this->load->view('client/template', $this->data);
    }

    public function registration() {
          $this->data['menu']='registration';
        $feedback = array();

        $table_info = array();


        $this->data['city_division'] = $this->Main_model->detailed_result('*',  array('where'=>array('status' => 'Active')), 0, 0, array('table_pk' => 'city_division_id', 'table' => 'city_division'));
        $this->data['location'] = $this->Main_model->detailed_result('*',  array('where'=>array('status' => 'Active')), 0, 0, array('table_pk' => 'location_id', 'table' => 'location'));



        if (isset($_POST) && count($_POST) > 0) {


            $table_info['table_pk'] = 'client_id';
            $table_info['table'] = 'client';
            $check_exist = $this->Main_model->row('*', null, array('email_address' => $_POST['email_address']), $table_info);

            if (empty($check_exist)) {

                $data = array();
                foreach ($_POST as $key => $value) {
                    $data[$key] = $value;
                }


                $data['create_date'] = date('d/m/Y');
                $table_info = array();
                $table_info['table'] = 'client';
                $table_info['table_pk'] = 'client_id';
                $table_info['table_pk_value'] = '';


                if (strlen(@$_FILES['cl_picture']['name']) > 0) {
                    $tmp = explode('.', $_FILES['cl_picture']["name"]);
                    $ext = end($tmp);
                    $name = time() . '_' . rand() . '.' . $ext;
                    $config['upload_path'] = 'document/cl_picture';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['file_name'] = $name;
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);


                    $data['cl_picture'] = $name;

                    if ($this->upload->do_upload('cl_picture')) {
                        $result = $this->Main_model->save_update($data, $table_info);
                        $feedback['message'] = 'Registration Successful';
                        $feedback['alert_type'] = 'alert-success';
                    } else {
                        $error = $this->upload->display_errors();
                        $this->data['frm_data'] = $_POST;

                        $feedback['message'] = $error;
                        $feedback['alert_type'] = 'alert-warning';
                    }






                    //  $tr_data = array('slider_photo' => $name, 'slider_id' => $result);
                } else 
                    {
                    $result = $this->Main_model->save_update($data, $table_info);
                    // $tr_data = array('slider_photo' => '', 'slider_id' => $result);
                }
            } else {
                $this->data['frm_data'] = $_POST;
                $feedback['message'] = 'already registered';
                $feedback['alert_type'] = 'alert-warning';
            }
        }
        $this->data['feedback'] = $feedback;
        $this->data['header'] = $this->load->view('client/header', $this->data, true);
        $this->data['content'] = $this->load->view('client/registration', $this->data, true);
        $this->data['footer'] = $this->load->view('client/footer', $this->data, true);
        $this->load->view('client/template', $this->data);
    }

    public function search_data($offset = 0)   {


        $table_info = array();
        $table_info['table_pk'] = 'client_id';
        $table_info['table'] = 'client';



        //	if($this->input->is_ajax_request()):




        $condition = array();
        if (isset($_GET) AND count($_GET) > 0) {
            if ($_GET['blood_group'] != '') {
                $condition['where']['blood_group'] = $this->input->get('blood_group', true);
            }
            if (isset($_GET['city_division']) && $_GET['city_division'] != '') {
                $condition['where']['city_division'] = $this->input->get('city_division', true);
            }
            if (isset($_GET['location']) && $_GET['location'] != '') {
                $condition['where']['location'] = $this->input->get('location', true);
            }
            $condition['where']['status'] = 'Approve';
            
    
            
//			if($_GET['title'] != ''){
//			$condition['like']['pro_title'] 	= $this->input->get('title',true);
//			}
        }
        $this->load->library('pagination');
        $config['base_url'] = site_url('main/search_data');
        $total = $this->Main_model->detailed_result('*', $condition, 0, 0, $table_info);
        $config['total_rows'] = count($total);
        $config['per_page'] = 20;
        $this->pagination->initialize($config);
        $this->data['pagination'] = $this->pagination->ajax_create_links();

        $result = $this->Main_model->detailed_result('*', $condition, 20, $offset, $table_info);


        $row = array();
        $new_value = array();
        foreach ($result as $value) {

            foreach ($value as $nkey => $val) {
                $new_value[$nkey] = $val;
                if ($nkey == 'dob') {
                    $new_value['age'] = get_age_from_dob($val);
                }
                if ($nkey == 'blood_group') {
                    $new_value['blood_group'] = set_special_characters($val, 'blood_group');
                }



                if ($nkey == 'city_division') {
                    $new_value['city_division_text'] = get_city_division($val);
                }
                if ($nkey == 'location') {
                    $new_value['location_text'] = get_location($val);
                }
            }

            $row[] = $new_value;
        }

        $this->data['rows'] = $row;

        echo json_encode($this->data);
        exit;
    }

    public function detail($id = 0) {


        $this->data['city_division'] = $this->Main_model->detailed_result('*',  array('where'=>array('status' => 'Active')), 0, 0, array('table_pk' => 'city_division_id', 'table' => 'city_division'));
        $this->data['location'] = $this->Main_model->detailed_result('*',  array('where'=>array('status' => 'Active')), 0, 0, array('table_pk' => 'location_id', 'table' => 'location'));

        $table_info = array();
        $table_info['table_pk'] = 'client_id';
        $table_info['table'] = 'client';

        $this->data['row'] = $this->Main_model->row('*', null, array('client_id' => $id), $table_info);


        $this->data['header'] = $this->load->view('client/header', $this->data, true);
        $this->data['content'] = $this->load->view('client/detail', $this->data, true);
        $this->data['footer'] = $this->load->view('client/footer', $this->data, true);
        $this->load->view('client/template', $this->data);
    }

    public function report($id = null) {
        $feedback = array();
        $this->data['client_id'] = $id;

        if (isset($_POST) && count($_POST) > 0) {



            $table_info = array();
            $table_info['table_pk'] = 'client_id';
            $table_info['table'] = 'client';
            $check_exist = $this->Main_model->row('*', null, array('client_id' => $_POST['client_id']), $table_info);

            if (!empty($check_exist)) {

                $data = array();
                foreach ($_POST as $key => $value) {
                    $data[$key] = $value;
                    if ($key == 'others') {
                        $data['issues'] = $value;
                        unset($data['others']);
                    }
                }


                $data['create_date'] = date('Y-m-d');
                $table_info = array();
                $table_info['table'] = 'report';
                $table_info['table_pk'] = 'report_id';
                $table_info['table_pk_value'] = '';


                $result = $this->Main_model->save_update($data, $table_info);
                // $tr_data = array('slider_photo' => '', 'slider_id' => $result);

                $feedback['message'] = 'Data Sent  Successfuly';
                $feedback['alert_type'] = 'alert-success';
            } else {
                $this->data['frm_data'] = $_POST;
                $feedback['message'] = 'Not Found';
                $feedback['alert_type'] = 'alert-warning';
            }
        }
        $this->data['feedback'] = $feedback;
        $this->data['header'] = $this->load->view('client/header', $this->data, true);
        $this->data['content'] = $this->load->view('client/report', $this->data, true);
        $this->data['footer'] = $this->load->view('client/footer', $this->data, true);
        $this->load->view('client/template', $this->data);
    }

}
