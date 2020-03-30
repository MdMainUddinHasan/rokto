        <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
          <section class="">
               <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Area/Location</h3>
                </div>
                <div class="box-body">
                  
                <div class="row">
                      
                        <form role="form" id="location_insert" method="post">
                             
                            <div class="row">
                               <div class="col-lg-offset-2 col-lg-8">
                                       <?php
                       
                               if(isset($feedback)&&count($feedback)>0){
                               
                              ?>
                            
                                <div class="alert <?php echo $feedback['alert_type']; ?> alert-dismissable">
                                <?php echo $feedback['message']; ?>
                                 </div>
                                        <?php        
                                       }  
                                     ?>  
                               </div>
                             </div>
                            
                            <div class="col-lg-offset-2  col-lg-2">
                                
                              
                                <div class="form-group">
                                 <label for="city_division">City/Division</label>
                                <select id="city_division_id" name="city_division_id" class="form-control" data-validation="required" data-validation-error-msg="Please Select City/Division ">
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
                             <div class="col-lg-4">
                           
                        
                                    <div class="form-group">
                                     <label for="city_division_name">Area/Location</label>
                                       <input type="text" value="" class="form-control" id="location_name" name="location_name" placeholder="Area/Location Name" data-validation="required" data-validation-error-msg="Please Area/location Name">
                 
                                     </div>

                            </div>
                             <div class="col-lg-2">
                        
                           <div class="form-group">
                               <button type="submit" class="btn btn-primary" style="margin-top: 26px">Add New Location</button>
                           </div>
                             </div>
                        </form>
                 </div>
                    
               <div class="row">
                        <form role="form" id="search_form" method="" >
                              <div class="col-lg-offset-2  col-lg-2">
                                    <div class="form-group">
                                        <label for="city_division">City/Division</label>
                                    <select id="city_division" name="city_division_id" class="form-control" >
                                    <option value="">Select City/Division</option>
                                    <?php if(isset($frm_data['city_division_id'])&&$frm_data['city_division_id']>0){ echo'<option value="'.$frm_data['city_division_id'].'" selected>'.get_city_division($frm_data['city_division_id']).'</option>';} ?>
                                    
  
                                          
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
                                    <label for="location">Area/Location</label>
                                    <input type="text" value="<?php if(isset($frm_data['location'])){ echo $frm_data['location']; } ?>" class="form-control" id="location" name="location" placeholder="Area/Location Name" >
                                    </div>
                             </div>
                           <div class="col-xs-4">
                           <div class="form-group">
                               <button type="button" onclick="redraw_search()" class="btn btn-primary" style="margin-top: 26px">Search</button>
                           </div>
                           </div> 
                          
                          </form> 
                 
                </div>
                   
                    
                
                    <div class="row">
                          <div class="col-lg-offset-2 col-lg-8"> 
                              
                                   <div class="box">
           
                <div class="box-body">
                  <table class="table table-bordered" id="location_data">
                    <thead>
		<tr><th style="width: 10px">#</th> <th>Area/Location</th> <th>City/Division</th> <th>Action</th></tr>
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
                </div><!-- /.box-body -->
                
                      
                
            
          </section>

          <!-- Main content -->
      
     
        </div><!-- /.container -->
        
        
        
   
        
        
      </div><!-- /.content-wrapper -->
      
   
      
      <script>
          
             
          
  
          
          
          
          
    var location_data_list = '<?php echo site_url("admin/search_location"); ?>/<?php echo $this->uri->segment(3,0); ?>/?' + $("form#search_form").serialize();

    
    $(document).ready(function () {
          $('a.editable').editable();
        location_data_list_data();
    });

   $("select").change(function(){
    location_data_list = '<?php echo site_url("admin/search_location"); ?>/<?php echo $this->uri->segment(3,0); ?>/?' + $("form#search_form").serialize();
    location_data_list_data();

});
    function redraw_search() {
    location_data_list = '<?php echo site_url("admin/search_location"); ?>/<?php echo $this->uri->segment(3,0); ?>/?' + $("form#search_form").serialize();
    location_data_list_data();
		
    }
	
function pagination_link(append) {
		 location_data_list = '<?php echo site_url("admin/search_location"); ?>/'+append+'/?' + $("form#search_form").serialize();

    location_data_list_data();
    }



 function location_data_list_data() {
   
	
	
var set_data_url = '<?php echo site_url("admin/location_inline"); ?>';
       $('#location_data tbody').html('');
        $.get(location_data_list, function (r) {
            var ad = $.parseJSON(r);
			
      var pagi =' <div class="box-footer clearfix"style="border:none"><ul class="pagination pagination-sm no-margin pull-right">'+ad['pagination']+'</ul></div>';   
	$("#pagination").html(pagi);
                
	$('#location_data tbody').html('');
        var html = '';
        for (var i =0; i < ad['rows'].length; i++) {
				html += '<tr >';
				html += '<td >'+(i+1)+'</td>';
	
				html += '<td><a data-title="Edit" id="" data-name="location_name" data-url="' + set_data_url + '" data-pk="' +  ad['rows'][i].location_id  + '"  class="editable" href="javascript:;">' + ad['rows'][i].location_name + '</a></td>';
				html += '<td>' + ad['rows'][i].city_division_text + '</td>';
				html += '<td><a data-title="Edit" data-type="select" data-source="[\'Active\',\'Inactive\']" data-name="status" data-url="' + set_data_url + '" data-pk="' + ad['rows'][i].location_id+ '" id="" class="editable" href="javascript:;">' + ad['rows'][i].status + '</a></td>';
				html += '</tr>';

			}
        
$('#location_data tbody').append(html);
          
 $('a.editable').editable();
			

        });

    }




    // edit items




    
  
</script>

   




