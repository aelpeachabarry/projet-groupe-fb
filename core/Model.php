<?php
/**
 * Created by PhpStorm.
 * User: guizmo
 * Date: 27/06/15
 * Time: 19:00
 */
class Model {
    private $primaryKeyFields;
    private $tableName;
    private $db;

    public function __construct(){
        try {
            $this->db = new PDO("pgsql:host=".HOST.";dbname=".DB_NAME, USER_DB, PWD_DB);
        }
        catch(PDOException $e) {
            $db = null;
            echo 'ERREUR DB: ' . $e->getMessage();
            exit();
        }

    }
    //PERMET DE FAIRE LES INSTERT
    public function create($data){
        $fields = implode(',',array_keys($data));
        $values = array_values($data);
        if(!empty($fields) && !empty($fields)){
            if(count(array_keys($data)) == count($values)){
                $query = "INSERT INTO ".$this->tableName."(".$fields.") VALUES (?)";
                $this->db->prepare($query);
                $this->db->execute($values);
                return $this->db->lastInsertId();
            }
        }
    }

    //PERMET DE LIRE DES ENREGISTREMEMENT
    public function read($fields = '*',$where = array()){
        if(is_array($fields)){
            $realFields = implode(',',$fields);
        }else{
            $realFields = $fields;
        }
        if(empty($where)){
            $condition = null;
        }else{
            $condition = "";
            $cpt = 0;
            foreach($where as $key=>$value){
                if($cpt == 0){
                    $condition .= " WHERE ".$key." = ".$value;
                }else{
                    $condition .= " AND ".$key." = ".$value;
                }
                $cpt++;
            }
        }
        $query = "SELECT ".$realFields." FROM ".$this->table." ".$condition;
        return $this->db->query($query);
    }

    //MET A JOUR UN OU PLUSIEURS ENREGISTREMENT
    public function update($id,$sets,$where){
        $keysSet = array_keys($sets);
        $valuesSet = array_values($sets);

        if(!empty($keysSet) && !empty($valuesSet)){
            if(count(array_keys($keysSet)) == count($valuesSet)){
                $setCondition = implode(',',$sets);
                if(empty($where)){
                    $condition = null;
                }else{
                    $condition = "";
                    $cpt = 0;
                    foreach($where as $key=>$value){
                        if($cpt == 0){
                            $condition .= " WHERE ".$key." = ".$value;
                        }else{
                            $condition .= " AND ".$key." = ".$value;
                        }
                        $cpt++;
                    }
                }
            }
        }
        $query = "UPDATE ".$this->tableName." SET ".$setCondition.$condition;
        $this->db->exec($query);
    }
    //SUPPRIME UN ENREGISTREMEMENT
    public function delete(){

    }

}