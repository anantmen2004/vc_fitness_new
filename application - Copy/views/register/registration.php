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
 
        <script type="text/javascript">
            var base_url = '<?php echo base_url();?>';
        </script>
    </head>

    <body>
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
                        <h1>NOT REGISTERED? - <strong>BECOME USER TODAY!</h1>
                        <div class="description">
                            <p>
                                Fitness Training In India  By  <a href="index.html">Vinod Channa..</a>Get To Know Fitness Mantra!
                                
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 form-box">
                        <form role="form" class="f1" id="registrationForm">
                            <h3>Register To Our Website</h3>
                            <p>Fill in the form to get instant access</p>

                            <div class="f1-steps">
                                <div class="f1-progress">
                                    <div class="f1-progress-line" data-now-value="16.66" 
                                    data-number-of-steps="3" style="width: 16.66%;"></div>
                                </div>
                                <div class="f1-step active">
                                    <div class="f1-step-icon"><i class="fa fa-user-plus"></i></div>
                                    <p>New Registration</p>
                                </div>
                                <div class="f1-step">
                                    <div class="f1-step-icon"><i class="fa fa-rupee"></i></div>
                                    <p>Package</p>
                                </div>
                                <div class="f1-step">
                                    <div class="f1-step-icon"><i class="fa fa-user"></i></div>
                                    <p>Account</p>
                                </div>
                            </div>
                            <div class="f1-steps">
                                <div class="col-sm-12 col-sm-offset-0 alert_msg"></div>
                            </div>
                             <fieldset>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-email">Email or Username</label>
                                    <input type="text" name="email" placeholder=" Email or Username" class="f1-email form-control mandatory-field" id="email" onchange="isEmail()" autocomplete="off">
                                    <span class="help-inline col-xs-12 col-sm-7">
                                        <span class="middle input-text-error" id="email_errorlabel"></span>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-password">Password</label>
                                    <input type="password" name="password" placeholder=" Password" class="f1-password form-control mandatory-field" id="password" autocomplete="off">
                                    <span class="help-inline col-xs-12 col-sm-7">
                                        <span class="middle input-text-error" id="password_errorlabel"></span>
                                    </span>
                                </div>
                                
                                <div class="form-group">
                                    <label class="sr-only" for="f1-repeat-password">Repeat password</label>
                                    <input type="password" name="repassword" placeholder=" Repeat password" class="f1-repeat-password form-control mandatory-field" id="repassword" autocomplete="off">
                                    <span class="help-inline col-xs-12 col-sm-7">
                                        <span class="middle input-text-error" id="repeatPassword_errorlabel"></span>
                                    </span>
                                </div>
                                 <div class="form-group">
                                    <label class="sr-only" for="f1-mobile">Mobile No.</label>
                                    <input type="text" onblur="javascript:return check_ismobile(event,this,0);" name="mobile" placeholder=" Mobile No." class="f1-mobile form-control"  id="mobile" onKeyUp="javascript:return check_isnumeric(event,this,0);" maxlength="10" autocomplete="off">
                                    <span class="help-inline col-xs-12 col-sm-7">
                                        <span class="middle input-text-error" id="mobile_errorlabel"></span>
                                    </span>
                                </div>
                                <div class="form-group" id="otp_div">
                                    <label class="sr-only" for="f1-mobile">OTP</label>
                                    <input type="text" name="otp" placeholder=" Enter OTP" class="f1-mobile form-control"  id="otp" maxlength="4" >
                                    <span class="help-inline col-xs-12 col-sm-7">
                                        <span class="middle input-text-error" id="otp_errorlabel"></span>
                                    </span>
                                </div>
                                <div class="f1-buttons" id="verify_mob_btn">
                                     <button type="submit" class="btn btn-primary" onClick="verifyMobile()">Verify Mobile </button>
                                </div>
                                <div class="f1-buttons" id="verify_otp_btn">
                                     <button type="submit" class="btn btn-primary" onClick="verifyOtp()">Verify OTP</button>
                                </div>
                                <div class="f1-buttons" id="nxtBtn">
                                     <button type="submit" class="btn btn-next">Next</button>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-first-name">Select Package</label>
                                      <select name="packageType"  class="f1-first-name" id="packageType">
                                        <option>Select Package</option>
                                        <option>Gold</option>
                                        <option>Sliver</option>
                                    </select> 
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-last-name">Package Price</label>
                                     <select name="packagePrice" class="f1-first-name" id="packagePrice">
                                        <option>Select Package Price</option>
                                        <option>500 Rs.</option>
                                        <option>2000 Rs.</option>
                                    </select> 
                                </div>
                                
                                <div class="form-group">
                                <label for="happy" class="col-sm-4 col-md-4 control-label text-left">Regular Workout?</label>
                                    <div class="col-sm-7 col-md-7">
                                        <div class="input-group">
                                            <div id="radioBtn" class="btn-group">
                                                <!-- <a class="btn btn-primary1 btn-sm active" data-toggle="happy" name="regWorkout" data-title="YES">YES</a>
                                                <a class="btn btn-primary1 btn-sm notActive" data-toggle="happy" name="regWorkout" data-title="NO">NO</a> -->
                                                <input type="radio" name="regWorkout" value="YES" checked="checked"/>YES
                                                <input type="radio" name="regWorkout" value="NO"/>NO
                                            </div>
                                            <!-- <input type="hidden" name="happy" id="happy"> -->
                                        </div>
                                    </div>
                                </div>
                                 <div class="f1-buttons">
                                 <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="button" class="btn btn-next">Next</button>
                                </div>
                            </fieldset>

                            <fieldset>
                                 <div class="form-group">
                                    <label class="sr-only" for="f1-facebook">First Name</label>
                                    <input type="text" name="fname" placeholder="First Name" class="f1-facebook form-control mandatory-field" id="fname">
                                    <span class="help-inline col-xs-12 col-sm-7">
                                        <span class="middle input-text-error" id="fname_errorlabel"></span>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-twitter">Last Name</label>
                                    <input type="text" name="lname" placeholder="Last Name" class="f1-twitter form-control mandatory-field" id="lname">
                                    <span class="help-inline col-xs-12 col-sm-7">
                                        <span class="middle input-text-error" id="lname_errorlabel"></span>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-google-plus">City</label>
                                    <select name="city"  class="f1-first-name" id="city">
                                        <option>Select City</option>
                                        <option>Nagpur</option>
                                        <option>Pune</option>
                                    </select> 
                                </div>
                                <div class="form-group">
                                    <select name="country"  class="f1-first-name" id="country">
                                        <option>Select Country</option>
                                        <option>India</option>
                                        <option>USA</option>
                                    </select> 
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-about-yourself">Address</label>
                                    <textarea name="address" placeholder="Address" 
                                                         class="f1-about-yourself form-control" id="address"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-facebook">Alternate Mobile No.</label>
                                    <input type="text" name="mobile2" placeholder="Alternate Mobile No." class="f1-facebook form-control" id="mobile2">
                                </div>
                                
                                 <div class="form-group">
                                    <label class="sr-only" for="f1-facebook">DOB</label>
                                     <input type="date" class="f1-facebook form-control" id="dob" name="dob" placeholder=""  style="height:44px;"/>
                                </div>
                                
                                <div class="form-group">
                                 <div data-toggle="buttons">
                                  <label class="btn btn-default1 btn-circle  active checked">
                                   <input type="radio" name="gender" value="0"><img src="<?php echo base_url();?>public/images/male.jpg"/></label>
                                  <label class="btn btn-default1 btn-circle ">       
                                  <input type="radio" name="gender" value="1"><img src="<?php echo base_url();?>public/images/female.jpg"/></label>
                                 </div>
                                </div>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="submit" class="btn btn-submit" onclick="registerUser()">Submit</button>
                                </div>
                            </fieldset>
                        
                        </form>
                    </div>
                </div>
                    
            </div>
        </div>


        <!-- Javascript -->
        <script src="<?php echo base_url();?>public/assets/js/jquery-1.11.1.min.js"></script>
        <script src="<?php echo base_url();?>public/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>public/assets/js/jquery.backstretch.min.js"></script>
        <script src="<?php echo base_url();?>public/assets/js/retina-1.1.0.min.js"></script>
        <script src="<?php echo base_url();?>public/assets/js/scripts.js"></script>
        <script src="<?php echo base_url();?>public/js/registration.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>public/js/custom_mapping.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>public/js/form-validation.js"></script> 

        
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