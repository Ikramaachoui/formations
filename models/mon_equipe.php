<?php 
/********************** MODEL **************/

	function chercherMembresEquipe($id_chef)
	{
		global $bdd;
		
		$requete = $bdd -> prepare( "SELECT * FROM salarie WHERE salarie_chef = :id");
		
		$requete -> bindValue(":id",$id_chef,PDO::PARAM_INT);
		
		$requete -> execute();
		
		return $requete -> fetchAll();
	}
	
	
	function chercherValidation($id_salarie)
	{
		global $bdd;
		
		$sql = "SELECT * FROM formation WHERE idformation in ( SELECT formation_idformation FROM participer WHERE salarie_idsalarie= :id_salarie AND etat= 'en cours de validation')";
		
		$req = $bdd -> prepare($sql);
		$req -> bindValue(":id_salarie",$id_salarie,PDO::PARAM_INT);
		
		$req -> execute();
		
		return $req -> fetchAll();
	}
	
	function chercherPrestataire($id)
	{
		global $bdd;
		
		$requete = $bdd -> prepare(" SELECT nom FROM prestataire WHERE idprestataire = :id");
		
		$requete -> bindValue(":id",$id,PDO::PARAM_INT);
		
		$requete -> execute();
		
		return $requete -> fetch();
	}

?>