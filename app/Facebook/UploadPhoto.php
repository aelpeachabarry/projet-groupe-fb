<?php
/**
 * Created by PhpStorm.
 * User: aelpeacha
 * Date: 20/04/15
 * Time: 14:48
 */

namespace App\Facebook;

use Facebook\FacebookRequest;
use Facebook\GraphObject;
use Facebook\FacebookRequestException;



class UploadPhoto {

    private $session;

    public function __construct($session){

        $this->session = $session;

    }

    public function upload($file){
        $filename = $file['mon_fichier']['CNIMoise.png'];
        if($this->session) {

            try {

                // Upload to a user's profile. The photo will be in thee
                // first album in the profile. You can also upload to
                // a specific album by using /ALBUM_ID as the path
                $response = (new FacebookRequest(
                    $this->$session, 'POST', '/me/photos', array(
                        'source' => new CURLFile('temp/'.$filename, 'image/png'),
                        'message' => 'User provided message'
                    )
                ))->execute()->getGraphObject();

                // If you're not using PHP 5.5 or later, change the file reference to:
                // 'source' => '@/path/to/file.name'

                echo "Posted with id: " . $response->getProperty('id');

            } catch(FacebookRequestException $e) {

                echo "Exception occured, code: " . $e->getCode();
                echo " with message: " . $e->getMessage();

            }

        }
    }


}