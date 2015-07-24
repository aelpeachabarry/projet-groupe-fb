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
            '/'.$imageId
        );
        $response = $request->execute();
        return $response->getGraphObject();
    }

    public function getImageObject()
    {
        $graphObject = (
        new FacebookRequest(
            $this->session,
            'POST',
            "/me/objects/object",
            [
                'object' => json_encode([
                    'title' => 'test',
                    'image' => 'https://scontent.xx.fbcdn.net/hphotos-xpf1/v/t1.0-9/10985051_1608904306017786_8580743035900434070_n.jpg?oh=9b798061ef0c77814befd955708ba4b3&oe=564E7018',
                    'url' => 'https://scontent.xx.fbcdn.net/hphotos-xpf1/v/t1.0-9/10985051_1608904306017786_8580743035900434070_n.jpg?oh=9b798061ef0c77814befd955708ba4b3&oe=564E7018',
                    'description' => 'mon super test',
                    'site_name' => 'travel_info'
                ])
            ]
        )
        )->execute()->getGraphObject();
        return $graphObject;
    }
    public function getObject($id)
    {
        $request = new FacebookRequest(
            $this->session,
            'GET',
            '/{object-'.$id.'}'

        );
        $response = $request->execute();
        $graphObject = $response->getGraphObject();
        return $graphObject;
    }

    public function getAllObject()
    {
        $request = new FacebookRequest(
            $this->session,
            'GET',
            '/me/objects/object'
        );
        $response = $request->execute();
        $graphObject = $response->getGraphObject();
        return $graphObject;
    }
}


