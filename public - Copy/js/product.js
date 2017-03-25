$(document).ready(function() {
    // alert(123);   
    // $("otp_div").hide();
});
function addToCart(id,price,name,image,desc,delWish)
{
    //qty = 1;
    var qty = $("#quntity_"+id).val();
    var path = base_url+"product/addToCart";
    if(typeof(qty) != "undefined" || qty !== null || qty !== "") {
    qty = 1;
}
    $.ajax({
        type:'POST',
        url:path,
        data:"productId="+id+"&qty="+qty+"&price="+price+"&name="+name+"&image="+image+"&desc="+desc+"&delWish="+delWish,
        success:function(resp)
        { 
            //alert(resp);
            $('#totalItems').html(resp);
            if(resp != "")
            {
                $("#row1_"+id).parent().parent().remove();
                info("Product added Successfully..!");
            }

        }   
        });  
}
function grandTotal(total)
{
    //alert(price);
    var shippingCharges = $("#shippingCharges").val();
    var grandTotal = parseInt(total) - parseInt(shippingCharges);
    // alert(newSubTotal);
    $("#grandTotal").val(grandTotal);
}
function confirmOrder()
{
    var formData = $("#confirmOrder").serialize();
    var path = base_url+"product/confirmOrder";
    $.ajax({
        type:'POST',
        url:path,
        data:formData,
        success:function(resp)
        { 
            //alert(resp);
            if(resp == 1)
            {
                window.location.href = base_url+'product/orderSuccess';
            }
            else
            {
                info("error");

            }
        }   
        });
}
////////////////
function subTotal(id,price,rowid,operation)
{
    var $button = $(".ddd");
    var qty1 = $("#qty_"+id).val();
    var qty = parseInt(qty1);
    
    if(qty >= 1)
    {
        var path = base_url+"product/updateCart";
        $.ajax({
            type:'POST',
            url:path,
            data:"rowid="+rowid+"&price="+price+"&operation="+operation,
            success:function(resp)
            { 
                var oldSubTotal = $("#subTotal_"+id).val();
                var oldTotalAmt = $("#total").val();
                if(operation == 'minus')
                {
                    if(qty > 1){
                        var newSubTotal = parseInt(oldSubTotal) - parseInt(price);
                        var newTotalAmt = parseInt(oldTotalAmt) - parseInt(price);
                    }
                    else{
                        var newSubTotal = oldSubTotal;
                        var newTotalAmt = oldTotalAmt;
                    }
                }
                else    {
                    var newSubTotal = parseInt(oldSubTotal) + parseInt(price);
                    var newTotalAmt = parseInt(oldTotalAmt) + parseInt(price);
                }
                $("#subTotal_"+id).val(newSubTotal);
                $("#total").val(newTotalAmt); 
                grandTotal(newTotalAmt);
            }   
            });        
    }
    else{
        //alert("Quntity must be atleast One");
        info('Quntity must be atleast One..!');
    }
}
function addToWishlist(productId,customer_id)
{
    if(customer_id == "")
    {
        var from = "wishlist";
        window.location.href = base_url+'Auth/loginView/'+productId+'/'+from;
    }
    else
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
                $('#wishListheart_'+productId).css("color","red");
                if(resp != "")
                {
                    //alert("Item added to Wishlist..!");
                    info('Product Added Successfully.');
                }
            }
        });
    }
}
function removeCardItem(rowId,productId)
{
    var path = base_url+'product/removeCardItem/'+rowId;
    $.ajax({
        type:"POST",
        url:path,
        success:function(resp)
        {
            $('#totalItems').html(resp);
            if(resp != "")
            {
                $("#row_"+productId).parent().parent().remove();
                info('Product Removed.');
            }
        }
    });
}
function removeWishlistItem(productId)
{
    var path = base_url+'product/deleteWishlistItem/'+productId;
    $.ajax({
        type:"POST",
        url:path,
        //data:"productId="+productId,
        success:function(resp)
        {
            
            $('#wishListItems').html(resp);
            $('#wishListheart12_'+productId).removeClass("wishListheart");
            if(resp != "")
            {
                $("#row_"+productId).parent().parent().remove();
                info('Product Removed.');
            }
        }
    });
}
function confirmCustAddress(){
    if ($('#termsConditions').is(":checked"))
    {
        $('#sr').attr('readonly',true);
        $("#three1").attr('id', 'three');
        $("#two").removeClass("in");
        $("#three").addClass("in");
        $('#termsConditions').attr('onclick','return false');
    }
    else{
        //alert("Please agree with Terms & Conditions")
        info('Please agree with Terms & Conditions..!');
    }
}
function confirmDeliveryMethod(){
    
    $("#four1").attr('id', 'four');
    $("#three").removeClass("in");
    $("#four").addClass("in");
    
}
function confirmPaymentMethod(){
    if ($('#payTermsConditions').is(":checked"))
    {
        $("#five1").attr('id', 'five');
        $("#four").removeClass("in");
        $("#five").addClass("in");
        $('#payTermsConditions').attr('onclick','return false');
    }
    else{
        // alert("Please agree with Terms & Conditions")
        info('Please agree with Terms & Conditions..!');
    }
}
