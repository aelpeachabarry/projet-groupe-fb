<?php
/**
 * Created by PhpStorm.
 * User: guizmo
 * Date: 18/06/2015
 * Time: 23:57
 */
include 'app/Facebook/imageManager.php';

$connect = $_SESSION['fbsession'];
$user = $_SESSION['user'];

if($_POST["findImg"]){
    $output = "";
    if($_POST["findImg"]=="default"){
        echo "<p>Veuillez Selectionnez un album</p>";
    }else{
        echo $_SESSION;
        $images = new ImageManager($connect->getSession(),$_POST['selectbasic']);
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