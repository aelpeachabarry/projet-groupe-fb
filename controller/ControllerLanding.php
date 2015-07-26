<?php

require_once 'model/UserModel.php';
require_once 'model/ConcoursPhotoModel.php';
require_once 'model/PhotoModel.php';

class ControllerLanding{
    public function __construct(){

    }
    public function insertUser($user){
        if(empty($user)){
            echo 'probleme d\'insertion d\'user';
        }else{
            $userManager = new UserModel();
            $nonEscape = [
                'is_participant' => 1
            ];
            $escape = [
                'id_facebook' => $user->getId(),
                'nom' => $user->getLastName(),
                'prenom' => $user->getFirstName(),
                'email' => $user->getEmail()
            ];
            $userManager->create($nonEscape,$escape);
        }
    }

    public function getNbLike($link)
    {
        $url = "https://api.facebook.com/method/links.getStats?urls=".urlencode($link)."&format=json";
        $data = json_decode(file_get_contents($url));
        if(!isset($data[0]->like_count)){ return 'erreur'; }

        return $data[0]->like_count;
    }

    public function getAllImages()
    {
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
            $imageUrl = $img->read('*',['id_photo' => $image['id_photo']]);
            array_push($imgSource, $imageUrl[0]);
        }
        return $imgSource;
    }
    public function getUserForImage($idImage)
    {
        $cpm = new ConcoursPhotoModel();
        $query = 'SELECT *
                  FROM user_concours_photo
                  INNER JOIN users ON users.id_facebook = user_concours_photo.id_facebook
                  WHERE id_photo='.$idImage;

        $stmt = $cpm->getDbCo()->query($query);
        $result = $stmt->fetchAll();
        return $result;
    }
}
