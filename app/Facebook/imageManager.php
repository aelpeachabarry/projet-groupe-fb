<?php
/**
 * Created by PhpStorm.
 * User: Moise
 * Date: 03/06/15
 * Time: 18:23
 */
namespace App\Facebook;
use Facebook\FacebookRequest;


class ImageManager{
    public function __construct($session){

        $this->session = $session;
    }
    public function getAllAlbum(){
        $response = (new FacebookRequest(
            $this->session, 'POST', '/me/albums'
        )
        )->execute()->getGraphObject();
        var_dump($response);
    }
}