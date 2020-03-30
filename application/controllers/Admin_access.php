<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of btcit_admin
 *
 * @author BTCIT
 */
class Admin_Access extends CI_Controller {

    //put your code here


    public function __construct() {

        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");

        $management_login = $this->session->userdata('management_login');

        if ($management_login == constant("project_admin_login")) {
            redirect('Admin', 'refresh');
        } else {
            
        }
    }

    public function index() {
 
        $this->load->view('admin/login');
    }

    public function admin_login() {

        if ($this->input->post()) {

            $result = $this->Main_model->admin_login($this->input->post());
            if($result==1){
                redirect('Admin');
            }else{
                 $this->data['frm_data'] = $_POST;

                        $feedback['message'] = "The email and password you entered don't match";
                        $feedback['alert_type'] = 'alert-warning';
                 $this->data['feedback'] = $feedback;

                  $this->load->view('admin/login', $this->data);
            }
            
        }
    }

    public function admin_forgot_password() {


        $email_address = $this->input->post('email_address');

        if (is_array($this->input->post())) {
            if ($email_address != '') {
                $result = $this->Admin_operation_model->admin_forgot_password($this->input->post());
                if (@$result) {
                    $this->message->set('New password has been sent to your email address. Please check your email.', 'success', true);
                } else {
                    $this->message->set('Provided wrong email address.', 'error', true);
                }
            } else {
                $this->message->set('Email address is required .', 'warning', true);
            }
        }
        $this->load->view('besbd_admin/admin_forgot_password');
    }

}
