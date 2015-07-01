<?php

require  $_SERVER['DOCUMENT_ROOT'].'model/PhotoModel.php';
require  $_SERVER['DOCUMENT_ROOT'].'model/ConcoursPhotoModel.php';

class ControllerGallery{
    public function __construct(){

    }
    public function insertImage($idPhoto = null,$idUser,$detail = ''){
        $imgManager = new PhotoModel();
        $userConcPhoto = new ConcoursPhotoModel();

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
        $imageConcours= $userConcPhoto->read('*',['id_facebook'=>$idUser,'id_concours'=>4]);
        if(count($imageConcours)>0){
            $userConcPhoto->update(['id_photo'=>$idPhoto],['id_facebook'=>$idUser,'id_concours'=>4]);
        }else{
            unset($nonescape['id_concours']);
            $userConcPhoto->create($nonescape);
        }

    }
    public function getAllImages(){
        $fields = [
            'id_photo',
            'id_facebook',
            'id_concours'
        ];
    }

}