        <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
          <section class="">
               <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Report</h3>
                </div>
                <div class="box-body">
                  <div class="row">
                      <form id="search_form" action="<?php echo site_url("admin/search_report"); ?>" method="get">
                           <div class="col-xs-6">
                                      <div class="form-group">
                    <label>Date range:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                        <input type="text" value="<?php if(isset($frm_data['date_range'])){ echo $frm_data['date_range']; } ?>" name="date_range" class="form-control pull-right" id="reservation">
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
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
		<tr><th style="width: 10px">#</th> <th>Name</th><th>Total Report</th><th>Date</th> <th>Status</th><th>Action</th></tr>
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
    var report_data_list = '<?php echo site_url("admin/search_report"); ?>/<?php echo $this->uri->segment(3,0); ?>/?' + $("form#search_form").serialize();

    
    $(document).ready(function () {
        report_data_list_data();
    });

   $("selectd").change(function(){
    report_data_list = '<?php echo site_url("admin/search_report"); ?>/<?php echo $this->uri->segment(3,0); ?>/?' + $("form#search_form").serialize();
    report_data_list_data();

});
    function redraw_search() {
    report_data_list = '<?php echo site_url("admin/search_report"); ?>/<?php echo $this->uri->segment(3,0); ?>/?' + $("form#search_form").serialize();
    report_data_list_data();
		
    }
	
function pagination_link(append) {
	 report_data_list = '<?php echo site_url("admin/search_report"); ?>/'+append+'/?' + $("form#search_form").serialize();

    report_data_list_data();
    }



 function report_data_list_data() {
      var set_data_url = '<?php echo site_url("admin/client_inline"); ?>';
   $('#location_data tbody').html('');
             $.get(report_data_list, function (r) {
            var ad = $.parseJSON(r);
			
      var pagi =' <div class="box-footer clearfix"style="border:none"><ul class="pagination pagination-sm no-margin pull-right">'+ad['pagination']+'</ul></div>';   
	$("#pagination").html(pagi);
                
	$('#location_data tbody').html('');
        var html = '';
        for (var i =0; i < ad['rows'].length; i++) {
				html += '<tr >';
				html += '<td >'+(i+1)+'</td>';
	
				html += '<td><a href="<?php echo site_url('cl_detail') ?>/'+ ad['rows'][i].client_id + '">' + ad['rows'][i].cl_name + '</a></td>';
				html += '<td>' + ad['rows'][i].total_report+'</td>';
				html += '<td>' + ad['rows'][i].create_date+'</td>';
                                
                                
                                
				
				html += '<td><a data-title="Edit" data-type="select" data-source="[\'Pending\',\'Approve\',\'Reject\']" data-name="status" data-url="' + set_data_url + '" data-pk="' + ad['rows'][i].client_id+ '" id="" class="editable" href="javascript:;">' + ad['rows'][i].cl_status + '</a></td>';
				html += '<td><a data-toggle="collapse" data-target="#'+ad['rows'][i].report_id+' " class="accordion-toggle btn btn-success btn-sm"><i class="fa fa-eye"></i> View </a>  <a class="btn btn-primary btn-sm" href="<?php echo site_url('cl_info_edit') ?>/'+ ad['rows'][i].client_id + '"> <i class="fa fa-edit"></i> Edit</a></td>';
    html += '</tr>';
                          html+= '<tr><td colspan="14" class="hiddenRow"><div  class="accordian-body collapse accordian_view" id="'+ad['rows'][i].report_id+'">';
					         
                html+= '<table class="table table-bordered" id="">';
                html+= '<thead>';
                
                 
                    
		 html+= '<tr><th style="width: 10px">#</th> <th>Name</th><th>Email</th><th>Contact</th> <th>Date</th><th>Issue</th></tr>';
		    html+= '</thead></tbody>';
					
                
                
                     for (var j =0; j < ad['rows'][i]['report_list'].length; j++) {

                html+= '<tr><td>'+(j+1)+'</td><td>'+ad['rows'][i]['report_list'][j].appellor_name+'</td><td>'+ad['rows'][i]['report_list'][j].appellor_email_address+'</td><td>'+ad['rows'][i]['report_list'][j].appellor_contact_number+'</td><td>'+ad['rows'][i]['report_list'][j].create_date+'</td><td>'+ad['rows'][i]['report_list'][j].issues+'</td></tr>';
            }

                html+='</tbody></table>';
				
				
				html+= '</div></td></tr">';	      
                                     

			}  
        
$('#location_data tbody').append(html);
          
 $('a.editable').editable();
			

        });

    }




    // edit items




    
  
</script>
