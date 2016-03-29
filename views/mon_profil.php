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
					<li class="active"><a href="index.php?page=mon_profil"><i
							class="material-icons left">perm_identity</i>Mon profil</a></li>
					<li ><a href="index.php?page=page_principale"><i
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
	<?php 
	if (isset ( $erreur )) 
					{
						echo "<div class='erreur valign'><i class='material-icons left medium '>report_problem</i>".$erreur."</div>";
					} 
					else if (isset($infos))
					{
						echo "<div class='infos valign'><i class='material-icons left medium '>check</i>".$infos."</div>";
					}
		?>
		 <table class="striped">
			<tbody>
			  <tr>
				<td>Nom</td>
				<td><?php echo ($_SESSION["salarie"][0]["nom"]); ?></td>
			  </tr>
			  <tr>
				<td>Prénom</td>
				<td><?php echo ($_SESSION["salarie"][0]["prenom"]); ?></td>
			  </tr>
			  <tr>
				<td>Mail</td>
				<td><?php echo ($_SESSION["salarie"][0]["email"]); ?></td>
			  </tr>
			   <tr>
				<td>Adresse</td>
				<td><?php echo ($_SESSION["salarie"][0]["numeroRue"]." ".$_SESSION["salarie"][0]["rue"]." , ".$ville["libelle"]); ?></td>
			  </tr>
			   <tr>
				<td>Mot de passe</td>
				<td>******</td>
				
			  </tr>
			</tbody>
      </table>
	  <div class="row">
		<div class="col s12 m4 offset-m4">
			  <button
				class="waves-effect waves-light btn blue accent-1 right modal-trigger" href="#modal1">Modifier mon mot de passe <i class="material-icons right">edit</i>
			</button>
			<!-- Modal Structure -->
			<div id="modal1" class="modal">
				<div class="modal-content">
					<h4>Modifier mon mot de passe</h4>
					<form method="post" action="#">
						<div class="row">
							<div class="input-field col s12 m12 l12">
								  <input id="mdp1" type="password" class="validate" name="mdp1">
								  <label for="password">Saisissez nouveau mot de passe</label>
							</div>
							<div class="input-field col s12 m12 l12">
								  <input id="mdp2" type="password" class="validate" name="mdp2">
								  <label for="password">Saisissez le à nouveau</label>
							</div>
						</div>
						<button
						class="waves-effect waves-light btn blue accent-1 right"
						type="submit" name="submit_mdp">
						Valider <i class="material-icons right">send</i>
					</button>
					</form>
					<div class="modal-footer">
									
					</div>
				</div>
		</div>
	</div>
	</div>

	<script src="js/jquery.js"></script>
	<script src="materialize/js/materialize.js"></script>
	<script src="js/script.js"></script>
</body>
</html>
