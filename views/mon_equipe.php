<!--     View --------------------->
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Maison des Ligues</title>
<link rel="stylesheet" href="materialize/css/materialize.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
	rel="stylesheet">
<link rel="stylesheet" href="css/formation.css">
</head>
<body>
	<header class="container">
		<nav>
			<ul id="dropdown1" class="dropdown-content">
				<li><a href="#!">Où suis-je ?</a></li>
			</ul>
			<div class="nav-wrapper">
				<a href="#" class="brand-logo">Maison des Ligues</a> <a href="#"
					data-activates="mobile-demo" class="button-collapse"><i
					class="material-icons">menu</i></a>
				<ul id="nav-mobile" class="right hide-on-med-and-down">
					<li class="mes_credits"><i class="material-icons left">shopping_cart</i>
					Mes Crédits : <?php echo $_SESSION["salarie"][0]["capital_formation"];?> jours</li>
					<li><a href="index.php?page=mon_profil"><i
							class="material-icons left">perm_identity</i>Mon profil</a></li>
					<li><a href="index.php?page=page_principale"><i
							class="material-icons left">home</i>Accueil</a></li>
					<li><a href="index.php?page=deconnexion"><i
							class="material-icons left">highlight_off</i>Deconnexion</a></li>
					<li><a  target="_blank" href="images/portail_utilisateur_formation.pdf"><i class="material-icons left">help_outline</i>Aides</a></li>
				</ul>
				<ul class="side-nav" id="mobile-demo">
					<li><a href="index.php?page=page_principale"><i
							class="material-icons left">home</i>Accueil</a></li>
					<li><a href="index.php"><i class="material-icons left">perm_identity</i>Mon
							profil</a></li>
					<li><a href="index.php?page=deconnexion"><i
							class="material-icons left">highlight_off</i>Deconnexion</a></li>
					<li><a  target="_blank" href="images/portail_utilisateur_formation.pdf"><i class="material-icons left">help</i>Aide</a></li>
				</ul>
			</div>
		</nav>
	</header>
	<div class="container">
		 <div><a href="index.php?page=ajouter_membre"><button
				class="waves-effect waves-light btn blue accent-1 right " >Ajouter un membre à mon équipe <i class="material-icons right">add</i>
			</button></a></div>
			<?php 
				if (isset ( $erreur )) 
					{
						echo "<div class='erreur valign'><i class='material-icons left medium '>report_problem</i>".$erreur."</div>";
					} 
					else if (isset($infos))
					{
						echo "<div class='infos valign'><i class='material-icons left medium '>check</i>".$infos."</div>";
					}
					
		if(!empty($membres))
		{
			foreach ($membres as $salarie)
			{
				$formations = chercherValidation($salarie["idsalarie"]);
				if(!empty($formations))
				{
						
					echo "<h3>".$salarie["nom"]."  ".$salarie["prenom"]." :</h3>";
					foreach ($formations as $formation)
					{
						?>
						<div class="tableau_container valign-wrapper" id="<?php echo $salarie["nom"]."|".$salarie["idsalarie"]."|".$formation["idformation"];?>">
					<table class="hoverable" >
						<tr>
							<td><?php echo $formation["date"];?></td>
							<td><?php echo $formation["nb_jours"]." jours";?></td>
						</tr>
						<tr>
							<td colspan=2><?php echo $formation["contenu"]; ?></td>
						</tr>
						<tr>
							<td colspan=2><?php echo $formation["rue"]; ?></td>
						</tr>
						<tr>
							<td><?php
				//echo $formation_a_valider ["prestataire_idprestataire"];
				$prestataire = chercherPrestataire($formation["prestataire_idprestataire"]);
				echo $prestataire["nom"];
				?></td>
							<td><?php echo $formation["prerequis"]; ?></td>
						</tr>
					</table>
					<div class="waves-effect waves-light etat_validee valign">Valider</div>
					<div class="waves-effect waves-light etat_refusee valign">Refuser</div>
					</div>
						<?php 
					}
				}
				else
				{
					echo "<div class='erreur valign'>".strtoupper($salarie['nom'])."  ".$salarie['prenom']."  n'a aucune formation à valider pour le moment</div>";
				}
			}
		}
		else
		{
			echo "<div class='erreur valign'><i class='material-icons left medium '>report_problem</i>Aucun membre dans votre équipe</div>";
		}
			
		?>
	</div>

	<script src="js/jquery.js"></script>
	<script src="materialize/js/materialize.js"></script>
	<script src="js/script.js"></script>
</body>
</html>
