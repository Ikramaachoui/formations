<?php 
	session_start();
	try
	{
		$bdd = new PDO("mysql:host=localhost;dbname=ppe_formations4;charset=utf8","root","");
	}
	catch (Exception $e)
	{
		die("erreur de connection");
	}
	

?>