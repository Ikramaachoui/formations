<!-- VUE ----------------------------------->
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
					<li class="active"><a href="index.php?page=page_principale"><i
							class="material-icons left">home</i>Accueil</a></li>
					<li><a href="index.php?page=deconnexion"><i
							class="material-icons left">highlight_off</i>Deconnexion</a></li>
					<li><a  target="_blank" href="images/portail_utilisateur_formation.pdf"><i class="material-icons left">help_outline</i>Aides</a></li>
				</ul>
				<ul class="side-nav" id="mobile-demo">
					<li class="active"><a href="index.php?page=page_principale"><i
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
	
		<?php 
		$i = 0;
		if (!empty($formations))
		{
			foreach ($formations as $formation)
			{
				$etat = chercherEtatFormation($formation["idformation"],$_SESSION["salarie"][0]["idsalarie"]);
				$i++;
				$prestataire =  chercherprestataire($formation["prestataire_idprestataire"]);
				?>
					
				<div class="tableau_container valign-wrapper">
				<table class="hoverable">
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
				echo $prestataire["nom"];
			?></td>
						<td><?php echo $formation["prerequis"]; ?></td>
					</tr>
				</table>
				<?php if ($etat["etat"] == "validee"){
				?>
				<span class="waves-effect waves-light etat_validee valign">Validée</span>
				<?php }else if($etat["etat"] == "en cours de validation"){
				?>
				<span class="waves-effect waves-light etat_attente valign">Attente</span>
				<?php 	
				}else {
				?>
				<span class="waves-effect waves-light etat_refusee valign">Refusée</span>
				<?php 
				
				}
				?>
				
			</div>
				
				<?php 
			}
		}
		else 
		{
			echo "<div class='erreur valign'><i class='material-icons left medium '>report_problem</i>Vous n'avez aucune formation dans votre historique</div>";
		}
		?>
	</div>

	<script src="js/jquery.js"></script>
	<script src="materialize/js/materialize.js"></script>
	<script src="js/script.js"></script>
</body>
</html>
