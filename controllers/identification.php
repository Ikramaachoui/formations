<?php 

	/*********************     CONTROLLER  *****************************/
	
	// Appel du fichier SQL correspondant
	require_once ("models/identification.php");
	
	
	// Gestion formulaire de connexion 
	if(isset($_POST["submit"]))
	{
		extract($_POST);
		
		if(!empty($nom) && !empty($password))
		{
			$donnees = identification($nom,$password);
			if(!empty($donnees))
			{
				$_SESSION["salarie"] = $donnees;
				
				if(estUnChef($_SESSION["salarie"][0]["idsalarie"]))
				{
					$_SESSION["salarie"]["statut"] = "chef";
					//header("location:index.php?page=page_principale_chef");
				}
				else
				{
					$_SESSION["salarie"]["statut"] = "nonChef";
					//header("location:index.php?page=page_principale");
				}
				header("location:index.php?page=page_principale");
				
			}
			else{
				$erreur = "Nom ou mot de pass incorrect";
			}
		}
		else
		{
			$erreur = "Veuillez remplir tous les champs";
		}
	}
	
	
	if (isset($_POST["submit_mdp"]))
	{
		extract($_POST);
		
		if(isset($email) && !empty($email))
		{
			if (verifierEmail($email))
			{
				
				$mdp = "";
				$choix = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_.;/^*";
				$mdp .= $choix[rand(0,25)];
				$mdp .= $choix[rand(0,25)];
				$mdp .= $choix[rand(26,51)];
				$mdp .= $choix[rand(26,51)];
				$mdp .= $choix[rand(52,61)];
				$mdp .= $choix[rand(52,61)];
				$mdp .= $choix[rand(61,67)];
				$mdp .= $choix[rand(61,67)];
				$mdp = str_shuffle($mdp);
				
				if (modifierMdp($mdp,$email))
				{
					//mail($email,"Réinitialisation mot de passe","Bonjour, voici votre nouveau mot de passe : ".$mdp."        Il vius est possible de le modifier dans votre espace 'mon profil' une fois connecté !");
					header("location:index.php?infos=Un email avec votre nouveau mot de passe vous a été envoyé ! (pensez à vérifier vos spams)".$mdp);
				}
				else
				{
					$erreur = "Une erreur est survenue";
				}
				
				
				
			}
			else
			{
				$erreur = "Adresse mail non reconnue";
			}
		}
		else
		{
			$erreur = "Veuillez renseigner votre adresse e-mail";
		}
	}
	
	if(isset($_GET["erreur"]))
	{
		$erreur = $_GET["erreur"];
	}
	
	if (isset($_GET["infos"]))
	{
		$infos = $_GET["infos"];
	}
	
	// Appel de la vue correspondante 
	require_once("views/identification.php");

?>