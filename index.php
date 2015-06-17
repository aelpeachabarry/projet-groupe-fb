<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();
use App\Facebook\FacebookConnect;
use App\Facebook\UploadPhoto;
use App\Facebook\DbConnect;
use App\Facebook\ImageManager;
use App\Facebook\AlbumManager;

require 'vendor/autoload.php';
require 'app/Facebook/constants.php';

    $connect = new FacebookConnect(APP_ID, APP_SECRET);
    $user = $connect->connect(REDIRECT_URL);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Concours TravelInfo</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <script type="text/javascript" src="assets/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="assets/js/travelinfo.js"></script>
</head>
<body>
<?php

if(is_string($user)){

    echo '<a href="'.$user.'">Se connecter avec facebook</a>';

}else{
    ?>
    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
        <input type="file" name="mon_fichier" id="mon_fichier" /><br />
        <input type="submit" name="submit" value="Envoyer" />
    </form>
    <form class="form-horizontal" method="POST">
        <fieldset>

            <!-- Form Name -->
            <legend>Select Image From your album</legend>

            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="selectbasic">Albums</label>
                <div class="col-md-4">
                    <select id="selectbasic" name="selectbasic" class="form-control">
                        <option value="default"></option>
                        <?php
                        $albums = new AlbumManager($connect->getSession());
                        /*var_dump($albums);*/
                        foreach($albums->getAlbums() as $data){
                            echo '<option value="'.$data->id.'">'.$data->name.'</option>';
                        }
                        ?>
                        <input type="submit" name="findImg" value="rechercher mes Images" />
                    </select>
                </div>
            </div>

        </fieldset>
    </form>
    <?php
    if(isset($_POST['findImg'])){
        if($_POST['selectbasic']=="default"){
            echo "<p>Veuillez Selectionnez un album</p>";
        }else{
            $images = new ImageManager($connect->getSession(),$_POST['selectbasic']);

            foreach($images->getImages() as $image){
                /*var_dump($image);*/
                echo "<img src='".$image->source."'>";
            }
        }
    }
    if(isset($_POST['submit'])){
        if($_POST['submit'] && $_FILES){

            $uploaded = new UploadPhoto($connect->getSession());
            $uploaded->upload($_FILES['mon_fichier']);
            echo $uploaded->getError();

        }else{
            echo "probleme fichier";
        }
    }

}

//on envoi un lien de connexion
//l'url qui permet de se connecter avec facebook (et je veux en plus récupérer l'email)
//les permissions sont a mettre dans un tableau puis à mettre en paramètre de getLoginUrl();
//$loginUrl = $helper->getLoginUrl(['email']);
//echo  '<a href="'.$loginUrl.'">Connexion avec facebook</a>';



?>
