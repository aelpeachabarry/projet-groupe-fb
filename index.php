<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);


session_start();
use App\Facebook\FacebookConnect;

require 'vendor/autoload.php';
require 'app/Facebook/constants.php';


if(!isset($_GET['page'])) {
    $page = 'landing';
}else {
    $page = $_GET['page'];
}

if($page != 'landing') {
    require 'views/header.php';
}
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
        //require('');
        break;
    }
    case 'privacy' : {
        require 'views/privacy.php';
        break;
    }
    case 'home' : {
        require('');
        //require('model/m_inscription.php');
        break;
    }
    case 'merci' : {
        require '';
        break;
    }
    default: {
        require 'views/landing.php';
        break;
    }

}


require 'views/footer.php';

?>


