<?php 

	/*********************     CONTROLLER  *****************************/
	
	// Fermeture de la session
	session_destroy();
	
	// Redirection vers l'accueil
	header("location:index.php?infos=Vous avez été déconnecté");
	
?>