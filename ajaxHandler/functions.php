<?php
/**
 * Created by PhpStorm.
 * User: guizmo
 * Date: 17/06/2015
 * Time: 00:48
 */

if(isset($_POST['action'])){
    var_dump( $_POST['action']);
    getImages();
}
function getImages(){
    return "yes";
}