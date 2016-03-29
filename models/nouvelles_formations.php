<?php 

/* ****************    MODEL **********************/

	
	function chercherFormations()
	{
		
		global $bdd;
		
		$requete = $bdd -> prepare("SELECT * FROM formation WHERE idformation NOT IN (SELECT formation_idformation
				FROM participer WHERE salarie_idsalarie = :id )");
		$requete -> bindValue(":id",$_SESSION["salarie"][0]["idsalarie"],PDO::PARAM_INT);
		
		$requete -> execute();
		
		return $requete -> fetchAll();

	}
	
	
	function chercherPrestataire($id)
	{
		global $bdd;
		
		$requete = $bdd -> prepare(" SELECT nom FROM prestataire WHERE idprestataire = :id");
		
		$requete -> bindValue(":id",$id,PDO::PARAM_INT);
		
		$requete -> execute();
		
		return $requete -> fetch();
	}
	
	function ajouterFormationParticiper($id_formation,$id_salarie,$chef,$capital)
	{
		global $bdd;
		
		$requete = $bdd -> prepare("SELECT nb_jours FROM formation WHERE idformation = :id");
		$requete -> bindValue(":id",$id_formation,PDO::PARAM_INT);
		
		$requete -> execute();
		
		$nb_jours =  $requete -> fetch();
		
		
		if ($nb_jours[0] <= $capital)
		{
			if($chef == "")
			{
				$sql = "INSERT INTO participer (salarie_idsalarie,formation_idformation,etat) VALUES(:id_salarie,:id_formation,'validee')";
				$message = "Vous avez bien été inscris pour cette formation !";
			}
			else
			{
				$sql = "INSERT INTO participer (salarie_idsalarie,formation_idformation,etat) VALUES(:id_salarie,:id_formation,'en cours de validation')";
				$message = "Votre formation est en cours de validation par votre supérieur.";
			}
			
			
			$req = $bdd -> prepare($sql);
			
			$req -> bindValue(":id_salarie",$id_salarie,PDO::PARAM_INT);
			$req -> bindValue(":id_formation",$id_formation,PDO::PARAM_INT);
			
			$req -> execute();
			
			
			$reste_jours = $capital - $nb_jours[0];
			
			
			$sql = "UPDATE salarie SET capital_formation = :capital WHERE idsalarie = :id_salarie";
			
			$requete = $bdd -> prepare($sql);
			
			$requete -> bindValue(":capital",$reste_jours,PDO::PARAM_INT);
			$requete -> bindValue(":id_salarie",$id_salarie,PDO::PARAM_INT);
			
			$requete -> execute();
			
			$_SESSION["salarie"][0]["capital_formation"] = $reste_jours;
			$resultat = array
			(
					"type" => "infos",
					"message" => $message
			);
			return $resultat;
		}
		else
		{
			$message = "Vous n'avez pas assez de jours disponibles ! ".$nb_jours[0]." jours sont nécéssaires.";
			$resultat = array
			(
					"type" => "erreur",
					"message" => $message
			);
			
			return $resultat;		
		}
		
		
		
		
	}

?>