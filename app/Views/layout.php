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
		<link rel="stylesheet" type="text/css" href="<?= $this->assetUrl('css/styles-adventalk.css')?>" /><!-- CSS: Adeventalk CSS -->
		<link rel="stylesheet" type="text/css" href="<?= $this->assetUrl('css/responsive.css')?>" />

		<!-- CSS: Responsive CSS -->		
		<link rel="stylesheet" type="text/css" href="<?= $this->assetUrl('css/adventalk_styles.css')?>" /> <!-- ?????? -->
		
</head>
<body>
	<div class="homepage index-home index">

		<a class="cd-primary-nav-trigger" id="trigger-menu" href="#0">
			<span class="cd-menu-icon"></span>
		</a>

		<!-- BOF: Fancy Search Form (content imported via jQuery: from search-form.html) -->
		<div id="travelogue-search" class="travelogue-search">
			<form action="search.html">
				<input class="travelogue-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search">
				<input class="travelogue-search-submit" type="submit" value="">
				<span class="travelogue-icon-search fa fa-search"></span>
			</form>
		</div>
		<!-- EOF: Fancy Search Form (content imported via jQuery: from search-form.html) -->

<!-- ************* SECTION CONTENU ************************************************************************************ -->
		<section>

			<?= $this->section('main_content') ?>



		</section>
<!-- ****************************************************************************************************************** -->
		<footer>
		</footer>
	</div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="<?= $this->assetUrl('js/script.js')?>"></script>
	<script src="<?= $this->assetUrl('js/modernizr.custom.js')?>"></script>
	<script src="<?= $this->assetUrl('js/jquery.min.js')?>"></script>
	<script src="<?= $this->assetUrl('js/sidebarEffects.js')?>"></script>
	<script src="<?= $this->assetUrl('js/classie.js')?>"></script>
	<script src="<?= $this->assetUrl('js/custom.js')?>"></script>
	<script src="<?= $this->assetUrl('js/transition.js')?>"></script>
	<script src="<?= $this->assetUrl('js/jquery.infinitescroll.js')?>"></script>
	<script src="<?= $this->assetUrl('js/jquery.ketchup.all.min.js')?>"></script>
	
	<?= $this->section('script_content') ?>
	<a href="#" class="back-to-top">Top</a>

</div>
</body>
</html>