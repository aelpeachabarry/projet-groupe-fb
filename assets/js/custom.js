$('document').ready(function() {
    $("#selectbasic").change(function(){
        console.log($("#selectbasic").val());
        if($("#selectbasic").val()!=null){
            $.ajax({
                url:"/functions/getImages.php",
                type:'POST',
                data : {
                    findImg : $("#selectbasic").val()
                },
                success:function(data) {
                    console.log(data);
                    $("#selectbasic").parent().prepend(data);
                }
            });
        }
    });
    $(".image-picker").imagepicker({show_label: true});
});