<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);


session_start();
use App\Facebook\FacebookConnect;

require 'vendor/autoload.php';
require 'app/Facebook/constants.php';

$page = (!isset($_GET['page'])) ? 'landing' : htmlentities($_GET['page']);

require 'views/header.php';

//on envoi un lien de connexion
//l'url qui permet de se connecter avec facebook (et je veux en plus récupérer l'email)
//les permissions sont a mettre dans un tableau puis à mettre en paramètre de getLoginUrl();
//$loginUrl = $helper->getLoginUrl(['email']);
//echo  '<a href="'.$loginUrl.'">Connexion avec facebook</a>';
switch($page)
{

    case 'landing' :
    {
        require 'views/landing.php';
        break;
    }
    case 'signup' :
    {
        //require('');
        break;
    }
    case 'connectFb' :
    {
        $connect = new FacebookConnect(APP_ID, APP_SECRET);

        $user = $connect->connect(REDIRECT_URL);

        if(is_string($user)){

            echo '<a href="'.$user.'">Se connecter avec facebook</a>';

        }else{
            var_dump($user);
        }

        break;
    }
    case 'upload' :
    {
        require('views/upload.php');
        break;
    }
    case 'privacy' : {
        require 'views/privacy.php';
        break;
    }
    case 'regle' : {
        require('views/regle.php');
        break;
    }
    case 'gallery' : {
        require('views/gallery.php');
        break;
    }
    case 'sorry' : {
        require('');
        require('views/sorry.php');
        break;
    }
    case 'thank' : {
        require '';
        break;
    }
    case '404' : {
        require ('views/404.php');
        break;
    }
    default: {
        require ('views/landing.php');
        break;
    }

}

/*if($page != 'landing') {*/
    require ('views/footer.php');
//}

?>


