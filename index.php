<?php 
	require_once("models/connect.php");

	if(isset($_GET["page"]))
	{
		if (file_exists("controllers/".$_GET["page"].".php"))
		{
			if (isset($_SESSION["salarie"]) && !empty($_SESSION["salarie"]))
			{
				
				if ($_GET["page"] == "page_principale" && $_SESSION["salarie"]["statut"] == "chef")
				{
					require_once("controllers/page_principale_chef.php");
				}
				else if ($_GET["page"] == "page_principale" && $_SESSION["salarie"]["statut"] == "nonChef")
				{
					require_once("controllers/".$_GET["page"].".php");
				}
				else if ($_GET["page"] == "page_principale_chef" )
				{
					require_once("controllers/404.php");
				}
				else if ($_GET["page"] == "mon_equipe" && $_SESSION["salarie"]["statut"] == "nonChef")
				{
					require_once("controllers/404.php");
				}
				else if($_GET["page"] == "ajouter_membre" && $_SESSION["salarie"]["statut"] == "nonChef")
				{
					require_once("controllers/404.php");
				}
				else
				{
					require_once("controllers/".$_GET["page"].".php");
				}
			}
			else
			{
				$erreur = "Vous devez être connecté pour voir cette page";
				require_once("controllers/identification.php");
			}
			
		}
		
		else
		{
			require_once("controllers/404.php");
		}
	}
	else
	{
		require_once("controllers/identification.php");
	}

?>