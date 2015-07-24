<?php

session_start();
require '../constants.php';
use \App\Facebook\FacebookConnect;
use \App\Facebook\ImageManager;
require ROOT.'/vendor/autoload.php';

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
                /*$output .= '<div class="col-lg-3 col-md-3 col-xs-3 thumb">';
                $output .= '<div class="thumbnail">';*/
                $output .= '<option data-img-src="'.$image->source.'" value="'.$image->id.'"></option>';
                /*$output .= '</div>';
                $output .= '</div>';*/
                /*echo "<option class='col-lg-3 col-md-3 col-xs-3' data-img-src='".$image->source."' value='".$image->id."'>".$user->getName()."</option>";*/
                /*echo "<img src='".$image->source."'>";*/
            }
        }
        echo $output;
    }
}else{
    echo 'probleme';
}