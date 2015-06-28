<?php
/**
 * Created by PhpStorm.
 * User: Ouistiti
 * Date: 27/06/15
 * Time: 23:04
 */
require 'core/Model.php';

class PhotoModel extends abstractModel{
    private $tableName;
    public function __construct(){
        parent::__construct();
        $this->tableName = "photos";
    }
}