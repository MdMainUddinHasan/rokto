        <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
             Registration
              <small>(user)</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="#">Layout</a></li>
              <li class="active">Registration</li>
            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
              <div class="row">
                    <div class="col-lg-offset-3 col-lg-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Quick Registration</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="registration-form" method="post" enctype="multipart/form-data">
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
                      <label for="cl_name">Name</label>
                      <input type="text" value="<?php if(isset($frm_data['cl_name'])){  echo $frm_data['cl_name'];} ?>" class="form-control" id="cl_name" name="cl_name" placeholder="Enter Name" data-validation="required"

		 data-validation-error-msg="Please Enter Your Full Name">
                    </div>
                      
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" value="<?php if(isset($frm_data['email_address'])){  echo $frm_data['email_address'];} ?>" id="exampleInputEmail1" name="email_address" data-validation="email" placeholder="Enter email">
                    </div>
                          <div class="form-group">
                      <label for="contact_number">Contact Number</label>
                      <input type="text" value="<?php if(isset($frm_data['contact_number'])){  echo $frm_data['contact_number'];} ?>" class="form-control" id="contact_number" name="contact_number" placeholder="Contact Number" data-validation="number length" data-validation-length="5-14">
                    </div>
                                <div class="form-group">
                      <label for="blood_group">Blood Group</label>
                      <select id="blood_group" name="blood_group" class="form-control" data-validation="required">
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
                         <div class="form-group"  >
                      <label for="dob">Date Of Birth</label>
                      <input type="text" value="<?php if(isset($frm_data['dob'])){  echo $frm_data['dob'];} ?>" class="form-control datepicker" id="dob" data-validation="required" name="dob" placeholder="Date Of Birth">
                      
                    </div>
                                   <div class="form-group">
                      <label for="sex">Sex</label>
                      <select id="sex" name="sex" class="form-control" data-validation="required">
  <option value="">Select Sex</option>
  <option value="Male">Male</option>
  <option value="female">Female</option>
  
</select>
                    </div>
                      
      
                      <div class="form-group">
                      <label for="city_division">City/Division</label>
                      
                      <select id="city_division" name="city_division" class="form-control" data-validation="required">
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
                      
                          <div class="form-group">
                      <label for="location">Location/Area</label>
                      
                      <select id="location" name="location" class="form-control" data-validation="required" >
  <option value="">Select Location</option>
 
  
  <?php  foreach ($location as $value) {
      ?>
  
     
      <option class="<?php echo $value['city_division_id']; ?>" value="<?php echo $value['location_id']; ?>"><?php  echo $value['location_name']; ?></option>
      <?php
  }
  ?>
  
  
  
  
  
  
</select>
        
                    </div>
                      
                      
                      
                      
                      
                      
                  
                    <div class="form-group">
                      <label for="cl_picture">Profile Picture</label>
                      <input type="file" name="cl_picture" id="cl_picture">
                      <p style="color:red"> File must be less than 2 megabytes.</p>
                    
                    </div>
               
                      
                    <div class="checkbox">
                      <label>
                          <input data-validation="required" name="term_condition" data-validation-error-msg="You have to agree to our terms" type="checkbox" <?php if(isset($frm_data['term_condition'])){  echo 'Checked';} ?>>
    I agree to the <a href="..." target="_blank">terms of service</a>
                     
                      </label>
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