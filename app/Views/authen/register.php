<?php 
//hérite du fichier layout.php à la racine de app/Views/
$this->layout('layout', ['title' => 'Inscription'])
?>

<?php 
//début du bloc main_content
$this->start('main_content'); ?>
<section id="registerUser" class="content">

    <h1>Commence l'aventure avec nous !</h1>

    <!-- Permet l'affichage des messages d'erreurs -->
	<div id="resultat-msg"></div>

    <form id="form-register" method="post" action="#" enctype="multipart/form-data">

        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom">

        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" id="prenom">

        <label for="civilite">Civilité</label>
        <select name="civilite">
            <option value="f">Femme</option>
            <option value="m">Homme</option>
        </select>

        <label for="email">Email</label>
        <input type="email" name="email" id="email">

        <label for="date_naissance">Date de naissance</label>
        <input type="date" name="date_naissance" id="date_naissance">

        <label for="ville">Ville</label>
        <input type="text" name="ville" id="ville">

        <label for="localite_actuelle">Localité actuelle</label>
		<input type="text" name="localite_actuelle" id="localite_actuelle"><br>

        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" id="pseudo">

        <label for="mdp">Mot de passe</label>
        <input type="password" name="mdp" id="mdp">

        <label for="mdp-confirm">Confirmez votre mot de passe</label>
        <input type="password" name="mdp" id="mdp-confirm">

        <label for="avatar">Avatar</label>
		<input type="file" name="avatar" id="avatar"/>
        
        <input type="submit" value="S'inscrire">
    </form>

</section>
<?php 
//fin du bloc
$this->stop('main_content'); ?>