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
$("image-picker").imagepicker();