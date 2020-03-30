<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Blood | </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   
      <!-- Datetime -->
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/own/css/bootstrap-datetimepicker.min.css">
   
    
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/own/css/own_style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    
      <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    
    
  </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">

  	<!--header -->
                <?php if(isset($header)) echo $header; ?>
                <!--/header-->
                
		<!--navigation -->
                <?php if(isset($navigation)) echo $navigation; ?>
                <!--/navigation-->
			
		
             <!--Main content -->
	
                  <?php if(isset($content)) echo $content; ?>
             <!--/Main content -->
             
             <!--Footer -->
		<?php if(isset($footer)) echo $footer; ?>
	<!--/Footer -->

      
    </div><!-- ./wrapper -->

 
  
      <script src="<?php echo base_url(); ?>assets/own/js/moment.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.43/jquery.form-validator.min.js"></script>
    
        <!-- InputMask -->
    <script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    
    
    
    
    <!-- SlimScroll -->
    <script src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
    
        <!-- date-range-picker -->
  
    <script src="<?php echo base_url(); ?>assets/own/js/bootstrap-datetimepicker.min.js"></script>

    
    <!-- Own for chained dropdown purposes -->
        <script src="<?php echo base_url(); ?>assets/own/js/jquery.chained.min.js"></script>
           <script>
    $("#location").chained("#city_division");
$(".datepicker").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    
 $(function () {
$('.datepicker').datetimepicker({
 pickTime: false,
 format: 'DD/MM/YYYY'
    });
});



 $.validate({
    modules : 'location, date, security, file',
    onModulesLoaded : function() {
    //  $('#country').suggestCountry();
    }
  });




    
    
    </script>
   
  
        
  </body>
</html>
