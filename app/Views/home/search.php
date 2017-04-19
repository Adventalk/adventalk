<?php 
//hérite du fichier layout.php à la racine de app/Views/
$this->layout('layout', ['title' => 'Recherche'])
?>

<?php
//début du bloc main_content
$this->start('main_content'); 
?>
<!--<div class="title hidden" id="title">
	<h3>Résultats de votre recherche.</h3>
	<p>Nous avons trouvé <? echo $nb_resultats; ?></p> <!-- on affiche le nombre de résultats -->
<!-- </div>-->

<!--<header class="header">
	<div class="bg-img">
		<img class="async-image hide" src="#" data-src="http://placehold.it/1280x720/7f8c8d/ffffff" alt="" />
		<div class="overlay hidden" id="overlay"></div>
	</div>
</header>-->
	<article class="content no-padding">
		<div class="grid">
			<?php foreach($search as $key => $value) : ?>
				<figure class="single-item-effect big wild">
					<img src="http://placehold.it/480x320/7f8c8d/ffffff" alt="img01"/>
					<figcaption>
						<div class="figcaption-border">
							<h2><?= $search[$key]['pseudo'] ?></h2>
							<p>Prénom : <?= $search[$key]['prenom'] ?></p>
							<p>Nom: <?= $search[$key]['nom'] ?></p>
							<p>Se trouve à: <?= $search[$key]['localite_actuelle'] ?></p>
							<p>Vient de: <?= $search[$key]['ville'] ?></p>
							<p>Rang: <?= $search[$key]['rang'] ?></p>
							<a href="single.html">Accéder au profil</a>
							<div class="figure-overlay"></div>
						</div>
					</figcaption>												
				</figure>
			<?php endforeach; ?>
		</div>
	</article>
<?php 
//fin du bloc
$this->stop('main_content');
?>

