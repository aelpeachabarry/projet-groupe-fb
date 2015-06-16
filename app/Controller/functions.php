<?php
/**
 * Created by PhpStorm.
 * User: guizmo
 * Date: 17/06/2015
 * Time: 00:48
 */
if(isset($_POST['action'])){
    eval($_POST['action']."()");
}
function getImages(){

}