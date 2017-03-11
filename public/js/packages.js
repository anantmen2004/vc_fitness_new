$(document).ready(function(){
	
    $("#package_stratDate").datepicker({
        format: 'dd-mm-yyyy'
        }).on('changeDate', function(){ 
        // do what you want here
        // $(this).datepicker('hide');
        var package_stratDate = $("#package_stratDate").val();
        //alert(birth_date);
    get_packageEndDate(package_stratDate);
    });

    // $("#package_stratDate").datepicker({
    //     format: 'dd-mm-yyyy'
    // });




})


function insertPackage(packagesId,customer_id)
{
    if(customer_id == "")
    {
    	var from = "packages";
        window.location.href = base_url+'Auth/loginView/'+packagesId+'/'+from;
    }
    else
    {
    	window.location.href = base_url+'packages/custPackagesView/'+packagesId;
    }
}

function showDate()
{
    var duration = parseInt($("#package_duration").val());
    if( duration > 0)
    {
        $(".durationDate").show();
    }
    else
    {
        $(".durationDate").hide();
    }
    
}
function get_packageEndDate(strat_date)
{
    var duration = parseInt($("#package_duration").val());
    var path = base_url+'packages/get_packageEndDate';
   $.ajax({
        type:"POST",
        url:path,
        data:"strat_date="+strat_date+"&duration="+duration,
        success:function(resp)
        {
            $('#package_endDate').val(resp);
        }
    });
}
function confirmPackage()
{
    var check = 1;
    if($("#package_duration").val() == "")
    {
        $("#package_duration").css({'border-color':'red'});
        check = 0;
    }
    else
    {
        $("#package_duration").css({'border-color':'#CCC'});
    }
    if($("#package_stratDate").val() == "")
    {
        $("#package_stratDate").css({'border-color':'red'});
        check = 0;
    }
    else
    {
        $("#package_stratDate").css({'border-color':'#CCC'});
    }

    if(check == 0)
    {
        var msg = 'Package duration and Start date fields are compulsary';
        display_alert('err',msg);
    }
    else
    {  
        var formData = $("#confirmPackageForm").serialize();
        var path = base_url+'packages/confirmPackage';
        $.ajax({
            type:"POST",
            url:path,
            data:formData,
            success:function(resp)
            {
                if(resp == 1){
                    var msg = 'Your Package is confirm..!';
                    display_alert('succ',msg);
                    setInterval(function(){
                        window.location.href = base_url+'packages/packagesPayment';
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
