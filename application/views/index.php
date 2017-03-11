<div id="main">
      <div id="slider">
         <div id="layerslider_5" class="ls-wp-container layer">
          <video playsinline autoplay muted loop poster="<?php echo base_url();?>public/video/Vinod Channa.mp4" id="bgvid">
            <!-- <source src="polina.webm" type="video/webm"> -->
            <source src="<?php echo base_url();?>public/video/Vinod Channa.mp4" type="video/mp4">
          </video>
          <div id="video_overlays">
          	<h2><a class="link link--yaku"><span>F</span><span>i</span><span>t</span><span>n</span><span>e</span><span>s</span><span>s</span> 
        <span>T</span><span>r</span><span>a</span><span>i</span><span>n</span><span>i</span><span>n</span><span>g</span>
        <span> I</span><span>n</span> <span>I</span><span>n</span><span>d</span><span>i</span><span>a</span> 
        <span>B</span><span>y</span> <!--<span>V</span><span>i</span><span>n</span><span>o</span><span>d</span>
        <span> C</span><span>h</span><span>a</span><span>n</span><span>n</span><span>a</span>--></a></h2>
        
       <h4> <a class="link link--yaku"><span>V</span><span>i</span><span>n</span><span>o</span><span>d</span>
        <span> C</span><span>h</span><span>a</span><span>n</span><span>n</span><span>a</span></a></h4>
        
        <h1><a class="link link--yaku"><span>G</span><span>e</span><span>t</span> <span>T</span><span>o</span> 
        <span>K</span><span>n</span><span>o</span><span>w</span>
        <span>H</span><span>o</span><span>w</span> <span>T</span><span>o</span>  
        <span>B</span><span>u</span><span>i</span><span>l</span><span>d</span>
         <span>M</span><span>u</span><span>s</span><span>c</span><span>l</span><span>e</span>
        </a></h1>
         </div>
         </div>
      </div>
    </div>
    <!-- **Slider Section - End** --> 
    
   
    
    
    <!-- main-content starts here -->
    <div id="main-content" data-animation="fadeInLeft" data-delay="100">
      <section id="primary" class="content-full-width">
        <div class="dt-sc-hr-invisible-medium"></div>
        <!-- dropbox -->
        <div id="dropbox">
          <div class="container-fluid">
            <div class="row">
            <div class="row">
              <?php $cnt = 1; foreach ($menu_programs as $key => $value) : if($cnt<7):?>
              <a href="<?php echo base_url()."Programs/programView/".$value['program_id']?>">
              <div class="col-br-5">
                <div class="row">
                  <div class="teaser teaser-style-3 text-center">
                    <div class="teaser-content">
                      <div class="icon">
                        <div class="wrapper">
                          <div class="first-image"> <img src="<?php echo base_url()."public/images/".$value['program_img']?>" alt=""> </div>
                          <div class="second-image"> <img class="Forma-1-hover" src="<?php echo base_url()."public/images/".$value['program_img_hover']?>" alt=""> </div>
                        </div>
                      </div>
                      <div class="heading"> <?php echo $value['program_name'] ?> </div>
                      <div class="text">  <?php echo $value['program_description'] ?> </div>
                    </div>
                  </div>
                </div>
              </div></a>
              <?php $cnt++; endif; endforeach; ?>
              <!-- <div class="col-br-5" data-animation="fadeInLeft" data-delay="100">
                <div class="row">
                  <div class="teaser teaser-style-3 text-center">
                    <div class="teaser-content">
                      <div class="icon">
                        <div class="wrapper">
                          <div class="first-image"> <img src="<?php echo base_url();?>public/images/Forma-11.png" alt=""> </div>
                          <div class="second-image"> <img class="Forma-11-hover" src="<?php echo base_url();?>public/images/Forma-11-hover.png" alt=""> </div>
                        </div>
                      </div>
                      <div class="heading"> Gadgets Training</div>
                      <div class="text"> Hurdles Workout </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-br-5" data-animation="fadeInLeft" data-delay="100">
                <div class="row">
                  <div class="teaser teaser-style-3 text-center">
                    <div class="teaser-content">
                      <div class="icon">
                        <div class="wrapper">
                          <div class="first-image"> <img src="<?php echo base_url();?>public/images/Forma-12.png" alt=""> </div>
                          <div class="second-image"> <img class="Forma-12-hover" src="<?php echo base_url();?>public/images/Forma-12-hover.png" alt=""> </div>
                        </div>
                      </div>
                      <div class="heading"> Functional Training </div>
                      <div class="text"> Body Weight </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-br-5" data-animation="fadeInRight" data-delay="100">
                <div class="row">
                  <div class="teaser teaser-style-3 text-center">
                    <div class="teaser-content">
                      <div class="icon">
                        <div class="wrapper">
                          <div class="first-image"> <img src="<?php echo base_url();?>public/images/Forma-13.png" alt=""> </div>
                          <div class="second-image"> <img class="Forma-13-hover" src="<?php echo base_url();?>public/images/Forma-13-hover.png" alt=""> </div>
                        </div>
                      </div>
                      <div class="heading"> Specific Specialization </div>
                      <div class="text"> Back Bending  </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-br-5" data-animation="fadeInRight" data-delay="100">
                <div class="row">
                  <div class="teaser teaser-style-3 text-center">
                    <div class="teaser-content">
                      <div class="icon">
                        <div class="wrapper">
                          <div class="first-image"> <img src="<?php echo base_url();?>public/images/Forma-14.png" alt=""> </div>
                          <div class="second-image"> <img class="Forma-14-hover" src="<?php echo base_url();?>public/images/Forma-14-hover.png" alt=""> </div>
                        </div>
                      </div>
                      <div class="heading"> Yoga </div>
                      <div class="text">Chakrasan </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-br-5" data-animation="fadeInRight" data-delay="100">
                <div class="row">
                  <div class="teaser teaser-style-3 text-center">
                    <div class="teaser-content">
                      <div class="icon">
                        <div class="wrapper">
                          <div class="first-image"> <img src="<?php echo base_url();?>public/images/Forma-15.png" alt=""> </div>
                          <div class="second-image"> <img class="Forma-15-hover" src="<?php echo base_url();?>public/images/Forma-14-hover.png" alt=""> </div>
                        </div>
                      </div>
                      <div class="heading"> Animal Flow </div>
                      <div class="text">Flip</div>
                    </div>
                  </div>
                </div>
              </div> -->
            </div>
          </div>
        </div>
            </div>
          </div>
        </div>
        <!-- #dropbox --> 
        
        <!-- Workouts starts here -->
                        <div class="fullwidth-section dt-sc-paralax">
                            <div class="container">
                                <div class="programs-container animate" data-animation="fadeInUp" data-delay="100">
                                    <h2 class="border-title aligncenter"> <span>Workouts</span> </h2>
                                </div>
                                <div class="dt-sc-one-fourth column first animate" data-animation="fadeInLeft" data-delay="100">
                                    <div class="dt-excersises type2">
                                        <div class="dt-excersise-thumb">
                                        <a class="bla-1" href="https://youtu.be/X3B2JIfEi-c"><img src="<?php echo base_url();?>public/images/blog4.png" alt="excersise" title=""></a> </div>
                                                                                 <div class="dt-excersise-detail">
                                            <div class="dt-excersise-title">
                                               <!-- <p class="count">
                                                    <a href="#">4 <br><span>Steps</span></a> 
                                                </p>-->
                                                <h5><a href="#">Press Bridge on Bosu</a></h5>
                                            </div>
                                             
                                        </div>
                                    </div>
                                </div>
                                <div class="dt-sc-one-fourth column animate" data-animation="fadeInUp" data-delay="100">
                                    <div class="dt-excersises type2">
                                        <div class="dt-excersise-thumb">
                                            <a class="bla-1" href="https://youtu.be/XU-Ssa0Pzxg"><img src="<?php echo base_url();?>public/images/blog5.png" alt="excersise" title=""></a>
                                        </div>
                                        <div class="dt-excersise-detail">
                                            <div class="dt-excersise-title">
                                               <!-- <p class="count">
                                                    <a href="#">4 <br><span>Steps</span></a> 
                                                </p>-->
                                                <h5><a href="#">Stretches &amp; Crunches</a></h5>
                                            </div>
                                             
                                        </div>
                                    </div>
                                </div>
                                <div class="dt-sc-one-fourth column animate" data-animation="fadeInRight" data-delay="100">
                                    <div class="dt-excersises type2">
                                        <div class="dt-excersise-thumb">
                                         <a class="bla-1" href="https://youtu.be/LP2ZSLc9-Yw"> <img src="<?php echo base_url();?>public/images/blog2.png" alt="excersise" title=""></a>
                                           
                                        </div>
                                        <div class="dt-excersise-detail">
                                            <div class="dt-excersise-title">
                                               <!-- <p class="count">
                                                    <a href="#">4 <br><span>Steps</span></a> 
                                                </p>-->
                                                <h5><a href="#">Dumbell Muscle Fit </a></h5>
                                            </div>
                                             
                                        </div>
                                    </div>
                                </div>
                                <div class="dt-sc-one-fourth column animate" data-animation="fadeInRight" data-delay="100">
                                    <div class="dt-excersises type2">
                                        <div class="dt-excersise-thumb">
                                         <a class="bla-1" href="https://youtu.be/5Cj_Zf6H6WQ"> <img src="<?php echo base_url();?>public/images/blog3.png" alt="excersise" title=""></a>
                                           
                                        </div>
                                        <div class="dt-excersise-detail">
                                            <div class="dt-excersise-title">
                                               <!-- <p class="count">
                                                    <a href="#">4 <br><span>Steps</span></a> 
                                                </p>-->
                                                <h5><a href="#">Dumbell Muscle Fit </a></h5>
                                            </div>
                                            <!--<div class="dt-excersise-content">
                                                <h6>Muscle Group:</h6>
                                                <p class="dt-excersise-meta"><a href="#">Abs</a>, <a href="#">Core</a>, <a href="#">Hip Flexors</a>, <a href="#">Neck</a></p>
                                                <h6>Categories:</h6>
                                                <p class="dt-excersise-meta"><a href="#">Core</a>, <a href="#">Pilates</a></p>
                                                <h6>Equipment:</h6>
                                                <p class="dt-excersise-meta"><a href="#">Exercise Mat</a>, <a href="#">Dumbells</a></p>
                                                <a class="dt-sc-button small" href="#" data-hover="View Exercise">View Exercise</a>
                                            </div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        <!-- workout ends here -->
          
         <div class="dt-sc-hr-invisible-medium"></div>
           <!-- <div class="dt-sc-hr-invisible-large"></div>-->
                        <div class="dt-sc-hr-invisible"></div>
                        <!-- Paralax starts here -->
                        <div class="fullwidth-section full-mac dt-sc-paralax">
                            <div class="container">
                                <div class="dt-sc-one-half column first animate" data-animation="fadeInLeft" data-delay="100">
                                	<div class="dt-sc-hr-invisible-normal"></div>
                                    <div class="dt-sc-hr-invisible-small"></div>
                                    	<h2>Promo Ads that Enhances your Website to display in another level.</h2>
                                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident. </p>
                                        <div class="dt-sc-hr-invisible-small"></div>
                                        <div class="dt-sc-one-half column first">
                                        	<div class="dt-sc-ico-content type4 dark">
                                                <div class="icon">
                                                    <span class="fa fa-user"> </span>
                                                </div>
                                                <h3>Healthy Diet</h3>
                                            </div>
                                            <div class="dt-sc-ico-content type4 dark">
                                                <div class="icon">
                                                    <span class="fa fa-user"> </span>
                                                </div>
                                                <h3>Best Nutrition</h3>
                                            </div>
                                        </div>
                                        <div class="dt-sc-one-half column">
                                        	<div class="dt-sc-ico-content type4 dark">
                                                <div class="icon">
                                                    <span class="fa fa-user"> </span>
                                                </div>
                                                <h3>Weight Loss</h3>
                                            </div>
                                            <div class="dt-sc-ico-content type4 dark">
                                                <div class="icon">
                                                    <span class="fa fa-user"> </span>
                                                </div>
                                                <h3>Strength Training</h3>
                                            </div>
                                        </div>
                                    <div class="dt-sc-hr-invisible"></div>
                                </div>
                                <div class="dt-sc-one-half column animate" data-animation="fadeInRight" data-delay="100">
                                	<img src="<?php echo base_url();?>public/images/about-fitness-img.png" alt="" title="">
                                </div>
                            </div>
						</div>
                        <!-- Paralax msg ends here -->
                        
                               
        <!-- Team starts here -->
        <div class="fullwidth-section dt-sc-paralax">
          <div class="container">
            <h2 class="border-title aligncenter"> <span> Our Team </span></h2>
            <div class="dt-sc-one-fourth column first animate" data-animation="fadeInLeft" data-delay="100">
              <div class="dt-sc-team type2">
                <div class="team-thumb"> <img src="<?php echo base_url();?>public/images/team11.jpg" alt="" title="">
                  <h3><span>Selena</span> <br>
                    <span>Kyle</span></h3>
                  <div class="team-detail">
                    <h4>Fitness Instructor</h4>
                    <ul>
                      <li><span class="fa fa-trophy"></span> <b>Awards:</b> 5 </li>
                      <li><span class="fa fa-mortar-board"></span> Mixed Martial Arts, Yoga </li>
                      <li><span class="fa fa-certificate"></span> <b>Experience:</b> 3+ years </li>
                    </ul>
                  </div>
                </div>
                <ul class="dt-sc-social-icons">
                  <li class="facebook"><a class="fa fa-facebook" href="#"></a></li>
                  <li class="google"><a class="fa fa-google-plus" href="#"></a></li>
                  <li class="twitter"><a class="fa fa-twitter" href="#"></a></li>
                </ul>
              </div>
            </div>
            <div class="dt-sc-one-fourth column animate" data-animation="fadeInUp" data-delay="100">
              <div class="dt-sc-team type2">
                <div class="team-thumb"> <img src="<?php echo base_url();?>public/images/team12.jpg" alt="" title="">
                  <h3><span>James </span><br>
                    <span>Dunhall</span></h3>
                  <div class="team-detail">
                    <h4>Fitness Instructor</h4>
                    <ul>
                      <li><span class="fa fa-trophy"></span> <b>Awards:</b> 5 </li>
                      <li><span class="fa fa-mortar-board"></span> Mixed Martial Arts, Yoga </li>
                      <li><span class="fa fa-certificate"></span> <b>Experience:</b> 3+ years </li>
                    </ul>
                  </div>
                </div>
                <ul class="dt-sc-social-icons">
                  <li class="facebook"><a class="fa fa-facebook" href="#"></a></li>
                  <li class="google"><a class="fa fa-google-plus" href="#"></a></li>
                  <li class="twitter"><a class="fa fa-twitter" href="#"></a></li>
                </ul>
              </div>
            </div>
            <div class="dt-sc-one-fourth column animate" data-animation="fadeInDown" data-delay="100">
              <div class="dt-sc-team type2">
                <div class="team-thumb"> <img src="<?php echo base_url();?>public/images/team13.jpg" alt="" title="">
                  <h3><span>Alica</span> <br>
                    <span>Meadow</span></h3>
                  <div class="team-detail">
                    <h4>Fitness Instructor</h4>
                    <ul>
                      <li><span class="fa fa-trophy"></span> <b>Awards:</b> 5 </li>
                      <li><span class="fa fa-mortar-board"></span> Mixed Martial Arts, Yoga </li>
                      <li><span class="fa fa-certificate"></span> <b>Experience:</b> 3+ years </li>
                    </ul>
                  </div>
                </div>
                <ul class="dt-sc-social-icons">
                  <li class="facebook"><a class="fa fa-facebook" href="#"></a></li>
                  <li class="google"><a class="fa fa-google-plus" href="#"></a></li>
                  <li class="twitter"><a class="fa fa-twitter" href="#"></a></li>
                </ul>
              </div>
            </div>
            <div class="dt-sc-one-fourth column animate" data-animation="fadeInRight" data-delay="100">
              <div class="dt-sc-team type2">
                <div class="team-thumb"> <img src="<?php echo base_url();?>public/images/team14.jpg" alt="" title="">
                  <h3><span>Thomas</span> <br>
                    <span>Park</span></h3>
                  <div class="team-detail">
                    <h4>Fitness Instructor</h4>
                    <ul>
                      <li><span class="fa fa-trophy"></span> <b>Awards:</b> 5 </li>
                      <li><span class="fa fa-mortar-board"></span> Mixed Martial Arts, Yoga </li>
                      <li><span class="fa fa-certificate"></span> <b>Experience:</b> 3+ years </li>
                    </ul>
                  </div>
                </div>
                <ul class="dt-sc-social-icons">
                  <li class="facebook"><a class="fa fa-facebook" href="#"></a></li>
                  <li class="google"><a class="fa fa-google-plus" href="#"></a></li>
                  <li class="twitter"><a class="fa fa-twitter" href="#"></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- Team ends here --> 
 
 
 
         
        <div class="dt-sc-hr-invisible-normal"></div>
        <!-- Testimonials starts here -->
        <div class="fullwidth-section dt-sc-paralax full-testimonial">
          <div class="container">
          
            <div class="dt-sc-testimonial-carousel-wrapper animate" data-animation="zoomIn" data-delay="100">
              <ul class="dt-sc-testimonial-carousel">
                <li class="dt-sc-testimonial">
                  <div class="author"> <img src="<?php echo base_url();?>public/images/team5.jpg" alt="" title=""> </div>
                  <blockquote><q> I am thankful to Vinod not only for training me but giving me tips which will help me maintain my fitness not today or tomorrow but forever. </q></blockquote>
                  <h4>John Abrahim <span> Model, Actor</span> </h4>
                </li>
                <li class="dt-sc-testimonial">
                  <div class="author"> <img src="<?php echo base_url();?>public/images/team4.jpg" alt="" title=""> </div>
                  <blockquote><q> lost 14kg of her post pregnancy weight in 2 and half month with Vinod's Training + Diet.  </q></blockquote>
                  <h4>Shilpa Shetty Kundra<span>Actress</span></h4>
                </li>
                <li class="dt-sc-testimonial">
                  <div class="author"> <img src="<?php echo base_url();?>public/images/team3.jpg" alt="" title=""> </div>
                  <blockquote><q> Time for fitness -no one better than - @ChannaVinod - no pain no gain
 </q></blockquote>
                  <h4>Ritesh Deshmukh<span>Actor, Producer</span></h4>
                </li>
              </ul>
              <div  id="pager" class="testimonial-pagination"> <a href="#">1</a> <a href="#" class="selected">2</a> <a href="#">3</a> </div>
            </div>
          </div>
        </div>
        <!-- Testimonials ends here -->
        
        
         <div class="dt-sc-hr-invisible"></div>
                        <!-- programs starts here -->
                        <div class="fullwidth-section">
                            <div class="container">
                               <!-- <h3 class="border-title"> <span>Register Now</span> </h3>-->
                                <div class="dt-sc-one-half column first animate" data-animation="fadeInLeft" data-delay="100">
                                    <div class="dt-sc-programs">
                                        <!--<div class="dt-sc-pro-thumb">
                                            <a href="package-detail.html"><img title="" alt="" src="<?php echo base_url();?>public/images/event4.jpg"></a>
                                        </div>-->
                                        <div class="body-builder">
                                            <!--<div class="dt-sc-pro-content">
                                                <div class="dt-sc-pro-title">
                                                    <h3>Muscle Build Pro</h3>
                                                    <span>1 yr training program</span>
                                                </div>
                                                <ul class="dt-sc-fancy-list circle-o">
                                                    <li>3 days a week program</li>
                                                    <li>Diet program Included</li>
                                                    <li>Professional Trainers</li>
                                                </ul>
                                            </div>-->
                                            <div class="dt-sc-pro-price">
                                               <!-- <p class="pro-price-content">
                                                    <sup>$</sup> 89.99/<span>6 Months</span>
                                                </p>-->
                                                <h1>Being <span>Body</span></h1>
                                                <p>Builder</p>
                                                <a href="#" class="dt-sc-button small" data-hover="Sign Up">Sign Up</a>
                                                <a href="#" class="dt-sc-button small" data-hover="View Programs">View Programs</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 
                                <div class="dt-sc-one-half column animate" data-animation="fadeInRight" data-delay="100">
                                    <div class="dt-sc-programs">
                                        <div class="dt-sc-pro-thumb">
                                            <a href="package-detail.html"><img title="" alt="" src="<?php echo base_url();?>public/images/girl.png"></a>
                                        </div>
                                     </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <!-- programs ends here -->
        
        
        
         <div class="dt-sc-hr-invisible-medium"></div>
                        <!-- Number Count starts here -->
                        <div class="fullwidth-section dt-sc-paralax full-pattern1">
                        	<div class="container">
                            	<div class="dt-sc-one-sixth column first animate" data-animation="zoomIn" data-delay="100">
                                	<div class="dt-sc-animate-num">
                                    	<div class="dt-sc-num-count">
                                        	<p data-value="3400">3400</p>
                                        </div>
                                        <h4>Happy <br>Members</h4>
                                    </div>
                                </div>
                                <div class="dt-sc-one-sixth column animate" data-animation="zoomIn" data-delay="100">
                                	<div class="dt-sc-animate-num">
                                    	<div class="dt-sc-num-count">
                                            <p data-value="32">32</p>
                                        </div>
                                        <h4>Trained <br>celebrities</h4>
                                    </div>
                                </div>
                                <div class="dt-sc-one-sixth column animate" data-animation="zoomIn" data-delay="100">
                                	<div class="dt-sc-animate-num">
                                    	<div class="dt-sc-num-count">
                                        	<p data-value="150">150</p>
                                        </div>
                                        <h4>Titles <br>Won</h4>
                                    </div>
                                </div>
                                <div class="dt-sc-one-sixth column animate" data-animation="zoomIn" data-delay="100">
                                	<div class="dt-sc-animate-num">
                                    	<div class="dt-sc-num-count">
                                        	<p data-value="320">320</p>
                                        </div>
                                        <h4>Workshops <br>Conducted</h4>
                                    </div>
                                </div>
                                <div class="dt-sc-one-sixth column animate" data-animation="zoomIn" data-delay="100">
                                	<div class="dt-sc-animate-num">
                                    	<div class="dt-sc-num-count">
                                        	<p data-value="900">900+</p>
                                        </div>
                                        <h4>Gym <br>Equipments</h4>
                                    </div>
                                </div>
                                <div class="dt-sc-one-sixth column animate" data-animation="zoomIn" data-delay="100">
                                	<div class="dt-sc-animate-num">
                                    	<div class="dt-sc-num-count">
                                        	<p data-value="640">640</p>
                                        </div>
                                        <h4>Premium <br>Memberships</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Number Count ends here -->
        

         
          
        <div class="dt-sc-hr-invisible-medium"></div>
        <div class="fullwidth-section animate" data-animation="fadeInRight" data-delay="100">
          <div class="container">
            <h2 class="border-title aligncenter"><span> Products </span></h2>
            <div class="dt-sc-partner-carousel-wrapper">
              <ul class='dt-sc-partner-carousel'>
              <?php foreach ($newProduct as $key => $value) : 
                    if(empty($value['image'])){
                      $value['image'] = "no_image.png";
                    }
              ?>
                <li>
                  <a href="<?php echo base_url('product/productView');?>" class="dt-sc-tooltip-top-carousel" title="<?php echo $value['meta_title'] ?>">
                    <img src="<?php echo base_url().'public/images/'.$value['image']?>" alt="" title="" class="img-responsive">
                  </a>
                </li>
              <?php endforeach;?>
              </ul>
            </div>
          </div>
        </div>
        <div class="dt-sc-hr-invisible-large"></div>
        <div class="fullwidth-section full-paralax4">
          <div class="container">
            <div class="dt-sc-one-half column first"> <img src="<?php echo base_url();?>public/images/women-with-iphone.png" alt="" title=""> </div>
            <div class="dt-sc-one-half column">
              <div class="dt-sc-hr-invisible"></div>
              <div class="dt-sc-hr-invisible-small"></div>
              <div class="dt-sc-clear"></div>
              <h2>Calculate your BMI</h2>
              <div class="dt-sc-tabs-container">
                <ul class="dt-sc-tabs-frame">
                  <li><a href="#" class="current"> Men <span class="fa fa-male"> </span> </a></li>
                  <li><a href="#"> Women <span class="fa fa-female"> </span> </a></li>
                </ul>
                <div class="dt-sc-tabs-frame-content">
                  <form name="frmbmi" action="#" class="dt-sc-bmi-frm">
                    <div class="dt-sc-bmi-frm-detail">
                      <div class="dt-sc-two-third column first">
                        <label>Height in Ft/in</label>
                        <div class="dt-sc-clear"></div>
                        <input type="text" name="txtfeet" placeholder="FT">
                        <input type="text" name="txtinches" placeholder="IN">
                        <div class="dt-sc-clear"></div>
                        <input type="submit" name="subbmi" value="Calculate Bmi">
                      </div>
                      <div class="dt-sc-one-third column">
                        <label>Weight in lbs</label>
                        <input type="text" name="txtlbs" placeholder="LBS">
                        <div class="dt-sc-clear"></div>
                        <input type="reset" name="subbmi" value="Reset">
                      </div>
                    </div>
                    <div class="bmi-result">
                      <div class="dt-sc-hr-invisible"></div>
                      <label>Your BMI is</label>
                      <div class="dt-sc-clear"></div>
                      <input type="text" readonly name="txtbmi" placeholder="0.0">
                      <div class="dt-sc-clear"></div>
                      <div class="dt-sc-hr-invisible-small"></div>
                      <a href="#tblbmicontent" class="fancyInline" data-hover="BMI Class">View BMI Class <i class="fa fa-arrow-circle-right"></i></a>
                      <div class="dt-sc-hr-invisible"></div>
                    </div>
                  </form>
                </div>
                <div class="dt-sc-tabs-frame-content">
                  <form name="frmbmi_women" action="#" class="dt-sc-bmi-frm">
                    <div class="dt-sc-bmi-frm-detail">
                      <div class="dt-sc-two-third column first">
                        <label>Height in Ft/in</label>
                        <div class="dt-sc-clear"></div>
                        <input type="text" name="txtfeet1" placeholder="FT">
                        <input type="text" name="txtinches1" placeholder="IN">
                        <div class="dt-sc-clear"></div>
                        <input type="submit" name="subbmi" value="Calculate Bmi">
                      </div>
                      <div class="dt-sc-one-third column">
                        <label>Weight in lbs</label>
                        <input type="text" name="txtlbs1" placeholder="LBS">
                        <div class="dt-sc-clear"></div>
                        <input type="reset" name="subbmi" value="Reset">
                      </div>
                    </div>
                    <div class="bmi-result">
                      <div class="dt-sc-hr-invisible"></div>
                      <label>Your BMI is</label>
                      <div class="dt-sc-clear"></div>
                      <input type="text" readonly name="txtbmi1" placeholder="0.0">
                      <div class="dt-sc-clear"></div>
                      <div class="dt-sc-hr-invisible-small"></div>
                      <a href="#tblbmicontent" class="fancyInline" data-hover="BMI Class">View BMI Class <i class="fa fa-arrow-circle-right"></i></a>
                      <div class="dt-sc-hr-invisible"></div>
                    </div>
                  </form>
                </div>
                
              </div>
              <div id="tblbmicontent" class="tblbmi">
                <div class="dt-inner-content">
                  <table>
                    <tbody>
                      <tr>
                        <th>BMI</th>
                        <th>Classification</th>
                      </tr>
                      <tr>
                        <td>&lt; 18.5</td>
                        <td>Underweight</td>
                      </tr>
                      <tr>
                        <td>18.5 &ndash; 24.9</td>
                        <td>Normal Weight</td>
                      </tr>
                      <tr>
                        <td>25.0 &ndash; 29.9</td>
                        <td>Overweight</td>
                      </tr>
                      <tr>
                        <td>30.0 &ndash; 34.9</td>
                        <td>Class I Obesity</td>
                      </tr>
                      <tr>
                        <td>35.0 &ndash; 39.9</td>
                        <td>Class II Obesity</td>
                      </tr>
                      <tr>
                        <td>&#x2265; 40.0</td>
                        <td>&nbsp;&nbsp;Class III Obesity&nbsp;&nbsp;</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- support ends here --> 
      </section>
    </div>
    <!-- main-content ends here --> 
  <!-- </div> -->
 