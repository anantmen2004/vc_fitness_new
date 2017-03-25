$(document).ready(function() {
    // alert(123);   
});

function galleryLike(galleryId,customer_id)
{
	if(customer_id == "")
    {
        var from = "gallery";
        window.location.href = base_url+'Auth/loginView/'+galleryId+'/'+from;
    }
    else
    {
        var path = base_url+'gallery/addGalleryLike/'+galleryId;
        $.ajax({
            type:"POST",
            url:path,
            success:function(resp)
            {
                var count = $("#likeCount_"+galleryId).html();
                count1 = parseInt(count);
                if(resp == 1){
                     $('#like_'+galleryId).removeClass("fa-heart-o");
                     $('#like_'+galleryId).addClass("fa-heart");
                     var newCnt = count1 + 1;
                     $("#likeCount_"+galleryId).html(newCnt+' Likes');
                }
                else
                {
                    $('#like_'+galleryId).removeClass("fa-heart");
                     $('#like_'+galleryId).addClass("fa-heart-o");
                     var newCnt = count1 - 1;
                     $("#likeCount_"+galleryId).html(newCnt+' Likes');
                }
            }
        });
    }
}