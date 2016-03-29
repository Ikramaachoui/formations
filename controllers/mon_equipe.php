<?php 
/************************* CONTROLLER ****************/

	// Appel du fichier SQL correspondant
	require_once ("models/mon_equipe.php");
	
	$membres = chercherMembresEquipe($_SESSION["salarie"][0]["idsalarie"]);
	
	
	// Appel de la vue correspondante 
	require_once("views/mon_equipe.php");


?>