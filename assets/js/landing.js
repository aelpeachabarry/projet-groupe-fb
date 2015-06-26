/**
 * Created by aelpeacha on 16/06/15.
 */
$(document).ready(function(){
    //image par defaut
    $(".banner-image").backstretch('././images/beach-holiday.jpg');

    var i = 0;
    var imgArray = [
        'beach-holiday.jpg',
        'city-holiday.jpg',
        'sea.jpg'
    ];

    //sliderSelfies(imgArray);
    //$(".banner-image").backstretch('././images/'+imgArray[1]);
    var lenghtImgArray = imgArray.length;
    
    // setTimeout(function(){
    //     //selfieSlider();
    //     console.log('ta mere');
    // }, 2000);
    selfieSlider();

    function selfieSlider(){
        setTimeout(function(){
            if(i == lenghtImgArray){
                i = 0; 
            }
            $(".banner-image").backstretch('././images/'+imgArray[i]);
            i++; 
            console.log(i);
            selfieSlider(); 
        }, 4000);
    }

});