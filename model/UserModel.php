<?php
/**
 * Created by PhpStorm.
 * User: Ouistiti
 * Date: 27/06/15
 * Time: 23:04
 */
require ROOT.'/core/Model.php';

class UserModel extends abstractModel{
    private $tableName = "users";
    public function __construct(){
        parent::__construct($this->tableName);
    }
}