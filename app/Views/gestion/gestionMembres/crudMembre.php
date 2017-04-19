<?php 
//hérite du fichier layout.php à la racine de app/Views/
$this->layout('layout', ['title' => 'Gestion des membres'])
?>

<?php 
//début du bloc main_content
$this->start('main_content'); ?>
	<div id="gestion-membre">
		<h1>Gestion des membres</h1>

		<!-- Permet l'affichage des messages d'erreurs -->
		<div id="resultat-msg"></div>
		
		<table id="tableau" style="margin:5%">
			<!-- Affichage de tout les Membres  -->
		</table>

		<div class="btn-create">
			<input type="submit" id="create" value="Créer un nouvel utilisateur" >
		</div>

		<!-- Affichage du formulaire pour créer un Membre  -->
		<form method="post" id="formulaire" style="display:none" >
			
			<input type="hidden" name="id_membre" id="id_membre">
			<!--<input type="hidden" name="avatar" id="avatar" value=""/>-->

			<label for="nom">Nom</label>
			<input type="text" name="nom" id="nom" required><br>

			<label for="prenom">Prénom</label>
			<input type="text" name="prenom" id="prenom" required><br>

			<label for="civilite">Civilité</label>
			<select id="civilite" name="civilite" required>
				<option value="f">Femme</option><br>
				<option value="m">Homme</option><br>
			</select><br>

			<label for="date_naissance">Date de naissance</label>
			<input type="date" name="date_naissance" id="date_naissance" required><br>

			<label for="email">Email</label>
			<input type="email" name="email" id="email" required><br>

			<label for="ville">Ville</label>
			<input type="text" name="ville" id="ville"><br>

			<label for="localite_actuelle">Localité actuelle</label>
			<input type="text" name="localite_actuelle" id="localite_actuelle"><br>

			<label for="pseudo">Pseudo</label>
			<input type="text" name="pseudo" id="pseudo" required><br>

			<label for="avatar">Avatar</label>
			<!--<img id="avatarUser" src="" />-->

			<input type="file" name="avatar" id="avatar"/><br/>


			<!-- Permet l'affichage uniquement lors d'une creation et non d'une modification -->
			<div id="form-mdp"> 
				<label for="mdp">Mot de passe</label>
				<input type="password" name="mdp" id="mdp" required><br>

				<label for="mdp">Confirmez votre mot de passe</label>
				<input type="password" name="mdp" id="mdp-confirm" required><br>
			</div>

			<label for="statut">Statut</label>
			<select id="statut" name="statut" required>
				<option value="0">Membre</option><br>
				<option value="1">Admin</option> <br>
			</select><br>

			<label for="rang">Rang</label>
			<select id="rang" name="rang" required>
				<option value="Aspirant Voyageur">Aspirant Voyageur</option><br>
				<option value="Voyageur Amateur">Voyageur Amateur</option><br>
				<option value="Globe Trotter">Globe Trotter</option><br>
				<option value="Grand Explorateur">Grand Explorateur</option><br>
				<option value="Voyageur Intergalactique">Voyageur Intergalactique</option><br>
			</select><br>
			
			<input type="submit" value="Enregistrer">
		</form>
	</div>

<?php 
//fin du bloc
$this->stop('main_content');
?>