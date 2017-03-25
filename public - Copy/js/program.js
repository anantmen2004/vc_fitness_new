$(document).ready(function(){
	//alert(123);
})


function getTrainingContent(id)
{
    var path = base_url+"programs/getTrainingContent";
    $.ajax({
        type:'POST',
        url:path,
        data:"trainingId="+id,
        success:function(resp)
        { 
            //alert(resp);
             $('#myTabContent').html(resp);
           
        }   
        });  
}
function getTrainingContentFromHeader(programId,trainingId)
{
    var path = base_url+"programs/getTrainingContent";
    $.ajax({
        type:'POST',
        url:path,
        data:"trainingId="+trainingId,
        success:function(resp)
        { 
            //alert(resp);
            window.location.href = base_url+'programs/programView/'+programId+'/'+trainingId;
            setInterval(function(){
            $('#myTabContent').html(resp);
            addProToWishlist(itemId,custId);
            }, 2000);
             
           
        }   
        });  
}