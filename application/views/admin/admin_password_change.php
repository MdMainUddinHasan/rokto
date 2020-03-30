        <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
             Change Password
              <small>(Admin)</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            
              <li class="active">Change Password</li>
            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
              <div class="row">
                    <div class="col-lg-offset-3 col-lg-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Change Password</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="password-form" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                        <div class="form-group">
                     
                            
                            
                            
                            
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
                         
                       <div class="form-group">
                      <label for="cl_name">Current Password</label>
                      <input type="password" value="" class="form-control"  data-validation="length" data-validation-length="6-10" id="password" name="password" placeholder="Enter Current Password" >
                    </div>
                                      <div class="form-group">
                      <label for="cl_name">New Password</label>
                      <input type="password" value="" class="form-control"  data-validation="length" data-validation-length="6-10" name="pass_confirmation" placeholder="Enter Current Password" />
                    </div>
                                      <div class="form-group">
                      <label for="cl_name">Retype New Password</label>
                      <input type="password" name="pass" data-validation="confirmation" class="form-control" placeholder="Retype Your New Password"/>
                    </div>
               
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div><!-- /.box -->

              


            </div>
                  
              </div>
          </section><!-- /.content -->
     
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      
       <script>
    $(document).ready(function(){
        
    <?php if(isset($frm_data['blood_group'])){
     ?>  
         var blood_group='<?php echo $frm_data['blood_group'] ?>';      
         $('select[name=blood_group] > option[value=' + blood_group + ']').prop('selected', true);

        
     <?php   
    } 
    if(isset($frm_data['sex'])){
     ?>  
         var sex='<?php echo $frm_data['sex'] ?>';      
         $('select[name=sex] > option[value=' + sex + ']').prop('selected', true);

        
     <?php   
    } 
    if(isset($frm_data['city_division'])){
     ?>  
         var city_division='<?php echo $frm_data['city_division'] ?>';      
         $('select[name=city_division] > option[value=' + city_division + ']').prop('selected', true);

        
     <?php   
    }
             if(isset($frm_data['location'])){
     ?>  
         var location='<?php echo $frm_data['location'] ?>';  
         
    
         $('select[name=location]').prop( "disabled", false );
         $('select[name=location] > option[value=' + location + ']').prop('selected', true);

        
     <?php   
    } ?>
            
            
            
            
            
            
            
            
            
            
            
            
            
            

});
    </script>