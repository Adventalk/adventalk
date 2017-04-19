<?php
    function userConnecte(){
        if(isset($_SESSION['user']) && $_SESSION['user']['statut'] == '0'){
            return TRUE; 
        }
        else{
            return FALSE; 
        }
	// S'il existe une session/membre, cela signifie que l'utilisateur est connecté. On retourne TRUE, sinon FALSE. 
    }

    // Fonction pour voir si user est admin
    function userAdmin(){
        if($_SESSION['user'] && $_SESSION['user']['statut'] == '1'){
            return TRUE;
        }
        else{
            return FALSE;
        }
        // Si l'utilisateur est connecté et que dans le même temps son statut est égal à 1, alors cela signifie qu'il est admin. Je retourne TRUE, sinon je retourne FALSE. 
    }

?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		
		<title><?= $this->e($title) ?></title>
		<link rel="shortcut icon" href="img/favicon.ico">

		<!-- ### CSS Stylesheets ##################################################################### -->
		<link rel="stylesheet" type="text/css" href="<?= $this->assetUrl('css/normalize.css')?>" /><!-- CSS: Normalize -->
		<link rel="stylesheet" type="text/css" href="<?= $this->assetUrl('css/font-awesome.min.css')?>" /><!-- CSS: Font Awesome -->
		<link rel="stylesheet" type="text/css" href="<?= $this->assetUrl('css/styles.css')?>" /><!-- CSS: Main CSS -->
		<link rel="stylesheet" type="text/css" href="<?= $this->assetUrl('css/adventalk_styles.css')?>" /> <!-- ?????? -->
		<link rel="stylesheet" type="text/css" href="<?= $this->assetUrl('css/styles-adventalk.css')?>" />

		<!-- CSS: Responsive CSS -->		
		<link rel="stylesheet" type="text/css" href="<?= $this->assetUrl('css/responsive.css')?>" />
	</head>

	<body>
		<header class="layout">
			<!-- BOF: Fancy Search Form (content imported via jQuery: from search-form.html) -->
			<a class="cd-primary-nav-trigger" id="trigger-menu" href="#0">
				<span class="cd-menu-icon"></span>
			</a>
			<div id="travelogue-search" class="travelogue-search">
				<form method="get" action="home/search">
					<input class="travelogue-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search">
					<input class="travelogue-search-submit" type="submit" id="search_item" value="">
					<span class="travelogue-icon-search fa fa-search"></span>
				</form>
			</div>
			<!-- EOF: Fancy Search Form (content imported via jQuery: from search-form.html) -->
		</header>

		<a href="../home">
			<h1>AdvenTalk</h1>
		</a>
		
		<?php if(userConnecte()) : ?>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<ul id="nav_membre">
				<li>
					<a id="profil" href="membre/profil">
						<i class="fa fa-address-card-o" aria-hidden="true"></i>	
					</a>
					<div class="profil"></div>
				</li>
				<li>
					<a id="message" href="#">
						<i class="fa fa-commenting" aria-hidden="true"></i>
					</a>
				</li>

				<li>
					<a id="publication" href="#">
						<i class="fa fa-file-text" aria-hidden="true"></i>
					</a>
				</li>
				
				<li>
					<a id="amis" href="#">
						<i class="fa fa-users" aria-hidden="true"></i>
					</a>
				</li>

				<li>
					<a id="maps" href="membre/map">
						<i class="fa fa-globe" aria-hidden="true"></i>
					</a>
				</li>
				<li>
					<a id="deconnexionMb" href="accueil.php?action=deconnexion">
						<i class="fa fa-sign-out" aria-hidden="true"></i>
					</a>
					<div class="deconnexion"></div>
				</li>
			</ul>
		</nav>
		<span class="hide profil">Profil</span>
		<span class="hide message">Tchat</span>
		<span class="hide publication">Publications</span>
		<span class="hide amis">Amis</span>
		<span class="hide maps">Map</span>
		<span class="hide deconnexionMb">Déconnexion</span>
		<?php endif ; ?>
		<?php if(userAdmin()) : ?>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<ul id="nav_admin">
				<li>
					<a id="profil" href="membre/profil">
						<i class="fa fa-address-card" aria-hidden="true"></i>
					</a>
				</li>
				<li>
					<a id="gMembre" href="membres/create">
						<i class="fa fa-user-circle" aria-hidden="true"></i>
					</a>
				</li>

				<li>
					<a id="gMessage" href="#gestionmessagerie">
						<i class="fa fa-comments" aria-hidden="true"></i>
					</a>
				</li>

				<li>
					<a id="gPublication" href="#">
						<i class="fa fa-files-o" aria-hidden="true"></i>
					</a>
				</li>
				

				<li>
					<a id="gMap" href="membre/map">
						<i class="fa fa-globe" aria-hidden="true"></i>
					</a>
				</li>

				<li>
					<a id="statistiques" href="#">
						<i class="fa fa-line-chart" aria-hidden="true"></i>
					</a>
				</li>
				<li>
					<a id="deconnexionAd" href="#">
						<i class="fa fa-sign-out" aria-hidden="true"></i>
					</a>
				</li>
			</ul>

		</nav>
		<span class="hide profil">Profil</span>
		<span class="hide gMessage">Tchat</span>
		<span class="hide gPublication">Gestion des publications</span>
		<span class="hide gMembre">Gestion des membres</span>
		<span class="hide gMap">Gestion de la Map</span>
		<span class="hide statistiques">Statistiques</span>
		<span class="hide deconnexionAd">Déconnexion</span>
		<?php endif ; ?>

		<div class="homepage index-home index">
		

			<!-- ************* SECTION CONTENU ************************************************************************************ -->
			<section class="content">

				<?= $this->section('main_content') ?>

			</section>
			<!-- ****************************************************************************************************************** -->
			<footer>

			</footer>
		</div>
		
		<!-- ************* SCRIPTS ************************************************************************************ -->
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="<?= $this->assetUrl('js/modernizr.custom.js')?>"></script>
		<script src="<?= $this->assetUrl('js/jquery.min.js')?>"></script>
		<script src="<?= $this->assetUrl('js/sidebarEffects.js')?>"></script>
		<script src="<?= $this->assetUrl('js/classie.js')?>"></script>
		<script src="<?= $this->assetUrl('js/custom.js')?>"></script>
		<script src="<?= $this->assetUrl('js/stepsFormComment.js') ?>"></script>
		<script src="<?= $this->assetUrl('js/transition.js')?>"></script>
		<script src="<?= $this->assetUrl('js/jquery.infinitescroll.js')?>"></script>
		<script src="<?= $this->assetUrl('js/jquery.ketchup.all.min.js')?>"></script>
		<script src="<?= $this->assetUrl('js/script.js')?>"></script>
		<script src="<?= $this->assetUrl('js/scriptPhoto.js') ?>"></script>
		<script src="<?= $this->assetUrl('js/scriptAlbum.js') ?>"></script>
		<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBm414QCY5-yvwRNc5s29Ww229_Kvz5Wd0&callback=initMap">
		</script>
		<script src="<?= $this->assetUrl('js/map_script.js')?>"></script>

		<script>
			var index = 1;
			var t;

			$('.content > div > .grid').infinitescroll({
				debug		 	: false,
				loading: {
					finished	: function( opts ){},
					start		: startAjax,
				},				
				navSelector  	: "#infinitescroll",
				nextSelector 	: "#infinitescroll",
				itemSelector 	: "figure",
				dataType	 	: 'html',
				maxPage         : 4,
				path: function(index) {
					var count = parseInt(index)-1;
					return "ajax/content-"+count+".html";
				},
			});

			function startAjax( opts ) {
				$.infinitescroll.prototype.options = opts;
				$.infinitescroll.prototype.beginAjax(opts);
			}
		</script>
		<a href="#" class="back-to-top">Top</a>
	</body>
</html>