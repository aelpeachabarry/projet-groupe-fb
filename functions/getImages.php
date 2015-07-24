<?php

session_start();
require $_SERVER['DOCUMENT_ROOT'].'constants.php';
use \App\Facebook\FacebookConnect;
use \App\Facebook\ImageManager;
require $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

$connect = new FacebookConnect(APP_ID, APP_SECRET);
$user = $connect->connect(REDIRECT_URL);

if($_POST["findImg"]){
    echo "here";
    $output = "";
    if($_POST["findImg"]=="default"){
        echo "<p>Veuillez Selectionnez un album</p>";
    }else{
        echo "trying getimage";
        $images = new ImageManager($connect->getSession());

        $tempArrayImg = $images->getImagesFromAlbum($_POST['findImg']);

        if(!empty($tempArrayImg)){
            $output = '<ul class="thumbnails image_picker_selector">';
            foreach($tempArrayImg as $image){
                /*var_dump($image);*/
                $output .= '<div class="col-lg-3 col-md-3 col-xs-3 thumb">';
                $output .= '<div class="thumbnail">';
                $output .= '<img class="lazy img-responsive" data-original="'.$image->source.'" src="'.$image->source.'">';
                $output .= '</div>';
                $output .= '</div>';
                /*echo "<option class='col-lg-3 col-md-3 col-xs-3' data-img-src='".$image->source."' value='".$image->id."'>".$user->getName()."</option>";*/
                /*echo "<img src='".$image->source."'>";*/
            }
            $output .= '</ul>';
        }
        echo $output;
    }
}else{
    echo 'probleme';
}