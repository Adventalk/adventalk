<?php 
//hérite du fichier layout.php à la racine de app/Views/
$this->layout('layout', ['title' => 'Ajout d\'un album'])
?>

<?php 
//début du bloc main_content
$this->start('main_content'); ?>

        <a href="<?= $this->url('home')?>">Home</a>

<h1>Êtes-vous sûr de vouloir supprimer l'album <?= $reponse["titre"]." ?" ?></h1>
    <form method="post">
        <input type="submit" id="yes" name="yes" value="Yes">
        <input type="submit" id="no" name="no" value="No">
    </form>

<?php 
//fin du bloc
$this->stop('main_content'); ?>