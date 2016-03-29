<?php 

/* ****************    MODEL **********************/

	
	function value($name)
	{
		if(isset($_POST[$name]) && !empty($_POST[$name]))
		{
			echo $_POST[$name];
		}
	}
	
	function identification($nom,$mdp)
	{
		global $bdd;
		$requete = $bdd -> prepare("SELECT * FROM salarie WHERE nom = :nom AND mdp = :mdp ");
		$requete -> bindValue(":nom",$nom,PDO::PARAM_STR);
		$requete -> bindValue(":mdp",sha1($mdp),PDO::PARAM_STR);
		
		$requete -> execute();
		
		return $requete -> fetchAll();
	}
	
	function estUnChef($id)
	{
		/*global $bdd;
		
		$requete = $bdd -> prepare(" SELECT * FROM salarie WHERE salarie_chef = :id");
		
		$requete -> bindValue(":id",$id,PDO::PARAM_INT);
		
		$requete -> execute();
		
		$rows = $requete -> fetchAll();
		
		if(!empty($rows))
		{
			return true;
		}
		return false;*/
		
		global $bdd;
		
		$requete = $bdd -> prepare(" SELECT estChef FROM salarie WHERE idsalarie = :id");
		
		$requete -> bindValue(":id",$id,PDO::PARAM_INT);
		
		$requete -> execute();
		
		$row = $requete -> fetch();
		
		return $row["estChef"];
	}
	
	function verifierEmail($mail)
	{
		global $bdd;
		
		$requete = $bdd -> prepare("SELECT * FROM salarie WHERE email = :email");
		
		$requete -> bindValue(":email",$mail,PDO::PARAM_STR);
		$requete -> execute();
		
		$rows = $requete -> fetchAll();
		
		if(!empty($rows))
		{
			return true;
		}
		return false;
		
		
	}
	
	function modifierMdp($mdp,$mail)
	{
		global $bdd;
		
		$requete = $bdd -> prepare("UPDATE salarie SET mdp = :mdp WHERE email = :email");
		
		$requete -> bindValue(":mdp",sha1($mdp),PDO::PARAM_STR);
		$requete -> bindValue(":email",$mail,PDO::PARAM_STR);
		
		$requete -> execute();
		return true;
	}
	
	
	
	
	
	
	
	
?>