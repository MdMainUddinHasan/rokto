    <header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header">
                <a href="<?php echo site_url('admin'); ?>" class="navbar-brand" style="color: red"><b>Blood</b>()</a>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
              <ul class="nav navbar-nav">
                
                <li class="<?php if($menu=='home'){ echo 'active'; } ?>"><a href="<?php echo site_url('Admin'); ?>">Home <span class="sr-only">(current)</span></a></li>
                <li class="<?php if($menu=='view_report'){ echo 'active'; }?>" ><a href="<?php echo site_url('view_report'); ?>">Report</a></li>
                  <li class="dropdown <?php if($menu=='location'){ echo 'active'; } ?>">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Location <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php echo site_url('city_division'); ?>">City/Division</a></li>
                    <li><a href="<?php echo site_url('area_location'); ?>">Area/Location</a></li>
                  
                  </ul>
                </li>
              
              </ul>
              <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
<!--                  <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">-->
                </div>
              </form>
            </div><!-- /.navbar-collapse -->
               <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                
                  <!-- User Account Menu -->
                  <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <!-- The user image in the navbar-->
                      <img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="">
                      <!-- hidden-xs hides the username on small devices so only the image appears. -->
                      <span class="hidden-xs">   <?php    echo  $this->session->userdata('name');     ?></span>
                    </a>
                    <ul class="dropdown-menu">
                      <!-- The user image in the menu -->
                      <li class="user-header">
                      
                        <p>
                   
                         <?php    echo  $this->session->userdata('name');     ?>
                       
                            <small>
                                <?php 
                            echo  $this->session->userdata('user_type');
                         
                         ?> 
                                
                            </small>
                        </p>
                        
                      
               
                        
                        
                      </li>
                   
                      <!-- Menu Footer-->
                      <li class="user-footer">
                      <div class="pull-left">
                            <a href="<?php echo site_url('Admin/change_password') ?>"> Change password</a>
                        </div>
                        <div class="pull-right">
                            <a href="<?php echo site_url('Admin/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                        </div>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div><!-- /.navbar-custom-menu -->
          </div><!-- /.container-fluid -->
        </nav>
      </header>

<!--P0zZl30ZbCDJ-->