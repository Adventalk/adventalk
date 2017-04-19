

<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<meta name="author" content="Travelogue" />

		<title>Travelogue | Single Post</title>
		<link rel="shortcut icon" href="img/favicon.ico">

		<!-- ### CSS Stylesheets ##################################################################### -->
		<link rel="stylesheet" type="text/css" href="<?= $this->assetUrl('css/normalize.css') ?>" /><!-- CSS: Normalize -->
		<link rel="stylesheet" type="text/css" href="<?= $this->assetUrl('css/font-awesome.min.css') ?>" /><!-- CSS: Font Awesome -->
		<link rel="stylesheet" type="text/css" href="<?= $this->assetUrl('css/styles.css') ?>" /><!-- CSS: Main CSS -->
		<link rel="stylesheet" type="text/css" href="<?= $this->assetUrl('css/responsive.css') ?>" /><!-- CSS: Responsive CSS -->		
        <link rel="stylesheet" type="text/css" href="<?= $this->assetUrl('css/adventalk_styles.css') ?>" /><!-- CSS: Responsive CSS -->				
	</head>
	<body class="index-single">

		

		<!-- BOF: Fancy Search Form (content imported via jQuery: from search-form.html) -->
		<div id="travelogue-search" class="travelogue-search">
			<form>
				<input class="travelogue-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search">
				<input class="travelogue-search-submit" type="submit" value="">
				<span class="travelogue-icon-search fa fa-search"></span>
			</form>
		</div>
		<!-- EOF: Fancy Search Form (content imported via jQuery: from search-form.html) -->

			<header>
				
			</header>
			
			
			<section>
				
					<div style="text-align: center">					
						<h2 class="black">Vos albums</h2>
						<h3 class="subline">Créez vos albums et conservez tous vos souvenirs</h3>
					</div>
			
			    <div class="contenu" style="width: 80%; margin: 0 auto;">
					
					<div class="grid">

						
						
						<div class="album" >

						</div>
						
						
						
                        	<figure class="one_third single-item-effect">

                                <form method="post" id="formulaireAlbum" enctype="multipart/form-data">
                                    <input type="hidden" name="membre_id_membre" id="membre_id_membre" value="">
									<input type="hidden" name="id_album" id="id_album" value="">
									
                                    <input type="text" name="titre" id="titre" placeholder="titre"><br>
                                    
                                    <input type="text" name="description" id="description" placeholder="description"><br>
                                    
                                    <input type="submit" name="new_album" id="new_album" value="Créer un album" />
									
                                </form>
																				
							</figure>
						
                    </div>
				</div>
			</section>



		<!-- ### Sidebar Menu ##################################################################### -->
		<div id="st-container" class="st-container"></div>

		<!-- ### JS Scripts ##################################################################### -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="<?= $this->assetUrl('js/scriptPhoto.js') ?>"></script>
		<script src="<?= $this->assetUrl('js/scriptAlbum.js') ?>"></script>
		<script src="<?= $this->assetUrl('js/modernizr.custom.js') ?>"></script>
		<script src="<?= $this->assetUrl('js/sidebarEffects.js') ?>"></script>
		<script src="<?= $this->assetUrl('js/classie.js') ?>"></script>
		<script src="<?= $this->assetUrl('js/custom.js') ?>"></script>
		<script src="<?= $this->assetUrl('js/modernizr.form.custom.js') ?>"></script>
		<script src="<?= $this->assetUrl('js/stepsFormComment.js') ?>"></script>
		<script src="<?= $this->assetUrl('js/transition.js') ?>"></script>
		<script src="<?= $this->assetUrl('js/jquery.ketchup.all.min.js') ?>"></script>
        <script src="<?= $this->assetUrl('js/script.js') ?>"></script>
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<script type="text/javascript">
		// ~~~~~~~ FORM ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ //
		var theForm = document.getElementById( 'theForm' );

		new stepsForm( theForm, {
			onSubmit : function( form ) {
				// hide form
				classie.addClass( theForm.querySelector( '.simform-inner' ), 'hide' );
				// let's just simulate something...
				var messageEl = theForm.querySelector( '.final-message' );
				messageEl.innerHTML = 'Thank you for your comment.';
				classie.addClass( messageEl, 'show' );
			}
		} );

		</script>

		<a href="#0" class="back-to-top">Top</a>
	</body>
</html>