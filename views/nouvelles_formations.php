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
	<div class="container formation_container">
		<h1 class="center">Nos nouvelles formations :</h1>
		<div class="row">
			<div class="col s12 m12 l12">
				<div class="erreurDiv valign-wrapper">
					<?php
						gestionErreursGet();
					?>
				</div>
			</div>
		</div>
		<?php 
		$i = 0;
		$j = 0;
			if(!empty($formations))
			{
				foreach($formations as $formation)
				{
				$i++;
				$j--;
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
					$prestataire = chercherNomPrestataire($formation["prestataire_idprestataire"]);
					echo $prestataire["nom"];
		?></td>
					<td><?php echo $formation["prerequis"]; ?></td>
				</tr>
			</table>
			<!-- Modal Trigger -->                              <!--   TRIGGER DE RESERVATION  -->
			<a class="waves-effect waves-light btn valign modal-trigger"
				href="#modal<?php echo $i; ?>">Réserver !</a>

			<!-- Modal Structure -->
			<div id="modal<?php echo $i; ?>" class="modal">
				<div class="modal-content">
					<h4>Reserver ma formation</h4>
					<p>Souhaitez-vous réelement réserver cette formation ?</p>
					<p>
						<i><?php echo $formation["contenu"]; ?></i>
					</p>
				</div>
				<div class="modal-footer">
					<a href="#"
						class=" modal-action modal-close waves-effect waves-green btn-flat">Annuler</a>
						<a href="index.php?page=nouvelles_formations&idformation=<?php echo $formation['idformation']; ?>"
						class=" modal-action modal-close waves-effect waves-green btn-flat">Réserver</a>
				</div>
			</div>
			
			         <!--   TRIGGER D'EVALUATION  
			<a class="waves-effect waves-light btn valign modal-trigger"
				href="#modal<?php echo $j; ?>">Voir les notes !</a>

			<!-- Modal Structure 
			<div id="modal<?php echo $j; ?>" class="modal">
				<div class="modal-content">
					<h4>Voici les notes qui ont été données</h4>
					<p>
						test
					</p>
				</div>
				<div class="modal-footer">
					<a href="#"
						class=" modal-action modal-close waves-effect waves-green btn-flat">OK</a>
				</div>
			</div>-->
		</div>
		<?php
				}
			}
			else
			{
			echo "<div class='erreur valign'><i class='material-icons left medium '>report_problem</i>Aucune nouvelle formation</div>";
			}
	?>
	</div>

	<script src="js/jquery.js"></script>
	<script src="materialize/js/materialize.js"></script>
	<script src="js/script.js"></script>
</body>
</html>
