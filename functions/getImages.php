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
use \App\Facebook\ImageManager;
require $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

$connect = new FacebookConnect(APP_ID, APP_SECRET);
$user = $connect->connect(REDIRECT_URL);

if($_POST["findImg"]){
    $output = "";
    if($_POST["findImg"]=="default"){
        echo "<p>Veuillez Selectionnez un album</p>";
    }else{
        $images = new ImageManager($connect->getSession());
        $tempArrayImg = $images->getImagesFromAlbum($_POST['findImg']);

        if(!empty($tempArrayImg)){
            $output = '<select class="image-picker show-labels show-html">';
            foreach($tempArrayImg as $image){
                /*var_dump($image);*/
                $output .= "<option data-img-src='".$image->source."' value='".$image->id."'>".$user->getName()."</option>";
                /*echo "<img src='".$image->source."'>";*/
            }
            $output .= '</select>';
        }
        echo $output;
    }
}else{
    echo 'probleme';
}