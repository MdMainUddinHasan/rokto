        <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
          <section class="">
               <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">City/Division</h3>
                </div>
                <div class="box-body">
                  
                  <div class="row">
                      
                           <form role="form" id="registration-form" method="post" enctype="multipart/form-data">
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
                        
                                     <div class="form-group">
                      <label for="city_division_name">City/Division</label>
                     <input type="text" value="" class="form-control" id="city_division_name" name="city_division_name" placeholder="City/Division Name" data-validation="required"

		 data-validation-error-msg="Please Enter Your City/Division Name">
                 
                    </div>
                        
                 
                    </div>
                    <div class="col-lg-2">
                        
                           <div class="form-group">
                      
                          
                               <button type="submit" class="btn btn-primary" style="margin-top: 26px">Submit</button>
                           </div>
                    </div>
                              </form>
                    </div>
                
                    <div class="row">
                          <div class="col-lg-offset-2 col-lg-8"> 
                              
                                   <div class="box">
           
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>City/Division</th>
                      <th>Action</th>
                   
                    </tr>
                    <?php
                    $i=1;
                   foreach ($city_division as $value) {
                       
                   
                    ?>
                    
                    
                    <tr>
                      <td><?php echo $i ?></td>
                    
                      <td><a data-title="Edit" id="" data-name="city_division_name" data-url="<?php echo site_url("admin/city_division_inline"); ?>" data-pk="<?php echo $value['city_division_id']; ?>" id="" class="editable" href="javascript:;"><?php echo $value['city_division_name']; ?></a>
                
                      </td>
                      <td>
                        <a data-title="Edit" data-type="select" data-source="[{'value': 1, 'text': 'Active'}, {'value': 2, 'text': 'Inactive'}]" data-name="status" data-url="<?php echo site_url("admin/city_division_inline"); ?>" data-pk="<?php echo $value['city_division_id']; ?>" id="" class="editable" href="javascript:;"><?php echo $value['status']; ?></a>  
                          
                        </td>
                    </tr>
                     <?php
                     $i++;
                   }
                       
                   
                    ?>
                
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                
                </div>
              </div><!-- /.box -->
                          </div>
                        
                    </div>
                      
                      
                      
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
          </section>

          <!-- Main content -->
      
     
        </div><!-- /.container -->
        
   
        
        
      </div><!-- /.content-wrapper -->
      
   
      
      
   




