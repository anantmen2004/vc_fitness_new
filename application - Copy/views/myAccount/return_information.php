<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-gb" class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Fitness India By Vinod Channa</title>
<meta name="description" content="">
<meta name="author" content="">

<!-- **Favicon** -->
<link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon" />

<!-- **CSS - stylesheets** -->
<link id="default-css" href="css/style.css" rel="stylesheet" media="all" />
<link id="shortcodes-css" href="css/shortcodes.css" rel="stylesheet" media="all" />
<link id="skin-css" href="skins/green/style.css" rel="stylesheet" media="all" />
<link id="fancy-box" href="css/jquery.fancybox.css" rel="stylesheet" media="all" />
<link href="css/prettyPhoto.css" rel="stylesheet" media="all" />

<!-- **Additional - stylesheets** -->
<link href="css/responsive.css" rel="stylesheet" media="all" />
<link href="css/pace-theme-loading-bar.css" rel="stylesheet" media="all" />

<!-- **Font Awesome** -->
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/flaticon.css">

<!-- **Google - Fonts** -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>

<!-- **Modernizr** -->
<script src="js/modernizr.custom.js"></script>
<script type="text/javascript">
	var mytheme_urls = {
 		stickynav : 'enable'
	};
	</script>
<!-- slider-awards-and-achivements-end -->
<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
<script src="css/bootstrap/jquery.min.js"></script>
<script src="css/bootstrap/bootstrap.min.js"></script>
<!-- slider-awards-and-achivements-end -->
<!-- slider-corporate -->
<script type="text/javascript" src="css/bootstrap/jquery.marquee.js"></script>

<!-- slider-corporate-end -->
<!-- slider-video -->
<script src="css/bootstrap/jquery.classybox.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap/jquery.classybox.min.css" />
<!-- slider-video-end -->
<!-- products -->
<script src="js/jquery.zoomtoo.js"></script>
<link rel="stylesheet" type="text/css" href="css/shop.style.css" />
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<script>
    $(document).ready(function(){
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
</script>
<!-- products-end -->
<!-- my-account -->
<link rel="stylesheet" type="text/css" href="css/easy-responsive-tabs.css " />
     
    <script src="js/easyResponsiveTabs.js"></script>
<!-- my-account-end -->
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
 &.active,  &.prev,  &.next {
 display: block;
}
 &.prev,  &.next {
 -webkit-transform: scale(0.9);
 transform: scale(0.9);
}
 &.next > a,  &.prev > a {
 -webkit-transition: none;
 transition: none;
 .text {
 display: none;
}
 &:after,  &:after {
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
</head>
 
<body>
	 
	<!-- **Wrapper** -->
	<div class="wrapper">
    	<div class="inner-wrapper">
        	<!-- header-wrapper starts here -->
        	<div id="header-wrapper">
            <header id="header">
                    <!-- Top bar starts here -->
                    <div class="top-bar">
                        <div class="container">
                            <div class="dt-sc-contact-info">
                               <p> <i class="fa fa-phone"></i><span>022 65556512</span> <i class="fa fa-envelope"></i><span>info@vinodchanna.com</span> </p>
                            </div>
                            <div class="top-right">
                                <ul>
                                    <li><a title="Login" href="login.html"><span class="fa fa-sign-in"></span>Member Login</a></li>
                                    <li><a title="Register Now" href="register.html"><span class="fa fa-user"></span> Register </a></li>
									 <li><a title="Register Now" href="view-cart.html"><span class="fa fa-cart-arrow-down"></span> View Cart - 0 </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Top bar ends here -->
                    <div class="main-menu-container">
                    	<div class="main-menu">
                            <div id="logo">
                                <a title="Travel" href="index.html"><img title="Fitness" alt="Fitness" src="images/logo.png"></a>
                            </div>
                            <div id="primary-menu">
                                <div class="dt-menu-toggle" id="dt-menu-toggle">Menu<span class="dt-menu-toggle-icon"></span></div>
                                <nav id="main-menu">
                <ul id="menu-main-menu" class="menu">
                  <li class="menu-item-simple-parent menu-item-depth-0"><a href="index.html">Home</a> 
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
                  <li class="current_page_item menu-item-megamenu-parent megamenu-4-columns-group menu-item-depth-0"> <a href="about.html">About</a>
                    <div class="megamenu-child-container">
                      <ul class="sub-menu">
                        <li>
                          <div class="widgettitle"> <a href="about.html">About</a> </div>
                          <div class="menu-item-widget-area-container">
                            <ul>
                              <li>
                                <div class="textwidget">
                                  <p>I would like to share my journey from a middle class family, one normal guy to a professional Bodybuilder to India's no. 1 celebrity trainer and Fitness expert.<br/>
                                    'Perfect practice makes man  Perfect'.</p>
                                  <a href="about.html" class="dt-sc-button small" data-hover="Read More">Read More</a> </div>
                              </li>
                            </ul>
                          </div>
                        </li>
                        <li>
                          <div class="widgettitle"> <a href="awards-achivements.html">Useful Links</a> </div>
                          <div class="menu-item-widget-area-container">
                            <ul>
                              <li>
                                <div class="textwidget">
                                  <ul>
                                    <li> <a href="about.html" title=""> Biography </a> </li>
                                    <li> <a href="press-releases.html" title=""> Press Releases</a> </li>
                                    <li> <a href="awards-achivements.html" title=""> Achievement </a> </li>
                                    <li> <a href="testimonials.html" title=""> Corporate Clients </a> </li>
                                    <li> <a href="#" title=""> Experience </a> </li>
                                    <li> <a href="#" title=""> Why Choose Us </a> </li>
                                  </ul>
                                </div>
                              </li>
                            </ul>
                          </div>
                        </li>
                        <li>
                          <div class="widgettitle"> <a href="certification.html">Become A Trainer</a> </div>
                          <div class="menu-item-widget-area-container">
                            <ul>
                              <li>
                                <article class="blog-entry format-link">
                                  <div class="blog-entry-inner">
                                    <div class="entry-title">
                                      <h4><a href="certification.html">Best Training</a></h4>
                                      <div class="entry-metadata">
                                        <p class="tags"><a href="certification.html">Given By </a> / <a href="about.html">Vinod Channa</a></p>
                                      </div>
                                    </div>
                                    <div class="entry-thumb"> <a href="certification.html"> <img title="" alt="" src="images/certificate.jpg">
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
                          <div class="widgettitle"> <a href="testimonials.html">Testimonials</a> </div>
                          <div class="menu-item-widget-area-container">
                            <ul class="sub-menu">
                              <li>
                                <div class="textwidget">
                                  <div class="type2">
                                    <div class="dt-sc-testimonial">
                                      <blockquote> <q> I am thankful to Vinod not only for training me but giving me tips which will help me maintain my fitness not today or tomorrow but forever. </q> </blockquote>
                                      <div class="author"> <img title="John Doe" alt="John Doe" src="images/team5.jpg"> </div>
                                      <cite> <a href="testimonials.html">John Abrahim</a> <span>Model,Actor</span> </cite> </div>
                                  </div>
                                </div>
                              </li>
                            </ul>
                          </div>
                        </li>
                      </ul>
                    </div>
                    <a class="dt-menu-expand">+</a> </li>
                  <li class="menu-item-megamenu-parent  megamenu-4-columns-group menu-item-depth-0"> <a href="programs.html" title=""> Programs </a>
                    <div class="megamenu-child-container">
                      <ul class="sub-menu">
                        <li>
                          <div class="widgettitle"> <a href="programs.html">Weight Training</a> </div>
                          <ul class="sub-menu">
                            <li> <a href="programs.html"> Chest </a> </li>
                            <li> <a href="programs.html"> Back ,Arms &amp; Legs</a> </li>
                            <li> <a href="programs.html"> Shoulder </a> </li>
                            <li> <a href="programs.html"> Abdominal </a> </li>
                            <li> <a href="programs.html"> More... </a> </li>
                          </ul>
                          <a class="dt-menu-expand">+</a> </li>
                        <li>
                          <div class="widgettitle"> <a href="#">Gadgets Training</a> </div>
                          <ul class="sub-menu">
                            <li> <a href="programs.html"> Bosu Ball Training </a> </li>
                            <li> <a href="programs.html"> Medical Ball Workout </a> </li>
                            <li> <a href="programs.html"> TRX Band Workout </a> </li>
                            <li> <a href="programs.html"> Ladder Workout </a> </li>
                            <li> <a href="programs.html"> More... </a> </li>

                          </ul>
                          <a class="dt-menu-expand">+</a> </li>
                      
                        <li>
                          <div class="widgettitle"> <a href="#">Calithenic & Parkour</a> </div>
                          <ul class="sub-menu">
                            <li> <a href="programs.html"> Hand Stand </a> </li>
                            <li> <a href="programs.html"> Flip </a> </li>
                            <li> <a href="programs.html"> Monkey Jump </a> </li>
                            <li> <a href="programs.html"> Muscle </a> </li>
                            <li> <a href="programs.html"> More...</a> </li>
                          </ul>
                          <a class="dt-menu-expand">+</a> </li>
						  <li>
                          <div class="widgettitle"> <a href="programs.html">More Trainings</a> </div>
                          <div class="menu-item-widget-area-container">
                            <ul>
                              <li>
                                <article class="blog-entry format-link">
                                  <div class="blog-entry-inner">
                                    <div class="entry-title">
                                      <h4><a href="programs.html">Best Training</a></h4>
                                      <div class="entry-metadata">
                                        <p class="tags"><a href="programs.html">Given By </a> / <a href="programs.html">Vinod Channa</a></p>
                                      </div>
                                    </div>
                                    <div class="entry-thumb"> <a href="programs.html"> <img title="" alt="" src="images/blog6.jpg">
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
                        <li class="fulwidth-image-link menu-item-fullwidth">
                          <ul class="sub-menu">
                            <li><span class="nolink-menu"></span>
                              <div class="dt-megamenu-custom-content"><img src="images/mega-menu-img.png" alt="" title=""></div>
                            </li>
                          </ul>
                        </li>
                      </ul>
                    </div>
                    <a class="dt-menu-expand">+</a> </li>
                  <li class="menu-item-megamenu-parent  megamenu-4-columns-group menu-item-depth-0"> <a href="packages.html">Packages</a>
                    <div class="megamenu-child-container">
                      <ul class="sub-menu">
                        <li class="menu-item-fullwidth fill-four-columns">
                          <div class="menu-item-widget-area-container">
                            <ul>
                              <li class="widget">
                                <div class="dt-sc-programs">
                                  <div class="dt-sc-pro-thumb"> <a href="packages.html"><img src="images/event1.jpg" alt="" title=""></a>
                                    <div class="programs-overlay">
                                      <div class="dt-sc-pro-title">
                                        <h3>Muscle Build Pro</h3>
                                        <span>1 yr training program</span> </div>
                                    </div>
                                  </div>
                                  <div class="dt-sc-pro-detail">
                                    <div class="dt-sc-pro-price">
                                      <p class="pro-price-content"> <sup>$</sup> 89.99/<span>6 Months</span> </p>
                                      <a class="dt-sc-button small" href="packages.html" data-hover="Enroll Now">Enroll Now</a> </div>
                                  </div>
                                </div>
                              </li>
                              <li class="widget">
                                <div class="dt-sc-programs">
                                  <div class="dt-sc-pro-thumb"> <a href="packages.html"><img src="images/event3.jpg" alt="" title=""></a>
                                    <div class="programs-overlay">
                                      <div class="dt-sc-pro-title">
                                        <h3>Muscle Build Pro</h3>
                                        <span>1 yr training program</span> </div>
                                    </div>
                                  </div>
                                  <div class="dt-sc-pro-detail">
                                    <div class="dt-sc-pro-price">
                                      <p class="pro-price-content"> <sup>$</sup> 89.99/<span>6 Months</span> </p>
                                      <a class="dt-sc-button small" href="packages.html" data-hover="Enroll Now">Enroll Now</a> </div>
                                  </div>
                                </div>
                              </li>
                              <li class="widget">
                                <div class="dt-sc-programs">
                                  <div class="dt-sc-pro-thumb"> <a href="packages.html"><img src="images/event2.jpg" alt="" title=""></a>
                                    <div class="programs-overlay">
                                      <div class="dt-sc-pro-title">
                                        <h3>Muscle Build Pro</h3>
                                        <span>1 yr training program</span> </div>
                                    </div>
                                  </div>
                                  <div class="dt-sc-pro-detail">
                                    <div class="dt-sc-pro-price">
                                      <p class="pro-price-content"> <sup>$</sup> 89.99/<span>6 Months</span> </p>
                                      <a class="dt-sc-button small" href="packages.html" data-hover="Enroll Now">Enroll Now</a> </div>
                                  </div>
                                </div>
                              </li>
                              <li class="widget">
                                <div class="dt-sc-programs">
                                  <div class="dt-sc-pro-thumb"> <a href="packages.html"><img src="images/event4.jpg" alt="" title=""></a>
                                    <div class="programs-overlay">
                                      <div class="dt-sc-pro-title">
                                        <h3>Muscle Build Pro</h3>
                                        <span>1 yr training program</span> </div>
                                    </div>
                                  </div>
                                  <div class="dt-sc-pro-detail">
                                    <div class="dt-sc-pro-price">
                                      <p class="pro-price-content"> <sup>$</sup> 89.99/<span>6 Months</span> </p>
                                      <a class="dt-sc-button small" href="packages.html" data-hover="Enroll Now">Enroll Now</a> </div>
                                  </div>
                                </div>
                              </li>
                            </ul>
                          </div>
                        </li>
                        <!--<li>
                          <div class="widgettitle"> <a href="#">About</a> </div>
                          <div class="menu-item-widget-area-container">
                            <ul>
                              <li>
                                <div class="textwidget">
                                  <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
                                  <a href="#" class="dt-sc-button small" data-hover="View Programs">View Programs</a> </div>
                              </li>
                            </ul>
                          </div>
                        </li>--> 
                        <!--<li>
                          <div class="widgettitle"> <a href="#">Useful Links</a> </div>
                          <div class="menu-item-widget-area-container">
                            <ul>
                              <li>
                                <div class="textwidget">
                                  <ul>
                                    <li> <a href="#" title=""> Food Habits </a> </li>
                                    <li> <a href="#" title=""> Check your Body Mass Ratio </a> </li>
                                    <li> <a href="#" title=""> Create a Workout Pattern </a> </li>
                                    <li> <a href="#" title=""> Before and After Pictures </a> </li>
                                    <li> <a href="#" title=""> Tips for Healthy a Lifestyle </a> </li>
                                    <li> <a href="#" title=""> Ripping out the best body </a> </li>
                                  </ul>
                                </div>
                              </li>
                            </ul>
                          </div>
                        </li>--> 
                        <!--<li>
                          <div class="widgettitle"> <a href="#">Latest Blog</a> </div>
                          <div class="menu-item-widget-area-container">
                            <ul>
                              <li>
                                <article class="blog-entry format-link">
                                  <div class="blog-entry-inner">
                                    <div class="entry-title">
                                      <h4><a href="#">Best Cardio Exercise</a></h4>
                                      <div class="entry-metadata">
                                        <p class="tags"><a href="#">Workout </a> / <a href="#"> Diet</a></p>
                                      </div>
                                    </div>
                                    <div class="entry-thumb"> <a href="blog-detail.html"> <img title="" alt="" src="images/blog1.jpg">
                                      <div class="blog-overlay"><span class="image-overlay-inside"></span></div>
                                      </a>
                                      <div class="entry-meta">
                                        <div class="date"> <span>21</span> mar<br>
                                          2014 </div>
                                      </div>
                                    </div>
                                  </div>
                                </article>
                              </li>
                            </ul>
                          </div>
                        </li>--> 
                        <!--<li>
                          <div class="widgettitle"> <a href="#">Testimonials</a> </div>
                          <div class="menu-item-widget-area-container">
                            <ul class="sub-menu">
                              <li>
                                <div class="textwidget">
                                  <div class="type2">
                                    <div class="dt-sc-testimonial">
                                      <blockquote> <q> By injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. </q> </blockquote>
                                      <div class="author"> <img title="John Doe" alt="John Doe" src="images/team5.jpg"> </div>
                                      <cite> <a href="#">Jeniffer Aniston</a> <span>Actor</span> </cite> </div>
                                  </div>
                                </div>
                              </li>
                            </ul>
                          </div>
                        </li>-->
                      </ul>
                    </div>
                    <a class="dt-menu-expand">+</a> </li>
                  <li class="menu-item-megamenu-parent  megamenu-4-columns-group menu-item-depth-0"> <a href="products.html" title=""> Fitness Products </a>
                    <div class="megamenu-child-container">
                      <ul class="sub-menu">
                        <li>
                          <div class="widgettitle"> <a href="products.html"> II Column </a> </div>
                          <ul class="sub-menu">
                            <li> <a href="products.html"> Without Sidebar </a> </li>
                            <li> <a href="products.html"> With Left Sidebar </a> </li>
                            <li> <a href="products.html"> With Right Sidebar </a> </li>
                            <li> <a href="products.html"> With Both Sidebar </a> </li>
                            <li> <a href="products.html"> Fullwidth </a> </li>
                          </ul>
                          <a class="dt-menu-expand">+</a> </li>
                        <li>
                          <div class="widgettitle"> <a href="products.html"> III Column </a> </div>
                          <ul class="sub-menu">
                            <li> <a href="products.html"> Without Sidebar </a> </li>
                            <li> <a href="products.html"> With Left Sidebar </a> </li>
                            <li> <a href="products.html"> With Right Sidebar </a> </li>
                            <li> <a href="products.html"> With Both Sidebar </a> </li>
                            <li> <a href="products.html"> Fullwidth </a> </li>
                          </ul>
                          <a class="dt-menu-expand">+</a> </li>
                        <li>
                          <div class="widgettitle"> <a href="#"> IV Column </a> </div>
                          <ul class="sub-menu">
                            <li> <a href="products.html"> Without Sidebar </a> </li>
                            <li> <a href="products.html"> With Left Sidebar </a> </li>
                            <li> <a href="products.html"> With Right Sidebar </a> </li>
                            <li> <a href="products.html"> With Both Sidebar </a> </li>
                            <li> <a href="products.html"> Fullwidth </a> </li>
                          </ul>
                          <a class="dt-menu-expand">+</a> </li>
                        <li> <img src="images/menu-img.png" alt="" title=""> <a href="fitness-facts.html" class="dt-sc-button small" data-hover="Fitness Facts">Fitness Facts</a> </li>
                      </ul>
                    </div>
                    <a class="dt-menu-expand">+</a> </li>
                  <li class="menu-item-simple-parent menu-item-depth-0"><a href="testimonials.html">Success Stories </a> 
                    <!--<ul class="sub-menu">
                      <li><a href="package-detail.html">Package Detail</a></li>
                      <li><a href="workouts-detail.html">Workouts Detail</a></li>
                    </ul>--> 
                    <!-- <a class="dt-menu-expand">+</a>  --></li>
                  
                  <!--<li class="menu-item-megamenu-parent  megamenu-4-columns-group menu-item-depth-0"> <a href="blog-ii-col-without-sidebar.html" title="">Blog</a>
                    <div class="megamenu-child-container">
                      <ul class="sub-menu">
                        <li>
                          <div class="widgettitle"> <a href="#">I Column</a> </div>
                          <ul class="sub-menu">
                            <li> <a href="blog-i-col-without-sidebar.html"> Without Sidebar </a> </li>
                            <li> <a href="blog-i-col-with-left-sidebar.html"> With Left Sidebar </a> </li>
                            <li> <a href="blog-i-col-with-right-sidebar.html"> With Right Sidebar </a> </li>
                            <li> <a href="blog-i-col-with-both-sidebar.html"> With Both Sidebar </a> </li>
                          </ul>
                          <a class="dt-menu-expand">+</a> </li>
                        <li>
                          <div class="widgettitle"> <a href="#"> II Column</a> </div>
                          <ul class="sub-menu">
                            <li> <a href="blog-ii-col-without-sidebar.html"> Without Sidebar </a> </li>
                            <li> <a href="blog-ii-col-with-left-sidebar.html"> With Left Sidebar </a> </li>
                            <li> <a href="blog-ii-col-with-right-sidebar.html"> With Right Sidebar </a> </li>
                            <li> <a href="blog-ii-col-with-both-sidebar.html"> With Both Sidebar </a> </li>
                          </ul>
                          <a class="dt-menu-expand">+</a> </li>
                        <li>
                          <div class="widgettitle"> <a href="#">III Column</a> </div>
                          <ul class="sub-menu">
                            <li> <a href="blog-iii-col-without-sidebar.html"> Without Sidebar </a> </li>
                            <li> <a href="blog-iii-col-with-left-sidebar.html"> With Left Sidebar </a> </li>
                            <li> <a href="blog-iii-col-with-right-sidebar.html"> With Right Sidebar </a> </li>
                            <li> <a href="blog-iii-col-with-both-sidebar.html"> With Both Sidebar </a> </li>
                          </ul>
                          <a class="dt-menu-expand">+</a> </li>
                        <li>
                          <div class="widgettitle"> <a href="#">Thumb Image</a> </div>
                          <ul class="sub-menu">
                            <li> <a href="blog-thumb-without-sidebar.html"> Without Sidebar </a> </li>
                            <li> <a href="blog-thumb-with-left-sidebar.html"> With Left Sidebar </a> </li>
                            <li> <a href="blog-thumb-with-right-sidebar.html"> With Right Sidebar </a> </li>
                            <li> <a href="blog-thumb-with-both-sidebar.html"> With Both Sidebar </a> </li>
                          </ul>
                          <a class="dt-menu-expand">+</a> </li>
                      </ul>
                    </div>
                    <a class="dt-menu-expand">+</a> </li>-->
                  <li class="menu-item-megamenu-parent  megamenu-4-columns-group menu-item-depth-0"> <a href="gallery.html" title=""> Gallery </a> 
                    <!--<div class="megamenu-child-container">
                      <ul class="sub-menu">
                        <li>
                          <div class="widgettitle"> <a href="#"> II Column </a> </div>
                          <ul class="sub-menu">
                            <li> <a href="gallery-ii-col-without-sidebar.html"> Without Sidebar </a> </li>
                            <li> <a href="gallery-ii-col-with-left-sidebar.html"> With Left Sidebar </a> </li>
                            <li> <a href="gallery-ii-col-with-right-sidebar.html"> With Right Sidebar </a> </li>
                            <li> <a href="gallery-ii-col-with-both-sidebar.html"> With Both Sidebar </a> </li>
                            <li> <a href="gallery-ii-col-fullwidth.html"> Fullwidth </a> </li>
                          </ul>
                          <a class="dt-menu-expand">+</a> </li>
                        <li>
                          <div class="widgettitle"> <a href="#"> III Column </a> </div>
                          <ul class="sub-menu">
                            <li> <a href="gallery-iii-col-without-sidebar.html"> Without Sidebar </a> </li>
                            <li> <a href="gallery-iii-col-with-left-sidebar.html"> With Left Sidebar </a> </li>
                            <li> <a href="gallery-iii-col-with-right-sidebar.html"> With Right Sidebar </a> </li>
                            <li> <a href="gallery-iii-col-with-both-sidebar.html"> With Both Sidebar </a> </li>
                            <li> <a href="gallery-iii-col-fullwidth.html"> Fullwidth </a> </li>
                          </ul>
                          <a class="dt-menu-expand">+</a> </li>
                        <li>
                          <div class="widgettitle"> <a href="#"> IV Column </a> </div>
                          <ul class="sub-menu">
                            <li> <a href="gallery-iv-col-without-sidebar.html"> Without Sidebar </a> </li>
                            <li> <a href="gallery-iv-col-with-left-sidebar.html"> With Left Sidebar </a> </li>
                            <li> <a href="gallery-iv-col-with-right-sidebar.html"> With Right Sidebar </a> </li>
                            <li> <a href="gallery-iv-col-with-both-sidebar.html"> With Both Sidebar </a> </li>
                            <li> <a href="gallery-iv-col-fullwidth.html"> Fullwidth </a> </li>
                          </ul>
                          <a class="dt-menu-expand">+</a> </li>
                        <li> <img src="images/menu-img.png" alt="" title=""> </li>
                      </ul>
                    </div>--> 
                    <!-- <a class="dt-menu-expand">+</a> --> </li>
                  <li class="menu-item-simple-parent menu-item-depth-0"><a href="contact.html">Contact</a> 
                    <!--<ul class="sub-menu">
                      <li><a href="contact.html">Layout 1</a></li>
                      <li><a href="contact2.html">Layout 2</a></li>
                    </ul>--> 
                    <!--<a class="dt-menu-expand">+</a> --></li>
                </ul>
              </nav>
                            </div>
                        </div>
                    </div>
				</header>
			</div>
            <!-- header-wrapper ends here -->
            
            <div id="main">
                <!-- main-content starts here -->
                <div id="main-content">
                     <section id="primary" class="content-full-width">
                        <div class="dt-sc-hr-invisible"></div>
                          <div class="fullwidth-section dt-sc-paralax full-pattern3">
                            <div class="container">
                                <h3 class="border-title"> <span>Return Information </span> </h3>
                             	<div class="intro-text type2 animate" data-animation="fadeInUp" data-delay="100">
                                	<div class="dt-sc-one first">
                                  <!-- Return Details -->
	                                	 <table class="list table table-bordered table-hover">
        <thead>
          <tr>
            <td class="text-left" colspan="2">Return Details</td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-left" style="width: 50%;"><b>Return ID:</b> #7<br>
              <b>Date Added:</b> 01/03/2017</td>
            <td class="text-left" style="width: 50%;"><b>Order ID:</b> #101<br>
              <b>Order Date:</b> 01/03/2017</td>
          </tr>
        </tbody>
      </table>
      <!-- Return Details end -->

      <!-- Product Information & Reason for Return -->
      <h4>Product Information & Reason for Return</h4>
      <table class="list table table-bordered table-hover">
        <thead>
          <tr>
            <td class="text-left" style="width: 33.3%;">Product Name</td>
            <td class="text-left" style="width: 33.3%;">Model</td>
            <td class="text-right" style="width: 33.3%;">Quantity</td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-left">Diced Papaya</td>
            <td class="text-left">Diced Papaya</td>
            <td class="text-right">1</td>
          </tr>
        </tbody>
      </table>
      <table class="list table table-bordered table-hover">
        <thead>
          <tr>
            <td class="text-left" style="width: 33.3%;">Reason</td>
            <td class="text-left" style="width: 33.3%;">Opened</td>
            <td class="text-left" style="width: 33.3%;">Action</td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-left">Dead On Arrival</td>
            <td class="text-left">No</td>
            <td class="text-left"></td>
          </tr>
        </tbody>
      </table>
       <!-- Product Information & Reason for Return-end -->
      

         <a href="my-account.html" class="dt-sc-button small pull-right" data-hover="Read More">Continue</a>
                                    </div>
                                    
                                </div>
                            </div>
						</div>
                           
                        <!-- welcome-txt ends here -->
                        <div class="dt-sc-hr-invisible-small"></div>
                     </section>
				</div>
                <!-- main-content ends here -->
                
            </div>
            <!-- footer starts here -->
            <footer id="footer">
            	<div class="footer-widgets-wrapper">
                	<div class="container">
                    	<div class="column dt-sc-one-fourth first">
                        	<aside class="widget widget_text">
                                <div class="textwidget">
                                	<h3 class="widgettitle"><span class="fa fa-user"></span>About Us</h3>
                                    <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here,  making it look like readable English. </p>
                                    <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters</p>
                                </div>
                            </aside>
                        </div>
                        <div class="column dt-sc-one-fourth">
							<aside class="widget widget_text">
                            	<h3 class="widgettitle"><span class="fa fa-link"></span>Useful Links</h3>
                                <div class="textwidget">
                                    <ul>
                                        <li><a href="#">Fitness Tips</a></li>
                                        <li><a href="#">Faq's</a></li>
                                        <li><a href="#">Workout Programs</a></li>
                                        <li><a href="#">Fitness Camps</a></li>
                                        <li><a href="#">Blogs</a></li>
                                        <li><a href="#">Fitness Updates</a></li>
                                    </ul>
                                </div>
                            </aside>
						</div>
						<div class="column dt-sc-one-fourth">
                        	<aside class="widget widget_tweetbox">
                            	<h3 class="widgettitle"><span class="fa fa-twitter"></span>Twitter Updates</h3>
                                <div class="tweet_list"> </div>
                            </aside>
						</div>
                        <div class="column dt-sc-one-fourth">
                        	<aside class="widget widget_recent_entries">
                            	<h3 class="widgettitle"><span class="fa fa-calendar"></span>Upcoming Events</h3>
                                <div class="recent-posts-widget">
                                	<ul>
                                    	<li>
                                        	<a href="#" class="entry-thumb"><img src="images/blog-thumb.jpg" alt="" title=""></a>
                                            <h4><a href="#">Training with Dumbell</a></h4>
                                            <div class="entry-metadata">
                                            	<p class="date">26 May 2014</p>
                                            </div>
                                        </li>
                                        <li>
                                        	<a href="#" class="entry-thumb"><img src="images/blog-thumb1.jpg" alt="" title=""></a>
                                            <h4><a href="#">Create the Adonis Effect</a></h4>
                                            <div class="entry-metadata">
                                            	<p class="date">24 May 2014</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
							</aside>
					    </div>
                    </div>
                    <div class="social-media-container">
                    	<div class="social-media">
                        	<div class="container">
                                <div class="dt-sc-contact-info dt-phone">
                                	<p><i class="fa fa-phone"></i> <span>953 224 2235 221</span> </p>
                                </div>
                                <ul class="dt-sc-social-icons">
                                    <li class="facebook"><a href="#" class="fa fa-facebook"></a></li>
                                    <li class="google"><a href="#" class="fa fa-google-plus"></a></li>
                                    <li class="twitter"><a href="#" class="fa fa-twitter"></a></li>
                                    <li class="youtube"><a href="#" class="fa fa-youtube"></a></li>
                                    <li class="rss"><a href="#" class="fa fa-rss"></a></li>
                                </ul>
                            </div>
                        </div>
					</div>
                </div>
                <div class="copyright">
                	<div class="container">
                    	<ul class="footer-links">
                        	<li><a href="#"> About Us </a></li>
                            <li><a href="#">  Help Centre </a></li>
                            <li><a href="#"> Site Map </a></li>
                        </ul>
                       <p>&copy; 2016 - FitnessIndia. By <a href="http://proxanttech.com/" target="_blank">Proxant</a></p>
                    </div>
                </div>
            </footer>
            <!-- footer ends here -->
            
	</div><!-- **Inner Wrapper - End** -->
</div><!-- **Wrapper - End** -->




<!-- **jQuery** -->
 

<!--show-hide-data---> 
<script language="JavaScript">
function ShowHide(divId)
{
if(document.getElementById(divId).style.display == 'none')
{
document.getElementById(divId).style.display='block';
}
else
{
document.getElementById(divId).style.display = 'none';
}
}
</script> 
<!--show hide-data-end--> 
<!-- slider-corporate --> 
<script type="text/javascript">
  
  $(function(){


  $('#marquee-vertical').marquee();  
  $('#marquee-horizontal').marquee({direction:'horizontal', delay:0, timing:50});  

});

</script> 
<!-- slider-corporate-end --> 
<!-- slider-video --> 
<script>
$(document).ready(function() {
  $('#media').carousel({
    pause: true,
    interval: false,
  });
    $('#media1').carousel({
    pause: true,
    interval: false,
  });
     $('#media2').carousel({
    pause: true,
    interval: false,
  });
    $('#media3').carousel({
    pause: true,
    interval: false,
  });
   $('#media4').carousel({
    pause: true,
    interval: false,
  }); 
  $('#media5').carousel({
    pause: true,
    interval: false,
  }); 
   $('#media6').carousel({
    pause: true,
    interval: false,
  });
  $('#media7').carousel({
    pause: true,
    interval: false,
  });
  $('#media8').carousel({
    pause: true,
    interval: false,
  });
  $('#media9').carousel({
    pause: true,
    interval: false,
  }); 
   $('#media10').carousel({
    pause: true,
    interval: false,
  });
  $('#media11').carousel({
    pause: true,
    interval: false,
  });
  $('#media12').carousel({
    pause: true,
    interval: false,
  });
   $('#media13').carousel({
    pause: true,
    interval: false,
  });
  $('#media14').carousel({
    pause: true,
    interval: false,
  }); 
   $('#media15').carousel({
    pause: true,
    interval: false,
  });
  $('#media16').carousel({
    pause: true,
    interval: false,
  });
  $('#media17').carousel({
    pause: true,
    interval: false,
  });
   $('#media18').carousel({
    pause: true,
    interval: false,
  });
   $('#media30').carousel({
    pause: true,
    interval: false,
  });
   $('#media31').carousel({
    pause: true,
    interval: false,
  });
   $('#media32').carousel({
    pause: true,
    interval: false,
  });
  
   $('#media33').carousel({
    pause: true,
    interval: false,
  });
   $('#media34').carousel({
    pause: true,
    interval: false,
  });
   $('#media35').carousel({
    pause: true,
    interval: false,
  });
   $('#media36').carousel({
    pause: true,
    interval: false,
  });
   $('#media37').carousel({
    pause: true,
    interval: false,
  });
   $('#media38').carousel({
    pause: true,
    interval: false,
  });
   $('#media39').carousel({
    pause: true,
    interval: false,
  });
   $('#media40').carousel({
    pause: true,
    interval: false,
  });
   $('#media41').carousel({
    pause: true,
    interval: false,
  });
   $('#media42').carousel({
    pause: true,
    interval: false,
  });
   $('#media43').carousel({
    pause: true,
    interval: false,
  });
   $('#media44').carousel({
    pause: true,
    interval: false,
  });
   $('#media45').carousel({
    pause: true,
    interval: false,
  });
   $('#media46').carousel({
    pause: true,
    interval: false,
  });
   $('#media47').carousel({
    pause: true,
    interval: false,
  });
   $('#media48').carousel({
    pause: true,
    interval: false,
  });
   $('#media49').carousel({
    pause: true,
    interval: false,
  });
});
</script> 
<script>
                                        $(document).ready(function() {
                                            $(".gallery a").ClassyBox();
                                            $(".player a").ClassyBox();
                                            $(".video a").ClassyBox({
                                                width: 900,
                                                title: 0
                                            });
                                            $("#frame").ClassyBox({
                                                iframe: 1,
                                                social: 0,
                                                height: 600,
                                                width: 900
                                            });
                                            $("#ajax").ClassyBox({
                                                height: 450,
                                                width: 555,
                                                ajaxSuccess: function(data) {
                                                    $(".classybox-wrap .content").append(data);
                                                }
                                            });
                                            $('a[href*="vimeo"], a[href*="vevo"], a[href*="dailymotion"], a[href*="5min"], a[href*="ustream"], a[href*="metacafe"], a[href*="hell"], a[href*="myspace"]').ClassyBox({
                                                height: 500,
                                                width: 850
                                            });
                                            $(window).ClassyBox({
                                                autoDetect: 1
                                            });
                                        });
                                    </script> 
<!-- slider-video-end --> 
<!--programs--> 
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

<!--programs-end--> 
<!--products--> 
<script>
$(document).ready(function(e){
    $('.search-panel .dropdown-menu').find('a').click(function(e) {
    	e.preventDefault();
		var param = $(this).attr("href").replace("#","");
		var concept = $(this).text();
		$('.search-panel span#search_concept').text(concept);
		$('.input-group #search_param').val(param);
	});
});
</script> 
<script>
$(document).ready(function() {
    $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
    $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
});
</script> 

<!-- Item slider end--> 
<script>
(function(){

  $('#itemslider').carousel({ interval: 3000 });
}());

(function(){
  $('.carousel-showmanymoveone .item').each(function(){
    var itemToClone = $(this);

    for (var i=1;i<6;i++) {
      itemToClone = itemToClone.next();


      if (!itemToClone.length) {
        itemToClone = $(this).siblings(':first');
      }


      itemToClone.children(':first-child').clone()
        .addClass("cloneditem-"+(i))
        .appendTo($(this));
    }
  });
}());

</script> 
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script> 
<script>
 $(".ddd").on("click", function () {

    var $button = $(this);
    var oldValue = $button.closest('.sp-quantity').find("input.quntity-input").val();

    if ($button.text() == "+") {
        var newVal = parseFloat(oldValue) + 1;
    } else {
        // Don't allow decrementing below zero
        if (oldValue > 0) {
            var newVal = parseFloat(oldValue) - 1;
        } else {
            newVal = 0;
        }
    }

    $button.closest('.sp-quantity').find("input.quntity-input").val(newVal);

});
 </script> 
<script>
			$(function() {
				$("#picture-frame").zoomToo({
					magnify: 1
				});
			});
		</script> 
<!--products-end--> 
<!-- **jQuery** --> 
<script type="text/javascript" src="js/jquery.isotope.min.js"></script> 
<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script> 

<!-- **jQuery** --> 
<script type="text/javascript" src="js/jquery.js"></script> 
<script type="text/javascript" src="js/jquery-migrate.min.js"></script> 
<script type="text/javascript" src="js/jquery.plugins.min.js"></script> 
<script type="text/javascript" src="js/jquery.nicescroll.min.js"></script> 
<script type="text/javascript" src="http://www.google.com/jsapi"></script> 
 <script type="text/javascript" src="js/contact.js"></script> 
<!-- **jQuery** -->
  <script type="text/javascript" src="js/pace.min.js"></script>
 <script type="text/javascript" src="js/jquery.isotope.min.js"></script>
<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
 <script type="text/javascript" src="js/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="js/jquery.ui.totop.min.js"></script>
 <script type="text/javascript" src="js/retina.js"></script>
 <script type="text/javascript" src="js/twitter/jquery.tweet.min.js"></script>
 <script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
   <script type="text/javascript" src="js/jquery.carouFredSel-6.2.1-packed.js"></script> 
<script type="text/javascript" src="js/pace.min.js"></script> 
<script type="text/javascript" src="js/jquery.tabs.min.js"></script> 
<script type="text/javascript" src="js/jquery.tipTip.minified.js"></script> 
 <script type="text/javascript" src="js/jquery-transit-modified.js"></script> 
<script type="text/javascript" src="js/layerslider.kreaturamedia.jquery.js"></script> 
<script type='text/javascript' src="js/greensock.js"></script> 
<script type='text/javascript' src="js/layerslider.transitions.js"></script> 

<!-- my-account -->
<!--Plug-in Initialisation-->
  <script type="text/javascript">
    $(document).ready(function() {
        //Horizontal Tab
        $('#parentHorizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#nested-tabInfo');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });

        // Child Tab
        $('#ChildVerticalTab_1').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true,
            tabidentify: 'ver_1', // The tab groups identifier
            activetab_bg: '#fff', // background color for active tabs in this group
            inactive_bg: '#F5F5F5', // background color for inactive tabs in this group
            active_border_color: '#c1c1c1', // border color for active tabs heads in this group
            active_content_border_color: '#5AB1D0' // border color for active tabs contect in this group so that it matches the tab head border
        });


        // Child Tab
        $('#ChildVerticalTab_2').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true,
            tabidentify: 'ver_2', // The tab groups identifier
            activetab_bg: '#fff', // background color for active tabs in this group
            inactive_bg: '#F5F5F5', // background color for inactive tabs in this group
            active_border_color: '#c1c1c1', // border color for active tabs heads in this group
            active_content_border_color: '#5AB1D0' // border color for active tabs contect in this group so that it matches the tab head border
        });

        //  // Child Tab
        // $('#ChildVerticalTab_3').easyResponsiveTabs({
        //     type: 'vertical',
        //     width: 'auto',
        //     fit: true,
        //     tabidentify: 'ver_3', // The tab groups identifier
        //     activetab_bg: '#fff', // background color for active tabs in this group
        //     inactive_bg: '#F5F5F5', // background color for inactive tabs in this group
        //     active_border_color: '#c1c1c1', // border color for active tabs heads in this group
        //     active_content_border_color: '#5AB1D0' // border color for active tabs contect in this group so that it matches the tab head border
        // });

        
    });
</script>
</body>

</html>