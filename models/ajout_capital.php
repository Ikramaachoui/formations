<?php
header("Content-Type: text/plain");




	require_once "connect.php";
	extract($_POST);
	
	$sql = "UPDATE salarie SET capital_formation = capital_formation + (SELECT nb_jours FROM formation WHERE idformation= :id_formation) WHERE idsalarie = :id_salarie";
	
	$req = $bdd -> prepare($sql);
	
	$req -> bindValue(":id_formation",$id_formation,PDO::PARAM_INT);
	$req -> bindValue(":id_salarie",$id_salarie,PDO::PARAM_INT);
		
	
	$req -> execute();
