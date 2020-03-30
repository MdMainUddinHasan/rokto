

<div class="header-container">
			<!--<div class="header-container sticky">-->
				<div class="vertical-align-table column-1-1">
					<div class="header clearfix">
						<div class="logo vertical-align-cell">
                                                      <a href="<?php echo base_url()?>" title="Renovate">  <img src="<?php echo base_url()?>assets/client/images/besbd_log.png"/></a>
						
							
						</div>
						<a href="#" class="mobile-menu-switch vertical-align-cell">
							<span class="line"></span>
							<span class="line"></span>
							<span class="line"></span>
						</a>
						<div class="menu-container clearfix vertical-align-cell">
							<nav>
								<ul class="sf-menu">
									<li class="selected">
										<a href="<?php echo base_url()?>" title="Home">
											HOME
										</a>
									</li>
                                                                        <li>
										<a href="<?php echo site_url('about')?>" title="About Us">
											ABOUT US
										</a>
									
									</li>
<!--									<li>
										<a href="services.html" title="Services">
											SERVICES
										</a>
										<ul>
											<li>
												<a href="service_interior_renovation.html" title="Interior Renovation">
													Interior Renovation
												</a>
											</li>
											<li>
												<a href="service_design_build.html" title="Design and Build">
													Design and Build
												</a>
											</li>
											<li>
												<a href="service_tiling_painting.html" title="Design and Build">
													Tiling and Painting
												</a>
											</li>
											<li>
												<a href="service_paver_walkways.html" title="Paver Walkways">
													Paver Walkways
												</a>
											</li>
											<li>
												<a href="service_household_repairs.html" title="Household Repairs">
													Household Repairs
												</a>
											</li>
											<li>
												<a href="service_solar_systems.html" title="Solar Systems">
													Solar Systems
												</a>
											</li>
										</ul>
									</li>-->
								<li>
										<a href="<?php echo site_url('product')?>" title="Product">
											PRODUCTS
										</a>
										<ul>
                                                                                    
                                                                                    <?php 
                                                                                    foreach ($product_category as $value) {
                                                                                       ?>
                                                                                    <li>
												<a href="<?php echo site_url('bes_bd/prouct_category/'.$value['category_id'].'')?>" title="<?php echo $value['category_title'];?>">
													<?php echo $value['category_title'];?>
												</a>
											</li>
                                                                                    
                                                                                    <?php
                                                                                    }
                                                                                    
                                                                                    ?>
                                                                                    
                                                                                    
                                                                                    
                                                                                    
											
											
											
										</ul>
									</li>
<!--									
									<li>
										<a href="blog.html" title="Blog">
											BLOG
										</a>
										<ul>
											<li>
												<a href="blog.html" title="Blog">
													Blog
												</a>
											</li>
											<li>
												<a href="blog_left_sidebar.html" title="Blog">
													Blog Left Sidebar
												</a>
											</li>
											<li>
												<a href="blog_2_columns.html" title="Blog 2 Columns">
													Blog 2 Columns
												</a>
											</li>
											<li>
												<a href="post.html" title="Single Post">
													Single Post
												</a>
											</li>
											<li>
												<a href="search.html?s=ipsum" title="Search Template">
													Search Template
												</a>
											</li>
										</ul>
									</li>-->
									<li>
										<a href="<?php echo site_url('cost_calculate')?>" title="COST CALCULATOR">
											COST CALCULATOR
										</a>
									</li>
									<li >
										<a href="<?php echo site_url('contact')?>" title="Contact">
											CONTACT
										</a>
										
									</li>
								</ul>
							</nav>
							<div class="mobile-menu-container">
								<div class="mobile-menu-divider"></div>
								<nav>
									<ul class="mobile-menu">
										<li class="selected">
											<a href="<?php echo base_url()?>" title="Home">
											HOME
										</a>
                                                                                </li>
                                                                           
                                                                                <li class="selected">
											     
                                                                                <a href="<?php echo site_url('about')?>" title="About Us">
											ABOUT US
										</a>
										
                                                                                </li>
								
										<li>
										
										<a href="<?php echo site_url('product')?>" title="Product">
											PRODUCTS
										</a>
											<ul>
												<li>
													<a href="project_interior_renovation.html" title="Interior Renovation">
														Interior Renovation
													</a>
												</li>
												<li>
													<a href="project_garden_renovation.html" title="Garden Renovation">
														Garden Renovation
													</a>
												</li>
												<li>
													<a href="project_painting.html" title="Painting">
														Painting
													</a>
												</li>
												<li>
													<a href="project_design_build.html" title="Design and Build">
														Design and Build
													</a>
												</li>
												<li>
													<a href="project_solar_systems.html" title="Solar Systems">
														Solar Systems
													</a>
												</li>
											</ul>
										</li>

										<li>
											<a href="<?php echo site_url('cost_calculate')?>" title="COST CALCULATOR">
											COST CALCULATOR
										</a>
										</li>
                                                                                <li>
										<a href="<?php echo site_url('contact')?>" title="Contact">
											CONTACT
										</a>
										</li>
									
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>