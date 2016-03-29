<?php 

/* ****************    MODEL **********************/

	
	function chercherVille($id)
	{
		global $bdd;
		
		$req = $bdd -> prepare(" SELECT libelle FROM commune, salarie WHERE salarie.commune_idcommune = commune.idcommune AND salarie.commune_idcommune = :id");
		$req -> bindValue(":id",$id,PDO::PARAM_INT);
		
		$req -> execute();
		
		return  $req -> fetch();
	}
	
	function modifierMotDePasse($mdp,$id)
	{
		$mdp = sha1($mdp);
		global $bdd;
		
		$req = $bdd -> prepare(" UPDATE salarie SET mdp = :mdp WHERE idsalarie = :id ");
		
		$req -> bindValue(":mdp",$mdp,PDO::PARAM_STR);
		$req -> bindValue(":id",$id,PDO::PARAM_INT);
		
		$req -> execute();
		
		return true;
	}
	
	
	
	
	
	
?>