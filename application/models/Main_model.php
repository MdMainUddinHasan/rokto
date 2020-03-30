<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_model extends CI_Model {

    
 
    

    function save_update($data,$table_info) {
     
     if($table_info['table_pk_value']==''){
        $up_result = $this->db->insert($table_info['table'], $data);
        $client_id = $this->db->insert_id();
      //  return $slider_id;
     }else{
        $this->db->where($table_info['table_pk'], $table_info['table_pk_value']);
        $up_result = $this->db->update($table_info['table'], $data);   
     }
        if ($up_result) {
            return true;
        } else {
            return false;
        }
    }

 	public function row($select='*',$id=null,$conditions=array(),$table_info=array())
               
	{
		if(!empty($table_info['table']) AND !empty($select) AND is_array($conditions))
		{
			// inject id inside conditions to use it as the only array
			if(!isset($table_info['table_pk']) AND $id != null)
			{
				$conditions[$table_info['table_pk']] = $id;
			}

			$row = $this->db->where($conditions)->get($table_info['table'])->row_array();

			if(isset($row[$table_info['table_pk']]))
			{
				return $row;
			}else{
				return array();
			}

		}else{
			return array('error'=>'Unable to fetch row.');
		}
	}

        
        public function detailed_result($select='*',$conditions=array(),$limit=0,$offset=0,$table_info)
	{
		if(!empty($table_info['table']) AND !empty($select) AND is_array($conditions))
		{	
			if(isset($conditions['like'])){
				$this->db->like($conditions['like']);
			}
			if(isset($conditions['where'])){
				$this->db->where($conditions['where']);
			}
			if($limit > 0){
				$this->db->limit($limit,$offset);
			}
                        
                       
                        
                        if($table_info['table']=='city_division' || $table_info['table']=='location'){
                             $this->db->order_by($table_info['table_pk'],'asc');
                        }else{
                           $this->db->order_by($table_info['table_pk'],'desc');  
                        }
                        
                        
                        
			return $this->db->get($table_info['table'])->result_array();
		}else{
			return array('error'=>'Unable to fetch result.');
		}
	}
        
        
     public function  detailed_report_result($select='*',$conditions=array(),$limit=0,$offset=0,$table_info)
	{
		if(!empty($table_info['table']) AND !empty($select) AND is_array($conditions))
		{	
                    
                    $this->db->select('*, count(client_id) as total_report');
                    
			if(isset($conditions['like'])){
				$this->db->like($conditions['like']);
			}
                        if(isset($conditions['date_range'])){
			
                  $this->db->where('create_date >=', $conditions['date_range']['start_date']);
        $this->db->where('create_date <=', $conditions['date_range']['end_date']); 
                                
                                
			}
                        
     
                        
                        
                        
                        
                        
                        
                        
                        
			if(isset($conditions['where'])){
				$this->db->where($conditions['where']);
			}
			if($limit > 0){
				$this->db->limit($limit,$offset);
			}
                        
                        $this->db->group_by('client_id');
                        $this->db->order_by('report_id','desc');
			return $this->db->get($table_info['table'])->result_array();
		}else{
			return array('error'=>'Unable to fetch result.');
		}
	}
        
        
        
 	public function result($select='*',$id=null,$conditions=array(),$table_info=array())
               
	{
		if(!empty($table_info['table']) AND !empty($select) AND is_array($conditions))
		{
			// inject id inside conditions to use it as the only array
			if(!isset($table_info['table_pk']) AND $id != null)
			{
				$conditions[$table_info['table_pk']] = $id;
			}

			$row = $this->db->where($conditions)->get($table_info['table'])->result_array();
                      
			return $row;
			

		}else{
			return array('error'=>'Unable to fetch row.');
		}
	}

   public function admin_login($data) {

        $username = $data['email_address'];

        //return $username;
        //exit();
        $password = md5($data['password']);
    

        // return $password;exit();
        $qry = "SELECT * FROM tbl_user WHERE (email_address='" . $username . "' OR user_name='" . $username . "' )AND password='" . $password . "' AND status=1";
        $query = $this->db->query($qry);
        $num = $query->num_rows();
        //return $num;exit();

        $get_data = $query->result_object();
        
  
        if ($num > 0) {
         

            $usr_data = array();
            $usr_data['admin_id'] = $get_data[0]->user_id;
            $usr_data['username'] = $get_data[0]->user_name;
            $usr_data['name'] = $get_data[0]->name;
            $usr_data['user_type'] = $get_data[0]->user_type;

            $usr_data['management_login'] = constant("project_admin_login");

            $this->session->set_userdata($usr_data);






            return 1;
        } else {

            return 0;
        }
    }
  
    
    public function delete_client($id){
  $this -> db -> where('client_id', $id);
  $this -> db -> delete('client');
  return $this->db->affected_rows();;
}
}
