<?php
/**
 * Created by PhpStorm.
 * User: guizmo
 * Date: 11/05/2015
 * Time: 23:49
 */
namespace App\Facebook;

class DbConnect{
    private $pdo;
    public function __construct(){
        $this->pdo = new \PDO('pgsql:host=ec2-54-225-154-5.compute-1.amazonaws.com;port=5432;dbname=dagidi42jnneae', 'xbhzyyoziowdlx', 'ICVHJx9jSI-oRmpxvsT6VM3c-l');
    }
    public function query($stmt){

        try {
            $result = $this->pdo->query($stmt);
            return $result;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    public function execute($stmt){
        $count = $this->pdo->exec($stmt);
        echo $count;
    }
}