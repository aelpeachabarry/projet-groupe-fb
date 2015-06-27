<?php

require 'model/PhotoModel.php';

class ControllerUpload{
    public function __construct(){

    }
    public function insertImage($idPhoto = null,$idUser,$detail = null){
        $imgManager = new PhotoModel();
        $arrayImg = [
            'id_photo' => $idPhoto,
            'id_user' => $idUser,
            'last_update' => strtotime(date('Y-m-d H:i:s')),
            'details' => $detail
        ];
        var_dump($arrayImg);
        echo "<pre>";
        print_r($imgManager->create($arrayImg));
        echo "</pre>";
    }

}