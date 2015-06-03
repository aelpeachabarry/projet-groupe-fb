<?php
/**
 * Created by PhpStorm.
 * User: Ouistiti
 * Date: 03/06/15
 * Time: 18:23
 */

class imageManager{
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