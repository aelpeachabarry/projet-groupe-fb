<?php

	class Photo 
	{
		private $id;
		private $details;
		private $last_update;
		private $id_concours;
		private $id_facebook;

		public function __construct($id_photo, $details, $last_update, $id_concours, $id_facebook) {
			$this->id = $id_photo;
			$this->details = $details;
			$this->last_update = $last_update;
			$this->id_concours = $id_concours;
			$this->id_facebook = $id_facebook;
		}

		public function getId()
		{
			return $this->id;
		}

		public function getDetails()
		{
			return $this->details;
		}

		public function getLastUpdate()
		{
			return $this->last_update;
		}

		public function getIdConcours()
		{
			return $this->id_concours;
		}

		public function getUser()
		{
			$db = new Db();
			$user = $db->getUser($this->id_facebook);

			return $user;
		}

		public function getIdFacebook()
		{
			return $this->id_facebook;
		}

		public function getNbLike()
		{
			$page = "https://holytravel-$this->id.fr";
			$url = "https://api.facebook.com/method/links.getStats?urls=".urlencode($page)."&format=json";
		    $data = json_decode(file_get_contents($url));
		 	// var_dump($data);
		    if(!isset($data[0]->like_count)){ return 'erreur'; }
		 
		    return $data[0]->like_count;
		}
	}
?>