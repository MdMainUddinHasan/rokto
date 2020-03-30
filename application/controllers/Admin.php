<?php
class Admin extends CI_Controller {
    public function __construct() {

        parent::__construct();


        $management_login = $this->session->userdata('management_login');
        $username = $this->session->userdata('username');
   
         $this->data['menu']='home';


        if ($management_login != constant("project_admin_login")) {

            redirect('Admin_access', 'refresh');
        }
    }

    public function index() {
       $this->data['menu']='home';

        $this->data['city_division'] = $this->Main_model->detailed_result('*', array('where' => array('status' => 'Active')), 0, 0, array('table_pk' => 'city_division_id', 'table' => 'city_division'));
        $this->data['location'] = $this->Main_model->detailed_result('*', array('where' => array('status' => 'Active')), 0, 0, array('table_pk' => 'location_id', 'table' => 'location'));

        $this->data['header'] = $this->load->view('admin/header', $this->data, true);
        $this->data['content'] = $this->load->view('admin/home', $this->data, true);
        $this->data['footer'] = $this->load->view('admin/footer', $this->data, true);
        $this->load->view('admin/template', $this->data);
    }

    public function city_division() {
 $this->data['menu']='location';


        $feedback = array();

        if (isset($_POST) && count($_POST) > 0) {

            $table_info = array();


            $data = array();
            foreach ($_POST as $key => $value) {
                $data[$key] = $value;
            }


            $table_info['table'] = 'city_division';
            $table_info['table_pk'] = 'city_division_id';
            $table_info['table_pk_value'] = '';



            $result = $this->Main_model->save_update($data, $table_info);
            if ($result) {
                $feedback['message'] = 'Data insert successful';
                $feedback['alert_type'] = 'alert-success';
            } else {
                $feedback['message'] = 'Data insert failed';
                $feedback['alert_type'] = 'alert-warning';
            }
            // $tr_data = array('slider_photo' => '', 'slider_id' => $result);
        }





        $this->data['feedback'] = $feedback;
        $this->data['city_division'] = $this->Main_model->detailed_result('*', array(), 0, 0, array('table_pk' => 'city_division_id', 'table' => 'city_division'));
        $this->data['location'] = $this->Main_model->detailed_result('*', array('where' => array('status' => 'Active')), 0, 0, array('table_pk' => 'location_id', 'table' => 'location'));


        $this->data['header'] = $this->load->view('admin/header', $this->data, true);
        $this->data['content'] = $this->load->view('admin/city_division', $this->data, true);
        $this->data['footer'] = $this->load->view('admin/footer', $this->data, true);
        $this->load->view('admin/template', $this->data);
    }

    public function area_location() {
$this->data['menu']='location';

        $table_info = array();

        $table_info['table'] = 'location';
        $table_info['table_pk'] = 'location_id';
        $table_info['table_pk_value'] = '';



        $feedback = array();

        if (isset($_POST) && count($_POST) > 0) {




            $data = array();
            foreach ($_POST as $key => $value) {
                $data[$key] = $value;
            }



            $result = $this->Main_model->save_update($data, $table_info);
            if ($result) {
                $feedback['message'] = 'Data insert successful';
                $feedback['alert_type'] = 'alert-success';
            } else {
                $feedback['message'] = 'Data insert failed';
                $feedback['alert_type'] = 'alert-warning';
            }
            // $tr_data = array('slider_photo' => '', 'slider_id' => $result);
        }





        $this->data['feedback'] = $feedback;
        $this->data['city_division'] = $this->Main_model->detailed_result('*', array(), 0, 0, array('table_pk' => 'city_division_id', 'table' => 'city_division'));



        $this->data['header'] = $this->load->view('admin/header', $this->data, true);
        $this->data['content'] = $this->load->view('admin/area_location', $this->data, true);
        $this->data['footer'] = $this->load->view('admin/footer', $this->data, true);
        $this->load->view('admin/template', $this->data);
    }

    public function search_location($offset = 0) {

$this->data['menu']='location';

        $table_info = array();

        $table_info['table'] = 'location';
        $table_info['table_pk'] = 'location_id';
        $table_info['table_pk_value'] = '';


        //	if($this->input->is_ajax_request()):



        $condition = array();
        if (isset($_GET) AND count($_GET) > 0) {
            if ($_GET['city_division_id'] != '') {
                $condition['where']['city_division_id'] = $this->input->get('city_division_id', true);
            }


            if ($_GET['location'] != '') {
                $condition['like']['location_name'] = $this->input->get('location', true);
            }

            $this->data['frm_data'] = $_GET;
        }
        $this->load->library('pagination');
        $config['base_url'] = site_url('main/search_data');
        $total = $this->Main_model->detailed_result('*', $condition, 0, 0, $table_info);
        $config['total_rows'] = count($total);
        $config['per_page'] = 15;
        $this->pagination->initialize($config);
        $this->data['pagination'] = $this->pagination->ajax_create_links();

        $result = $this->Main_model->detailed_result('*', $condition, 15, $offset, $table_info);



        $row = array();
        $new_value = array();
        foreach ($result as $value) {

            foreach ($value as $nkey => $val) {
                $new_value[$nkey] = $val;



                if ($nkey == 'city_division_id') {
                    $new_value['city_division_text'] = get_city_division($val);
                }
            }

            $row[] = $new_value;
        }



        $this->data['rows'] = $row;

        echo json_encode($this->data);
        exit;
    }

    public function city_division_inline() {
        if ($this->input->is_ajax_request()):
            $id = $this->input->post('pk', true);
            $update = array();

            $update[$this->input->post('name', true)] = $this->input->post('value', true);

            $table_info['table'] = 'city_division';
            $table_info['table_pk'] = 'city_division_id';
            $table_info['table_pk_value'] = $id;




            $result = $this->Main_model->save_update($update, $table_info);



            exit;
        endif;
    }

    public function location_inline() {
        if ($this->input->is_ajax_request()):
            $id = $this->input->post('pk', true);
            $update = array();

            $update[$this->input->post('name', true)] = $this->input->post('value', true);

            $table_info['table'] = 'location';
            $table_info['table_pk'] = 'location_id';
            $table_info['table_pk_value'] = $id;




            $result = $this->Main_model->save_update($update, $table_info);



            exit;
        endif;
    }

    public function cl_detail($id = 0) {


        $this->data['city_division'] = $this->Main_model->detailed_result('*', array('where' => array('status' => 'Active')), 0, 0, array('table_pk' => 'city_division_id', 'table' => 'city_division'));
        $this->data['location'] = $this->Main_model->detailed_result('*', array('where' => array('status' => 'Active')), 0, 0, array('table_pk' => 'location_id', 'table' => 'location'));

        $table_info = array();
        $table_info['table_pk'] = 'client_id';
        $table_info['table'] = 'client';

        $this->data['row'] = $this->Main_model->row('*', null, array('client_id' => $id), $table_info);


        $this->data['header'] = $this->load->view('admin/header', $this->data, true);
        $this->data['content'] = $this->load->view('admin/detail', $this->data, true);
        $this->data['footer'] = $this->load->view('admin/footer', $this->data, true);
        $this->load->view('admin/template', $this->data);
    }

    public function cl_info_edit($id = 0) {
        $feedback = array();


        $table_info = array();
        $table_info['table'] = 'client';
        $table_info['table_pk'] = 'client_id';

        $this->data['city_division'] = $this->Main_model->detailed_result('*', array('where' => array('status' => 'Active')), 0, 0, array('table_pk' => 'city_division_id', 'table' => 'city_division'));
        $this->data['location'] = $this->Main_model->detailed_result('*', array('where' => array('status' => 'Active')), 0, 0, array('table_pk' => 'location_id', 'table' => 'location'));




        if (isset($_POST) && count($_POST) > 0) {
            $data = array();
            
            $cl_picture=$_POST['old_cl_picture'];
            foreach ($_POST as $key => $value) {
                $data[$key] = $value;
                if ($key == 'client_id') {

                    unset($data['client_id']);
                }
            }
              unset($data['old_cl_picture']);
            
              

            $table_info['table_pk_value'] = $this->input->post('client_id', true);

              if (strlen(@$_FILES['cl_picture']['name']) > 0)  {
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
                        
                            if($result && $cl_picture!='' ){
                            
                              if (file_exists('document/cl_picture/' . $cl_picture)) {
                            unlink('document/cl_picture/' .$cl_picture);

                        } 
                        }
                        
                        $feedback['message'] = 'Data update successful';
                        $feedback['alert_type'] = 'alert-success';
                    } else {
                        $error = $this->upload->display_errors();
                        $this->data['frm_data'] = $_POST;

                        $feedback['message'] = $error;
                        $feedback['alert_type'] = 'alert-warning';
                    }


                } else {
                    $result = $this->Main_model->save_update($data, $table_info);
                    $feedback['message'] = 'Data insert successful';
                        $feedback['alert_type'] = 'alert-success';
                }
            
            
            
            
            
            
            
            
            
            

            $result = $this->Main_model->save_update($data, $table_info);
            // $tr_data = array('slider_photo' => '', 'slider_id' => $result);
            $id = $table_info['table_pk_value'];
            $feedback['message'] = 'Data Update  Successfuly';
            $feedback['alert_type'] = 'alert-success';
        }
        $this->data['feedback'] = $feedback;



        $this->data['frm_data'] = $this->Main_model->row('*', null, array('client_id' => $id), $table_info);

        $this->data['current_location'] = $this->Main_model->detailed_result('*', array('where' => array('status' => 'Active', 'city_division_id' => $this->data['frm_data']['city_division'])), 0, 0, array('table_pk' => 'location_id', 'table' => 'location'));



        $this->data['header'] = $this->load->view('admin/header', $this->data, true);
        $this->data['content'] = $this->load->view('admin/edit_client', $this->data, true);
        $this->data['footer'] = $this->load->view('admin/footer', $this->data, true);
        $this->load->view('admin/template', $this->data);
    }
   public function cl_pic_delete($id = 0){
       
       if($id<0){
           redirect('admin');
       }
        $table_info = array();
        $table_info['table'] = 'client';
        $table_info['table_pk'] = 'client_id'; 

        $table_info['table_pk_value'] = $id;
        $cl_data = $this->Main_model->row('*', null, array('client_id' => $id), $table_info);
        $cl_picture=$cl_data['cl_picture'];        
        if( $cl_picture!='' ){
                            
          if (file_exists('document/cl_picture/' . $cl_picture)) {
          unlink('document/cl_picture/' .$cl_picture);

         } 
           $data['cl_picture']='';
           $result = $this->Main_model->save_update($data, $table_info);
//             $this->session->set_flashdata('message', 'Data deleted Success');
//             $this->session->set_flashdata('type', 'alert-success');
              redirect('admin');
            
        }       
            
    }
    public function client_inline() {
        if ($this->input->is_ajax_request()):
            $id = $this->input->post('pk', true);
            $update = array();

            $update[$this->input->post('name', true)] = $this->input->post('value', true);

            $table_info['table'] = 'client';
            $table_info['table_pk'] = 'client_id';
            $table_info['table_pk_value'] = $id;




            $result = $this->Main_model->save_update($update, $table_info);



            exit;
        endif;
    }
    
    
    
    
      public function delete_client() {
         if ($this->input->is_ajax_request()):
            $id = $this->input->post('client_id', true);
            $result = $this->Main_model->delete_client($id);
            echo $result;
   exit;
        endif;


    }
    
    
    

    public function search_data($offset = 0) {


        $table_info = array();
        $table_info['table_pk'] = 'client_id';
        $table_info['table'] = 'client';

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
            if (isset($_GET['status']) && $_GET['status'] != '') {
                $condition['where']['status'] = $this->input->get('status', true);
            }





            if ($_GET['cl_name'] != '') {
                $condition['like']['cl_name'] = $this->input->get('cl_name', true);
            }
        }
        $this->load->library('pagination');
        $config['base_url'] = site_url('admin/search_data');
        $total = $this->Main_model->detailed_result('*', $condition, 0, 0, $table_info);
        $config['total_rows'] = count($total);
        $config['per_page'] = 5;
        $this->pagination->initialize($config);
        $this->data['pagination'] = $this->pagination->ajax_create_links();

        $result = $this->Main_model->detailed_result('*', $condition, 5, $offset, $table_info);


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

        public function view_report() {
         $this->data['menu']='view_report';

        $this->data['header'] = $this->load->view('admin/header', $this->data, true);
        $this->data['content'] = $this->load->view('admin/report', '', true);
        $this->data['footer'] = $this->load->view('admin/footer', '', true);
        $this->load->view('admin/template', $this->data);
    }
     public function search_report($offset = 0) {


        $table_info = array();
        $table_info['table_pk'] = 'report_id';
        $table_info['table'] = 'report';

      
        
        
        $condition = array();
        if (isset($_GET) AND count($_GET) > 0) {
          
        
     if (isset($_GET['date_range']) && $_GET['date_range'] != '') {
         
         $str =explode("-",$this->input->get('date_range',true));
             if(count($str)>0){
         
                $condition['date_range']['start_date'] = set_mysql_date(trim($str[0]));
                $condition['date_range']['end_date'] =set_mysql_date(trim($str[1]));
             }
            }




            
        }
        
        
        
      
        
        $this->load->library('pagination');
        $config['base_url'] = site_url('admin/search_data');
        $total = $this->Main_model->detailed_report_result('*', $condition, 0, 0, $table_info);
        
        $config['total_rows'] = count($total);
        $config['per_page'] = 20;
        $this->pagination->initialize($config);
        $this->data['pagination'] = $this->pagination->ajax_create_links();

        $result = $this->Main_model->detailed_report_result('*', $condition, 20, $offset, $table_info);


        $row = array();
        $new_value = array();
        foreach ($result as $value) {

            foreach ($value as $nkey => $val) {
                $new_value[$nkey] = $val;
                if ($nkey == 'client_id') {

                 $client_data = $this->Main_model->row('*', null, array('client_id' => $val), array('table_pk' => 'client_id','table' => 'client'));
                    
                 $new_value['cl_name']=  $client_data['cl_name'];
                 $new_value['cl_status']=  $client_data['status'];
                 
                 
                 $new_value['report_list']=  $this->Main_model->detailed_result('*', array('where' => array('client_id' => $val)), 0, 0, array('table_pk' => 'report_id', 'table' => 'report'));
                    
                    
                    
                }
               



            }

            $row[] = $new_value;
        }

        $this->data['rows'] = $row;
   
        echo json_encode($this->data);
        exit;
    }
    
    // for add new menu list
    //  product item





    /*     * **************PArt Two**************** */

    public function change_password() {
$feedback=array();
$data=array();
   
        $this->page['user_name'] = $this->session->userdata('user_name');
        //$this->session->set_userdata('active_act','Password');//session for active tab at profile
        $user_id = $this->session->userdata('admin_id');
        /*         * *****password change******* */
        $info = $this->input->post();
    
        
          if (isset($_POST) && count($_POST) > 0) {

            $table_info = array();
            $table_info['table_pk'] = 'user_id';
            $table_info['table'] = 'tbl_user';
            
           $old_password=md5($this->input->post('password',true));
 
            $check_exist = $this->Main_model->row('*', null, array('user_id' =>$user_id,'password' =>$old_password), $table_info);
         
            if (!empty($check_exist)) {

                $data['password'] = md5($this->input->post('pass',true));
                $table_info = array();
                $table_info['table'] = 'tbl_user';
                $table_info['table_pk'] = 'user_id';
                 $table_info['table_pk_value'] = $check_exist['user_id'];


                $result = $this->Main_model->save_update($data, $table_info);
                // $tr_data = array('slider_photo' => '', 'slider_id' => $result);

                $feedback['message'] = 'Password has beeen changed successfully';
                $feedback['alert_type'] = 'alert-success';
            } else {
                $this->data['frm_data'] = $_POST;
                $feedback['message'] = 'Wrong Password provided';
                $feedback['alert_type'] = 'alert-warning';
            }
        }
        
 
        
        $this->data['feedback'] = $feedback;
        $this->data['header'] = $this->load->view('admin/header', $this->data, true);
        $this->data['content'] = $this->load->view('admin/admin_password_change', $this->data, true);
        $this->data['footer'] = $this->load->view('admin/footer', $this->data, true);
        $this->load->view('admin/template', $this->data);
        
        
        
        
        
        
        
    }

    public function admin_profile() {


        $this->page['title'] = '';
        $this->page['subtitle'] = 'Profile';
        $this->page['username'] = $this->session->userdata('user_name');
        $user_id = $this->session->userdata('admin_id');
        $data['row'] = $this->Admin_operation_model->view_admin_info($user_id);



        $this->page['maincontent'] = $this->load->view('admin/admin_profile', $data, TRUE);
        $this->load->view('admin/admin_master', $this->page);
    }


   

    public function logout() {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('user_type');
        $this->session->unset_userdata('management_login');
        redirect('admin_access');
    }

}
