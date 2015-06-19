<?php
/**
 * Created by PhpStorm.
 * User: newwer21
 * Date: 19/06/15
 * Time: 15:39
 */

class lot {
    private $id_lot;
    private $libelle_lot;
    private $id_concours;

    function __construct($id_lot, $libelle_lot, $id_concours)
    {
        $this->id_lot = $id_lot;
        $this->libelle_lot = $libelle_lot;
        $this->id_concours = $id_concours;
    }

    /**
     * @return int l'ID du lot
     */
    public function getId()
    {
        return $this->id_lot;
    }

    /**
     * @return mixed
     */
    public function getLibelle()
    {
        return $this->libelle_lot;
    }

    /**
     * @param mixed $libelle_lot
     */
    public function setLibelle($libelle_lot)
    {
        $this->libelle_lot = $libelle_lot;
    }

    /**
     * @return mixed
     */
    public function getIdConcours()
    {
        return $this->id_concours;
    }

    /**
     * @param mixed $id_concours
     */
    public function setIdConcours($id_concours)
    {
        $this->id_concours = $id_concours;
    }

    public function getConcours()
    {
        $db = new Db();
        $concours = $db->getConcours($this->id_concours);

        return $concours;
    }

}