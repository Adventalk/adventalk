<?php 
//hérite du fichier layout.php à la racine de app/Views/
$this->layout('layout', ['title' => 'Accueil'])
?>

<?php 
//fin du bloc
$this->start('main_content'); ?>

	<div  class="homepage index-home index">
		<div id="container" class="container intro-effect-grid">

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

<!-- Affiche de l'image en 100% avec la page 
			<header class="header">
				<div class="bg-img">
					<img class="async-image hide" src="#" data-src="http://placehold.it/1280x720/7f8c8d/ffffff" alt="" />
				</div>
				<div class="title hidden" id="title">
					<h1>I want to travel the world</h1>
				</div>
				<div class="overlay hidden" id="overlay"></div>
			</header>
			Bouton pour descendre sur le site 
			<button class="trigger scroll-down-pulse"><span>Trigger</span></button>
-->

			<article class="content">
				<div class="">
					<div class="grid">

						<div class=" one_third">
							<figure class=" single-item-effect">
								<img src="http://placehold.it/480x320/7f8c8d/ffffff" alt="img01"/>
								<figcaption>
									<div class="figcaption-border">
										<h2>Les <span>bons plans</span> du moment</h2>
										<p>Des centaines de bons plans à découvrir</p>
										<a href="publications.html">En savoir plus sur ce bon plan</a>
										
										<a href="publications.html">Découvrez tous nos bons plans</a>
										<!-- ce lien dirige vers la page publication avec filtre bon plans -->
										<div class="figure-overlay"></div>
									</div>
								</figcaption>												
							</figure>
							<figure class=" single-item-effect ">
								<img src="http://placehold.it/480x320/7f8c8d/ffffff" alt="img01"/>
								<figcaption>
									<div class="figcaption-border">
										<h2>Besoin d'un <span>conseil</span>?</h2>
										<p>Retrouvez nos conseils et ceux de la communauté</p>
										<a href="publications.html">En savoir plus sur ce conseils</a>
										
										<a href="publications.html">Découvrez tous nos conseils</a>
										<!-- ce lien dirige vers la page publication avec filtre conseils -->
										<div class="figure-overlay"></div>
									</div>
								</figcaption>												
							</figure>
							<figure class=" single-item-effect">
								<img src="http://placehold.it/480x320/7f8c8d/ffffff" alt="img01"/>
								<figcaption>
									<div class="figcaption-border">
										<h2>Les <span>Evenements</span></h2>
										<p>Pour ne rien louper</p>
										<a href="publications.html">En savoir plus sur cet evenements</a>
										
										<a href="publications.html">Découvrez tous les evenements</a>
										<!-- ce lien dirige vers la page publication avec filtre evenements -->
										<div class="figure-overlay"></div>
									</div>
								</figcaption>												
							</figure>
						</div>

						<div class="one_sixth" style="height: 100%">

							<figure class=" single-item-effect city-break" style="height: 24em" >
								<img src="http://placehold.it/480x320/7f8c8d/ffffff" alt="img01"/>
								<figcaption>
									<div class="figcaption-border">
										<h2 style="font-size: 0.8em">Les derniers <span>messages publics</span></h2>
										<p>Les réponses à vos questions se trouvent surement ici</p>
										<a href="publications.html">En savoir plus sur cet evenements</a>
										
										<a href="publications.html">Découvrez tous les evenements</a>
										<!-- ce lien dirige vers la page publication avec filtre post publics -->
										<div class="figure-overlay"></div>
									</div>
								</figcaption>												
							</figure>
							<figure class=" single-item-effect city-break" style="height: 10.3em">
								<img src="http://placehold.it/480x320/7f8c8d/ffffff" alt="img01"/>
								<figcaption>
									<div class="figcaption-border">
										<h2>Maps</h2>
										<p>Ou etes vous actuellement?</p>
										
										<div class="figure-overlay"></div>
									</div>
								</figcaption>												
							</figure>
						</div>

						<div class="one_half">

							<figure class=" single-item-effect" style="width: 98%; height: 23em">
								<img src="http://placehold.it/480x320/7f8c8d/ffffff" alt="img01"/>
								<figcaption>
									<div class="figcaption-border">
										<h2>Les photos du <span>mois</span></h2>
										
										<div class="figure-overlay"></div>
									</div>
								</figcaption>												
							</figure>
							<figure class=" single-item-effect small" style="width: 49%; height: 11.4em">
								<img src="http://placehold.it/480x320/7f8c8d/ffffff" alt="img01"/>
								<figcaption>
									<div class="figcaption-border">
										<h2 style="font-size: 1em">Les <span>destinations tendances</span></h2>
										<p>une envie? Découvrez les destinations prisées</p>
										<div class="figure-overlay"></div>
									</div>
								</figcaption>												
							</figure>
							<figure class=" single-item-effect small" style="width: 48%; height: 11.4em">
								<img src="http://placehold.it/480x320/7f8c8d/ffffff" alt="img01"/>
								<figcaption>
									<div class="figcaption-border">
										<h2 style="font-size: 1em">Les derniers <span>messages reçus</span></h2>
										<p>Restez en contact avec vos compagnons de route</p>
										<a href="messagerie.html">Accéeder à la messagerie</a>
										<div class="figure-overlay"></div>
									</div>
								</figcaption>												
							</figure>
						</div>
					</div>
				</div>
			</article>


		</div><!-- /container -->
    </div>
<?php $this->stop('main_content'); ?>	
<?php $this->start('script_content'); ?>
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
<?php $this->stop('script_content'); ?>	
		