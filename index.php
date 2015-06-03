<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);


session_start();
use App\Facebook\FacebookConnect;
use App\Facebook\UploadPhoto;
use App\Facebook\DbConnect;
use App\Facebook\imageManager;
use App\Facebook\constants;

require 'vendor/autoload.php';

    $connect = new FacebookConnect(APP_ID, APP_SECRET);
    $user = $connect->connect(REDIRECT_URL);

if(is_string($user)){

    echo '<a href="'.$user.'">Se connecter avec facebook</a>';

}else{
    ?>
    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
        <input type="file" name="mon_fichier" id="mon_fichier" /><br />
        <input type="submit" name="submit" value="Envoyer" />
    </form>
    <?
    $test = new ImageManager();
    $test->getAllAlbum($connect->getSession());
    if(isset($_POST['submit'])){
        if($_POST['submit'] && $_FILES){

            $uploaded = new UploadPhoto($connect->getSession());
            $uploaded->upload($_FILES['mon_fichier']);
            echo $uploaded->getError();
            try{
                $db = new DbConnect();
                $result = $db->query('select * from users');
                /*foreach( $result as $row) {
                    print_r($row);
                }*/
            }catch (Exception $e){
                echo "BDD error".$e;
            }

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
