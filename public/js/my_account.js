$(document).ready(function(){

    $(".pickdate").datepicker({
        format: 'dd-mm-yyyy'
    });

});
function display_alert123(type,message)
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
        display_alert123('err',msg,'updatePassword');
    }
    else
    { 
        if(pass == repass) 
        {
            var formData = $("#resetPassForm").serialize();
            var path = base_url+"auth/updatePassword";
            $.ajax({
                type:'POST',
                url:path,
                data:formData,
                success:function(resp)
                {   //alert(resp);
                    if(resp==1)
                    {
                        var msg = 'Password Updated Successfuly..!';
                        display_alert123('succ',msg,'updatePassword');
                    }
                    else
                    {
                        var msg = 'Somthing goes Wrong.';
                        display_alert123('err',msg,'updatePassword');   
                    }
                }   
                });
            }
        else
        {
                var msg = 'Password and Re-password does not match.';
                display_alert123('err',msg,'updatePassword'); 
        }
    }
}

function updateBasicInfo()
{
    var formData = $("#updateBasicInfo").serialize();
    var path = base_url+"my_account/updateBasicInfo";
    $.ajax({
        type:'POST',
        url:path,
        data:formData,
        success:function(resp)
        {   //alert(resp);
            if(resp==1)
            {
                var msg = 'Information Updated Successfuly..!';
                display_alert123('succ',msg,'updateBasicInfo');
            }
            else
            {
                var msg = 'Somthing goes Wrong.';
                display_alert123('err',msg,'updateBasicInfo');   
            }
        }   
        });
}

function updateAddressinfo()
{
    var formData = $("#updateAddressinfo").serialize();
    var path = base_url+"my_account/updateAddressinfo";
    $.ajax({
        type:'POST',
        url:path,
        data:formData,
        success:function(resp)
        {   //alert(resp);
            if(resp==1)
            {
                var msg = 'Information Updated Successfuly..!';
                display_alert123('succ',msg,'updateAddressinfo');
            }
            else
            {
                var msg = 'Somthing goes Wrong.';
                display_alert123('err',msg,'updateAddressinfo');   
            }
        }   
        });
}

function return_order()
{
    if ($('.return_reason_id').is(":checked"))
    {
        var formData = $("#order_return").serialize();
        var path = base_url+"my_account/insert_return_order";
        $.ajax({
            type:'POST',
            url:path,
            data:formData,
            success:function(resp)
            {   //alert(resp);
                if(resp)
                {
                    window.location.href=base_url+'my_account/order_return_success';
                }
                
            }   
        });
    }
    else
    {
        $('.return_reason_id').css("color","red");
        $('.reason_id').css("color","red");
    }
}
function videocall(id)
{
    var formData = $("#mypackageInfo_"+id).serialize();
    var path = base_url+"my_account/videocall";
    $.ajax({
        type:'POST',
        url:path,
        data:formData,
        success:function(resp)
         {  alert(resp);
           if(resp==1)
            {
                var msg = 'Information inserted Successfuly..!';
                display_alert123('succ',msg);
            }
           else if(resp==2)
            {
                var msg = 'Information Updated Successfuly..!';
                display_alert123('succ',msg);
            }
            else
            {
                var msg = 'Somthing goes Wrong.';
                display_alert123('err',msg);   
            }
        }   
        });
}