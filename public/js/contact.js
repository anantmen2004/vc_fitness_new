jQuery.noConflict();
jQuery(document).ready(function($){

	$('form[name="frmcontact"]').submit(function () {
		
		var This = $(this);
		
		if($(This).valid()) {
			var action = $(This).attr('action');

			var data_value = unescape($(This).serialize());
			$.ajax({
				 type: "POST",
				 url:action,
				 data: data_value,
				 // error: function (xhr, status, error) {
					//  confirm('The page save failed.');
				 //   },
				  success: function (response) {
				  	//alert(response);
				  	if(response == 0)
				  	{
				  		var msg = 'Something goes wrong..!';
                    	alert_msg += '<div class="alert alert-danger" role="alert" style="padding: 5px;">';
        				alert_msg += '<span style="text-align:center"><strong>'+msg+'</strong></span></div>';
				  	}
				  	else
				  	{
				  		var msg = 'Thank You for contact.. We will reply you shortly..!';
                    	alert_msg += '<div class="alert alert-success" role="alert" style="padding: 0px;">';
        				alert_msg += '<span style="text-align:center"><strong>'+msg+'</strong></span></div>';
				  	}
				  	$("#alert_msg").html(alert_msg);
					    setTimeout(function(){
					        $("#alert_msg").html("");
					        window.location.href = base_url+'ContactUs/contactUsView';      
					    },4000);
				 	}
			});
		}
		return false;
    });
	$('form[name="frmcontact"]').validate({
		rules: { 
			txtname: { required: true },
			txtemail: { required: true, email: true },
			txtmessage: { required: true }
		},
		errorPlacement: function(error, element) { }
	});
});