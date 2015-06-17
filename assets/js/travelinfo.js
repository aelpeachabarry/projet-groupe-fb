/**
 * Created by guizmo on 17/06/2015.
 */
$(document).ready(function(){
    $("#selectbasic").change(function(){
        $.ajax({
            url:"/ajaxHandler/functions.php",
            type:'POST',
            data : {
                action : 'getImages'
            },
            success:function(data) {
                return data;
            }
        });
    });
});