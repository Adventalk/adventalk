<?php 
//hérite du fichier layout.php à la racine de app/Views/
$this->layout('layout', ['title' => 'Profil'])
?>

<?php 
//début du bloc main_content
$this->start('main_content');
?>

<?= $showProfil ?>

<?php 
//fin du bloc
$this->stop('main_content');
?>