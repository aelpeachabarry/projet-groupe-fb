<?php
/**
 * Created by PhpStorm.
 * User: guizmo
 * Date: 17/06/2015
 * Time: 00:48
 */
namespace ajaxHandler;
use App\Facebook\ImageManager;


if(isset($_POST['action'])){
    if(function_exists($_POST['action'])){
        eval($_POST['action']());
    }else{
        echo 'function doesn\'t exist';
    }
}
function getImages(){
    echo "yes";
}