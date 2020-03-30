        <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
             Report
              <small>(user)</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="#">Layout</a></li>
              <li class="active">Report</li>
            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
              <div class="row">
                    <div class="col-lg-offset-3 col-lg-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Quick Report</h3>
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
                      <label for="appellor_name">Your Name</label>
                      <input type="hidden" value="<?php if(isset($client_id)){  echo $client_id;} ?>" class="form-control"  name="client_id" />

                      <input type="text" value="<?php if(isset($frm_data['appellor_name'])){  echo $frm_data['appellor_name'];} ?>" class="form-control" id="appellor_name" name="appellor_name" placeholder="Enter Name" data-validation="required"

		 data-validation-error-msg="Please Enter Your Full Name">
                    </div>
                      
                    <div class="form-group">
                      <label for="appellor_email_address">Your Email address</label>
                      <input type="email" class="form-control" value="<?php if(isset($frm_data['appellor_email_address'])){  echo $frm_data['appellor_email_address'];} ?>" id="appellor_email_address" name="appellor_email_address" data-validation="email" placeholder="Enter email">
                    </div>
                          <div class="form-group">
                      <label for="appellor_contact_number">Your Contact Number</label>
                      <input type="text" value="<?php if(isset($frm_data['appellor_contact_number'])){  echo $frm_data['appellor_contact_number'];} ?>" class="form-control" id="contact_number" name="appellor_contact_number" placeholder="Contact Number" data-validation="number length" data-validation-length="5-14">
                    </div>
                                <div class="form-group">
                      <label for="issues">Issues</label>
                      <select id="issues" name="issues" class="form-control" data-validation="required" onchange='get_other(this.value);'>
  <option value="">Select Issues</option>
  <?php if(isset($frm_data['issues'])){ echo'<option value="'.$frm_data['issues'].'" selected>'.$frm_data['issues'].'</option>';} ?>
  <option value="Mobile Number Is Wrong">Mobile Number Is Wrong</option>
  <option value="Wrong Location">Wrong Location</option>
  <option value="Wrong Blood Group">Wrong Blood Group</option>
  <option value="It's My Information and I want remove this">It's My Information and I want remove this</option>
 
  <option value="Others">Others</option>

</select>
                      
           
            
                      <input type="text" style="margin-top: 5px;display:none;" disabled="disabled" value="<?php if(isset($frm_data['others'])){  echo $frm_data['others'];} ?>" class="form-control" id="others" name="others" placeholder="Enter value" data-validation="required"

		 data-validation-error-msg="Please Enter Your Complaint">
            
            
            
            
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
      
 <script type="text/javascript">
      
         
         function get_other(val){

 if(val=='Others'){
    $('#others').css("display","block");
   $('#others').prop("disabled", false);
   }else{  
    $('#others').css("display","none");
$('#others').prop("disabled", true);
}
}
         
         
         
         
         
         
</script> 