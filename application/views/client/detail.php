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
                    <div class="col-xs-4">
                                  <div class="form-group">
                      <label for="city_division">City/Division</label>
                       
                      
                           <select id="city_division" name="city_division" class="form-control">
  <option value="">Select City/Division</option>
  
  <?php  foreach ($city_division as $value) {
      ?>
      echo $value['city_division_name'];
     
        <option value="<?php echo $value['city_division_id']; ?>"><?php  echo $value['city_division_name']; ?></option>
      <?php
  }
  ?>
  
  
  

  
  
  
</select>               
                      
                      
                      
                      
                      
                      
                    </div>
                    </div>
                    <div class="col-xs-4">
                      <div class="form-group">
                      <label for="location">Location/Area</label>
                      
    
                               <select id="location" name="location" class="form-control"  >
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
                <div id="search_data">
                      <div class="col-md-offset-3 col-md-6">
               <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="<?php if(isset($row['cl_picture'])){ echo base_url().'document/cl_picture/'.$row['cl_picture'];}?>">
               <h3 class="profile-username text-center"></h3>
              <p class="text-muted text-center"></p>
               <ul class="list-group list-group-unbordered">
              <li class="list-group-item" style="color: red;"><b>Blood Group</b> <a class="pull-right" style="color: red;"><?php if(isset($row['blood_group'])){ echo set_special_characters($row['blood_group'],'blood_group');}?></a> </li>
               <li class="list-group-item"><b>Age</b> <a class="pull-right"><?php if(isset($row['dob'])){ echo get_age_from_dob($row['dob']);}?></a></li>
               <li class="list-group-item"><b>Gender</b> <a class="pull-right"><?php if(isset($row['sex'])){ echo $row['sex'];}?></a></li>
               <li class="list-group-item"> <b>Location</b> <a class="pull-right"><?php if(isset($row['location'])){ echo get_location($row['location']).', '.  get_city_division($row['city_division']);}?></a> </li>
                <li class="list-group-item"> <b>Email</b> <a class="pull-right"><?php if(isset($row['email_address'])){ echo $row['email_address'];}?></a> </li>
                <li class="list-group-item"> <b>Contact</b> <a class="pull-right"><?php if(isset($row['contact_number'])){ echo $row['contact_number'];}?></a> </li>
                </ul>
       
                <div class="timeline-footer">
                    <?php if(isset($row['client_id'])){?>
                    <a href="<?php echo site_url('report').'/'.$row['client_id']?>" class="btn btn-primary btn-xs pull-right">Report</a>
<!--                            <a class="btn btn-danger btn-xs">Delete</a>-->
                   <?php
                    }
                   ?>
                
                </div>
              </div>
                   
               </div>
                 </div>
               
            </div>
                
            </div>
         
              
                
                         <div id="pagination">
             
                    
                        </div>
                    
             
         
                
            
        </div>
        
        
      </div><!-- /.content-wrapper -->
      
      
   




<script>
    var client_data_list = '<?php echo site_url("main/search_data"); ?>/<?php echo $this->uri->segment(3,0); ?>/?' + $("form#search_form").serialize();

    
    $(document).ready(function () {
 
   $("select").change(function(){
    client_data_list = '<?php echo site_url("main/search_data"); ?>/<?php echo $this->uri->segment(3,0); ?>/?' + $("form#search_form").serialize();
    client_data_list_data();

});
      
    });


	
function pagination_link(append) {
		 client_data_list = '<?php echo site_url("main/search_data"); ?>/'+append+'/?' + $("form#search_form").serialize();

   // client_data_list_data();
    }



 function client_data_list_data() {
     //   $('#client_data_list_table tbody').html('');
        $.get(client_data_list, function (r) {
            var ad = $.parseJSON(r);
			


		//	if( ad['pagination'].length > 0 ){
                           var pagi =' <div class="box-footer clearfix" style="border:none"><ul class="pagination pagination-sm no-margin pull-right">'+ad['pagination']+'</ul></div>'; 
                            
			$("#pagination").html(pagi);
                
                
		//	}
            var html = '';

            for (var i = 0; i < ad['rows'].length; i++) {
                
                html += '<div class="col-md-3">';
                html += '<div class="box box-primary">';
                html += '<div class="box-body box-profile">';
                if( ad['rows'][i].cl_picture==''){
                               html += '<img class="profile-user-img img-responsive img-circle profile-user-img_custom" src="<?php echo base_url(); ?>document/cl_picture/profile_ava.png" alt="'+ ad['rows'][i].cl_name + '">';     
                }else{
                html += '<img class="profile-user-img img-responsive img-circle profile-user-img_custom" src="<?php echo base_url(); ?>document/cl_picture/'+ ad['rows'][i].cl_picture + '" alt="'+ ad['rows'][i].cl_name + '">';
            }
    
                html += ' <h3 class="profile-username text-center">'+ ad['rows'][i].cl_name + '</h3>';
                html += '<p class="text-muted text-center"></p>';
                html += '<ul class="list-group list-group-unbordered">';
                html += '<li class="list-group-item" style="color: red;"><b>Blood Group</b> <a class="pull-right" style="color: red;">'+ ad['rows'][i].blood_group + '</a> </li>';
                html += '<li class="list-group-item"><b>Age</b> <a class="pull-right">'+ ad['rows'][i].age + '</a></li>';
                             html += '<li class="list-group-item"> <b>Location</b> <a class="pull-right">'+ ad['rows'][i].location_text + ', '+ ad['rows'][i].city_division_text + '</a> </li>';
                html += '</ul>';
                html += '<a href="<?php echo site_url('detail')?>/'+ ad['rows'][i].client_id + '" class="btn btn-primary btn-block"><b>Detail</b></a>';
                html += '</div>';
                html += '</div>';
                html += ' </div>';
                
		
            }

            $('#search_data').html(html);

			

        });

    }




    // edit items




    
  
</script>
