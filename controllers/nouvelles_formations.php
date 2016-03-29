<?php 

	/*********************     CONTROLLER  *****************************/
	

	// Appel du fichier SQL correspondant
	require_once ("models/nouvelles_formations.php");
	
	
	// Si le salarié valide l'inscription à une formation, nous nous assurons que celle-ci soit possible
	if (isset ( $_GET ["idformation"] )) 
	{
		$resultat =  ajouterFormationParticiper($_GET["idformation"],$_SESSION["salarie"][0]["idsalarie"],$_SESSION["salarie"][0]["salarie_chef"],$_SESSION["salarie"][0]["capital_formation"]);
		
		if($resultat["type"] == "erreur")
		{
			header("location:index.php?page=nouvelles_formations&erreur=".$resultat["message"]);
		}
		else
		{
			header("location:index.php?page=nouvelles_formations&infos=".$resultat["message"]);
			
		}
	}
	
	
	
	// Permet de gérer les erreurs et informations
	function gestionErreursGet()
	{
		if(isset($_GET["erreur"])){
			echo "<div class='erreur valign'><i class='material-icons left medium '>report_problem</i>".$_GET["erreur"]."</div>";
		}
		else if (isset($_GET["infos"])){
			echo "<div class='infos valign'><i class='material-icons left medium '>check</i>".$_GET["infos"]."</div>";
		}
	}
	
	// nous allons chercher toutes les formations disponibles 
	$formations = chercherFormations();
	
	// Pour chaque formation, nous allons récupérer le nom du prestataire
	function chercherNomPrestataire($id)
	{
		return chercherPrestataire($id);
	}
	
	
	

	
	
	// Appel de la vue correspondante 
	require_once("views/nouvelles_formations.php");

?>