<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of manage
 *
 * @author User
 */
class Manage extends CI_Controller {

    public function __construct() {

        parent::__construct();


        $management_login = $this->session->userdata('management_login');
        $username = $this->session->userdata('username');
        $user_type = $this->session->userdata('user_type');



        if ($management_login != constant("project_admin_login")) {

            redirect('Admin_access', 'refresh');
        }
       
    }

    	public function browse($product_id="")
	{
		$data = array();
		if(is_dir('products/'.$product_id.'/uploads')){
			$files 				= get_filenames('products/'.$product_id.'/uploads');

			foreach($files as $file)
			{
				$extentions 	= array('jpg','jpeg','png','gif');
				$ext 			= explode('.',$file);
				if(in_array($ext[1],$extentions)){	
					$data['images'][]['name'] = $file;
				}
			}
			$data['cback'] 		= $_GET['CKEditorFuncNum'];
			$data['rootpath'] 	= base_url().'products/'.$product_id.'/uploads/';

		}else{
			$data['images'] 	= array();
			$data['cback'] 		= $_GET['CKEditorFuncNum'];
			$data['rootpath'] 	= base_url().'products/'.$product_id.'/uploads/';

		}
		$this->load->view('besbd_admin/browser',$data);
	}

	public function upload($product_id=""){

		if(is_int($product_id) AND $product_id > 0 AND isset($_FILES['upload'])){
			$filen = $_FILES['upload']['tmp_name']; 
			$con_images = "products/".$product_id."/uploads/".$_FILES['upload']['name'];
			move_uploaded_file($filen, $con_images );
			$url = "http://".$_SERVER['HTTP_HOST']."/".$con_images;

			$funcNum = $_GET['CKEditorFuncNum'] ;
			// Optional: instance name (might be used to load a specific configuration file or anything else).
			$CKEditor = $_GET['CKEditor'] ;
			// Optional: might be used to provide localized messages.
			$langCode = $_GET['langCode'] ;

			// Usually you will only assign something here if the file could not be uploaded.
			$message = '';
			echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
		}else{
			if(isset($_FILES['upload']) AND strlen($product_id) > 0){
				$filen = $_FILES['upload']['tmp_name'];

				if(!is_dir('products/'.$product_id))
				{
					mkdir('products/'.$product_id,0777);
					chmod('products/'.$product_id,0777);

					if(!is_dir('products/'.$product_id.'/uploads'))
					{
						mkdir('products/'.$product_id.'/uploads',0777);
						chmod('products/'.$product_id.'/uploads',0777);
					}
				}

				$con_images = "products/".$product_id."/uploads/".$_FILES['upload']['name'];
				move_uploaded_file($filen, $con_images );
				$url = "http://".$_SERVER['HTTP_HOST']."/".$con_images;

				$funcNum = $_GET['CKEditorFuncNum'] ;
				// Optional: instance name (might be used to load a specific configuration file or anything else).
				$CKEditor = $_GET['CKEditor'] ;
				// Optional: might be used to provide localized messages.
				$langCode = $_GET['langCode'] ;

				// Usually you will only assign something here if the file could not be uploaded.
				$message = '';
				echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
			}
		}
	}
    
    
    
    
    
    
    
    
    
    
    
    public function index() {


        $this->page['title'] = 'Home';
        $this->page['subtitle'] = '';

        //$data=$this->welcome_user_model->home_page_data();
        // $this->page['maincontent'] = $this->load->view('regi_user/regi_home',$data, TRUE);

        $this->page['maincontent'] = $this->load->view('besbd_admin/admin_home', '', TRUE);
        $this->load->view('besbd_admin/admin_master', $this->page);
    }



    // ==============================================
    //	  For slider
    //===============================================  


  

    public function slider_view() {
        $this->page['title'] = 'Slider';

        $data = $this->Admin_operation_model->slider_list();

        $this->page['maincontent'] = $this->load->view('besbd_admin/admin_slider', $data, TRUE);
        $this->load->view('besbd_admin/admin_master', $this->page);
        //  $this->load->view('besbd_admin/admin_album'); 
    }

    public function slider_add_opt() {

         
       

        
        $data = array();
        $data['slider_title'] = trim($_POST['slider_title']);
 
        $data['slider_description'] = trim($_POST['slider_description']);
       
        $data['user_id'] = $this->session->userdata('admin_id');
        $data['slider_status'] = '1';

        if (strlen(@$_FILES['img_url']['name']) > 0) {

        
            
            $tmp = explode('.', $_FILES['img_url']["name"]);
            $ext = end($tmp);
            
            
            
            $name = time() . '_' . rand() . '.' . $ext;
            $config['upload_path'] = 'document/slider_image';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_name'] = $name;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            $this->upload->do_upload('img_url');
            $data['slider_image_name'] = $name;
            $result = $this->Admin_operation_model->add_slider($data);

            $tr_data = array('slider_photo' => $name, 'slider_id' => $result);
        } else {
            $result = $this->Admin_operation_model->add_slider($data);
            $tr_data = array('slider_photo' => '', 'slider_id' => $result);
        }

        echo json_encode($tr_data);
    }

    public function slider_update_view($slider_id) {
        $result['single_slider_data'] = $this->Admin_operation_model->single_slider_info($slider_id);
        $this->load->view('besbd_admin/admin_slider_update', $result);
    }

    public function slider_update_opt() {
        $data = array();
        $data['slider_title'] = trim($_POST['slider_title_update']);
        $slider_id = $_POST['slider_id_update'];

        if ($_POST['slider_img_remove'] == 'remove_image') {
            $data['slider_image_name'] = NULL;
        }


      


//        $data['slider_discount'] = trim($_POST['slider_discount_update']);
        $data['slider_description'] = trim($_POST['slider_description_update']);
   
        $data['user_id'] = $this->session->userdata('admin_id');
        $data['slider_status'] = $_POST['slider_status'];
        $error = 'No';

        if (strlen(@$_FILES['img_url_update']['name']) > 0) {

           
            
            $tmp = explode('.', $_FILES['img_url_update']["name"]);
            $ext = end($tmp);
            
            
            
            $name = time() . '_' . rand() . '.' . $ext;
            $config['upload_path'] = 'document/slider_image';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_name'] = $name;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            $this->upload->do_upload('img_url_update');
            $data['slider_image_name'] = $name;
            $single_slider_data = $this->Admin_operation_model->single_slider_info($slider_id);
            $result = $this->Admin_operation_model->slider_update($data, $slider_id);
            if ($result) {
                if ($single_slider_data->slider_image_name != null) {
                    if (file_exists('document/slider_image/' . $single_slider_data->slider_image_name)) {
                        unlink('document/slider_image/' . $single_slider_data->slider_image_name);
                    } else {
                        $error = 'Yes';
                    }
                }
            }

            $tr_data = array('slider_photo' => $name, 'error_msg' => @$error);
        } else {
            if ($_POST['slider_img_remove'] == 'remove_image') {
                $single_slider_data = $this->Admin_operation_model->single_slider_info($slider_id);
            }

            $result = $this->Admin_operation_model->slider_update($data, $slider_id);
            if ($result) {
                if (@$single_slider_data->slider_image_name != NULL) {
                    if (file_exists('document/slider_image/' . $single_slider_data->slider_image_name)) {
                        unlink('document/slider_image/' . $single_slider_data->slider_image_name);
                    } else {
                        $error = 'Yes';
                    }
                }
            }

            $tr_data = array('slider_photo' => '', 'error_msg' => @$error);
        }
        echo json_encode($tr_data);
    }

    public function slider_delete_opt($slider_id) {
        $single_slider_data = $this->Admin_operation_model->single_slider_info($slider_id);
     
     
        $result = $this->Admin_operation_model->slider_delete($slider_id);
        if ($result) {
            if ($single_slider_data->slider_image_name != NULL) {
                if (file_exists('document/slider_image/' . $single_slider_data->slider_image_name)) {
                    unlink('document/slider_image/' . $single_slider_data->slider_image_name);
                } else {
                    $error = 'ture';
                }
            }

            
            
            return $result;
        }
    }

    public function slider_status_opt($slider_id, $status) {
        $data = array();
        $data['user_id'] = $this->session->userdata('admin_id');
        $data['slider_status'] = $status;
        $result = $this->Admin_operation_model->change_slider_status($slider_id, $data);
        return $result;
    }

 

    
    
    
    
    
    
    
    
    
    
    
    

    // ==============================================
    //	  For Category
    //===============================================  


    public function category_view() {
        $this->page['title'] = 'Manage Food';
        $this->page['subtitle'] = 'Category';

        $data = $this->Admin_operation_model->category_list();

        $this->page['maincontent'] = $this->load->view('besbd_admin/admin_category', $data, TRUE);
        $this->load->view('besbd_admin/admin_master', $this->page);
        //  $this->load->view('besbd_admin/admin_album'); 
    }

    public function category_add_opt() {

      
       

        
        $data = array();
        $data['category_title'] = trim($_POST['category_title']);
 
        $data['category_description'] = trim($_POST['category_description']);
        $data['category_order_type'] = 0;
        $data['user_id'] = $this->session->userdata('admin_id');
        $data['category_status'] = '1';

        if (strlen(@$_FILES['img_url']['name']) > 0) {

        
            
            $tmp = explode('.', $_FILES['img_url']["name"]);
            $ext = end($tmp);
            
            
            
            $name = time() . '_' . rand() . '.' . $ext;
            $config['upload_path'] = 'document/category_image';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_name'] = $name;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            $this->upload->do_upload('img_url');
            $data['category_image_name'] = $name;
            $result = $this->Admin_operation_model->add_category($data);

            $tr_data = array('category_photo' => $name, 'category_id' => $result);
        } else {
            $result = $this->Admin_operation_model->add_category($data);
            $tr_data = array('category_photo' => '', 'category_id' => $result);
        }

        echo json_encode($tr_data);
    }

    public function category_update_view($category_id) {
        $result['single_category_data'] = $this->Admin_operation_model->single_category_info($category_id);
        $this->load->view('besbd_admin/admin_category_update', $result);
    }

    public function category_update_opt() {
        $data = array();
        $data['category_title'] = trim($_POST['category_title_update']);
        $category_id = $_POST['category_id_update'];

        if ($_POST['category_img_remove'] == 'remove_image') {
            $data['category_image_name'] = NULL;
        }


      


//        $data['category_discount'] = trim($_POST['category_discount_update']);
        $data['category_description'] = trim($_POST['category_description_update']);
        $data['category_order_type'] = 0;
        $data['user_id'] = $this->session->userdata('admin_id');
        $data['category_status'] = $_POST['category_status'];
        $error = 'No';

        if (strlen(@$_FILES['img_url_update']['name']) > 0) {

           
            
            $tmp = explode('.', $_FILES['img_url_update']["name"]);
            $ext = end($tmp);
            
            
            
            $name = time() . '_' . rand() . '.' . $ext;
            $config['upload_path'] = 'document/category_image';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_name'] = $name;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            $this->upload->do_upload('img_url_update');
            $data['category_image_name'] = $name;
            $single_category_data = $this->Admin_operation_model->single_category_info($category_id);
            $result = $this->Admin_operation_model->category_update($data, $category_id);
            if ($result) {
                if ($single_category_data->category_image_name != null) {
                    if (file_exists('document/category_image/' . $single_category_data->category_image_name)) {
                        unlink('document/category_image/' . $single_category_data->category_image_name);
                    } else {
                        $error = 'Yes';
                    }
                }
            }

            $tr_data = array('category_photo' => $name, 'error_msg' => @$error);
        } else {
            if ($_POST['category_img_remove'] == 'remove_image') {
                $single_category_data = $this->Admin_operation_model->single_category_info($category_id);
            }

            $result = $this->Admin_operation_model->category_update($data, $category_id);
            if ($result) {
                if (@$single_category_data->category_image_name != NULL) {
                    if (file_exists('document/category_image/' . $single_category_data->category_image_name)) {
                        unlink('document/category_image/' . $single_category_data->category_image_name);
                    } else {
                        $error = 'Yes';
                    }
                }
            }

            $tr_data = array('category_photo' => '', 'error_msg' => @$error);
        }
        echo json_encode($tr_data);
    }

    public function category_delete_opt($category_id) {
        $single_category_data = $this->Admin_operation_model->single_category_info($category_id);
      
        $food_item_data = $this->Admin_operation_model->item_info_by_category_id($category_id);
        $result = $this->Admin_operation_model->category_delete($category_id);
        if ($result) {
            if ($single_category_data->category_image_name != NULL) {
                if (file_exists('document/category_image/' . $single_category_data->category_image_name)) {
                    unlink('document/category_image/' . $single_category_data->category_image_name);
                } else {
                    $error = 'ture';
                }
            }

        

            // Delete under food item
            foreach ($food_item_data as $food_item_value) {
                $this->food_item_delete_opt($food_item_value->item_id);
            }
            return $result;
        }
    }

    public function category_status_opt($category_id, $status) {
        $data = array();
        $data['user_id'] = $this->session->userdata('admin_id');
        $data['category_status'] = $status;
        $result = $this->Admin_operation_model->change_category_status($category_id, $data);
        return $result;
    }

 


    // for add new menu list



  //  product item


    public function product_item_view() {
        $this->page['title'] = 'Manage Food';
        $this->page['subtitle'] = 'Food Item';

    
        $data['category_data'] = $this->Admin_operation_model->category_list();
        $data['food_item_data'] = $this->Admin_operation_model->food_item_list();


        $this->page['maincontent'] = $this->load->view('besbd_admin/admin_product_list', $data, TRUE);
        $this->load->view('besbd_admin/admin_master', $this->page);
        //  $this->load->view('besbd_admin/admin_album'); 
    }

       public function product_item_add() {
        $this->page['title'] = 'Manage Food';
        $this->page['subtitle'] = 'Add Product';
    
        $data['category_data'] = $this->Admin_operation_model->category_list();
     

         $data['random_id'] = md5(uniqid(rand(), true));
        $this->page['maincontent'] = $this->load->view('besbd_admin/admin_add_product', $data, TRUE);
        $this->load->view('besbd_admin/admin_master', $this->page);
        //  $this->load->view('besbd_admin/admin_album'); 
    }
   

    
    
    
    
    
    public function food_item_add_opt() {

        
       
        $data = array();
        $data['item_title'] = trim($_POST['item_title']);
        $data['brand_name'] = trim($_POST['brand_name']);
        $data['category_id'] = $_POST['category_id'];
        $data['view_page'] = $_POST['view_page'];
        $data['item_description'] = trim($_POST['item_description']);
        $data['item_long_description'] = $_POST['item_long_description'];
        $data['watt'] = $_POST['watt'];
        $data['working_voltage'] = $_POST['working_voltage'];
        $data['light_source'] = $_POST['light_source'];
        $data['rated_life'] = $_POST['rated_life'];
        $data['body_material'] = $_POST['body_material'];
        $data['cover'] = $_POST['cover'];
        
     

        $data['user_id'] = $this->session->userdata('admin_id');
        $data['item_status'] = '1';
        
        
        if (strlen(@$_FILES['product_file']['name']) > 0) {
        $config['upload_path'] = 'document/product_file/';
        $config['allowed_types'] = 'doc|pdf|docx|xlsx|xls';
        $config['max_size'] = '10000';
        $config['overwrite'] = false;
        $config['remove_spaces'] = true;
        $config['file_name'] = 'proudct_file' . uniqid();        
        $error = array();
        $fdata = array();
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('product_file')) {
            $error = $this->upload->display_errors();
         
            echo 2;
        } else {
       
            $fdata = $this->upload->data();
         
            $data['product_file'] = $fdata['raw_name'] . $fdata['file_ext'];
         
        }       
       }    
    
        
        
        
        
        
        
        
        
        
 
        if (strlen(@$_FILES['img_url']['name']) > 0) {

            
               
            $tmp = explode('.', $_FILES['img_url']["name"]);
            $ext = end($tmp);
             $name = time() . '_' . rand() . '.' . $ext;
            
            $config['upload_path'] = 'document/product_item_image';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_name'] = $name;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload('img_url');
            $data['item_image_name'] = $name;
            
            $result = $this->Admin_operation_model->add_food_item($data);
            
            
            
            
            
            
            
            

            $tr_data = array('food_item_photo' => $name, 'item_id' => $result);
            
        } else {
            
            $result = $this->Admin_operation_model->add_food_item($data);
            
            
            $tr_data = array('food_item_photo' => '', 'item_id' => $result);
        }
 redirect('manage/product_item_view');
    //    echo json_encode($tr_data);
    }

    public function food_item_update_view($food_item_id) {
        $result['single_food_item_data'] = $this->Admin_operation_model->single_food_item_info($food_item_id);
      
        $result['category_data'] = $this->Admin_operation_model->category_list();
        $result['subcategory_data'] = $this->Admin_operation_model->subcategory_info_by_category_id($result['single_food_item_data']->category_id);
        $this->load->view('besbd_admin/admin_product_item_update', $result);
    }

    // for edit food item (html)



    public function food_item_update_opt() {
//												echo '<pre>';
//																print_r($_POST);
//																exit();
//										

        $data = array();
        $data['item_title'] = trim($_POST['item_title']);
        $data['category_id'] = $_POST['category_id'];

        $item_id = $_POST['item_id'];

        if ($_POST['food_item_img_remove'] == 'remove_image') {
            $data['item_image_name'] = NULL;
        }




        if ($_POST['sub_category_id'] == '0') {

            $data['sub_category_id'] = NULL;
        } else {
            $data['sub_category_id'] = $_POST['sub_category_id'];
        }

    
         
     


        $data['view_page'] = $_POST['view_page'];
        $data['item_long_description'] = $_POST['item_long_description'];





        $data['item_description'] = trim($_POST['item_description']);
        $data['item_price'] = trim($_POST['item_price']);

        $data['item_order_type'] = 0;
        $data['user_id'] = $this->session->userdata('admin_id');
        $data['item_status'] = $_POST['item_status'];
        $error = 'No';



        if (strlen(@$_FILES['img_url_update']['name']) > 0) {


            $tmp = explode('.', $_FILES['img_url_update']["name"]);
            $ext = end($tmp);
            
            $name = time() . '_' . rand() . '.' . $ext;
            $config['upload_path'] = 'document/product_item_image';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_name'] = $name;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            $this->upload->do_upload('img_url_update');


            $data['item_image_name'] = $name;


            $single_food_item_data = $this->Admin_operation_model->single_food_item_info($item_id);



            $result = $this->Admin_operation_model->food_item_update($data, $item_id);
            if ($result) {
                if ($single_food_item_data->item_image_name != null) {
                    if (file_exists('document/product_item_image/' . $single_food_item_data->item_image_name)) {
                        unlink('document/product_item_image/' . $single_food_item_data->item_image_name);
                    } else {
                        $error = 'Yes';
                    }
                }
            }

            $tr_data = array('item_photo' => $name, 'error_msg' => @$error);
        } else {




            if ($_POST['food_item_img_remove'] == 'remove_image') {
                $single_food_item_data = $this->Admin_operation_model->single_food_item_info($item_id);
            }


            $result = $this->Admin_operation_model->food_item_update($data, $item_id);


            if ($result) {



                if (@$single_food_item_data->item_image_name != NULL) {
                    if (file_exists('document/product_item_image/' . $single_food_item_data->item_image_name)) {
                        unlink('document/product_item_image/' . $single_food_item_data->item_image_name);
                    } else {
                        $error = 'Yes';
                    }
                }
            }

            $tr_data = array('item_photo' => '', 'error_msg' => @$error);
        }

 redirect($_SERVER['HTTP_REFERER']);

       // echo json_encode($tr_data);
    }

    public function food_item_status_opt($food_item_id, $status) {
        $data = array();
        $data['user_id'] = $this->session->userdata('admin_id');
        $data['item_status'] = $status;


        $result = $this->Admin_operation_model->change_food_item_status($food_item_id, $data);
        return $result;
    }

    public function food_item_delete_opt($item_id) {
        $single_food_item_data = $this->Admin_operation_model->single_food_item_info($item_id);
        $result = $this->Admin_operation_model->food_item_delete($item_id);
        if ($result) {


            if ($single_food_item_data->item_image_name != NULL) {
                if (file_exists('document/product_item_image/' . $single_food_item_data->item_image_name)) {
                    unlink('document/product_item_image/' . $single_food_item_data->item_image_name);
                } else {
                    $error = 'ture';
                }
            }
             if ($single_food_item_data->product_file != NULL) {
                if (file_exists('document/product_file/' . $single_food_item_data->product_file)) {
                    unlink('document/product_file/' . $single_food_item_data->product_file);
                } else {
                    $error = 'ture';
                }
            }

            return $result;
        }
    }



    
    /*     * **************PArt Two**************** */

    public function admin_change_password() {

        $this->page['title'] = '';
        $this->page['subtitle'] = 'password';
        $this->page['user_name'] = $this->session->userdata('user_name');
        //$this->session->set_userdata('active_act','Password');//session for active tab at profile
        $user_id = $this->session->userdata('admin_id');
        /*         * *****password change******* */
        $info = $this->input->post();
        $msg = '<div id="msgs" class="message-warning">';

        if (@$info['old_password'] != '' && @$info['new_password'] != '' && $info['confirm_password'] != '') {
            $password_pattern = "/^[a-zA-Z0-9._-]{6,12}$/";
            if (!preg_match($password_pattern, $info['new_password'])) {

                $msg = '<div id="msgs" class="message-warning">';
                $msg .='Password length should be within 6 to 12 characters!<br/>';
                $error = TRUE;
            }
            if ($info['new_password'] != $info['confirm_password']) {


                $msg = '<div id="msgs" class="message-warning">';
                $msg .='Password mismatch !<br/>';
                $error = TRUE;
            }

            if (@$error !== TRUE) {
                $result = $this->Admin_operation_model->admin_change_password($this->input->post(), $user_id);
                if ($result == '2') {
                    $msg = '<div id="msgs" class="message-error">';
                    $msg .='Wrong Password provided.<br/>';
                    $user_info = '';
                }

                if ($result == '1') {
                    $msg = '<div id="msgs" class="message-success">';
                    $msg .='Password has beeen changed successfully.<br/>';
                    $user_info = '';
                }
            }
        } else {
            $msg = '<div id="msgs" class="message-warning">';
            $msg.='All fields are required.';
        }


        $msg.='</div>';

        if ($this->input->post()) {
            $this->session->set_userdata('admin_pass_error_msg', $msg);
        } elseif (@$result == '1') {
            $this->session->set_userdata('admin_pass_error_msg', $msg);
        }
        $page['maincontent'] = $this->load->view('besbd_admin/admin_password_change', $info, TRUE);
        $this->load->view('besbd_admin/admin_master', $page);
    }

    public function admin_profile() {


        $this->page['title'] = '';
        $this->page['subtitle'] = 'Profile';
        $this->page['username'] = $this->session->userdata('user_name');
        $user_id = $this->session->userdata('admin_id');
        $data['row'] = $this->Admin_operation_model->view_admin_info($user_id);








        $this->page['maincontent'] = $this->load->view('besbd_admin/admin_profile', $data, TRUE);
        $this->load->view('besbd_admin/admin_master', $this->page);
    }

    public function edit_admin_profile() {
        $this->page['title'] = '';
        $this->page['subtitle'] = 'Edit Profile';
        $this->page['username'] = $this->session->userdata('user_name');
        $user_id = $this->session->userdata('admin_id');
        $data['row'] = $this->Admin_operation_model->view_admin_info($user_id);
        $this->page['maincontent'] = $this->load->view('besbd_admin/admin_edit_admin_profile', $data, TRUE);
        $this->load->view('besbd_admin/admin_master', $this->page);
    }

    public function update_admin_profile() {
        //   echo 'onni';exit();    
        $data = array();

        $page['user_name'] = $this->session->userdata('user_name');


        $data['user_id'] = $this->input->post('user_id', true);
        $data['first_name'] = $this->input->post('first_name', true);
        $data['last_name'] = $this->input->post('last_name', true);
        $data['contact_number'] = $this->input->post('contact_number', true);
        $data['house'] = $this->input->post('house', true);
        $data['street'] = $this->input->post('street', true);
        $data['city'] = $this->input->post('city', true);
        $data['postal_code'] = $this->input->post('postal_code', true);


        $data['reg_day'] = $this->input->post('reg_day', true);
        $data['reg_month'] = $this->input->post('reg_month', true);
        $data['reg_year'] = $this->input->post('reg_year', true);

        // $check_date= (checkdate($reg_month,$reg_day,$reg_year));
        if ($data['reg_day'] != '' && $data['reg_month'] != '' && $data['reg_year'] != '') {

            $check_date = (checkdate($data['reg_month'], $data['reg_day'], $data['reg_year']));
            if ($check_date != 1) {
                $this->message->set('Invalid date format.', 'error', true);
                $error = TRUE;
            }

            $data['date_of_birth'] = $data['reg_day'] . '-' . $data['reg_month'] . '-' . $data['reg_year'];
        }


        $contact_pattern = "/^[a-zA-Z0-9._-]{6,12}$/";
        if (!preg_match($contact_pattern, $data['contact_number'])) {
            $this->message->set('Invalid contact number!', 'error', true);
            $error = TRUE;
        }
        if (@$error !== TRUE) {
            $result = $this->Admin_operation_model->update_admin_profile_data($data);
            if ($result == 0) {
                $this->message->set('Your information has been saved successfully.', 'success', true);

                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $this->message->set('Your information did not save successfully.', 'error', true);
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            //$this->message->set('All fields are required.', 'warning', true);
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
 
      public function logout() {


        $this->session->unset_userdata('username');
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('management_login');
        $this->session->unset_userdata('order_count');
        $this->session->unset_userdata('reservation_count');
        $this->session->unset_userdata('user_type');




        redirect('admin_access');
    }
  
  

}
