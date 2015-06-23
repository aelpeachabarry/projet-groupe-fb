<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);


session_start();

require 'vendor/autoload.php';
require 'app/Facebook/constants.php';
require 'constants.php';


$page = (!isset($_GET['page'])) ? 'landing' : htmlentities($_GET['page']);

require 'views/header.php';
require('controller/controller_landing.php');

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
            echo $user;
        }else{
            var_dump($user);
        }
        break;
    }
    case 'upload' :
    {
        require('controller_upload.php');
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
        require 'model/db.class.php';
        require('views/gallery.php');
        break;
    }
    case 'sorry' : {
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
        require('controller/controller_landing.php');
        require ('views/landing.php');
        break;
    }

}

/*if($page != 'landing') {*/
    require ('views/footer.php');
//}
