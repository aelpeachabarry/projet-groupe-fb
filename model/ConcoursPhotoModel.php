<?php
/**
 * Created by PhpStorm.
 * User: guizmo
 * Date: 01/07/2015
 * Time: 23:04
 */

require ROOT.'core/Model.php';



class ConcoursPhotoModel extends abstractModel{
    public function __construct(){
        parent::__construct('user_concours_photo');
    }
}