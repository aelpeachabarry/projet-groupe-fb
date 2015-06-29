$('document').ready(function() {
    $("#selectbasic").change(function(){
        console.log($("#selectbasic"));
        if($("#selectbasic").val()!=null){
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
    $(".image-picker").imagepicker({show_label: true});
});