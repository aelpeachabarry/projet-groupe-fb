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

    public function __construct($session)
    {
        $this->session = $session;

    }
    //RETOURNE UNE COLLECTION D'IMAGES
    public function getImagesFromAlbum($albumId)
    {
        try {
            $response = (new FacebookRequest(
                $this->session, 'GET', '/' . $albumId . '/photos'
            )
            )->execute()->getGraphObject();
            return $response->getProperty('data')->asArray();

        } catch (FacebookRequestException $e) {
            echo "Exception occured, code: " . $e->getCode();
            echo " with message: " . $e->getMessage();
        }
    }
//RECUPERE UNE IMAGE D'UN PROFILE FACEBOOK
    public function getImage($imageId)
    {
        $request = new FacebookRequest(
            $this->session,
            'GET',
            '/'.$imageId.''
        );
        $response = $request->execute();
        return $response->getGraphObject();
    }
}


