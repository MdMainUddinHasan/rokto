        <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
          <section class="">
               <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title"></h3>
                </div>
                <div class="box-body">
                  <div class="row">
                      <form id="search_form">
                    <div class="col-xs-3">
                        
                                     <div class="form-group">
                      <label for="blood_group">Blood Group</label>
                      <select id="blood_group" name="blood_group" onchange="redraw_search()" class="form-control" >
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
                    <div class="col-xs-4">
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
                    </div>
                    </div>
                    <div class="col-xs-4">
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
                          </form>
                      
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
          </section>

          <!-- Main content -->
      
     
        </div><!-- /.container -->
        
        <div class="container">
            <div class="row">
                <div id="search_data" >
               
            </div>
                
            </div>
             <div class="box-footer clearfix">
              
                
                         <div id="pagination">
             
                    
                        </div>
                    
             
         
                </div>
            
        </div>
        
        
      </div><!-- /.content-wrapper -->
      
      
   




<script>
    var client_data_list = '<?php echo site_url("main/search_data"); ?>/<?php echo $this->uri->segment(3,0); ?>/?' + $("form#search_form").serialize();

    
    $(document).ready(function () {
        client_data_list_data();
    });

   $("select").change(function(){
    client_data_list = '<?php echo site_url("main/search_data"); ?>/<?php echo $this->uri->segment(3,0); ?>/?' + $("form#search_form").serialize();
    client_data_list_data();

});
    function redraw_search() {
    client_data_list = '<?php echo site_url("main/search_data"); ?>/<?php echo $this->uri->segment(3,0); ?>/?' + $("form#search_form").serialize();
    client_data_list_data();
		
    }
	
function pagination_link(append) {
		 client_data_list = '<?php echo site_url("main/search_data"); ?>/'+append+'/?' + $("form#search_form").serialize();

    client_data_list_data();
    }



 function client_data_list_data() {
     //   $('#client_data_list_table tbody').html('');
        $.get(client_data_list, function (r) {
            var ad = $.parseJSON(r);
			


		
                      var pagi =' <div class="box-footer clearfix"style="border:none"><ul class="pagination pagination-sm no-margin pull-right">'+ad['pagination']+'</ul></div>';   
			$("#pagination").html(pagi);
                
                
		//	}
            var html = '';

            for (var i = 0; i < ad['rows'].length; i++) {
                
                html += '<div class="col-md-3 col-height" >';
                html += '<div class="box box-primary" style="min-height:375px;">';
                html += '<div class="box-body box-profile">';
                if( ad['rows'][i].cl_picture==''){
                               html += '<img class="profile-user-img img-responsive img-circle profile-user-img_custom" src="<?php echo base_url(); ?>document/cl_picture/profile_ava.png" alt="'+ ad['rows'][i].cl_name + '">';     
                }else{
                html += '<img class="profile-user-img img-responsive img-circle profile-user-img_custom" src="<?php echo base_url(); ?>document/cl_picture/'+ ad['rows'][i].cl_picture + '" alt="'+ ad['rows'][i].cl_name + '">';
            }
                html += '<div style="min-height:70px"><h3 class="profile-username text-center">'+ ad['rows'][i].cl_name + '</h3></div>';
                html += '<p class="text-muted text-center"></p>';
                html += '<ul class="list-group list-group-unbordered">';
                html += '<li class="list-group-item" style="color: red;"><b>Blood Group</b> <a class="pull-right" style="color: red;">'+ ad['rows'][i].blood_group + '</a> </li>';
                html += '<li class="list-group-item"><b>Age</b> <a class="pull-right">'+ ad['rows'][i].age + '</a></li>';
                html += '<li class="list-group-item"> <b>Location</b> <a class="pull-right">'+ ad['rows'][i].location_text + ', '+ ad['rows'][i].city_division_text + '</a> </li>';
                html += '</ul>';
                html += '<a href="<?php echo site_url('detail')?>/'+ ad['rows'][i].client_id + '" target="_blank" class="btn btn-primary btn-block"><b>Detail</b></a>';
                html += '</div>';
                html += '</div>';
                html += ' </div>';
                
		
            }

            $('#search_data').html(html);

			

        });

    }




    // edit items




    
  
</script>
