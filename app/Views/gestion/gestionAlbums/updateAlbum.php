<?php 
//hérite du fichier layout.php à la racine de app/Views/
$this->layout('layout', ['title' => 'Mise à jour d\'un album'])
?>

<?php 
//début du bloc main_content
$this->start('main_content'); ?>

<h1>Mise à jour d'un album</h1>

<form method='post' action="#">

    <label for="titre">Titre</label>
    <input type="text" name="titre">

    <label for="description">Description</label>
    <input type="description" name="description">

    <input type="submit" value="Créer">

</form>

<?php 
//fin du bloc
$this->stop('main_content'); ?>