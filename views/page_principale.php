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
		<div class="row">
			<div class="col s12 m6">
				<div class="card page_perso">
					<div class="card-image">
						<img src="images/image_formations.jpg">
					</div>
					<div class="card-content">
						<h3>Nouvelles Formations</h3>
						<p>Consultez l'ensemble des formations disponibles a ce jour.</p>
					</div>
					<div class="card-action">
						<a class="waves-effect waves-light btn"
							href="index.php?page=nouvelles_formations">Cliquez-ici</a>
					</div>
				</div>
			</div>
			<div class="col s12 m6">
				<div class="card page_perso">
					<div class="card-image">
						<img src="images/image_mes_formations.jpg">
					</div>
					<div class="card-content">
						<h3>Mes Formations</h3>
						<p>Consultez Vos formations reservees.</p>
					</div>
					<div class="card-action">
						<a class="waves-effect waves-light btn" href="index.php?page=mes_formations">Cliquez-ici</a>
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
