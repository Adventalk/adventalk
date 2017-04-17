<?php 
//hérite du fichier layout.php à la racine de app/Views/
$this->layout('layout', ['title' => 'Profil'])
?>

<?php 
//début du bloc main_content
$this->start('main_content');
?>

<h1> Mon Profil </h1>

<p><span>Pseudo : </span><?= $profil["pseudo"] ?></p>
<p><span>Nom : </span><?= $profil["nom"] ?></p>
<p><span>Prenom : </span><?= $profil["prenom"] ?></p>
<p><span>Email : </span><?= $profil["email"] ?></p>



<?php 
//fin du bloc
$this->stop('main_content');
?>