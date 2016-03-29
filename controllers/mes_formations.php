<?php 

	/*********************     CONTROLLER  *****************************/
	

	// Appel du fichier SQL correspondant
	require_once ("models/mes_formations.php");
	
	$formations = chercherFormationsHistorique($_SESSION["salarie"][0]["idsalarie"]);
	

	

	
	
	// Appel de la vue correspondante 
	require_once("views/mes_formations.php");

?>