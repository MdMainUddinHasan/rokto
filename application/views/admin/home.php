        <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
          <section class="">
               <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Data list</h3>
                </div>
                <div class="box-body">
                  <div class="row">
                      <form id="search_form">
                           <div class="col-xs-2">
                                    <div class="form-group">
                                    <label for="cl_name">Name</label>
                                    <input type="text" value="<?php if(isset($frm_data['cl_name'])){ echo $frm_data['cl_name']; } ?>" class="form-control" id="cl_name" name="cl_name" placeholder="Name" >
                                    </div>
                             </div>
                          
                          
                    <div class="col-xs-2">
                        
                                     <div class="form-group">
                      <label for="blood_group">Blood Group</label>
                      <select id="blood_group" name="blood_group"  class="form-control" >
  <option value="">Select Blood Group</option>
  

  <option value="Ap">A+</option>
  <option value="An">A-</option>
  <option value="Bp">B+</option>
  <option value="Bn">B-</option>
  <option value="ABp">AB+</option>
  <option value="ABn">AB-</option>
  <option value="Op">O+</option>
  <option value="On">O-</option>
</select>
                    </div>
                        
                 
                    </div>
                    <div class="col-xs-2">
                                  <div class="form-group">
                      <label for="city_division">City/Division</label>
                            <select id="city_division" name="city_division" class="form-control" >
  <option value="">Select City/Division</option>
  

       
  <optgroup label="City">
        <?php  foreach ($city_division as $value) {
      if($value['city_division_type']=='City') {?>
          <option value="<?php echo $value['city_division_id']; ?>"><?php  echo $value['city_division_name']; ?></option>
        <?php  }  } ?>
          
  </optgroup>
    <optgroup label="Division">
        <?php  foreach ($city_division as $value) {
      if($value['city_division_type']=='Division') {?>
          <option value="<?php echo $value['city_division_id']; ?>"><?php  echo $value['city_division_name']; ?></option>
        <?php  }  } ?>
          
  </optgroup>
   
  
  

  
  
  
</select>
</select>
                    </div>
                    </div>
                    <div class="col-xs-2">
                      <div class="form-group">
                      <label for="location">Location/Area</label>
                      
                        <select id="location" name="location" class="form-control" >
  <option value="">Select Location</option>
 
  
  <?php  foreach ($location as $value) {
      ?>
      echo $value['city_division_name'];
     
      <option class="<?php echo $value['city_division_id']; ?>" value="<?php echo $value['location_id']; ?>"><?php  echo $value['location_name']; ?></option>
      <?php
  }
  ?>
  
  
  
  
  
  
</select>
        
                    </div>
                    </div>
                          
                              <div class="col-xs-2">
                        
                                     <div class="form-group">
                      <label for="status">Status</label>
                      <select id="status" name="status"  class="form-control" >
  <option value="">Select Status</option>


  <option value="Pending">Pending</option>
  <option value="Approve">Approve</option>
  <option value="Reject">Reject</option>
  
</select>
                    </div>
                        
                 
                    </div> 
                            <div class="col-xs-2">
                           <div class="form-group">
                               <button type="button" onclick="redraw_search()" class="btn btn-primary" style="margin-top: 26px">Search</button>
                           </div>
                           </div> 
                          
                          
                          
                          
                          
                          
                          
                          </form>
                      
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
          </section>

          <!-- Main content -->
      
     
        </div><!-- /.container -->
        
        <div class="container">
            <div class="row">
                       <div class=" col-lg-12"> 
                              
                                   <div class="box">
           
                <div class="box-body">
                  <table class="table table-bordered" id="location_data">
                    <thead>
		<tr><th style="width: 10px">#</th><th>Image</th> <th>Name</th><th>Location</th> <th>Blood Group</th> <th>Status</th><th>Action</th></tr>
		</thead>
                <tbody></tbody>
					
              
                
                  </table>
                </div><!-- /.box-body -->
       
                  
              
                
                         <div id="pagination">
                            
                    
                        </div>
                    
             
         
              </div><!-- /.box -->
                          </div>
                
            </div>
             
            
        </div>
        
        
      </div><!-- /.content-wrapper -->
      
      
   




<script>
    var client_data_list = '<?php echo site_url("admin/search_data"); ?>/<?php echo $this->uri->segment(3,0); ?>/?' + $("form#search_form").serialize();

    
    $(document).ready(function () {
        client_data_list_data();
    });

   $("selectd").change(function(){
    client_data_list = '<?php echo site_url("admin/search_data"); ?>/<?php echo $this->uri->segment(3,0); ?>/?' + $("form#search_form").serialize();
    client_data_list_data();

});
    function redraw_search() {
    client_data_list = '<?php echo site_url("admin/search_data"); ?>/<?php echo $this->uri->segment(3,0); ?>/?' + $("form#search_form").serialize();
    client_data_list_data();
		
    }
	
function pagination_link(append) {
	 client_data_list = '<?php echo site_url("admin/search_data"); ?>/'+append+'/?' + $("form#search_form").serialize();

    client_data_list_data();
    }



 function client_data_list_data() {
     var set_data_url = '<?php echo site_url("admin/client_inline"); ?>';
   $('#location_data tbody').html('');
             $.get(client_data_list, function (r) {
            var ad = $.parseJSON(r);
			
      var pagi =' <div class="box-footer clearfix"style="border:none"><ul class="pagination pagination-sm no-margin pull-right">'+ad['pagination']+'</ul></div>';   
	$("#pagination").html(pagi);
                
	$('#location_data tbody').html('');
        var html = '';
        for (var i =0; i < ad['rows'].length; i++) {
				html += '<tr >';
				html += '<td >'+(i+1)+'</td>';
				 html += '<td>';
                                      if( ad['rows'][i].cl_picture   == ''){ 
                   html += '<img class="tb_list_img" src="<?php echo base_url(); ?>document/cl_picture/profile_ava.png" alt="">';
                      }else{ 
                      html += '<img class="tb_list_img" src="<?php echo base_url(); ?>document/cl_picture/'+ad['rows'][i].cl_picture +'" alt="">';
                
              
                } 
                        
                       html += '<a class="" style="position: relative;" href="<?php echo site_url('cl_pic_delete') ?>/'+ ad['rows'][i].client_id + '"><i class="fa fa-close"></i></a>';           
                   html += '</td>';             
                                
                                
                                
	
				html += '<td><a href="<?php echo site_url('cl_detail') ?>/'+ ad['rows'][i].client_id + '">' + ad['rows'][i].cl_name + '</a></td>';
				html += '<td><a href="javascript:;">' + ad['rows'][i].location_text + ' ,'+ad['rows'][i].city_division_text+'</a></td>';
				html += '<td>' + ad['rows'][i].blood_group + '</td>';
				html += '<td><a data-title="Edit" data-type="select" data-source="[\'Pending\',\'Approve\',\'Reject\']" data-name="status" data-url="' + set_data_url + '" data-pk="' + ad['rows'][i].client_id+ '" id="" class="editable" href="javascript:;">' + ad['rows'][i].status + '</a></td>';
				html += '<td><a class="btn btn-danger btn-sm" onclick="cl_delete('+ ad['rows'][i].client_id + ')" href="javascript:;"><i class="fa fa-close"></i> Delete</a> <a class="btn btn-primary btn-sm" href="<?php echo site_url('cl_info_edit') ?>/'+ ad['rows'][i].client_id + '"><i class="fa fa-edit"></i> Edit</a></td>';
    html += '</tr>';
                                
                                     

			}  
        
$('#location_data tbody').append(html);
          
 $('a.editable').editable();
			

        });

    }




    // edit items


   function cl_delete(id) {

        var posturl = '<?php echo site_url("admin/delete_client"); ?>';
        var postdata = 'client_id=' + id ;
  

        $.post(posturl, postdata, function (r) {
            
            var jd = $.parseJSON(r);
      
            if(jd==1){
                client_data_list_data();
            }
          
       

        });


    }

    
  
</script>
