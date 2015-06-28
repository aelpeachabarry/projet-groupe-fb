<?php

require 'model/PhotoModel.php';

class ControllerUser{
    public function __construct(){

    }
    public function insertUser($user){
        if(empty($suer)){
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
            echo "User insert Done";
        }


    }

}
