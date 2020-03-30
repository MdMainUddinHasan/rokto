<?php

if(!function_exists('get_age_from_dob'))
{
	function get_age_from_dob($dob="")
	{
		if(strlen($dob) > 0)
		{
			$current_year 	= date("Y");
			$dob_year		= explode("/",$dob);
                      
                        if(count($dob_year)>1){
			$year= $dob_year[2];
			if($year>0){
			return $current_year - $year;
			}else{
			return '-';
			}
                        }else{
                           return '-';
 
                        }
                        
		}else{
			return 'n/a';
		}

	}
}








if(!function_exists('set_mysql_date'))
{
	function set_mysql_date($date="")
	{
		$d = explode("/",$date);
		if(count($d) == 3){
			return $d[2].'-'.$d[1].'-'.$d[0];
			//$timestamp = strtotime($date);
			//return date("Y-m-d",$timestamp);
		}else{
			return '';
		}
	}
}

if(!function_exists('set_human_date'))
{
	function set_human_date($date="")
	{
		$d = explode("-",$date);
		if(count($d) == 3){
			if($d[0]>0){
			//return $d[2].'/'.$d[1].'/'.$d[0];
			$timestamp = strtotime($date);
			return date("d/m/Y",$timestamp);
			}else{
				return '';
			}
		}else{
			return '';
		}
		//return date("d-m-Y",strtotime($date));
	}
}

if(!function_exists('set_human_time'))
{
	function set_human_time($time="")
	{
		return date("h:i A",strtotime($time));
		//return date("d-m-Y",strtotime($date));
	}
}

if(!function_exists('set_mysql_time'))
{
	function set_mysql_time($time="")
	{
		return date("H:i:s",strtotime($time));
		//return date("d-m-Y",strtotime($date));
	}
}



if(!function_exists('set_special_characters'))
{
	function set_special_characters($string='' ,$type='')
	{
		if($type=='blood_group'){
		$last_characters=substr($string, -1);
		if($last_characters=='p'){
			$string_with_special_characters = substr($string, 0, -1).'+';
		}else{
			$string_with_special_characters = substr($string, 0, -1).'-';
		}
		}
	
		return $string_with_special_characters;
	}
}





if(!function_exists('get_city_division'))
	{
		function get_city_division($id=0)
		{
			if($id > 0)
			{
				$ci=&get_instance();
				$row = $ci->db->where('city_division_id',$id)->get('city_division')->row_array();

				if(isset($row['city_division_name']))
				{
					return $row['city_division_name'];
				}else{
					return 'Untitled';
				}
			}else{
				return 'Untitled';
			}
		}
	}  
	
if(!function_exists('get_location'))
	{
		function get_location($id=0)
		{
			if($id > 0)
			{
				$ci=&get_instance();
				$row = $ci->db->where('location_id',$id)->get('location')->row_array();

				if(isset($row['location_id']))
				{
					return $row['location_name'];
				}else{
					return 'Untitled';
				}
			}else{
				return 'Untitled';
			}
		}
	} 

                             
     	if(!function_exists('reservation_satage_name'))
	{
		function reservation_satage_name($id=0)
		{
			if($id > 0)
			{
				$ci=&get_instance();
				$row = $ci->db->where('id',$id)->get('reservation_stages')->row_array();

				if(isset($row['reservation_stages_name']))
				{
					return $row['reservation_stages_name'];
				}else{
					return 'Untitled';
				}
			}else{
				return 'Untitled';
			}
		}
	}  
	
	
	
	