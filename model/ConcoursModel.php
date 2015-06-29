<?php
/**
 * Created by PhpStorm.
 * User: Guizmo
 * Date: 27/06/15
 * Time: 22:59
 */
require $_SERVER['DOCUMENT_ROOT'].'core/Model.php';

class ConcoursModel extends abstractModel{
    public function __construct(){
        parent::__construct('concours');
    }
}