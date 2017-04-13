<?php 
//hérite du fichier layout.php à la racine de app/Views/
$this->layout('layout', ['title' => 'Connexion'])
?>

<?php 
//début du bloc main_content
$this->start('main_content'); ?>

    <h1>Let's start Adventure !</h1>

    <form method="POST" action="">
        <label for="email">Email</label>
        <input type="email" name="email" id="email">


        <label for="mdp">Mot de passe</label>
        <input type="password" name="mdp" id="mdp">

        <input type="submit" value="Se connecter">
    </form>

<?php 
//fin du bloc
$this->stop('main_content'); ?>