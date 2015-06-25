<?php

	class Concours 
	{
		private $id;
        private $nom;
		private $description;
		private $date_debut;
		private $date_fin;

		public function __construct($id, $nom, $description, $date_debut, $date_fin) {
			$this->id = $id;
			$this->nom = $nom;
			$this->description = $description;
			$this->date_debut = $date_debut;
			$this->date_fin = $date_fin;
		}

        /**
         * @return mixed
         */
        public function getNom()
        {
            return $this->nom;
        }

        /**
         * @param mixed $nom
         */
        public function setNom($nom)
        {
            $this->nom = $nom;
        }

		public function getId()
		{
			return $this->id;
		}

		public function getDescription()
		{
			return $this->description;
		}

		public function getDateDebut()
		{
			return $this->date_debut;
		}

		public function getDateFin()
		{
			return $this->date_fin;
		}

        public function getLots()
        {
            $db = new Db();
            $lots = $db->searchLots($this->id);

            return $lots;
        }
	}
?>