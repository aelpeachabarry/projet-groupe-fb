
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