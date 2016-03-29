<!-- VUE ----------------------------------->
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Maison des Ligues</title>
<link rel="stylesheet" href="materialize/css/materialize.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="css/formation.css">
</head>
<body>
	<header class="container">
		<nav >
			<ul id="dropdown1" class="dropdown-content">
				<li><a href="#!">Où suis-je ?</a></li>
			</ul>
			<div class="nav-wrapper">
				<a href="#" class="brand-logo">Maison des Ligues</a> <a href="#"
					data-activates="mobile-demo" class="button-collapse"><i
					class="material-icons">menu</i></a>
				<ul id="nav-mobile" class="right hide-on-med-and-down">
					<li class="active"><a href="index.php"><i
							class="material-icons left">perm_identity</i>Connexion</a></li>
					<li><a target="_blank" href="images/portail_utilisateur_formation.pdf"><i class="material-icons left">help_outline</i>Aides</a></li>
				</ul>
				<ul class="side-nav" id="mobile-demo">
					<li><a href="index.php"><i class="material-icons left">perm_identity</i>Connexion</a></a></li>
					<li><a  target="_blank" href="images/portail_utilisateur_formation.pdf"><i class="material-icons left">help</i>Aide</a></li>
				</ul>
			</div>
		</nav>
	</header>
	<div class="container">
		<div class="row">
			<div class="col s12 m12 l12">
				<div class="erreurDiv valign-wrapper">
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
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col s12 m6 offset-m3 l6 offset-l3">
				<div class="card hoverable">
					<div class="card-content">
						<span class="card-title">Connectez-vous</span>
						<div class="row">
							<form class="col s12 m12 l12" method="post" action="#">
								<div class="row">
									<div class="input-field col s12 m12 l12">
										<input id="nom" type="text" class="validate" name="nom" value="<?php  value('nom');?>"> <label
											for="nom" >Nom</label>
									</div>
									<div class="input-field col s12 m12 l12">
										<input id="password" type="password" class="validate"
											name="password"> <label for="password">Mot de passe</label>
									</div>
									<button
										class="waves-effect waves-light btn blue accent-1 right"
										type="submit" name="submit">
										connexion <i class="material-icons right">send</i>
									</button>
								</div>
							</form>
							<a class="waves-effect waves-light modal-trigger" href="#modal1">Mot de passe oublié ?</a>
							<!-- Modal Structure -->
							<div id="modal1" class="modal">
								<div class="modal-content">
									<h4>Réinitialisation de mot de passe</h4>
									<p>Veuillez renseigner l'adresse mail correspondante au compte M2L</p>
									<form method="post" action="#">
										<div class="row">
											<div class="input-field col s12 m12 l12">
												<div class="input-field col s12">
												  <input id="email" type="email" class="validate" name="email" value="<?php  value('email');?>">
												  <label for="email">Email</label>
												</div>
											</div>
										</div>
										<button
										class="waves-effect waves-light btn blue accent-1 right"
										type="submit" name="submit_mdp">
										Envoyer <i class="material-icons right">send</i>
										</button>
									</form>
								</div>
								<div class="modal-footer">
									
								</div>
							</div>
						</div>
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