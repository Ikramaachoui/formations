<?php
header("Content-Type: text/plain");




	require_once "connect.php";
	
	extract($_POST);
	
	$sql = "UPDATE participer SET etat = 'refusee' WHERE formation_idformation = :id_formation AND salarie_idsalarie = :id_salarie";
		
	$req = $bdd -> prepare($sql);
	
	$req -> bindValue(":id_formation",$id_formation,PDO::PARAM_INT);
	$req -> bindValue(":id_salarie",$id_salarie,PDO::PARAM_INT);
	
	$req -> execute();
	
	

