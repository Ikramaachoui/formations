<?php 

/* ****************    MODEL **********************/

	function  chercherFormationsHistorique($id_salarie)
	{
		global $bdd;
		
		$sql = "SELECT * from formation, participer WHERE formation.idformation = participer.formation_idformation
				AND participer.salarie_idsalarie = :id";
		$req = $bdd -> prepare($sql);
		
		$req -> bindValue(":id",$id_salarie,PDO::PARAM_INT);
		
		$req -> execute();
		
		return $req -> fetchAll();
		
		 
	}
	
	function chercherEtatFormation($idformation,$id_salarie)
	{
		global $bdd;
		$sql = "SELECT etat FROM participer WHERE formation_idformation = :id and salarie_idsalarie = :id_salarie";
		
		$req = $bdd -> prepare($sql);
		
		$req -> bindValue(":id",$idformation,PDO::PARAM_INT);
		$req -> bindValue(":id_salarie",$id_salarie,PDO::PARAM_INT);
		
		$req -> execute();
		
		return $req -> fetch();
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