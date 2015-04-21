<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);


session_start();
use App\Facebook\FacebookConnect;
use App\Facebook\UploadPhoto;

require 'vendor/autoload.php';
require 'app/Facebook/constants.php';

$connect = new FacebookConnect(APP_ID, APP_SECRET);

$user = $connect->connect(REDIRECT_URL);

if(is_string($user)){

    echo '<a href="'.$user.'">Se connecter avec facebook</a>';

}else{
    ?>
    <form method="post" action="index.php" enctype="multipart/form-data">
        <input type="file" name="mon_fichier" id="mon_fichier" /><br />
        <input type="submit" name="submit" value="Envoyer" />
    </form>
    <?
    if(isset($_POST['submit'])){
        if($_POST['submit'] && $_FILES){
            echo "<pre>";
            print_r($_FILES);
            echo "</pre>";
            $uploaded = new UploadPhoto($connect->getSession());
            $uploaded->upload($_FILES['mon_fichier']);
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
