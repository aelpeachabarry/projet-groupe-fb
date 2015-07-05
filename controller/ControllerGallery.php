<?php
require $_SERVER['DOCUMENT_ROOT'].'/core/Model.php';
require 'model/PhotoModel.php';
require 'model/ConcoursPhotoModel.php';

class ControllerGallery{
    public function __construct(){

    }
    public function insertImage($idPhoto = null,$idUser,$url = 'default'){
        $imgManager = new PhotoModel();
        $userConcPhoto = new ConcoursPhotoModel();

        $nonescape = [
            'id_photo' => $idPhoto,
        ];
        $escape = [
            'id_facebook' => $idUser,
            'url' => $url,
            'last_update' => date('Y-m-d G:i:s'),
        ];
        $imgManager->create($nonescape,$escape);

        $imageConcours= $userConcPhoto->read('*',['id_concours'=>4,'id_facebook'=>"'".$idUser."'"]);
        var_dump($imageConcours);
        if(!empty($imageConcours)){
            echo "<br>Trying update<br>";
            $userConcPhoto->update(['id_photo'=>$idPhoto],['id_facebook'=>"'".$idUser."'",'id_concours'=>4]);
        }else{
            echo "<br>Trying create<br>";
            $nonescape['id_concours'] = 4;
            $userConcPhoto->create($nonescape,['id_facebook' => $idUser]);
        }
    }
    public function getAllImagesUrl(){
        $imgSource = [];
        $concImg = new ConcoursPhotoModel();
        $img = new PhotoModel();
        $fields = [
            'id_photo',
            'id_facebook',
            'id_concours'
        ];
        $images = $concImg->read($fields);
        foreach($images as $image){
            $imageUrl = $img->read('*',['id_photo'=>$image['id_photo']]);
            var_dump($imageUrl);
            array_push($imgSource,$imageUrl[0]['url']);
        }
        return $imgSource;
    }

}