$('document').ready(function() {
    $("#upload").on('change',"#selectbasic",function(){
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
                    $("#resultImg").remove();
                    $("#resultImg").append(data);
                    $(".image-picker").imagepicker({show_label: true});
                }
            });
        }
    });

});