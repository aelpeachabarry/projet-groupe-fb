<?php
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

    public function getNbLike($link)
    {
        $url = "https://api.facebook.com/method/links.getStats?urls=".urlencode($link)."&format=json";
        $data = json_decode(file_get_contents($url));
        // var_dump($data);
        if(!isset($data[0]->like_count)){ return 'erreur'; }

        return $data[0]->like_count;
    }

  /*  public function getAllImages() {
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
            $imageUrl = $img->read(['id_photo, url'],['id_photo'=>$image['id_photo']]);
            //var_dump($imageUrl);
            array_push($imgSource,$imageUrl[0]);
        }
        return $imgSource;
    }*/

    /**
     * Récupère les urls des photos ayant le plus de like
     * @return array
     */
  /*  public function getClassementUrlPhotos(){
        $urlArray = [];
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
            //var_dump($imageUrl);
            array_push($urlArray,$imageUrl[0]['url']);
        }
        return $urlArray;
    }*/

}