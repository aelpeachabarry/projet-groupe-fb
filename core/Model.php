<?php
/**
 * Created by PhpStorm.
 * User: guizmo
 * Date: 27/06/15
 * Time: 19:00
 */
namespace Core\Model;

class abstractModel {
    private $tableName;
    private $db;


    public function __construct($tableName){
        $this->tableName = $tableName;
        try {
            $this->db = new PDO("pgsql:host=".HOST.";dbname=".DB_NAME, USER_DB, PWD_DB);
        }
        catch(PDOException $e) {
            $db = null;
            echo 'ERREUR DB: ' . $e->getMessage();
            exit();
        }

    }

    /*
     * Cette methode accepte un Tableau associatif, elle gere les valeur escape et nonescape
     * exemple :
     * $monTabescape = [
     *      'name' => 'TOTO',
     *      'libelle' => 'JE SUIS UN TOTO'
     * ];
     * $nonescape = [
     *      'id' => 12323424,
     *      'prix' => 12
     * ];
     * ce tableau correspond au champ et valeur a inséré
     */
    public function create($nonescapeData,$escapeData){
        $fields = "";
        $values = "";
        if(!empty($nonescapeData)){
            $fields .= implode(',',array_keys($nonescapeData));
            $values.= implode(',',array_values($nonescapeData));
        }
        if(!empty($escapeData)){
            if(!empty($fields)){
                $fields .= ',';
            }
            $fields .= implode(',',array_keys($escapeData));
            if(!empty($values)){
                $values .= ',';
            }
            $values .= '\''.implode('\',\'',array_values($escapeData)).'\'';
        }

        if(!empty($fields) && !empty($values)){
            $query = "INSERT INTO ".$this->tableName."(".$fields.") VALUES (".$values.")";

            var_dump($query);
            var_dump($this->db->exec($query));
            return $this->db->errorInfo();
        }
        return "error";
    }

    /*
     * Le premier parametre correspond aux champs qu'on souhaite
     * recupéré, il peut etre soit un string soit un array simple
     * Le 2eme parametre correspond aux conditions, c'est un tableau
     * associatif
     * Cette methode retourne un jeu de donnée
     */
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
    public function update($sets,$where){
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
    public function delete($where = array()){
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
        $query = "DELETE FROM ".$this->tableName.$condition;
        return $this->db->query($query);
    }

    public function getDbCo(){
        return $this->db;
    }

}