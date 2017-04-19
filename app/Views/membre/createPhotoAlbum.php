<?php 
//hérite du fichier layout.php à la racine de app/Views/
$this->layout('layout', ['title' => 'Ajout Photo'])
?>

<?php
//début du bloc main_content
$this->start('main_content'); 
?>


					<div style="text-align: center">					
						<h2 class="black">Vos albums</h2>
						<h3 class="subline">Créez vos albums et conservez tous vos souvenirs</h3>
					</div>
			
			    <div class="contenu" style="width: 80%; margin: 0 auto;">
					<div class="grid">
						<div class="photo">
						</div>
                        <figure class="one_third single-item-effect" style="margin: 1%; width: 15em;">
                                <form action="" method="post" enctype="multipart/form-data" id="formulairePhoto">
                                <input type="hidden" name="album_id_album" id="album_id_album" value="">
								<input type="hidden" name="id_photo" id="id_photo" value="">
                                <input type="text" name="localite" id="localite" placeholder="localité"><br>
                                <label for="statut">Statut</label>
                                    <select name="statut" required>
                                        <option value="profil">Photo de profil</option><br>
                                        <option value="voyageur">Photo de voyage</option><br>
                                    </select><br>
                                    Ajouter des photos : <br />
                                    <input name="photo" type="file" id="photo" multiple /><br />
                                    
                                    <input type="text" name="titre" id="titre"placeholder="titre"><br>
                                    <input type="text" name="description" id="description" placeholder="description"><br>
                                    <input type="submit" value="Ajouter à l'album" />
                                </form>
																				
						</figure>
						
                    </div>
				</div>
<?php 
//fin du bloc
$this->stop('main_content');
?>



		<!-- ### Sidebar Menu ##################################################################### -->
		<div id="st-container" class="st-container"></div>

		<!-- ### JS Scripts ##################################################################### -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="../../assets/js/scriptPhoto.js"></script>
		<script src="../../assets/js/modernizr.custom.js"></script>
		<script src="../../assets/js/sidebarEffects.js"></script>
		<script src="../../assets/js/classie.js"></script>
		<script src="../../assets/js/custom.js"></script>
		<script src="../../assets/js/modernizr.form.custom.js"></script>
		<script src="../../assets/js/stepsFormComment.js"></script>
		<script src="../../assets/js/transition.js"></script>
		<script src="../../assets/js/jquery.ketchup.all.min.js"></script>
        <script src="../../assets/js/script.js"></script>
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