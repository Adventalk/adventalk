<?php 
//hérite du fichier layout.php à la racine de app/Views/
$this->layout('layout', ['title' => 'Connexion'])
?>

<?php 
//début du bloc main_content
$this->start('main_content'); ?>
<section id="loginUser" class="content">

    <h1>Connexion</h1>

    <!-- Permet l'affichage des messages d'erreurs -->
	<div id="resultat-msg"></div>

    <form id="form-login" method="POST" action="">
        <label for="email">Email</label>
        <input type="email" name="email" id="email">


        <label for="mdp">Mot de passe</label>
        <input type="password" name="mdp" id="mdp">

        <input type="submit" value="Se connecter">
    </form>
</section>
<?php 
//fin du bloc
$this->stop('main_content'); ?>