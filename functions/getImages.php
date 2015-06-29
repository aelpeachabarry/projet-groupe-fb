<?php
/**
 * Created by PhpStorm.
 * User: guizmo
 * Date: 18/06/2015
 * Time: 23:57
 */
require $_SERVER['DOCUMENT_ROOT'].'/app/Facebook/constants.php';
use \App\Facebook\FacebookConnect;
require $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

$connect = new FacebookConnect(APP_ID, APP_SECRET);
var_dump(REDIRECT_URL);
//$user = $connect->connect(REDIRECT_URL);

//var_dump($user);
//
//if($_POST["findImg"]){
//    $output = "";
//    if($_POST["findImg"]=="default"){
//        echo "<p>Veuillez Selectionnez un album</p>";
//    }else{
//        echo $_SESSION;
//        $images = new ImageManager($connect->getSession(),$_POST['selectbasic']);
//        $output = '<select class="image-picker show-labels show-html">';
//        foreach($images->getImages() as $image){
//            /*var_dump($image);*/
//            $output .= "<option data-img-src='".$image->source."' value='".$image->id."'>".$image->name."</option>";
//            /*echo "<img src='".$image->source."'>";*/
//        }
//        $output .= '</select>';
//        echo $output;
//    }
//    echo "probleme";
//}else{
//    echo 'probleme';
//}