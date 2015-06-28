<?php

require ROOT.'/model/PhotoModel.php';

class ControllerUpload{
    public function __construct(){

    }
    public function insertImage($idPhoto = null,$idUser,$detail = ''){
        $imgManager = new PhotoModel();
        $nonescape = [
            'id_photo' => $idPhoto,
            'id_facebook' => $idUser,
            'id_concours' => 4,


        ];
        $escape = [
            'details' => $detail,
            'last_update' => date('Y-m-d G:i:s'),
        ];
        $imgManager->create($nonescape,$escape);

    }

}