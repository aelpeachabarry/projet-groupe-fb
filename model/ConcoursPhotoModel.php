<?php
/**
 * Created by PhpStorm.
 * User: guizmo
 * Date: 01/07/2015
 * Time: 23:04
 */
/*require $_SERVER['DOCUMENT_ROOT'].'core/Model.php';*/
require './core/Model.php';

class ConcoursPhotoModel extends abstractModel{
    public function __construct(){
        parent::__construct('user_concours_photo');
    }
}