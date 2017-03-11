<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Fitness India By Vinod Channa </title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="<?php echo base_url();?>public/assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>public/assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>public/assets/css/form-elements.css">
        <link rel="stylesheet" href="<?php echo base_url();?>public/assets/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url();?>public/css/register.css">
 		<link rel="stylesheet" href="<?php echo base_url();?>public/css/login.css">
        <script type="text/javascript">
            var base_url = '<?php echo base_url();?>';
        </script>
    </head>

    <body>
    
        <!-- Top menu -->
		<nav class="navbar navbar-inverse navbar-no-bg" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.html">Fitness India By Vinod Channa </a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="top-navbar-1">
					<ul class="nav navbar-nav navbar-right">
						<li>
 
							<span class="li-social">
								<a href="#" target="_blank"><i class="fa fa-facebook"></i></a> 
								<a href="#"><i class="fa fa-twitter"></i></a> 
								<a href="#" target="_blank"><i class="fa fa-youtube-play"></i></a> 
                                
								 
							</span>
						</li>
					</ul>
				</div>
			</div>
		</nav>

        <!-- Top content -->
        <div class="top-content">
            <div class="container">
                
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 text">
                        <h1>Request - <strong> New Password!</h1>
                        <div class="description">
                       	    <p>
                                Fitness Training In India  By  <a href="index.html">Vinod Channa..</a>Get To Know Fitness Mantra!
                                
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                <div class="col-sm-4 col-sm-offset-4 alert_msg"></div>
                    <div class="header">
		<div class="header-main">
					
        
 			<div class="header-bottom">
				<div class="header-right w3agile">
					<div class="header-left-bottom agileinfo">
						
					 <form id="forgotPassForm">
						<input type="text"  value="User name" name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'User name';}" id="email"/>  
						<input type="button" onclick="verifyUsername()" value="Submit">
					</form>	
					 
					 
				</div>
				</div>
			  
			</div>
		</div>
</div>
 <p> Don't have account yet?  <a href="register.html">Sign Up </a> </p>
 <div class="copyright">
	<p>© 2016 Fitness India. All rights reserved | by Proxant  <a href="https://www.proxanttech.com/" target="_blank">  Proxant </a></p>
                </div>


      

        <!-- Javascript -->
        <script src="<?php echo base_url();?>public/assets/js/jquery-1.11.1.min.js"></script>
        <script src="<?php echo base_url();?>public/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>public/assets/js/jquery.backstretch.min.js"></script>
        <script src="<?php echo base_url();?>public/assets/js/retina-1.1.0.min.js"></script>
        <script src="<?php echo base_url();?>public/assets/js/scripts.js"></script>
        <script src="<?php echo base_url();?>public/js/registration.js"></script>
        
     <script>
     $('#radioBtn a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);
    
    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
})
     </script>

    </body>

</html>