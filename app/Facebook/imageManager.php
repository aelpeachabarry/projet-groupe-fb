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
    private $images;
    public function __construct($albumId){
        try {
            $response = (new FacebookRequest(
                $this->session, 'GET', '/'.$albumId.'/albums'
            )
            )->execute()->getGraphObject();

            $this->images =$response->getProperty('data');
        }catch (FacebookRequestException $e) {
            echo "Exception occured, code: " . $e->getCode();
            echo " with message: " . $e->getMessage();
        }
    }
    public function getImages(){
        return $this->images;
    }
}


