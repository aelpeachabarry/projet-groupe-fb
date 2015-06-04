<?php
/**
 * Created by PhpStorm.
 * User: Moise
 * Date: 03/06/15
 * Time: 18:23
 */
namespace App\Facebook;
use Facebook\FacebookRequest;
use Facebook\FacebookRequestException;


class ImageManager{
    public function __construct($session){

        $this->session = $session;
    }
    public function getAllAlbum(){
        try {
            $response = (new FacebookRequest(
                $this->session, 'GET', '/me/albums'
            )
            )->execute()->getGraphObject();
            var_dump($response);
        }catch (FacebookRequestException $e) {

            echo "Exception occured, code: " . $e->getCode();
            echo " with message: " . $e->getMessage();
        }
    }
}