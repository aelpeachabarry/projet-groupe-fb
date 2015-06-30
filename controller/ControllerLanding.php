<?php

require 'model/UserModel.php';

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
}
