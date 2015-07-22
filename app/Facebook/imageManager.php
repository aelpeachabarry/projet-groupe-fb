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
            '/'.(int)$imageId
        );
        $response = $request->execute();
        var_dump($response->getGraphObject());
        return $response->getGraphObject();
    }

    public function getImageObject()
    {
        $graphObject = (
        new FacebookRequest(
            $this->facebookSession,
            'POST',
            "/me/objects/object",
            [
                'object' => json_encode([
                    'title' => 'test',
                    'image' => 'https://scontent.xx.fbcdn.net/hphotos-xpf1/v/t1.0-9/11666296_130736713926319_6506740644690119820_n.jpg?oh=6da5536a069bd098b84bb210b14c3ec3&oe=560EF713',
                    'url' => 'https://scontent.xx.fbcdn.net/hphotos-xpf1/v/t1.0-9/11666296_130736713926319_6506740644690119820_n.jpg?oh=6da5536a069bd098b84bb210b14c3ec3&oe=560EF713',
                    'description' => 'mon super test',
                    'site_name' => 'travel_info'
                ])
            ]
        )
        )->execute()->getGraphObject();
        return $graphObject;
    }
}


