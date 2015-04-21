<?php
/**
 * Created by PhpStorm.
 * User: aelpeacha
 * Date: 08/04/15
 * Time: 22:24
 */

namespace App\Facebook;

use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookSession;
use Facebook\FacebookRequest;

class FacebookConnect {

    private $session;

    function __construct($appid, $appsecret){

        $this->appId = $appid;
        $this->appSecret = $appsecret;

    }

    public  function connect($redirectUrl){

        FacebookSession::setDefaultApplication($this->appId, $this->appSecret);
        $helper = new FacebookRedirectLoginHelper($redirectUrl);

        //si la var session existe et que l'on un un fb token en session
        if(isset($_SESSION) && isset($_SESSION['fb_token'])){
            //on récupère la session active
            $this->session = new FacebookSession($_SESSION['fb_token']);

        }else{

            //on récupère le token de connexion
            $this->session = $helper->getSessionFromRedirect();

        }

        //si on a une session
        if($this->session){

            try{
                //génération du token
                $_SESSION['fb_token'] = $this->session->getToken();
                var_dump($this->session);

                //si on a bien notre token de connexion on peut commencer à faire des requetes avec la classe facebookrequest
                $request = new FacebookRequest($this->session, 'GET', '/me');
                //on recupère un objet graph user
                $response = $request->execute()->getGraphObject('Facebook\GraphUser');
                //var_dump($response);

                //facebook id
                $facebookId = $response->getId();

                //image profil du user
                $imgProfile = '<img src="//graph.facebook.com/'.$facebookId.'/picture">';
                echo $imgProfile;


                //si le user a refuser la permission de recupération du mail
                if($response->getEmail() === null){
                    throw new Exception('l\'email n\'est pas disponible');
                }

                return $response;

            }catch (Exception $e){

                    unset($_SESSION['fb_token']);

                    return $helper->getReRequestUrl(['email']);

            }


            //facebook id
            //$facebookId = $response->getId();

            //image profil du user
            /*$imgProfile = '<img src="//graph.facebook.com/'.$facebookId.'/picture">';
            echo $imgProfile;*/

            //requete sql
            //si l'id est en bdd : SELECT * FROM users WHERE fb_id = $facebookId
            //sinon : INSERT INTO users SET fb_id = $facebookId, fb_firstname = $response->getFirstName()


        }else{

                return $helper->getReRequestUrl(['email']);

        }
    }
}