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

});