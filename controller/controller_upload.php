<?php

require 'model/PhotoModel.php';

class ControllerUpload{
    public function __construct(){

    }
    public function insertImage($idPhoto = null,$idUser,$detail = null){
        $imgManager = new PhotoModel();
        $nonescape = [
            'id_photo' => $idPhoto,
            'id_facebook' => $idUser,
            'id_concours' => 4

        ];
        $escape = [
            'last_update' => date('Y-m-d H:i:s'),
            'details' => $detail
        ];

        $imgManager->create($nonescape,$escape);

    }

}