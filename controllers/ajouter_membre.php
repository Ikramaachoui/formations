<?php 
/************************* CONTROLLER ****************/

	// Appel du fichier SQL correspondant
	require_once ("models/ajouter_membre.php");
	
	if (isset($_POST["submit_ajout_membre"]))
	{
		extract($_POST);
		
		if (!empty($nom) && !empty($prenom) && !empty($capital) && !empty($numero_rue) && !empty($rue) && !empty($ville) && !empty($mail) && !empty($choix))
		{
			if(preg_match("#^[a-zA-Z]+$#",$nom) && preg_match("#^[a-zA-Z]+$#",$prenom))
			{
				if (preg_match("#^[0-9]+$#",$capital))
				{
					if(preg_match("#^[0-9]+$#",$numero_rue))
					{
						if(preg_match("#^[a-zA-Z\s-]+$#",$rue) && preg_match("#^[a-zA-Z\s-]+$#",$ville))
						{
							if(preg_match("#[a-z0-9._-]+\.[a-z]{2,6}#",$mail))
								{
									$mdp = genererMdp();
									if(verificationMail($mail))
									{
											if($choix == "on")
												$chef = true;
											else
												$chef = false;
											
											if(AjoutMembre($nom,$prenom,$mdp,$capital,$numero_rue,$rue,$ville,$mail,$_SESSION["salarie"][0]["idsalarie"],$chef))
											{
												//mail($email,"Portail M2L formations","Bonjour, votre chef d'équipe vous a inscri au portail de gestion des formations de la M2L. Voici votre nouveau mot de passe : ".$mdp."        Il vius est possible de le modifier dans votre espace 'mon profil' une fois connecté !");
												$infos = "Membre bien ajouté à votre équipe ! ";
											}
											else
											{
												$erreur = "Une erreur est survenue, inscription momentanément impossible";
											}
									}
									else
									{
										$erreur = "Cette adresse mail est déjà utilisée";
									}
								}
								else
								{
									$erreur = "Adresse mail invalide";
								}
						}
						else
						{
							$erreur = "Les noms des rues et villes ne doivent être composés que de lettres";
						}
					}
					else
					{
						$erreur = "Le numéro de la rue doit être un nombre";
					}
				}
				else
				{
					$erreur = "Le capital de jours pour un salarié doit être exprimé en nombres uniquement positifs";
				}
			}
			else
			{
				$erreur = "Les noms et prénoms ne doivent comporter que des lettres ";
			}
		}
		else
		{
			$erreur = "Tous les champs doivent être remplis";
		}
		
	}
	
	function value($name)
	{
		if(isset($_POST[$name]) && !empty($_POST[$name]))
		{
			echo $_POST[$name];
		}
	}
	
	// Appel de la vue correspondante 
	require_once("views/ajouter_membre.php");


?>