$(document).ready(function() {
    //alert(123);
    $("#otp_div").hide();
    $("#verify_otp_btn").hide();
    $("#nxtBtn").hide();

    $("#nxtBtn").click(function(){
        $(".alert_msg").html("");   
    });
    
});


function display_alert(type,message)
{
    var alert_msg = '';
    if(type == 'err')
    {
        alert_msg += '<div class="alert alert-danger" role="alert" style="padding: 0px;">';
        alert_msg += '<span style="text-align:center"><strong>'+message+'</strong></span></div>';
    }
    else if(type == 'warn')
    {
        alert_msg += '<div class="alert alert-warning" role="alert" style="padding: 0px;">';
        alert_msg += '<span style="text-align:center"><strong>'+message+'</strong></span></div>';
    }
    else if(type == 'succ')
    {
        alert_msg += '<div class="alert alert-success" role="alert" style="padding: 0px;">';
        alert_msg += '<span style="text-align:center"><strong>'+message+'</strong></span></div>';
    }

    $(".alert_msg").html(alert_msg);

    setTimeout(function(){
        $(".alert_msg").html("");       
    },3000);
}
function display_fix_alert(type,message)
{
    var alert_msg = '';
    if(type == 'err')
    {
        alert_msg += '<div class="alert alert-danger" role="alert" style="padding: 0px;">';
        alert_msg += '<span style="text-align:center"><strong>'+message+'</strong></span></div>';
    }
    else if(type == 'warn')
    {
        alert_msg += '<div class="alert alert-warning" role="alert" style="padding: 0px;">';
        alert_msg += '<span style="text-align:center"><strong>'+message+'</strong></span></div>';
    }
    else if(type == 'succ')
    {
        alert_msg += '<div class="alert alert-success" role="alert" style="padding: 0px;">';
        alert_msg += '<span style="text-align:center"><strong>'+message+'</strong></span></div>';
    }

    $(".alert_msg").html(alert_msg);

    // setTimeout(function(){
    //     $(".nxtBtn").html("");       
    // },3000);
}
/**************/
function isEmail() {
    var email = $("#email").val();
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var ans = regex.test(email);
      if(ans == false)
      {
         $("#email").css({'border-color':'red'});
         $("#email").val("");

          var msg = 'Please Enter Valid Email id.';
          display_alert('err',msg);

      }
}
/***************/
function validate_mobile()
{
    $("#mobile").val($("#mobile").val().replace(/[^\d]/ig, ''));
    $("#mobile2").val($("#mobile2").val().replace(/[^\d]/ig, ''));
    $("#registration_monthly_income").val($("#registration_monthly_income").val().replace(/[^\d]/ig, '')); 
}
/********************/
function verifyMobile()
{
    var check = 1;
    var email = $("#email").val();
    var pass = $("#password").val();
    var repass = $("#repassword").val();
    var mobile = $("#mobile").val();
    
    if($("#email").val() == "")
    {
        $("#email").css({'border-color':'red'});
        check = 0;
    }
    else
    {
        $("#email").css({'border-color':'#CCC'});
    }
    if($("#mobile").val() == "")
    {
        $("#mobile").css({'border-color':'red'});
        check = 0;
    }
    else
    {
        $("#mobile").css({'border-color':'#CCC'});
    }
    if($("#password").val() == "")
    {
        $("#password").css({'border-color':'red'});
        check = 0;
    }
    else
    {
        $("#password").css({'border-color':'#CCC'});
    }
    if($("#repassword").val() == "")
    {
        $("#repassword").css({'border-color':'red'});
        check = 0;
    }
    else
    {
        $("#repassword").css({'border-color':'#CCC'});
    }
    if(check == 0)
    {
        var msg = 'All fields are compulsary';
        display_alert('err',msg);
    }
    else
    {   
        if(pass == repass)
        {  
        var path = base_url+"auth/verifyUser";
        $.ajax({
            type:'POST',
            url:path,
            data:"email="+email+"&mobile="+mobile,
            success:function(resp)
            { 
                if(resp!=0) 
                {
                    alert(resp);
                    document.getElementById("email").readOnly = true;
                    document.getElementById("mobile").readOnly = true;
                    $("#otp_div").show();
                    $("#verify_otp_btn").show();
                    $("#verify_mob_btn").hide();
                    var msg = 'Enter OTP Which you received on your mobile !';
                    display_fix_alert('succ',msg);
                    $("#otp").css({'border-color':'green'});
                }
                else if(resp == 0)
                {
                    var msg = 'Email id Or Mobile already exist.';
                    display_fix_alert('err',msg);   
                }
            }   
            });
        }
        else
        {
            var msg = 'Password And Confirm Password Does Not match.';
            display_alert('err',msg);   
        }
    } 
}
/*************/
function verifyOtp()
{
    var mobile = $("#mobile").val();
    var otp = $("#otp").val();

    $("#otp_div").show();
    var check = 1;
    if($("#otp").val() == "")
    {
        $("#otp").css({'border-color':'red'});
        check = 0;
    }
    else
    {
        $("#otp").css({'border-color':'#CCC'});
    }
    if(check == 0)
    {
        var msg = 'All fields are compulsary';
        display_alert('err',msg);
    }
    else
    {  
        var path = base_url+"auth/verifyRegOtp";
        $.ajax({
            type:'POST',
            url:path,
            data:"otp="+otp+"&mobile="+mobile,
            success:function(resp)
            { 
                if(resp==1) 
                {
                    // alert(resp);
                    var msg = 'Congratulation.! Now You can go for Next step';
                    display_fix_alert('succ',msg); 
                    document.getElementById("email").readOnly = true;
                    document.getElementById("mobile").readOnly = true;
                    // $("#email").html('readonly');
                    $("#verify_otp_btn").hide();
                    $("#verify_mob_btn").hide();
                    $("#nxtBtn").show();
                    // var msg = 'Enter OTP  !';
                    // display_alert('succ',msg);
                }
                else if(resp == 0)
                {
                    var msg = 'Please Enter Valid OTP.';
                    display_fix_alert('err',msg);  
                    document.getElementById("email").readOnly = true;
                    document.getElementById("mobile").readOnly = true;
                    $("#otp_div").show();
                    $("#verify_otp_btn").show();
                    $("#verify_mob_btn").hide();
                    $("#otp").val(''); 
                    $("#otp").css({'border-color':'red'});
                }
            }   
            });
        
    } 
    
}
/*********************/
function registerUser()
{
    var check = 1;
    if($("#fname").val() == "")
    {
        $("#fname").css({'border-color':'red'});
        check = 0;
    }
    else
    {
        $("#fname").css({'border-color':'#CCC'});
    }

    if($("#lname").val() == "")
    {
        $("#lname").css({'border-color':'red'});
        check = 0;
    }
    else
    {
        $("#lname").css({'border-color':'#CCC'});
    }
    if(check == 0)
    {
        var msg = 'All fields are compulsary';
        display_alert('err',msg);
    }
    else
    {       
        var formData = $("#registrationForm").serialize();
        var path = base_url+"auth/registerUser";
        $.ajax({
            type:'POST',
            url:path,
            data:formData,
            success:function(resp)
            {
                //alert(resp);
                if(resp == 1){
                    var msg = 'Registration Successfull...!';
                    display_alert('succ',msg);
                    setInterval(function(){
                        window.location.href = base_url;
                    }, 2000);
                }
                else
                {
                    var msg = 'Something goes wrong..!';
                    display_alert('err',msg);
                }
                
               
            }   
        });
    }
}
/***************/
function loginAction(redirect,itemId,from)
{
    var check = 1;

    if($("#email").val() == "")
    {
        $("#email").css({'border-color':'red'});
        check = 0;
    }
    else
    {
        $("#email").css({'border-color':'#CCC'});
    }

    if($("#password").val() == "")
    {
        $("#password").css({'border-color':'red'});
        check = 0;
    }
    else
    {
        $("#password").css({'border-color':'#CCC'});
    }
    if(check == 0)
    {
        var msg = 'All fields are compulsary';
        display_alert('err',msg);
    }
    else
    {
        var email = $("#email").val();
        var password = $("#password").val();
        // var rememberMe = $("#rememberMe").val();

        var formData = $("#loginForm").serialize();
        var path = base_url+"auth/loginAction";
        $.ajax({
            type:'POST',
            url:path,
            data:"email="+email+"&password="+password,
            success:function(resp)
            {
               //alert(resp);;
               if(resp == 1){
                    var msg = 'Login Successfull...!';
                    display_alert('succ',msg);
                    if(redirect == 'redirectToHome')
                    {
                        //alert(itemId);alert(from);
                        if(itemId != "" && from == "wishlist")
                        {
                            var custId = "User is loged in now";
                            setInterval(function(){
                            window.location.href = base_url+'product/productView';
                            addProToWishlist(itemId,custId);
                            }, 2000);
                            
                        }
                        else if(itemId != "" && from == "packages")
                        {
                            setInterval(function(){
                            window.location.href = base_url+'packages/custPackagesView/'+itemId;
                            }, 2000);  
                        }
                        else if(itemId != "" && from == "gallery")
                        {
                            alert
                            // setInterval(function(){
                            // window.location.href = base_url+'gallery/addGalleryLike/'+itemId;
                            // }, 2000);
                            var custId = "User is loged in now";
                            galleryLike(itemId)
                            
                        }
                        else{
                            setInterval(function(){
                            window.location.href = base_url;
                            }, 1000);
                        }
                    }
                    else if(redirect == 'redirectToCheckOut')
                    {
                        setInterval(function(){
                            window.location.href = base_url+'product/checkOut/in';
                            }, 1000);
                    }
                }
                else
                {
                    var msg = 'Incorrect Email or Password..!';
                    display_alert('err',msg);
                }
            }   
        });
    }
       
}
/*************/
function verifyUsername()
{
    var check = 1;
    if($("#email").val() == "")
    {
        $("#email").css({'border-color':'red'});
        check = 0;
    }
    else
    {
        $("#email").css({'border-color':'#CCC'});
    }
    if(check == 0)
    {
        var msg = 'All fields are compulsary';
        display_alert('err',msg);
    }
    else
    {
    var formData = $("#forgotPassForm").serialize();
    var path = base_url+"auth/verifyUsername";
    $.ajax({
        type:'POST',
        url:path,
        data:formData,
        success:function(resp)
        {
           if(resp != 0 && resp != 2)
            {
                var msg = 'You will receive New password on your email, Please login and Reset your password...!';
                display_fix_alert('succ',msg);
                setInterval(function(){
                    var path = base_url+"auth/forgotPassOtp/"+resp;
                    window.location.href = path;
                }, 3000);
            }
            else if(resp == 2)
            {
                var msg = 'Invalid User Name.';
                display_alert1('err',msg);   
            }
            else if(resp == 0)
            {
                var msg = 'Mail Sending Fail.';
                display_alert1('err',msg);   
            }
        }   
    });
}
}
/**************/
function verifyPassOtp()
{
    var check = 1;
    if($("#otp").val() == "")
    {
        $("#otp").css({'border-color':'red'});
        check = 0;
    }
    else
    {
        $("#otp").css({'border-color':'#CCC'});
    }
    if(check == 0)
    {
        var msg = 'All fields are compulsary';
        display_alert('err',msg);
    }
    else
    {
    var formData = $("#forgotPassOtpForm").serialize();
    var path = base_url+"auth/verifyPassOtp";
    $.ajax({
        type:'POST',
        url:path,
        data:formData,
        success:function(resp)
        {
           if(resp != 0)
             {
                var msg = 'Please reset Your Password For Better Security.';
                display_alert('succ',msg); 
                setInterval(function(){
                        var path = base_url+"auth/resetPassword/"+resp;
                        window.location.href = path;
                    }, 2000);
             }
             else if(resp == 0)
            {
                var msg = 'Invalid OTP.';
                display_alert('err',msg);   
            }
        }   
    });
}
}
function updatePassword()
{
     var check = 1;
     var pass = $("#password").val();
     var repass = $("#repassword").val();

    if($("#password").val() == "")
    {
        $("#password").css({'border-color':'red'});
        check = 0;
    }
    else
    {
        $("#password").css({'border-color':'#CCC'});
    }
    if(check == 0)
    {
        var msg = 'All fields are compulsary';
        display_alert('err',msg);
    }
    else
    {  
        var formData = $("#resetPassForm").serialize();
        var path = base_url+"auth/updatePassword";
        $.ajax({
            type:'POST',
            url:path,
            data:formData,
            success:function(resp)
            {
                // alert(resp);
                if(resp==1)
                {
                    var msg = 'Password Updated...Please Login With New Password!';
                    display_alert('succ',msg);

                    setInterval(function(){
                        var path = base_url;
                        window.location.href = path;
                    }, 2000);
                }
                else
                {
                    var msg = 'Somthing goes Wrong.';
                    display_alert('err',msg);   
                }
            }   
            });
    }
}
/**************/
function addProToWishlist(productId,customer_id)
{
    var path = base_url+'product/addToWishlist';
    $.ajax({
        type:"POST",
        url:path,
        data:"productId="+productId,
        success:function(resp)
        {
            //alert(resp);
            $('#wishListItems').html(resp);
            if(resp != "")
            {
                info("Product added to Wishlist..!");
            }
        }
    });
}
function galleryLike(galleryId,customer_id)
{
    $postLoginLike = "postLoginLike";
    var path = base_url+'gallery/addGalleryLike/'+galleryId+'/'+$postLoginLike;
    $.ajax({
        type:"POST",
        url:path,
        success:function(resp)
        {
            var path = base_url+'gallery/index';
            window.location.href = path;
            
        }
    });
}
/****************/

/**************/
// function verifyUser()
// {
//     var email = $("#email").val();
//     var mobile = $("#mobile").val();
//     var password = $("#password").val();
//     var path = base_url+"Auth/registerUser";
//     $.ajax({
//         type:'POST',
//         url:path,
//         data:"email="+email+"&mobile="+mobile+"&password="+password,
//         success:function(resp)
//         {
//             //alert(resp);
//             if(resp != 0 && resp != 2)
//             {
//                 showOtpform(resp);
//             }
//             else if(resp == 0)
//             {
//                  var msg = 'Email Id or Mobile already exist! Please try again.';
//                  display_alert('err',msg);  
//             }
//             else if(resp == 2)
//             {
//                  var msg = 'Something goes wong';
//                  display_alert('err',msg);  
//             }
           
//         }   
//     });
// }
// function showOtpform(sysOtp) {
//     alert(sysOtp);
//     var data = "";
//     data += '<form id="optForm" >';
//     data += '<input name="userOtp" type="text" class="form-control" id="userOtp" value=""/>';
//     data += '<button type="button" class="pull-right btn btn-verify btn-next" style="background-color:red; color:white; margin-top:1%;" onclick="verifOtp('+sysOtp+')">Verify</button>';
//     data += '</form>'
    
//     $(".modal-body").html(data);
//     $("#myModal").modal('show');
// }
// function verifOtp(sysOtp)
// {
//     var userOtp = $("#userOtp").val();
//     if(sysOtp == userOtp)
//     {
//         $("#myModal").modal('hide');
//         // next step
//         var parent_fieldset = $(this).parents('fieldset');
//         var next_step = true;
//         // navigation steps / progress steps
       
//         var progress_line = $(this).parents('.f1').find('.f1-progress-line');
        
//         // fields validation
//         parent_fieldset.find('input[type="text"], input[type="password"], textarea').each(function() {
//             if( $(this).val() == "" ) {
//                 $(this).addClass('input-error');
//                 next_step = false;
//             }
//             else {
//                 $(this).removeClass('input-error');
//             }
//         });

//         // fields validation
        
//         if( next_step ) {
//             //parent_fieldset.fadeOut(400, function() {
//                 // change icons
//                  var current_active_step = $(this).parents('.f1').find('.f1-step.active');
//                 console.log(current_active_step);
//                 current_active_step.removeClass('active').addClass('activated').next().addClass('active');
//                 alert(123);
//                 // progress bar
//                 //bar_progress(progress_line, 'right');
//                 // show next step
//                 //$(this).next().fadeIn();
//                 // scroll window to beginning of the form
//                 //scroll_to_class( $('.f1'), 20 );
//             //});
//         }
//         }
//     else
//     {
//         showOtpform(sysOtp);
//     }

// }