<?php 
//hérite du fichier layout.php à la racine de app/Views/
$this->layout('layout', ['title' => 'Inscription'])
?>

<?php 
//début du bloc main_content
$this->start('main_content'); ?>
    <h1>Let's start Adventure !</h1>
    <form method="post" action="#" display="block !important">

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

        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" id="pseudo">

        <label for="mdp">Mot de passe</label>
        <input type="password" name="mdp" id="mdp">

        <label for="avatar">Avatar</label>
		<input type="file" name="avatar" id="avatar"/><br/>
        
        <label for="mdp">Confirmez votre mot de passe</label>
        <input type="password" name="mdp" id="mdp">
        

        <input type="submit" value="S'inscrire">
    </form>

<?php 
//fin du bloc
$this->stop('main_content'); ?>