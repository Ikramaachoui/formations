<?php
header("Content-Type: text/plain");

	require "connect.php";
	$sql = "UPDATE participer SET etat = 'validee' WHERE formation_idformation = :id_formation AND salarie_idsalarie = :id_salarie";
	
	extract($_POST);
	
	$req = $bdd -> prepare($sql);
	
	$req -> bindValue(":id_salarie",$id_salarie,PDO::PARAM_INT);
	$req -> bindValue(":id_formation",$id_formation,PDO::PARAM_INT);
	
	$req -> execute();
	
