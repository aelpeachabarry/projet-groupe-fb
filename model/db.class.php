<?php
	require_once ROOT.'/model/photo.class.php';
	require_once ROOT.'/model/concours.class.php';
    require_once ROOT.'/model/user.class.php';
    require_once ROOT.'/model/lot.class.php';

	class Db 
	{
		private $db;

		public function __construct() {
			try {
    			$this->db = new PDO("pgsql:host=".HOST.";dbname=".DB_NAME, USER_DB, PWD_DB);
			}
			catch(PDOException $e) {
			  	$db = null;
			  	echo 'ERREUR DB: ' . $e->getMessage();
                exit();
			}
		}

		public function insertUser($user)
		{
			$db = $this->db;

			try
			{
				$query = 'INSERT INTO users (id_facebook, nom, prenom, email, is_participant) 
				          VALUES (:id_facebook, :nom, :prenom, :email, :is_participant)';
				$sth = $db->prepare($query);
				
				$id_facebook = $user->getIdFb();
				$nom = $user->getNom();
				$prenom = $user->getPrenom();
				$email = $user->getEmail();
				$is_participant = $user->isParticipant();

				$sth->bindParam(':id_facebook', $id_facebook, PDO::PARAM_STR);
				$sth->bindParam(':nom', $nom, PDO::PARAM_STR);
				$sth->bindParam(':prenom', $prenom, PDO::PARAM_STR);
				$sth->bindParam(':email', $email, PDO::PARAM_STR);
				$sth->bindParam(':is_participant', $is_participant, PDO::PARAM_INT);
				
				if (!$sth->execute()) {
				    echo 'Erreur à l\'éxecution';
				    echo '<br>'.$query;
				    echo '<br>'.$db->errorInfo()[2];
				    return false;
				}

                $sth->closeCursor();
				
				return true;
			}
			catch (Exception $e)
			{
				echo $e->getMessage();
			}
		}

		public function updateUser($user)
		{
			$db = $this->db;

			try
			{
				$query = 'UPDATE users SET nom = :nom, prenom = :prenom, email = :email, is_participant = :is_participant
							WHERE id_facebook = :id_facebook';
				$sth = $db->prepare($query);
				
				$id_facebook = $user->getIdFb();
				$nom = $user->getNom();
				$prenom = $user->getPrenom();
				$email = $user->getEmail();
				$is_participant = $user->isParticipant();
				// var_dump($is_participant);
				
				$sth->bindParam(':id_facebook', $id_facebook, PDO::PARAM_STR);
				$sth->bindParam(':nom', $nom, PDO::PARAM_STR);
				$sth->bindParam(':prenom', $prenom, PDO::PARAM_STR);
				$sth->bindParam(':email', $email, PDO::PARAM_STR);
				$sth->bindParam(':is_participant', $is_participant, PDO::PARAM_INT);
				
				if (!$sth->execute()) {
				    echo 'Erreur à l\'éxecution';
				    echo '<br>'.$query;
				    echo '<br>'.$db->errorInfo()[2];
				    return false;
				}

                $sth->closeCursor();

				return true;
			}
			catch (Exception $e)
			{
				echo $e->getMessage();
			}
		} // function updateUser($user)

        /**
		 * Permet de récuperer le concours actuel. Recherche le concours où la date actuelle est compris entre la date de début et de fin.
		 * @return classe Concours La classe concours.
		 */
		public function getConcoursActuel()
		{
			$db = $this->db;
			$concours = '';

			try
			{
				$query = 'SELECT * FROM concours WHERE current_date BETWEEN date_debut AND date_fin';
				$sth = $db->prepare($query);
				
				if (!$sth->execute()) {
				    echo 'Erreur à l\'éxecution';
				    echo '<br>'.$query;
				    echo '<br>'.$db->errorInfo()[2];
				    return false;
				}

				if ($result = $sth->fetch())
				{
					// var_dump($result);
					$concours = new Concours($result['id_concours'], $result['nom_concours'], $result['description_concours'], $result['date_debut'], $result['date_fin']);
                    $sth->closeCursor();
					return $concours;
				}
				else
					return false;
				
			}
			catch (Exception $e)
			{
				echo $e->getMessage();
			}
		} //getConcoursActuel()

        /**
         * Récupérer le concours à partir de son ID.
         * @param $id_concours
         * @return bool|Concours. Le concours si trouvé, FALSE sinon.
         */
        public function getConcours($id_concours)
        {
            $db = $this->db;
            $concours = '';

            try
            {
                $query = 'SELECT * FROM concours WHERE id_concours = :id_concours';
                $sth = $db->prepare($query);

                $sth->bindParam(':id_concours', $id_concours, PDO::PARAM_STR);

                if (!$sth->execute()) {
                    echo 'Erreur à l\'éxecution';
                    echo '<br>'.$query;
                    echo '<br>'.$db->errorInfo()[2];
                    return false;
                }

                if ($result = $sth->fetch())
                {
                    // var_dump($result);
                    $concours = new Concours($result['id_concours'], $result['nom_concours'], $result['description_concours'], $result['date_debut'], $result['date_fin']);
                    $sth->closeCursor();
                    return $concours;
                }
                else
                    return false;

            }
            catch (Exception $e)
            {
                echo $e->getMessage();
            }
        } //getConcoursActuel()

        /**
		 * Récupère les photos d'un concours
		 * @param  int $id_concours L'ID du concours
		 * @return Array class      Tableau de photos
		 */
		public function getPhotos($id_concours)
		{	
			$db = $this->db;
			$photos = [];

			try
			{
				$query = 'SELECT * FROM photos
							WHERE id_concours = :id_concours';
				
				$sth = $db->prepare($query);

				$sth->bindParam(':id_concours', $id_concours, PDO::PARAM_INT);
				
				if (!$sth->execute()) {
				    echo 'Erreur à l\'éxecution';
				    echo '<br>'.$query;
				    echo '<br>'.$db->errorInfo()[2];
				    return false;
				}

				$result = $sth->fetchAll();

				foreach ($result as $key)
				{
					// var_dump($result);
					$photo = new Photo($key['id_photo'], $key['details'], $key['last_update'], $key['id_concours'], $key['id_facebook']);					
					
					$photos[] = $photo;
				}
                $sth->closeCursor();
				
				return $photos;
				
			}
			catch (Exception $e)
			{
				echo $e->getMessage();
			}
		}// getPhotos()

		public function getUser($id_facebook)
		{
			$db = $this->db;
			$user = '';

			try
			{
				$query = 'SELECT * FROM users
							WHERE id_facebook = :id_facebook';
				
				$sth = $db->prepare($query);

				$sth->bindParam(':id_facebook', $id_facebook, PDO::PARAM_STR);
				
				if (!$sth->execute()) {
				    echo 'Erreur à l\'éxecution';
				    echo '<br>'.$query;
				    echo '<br>'.$db->errorInfo()[2];
				    return false;
				}

				if ($result = $sth->fetch())
				{
					// var_dump($result);
					$user = new User($result['id_facebook'], $result['nom'], $result['prenom'], $result['email'], $result['is_participant']);					
					return $user;
				}
				else
					return false;

                $sth->closeCursor();
				
				return $user;
				
			}
			catch (Exception $e)
			{
				echo $e->getMessage();
			}
		}

        public function getLot($id_lot)
        {

        }

        public function searchLots($id_concours)
        {
            $lots = [];
            $db = $this->db;

            try
            {
                $query = 'SELECT * FROM lots
							WHERE id_concours = :id_concours';

                $sth = $db->prepare($query);

                $sth->bindParam(':id_concours', $id_concours, PDO::PARAM_INT);

                if (!$sth->execute()) {
                    echo 'Erreur à l\'éxecution';
                    echo '<br>'.$query;
                    echo '<br>'.$db->errorInfo()[2];
                    return false;
                }

                $result = $sth->fetchAll();

                foreach ($result as $key)
                {
                    // var_dump($result);
                    $lot = new Lot($key['id_lot'], $key['libelle_lot'], $key['id_concours']);

                    $lots[] = $lot;
                }

                $sth->closeCursor();

                return $lots;

            }
            catch (Exception $e)
            {
                echo $e->getMessage();
            }

        }
	}
?>