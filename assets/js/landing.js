/**
 * Created by aelpeacha on 16/06/15.
 */
$(document).ready(function(){

    var imgArray = [
        '././images/beach-holiday.jpg',
        '././images/city-holiday.jpg',
        '././images/sea.jpg'
    ];

    //caroussel landing page
    $(".banner-image").backstretch(imgArray, {duration: 3000, fade: 750});

    $('#participer').click(function(e){
        e.preventDefault();
        console.log('here');
        $.ajax({
            url : '/functions/connectFb.php', // La ressource ciblée
            type:'get',
            success : function(url){
                document.location.href=url;
            }
        });
    });
    $("#selectbasic").change(function(){
        if(this.val()!="" || undefined){
            $.ajax({
                url:"/functions/getImages.php",
                type:'POST',
                data : {
                    findImg : this.val()
                },
                success:function(data) {
                    return data;
                }
            });
        }
    });
});