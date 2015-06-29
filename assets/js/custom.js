$('document').ready(function() {
    $("#selectbasic").change(function(){
        console.log($(this));
        if($(this).val()!="" || $(this).val()!=undefined){
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