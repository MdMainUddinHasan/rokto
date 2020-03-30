    <header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header">
                <a href="<?php echo base_url(); ?>" class="navbar-brand" style="color: red"><b>Rokto.info</a>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
              <ul class="nav navbar-nav">
                <li class="<?php if($menu=='home'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a></li>
                <li class="<?php if($menu=='registration'){ echo 'active'; } ?>"><a href="<?php echo site_url('registration'); ?>">Registration</a></li>
              
              </ul>
              <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
<!--                  <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">-->
                </div>
              </form>
            </div><!-- /.navbar-collapse -->
         
          </div><!-- /.container-fluid -->
        </nav>
      </header>

<!--P0zZl30ZbCDJ-->