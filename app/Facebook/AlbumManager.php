<?php
/**
 * Created by PhpStorm.
 * User: guizmo
 * Date: 16/06/2015
 * Time: 22:30
 */

class AlbumManager {
    private $albums;
    public function __construct($session){
        $this->session = $session;
        try {
            $response = (new FacebookRequest(
                $this->session, 'GET', '/me/albums'
            )
            )->execute()->getGraphObject();
            $this->albums = $response->getProperty('data');
        }catch (FacebookRequestException $e) {

            echo "Exception occured, code: " . $e->getCode();
            echo " with message: " . $e->getMessage();
        }
    }
    public function getAlbums(){
        return $this->albums;
    }
}