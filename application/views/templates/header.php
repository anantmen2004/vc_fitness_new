<?php
$this->session->sess_expiration = '120';
//$customer_id = $this->session->userdata('customer_id');
$firstname = $this->session->userdata('firstname');
$wishCount = $this->session->userdata('wishCount');
$this->load->helper('cookie');
$this->load->library('cart');
$totalItems = $this->cart->total_items();
?>
<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en-gb" class="no-js">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Fitness India By Vinod Channa</title>
<meta name="description" content="">
<meta name="author" content="">
 <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic" />



<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/bootstrap/jquery.classybox.min.css" />

<!-- **Favicon** -->
<link href="<?php echo base_url();?>public/images/favicon.ico" rel="shortcut icon" type="image/x-icon" />

<!-- **CSS - stylesheets** -->
<link id="default-css" href="<?php echo base_url();?>public/css/style.css" rel="stylesheet" media="all" />
<link id="shortcodes-css" href="<?php echo base_url();?>public/css/shortcodes.css" rel="stylesheet" media="all" />
<link id="skin-css" href="<?php echo base_url();?>public/skins/green/style.css" rel="stylesheet" media="all" />
<link id="fancy-box" href="<?php echo base_url();?>public/css/jquery.fancybox.css" rel="stylesheet" media="all" />
<link id="layer-slider" href="<?php echo base_url();?>public/css/layerslider.css" rel="stylesheet" media="all" />
<link href="<?php echo base_url();?>public/css/prettyPhoto.css" rel="stylesheet" media="all" />

<!-- **Additional - stylesheets** -->
<link href="<?php echo base_url();?>public/css/responsive.css" rel="stylesheet" media="all" />
<link href="<?php echo base_url();?>public/css/pace-theme-loading-bar.css" rel="stylesheet" media="all" />
<link href="<?php echo base_url();?>public/css/animations.css" rel="stylesheet" media="all" />

<!-- **Font Awesome** -->
<link rel="stylesheet" href="<?php echo base_url();?>public/css/font-awesome.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>public/css/flaticon.css" />
<link rel="stylesheet" href="<?php echo base_url();?>public/css/easy-responsive-tabs.css" />
<!-- <script src="<?php echo base_url();?>public/js/easyResponsiveTabs.js"></script> -->


<!-- **Google - Fonts** -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700' rel='stylesheet' type='text/css'>
<link id="default-css" href="<?php echo base_url();?>public/css/jwbox.js" rel="stylesheet" media="all" />
<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/jquery-migrate.min.js"></script>
<script type="text/javascript">
  var base_url = "<?php echo base_url(); ?>";
</script>
<!-- **Modernizr** -->
<script src="<?php echo base_url();?>public/js/modernizr.custom.js"></script>
<script type="text/javascript">
	var mytheme_urls = {
 		stickynav : 'enable'
	};
	</script>
 <!-- slider-awards-and-achivements-end --> 
 <link rel="stylesheet" href="<?php echo base_url();?>public/css/bootstrap/bootstrap.min.css">
  <script src="<?php echo base_url();?>public/css/bootstrap/jquery.min.js"></script>
  
<script src="<?php echo base_url();?>public/js/easyResponsiveTabs.js"></script>
  <script src="<?php echo base_url();?>public/css/bootstrap/bootstrap.min.js"></script>
      <!-- slider-awards-and-achivements-end --> 
     <!-- slider-corporate --> 
       <script type="text/javascript" src="<?php echo base_url();?>public/css/bootstrap/jquery.marquee.js"></script>
     <!-- slider-corporate-end --> 
  <!-- slider-video --> 
 <!-- <script src="<?php echo base_url();?>public/css/bootstrap/jquery.classybox.min.js"></script> -->
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/jquery.classybox.min.css"/> -->


<!-- slider-video-end --> 
<!-- **treaser-my-css** -->
<link rel="stylesheet" href="<?php echo base_url();?>public/css/common.css">

<!--vedio-->
 
 <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/YouTubePopUp.css">
	 
	<script type="text/javascript" src="<?php echo base_url();?>public/js/YouTubePopUp.jquery.js"></script>
	<script type="text/javascript">
		jQuery(function(){
			jQuery("a.bla-1").YouTubePopUp();
			jQuery("a.bla-2").YouTubePopUp( { autoplay: 0 } ); // Disable autoplay
		});
	</script> -->
    </head>
 <body>
<!-- Wrapper -->

<div class="wrapper" id="headerContent">
  <div class="inner-wrapper"> 
    <!-- header-wrapper starts here -->
    
    <div id="header-wrapper">
      <header id="header" class="header2"> 
        <!-- Top bar starts here -->
        <div class="top-bar">
          <div class="container">
            <div class="dt-sc-contact-info">
              <p> <i class="fa fa-phone"></i><span>022 65556512</span> <i class="fa fa-envelope"></i><span>info@vinodchanna.com</span> </p>
            </div>
            <div class="top-right">
              <ul>
              <?php if(!empty($customer_id)):?>
                <li><a title="Login" href="<?php echo base_url('my_account');?>"><span class="fa fa-sign-in"></span>Hi..<?php echo $firstname; ?></a></li>
                <li><a title="Wishlist" href="<?php echo base_url('product/wishlistView');?>"><span class="fa fa-cart-arrow-down"></span> Wishlist - <div id="wishListItems" style="float:right"><?php echo $wishCount; ?></a></li>
                <li><a title="Register Now" href="<?php echo base_url('product/cartView');?>"><span class="fa fa-cart-arrow-down"></span> view Cart - <div id="totalItems" style="float:right"><?php echo $totalItems; ?></a></li>
                <li><a title="logout Now" href="<?php echo base_url('Auth/logout');?>"><span class="fa fa-user"></span> logout </a></li>

              <?php else: ?>
                <li><a title="Login" href="<?php echo base_url('Auth/loginView');?>"><span class="fa fa-sign-in"></span>Member Login</a></li>
                <li><a title="Register Now" href="<?php echo base_url('Auth/rgisterView');?>"><span class="fa fa-user"></span> Register </a></li>
                <li><a title="Register Now" href="<?php echo base_url('product/cartView');?>"><span class="fa fa-cart-arrow-down"></span> view Cart - <div id="totalItems" style="float:right"><?php echo $totalItems; ?></div> </a></li>
              <?php endif; ?>
              </ul>
            </div>
          </div>
        </div>
        <!-- Top bar ends here -->
        <div class="main-menu-container">
          <div class="main-menu">
            <div id="logo"> <a title="Travel" href="<?php echo base_url();?>"><img title="Fitness" alt="Fitness" src="<?php echo base_url();?>public/images/logo.png"></a> </div>
            <div id="primary-menu">
              <div class="dt-menu-toggle" id="dt-menu-toggle">Menu<span class="dt-menu-toggle-icon"></span></div>
              <nav id="main-menu">
                <ul id="menu-main-menu" class="menu">
                  <li class="menu-item-simple-parent menu-item-depth-0 <?php echo ($page =='index')?"current_page_item":""?>"><a href="<?php echo base_url();?>">Home</a>
                    <!--<ul class="sub-menu">
                      <li><a href="indexv2.html">Home 2</a></li>
                      <li><a href="indexv3.html">Home 3</a></li>
                      <li><a href="indexv4.html">Home 4</a></li>
                      <li><a href="indexv5.html">Home 5</a></li>
                      <li><a href="header1.html">Headers</a>
                        <ul class="sub-menu">
                          <li><a href="header1.html">Header 1</a></li>
                          <li><a href="header2.html">Header 2</a></li>
                          <li><a href="header3.html">Header 3</a></li>
                          <li><a href="header4.html">Header 4</a></li>
                          <li><a href="header5.html">Header 5</a></li>
                        </ul>
                        <a class="dt-menu-expand">+</a> </li>
                      <li><a href="about.html">About Us 1</a></li>
                      <li><a href="about-v2.html">About Us 2</a></li>
                      <li><a href="one-page.html">One Page Layout</a></li>
                    </ul>
                    <a class="dt-menu-expand">+</a>--> </li>
                    
                    
                    
                  <li class="menu-item-megamenu-parent  megamenu-4-columns-group menu-item-depth-0 <?php echo ($page =='aboutUs')?"current_page_item":""?>"> <a href="<?php echo base_url('aboutus');?>">About</a>
                    <div class="megamenu-child-container">
                      <ul class="sub-menu">
                         <li>
                          <div class="widgettitle"> <a href="#">About</a> </div>
                          <div class="menu-item-widget-area-container">
                            <ul>
                              <li>
                                <div class="textwidget">
                                  <p>I would like to share my journey from a middle class family, one normal guy to a professional Bodybuilder to India's no. 1 celebrity trainer and Fitness expert.<br/>'Perfect practice makes man  Perfect'.</p>
                                  <a href="about.html" class="dt-sc-button small" data-hover="Read More">Read More</a> </div>
                              </li>
                            </ul>
                          </div>
                        </li>
                        <li>
                          <div class="widgettitle"> <a href="#">Useful Links</a> </div>
                          <div class="menu-item-widget-area-container">
                            <ul>
                              <li>
                                <div class="textwidget">
                                  <ul>
                                    <li> <a href="about.html" title=""> Biography  </a> </li>
                                    <li> <a href="<?php echo base_url('PressReleases/pressReleasesView');?>" title=""> Press Releases</a> </li>
                                    <li> <a href="<?php echo base_url('AwardsAchivements/awardsAchivementsView');?>" title=""> Achievement </a> </li>
                                    <li> <a href="#" title=""> Corporate Clients </a> </li>
                                    <li> <a href="#" title=""> Experience </a> </li>
                                    <li> <a href="#" title=""> Why Choose Us </a> </li>
                                  </ul>
                                </div>
                              </li>
                            </ul>
                          </div>
                        </li>
                        <li>
                          <div class="widgettitle"> <a href="Certification">Become A Trainer</a> </div>
                          <div class="menu-item-widget-area-container">
                            <ul>
                              <li>
                                <article class="blog-entry format-link">
                                  <div class="blog-entry-inner">
                                    <div class="entry-title">
                                      <h4><a href="<?php echo base_url('Certification/certificationView');?>">Best Training</a></h4>
                                      <div class="entry-metadata">
                                        <p class="tags"><a href="certification.html">Given By </a> / <a href="about.html">Vinod Channa</a></p>
                                      </div>
                                    </div>
                                    <div class="entry-thumb"> <a href="<?php echo base_url('Certification/certificationView');?>">
                                     <img title="" alt="" src="<?php echo base_url();?>public/images/certificate.jpg">
                                      <div class="blog-overlay"><span class="image-overlay-inside"></span></div>
                                      </a>
                                     <!-- <div class="entry-meta">
                                        <div class="date"> <span>21</span> mar<br>
                                          2016 </div>
                                      </div>-->
                                    </div>
                                  </div>
                                </article>
                              </li>
                            </ul>
                          </div>
                        </li>
                        <li>
                          <div class="widgettitle"> <a href="<?php echo base_url('Testimonials/testimonialsView');?>">Testimonials</a> </div>
                          <div class="menu-item-widget-area-container">
                            <ul class="sub-menu">
                              <li>
                                <div class="textwidget">
                                  <div class="type2">
                                    <div class="dt-sc-testimonial">
                                      <blockquote> <q> I am thankful to Vinod not only for training me but giving me tips which will help me maintain my fitness not today or tomorrow but forever.</q> </blockquote>
                                      <div class="author"> <img title="John Doe" alt="John Doe" src="<?php echo base_url();?>public/images/team5.jpg"> </div>
                                      <cite> <a href="#">John Abrahim</a> <span>Model,Actor</span> </cite> </div>
                                  </div>
                                </div>
                              </li>
                            </ul>
                          </div>
                        </li>
                      </ul>
                    </div>
                    <a class="dt-menu-expand">+</a> </li>
                    
                     <li class="menu-item-megamenu-parent  megamenu-4-columns-group menu-item-depth-0 <?php echo ($page =='programs')?"current_page_item":""?>"> <a href="<?php echo base_url('programs/programView');?>" title=""> Programs </a>
                    <div class="megamenu-child-container">
                      <ul class="sub-menu">
                      <?php $cnt = 1; foreach ($menu_programs as $key => $value) : if($cnt<5):?>
                        <li>
                          <div class="widgettitle"> <a href="<?php echo base_url()."Programs/programView/".$value['program_id']?>"><?php echo $value['program_name'] ?></a> </div>
                          <ul class="sub-menu">
                          <?php $listcnt=1; foreach ($menu_trainings as $key => $value1) : if($value1['program_id'] == $value['program_id'] && $listcnt < 5):?>
                            <li> <a onclick="getTrainingContentFromHeader('<?php echo $value['program_id']?>','<?php echo $value1['training_id']?>')" > <?php echo $value1['training_name'] ?> </a> </li>
                          <?php $listcnt++; endif; if($listcnt == 5): ?>
                            <li> <a href="<?php echo base_url('programs/programView');?>"> More... </a> </li>
                          <?php $listcnt++; endif;endforeach; ?>
                          </ul>
                          <a class="dt-menu-expand">+</a> 
                        </li>
                      <?php $cnt++; endif; endforeach; ?>
                        
                      </ul>
                      <ul class="col-md-12" style="border-top:0.01px solid rgba(255,255,255,0.2); list-style: none;">
                     <li> <a class="dt-sc-button small" href="<?php echo base_url('programs/programView');?>" data-hover="Enroll Now">View More</a>
                        </ul>
                    </div>
                    <a class="dt-menu-expand">+</a> </li>
                    
                    
                    
                    <li class="menu-item-megamenu-parent  megamenu-4-columns-group menu-item-depth-0 <?php echo ($page =='packagespage')?"current_page_item":""?>"> <a href="<?php echo base_url('packages/packagesView');?>">Packages</a>
                    <div class="megamenu-child-container">
                      <ul class="sub-menu">
                        <li class="menu-item-fullwidth fill-four-columns">
                          <div class="menu-item-widget-area-container">
                            <ul>
                            <?php 
                            $cnt = 1;
                                    foreach ($menu_packages as $key => $value):
                                      if($cnt <5):
                                ?>
                              <li class="widget">
                                <div class="dt-sc-programs">
                                  <div class="dt-sc-pro-thumb"> <a href="package-detail.html"><img src="<?php echo base_url().'public/images/'.$value['package_img']?>" alt="" title=""></a>
                                    <div class="programs-overlay">
                                      <div class="dt-sc-pro-title">
                                        <h3><?php echo $value['package_name'] ?></h3>
                                        <span><?php echo $value['package_details'] ?></span> </div>
                                    </div>
                                  </div>
                                  <div class="dt-sc-pro-detail">
                                    <div class="dt-sc-pro-price">
                                      <p class="pro-price-content"> <sup>&#x20B9;</sup><?php echo round($value['package_amount'])?>/<span>Per Months</span> </p>
                                      <a class="dt-sc-button  small" data-hover="Enroll Now"  onclick="insertPackage('<?php echo $value['package_id']?>','<?php echo $customer_id ?>')">Enroll Now</a> </div>
                                  </div>
                                </div>
                              </li>
                            <?php $cnt++; endif; endforeach; ?>
                              
                            </ul>

                          </div>

                        </li>
                      </ul>
                      <ul class="col-md-12" style="border-top:0.01px solid rgba(255,255,255,0.2); list-style: none;">
                     <li> <a class="dt-sc-button small" href="<?php echo base_url('packages/packagesView');?>" data-hover="Enroll Now">View More</a>
                        </ul>
                    </div>
                    <a class="dt-menu-expand">+</a> </li>

                    <!-- <li class="menu-item-megamenu-parent  megamenu-4-columns-group menu-item-depth-0 <?php echo ($page =='productspage')?"current_page_item":""?>"> <a href="<?php echo base_url();?>product/productView" title=""> Fitness Products </a>
                    <div class="megamenu-child-container">
                      <ul class="sub-menu">
                      <?php  foreach ($menu_cat as $key12 => $value) :
                              $catCnt = 1;
                                foreach ($menu_cat as $key1 => $value1):
                                  if($value1['parent_id'] != 0 && $catCnt<4):
                        ?>
                        <li>
                          <div class="widgettitle"> <a href="#"> <?php echo $value1['name'];?><?php echo $catCnt;?> </a> </div>
                          <ul class="sub-menu">
                        <?php $procnt=1; 
                              foreach ($menu_product as $key => $value3) : 
                                if($value3['category_id'] == $value1['category_id'] && $procnt < 5):
                        ?>
                            <li> <a href="gallery-ii-col-without-sidebar.html"> <?php echo $value3['name'] ?> </a> </li>
                        <?php $procnt++; 
                              endif; 
                              if($procnt == 5): 
                        ?>
                          <li> <a href="<?php echo base_url();?>product/productView"> More... </a> </li>
                          <?php $procnt++; endif;endforeach; ?>
                          </ul>
                          <a class="dt-menu-expand">+</a> 
                        </li>
                      <?php $catCnt++; 
                            endif; endforeach; break;
                            endforeach; 
                      ?>
                        <li> <img src="<?php echo base_url();?>public/images/menu-img.png" alt="" title=""> 
                        <a href="#" class="dt-sc-button small" data-hover="Fitness Facts">Fitness Facts</a> </li>
                      </ul>
                    </div>
                    <a class="dt-menu-expand">+</a> 
                  </li> -->

                  <li class="menu-item-megamenu-parent  megamenu-4-columns-group menu-item-depth-0 <?php echo ($page =='productspage')?"current_page_item":""?>"> <a href="<?php echo base_url();?>product/productView" title=""> Fitness Products </a>
                    <div class="megamenu-child-container">
                      <ul class="sub-menu">
                      <?php $catCnt = 1; foreach ($menu_cat as $key12 => $value) :
                              
                                  if($value['parent_id'] == 0 && $catCnt<4):
                        ?>
                        <li>
                          <div class="widgettitle"> <a href="<?php echo base_url('product/allProductView/').$value['category_id'];?>"> <?php echo $value['name'];?></a> </div>
                          <ul class="sub-menu">
                        <?php $procnt=1; 
                              foreach ($menu_cat as $key1 => $value1) : 
                                if($value1['parent_id'] != 0 && $value['category_id'] == $value1['parent_id'] ):
                        ?>
                            <li> <a href="<?php echo base_url('product/productView/').$value1['category_id'];?>"> <?php echo $value1['name'] ?> </a> </li>
                        <?php $procnt++; 
                              endif; 
                              if($procnt == 5): 
                        ?>
                          <li> <a href="<?php echo base_url();?>product/productView"> More... </a> </li>
                          <?php $procnt++; endif;endforeach; ?>
                          </ul>
                          <a class="dt-menu-expand">+</a> 
                        </li>
                      <?php $catCnt++; 
                            endif; ;
                            endforeach; 
                      ?>
                        <li> <img src="<?php echo base_url();?>public/images/menu-img.png" alt="" title=""> 
                        
                         </li>
                      </ul>
                          <ul class="col-md-12" style="border-top:0.01px solid rgba(255,255,255,0.2); list-style: none;">
                     <li> <a class="dt-sc-button small" href="<?php echo base_url('product/productView');?>" data-hover="Enroll Now">View More</a></li>
                        </ul>
                    </div>
                    <a class="dt-menu-expand">+</a> 
                  </li>
                    
                    
                  <li class="menu-item-simple-parent menu-item-depth-0 <?php echo ($page =='successStories')?"current_page_item":""?>"><a href="<?php echo base_url('Testimonials/testimonialsView');?>">Success Stories </a>
                    <a class="dt-menu-expand">+</a> </li>
                  <li class="menu-item-megamenu-parent  megamenu-4-columns-group menu-item-depth-0 <?php echo ($page =='gallerypage')?"current_page_item":""?>"> <a href="<?php echo base_url('gallery');?>" title=""> Gallery </a>
                    
                    <a class="dt-menu-expand">+</a> </li>
                  <li class="menu-item-simple-parent menu-item-depth-0 <?php echo ($page =='contactpage')?"current_page_item":""?>"><a href="<?php echo base_url('contactUs/contactUsView');?>">Contact</a></li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </header>
    </div>

    
    <!-- header-wrapper ends here -->

    <style>
@media screen and (max-width: 479px) {
.nav-tabs-responsive > li {
    display: none;
    width: 23%;
}
.nav-tabs-responsive > li > a {
    max-width: 100%;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    word-wrap: normal;
    width: 100%;
    width: 100%;
    text-align: center;
    vertical-align: top;
}
.nav-tabs-responsive > li.active {
    width: 54%;
}
.nav-tabs-responsive > li.active:first-child {
    margin-left: 23%;
}
.nav-tabs-responsive > li.active, .nav-tabs-responsive > li.prev, .nav-tabs-responsive > li.next {
    display: block;
}
.nav-tabs-responsive > li.prev, .nav-tabs-responsive > li.next {
    -webkit-transform: scale(0.9);
    transform: scale(0.9);
}
.nav-tabs-responsive > li.next > a, .nav-tabs-responsive > li.prev > a {
    -webkit-transition: none;
    transition: none;
}
.nav-tabs-responsive > li.next > a .text, .nav-tabs-responsive > li.prev > a .text {
    display: none;
}
.nav-tabs-responsive > li.next > a:after, .nav-tabs-responsive > li.next > a:after, .nav-tabs-responsive > li.prev > a:after, .nav-tabs-responsive > li.prev > a:after {
    position: relative;
    top: 1px;
    display: inline-block;
    font-family: 'Glyphicons Halflings';
    font-style: normal;
    font-weight: 400;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
.nav-tabs-responsive > li.prev > a:after {
    content: "\e079";
}
.nav-tabs-responsive > li.next > a:after {
    content: "\e080";
}
.nav-tabs-responsive > li.dropdown > a > .caret {
    display: none;
}
.nav-tabs-responsive > li.dropdown > a:after {
    content: "\e114";
}
.nav-tabs-responsive > li.dropdown.active > a:after {
    display: none;
}
.nav-tabs-responsive > li.dropdown.active > a > .caret {
    display: inline-block;
}
.nav-tabs-responsive > li.dropdown .dropdown-menu.pull-xs-left {
    left: 0;
    right: auto;
}
.nav-tabs-responsive > li.dropdown .dropdown-menu.pull-xs-center {
    right: auto;
    left: 50%;
    -webkit-transform: translateX(-50%);
    -moz-transform: translateX(-50%);
    -ms-transform: translateX(-50%);
    -o-transform: translateX(-50%);
    transform: translateX(-50%);
}
.nav-tabs-responsive > li.dropdown .dropdown-menu.pull-xs-right {
    left: auto;
    right: 0;
}
}
/**
 * Demo Styles
 */
 
.bs-example-tabs .nav-tabs {
    margin-bottom: 15px;
}
 @media (max-width: 479px) {
#narrow-browser-alert {
    display: none;
}
}






/*scss*/
 
@mixin ellipsis() {
 max-width: 100%;
 overflow: hidden;
 text-overflow: ellipsis;
 white-space: nowrap;
 word-wrap: normal;
 width: 100%;
}
 @mixin icon-styles() {
 position: relative;
 top: 1px;
 display: inline-block;
 font-family: 'Glyphicons Halflings';
 font-style: normal;
 font-weight: 400;
 line-height: 1;
 -webkit-font-smoothing: antialiased;
 -moz-osx-font-smoothing: grayscale;
}
 @mixin transform($transform) {
 -webkit-transform: $transform;
 -moz-transform: $transform;
 -ms-transform: $transform;
 -o-transform: $transform;
 transform: $transform;
}
 @media screen and (max-width: 479px) {
.nav-tabs-responsive {
 > li {
 display: none;
 width: 23%;
 > a {
 @include ellipsis();
 width: 100%;
 text-align: center;
 vertical-align: top;
}
 &.active {
 width: 54%;
 &:first-child {
 margin-left: 23%;
}
}
 &.active, &.prev, &.next {
 display: block;
}
 &.prev, &.next {
 -webkit-transform: scale(0.9);
 transform: scale(0.9);
}
 &.next > a, &.prev > a {
 -webkit-transition: none;
 transition: none;
 .text {
 display: none;
}
 &:after, &:after {
 @include icon-styles();
}
}
 &.prev > a:after {
 content: "\e079";
}
 &.next > a:after {
 content: "\e080";
}
 &.dropdown {
 > a > .caret {
 display: none;
}
 > a:after {
 content: "\e114";
}
 &.active > a {
 &:after {
 display: none;
}
 > .caret {
 display: inline-block;
}
}
 .dropdown-menu {
 &.pull-xs-left {
 left: 0;
 right: auto;
}
 &.pull-xs-center {
 right: auto;
 left: 50%;
 @include transform(translateX(-50%));
}
 &.pull-xs-right {
 left: auto;
 right: 0;
}
}
}
}
}
}
.bs-example-tabs .nav-tabs {
    margin-bottom: 15px;
}
 @media (max-width: 479px) {
#narrow-browser-alert {
    display: none;
}
}
</style>
<script>
(function($) {

  'use strict';

  $(document).on('show.bs.tab', '.nav-tabs-responsive [data-toggle="tab"]', function(e) {
    var $target = $(e.target);
    var $tabs = $target.closest('.nav-tabs-responsive');
    var $current = $target.closest('li');
    var $parent = $current.closest('li.dropdown');
    $current = $parent.length > 0 ? $parent : $current;
    var $next = $current.next();
    var $prev = $current.prev();
    var updateDropdownMenu = function($el, position){
      $el
        .find('.dropdown-menu')
        .removeClass('pull-xs-left pull-xs-center pull-xs-right')
        .addClass( 'pull-xs-' + position );
    };

    $tabs.find('>li').removeClass('next prev');
    $prev.addClass('prev');
    $next.addClass('next');
    
    updateDropdownMenu( $prev, 'left' );
    updateDropdownMenu( $current, 'center' );
    updateDropdownMenu( $next, 'right' );
  });

})(jQuery);
</script> 

<!-- products -->
<script src="<?php echo base_url();?>public/js/jquery.zoomtoo.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/shop.style.css" />
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
    $(document).ready(function(){
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'dd/mm/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
</script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/js/datepicker/datepicker.css" />
<!-- products-end -->