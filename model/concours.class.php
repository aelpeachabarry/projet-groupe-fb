<?php

	class Concours 
	{
		private $id;
		private $description;
		private $date_debut;
		private $date_fin;

		public function __construct($id, $description, $date_debut, $date_fin) {
			$this->id = $id;
			$this->description = $description;
			$this->date_debut = $date_debut;
			$this->date_fin = $date_fin;
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