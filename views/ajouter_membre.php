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
	<div class="container" id="ajout_membre">
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
		  <div class="row">
			<form class="col s12 m6 offset-m3" method="post" action="#">
			  <div class="row">
				<div class="input-field col s12">
				  <i class="material-icons prefix">account_circle</i>
				  <input id="nom" type="text" class="validate" name="nom" value="<?php  value('nom');?>">
				  <label for="nom">Nom</label>
				</div>
				<div class="input-field col s12">
				  <i class="material-icons prefix">account_circle</i>
				  <input id="prenom" type="text" class="validate" name="prenom" value="<?php  value('prenom');?>">
				  <label for="prenom">Prénom</label>
				</div>
				<div class="input-field col s12">
				  <i class="material-icons prefix">shopping_cart</i>
				  <input id="capital" type="number" class="validate" name="capital" value="<?php  value('capital');?>">
				  <label for="capital">Capital de formation</label>
				</div>
				<div class="input-field col s12">
				  <i class="material-icons prefix">room</i>
				  <input id="numero_rue" type="number" class="validate" name="numero_rue" value="<?php  value('numero_rue');?>">
				  <label for="numero_rue">Numéro rue</label>
				</div>
				<div class="input-field col s12">
				  <i class="material-icons prefix">room</i>
				  <input id="rue" type="text" class="validate" name="rue"  value="<?php  value('rue');?>">
				  <label for="rue">Rue</label>
				</div>
				<div class="input-field col s12">
				  <i class="material-icons prefix">location_city</i>
				  <input id="ville" type="text" class="validate" name="ville" value="<?php  value('ville');?>">
				  <label for="ville">Ville</label>
				</div>
				 <div class="input-field col s12">
					  <i class="material-icons prefix">cloud_queue</i>
					  <input id="mail" type="email" class="validate" name="mail" value="<?php  value('mail');?>">
					  <label for="mail">Adresse Mail</label>
				</div>
			  </div>
			  <div class="switch">
				<label>
				  Non chef
				  <input type="checkbox" name="choix">
				  <span class="lever"></span>
				  Chef
				</label>
			  </div>
			  <button
				class="waves-effect waves-light btn blue accent-1 right"
				type="submit" name="submit_ajout_membre">
				Créer <i class="material-icons right">edit</i>
				</button>
			</form>
		  </div>
	</div>

	<script src="js/jquery.js"></script>
	<script src="materialize/js/materialize.js"></script>
	<script src="js/script.js"></script>
</body>
</html>
