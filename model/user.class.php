<?php

	class User 
	{
		private $id_facebook;
		private $nom;
		private $prenom;
		private $email;
		private $is_participant;

		public function __construct($id_facebook, $nom, $prenom, $email, $is_participant = 0) {
			$this->id_facebook = $id_facebook;
			$this->prenom = $prenom;
			$this->nom = $nom;
			$this->email = $email;
			$this->is_participant = $is_participant;
		}

		public function getIdFb()
		{
			return $this->id_facebook;
		}

		public function getNom()
		{
			return $this->nom;
		}

		public function getPrenom()
		{
			return $this->prenom;
		}

		public function getEmail()
		{
			return $this->email;
		}

		public function isParticipant()
		{
			return $this->is_participant;
		}

		public function setParticipant($value) // 1 TRUE, 0 FALSE
		{
			$this->is_participant = $value;
		}
	}
?>