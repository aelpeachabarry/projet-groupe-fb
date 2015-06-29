<?php
/**
 * Created by PhpStorm.
 * User: guizmo
 * Date: 18/06/2015
 * Time: 23:57
 */
session_start();
require $_SERVER['DOCUMENT_ROOT'].'/app/Facebook/constants.php';
use \App\Facebook\FacebookConnect;
require $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

$connect = new FacebookConnect(APP_ID, APP_SECRET);
$user = $connect->connect(REDIRECT_URL);

if($_POST["findImg"]){
    $output = "";
    if($_POST["findImg"]=="default"){
        echo "<p>Veuillez Selectionnez un album</p>";
    }else{
        var_dump($connect->getSession());
        exit;
        $images = new ImageManager($connect->getSession(),$_POST['selectbasic']);
        var_dump($images);
        $output = '<select class="image-picker show-labels show-html">';
        foreach($images->getImages() as $image){
            /*var_dump($image);*/
            $output .= "<option data-img-src='".$image->source."' value='".$image->id."'>".$image->name."</option>";
            /*echo "<img src='".$image->source."'>";*/
        }
        $output .= '</select>';
        echo $output;
    }
    echo "probleme";
}else{
    echo 'probleme';
}